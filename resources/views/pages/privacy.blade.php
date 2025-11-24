@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-5 py-12">
    <h1 class="text-3xl font-bold mb-6">Kebijakan Privasi</h1>
    <div class="prose max-w-none text-gray-700">
        <p>Terakhir diperbarui: {{ date('d M Y') }}</p>
        
        <h2 class="text-xl font-semibold mt-6 mb-3">1. Pendahuluan</h2>
        <p>Selamat datang di Dunia Karya. Kami menghargai privasi Anda dan berkomitmen untuk melindungi data pribadi Anda.</p>

        <h2 class="text-xl font-semibold mt-6 mb-3">2. Data yang Kami Kumpulkan</h2>
        <p>Kami dapat mengumpulkan informasi berikut:</p>
        <ul class="list-disc ml-6 mb-4">
            <li>Nama dan informasi kontak</li>
            <li>Informasi demografis</li>
            <li>Informasi lain yang relevan dengan survei pelanggan dan/atau penawaran</li>
        </ul>

        <h2 class="text-xl font-semibold mt-6 mb-3">3. Penggunaan Data</h2>
        <p>Kami menggunakan data ini untuk memahami kebutuhan Anda dan memberikan layanan yang lebih baik.</p>
    </div>
</div>
@endsection
