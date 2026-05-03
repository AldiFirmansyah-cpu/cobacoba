<?= $this->extend('layout') ?>

<?= $this->section('title') ?>Profil Kampus<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="pagetitle">
    <h1>Profil Kampus</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active">Profil</li>
        </ol>
    </nav>
</div>

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Visi</h5>
                    <p class="fst-italic" style="font-size: 1.1rem; line-height: 1.8;">
                        "Menjadi perguruan tinggi unggulan yang menghasilkan lulusan berkualitas, 
                        berakhlak mulia, dan mampu bersaing di era global dengan mengedepankan 
                        nilai-nilai keilmuan dan teknologi."
                    </p>
                </div>
            </div>
        </div>

        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Misi</h5>
                    <ol style="line-height: 2;">
                        <li>Menyelenggarakan pendidikan berkualitas tinggi yang relevan dengan kebutuhan industri dan masyarakat</li>
                        <li>Melakukan penelitian yang inovatif dan bermanfaat bagi pengembangan ilmu pengetahuan</li>
                        <li>Mengabdi kepada masyarakat melalui penerapan ilmu pengetahuan dan teknologi</li>
                        <li>Membangun kerjasama dengan industri, institusi, dan perguruan tinggi lainnya</li>
                        <li>Mengembangkan karakter mahasiswa yang berakhlak mulia dan berintegritas</li>
                    </ol>
                </div>
            </div>
        </div>

        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Informasi Kampus</h5>
                    <div class="row">
                        <div class="col-md-6">
                            <p><i class="bi bi-building me-2"></i><strong>Nama:</strong> Universitas Oxford Style</p>
                            <p><i class="bi bi-geo-alt me-2"></i><strong>Alamat:</strong> Jl. Pendidikan No. 123, Semarang</p>
                            <p><i class="bi bi-telephone me-2"></i><strong>Telepon:</strong> (024) 1234567</p>
                        </div>
                        <div class="col-md-6">
                            <p><i class="bi bi-envelope me-2"></i><strong>Email:</strong> info@universitas.ac.id</p>
                            <p><i class="bi bi-globe me-2"></i><strong>Website:</strong> www.universitas.ac.id</p>
                            <p><i class="bi bi-clock me-2"></i><strong>Jam Operasional:</strong> Senin - Jumat (08.00 - 16.00)</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>