@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-5 py-12">
    <h1 class="text-3xl font-bold mb-8 text-center">Pertanyaan yang Sering Diajukan (FAQ)</h1>
    
    <div class="space-y-4 max-w-3xl mx-auto">
        <!-- FAQ Item 1 -->
        <div class="border rounded-lg p-4 shadow-sm" x-data="{ open: false }">
            <button @click="open = !open" class="flex justify-between w-full font-semibold text-left">
                <span>Bagaimana cara membeli produk?</span>
                <svg :class="{'rotate-180': open}" class="w-5 h-5 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </button>
            <div x-show="open" class="mt-3 text-gray-600" style="display: none;">
                <p>Pilih produk yang Anda inginkan, klik tombol beli, dan ikuti instruksi pembayaran yang tersedia.</p>
            </div>
        </div>

        <!-- FAQ Item 2 -->
        <div class="border rounded-lg p-4 shadow-sm" x-data="{ open: false }">
            <button @click="open = !open" class="flex justify-between w-full font-semibold text-left">
                <span>Apakah ada garansi uang kembali?</span>
                <svg :class="{'rotate-180': open}" class="w-5 h-5 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </button>
            <div x-show="open" class="mt-3 text-gray-600" style="display: none;">
                <p>Kami memberikan garansi uang kembali jika produk tidak berfungsi sesuai deskripsi dalam waktu 7 hari.</p>
            </div>
        </div>

        <!-- FAQ Item 3 -->
        <div class="border rounded-lg p-4 shadow-sm" x-data="{ open: false }">
            <button @click="open = !open" class="flex justify-between w-full font-semibold text-left">
                <span>Metode pembayaran apa saja yang tersedia?</span>
                <svg :class="{'rotate-180': open}" class="w-5 h-5 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </button>
            <div x-show="open" class="mt-3 text-gray-600" style="display: none;">
                <p>Kami menerima transfer bank, e-wallet (GoPay, OVO, Dana), dan kartu kredit.</p>
            </div>
        </div>
    </div>
</div>
@endsection
