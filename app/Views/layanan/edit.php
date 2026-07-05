<?= $this->extend('layout') ?>
<?= $this->section('title') ?>Edit Layanan<?= $this->endSection() ?>
<?= $this->section('content') ?>

<div class="pagetitle">
    <h1>Edit Layanan</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a href="/layanan">Layanan</a></li>
            <li class="breadcrumb-item active">Edit</li>
        </ol>
    </nav>
</div>

<section class="section">
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Form Edit Layanan</h5>
                    <form action="/layanan/update/<?= $item['id'] ?>" method="post">
                        <?= csrf_field() ?>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Nama Layanan <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" name="nama" class="form-control" value="<?= esc($item['nama']) ?>" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Harga <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="number" name="harga" class="form-control" value="<?= $item['harga'] ?>" min="0" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Satuan <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <select name="satuan" class="form-select" required>
                                    <option value="kg" <?= $item['satuan'] == 'kg' ? 'selected' : '' ?>>Kilogram (kg)</option>
                                    <option value="pcs" <?= $item['satuan'] == 'pcs' ? 'selected' : '' ?>>Pcs</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Estimasi <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" name="estimasi" class="form-control" value="<?= esc($item['estimasi']) ?>" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Deskripsi</label>
                            <div class="col-sm-9">
                                <textarea name="deskripsi" class="form-control" rows="3"><?= esc($item['deskripsi'] ?? '') ?></textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-9 offset-sm-3">
                                <button type="submit" class="btn btn-primary"><i class="bi bi-save me-1"></i> Update</button>
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