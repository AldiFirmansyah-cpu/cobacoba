<?= $this->extend('layout') ?>
<?= $this->section('title') ?>Laporan<?= $this->endSection() ?>
<?= $this->section('content') ?>

<div class="pagetitle">
    <h1>Laporan Transaksi</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active">Laporan</li>
        </ol>
    </nav>
</div>

<section class="section">
    <div class="row">
        <div class="col-lg-4 col-md-6">
            <div class="card info-card revenue-card">
                <div class="card-body">
                    <h5 class="card-title">Total Transaksi</h5>
                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-receipt"></i>
                        </div>
                        <div class="ps-3">
                            <h6><?= $totalTransaksi ?></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6">
            <div class="card info-card sales-card">
                <div class="card-body">
                    <h5 class="card-title">Total Pendapatan</h5>
                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-cash-stack"></i>
                        </div>
                        <div class="ps-3">
                            <h6>Rp <?= number_format($totalPendapatan, 0, ',', '.') ?></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6">
            <div class="card info-card customers-card">
                <div class="card-body">
                    <h5 class="card-title">Rata-rata per Transaksi</h5>
                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-graph-up"></i>
                        </div>
                        <div class="ps-3">
                            <h6>Rp <?= number_format($rataRata, 0, ',', '.') ?></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="card-title mb-0">Detail Transaksi</h5>
                        <a href="/laporan/pdf" target="_blank" class="btn btn-primary">
                            <i class="bi bi-file-earmark-pdf me-1"></i> Cetak Laporan
                        </a>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>No. Transaksi</th>
                                    <th>Pelanggan</th>
                                    <th>Items</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th>Tanggal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(empty($transaksi)): ?>
                                <tr><td colspan="7" class="text-center">Belum ada transaksi</td></tr>
                                <?php else: ?>
                                <?php foreach($transaksi as $index => $t): ?>
                                <?php
                                $badgeClass = 'secondary';
                                if (isset($t['status'])) {
                                    if ($t['status'] === 'Diproses') $badgeClass = 'warning';
                                    elseif ($t['status'] === 'Selesai') $badgeClass = 'success';
                                    elseif ($t['status'] === 'Diambil') $badgeClass = 'info';
                                }
                                ?>
                                <tr>
                                    <td><?= $index + 1 ?></td>
                                    <td><strong><?= esc($t['no_transaksi'] ?? '-') ?></strong></td>
                                    <td><?= esc($t['pelanggan'] ?? '-') ?></td>
                                    <td><?= esc($t['items'] ?? '-') ?></td>
                                    <td><strong>Rp <?= number_format($t['total'] ?? 0, 0, ',', '.') ?></strong></td>
                                    <td><span class="badge bg-<?= $badgeClass ?>"><?= esc($t['status'] ?? '-') ?></span></td>
                                    <td><?= esc($t['tanggal'] ?? '-') ?></td>
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