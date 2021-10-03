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
        <li class="nav-item sidebar-actions">
            <span class="nav-link">
                <div class="border-bottom">
                    <h6 class="font-weight-normal mb-3 text-muted"><b>Mahasiswa</b></h6>
                </div>
            </span>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= url('') ?>/yudisium/mahasiswa/beranda">
                <span class="menu-title">Beranda</span>
                <i class="mdi mdi-home menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= url('') ?>/yudisium/mahasiswa/pendaftaran">
                <span class="menu-title">Pendaftaran</span>
                <i class="mdi mdi-file menu-icon"></i>
            </a>
        </li>

        {{-- SIDEBAR ADMIN --}}
        <li class="nav-item sidebar-actions">
            <span class="nav-link">
                <div class="border-bottom">
                    <h6 class="font-weight-normal mb-3 text-muted"><b>Admin</b></h6>
                </div>
            </span>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= url('') ?>/yudisium/admin/beranda">
                <span class="menu-title">Beranda</span>
                <i class="mdi mdi-home menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= url('') ?>/yudisium/admin/pengajuan">
                <span class="menu-title">Pengajuan</span>
                <i class="mdi mdi-clipboard-account menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= url('') ?>/yudisium/admin/jadwal">
                <span class="menu-title">Jadwal</span>
                <i class="mdi mdi-calendar menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= url('') ?>/yudisium/admin/upload-sk">
                <span class="menu-title">SK Mahasiwa</span>
                <i class="mdi mdi-folder-upload menu-icon"></i>
            </a>
        </li>

        {{-- SIDEBAR KOMISI --}}
        <li class="nav-item sidebar-actions">
            <span class="nav-link">
                <div class="border-bottom">
                    <h6 class="font-weight-normal mb-3 text-muted"><b>KOMISI</b></h6>
                </div>
            </span>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= url('') ?>/yudisium/komisi/beranda">
                <span class="menu-title">Beranda</span>
                <i class="mdi mdi-home menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= url('') ?>/yudisium/komisi/jadwal">
                <span class="menu-title">Jadwal</span>
                <i class="mdi mdi-calendar menu-icon"></i>
            </a>
        </li>

        {{-- SIDEBAR DOSEN --}}
        <li class="nav-item sidebar-actions">
            <span class="nav-link">
                <div class="border-bottom">
                    <h6 class="font-weight-normal mb-3 text-muted"><b>DOSEN</b></h6>
                </div>
            </span>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= url('') ?>/yudisium/dosen/beranda">
                <span class="menu-title">Beranda</span>
                <i class="mdi mdi-home menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= url('') ?>/yudisium/dosen/jadwal">
                <span class="menu-title">Jadwal</span>
                <i class="mdi mdi-calendar menu-icon"></i>
            </a>
        </li>
    </ul>
</nav>
