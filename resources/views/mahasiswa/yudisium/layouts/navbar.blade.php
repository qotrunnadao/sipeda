<nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a href="index.html"><img src="{{ asset('sitak/assets/images/sitak1.png') }}" alt="logo" style="width: 100px;" /></a>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-stretch">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
        </button>
        <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item nav-profile dropdown">
                <a class="nav-link dropdown-toggle" id="Dropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                    <div class="nav-profile-img">
                        @if (Auth::user()->foto)
                        <img src="{{ $user->foto }}" alt="{{ Auth::user()->email }}" class="foto img-thumbnail img-preview">
                        @else
                        <img src="{{ asset('sitak/assets/images/profile.jpg') }}" alt="{{ Auth::user()->email }}" class="foto img-thumbnail img-preview">
                        @endif
                        <span class="availability-status online"></span>
                    </div>
                    <div class="nav-profile-text">
                        <p class="mb-1 text-black">{{ auth()->user()->email }}</p>
                        <span class="badge badge-gradient-primary">{{ auth()->user()->level->namaLevel }}</span>
                    </div>
                </a>
                <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                    <a class="dropdown-item" href="{{ route('mahasiswa.menu') }}">
                        <i class="mdi mdi-cached mr-2 text-success"></i> Menu </a>
                    <div class="dropdown-divider"></div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="button" class="dropdown-item" data-toggle="modal" data-target="#modal-logout"><i class="mdi mdi-logout mr-2 text-primary"></i> {{ __('Logout') }}</button>
                    </form>
                </div>
            </li>
            <li class="nav-item d-none d-lg-block full-screen-link">
                <a class="nav-link">
                    <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
                </a>
            </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
        </button>
    </div>
</nav>
