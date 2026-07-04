<?= $this->extend('layout_clear') ?>
<?= $this->section('title') ?>Login<?= $this->endSection() ?>
<?= $this->section('content') ?>
<main>
    <div class="container">
        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5 col-md-8 d-flex flex-column align-items-center justify-content-center">
                        <div class="d-flex justify-content-center py-4">
                            <a href="/" class="logo d-flex align-items-center w-auto">
                                <i class="bi bi-droplet-fill" style="font-size: 2.5rem; color: #0ea5e9;"></i>
                                <span class="d-none d-lg-block ms-2" style="font-family: 'Oswald', sans-serif; font-size: 1.5rem; color: #0369a1;">ALLAUNDRY</span>
                            </a>
                        </div>
                        <div class="card mb-3 login-card">
                            <div class="card-body">
                                <div class="pt-4 pb-2">
                                    <h5 class="card-title text-center pb-0 fs-4">Login Administrator</h5>
                                    <p class="text-center small">Masukkan username & password</p>
                                </div>
                                <?php if(session()->getFlashdata('error')): ?>
                                    <div class="alert alert-danger"><i class="bi bi-exclamation-circle me-1"></i><?= session()->getFlashdata('error') ?></div>
                                <?php endif; ?>
                                <?php if(session()->getFlashdata('success')): ?>
                                    <div class="alert alert-success"><i class="bi bi-check-circle me-1"></i><?= session()->getFlashdata('success') ?></div>
                                <?php endif; ?>
                                <form class="row g-3" action="/loginProcess" method="post">
                                    <?= csrf_field() ?>
                                    <div class="col-12">
                                        <label class="form-label">Username</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-person"></i></span>
                                            <input type="text" name="username" class="form-control" required autofocus>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">Password</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-lock"></i></span>
                                            <input type="password" name="password" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-primary w-100 py-2" type="submit"><i class="bi bi-box-arrow-in-right me-1"></i> Login</button>
                                    </div>
                                    <div class="col-12">
                                        <div class="alert alert-info mb-0">
                                            <small><strong>Default Login:</strong><br>👤 admin / admin123<br>👤 kasir / kasir123</small>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="credits text-center">Designed by <a href="#">Aldi Firmansyah</a> - UAS PWL 2026</div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</main>
<?= $this->endSection() ?>