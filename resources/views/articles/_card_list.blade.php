@foreach ($articles as $index => $article)
    {{-- Skip first article on page 1 (used as featured headline) --}}
    @if ($index === 0 && ($skip_first ?? false))
        @continue
    @endif
    <article class="bg-white rounded-xl shadow-lg overflow-hidden hover-lift smooth-transition">
        <a href="{{ route('articles.show', $article->slug) }}" class="image-zoom-container block h-56">
            <img
                src="https://placehold.co/600x400/e5e7eb/9ca3af?text=..."
                data-src="{{ $article->image ? asset('storage/' . $article->image) : 'https://placehold.co/600x400/0A1E58/FFFFFF?text=Article' }}"
                alt="{{ $article->title }}"
                class="lazy w-full h-full object-cover image-zoom"
                loading="lazy"
                onerror="this.onerror=null;this.src='https://placehold.co/600x400/0A1E58/FFFFFF?text=Article';"
            />
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
