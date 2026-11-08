<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <div class="sidebar-brand">
        <a href="/" class="brand-link">
            <img src="{{ asset('dist/assets/img/AdminLTELogo.png') }}" alt="Logo"
                class="brand-image opacity-75 shadow" />
            <span class="brand-text fw-light">UTS – 2410010072</span>
        </a>
    </div>
    <div class="sidebar-wrapper">
        <nav class="mt-2" aria-label="Menu utama">
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" data-accordion="false"
                id="navigation">

                <li class="nav-item">
                    <a href="{{ route('dashboard') }}"
                        class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-speedometer"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-item {{ request()->routeIs('ruangan.*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->routeIs('ruangan.*') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-box-seam-fill"></i>
                        <p>
                            Data Master
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('ruangan.index') }}"
                                class="nav-link {{ request()->routeIs('ruangan.*') ? 'active' : '' }}">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Ruangan</p>
                            </a>
                        </li>
                    </ul>
                </li>

            </ul>
        </nav>
    </div>
</aside>