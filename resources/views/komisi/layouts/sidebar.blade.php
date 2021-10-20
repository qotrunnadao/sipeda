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
            <a class="nav-link" href="<?= url('') ?>/komisi/bernada">
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
                    <li class="nav-item"> <a class="nav-link" href="{{ route('TA.index') }}"> Pengajuan TA </a></li>
                    <li class="nav-item"> <a class="nav-link" href="<?= url('')?>/komisi/tugas-akhir/dosen-pembimbing"> Dosen Pembimbing </a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('nilaita.index') }}"> Nilai TA </a></li>
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
                    <li class="nav-item"> <a class="nav-link" href="{{ route('pendadaran.index') }}"> Pengajuan Pendadaran </a></li>
                    <li class="nav-item"> <a class="nav-link" href="route('beritaacarapendadaran.index')"> Berita Acara Pendadaran </a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('nilaiPendadaran.index') }}"> Nilai Pendadaran </a></li>
                </ul>
            </div>
        </li>
    </ul>
</nav>
