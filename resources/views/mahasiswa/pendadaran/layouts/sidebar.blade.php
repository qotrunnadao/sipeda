<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <a href="#" class="nav-link">
                <div class="nav-profile-image">
                    <img src="{{ asset('sitak/assets/images/unsoed.png') }}" alt="profile">
                </div>
                <div class="nav-profile-text d-flex flex-column">
                    <span class="text-secondary text-small">FAKULTAS TEKNIK</span>
                </div>
            </a>
        </li>
        {{-- SIDEBAR MAHASISWA --}}
        <li class="nav-item">
            <a class="nav-link" href="{{ route('mahasiswaPendadaran.beranda') }}">
                <span class="menu-title">Beranda</span>
                <i class="mdi mdi-home menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('mahasiswaPendadaran.create') }}">
                <span class="menu-title">Pendaftaran</span>
                <i class="mdi mdi-file menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link @if ($pendadaran == null) btn disabled @endif" href="<?= url('') ?>/mahasiswa/pendadaran/nilai">
                <span class="menu-title">Nilai Pendadaran</span>
                <i class="mdi mdi-trophy menu-icon"></i>
            </a>
        </li>
    </ul>
</nav>
