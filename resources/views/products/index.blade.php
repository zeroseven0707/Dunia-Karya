@extends('layouts.app')
@section('content')
    <!-- Kategori Produk Digital -->
    <section aria-label="Kategori Produk Digital" class="max-w-7xl mx-auto px-5 py-6">
        <div class="bg-white p-8 shadow-md rounded-lg">

            <div class="overflow-x-auto flex space-x-4 pb-4 gap-10 no-scrollbar">
                <!-- Source Code -->
                <div class="flex flex-col items-center">
                    <div class="w-24 h-24 bg-gray-600 rounded-lg flex items-center justify-center shadow-md">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 text-white" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 9l4-4 4 4m0 7l-4 4-4-4" />
                        </svg>
                    </div>
                    <span class="mt-2 text-sm font-medium text-gray-700">Source Code</span>
                </div>

                <!-- Ebook -->
                <div class="flex flex-col items-center">
                    <div class="w-24 h-24 bg-gray-600 rounded-lg flex items-center justify-center shadow-md">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 text-white" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 20h9M3 4h18M3 8h18M3 12h18M3 16h18" />
                        </svg>
                    </div>
                    <span class="mt-2 text-sm font-medium text-gray-700">Ebook</span>
                </div>

                <!-- UI Kit -->
                <div class="flex flex-col items-center">
                    <div class="w-24 h-24 bg-gray-600 rounded-lg flex items-center justify-center shadow-md">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 text-white" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <rect x="4" y="4" width="16" height="16" rx="2" ry="2" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8h16M8 4v16" />
                        </svg>
                    </div>
                    <span class="mt-2 text-sm font-medium text-gray-700">UI Kit</span>
                </div>

                <!-- Plugin -->
                <div class="flex flex-col items-center">
                    <div class="w-24 h-24 bg-gray-600 rounded-lg flex items-center justify-center shadow-md">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 text-white" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <circle cx="12" cy="12" r="4" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 2v4m0 12v4m10-10h-4m-12 0H2m15.07 6.93l-2.83-2.83M7.76 7.76l-2.83-2.83m0 11.31l2.83-2.83m11.31 0l-2.83 2.83" />
                        </svg>
                    </div>
                    <span class="mt-2 text-sm font-medium text-gray-700">Plugin</span>
                </div>

                <!-- Voice Over -->
                <div class="flex flex-col items-center">
                    <div class="w-24 h-24 bg-gray-600 rounded-lg flex items-center justify-center shadow-md">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 text-white" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 10l4.553-2.276A2 2 0 0122 9.618v4.764a2 2 0 01-2.447 1.894L15 14m-6 0l-4.553 2.276A2 2 0 014 14.382V9.618a2 2 0 012.447-1.894L9 10m6 0V4m0 6l-6 4" />
                        </svg>
                    </div>
                    <span class="mt-2 text-sm font-medium text-gray-700">Voice Over</span>
                </div>

                <!-- Desain Grafis -->
                <div class="flex flex-col items-center">
                    <div class="w-24 h-24 bg-gray-600 rounded-lg flex items-center justify-center shadow-md">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 text-white" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <rect x="3" y="3" width="18" height="18" rx="2" ry="2" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 9l9 6 9-6M3 15l9 6 9-6" />
                        </svg>
                    </div>
                    <span class="mt-2 text-sm font-medium text-gray-700">Desain Grafis</span>
                </div>

                <!-- Video Editing -->
                <div class="flex flex-col items-center">
                    <div class="w-24 h-24 bg-gray-600 rounded-lg flex items-center justify-center shadow-md">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 text-white" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 10l4.553-2.276A2 2 0 0122 9.618v4.764A2 2 0 0119.553 16l-4.553-2.276M4 6v12a2 2 0 002 2h8a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2z" />
                        </svg>
                    </div>
                    <span class="mt-2 text-sm font-medium text-gray-700">Video Editing</span>
                </div>

                <!-- Template Web -->
                <div class="flex flex-col items-center">
                    <div class="w-24 h-24 bg-gray-600 rounded-lg flex items-center justify-center shadow-md">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 text-white" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 4h16v16H4V4zM4 12h16M12 4v16" />
                        </svg>
                    </div>
                    <span class="mt-2 text-sm font-medium text-gray-700">Template Web</span>
                </div>
            </div>
        </div>
    </section>


    <!-- Produk Digital Direkomendasikan -->
    <section class="max-w-7xl mx-auto px-5 py-6">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            @foreach ($products as $product)
                <a href="{{ url("product/{$product->slug}") }}"
                    class="bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow cursor-pointer">

                    {{-- Thumbnail --}}
                    <img src="{{ $product->thumbnail ? asset('storage/' . $product->thumbnail) : 'https://placehold.co/400x225?text=No+Image' }}"
                        alt="{{ $product->title }}" class="rounded-t-lg object-cover w-full h-36 sm:h-44"
                        onerror="this.onerror=null;this.src='https://placehold.co/400x225?text=No+Image';" />

                    <div class="p-4">
                        {{-- Title --}}
                        <h3 class="text-gray-900 text-sm font-semibold leading-snug truncate"
                            title="{{ $product->title }}">
                            {{ $product->title }}
                        </h3>

                        {{-- Price --}}
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
                            {{-- <img src="{{ $product->user->profile_photo_path
                                ? asset('storage/' . $product->user->profile_photo_path)
                                : 'https://placehold.co/20x20?text=OD' }}"
                                alt="{{ $product->user->name }}" width="20"
                                onerror="this.onerror=null;this.src='https://placehold.co/20x20?text=OD';" /> --}}
                            <span>{{ $product->category->name ?? 'Uncategorized' }}</span>
                        </div>
                    </div>
                </a>
            @endforeach

        </div>
    </section>
@endsection
