<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title><?= $this->renderSection('title') ?> - ALLAUNDRY</title>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;600;700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="<?= base_url('Assets/NiceAdmin/assets/css/style.css') ?>" rel="stylesheet">
    <style>
        :root { --primary: #0ea5e9; --secondary: #0369a1; --dark: #0c4a6e; --light: #e0f2fe; --accent: #06b6d4; }
        body { font-family: 'Open Sans', sans-serif; background: #f0f9ff; }
        h1,h2,h3,h4,h5,h6 { font-family: 'Oswald', sans-serif; }
        #header { background: linear-gradient(135deg, var(--secondary), var(--dark)) !important; height: 70px; }
        #header .logo span { color: white !important; font-size: 1.4rem; font-weight: 700; }
        #sidebar { background: linear-gradient(180deg, var(--secondary), var(--dark)) !important; border-right: 3px solid var(--accent); }
        .sidebar-nav .nav-link { color: rgba(255,255,255,0.85) !important; border-left: 4px solid transparent; }
        .sidebar-nav .nav-link:hover, .sidebar-nav .nav-link.active { color: white !important; background: rgba(255,255,255,0.1) !important; border-left-color: var(--accent); }
        .sidebar-nav .nav-heading { color: rgba(255,255,255,0.5) !important; }
        .sidebar-nav i { color: var(--accent); }
        .pagetitle { border-bottom: 3px solid var(--primary); padding-bottom: 15px; }
        .pagetitle h1 { color: var(--dark) !important; font-size: 2rem; }
        .card { border: none !important; border-top: 4px solid var(--primary) !important; box-shadow: 0 3px 15px rgba(14,165,233,0.1) !important; }
        .card:hover { transform: translateY(-3px); box-shadow: 0 8px 25px rgba(14,165,233,0.2) !important; }
        .card-title { color: var(--dark) !important; font-size: 1.3rem; }
        .btn-primary { background-color: var(--primary) !important; border-color: var(--primary) !important; }
        .btn-primary:hover { background-color: var(--secondary) !important; }
        #footer { background: linear-gradient(135deg, var(--secondary), var(--dark)) !important; color: white !important; border-top: 3px solid var(--accent); }
        #footer .copyright a { color: var(--accent); }
        .hero-laundry { background: linear-gradient(135deg, var(--secondary), var(--dark)); color: white; padding: 50px 0; margin-bottom: 30px; border-radius: 12px; border-bottom: 5px solid var(--accent); }
        .hero-laundry h1 { font-size: 2.5rem; font-weight: 700; }
        .info-card .card-icon { width: 64px; height: 64px; font-size: 32px; }
        .sales-card .card-icon { color: var(--primary); background: var(--light); }
        .revenue-card .card-icon { color: #10b981; background: #d1fae5; }
        .customers-card .card-icon { color: #f59e0b; background: #fef3c7; }
        .quick-action-btn { display: flex; flex-direction: column; align-items: center; padding: 25px; background: linear-gradient(135deg, var(--light), white); border: 2px solid var(--primary); border-radius: 10px; text-decoration: none; color: var(--dark); transition: all 0.3s; }
        .quick-action-btn:hover { background: linear-gradient(135deg, var(--primary), var(--secondary)); color: white; transform: translateY(-5px); }
        .quick-action-btn i { font-size: 2.5rem; margin-bottom: 10px; }
        .status-item { display: flex; align-items: center; padding: 15px; background: var(--light); border-radius: 8px; border-left: 4px solid var(--primary); margin-bottom: 10px; }
        .status-icon { width: 50px; height: 50px; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-size: 1.5rem; margin-right: 15px; }
        .status-count { font-size: 1.8rem; font-weight: 700; color: var(--primary); }
        .nav-profile img { border: 2px solid var(--accent); }
        .dropdown-menu { border-top: 3px solid var(--primary); }
        .table thead { background: var(--light); }
        .table thead th { color: var(--dark); font-weight: 600; }
        .badge { padding: 6px 12px; border-radius: 6px; }
        .alert { border-radius: 8px; border: none; }
        .alert-success { background: #d1fae5; color: #065f46; border-left: 4px solid #10b981; }
        .alert-info { background: var(--light); color: var(--dark); border-left: 4px solid var(--primary); }
        .alert-danger { background: #fee2e2; color: #991b1b; border-left: 4px solid #ef4444; }
        @media (max-width: 768px) { .hero-laundry h1 { font-size: 1.8rem; } .pagetitle h1 { font-size: 1.5rem; } }
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