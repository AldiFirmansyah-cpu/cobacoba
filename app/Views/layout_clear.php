<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title><?= $this->renderSection('title') ?> - Login ALLAUNDRY</title>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;600&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="<?= base_url('Assets/NiceAdmin/assets/css/style.css') ?>" rel="stylesheet">
    <style>
        :root { --primary: #0ea5e9; --secondary: #0369a1; --dark: #0c4a6e; }
        body { font-family: 'Open Sans', sans-serif; background: #f0f9ff; }
        .login-card { border-top: 5px solid var(--primary) !important; box-shadow: 0 10px 30px rgba(14,165,233,0.2) !important; }
        .login-card .card-title { color: var(--dark); font-size: 1.8rem; }
        .btn-primary { background: var(--primary) !important; border-color: var(--primary) !important; }
        .btn-primary:hover { background: var(--secondary) !important; }
        .alert-info { background: #e0f2fe; color: var(--dark); border-left: 4px solid var(--primary); }
        .alert-danger { background: #fee2e2; color: #991b1b; border-left: 4px solid #ef4444; }
        .alert-success { background: #d1fae5; color: #065f46; border-left: 4px solid #10b981; }
    </style>
</head>
<body>
    <?= $this->renderSection('content') ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>