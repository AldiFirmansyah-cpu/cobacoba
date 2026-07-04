<?= $this->extend('layout') ?>
<?= $this->section('title') ?>Detail Transaksi<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="pagetitle">
    <h1>Detail Transaksi</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a href="/transaksi">Transaksi</a></li>
            <li class="breadcrumb-item active">Detail</li>
        </ol>
    </nav>
</div>

<section class="section">
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Detail Transaksi</h5>
                    
                    <?php if($item): ?>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <p><strong>No. Transaksi:</strong> <?= $item['no_transaksi'] ?></p>
                            <p><strong>Tanggal:</strong> <?= date('d/m/Y H:i', strtotime($item['tanggal'] . ' ' . ($item['waktu'] ?? '00:00:00'))) ?></p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Status:</strong> <span class="badge bg-primary"><?= $item['status'] ?></span></p>
                            <p><strong>Pelanggan:</strong> <?= $item['pelanggan'] ?></p>
                        </div>
                    </div>
                    
                    <hr>
                    
                    <h6>Items:</h6>
                    <p><?= $item['items'] ?></p>
                    
                    <hr>
                    
                    <div class="d-flex justify-content-between align-items-center">
                        <h4>Total:</h4>
                        <h3 class="text-primary">Rp <?= number_format($item['total'], 0, ',', '.') ?></h3>
                    </div>
                    
                    <div class="mt-4">
                        <a href="/transaksi" class="btn btn-secondary">
                            <i class="bi bi-arrow-left me-1"></i> Kembali
                        </a>
                        <button onclick="window.print()" class="btn btn-primary">
                            <i class="bi bi-printer me-1"></i> Cetak
                        </button>
                    </div>
                    <?php else: ?>
                    <div class="alert alert-danger">
                        Transaksi tidak ditemukan
                    </div>
                    <a href="/transaksi" class="btn btn-secondary">Kembali</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>