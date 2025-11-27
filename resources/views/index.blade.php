@extends('layouts.app')
@section('content')

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

<!-- Kategori Produk Digital -->
<section aria-label="Kategori Produk Digital" class="max-w-7xl mx-auto px-5 py-6 animate-on-scroll">
    <div class="bg-white p-8 shadow-md rounded-lg">
        <h2 class="text-xl font-semibold mb-4 text-slate-800">Kategori Produk Digital</h2>
        <div class="overflow-x-auto flex space-x-4 pb-4 gap-10 no-scrollbar">
            <a href="{{ route('category.show', 'source-code') }}" class="category-item flex flex-col items-center group">
                <div class="category-icon w-24 h-24 bg-gray-600 rounded-lg flex items-center justify-center shadow-md">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 7l-4 4-4-4" />
                    </svg>
                </div>
                <span class="mt-2 text-sm font-medium text-gray-700 group-hover:text-gray-900 transition-colors">Source Code</span>
            </a>

            <a href="{{ route('category.show', 'ebook') }}" class="category-item flex flex-col items-center group">
                <div class="category-icon w-24 h-24 bg-gray-600 rounded-lg flex items-center justify-center shadow-md">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 20h9M3 4h18M3 8h18M3 12h18M3 16h18" />
                    </svg>
                </div>
                <span class="mt-2 text-sm font-medium text-gray-700 group-hover:text-gray-900 transition-colors">Ebook</span>
            </a>

            <a href="{{ route('category.show', 'ui-kit') }}" class="category-item flex flex-col items-center group">
                <div class="category-icon w-24 h-24 bg-gray-600 rounded-lg flex items-center justify-center shadow-md">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <rect x="4" y="4" width="16" height="16" rx="2" ry="2" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8h16M8 4v16" />
                    </svg>
                </div>
                <span class="mt-2 text-sm font-medium text-gray-700 group-hover:text-gray-900 transition-colors">UI Kit</span>
            </a>

            <a href="{{ route('category.show', 'plugin') }}" class="category-item flex flex-col items-center group">
                <div class="category-icon w-24 h-24 bg-gray-600 rounded-lg flex items-center justify-center shadow-md">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <circle cx="12" cy="12" r="4" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 2v4m0 12v4m10-10h-4m-12 0H2m15.07 6.93l-2.83-2.83M7.76 7.76l-2.83-2.83m0 11.31l2.83-2.83m11.31 0l-2.83 2.83" />
                    </svg>
                </div>
                <span class="mt-2 text-sm font-medium text-gray-700 group-hover:text-gray-900 transition-colors">Plugin</span>
            </a>

            <a href="{{ route('category.show', 'voice-over') }}" class="category-item flex flex-col items-center group">
                <div class="category-icon w-24 h-24 bg-gray-600 rounded-lg flex items-center justify-center shadow-md">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A2 2 0 0122 9.618v4.764a2 2 0 01-2.447 1.894L15 14m-6 0l-4.553 2.276A2 2 0 014 14.382V9.618a2 2 0 012.447-1.894L9 10m6 0V4m0 6l-6 4" />
                    </svg>
                </div>
                <span class="mt-2 text-sm font-medium text-gray-700 group-hover:text-gray-900 transition-colors">Voice Over</span>
            </a>

            <a href="{{ route('category.show', 'desain-grafis') }}" class="category-item flex flex-col items-center group">
                <div class="category-icon w-24 h-24 bg-gray-600 rounded-lg flex items-center justify-center shadow-md">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <rect x="3" y="3" width="18" height="18" rx="2" ry="2" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9l9 6 9-6M3 15l9 6 9-6" />
                    </svg>
                </div>
                <span class="mt-2 text-sm font-medium text-gray-700 group-hover:text-gray-900 transition-colors">Desain Grafis</span>
            </a>

            <a href="{{ route('category.show', 'video-editing') }}" class="category-item flex flex-col items-center group">
                <div class="category-icon w-24 h-24 bg-gray-600 rounded-lg flex items-center justify-center shadow-md">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A2 2 0 0122 9.618v4.764A2 2 0 0119.553 16l-4.553-2.276M4 6v12a2 2 0 002 2h8a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2z" />
                    </svg>
                </div>
                <span class="mt-2 text-sm font-medium text-gray-700 group-hover:text-gray-900 transition-colors">Video Editing</span>
            </a>

            <a href="{{ route('category.show', 'template-web') }}" class="category-item flex flex-col items-center group">
                <div class="category-icon w-24 h-24 bg-gray-600 rounded-lg flex items-center justify-center shadow-md">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4h16v16H4V4zM4 12h16M12 4v16" />
                    </svg>
                </div>
                <span class="mt-2 text-sm font-medium text-gray-700 group-hover:text-gray-900 transition-colors">Template Web</span>
            </a>
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

@endsection
