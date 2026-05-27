@extends('layouts.auth')

@section('title', 'Verify Email')

@section('content')
<div class="card auth-card">
    <div class="auth-header">
        <h1><i class="fas fa-envelope-open-text"></i> Verify Email</h1>
        <p>Confirm your email address to continue</p>
    </div>

    <div class="alert alert-info">
        <i class="fas fa-info-circle"></i>
        <strong>Thanks for signing up!</strong> Before getting started, please verify your email address by clicking on the link we just sent to you. If you didn't receive the email, we'll gladly send you another.
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="alert alert-success alert-dismissible fade show">
            <i class="fas fa-check-circle"></i> A new verification link has been sent to your email address.
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <form method="POST" action="{{ route('verification.send') }}" class="mb-3">
        @csrf
        <button type="submit" class="btn btn-auth">
            <i class="fas fa-redo-alt"></i> Resend Verification Email
        </button>
    </form>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="btn btn-outline-secondary w-100">
            <i class="fas fa-sign-out-alt"></i> Log Out
        </button>
    </form>
</div>

<style>
    .btn-outline-secondary {
        color: #a0aec0;
        border-color: #e2e8f0;
        padding: 12px 20px;
        border-radius: 8px;
        border: 2px solid;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    body[data-bs-theme="dark"] .btn-outline-secondary {
        color: #cbd5e0;
        border-color: #4d4d64;
    }

    .btn-outline-secondary:hover {
        background-color: #f7fafc;
        color: #2d3748;
        border-color: #667eea;
    }

    body[data-bs-theme="dark"] .btn-outline-secondary:hover {
        background-color: #3d3d54;
        color: #e0e0e0;
        border-color: #667eea;
    }

    .alert-info {
        background-color: #d1ecf1 !important;
        border-color: #bee5eb !important;
        color: #0c5460 !important;
        border-radius: 8px;
        border: 2px solid;
    }

    body[data-bs-theme="dark"] .alert-info {
        background-color: #1b4d5c !important;
        border-color: #2d7a8f !important;
        color: #a2d5e0 !important;
    }
</style>
@endsection
