<?= $this->extend('layout') ?>
<?= $this->section('title') ?>Laporan<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="pagetitle"><h1>Laporan Transaksi</h1><nav><ol class="breadcrumb"><li class="breadcrumb-item"><a href="/">Home</a></li><li class="breadcrumb-item active">Laporan</li></ol></nav></div>
<section class="section">
    <div class="row">
        <div class="col-xxl-4 col-md-6">
            <div class="card info-card revenue-card">
                <div class="card-body">
                    <h5 class="card-title">Total Pendapatan</h5>
                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center"><i class="bi bi-cash-stack"></i></div>
                        <div class="ps-3"><h6>Rp <?= number_format($totalPendapatan, 0, ',', '.') ?></h6></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xxl-4 col-md-6">
            <div class="card info-card sales-card">
                <div class="card-body">
                    <h5 class="card-title">Total Transaksi</h5>
                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center"><i class="bi bi-receipt"></i></div>
                        <div class="ps-3"><h6><?= $totalTransaksi ?></h6></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xxl-4 col-md-6">
            <div class="card info-card customers-card">
                <div class="card-body">
                    <h5 class="card-title">Rata-rata/Transaksi</h5>
                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center"><i class="bi bi-graph-up"></i></div>
                        <div class="ps-3"><h6>Rp <?= number_format($rataRata, 0, ',', '.') ?></h6></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="card-title mb-0">Detail Transaksi</h5>
                        <div>
                            <a href="/laporan/pdf" target="_blank" class="btn btn-danger"><i class="bi bi-file-earmark-pdf me-1"></i> Download PDF</a>
                            <button onclick="window.print()" class="btn btn-primary"><i class="bi bi-printer me-1"></i> Print</button>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead><tr><th>No. Transaksi</th><th>Pelanggan</th><th>Items</th><th>Total</th><th>Status</th><th>Tanggal</th></tr></thead>
                            <tbody>
                                <?php foreach($transaksi as $t): ?>
                                <tr>
                                    <td><strong><?= $t['no_transaksi'] ?></strong></td>
                                    <td><?= $t['pelanggan'] ?></td>
                                    <td><?= $t['items'] ?></td>
                                    <td>Rp <?= number_format($t['total'], 0, ',', '.') ?></td>
                                    <td><span class="badge bg-primary"><?= $t['status'] ?></span></td>
                                    <td><?= $t['tanggal'] ?></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr class="table-primary">
                                    <th colspan="3">TOTAL PENDAPATAN</th>
                                    <th colspan="3" class="text-primary">Rp <?= number_format($totalPendapatan, 0, ',', '.') ?></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>