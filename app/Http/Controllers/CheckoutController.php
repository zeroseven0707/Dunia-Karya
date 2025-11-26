<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Voucher;
use App\Models\VoucherUsage;
use Illuminate\Support\Facades\Auth;
use Midtrans\Config;
use Midtrans\Snap;
use Illuminate\Support\Str;

class CheckoutController extends Controller
{
    public function __construct()
    {
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = config('midtrans.is_sanitized');
        Config::$is3ds = config('midtrans.is_3ds');
    }

    public function index()
    {
        $cart = Cart::where('user_id', Auth::id())->with('items.product')->first();

        if (!$cart || $cart->items->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Keranjang belanja Anda kosong.');
        }

        return view('checkout.index', compact('cart'));
    }

    public function process(Request $request)
    {
        $cart = Cart::where('user_id', Auth::id())->with('items.product')->first();

        if (!$cart || $cart->items->isEmpty()) {
            return redirect()->route('cart.index');
        }

        // Calculate total & build item details
        $itemDetails = $cart->items->map(function($item) {
            return [
                'id' => $item->product_id,
                'price' => (int) ($item->product->discount_price ?? $item->product->price),
                'quantity' => $item->quantity,
                'name' => substr($item->product->title, 0, 50),
            ];
        })->toArray();
        $totalPrice = array_sum(array_map(fn($d) => $d['price'] * $d['quantity'], $itemDetails));

        // Apply voucher if provided
        $voucherCode = $request->input('voucher_code');
        $discount = 0;
        $appliedVoucher = null;
        if ($voucherCode) {
            $appliedVoucher = Voucher::where('code', $voucherCode)->first();
            if ($appliedVoucher) {
                $now = now();
                if ($appliedVoucher->start_date <= $now && $appliedVoucher->exp_date >= $now && $appliedVoucher->qty > 0 && $totalPrice >= $appliedVoucher->min_spend) {
                    $discount = min((int) $appliedVoucher->discount_value, (int) $totalPrice);
                    $remaining = $discount;
                    foreach ($itemDetails as &$detail) {
                        if ($remaining <= 0) break;
                        $lineTotal = $detail['price'] * $detail['quantity'];
                        $deduct = min($remaining, $lineTotal);
                        $newLineTotal = $lineTotal - $deduct;
                        $detail['price'] = (int) floor($newLineTotal / max(1, $detail['quantity']));
                        $remaining -= $deduct;
                    }
                    unset($detail);
                    $totalPrice = max(0, $totalPrice - $discount);
                }
            }
        }

        // Create Order
        $order = Order::create([
            'user_id' => Auth::id(),
            'total_price' => $totalPrice,
            'status' => 'pending',
            'payment_method' => 'midtrans', // Default for now
            'payment_ref' => 'ORD-' . strtoupper(Str::random(10)), // Temporary ref
            'paid_at' => null,
            'expires_at' => now()->addDay(), // 24 hours expiry
        ]);

        // Create Order Items
        foreach ($cart->items as $item) {
            $order->items()->create([
                'product_id' => $item->product_id,
                'price' => $item->product->discount_price ?? $item->product->price,
                'quantity' => $item->quantity,
            ]);
        }

        if ($appliedVoucher && $discount > 0) {
            $appliedVoucher->decrement('qty');
            $usage = new VoucherUsage();
            $usage->user_id = Auth::id();
            $usage->order_id = $order->id;
            $usage->used_at = now();
            $usage->save();
        }

        // Midtrans Params
        $params = [
            'transaction_details' => [
                'order_id' => $order->id,
                'gross_amount' => (int) $totalPrice,
            ],
            'customer_details' => [
                'first_name' => Auth::user()->name,
                'email' => Auth::user()->email,
            ],
            'item_details' => $itemDetails,
            'callbacks' => [
                'finish' => route('home'),
            ]
        ];

        // Set notification URL (for production)
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = config('midtrans.is_sanitized');
        Config::$is3ds = config('midtrans.is_3ds');
        
        // Only set notification URL if in production or if APP_URL is set
        if (config('app.url') && config('app.url') !== 'http://localhost') {
            Config::$overrideNotifUrl = config('app.url') . '/api/midtrans/callback';
        }

        try {
            $snapToken = Snap::getSnapToken($params);
            
            return response()->json(['snap_token' => $snapToken, 'order_id' => $order->id]);

        } catch (\Exception $e) {
            // Log the error for debugging
            \Log::error('Midtrans Checkout Error: ' . $e->getMessage(), [
                'order_id' => $order->id ?? null,
                'user_id' => Auth::id(),
                'trace' => $e->getTraceAsString()
            ]);
            
            return response()->json([
                'error' => 'Terjadi kesalahan saat memproses pembayaran.',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function purchases()
    {
        $orders = Order::where('user_id', Auth::id())
            ->with('items.product.files')
            ->latest()
            ->get();
            
        return view('purchases.index', compact('orders'));
    }
}
