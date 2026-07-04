<?= $this->extend('layout') ?>
<?= $this->section('title') ?>Dashboard<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="hero-laundry">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h1><i class="bi bi-droplet-fill me-2"></i>Selamat Datang di ALLAUNDRY</h1>
                <p class="mb-0">Sistem Manajemen Laundry Profesional - Bersih, Cepat, Terpercaya</p>
            </div>
            <div class="col-lg-4 text-end d-none d-lg-block">
                <i class="bi bi-basket3" style="font-size: 5rem; opacity: 0.3;"></i>
            </div>
        </div>
    </div>
</div>
<div class="pagetitle">
    <h1>Dashboard</h1>
    <nav><ol class="breadcrumb"><li class="breadcrumb-item"><a href="/">Home</a></li><li class="breadcrumb-item active">Dashboard</li></ol></nav>
</div>
<section class="section dashboard">
    <div class="row">
        <div class="col-lg-12">
            <div class="alert alert-success"><i class="bi bi-info-circle me-2"></i><strong>Selamat Datang, <?= session()->get('name') ?>!</strong> Gunakan menu di samping untuk mengelola laundry Anda.</div>
        </div>
        <div class="col-xxl-3 col-md-6">
            <div class="card info-card sales-card">
                <div class="card-body">
                    <h5 class="card-title">Total Pelanggan</h5>
                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center"><i class="bi bi-people"></i></div>
                        <div class="ps-3"><h6><?= $totalPelanggan ?></h6><span class="text-success small">Pelanggan aktif</span></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xxl-3 col-md-6">
            <div class="card info-card revenue-card">
                <div class="card-body">
                    <h5 class="card-title">Transaksi Hari Ini</h5>
                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center"><i class="bi bi-receipt"></i></div>
                        <div class="ps-3"><h6><?= $transaksiHariIni ?></h6><span class="text-success small">Transaksi</span></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xxl-3 col-md-6">
            <div class="card info-card customers-card">
                <div class="card-body">
                    <h5 class="card-title">Pendapatan Hari Ini</h5>
                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center"><i class="bi bi-cash-stack"></i></div>
                        <div class="ps-3"><h6>Rp <?= number_format($pendapatanHariIni, 0, ',', '.') ?></h6><span class="text-success small">Pendapatan</span></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xxl-3 col-md-6">
            <div class="card info-card">
                <div class="card-body">
                    <h5 class="card-title">Sedang Diproses</h5>
                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" style="color: #06b6d4; background: #cffafe;"><i class="bi bi-hourglass-split"></i></div>
                        <div class="ps-3"><h6><?= $sedangDiproses ?> Pcs</h6><span class="text-muted small">Antrian cuci</span></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Aksi Cepat</h5>
                    <div class="row">
                        <div class="col-md-3 col-6 mb-3"><a href="/keranjang" class="quick-action-btn"><i class="bi bi-cart-plus"></i><span>Keranjang</span></a></div>
                        <div class="col-md-3 col-6 mb-3"><a href="/transaksi" class="quick-action-btn"><i class="bi bi-receipt"></i><span>Transaksi</span></a></div>
                        <div class="col-md-3 col-6 mb-3"><a href="/layanan" class="quick-action-btn"><i class="bi bi-gear"></i><span>Kelola Layanan</span></a></div>
                        <div class="col-md-3 col-6 mb-3"><a href="/laporan" class="quick-action-btn"><i class="bi bi-file-earmark-text"></i><span>Laporan</span></a></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Status Pesanan</h5>
                    <div class="status-item">
                        <div class="status-icon bg-warning"><i class="bi bi-hourglass-split"></i></div>
                        <div class="flex-grow-1"><h6 class="mb-0">Diproses</h6><small class="text-muted">Sedang dalam antrian</small></div>
                        <div class="status-count"><?= $sedangDiproses ?></div>
                    </div>
                    <div class="status-item">
                        <div class="status-icon bg-success"><i class="bi bi-check-circle"></i></div>
                        <div class="flex-grow-1"><h6 class="mb-0">Selesai</h6><small class="text-muted">Siap diambil</small></div>
                        <div class="status-count"><?= $selesai ?></div>
                    </div>
                    <div class="status-item">
                        <div class="status-icon bg-primary"><i class="bi bi-box-arrow-right"></i></div>
                        <div class="flex-grow-1"><h6 class="mb-0">Diambil</h6><small class="text-muted">Sudah diambil pelanggan</small></div>
                        <div class="status-count"><?= $diambil ?></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Layanan Populer</h5>
                    <div class="activity">
                        <div class="activity-item d-flex"><div class="activite-label">1</div><i class='bi bi-circle-fill activity-badge text-primary align-self-start'></i><div class="activity-content"><strong>Cuci + Setrika</strong> - Rp 10.000/kg</div></div>
                        <div class="activity-item d-flex"><div class="activite-label">2</div><i class='bi bi-circle-fill activity-badge text-success align-self-start'></i><div class="activity-content"><strong>Cuci Reguler</strong> - Rp 7.000/kg</div></div>
                        <div class="activity-item d-flex"><div class="activite-label">3</div><i class='bi bi-circle-fill activity-badge text-warning align-self-start'></i><div class="activity-content"><strong>Cuci Express</strong> - Rp 12.000/kg</div></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>