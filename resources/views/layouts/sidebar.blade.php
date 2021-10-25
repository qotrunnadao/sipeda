<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <a href="#" class="nav-link">
                <div class="nav-profile-image">
                    <img src="{{ asset('sitak/assets/images/unsoed.png') }}" alt="profile">
                </div>
                <div class="nav-profile-text d-flex flex-column">
                    <span class="text-secondary">FAKULTAS TEKNIK</span>
                </div>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= url('') ?>/admin/beranda">
                <span class="menu-title">Beranda</span>
                <i class="mdi mdi-home menu-icon"></i>
            </a>
        </li>
        @if (auth()->user()->level_id == 2)
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
                    <li class="nav-item"> <a class="nav-link" href="<?= url('') ?>/admin/data-komisi"> Data Komisi </a></li>
                    <li class="nav-item"> <a class="nav-link" href="<?= url('') ?>/admin/data-dosen"> Data Dosen </a></li>
                    <li class="nav-item"> <a class="nav-link" href="<?= url('') ?>/admin/data-dosen"> Data Dosen </a></li>
                </ul>
            </div>
        </li>
        @endif
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#general-pages" aria-expanded="false" aria-controls="general-pages">
                <span class="menu-title">Tugas Akhir</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-apps menu-icon"></i>
            </a>
            <div class="collapse" id="general-pages">
                <ul class="nav flex-column sub-menu">
                    @if (auth()->user()->level_id == 2)
                    <li class="nav-item"> <a class="nav-link" href="{{ route('statusta.index') }}"> Status TA </a></li>
                    @endif
                    <li class="nav-item"> <a class="nav-link" href="{{ route('TA.index') }}"> Data Tugas Akhir </a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('spk.index') }}"> SPK </a></li>
                    {{-- @if (auth()->user()->level_id == 3) --}}
                    <li class="nav-item"> <a class="nav-link" href="{{ route('konsultasi.index') }}"> Data Konsultasi</a></li>
                    {{-- @endif --}}
                    <li class="nav-item"> <a class="nav-link" href="{{ route('semprop.index') }}"> Seminar Proposal </a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('semhas.index') }}"> Seminar Hasil </a></li>
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
                    @if (auth()->user()->level_id == 2)
                    <li class="nav-item"> <a class="nav-link" href="{{ route('statuspendadaran.index') }}"> Status Pendadaran </a></li>
                    @endif
                    <li class="nav-item"> <a class="nav-link" href="{{ route('pendadaran.index') }}"> Data Pendadaran </a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('beritaacarapendadaran.index') }}"> Berita Acara </a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('nilaiPendadaran.index') }}"> Nilai Pendadaran </a></li>
                </ul>
            </div>
        </li>
        @if (auth()->user()->level_id == 2)
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#general-pages" aria-expanded="false" aria-controls="general-pages">
                <span class="menu-title">Yudisium</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-folder menu-icon"></i>
            </a>
            <div class="collapse" id="general-pages">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('statusyudisium.index') }}"> Status Yudisium </a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('yudisium.index') }}"> Pengajuan Yudisium </a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('sk.index') }}"> SK Kelulusan </a></li>
                </ul>
            </div>
        </li>
        @elseif (auth()->user()->level_id == 5)
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#general-pages" aria-expanded="false" aria-controls="general-pages">
                <span class="menu-title">Yudisium</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-folder menu-icon"></i>
            </a>
            <div class="collapse" id="general-pages">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('yudisium.index') }}"> Pengajuan Yudisium </a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('sk.index') }}"> SK Kelulusan </a></li>
                </ul>
            </div>
        </li>
        @endif
    </ul>
</nav>
