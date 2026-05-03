<?= $this->extend('layout') ?>

<?= $this->section('title') ?>Program Studi<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="pagetitle">
    <h1>Program Studi</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active">Program Studi</li>
        </ol>
    </nav>
</div>

<section class="section">
    <div class="row">
        <div class="col-lg-4 col-md-6">
            <div class="card prodi-card">
                <div class="card-body">
                    <h5 class="card-title"><i class="bi bi-laptop me-2"></i>Teknik Informatika</h5>
                    <h6 class="card-subtitle mb-3 text-muted">
                        <span class="badge bg-primary">S1</span> 
                        <span class="badge bg-success">Akreditasi A</span>
                    </h6>
                    <p class="card-text">
                        Mempelajari pengembangan software, hardware, jaringan komputer, 
                        kecerdasan buatan (AI), dan teknologi informasi terkini.
                    </p>
                    <ul class="small text-muted">
                        <li>Pemrograman Web & Mobile</li>
                        <li>Artificial Intelligence</li>
                        <li>Data Science</li>
                        <li>Cyber Security</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6">
            <div class="card prodi-card">
                <div class="card-body">
                    <h5 class="card-title"><i class="bi bi-database me-2"></i>Sistem Informasi</h5>
                    <h6 class="card-subtitle mb-3 text-muted">
                        <span class="badge bg-primary">S1</span> 
                        <span class="badge bg-success">Akreditasi A</span>
                    </h6>
                    <p class="card-text">
                        Fokus pada manajemen sistem informasi, analisis bisnis, 
                        database management, dan implementasi TI untuk bisnis.
                    </p>
                    <ul class="small text-muted">
                        <li>Business Intelligence</li>
                        <li>Database Management</li>
                        <li>IT Project Management</li>
                        <li>System Analysis</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6">
            <div class="card prodi-card">
                <div class="card-body">
                    <h5 class="card-title"><i class="bi bi-cpu me-2"></i>Teknik Komputer</h5>
                    <h6 class="card-subtitle mb-3 text-muted">
                        <span class="badge bg-primary">S1</span> 
                        <span class="badge bg-warning text-dark">Akreditasi B</span>
                    </h6>
                    <p class="card-text">
                        Mempelajari hardware komputer, embedded system, Internet of Things (IoT), 
                        dan jaringan komputer.
                    </p>
                    <ul class="small text-muted">
                        <li>Embedded System</li>
                        <li>Internet of Things</li>
                        <li>Computer Network</li>
                        <li>Robotics</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>