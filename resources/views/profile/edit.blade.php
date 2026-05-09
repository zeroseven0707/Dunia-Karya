@extends('layouts.app')

@section('title', 'Pengaturan Profil - Dunia Karya')

@section('content')
<div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

    <div class="mb-8">
        <h1 class="text-3xl font-extrabold bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
            Pengaturan Profil
        </h1>
        <p class="text-gray-500 mt-1">Kelola informasi akun dan keamanan Anda.</p>
    </div>

    <div class="space-y-6">

        {{-- ── Update Profile Info ── --}}
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 sm:p-8">
            <h2 class="text-lg font-semibold text-gray-900 mb-1">Informasi Profil</h2>
            <p class="text-sm text-gray-500 mb-6">Perbarui nama dan alamat email akun Anda.</p>

            @if(session('status') === 'profile-updated')
                <div class="mb-4 flex items-center gap-2 text-sm text-green-700 bg-green-50 border border-green-200 rounded-lg px-4 py-3">
                    <svg class="w-4 h-4 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    Profil berhasil diperbarui.
                </div>
            @endif

            <form method="POST" action="{{ route('profile.update') }}" class="space-y-5">
                @csrf
                @method('PATCH')

                {{-- Name --}}
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama</label>
                    <input
                        id="name" name="name" type="text"
                        value="{{ old('name', $user->name) }}"
                        required autofocus autocomplete="name"
                        class="w-full rounded-xl border border-gray-300 px-4 py-2.5 text-sm shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none transition @error('name') border-red-400 @enderror"
                    >
                    @error('name')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Email --}}
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                    <input
                        id="email" name="email" type="email"
                        value="{{ old('email', $user->email) }}"
                        required autocomplete="username"
                        class="w-full rounded-xl border border-gray-300 px-4 py-2.5 text-sm shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none transition @error('email') border-red-400 @enderror"
                    >
                    @error('email')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="pt-2">
                    <button type="submit"
                        class="inline-flex items-center gap-2 px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold rounded-xl shadow transition-colors active:scale-95 transform">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>

        {{-- ── Update Password ── --}}
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 sm:p-8">
            <h2 class="text-lg font-semibold text-gray-900 mb-1">Ubah Password</h2>
            <p class="text-sm text-gray-500 mb-6">Gunakan password yang panjang dan acak agar akun Anda tetap aman.</p>

            @if(session('status') === 'password-updated')
                <div class="mb-4 flex items-center gap-2 text-sm text-green-700 bg-green-50 border border-green-200 rounded-lg px-4 py-3">
                    <svg class="w-4 h-4 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    Password berhasil diperbarui.
                </div>
            @endif

            <form method="POST" action="{{ route('password.update') }}" class="space-y-5">
                @csrf
                @method('PUT')

                {{-- Current Password --}}
                <div>
                    <label for="current_password" class="block text-sm font-medium text-gray-700 mb-1">Password Saat Ini</label>
                    <input
                        id="current_password" name="current_password" type="password"
                        autocomplete="current-password"
                        class="w-full rounded-xl border border-gray-300 px-4 py-2.5 text-sm shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none transition @error('current_password', 'updatePassword') border-red-400 @enderror"
                    >
                    @error('current_password', 'updatePassword')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- New Password --}}
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password Baru</label>
                    <input
                        id="password" name="password" type="password"
                        autocomplete="new-password"
                        class="w-full rounded-xl border border-gray-300 px-4 py-2.5 text-sm shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none transition @error('password', 'updatePassword') border-red-400 @enderror"
                    >
                    @error('password', 'updatePassword')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Confirm Password --}}
                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Konfirmasi Password Baru</label>
                    <input
                        id="password_confirmation" name="password_confirmation" type="password"
                        autocomplete="new-password"
                        class="w-full rounded-xl border border-gray-300 px-4 py-2.5 text-sm shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none transition @error('password_confirmation', 'updatePassword') border-red-400 @enderror"
                    >
                    @error('password_confirmation', 'updatePassword')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="pt-2">
                    <button type="submit"
                        class="inline-flex items-center gap-2 px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold rounded-xl shadow transition-colors active:scale-95 transform">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                        </svg>
                        Perbarui Password
                    </button>
                </div>
            </form>
        </div>

        {{-- ── Delete Account ── --}}
        <div class="bg-white rounded-2xl shadow-sm border border-red-100 p-6 sm:p-8">
            <h2 class="text-lg font-semibold text-red-700 mb-1">Hapus Akun</h2>
            <p class="text-sm text-gray-500 mb-6">
                Setelah akun dihapus, semua data akan dihapus secara permanen. Pastikan Anda sudah mengunduh semua data yang diperlukan sebelum melanjutkan.
            </p>

            {{-- Trigger button --}}
            <button
                type="button"
                onclick="document.getElementById('delete-modal').classList.remove('hidden')"
                class="inline-flex items-center gap-2 px-5 py-2.5 bg-red-600 hover:bg-red-700 text-white text-sm font-semibold rounded-xl shadow transition-colors active:scale-95 transform"
            >
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                </svg>
                Hapus Akun Saya
            </button>
        </div>

    </div>
</div>

{{-- ── Delete Confirmation Modal ── --}}
<div id="delete-modal" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/50 px-4">
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-md p-6 sm:p-8">
        <h3 class="text-lg font-bold text-gray-900 mb-2">Yakin ingin menghapus akun?</h3>
        <p class="text-sm text-gray-500 mb-6">
            Semua data akun Anda akan dihapus secara permanen dan tidak dapat dipulihkan. Masukkan password untuk konfirmasi.
        </p>

        <form method="POST" action="{{ route('profile.destroy') }}" class="space-y-4">
            @csrf
            @method('DELETE')

            <div>
                <label for="delete_password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                <input
                    id="delete_password" name="password" type="password"
                    placeholder="Masukkan password Anda"
                    class="w-full rounded-xl border border-gray-300 px-4 py-2.5 text-sm shadow-sm focus:border-red-400 focus:ring-2 focus:ring-red-100 outline-none transition @error('password', 'userDeletion') border-red-400 @enderror"
                >
                @error('password', 'userDeletion')
                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-end gap-3 pt-2">
                <button
                    type="button"
                    onclick="document.getElementById('delete-modal').classList.add('hidden')"
                    class="px-4 py-2.5 text-sm font-medium text-gray-700 bg-gray-100 hover:bg-gray-200 rounded-xl transition"
                >
                    Batal
                </button>
                <button type="submit"
                    class="px-4 py-2.5 text-sm font-semibold text-white bg-red-600 hover:bg-red-700 rounded-xl shadow transition active:scale-95 transform">
                    Ya, Hapus Akun
                </button>
            </div>
        </form>
    </div>
</div>

{{-- Auto-open modal if there are deletion errors --}}
@if($errors->userDeletion->isNotEmpty())
<script>
    document.getElementById('delete-modal').classList.remove('hidden');
</script>
@endif

@endsection
