<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Dunia Karya - Toko Online Digital</title>

    <!-- SEO Meta Tags -->
    <meta name="description"
        content="Dunia Karya adalah toko online digital yang menyediakan berbagai produk digital berkualitas seperti website siap pakai, template toko online, dan banyak lagi.">
    <meta name="keywords" content="produk digital, toko online, dunia karya, website siap pakai, template, bisnis online">
    <meta name="author" content="Dunia Karya">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="https://www.duniakarya.com/" />

    <!-- Open Graph / Facebook -->
    <meta property="og:title" content="Dunia Karya - Toko Online Digital" />
    <meta property="og:description"
        content="Temukan berbagai produk digital berkualitas untuk kebutuhan bisnis onlinemu di Dunia Karya." />
    <meta property="og:image" content="https://www.duniakarya.com/images/og-banner.jpg" />
    <meta property="og:url" content="https://www.duniakarya.com/" />
    <meta property="og:type" content="website" />

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="Dunia Karya - Toko Online Digital" />
    <meta name="twitter:description"
        content="Produk digital berkualitas: toko online, website instan, dan banyak lagi." />
    <meta name="twitter:image" content="https://www.duniakarya.com/images/og-banner.jpg" />

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style src="{{ asset('css/style.css') }}"></style>
</head>

<body class="bg-gray-50 font-sans text-gray-900">
    @include('layouts.header')
    @yield('content')
    @include('layouts.footer')
</body>

</html>
