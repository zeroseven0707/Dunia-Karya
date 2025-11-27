<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'Dunia Karya - Toko Online Digital')</title>

    <!-- SEO Meta Tags -->
    @section('meta')
    <meta name="description"
        content="Dunia Karya adalah toko online digital yang menyediakan berbagai produk digital berkualitas seperti website siap pakai, template toko online, dan banyak lagi.">
    <meta name="keywords" content="produk digital, toko online, dunia karya, website siap pakai, template, bisnis online">
    <meta name="author" content="Dunia Karya">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="{{ url()->current() }}" />
    <link rel="icon" type="image/png" href="{{ asset('img/favicon.png') }}">
    <link rel="icon" href="{{ asset('img/favicon.png') }}" sizes="32x32">
    <link rel="icon" href="{{ asset('img/favicon.png') }}" sizes="192x192">
    <link rel="apple-touch-icon" href="{{ asset('img/favicon.png') }}">


    <!-- Open Graph / Facebook -->
    <meta property="og:title" content="Dunia Karya - Toko Online Digital" />
    <meta property="og:description"
        content="Temukan berbagai produk digital berkualitas untuk kebutuhan bisnis onlinemu di Dunia Karya." />
    <meta property="og:image" content="{{ asset('img/og/og-banner-home.png') }}" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:type" content="website" />

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="Dunia Karya - Toko Online Digital" />
    <meta name="twitter:description"
        content="Produk digital berkualitas: toko online, website instan, dan banyak lagi." />
    <meta name="twitter:image" content="{{ asset('img/og/og-banner-home.png') }}" />
    @show

    <!-- Tailwind -->
    <script src="{{ asset('js/tailwind.js') }}"></script>
    <style src="{{ asset('css/style.css') }}"></style>
    <link rel="stylesheet" href="{{ asset('css/animations.css') }}">
    <script type="application/ld+json">
        {!! json_encode([
            '@context' => 'https://schema.org',
            '@type' => 'Organization',
            'name' => 'Dunia Karya',
            'url' => url('/'),
            'logo' => asset('img/logo.png'),
        ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}
    </script>
    @stack('styles')
</head>

<body class="bg-gray-50 font-sans text-gray-900 pt-24">
    @include('layouts.header')
    @yield('content')
    @include('layouts.footer')
    @stack('scripts')
        <script>
        (function() {
            const slides = document.querySelectorAll('#carousel .carousel-slide');
            if (slides.length === 0) return;

            const dots = document.querySelectorAll('[data-index]');
            let current = 0;
            let intervalId;

            function showSlide(index) {
                slides.forEach((slide, i) => {
                    slide.classList.toggle('opacity-100', i === index);
                    slide.classList.toggle('opacity-0', i !== index);
                    slide.classList.toggle('z-10', i === index);
                    slide.classList.toggle('z-0', i !== index);
                });

                dots.forEach((dot, i) => {
                    dot.classList.toggle('bg-white', i === index);
                    dot.classList.toggle('bg-white/50', i !== index);
                });

                current = index;
            }

            dots.forEach(dot => {
                dot.addEventListener('click', () => {
                    showSlide(parseInt(dot.dataset.index));
                    resetInterval();
                });
            });

            function startInterval() {
                intervalId = setInterval(() => {
                    let next = (current + 1) % slides.length;
                    showSlide(next);
                }, 4000);
            }

            function resetInterval() {
                clearInterval(intervalId);
                startInterval();
            }

            // Initial slide
            showSlide(0);
            startInterval();

            // Cleanup
            document.addEventListener('turbo:before-cache', () => {
                clearInterval(intervalId);
            }, { once: true });
        })();
        </script>
</body>

</html>
