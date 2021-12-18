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
            <a class="nav-link" data-toggle="collapse" href="#master-data" aria-expanded="false" aria-controls="master-data">
                <span class="menu-title">Master Data</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-database menu-icon"></i>
            </a>
            <div class="collapse" id="master-data">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('tahunAkademik.index') }}"> Tahun Akademik </a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('jurusan.index') }}"> Data Jurusan </a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('ruang.index') }}"> Data Ruangan </a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('level.index') }}"> Level User </a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('user.index') }}"> Data User </a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('komisi.index') }}"> Data Komisi </a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('dosen.index') }}"> Data Dosen </a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('dataKajur') }}"> Data Ketua Jurusan </a></li>
                </ul>
            </div>
        </li>
        @endif
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#tugas-akhir" aria-expanded="false" aria-controls="tugas-akhir">
                <span class="menu-title">Tugas Akhir</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-apps menu-icon"></i>
            </a>
            <div class="collapse" id="tugas-akhir">
                <ul class="nav flex-column sub-menu">
                    @if (auth()->user()->level_id == 2)
                    <li class="nav-item"> <a class="nav-link" href="{{ route('statusta.index') }}"> Status Tugas Akhir </a></li>
                    @endif
                    <li class="nav-item"> <a class="nav-link" href="{{ route('TA.index') }}"> Data Tugas Akhir </a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('spk.index') }}"> SPK </a></li>
                    {{-- @if (auth()->user()->level_id == 3) --}}
                    <li class="nav-item"> <a class="nav-link" href="{{ route('konsultasi.index') }}"> Data Konsultasi</a></li>
                    {{-- @endif --}}
                    <li class="nav-item"> <a class="nav-link" href="{{ route('semprop.index') }}"> Seminar Proposal </a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('semhas.index') }}"> Seminar Hasil </a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('nilaita.index') }}"> Nilai Tugas Akhir </a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('distribusi.index') }}"> Data Distribusi </a></li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#pendadaran" aria-expanded="false" aria-controls="pendadaran">
                <span class="menu-title">Pendadaran</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-table menu-icon"></i>
            </a>
            <div class="collapse" id="pendadaran">
                <ul class="nav flex-column sub-menu">
                    @if (auth()->user()->level_id == 2)
                    <li class="nav-item"> <a class="nav-link" href="{{ route('statuspendadaran.index') }}"> Status Pendadaran </a></li>
                    @endif
                    <li class="nav-item"> <a class="nav-link" href="{{ route('pendadaran.index') }}"> Data Pendadaran </a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('nilaiPendadaran.index') }}"> Nilai Pendadaran </a></li>
                </ul>
            </div>
        </li>
        @if (auth()->user()->level_id == 2 || 5)
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#yudisium" aria-expanded="false" aria-controls="yudisium">
                <span class="menu-title">Yudisium</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-folder menu-icon"></i>
            </a>
            <div class="collapse" id="yudisium">
                <ul class="nav flex-column sub-menu">
                    @if (auth()->user()->level_id == 2)
                    <li class="nav-item"> <a class="nav-link" href="{{ route('statusyudisium.index') }}"> Status Yudisium </a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('periode.index') }}"> Periode Yudisium </a></li>
                    @endif
                    <li class="nav-item"> <a class="nav-link" href="{{ route('yudisium.index') }}"> Pengajuan Yudisium </a></li>
                </ul>
            </div>
        </li>
        @endif
    </ul>
</nav>
