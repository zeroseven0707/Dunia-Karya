@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-5 py-12">
    <h1 class="text-3xl font-bold mb-6">Syarat dan Ketentuan</h1>
    <div class="prose max-w-none text-gray-700">
        <p>Terakhir diperbarui: {{ date('d M Y') }}</p>
        
        <h2 class="text-xl font-semibold mt-6 mb-3">1. Ketentuan Umum</h2>
        <p>Dengan mengakses website ini, Anda menyetujui untuk terikat dengan syarat dan ketentuan penggunaan ini.</p>

        <h2 class="text-xl font-semibold mt-6 mb-3">2. Lisensi Penggunaan</h2>
        <p>Izin diberikan untuk mengunduh sementara satu salinan materi (informasi atau perangkat lunak) di situs web Dunia Karya untuk tampilan pribadi dan non-komersial saja.</p>

        <h2 class="text-xl font-semibold mt-6 mb-3">3. Penafian</h2>
        <p>Materi di situs web Dunia Karya disediakan "apa adanya". Dunia Karya tidak memberikan jaminan, tersurat maupun tersirat.</p>
    </div>
</div>
@endsection
