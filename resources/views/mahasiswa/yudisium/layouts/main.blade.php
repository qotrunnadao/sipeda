<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('tittle')</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('sitak/assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('sitak/assets/vendors/css/vendor.bundle.base.css') }}">
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('sitak/assets/css/style.css') }}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{ asset('sitak/assets/images/favicon.ico') }}" />
    <!-- DataTables -->
    <link href="{{ asset('sitak/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('sitak/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- daterange picker -->
    <link rel="stylesheet" href="{{ asset('sitak/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- Sweet Alert --->
    <link rel="stylesheet" href="{{ asset('sitak/plugins/sweetalert2/sweetalert2.css') }}">
    <!--clockpicker-->
    <link rel="stylesheet" href="{{ asset('sitak/plugins/clockpicker-gh-pages/src/clockpicker.css') }}">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="{{ asset('sitak/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet" type="text/css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    {{-- dropdown search --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>

</head>

<body>
    <div class="container-scroller">
        <!-- Navbar -->
        @include('mahasiswa.yudisium.layouts.navbar')
        <div class="container-fluid page-body-wrapper">
            <!-- Sidebar -->
            @include('mahasiswa.yudisium.layouts.sidebar')
            <div class="main-panel">
                <!-- Content Wrapper -->
                <div class="content-wrapper">
                    <div class="page-header">
                        <h3 class="page-title">
                            <span class="page-title-icon bg-gradient-primary text-white mr-2">
                                <i class="mdi mdi-@yield('icon')"></i>
                            </span> @yield('title')
                        </h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">{{ucfirst(Request::segment(1)) }}</a>
                                </li>
                                @for ($i = 2; $i <= count(Request::segments()); $i++) <li class="breadcrumb-item">
                                    <a href="{{ URL::to(implode('/', array_slice(Request::segments(), 0, $i, true))) }}">
                                        {{ucfirst(Request::segment($i)) }}
                                    </a>
                                    </li>
                                    @endfor
                            </ol>
                        </nav>
                    </div>
                    @include('sweetalert::alert')
                    @yield('content')
                </div>
                <!-- Footer -->
                @include('mahasiswa.yudisium.layouts.footer')
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-logout">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="background-color:#f78282">
                    <h4 class="modal-title text-white"><i class="fas fa-sign-out-alt"></i> Keluar Aplikasi</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p style="text-align: center;">Apakah anda yakin untuk keluar aplikasi?</p>
                    <div class="col text-center">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-gradient-primary text-center"><i class="fas fa-sign-out-alt"></i> Ya. Keluar Aplikasi</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- plugins:js -->
    <script src="{{ asset('sitak/assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('sitak/assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('sitak/assets/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('sitak/assets/js/misc.js') }}"></script>
    <!-- Dari adminlte -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <script src="{{ asset('sitak/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('sitak/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <!-- datatable Responsive -->
    <script src="{{ asset('sitak/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('sitak/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
    <!-- GSAP -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.8.0/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.8.0/TextPlugin.min.js"></script>
    <script>
        gsap.registerPlugin(TextPlugin);
        gsap.from('.welcome', {duration:2, text:'Selamat Datang,'})
    </script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('sitak/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- PAGE PLUGINS -->
    <!-- jQuery Mapael -->
    <script src="{{ asset('sitak/plugins/jquery-mousewheel/jquery.mousewheel.js') }}"></script>
    <script src="{{ asset('sitak/plugins/raphael/raphael.min.js ') }}"></script>
    <script src="{{ asset('sitak/plugins/jquery-mapael/jquery.mapael.min.js') }}"></script>
    <script src="{{ asset('sitak/plugins/jquery-mapael/maps/usa_states.min.js') }}"></script>
    <!-- ChartJS -->
    <script src="{{ asset('sitak/plugins/chart.js/Chart.min.js') }}"></script>
    <!-- Bootstrap Switch -->
    <script src="{{ asset('sitak/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>
    <!-- Moment.js -->
    <script src="{{ asset('sitak/plugins/moment/moment.min.js') }}"></script>
    <!-- date-range-picker -->
    <script src="{{ asset('sitak/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- Sweet Alert -->
    <script src="{{ asset('sitak/plugins/sweetalert2/sweetalert2.js') }}"></script>
    <!-- clockpicker -->
    <script src="{{ asset('sitak/plugins/clockpicker-gh-pages/src/clockpicker.js') }}"></script>
    <!-- My Script -->

    <!-- datepicker -->
    <script>
        $(function() {
             $(".datepicker").datepicker({
                 autoclose: true,
                 todayHighlight: true
             });

             $(".datepicker_month").datepicker({
                 format: "mm-yyyy",
                 viewMode: "months",
                 minViewMode: "months"
             });

             $(".datepicker_year").datepicker({
                 format: "yyyy",
                 viewMode: "years",
                 minViewMode: "years"
             });
         });
         $(function() {
                 $('.daterange').daterangepicker({
                     locale: {
                     format: 'YYYY-MM-DD'
                     }
                 });
             });
    </script>

    <!-- datatable -->
    <script>
        $(document).ready( function () {
        $('#datatable').DataTable();
    } );
    </script>
    <!-- Clockpicker -->
    <script type="text/javascript">
        $('.clockpicker').clockpicker({
        placement: 'top',
        align: 'left',
        donetext: 'Done'
    });
    </script>
    <!-- Hapus Data -->
    <script>
        $(document).ready(function() {
            $("#datatable").on('click','.hapus', function(e) {
                e.preventDefault();
                var form = $(this).parents('form');
                Swal.fire({
                    title: 'Konfirmasi',
                    text: 'Apakah anda yakin menghapus data ini?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#95b6fc',
                    cancelButtonColor: '#f78282',
                    confirmButtonText: 'Ya, Hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.value) {
                        form.submit();
                    }
                })
            });
        });
    </script>
    {{-- dropdown search --}}
    <script type="text/javascript">
        $(document).ready(function() {
            $('#dropdown1').select2();
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#dropdown2').select2();
        });
    </script>
    @yield('javascripts')

</body>

</html>
