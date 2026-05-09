@extends('layouts.app')

@section('title', 'Pesanan Saya - Dunia Karya')

@section('content')
<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-3xl font-extrabold bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
            Pesanan Saya
        </h1>
        <p class="text-gray-500 mt-1">Riwayat transaksi dan unduhan produk digital Anda.</p>
    </div>

    @if($orders->count() > 0)
        <div class="space-y-6">
            @foreach($orders as $order)
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden transition hover:shadow-md duration-300">

                    {{-- Order Header --}}
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 px-6 py-4 bg-gray-50 border-b border-gray-100">
                        <div class="flex flex-col sm:flex-row sm:items-center gap-2 sm:gap-4 text-sm text-gray-500">
                            <span class="font-mono text-xs bg-gray-200 text-gray-700 px-2 py-1 rounded w-fit">
                                #{{ strtoupper(substr($order->id, 0, 8)) }}
                            </span>
                            <span>{{ $order->created_at->format('d M Y, H:i') }} WIB</span>
                            @if($order->paid_at)
                                <span class="text-green-600">
                                    <svg class="w-3.5 h-3.5 inline mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                    Dibayar {{ $order->paid_at->format('d M Y') }}
                                </span>
                            @endif
                        </div>

                        {{-- Status Badge --}}
                        @php
                            $statusConfig = match($order->status) {
                                'paid'      => ['bg-green-100 text-green-800',  'Lunas'],
                                'pending'   => ['bg-yellow-100 text-yellow-800','Menunggu Pembayaran'],
                                'expired'   => ['bg-gray-100 text-gray-600',    'Kedaluwarsa'],
                                'cancelled' => ['bg-red-100 text-red-700',      'Dibatalkan'],
                                'failed'    => ['bg-red-100 text-red-700',      'Gagal'],
                                default     => ['bg-gray-100 text-gray-600',    ucfirst($order->status)],
                            };
                        @endphp
                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold {{ $statusConfig[0] }} w-fit">
                            @if($order->status === 'paid')
                                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                            @elseif($order->status === 'pending')
                                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/></svg>
                            @else
                                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/></svg>
                            @endif
                            {{ $statusConfig[1] }}
                        </span>
                    </div>

                    {{-- Order Items --}}
                    <div class="divide-y divide-gray-50">
                        @foreach($order->items as $item)
                            <div class="flex gap-4 px-6 py-5">
                                {{-- Thumbnail --}}
                                <div class="flex-shrink-0 w-16 h-16 sm:w-20 sm:h-20 rounded-xl overflow-hidden bg-gray-100">
                                    <img
                                        src="{{ asset('storage/' . $item->product->thumbnail) }}"
                                        alt="{{ $item->product->title }}"
                                        class="w-full h-full object-cover"
                                        onerror="this.onerror=null;this.src='https://placehold.co/80x80?text=?';"
                                    >
                                </div>

                                {{-- Info --}}
                                <div class="flex-1 min-w-0">
                                    <div class="flex flex-col sm:flex-row sm:items-start justify-between gap-1">
                                        <div>
                                            <h3 class="font-semibold text-gray-900 text-sm sm:text-base leading-snug">
                                                {{ $item->product->title }}
                                            </h3>
                                            <p class="text-xs text-gray-400 mt-0.5">
                                                {{ $item->product->category->name ?? 'Produk Digital' }}
                                                &bull; Qty {{ $item->quantity }}
                                            </p>
                                        </div>
                                        <p class="text-sm font-semibold text-gray-800 whitespace-nowrap">
                                            Rp{{ number_format($item->price * $item->quantity, 0, ',', '.') }}
                                        </p>
                                    </div>

                                    {{-- Download buttons (only for paid orders) --}}
                                    @if($order->status === 'paid')
                                        <div class="mt-3 flex flex-wrap gap-2">
                                            @if($item->product->files->count() > 0)
                                                @foreach($item->product->files as $file)
                                                    <a
                                                        href="{{ route('download.file', $file->id) }}"
                                                        class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-blue-600 hover:bg-blue-700 text-white text-xs font-medium rounded-lg transition-colors active:scale-95 transform"
                                                    >
                                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                                                        </svg>
                                                        Download
                                                        <span class="bg-blue-500 px-1.5 py-0.5 rounded text-xs uppercase">{{ $file->file_type }}</span>
                                                        <span class="opacity-75">({{ number_format($file->file_size_bytes / 1024 / 1024, 1) }} MB)</span>
                                                    </a>
                                                @endforeach
                                            @else
                                                <span class="text-xs text-gray-400 italic">File belum tersedia</span>
                                            @endif
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>

                    {{-- Order Footer --}}
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 px-6 py-4 bg-gray-50 border-t border-gray-100">
                        <div class="text-sm text-gray-500">
                            {{ $order->items->count() }} produk
                        </div>
                        <div class="flex items-center gap-4">
                            <div class="text-right">
                                <p class="text-xs text-gray-400">Total Pembayaran</p>
                                <p class="text-lg font-bold text-gray-900">Rp{{ number_format($order->total_price, 0, ',', '.') }}</p>
                            </div>

                            {{-- Pay Now button for pending orders --}}
                            @if($order->status === 'pending')
                                <button
                                    class="pay-now-btn inline-flex items-center gap-2 px-4 py-2 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white text-sm font-semibold rounded-xl shadow transition-all active:scale-95 transform"
                                    data-order-id="{{ $order->id }}"
                                    data-repay-url="{{ route('checkout.repay', $order->id) }}"
                                >
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/>
                                    </svg>
                                    Bayar Sekarang
                                </button>
                            @endif
                        </div>
                    </div>

                </div>
            @endforeach
        </div>

    @else
        {{-- Empty State --}}
        <div class="text-center py-20">
            <div class="inline-flex items-center justify-center w-20 h-20 bg-blue-50 rounded-full mb-6">
                <svg class="w-10 h-10 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                </svg>
            </div>
            <h2 class="text-xl font-bold text-gray-800 mb-2">Belum ada pesanan</h2>
            <p class="text-gray-500 mb-8">Yuk mulai belanja produk digital pilihan Anda!</p>
            <a
                href="{{ route('products.index') }}"
                class="inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-semibold rounded-xl shadow hover:from-blue-700 hover:to-indigo-700 transition-all"
            >
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                </svg>
                Jelajahi Produk
            </a>
        </div>
    @endif

</div>
@endsection

@push('scripts')
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
<script>
(function () {
    document.querySelectorAll('.pay-now-btn').forEach(function (btn) {
        btn.addEventListener('click', function () {
            const orderId = btn.dataset.orderId;
            const repayUrl = btn.dataset.repayUrl;

            btn.disabled = true;
            btn.innerHTML = '<svg class="w-4 h-4 animate-spin" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z"></path></svg> Memproses...';

            fetch(repayUrl, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({})
            })
            .then(res => res.json())
            .then(data => {
                btn.disabled = false;
                btn.innerHTML = '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/></svg> Bayar Sekarang';

                if (data.snap_token) {
                    snap.pay(data.snap_token, {
                        onSuccess: function () { window.location.reload(); },
                        onPending: function () { window.location.reload(); },
                        onError: function () { alert('Pembayaran gagal. Silakan coba lagi.'); },
                        onClose: function () {}
                    });
                } else {
                    alert(data.error || 'Gagal memuat pembayaran.');
                }
            })
            .catch(function () {
                btn.disabled = false;
                btn.innerHTML = 'Bayar Sekarang';
                alert('Terjadi kesalahan. Silakan coba lagi.');
            });
        });
    });
})();
</script>
@endpush
