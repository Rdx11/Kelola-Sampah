<div class="sidebar sidebar-style-2">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav nav-primary">
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Dashboard</h4>
                </li>
                <li class="nav-item {{ $routeName == 'user.dashboard' ? 'active' : '' }}">
                    <a href="{{ route('user.dashboard') }}">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Management</h4>
                </li>
                <li class="nav-item {{ request()->routeIs('user-reports.*') ? 'active' : '' }}">
                    <a href="{{ route('user-reports.index') }}">
                        <i class="fas fa-file"></i>
                        <p>My Report</p>
                    </a>
                </li>
                 <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Lainnya</h4>
                </li>
                <li class="nav-item {{ request()->routeIs('point-shop.*') ? 'active' : '' }}">
                    <a href="{{ route('point-shop.index') }}">
                        <i class="fa fa-shopping-cart"></i>
                        <p>Toko Point</p>
                    </a>
                </li>
                <li class="nav-item {{ $routeName == 'exchange-history' ? 'active' : '' }}">
                    <a href="{{ route('exchange-history') }}">
                        <i class="fa fa-history"></i>
                        <p>Riwayat Tukar Poin</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
