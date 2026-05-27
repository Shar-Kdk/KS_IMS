@extends('layouts.auth')

@section('title', 'Register')

@section('content')
<div class="card auth-card">
    <div class="auth-header">
        <h1><i class="fas fa-user-plus"></i> Create Account</h1>
        <p>Join the Inventory Management System</p>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Registration Error!</strong>
            <ul class="mb-0 mt-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <form method="POST" action="{{ route('register') }}" class="needs-validation" novalidate>
        @csrf

        <!-- Full Name Input -->
        <div class="form-group">
            <label for="name" class="form-label">
                <i class="fas fa-user"></i> Full Name
            </label>
            <input 
                type="text" 
                class="form-control @error('name') is-invalid @enderror" 
                id="name" 
                name="name" 
                value="{{ old('name') }}"
                placeholder="Enter your full name"
                required
                autofocus
            >
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

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
                placeholder="Create a strong password"
                required
            >
            <small class="d-block text-muted mt-2">
                <i class="fas fa-info-circle"></i> Minimum 8 characters, including uppercase and numbers
            </small>
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Confirm Password Input -->
        <div class="form-group">
            <label for="password_confirmation" class="form-label">
                <i class="fas fa-lock"></i> Confirm Password
            </label>
            <input 
                type="password" 
                class="form-control @error('password_confirmation') is-invalid @enderror" 
                id="password_confirmation" 
                name="password_confirmation" 
                placeholder="Re-enter your password"
                required
            >
            @error('password_confirmation')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Terms & Conditions -->
        <div class="checkbox-custom mb-4">
            <input type="checkbox" id="agree" name="agree" required>
            <label for="agree">
                I agree to the 
                <a href="#" class="text-decoration-none">Terms of Service</a> and 
                <a href="#" class="text-decoration-none">Privacy Policy</a>
            </label>
        </div>

        <!-- Register Button -->
        <button type="submit" class="btn btn-auth">
            <i class="fas fa-user-check"></i> Create Account
        </button>
    </form>

    <!-- Social Registration (Optional) -->
    <div class="auth-divider">
        <span>Or sign up with</span>
    </div>
    <div class="social-login">
        <button class="social-btn" title="Sign up with Facebook">
            <i class="fab fa-facebook-f"></i>
        </button>
        <button class="social-btn" title="Sign up with Google">
            <i class="fab fa-google"></i>
        </button>
        <button class="social-btn" title="Sign up with Microsoft">
            <i class="fab fa-microsoft"></i>
        </button>
    </div>

    <!-- Login Link -->
    <div class="auth-footer">
        Already have an account?
        <a href="{{ route('login') }}">Sign in here</a>
    </div>
</div>
@endsection