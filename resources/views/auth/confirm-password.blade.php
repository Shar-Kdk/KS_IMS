@extends('layouts.auth')

@section('title', 'Confirm Password')

@section('content')
<div class="card auth-card">
    <div class="auth-header">
        <h1><i class="fas fa-shield-alt"></i> Confirm Password</h1>
        <p>This is a secure area. Please confirm your password.</p>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong>
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <form method="POST" action="{{ route('password.confirm') }}" class="needs-validation" novalidate>
        @csrf

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
                autofocus
            >
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-auth">
            <i class="fas fa-check-circle"></i> Confirm
        </button>
    </form>

    <div class="auth-footer">
        <a href="{{ route('login') }}">Back to login</a>
    </div>
</div>
@endsection
