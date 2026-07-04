<?= $this->extend('layout') ?>
<?= $this->section('title') ?>Layanan Laundry<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="pagetitle">
    <h1>Daftar Layanan</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active">Layanan</li>
        </ol>
    </nav>
</div>

<section class="section">
    <div class="row">
        <?php foreach ($layanan as $item): ?>
        <div class="col-lg-4 col-md-6">
            <div class="card layanan-card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <h5 class="card-title mb-0">
                            <i class="bi <?= $item['ikon'] ?> me-2"></i><?= $item['nama'] ?>
                        </h5>
                        <span class="badge bg-success"><?= $item['status'] ?></span>
                    </div>
                    
                    <h6 class="harga-laundry">
                        Rp <?= number_format($item['harga'], 0, ',', '.') ?>
                        <small class="text-muted">/ <?= $item['satuan'] ?></small>
                    </h6>
                    
                    <p class="card-text"><?= $item['deskripsi'] ?></p>
                    
                    <div class="mt-3 pt-3 border-top">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <small class="text-muted"><i class="bi bi-clock me-1"></i>Estimasi:</small><br>
                                <strong><?= $item['estimasi'] ?></strong>
                            </div>
                            <button class="btn btn-sm btn-primary">
                                <i class="bi bi-plus-circle"></i> Pilih
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</section>
<?= $this->endSection() ?>