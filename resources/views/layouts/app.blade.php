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

    <!-- Open Graph / Facebook -->
    <meta property="og:title" content="Dunia Karya - Toko Online Digital" />
    <meta property="og:description"
        content="Temukan berbagai produk digital berkualitas untuk kebutuhan bisnis onlinemu di Dunia Karya." />
    <meta property="og:image" content="{{ asset('img/og-banner.jpg') }}" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:type" content="website" />

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="Dunia Karya - Toko Online Digital" />
    <meta name="twitter:description"
        content="Produk digital berkualitas: toko online, website instan, dan banyak lagi." />
    <meta name="twitter:image" content="{{ asset('img/og-banner.jpg') }}" />
    @show

    <!-- Tailwind -->
    <script src="{{ asset('js/tailwind.js') }}"></script>
    <style src="{{ asset('css/style.css') }}"></style>
    <link rel="stylesheet" href="{{ asset('css/animations.css') }}">
</head>

<body class="bg-gray-50 font-sans text-gray-900 pt-24">
    @include('layouts.header')
    @yield('content')
    @include('layouts.footer')
</body>

</html>
