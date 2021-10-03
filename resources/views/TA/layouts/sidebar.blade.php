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
            <a class="nav-link" href="<?= url('') ?>/TA/mahasiswa/beranda">
                <span class="menu-title">Beranda</span>
                <i class="mdi mdi-home menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= url('') ?>/TA/mahasiswa/proposal">
                <span class="menu-title">Pendaftaran</span>
                <i class="mdi mdi-file menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= url('') ?>/TA/mahasiswa/konsultasi">
                <span class="menu-title">Konsultasi TA</span>
                <i class="mdi mdi-account-multiple menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= url('') ?>/TA/mahasiswa/seminar">
                <span class="menu-title">seminar</span>
                <i class="mdi mdi-comment-text menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= url('') ?>/TA/mahasiswa/nilai">
                <span class="menu-title">Nilai TA</span>
                <i class="mdi mdi-trophy menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= url('') ?>/TA/mahasiswa/distribusi">
                <span class="menu-title">Distribusi</span>
                <i class="mdi mdi-share-variant menu-icon"></i>
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
            <a class="nav-link" href="<?= url('') ?>/TA/admin/beranda">
                <span class="menu-title">Beranda</span>
                <i class="mdi mdi-home menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= url('') ?>/TA/admin/datakomisi">
                <span class="menu-title">Data Komisi</span>
                <i class="mdi mdi-folder-account menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= url('') ?>/TA/admin/datadosen">
                <span class="menu-title">Data Dosen</span>
                <i class="mdi mdi-folder-account menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= url('') ?>/TA/admin/pengajuanproposal">
                <span class="menu-title">Pengajuan TA</span>
                <i class="mdi mdi-file menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= url('') ?>/TA/admin/uploadspk">
                <span class="menu-title">Upload SPK</span>
                <i class="mdi mdi-folder-upload menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= url('') ?>/TA/admin/pengajuanseminar">
                <span class="menu-title">Pengajuan Seminar</span>
                <i class="mdi mdi-comment-text menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= url('') ?>/TA/admin/beritaacara">
                <span class="menu-title">Berita Acara</span>
                <i class="mdi mdi-folder-upload menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= url('') ?>/TA/admin/datanilai">
                <span class="menu-title">Nilai TA</span>
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
            <a class="nav-link" href="<?= url('') ?>/TA/komisi/beranda">
                <span class="menu-title">Beranda</span>
                <i class="mdi mdi-home menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= url('') ?>/TA/komisi/datadosen">
                <span class="menu-title">Data Dosen</span>
                <i class="mdi mdi-account-box menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= url('') ?>/TA/komisi/datamahasiswa">
                <span class="menu-title">Pengajuan TA</span>
                <i class="mdi mdi-folder-account menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= url('') ?>/TA/komisi/datanilai">
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
            <a class="nav-link" href="<?= url('') ?>/TA/dosen/beranda">
                <span class="menu-title">Beranda</span>
                <i class="mdi mdi-home menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= url('') ?>/TA/dosen/datamahasiswa">
                <span class="menu-title">Data Mahasiswa</span>
                <i class="mdi mdi-folder-account menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= url('') ?>/TA/dosen/datakonsultasi">
                <span class="menu-title">Data Konsultasi</span>
                <i class="mdi mdi-account-multiple menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= url('') ?>/TA/dosen/uploadnilai">
                <span class="menu-title">Upload Nilai</span>
                <i class="mdi mdi-folder-upload menu-icon"></i>
            </a>
        </li>
    </ul>
</nav>
