<?php

namespace Database\Seeders;

use App\Models\Article;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $contents = [
            <<<'HTML'
            <h2>Menelusuri Asal Usul Tren Fashion Anak Tahun Ini</h2>
            <p>Musim ini menghadirkan kombinasi warna hangat dan motif retro. Tren ini muncul dari gabungan streetwear dan sentuhan vintage yang ramah untuk anak-anak.</p>
            <figure>
              <img src="https://placehold.co/1200x600?text=Fashion+Trends" alt="Fashion trends" style="width:100%;height:auto;border-radius:8px;">
              <figcaption style="font-size:0.9rem;color:#6b7280;margin-top:6px;">Ilustrasi tren fashion anak.</figcaption>
            </figure>
            <h3>Faktor pendorong</h3>
            <ul>
              <li>Kenyamanan bahan</li>
              <li>Pengaruh media sosial</li>
              <li>Kolaborasi brand</li>
            </ul>
            <blockquote>Desain yang baik adalah yang memikirkan anak sebagai pengguna utama — redaksi.</blockquote>
            <p>Dengan kombinasi ini, orang tua bisa memilih produk yang stylish sekaligus fungsional.</p>
            HTML
            ,
            <<<'HTML'
            <h2>Teknologi Pendidikan: Aplikasi Pembelajaran Interaktif</h2>
            <p>Aplikasi pembelajaran interaktif kini semakin canggih dengan penggunaan gamifikasi dan AI untuk menyesuaikan materi.</p>
            <p>Contoh fitur populer:</p>
            <ol>
              <li>Penilaian otomatis</li>
              <li>Konten adaptif</li>
              <li>Pelacakan perkembangan</li>
            </ol>
            <pre><code>function greet(name) {
              return `Hello, ${name}!`;
            }</code></pre>
            <p>Perkembangan ini membantu guru fokus pada pembimbingan, bukan sekadar administrasi.</p>
            HTML
            ,
            <<<'HTML'
            <h2>Wisata Lokal: Eksplorasi Desa di Pinggiran Kota</h2>
            <p>Menjelajah desa di pinggiran kota memberikan pengalaman otentik: kuliner tradisional, kearifan lokal, dan pemandangan yang asri.</p>
            <figure>
              <img src="https://placehold.co/1200x600?text=Desa+Asri" alt="Desa asri" style="width:100%;height:auto;border-radius:8px;">
            </figure>
            <h3>Itinerary singkat (2 hari)</h3>
            <ul>
              <li>Hari 1: Pasar pagi, kuliner lokal, homestay</li>
              <li>Hari 2: Trekking ringan, workshop kerajinan</li>
            </ul>
            <p>Tips: bawa uang tunai kecil dan hormati kebiasaan setempat.</p>
            HTML
            ,
            <<<'HTML'
            <h2>Ekonomi Mikro: Cerita UMKM yang Bertahan di Masa Sulit</h2>
            <p>Sejumlah UMKM berhasil bertahan dengan inovasi sederhana: pemotretan produk berkualitas dan pemasaran digital.</p>
            <table style="width:100%;border-collapse:collapse">
              <thead>
                <tr><th style="border:1px solid #e5e7eb;padding:8px;text-align:left">UMKM</th><th style="border:1px solid #e5e7eb;padding:8px;text-align:left">Strategi</th></tr>
              </thead>
              <tbody>
                <tr><td style="border:1px solid #e5e7eb;padding:8px">Toko Kue A</td><td style="border:1px solid #e5e7eb;padding:8px">Paket pagi hari + pengantaran</td></tr>
                <tr><td style="border:1px solid #e5e7eb;padding:8px">Kerajinan B</td><td style="border:1px solid #e5e7eb;padding:8px">Kolaborasi dengan influencer lokal</td></tr>
              </tbody>
            </table>
            <p>Kolaborasi lokal meningkatkan jangkauan dan kepercayaan pelanggan.</p>
            HTML
            ,
            <<<'HTML'
            <h2>Kuliner Nusantara: Resep Rahasia Rendang Rumahan</h2>
            <p>Rendang adalah warisan kuliner yang kaya rempah. Berikut versi ringkas resep ramah rumahan.</p>
            <h3>Bahan utama</h3>
            <ul>
              <li>Daging sapi 1 kg</li>
              <li>Santan kental 500 ml</li>
              <li>Bumbu halus (cabai, bawang, jahe, lengkuas)</li>
            </ul>
            <h3>Langkah singkat</h3>
            <ol>
              <li>Tumis bumbu sampai harum</li>
              <li>Masukkan daging, aduk rata</li>
              <li>Tuang santan, masak perlahan sampai empuk</li>
            </ol>
            <figure>
              <img src="https://placehold.co/1200x600?text=Rendang+Rumahan" alt="Rendang" style="width:100%;height:auto;border-radius:8px;">
              <figcaption>Rendang empuk siap disajikan.</figcaption>
            </figure>
            HTML
            ,
            <<<'HTML'
            <h2>Startup Lokal Sukses</h2>
            <p>Sebuah startup fintech lokal berhasil menembus pasar dengan layanan pembayaran mikro untuk UMKM.</p>
            <p>Keunggulan produk:</p>
            <ul>
              <li>Integrasi mudah</li>
              <li>Biaya rendah</li>
              <li>Pelaporan realtime</li>
            </ul>
            <p>Investor melihat potensi besar karena penetrasi digital yang terus meningkat.</p>
            HTML
            ,
            <<<'HTML'
            <h2>Tips Produktivitas: Cara Memaksimalkan Waktu Kerja</h2>
            <p>Produktivitas bukan soal sibuk, melainkan soal fokus pada hal yang berdampak.</p>
            <h3>Metode yang bisa dicoba</h3>
            <ul>
              <li>Pomodoro (25 menit kerja + 5 menit istirahat)</li>
              <li>Atur 3 prioritas utama tiap hari</li>
              <li>Matikan notifikasi saat fokus</li>
            </ul>
            <blockquote>Fokus kecil yang konsisten lebih efektif daripada usaha besar namun tak teratur.</blockquote>
            <p>Mulai dari langkah kecil — konsistensi yang membuat perbedaan.</p>
            HTML
            ,
            <<<'HTML'
            <h2>Review Gadget: Smartphone Budget 2025</h2>
            <p>Smartphone budget tahun ini menawarkan baterai besar dan kamera yang kompetitif di kelasnya.</p>
            <figure>
              <img src="https://placehold.co/1200x600?text=Smartphone+Review" alt="Smartphone" style="width:100%;height:auto;border-radius:8px;">
            </figure>
            <h3>Spesifikasi singkat</h3>
            <ul>
              <li>Layar 6.5" IPS</li>
              <li>RAM 6 GB</li>
              <li>Baterai 6000 mAh</li>
            </ul>
            <pre><code>Battery test: 48 hours standby, 10 hours screen-on (estimation)</code></pre>
            <p>Untuk pemakaian sehari-hari, ponsel ini sangat layak pertimbangan.</p>
            HTML
            ,
            <<<'HTML'
            <h2>Kesehatan Mental: Pentingnya Istirahat Berkualitas</h2>
            <p>Istirahat yang cukup berdampak pada kinerja kognitif dan kesejahteraan emosional.</p>
            <h3>Rekomendasi sederhana</h3>
            <ul>
              <li>Rutinitas tidur tetap</li>
              <li>Hindari layar 1 jam sebelum tidur</li>
              <li>Olahraga ringan secara teratur</li>
            </ul>
            <blockquote>Tidur yang cukup bukan kemewahan — itu kebutuhan.</blockquote>
            <p>Cari pola yang sesuai dan jaga konsistensi untuk hasil jangka panjang.</p>
            HTML
            ,
            <<<'HTML'
            <h2>Event Komunitas: Hackathon Kota</h2>
            <p>Komunitas developer menggelar hackathon selama 48 jam dengan tema solusi publik digital.</p>
            <h3>Agenda singkat</h3>
            <ul>
              <li>Hari 1: Ide & tim building</li>
              <li>Hari 2: Prototyping & pitching</li>
            </ul>
            <p>Hadiah: mentoring dan peluang inkubasi untuk tim pemenang.</p>
            <p>Jika kamu developer, acara ini kesempatan bagus untuk berjejaring dan belajar cepat.</p>
            HTML
        ,
        ];

        for ($i = 1; $i <= 10; $i++) {
            $title = "Contoh Artikel ke-$i";
            Article::create([
                'id' => Str::uuid()->toString(),
                'title' => $title,
                'slug' => Str::slug($title . '-' . Str::random(5)),
                'image' => null, // atau gunakan "articles/sample-$i.jpg" jika ada gambar di storage
                'excerpt' => "Ringkasan singkat untuk artikel ke-$i. Ini digunakan sebagai pratinjau isi artikel.",
                'content' => $contents[$i - 1],
                'date' => Carbon::now()->subDays($i),
                'created_at' => Carbon::now()->subDays($i),
                'updated_at' => Carbon::now()->subDays($i),
            ]);
        }
    }
}
