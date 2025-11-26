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
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = config('midtrans.is_sanitized');
        Config::$is3ds = config('midtrans.is_3ds');
    }

    public function callback(Request $request)
    {
        try {
            // Create notification instance
            $notification = new Notification();

            // Get transaction details
            $orderId = $notification->order_id;
            $transactionStatus = $notification->transaction_status;
            $fraudStatus = $notification->fraud_status;
            $paymentType = $notification->payment_type;

            Log::info('Midtrans Callback Received', [
                'order_id' => $orderId,
                'transaction_status' => $transactionStatus,
                'fraud_status' => $fraudStatus,
                'payment_type' => $paymentType
            ]);

            // Find the order
            $order = Order::find($orderId);

            if (!$order) {
                Log::error('Order not found for Midtrans callback', ['order_id' => $orderId]);
                return response()->json(['message' => 'Order not found'], 404);
            }

            // Handle transaction status
            if ($transactionStatus == 'capture') {
                if ($paymentType == 'credit_card') {
                    if ($fraudStatus == 'challenge') {
                        // Set order status to pending
                        $order->status = 'pending';
                    } else {
                        // Set order status to paid
                        $order->status = 'paid';
                        $order->paid_at = now();
                    }
                }
            } elseif ($transactionStatus == 'settlement') {
                // Payment success
                $order->status = 'paid';
                $order->paid_at = now();
            } elseif ($transactionStatus == 'pending') {
                // Payment pending
                $order->status = 'pending';
            } elseif ($transactionStatus == 'deny') {
                // Payment denied
                $order->status = 'failed';
            } elseif ($transactionStatus == 'expire') {
                // Payment expired
                $order->status = 'expired';
            } elseif ($transactionStatus == 'cancel') {
                // Payment cancelled
                $order->status = 'cancelled';
            }

            // Update payment reference
            $order->payment_ref = $notification->transaction_id ?? $order->payment_ref;
            $order->save();

            Log::info('Order status updated', [
                'order_id' => $orderId,
                'new_status' => $order->status
            ]);

            return response()->json(['message' => 'Callback processed successfully']);

        } catch (\Exception $e) {
            Log::error('Midtrans Callback Error: ' . $e->getMessage(), [
                'trace' => $e->getTraceAsString()
            ]);

            return response()->json([
                'message' => 'Error processing callback',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
