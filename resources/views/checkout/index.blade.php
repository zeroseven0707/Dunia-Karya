@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <h1 class="text-3xl font-bold mb-8">Checkout</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
        <!-- Order Summary -->
        <div class="bg-white shadow-md rounded-lg p-6">
            <h2 class="text-xl font-semibold mb-4">Ringkasan Pesanan</h2>
            <div class="space-y-4">
                @foreach($cart->items as $item)
                    <div class="flex justify-between items-center border-b pb-4">
                        <div class="flex items-center">
                            <img class="h-12 w-12 rounded object-cover mr-4" src="{{ asset('storage/' . $item->product->thumbnail) }}" alt="{{ $item->product->title }}">
                            <div>
                                <div class="text-sm font-medium">{{ $item->product->title }}</div>
                                <div class="text-xs text-gray-500">{{ $item->quantity }} x Rp{{ number_format($item->product->discount_price ?? $item->product->price, 0, ',', '.') }}</div>
                            </div>
                        </div>
                        <div class="text-sm font-semibold">
                            Rp{{ number_format(($item->product->discount_price ?? $item->product->price) * $item->quantity, 0, ',', '.') }}
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="mt-6 border-t pt-4">
                <div class="flex justify-between items-center text-lg font-bold">
                    <span>Total Bayar</span>
                    <span>Rp{{ number_format($cart->items->sum(function($item) { return ($item->product->discount_price ?? $item->product->price) * $item->quantity; }), 0, ',', '.') }}</span>
                </div>
            </div>
        </div>

        <!-- Payment Action -->
        <div class="bg-white shadow-md rounded-lg p-6 h-fit">
            <h2 class="text-xl font-semibold mb-4">Pembayaran</h2>
            <p class="text-gray-600 mb-6">Silakan selesaikan pembayaran Anda menggunakan Midtrans.</p>
            
            <button id="pay-button" class="w-full bg-blue-600 text-white py-3 rounded-md text-lg font-semibold hover:bg-blue-700 transition-colors">
                Bayar Sekarang
            </button>
        </div>
    </div>
</div>

@push('scripts')
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
<script type="text/javascript">
    document.getElementById('pay-button').onclick = function(){
        // SnapToken acquired from previous step
        fetch('{{ route('checkout.process') }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        })
        .then(response => response.json())
        .then(data => {
            if(data.snap_token) {
                snap.pay(data.snap_token, {
                    // Optional
                    onSuccess: function(result){
                        /* You may add your own implementation here */
                        // alert("payment success!"); 
                        window.location.href = "{{ route('purchases.index') }}";
                    },
                    onPending: function(result){
                        /* You may add your own implementation here */
                        alert("wating your payment!"); console.log(result);
                    },
                    onError: function(result){
                        /* You may add your own implementation here */
                        alert("payment failed!"); console.log(result);
                    },
                    onClose: function(){
                        /* You may add your own implementation here */
                        alert('you closed the popup without finishing the payment');
                    }
                });
            } else {
                alert('Error getting payment token');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Something went wrong');
        });
    };
</script>
@endpush
@endsection
