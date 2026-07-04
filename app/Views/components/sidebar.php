<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-heading">Menu Utama</li>
        <li class="nav-item"><a class="nav-link <?= (uri_string() === '/' || uri_string() === 'home') ? '' : 'collapsed' ?>" href="/"><i class="bi bi-grid"></i><span>Dashboard</span></a></li>
        <li class="nav-item"><a class="nav-link <?= uri_string() === 'keranjang' ? '' : 'collapsed' ?>" href="/keranjang"><i class="bi bi-cart"></i><span>Keranjang</span></a></li>
        <li class="nav-item"><a class="nav-link <?= uri_string() === 'transaksi' ? '' : 'collapsed' ?>" href="/transaksi"><i class="bi bi-receipt"></i><span>Transaksi</span></a></li>
        <li class="nav-item"><a class="nav-link <?= uri_string() === 'layanan' ? '' : 'collapsed' ?>" href="/layanan"><i class="bi bi-basket"></i><span>Layanan</span></a></li>
        <li class="nav-item"><a class="nav-link <?= uri_string() === 'pelanggan' ? '' : 'collapsed' ?>" href="/pelanggan"><i class="bi bi-people"></i><span>Pelanggan</span></a></li>
        <li class="nav-heading">Lainnya</li>
        <li class="nav-item"><a class="nav-link <?= uri_string() === 'laporan' ? '' : 'collapsed' ?>" href="/laporan"><i class="bi bi-graph-up"></i><span>Laporan</span></a></li>
        <li class="nav-item"><a class="nav-link <?= uri_string() === 'profil' ? '' : 'collapsed' ?>" href="/profil"><i class="bi bi-building"></i><span>Profil Laundry</span></a></li>
    </ul>
</aside>