@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <h1 class="text-3xl font-bold mb-8">Pembelian Saya</h1>

    @if($orders->count() > 0)
        <div class="space-y-8">
            @foreach($orders as $order)
                <div class="bg-white shadow-md rounded-lg overflow-hidden border border-gray-200">
                    <div class="bg-gray-50 px-6 py-4 border-b border-gray-200 flex justify-between items-center">
                        <div>
                            <span class="text-sm text-gray-500">Order ID:</span>
                            <span class="font-medium text-gray-900 ml-1">{{ $order->id }}</span>
                            <span class="mx-2 text-gray-300">|</span>
                            <span class="text-sm text-gray-500">{{ $order->created_at->format('d M Y H:i') }}</span>
                        </div>
                        <div>
                            @if($order->status == 'paid')
                                <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                    Berhasil
                                </span>
                            @elseif($order->status == 'pending')
                                <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                    Menunggu Pembayaran
                                </span>
                            @else
                                <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                    {{ ucfirst($order->status) }}
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="p-6">
                        <ul class="divide-y divide-gray-200">
                            @foreach($order->items as $item)
                                <li class="py-4 flex">
                                    <div class="flex-shrink-0 h-20 w-20 rounded-md overflow-hidden bg-gray-100">
                                        <img src="{{ asset('storage/' . $item->product->thumbnail) }}" alt="{{ $item->product->title }}" class="h-full w-full object-cover object-center">
                                    </div>
                                    <div class="ml-6 flex-1 flex flex-col">
                                        <div class="flex justify-between text-base font-medium text-gray-900">
                                            <h3>{{ $item->product->title }}</h3>
                                            <p class="ml-4">Rp{{ number_format($item->price, 0, ',', '.') }}</p>
                                        </div>
                                        <p class="mt-1 text-sm text-gray-500">{{ $item->product->category->name ?? '' }}</p>
                                        
                                        <div class="flex-1 flex items-end justify-between text-sm">
                                            <p class="text-gray-500">Qty {{ $item->quantity }}</p>

                                            <div class="flex">
                                                @if($order->status == 'paid')
                                                    <!-- Access/Download Button -->
                                                    @if($item->product->demo_url)
                                                        <a href="{{ $item->product->demo_url }}" target="_blank" class="font-medium text-blue-600 hover:text-blue-500 mr-4">
                                                            Akses Produk
                                                        </a>
                                                    @else
                                                        <span class="text-gray-400">Link tidak tersedia</span>
                                                    @endif
                                                    
                                                    <!-- We could also have a specific download route if we stored files -->
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="bg-gray-50 px-6 py-4 border-t border-gray-200">
                        <div class="flex justify-between text-base font-medium text-gray-900">
                            <p>Total</p>
                            <p>Rp{{ number_format($order->total_price, 0, ',', '.') }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="text-center py-12">
            <p class="text-gray-500 text-lg mb-4">Belum ada riwayat pembelian.</p>
            <a href="{{ route('products.index') }}" class="text-blue-600 hover:text-blue-800 font-semibold">Mulai Belanja &rarr;</a>
        </div>
    @endif
</div>
@endsection
