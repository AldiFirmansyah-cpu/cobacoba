<header id="header" class="header fixed-top d-flex align-items-center">
    <div class="d-flex align-items-center justify-content-between">
        <a href="/" class="logo d-flex align-items-center">
            <i class="bi bi-droplet-fill text-white" style="font-size: 2rem;"></i>
            <div class="ms-2">
                <span class="d-none d-lg-block">ALLAUNDRY</span>
                <small class="d-none d-lg-block text-white-50" style="font-size: 0.7rem;">Clean • Fast • Reliable</small>
            </div>
        </a>
        <i class="bi bi-list toggle-sidebar-btn text-white"></i>
    </div>
    
    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">
            <li class="nav-item dropdown pe-3">
                <a class="nav-link nav-profile d-flex align-items-center pe-0 text-white" href="#" data-bs-toggle="dropdown">
                    <img src="https://ui-avatars.com/api/?name=<?= session()->get('name') ?>&background=0ea5e9&color=fff" alt="Profile" class="rounded-circle">
                    <span class="d-none d-md-block dropdown-toggle ps-2"><?= session()->get('name') ?></span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                    <li class="dropdown-header">
                        <h6><?= session()->get('name') ?></h6>
                        <span>
                            <?php 
                            $role = session()->get('role');
                            $badgeClass = $role === 'admin' ? 'bg-danger' : 'bg-success';
                            $roleText = strtoupper($role);
                            ?>
                            <span class="badge <?= $badgeClass ?>"><?= $roleText ?></span>
                        </span>
                    </li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="/logout">
                            <i class="bi bi-box-arrow-right"></i>
                            <span>Sign Out</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
</header>