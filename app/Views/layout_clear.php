<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title><?= $this->renderSection('title') ?> - Login</title>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;600&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    
    <!-- Vendor CSS -->
    <link href="<?= base_url('Assets/NiceAdmin/assets/vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('Assets/NiceAdmin/assets/css/style.css') ?>" rel="stylesheet">
    
    <!-- Oxford Custom CSS -->
    <link href="<?= base_url('assets/css/oxford-style.css') ?>" rel="stylesheet">
</head>
<body>
    <?= $this->renderSection('content') ?>
    <script src="<?= base_url('Assets/NiceAdmin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
</body>
</html>