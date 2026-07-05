<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title><?= $this->renderSection('title') ?> - ALLAUNDRY</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="<?= base_url('Assets/NiceAdmin/assets/css/style.css') ?>" rel="stylesheet">
    <style>
        :root {
            --primary: #0d9488;
            --primary-dark: #0f766e;
            --secondary: #f97316;
            --accent-purple: #8b5cf6;
            --accent-pink: #ec4899;
            --accent-amber: #f59e0b;
            --dark: #1e293b;
            --light: #f8fafc;
            --sidebar-bg: #ffffff;
            --sidebar-border: #e2e8f0;
            --text-dark: #0f172a;
            --text-muted: #64748b;
        }

        * {
            font-family: 'Inter', sans-serif;
        }

        body {
            background: var(--light) !important;
            color: var(--text-dark) !important;
        }

        /* HEADER - Teal Gradient */
        #header {
            background: linear-gradient(135deg, #0d9488 0%, #14b8a6 50%, #06b6d4 100%) !important;
            height: 70px !important;
            box-shadow: 0 4px 6px -1px rgba(13, 148, 136, 0.2) !important;
        }

        #header .logo span {
            color: white !important;
            font-size: 1.4rem;
            font-weight: 700;
        }

        #header .toggle-sidebar-btn {
            color: white !important;
            font-size: 1.8rem;
        }

        .header-nav .nav-profile {
            color: white !important;
        }

        .header-nav .nav-profile span {
            color: white !important;
            font-weight: 600;
        }

        /* SIDEBAR - Putih dengan border */
        #sidebar {
            background: var(--sidebar-bg) !important;
            border-right: 2px solid var(--sidebar-border) !important;
            box-shadow: 2px 0 10px rgba(0,0,0,0.05) !important;
        }

        .sidebar-nav .nav-heading {
            color: var(--text-muted) !important;
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            padding: 15px 20px 10px;
            font-weight: 700;
        }

        .sidebar-nav .nav-link {
            color: var(--text-dark) !important;
            font-size: 0.95rem;
            padding: 12px 20px;
            transition: all 0.3s ease;
            border-radius: 8px;
            margin: 4px 10px;
            display: flex;
            align-items: center;
            font-weight: 500;
            border: 1px solid transparent;
        }

        .sidebar-nav .nav-link i {
            color: var(--text-muted) !important;
            margin-right: 12px;
            font-size: 1.2rem;
            transition: all 0.3s ease;
        }

        .sidebar-nav .nav-link:hover {
            color: var(--text-dark) !important;
            background: #f1f5f9 !important;
            border-color: var(--sidebar-border);
        }

        .sidebar-nav .nav-link:hover i {
            color: var(--primary) !important;
        }

        /* ACTIVE MENU - Warna-warni */
        .sidebar-nav .nav-link.active {
            color: white !important;
            background: linear-gradient(135deg, var(--primary) 0%, #14b8a6 100%) !important;
            font-weight: 600;
            box-shadow: 0 4px 12px rgba(13, 148, 136, 0.3);
            border-color: transparent;
        }

        .sidebar-nav .nav-link.active i {
            color: white !important;
        }

        .sidebar-nav .nav-link.collapsed {
            color: var(--text-dark) !important;
            background: transparent !important;
        }

        /* PAGE TITLE */
        .pagetitle {
            margin-bottom: 25px;
            padding-bottom: 15px;
            border-bottom: 2px solid var(--sidebar-border);
        }

        .pagetitle h1 {
            color: var(--text-dark) !important;
            font-size: 1.875rem;
            font-weight: 700;
        }

        .breadcrumb a {
            color: var(--text-muted) !important;
        }

        .breadcrumb .active {
            color: var(--primary) !important;
            font-weight: 600;
        }

        /* CARDS */
        .card {
            border: 1px solid var(--sidebar-border) !important;
            border-radius: 12px !important;
            box-shadow: 0 1px 3px rgba(0,0,0,0.05) !important;
            margin-bottom: 24px;
            background: white !important;
        }

        .card:hover {
            box-shadow: 0 10px 25px rgba(0,0,0,0.1) !important;
        }

        .card-title {
            color: var(--text-dark) !important;
            font-size: 1.25rem;
            font-weight: 600;
        }

        /* INFO CARDS - Border Atas Berwarna-warni */
        .info-card {
            position: relative;
            overflow: hidden;
        }

        .info-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: var(--primary);
        }

        .info-card.sales-card::before { background: var(--secondary); }
        .info-card.revenue-card::before { background: var(--accent-purple); }
        .info-card.customers-card::before { background: var(--accent-pink); }

        .dashboard .card-icon {
            width: 60px;
            height: 60px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
        }

        .dashboard .sales-card .card-icon {
            color: var(--secondary);
            background: #fff7ed;
        }

        .dashboard .revenue-card .card-icon {
            color: var(--accent-purple);
            background: #f5f3ff;
        }

        .dashboard .customers-card .card-icon {
            color: var(--accent-pink);
            background: #fdf2f8;
        }

        .dashboard .info-card h6 {
            font-size: 1.875rem;
            font-weight: 700;
            color: var(--text-dark);
        }

        /* HERO SECTION */
        .hero-laundry {
            background: linear-gradient(135deg, #0d9488 0%, #14b8a6 50%, #06b6d4 100%);
            color: white;
            padding: 40px 0;
            margin-bottom: 30px;
            border-radius: 12px;
        }

        .hero-laundry h1 {
            font-size: 2.5rem;
            font-weight: 700;
            color: white !important;
        }

        .hero-laundry p {
            color: rgba(255,255,255,0.95);
        }

        /* BUTTONS */
        .btn-primary {
            background: var(--primary) !important;
            border-color: var(--primary) !important;
            color: white !important;
        }

        .btn-primary:hover {
            background: var(--primary-dark) !important;
            border-color: var(--primary-dark) !important;
        }

        .btn-success {
            background: var(--secondary) !important;
            border-color: var(--secondary) !important;
        }

        .btn-warning {
            background: var(--accent-amber) !important;
            border-color: var(--accent-amber) !important;
        }

        .btn-danger {
            background: var(--accent-pink) !important;
            border-color: var(--accent-pink) !important;
        }

        /* TABLES */
        .table {
            color: var(--text-dark) !important;
        }

        .table thead th {
            background: #f8fafc !important;
            color: var(--text-muted) !important;
            font-weight: 600;
            border-bottom: 2px solid var(--sidebar-border);
        }

        .table tbody td {
            color: var(--text-dark) !important;
        }

        /* ALERTS */
        .alert {
            border-radius: 8px;
            border: none;
        }

        .alert-success {
            background: #f0fdf4 !important;
            color: #166534 !important;
            border-left: 4px solid var(--primary);
        }

        .alert-info {
            background: #f0f9ff !important;
            color: #075985 !important;
            border-left: 4px solid #0ea5e9;
        }

        .alert-warning {
            background: #fffbeb !important;
            color: #92400e !important;
            border-left: 4px solid var(--accent-amber);
        }

        /* BADGES */
        .badge.bg-primary {
            background: var(--primary) !important;
        }

        .badge.bg-success {
            background: var(--primary) !important;
        }

        .badge.bg-warning {
            background: var(--accent-amber) !important;
            color: white !important;
        }

        .badge.bg-danger {
            background: var(--accent-pink) !important;
        }

        /* FOOTER */
        #footer {
            background: white !important;
            color: var(--text-muted) !important;
            border-top: 1px solid var(--sidebar-border);
        }

        #footer .copyright {
            color: var(--text-muted) !important;
        }

        /* QUICK ACTION */
        .quick-action-btn {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 24px;
            background: white;
            border: 2px solid var(--sidebar-border);
            border-radius: 12px;
            text-decoration: none;
            color: var(--text-dark);
            transition: all 0.3s ease;
        }

        .quick-action-btn:hover {
            border-color: var(--primary);
            background: #f0fdfa;
            transform: translateY(-2px);
            color: var(--primary-dark);
        }

        .quick-action-btn i {
            font-size: 2rem;
            color: var(--primary);
            margin-bottom: 10px;
        }

        /* STATUS ITEMS */
        .status-item {
            display: flex;
            align-items: center;
            padding: 16px;
            background: white;
            border-radius: 8px;
            border-left: 4px solid var(--primary);
            margin-bottom: 12px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.05);
        }

        .status-icon {
            width: 48px;
            height: 48px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.5rem;
            margin-right: 16px;
        }

        .status-icon.bg-warning { background: var(--accent-amber); }
        .status-icon.bg-success { background: var(--primary); }
        .status-icon.bg-primary { background: var(--accent-purple); }

        .status-count {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--text-dark);
            margin-left: auto;
        }

        /* TEXT COLORS */
        h1, h2, h3, h4, h5, h6 {
            color: var(--text-dark) !important;
        }

        .text-muted {
            color: var(--text-muted) !important;
        }

        .text-success {
            color: var(--primary) !important;
        }

        /* RESPONSIVE */
        @media (max-width: 768px) {
            .hero-laundry h1 { font-size: 1.75rem; }
            .pagetitle h1 { font-size: 1.5rem; }
        }
    </style>
</head>
<body>
    <?= $this->include('components/header') ?>
    <?= $this->include('components/sidebar') ?>
    <main id="main" class="main">
        <?= $this->renderSection('content') ?>
    </main>
    <?= $this->include('components/footer') ?>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('Assets/NiceAdmin/assets/js/main.js') ?>"></script>
</body>
</html>