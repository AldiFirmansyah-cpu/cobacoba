<?= $this->extend('layout') ?>
<?= $this->section('title') ?>Laporan<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="pagetitle">
    <h1>Laporan Keuangan</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active">Laporan</li>
        </ol>
    </nav>
</div>

<section class="section">
    <!-- Summary Cards -->
    <div class="row">
        <div class="col-xxl-3 col-md-6">
            <div class="card info-card revenue-card">
                <div class="card-body">
                    <h5 class="card-title">Total Pendapatan</h5>
                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-cash-stack"></i>
                        </div>
                        <div class="ps-3">
                            <h6>Rp <?= number_format($totalPendapatan, 0, ',', '.') ?></h6>
                            <span class="text-muted small pt-2">Bulan <?= $bulan ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xxl-3 col-md-6">
            <div class="card info-card sales-card">
                <div class="card-body">
                    <h5 class="card-title">Total Transaksi</h5>
                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-receipt"></i>
                        </div>
                        <div class="ps-3">
                            <h6><?= $totalTransaksi ?></h6>
                            <span class="text-muted small pt-2">transaksi</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xxl-3 col-md-6">
            <div class="card info-card customers-card">
                <div class="card-body">
                    <h5 class="card-title">Rata-rata/Transaksi</h5>
                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-graph-up"></i>
                        </div>
                        <div class="ps-3">
                            <h6>Rp <?= number_format($rataRata, 0, ',', '.') ?></h6>
                            <span class="text-muted small pt-2">per transaksi</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xxl-3 col-md-6">
            <div class="card info-card processing-card">
                <div class="card-body">
                    <h5 class="card-title">Pelanggan Baru</h5>
                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-person-plus"></i>
                        </div>
                        <div class="ps-3">
                            <h6><?= $pelangganBaru ?></h6>
                            <span class="text-success small pt-1 fw-bold">+25%</span>
                            <span class="text-muted small pt-2 ps-1">dari bulan lalu</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Chart & Info -->
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Grafik Pendapatan Harian</h5>
                    <div class="chart-container">
                        <canvas id="revenueChart" style="max-height: 400px;"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Informasi Bulan Ini</h5>
                    <div class="info-list">
                        <div class="info-item">
                            <i class="bi bi-calendar3 text-primary"></i>
                            <div>
                                <strong>Periode</strong>
                                <p class="mb-0"><?= $bulan ?></p>
                            </div>
                        </div>
                        <div class="info-item">
                            <i class="bi bi-trophy text-warning"></i>
                            <div>
                                <strong>Layanan Terlaris</strong>
                                <p class="mb-0"><?= $layananTerlaris ?></p>
                            </div>
                        </div>
                        <div class="info-item">
                            <i class="bi bi-graph-up-arrow text-success"></i>
                            <div>
                                <strong>Pertumbuhan</strong>
                                <p class="mb-0 text-success">+18% dari bulan lalu</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Export Laporan</h5>
                    <div class="d-grid gap-2">
                        <button class="btn btn-success">
                            <i class="bi bi-file-earmark-excel me-1"></i> Export Excel
                        </button>
                        <button class="btn btn-danger">
                            <i class="bi bi-file-earmark-pdf me-1"></i> Export PDF
                        </button>
                        <button class="btn btn-primary">
                            <i class="bi bi-printer me-1"></i> Cetak Laporan
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Detail Table -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Detail Pendapatan Harian</h5>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Pendapatan</th>
                                    <th>Grafik</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $maxPendapatan = max(array_column($pendapatanHarian, 'pendapatan'));
                                foreach ($pendapatanHarian as $row): 
                                    $persentase = ($row['pendapatan'] / $maxPendapatan) * 100;
                                ?>
                                <tr>
                                    <td><strong><?= $row['tanggal'] ?></strong></td>
                                    <td>Rp <?= number_format($row['pendapatan'], 0, ',', '.') ?></td>
                                    <td style="width: 50%;">
                                        <div class="progress" style="height: 20px;">
                                            <div class="progress-bar bg-primary" role="progressbar" 
                                                 style="width: <?= $persentase ?>%">
                                                <?= number_format($persentase, 0) ?>%
                                            </div>
                                        </div>
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

<script src="<?= base_url('Assets/NiceAdmin/assets/vendor/chart.js/chart.umd.js') ?>"></script>
<script>
document.addEventListener("DOMContentLoaded", () => {
    const data = <?= json_encode($pendapatanHarian) ?>;
    new Chart(document.querySelector('#revenueChart'), {
        type: 'line',
        data: {
            labels: data.map(d => d.tanggal),
            datasets: [{
                label: 'Pendapatan (Rp)',
                data: data.map(d => d.pendapatan),
                fill: false,
                borderColor: 'rgb(14, 165, 233)',
                backgroundColor: 'rgba(14, 165, 233, 0.1)',
                tension: 0.3,
                fill: true
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { display: true }
            },
            scales: {
                y: { beginAtZero: true }
            }
        }
    });
});
</script>
<?= $this->endSection() ?>