@extends('layouts.app')

@section('content')
@section('meta')
<meta name="description" content="Kumpulan artikel terbaru dari Dunia Karya. Temukan berbagai informasi, tips, dan wawasan seputar produk digital, bisnis online, website, dan teknologi.">
<meta name="keywords" content="artikel, blog, dunia karya, informasi digital, tips bisnis online, produk digital">
<meta name="author" content="Dunia Karya">

<!-- Open Graph -->
<meta property="og:title" content="Artikel & Blog - Dunia Karya">
<meta property="og:description" content="Baca berbagai artikel menarik seputar produk digital, bisnis online, dan teknologi di Dunia Karya.">
<meta property="og:image" content="{{ asset('img/og/og-banner-artikel.png') }}">
<meta property="og:type" content="website">
@endsection
<div class="bg-gradient-to-b from-gray-50 to-white min-h-screen">
    <!-- Hero Section -->
    <div class="relative bg-white border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-5 py-20 text-center">
            <div class="animate-fade-in-up">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">
                    Blog & <span class="bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent">Artikel</span>
                </h1>
                <p class="text-lg md:text-xl text-gray-600 max-w-2xl mx-auto leading-relaxed mb-8">
                    Temukan tips, tutorial, dan insight terbaru seputar dunia digital
                </p>
            </div>
        </div>
    </div>

    <!-- Main Content with Sidebar Layout -->
    <main class="max-w-7xl mx-auto px-5 py-12">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
            <!-- Main Content Area (Articles) -->
            <div class="lg:col-span-8">
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
                                <img
                                    src="https://placehold.co/800x600/e5e7eb/9ca3af?text=..."
                                    data-src="{{ $headline->image ? asset('storage/' . $headline->image) : 'https://placehold.co/800x600/0A1E58/FFFFFF?text=Featured+Article' }}"
                                    alt="{{ $headline->title }}"
                                    class="lazy w-full h-full object-cover image-zoom min-h-[300px] lg:min-h-[400px]"
                                    loading="lazy"
                                    onerror="this.onerror=null;this.src='https://placehold.co/800x600/0A1E58/FFFFFF?text=Featured+Article';"
                                />
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

                        <div id="articles-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            @include('articles._card_list', ['articles' => $others, 'skip_first' => false])
                        </div>

                        {{-- Infinite scroll sentinel --}}
                        <div id="article-sentinel" class="flex justify-center py-10" data-next-page="{{ $articles->nextPageUrl() }}">
                            <div id="article-loader" class="hidden flex items-center gap-3 text-gray-500 text-sm">
                                <svg class="w-5 h-5 animate-spin" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z"></path>
                                </svg>
                                Memuat artikel...
                            </div>
                            <p id="article-end" class="hidden text-gray-400 text-sm">Semua artikel telah ditampilkan</p>
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
            </div>

            <!-- Sidebar (Instagram Widget) -->
            <aside class="lg:col-span-4">
                <div class="lg:sticky lg:top-24">
                    <div class="bg-white rounded-3xl shadow-xl border border-gray-100 overflow-hidden">
                        <!-- Profile Section -->
                        <div class="p-6 border-b border-gray-100">
                            <div class="flex flex-col items-center text-center">
                                <div class="relative mb-4">
                                    <div class="w-20 h-20 rounded-full bg-gradient-to-tr from-yellow-400 via-pink-500 to-purple-600 p-1">
                                        <div class="w-full h-full rounded-full bg-white p-1">
                                            <img src="{{ asset('img/pp-instagram.png') }}"
                                                 alt="Dunia Karya"
                                                 class="w-full h-full rounded-full object-cover">
                                        </div>
                                    </div>
                                </div>
                                <h3 class="text-xl font-bold text-gray-900 mb-1">@duniakarya.site</h3>
                                <p class="text-gray-600 text-sm mb-4">Toko Online Produk Digital</p>
                                <div class="flex items-center justify-center gap-4 text-sm mb-4">
                                    <div><span class="font-bold text-gray-900">1.2K</span> <span class="text-gray-600">posts</span></div>
                                    <div><span class="font-bold text-gray-900">12.5K</span> <span class="text-gray-600">followers</span></div>
                                </div>
                                <a href="https://instagram.com/duniakarya.site" target="_blank" class="w-full px-6 py-2.5 bg-gradient-to-r from-pink-500 to-purple-600 text-white font-semibold rounded-xl hover:from-pink-600 hover:to-purple-700 transition-all shadow-lg hover:shadow-xl">
                                    Follow
                                </a>
                            </div>
                        </div>

                        <!-- Story Highlights -->
                        <div class="p-6 border-b border-gray-100">
                            <div class="grid grid-cols-4 gap-4">
                                <div class="flex flex-col items-center gap-1 cursor-pointer group">
                                    <div class="w-16 h-16 rounded-full bg-gradient-to-tr from-yellow-400 via-pink-500 to-purple-600 p-1 group-hover:scale-110 transition-transform">
                                        <div class="w-full h-full rounded-full bg-white p-1">
                                            <img src="https://placehold.co/200x200/3B82F6/FFFFFF?text=Tips"
                                                 alt="Tips"
                                                 class="w-full h-full rounded-full object-cover">
                                        </div>
                                    </div>
                                    <span class="text-xs font-medium text-gray-700">Tips</span>
                                </div>
                                <div class="flex flex-col items-center gap-1 cursor-pointer group">
                                    <div class="w-16 h-16 rounded-full bg-gradient-to-tr from-yellow-400 via-pink-500 to-purple-600 p-1 group-hover:scale-110 transition-transform">
                                        <div class="w-full h-full rounded-full bg-white p-1">
                                            <img src="https://placehold.co/200x200/10B981/FFFFFF?text=Tutorial"
                                                 alt="Tutorial"
                                                 class="w-full h-full rounded-full object-cover">
                                        </div>
                                    </div>
                                    <span class="text-xs font-medium text-gray-700">Tutorial</span>
                                </div>
                                <div class="flex flex-col items-center gap-1 cursor-pointer group">
                                    <div class="w-16 h-16 rounded-full bg-gradient-to-tr from-yellow-400 via-pink-500 to-purple-600 p-1 group-hover:scale-110 transition-transform">
                                        <div class="w-full h-full rounded-full bg-white p-1">
                                            <img src="https://placehold.co/200x200/F59E0B/FFFFFF?text=Promo"
                                                 alt="Promo"
                                                 class="w-full h-full rounded-full object-cover">
                                        </div>
                                    </div>
                                    <span class="text-xs font-medium text-gray-700">Promo</span>
                                </div>
                                <div class="flex flex-col items-center gap-1 cursor-pointer group">
                                    <div class="w-16 h-16 rounded-full bg-gradient-to-tr from-yellow-400 via-pink-500 to-purple-600 p-1 group-hover:scale-110 transition-transform">
                                        <div class="w-full h-full rounded-full bg-white p-1">
                                            <img src="https://placehold.co/200x200/F59E0B/FFFFFF?text=Promo"
                                                 alt="Promo"
                                                 class="w-full h-full rounded-full object-cover">
                                        </div>
                                    </div>
                                    <span class="text-xs font-medium text-gray-700">Promo</span>
                                </div>
                            </div>
                        </div>

                        <!-- Posts Grid -->
                        <div class="p-6">
                            <div class="flex items-center justify-between mb-4">
                                <h4 class="text-sm font-bold text-gray-900">Recent Posts</h4>
                                <a href="https://instagram.com" target="_blank" class="text-blue-600 hover:text-blue-700 font-semibold text-xs flex items-center gap-1">
                                    View All
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </a>
                            </div>
                            <div class="grid grid-cols-3 gap-2">
                                <div class="aspect-square rounded-lg overflow-hidden cursor-pointer group relative">
                                    <img src="https://placehold.co/400x400/3B82F6/FFFFFF?text=1"
                                         alt="Post 1"
                                         class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                                    <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-40 transition-all"></div>
                                </div>
                                <div class="aspect-square rounded-lg overflow-hidden cursor-pointer group relative">
                                    <img src="https://placehold.co/400x400/10B981/FFFFFF?text=2"
                                         alt="Post 2"
                                         class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                                    <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-40 transition-all"></div>
                                </div>
                                <div class="aspect-square rounded-lg overflow-hidden cursor-pointer group relative">
                                    <img src="https://placehold.co/400x400/F59E0B/FFFFFF?text=3"
                                         alt="Post 3"
                                         class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                                    <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-40 transition-all"></div>
                                </div>
                                <div class="aspect-square rounded-lg overflow-hidden cursor-pointer group relative">
                                    <img src="https://placehold.co/400x400/8B5CF6/FFFFFF?text=4"
                                         alt="Post 4"
                                         class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                                    <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-40 transition-all"></div>
                                </div>
                                <div class="aspect-square rounded-lg overflow-hidden cursor-pointer group relative">
                                    <img src="https://placehold.co/400x400/EF4444/FFFFFF?text=5"
                                         alt="Post 5"
                                         class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                                    <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-40 transition-all"></div>
                                </div>
                                <div class="aspect-square rounded-lg overflow-hidden cursor-pointer group relative">
                                    <img src="https://placehold.co/400x400/06B6D4/FFFFFF?text=6"
                                         alt="Post 6"
                                         class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                                    <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-40 transition-all"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </aside>
        </div>
    </main>
</div>
@endsection
@push('scripts')
<script>
(function () {
    // ── Infinite Scroll ──────────────────────────────────────────
    const grid     = document.getElementById('articles-grid');
    const sentinel = document.getElementById('article-sentinel');
    const loader   = document.getElementById('article-loader');
    const endMsg   = document.getElementById('article-end');
    let nextUrl    = sentinel ? sentinel.dataset.nextPage : null;
    let loading    = false;
    let page       = 2; // page 1 already loaded

    function loadMore() {
        if (!nextUrl || loading) return;
        loading = true;
        loader.classList.remove('hidden');

        fetch(nextUrl + '&skip_first=0', {
            headers: { 'Accept': 'application/json', 'X-Requested-With': 'XMLHttpRequest' }
        })
        .then(r => r.json())
        .then(data => {
            grid.insertAdjacentHTML('beforeend', data.html);
            initLazyImages();
            nextUrl = data.nextPage;
            page++;
            loading = false;
            loader.classList.add('hidden');
            if (!nextUrl) {
                endMsg.classList.remove('hidden');
                observer.disconnect();
            }
        })
        .catch(() => { loading = false; loader.classList.add('hidden'); });
    }

    const observer = new IntersectionObserver(entries => {
        if (entries[0].isIntersecting) loadMore();
    }, { rootMargin: '200px' });

    if (sentinel && nextUrl) {
        observer.observe(sentinel);
    } else if (sentinel) {
        endMsg.classList.remove('hidden');
    }

    // ── Lazy Image Loading ────────────────────────────────────────
    function initLazyImages() {
        const lazyImgs = document.querySelectorAll('img.lazy[data-src]');
        if ('IntersectionObserver' in window) {
            const imgObserver = new IntersectionObserver((entries, obs) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const img = entry.target;
                        img.src = img.dataset.src;
                        img.classList.remove('lazy');
                        obs.unobserve(img);
                    }
                });
            }, { rootMargin: '100px' });
            lazyImgs.forEach(img => imgObserver.observe(img));
        } else {
            lazyImgs.forEach(img => { img.src = img.dataset.src; });
        }
    }

    initLazyImages();

    document.addEventListener('turbo:before-cache', () => observer.disconnect(), { once: true });
})();
</script>
@endpush
