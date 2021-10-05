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
        <li class="nav-item">
            <a class="nav-link" href="<?= url('') ?>/dosen/beranda">
                <span class="menu-title">Beranda</span>
                <i class="mdi mdi-home menu-icon"></i>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#general-pages" aria-expanded="false" aria-controls="general-pages">
                <span class="menu-title">Tugas Akhir</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-apps menu-icon"></i>
            </a>
            <div class="collapse" id="general-pages">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="<?= url('') ?>/dosen/tugas-akhir/data-TA"> Data TA </a></li>
                    <li class="nav-item"> <a class="nav-link" href="<?= url('') ?>/dosen/tugas-akhir/data-konsultasi"> Data Konsultasi </a></li>
                    <li class="nav-item"> <a class="nav-link" href="<?= url('') ?>/dosen/tugas-akhir/upload-nilai"> Upload Nilai TA </a></li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#general-pages" aria-expanded="false" aria-controls="general-pages">
                <span class="menu-title">Pendadaran</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-table menu-icon"></i>
            </a>
            <div class="collapse" id="general-pages">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="<?= url('') ?>/dosen/pendadaran/data-pendadaran"> Data Pendadaran </a></li>
                    <li class="nav-item"> <a class="nav-link" href="<?= url('') ?>/dosen/pendadaran/jadwal"> Jadwal Pendadaran </a></li>
                    <li class="nav-item"> <a class="nav-link" href="<?= url('') ?>/dosen/pendadaran/upload-nilai"> Upload Nilai Pendadaran</a></li>
                </ul>
            </div>
        </li>
    </ul>
</nav>