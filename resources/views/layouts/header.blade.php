    <!-- Main Navbar -->
    <nav x-data="{ mobileMenuOpen: false, mobileSearchOpen: false }" class="fixed top-0 left-0 right-0 bg-[#0A1E58] px-5 py-3 text-white shadow-lg z-40">
        <!-- Mobile Header -->
        <div class="flex justify-between items-center md:hidden">
            <!-- Logo -->
            <div class="space-x-1 text-lg font-semibold">
                <a href="{{ route('home') }}">
                    <img src="{{ asset('img/logo.png') }}" alt="Dunia Karya Logo" class="h-10 w-auto">
                </a>
            </div>

            <!-- Mobile Icons (Search, Cart, Menu) -->
            <div class="flex items-center gap-3">
                <!-- Search Toggle -->
                <button @click="mobileSearchOpen = !mobileSearchOpen" class="text-white focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </button>

                <!-- Cart Icon -->
                <a href="{{ url('cart') }}" class="relative text-white focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2 9h14l-2-9M10 21a1 1 0 11-2 0 1 1 0 012 0zm8 0a1 1 0 11-2 0 1 1 0 012 0z" />
                    </svg>
                    @if(isset($cartCount) && $cartCount > 0)
                        <span data-cart-count class="absolute -top-1 -right-1 bg-red-500 text-white text-[10px] px-1 py-0.5 rounded-full min-w-[16px] text-center">{{ $cartCount }}</span>
                    @else
                        <span data-cart-count class="absolute -top-1 -right-1 bg-red-500 text-white text-[10px] px-1 py-0.5 rounded-full min-w-[16px] text-center hidden">0</span>
                    @endif
                </a>

                <!-- Hamburger Menu -->
                <button @click="mobileMenuOpen = !mobileMenuOpen" class="text-white focus:outline-none ml-1">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Search Bar (Collapsible) -->
        <div x-show="mobileSearchOpen" x-transition class="md:hidden mt-3 border-t border-blue-800 pt-3">
            <form action="{{ request()->routeIs('articles.*') ? route('articles.index') : route('search') }}" method="GET" class="flex items-center bg-[#162C59] rounded px-3 py-2">
                <input type="text" name="q" value="{{ request('q') }}" placeholder="{{ request()->routeIs('articles.*') ? 'Cari artikel...' : 'Cari produk digital...' }}"
                    class="bg-transparent text-white w-full text-sm placeholder-gray-400 outline-none" />
                <button type="submit" class="bg-[#0061EB] p-1.5 rounded ml-2 hover:bg-blue-700">
                    <svg class="h-4 w-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 1110.5 3a7.5 7.5 0 016.15 13.65z" />
                    </svg>
                </button>
            </form>
        </div>

        <!-- Konten Navbar (Desktop Only) -->
        <div id="navbarContent" class="hidden md:flex flex-col md:flex-row md:flex-wrap items-stretch md:items-center justify-start md:justify-between gap-4 md:gap-6 mt-4 md:mt-0 w-full">
            <!-- Logo (ditampilkan ulang untuk desktop) -->
            <a href="{{ route('home') }}" class="hidden md:flex items-center gap-3 group">
                <img src="{{ asset('img/logo.png') }}" alt="Dunia Karya Logo" class="h-12 w-auto object-contain transition-transform duration-300 group-hover:scale-105">
                <div class="flex flex-col">
                    <h1 class="text-xl font-bold leading-none tracking-wide text-white group-hover:text-blue-200 transition-colors">
                        DUNIA KARYA
                    </h1>
                    <span class="text-xs font-medium text-blue-200 italic tracking-wider">
                        Toko Online Produk Digital
                    </span>
                </div>
            </a>

            <!-- Search + Hashtags -->
            <div class="w-full md:flex-1 md:max-w-2xl">
                <form action="{{ request()->routeIs('articles.*') ? route('articles.index') : route('search') }}" method="GET" class="flex items-center bg-[#162C59] rounded px-3 py-1.5">
                    <input type="text" name="q" value="{{ request('q') }}" placeholder="{{ request()->routeIs('articles.*') ? 'Cari artikel...' : 'Cari produk digital...' }}"
                        class="bg-transparent text-white w-full text-sm placeholder-white outline-none" />
                    <button type="submit" class="bg-[#0061EB] p-1.5 rounded ml-2 hover:bg-blue-700">
                        <svg class="h-4 w-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 1110.5 3a7.5 7.5 0 016.15 13.65z" />
                        </svg>
                    </button>
                </form>

                <div class="mt-2 flex gap-4 text-sm flex-wrap text-white">
                    <a href="{{ route('home') }}" class="hover:underline">Beranda</a>
                    <a href="{{ route('products.index') }}" class="hover:underline">Produk</a>
                    <a href="{{ route('articles.index') }}" class="hover:underline">Blog</a>
                    <a href="{{ route('contact') }}" class="hover:underline">Kontak</a>
                    <a href="{{ route('privacy') }}" class="hover:underline">Kebijakan Privasi</a>
                    <a href="{{ route('terms') }}" class="hover:underline">Syarat & Ketentuan</a>
                    <a href="{{ route('faq') }}" class="hover:underline">FAQ</a>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex gap-2 items-center flex-wrap justify-center md:justify-start">
                <a href="{{ route('products.index') }}">
                    <button
                        class="flex items-center gap-1 px-3 py-1.5 rounded text-white hover:bg-blue-700 text-sm shadow">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                        Katalog Produk
                    </button>
                </a>

                <button class="flex items-center gap-1 px-3 py-1.5 rounded text-white hover:bg-blue-700 text-sm shadow">
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15 10l4.553-2.276A2 2 0 0122 9.618v4.764a2 2 0 01-2.447 1.894L15 14M10 14l-4.553 2.276A2 2 0 014 14.382V9.618a2 2 0 012.447-1.894L10 10m0 0V4m0 6l5 4" />
                    </svg>
                    Blog
                </button>

                {{-- Tombol Keranjang (Visible to all) --}}
                <div class="flex items-center gap-4 px-3">
                    <a href="{{ url('cart') }}" class="relative">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white hover:text-gray-200"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2 9h14l-2-9M10 21a1 1 0 11-2 0 1 1 0 012 0zm8 0a1 1 0 11-2 0 1 1 0 012 0z" />
                        </svg>
                        @if(isset($cartCount) && $cartCount > 0)
                            <span data-cart-count class="absolute -top-2 -right-2 bg-red-500 text-white text-xs px-1.5 py-0.5 rounded-full">{{ $cartCount }}</span>
                        @else
                            <span data-cart-count class="absolute -top-2 -right-2 bg-red-500 text-white text-xs px-1.5 py-0.5 rounded-full hidden">0</span>
                        @endif
                    </a>

                    @auth
                        {{-- Menu Profil (Dropdown by Click) --}}
                        <div x-data="{ open: false }" class="relative">
                            <button @click="open = !open"
                                class="flex items-center gap-2 text-white hover:text-gray-200 focus:outline-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M5.121 17.804A9 9 0 1118.879 17.804M12 12a4 4 0 100-8 4 4 0 000 8z" />
                                </svg>
                                <span class="text-sm">{{ Auth::user()->name }}</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mt-0.5" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>

                            {{-- Dropdown --}}
                            <div x-show="open" @click.outside="open = false" x-transition
                                class="absolute right-0 mt-2 w-44 bg-white rounded-md shadow-lg z-50">
                                <a href="{{ url('profile/setting') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    Profile Setting
                                </a>
                                <a href="{{ url('pesanan-saya') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    Pesanan Saya
                                </a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit"
                                        class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                        Keluar
                                    </button>
                                </form>
                            </div>
                        </div>
                    @else
                        {{-- Jika belum login --}}
                        <a href="{{ url('register') }}"
                            class="px-4 py-1.5 border border-white rounded text-white hover:bg-white hover:text-blue-800 text-sm">
                            Daftar
                        </a>
                        <a href="{{ url('login') }}"
                            class="px-4 py-1.5 bg-[#0061EB] rounded text-white font-semibold hover:bg-blue-700 text-sm">
                            Masuk
                        </a>
                    @endauth

                </div> <!-- End Cart+Auth Container -->
            </div> <!-- End Action Buttons -->
        </div> <!-- End Navbar Content -->

        <!-- Mobile Sidebar Overlay -->
        <div x-show="mobileMenuOpen"
             x-transition:enter="transition-opacity ease-linear duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition-opacity ease-linear duration-300"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             class="fixed inset-0 bg-black bg-opacity-50 z-40 md:hidden"
             @click="mobileMenuOpen = false"
             style="display: none;">
        </div>

        <!-- Mobile Sidebar -->
        <div x-show="mobileMenuOpen"
             x-transition:enter="transition ease-in-out duration-300 transform"
             x-transition:enter-start="-translate-x-full"
             x-transition:enter-end="translate-x-0"
             x-transition:leave="transition ease-in-out duration-300 transform"
             x-transition:leave-start="translate-x-0"
             x-transition:leave-end="-translate-x-full"
             class="fixed inset-y-0 left-0 z-50 w-64 bg-[#0A1E58] shadow-lg overflow-y-auto md:hidden flex flex-col p-5 gap-6"
             style="display: none;">

             <!-- Header Sidebar -->
             <div class="flex items-center justify-between">
                 <img src="{{ asset('img/logo.png') }}" alt="Logo" class="h-8 w-auto">
                 <button @click="mobileMenuOpen = false" class="text-white focus:outline-none">
                     <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                     </svg>
                 </button>
             </div>

             <!-- Search -->
             <form action="{{ request()->routeIs('articles.*') ? route('articles.index') : route('search') }}" method="GET" class="flex items-center bg-[#162C59] rounded px-3 py-2">
                <input type="text" name="q" value="{{ request('q') }}" placeholder="{{ request()->routeIs('articles.*') ? 'Cari artikel...' : 'Cari produk digital...' }}"
                    class="bg-transparent text-white w-full text-sm placeholder-white outline-none" />
                <button type="submit" class="bg-[#0061EB] p-1.5 rounded ml-2 hover:bg-blue-700">
                    <svg class="h-4 w-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 1110.5 3a7.5 7.5 0 016.15 13.65z" />
                    </svg>
                </button>
            </form>

            <!-- Links -->
            <div class="flex flex-col gap-4 text-sm text-white">
                <a href="{{ route('home') }}" class="hover:underline">Beranda</a>
                <a href="{{ route('products.index') }}" class="hover:underline">Produk</a>
                <a href="{{ route('articles.index') }}" class="hover:underline">Blog</a>
                <a href="{{ route('contact') }}" class="hover:underline">Kontak</a>
                <a href="{{ route('terms') }}" class="hover:underline">Syarat & Ketentuan</a>
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-col gap-3">
                <a href="{{ route('products.index') }}">
                    <button class="w-full flex items-center justify-center gap-1 px-3 py-2 rounded text-white hover:bg-blue-700 text-sm shadow bg-[#162C59]">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                        Katalog Produk
                    </button>
                </a>
                <a href="{{ route('articles.index') }}">
                    <button class="w-full flex items-center justify-center gap-1 px-3 py-2 rounded text-white hover:bg-blue-700 text-sm shadow bg-[#162C59]">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15 10l4.553-2.276A2 2 0 0122 9.618v4.764a2 2 0 01-2.447 1.894L15 14M10 14l-4.553 2.276A2 2 0 014 14.382V9.618a2 2 0 012.447-1.894L10 10m0 0V4m0 6l5 4" />
                        </svg>
                        Blog
                    </button>
                </a>
            </div>

            <!-- Auth -->
            <div class="mt-auto border-t border-blue-800 pt-4">
                @auth
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-10 h-10 rounded-full bg-blue-600 flex items-center justify-center text-white font-bold">
                            {{ substr(Auth::user()->name, 0, 1) }}
                        </div>
                        <div>
                            <p class="text-sm font-semibold">{{ Auth::user()->name }}</p>
                            <p class="text-xs text-gray-300">{{ Auth::user()->email }}</p>
                        </div>
                    </div>
                    <div class="flex flex-col gap-2 text-sm">
                        <a href="{{ url('profile/setting') }}" class="hover:text-blue-200">Profile Setting</a>
                        <a href="{{ url('pesanan-saya') }}" class="hover:text-blue-200">Pesanan Saya</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="text-left hover:text-blue-200 w-full">Keluar</button>
                        </form>
                    </div>
                @else
                    <div class="flex flex-col gap-3">
                        <a href="{{ url('login') }}" class="w-full text-center px-4 py-2 bg-[#0061EB] rounded text-white font-semibold hover:bg-blue-700 text-sm">
                            Masuk
                        </a>
                        <a href="{{ url('register') }}" class="w-full text-center px-4 py-2 border border-white rounded text-white hover:bg-white hover:text-blue-800 text-sm">
                            Daftar
                        </a>
                    </div>
                @endauth
            </div>
        </div>
    </nav>

    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
