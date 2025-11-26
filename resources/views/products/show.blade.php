@extends('layouts.app')

@section('content')

<style>
    /* Modern Animations */
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

    @keyframes pulse {
        0%, 100% {
            transform: scale(1);
        }
        50% {
            transform: scale(1.05);
        }
    }

    @keyframes shake {
        0%, 100% {
            transform: translateX(0);
        }
        25% {
            transform: translateX(-5px);
        }
        75% {
            transform: translateX(5px);
        }
    }

    @keyframes cartBounce {
        0%, 100% {
            transform: scale(1);
        }
        50% {
            transform: scale(1.2);
        }
    }

    .animate-fade-in-up {
        animation: fadeInUp 0.6s ease-out forwards;
    }

    .animate-slide-left {
        animation: slideInLeft 0.6s ease-out forwards;
    }

    .animate-slide-right {
        animation: slideInRight 0.6s ease-out forwards;
    }

    .product-image-wrapper {
        position: relative;
        overflow: hidden;
        border-radius: 1rem;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .product-image-wrapper:hover {
        transform: scale(1.02);
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
    }

    .product-image-wrapper img {
        transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .product-image-wrapper:hover img {
        transform: scale(1.1);
    }

    .action-button {
        position: relative;
        overflow: hidden;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .action-button:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.2);
    }

    .action-button::before {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 0;
        height: 0;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.3);
        transform: translate(-50%, -50%);
        transition: width 0.6s, height 0.6s;
    }

    .action-button:hover::before {
        width: 300px;
        height: 300px;
    }

    .share-button {
        position: relative;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .share-button:hover {
        transform: translateY(-4px) scale(1.1);
    }

    .share-button svg {
        transition: transform 0.3s ease;
    }

    .share-button:hover svg {
        transform: rotate(10deg);
    }

    .related-card {
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        overflow: hidden;
    }

    .related-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.15);
    }

    .related-card img {
        transition: transform 0.5s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .related-card:hover img {
        transform: scale(1.15);
    }

    .badge-discount {
        animation: pulse 2s infinite;
    }

    .gradient-text {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .glass-effect {
        background: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.2);
    }

    .stagger-item {
        opacity: 0;
        animation: fadeInUp 0.6s ease-out forwards;
    }

    .stagger-item:nth-child(1) { animation-delay: 0.1s; }
    .stagger-item:nth-child(2) { animation-delay: 0.2s; }
    .stagger-item:nth-child(3) { animation-delay: 0.3s; }
    .stagger-item:nth-child(4) { animation-delay: 0.4s; }

    /* Flying Cart Animation */
    .flying-cart {
        position: fixed;
        z-index: 9999;
        pointer-events: none;
        /* Animation will be added dynamically by JavaScript */
    }

    .cart-shake {
        animation: shake 0.5s ease-in-out;
    }

    .cart-bounce {
        animation: cartBounce 0.5s ease-in-out;
    }
</style>

<!-- Main content -->
<section class="mx-auto max-w-7xl px-5 py-8 md:py-12">
    <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 md:gap-12 p-6 md:p-10">
            
            <!-- Product Image -->
            <div class="animate-slide-left">
                <div class="product-image-wrapper">
                    @if ($product->discount_price && $product->discount_price < $product->price)
                        <div class="absolute top-4 right-4 z-10">
                            <span class="badge-discount bg-gradient-to-r from-red-500 to-pink-500 text-white px-4 py-2 rounded-full text-sm font-bold shadow-lg">
                                DISKON {{ round((($product->price - $product->discount_price) / $product->price) * 100) }}%
                            </span>
                        </div>
                    @endif
                    <img id="main-product-image" 
                        src="{{ asset('storage/' . $product->thumbnail) }}"
                        alt="Thumbnail {{ $product->title }}" 
                        class="w-full h-full object-cover rounded-xl" 
                        loading="lazy"
                        onerror="this.onerror=null;this.src='https://placehold.co/600x400?text=No+Image';" />
                </div>

                <!-- Category Badge -->
                <div class="mt-4 flex items-center gap-3">
                    <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-medium bg-gradient-to-r from-blue-50 to-indigo-50 text-blue-700 border border-blue-200">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                        </svg>
                        {{ $product->category->name ?? 'Produk Digital' }}
                    </span>
                </div>
            </div>

            <!-- Product Info -->
            <div class="flex flex-col justify-between animate-slide-right">
                <div>
                    <h1 class="text-3xl md:text-4xl font-extrabold mb-4 text-gray-900 leading-tight">
                        {{ $product->title }}
                    </h1>

                    <!-- Price Section -->
                    <div class="mb-6 p-5 bg-gradient-to-r from-blue-50 to-indigo-50 rounded-xl border border-blue-100">
                        <div class="flex items-baseline gap-3">
                            <span class="text-4xl font-extrabold gradient-text">
                                Rp{{ number_format($product->discount_price ?? $product->price, 0, ',', '.') }}
                            </span>
                            @if ($product->discount_price)
                                <span class="line-through text-gray-400 text-xl font-medium">
                                    Rp{{ number_format($product->price, 0, ',', '.') }}
                                </span>
                            @endif
                        </div>
                        <p class="text-sm text-gray-600 mt-2">Harga sudah termasuk semua fitur</p>
                    </div>

                    <!-- Description -->
                    <div class="prose prose-sm md:prose-base max-w-none mb-8">
                        <h3 class="text-lg font-semibold text-gray-900 mb-3">Deskripsi Produk</h3>
                        <div class="text-gray-700 leading-relaxed">
                            {!! $product->description !!}
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="space-y-4">
                    <!-- Primary Action: Buy Now -->
                    <form action="{{ route('cart.add', $product->id) }}" method="POST">
                        @csrf
                        <input type="hidden" name="redirect_checkout" value="1">
                        <button type="submit" formaction="{{ route('cart.add', ['productId' => $product->id, 'checkout' => 1]) }}"
                            class="action-button w-full bg-gradient-to-r from-blue-600 to-indigo-600 text-white py-4 rounded-xl text-lg font-bold hover:from-blue-700 hover:to-indigo-700 shadow-lg relative overflow-hidden">
                            <span class="relative z-10 flex items-center justify-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                </svg>
                                Beli Sekarang
                            </span>
                        </button>
                    </form>
                    
                    <!-- Secondary Actions: Cart & Demo -->
                    <div class="flex gap-3">
                        <!-- Add to Cart - Icon Only -->
                        <form action="{{ route('cart.add', $product->id) }}" method="POST" class="flex-shrink-0" id="add-to-cart-form">
                            @csrf
                            <button type="button" id="cart-button" title="Tambahkan ke Keranjang"
                                class="action-button border-2 border-blue-600 text-blue-600 p-4 rounded-xl hover:bg-blue-50 transition-all relative overflow-hidden group">
                                <svg class="w-6 h-6 relative z-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                </svg>
                            </button>
                        </form>

                        <!-- Demo Button - Text Only -->
                        @if ($product->demo_url)
                            <a href="{{ $product->demo_url }}" target="_blank"
                                class="action-button flex-1 block text-center bg-gray-100 text-gray-700 py-4 px-6 rounded-xl text-lg font-semibold hover:bg-gray-200 border-2 border-gray-300 hover:border-gray-400 transition-all">
                                <span class="relative z-10">Demo</span>
                            </a>
                        @endif
                    </div>
                </div>

                <!-- Share Section -->
                <div class="mt-8 p-5 glass-effect rounded-xl">
                    <h4 class="font-bold text-gray-900 mb-4 flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"></path>
                        </svg>
                        Bagikan Produk
                    </h4>
                    <div class="flex gap-3 flex-wrap">
                        <!-- Facebook -->
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}"
                            target="_blank"
                            class="share-button bg-blue-600 text-white p-3 rounded-lg hover:bg-blue-700 shadow-md">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M22 12c0-5.522-4.477-10-10-10S2 6.478 2 12c0 4.991 3.657 9.128 8.438 9.879v-6.988H7.898v-2.89h2.54V9.845c0-2.507 1.492-3.89 3.777-3.89 1.094 0 2.238.196 2.238.196v2.46h-1.26c-1.242 0-1.63.772-1.63 1.562v1.875h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" />
                            </svg>
                        </a>

                        <!-- X (Twitter) -->
                        <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}&text={{ urlencode($product->title) }}"
                            target="_blank"
                            class="share-button bg-black text-white p-3 rounded-lg hover:bg-gray-800 shadow-md">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M23 3a10.9 10.9 0 01-3.14 1.53A4.48 4.48 0 0022.4 1s-1.7 1-2.1 1.7a4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z" />
                            </svg>
                        </a>

                        <!-- WhatsApp -->
                        <a href="https://wa.me/?text={{ urlencode($product->title . ' ' . request()->fullUrl()) }}"
                            target="_blank"
                            class="share-button bg-green-500 text-white p-3 rounded-lg hover:bg-green-600 shadow-md">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M20.52 3.48A11.95 11.95 0 0012 0C5.37 0 .07 5.33.07 11.95c0 2.11.55 4.16 1.6 5.97L0 24l6.34-1.65A11.95 11.95 0 0012 24c6.63 0 11.95-5.37 11.95-12a11.94 11.94 0 00-3.43-8.52zm-8.44 17.07a9.59 9.59 0 01-5.12-1.44l-.37-.22-3.75.97.99-3.65-.24-.38a9.51 9.51 0 0115.06-11.93 9.51 9.51 0 01-5.57 16.05zm5.16-7.35c-.28-.14-1.66-.82-1.92-.91-.25-.1-.44-.14-.63.14-.19.28-.74.91-.91 1.1-.17.19-.34.21-.63.07-.28-.14-1.18-.44-2.24-1.39-.83-.74-1.39-1.66-1.56-1.94-.16-.28-.02-.43.13-.57.13-.12.28-.32.42-.48.14-.16.19-.28.28-.46.09-.19.05-.35-.02-.49-.07-.14-.63-1.51-.86-2.08-.23-.54-.46-.46-.63-.47l-.54-.01c-.18 0-.48.07-.73.35s-.96.94-.96 2.29c0 1.35.98 2.66 1.12 2.85.14.19 1.92 2.93 4.65 4.11.65.28 1.16.45 1.56.58.65.19 1.24.16 1.7.1.52-.07 1.66-.68 1.9-1.34.24-.66.24-1.23.17-1.35-.07-.11-.26-.18-.54-.32z" />
                            </svg>
                        </a>

                        <!-- Copy Link -->
                        <button
                            onclick="navigator.clipboard.writeText('{{ request()->fullUrl() }}'); this.innerHTML = '✓ Tersalin!'; setTimeout(() => this.innerHTML = '<svg xmlns=\'http://www.w3.org/2000/svg\' class=\'h-5 w-5\' fill=\'currentColor\' viewBox=\'0 0 24 24\'><path d=\'M12 2.2c3.2 0 3.584.012 4.85.07 1.17.055 1.98.24 2.44.4a4.92 4.92 0 011.78 1.02c.51.51.85 1.13 1.02 1.78.16.46.34 1.27.39 2.44.06 1.27.07 1.65.07 4.85s-.012 3.584-.07 4.85c-.055 1.17-.24 1.98-.4 2.44a4.92 4.92 0 01-1.02 1.78 4.92 4.92 0 01-1.78 1.02c-.46.16-1.27.34-2.44.39-1.27.06-1.65.07-4.85.07s-3.584-.012-4.85-.07c-1.17-.055-1.98-.24-2.44-.4a4.92 4.92 0 01-1.78-1.02 4.92 4.92 0 01-1.02-1.78c-.16-.46-.34-1.27-.39-2.44C2.212 15.584 2.2 15.2 2.2 12s.012-3.584.07-4.85c.055-1.17.24-1.98.4-2.44a4.92 4.92 0 011.02-1.78 4.92 4.92 0 011.78-1.02c.46-.16 1.27-.34 2.44-.39C8.416 2.212 8.8 2.2 12 2.2zm0-2.2C8.737 0 8.332.013 7.052.072c-1.28.06-2.15.27-2.91.57a7.12 7.12 0 00-2.59 1.66 7.12 7.12 0 00-1.66 2.59c-.3.76-.51 1.63-.57 2.91C.013 8.332 0 8.737 0 12c0 3.263.013 3.668.072 4.948.06 1.28.27 2.15.57 2.91a7.12 7.12 0 001.66 2.59 7.12 7.12 0 002.59 1.66c.76.3 1.63.51 2.91.57 1.28.06 1.683.072 4.948.072s3.668-.013 4.948-.072c1.28-.06 2.15-.27 2.91-.57a7.12 7.12 0 002.59-1.66 7.12 7.12 0 001.66-2.59c.3-.76.51-1.63.57-2.91.06-1.28.072-1.683.072-4.948s-.013-3.668-.072-4.948c-.06-1.28-.27-2.15-.57-2.91a7.12 7.12 0 00-1.66-2.59 7.12 7.12 0 00-2.59-1.66c-.76-.3-1.63-.51-2.91-.57C15.668.013 15.263 0 12 0z\'/><path d=\'M12 5.838a6.162 6.162 0 106.162 6.162A6.162 6.162 0 0012 5.838zm0 10.162a4 4 0 114-4 4 4 0 01-4 4zm6.406-11.845a1.44 1.44 0 11-1.44-1.44 1.44 1.44 0 011.44 1.44z\'/></svg>', 2000);"
                            class="share-button bg-gradient-to-r from-pink-500 to-rose-500 text-white p-3 rounded-lg hover:from-pink-600 hover:to-rose-600 shadow-md">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2.2c3.2 0 3.584.012 4.85.07 1.17.055 1.98.24 2.44.4a4.92 4.92 0 011.78 1.02c.51.51.85 1.13 1.02 1.78.16.46.34 1.27.39 2.44.06 1.27.07 1.65.07 4.85s-.012 3.584-.07 4.85c-.055 1.17-.24 1.98-.4 2.44a4.92 4.92 0 01-1.02 1.78 4.92 4.92 0 01-1.78 1.02c-.46.16-1.27.34-2.44.39-1.27.06-1.65.07-4.85.07s-3.584-.012-4.85-.07c-1.17-.055-1.98-.24-2.44-.4a4.92 4.92 0 01-1.78-1.02 4.92 4.92 0 01-1.02-1.78c-.16-.46-.34-1.27-.39-2.44C2.212 15.584 2.2 15.2 2.2 12s.012-3.584.07-4.85c.055-1.17.24-1.98.4-2.44a4.92 4.92 0 011.02-1.78 4.92 4.92 0 011.78-1.02c.46-.16 1.27-.34 2.44-.39C8.416 2.212 8.8 2.2 12 2.2zm0-2.2C8.737 0 8.332.013 7.052.072c-1.28.06-2.15.27-2.91.57a7.12 7.12 0 00-2.59 1.66 7.12 7.12 0 00-1.66 2.59c-.3.76-.51 1.63-.57 2.91C.013 8.332 0 8.737 0 12c0 3.263.013 3.668.072 4.948.06 1.28.27 2.15.57 2.91a7.12 7.12 0 001.66 2.59 7.12 7.12 0 002.59 1.66c.76.3 1.63.51 2.91.57 1.28.06 1.683.072 4.948.072s3.668-.013 4.948-.072c1.28-.06 2.15-.27 2.91-.57a7.12 7.12 0 002.59-1.66 7.12 7.12 0 001.66-2.59c.3-.76.51-1.63.57-2.91.06-1.28.072-1.683.072-4.948s-.013-3.668-.072-4.948c-.06-1.28-.27-2.15-.57-2.91a7.12 7.12 0 00-1.66-2.59 7.12 7.12 0 00-2.59-1.66c-.76-.3-1.63-.51-2.91-.57C15.668.013 15.263 0 12 0z"/>
                                <path d="M12 5.838a6.162 6.162 0 106.162 6.162A6.162 6.162 0 0012 5.838zm0 10.162a4 4 0 114-4 4 4 0 01-4 4zm6.406-11.845a1.44 1.44 0 11-1.44-1.44 1.44 1.44 0 011.44 1.44z"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Related Products -->
<section aria-label="Produk digital terkait" class="mt-12 md:mt-16 max-w-7xl mx-auto px-5 pb-12">
    <div class="flex items-center justify-between mb-8">
        <h3 class="text-2xl md:text-3xl font-bold text-gray-900">Produk Digital Terkait</h3>
        <div class="h-1 flex-1 ml-6 bg-gradient-to-r from-blue-500 to-transparent rounded-full"></div>
    </div>
    
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @foreach ($relatedProducts as $index => $related)
            <a href="{{ route('product.show', $related->slug) }}" 
                class="related-card stagger-item bg-white rounded-xl shadow-md hover:shadow-2xl" 
                tabindex="0"
                aria-label="Lihat detail produk {{ $related->title }}">
                <div class="h-48 overflow-hidden rounded-t-xl relative">
                    @if ($related->discount_price && $related->discount_price < $related->price)
                        <div class="absolute top-3 right-3 z-10">
                            <span class="bg-red-500 text-white px-3 py-1 rounded-full text-xs font-bold shadow-lg">
                                -{{ round((($related->price - $related->discount_price) / $related->price) * 100) }}%
                            </span>
                        </div>
                    @endif
                    <img src="{{ asset('storage/' . $related->thumbnail) }}" 
                        alt="Thumbnail {{ $related->title }}"
                        class="w-full h-full object-cover" 
                        loading="lazy"
                        onerror="this.onerror=null;this.src='https://placehold.co/400x192?text=No+Image';" />
                </div>
                <div class="p-5">
                    <h4 class="font-bold text-lg mb-2 text-gray-900 line-clamp-2 min-h-[3.5rem]">{{ $related->title }}</h4>
                    <div class="flex items-baseline gap-2 mb-3">
                        <p class="text-blue-600 font-bold text-xl">
                            Rp{{ number_format($related->discount_price ?? $related->price, 0, ',', '.') }}
                        </p>
                        @if ($related->discount_price)
                            <span class="line-through text-gray-400 text-sm">
                                Rp{{ number_format($related->price, 0, ',', '.') }}
                            </span>
                        @endif
                    </div>
                    <div class="flex items-center gap-2 text-sm text-gray-600">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                        </svg>
                        {{ $related->category->name ?? 'Produk Digital' }}
                    </div>
                </div>
            </a>
        @endforeach
    </div>
</section>

<script>
(function() {
    const cartButton = document.getElementById('cart-button');
    const addToCartUrl = '{{ route('cart.add.ajax', $product->id) }}';
    
    if (cartButton) {
        cartButton.addEventListener('click', function(e) {
            e.preventDefault();
            
            // Get button position
            const buttonRect = cartButton.getBoundingClientRect();
            
            // Find cart icon in header first
            const headerCart = document.querySelector('a[href*="cart"]') || document.querySelector('[data-cart-icon]');
            
            if (!headerCart) {
                console.error('Cart icon not found in header');
                return;
            }
            
            const cartRect = headerCart.getBoundingClientRect();
            const deltaX = cartRect.left - buttonRect.left;
            const deltaY = cartRect.top - buttonRect.top;
            
            // Create unique animation name
            const animationName = 'flyToCart' + Date.now();
            
            // Create dynamic keyframe animation
            const styleSheet = document.createElement('style');
            styleSheet.textContent = `
                @keyframes ${animationName} {
                    0% {
                        opacity: 1;
                        transform: translate(0, 0) scale(1) rotate(0deg);
                    }
                    50% {
                        opacity: 1;
                        transform: translate(${deltaX * 0.5}px, ${deltaY * 0.5 - 50}px) scale(1.5) rotate(180deg);
                    }
                    100% {
                        opacity: 0;
                        transform: translate(${deltaX}px, ${deltaY}px) scale(0.3) rotate(360deg);
                    }
                }
            `;
            document.head.appendChild(styleSheet);
            
            // Create flying cart icon
            const flyingCart = document.createElement('div');
            flyingCart.className = 'flying-cart';
            flyingCart.style.animation = `${animationName} 1s cubic-bezier(0.25, 0.46, 0.45, 0.94) forwards`;
            flyingCart.innerHTML = `
                <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                </svg>
            `;
            
            // Set initial position (center of button)
            flyingCart.style.left = (buttonRect.left + buttonRect.width / 2 - 16) + 'px'; // -16 to center the 32px icon
            flyingCart.style.top = (buttonRect.top + buttonRect.height / 2 - 16) + 'px';
            
            document.body.appendChild(flyingCart);
            
            // Add shake animation to button
            cartButton.classList.add('cart-shake');
            setTimeout(() => {
                cartButton.classList.remove('cart-shake');
            }, 500);
            
            // Add bounce animation to header cart and update count when animation completes
            setTimeout(() => {
                headerCart.classList.add('cart-bounce');
                
                // Update cart count via AJAX
                fetch(addToCartUrl, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({})
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Update cart count badge
                        const cartBadge = headerCart.querySelector('[data-cart-count]');
                        
                        if (cartBadge) {
                            // Show badge if hidden
                            if (cartBadge.classList.contains('hidden')) {
                                cartBadge.classList.remove('hidden');
                            }
                            
                            cartBadge.textContent = data.cartCount;
                            // Add pulse animation to badge
                            cartBadge.classList.add('cart-bounce');
                            setTimeout(() => {
                                cartBadge.classList.remove('cart-bounce');
                            }, 500);
                        }
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    showNotification('Terjadi kesalahan. Silakan coba lagi.', 'error');
                });
                
                setTimeout(() => {
                    headerCart.classList.remove('cart-bounce');
                }, 500);
            }, 1000); // Changed from 800ms to 1000ms to match animation completion
            
            // Remove flying cart and stylesheet after animation
            setTimeout(() => {
                flyingCart.remove();
                styleSheet.remove();
            }, 1100);
        });
    }
    
    // Simple notification function
    function showNotification(message, type = 'error') {
        const notification = document.createElement('div');
        notification.className = `fixed top-4 right-4 z-50 px-6 py-3 rounded-lg shadow-lg transform transition-all duration-300 bg-red-500 text-white font-semibold`;
        notification.textContent = message;
        notification.style.transform = 'translateY(-100px)';
        notification.style.opacity = '0';
        
        document.body.appendChild(notification);
        
        // Animate in
        setTimeout(() => {
            notification.style.transform = 'translateY(0)';
            notification.style.opacity = '1';
        }, 10);
        
        // Remove after 3 seconds
        setTimeout(() => {
            notification.style.transform = 'translateY(-100px)';
            notification.style.opacity = '0';
            setTimeout(() => {
                notification.remove();
            }, 300);
        }, 3000);
    }
})();
</script>

@endsection
