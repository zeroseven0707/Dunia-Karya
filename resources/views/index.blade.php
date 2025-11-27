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

    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
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

    .animate-on-scroll {
        opacity: 0;
        transform: translateY(30px);
        transition: opacity 0.6s ease-out, transform 0.6s ease-out;
    }

    .animate-on-scroll.animated {
        opacity: 1;
        transform: translateY(0);
    }

    .product-card {
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .product-card:hover {
        transform: translateY(-8px) scale(1.02);
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
    }

    .product-card img {
        transition: transform 0.5s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .product-card:hover img {
        transform: scale(1.1);
    }

    .category-item {
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .category-item:hover {
        transform: translateY(-10px);
    }

    .category-item .category-icon {
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .category-item:hover .category-icon {
        transform: rotate(10deg) scale(1.1);
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }

    .tag-item {
        transition: all 0.3s ease;
    }

    .tag-item:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    }

    .carousel-slide img {
        transition: transform 0.7s ease-out;
    }

    .carousel-slide.active img {
        transform: scale(1.05);
    }

    .stagger-item {
        opacity: 0;
        animation: fadeInUp 0.6s ease-out forwards;
    }

    .stagger-item:nth-child(1) { animation-delay: 0.1s; }
    .stagger-item:nth-child(2) { animation-delay: 0.2s; }
    .stagger-item:nth-child(3) { animation-delay: 0.3s; }
    .stagger-item:nth-child(4) { animation-delay: 0.4s; }
    .stagger-item:nth-child(5) { animation-delay: 0.5s; }
    .stagger-item:nth-child(6) { animation-delay: 0.6s; }
    .stagger-item:nth-child(7) { animation-delay: 0.7s; }
    .stagger-item:nth-child(8) { animation-delay: 0.8s; }
</style>
@endpush
@section('content')
<!-- Carousel Banner -->
<section class="mx-auto max-w-7xl px-5 py-6 select-none animate-on-scroll">
    <div class="relative rounded-lg overflow-hidden shadow-lg group">
        <!-- Grid container for slides -->
        <div id="carousel" class="grid grid-cols-1">
            @foreach ($banners as $index => $banner)
                <!-- Grid item: col-start-1 row-start-1 to stack them -->
                <div class="carousel-slide col-start-1 row-start-1 transition-opacity duration-700 ease-in-out {{ $index === 0 ? 'opacity-100 z-10' : 'opacity-0 z-0' }}">
                    <a href="{{ $banner->url }}" class="block w-full">
                        <img src="{{ asset('storage/' . $banner->path) }}" alt="{{ $banner->alt }}"
                            class="w-full h-auto object-contain rounded-lg shadow-md" />
                    </a>
                </div>
            @endforeach
        </div>

        <!-- Navigation Dots -->
        <div class="absolute bottom-3 left-1/2 -translate-x-1/2 flex gap-2 z-20" role="tablist"
            aria-label="Carousel Navigation">
            @foreach ($banners as $index => $banner)
                <button class="dot w-3 h-3 rounded-full {{ $index === 0 ? 'bg-white' : 'bg-white/50' }} border border-gray-400 focus:outline-none transition-all duration-300 hover:scale-125"
                    data-index="{{ $index }}" aria-label="Slide {{ $index + 1 }}"></button>
            @endforeach
        </div>
    </div>
</section>

<!-- Produk Digital Direkomendasikan -->
<section class="max-w-7xl mx-auto px-5 py-6 animate-on-scroll">
    <h2 class="font-semibold text-xl mb-5">Produk Digital Direkomendasikan</h2>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
        @foreach ($productUp as $product)
            <a href="{{ route('product.show', $product->slug) }}"
                class="product-card bg-white rounded-lg shadow-md overflow-hidden cursor-pointer stagger-item">
                <div class="overflow-hidden">
                    <img src="{{ $product->thumbnail ? asset('storage/' . $product->thumbnail) : 'https://placehold.co/400x225?text=No+Image' }}"
                        alt="{{ $product->title }}" class="rounded-t-lg object-cover w-full h-36 sm:h-44"
                        onerror="this.onerror=null;this.src='https://placehold.co/400x225?text=No+Image';" />
                </div>
                <div class="p-4">
                    <h3 class="text-gray-900 text-sm font-semibold leading-snug truncate" title="{{ $product->title }}">
                        {{ $product->title }}
                    </h3>
                    @if ($product->discount_price && $product->discount_price < $product->price)
                        <p class="mt-2 text-gray-900 font-bold">
                            Rp{{ number_format($product->discount_price, 0, ',', '.') }}
                            <span class="text-gray-500 line-through text-xs ml-2">
                                Rp{{ number_format($product->price, 0, ',', '.') }}
                            </span>
                        </p>
                    @else
                        <p class="mt-2 text-gray-900 font-bold">
                            Rp{{ number_format($product->price, 0, ',', '.') }}
                        </p>
                    @endif
                    <div class="mt-3 pt-3 border-t border-gray-200 flex items-center gap-2 text-xs text-gray-500">
                        <span>{{ $product->category->name ?? 'Uncategorized' }}</span>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
</section>

<!-- Kategori Produk (match Products page) -->
<section class="max-w-7xl mx-auto px-5 py-6">
    <div class="mb-8 animate-fade-in-up" style="animation-delay: 0.2s;">
        <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-2">Kategori Produk</h2>
        <div class="h-1 w-20 bg-gradient-to-r from-blue-600 to-indigo-600 rounded-full"></div>
    </div>

    <div class="scroll-container overflow-x-auto flex space-x-6 pb-4 no-scrollbar">
        <div class="category-card stagger-item flex flex-col items-center min-w-[120px]">
            <div class="category-icon w-28 h-28 bg-gradient-to-br from-blue-600 to-indigo-600 rounded-2xl flex items-center justify-center shadow-lg">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-14 h-14 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 7l-4 4-4-4" />
                </svg>
            </div>
            <span class="mt-3 text-sm font-semibold text-gray-800">Source Code</span>
        </div>

        <div class="category-card stagger-item flex flex-col items-center min-w-[120px]">
            <div class="category-icon w-28 h-28 bg-gradient-to-br from-purple-600 to-pink-600 rounded-2xl flex items-center justify-center shadow-lg">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-14 h-14 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                </svg>
            </div>
            <span class="mt-3 text-sm font-semibold text-gray-800">Ebook</span>
        </div>

        <div class="category-card stagger-item flex flex-col items-center min-w-[120px]">
            <div class="category-icon w-28 h-28 bg-gradient-to-br from-green-600 to-teal-600 rounded-2xl flex items-center justify-center shadow-lg">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-14 h-14 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h4a1 1 0 011 1v7a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM14 5a1 1 0 011-1h4a1 1 0 011 1v7a1 1 0 01-1 1h-4a1 1 0 01-1-1V5zM4 16a1 1 0 011-1h4a1 1 0 011 1v3a1 1 0 01-1 1H5a1 1 0 01-1-1v-3zM14 16a1 1 0 011-1h4a1 1 0 011 1v3a1 1 0 01-1 1h-4a1 1 0 01-1-1v-3z" />
                </svg>
            </div>
            <span class="mt-3 text-sm font-semibold text-gray-800">UI Kit</span>
        </div>

        <div class="category-card stagger-item flex flex-col items-center min-w-[120px]">
            <div class="category-icon w-28 h-28 bg-gradient-to-br from-orange-600 to-red-600 rounded-2xl flex items-center justify-center shadow-lg">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-14 h-14 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 4a2 2 0 114 0v1a1 1 0 001 1h3a1 1 0 011 1v3a1 1 0 01-1 1h-1a2 2 0 100 4h1a1 1 0 011 1v3a1 1 0 01-1 1h-3a1 1 0 01-1-1v-1a2 2 0 10-4 0v1a1 1 0 01-1 1H7a1 1 0 01-1-1v-3a1 1 0 00-1-1H4a2 2 0 110-4h1a1 1 0 001-1V7a1 1 0 011-1h3a1 1 0 001-1V4z" />
                </svg>
            </div>
            <span class="mt-3 text-sm font-semibold text-gray-800">Plugin</span>
        </div>

        <div class="category-card stagger-item flex flex-col items-center min-w-[120px]">
            <div class="category-icon w-28 h-28 bg-gradient-to-br from-cyan-600 to-blue-600 rounded-2xl flex items-center justify-center shadow-lg">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-14 h-14 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 116 0v6a3 3 0 01-3 3z" />
                </svg>
            </div>
            <span class="mt-3 text-sm font-semibold text-gray-800">Voice Over</span>
        </div>

        <div class="category-card stagger-item flex flex-col items-center min-w-[120px]">
            <div class="category-icon w-28 h-28 bg-gradient-to-br from-pink-600 to-rose-600 rounded-2xl flex items-center justify-center shadow-lg">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-14 h-14 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01" />
                </svg>
            </div>
            <span class="mt-3 text-sm font-semibold text-gray-800">Desain Grafis</span>
        </div>

        <div class="category-card stagger-item flex flex-col items-center min-w-[120px]">
            <div class="category-icon w-28 h-28 bg-gradient-to-br from-violet-600 to-purple-600 rounded-2xl flex items-center justify-center shadow-lg">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-14 h-14 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A2 2 0 0122 9.618v4.764A2 2 0 0119.553 16l-4.553-2.276M4 6v12a2 2 0 002 2h8a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2z" />
                </svg>
            </div>
            <span class="mt-3 text-sm font-semibold text-gray-800">Video Editing</span>
        </div>

        <div class="category-card stagger-item flex flex-col items-center min-w-[120px]">
            <div class="category-icon w-28 h-28 bg-gradient-to-br from-indigo-600 to-blue-600 rounded-2xl flex items-center justify-center shadow-lg">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-14 h-14 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
            </div>
            <span class="mt-3 text-sm font-semibold text-gray-800">Template Web</span>
        </div>
    </div>
</section>

<!-- Untuk Bisnis -->
<section class="max-w-7xl mx-auto px-5 py-6 animate-on-scroll">
    <h2 class="font-semibold text-xl mb-5">Untuk Bisnis</h2>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
        @foreach ($productForBussines as $productForBussineses)
            <a href="{{ route('product.show', $productForBussineses->slug) }}" class="product-card bg-white rounded-lg shadow-md overflow-hidden cursor-pointer">
                <div class="overflow-hidden">
                    <img src="{{ $productForBussineses->thumbnail ? asset('storage/' . $productForBussineses->thumbnail) : 'https://placehold.co/400x225?text=No+Image' }}"
                        alt="{{ $productForBussineses->title }}" class="rounded-t-lg object-cover w-full h-36 sm:h-44"
                        onerror="this.onerror=null;this.src='https://placehold.co/400x225?text=No+Image';" />
                </div>
                <div class="p-4">
                    <h3 class="text-gray-900 text-sm font-semibold leading-snug truncate" title="{{ $productForBussineses->title }}">
                        {{ $productForBussineses->title }}
                    </h3>
                    @if ($productForBussineses->discount_price && $productForBussineses->discount_price < $productForBussineses->price)
                        <p class="mt-2 text-gray-900 font-bold">
                            Rp{{ number_format($productForBussineses->discount_price, 0, ',', '.') }}
                            <span class="text-gray-500 line-through text-xs ml-2">
                                Rp{{ number_format($productForBussineses->price, 0, ',', '.') }}
                            </span>
                        </p>
                    @else
                        <p class="mt-2 text-gray-900 font-bold">
                            Rp{{ number_format($productForBussineses->price, 0, ',', '.') }}
                        </p>
                    @endif
                    <div class="mt-3 pt-3 border-t border-gray-200 flex items-center gap-2 text-xs text-gray-500">
                        <span>{{ $productForBussineses->category->name ?? 'Uncategorized' }}</span>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
    @foreach ($banners as $key => $bannerItem)
        @if ($key == 2)
            <img class="mt-7 rounded-xl shadow-md transition-transform duration-500 hover:scale-105 animate-on-scroll"
                src="{{ asset('storage/' . $bannerItem->path) }}" alt="{{ $bannerItem->alt }}">
        @endif
    @endforeach
</section>

<!-- Tags -->
<section aria-label="Kreator Favorit" class="max-w-7xl mx-auto px-5 py-6 animate-on-scroll">
    <h2 class="text-xl font-semibold mb-6 text-slate-800">Tags</h2>
    <nav class="overflow-x-auto no-scrollbar scrollbar-hide fade-left fade-right hover-fade flex space-x-6 py-2 px-1"
        aria-label="Popular creators list">
        <div class="flex flex-wrap gap-3 text-sm">
            @foreach ($tags as $tag)
                <a href="{{ route('tag.show', $tag->slug) }}"
                    class="tag-item px-3 py-1 border rounded-full hover:bg-slate-100 text-slate-700">
                    {{ $tag->name }}
                </a>
            @endforeach
        </div>
    </nav>
</section>

<!-- Admin Panel -->
<section class="max-w-7xl mx-auto px-5 py-6 animate-on-scroll">
    <h2 class="font-semibold text-xl mb-5">Admin Panel</h2>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
        @foreach ($adminPanel as $adminPanels)
            <a href="{{ route('product.show', $adminPanels->slug) }}" class="product-card bg-white rounded-lg shadow-md overflow-hidden cursor-pointer">
                <div class="overflow-hidden">
                    <img src="{{ $adminPanels->thumbnail ? asset('storage/' . $adminPanels->thumbnail) : 'https://placehold.co/400x225?text=No+Image' }}"
                        alt="{{ $adminPanels->title }}" class="rounded-t-lg object-cover w-full h-36 sm:h-44"
                        onerror="this.onerror=null;this.src='https://placehold.co/400x225?text=No+Image';" />
                </div>
                <div class="p-4">
                    <h3 class="text-gray-900 text-sm font-semibold leading-snug truncate" title="{{ $adminPanels->title }}">
                        {{ $adminPanels->title }}
                    </h3>
                    @if ($adminPanels->discount_price && $adminPanels->discount_price < $adminPanels->price)
                        <p class="mt-2 text-gray-900 font-bold">
                            Rp{{ number_format($adminPanels->discount_price, 0, ',', '.') }}
                            <span class="text-gray-500 line-through text-xs ml-2">
                                Rp{{ number_format($adminPanels->price, 0, ',', '.') }}
                            </span>
                        </p>
                    @else
                        <p class="mt-2 text-gray-900 font-bold">
                            Rp{{ number_format($adminPanels->price, 0, ',', '.') }}
                        </p>
                    @endif
                    <div class="mt-3 pt-3 border-t border-gray-200 flex items-center gap-2 text-xs text-gray-500">
                        <span>{{ $adminPanels->category->name ?? 'Uncategorized' }}</span>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
    @foreach ($banners as $key => $bannerItem)
        @if ($key == 1)
            <img class="mt-7 rounded-xl shadow-md transition-transform duration-500 hover:scale-105 animate-on-scroll"
                src="{{ asset('storage/' . $bannerItem->path) }}" alt="{{ $bannerItem->alt }}">
        @endif
    @endforeach
</section>
@endsection
@push('scripts')
    <script>
// Scroll Animation Observer
(function() {
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animated');
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    const elements = document.querySelectorAll('.animate-on-scroll');
    elements.forEach(el => observer.observe(el));

    // Cleanup on cache
    document.addEventListener('turbo:before-cache', () => {
        observer.disconnect();
    }, { once: true });
})();
</script>
@endpush
