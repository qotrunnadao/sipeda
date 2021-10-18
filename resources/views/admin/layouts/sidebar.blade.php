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
            <a class="nav-link" href="<?= url('') ?>/admin/beranda">
                <span class="menu-title">Beranda</span>
                <i class="mdi mdi-home menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#general-pages" aria-expanded="false" aria-controls="general-pages">
                <span class="menu-title">Master Data</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-database menu-icon"></i>
            </a>
            <div class="collapse" id="general-pages">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="<?= url('') ?>/admin/tahun-akademik"> Tahun Akademik </a></li>
                    <li class="nav-item"> <a class="nav-link" href="<?= url('') ?>/admin/jurusan"> Data Jurusan </a></li>
                    <li class="nav-item"> <a class="nav-link" href="<?= url('') ?>/admin/data-ruang"> Data Ruangan </a></li>
                    <li class="nav-item"> <a class="nav-link" href="<?= url('') ?>/admin/level-user"> Level User </a></li>
                    <li class="nav-item"> <a class="nav-link" href="<?= url('') ?>/admin/data-user"> Data User </a></li>
                    <li class="nav-item"> <a class="nav-link" href="<?= url('') ?>/admin/data-dosen"> Data Dosen </a></li>
                    <li class="nav-item"> <a class="nav-link" href="<?= url('') ?>/admin/data-komisi"> Data Komisi </a></li>
                    {{-- <li class="nav-item"> <a class="nav-link" href="<?= url('') ?>/admin/berita"> Berita </a></li> --}}
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#general-pages" aria-expanded="false" aria-controls="general-pages">
                <span class="menu-title">Tugas Akhir</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-apps menu-icon"></i>
            </a>
            <div class="collapse" id="general-pages">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="<?= url('') ?>/tugas-akhir/statusta"> Status TA </a></li>
                    <li class="nav-item"> <a class="nav-link" href="<?= url('') ?>/tugas-akhir/data-TA"> Pengajuan TA </a></li>
                    <li class="nav-item"> <a class="nav-link" href="<?= url('') ?>/tugas-akhir/data-konsultasi"> Data Konsultasi</a></li>
                    <li class="nav-item"> <a class="nav-link" href="<?= url('') ?>/tugas-akhir/seminar"> Pengajuan Seminar </a></li>
                    <li class="nav-item"> <a class="nav-link" href="<?= url('') ?>/tugas-akhir/semprop"> Data Seminar Proposal </a></li>
                    <li class="nav-item"> <a class="nav-link" href="<?= url('') ?>/tugas-akhir/semhas"> Data Seminar Hasil </a></li>
                    <li class="nav-item"> <a class="nav-link" href="<?= url('') ?>/tugas-akhir/spk"> Upload SPK </a></li>
                    <li class="nav-item"> <a class="nav-link" href="<?= url('') ?>/tugas-akhir/nilaita"> Nilai TA </a></li>
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
                    <li class="nav-item"> <a class="nav-link" href="<?= url('') ?>/pendadaran/status-pendadaran"> Status Pendadaran </a></li>
                    <li class="nav-item"> <a class="nav-link" href="<?= url('') ?>/pendadaran/data-pendadaran"> Pengajuan Pendadaran </a></li>
                    <li class="nav-item"> <a class="nav-link" href="<?= url('') ?>/pendadaran/beritaacara"> Berita Acara </a></li>
                    <li class="nav-item"> <a class="nav-link" href="<?= url('') ?>/pendadaran/nilai-pendadaran"> Nilai Pendadaran </a></li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#general-pages" aria-expanded="false" aria-controls="general-pages">
                <span class="menu-title">Yudisium</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-folder menu-icon"></i>
            </a>
            <div class="collapse" id="general-pages">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="<?= url('') ?>/yudisium/status-yudisium"> Status Yudisium </a></li>
                    <li class="nav-item"> <a class="nav-link" href="<?= url('') ?>/yudisium/data-yudisium"> Pengajuan Yudisium </a></li>
                    <li class="nav-item"> <a class="nav-link" href="<?= url('') ?>/yudisium/sk"> SK Kelulusan </a></li>
                </ul>
            </div>
        </li>
    </ul>
</nav>
