<header id="header" class="fixed-top d-flex align-items-center header">
    <div class="position-relative d-flex align-items-center container-fluid container-xl">
        <a href="/" class="d-flex align-items-center me-auto logo">
            <h3 class="sitename">KELAPAH</h3>
        </a>

        {{-- Navbar utama --}}
        <nav id="navmenu" style="z-index: 999999;" class="d-flex justify-content-center w-100 navmenu">
            <ul class="nav">
                <li class="nav-item">
                    <a href="/#tentang" class="nav-link">Tentang</a>
                </li>
                <li class="nav-item">
                    <a href="/#panduan" class="nav-link">Panduan</a>
                </li>
                <li class="nav-item">
                    <a href="/#manfaat" class="nav-link">Manfaat</a>
                </li>
                <li class="nav-item">
                    <a href="/#testimonials" class="nav-link">Laporan</a>
                </li>
                <li class="nav-item">
                    <a href="/#kontak" class="nav-link">Kontak</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/daftar-article') }}" class="nav-link {{ request()->is('daftar-article') ? 'active' : '' }}">
                        Berita
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/#faq" class="nav-link">FAQ</a>
                </li>
            </ul>
        </nav>

        {{-- Mobile toggle --}}
        <div class="d-flex justify-content-center d-xl-none navmenu">
            <i class="self-content-end mobile-nav-toggle d-xl-none bi bi-list"></i>
        </div>

        {{-- Tombol Laporkan --}}
        @guest
            <a class="d-xl-inline-block ms-4 btn-outline-light d-none btn" href="{{ route('login') }}">Login</a>
            <a class="d-xl-inline-block ms-2 btn-light d-none btn" href="{{ route('register') }}">Register</a>
        @else
            @if(auth()->user()->role === 'admin')
                <a class="d-xl-inline-block ms-4 btn-outline-light d-none btn" href="{{ route('dashboard') }}">Dashboard</a>
            @else
                <a class="d-xl-inline-block ms-4 btn-outline-light d-none btn" href="{{ route('user.dashboard') }}">Dashboard</a>
            @endif
        @endguest
    </div>
</header>