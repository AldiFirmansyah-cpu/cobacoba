<?= $this->extend('layout') ?>
<?= $this->section('title') ?>Tambah Pelanggan<?= $this->endSection() ?>
<?= $this->section('content') ?>

<div class="pagetitle">
    <h1>Tambah Pelanggan Baru</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a href="/pelanggan">Pelanggan</a></li>
            <li class="breadcrumb-item active">Tambah</li>
        </ol>
    </nav>
</div>

<section class="section">
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Form Tambah Pelanggan</h5>
                    <form action="/pelanggan/store" method="post">
                        <?= csrf_field() ?>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Nama Lengkap <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" name="nama" class="form-control" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">No. Telepon <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" name="telepon" class="form-control" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Alamat <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <textarea name="alamat" class="form-control" rows="3" required></textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-9 offset-sm-3">
                                <button type="submit" class="btn btn-primary"><i class="bi bi-save me-1"></i> Simpan</button>
                                <a href="/pelanggan" class="btn btn-secondary">Batal</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>