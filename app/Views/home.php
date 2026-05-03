<?= $this->extend('layout') ?>

<?= $this->section('title') ?>Beranda<?= $this->endSection() ?>

<?= $this->section('content') ?>
<!-- Hero Section -->
<div class="hero-oxford">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h1>Selamat Datang di Universitas Oxford Style</h1>
                <p>Mewujudkan generasi unggul, berakhlak mulia, dan berdaya saing global</p>
            </div>
        </div>
    </div>
</div>

<div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
    </nav>
</div>

<section class="section dashboard">
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Selamat Datang, <?= session()->get('name') ?>!</h5>
                            <p>Selamat datang di sistem informasi web profile kampus. Sistem ini dirancang dengan mengadopsi desain Oxford University.</p>
                            
                            <div class="alert alert-success mt-3">
                                <i class="bi bi-info-circle me-2"></i>
                                <strong>Informasi:</strong> Gunakan menu di samping untuk navigasi:
                                <ul class="mb-0 mt-2">
                                    <li><strong>Profil Kampus</strong> - Melihat visi, misi, dan informasi kampus</li>
                                    <li><strong>Program Studi</strong> - Melihat daftar program studi yang tersedia</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Stats Section -->
            <div class="row mt-4">
                <div class="col-md-4">
                    <div class="stat-box">
                        <h3>3+</h3>
                        <p>Program Studi</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="stat-box">
                        <h3>1000+</h3>
                        <p>Mahasiswa</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="stat-box">
                        <h3>50+</h3>
                        <p>Dosen</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>