@extends('layouts.app')

@section('title', $article->title . ' - Dunia Karya')

@section('meta')
    <meta name="description" content="{{ $article->seo_description ?? Str::limit(strip_tags($article->content), 150) }}">
    <meta name="keywords" content="{{ $article->seo_keywords ?? ('artikel, blog, dunia karya, ' . $article->title) }}">
    <meta name="author" content="{{ $article->author ?? 'Dunia Karya' }}">

    <!-- Open Graph / Facebook -->
    <meta property="og:title" content="{{ $article->title }} - Dunia Karya" />
    <meta property="og:description" content="{{ Str::limit(strip_tags($article->content), 150) }}" />
    <meta property="og:image" content="{{ asset('storage/' . $article->image) }}" />
    <meta property="og:url" content="{{ route('articles.show', $article->slug) }}" />
    <meta property="og:type" content="article" />

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="{{ $article->title }} - Dunia Karya" />
    <meta name="twitter:description" content="{{ $article->seo_description ?? Str::limit(strip_tags($article->content), 150) }}" />
    <meta name="twitter:image" content="{{ asset('storage/' . $article->image) }}" />
@endsection

@section('content')
<div class="bg-gradient-to-b from-gray-50 to-white min-h-screen">
    <main class="max-w-5xl mx-auto px-5 py-8">
        <!-- Breadcrumb -->
        <nav class="text-sm text-gray-500 mb-6 animate-fade-in">
            <a href="/" class="hover:text-blue-600 transition-colors">Home</a>
            <span class="mx-2">›</span>
            <a href="{{ route('articles.index') }}" class="hover:text-blue-600 transition-colors">Blog</a>
            <span class="mx-2">›</span>
            <span class="text-gray-700 font-medium">{{ Str::limit($article->title, 50) }}</span>
        </nav>

        <!-- Article Header -->
        <article class="bg-white rounded-2xl shadow-xl overflow-hidden animate-fade-in-up">
            <!-- Title Section -->
            <div class="p-8 md:p-12">
                <h1 class="text-3xl md:text-5xl font-extrabold leading-tight mb-6 text-gray-900">
                    {{ $article->title }}
                </h1>

                <!-- Meta Info -->
                <div class="flex flex-wrap items-center gap-4 text-sm text-gray-600 mb-8 pb-8 border-b border-gray-200">
                    <div class="flex items-center gap-2">
                        <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-full flex items-center justify-center text-white font-bold">
                            {{ substr($article->author ?? 'R', 0, 1) }}
                        </div>
                        <div>
                            <p class="font-semibold text-gray-900">{{ $article->author ?? 'Redaksi' }}</p>
                            <p class="text-xs text-gray-500">Penulis</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        <time datetime="{{ $article->date }}">
                            {{ \Carbon\Carbon::parse($article->date)->translatedFormat('d F Y, H:i') }} WIB
                        </time>
                    </div>
                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>{{ ceil(str_word_count(strip_tags($article->content)) / 200) }} min read</span>
                    </div>
                </div>
            </div>

            <!-- Featured Image -->
            <figure class="image-zoom-container">
                <img src="{{ asset('storage/' . $article->image) }}"
                     alt="Gambar {{ $article->title }}"
                     class="w-full max-h-[600px] object-cover image-zoom"
                     onerror="this.onerror=null;this.src='https://placehold.co/1200x700/0A1E58/FFFFFF?text=Article+Image';" />
            </figure>

            <!-- Article Content -->
            <div class="p-8 md:p-12">
                <div class="prose prose-lg max-w-none text-gray-800 leading-relaxed">
                    {!! $article->content !!}
                </div>

                <!-- Tags (if any) -->
                <div class="mt-12 pt-8 border-t border-gray-200">
                    <div class="flex flex-wrap gap-2">
                        <span class="text-gray-600 font-semibold">Tags:</span>
                        <span class="px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-sm">Digital</span>
                        <span class="px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-sm">Tutorial</span>
                    </div>
                </div>

                <!-- Share Section -->
                <div class="mt-8 pt-8 border-t border-gray-200">
                    <h3 class="font-bold text-lg mb-4 text-gray-900">Bagikan Artikel Ini:</h3>
                    <div class="flex flex-wrap gap-3">
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}"
                            target="_blank"
                            class="flex items-center gap-2 px-5 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-all hover-lift">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                            </svg>
                            Facebook
                        </a>

                        <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}&text={{ urlencode($article->title) }}"
                            target="_blank"
                            class="flex items-center gap-2 px-5 py-3 bg-black text-white rounded-lg hover:bg-gray-800 transition-all hover-lift">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                            </svg>
                            Twitter
                        </a>

                        <a href="https://wa.me/?text={{ urlencode($article->title . ' ' . request()->fullUrl()) }}"
                            target="_blank"
                            class="flex items-center gap-2 px-5 py-3 bg-green-500 text-white rounded-lg hover:bg-green-600 transition-all hover-lift">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                            </svg>
                            WhatsApp
                        </a>

                        <button
                            onclick="navigator.clipboard.writeText('{{ request()->fullUrl() }}'); this.innerHTML = '<svg class=\'w-5 h-5\' fill=\'none\' stroke=\'currentColor\' viewBox=\'0 0 24 24\'><path stroke-linecap=\'round\' stroke-linejoin=\'round\' stroke-width=\'2\' d=\'M5 13l4 4L19 7\'/></svg> Tersalin!'; setTimeout(() => this.innerHTML = '<svg class=\'w-5 h-5\' fill=\'none\' stroke=\'currentColor\' viewBox=\'0 0 24 24\'><path stroke-linecap=\'round\' stroke-linejoin=\'round\' stroke-width=\'2\' d=\'M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z\'/></svg> Salin Link', 2000);"
                            class="flex items-center gap-2 px-5 py-3 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition-all hover-lift">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
                            </svg>
                            Salin Link
                        </button>
                    </div>
                </div>
            </div>
        </article>

        <!-- Related Articles -->
        @if($relatedArticles->count())
        <section class="mt-16 scroll-reveal">
            <h2 class="text-3xl font-bold mb-8 text-gray-900 flex items-center">
                <span class="w-2 h-8 bg-blue-600 mr-3 rounded"></span>
                Artikel Terkait
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach ($relatedArticles as $index => $related)
                <article class="bg-white rounded-xl shadow-lg overflow-hidden hover-lift smooth-transition delay-{{ $index * 100 }}">
                    <a href="{{ route('articles.show', $related->slug) }}" class="image-zoom-container block h-48">
                        <img src="{{ asset('storage/' . $related->image) }}"
                            alt="{{ $related->title }}"
                            class="w-full h-full object-cover image-zoom"
                            onerror="this.onerror=null;this.src='https://placehold.co/600x400/0A1E58/FFFFFF?text=Article';" />
                    </a>
                    <div class="p-6">
                        <a href="{{ route('articles.show', $related->slug) }}"
                           class="text-lg font-bold text-gray-900 hover:text-blue-600 transition-colors line-clamp-2 mb-2 block">
                            {{ $related->title }}
                        </a>
                        <p class="text-sm text-gray-600 line-clamp-2 mb-3">
                            {{ Str::limit(strip_tags($related->excerpt ?? $related->content), 100) }}
                        </p>
                        <div class="flex items-center justify-between text-xs text-gray-500">
                            <span>{{ \Carbon\Carbon::parse($related->date)->translatedFormat('d M Y') }}</span>
                            <a href="{{ route('articles.show', $related->slug) }}"
                               class="text-blue-600 hover:text-blue-700 font-semibold flex items-center group">
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
        </section>
        @endif

        <!-- Back to Blog -->
        <div class="mt-12 text-center">
            <a href="{{ route('articles.index') }}"
               class="inline-flex items-center gap-2 px-8 py-4 bg-blue-600 text-white rounded-full font-semibold hover:bg-blue-700 transition-all hover-lift ripple">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Kembali ke Blog
            </a>
        </div>
    </main>
</div>
@endsection
@push('scripts')
    <!-- Scroll Reveal Script -->
<script>
document.addEventListener('turbo:load', function(){
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
    revealOnScroll();

    document.addEventListener('turbo:before-cache', function() {
        window.removeEventListener('scroll', revealOnScroll);
    }, { once: true });
});
</script>
@endpush
