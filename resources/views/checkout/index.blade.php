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
            <p class="text-gray-600 mb-6">Silakan selesaikan pembayaran Anda.</p>

            <div class="mb-4">
                <label for="voucher-code" class="block text-sm font-medium text-gray-700">Kode Voucher</label>
                <div class="mt-1 flex">
                    <input id="voucher-code" type="text" class="flex-1 rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" placeholder="Masukkan kode voucher (opsional)" />
                </div>
                <p id="voucher-feedback" class="mt-2 text-sm text-gray-500"></p>
            </div>
            
            <button id="pay-button" class="w-full bg-blue-600 text-white py-3 rounded-md text-lg font-semibold hover:bg-blue-700 transition-colors">
                Bayar Sekarang
            </button>
        </div>
    </div>
</div>

<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
<script type="text/javascript">
(function() {
    const payButton = document.getElementById('pay-button');
    
    if (!payButton) return;
    
    function handlePayment() {
        // Disable button to prevent double clicks
        payButton.disabled = true;
        payButton.textContent = 'Memproses...';
        
        const voucherInput = document.getElementById('voucher-code');
        const voucherCode = voucherInput ? voucherInput.value.trim() : null;
        fetch('{{ route('checkout.process') }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ voucher_code: voucherCode })
        })
        .then(response => response.json())
        .then(data => {
            // Re-enable button
            payButton.disabled = false;
            payButton.textContent = 'Bayar Sekarang';
            
            const feedbackEl = document.getElementById('voucher-feedback');
            if (data.error) {
                if (feedbackEl) {
                    feedbackEl.textContent = data.message ? ('Voucher tidak valid: ' + data.message) : 'Terjadi kesalahan saat memproses voucher.';
                    feedbackEl.classList.remove('text-gray-500');
                    feedbackEl.classList.add('text-red-600');
                }
                alert(data.error);
                return;
            }
            if(data.snap_token) {
                snap.pay(data.snap_token, {
                    onSuccess: function(result){
                        console.log('Payment success:', result);
                        window.location.href = "{{ route('purchases') }}";
                    },
                    onPending: function(result){
                        console.log('Payment pending:', result);
                        alert('Menunggu pembayaran Anda!');
                    },
                    onError: function(result){
                        console.error('Payment error:', result);
                        alert('Pembayaran gagal! Silakan coba lagi.');
                    },
                    onClose: function(){
                        console.log('Payment popup closed');
                        alert('Anda menutup popup pembayaran tanpa menyelesaikan transaksi.');
                    }
                });
            } else {
                alert('Error: Tidak dapat memperoleh token pembayaran');
                console.error('Response:', data);
            }
        })
        .catch(error => {
            // Re-enable button
            payButton.disabled = false;
            payButton.textContent = 'Bayar Sekarang';
            
            console.error('Fetch error:', error);
            alert('Terjadi kesalahan. Silakan coba lagi.');
        });
    }
    
    payButton.addEventListener('click', handlePayment);
    
    // Cleanup on Turbo navigation
    document.addEventListener('turbo:before-cache', function() {
        payButton.removeEventListener('click', handlePayment);
    }, { once: true });
})();
</script>
@endsection
