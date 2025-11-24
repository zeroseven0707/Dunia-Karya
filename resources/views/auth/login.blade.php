<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - DUNIAKARYA</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      background: linear-gradient(135deg, #e3f2fd, #bbdefb);
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      font-family: 'Poppins', sans-serif;
    }

    .login-card {
      background: #fff;
      border-radius: 1rem;
      box-shadow: 0 6px 18px rgba(0, 0, 0, 0.1);
      padding: 2rem;
      width: 100%;
      max-width: 420px;
    }

    .login-title {
      color: #0d6efd;
      font-weight: 700;
    }

    .btn-primary {
      background-color: #0d6efd;
      border: none;
    }

    .btn-primary:hover {
      background-color: #0b5ed7;
    }

    .form-check-input:checked {
      background-color: #0d6efd;
      border-color: #0d6efd;
    }

    a {
      text-decoration: none;
    }

    a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>

  <div class="login-card">
    <div class="text-center mb-4">
      <h2 class="login-title">Selamat Datang 👋</h2>
      <p class="text-muted mb-0">Silakan masuk ke akun Anda</p>
    </div>

    <!-- Session Status -->
    @if (session('status'))
      <div class="alert alert-success text-center py-2">
        {{ session('status') }}
      </div>
    @endif

       <form method="POST" action="{{ route('login') }}">
      @csrf

      <!-- Email -->
      <div class="mb-3">
        <label for="email" class="form-label fw-semibold">Email</label>
        <input type="email" name="email" id="email" value="{{ old('email') }}" class="form-control" required autofocus>
        @error('email')
          <div class="text-danger small mt-1">{{ $message }}</div>
        @enderror
      </div>

      <!-- Password -->
      <div class="mb-3">
        <label for="password" class="form-label fw-semibold">Password</label>
        <input type="password" name="password" id="password" class="form-control" required>
        @error('password')
          <div class="text-danger small mt-1">{{ $message }}</div>
        @enderror
      </div>

      <!-- Remember Me -->
      <div class="mb-3 form-check">
        <input type="checkbox" name="remember" id="remember_me" class="form-check-input">
        <label for="remember_me" class="form-check-label">Ingat saya</label>
      </div>

      <!-- Submit -->
      <div class="d-flex justify-content-between align-items-center mb-3">
        @if (Route::has('password.request'))
          <a href="{{ route('password.request') }}" class="text-primary small">Lupa password?</a>
        @endif
        <button type="submit" class="btn btn-primary px-4">Masuk</button>
      </div>
    </form>

    <!-- Login with Google -->
    <div class="mt-3">
      <a href="{{ route('google.login') }}"
         class="btn btn-light w-100 border d-flex align-items-center justify-content-center gap-2">
        <svg xmlns="http://www.w3.org/2000/svg" class="me-2" width="18" height="18" viewBox="0 0 48 48">
          <path fill="#EA4335" d="M24 9.5c3.5 0 6.6 1.3 9 3.8l6.7-6.7C35.9 2.7 30.4 0 24 0 14.6 0 6.5 5.9 2.4 14.2l7.8 6c1.8-5.4 6.8-9.2 13.8-9.2z"/>
          <path fill="#34A853" d="M46.1 24.5c0-1.6-.1-3.2-.4-4.7H24v9.1h12.5c-.6 3.1-2.3 5.7-4.9 7.5l7.8 6C43.7 38.8 46.1 32 46.1 24.5z"/>
          <path fill="#4A90E2" d="M10.2 28.3c-1.2-3.5-1.2-7.3 0-10.8l-7.8-6C.8 14.4 0 19 0 24c0 5 0.8 9.6 2.4 13.5l7.8-6z"/>
          <path fill="#FBBC05" d="M24 48c6.5 0 11.9-2.1 15.9-5.7l-7.8-6c-2.2 1.5-5 2.3-8.1 2.3-7 0-12.9-4.7-14.8-11l-7.8 6C6.5 42.1 14.6 48 24 48z"/>
        </svg>
        <span class="fw-semibold text-muted">Masuk dengan Google</span>
      </a>
    </div>

    <div class="text-center mt-4">
      <p class="text-muted mb-0">
        Belum punya akun?
        <a href="{{ route('register') }}" class="text-primary fw-semibold">Daftar</a>
      </p>
    </div>

  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
