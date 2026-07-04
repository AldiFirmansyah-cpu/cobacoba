<?= $this->extend('layout') ?>
<?= $this->section('title') ?>Pelanggan<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="pagetitle"><h1>Kelola Pelanggan</h1><nav><ol class="breadcrumb"><li class="breadcrumb-item"><a href="/">Home</a></li><li class="breadcrumb-item active">Pelanggan</li></ol></nav></div>
<section class="section">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="card-title mb-0">Daftar Pelanggan</h5>
                        <a href="/pelanggan/create" class="btn btn-primary"><i class="bi bi-person-plus me-1"></i> Tambah Pelanggan</a>
                    </div>
                    <?php if(session()->getFlashdata('success')): ?><div class="alert alert-success"><?= session()->getFlashdata('success') ?></div><?php endif; ?>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead><tr><th>#</th><th>Nama</th><th>Telepon</th><th>Alamat</th><th>Aksi</th></tr></thead>
                            <tbody>
                                <?php foreach($pelanggan as $index => $p): ?>
                                <tr>
                                    <td><?= $index + 1 ?></td>
                                    <td><strong><?= $p['nama'] ?></strong></td>
                                    <td><i class="bi bi-telephone me-1"></i><?= $p['telepon'] ?></td>
                                    <td><?= $p['alamat'] ?></td>
                                    <td>
                                        <a href="/pelanggan/edit/<?= $p['id'] ?>" class="btn btn-sm btn-warning"><i class="bi bi-pencil"></i></a>
                                        <a href="/pelanggan/delete/<?= $p['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus?')"><i class="bi bi-trash"></i></a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>