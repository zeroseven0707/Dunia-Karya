@extends('layouts.app')

@section('content')

<style>
    /* Elegant Animations */
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

    @keyframes slideInRight {
        from {
            opacity: 0;
            transform: translateX(30px);
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
        animation: fadeInUp 0.8s ease-out forwards;
        opacity: 0;
    }

    .animate-slide-in-left {
        animation: slideInLeft 0.8s ease-out forwards;
        opacity: 0;
    }

    .animate-slide-in-right {
        animation: slideInRight 0.8s ease-out forwards;
        opacity: 0;
    }

    .contact-card {
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        overflow: hidden;
    }

    .contact-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255,255,255,0.1), transparent);
        transition: left 0.6s;
    }

    .contact-card:hover::before {
        left: 100%;
    }

    .contact-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.08);
    }

    .contact-card .icon-wrapper {
        transition: all 0.4s ease;
    }

    .contact-card:hover .icon-wrapper {
        transform: scale(1.1) rotate(5deg);
    }

    .btn-elegant {
        position: relative;
        overflow: hidden;
        transition: all 0.3s ease;
    }

    .btn-elegant::after {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 0;
        height: 0;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.2);
        transform: translate(-50%, -50%);
        transition: width 0.6s, height 0.6s;
    }

    .btn-elegant:hover::after {
        width: 300px;
        height: 300px;
    }

    .stagger-item {
        opacity: 0;
        animation: scaleIn 0.6s ease-out forwards;
    }

    .stagger-item:nth-child(1) { animation-delay: 0.1s; }
    .stagger-item:nth-child(2) { animation-delay: 0.2s; }
    .stagger-item:nth-child(3) { animation-delay: 0.3s; }

    .gradient-text {
        background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }
</style>

<div class="bg-gradient-to-b from-gray-50 to-white min-h-screen">
    <!-- Hero Section - Elegant & Minimal -->
    <div class="relative bg-white border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-5 py-20 text-center">
            <div class="animate-fade-in-up">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">
                    Hubungi <span class="gradient-text">Kami</span>
                </h1>
                <p class="text-lg md:text-xl text-gray-600 max-w-2xl mx-auto leading-relaxed">
                    Kami siap membantu Anda dengan pertanyaan, dukungan teknis, atau diskusi kemitraan.
                </p>
            </div>
        </div>
    </div>

    <!-- Contact Cards - Elegant Design -->
    <div class="max-w-7xl mx-auto px-5 py-16">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- WhatsApp -->
            <div class="contact-card stagger-item bg-white rounded-2xl shadow-sm hover:shadow-xl p-8 text-center border border-gray-100">
                <div class="icon-wrapper w-20 h-20 bg-gradient-to-br from-green-50 to-emerald-50 text-green-600 rounded-2xl flex items-center justify-center mx-auto mb-6">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.017-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">WhatsApp</h3>
                <p class="text-gray-600 mb-6 text-sm leading-relaxed">Chat langsung dengan tim support untuk respon cepat</p>
                <a href="https://wa.me/6281394454900" target="_blank" class="btn-elegant inline-block w-full bg-gradient-to-r from-green-600 to-emerald-600 text-white font-semibold py-3 px-6 rounded-xl hover:from-green-700 hover:to-emerald-700 transition-all">
                    Chat Sekarang
                </a>
            </div>

            <!-- Email -->
            <div class="contact-card stagger-item bg-white rounded-2xl shadow-sm hover:shadow-xl p-8 text-center border border-gray-100">
                <div class="icon-wrapper w-20 h-20 bg-gradient-to-br from-blue-50 to-indigo-50 text-blue-600 rounded-2xl flex items-center justify-center mx-auto mb-6">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Email Support</h3>
                <p class="text-gray-600 mb-6 text-sm leading-relaxed">Kirimkan pertanyaan detail atau kendala teknis</p>
                <a href="mailto:support@duniakarya.com" class="btn-elegant inline-block w-full bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-semibold py-3 px-6 rounded-xl hover:from-blue-700 hover:to-indigo-700 transition-all">
                    Kirim Email
                </a>
            </div>

            <!-- Help Center -->
            <div class="contact-card stagger-item bg-white rounded-2xl shadow-sm hover:shadow-xl p-8 text-center border border-gray-100">
                <div class="icon-wrapper w-20 h-20 bg-gradient-to-br from-gray-50 to-slate-50 text-gray-700 rounded-2xl flex items-center justify-center mx-auto mb-6">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Pusat Bantuan</h3>
                <p class="text-gray-600 mb-6 text-sm leading-relaxed">Temukan jawaban di FAQ dan panduan lengkap</p>
                <a href="{{ route('faq') }}" class="btn-elegant inline-block w-full bg-gradient-to-r from-gray-700 to-slate-700 text-white font-semibold py-3 px-6 rounded-xl hover:from-gray-800 hover:to-slate-800 transition-all">
                    Lihat FAQ
                </a>
            </div>
        </div>

        <!-- Operating Hours Section - Elegant Layout -->
        <div class="mt-20 animate-fade-in-up" style="animation-delay: 0.4s;">
            <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="grid grid-cols-1 lg:grid-cols-2">
                    <!-- Left Side - Info -->
                    <div class="p-8 md:p-12 lg:p-16">
                        <div class="mb-8">
                            <h2 class="text-3xl font-bold text-gray-900 mb-3">Jam Operasional</h2>
                            <div class="h-1 w-16 bg-gradient-to-r from-blue-600 to-indigo-600 rounded-full"></div>
                        </div>
                        
                        <p class="text-gray-600 mb-10 leading-relaxed">
                            Tim kami siap membantu Anda pada jam kerja berikut. Pesan di luar jam kerja akan dibalas pada hari kerja berikutnya.
                        </p>

                        <div class="space-y-6">
                            <div class="flex items-start gap-5 p-5 bg-gradient-to-br from-blue-50 to-indigo-50 rounded-2xl border border-blue-100">
                                <div class="w-12 h-12 bg-white shadow-sm rounded-xl flex items-center justify-center text-blue-600 flex-shrink-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="font-bold text-gray-900 mb-1">Senin - Jumat</p>
                                    <p class="text-gray-600">09:00 - 17:00 WIB</p>
                                </div>
                            </div>

                            <div class="flex items-start gap-5 p-5 bg-gradient-to-br from-gray-50 to-slate-50 rounded-2xl border border-gray-200">
                                <div class="w-12 h-12 bg-white shadow-sm rounded-xl flex items-center justify-center text-gray-500 flex-shrink-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="font-bold text-gray-900 mb-1">Sabtu - Minggu</p>
                                    <p class="text-gray-600">Libur (Slow Response)</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Right Side - Visual -->
                    <div class="relative h-64 lg:h-full min-h-[400px] bg-gradient-to-br from-blue-600 to-indigo-600">
                        <div class="absolute inset-0 flex items-center justify-center p-12">
                            <div class="text-center text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-24 w-24 mx-auto mb-6 opacity-90" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                <h3 class="text-2xl font-bold mb-2">Dunia Karya</h3>
                                <p class="text-blue-100">Toko Online Produk Digital</p>
                            </div>
                        </div>
                        <!-- Decorative Elements -->
                        <div class="absolute top-10 right-10 w-32 h-32 bg-white opacity-5 rounded-full blur-2xl"></div>
                        <div class="absolute bottom-10 left-10 w-40 h-40 bg-white opacity-5 rounded-full blur-3xl"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Additional CTA Section -->
        <div class="mt-16 text-center animate-fade-in-up" style="animation-delay: 0.6s;">
            <div class="bg-gradient-to-r from-gray-50 to-slate-50 rounded-3xl p-12 border border-gray-100">
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Butuh Bantuan Segera?</h3>
                <p class="text-gray-600 mb-8 max-w-2xl mx-auto">
                    Tim support kami siap membantu Anda melalui WhatsApp untuk respon tercepat
                </p>
                <a href="https://wa.me/6281394454900" target="_blank" class="btn-elegant inline-flex items-center gap-3 bg-gradient-to-r from-green-600 to-emerald-600 text-white font-semibold py-4 px-8 rounded-xl hover:from-green-700 hover:to-emerald-700 transition-all shadow-lg hover:shadow-xl">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.017-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
                    </svg>
                    Hubungi via WhatsApp
                </a>
            </div>
        </div>
    </div>
</div>

@endsection
