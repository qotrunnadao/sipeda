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
    <link href="{{ asset('sitak/plugins/datatables-fixedheader/css/fixedHeader.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('sitak/plugins/Buttons-2.0.1/css/buttons.dataTables.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('sitak/plugins/Buttons-2.0.1/css/buttons.bootstrap5.css') }}" rel="stylesheet" type="text/css">

    <!-- daterange picker -->
    <link rel="stylesheet" href="{{ asset('sitak/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- Sweet Alert --->
    <link rel="stylesheet" href="{{ asset('sitak/plugins/sweetalert2/sweetalert2.css') }}">
    <!--clockpicker-->
    <link rel="stylesheet" href="{{ asset('sitak/plugins/clockpicker-gh-pages/src/clockpicker.css') }}">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="{{ asset('sitak/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet" type="text/css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</head>

<body>
    <div class="container-scroller">
        <!-- Navbar -->
        @include('layouts.navbar')
        <div class="container-fluid page-body-wrapper">
            <!-- Sidebar -->
            @include('layouts.sidebar')
            <div class="main-panel">
                <!-- Content Wrapper -->
                <div class="content-wrapper">
                    <div class="page-header">
                        <h3 class="page-title">
                            <span class="page-title-icon bg-gradient-primary text-white mr-2 card-hover">
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
                @include('layouts.footer')
            </div>
        </div>
    </div>
    {{-- Logout --}}
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
    <!-- datatable -->
    <script src="{{ asset('sitak/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('sitak/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('sitak/plugins/datatables-fixedheader/js/dataTables.fixedHeader.min.js') }}"></script>
    <script src="{{ asset('sitak/plugins/datatables-fixedheader/js/fixedHeader.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('sitak/plugins/Buttons-2.0.1/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{ asset('sitak/plugins/Buttons-2.0.1/js/buttons.html5.min.js')}}"></script>
    <script src="{{ asset('sitak/plugins/Buttons-2.0.1/js/buttons.print.min.js')}}"></script>
    <script src="https://cdn.datatables.net/select/1.3.3/js/dataTables.select.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.colVis.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>

    <!-- GSAP -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.8.0/gsap.min.js"></script>

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
    <script src="{{ asset('sitak/plugins/validator/jquery.form-validator.min.js') }}"></script>
    {{-- Validator --}}

    <script>
        $(document).ready(function() {
    $('#buttondatatable').DataTable( {
        dom: 'lBfrtip',
        buttons: [ 'csv', 'excel', 'pdf', 'print', 'colvis' ]
    } );

	} );
    </script>
    <!-- datatable -->
    <script>
        $(document).ready( function () {
        $('#datatable').DataTable();
    } );
    </script>

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
            $("#buttondatatable").on('click','.hapus', function(e) {
                e.preventDefault();
                var form = $(this).parents('form');
                Swal.fire({
                    title: 'Konfirmasi',
                    text: 'Apakah anda yakin menghapus data ini?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#95b6fc',
                    cancelButtonColor: '#ff9191',
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
                    cancelButtonColor: '#ff9191',
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

    {{-- mengatur session login --}}
    <script>
        let log_off = new Date();
        log_off.setMinutes(log_off.getMinutes() + 5)
        log_off = new Date(log_off)

        let int_logoff = setInterval(function(){
            let now = new Date();
            if(now>log_off){
                window.location.assign("/");
                clearInterval(int_logoff);
            }
        }, 5000);


        $('body').on('click', function(){
            log_off = new Date()
            log_off.setMinutes(log_off.getMinutes() + 5)
            log_off = new Date(log_off)
            console.log(log_off)
        })
    </script>
    @yield('javascripts')

</body>

</html>
