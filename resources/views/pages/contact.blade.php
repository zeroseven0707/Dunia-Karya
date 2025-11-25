@extends('layouts.app')

@section('content')
<div class="bg-white">
    <!-- Hero Section -->
    <div class="bg-[#0A1E58] text-white py-16 text-center px-4">
        <h1 class="text-4xl md:text-5xl font-bold mb-4">Hubungi Kami</h1>
        <p class="text-lg md:text-xl text-blue-200 max-w-2xl mx-auto">
            Kami siap membantu Anda. Jangan ragu untuk menghubungi kami melalui saluran di bawah ini untuk pertanyaan, dukungan, atau kemitraan.
        </p>
    </div>

    <!-- Contact Cards -->
    <div class="max-w-7xl mx-auto px-5 py-16 -mt-10">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- WhatsApp -->
            <div class="bg-white rounded-xl shadow-lg p-8 text-center transform hover:-translate-y-1 transition-transform duration-300 border border-gray-100">
                <div class="w-16 h-16 bg-green-100 text-green-600 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.017-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-2">WhatsApp</h3>
                <p class="text-gray-600 mb-6">Chat langsung dengan tim support kami untuk respon cepat.</p>
                <a href="https://wa.me/6281394454900" target="_blank" class="inline-block w-full bg-green-500 text-white font-semibold py-3 rounded-lg hover:bg-green-600 transition-colors">
                    Chat +62 813 9445 4900
                </a>
            </div>

            <!-- Email -->
            <div class="bg-white rounded-xl shadow-lg p-8 text-center transform hover:-translate-y-1 transition-transform duration-300 border border-gray-100">
                <div class="w-16 h-16 bg-blue-100 text-blue-600 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-2">Email Support</h3>
                <p class="text-gray-600 mb-6">Kirimkan pertanyaan detail atau kendala teknis Anda.</p>
                <a href="mailto:support@duniakarya.com" class="inline-block w-full bg-blue-600 text-white font-semibold py-3 rounded-lg hover:bg-blue-700 transition-colors">
                    support@duniakarya.com
                </a>
            </div>

            <!-- Help Center / Other -->
            <div class="bg-white rounded-xl shadow-lg p-8 text-center transform hover:-translate-y-1 transition-transform duration-300 border border-gray-100">
                <div class="w-16 h-16 bg-purple-100 text-purple-600 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-2">Pusat Bantuan</h3>
                <p class="text-gray-600 mb-6">Kunjungi pusat bantuan kami untuk panduan dan FAQ.</p>
                <a href="{{ route('faq') }}" class="inline-block w-full bg-purple-600 text-white font-semibold py-3 rounded-lg hover:bg-purple-700 transition-colors">
                    Lihat FAQ
                </a>
            </div>
        </div>

        <!-- Additional Info Section -->
        <div class="mt-16 bg-gray-50 rounded-2xl p-8 md:p-12">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                <div>
                    <h2 class="text-2xl md:text-3xl font-bold mb-4 text-[#0A1E58]">Jam Operasional</h2>
                    <p class="text-gray-600 mb-6 text-lg">
                        Tim kami tersedia untuk membantu Anda pada jam kerja berikut. Pesan yang dikirim di luar jam kerja akan dibalas pada hari kerja berikutnya.
                    </p>
                    <ul class="space-y-4">
                        <li class="flex items-center gap-4">
                            <div class="w-10 h-10 bg-white shadow rounded-full flex items-center justify-center text-blue-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div>
                                <p class="font-bold text-gray-900">Senin - Jumat</p>
                                <p class="text-gray-500">09:00 - 17:00 WIB</p>
                            </div>
                        </li>
                        <li class="flex items-center gap-4">
                            <div class="w-10 h-10 bg-white shadow rounded-full flex items-center justify-center text-red-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div>
                                <p class="font-bold text-gray-900">Sabtu - Minggu</p>
                                <p class="text-gray-500">Libur (Slow Response)</p>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="relative h-64 md:h-full min-h-[300px] rounded-xl overflow-hidden shadow-lg">
                   <!-- Placeholder for Map or Office Image -->
                   <img src="https://placehold.co/600x400/0A1E58/FFFFFF?text=Dunia+Karya+Office" alt="Office" class="absolute inset-0 w-full h-full object-cover">
                   <div class="absolute inset-0 bg-black bg-opacity-30 flex items-center justify-center">
                       <p class="text-white font-bold text-xl">Lokasi Kami</p>
                   </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
