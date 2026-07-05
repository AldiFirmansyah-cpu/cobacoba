<?= $this->extend('layout') ?>
<?= $this->section('title') ?>Layanan<?= $this->endSection() ?>
<?= $this->section('content') ?>

<div class="pagetitle">
    <h1>Kelola Layanan</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active">Layanan</li>
        </ol>
    </nav>
</div>

<section class="section">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="card-title mb-0">Daftar Layanan</h5>
                        <a href="/layanan/create" class="btn btn-primary">
                            <i class="bi bi-plus-circle me-1"></i> Tambah Layanan
                        </a>
                    </div>

                    <?php if(session()->getFlashdata('success')): ?>
                    <div class="alert alert-success alert-dismissible fade show">
                        <i class="bi bi-check-circle me-1"></i><?= session()->getFlashdata('success') ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                    <?php endif; ?>

                    <?php if(session()->getFlashdata('error')): ?>
                    <div class="alert alert-danger alert-dismissible fade show">
                        <i class="bi bi-exclamation-circle me-1"></i><?= session()->getFlashdata('error') ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                    <?php endif; ?>

                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Layanan</th>
                                    <th>Harga</th>
                                    <th>Satuan</th>
                                    <th>Estimasi</th>
                                    <th>Deskripsi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(empty($layanan)): ?>
                                <tr><td colspan="7" class="text-center">Belum ada layanan</td></tr>
                                <?php else: ?>
                                <?php foreach($layanan as $index => $l): ?>
                                <tr>
                                    <td><?= $index + 1 ?></td>
                                    <td><strong><?= esc($l['nama']) ?></strong></td>
                                    <td>Rp <?= number_format($l['harga'], 0, ',', '.') ?></td>
                                    <td><?= esc($l['satuan']) ?></td>
                                    <td><?= esc($l['estimasi']) ?></td>
                                    <td><?= esc($l['deskripsi'] ?? '-') ?></td>
                                    <td>
                                        <a href="/layanan/edit/<?= $l['id'] ?>" class="btn btn-sm btn-warning" title="Edit">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <a href="/layanan/delete/<?= $l['id'] ?>" class="btn btn-sm btn-danger" title="Hapus" onclick="return confirm('Yakin hapus layanan ini?')">
                                            <i class="bi bi-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>