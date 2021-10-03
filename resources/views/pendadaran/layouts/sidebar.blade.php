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
            <a class="nav-link" href="<?= url('') ?>/pendadaran/mahasiswa/beranda">
                <span class="menu-title">Beranda</span>
                <i class="mdi mdi-home menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= url('') ?>/pendadaran/mahasiswa/pendaftaran">
                <span class="menu-title">Pendaftaran</span>
                <i class="mdi mdi-file menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= url('') ?>/pendadaran/mahasiswa/nilai">
                <span class="menu-title">Nilai Pendadaran</span>
                <i class="mdi mdi-trophy menu-icon"></i>
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
            <a class="nav-link" href="<?= url('') ?>/pendadaran/admin/beranda">
                <span class="menu-title">Beranda</span>
                <i class="mdi mdi-home menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= url('') ?>/pendadaran/admin/datamahasiswa">
                <span class="menu-title">Pengajuan</span>
                <i class="mdi mdi-account-multiple menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= url('') ?>/pendadaran/admin/uploadsurat">
                <span class="menu-title">Upload Surat</span>
                <i class="mdi mdi-folder-upload menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= url('') ?>/pendadaran/admin/datanilai">
                <span class="menu-title">Data Nilai</span>
                <i class="mdi mdi-trophy menu-icon"></i>
            </a>
        </li>

        {{-- SIDEBAR KOMISI --}}
        <li class="nav-item sidebar-actions">
            <span class="nav-link">
                <div class="border-bottom">
                    <h6 class="font-weight-normal mb-3 text-muted"><b>Komisi</b></h6>
                </div>
            </span>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= url('') ?>/pendadaran/komisi/beranda">
                <span class="menu-title">Beranda</span>
                <i class="mdi mdi-home menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= url('') ?>/pendadaran/komisi/datamahasiswa">
                <span class="menu-title">Pengajuan</span>
                <i class="mdi mdi-account-multiple menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= url('') ?>/pendadaran/komisi/jadwal">
                <span class="menu-title">Jadwal</span>
                <i class="mdi mdi-calendar menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= url('') ?>/pendadaran/komisi/datanilai">
                <span class="menu-title">Data Nilai</span>
                <i class="mdi mdi-trophy menu-icon"></i>
            </a>
        </li>

        {{-- SIDEBAR DOSEN --}}
        <li class="nav-item sidebar-actions">
            <span class="nav-link">
                <div class="border-bottom">
                    <h6 class="font-weight-normal mb-3 text-muted"><b>Dosen</b></h6>
                </div>
            </span>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= url('') ?>/pendadaran/dosen/beranda">
                <span class="menu-title">Beranda</span>
                <i class="mdi mdi-home menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= url('') ?>/pendadaran/dosen/jadwal">
                <span class="menu-title">Jadwal</span>
                <i class="mdi mdi-calendar menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= url('') ?>/pendadaran/dosen/uploadnilai">
                <span class="menu-title">Upload Nilai</span>
                <i class="mdi mdi-folder-upload menu-icon"></i>
            </a>
        </li>

    </ul>
</nav>
