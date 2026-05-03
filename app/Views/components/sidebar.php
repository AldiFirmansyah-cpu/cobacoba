<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-heading">Menu Utama</li>
        <li class="nav-item">
            <a class="nav-link <?= uri_string() === '/' || uri_string() === 'home' ? '' : 'collapsed' ?>" href="/">
                <i class="bi bi-grid"></i>
                <span>Beranda</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link <?= uri_string() === 'profil' ? '' : 'collapsed' ?>" href="/profil">
                <i class="bi bi-building"></i>
                <span>Profil Kampus</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link <?= uri_string() === 'prodi' ? '' : 'collapsed' ?>" href="/prodi">
                <i class="bi bi-journal-bookmark"></i>
                <span>Program Studi</span>
            </a>
        </li>
    </ul>
</aside>