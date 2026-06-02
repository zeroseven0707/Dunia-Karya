@foreach ($products as $product)
    <a href="{{ url("product/{$product->slug}") }}"
        class="product-card stagger-item bg-white rounded-2xl shadow-md hover:shadow-2xl overflow-hidden">

        <div class="relative overflow-hidden h-36 sm:h-44">
            @if ($product->discount_price && $product->discount_price < $product->price)
                <div class="absolute top-3 right-3 z-10">
                    <span class="discount-badge bg-gradient-to-r from-red-500 to-pink-500 text-white px-3 py-1 rounded-full text-xs font-bold shadow-lg">
                        -{{ round((($product->price - $product->discount_price) / $product->price) * 100) }}%
                    </span>
                </div>
            @endif
            <img
                src="https://placehold.co/400x225/e5e7eb/9ca3af?text=..."
                data-src="{{ $product->thumbnail ? asset('storage/' . $product->thumbnail) : 'https://placehold.co/400x225?text=No+Image' }}"
                alt="{{ $product->title }}"
                class="lazy w-full h-full object-cover"
                loading="lazy"
                onerror="this.onerror=null;this.src='https://placehold.co/400x225?text=No+Image';"
            />
        </div>

        <div class="p-4">
            <h3 class="text-gray-900 text-sm font-bold leading-snug line-clamp-2 min-h-[2.5rem] mb-2"
                title="{{ $product->title }}">
                {{ $product->title }}
            </h3>

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

            <div class="mt-3 pt-3 border-t border-gray-100 flex items-center gap-2">
                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                </svg>
                <span class="text-xs text-gray-600 font-medium">{{ $product->category->name ?? 'Uncategorized' }}</span>
            </div>
        </div>
    </a>
@endforeach
