@extends('layouts.app')

@section('content')
<div class="bg-gradient-to-b from-gray-50 to-white min-h-screen">
    <!-- Hero Section -->
    <div class="bg-gradient-to-r from-blue-600 via-blue-700 to-indigo-800 text-white py-20 animated-gradient">
        <div class="max-w-6xl mx-auto px-5 text-center animate-fade-in">
            <h1 class="text-4xl md:text-6xl font-extrabold mb-4">Blog & Artikel</h1>
            <p class="text-lg md:text-xl text-blue-100 max-w-2xl mx-auto">
                Temukan tips, tutorial, dan insight terbaru seputar dunia digital
            </p>
            
            <!-- Search Bar -->
            <form action="{{ route('articles.index') }}" method="GET" class="mt-8 max-w-2xl mx-auto">
                <div class="relative">
                    <input type="text" name="q" value="{{ request('q') }}" 
                           placeholder="Cari artikel..." 
                           class="w-full px-6 py-4 rounded-full text-gray-900 focus:outline-none focus:ring-4 focus:ring-blue-300 transition-all shadow-lg">
                    <button type="submit" class="absolute right-2 top-1/2 transform -translate-y-1/2 bg-blue-600 text-white px-6 py-2 rounded-full hover:bg-blue-700 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <main class="max-w-7xl mx-auto px-5 py-12">
        @if ($articles->count() > 0)
            @php
                $headline = $articles->first();
                $others = $articles->skip(1);
            @endphp

            <!-- Featured Article -->
            <section class="mb-16 animate-fade-in-up">
                <h2 class="text-3xl font-bold mb-8 text-gray-900 flex items-center">
                    <span class="w-2 h-8 bg-blue-600 mr-3 rounded"></span>
                    Artikel Pilihan
                </h2>
                
                <article class="grid grid-cols-1 lg:grid-cols-2 gap-8 bg-white rounded-2xl shadow-xl overflow-hidden hover-lift smooth-transition">
                    <a href="{{ route('articles.show', $headline->slug) }}" class="image-zoom-container h-full">
                        <img src="{{ asset('storage/' . $headline->image) }}" 
                             alt="{{ $headline->title }}"
                             class="w-full h-full object-cover image-zoom min-h-[300px] lg:min-h-[400px]"
                             onerror="this.onerror=null;this.src='https://placehold.co/800x600/0A1E58/FFFFFF?text=Featured+Article';" />
                    </a>
                    <div class="p-8 flex flex-col justify-center">
                        <div class="flex items-center gap-3 mb-4">
                            <span class="px-4 py-1 bg-blue-100 text-blue-700 rounded-full text-sm font-semibold">Featured</span>
                            <span class="text-sm text-gray-500">
                                {{ \Carbon\Carbon::parse($headline->date)->translatedFormat('d F Y') }}
                            </span>
                        </div>
                        <a href="{{ route('articles.show', $headline->slug) }}" 
                           class="text-3xl md:text-4xl font-bold text-gray-900 hover:text-blue-600 transition-colors mb-4 leading-tight">
                            {{ $headline->title }}
                        </a>
                        <p class="text-gray-600 text-lg mb-6 line-clamp-3">
                            {{ strip_tags(Str::limit($headline->excerpt ?? $headline->content, 200)) }}
                        </p>
                        <a href="{{ route('articles.show', $headline->slug) }}" 
                           class="inline-flex items-center text-blue-600 font-semibold hover:text-blue-700 transition-colors group">
                            Baca Selengkapnya
                            <svg class="w-5 h-5 ml-2 group-hover:translate-x-2 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                            </svg>
                        </a>
                    </div>
                </article>
            </section>

            <!-- Latest Articles Grid -->
            @if($others->count() > 0)
            <section class="mb-16">
                <h2 class="text-3xl font-bold mb-8 text-gray-900 flex items-center">
                    <span class="w-2 h-8 bg-blue-600 mr-3 rounded"></span>
                    Artikel Terbaru
                </h2>
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($others as $index => $article)
                        <article class="bg-white rounded-xl shadow-lg overflow-hidden hover-lift smooth-transition scroll-reveal delay-{{ min($index * 100, 500) }}">
                            <a href="{{ route('articles.show', $article->slug) }}" class="image-zoom-container block h-56">
                                <img src="{{ asset('storage/' . $article->image) }}" 
                                     alt="{{ $article->title }}"
                                     class="w-full h-full object-cover image-zoom"
                                     onerror="this.onerror=null;this.src='https://placehold.co/600x400/0A1E58/FFFFFF?text=Article';" />
                            </a>
                            <div class="p-6">
                                <div class="flex items-center gap-2 mb-3">
                                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    <span class="text-sm text-gray-500">
                                        {{ \Carbon\Carbon::parse($article->date)->translatedFormat('d M Y') }}
                                    </span>
                                </div>
                                <a href="{{ route('articles.show', $article->slug) }}" 
                                   class="text-xl font-bold text-gray-900 hover:text-blue-600 transition-colors line-clamp-2 mb-3 block">
                                    {{ $article->title }}
                                </a>
                                <p class="text-gray-600 text-sm line-clamp-3 mb-4">
                                    {{ strip_tags(Str::limit($article->excerpt ?? $article->content, 120)) }}
                                </p>
                                <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                                    <span class="text-sm text-gray-500">{{ $article->author ?? 'Redaksi' }}</span>
                                    <a href="{{ route('articles.show', $article->slug) }}" 
                                       class="text-blue-600 hover:text-blue-700 font-semibold text-sm flex items-center group">
                                        Baca
                                        <svg class="w-4 h-4 ml-1 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-12 flex justify-center">
                    {{ $articles->links('vendor.pagination.tailwind') }}
                </div>
            </section>
            @endif
        @else
            <!-- Empty State -->
            <div class="text-center py-20 animate-fade-in">
                <svg class="w-24 h-24 mx-auto text-gray-300 mb-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                <h3 class="text-2xl font-bold text-gray-700 mb-2">Belum Ada Artikel</h3>
                <p class="text-gray-500">Artikel akan segera hadir. Nantikan update terbaru dari kami!</p>
            </div>
        @endif

        <!-- Newsletter CTA -->
        <section class="mt-20 bg-gradient-to-r from-blue-600 to-indigo-700 rounded-3xl p-12 text-white text-center animated-gradient shadow-2xl">
            <div class="max-w-2xl mx-auto">
                <h3 class="text-3xl font-bold mb-4">Jangan Lewatkan Update Terbaru!</h3>
                <p class="text-blue-100 mb-8">Dapatkan artikel, tips, dan promo eksklusif langsung di inbox Anda</p>
                <form class="flex flex-col sm:flex-row gap-4 justify-center">
                    <input type="email" placeholder="Email Anda" 
                           class="px-6 py-3 rounded-full text-gray-900 focus:outline-none focus:ring-4 focus:ring-blue-300 flex-1 max-w-md">
                    <button type="submit" class="px-8 py-3 bg-white text-blue-600 rounded-full font-semibold hover:bg-gray-100 transition-colors ripple">
                        Subscribe
                    </button>
                </form>
            </div>
        </section>
    </main>
</div>

<!-- Scroll Reveal Script -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const reveals = document.querySelectorAll('.scroll-reveal');
    
    const revealOnScroll = () => {
        reveals.forEach(element => {
            const elementTop = element.getBoundingClientRect().top;
            const elementVisible = 150;
            
            if (elementTop < window.innerHeight - elementVisible) {
                element.classList.add('revealed');
            }
        });
    };
    
    window.addEventListener('scroll', revealOnScroll);
    revealOnScroll(); // Initial check
});
</script>
@endsection
