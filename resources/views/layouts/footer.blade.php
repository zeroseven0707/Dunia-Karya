    <footer class="bg-[#0A1E58] text-white px-5 py-10 mt-12">
        <div class="max-w-7xl mx-auto grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8 text-sm">

            <!-- Tentang -->
            <div>
                <h3 class="text-lg font-semibold mb-3">Dunia Karya</h3>
                <p class="text-gray-300">
                    Dunia Karya adalah platform penyedia produk digital seperti toko online, landing page, dan sistem
                    kasir siap pakai untuk bisnismu.
                </p>
            </div>

            <!-- Navigasi -->
            <div>
                <h3 class="text-lg font-semibold mb-3">Navigasi</h3>
                <ul class="space-y-2">
                    <li><a href="{{ route('home') }}" class="hover:underline text-gray-300">Beranda</a></li>
                    <li><a href="{{ route('products.index') }}" class="hover:underline text-gray-300">Produk</a></li>
                    <li><a href="{{ route('articles.index') }}" class="hover:underline text-gray-300">Blog</a></li>
                    <li><a href="{{ route('contact') }}" class="hover:underline text-gray-300">Kontak</a></li>
                </ul>
            </div>

            <!-- Bantuan -->
            <div>
                <h3 class="text-lg font-semibold mb-3">Bantuan</h3>
                <ul class="space-y-2">
                    <li><a href="{{ route('faq') }}" class="hover:underline text-gray-300">FAQ</a></li>
                    <li><a href="{{ route('privacy') }}" class="hover:underline text-gray-300">Kebijakan Privasi</a></li>
                    <li><a href="{{ route('terms') }}" class="hover:underline text-gray-300">Syarat & Ketentuan</a></li>
                    <li><a href="#" class="hover:underline text-gray-300">Pusat Bantuan</a></li>
                </ul>
            </div>

            <!-- Kontak -->
            <div>
                <h3 class="text-lg font-semibold mb-3">Hubungi Kami</h3>
                <ul class="space-y-2 text-gray-300">
                    <li>Email: support@duniakarya.com</li>
                    <li>WhatsApp: +62 812-3456-7890</li>
                    <li>Instagram: @duniakarya.id</li>
                </ul>
                <div class="mt-3 flex gap-3">
                    <a href="#" class="hover:text-blue-400"><svg class="w-5 h-5" fill="currentColor"
                            viewBox="0 0 24 24">
                            <path
                                d="M22 4.01c0-1.1-.9-2-2-2h-16c-1.1 0-2 .9-2 2v16c0 .55.22 1.05.59 1.41.38.38.88.59 1.41.59h16c1.1 0 2-.9 2-2v-16zm-11 13h-3v-6h3v6zm-1.5-6.75c-.83 0-1.5-.67-1.5-1.5s.67-1.5 1.5-1.5 1.5.67 1.5 1.5-.67 1.5-1.5 1.5zm9.5 6.75h-3v-3c0-.83-.67-1.5-1.5-1.5S14 13.17 14 14v3h-3v-6h3v.75c.42-.58 1.12-.96 2-.96 1.38 0 2.5 1.12 2.5 2.5v3.71z" />
                        </svg></a>
                    <a href="#" class="hover:text-blue-400"><svg class="w-5 h-5" fill="currentColor"
                            viewBox="0 0 24 24">
                            <path
                                d="M22.23 5.924c-.793.352-1.646.59-2.542.696a4.435 4.435 0 001.951-2.45 8.775 8.775 0 01-2.794 1.07 4.418 4.418 0 00-7.527 4.027 12.548 12.548 0 01-9.112-4.616 4.417 4.417 0 001.366 5.9 4.403 4.403 0 01-2.002-.554v.056a4.418 4.418 0 003.544 4.33 4.41 4.41 0 01-1.994.076 4.42 4.42 0 004.124 3.066 8.867 8.867 0 01-6.545 1.828 12.515 12.515 0 006.794 1.993c8.15 0 12.6-6.752 12.6-12.6l-.014-.574a8.967 8.967 0 002.209-2.282z" />
                        </svg></a>
                </div>
            </div>

        </div>

        <!-- Copyright -->
        <div class="mt-10 border-t border-gray-700 pt-4 text-center text-sm text-gray-400">
            &copy; 2025 Dunia Karya. All rights reserved.
        </div>
    </footer>
