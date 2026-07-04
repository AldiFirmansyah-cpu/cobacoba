<?= $this->extend('layout') ?>
<?= $this->section('title') ?>Transaksi<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="pagetitle">
    <h1>Transaksi</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active">Transaksi</li>
        </ol>
    </nav>
</div>

<section class="section">
    <div class="row">
        <!-- Statistik -->
        <div class="col-lg-3 col-md-6">
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
        
        <div class="col-lg-3 col-md-6">
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
        
        <div class="col-lg-3 col-md-6">
            <div class="card info-card customers-card">
                <div class="card-body">
                    <h5 class="card-title">Transaksi Hari Ini</h5>
                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-calendar-check"></i>
                        </div>
                        <div class="ps-3">
                            <h6><?= count($transaksiHariIni) ?></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Transaksi Diproses</h5>
                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" style="background: #fff3cd; color: #fd7e14;">
                            <i class="bi bi-clock-history"></i>
                        </div>
                        <div class="ps-3">
                            <h6><?= count(array_filter($transaksi, fn($t) => $t['status'] === 'Diproses')) ?></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Tabel Transaksi -->
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Daftar Transaksi</h5>
                    <a href="/keranjang" class="btn btn-primary mb-3">
                        <i class="bi bi-cart-plus me-1"></i> Transaksi Baru
                    </a>
                    
                    <?php if(session()->getFlashdata('success')): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="bi bi-check-circle me-1"></i>
                        <?= session()->getFlashdata('success') ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                    <?php endif; ?>
                    
                    <div class="table-responsive">
                        <table class="table table-hover datatable">
                            <thead>
                                <tr>
                                    <th>No. Transaksi</th>
                                    <th>Pelanggan</th>
                                    <th>Items</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th>Tanggal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(empty($transaksi)): ?>
                                <tr>
                                    <td colspan="7" class="text-center">Belum ada transaksi</td>
                                </tr>
                                <?php else: ?>
                                    <?php foreach(array_reverse($transaksi) as $t): ?>
                                    <?php 
                                    $badgeClass = [
                                        'Diproses' => 'warning',
                                        'Selesai' => 'success',
                                        'Diambil' => 'info',
                                        'Dibatalkan' => 'danger'
                                    ][$t['status']] ?? 'secondary';
                                    ?>
                                    <tr>
                                        <td><strong><?= $t['no_transaksi'] ?></strong></td>
                                        <td><?= $t['pelanggan'] ?></td>
                                        <td><?= $t['items'] ?></td>
                                        <td><strong>Rp <?= number_format($t['total'], 0, ',', '.') ?></strong></td>
                                        <td><span class="badge bg-<?= $badgeClass ?>"><?= $t['status'] ?></span></td>
                                        <td><?= date('d/m/Y', strtotime($t['tanggal'])) ?></td>
                                        <td>
                                            <a href="/transaksi/detail/<?= $t['id'] ?>" class="btn btn-sm btn-info" title="Detail">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                            <?php if($t['status'] === 'Diproses'): ?>
                                            <a href="/transaksi/status/<?= $t['id'] ?>/Selesai" class="btn btn-sm btn-success" title="Selesai">
                                                <i class="bi bi-check"></i>
                                            </a>
                                            <?php elseif($t['status'] === 'Selesai'): ?>
                                            <a href="/transaksi/status/<?= $t['id'] ?>/Diambil" class="btn btn-sm btn-secondary" title="Diambil">
                                                <i class="bi bi-box-arrow-right"></i>
                                            </a>
                                            <?php endif; ?>
                                            <a href="/transaksi/cetak/<?= $t['id'] ?>" class="btn btn-sm btn-primary" title="Cetak" target="_blank">
                                                <i class="bi bi-printer"></i>
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