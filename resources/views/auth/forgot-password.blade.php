@extends('layouts.auth')

@section('title', 'Forgot Password')

@section('content')
<div class="card auth-card">
    <div class="auth-header">
        <h1><i class="fas fa-key"></i> Reset Password</h1>
        <p>We'll send you a reset link via email</p>
    </div>

    @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle"></i> {{ session('status') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong>
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}" class="needs-validation" novalidate>
        @csrf

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
                placeholder="Enter your registered email"
                required
                autofocus
            >
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-auth">
            <i class="fas fa-paper-plane"></i> Send Reset Link
        </button>
    </form>

    <div class="auth-footer">
        Remember your password?
        <a href="{{ route('login') }}">Sign in here</a>
    </div>
</div>
@endsection
