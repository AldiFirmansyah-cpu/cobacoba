<?= $this->extend('layout') ?>
<?= $this->section('title') ?>Pelanggan<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="pagetitle">
    <h1>Data Pelanggan</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active">Pelanggan</li>
        </ol>
    </nav>
</div>

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="card-title mb-0">Daftar Pelanggan</h5>
                        <button class="btn btn-primary">
                            <i class="bi bi-person-plus me-1"></i> Tambah Pelanggan
                        </button>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover datatable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Telepon</th>
                                    <th>Alamat</th>
                                    <th>Bergabung</th>
                                    <th>Total Transaksi</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($pelanggan as $index => $p): ?>
                                <tr>
                                    <td><?= $index + 1 ?></td>
                                    <td>
                                        <strong><?= $p['nama'] ?></strong>
                                    </td>
                                    <td>
                                        <i class="bi bi-telephone me-1 text-primary"></i>
                                        <?= $p['telepon'] ?>
                                    </td>
                                    <td><?= $p['alamat'] ?></td>
                                    <td><?= date('d M Y', strtotime($p['join'])) ?></td>
                                    <td><span class="badge bg-primary"><?= $p['totalTx'] ?>x</span></td>
                                    <td><span class="badge bg-success"><?= $p['status'] ?></span></td>
                                    <td>
                                        <button class="btn btn-sm btn-info" title="Detail">
                                            <i class="bi bi-eye"></i>
                                        </button>
                                        <button class="btn btn-sm btn-warning" title="Edit">
                                            <i class="bi bi-pencil"></i>
                                        </button>
                                        <button class="btn btn-sm btn-danger" title="Hapus">
                                            <i class="bi bi-trash"></i>
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