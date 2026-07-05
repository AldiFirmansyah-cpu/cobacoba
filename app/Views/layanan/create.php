<?= $this->extend('layout') ?>
<?= $this->section('title') ?>Tambah Layanan<?= $this->endSection() ?>
<?= $this->section('content') ?>

<div class="pagetitle">
    <h1>Tambah Layanan Baru</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a href="/layanan">Layanan</a></li>
            <li class="breadcrumb-item active">Tambah</li>
        </ol>
    </nav>
</div>

<section class="section">
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Form Tambah Layanan</h5>
                    <form action="/layanan/store" method="post">
                        <?= csrf_field() ?>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Nama Layanan <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" name="nama" class="form-control" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Harga <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="number" name="harga" class="form-control" min="0" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Satuan <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <select name="satuan" class="form-select" required>
                                    <option value="">-- Pilih Satuan --</option>
                                    <option value="kg">Kilogram (kg)</option>
                                    <option value="pcs">Pcs</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Estimasi <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" name="estimasi" class="form-control" placeholder="Contoh: 1-2 hari" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Deskripsi</label>
                            <div class="col-sm-9">
                                <textarea name="deskripsi" class="form-control" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-9 offset-sm-3">
                                <button type="submit" class="btn btn-primary"><i class="bi bi-save me-1"></i> Simpan</button>
                                <a href="/layanan" class="btn btn-secondary">Batal</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>