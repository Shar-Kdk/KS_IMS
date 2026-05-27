@extends('layouts.auth')

@section('title', 'Login')

@section('content')
<div class="card auth-card">
    <div class="auth-header">
        <h1><i class="fas fa-boxes"></i> IMS</h1>
        <p>Inventory Management System</p>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Login Failed!</strong>
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}" class="needs-validation" novalidate>
        @csrf

        <!-- Email Input -->
        <div class="form-group">
            <label for="email" class="form-label">
                <i class="fas fa-envelope"></i> Email Address
            </label>
            <input 
                type="email" 
                class="form-control @error('email') is-invalid @enderror" 
                id="email" 
                name="email" 
                value="{{ old('email') }}"
                placeholder="Enter your email"
                required
                autofocus
            >
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Password Input -->
        <div class="form-group">
            <label for="password" class="form-label">
                <i class="fas fa-lock"></i> Password
            </label>
            <input 
                type="password" 
                class="form-control @error('password') is-invalid @enderror" 
                id="password" 
                name="password" 
                placeholder="Enter your password"
                required
            >
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Remember Me & Forgot Password -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div class="checkbox-custom">
                <input type="checkbox" id="remember" name="remember">
                <label for="remember">Remember me</label>
            </div>
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="small text-decoration-none">
                    Forgot Password?
                </a>
            @endif
        </div>

        <!-- Login Button -->
        <button type="submit" class="btn btn-auth">
            <i class="fas fa-sign-in-alt"></i> Sign In
        </button>
    </form>

    <!-- Social Login (Optional) -->
    <div class="auth-divider">
        <span>Or continue with</span>
    </div>
    <div class="social-login">
        <button class="social-btn" title="Login with Facebook">
            <i class="fab fa-facebook-f"></i>
        </button>
        <button class="social-btn" title="Login with Google">
            <i class="fab fa-google"></i>
        </button>
        <button class="social-btn" title="Login with Microsoft">
            <i class="fab fa-microsoft"></i>
        </button>
    </div>

    <!-- Sign Up Link -->
    <div class="auth-footer">
        Don't have an account?
        <a href="{{ route('register') }}">Create one now</a>
    </div>
</div>
@endsection