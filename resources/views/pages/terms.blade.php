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
</style>
@endpush
@section('content')
@section('meta')
<meta name="description" content="Syarat dan ketentuan penggunaan layanan, produk, dan website Dunia Karya.">
<meta name="keywords" content="terms and conditions, syarat ketentuan">
<meta name="author" content="Dunia Karya">

<meta property="og:title" content="Syarat dan Ketentuan - Dunia Karya">
<meta property="og:description" content="Baca syarat dan ketentuan penggunaan layanan Dunia Karya.">
<meta property="og:image" content="{{ asset('img/og/og-banner-term-and-condition.png') }}">
@endsection

<div class="bg-gradient-to-b from-gray-50 to-white min-h-screen">
    <!-- Hero Section -->
    <div class="relative bg-white border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-5 py-20 text-center">
            <div class="animate-fade-in-up">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">
                    Syarat dan <span class="bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent">Ketentuan</span>
                </h1>
                <p class="text-lg md:text-xl text-gray-600 max-w-2xl mx-auto leading-relaxed">
                    Harap baca syarat dan ketentuan ini dengan seksama sebelum menggunakan layanan kami.
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
                Dengan mengakses dan menggunakan platform Dunia Karya, Anda menyetujui untuk terikat dengan syarat dan ketentuan berikut. Jika Anda tidak setuju dengan ketentuan ini, mohon untuk tidak menggunakan layanan kami.
            </p>
        </div>

        <div class="prose max-w-none">
            <!-- Section 1 -->
            <div class="mb-10 section-item">
                <h2 class="text-2xl font-bold mb-4 text-[#0A1E58] border-b-2 border-blue-600 pb-2">1. Definisi</h2>
                <div class="text-gray-700 leading-relaxed space-y-3">
                    <p>Dalam syarat dan ketentuan ini:</p>
                    <ul class="list-disc ml-6 space-y-2">
                        <li><strong>"Platform"</strong> mengacu pada website Dunia Karya dan semua layanan terkait.</li>
                        <li><strong>"Pengguna"</strong> adalah setiap individu atau entitas yang mengakses atau menggunakan Platform.</li>
                        <li><strong>"Produk Digital"</strong> adalah semua konten, template, software, atau materi digital yang dijual melalui Platform.</li>
                        <li><strong>"Penjual"</strong> adalah pihak yang menjual Produk Digital melalui Platform.</li>
                        <li><strong>"Pembeli"</strong> adalah Pengguna yang melakukan pembelian Produk Digital.</li>
                    </ul>
                </div>
            </div>

            <!-- Section 2 -->
            <div class="mb-10 section-item">
                <h2 class="text-2xl font-bold mb-4 text-[#0A1E58] border-b-2 border-blue-600 pb-2">2. Pendaftaran Akun</h2>
                <div class="text-gray-700 leading-relaxed space-y-3">
                    <p>Untuk menggunakan layanan tertentu di Platform, Anda harus membuat akun dengan ketentuan:</p>
                    <ul class="list-disc ml-6 space-y-2">
                        <li>Anda harus berusia minimal 18 tahun atau memiliki izin dari orang tua/wali.</li>
                        <li>Informasi yang Anda berikan harus akurat, lengkap, dan terkini.</li>
                        <li>Anda bertanggung jawab untuk menjaga kerahasiaan kata sandi akun Anda.</li>
                        <li>Anda bertanggung jawab atas semua aktivitas yang terjadi di bawah akun Anda.</li>
                        <li>Anda harus segera memberi tahu kami jika terjadi penggunaan tidak sah atas akun Anda.</li>
                        <li>Kami berhak menangguhkan atau menghapus akun yang melanggar ketentuan ini.</li>
                    </ul>
                </div>
            </div>

            <!-- Section 3 -->
            <div class="mb-10">
                <h2 class="text-2xl font-bold mb-4 text-[#0A1E58] border-b-2 border-blue-600 pb-2">3. Pembelian dan Pembayaran</h2>
                <div class="text-gray-700 leading-relaxed space-y-3">
                    <h3 class="text-lg font-semibold text-gray-900 mt-4">3.1 Harga dan Ketersediaan</h3>
                    <ul class="list-disc ml-6 space-y-2">
                        <li>Semua harga yang ditampilkan dalam Rupiah (IDR) dan sudah termasuk pajak yang berlaku.</li>
                        <li>Kami berhak mengubah harga kapan saja tanpa pemberitahuan sebelumnya.</li>
                        <li>Harga yang berlaku adalah harga pada saat transaksi diselesaikan.</li>
                    </ul>

                    <h3 class="text-lg font-semibold text-gray-900 mt-4">3.2 Metode Pembayaran</h3>
                    <ul class="list-disc ml-6 space-y-2">
                        <li>Pembayaran diproses melalui Midtrans, penyedia payment gateway terpercaya.</li>
                        <li>Metode pembayaran yang tersedia: Transfer Bank, E-Wallet, Kartu Kredit/Debit, dan Gerai Retail.</li>
                        <li>Transaksi dianggap selesai setelah pembayaran dikonfirmasi oleh sistem.</li>
                    </ul>

                    <h3 class="text-lg font-semibold text-gray-900 mt-4">3.3 Konfirmasi Pesanan</h3>
                    <ul class="list-disc ml-6 space-y-2">
                        <li>Setelah pembayaran berhasil, Anda akan menerima email konfirmasi.</li>
                        <li>Akses ke produk digital akan tersedia segera setelah pembayaran dikonfirmasi.</li>
                    </ul>
                </div>
            </div>

            <!-- Section 4 -->
            <div class="mb-10">
                <h2 class="text-2xl font-bold mb-4 text-[#0A1E58] border-b-2 border-blue-600 pb-2">4. Lisensi dan Hak Kekayaan Intelektual</h2>
                <div class="text-gray-700 leading-relaxed space-y-3">
                    <h3 class="text-lg font-semibold text-gray-900 mt-4">4.1 Kepemilikan</h3>
                    <p>Semua Produk Digital yang dijual melalui Platform tetap menjadi hak kekayaan intelektual dari Penjual atau pemilik lisensi asli.</p>

                    <h3 class="text-lg font-semibold text-gray-900 mt-4">4.2 Lisensi Penggunaan</h3>
                    <p>Dengan membeli Produk Digital, Anda diberikan lisensi non-eksklusif, tidak dapat dipindahtangankan untuk:</p>
                    <ul class="list-disc ml-6 space-y-2">
                        <li>Mengunduh dan menggunakan produk untuk keperluan pribadi atau komersial sesuai dengan jenis lisensi yang dibeli.</li>
                        <li>Memodifikasi produk untuk kebutuhan proyek Anda (jika diizinkan oleh lisensi).</li>
                    </ul>

                    <h3 class="text-lg font-semibold text-gray-900 mt-4">4.3 Pembatasan</h3>
                    <p>Anda TIDAK diperbolehkan untuk:</p>
                    <ul class="list-disc ml-6 space-y-2">
                        <li>Mendistribusikan, menjual kembali, atau membagikan produk kepada pihak ketiga.</li>
                        <li>Mengklaim produk sebagai karya Anda sendiri.</li>
                        <li>Menggunakan produk untuk tujuan ilegal atau melanggar hukum.</li>
                        <li>Menghapus atau mengubah copyright notice atau watermark dari produk.</li>
                    </ul>
                </div>
            </div>

            <!-- Section 5 -->
            <div class="mb-10">
                <h2 class="text-2xl font-bold mb-4 text-[#0A1E58] border-b-2 border-blue-600 pb-2">5. Pengembalian Dana (Refund)</h2>
                <div class="text-gray-700 leading-relaxed space-y-3">
                    <h3 class="text-lg font-semibold text-gray-900 mt-4">5.1 Kebijakan Refund</h3>
                    <p>Kami menawarkan garansi uang kembali 100% dalam waktu 7 hari setelah pembelian jika:</p>
                    <ul class="list-disc ml-6 space-y-2">
                        <li>Produk tidak sesuai dengan deskripsi yang tertera.</li>
                        <li>Produk mengalami kerusakan atau error yang tidak dapat diperbaiki.</li>
                        <li>File produk tidak dapat diunduh atau diakses.</li>
                    </ul>

                    <h3 class="text-lg font-semibold text-gray-900 mt-4">5.2 Pengecualian</h3>
                    <p>Refund TIDAK berlaku jika:</p>
                    <ul class="list-disc ml-6 space-y-2">
                        <li>Anda telah mengunduh atau mengakses file produk secara penuh.</li>
                        <li>Permintaan refund diajukan setelah 7 hari dari tanggal pembelian.</li>
                        <li>Alasan refund tidak sesuai dengan kebijakan kami.</li>
                    </ul>

                    <h3 class="text-lg font-semibold text-gray-900 mt-4">5.3 Proses Refund</h3>
                    <p>Dana akan dikembalikan ke metode pembayaran yang sama dalam waktu 3-7 hari kerja setelah permintaan refund disetujui.</p>
                </div>
            </div>

            <!-- Section 6 -->
            <div class="mb-10">
                <h2 class="text-2xl font-bold mb-4 text-[#0A1E58] border-b-2 border-blue-600 pb-2">6. Larangan Penggunaan</h2>
                <div class="text-gray-700 leading-relaxed space-y-3">
                    <p>Anda setuju untuk TIDAK:</p>
                    <ul class="list-disc ml-6 space-y-2">
                        <li>Menggunakan Platform untuk tujuan ilegal atau melanggar hukum yang berlaku.</li>
                        <li>Mengunggah atau mendistribusikan virus, malware, atau kode berbahaya lainnya.</li>
                        <li>Melakukan aktivitas yang dapat merusak, menonaktifkan, atau membebani Platform.</li>
                        <li>Mengakses akun pengguna lain tanpa izin.</li>
                        <li>Melakukan scraping, crawling, atau pengambilan data secara otomatis.</li>
                        <li>Menyalahgunakan sistem pembayaran atau melakukan penipuan.</li>
                    </ul>
                </div>
            </div>

            <!-- Section 7 -->
            <div class="mb-10">
                <h2 class="text-2xl font-bold mb-4 text-[#0A1E58] border-b-2 border-blue-600 pb-2">7. Penafian dan Batasan Tanggung Jawab</h2>
                <div class="text-gray-700 leading-relaxed space-y-3">
                    <h3 class="text-lg font-semibold text-gray-900 mt-4">7.1 Penafian</h3>
                    <ul class="list-disc ml-6 space-y-2">
                        <li>Platform dan semua produk disediakan "sebagaimana adanya" tanpa jaminan apapun.</li>
                        <li>Kami tidak menjamin bahwa Platform akan selalu tersedia, aman, atau bebas dari kesalahan.</li>
                        <li>Kami tidak bertanggung jawab atas kerugian yang timbul dari penggunaan atau ketidakmampuan menggunakan Platform.</li>
                    </ul>

                    <h3 class="text-lg font-semibold text-gray-900 mt-4">7.2 Batasan Tanggung Jawab</h3>
                    <p>Dalam keadaan apapun, Dunia Karya tidak bertanggung jawab atas:</p>
                    <ul class="list-disc ml-6 space-y-2">
                        <li>Kerugian tidak langsung, insidental, atau konsekuensial.</li>
                        <li>Kehilangan data, keuntungan, atau reputasi.</li>
                        <li>Gangguan layanan atau downtime.</li>
                    </ul>
                </div>
            </div>

            <!-- Section 8 -->
            <div class="mb-10">
                <h2 class="text-2xl font-bold mb-4 text-[#0A1E58] border-b-2 border-blue-600 pb-2">8. Perubahan Syarat dan Ketentuan</h2>
                <div class="text-gray-700 leading-relaxed space-y-3">
                    <p>Kami berhak untuk mengubah, memodifikasi, atau memperbarui syarat dan ketentuan ini kapan saja tanpa pemberitahuan sebelumnya. Perubahan akan berlaku segera setelah dipublikasikan di halaman ini. Penggunaan Platform setelah perubahan dianggap sebagai penerimaan terhadap syarat dan ketentuan yang baru.</p>
                </div>
            </div>

            <!-- Section 9 -->
            <div class="mb-10">
                <h2 class="text-2xl font-bold mb-4 text-[#0A1E58] border-b-2 border-blue-600 pb-2">9. Hukum yang Berlaku</h2>
                <div class="text-gray-700 leading-relaxed space-y-3">
                    <p>Syarat dan ketentuan ini diatur dan ditafsirkan sesuai dengan hukum Republik Indonesia. Setiap perselisihan yang timbul akan diselesaikan melalui Pengadilan Negeri Jakarta Selatan.</p>
                </div>
            </div>

            <!-- Section 10 -->
            <div class="mb-10">
                <h2 class="text-2xl font-bold mb-4 text-[#0A1E58] border-b-2 border-blue-600 pb-2">10. Kontak</h2>
                <div class="text-gray-700 leading-relaxed space-y-3">
                    <p>Jika Anda memiliki pertanyaan tentang Syarat dan Ketentuan ini, silakan hubungi kami:</p>
                    <ul class="list-none ml-0 space-y-2">
                        <li><strong>Email:</strong> support@duniakarya.com</li>
                        <li><strong>WhatsApp:</strong> +62 813 9445 4900</li>
                        <li><strong>Jam Operasional:</strong> Senin - Jumat, 09:00 - 17:00 WIB</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Acceptance Notice -->
        <div class="bg-gradient-to-r from-blue-600 to-blue-800 rounded-2xl p-8 text-white mt-12">
            <h3 class="text-xl font-bold mb-3">Penerimaan Syarat dan Ketentuan</h3>
            <p class="text-blue-100">
                Dengan menggunakan Platform Dunia Karya, Anda menyatakan bahwa Anda telah membaca, memahami, dan menyetujui untuk terikat dengan Syarat dan Ketentuan ini.
            </p>
        </div>
    </div>
</div>
@endsection
