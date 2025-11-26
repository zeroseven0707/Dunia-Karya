<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
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

        // Calculate total
        $totalPrice = $cart->items->sum(function($item) {
            return ($item->product->discount_price ?? $item->product->price) * $item->quantity;
        });

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
            'item_details' => $cart->items->map(function($item) {
                return [
                    'id' => $item->product_id,
                    'price' => (int) ($item->product->discount_price ?? $item->product->price),
                    'quantity' => $item->quantity,
                    'name' => substr($item->product->title, 0, 50), // Midtrans limit
                ];
            })->toArray(),
        ];

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
            ->where('status', 'paid')
            ->with('items.product.files')
            ->latest()
            ->get();
            
        return view('purchases.index', compact('orders'));
    }
}
