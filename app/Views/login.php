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
                                <img src="<?= base_url('Assets/NiceAdmin/assets/img/logo.png') ?>" alt="">
                                <span class="d-none d-lg-block ms-2" style="font-family: 'Oswald', sans-serif; font-size: 1.5rem; color: #002147;">UNIVERSITAS</span>
                            </a>
                        </div>

                        <div class="card mb-3 login-card">
                            <div class="card-body">
                                <div class="pt-4 pb-2">
                                    <h5 class="card-title text-center pb-0 fs-4">Login Administrator</h5>
                                    <p class="text-center small">Masukkan username & password</p>
                                </div>

                                <?php if(session()->getFlashdata('error')): ?>
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <i class="bi bi-exclamation-circle me-1"></i>
                                        <?= session()->getFlashdata('error') ?>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                    </div>
                                <?php endif; ?>

                                <?php if(session()->getFlashdata('success')): ?>
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <i class="bi bi-check-circle me-1"></i>
                                        <?= session()->getFlashdata('success') ?>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                    </div>
                                <?php endif; ?>

                                <form class="row g-3 needs-validation" action="/loginProcess" method="post" novalidate>
                                    <?= csrf_field() ?>
                                    
                                    <div class="col-12">
                                        <label for="username" class="form-label">Username</label>
                                        <div class="input-group has-validation">
                                            <span class="input-group-text"><i class="bi bi-person"></i></span>
                                            <input type="text" name="username" class="form-control" id="username" required autofocus>
                                            <div class="invalid-feedback">Masukkan username!</div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <label for="password" class="form-label">Password</label>
                                        <div class="input-group has-validation">
                                            <span class="input-group-text"><i class="bi bi-lock"></i></span>
                                            <input type="password" name="password" class="form-control" id="password" required>
                                            <div class="invalid-feedback">Masukkan password!</div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <button class="btn btn-primary w-100" type="submit">Login</button>
                                    </div>
                                    
                                    <div class="col-12">
                                        <div class="alert alert-info mb-0">
                                            <small><strong>Default Login:</strong><br>Username: <b>admin</b><br>Password: <b>admin123</b></small>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</main>
<?= $this->endSection() ?>