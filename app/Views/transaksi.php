<?= $this->extend('layout') ?>
<?= $this->section('title') ?>Transaksi<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="pagetitle">
    <h1>Data Transaksi</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active">Transaksi</li>
        </ol>
    </nav>
</div>

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="card-title mb-0">Riwayat Transaksi</h5>
                        <button class="btn btn-primary">
                            <i class="bi bi-plus-circle me-1"></i> Transaksi Baru
                        </button>
                    </div>

                    <!-- Filter Status -->
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="btn-group" role="group">
                                <button type="button" class="btn btn-outline-primary active">Semua</button>
                                <button type="button" class="btn btn-outline-warning">Diproses</button>
                                <button type="button" class="btn btn-outline-success">Selesai</button>
                                <button type="button" class="btn btn-outline-info">Siap Diambil</button>
                                <button type="button" class="btn btn-outline-secondary">Diambil</button>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover datatable">
                            <thead>
                                <tr>
                                    <th>No. Transaksi</th>
                                    <th>Pelanggan</th>
                                    <th>Layanan</th>
                                    <th>Berat/Jumlah</th>
                                    <th>Total</th>
                                    <th>Tanggal</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($transaksi as $tx): ?>
                                <tr>
                                    <td><strong><?= $tx['id'] ?></strong></td>
                                    <td><?= $tx['pelanggan'] ?></td>
                                    <td><?= $tx['layanan'] ?></td>
                                    <td><?= $tx['berat'] ?> kg</td>
                                    <td><strong>Rp <?= number_format($tx['total'], 0, ',', '.') ?></strong></td>
                                    <td><?= date('d M Y', strtotime($tx['tanggal'])) ?></td>
                                    <td>
                                        <?php
                                            $badgeClass = [
                                                'Diproses' => 'warning',
                                                'Selesai' => 'success',
                                                'Siap Diambil' => 'info',
                                                'Diambil' => 'secondary'
                                            ];
                                        ?>
                                        <span class="badge bg-<?= $badgeClass[$tx['status']] ?>">
                                            <?= $tx['status'] ?>
                                        </span>
                                    </td>
                                    <td>
                                        <button class="btn btn-sm btn-info" title="Detail">
                                            <i class="bi bi-eye"></i>
                                        </button>
                                        <button class="btn btn-sm btn-warning" title="Edit">
                                            <i class="bi bi-pencil"></i>
                                        </button>
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