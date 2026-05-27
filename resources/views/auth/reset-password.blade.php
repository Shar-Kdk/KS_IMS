@extends('layouts.auth')

@section('title', 'Reset Password')

@section('content')
<div class="card auth-card">
    <div class="auth-header">
        <h1><i class="fas fa-lock"></i> Set New Password</h1>
        <p>Create a new secure password</p>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong>
            <ul class="mb-0 mt-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <form method="POST" action="{{ route('password.update') }}" class="needs-validation" novalidate>
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div class="form-group">
            <label for="email" class="form-label">
                <i class="fas fa-envelope"></i> Email Address
            </label>
            <input 
                type="email" 
                class="form-control @error('email') is-invalid @enderror" 
                id="email" 
                name="email" 
                value="{{ old('email', $request->email) }}"
                placeholder="Your email address"
                required
                autofocus
            >
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- New Password -->
        <div class="form-group">
            <label for="password" class="form-label">
                <i class="fas fa-lock"></i> New Password
            </label>
            <input 
                type="password" 
                class="form-control @error('password') is-invalid @enderror" 
                id="password" 
                name="password" 
                placeholder="Enter new password"
                required
            >
            <small class="d-block text-muted mt-2">
                <i class="fas fa-info-circle"></i> Minimum 8 characters, including uppercase and numbers
            </small>
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Confirm Password -->
        <div class="form-group">
            <label for="password_confirmation" class="form-label">
                <i class="fas fa-lock"></i> Confirm Password
            </label>
            <input 
                type="password" 
                class="form-control @error('password_confirmation') is-invalid @enderror" 
                id="password_confirmation" 
                name="password_confirmation" 
                placeholder="Confirm your password"
                required
            >
            @error('password_confirmation')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-auth">
            <i class="fas fa-check-circle"></i> Reset Password
        </button>
    </form>

    <div class="auth-footer">
        <a href="{{ route('login') }}">Back to login</a>
    </div>
</div>
@endsection
