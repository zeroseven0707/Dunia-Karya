@extends('layouts.app')

@section('content')
    <!-- Main content -->
    <section class="mx-auto max-w-7xl px-5 py-6 select-none shadow-lg p-8 grid grid-cols-1 md:grid-cols-2 gap-12">

        <!-- Product Image -->
        <div>
            <div class="rounded-lg overflow-hidden shadow-lg">
                <img id="main-product-image" src="{{ asset('storage/' . $product->thumbnail) }}"
                    alt="Thumbnail {{ $product->title }}" class="w-full object-cover rounded-lg" loading="lazy"
                    onerror="this.onerror=null;this.src='https://placehold.co/600x400?text=No+Image';" />
            </div>
        </div>

        <!-- Product Info -->
        <div class="flex flex-col justify-between">
            <div>
                <h2 class="text-3xl font-extrabold mb-2">{{ $product->title }}</h2>

                <p class="text-blue-700 font-semibold text-xl mb-4">
                    Rp{{ number_format($product->discount_price ?? $product->price, 0, ',', '.') }}
                    @if ($product->discount_price)
                        <span class="line-through text-gray-400 text-base font-normal ml-3">
                            Rp{{ number_format($product->price, 0, ',', '.') }}
                        </span>
                    @endif
                </p>

                <p class="text-gray-700 mb-6 leading-relaxed">
                    {!! $product->description !!}
                </p>
            </div>

            <!-- Tombol Aksi -->
            <!-- Tombol Aksi -->
            <div class="mt-8 space-y-4">
                <form action="{{ route('cart.add', $product->id) }}" method="POST">
                    @csrf
                    <button type="submit"
                        class="w-full border border-blue-600 text-blue-600 py-3 rounded-md text-lg font-semibold hover:bg-blue-50 transition-colors">
                        Tambahkan ke Keranjang
                    </button>
                </form>
                
                <form action="{{ route('cart.add', $product->id) }}" method="POST">
                    @csrf
                    <!-- Buy Now essentially adds to cart and redirects to checkout, or we can have a direct checkout flow. 
                         For simplicity, let's add to cart and redirect to cart/checkout. 
                         We might need a query param to auto-redirect. -->
                    <input type="hidden" name="redirect_checkout" value="1"> 
                    <!-- Note: Controller needs to handle this input if we want direct checkout. 
                         For now, let's just make it add to cart. Or we can make a separate route. -->
                    <button type="submit" formaction="{{ route('cart.add', ['productId' => $product->id, 'checkout' => 1]) }}"
                        class="w-full bg-blue-600 text-white py-3 rounded-md text-lg font-semibold hover:bg-blue-700 transition-colors">
                        Beli Sekarang
                    </button>
                </form>
                @if ($product->demo_url)
                    <a href="{{ $product->demo_url }}" target="_blank"
                        class="w-full block text-center bg-green-600 text-white py-3 rounded-md text-lg font-semibold hover:bg-green-700 transition-colors">
                        Demo
                    </a>
                @endif
            </div>

            <!-- Tombol Share -->
            <div class="mt-6">
                <h4 class="font-semibold mb-2">Bagikan:</h4>
                <div class="flex space-x-3">
                    <!-- Facebook -->
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}"
                        target="_blank"
                        class="bg-blue-600 text-white p-3 rounded-md hover:bg-blue-700 transition-colors flex items-center justify-center">
                        <!-- Facebook Icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M22 12c0-5.522-4.477-10-10-10S2 6.478 2 12c0 4.991 3.657 9.128 8.438 9.879v-6.988H7.898v-2.89h2.54V9.845c0-2.507 1.492-3.89 3.777-3.89 1.094 0 2.238.196 2.238.196v2.46h-1.26c-1.242 0-1.63.772-1.63 1.562v1.875h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" />
                        </svg>
                    </a>

                    <!-- X (Twitter) -->
                    <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}&text={{ urlencode($product->title) }}"
                        target="_blank"
                        class="bg-black text-white p-3 rounded-md hover:bg-gray-800 transition-colors flex items-center justify-center">
                        <!-- X Icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M23 3a10.9 10.9 0 01-3.14 1.53A4.48 4.48 0 0022.4 1s-1.7 1-2.1 1.7a4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z" />
                        </svg>
                    </a>

                    <!-- WhatsApp -->
                    <a href="https://wa.me/?text={{ urlencode($product->title . ' ' . request()->fullUrl()) }}"
                        target="_blank"
                        class="bg-green-500 text-white p-3 rounded-md hover:bg-green-600 transition-colors flex items-center justify-center">
                        <!-- WhatsApp Icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M20.52 3.48A11.95 11.95 0 0012 0C5.37 0 .07 5.33.07 11.95c0 2.11.55 4.16 1.6 5.97L0 24l6.34-1.65A11.95 11.95 0 0012 24c6.63 0 11.95-5.37 11.95-12a11.94 11.94 0 00-3.43-8.52zm-8.44 17.07a9.59 9.59 0 01-5.12-1.44l-.37-.22-3.75.97.99-3.65-.24-.38a9.51 9.51 0 0115.06-11.93 9.51 9.51 0 01-5.57 16.05zm5.16-7.35c-.28-.14-1.66-.82-1.92-.91-.25-.1-.44-.14-.63.14-.19.28-.74.91-.91 1.1-.17.19-.34.21-.63.07-.28-.14-1.18-.44-2.24-1.39-.83-.74-1.39-1.66-1.56-1.94-.16-.28-.02-.43.13-.57.13-.12.28-.32.42-.48.14-.16.19-.28.28-.46.09-.19.05-.35-.02-.49-.07-.14-.63-1.51-.86-2.08-.23-.54-.46-.46-.63-.47l-.54-.01c-.18 0-.48.07-.73.35s-.96.94-.96 2.29c0 1.35.98 2.66 1.12 2.85.14.19 1.92 2.93 4.65 4.11.65.28 1.16.45 1.56.58.65.19 1.24.16 1.7.1.52-.07 1.66-.68 1.9-1.34.24-.66.24-1.23.17-1.35-.07-.11-.26-.18-.54-.32z" />
                        </svg>
                    </a>

                    <!-- Instagram (copy link) -->
                    <button
                        onclick="navigator.clipboard.writeText('{{ request()->fullUrl() }}'); alert('Link berhasil disalin!');"
                        class="bg-pink-500 text-white p-3 rounded-md hover:bg-pink-600 transition-colors flex items-center justify-center">
                        <!-- Link / Instagram Icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M12 2.2c3.2 0 3.584.012 4.85.07 1.17.055 1.98.24 2.44.4a4.92 4.92 0 011.78 1.02c.51.51.85 1.13 1.02 1.78.16.46.34 1.27.39 2.44.06 1.27.07 1.65.07 4.85s-.012 3.584-.07 4.85c-.055 1.17-.24 1.98-.4 2.44a4.92 4.92 0 01-1.02 1.78 4.92 4.92 0 01-1.78 1.02c-.46.16-1.27.34-2.44.39-1.27.06-1.65.07-4.85.07s-3.584-.012-4.85-.07c-1.17-.055-1.98-.24-2.44-.4a4.92 4.92 0 01-1.78-1.02 4.92 4.92 0 01-1.02-1.78c-.16-.46-.34-1.27-.39-2.44C2.212 15.584 2.2 15.2 2.2 12s.012-3.584.07-4.85c.055-1.17.24-1.98.4-2.44a4.92 4.92 0 011.02-1.78 4.92 4.92 0 011.78-1.02c.46-.16 1.27-.34 2.44-.39C8.416 2.212 8.8 2.2 12 2.2zm0-2.2C8.737 0 8.332.013 7.052.072c-1.28.06-2.15.27-2.91.57a7.12 7.12 0 00-2.59 1.66 7.12 7.12 0 00-1.66 2.59c-.3.76-.51 1.63-.57 2.91C.013 8.332 0 8.737 0 12c0 3.263.013 3.668.072 4.948.06 1.28.27 2.15.57 2.91a7.12 7.12 0 001.66 2.59 7.12 7.12 0 002.59 1.66c.76.3 1.63.51 2.91.57 1.28.06 1.683.072 4.948.072s3.668-.013 4.948-.072c1.28-.06 2.15-.27 2.91-.57a7.12 7.12 0 002.59-1.66 7.12 7.12 0 001.66-2.59c.3-.76.51-1.63.57-2.91.06-1.28.072-1.683.072-4.948s-.013-3.668-.072-4.948c-.06-1.28-.27-2.15-.57-2.91a7.12 7.12 0 00-1.66-2.59 7.12 7.12 0 00-2.59-1.66c-.76-.3-1.63-.51-2.91-.57C15.668.013 15.263 0 12 0z" />
                            <path
                                d="M12 5.838a6.162 6.162 0 106.162 6.162A6.162 6.162 0 0012 5.838zm0 10.162a4 4 0 114-4 4 4 0 01-4 4zm6.406-11.845a1.44 1.44 0 11-1.44-1.44 1.44 1.44 0 011.44 1.44z" />
                        </svg>
                    </button>
                </div>
            </div>


        </div>
    </section>

    <!-- Related Products -->
    <section aria-label="Produk digital terkait" class="mt-16 max-w-7xl mx-auto">
        <h3 class="text-2xl font-bold mb-6">Produk Digital Terkait</h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
            @foreach ($relatedProducts as $related)
                <article class="bg-white rounded-lg shadow hover:shadow-lg transition-shadow cursor-pointer" tabindex="0"
                    aria-label="Lihat detail produk {{ $related->title }}">
                    <div class="h-40 md:h-48 overflow-hidden rounded-t-lg">
                        <img src="{{ asset('storage/' . $related->thumbnail) }}" alt="Thumbnail {{ $related->title }}"
                            class="w-full h-full object-cover" loading="lazy"
                            onerror="this.onerror=null;this.src='https://placehold.co/400x192?text=No+Image';" />
                    </div>
                    <div class="p-4">
                        <h4 class="font-semibold text-lg mb-1">{{ $related->title }}</h4>
                        <p class="text-blue-700 font-semibold text-lg mb-1">
                            Rp{{ number_format($related->discount_price ?? $related->price, 0, ',', '.') }}
                            @if ($related->discount_price)
                                <span class="line-through text-gray-400 text-sm font-normal ml-2">
                                    Rp{{ number_format($related->price, 0, ',', '.') }}
                                </span>
                            @endif
                        </p>
                        <p class="text-gray-500 text-sm">{{ $related->category->name ?? '-' }}</p>
                    </div>
                </article>
            @endforeach
        </div>
    </section>
@endsection
