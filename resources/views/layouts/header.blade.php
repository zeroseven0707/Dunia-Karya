    <!-- Main Navbar -->
    <nav class="bg-[#0A1E58] px-5 py-3 text-white">
        <!-- Tombol Hamburger (Mobile only) -->
        <div class="flex justify-between items-center md:hidden">
            <div class="space-x-1 text-lg font-semibold">
                <span class="font-bold tracking-wide">DUNIA KARYA</span> <br>
                <span class="text-sm italic">Toko Online Digital</span>
            </div>
            <button id="hamburgerBtn" class="text-white focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>

        <!-- Konten Navbar -->
        <div id="navbarContent" class="flex items-center justify-between gap-6 flex-wrap mt-4 md:mt-0 hidden md:flex">
            <!-- Logo (ditampilkan ulang untuk desktop) -->
            <div class="space-x-1 text-lg font-semibold hidden md:block">
                <span class="font-bold tracking-wide">DUNIA KARYA</span> <br>
                <span class="text-sm italic">Toko Online Digital</span>
            </div>

            <!-- Search + Hashtags -->
            <div class="flex-1 max-w-2xl">
                <div class="flex items-center bg-[#162C59] rounded px-3 py-1.5">
                    <input type="text" placeholder="Cari produk digital terbaik..."
                        class="bg-transparent text-white w-full text-sm placeholder-white outline-none" />
                    <button class="bg-[#0061EB] p-1.5 rounded ml-2 hover:bg-blue-700">
                        <svg class="h-4 w-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 1110.5 3a7.5 7.5 0 016.15 13.65z" />
                        </svg>
                    </button>
                </div>

                <div class="mt-2 flex gap-4 text-sm flex-wrap text-white">
                    <a href="#" class="hover:underline">#TokoOnline</a>
                    <a href="#" class="hover:underline">#ProdukDigital</a>
                    <a href="#" class="hover:underline">#WebsiteInstant</a>
                    <a href="#" class="hover:underline">#BisnisOnline</a>
                    <a href="#" class="hover:underline">#PromoDigital</a>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex gap-2 items-center flex-wrap">
                <button class="flex items-center gap-1 px-3 py-1.5 rounded text-white hover:bg-blue-700 text-sm shadow">
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    Katalog Produk
                </button>

                <button class="flex items-center gap-1 px-3 py-1.5 rounded text-white hover:bg-blue-700 text-sm shadow">
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15 10l4.553-2.276A2 2 0 0122 9.618v4.764a2 2 0 01-2.447 1.894L15 14M10 14l-4.553 2.276A2 2 0 014 14.382V9.618a2 2 0 012.447-1.894L10 10m0 0V4m0 6l5 4" />
                    </svg>
                    Jelajahi Produk
                </button>

                <button
                    class="px-4 py-1.5 border border-white rounded text-white hover:bg-white hover:text-blue-800 text-sm">
                    Daftar
                </button>
                <button class="px-4 py-1.5 bg-[#0061EB] rounded text-white font-semibold hover:bg-blue-700 text-sm">
                    Masuk
                </button>
            </div>
        </div>
    </nav>

    <!-- JavaScript untuk toggle -->
    <script>
        document.getElementById('hamburgerBtn').addEventListener('click', function() {
            const nav = document.getElementById('navbarContent');
            nav.classList.toggle('hidden');
        });
    </script>
