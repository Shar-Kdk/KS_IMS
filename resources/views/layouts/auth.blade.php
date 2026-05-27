<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'IMS') }} - @yield('title')</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary-color: #0d6efd;
            --primary-hover: #0a58ca;
            --secondary-color: #6c757d;
            --success-color: #198754;
            --danger-color: #dc3545;
        }

        * {
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            transition: background 0.3s ease;
        }

        body[data-bs-theme="dark"] {
            background: linear-gradient(135deg, #1e1e2e 0%, #2d2d44 100%);
        }

        .auth-container {
            width: 100%;
            max-width: 450px;
        }

        .auth-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
            padding: 40px 30px;
            border: none;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        body[data-bs-theme="dark"] .auth-card {
            background: #2d2d44;
            color: #e0e0e0;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.5);
        }

        .auth-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 50px rgba(0, 0, 0, 0.25);
        }

        .auth-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .auth-header h1 {
            font-size: 28px;
            font-weight: 700;
            color: #2d3748;
            margin-bottom: 10px;
        }

        body[data-bs-theme="dark"] .auth-header h1 {
            color: #fff;
        }

        .auth-header p {
            color: #718096;
            font-size: 14px;
            margin: 0;
        }

        body[data-bs-theme="dark"] .auth-header p {
            color: #a0aec0;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            font-weight: 500;
            color: #2d3748;
            margin-bottom: 8px;
            font-size: 14px;
        }

        body[data-bs-theme="dark"] .form-label {
            color: #cbd5e0;
        }

        .form-control, .form-select {
            border: 2px solid #e2e8f0;
            border-radius: 8px;
            padding: 12px 15px;
            font-size: 14px;
            transition: all 0.3s ease;
            background-color: #f7fafc;
        }

        body[data-bs-theme="dark"] .form-control,
        body[data-bs-theme="dark"] .form-select {
            background-color: #3d3d54;
            border-color: #4d4d64;
            color: #e0e0e0;
        }

        .form-control:focus, .form-select:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.15);
            background-color: white;
        }

        body[data-bs-theme="dark"] .form-control:focus,
        body[data-bs-theme="dark"] .form-select:focus {
            background-color: #3d3d54;
        }

        .form-control::placeholder {
            color: #a0aec0;
        }

        .btn-auth {
            padding: 12px 20px;
            font-weight: 600;
            border-radius: 8px;
            border: none;
            transition: all 0.3s ease;
            font-size: 15px;
            width: 100%;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }

        .btn-auth:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(102, 126, 234, 0.4);
            color: white;
        }

        .btn-auth:active {
            transform: translateY(0);
        }

        .auth-divider {
            text-align: center;
            margin: 25px 0;
            position: relative;
            color: #718096;
            font-size: 13px;
        }

        body[data-bs-theme="dark"] .auth-divider {
            color: #a0aec0;
        }

        .auth-divider::before {
            content: '';
            position: absolute;
            left: 0;
            top: 50%;
            width: 100%;
            height: 1px;
            background: #e2e8f0;
            z-index: 0;
        }

        body[data-bs-theme="dark"] .auth-divider::before {
            background: #4d4d64;
        }

        .auth-divider span {
            background: white;
            padding: 0 10px;
            position: relative;
            z-index: 1;
        }

        body[data-bs-theme="dark"] .auth-divider span {
            background: #2d2d44;
        }

        .social-login {
            display: flex;
            gap: 10px;
            justify-content: center;
            margin-top: 20px;
        }

        .social-btn {
            flex: 1;
            padding: 10px;
            border: 2px solid #e2e8f0;
            background: transparent;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
            color: #2d3748;
            font-size: 18px;
        }

        body[data-bs-theme="dark"] .social-btn {
            border-color: #4d4d64;
            color: #cbd5e0;
        }

        .social-btn:hover {
            border-color: #667eea;
            color: #667eea;
            background: rgba(102, 126, 234, 0.05);
        }

        .auth-footer {
            text-align: center;
            margin-top: 25px;
            color: #718096;
            font-size: 14px;
        }

        body[data-bs-theme="dark"] .auth-footer {
            color: #a0aec0;
        }

        .auth-footer a {
            color: #667eea;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s ease;
        }

        .auth-footer a:hover {
            color: #764ba2;
        }

        .checkbox-custom {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .checkbox-custom input[type="checkbox"] {
            width: 18px;
            height: 18px;
            cursor: pointer;
            accent-color: #667eea;
        }

        .checkbox-custom label {
            cursor: pointer;
            margin: 0;
            font-size: 14px;
            color: #2d3748;
        }

        body[data-bs-theme="dark"] .checkbox-custom label {
            color: #cbd5e0;
        }

        .alert {
            border-radius: 8px;
            border: none;
            margin-bottom: 20px;
            font-size: 14px;
        }

        .invalid-feedback {
            display: block;
            color: #dc3545;
            font-size: 13px;
            margin-top: 5px;
        }

        .is-invalid {
            border-color: #dc3545 !important;
        }

        .theme-toggle {
            position: fixed;
            top: 20px;
            right: 20px;
            background: white;
            border: 2px solid #e2e8f0;
            border-radius: 8px;
            padding: 8px 12px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 18px;
        }

        body[data-bs-theme="dark"] .theme-toggle {
            background: #2d2d44;
            border-color: #4d4d64;
            color: #cbd5e0;
        }

        .theme-toggle:hover {
            background: #f7fafc;
            border-color: #667eea;
        }

        body[data-bs-theme="dark"] .theme-toggle:hover {
            background: #3d3d54;
            border-color: #667eea;
        }

        @media (max-width: 576px) {
            .auth-card {
                padding: 30px 20px;
            }

            .auth-header h1 {
                font-size: 24px;
            }

            .theme-toggle {
                top: 15px;
                right: 15px;
                padding: 6px 10px;
                font-size: 16px;
            }
        }
    </style>

    @yield('extra-css')
</head>
<body>
    <!-- Theme Toggle -->
    <button class="theme-toggle" id="themeToggle" title="Toggle Dark Mode">
        <i class="fas fa-moon"></i>
    </button>

    <div class="auth-container">
        @yield('content')
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Dark Mode Toggle
        const htmlElement = document.documentElement;
        const themeToggle = document.getElementById('themeToggle');
        const currentTheme = localStorage.getItem('theme') || 'light';

        // Set initial theme
        htmlElement.setAttribute('data-bs-theme', currentTheme);
        updateThemeIcon(currentTheme);

        function updateThemeIcon(theme) {
            const icon = themeToggle.querySelector('i');
            if (theme === 'dark') {
                icon.classList.remove('fa-moon');
                icon.classList.add('fa-sun');
            } else {
                icon.classList.remove('fa-sun');
                icon.classList.add('fa-moon');
            }
        }

        themeToggle.addEventListener('click', () => {
            const currentTheme = htmlElement.getAttribute('data-bs-theme');
            const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
            htmlElement.setAttribute('data-bs-theme', newTheme);
            localStorage.setItem('theme', newTheme);
            updateThemeIcon(newTheme);
        });

        // Form validation
        (() => {
            'use strict';
            const forms = document.querySelectorAll('.needs-validation');
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        })();
    </script>

    @yield('extra-js')
</body>
</html>
