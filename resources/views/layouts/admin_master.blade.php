Products<!DOCTYPE html>
<html lang="en" data-bs-theme="light">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="Inventory Management System" />
    <meta name="author" content="" />
    <title>IMS - Inventory Management System</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- DataTables -->
    <link href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.dataTables.min.css" rel="stylesheet">

    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }

        :root {
            --primary-color: #667eea;
            --secondary-color: #764ba2;
            --sidebar-width: 260px;
            --topbar-height: 70px;
        }

        body {
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
            overflow-x: hidden;
        }

        body[data-bs-theme="dark"] {
            background-color: #1a1a2e;
        }

        /* Topbar */
        .topbar {
            height: var(--topbar-height);
            background: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            display: flex;
            align-items: center;
            padding: 0 20px;
            transition: all 0.3s ease;
        }

        body[data-bs-theme="dark"] .topbar {
            background: #2d2d44;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
        }

        .topbar-brand {
            font-size: 24px;
            font-weight: 700;
            color: var(--primary-color);
            text-decoration: none;
            margin-right: 30px;
            white-space: nowrap;
        }

        .topbar-brand i {
            margin-right: 10px;
        }

        .topbar-toggle {
            background: none;
            border: none;
            font-size: 20px;
            color: var(--primary-color);
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .topbar-toggle:hover {
            color: var(--secondary-color);
        }

        body[data-bs-theme="dark"] .topbar-toggle {
            color: #cbd5e0;
        }

        .topbar-spacer {
            flex: 1;
        }

        .topbar-actions {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .search-box {
            display: none;
            width: 250px;
        }

        .search-box input {
            border: 2px solid #e2e8f0;
            border-radius: 8px;
            padding: 8px 12px;
            transition: all 0.3s ease;
        }

        body[data-bs-theme="dark"] .search-box input {
            background: #3d3d54;
            border-color: #4d4d64;
            color: #e0e0e0;
        }

        .search-box input:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.15);
        }

        @media (min-width: 768px) {
            .search-box {
                display: block;
            }
        }

        .theme-toggle {
            background: #f0f0f0;
            border: none;
            border-radius: 8px;
            padding: 8px 12px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 16px;
            color: #2d3748;
        }

        body[data-bs-theme="dark"] .theme-toggle {
            background: #3d3d54;
            color: #cbd5e0;
        }

        .theme-toggle:hover {
            background: var(--primary-color);
            color: white;
        }

        .user-menu {
            position: relative;
        }

        .user-profile-btn {
            background: #f0f0f0;
            border: none;
            border-radius: 8px;
            padding: 8px 12px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 18px;
            color: var(--primary-color);
        }

        body[data-bs-theme="dark"] .user-profile-btn {
            background: #3d3d54;
            color: #cbd5e0;
        }

        .user-profile-btn:hover {
            background: var(--primary-color);
            color: white;
        }

        .user-dropdown {
            position: absolute;
            right: 0;
            top: 110%;
            background: white;
            border: 2px solid #e2e8f0;
            border-radius: 10px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            min-width: 200px;
            z-index: 1001;
            opacity: 0;
            visibility: hidden;
            transform: translateY(-10px);
            transition: all 0.3s ease;
        }

        body[data-bs-theme="dark"] .user-dropdown {
            background: #2d2d44;
            border-color: #4d4d64;
        }

        .user-menu.active .user-dropdown {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .user-dropdown a,
        .user-dropdown button {
            display: block;
            width: 100%;
            padding: 12px 16px;
            border: none;
            background: none;
            text-align: left;
            color: #2d3748;
            text-decoration: none;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 14px;
        }

        body[data-bs-theme="dark"] .user-dropdown a,
        body[data-bs-theme="dark"] .user-dropdown button {
            color: #cbd5e0;
        }

        .user-dropdown a:hover,
        .user-dropdown button:hover {
            background: #f7fafc;
            padding-left: 20px;
        }

        body[data-bs-theme="dark"] .user-dropdown a:hover,
        body[data-bs-theme="dark"] .user-dropdown button:hover {
            background: #3d3d54;
        }

        .user-dropdown a:first-child {
            border-radius: 8px 8px 0 0;
        }

        .user-dropdown a:last-child {
            border-radius: 0 0 8px 8px;
        }

        /* Sidebar */
        .sidebar {
            width: var(--sidebar-width);
            background: white;
            position: fixed;
            left: 0;
            top: var(--topbar-height);
            height: calc(100vh - var(--topbar-height));
            overflow-y: auto;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.05);
            z-index: 999;
            transition: all 0.3s ease;
        }

        body[data-bs-theme="dark"] .sidebar {
            background: #2d2d44;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.3);
        }

        .sidebar.hidden {
            transform: translateX(-100%);
        }

        .sidebar-nav {
            padding: 20px 0;
            list-style: none;
            margin: 0;
        }

        .sidebar-nav-item {
            margin: 0;
        }

        .sidebar-heading {
            font-size: 12px;
            font-weight: 700;
            color: #a0aec0;
            text-transform: uppercase;
            padding: 15px 20px 10px;
            letter-spacing: 0.5px;
        }

        body[data-bs-theme="dark"] .sidebar-heading {
            color: #718096;
        }

        .sidebar-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 20px;
            color: #2d3748;
            text-decoration: none;
            transition: all 0.3s ease;
            font-size: 14px;
            border-left: 3px solid transparent;
            position: relative;
        }

        body[data-bs-theme="dark"] .sidebar-link {
            color: #cbd5e0;
        }

        .sidebar-link:hover,
        .sidebar-link.active {
            background: #f7fafc;
            color: var(--primary-color);
            border-left-color: var(--primary-color);
            padding-left: 17px;
        }

        body[data-bs-theme="dark"] .sidebar-link:hover,
        body[data-bs-theme="dark"] .sidebar-link.active {
            background: #3d3d54;
            color: var(--primary-color);
        }

        .sidebar-link i {
            font-size: 16px;
            width: 20px;
            text-align: center;
        }

        .sidebar-collapse {
            padding: 0;
        }

        .sidebar-collapse-btn {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            width: 100%;
            padding: 12px 20px;
            background: none;
            border: none;
            color: #2d3748;
            text-decoration: none;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 14px;
            border-left: 3px solid transparent;
        }

        body[data-bs-theme="dark"] .sidebar-collapse-btn {
            color: #cbd5e0;
        }

        .sidebar-collapse-btn:hover,
        .sidebar-collapse-btn.active {
            background: #f7fafc;
            color: var(--primary-color);
            border-left-color: var(--primary-color);
            padding-left: 17px;
        }

        body[data-bs-theme="dark"] .sidebar-collapse-btn:hover,
        body[data-bs-theme="dark"] .sidebar-collapse-btn.active {
            background: #3d3d54;
        }

        .sidebar-collapse-btn i:last-child {
            font-size: 12px;
            transition: transform 0.3s ease;
        }

        .sidebar-collapse-btn.active i:last-child {
            transform: rotate(180deg);
        }

        .sidebar-submenu {
            display: none;
            background: #f7fafc;
            border-left: 3px solid var(--primary-color);
            list-style: none;
            padding: 0;
            margin: 0;
        }

        body[data-bs-theme="dark"] .sidebar-submenu {
            background: #3d3d54;
        }

        .sidebar-submenu.active {
            display: block;
        }

        .sidebar-submenu li a {
            display: block;
            padding: 10px 20px 10px 40px;
            color: #2d3748;
            text-decoration: none;
            font-size: 13px;
            transition: all 0.3s ease;
        }

        body[data-bs-theme="dark"] .sidebar-submenu li a {
            color: #a0aec0;
        }

        .sidebar-submenu li a:hover {
            color: var(--primary-color);
            padding-left: 45px;
        }

        /* Main Content */
        .main-content {
            margin-left: var(--sidebar-width);
            margin-top: var(--topbar-height);
            padding: 30px;
            min-height: calc(100vh - var(--topbar-height));
            transition: all 0.3s ease;
        }

        body[data-bs-theme="dark"] .main-content {
            background: #1a1a2e;
        }

        .main-content.expanded {
            margin-left: 0;
        }

        /* Footer */
        .footer {
            background: white;
            padding: 20px 30px;
            text-align: center;
            color: #718096;
            font-size: 13px;
            border-top: 1px solid #e2e8f0;
            margin-top: 40px;
        }

        body[data-bs-theme="dark"] .footer {
            background: #2d2d44;
            color: #a0aec0;
            border-top-color: #4d4d64;
        }

        .footer a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 600;
        }

        .footer a:hover {
            text-decoration: underline;
        }

        /* Responsive */
        @media (max-width: 768px) {
            :root {
                --sidebar-width: 0;
            }

            .sidebar {
                width: 260px;
                transform: translateX(-100%);
            }

            .sidebar.mobile-open {
                transform: translateX(0);
                box-shadow: 2px 0 20px rgba(0, 0, 0, 0.1);
            }

            .main-content {
                margin-left: 0;
                padding: 20px;
            }

            .search-box {
                display: none;
            }

            .topbar {
                padding: 0 15px;
            }

            .topbar-brand {
                margin-right: 10px;
                font-size: 18px;
            }
        }

        /* Scrollbar */
        .sidebar::-webkit-scrollbar {
            width: 6px;
        }

        .sidebar::-webkit-scrollbar-track {
            background: transparent;
        }

        .sidebar::-webkit-scrollbar-thumb {
            background: #cbd5e0;
            border-radius: 3px;
        }

        .sidebar::-webkit-scrollbar-thumb:hover {
            background: #a0aec0;
        }
    </style>

    @yield('extra-css')
</head>
<body>
    <!-- Topbar -->
    <div class="topbar">
        <button class="topbar-toggle" id="sidebarToggle" title="Toggle Sidebar">
            <i class="fas fa-bars"></i>
        </button>
        <a href="{{ route('dashboard') }}" class="topbar-brand">
            <i class="fas fa-boxes"></i> IMS
        </a>

        <div class="topbar-spacer"></div>

        <div class="topbar-actions">
            <div class="search-box">
                <input type="text" class="form-control" placeholder="Search...">
            </div>

            <button class="theme-toggle" id="themeToggle" title="Toggle Dark Mode">
                <i class="fas fa-moon"></i>
            </button>

            <div class="user-menu" id="userMenu">
                <button class="user-profile-btn" id="userMenuBtn">
                    <i class="fas fa-user-circle"></i>
                </button>
                <div class="user-dropdown" id="userDropdown">
                    <a href="#"><i class="fas fa-user"></i> Profile</a>
                    <a href="#"><i class="fas fa-cog"></i> Settings</a>
                    <a href="#"><i class="fas fa-history"></i> Activity</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"><i class="fas fa-sign-out-alt"></i> Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <ul class="sidebar-nav">
            <li class="sidebar-nav-item">
                <a href="{{ route('dashboard') }}" class="sidebar-link active">
                    <i class="fas fa-chart-line"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="sidebar-nav-item">
                <div class="sidebar-heading">Management</div>
            </li>

            <li class="sidebar-nav-item">
                <button class="sidebar-collapse-btn" data-target="#productsMenu">
                    <span><i class="fas fa-boxes"></i> Products</span>
                    <i class="fas fa-chevron-down"></i>
                </button>
                <ul class="sidebar-submenu" id="productsMenu">
                    <li><a href="{{ route('add.product') }}"><i class="fas fa-plus-circle"></i> Add Product</a></li>
                    <li><a href="{{ route('all.product') }}"><i class="fas fa-list"></i> Stock Report</a></li>
                    <li><a href="{{ route('available.products') }}"><i class="fas fa-check-circle"></i> Available</a></li>
                    <li><a href="{{ route('sold.products') }}"><i class="fas fa-shopping-bag"></i> Sold Products</a></li>
                </ul>
            </li>

            <li class="sidebar-nav-item">
                <button class="sidebar-collapse-btn" data-target="#ordersMenu">
                    <span><i class="fas fa-receipt"></i> Orders</span>
                    <i class="fas fa-chevron-down"></i>
                </button>
                <ul class="sidebar-submenu" id="ordersMenu">
                    <li><a href="{{ route('new.order') }}"><i class="fas fa-plus-circle"></i> New Order</a></li>
                    <li><a href="{{ route('all.orders') }}"><i class="fas fa-list"></i> All Orders</a></li>
                    <li><a href="{{ route('pending.orders') }}"><i class="fas fa-hourglass-half"></i> Pending</a></li>
                    <li><a href="{{ route('delivered.orders') }}"><i class="fas fa-truck"></i> Delivered</a></li>
                </ul>
            </li>

            <li class="sidebar-nav-item">
                <button class="sidebar-collapse-btn" data-target="#invoicesMenu">
                    <span><i class="fas fa-file-invoice-dollar"></i> Sales</span>
                    <i class="fas fa-chevron-down"></i>
                </button>
                <ul class="sidebar-submenu" id="invoicesMenu">
                    <li><a href="{{ route('new.invoice') }}"><i class="fas fa-plus-circle"></i> New Invoice</a></li>
                    <li><a href="{{ route('all.invoices') }}"><i class="fas fa-list"></i> Invoices</a></li>
                </ul>
            </li>

            <li class="sidebar-nav-item">
                <button class="sidebar-collapse-btn" data-target="#customersMenu">
                    <span><i class="fas fa-users"></i> Customers</span>
                    <i class="fas fa-chevron-down"></i>
                </button>
                <ul class="sidebar-submenu" id="customersMenu">
                    <li><a href="{{ route('add.customer') }}"><i class="fas fa-plus-circle"></i> Add Customer</a></li>
                    <li><a href="{{ route('all.customers') }}"><i class="fas fa-list"></i> Customers List</a></li>
                </ul>
            </li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        @yield('content')

        <!-- Footer -->
        <footer class="footer">
            <p>&copy; 2024 Inventory Management System. All rights reserved.</p>
            <p><a href="#">Privacy Policy</a> &middot; <a href="#">Terms & Conditions</a></p>
        </footer>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- DataTables -->
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.colVis.min.js"></script>

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

        // Sidebar Toggle
        const sidebarToggle = document.getElementById('sidebarToggle');
        const sidebar = document.getElementById('sidebar');
        const mainContent = document.querySelector('.main-content');
        let sidebarOpen = window.innerWidth >= 768;

        sidebarToggle.addEventListener('click', () => {
            if (window.innerWidth < 768) {
                sidebar.classList.toggle('mobile-open');
            } else {
                sidebar.classList.toggle('hidden');
                mainContent.classList.toggle('expanded');
                sidebarOpen = !sidebarOpen;
            }
        });

        // Sidebar Collapse Buttons
        const collapseButtons = document.querySelectorAll('.sidebar-collapse-btn');
        collapseButtons.forEach(btn => {
            btn.addEventListener('click', () => {
                const target = btn.getAttribute('data-target');
                const menu = document.querySelector(target);
                
                // Close other menus
                document.querySelectorAll('.sidebar-submenu').forEach(m => {
                    if (m !== menu) m.classList.remove('active');
                });
                document.querySelectorAll('.sidebar-collapse-btn').forEach(b => {
                    if (b !== btn) b.classList.remove('active');
                });

                // Toggle current menu
                menu.classList.toggle('active');
                btn.classList.toggle('active');
            });
        });

        // User Menu Toggle
        const userMenuBtn = document.getElementById('userMenuBtn');
        const userMenu = document.getElementById('userMenu');

        userMenuBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            userMenu.classList.toggle('active');
        });

        document.addEventListener('click', () => {
            userMenu.classList.remove('active');
        });

        // Close sidebar on link click (mobile)
        const sidebarLinks = document.querySelectorAll('.sidebar-link, .sidebar-submenu a');
        sidebarLinks.forEach(link => {
            link.addEventListener('click', () => {
                if (window.innerWidth < 768) {
                    sidebar.classList.remove('mobile-open');
                }
            });
        });

        // Set active link
        const currentUrl = window.location.pathname;
        document.querySelectorAll('.sidebar-link, .sidebar-submenu a').forEach(link => {
            if (link.getAttribute('href') === currentUrl) {
                link.classList.add('active');
                // Also set parent collapse as active
                const parent = link.closest('.sidebar-submenu');
                if (parent) {
                    parent.classList.add('active');
                    const btn = parent.previousElementSibling;
                    if (btn) btn.classList.add('active');
                }
            }
        });

        // Responsive handling
        window.addEventListener('resize', () => {
            if (window.innerWidth >= 768) {
                sidebar.classList.remove('mobile-open');
            }
        });
    </script>

    @yield('script')
</body>
</html>
