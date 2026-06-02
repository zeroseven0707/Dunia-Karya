<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk - Dunia Karya</title>
    <link rel="icon" type="image/png" href="{{ asset('img/favicon.png') }}">
    <script src="{{ asset('js/tailwind.js') }}"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap');
        * { font-family: 'Inter', sans-serif; }

        .brand-gradient { background: linear-gradient(135deg, #0A1E58 0%, #1a3a8f 50%, #2563eb 100%); }
        .input-field {
            width: 100%;
            padding: 0.625rem 1rem;
            border: 1.5px solid #e5e7eb;
            border-radius: 0.75rem;
            font-size: 0.875rem;
            outline: none;
            transition: border-color 0.2s, box-shadow 0.2s;
            background: #f9fafb;
        }
        .input-field:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37,99,235,0.12);
            background: #fff;
        }
        .input-field.error { border-color: #ef4444; }
        .btn-primary {
            width: 100%;
            padding: 0.7rem 1rem;
            background: linear-gradient(135deg, #0A1E58, #2563eb);
            color: white;
            font-weight: 600;
            font-size: 0.925rem;
            border-radius: 0.75rem;
            border: none;
            cursor: pointer;
            transition: opacity 0.2s, transform 0.1s;
        }
        .btn-primary:hover { opacity: 0.92; }
        .btn-primary:active { transform: scale(0.98); }
        .floating-shape {
            position: absolute;
            border-radius: 50%;
            opacity: 0.08;
        }
    </style>
</head>
<body class="min-h-screen flex bg-gray-50">

    {{-- Left panel — branding --}}
    <div class="hidden lg:flex lg:w-1/2 brand-gradient relative overflow-hidden flex-col items-center justify-center p-12 text-white">
        {{-- Decorative shapes --}}
        <div class="floating-shape bg-white w-96 h-96 -top-24 -left-24"></div>
        <div class="floating-shape bg-white w-64 h-64 bottom-0 right-0"></div>
        <div class="floating-shape bg-white w-48 h-48 top-1/2 -right-12"></div>

        <div class="relative z-10 max-w-md text-center">
            <a href="{{ route('home') }}">
                <img src="{{ asset('img/logo.png') }}" alt="Dunia Karya" class="h-14 w-auto mx-auto mb-10 drop-shadow-lg">
            </a>
            <h1 class="text-4xl font-extrabold leading-tight mb-4">
                Selamat datang<br>kembali!
            </h1>
            <p class="text-blue-200 text-lg leading-relaxed">
                Masuk dan akses ribuan produk digital pilihan — template, website siap pakai, dan banyak lagi.
            </p>

            {{-- <div class="mt-12 grid grid-cols-3 gap-4 text-center">
                <div class="bg-white/10 rounded-2xl p-4 backdrop-blur-sm">
                    <div class="text-2xl font-bold">500+</div>
                    <div class="text-blue-200 text-xs mt-1">Produk Digital</div>
                </div>
                <div class="bg-white/10 rounded-2xl p-4 backdrop-blur-sm">
                    <div class="text-2xl font-bold">10K+</div>
                    <div class="text-blue-200 text-xs mt-1">Pengguna Aktif</div>
                </div>
                <div class="bg-white/10 rounded-2xl p-4 backdrop-blur-sm">
                    <div class="text-2xl font-bold">4.9★</div>
                    <div class="text-blue-200 text-xs mt-1">Rating</div>
                </div>
            </div> --}}
        </div>
    </div>

    {{-- Right panel — form --}}
    <div class="w-full lg:w-1/2 flex items-center justify-center p-6 sm:p-10">
        <div class="w-full max-w-md">

            {{-- Mobile logo --}}
            <div class="lg:hidden text-center mb-8">
                <a href="{{ route('home') }}">
                    <img src="{{ asset('img/logo.png') }}" alt="Dunia Karya" class="h-10 w-auto mx-auto">
                </a>
            </div>

            <h2 class="text-2xl font-bold text-gray-900 mb-1">Masuk ke akun</h2>
            <p class="text-gray-500 text-sm mb-8">Belum punya akun? <a href="{{ route('register') }}" class="text-blue-600 font-semibold hover:underline">Daftar gratis</a></p>

            {{-- Session status --}}
            @if (session('status'))
                <div class="mb-5 flex items-center gap-2 text-sm text-green-700 bg-green-50 border border-green-200 rounded-xl px-4 py-3">
                    <svg class="w-4 h-4 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                    {{ session('status') }}
                </div>
            @endif

            {{-- Google login --}}
            <a href="{{ route('google.login') }}"
               class="flex items-center justify-center gap-3 w-full py-2.5 px-4 bg-white border-2 border-gray-200 rounded-xl text-sm font-semibold text-gray-700 hover:border-gray-300 hover:bg-gray-50 transition-all mb-6">
                <svg class="w-5 h-5 flex-shrink-0" viewBox="0 0 48 48">
                    <path fill="#EA4335" d="M24 9.5c3.5 0 6.6 1.3 9 3.8l6.7-6.7C35.9 2.7 30.4 0 24 0 14.6 0 6.5 5.9 2.4 14.2l7.8 6c1.8-5.4 6.8-9.2 13.8-9.2z"/>
                    <path fill="#34A853" d="M46.1 24.5c0-1.6-.1-3.2-.4-4.7H24v9.1h12.5c-.6 3.1-2.3 5.7-4.9 7.5l7.8 6C43.7 38.8 46.1 32 46.1 24.5z"/>
                    <path fill="#4A90E2" d="M10.2 28.3c-1.2-3.5-1.2-7.3 0-10.8l-7.8-6C.8 14.4 0 19 0 24c0 5 .8 9.6 2.4 13.5l7.8-6z"/>
                    <path fill="#FBBC05" d="M24 48c6.5 0 11.9-2.1 15.9-5.7l-7.8-6c-2.2 1.5-5 2.3-8.1 2.3-7 0-12.9-4.7-14.8-11l-7.8 6C6.5 42.1 14.6 48 24 48z"/>
                </svg>
                Masuk dengan Google
            </a>

            {{-- Divider --}}
            <div class="relative my-6">
                <div class="absolute inset-0 flex items-center"><div class="w-full border-t border-gray-200"></div></div>
                <div class="relative flex justify-center"><span class="bg-gray-50 px-3 text-xs text-gray-400 font-medium">atau masuk dengan email</span></div>
            </div>

            {{-- Login form --}}
            <form method="POST" action="{{ route('login') }}" class="space-y-4">
                @csrf

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1.5">Email</label>
                    <input
                        type="email" id="email" name="email"
                        value="{{ old('email') }}"
                        required autofocus autocomplete="email"
                        placeholder="nama@email.com"
                        class="input-field @error('email') error @enderror"
                    >
                    @error('email')
                        <p class="mt-1.5 text-xs text-red-600 flex items-center gap-1">
                            <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div>
                    <div class="flex items-center justify-between mb-1.5">
                        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-xs text-blue-600 hover:underline">Lupa password?</a>
                        @endif
                    </div>
                    <div class="relative">
                        <input
                            type="password" id="password" name="password"
                            required autocomplete="current-password"
                            placeholder="••••••••"
                            class="input-field pr-10 @error('password') error @enderror"
                        >
                        <button type="button" onclick="togglePassword('password', this)" class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600">
                            <svg class="w-4.5 h-4.5 eye-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                        </button>
                    </div>
                    @error('password')
                        <p class="mt-1.5 text-xs text-red-600 flex items-center gap-1">
                            <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="flex items-center gap-2 py-1">
                    <input type="checkbox" id="remember_me" name="remember"
                        class="w-4 h-4 rounded border-gray-300 text-blue-600 cursor-pointer">
                    <label for="remember_me" class="text-sm text-gray-600 cursor-pointer">Ingat saya selama 30 hari</label>
                </div>

                <button type="submit" class="btn-primary">
                    Masuk
                </button>
            </form>

            <p class="text-center text-xs text-gray-400 mt-8">
                &copy; {{ date('Y') }} Dunia Karya. Semua hak dilindungi.
            </p>
        </div>
    </div>

    <script>
        function togglePassword(fieldId, btn) {
            const input = document.getElementById(fieldId);
            const isText = input.type === 'text';
            input.type = isText ? 'password' : 'text';
            btn.querySelector('.eye-icon').innerHTML = isText
                ? '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>'
                : '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/>';
        }
    </script>
</body>
</html>
