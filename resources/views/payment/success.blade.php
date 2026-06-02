@extends('layouts.app')

@section('title', 'Pembayaran Berhasil - Dunia Karya')

@section('content')
<div class="min-h-[70vh] flex items-center justify-center px-4 py-16">
    <div class="max-w-lg w-full text-center">

        {{-- Animated checkmark --}}
        <div class="flex justify-center mb-8">
            <div class="relative flex items-center justify-center w-28 h-28">
                {{-- Outer ring pulse --}}
                <div class="absolute inset-0 rounded-full bg-green-100 animate-ping opacity-30"></div>
                <div class="absolute inset-0 rounded-full bg-green-50 border-4 border-green-200"></div>
                {{-- Check icon --}}
                <svg class="relative w-14 h-14 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                </svg>
            </div>
        </div>

        {{-- Heading --}}
        <h1 class="text-3xl font-extrabold text-gray-900 mb-3">
            Pembayaran Berhasil!
        </h1>
        <p class="text-gray-500 text-base mb-8 leading-relaxed">
            Transaksi Anda telah dikonfirmasi. Produk digital Anda sudah siap untuk diunduh.
        </p>

        {{-- Order info card --}}
        @if($order)
        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6 mb-8 text-left space-y-3">
            <div class="flex justify-between items-center text-sm">
                <span class="text-gray-500">Order ID</span>
                <span class="font-mono text-xs bg-gray-100 text-gray-700 px-2 py-1 rounded">
                    #{{ strtoupper(substr($order->id, 0, 8)) }}
                </span>
            </div>
            <div class="flex justify-between items-center text-sm">
                <span class="text-gray-500">Tanggal</span>
                <span class="font-medium text-gray-800">{{ $order->paid_at?->format('d M Y, H:i') ?? now()->format('d M Y, H:i') }} WIB</span>
            </div>
            <div class="flex justify-between items-center text-sm">
                <span class="text-gray-500">Total Pembayaran</span>
                <span class="font-bold text-gray-900 text-base">Rp{{ number_format($order->total_price, 0, ',', '.') }}</span>
            </div>
            <div class="flex justify-between items-center text-sm">
                <span class="text-gray-500">Status</span>
                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-800">
                    <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                    </svg>
                    Lunas
                </span>
            </div>

            {{-- Items --}}
            @if($order->items->count() > 0)
            <div class="pt-3 border-t border-gray-100 space-y-2">
                @foreach($order->items as $item)
                <div class="flex items-center gap-3">
                    <img
                        src="{{ asset('storage/' . $item->product->thumbnail) }}"
                        alt="{{ $item->product->title }}"
                        class="w-10 h-10 rounded-lg object-cover flex-shrink-0 bg-gray-100"
                        onerror="this.onerror=null;this.src='https://placehold.co/40x40?text=?';"
                    >
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-medium text-gray-800 truncate">{{ $item->product->title }}</p>
                        <p class="text-xs text-gray-400">Qty {{ $item->quantity }}</p>
                    </div>
                    <p class="text-sm font-semibold text-gray-700 whitespace-nowrap">
                        Rp{{ number_format($item->price * $item->quantity, 0, ',', '.') }}
                    </p>
                </div>
                @endforeach
            </div>
            @endif
        </div>
        @endif

        {{-- CTA Buttons --}}
        <div class="flex flex-col sm:flex-row gap-3 justify-center">
            <a
                href="{{ route('purchases') }}"
                class="inline-flex items-center justify-center gap-2 px-6 py-3 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white font-semibold rounded-xl shadow transition-all active:scale-95 transform"
            >
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                </svg>
                Lihat Pesanan & Download
            </a>
            <a
                href="{{ route('products.index') }}"
                class="inline-flex items-center justify-center gap-2 px-6 py-3 bg-white border-2 border-gray-200 hover:border-gray-300 text-gray-700 font-semibold rounded-xl transition-all active:scale-95 transform"
            >
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                </svg>
                Lanjut Belanja
            </a>
        </div>

        {{-- Auto redirect countdown --}}
        <p class="text-xs text-gray-400 mt-6">
            Otomatis ke halaman pesanan dalam <span id="countdown" class="font-semibold text-gray-600">10</span> detik...
        </p>

    </div>
</div>
@endsection

@push('scripts')
<script>
(function () {
    let seconds = 10;
    const el = document.getElementById('countdown');
    if (!el) return;

    const timer = setInterval(function () {
        seconds--;
        el.textContent = seconds;
        if (seconds <= 0) {
            clearInterval(timer);
            window.location.href = '{{ route('purchases') }}';
        }
    }, 1000);
})();
</script>
@endpush
