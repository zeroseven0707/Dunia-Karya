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
            transform: translateX(-40px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    @keyframes float {
        0%, 100% {
            transform: translateY(0);
        }
        50% {
            transform: translateY(-10px);
        }
    }

    @keyframes scaleIn {
        from {
            opacity: 0;
            transform: scale(0.9);
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

    .category-card {
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        cursor: pointer;
    }

    .category-card:hover {
        transform: translateY(-8px) scale(1.05);
    }

    .category-card:hover .category-icon {
        animation: float 2s ease-in-out infinite;
    }

    .category-icon {
        transition: all 0.3s ease;
    }

    .product-card {
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        overflow: hidden;
    }

    .product-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
        transition: left 0.5s;
    }

    .product-card:hover::before {
        left: 100%;
    }

    .product-card:hover {
        transform: translateY(-12px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
    }

    .product-card img {
        transition: transform 0.5s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .product-card:hover img {
        transform: scale(1.1);
    }

    .stagger-item {
        opacity: 0;
        animation: scaleIn 0.5s ease-out forwards;
    }

    .stagger-item:nth-child(1) { animation-delay: 0.05s; }
    .stagger-item:nth-child(2) { animation-delay: 0.1s; }
    .stagger-item:nth-child(3) { animation-delay: 0.15s; }
    .stagger-item:nth-child(4) { animation-delay: 0.2s; }
    .stagger-item:nth-child(5) { animation-delay: 0.25s; }
    .stagger-item:nth-child(6) { animation-delay: 0.3s; }
    .stagger-item:nth-child(7) { animation-delay: 0.35s; }
    .stagger-item:nth-child(8) { animation-delay: 0.4s; }
    .stagger-item:nth-child(9) { animation-delay: 0.05s; }
    .stagger-item:nth-child(10) { animation-delay: 0.1s; }
    .stagger-item:nth-child(11) { animation-delay: 0.15s; }
    .stagger-item:nth-child(12) { animation-delay: 0.2s; }

    .price-badge {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .discount-badge {
        animation: pulse 2s infinite;
    }

    @keyframes pulse {
        0%, 100% {
            transform: scale(1);
        }
        50% {
            transform: scale(1.05);
        }
    }

    /* Custom scrollbar */
    .no-scrollbar::-webkit-scrollbar {
        display: none;
    }
    .no-scrollbar {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }

    /* Gradient overlay on scroll container */
    .scroll-container {
        position: relative;
    }

    .scroll-container::after {
        content: '';
        position: absolute;
        right: 0;
        top: 0;
        bottom: 0;
        width: 60px;
        background: linear-gradient(to left, white, transparent);
        pointer-events: none;
    }
</style>
@endpush
@section('content')

@section('meta')
<meta name="description" content="Temukan berbagai produk digital berkualitas dari Dunia Karya. Mulai dari template website, desain, tools digital, hingga aset siap pakai untuk kebutuhan bisnismu.">
<meta name="keywords" content="produk digital, template website, aset digital, tools digital, dunia karya, produk online">
<meta name="author" content="Dunia Karya">

<!-- Open Graph -->
<meta property="og:title" content="Produk Digital - Dunia Karya">
<meta property="og:description" content="Jelajahi berbagai produk digital yang siap membantu kebutuhan bisnismu. Praktis, modern, dan mudah digunakan.">
<meta property="og:image" content="{{ asset('img/og/og-banner-produk-digital.png') }}">
<meta property="og:type" content="website">
@endsection
<!-- Kategori Produk Digital -->
<section aria-label="Kategori Produk Digital" class="max-w-7xl mx-auto px-5 py-6 animate-fade-in-up">
    <div class="bg-gradient-to-br from-white to-blue-50 p-8 shadow-xl rounded-2xl border border-blue-100">
        <div class="mb-6 animate-slide-in-left">
            <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-2">Kategori Produk</h2>
            <div class="h-1 w-20 bg-gradient-to-r from-blue-600 to-indigo-600 rounded-full"></div>
        </div>

        <div class="scroll-container overflow-x-auto flex space-x-6 pb-4 no-scrollbar">
            <!-- Source Code -->
            <div class="category-card stagger-item flex flex-col items-center min-w-[120px]">
                <div class="category-icon w-28 h-28 bg-gradient-to-br from-blue-600 to-indigo-600 rounded-2xl flex items-center justify-center shadow-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-14 h-14 text-white" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 9l4-4 4 4m0 7l-4 4-4-4" />
                    </svg>
                </div>
                <span class="mt-3 text-sm font-semibold text-gray-800">Source Code</span>
            </div>

            <!-- Ebook -->
            <div class="category-card stagger-item flex flex-col items-center min-w-[120px]">
                <div class="category-icon w-28 h-28 bg-gradient-to-br from-purple-600 to-pink-600 rounded-2xl flex items-center justify-center shadow-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-14 h-14 text-white" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                </div>
                <span class="mt-3 text-sm font-semibold text-gray-800">Ebook</span>
            </div>

            <!-- UI Kit -->
            <div class="category-card stagger-item flex flex-col items-center min-w-[120px]">
                <div class="category-icon w-28 h-28 bg-gradient-to-br from-green-600 to-teal-600 rounded-2xl flex items-center justify-center shadow-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-14 h-14 text-white" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 5a1 1 0 011-1h4a1 1 0 011 1v7a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM14 5a1 1 0 011-1h4a1 1 0 011 1v7a1 1 0 01-1 1h-4a1 1 0 01-1-1V5zM4 16a1 1 0 011-1h4a1 1 0 011 1v3a1 1 0 01-1 1H5a1 1 0 01-1-1v-3zM14 16a1 1 0 011-1h4a1 1 0 011 1v3a1 1 0 01-1 1h-4a1 1 0 01-1-1v-3z" />
                    </svg>
                </div>
                <span class="mt-3 text-sm font-semibold text-gray-800">UI Kit</span>
            </div>

            <!-- Plugin -->
            <div class="category-card stagger-item flex flex-col items-center min-w-[120px]">
                <div class="category-icon w-28 h-28 bg-gradient-to-br from-orange-600 to-red-600 rounded-2xl flex items-center justify-center shadow-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-14 h-14 text-white" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11 4a2 2 0 114 0v1a1 1 0 001 1h3a1 1 0 011 1v3a1 1 0 01-1 1h-1a2 2 0 100 4h1a1 1 0 011 1v3a1 1 0 01-1 1h-3a1 1 0 01-1-1v-1a2 2 0 10-4 0v1a1 1 0 01-1 1H7a1 1 0 01-1-1v-3a1 1 0 00-1-1H4a2 2 0 110-4h1a1 1 0 001-1V7a1 1 0 011-1h3a1 1 0 001-1V4z" />
                    </svg>
                </div>
                <span class="mt-3 text-sm font-semibold text-gray-800">Plugin</span>
            </div>

            <!-- Voice Over -->
            <div class="category-card stagger-item flex flex-col items-center min-w-[120px]">
                <div class="category-icon w-28 h-28 bg-gradient-to-br from-cyan-600 to-blue-600 rounded-2xl flex items-center justify-center shadow-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-14 h-14 text-white" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 116 0v6a3 3 0 01-3 3z" />
                    </svg>
                </div>
                <span class="mt-3 text-sm font-semibold text-gray-800">Voice Over</span>
            </div>

            <!-- Desain Grafis -->
            <div class="category-card stagger-item flex flex-col items-center min-w-[120px]">
                <div class="category-icon w-28 h-28 bg-gradient-to-br from-pink-600 to-rose-600 rounded-2xl flex items-center justify-center shadow-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-14 h-14 text-white" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01" />
                    </svg>
                </div>
                <span class="mt-3 text-sm font-semibold text-gray-800">Desain Grafis</span>
            </div>

            <!-- Video Editing -->
            <div class="category-card stagger-item flex flex-col items-center min-w-[120px]">
                <div class="category-icon w-28 h-28 bg-gradient-to-br from-violet-600 to-purple-600 rounded-2xl flex items-center justify-center shadow-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-14 h-14 text-white" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 10l4.553-2.276A2 2 0 0122 9.618v4.764A2 2 0 0119.553 16l-4.553-2.276M4 6v12a2 2 0 002 2h8a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2z" />
                    </svg>
                </div>
                <span class="mt-3 text-sm font-semibold text-gray-800">Video Editing</span>
            </div>

            <!-- Template Web -->
            <div class="category-card stagger-item flex flex-col items-center min-w-[120px]">
                <div class="category-icon w-28 h-28 bg-gradient-to-br from-indigo-600 to-blue-600 rounded-2xl flex items-center justify-center shadow-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-14 h-14 text-white" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                </div>
                <span class="mt-3 text-sm font-semibold text-gray-800">Template Web</span>
            </div>
        </div>
    </div>
</section>

<!-- Produk Digital Direkomendasikan -->
<section class="max-w-7xl mx-auto px-5 py-6">
    <div class="mb-8 animate-fade-in-up" style="animation-delay: 0.2s;">
        <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-2">Produk Digital Pilihan</h2>
        <div class="h-1 w-24 bg-gradient-to-r from-blue-600 to-indigo-600 rounded-full"></div>
    </div>

    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @foreach ($products as $product)
            <a href="{{ url("product/{$product->slug}") }}"
                class="product-card stagger-item bg-white rounded-2xl shadow-md hover:shadow-2xl overflow-hidden">

                {{-- Thumbnail --}}
                <div class="relative overflow-hidden h-36 sm:h-44">
                    @if ($product->discount_price && $product->discount_price < $product->price)
                        <div class="absolute top-3 right-3 z-10">
                            <span class="discount-badge bg-gradient-to-r from-red-500 to-pink-500 text-white px-3 py-1 rounded-full text-xs font-bold shadow-lg">
                                -{{ round((($product->price - $product->discount_price) / $product->price) * 100) }}%
                            </span>
                        </div>
                    @endif
                    <img src="{{ $product->thumbnail ? asset('storage/' . $product->thumbnail) : 'https://placehold.co/400x225?text=No+Image' }}"
                        alt="{{ $product->title }}" class="w-full h-full object-cover"
                        loading="lazy"
                        onerror="this.onerror=null;this.src='https://placehold.co/400x225?text=No+Image';" />
                </div>

                <div class="p-4">
                    {{-- Title --}}
                    <h3 class="text-gray-900 text-sm font-bold leading-snug line-clamp-2 min-h-[2.5rem] mb-2"
                        title="{{ $product->title }}">
                        {{ $product->title }}
                    </h3>

                    {{-- Price --}}
                    @if ($product->discount_price && $product->discount_price < $product->price)
                        <div class="flex items-baseline gap-2">
                            <p class="price-badge text-lg font-extrabold">
                                Rp{{ number_format($product->discount_price, 0, ',', '.') }}
                            </p>
                            <span class="text-gray-400 line-through text-xs">
                                Rp{{ number_format($product->price, 0, ',', '.') }}
                            </span>
                        </div>
                    @else
                        <p class="price-badge text-lg font-extrabold">
                            Rp{{ number_format($product->price, 0, ',', '.') }}
                        </p>
                    @endif

                    {{-- Category --}}
                    <div class="mt-3 pt-3 border-t border-gray-100 flex items-center gap-2">
                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                        </svg>
                        <span class="text-xs text-gray-600 font-medium">{{ $product->category->name ?? 'Uncategorized' }}</span>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
</section>
@endsection
@push('scripts')
<script>
// Smooth scroll reveal on load
document.addEventListener('turbo:load', function() {
    // Add intersection observer for scroll animations
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, observerOptions);

    // Observe all product cards
    document.querySelectorAll('.product-card').forEach(el => {
        observer.observe(el);
    });

    document.addEventListener('turbo:before-cache', () => {
        observer.disconnect();
    }, { once: true });
});
</script>
@endpush
