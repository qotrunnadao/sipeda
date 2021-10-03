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
            <a class="nav-link" href="<?= url('') ?>/pendadaran/admin/beranda">
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
                    <li class="nav-item"> <a class="nav-link" href="../../pages/samples/blank-page.html"> Data Jurusan </a></li>
                    <li class="nav-item"> <a class="nav-link" href="../../pages/samples/login.html"> Data Ruangan </a></li>
                    <li class="nav-item"> <a class="nav-link" href="../../pages/samples/register.html"> Data Komisi </a></li>
                    <li class="nav-item"> <a class="nav-link" href="../../pages/samples/error-404.html"> Data Dosen </a></li>
                    <li class="nav-item"> <a class="nav-link" href="../../pages/samples/error-500.html"> Data Studi Akhir </a></li>
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
                    <li class="nav-item"> <a class="nav-link" href="../../pages/samples/blank-page.html"> Pengajuan TA </a></li>
                    <li class="nav-item"> <a class="nav-link" href="../../pages/samples/login.html"> Upload SPK </a></li>
                    <li class="nav-item"> <a class="nav-link" href="../../pages/samples/register.html"> Pengajuan Seminar </a></li>
                    <li class="nav-item"> <a class="nav-link" href="../../pages/samples/error-404.html"> Berita Acara </a></li>
                    <li class="nav-item"> <a class="nav-link" href="../../pages/samples/error-500.html"> Nilai TA </a></li>
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
                    <li class="nav-item"> <a class="nav-link" href="../../pages/samples/blank-page.html"> Pengajuan Pendadaran </a></li>
                    <li class="nav-item"> <a class="nav-link" href="../../pages/samples/login.html"> Surat Tugas</a></li>
                    <li class="nav-item"> <a class="nav-link" href="../../pages/samples/register.html"> Nilai Pendadaran </a></li>
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
                    <li class="nav-item"> <a class="nav-link" href="../../pages/samples/blank-page.html"> Pengajuan Yudisium </a></li>
                    <li class="nav-item"> <a class="nav-link" href="../../pages/samples/login.html"> Jadwal Pendadaran</a></li>
                    <li class="nav-item"> <a class="nav-link" href="../../pages/samples/register.html"> SK Kelulusan </a></li>
                </ul>
            </div>
        </li>

    </ul>
</nav>
