<?= $this->extend('layout') ?>
<?= $this->section('title') ?>Edit Pelanggan<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="pagetitle"><h1>Edit Pelanggan</h1><nav><ol class="breadcrumb"><li class="breadcrumb-item"><a href="/">Home</a></li><li class="breadcrumb-item"><a href="/pelanggan">Pelanggan</a></li><li class="breadcrumb-item active">Edit</li></ol></nav></div>
<section class="section">
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Form Edit Pelanggan</h5>
                    <form action="/pelanggan/update/<?= $item['id'] ?>" method="post">
                        <?= csrf_field() ?>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Nama Lengkap</label>
                            <div class="col-sm-9"><input type="text" name="nama" class="form-control" value="<?= $item['nama'] ?>" required></div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">No. Telepon</label>
                            <div class="col-sm-9"><input type="text" name="telepon" class="form-control" value="<?= $item['telepon'] ?>" required></div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Alamat</label>
                            <div class="col-sm-9"><textarea name="alamat" class="form-control" rows="3" required><?= $item['alamat'] ?></textarea></div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-9 offset-sm-3">
                                <button type="submit" class="btn btn-primary"><i class="bi bi-save me-1"></i> Update</button>
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