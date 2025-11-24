@extends('layouts.app')

@section('content')
<main class="max-w-6xl mx-auto px-5 py-8">

    <!-- Breadcrumb -->
    <nav class="text-sm text-gray-500 mb-4">
        <a href="/" class="hover:text-blue-600">Home</a>
        <span class="mx-2">›</span>
        <a href="{{ route('articles.index') }}" class="hover:text-blue-600">Berita</a>
        <span class="mx-2">›</span>
        <span class="text-gray-700 font-medium">{{ $article->title }}</span>
    </nav>

    <!-- Judul -->
    <article>
        <h1 class="text-3xl md:text-4xl font-extrabold leading-tight mb-2 text-gray-900">
            {{ $article->title }}
        </h1>

        <!-- Info Penulis -->
        <div class="text-sm text-gray-500 mb-6">
            <span>{{ $article->author ?? 'Redaksi' }}</span>
            <span class="mx-1">•</span>
            <time datetime="{{ $article->date }}">
                {{ \Carbon\Carbon::parse($article->date)->translatedFormat('d F Y, H:i') }}
            </time>
        </div>

        <!-- Gambar Utama -->
        <figure class="mb-6">
            <img src="{{ asset('storage/' . $article->image) }}"
                 alt="Gambar {{ $article->title }}"
                 class="w-full max-h-[480px] object-cover rounded-lg shadow-md"
                 onerror="this.onerror=null;this.src='https://placehold.co/1200x700?text=No+Image';" />
            <figcaption class="text-gray-400 text-sm mt-2 italic">
                {{ $article->caption ?? 'Sumber: Dokumentasi' }}
            </figcaption>
        </figure>

        <!-- Isi Artikel -->
        <div class="prose prose-lg max-w-none text-gray-800 leading-relaxed mb-8">
            {!! $article->content !!}
        </div>

        <!-- Bagikan -->
        <div class="border-t border-gray-200 pt-5">
            <h3 class="font-semibold mb-3 text-gray-800">Bagikan artikel ini:</h3>
            <div class="flex space-x-3">
                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}"
                    target="_blank"
                    class="bg-blue-600 text-white p-3 rounded-md hover:bg-blue-700 transition-colors flex items-center justify-center">
                    <i class="fab fa-facebook-f"></i>
                </a>

                <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}&text={{ urlencode($article->title) }}"
                    target="_blank"
                    class="bg-black text-white p-3 rounded-md hover:bg-gray-800 transition-colors flex items-center justify-center">
                    <i class="fab fa-x-twitter"></i>
                </a>

                <a href="https://wa.me/?text={{ urlencode($article->title . ' ' . request()->fullUrl()) }}"
                    target="_blank"
                    class="bg-green-500 text-white p-3 rounded-md hover:bg-green-600 transition-colors flex items-center justify-center">
                    <i class="fab fa-whatsapp"></i>
                </a>

                <button
                    onclick="navigator.clipboard.writeText('{{ request()->fullUrl() }}'); alert('Link berhasil disalin!');"
                    class="bg-gray-600 text-white p-3 rounded-md hover:bg-gray-700 transition-colors flex items-center justify-center">
                    <i class="fas fa-link"></i>
                </button>
            </div>
        </div>
    </article>

    <!-- Artikel Terkait -->
    @if($relatedArticles->count())
    <section class="mt-12 border-t border-gray-200 pt-8">
        <h2 class="text-2xl font-bold mb-6 text-gray-900">Berita Terkait</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
            @foreach ($relatedArticles as $related)
            <a href="{{ route('articles.show', $related->slug) }}"
                class="block bg-white rounded-lg shadow-sm hover:shadow-md transition-shadow duration-200 overflow-hidden">
                <div class="h-44 overflow-hidden">
                    <img src="{{ asset('storage/' . $related->image) }}"
                        alt="{{ $related->title }}"
                        class="w-full h-full object-cover"
                        onerror="this.onerror=null;this.src='https://placehold.co/400x250?text=No+Image';" />
                </div>
                <div class="p-4">
                    <h3 class="font-semibold text-lg leading-snug text-gray-800 hover:text-blue-700">
                        {{ $related->title }}
                    </h3>
                    <p class="text-sm text-gray-500 mt-1">
                        {{ \Illuminate\Support\Str::limit(strip_tags($related->excerpt ?? $related->content), 100) }}
                    </p>
                    <p class="text-xs text-gray-400 mt-2">
                        {{ \Carbon\Carbon::parse($related->date)->translatedFormat('d M Y') }}
                    </p>
                </div>
            </a>
            @endforeach
        </div>
    </section>
    @endif
</main>
@endsection
