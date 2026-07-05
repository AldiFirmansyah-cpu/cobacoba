<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-heading">Menu Utama</li>

        <li class="nav-item">
            <a class="nav-link <?= (uri_string() === '' || uri_string() === 'home' || uri_string() === '/') ? 'active' : '' ?>" href="/">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link <?= uri_string() === 'keranjang' ? 'active' : '' ?>" href="/keranjang">
                <i class="bi bi-cart"></i>
                <span>Keranjang</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link <?= uri_string() === 'transaksi' ? 'active' : '' ?>" href="/transaksi">
                <i class="bi bi-receipt"></i>
                <span>Transaksi</span>
            </a>
        </li>

        <?php if (session()->get('role') === 'admin'): ?>
        <li class="nav-item">
            <a class="nav-link <?= uri_string() === 'layanan' || str_starts_with(uri_string(), 'layanan') ? 'active' : '' ?>" href="/layanan">
                <i class="bi bi-basket"></i>
                <span>Layanan</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link <?= uri_string() === 'pelanggan' || str_starts_with(uri_string(), 'pelanggan') ? 'active' : '' ?>" href="/pelanggan">
                <i class="bi bi-people"></i>
                <span>Pelanggan</span>
            </a>
        </li>

        <li class="nav-heading">Lainnya</li>

        <li class="nav-item">
            <a class="nav-link <?= uri_string() === 'laporan' || str_starts_with(uri_string(), 'laporan') ? 'active' : '' ?>" href="/laporan">
                <i class="bi bi-graph-up"></i>
                <span>Laporan</span>
            </a>
        </li>
        <?php endif; ?>

        <li class="nav-item">
            <a class="nav-link <?= uri_string() === 'profil' ? 'active' : '' ?>" href="/profil">
                <i class="bi bi-building"></i>
                <span>Profil Laundry</span>
            </a>
        </li>
    </ul>
</aside>