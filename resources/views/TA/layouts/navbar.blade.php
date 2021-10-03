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
                        <img src="{{ asset('sitak/assets/images/faces/atun.jpg') }}" alt="image">
                        <span class="availability-status online"></span>
                    </div>
                    <div class="nav-profile-text">
                        <p class="mb-1 text-black">H1D018033</p>
                    </div>
                </a>
                <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                    <a class="dropdown-item" href="<?= url('') ?>/guest/menu">
                        <i class="mdi mdi-cached mr-2 text-success"></i> Menu </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item logout" href="<?= url('') ?>/">
                        <i class="mdi mdi-logout mr-2 text-primary"></i> Keluar </a>
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

<!-- Sweet Alert Logout -->
@section('javascripts')
<script>
    $(document).ready(function() {
        $("#dropdown").on('click','.logout', function(e) {
            e.preventDefault();
            var form = $(this).parents('form');
            Swal.fire({
                title: 'Konfirmasi',
                text: 'Apakah anda yakin akan logout?',
                showCancelButton: true,
                confirmButtonColor: '#1f3a93',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Logout',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.value) {
                    form.submit();
                }
            })
        });
    });
</script>
@endsection
