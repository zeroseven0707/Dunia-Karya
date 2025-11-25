@extends('layouts.app')

@section('content')
<div class="bg-white">
    <!-- Hero Section -->
    <div class="bg-[#0A1E58] text-white py-16 text-center px-4">
        <h1 class="text-4xl md:text-5xl font-bold mb-4">Pertanyaan yang Sering Diajukan</h1>
        <p class="text-lg md:text-xl text-blue-200 max-w-2xl mx-auto">
            Temukan jawaban atas pertanyaan umum seputar pembelian, pembayaran, dan penggunaan produk digital kami.
        </p>
    </div>

    <div class="max-w-4xl mx-auto px-5 py-16">
        <!-- Category: Pembelian & Pembayaran -->
        <div class="mb-12">
            <h2 class="text-2xl font-bold mb-6 text-[#0A1E58] border-b-2 border-blue-600 pb-2">💳 Pembelian & Pembayaran</h2>
            <div class="space-y-4">
                <!-- FAQ Item 1 -->
                <div class="border rounded-lg p-5 shadow-sm hover:shadow-md transition-shadow bg-white" x-data="{ open: false }">
                    <button @click="open = !open" class="flex justify-between w-full font-semibold text-left items-start">
                        <span class="pr-4">Bagaimana cara membeli produk di Dunia Karya?</span>
                        <svg :class="{'rotate-180': open}" class="w-5 h-5 transition-transform flex-shrink-0 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div x-show="open" x-transition class="mt-4 text-gray-600 leading-relaxed" style="display: none;">
                        <p>Untuk membeli produk, ikuti langkah berikut:</p>
                        <ol class="list-decimal ml-5 mt-2 space-y-1">
                            <li>Pilih produk yang Anda inginkan dari katalog</li>
                            <li>Klik tombol "Tambahkan ke Keranjang" atau "Beli Sekarang"</li>
                            <li>Jika sudah login, Anda akan diarahkan ke halaman checkout</li>
                            <li>Klik "Bayar Sekarang" dan pilih metode pembayaran melalui Midtrans</li>
                            <li>Selesaikan pembayaran sesuai instruksi</li>
                            <li>Setelah pembayaran berhasil, produk dapat diakses di halaman "Pembelian Saya"</li>
                        </ol>
                    </div>
                </div>

                <!-- FAQ Item 2 -->
                <div class="border rounded-lg p-5 shadow-sm hover:shadow-md transition-shadow bg-white" x-data="{ open: false }">
                    <button @click="open = !open" class="flex justify-between w-full font-semibold text-left items-start">
                        <span class="pr-4">Metode pembayaran apa saja yang tersedia?</span>
                        <svg :class="{'rotate-180': open}" class="w-5 h-5 transition-transform flex-shrink-0 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div x-show="open" x-transition class="mt-4 text-gray-600 leading-relaxed" style="display: none;">
                        <p>Kami menggunakan Midtrans sebagai payment gateway yang mendukung berbagai metode pembayaran:</p>
                        <ul class="list-disc ml-5 mt-2 space-y-1">
                            <li><strong>Transfer Bank:</strong> BCA, Mandiri, BNI, BRI, Permata, dan bank lainnya</li>
                            <li><strong>E-Wallet:</strong> GoPay, OVO, DANA, ShopeePay, LinkAja</li>
                            <li><strong>Kartu Kredit/Debit:</strong> Visa, Mastercard, JCB</li>
                            <li><strong>Gerai Retail:</strong> Indomaret, Alfamart</li>
                        </ul>
                    </div>
                </div>

                <!-- FAQ Item 3 -->
                <div class="border rounded-lg p-5 shadow-sm hover:shadow-md transition-shadow bg-white" x-data="{ open: false }">
                    <button @click="open = !open" class="flex justify-between w-full font-semibold text-left items-start">
                        <span class="pr-4">Berapa lama waktu yang dibutuhkan untuk pembayaran diproses?</span>
                        <svg :class="{'rotate-180': open}" class="w-5 h-5 transition-transform flex-shrink-0 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div x-show="open" x-transition class="mt-4 text-gray-600 leading-relaxed" style="display: none;">
                        <p>Waktu pemrosesan pembayaran bervariasi tergantung metode yang dipilih:</p>
                        <ul class="list-disc ml-5 mt-2 space-y-1">
                            <li><strong>E-Wallet & Kartu Kredit:</strong> Instan (beberapa detik)</li>
                            <li><strong>Transfer Bank:</strong> 5-15 menit setelah transfer berhasil</li>
                            <li><strong>Gerai Retail:</strong> 5-15 menit setelah pembayaran di kasir</li>
                        </ul>
                        <p class="mt-2">Setelah pembayaran dikonfirmasi, Anda akan langsung mendapat akses ke produk yang dibeli.</p>
                    </div>
                </div>

                <!-- FAQ Item 4 -->
                <div class="border rounded-lg p-5 shadow-sm hover:shadow-md transition-shadow bg-white" x-data="{ open: false }">
                    <button @click="open = !open" class="flex justify-between w-full font-semibold text-left items-start">
                        <span class="pr-4">Apakah saya harus membuat akun untuk membeli produk?</span>
                        <svg :class="{'rotate-180': open}" class="w-5 h-5 transition-transform flex-shrink-0 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div x-show="open" x-transition class="mt-4 text-gray-600 leading-relaxed" style="display: none;">
                        <p>Ya, Anda harus membuat akun dan login terlebih dahulu untuk melakukan pembelian. Hal ini diperlukan agar:</p>
                        <ul class="list-disc ml-5 mt-2 space-y-1">
                            <li>Kami dapat menyimpan riwayat pembelian Anda</li>
                            <li>Anda dapat mengakses produk yang telah dibeli kapan saja</li>
                            <li>Kami dapat memberikan notifikasi terkait pesanan Anda</li>
                            <li>Keamanan transaksi terjaga dengan baik</li>
                        </ul>
                        <p class="mt-2">Pendaftaran akun gratis dan hanya membutuhkan waktu kurang dari 1 menit!</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Category: Produk & Download -->
        <div class="mb-12">
            <h2 class="text-2xl font-bold mb-6 text-[#0A1E58] border-b-2 border-blue-600 pb-2">📦 Produk & Akses</h2>
            <div class="space-y-4">
                <!-- FAQ Item 5 -->
                <div class="border rounded-lg p-5 shadow-sm hover:shadow-md transition-shadow bg-white" x-data="{ open: false }">
                    <button @click="open = !open" class="flex justify-between w-full font-semibold text-left items-start">
                        <span class="pr-4">Bagaimana cara mengakses produk yang sudah saya beli?</span>
                        <svg :class="{'rotate-180': open}" class="w-5 h-5 transition-transform flex-shrink-0 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div x-show="open" x-transition class="mt-4 text-gray-600 leading-relaxed" style="display: none;">
                        <p>Setelah pembayaran berhasil, Anda dapat mengakses produk dengan cara:</p>
                        <ol class="list-decimal ml-5 mt-2 space-y-1">
                            <li>Login ke akun Anda</li>
                            <li>Klik menu "Pembelian Saya" di profil Anda</li>
                            <li>Pilih produk yang ingin diakses</li>
                            <li>Klik tombol "Akses Produk" untuk membuka link/download produk</li>
                        </ol>
                        <p class="mt-2">Produk dapat diakses selamanya tanpa batas waktu.</p>
                    </div>
                </div>

                <!-- FAQ Item 6 -->
                <div class="border rounded-lg p-5 shadow-sm hover:shadow-md transition-shadow bg-white" x-data="{ open: false }">
                    <button @click="open = !open" class="flex justify-between w-full font-semibold text-left items-start">
                        <span class="pr-4">Apakah produk yang dibeli memiliki batas waktu akses?</span>
                        <svg :class="{'rotate-180': open}" class="w-5 h-5 transition-transform flex-shrink-0 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div x-show="open" x-transition class="mt-4 text-gray-600 leading-relaxed" style="display: none;">
                        <p>Tidak ada batas waktu! Setelah Anda membeli produk, Anda memiliki akses selamanya. Anda dapat mengunduh atau mengakses produk kapan saja melalui halaman "Pembelian Saya".</p>
                    </div>
                </div>

                <!-- FAQ Item 7 -->
                <div class="border rounded-lg p-5 shadow-sm hover:shadow-md transition-shadow bg-white" x-data="{ open: false }">
                    <button @click="open = !open" class="flex justify-between w-full font-semibold text-left items-start">
                        <span class="pr-4">Apakah saya bisa mendapatkan update produk gratis?</span>
                        <svg :class="{'rotate-180': open}" class="w-5 h-5 transition-transform flex-shrink-0 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div x-show="open" x-transition class="mt-4 text-gray-600 leading-relaxed" style="display: none;">
                        <p>Ya! Sebagian besar produk kami mendapatkan update gratis. Ketika ada update tersedia, Anda akan mendapatkan notifikasi melalui email dan dapat mengunduh versi terbaru dari halaman "Pembelian Saya".</p>
                    </div>
                </div>

                <!-- FAQ Item 8 -->
                <div class="border rounded-lg p-5 shadow-sm hover:shadow-md transition-shadow bg-white" x-data="{ open: false }">
                    <button @click="open = !open" class="flex justify-between w-full font-semibold text-left items-start">
                        <span class="pr-4">Apakah produk dilengkapi dengan dokumentasi atau panduan?</span>
                        <svg :class="{'rotate-180': open}" class="w-5 h-5 transition-transform flex-shrink-0 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div x-show="open" x-transition class="mt-4 text-gray-600 leading-relaxed" style="display: none;">
                        <p>Ya, setiap produk dilengkapi dengan dokumentasi lengkap yang mencakup:</p>
                        <ul class="list-disc ml-5 mt-2 space-y-1">
                            <li>Panduan instalasi/setup</li>
                            <li>Cara penggunaan fitur-fitur utama</li>
                            <li>FAQ khusus produk</li>
                            <li>Video tutorial (untuk produk tertentu)</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Category: Refund & Garansi -->
        <div class="mb-12">
            <h2 class="text-2xl font-bold mb-6 text-[#0A1E58] border-b-2 border-blue-600 pb-2">🔄 Refund & Garansi</h2>
            <div class="space-y-4">
                <!-- FAQ Item 9 -->
                <div class="border rounded-lg p-5 shadow-sm hover:shadow-md transition-shadow bg-white" x-data="{ open: false }">
                    <button @click="open = !open" class="flex justify-between w-full font-semibold text-left items-start">
                        <span class="pr-4">Apakah ada garansi uang kembali?</span>
                        <svg :class="{'rotate-180': open}" class="w-5 h-5 transition-transform flex-shrink-0 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div x-show="open" x-transition class="mt-4 text-gray-600 leading-relaxed" style="display: none;">
                        <p>Ya, kami memberikan garansi uang kembali 100% dalam waktu 7 hari jika:</p>
                        <ul class="list-disc ml-5 mt-2 space-y-1">
                            <li>Produk tidak sesuai dengan deskripsi yang tertera</li>
                            <li>Produk mengalami kerusakan atau error yang tidak dapat diperbaiki</li>
                            <li>File produk tidak dapat diunduh atau diakses</li>
                        </ul>
                        <p class="mt-2">Untuk mengajukan refund, hubungi tim support kami melalui WhatsApp atau email dengan menyertakan bukti pembelian dan detail masalah yang dialami.</p>
                    </div>
                </div>

                <!-- FAQ Item 10 -->
                <div class="border rounded-lg p-5 shadow-sm hover:shadow-md transition-shadow bg-white" x-data="{ open: false }">
                    <button @click="open = !open" class="flex justify-between w-full font-semibold text-left items-start">
                        <span class="pr-4">Bagaimana cara mengajukan refund?</span>
                        <svg :class="{'rotate-180': open}" class="w-5 h-5 transition-transform flex-shrink-0 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div x-show="open" x-transition class="mt-4 text-gray-600 leading-relaxed" style="display: none;">
                        <p>Untuk mengajukan refund:</p>
                        <ol class="list-decimal ml-5 mt-2 space-y-1">
                            <li>Hubungi tim support kami via WhatsApp (+62 813 9445 4900) atau email (support@duniakarya.com)</li>
                            <li>Sertakan Order ID dan bukti pembelian</li>
                            <li>Jelaskan alasan pengajuan refund dengan detail</li>
                            <li>Tim kami akan merespon dalam 1x24 jam</li>
                            <li>Jika disetujui, dana akan dikembalikan dalam 3-7 hari kerja</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <!-- Category: Dukungan & Bantuan -->
        <div class="mb-12">
            <h2 class="text-2xl font-bold mb-6 text-[#0A1E58] border-b-2 border-blue-600 pb-2">💬 Dukungan & Bantuan</h2>
            <div class="space-y-4">
                <!-- FAQ Item 11 -->
                <div class="border rounded-lg p-5 shadow-sm hover:shadow-md transition-shadow bg-white" x-data="{ open: false }">
                    <button @click="open = !open" class="flex justify-between w-full font-semibold text-left items-start">
                        <span class="pr-4">Bagaimana cara menghubungi customer support?</span>
                        <svg :class="{'rotate-180': open}" class="w-5 h-5 transition-transform flex-shrink-0 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div x-show="open" x-transition class="mt-4 text-gray-600 leading-relaxed" style="display: none;">
                        <p>Anda dapat menghubungi tim support kami melalui:</p>
                        <ul class="list-disc ml-5 mt-2 space-y-1">
                            <li><strong>WhatsApp:</strong> +62 813 9445 4900 (Respon cepat, jam kerja)</li>
                            <li><strong>Email:</strong> support@duniakarya.com (Respon dalam 1x24 jam)</li>
                        </ul>
                        <p class="mt-2"><strong>Jam Operasional:</strong> Senin - Jumat, 09:00 - 17:00 WIB</p>
                    </div>
                </div>

                <!-- FAQ Item 12 -->
                <div class="border rounded-lg p-5 shadow-sm hover:shadow-md transition-shadow bg-white" x-data="{ open: false }">
                    <button @click="open = !open" class="flex justify-between w-full font-semibold text-left items-start">
                        <span class="pr-4">Apakah ada support teknis untuk instalasi produk?</span>
                        <svg :class="{'rotate-180': open}" class="w-5 h-5 transition-transform flex-shrink-0 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div x-show="open" x-transition class="mt-4 text-gray-600 leading-relaxed" style="display: none;">
                        <p>Ya, kami menyediakan support teknis gratis untuk semua pembeli. Tim kami siap membantu Anda dengan:</p>
                        <ul class="list-disc ml-5 mt-2 space-y-1">
                            <li>Panduan instalasi dan konfigurasi</li>
                            <li>Troubleshooting masalah teknis</li>
                            <li>Konsultasi penggunaan fitur</li>
                            <li>Customisasi dasar (untuk produk tertentu)</li>
                        </ul>
                    </div>
                </div>

                <!-- FAQ Item 13 -->
                <div class="border rounded-lg p-5 shadow-sm hover:shadow-md transition-shadow bg-white" x-data="{ open: false }">
                    <button @click="open = !open" class="flex justify-between w-full font-semibold text-left items-start">
                        <span class="pr-4">Apakah saya bisa request fitur khusus atau custom?</span>
                        <svg :class="{'rotate-180': open}" class="w-5 h-5 transition-transform flex-shrink-0 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div x-show="open" x-transition class="mt-4 text-gray-600 leading-relaxed" style="display: none;">
                        <p>Tentu! Kami menerima request untuk customisasi produk atau pembuatan produk khusus sesuai kebutuhan Anda. Silakan hubungi tim kami melalui WhatsApp atau email untuk mendiskusikan kebutuhan dan mendapatkan penawaran harga.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- CTA Section -->
        <div class="bg-gradient-to-r from-blue-600 to-blue-800 rounded-2xl p-8 text-center text-white mt-12">
            <h3 class="text-2xl font-bold mb-3">Masih Ada Pertanyaan?</h3>
            <p class="mb-6 text-blue-100">Tim support kami siap membantu Anda!</p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="https://wa.me/6281394454900" target="_blank" class="inline-block bg-green-500 text-white font-semibold px-6 py-3 rounded-lg hover:bg-green-600 transition-colors">
                    Chat via WhatsApp
                </a>
                <a href="mailto:support@duniakarya.com" class="inline-block bg-white text-blue-600 font-semibold px-6 py-3 rounded-lg hover:bg-gray-100 transition-colors">
                    Kirim Email
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
