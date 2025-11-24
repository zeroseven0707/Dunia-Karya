@extends('layouts.app')

@section('content')
    <main class="max-w-6xl mx-auto px-5 py-8 select-none">

        <!-- Judul Halaman -->
        <header class="mb-8 text-center">
            <h1 class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-2">Blog</h1>
            <p class="text-gray-600">Kumpulan berita dan artikel terbaru hari ini</p>
        </header>

        <!-- Headline Section -->
        @if ($articles->count() > 0)
            @php
                $headline = $articles->first();
                $others = $articles->skip(1);
            @endphp

            <section class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
                <!-- Headline Besar -->
                <article class="md:col-span-2 bg-white rounded-lg shadow-sm hover:shadow-md transition-all overflow-hidden">
                    <a href="{{ route('articles.show', $headline->slug) }}">
                        <img src="{{ asset('storage/' . $headline->image) }}" alt="{{ $headline->title }}"
                            class="w-full h-72 md:h-96 object-cover"
                            onerror="this.onerror=null;this.src='https://placehold.co/800x400?text=No+Image';" />
                    </a>
                    <div class="p-5">
                        <a href="{{ route('articles.show', $headline->slug) }}"
                            class="text-2xl md:text-3xl font-bold text-gray-900 hover:text-blue-700 leading-tight">
                            {{ $headline->title }}
                        </a>
                        <p class="text-sm text-gray-500 mt-2">
                            {{ \Carbon\Carbon::parse($headline->date)->translatedFormat('d F Y') }}
                        </p>
                        <p class="text-gray-600 mt-3 line-clamp-3">
                            {{ strip_tags(Str::limit($headline->excerpt ?? $headline->content, 160)) }}
                        </p>
                    </div>
                </article>

                <!-- Berita Pendek di Samping -->
                <div class="flex flex-col gap-5">
                    @foreach ($others->take(5) as $side)
                        <article class="flex gap-3 hover:bg-gray-50 rounded-lg transition">
                            <a href="{{ route('articles.show', $side->slug) }}"
                                class="flex-shrink-0 w-28 h-20 rounded-md overflow-hidden">
                                <img src="{{ asset('storage/' . $side->image) }}" alt="{{ $side->title }}"
                                    class="w-full h-full object-cover"
                                    onerror="this.onerror=null;this.src='https://placehold.co/200x150?text=No+Image';" />
                            </a>
                            <div>
                                <a href="{{ route('articles.show', $side->slug) }}"
                                    class="font-semibold text-gray-900 hover:text-blue-700 leading-snug line-clamp-2">
                                    {{ $side->title }}
                                </a>
                                <p class="text-xs text-gray-500 mt-1">
                                    {{ \Carbon\Carbon::parse($side->date)->translatedFormat('d M Y') }}
                                </p>
                            </div>
                        </article>
                    @endforeach
                </div>
            </section>
        @endif

        <!-- List Berita Lainnya -->
        @if ($others->skip(3)->count())
            <section>
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Berita Lainnya</h2>

                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
                    @foreach ($others->skip(3) as $article)
                        <a href="{{ route('articles.show', $article->slug) }}"
                            class="block bg-white rounded-lg shadow-sm hover:shadow-md transition overflow-hidden">
                            <div class="h-44 overflow-hidden">
                                <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}"
                                    class="w-full h-full object-cover"
                                    onerror="this.onerror=null;this.src='https://placehold.co/400x250?text=No+Image';" />
                            </div>
                            <div class="p-4">
                                <h3 class="font-semibold text-lg text-gray-800 hover:text-blue-700 line-clamp-2 mb-1">
                                    {{ $article->title }}
                                </h3>
                                <p class="text-sm text-gray-500 mb-2">
                                    {{ \Carbon\Carbon::parse($article->date)->translatedFormat('d M Y') }} |
                                    {{ $article->author ?? 'Redaksi' }}
                                </p>
                                <p class="text-gray-600 text-sm line-clamp-3">
                                    {{ strip_tags(Str::limit($article->excerpt ?? $article->content, 120)) }}
                                </p>
                            </div>
                        </a>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-10">
                    {{ $articles->links('vendor.pagination.tailwind') }}
                </div>
            </section>
        @endif

    </main>
@endsection
