@extends('layouts.app')
@push('styles')
    <style>
    /* Smooth Animations */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes slideInLeft {
        from {
            opacity: 0;
            transform: translateX(-30px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    @keyframes scaleIn {
        from {
            opacity: 0;
            transform: scale(0.95);
        }
        to {
            opacity: 1;
            transform: scale(1);
        }
    }

    .animate-fade-in-up {
        animation: fadeInUp 0.6s ease-out forwards;
        opacity: 0;
    }

    .animate-slide-in-left {
        animation: slideInLeft 0.6s ease-out forwards;
        opacity: 0;
    }

    .faq-item {
        opacity: 0;
        animation: scaleIn 0.5s ease-out forwards;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .faq-item:nth-child(1) { animation-delay: 0.1s; }
    .faq-item:nth-child(2) { animation-delay: 0.15s; }
    .faq-item:nth-child(3) { animation-delay: 0.2s; }
    .faq-item:nth-child(4) { animation-delay: 0.25s; }
    .faq-item:nth-child(5) { animation-delay: 0.3s; }
    .faq-item:nth-child(6) { animation-delay: 0.35s; }

    .faq-item:hover {
        transform: translateY(-4px);
        box-shadow: 0 12px 24px rgba(0, 0, 0, 0.1);
    }

    .faq-answer {
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .faq-answer.open {
        max-height: 1000px;
    }
</style>
@endpush
@section('content')
@section('meta')
<meta name="description" content="Temukan jawaban atas pertanyaan umum seputar produk digital, pembayaran, dan layanan Dunia Karya.">
<meta name="keywords" content="faq, pertanyaan umum, bantuan dunia karya">
<meta name="author" content="Dunia Karya">

<meta property="og:title" content="FAQ - Dunia Karya">
<meta property="og:description" content="Pertanyaan umum dan jawabannya mengenai layanan Dunia Karya.">
<meta property="og:image" content="{{ asset('img/og/og-banner-faq.png') }}">
@endsection

<div class="bg-gradient-to-b from-gray-50 to-white min-h-screen">
    <!-- Hero Section -->
    <div class="relative bg-white border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-5 py-20 text-center">
            <div class="animate-fade-in-up">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">
                    Pertanyaan yang <span class="bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent">Sering Diajukan</span>
                </h1>
                <p class="text-lg md:text-xl text-gray-600 max-w-2xl mx-auto leading-relaxed">
                    Temukan jawaban atas pertanyaan umum seputar pembelian, pembayaran, dan penggunaan produk digital kami.
                </p>
            </div>
        </div>
    </div>

    <div class="max-w-4xl mx-auto px-5 py-16">
        <!-- FAQ Items -->
        <div class="space-y-4 mb-12">
            <div class="faq-item bg-white rounded-2xl shadow-sm hover:shadow-lg border border-gray-100" x-data="{ open: false }">
                <button @click="open = !open" class="flex justify-between w-full p-6 font-semibold text-left items-start">
                    <span class="pr-4 text-gray-900">Apakah saya harus membuat akun untuk membeli produk?</span>
                    <svg :class="{'rotate-180': open}" class="w-5 h-5 transition-transform flex-shrink-0 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div x-show="open" x-transition class="px-6 pb-6 text-gray-600 leading-relaxed" style="display: none;">
                    <p>Ya, Anda harus membuat akun dan login terlebih dahulu untuk melakukan pembelian. Hal ini diperlukan agar:</p>
                    <ul class="list-disc ml-5 mt-2 space-y-1">
                        <li>Kami dapat menyimpan riwayat pembelian Anda</li>
                        <li>Anda dapat mengakses produk yang telah dibeli kapan saja</li>
                        <li>Kami dapat memberikan notifikasi terkait pesanan Anda</li>
                        <li>Keamanan transaksi terjaga dengan baik</li>
                    </ul>
                    <p class="mt-2">Pendaftaran akun gratis dan hanya membutuhkan waktu kurang dari 1 menit!</p>
                </div>
            </div>

            <div class="faq-item bg-white rounded-2xl shadow-sm hover:shadow-lg border border-gray-100" x-data="{ open: false }">
                <button @click="open = !open" class="flex justify-between w-full p-6 font-semibold text-left items-start">
                    <span class="pr-4 text-gray-900">Bagaimana cara mengakses produk yang sudah saya beli?</span>
                    <svg :class="{'rotate-180': open}" class="w-5 h-5 transition-transform flex-shrink-0 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div x-show="open" x-transition class="px-6 pb-6 text-gray-600 leading-relaxed" style="display: none;">
                    <p>Setelah pembayaran berhasil, Anda dapat mengakses produk dengan cara:</p>
                    <ol class="list-decimal ml-5 mt-2 space-y-1">
                        <li>Login ke akun Anda</li>
                        <li>Klik menu "Pembelian Saya" di profil Anda</li>
                        <li>Pilih produk yang ingin diakses</li>
                        <li>Klik tombol "Akses Produk" untuk membuka link/download produk</li>
                    </ol>
                    <p class="mt-2">Produk dapat diakses selamanya tanpa batas waktu.</p>
                </div>
            </div>

            <div class="faq-item bg-white rounded-2xl shadow-sm hover:shadow-lg border border-gray-100" x-data="{ open: false }">
                <button @click="open = !open" class="flex justify-between w-full p-6 font-semibold text-left items-start">
                    <span class="pr-4 text-gray-900">Apakah produk yang dibeli memiliki batas waktu akses?</span>
                    <svg :class="{'rotate-180': open}" class="w-5 h-5 transition-transform flex-shrink-0 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div x-show="open" x-transition class="px-6 pb-6 text-gray-600 leading-relaxed" style="display: none;">
                    <p>Tidak ada batas waktu! Setelah Anda membeli produk, Anda memiliki akses selamanya. Anda dapat mengunduh atau mengakses produk kapan saja melalui halaman "Pembelian Saya".</p>
                </div>
            </div>

            <div class="faq-item bg-white rounded-2xl shadow-sm hover:shadow-lg border border-gray-100" x-data="{ open: false }">
                <button @click="open = !open" class="flex justify-between w-full p-6 font-semibold text-left items-start">
                    <span class="pr-4 text-gray-900">Bagaimana cara menghubungi customer support?</span>
                    <svg :class="{'rotate-180': open}" class="w-5 h-5 transition-transform flex-shrink-0 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div x-show="open" x-transition class="px-6 pb-6 text-gray-600 leading-relaxed" style="display: none;">
                    <p>Anda dapat menghubungi tim support kami melalui:</p>
                    <ul class="list-disc ml-5 mt-2 space-y-1">
                        <li><strong>WhatsApp:</strong> +62 813 9445 4900 (Respon cepat, jam kerja)</li>
                        <li><strong>Email:</strong> support@duniakarya.com (Respon dalam 1x24 jam)</li>
                    </ul>
                    <p class="mt-2"><strong>Jam Operasional:</strong> Senin - Jumat, 09:00 - 17:00 WIB</p>
                </div>
            </div>

            <div class="faq-item bg-white rounded-2xl shadow-sm hover:shadow-lg border border-gray-100" x-data="{ open: false }">
                <button @click="open = !open" class="flex justify-between w-full p-6 font-semibold text-left items-start">
                    <span class="pr-4 text-gray-900">Apakah ada support teknis untuk instalasi produk?</span>
                    <svg :class="{'rotate-180': open}" class="w-5 h-5 transition-transform flex-shrink-0 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div x-show="open" x-transition class="px-6 pb-6 text-gray-600 leading-relaxed" style="display: none;">
                    <p>Ya, kami menyediakan support teknis gratis untuk semua pembeli. Tim kami siap membantu Anda dengan:</p>
                    <ul class="list-disc ml-5 mt-2 space-y-1">
                        <li>Panduan instalasi dan konfigurasi</li>
                        <li>Troubleshooting masalah teknis</li>
                        <li>Konsultasi penggunaan fitur</li>
                        <li>Customisasi dasar (untuk produk tertentu)</li>
                    </ul>
                </div>
            </div>

            <div class="faq-item bg-white rounded-2xl shadow-sm hover:shadow-lg border border-gray-100" x-data="{ open: false }">
                <button @click="open = !open" class="flex justify-between w-full p-6 font-semibold text-left items-start">
                    <span class="pr-4 text-gray-900">Apakah saya bisa request fitur khusus atau custom?</span>
                    <svg :class="{'rotate-180': open}" class="w-5 h-5 transition-transform flex-shrink-0 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div x-show="open" x-transition class="px-6 pb-6 text-gray-600 leading-relaxed" style="display: none;">
                    <p>Tentu! Kami menerima request untuk customisasi produk atau pembuatan produk khusus sesuai kebutuhan Anda. Silakan hubungi tim kami melalui WhatsApp atau email untuk mendiskusikan kebutuhan dan mendapatkan penawaran harga.</p>
                </div>
            </div>
        </div>

        <!-- CTA Section -->
        <div class="animate-fade-in-up bg-gradient-to-r from-gray-50 to-slate-50 rounded-3xl p-12 text-center border border-gray-100" style="animation-delay: 0.4s;">
            <h3 class="text-2xl font-bold text-gray-900 mb-3">Masih Ada Pertanyaan?</h3>
            <p class="mb-8 text-gray-600">Tim support kami siap membantu Anda!</p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="https://wa.me/6281394454900" target="_blank" class="inline-flex items-center justify-center gap-2 bg-gradient-to-r from-green-600 to-emerald-600 text-white font-semibold px-8 py-4 rounded-xl hover:from-green-700 hover:to-emerald-700 transition-all shadow-lg hover:shadow-xl">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.017-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
                    </svg>
                    Chat via WhatsApp
                </a>
                <a href="mailto:support@duniakarya.com" class="inline-flex items-center justify-center gap-2 bg-white text-gray-700 font-semibold px-8 py-4 rounded-xl hover:bg-gray-50 transition-all border-2 border-gray-200 hover:border-gray-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                    Kirim Email
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
