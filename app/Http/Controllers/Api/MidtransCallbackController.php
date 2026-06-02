<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Midtrans\Config;
use Midtrans\Notification;

class MidtransCallbackController extends Controller
{
    public function __construct()
    {
        Config::$serverKey    = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized  = config('midtrans.is_sanitized');
        Config::$is3ds        = config('midtrans.is_3ds');

        if (app()->environment('local')) {
            Config::$curlOptions = [
                CURLOPT_SSL_VERIFYHOST => 0,
                CURLOPT_SSL_VERIFYPEER => false,
            ];
        }
    }

    public function callback(Request $request)
    {
        try {
            $notification = new Notification();

            $orderId           = $notification->order_id;
            $transactionStatus = $notification->transaction_status;
            $fraudStatus       = $notification->fraud_status;
            $paymentType       = $notification->payment_type;
            $transactionId     = $notification->transaction_id;

            // Verify signature key to prevent forged callbacks
            $signatureKey = hash('sha512',
                $orderId
                . $notification->status_code
                . $notification->gross_amount
                . config('midtrans.server_key')
            );

            if ($signatureKey !== $request->input('signature_key')) {
                Log::warning('Midtrans: invalid signature', ['order_id' => $orderId]);
                return response()->json(['message' => 'Invalid signature'], 403);
            }

            Log::info('Midtrans Callback', compact(
                'orderId', 'transactionStatus', 'fraudStatus', 'paymentType'
            ));

            $order = Order::find($orderId);

            if (!$order) {
                Log::error('Midtrans: order not found', ['order_id' => $orderId]);
                return response()->json(['message' => 'Order not found'], 404);
            }

            // Skip if order already in a final state
            if (in_array($order->status, ['paid', 'cancelled', 'expired', 'failed'])) {
                Log::info('Midtrans: order already in final state, skipping', [
                    'order_id' => $orderId,
                    'status'   => $order->status,
                ]);
                return response()->json(['message' => 'Already processed']);
            }

            // Determine new status
            $newStatus = $this->resolveStatus($transactionStatus, $paymentType, $fraudStatus);

            $order->status      = $newStatus;
            $order->payment_ref = $transactionId ?? $order->payment_ref;

            if ($newStatus === 'paid') {
                $order->paid_at = now();
            }

            $order->save();

            Log::info('Midtrans: order updated', [
                'order_id'   => $orderId,
                'new_status' => $newStatus,
            ]);

            return response()->json(['message' => 'OK']);

        } catch (\Exception $e) {
            Log::error('Midtrans Callback Exception: ' . $e->getMessage(), [
                'trace' => $e->getTraceAsString(),
            ]);

            return response()->json(['message' => 'Server error'], 500);
        }
    }

    /**
     * Map Midtrans transaction_status to our order status.
     */
    private function resolveStatus(string $transactionStatus, string $paymentType, ?string $fraudStatus): string
    {
        return match ($transactionStatus) {
            'capture'    => $paymentType === 'credit_card' && $fraudStatus === 'challenge'
                                ? 'pending'
                                : 'paid',
            'settlement' => 'paid',
            'pending'    => 'pending',
            'deny'       => 'failed',
            'expire'     => 'expired',
            'cancel'     => 'cancelled',
            default      => 'pending',
        };
    }
}
