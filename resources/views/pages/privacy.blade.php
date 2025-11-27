@extends('layouts.app')
@push('styles')
    <style>
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .animate-fade-in-up {
        animation: fadeInUp 0.6s ease-out forwards;
        opacity: 0;
    }

    .section-item {
        opacity: 0;
        animation: fadeInUp 0.6s ease-out forwards;
    }

    .section-item:nth-child(1) { animation-delay: 0.1s; }
    .section-item:nth-child(2) { animation-delay: 0.15s; }
    .section-item:nth-child(3) { animation-delay: 0.2s; }
    .section-item:nth-child(4) { animation-delay: 0.25s; }
    .section-item:nth-child(5) { animation-delay: 0.3s; }
    .section-item:nth-child(6) { animation-delay: 0.35s; }
    .section-item:nth-child(7) { animation-delay: 0.4s; }
    .section-item:nth-child(8) { animation-delay: 0.45s; }
    .section-item:nth-child(9) { animation-delay: 0.5s; }
    .section-item:nth-child(10) { animation-delay: 0.55s; }
    .section-item:nth-child(11) { animation-delay: 0.6s; }
</style>
@endpush
@section('content')
@section('meta')
<meta name="description" content="Kebijakan privasi Dunia Karya dalam mengelola data pengguna dan keamanan informasi.">
<meta name="keywords" content="privacy policy, kebijakan privasi, keamanan data">
<meta name="author" content="Dunia Karya">

<meta property="og:title" content="Kebijakan Privasi - Dunia Karya">
<meta property="og:description" content="Pelajari bagaimana Dunia Karya melindungi data dan privasi Anda.">
<meta property="og:image" content="{{ asset('img/og/og-banner-privacy-policy.png') }}">
@endsection

<div class="bg-gradient-to-b from-gray-50 to-white min-h-screen">
    <!-- Hero Section -->
    <div class="relative bg-white border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-5 py-20 text-center">
            <div class="animate-fade-in-up">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">
                    Kebijakan <span class="bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent">Privasi</span>
                </h1>
                <p class="text-lg md:text-xl text-gray-600 max-w-2xl mx-auto leading-relaxed">
                    Kami menghargai privasi Anda dan berkomitmen untuk melindungi data pribadi Anda.
                </p>
            </div>
        </div>
    </div>

    <div class="max-w-4xl mx-auto px-5 py-16">
        <div class="bg-blue-50 border-l-4 border-blue-600 p-6 mb-8 rounded-r-lg">
            <p class="text-sm text-gray-700">
                <strong>Terakhir diperbarui:</strong> 25 November 2024
            </p>
            <p class="text-sm text-gray-700 mt-2">
                Kebijakan Privasi ini menjelaskan bagaimana Dunia Karya mengumpulkan, menggunakan, dan melindungi informasi pribadi Anda saat menggunakan layanan kami.
            </p>
        </div>

        <div class="prose max-w-none">
            <!-- Section 1 -->
            <div class="mb-10 section-item">
                <h2 class="text-2xl font-bold mb-4 text-gray-900">1. Informasi yang Kami Kumpulkan</h2>
                <div class="text-gray-700 leading-relaxed space-y-3">
                    <h3 class="text-lg font-semibold text-gray-900 mt-4">1.1 Informasi yang Anda Berikan</h3>
                    <p>Kami mengumpulkan informasi yang Anda berikan secara langsung kepada kami, termasuk:</p>
                    <ul class="list-disc ml-6 space-y-2">
                        <li><strong>Informasi Akun:</strong> Nama, alamat email, kata sandi (terenkripsi), dan nomor telepon.</li>
                        <li><strong>Informasi Pembayaran:</strong> Detail transaksi melalui Midtrans (kami tidak menyimpan informasi kartu kredit lengkap).</li>
                        <li><strong>Informasi Profil:</strong> Foto profil, preferensi, dan informasi tambahan yang Anda pilih untuk dibagikan.</li>
                        <li><strong>Komunikasi:</strong> Pesan yang Anda kirimkan kepada kami melalui email, WhatsApp, atau formulir kontak.</li>
                    </ul>

                    <h3 class="text-lg font-semibold text-gray-900 mt-4">1.2 Informasi yang Dikumpulkan Secara Otomatis</h3>
                    <p>Saat Anda menggunakan Platform, kami secara otomatis mengumpulkan:</p>
                    <ul class="list-disc ml-6 space-y-2">
                        <li><strong>Data Log:</strong> Alamat IP, jenis browser, sistem operasi, halaman yang dikunjungi, dan waktu akses.</li>
                        <li><strong>Cookies:</strong> Informasi yang disimpan di perangkat Anda untuk meningkatkan pengalaman pengguna.</li>
                        <li><strong>Data Perangkat:</strong> Informasi tentang perangkat yang Anda gunakan untuk mengakses Platform.</li>
                        <li><strong>Data Penggunaan:</strong> Interaksi Anda dengan Platform, termasuk produk yang dilihat dan dibeli.</li>
                    </ul>

                    <h3 class="text-lg font-semibold text-gray-900 mt-4">1.3 Informasi dari Pihak Ketiga</h3>
                    <ul class="list-disc ml-6 space-y-2">
                        <li><strong>Login Sosial:</strong> Jika Anda login menggunakan Google, kami menerima informasi dasar profil Anda.</li>
                        <li><strong>Payment Gateway:</strong> Informasi transaksi dari Midtrans untuk memproses pembayaran.</li>
                    </ul>
                </div>
            </div>

            <!-- Section 2 -->
            <div class="mb-10">
                <h2 class="text-2xl font-bold mb-4 text-[#0A1E58] border-b-2 border-blue-600 pb-2">2. Bagaimana Kami Menggunakan Informasi Anda</h2>
                <div class="text-gray-700 leading-relaxed space-y-3">
                    <p>Kami menggunakan informasi yang dikumpulkan untuk:</p>
                    <ul class="list-disc ml-6 space-y-2">
                        <li><strong>Menyediakan Layanan:</strong> Memproses transaksi, mengirimkan produk digital, dan mengelola akun Anda.</li>
                        <li><strong>Komunikasi:</strong> Mengirimkan konfirmasi pesanan, update produk, dan merespons pertanyaan Anda.</li>
                        <li><strong>Peningkatan Layanan:</strong> Menganalisis penggunaan Platform untuk meningkatkan fitur dan pengalaman pengguna.</li>
                        <li><strong>Keamanan:</strong> Mendeteksi dan mencegah penipuan, penyalahgunaan, atau aktivitas ilegal.</li>
                        <li><strong>Marketing:</strong> Mengirimkan promosi, penawaran khusus, dan newsletter (dengan persetujuan Anda).</li>
                        <li><strong>Personalisasi:</strong> Menyesuaikan konten dan rekomendasi produk berdasarkan preferensi Anda.</li>
                        <li><strong>Kepatuhan Hukum:</strong> Mematuhi kewajiban hukum dan merespons permintaan dari pihak berwenang.</li>
                    </ul>
                </div>
            </div>

            <!-- Section 3 -->
            <div class="mb-10">
                <h2 class="text-2xl font-bold mb-4 text-[#0A1E58] border-b-2 border-blue-600 pb-2">3. Pembagian Informasi</h2>
                <div class="text-gray-700 leading-relaxed space-y-3">
                    <p>Kami TIDAK menjual informasi pribadi Anda kepada pihak ketiga. Kami hanya membagikan informasi dalam situasi berikut:</p>

                    <h3 class="text-lg font-semibold text-gray-900 mt-4">3.1 Penyedia Layanan</h3>
                    <p>Kami dapat membagikan informasi dengan penyedia layanan pihak ketiga yang membantu kami mengoperasikan Platform:</p>
                    <ul class="list-disc ml-6 space-y-2">
                        <li><strong>Payment Gateway:</strong> Midtrans untuk memproses pembayaran.</li>
                        <li><strong>Hosting:</strong> Penyedia server untuk menyimpan data.</li>
                        <li><strong>Email Service:</strong> Untuk mengirimkan email transaksional dan marketing.</li>
                        <li><strong>Analytics:</strong> Google Analytics untuk memahami penggunaan Platform.</li>
                    </ul>

                    <h3 class="text-lg font-semibold text-gray-900 mt-4">3.2 Kewajiban Hukum</h3>
                    <p>Kami dapat mengungkapkan informasi jika diwajibkan oleh hukum atau untuk:</p>
                    <ul class="list-disc ml-6 space-y-2">
                        <li>Mematuhi proses hukum atau permintaan pemerintah.</li>
                        <li>Melindungi hak, properti, atau keselamatan Dunia Karya, pengguna, atau publik.</li>
                        <li>Mendeteksi, mencegah, atau menangani penipuan atau masalah keamanan.</li>
                    </ul>

                    <h3 class="text-lg font-semibold text-gray-900 mt-4">3.3 Transfer Bisnis</h3>
                    <p>Jika Dunia Karya terlibat dalam merger, akuisisi, atau penjualan aset, informasi Anda dapat ditransfer sebagai bagian dari transaksi tersebut.</p>
                </div>
            </div>

            <!-- Section 4 -->
            <div class="mb-10">
                <h2 class="text-2xl font-bold mb-4 text-[#0A1E58] border-b-2 border-blue-600 pb-2">4. Keamanan Data</h2>
                <div class="text-gray-700 leading-relaxed space-y-3">
                    <p>Kami menerapkan langkah-langkah keamanan teknis dan organisasi untuk melindungi informasi Anda:</p>
                    <ul class="list-disc ml-6 space-y-2">
                        <li><strong>Enkripsi:</strong> Data sensitif dienkripsi saat transit menggunakan SSL/TLS.</li>
                        <li><strong>Password Hashing:</strong> Kata sandi disimpan menggunakan algoritma hashing yang aman.</li>
                        <li><strong>Akses Terbatas:</strong> Hanya personel yang berwenang yang memiliki akses ke data pribadi.</li>
                        <li><strong>Monitoring:</strong> Sistem kami dipantau secara berkala untuk mendeteksi aktivitas mencurigakan.</li>
                        <li><strong>Backup:</strong> Data di-backup secara teratur untuk mencegah kehilangan data.</li>
                    </ul>
                    <p class="mt-3 text-sm italic">
                        Namun, tidak ada metode transmisi melalui internet atau penyimpanan elektronik yang 100% aman. Kami tidak dapat menjamin keamanan absolut.
                    </p>
                </div>
            </div>

            <!-- Section 5 -->
            <div class="mb-10">
                <h2 class="text-2xl font-bold mb-4 text-[#0A1E58] border-b-2 border-blue-600 pb-2">5. Cookies dan Teknologi Pelacakan</h2>
                <div class="text-gray-700 leading-relaxed space-y-3">
                    <h3 class="text-lg font-semibold text-gray-900 mt-4">5.1 Apa itu Cookies?</h3>
                    <p>Cookies adalah file kecil yang disimpan di perangkat Anda saat Anda mengunjungi website. Kami menggunakan cookies untuk:</p>
                    <ul class="list-disc ml-6 space-y-2">
                        <li>Menjaga Anda tetap login.</li>
                        <li>Mengingat preferensi Anda.</li>
                        <li>Menganalisis penggunaan Platform.</li>
                        <li>Menyediakan konten yang dipersonalisasi.</li>
                    </ul>

                    <h3 class="text-lg font-semibold text-gray-900 mt-4">5.2 Jenis Cookies yang Kami Gunakan</h3>
                    <ul class="list-disc ml-6 space-y-2">
                        <li><strong>Essential Cookies:</strong> Diperlukan untuk fungsi dasar Platform.</li>
                        <li><strong>Performance Cookies:</strong> Membantu kami memahami bagaimana pengguna berinteraksi dengan Platform.</li>
                        <li><strong>Functional Cookies:</strong> Mengingat pilihan Anda untuk meningkatkan pengalaman.</li>
                        <li><strong>Marketing Cookies:</strong> Digunakan untuk menampilkan iklan yang relevan.</li>
                    </ul>

                    <h3 class="text-lg font-semibold text-gray-900 mt-4">5.3 Mengelola Cookies</h3>
                    <p>Anda dapat mengatur browser Anda untuk menolak cookies atau memberi tahu Anda saat cookies dikirim. Namun, beberapa fitur Platform mungkin tidak berfungsi dengan baik tanpa cookies.</p>
                </div>
            </div>

            <!-- Section 6 -->
            <div class="mb-10">
                <h2 class="text-2xl font-bold mb-4 text-[#0A1E58] border-b-2 border-blue-600 pb-2">6. Hak Anda</h2>
                <div class="text-gray-700 leading-relaxed space-y-3">
                    <p>Anda memiliki hak berikut terkait data pribadi Anda:</p>
                    <ul class="list-disc ml-6 space-y-2">
                        <li><strong>Akses:</strong> Meminta salinan data pribadi yang kami simpan tentang Anda.</li>
                        <li><strong>Koreksi:</strong> Meminta kami untuk memperbaiki data yang tidak akurat atau tidak lengkap.</li>
                        <li><strong>Penghapusan:</strong> Meminta penghapusan data pribadi Anda (dengan beberapa pengecualian).</li>
                        <li><strong>Pembatasan:</strong> Meminta pembatasan pemrosesan data Anda dalam kondisi tertentu.</li>
                        <li><strong>Portabilitas:</strong> Menerima data Anda dalam format yang terstruktur dan umum digunakan.</li>
                        <li><strong>Keberatan:</strong> Menolak pemrosesan data Anda untuk tujuan marketing langsung.</li>
                        <li><strong>Penarikan Persetujuan:</strong> Menarik persetujuan Anda kapan saja (tanpa mempengaruhi legalitas pemrosesan sebelumnya).</li>
                    </ul>
                    <p class="mt-3">
                        Untuk menggunakan hak-hak ini, silakan hubungi kami di <strong>support@duniakarya.com</strong>. Kami akan merespons permintaan Anda dalam waktu 30 hari.
                    </p>
                </div>
            </div>

            <!-- Section 7 -->
            <div class="mb-10">
                <h2 class="text-2xl font-bold mb-4 text-[#0A1E58] border-b-2 border-blue-600 pb-2">7. Penyimpanan Data</h2>
                <div class="text-gray-700 leading-relaxed space-y-3">
                    <p>Kami menyimpan informasi pribadi Anda selama:</p>
                    <ul class="list-disc ml-6 space-y-2">
                        <li>Akun Anda aktif atau selama diperlukan untuk menyediakan layanan.</li>
                        <li>Diperlukan untuk mematuhi kewajiban hukum, menyelesaikan perselisihan, atau menegakkan perjanjian.</li>
                    </ul>
                    <p class="mt-3">
                        Setelah periode penyimpanan berakhir, kami akan menghapus atau menganonimkan data Anda secara aman.
                    </p>
                </div>
            </div>

            <!-- Section 8 -->
            <div class="mb-10">
                <h2 class="text-2xl font-bold mb-4 text-[#0A1E58] border-b-2 border-blue-600 pb-2">8. Privasi Anak-Anak</h2>
                <div class="text-gray-700 leading-relaxed space-y-3">
                    <p>Platform kami tidak ditujukan untuk anak-anak di bawah usia 18 tahun. Kami tidak secara sengaja mengumpulkan informasi pribadi dari anak-anak. Jika Anda percaya bahwa kami telah mengumpulkan informasi dari anak di bawah umur, silakan hubungi kami segera.</p>
                </div>
            </div>

            <!-- Section 9 -->
            <div class="mb-10">
                <h2 class="text-2xl font-bold mb-4 text-[#0A1E58] border-b-2 border-blue-600 pb-2">9. Transfer Data Internasional</h2>
                <div class="text-gray-700 leading-relaxed space-y-3">
                    <p>Data Anda dapat ditransfer dan disimpan di server yang berlokasi di luar Indonesia. Kami memastikan bahwa transfer tersebut dilakukan sesuai dengan standar perlindungan data yang berlaku.</p>
                </div>
            </div>

            <!-- Section 10 -->
            <div class="mb-10">
                <h2 class="text-2xl font-bold mb-4 text-[#0A1E58] border-b-2 border-blue-600 pb-2">10. Perubahan Kebijakan Privasi</h2>
                <div class="text-gray-700 leading-relaxed space-y-3">
                    <p>Kami dapat memperbarui Kebijakan Privasi ini dari waktu ke waktu. Perubahan akan dipublikasikan di halaman ini dengan tanggal "Terakhir diperbarui" yang baru. Kami mendorong Anda untuk meninjau kebijakan ini secara berkala.</p>
                    <p class="mt-3">
                        Jika ada perubahan material, kami akan memberi tahu Anda melalui email atau pemberitahuan di Platform.
                    </p>
                </div>
            </div>

            <!-- Section 11 -->
            <div class="mb-10">
                <h2 class="text-2xl font-bold mb-4 text-[#0A1E58] border-b-2 border-blue-600 pb-2">11. Hubungi Kami</h2>
                <div class="text-gray-700 leading-relaxed space-y-3">
                    <p>Jika Anda memiliki pertanyaan, kekhawatiran, atau permintaan terkait Kebijakan Privasi ini, silakan hubungi kami:</p>
                    <ul class="list-none ml-0 space-y-2">
                        <li><strong>Email:</strong> support@duniakarya.com</li>
                        <li><strong>WhatsApp:</strong> +62 813 9445 4900</li>
                        <li><strong>Jam Operasional:</strong> Senin - Jumat, 09:00 - 17:00 WIB</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Trust Badge -->
        <div class="bg-gradient-to-r from-green-600 to-green-800 rounded-2xl p-8 text-white mt-12 text-center">
            <div class="flex items-center justify-center mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                </svg>
            </div>
            <h3 class="text-2xl font-bold mb-3">Komitmen Kami terhadap Privasi Anda</h3>
            <p class="text-green-100">
                Kami berkomitmen untuk melindungi dan menghormati privasi Anda. Data Anda aman bersama kami.
            </p>
        </div>
    </div>
</div>
@endsection
