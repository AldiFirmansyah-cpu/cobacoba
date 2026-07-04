<?= $this->extend('layout') ?>
<?= $this->section('title') ?>Keranjang Belanja<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="pagetitle"><h1>Keranjang Belanja</h1><nav><ol class="breadcrumb"><li class="breadcrumb-item"><a href="/">Home</a></li><li class="breadcrumb-item active">Keranjang</li></ol></nav></div>
<section class="section">
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Tambah Layanan ke Keranjang</h5>
                    <?php if(session()->getFlashdata('error')): ?><div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div><?php endif; ?>
                    <?php if(session()->getFlashdata('success')): ?><div class="alert alert-success"><?= session()->getFlashdata('success') ?></div><?php endif; ?>
                    <form action="/keranjang/add" method="post">
                        <?= csrf_field() ?>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Nama Pelanggan</label>
                            <div class="col-sm-9"><input type="text" name="pelanggan" class="form-control" value="<?= session()->get('cart_pelanggan') ?? '' ?>" placeholder="Nama pelanggan" required></div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Pilih Layanan</label>
                            <div class="col-sm-9">
                                <select name="layanan_id" class="form-select" required>
                                    <option value="">-- Pilih Layanan --</option>
                                    <?php foreach(session()->get('layanan_data') ?? [] as $l): ?>
                                    <option value="<?= $l['id'] ?>"><?= $l['nama'] ?> - Rp <?= number_format($l['harga'], 0, ',', '.') ?>/<?= $l['satuan'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Jumlah/Berat</label>
                            <div class="col-sm-9"><input type="number" name="qty" class="form-control" value="1" min="1" required></div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-9 offset-sm-3">
                                <button type="submit" class="btn btn-primary"><i class="bi bi-cart-plus me-1"></i> Tambah ke Keranjang</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Isi Keranjang</h5>
                    <?php if(empty($cart)): ?>
                        <p class="text-muted text-center">Keranjang kosong</p>
                    <?php else: ?>
                        <?php foreach($cart as $id => $item): ?>
                        <div class="border-bottom pb-2 mb-2">
                            <div class="d-flex justify-content-between">
                                <strong><?= $item['nama'] ?></strong>
                                <a href="/keranjang/remove/<?= $id ?>" class="btn btn-sm btn-danger" onclick="return confirm('Hapus?')"><i class="bi bi-trash"></i></a>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mt-1">
                                <form action="/keranjang/update" method="post" class="d-flex align-items-center">
                                    <?= csrf_field() ?>
                                    <input type="hidden" name="layanan_id" value="<?= $id ?>">
                                    <input type="number" name="qty" value="<?= $item['qty'] ?>" min="1" class="form-control form-control-sm" style="width: 70px;" onchange="this.form.submit()">
                                    <span class="ms-2"><?= $item['satuan'] ?></span>
                                </form>
                                <span class="fw-bold">Rp <?= number_format($item['harga'] * $item['qty'], 0, ',', '.') ?></span>
                            </div>
                        </div>
                        <?php endforeach; ?>
                        <div class="border-top pt-2 mt-2">
                            <div class="d-flex justify-content-between">
                                <strong>TOTAL:</strong>
                                <strong class="text-primary">Rp <?= number_format($total, 0, ',', '.') ?></strong>
                            </div>
                        </div>
                        <div class="mt-3">
                            <form action="/transaksi/checkout" method="post">
                                <?= csrf_field() ?>
                                <button type="submit" class="btn btn-success w-100"><i class="bi bi-check-circle me-1"></i> Checkout / Bayar</button>
                            </form>
                            <a href="/keranjang/clear" class="btn btn-outline-danger w-100 mt-2" onclick="return confirm('Kosongkan keranjang?')"><i class="bi bi-trash me-1"></i> Kosongkan</a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>