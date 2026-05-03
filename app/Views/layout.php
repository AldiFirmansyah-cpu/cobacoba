<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title><?= $this->renderSection('title') ?> - Universitas Oxford Style</title>
    <meta content="Web Profile Kampus" name="description">
    
    <!-- Favicons -->
    <link href="<?= base_url('Assets/NiceAdmin/assets/img/favicon.png') ?>" rel="icon">
    
    <!-- Google Fonts - Oxford Style -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;600;700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    
    <!-- Vendor CSS Files -->
    <link href="<?= base_url('Assets/NiceAdmin/assets/vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('Assets/NiceAdmin/assets/vendor/bootstrap-icons/bootstrap-icons.css') ?>" rel="stylesheet">
    <link href="<?= base_url('Assets/NiceAdmin/assets/vendor/boxicons/css/boxicons.min.css') ?>" rel="stylesheet">
    
    <!-- Template Main CSS File -->
    <link href="<?= base_url('Assets/NiceAdmin/assets/css/style.css') ?>" rel="stylesheet">
    
    <!-- Oxford Custom CSS -->
    <link href="<?= base_url('assets/css/oxford-style.css') ?>" rel="stylesheet">
</head>
<body>
    <?= $this->include('components/header') ?>
    <?= $this->include('components/sidebar') ?>

    <main id="main" class="main">
        <?= $this->renderSection('content') ?>
    </main>

    <?= $this->include('components/footer') ?>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="<?= base_url('Assets/NiceAdmin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= base_url('Assets/NiceAdmin/assets/js/main.js') ?>"></script>
</body>
</html>