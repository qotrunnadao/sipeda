<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--========== BOX ICONS ==========-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!--========== CSS ==========-->
    <link rel="stylesheet" href="{{ asset('menu/css/style.css') }}">

    <title>Menu Studi Akhir</title>
</head>

<body style="background-color:#eceffa">
    {{-- <div class="shape1"></div>
    <div class="shape2"></div> --}}

    <div class="container-fluid">
        <div class="row fixed-top sticky-top" style="background: #eceffa !important; box-shadow: 0px 1px 20px #a6a8b8;">
            <div class="col">
                <header class="d-flex py-3 header">
                    <div class="d-flex align-items-center text-dark" style="padding-left: 100px">
                        <span style="width: 40px;">
                            <img src=" {{ asset('sitak/assets/images/unsoed.png') }}">
                        </span>
                        <span class="fs-5" style="letter-spacing: 3px; margin-left:30px; "><b>FAKULTAS TEKNIK</b></span>
                    </div>
                </header>
            </div>
        </div>
        <div class="row text-center mt-5 mb-5">
            <div class="col">
                <h4><b>Pilih Tahapan Studi Akhir</b></h4>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-4 mb-3">
                    <div class="card__glass">
                        <h4 class="card__name text-center text-light">
                            Tugas Akhir
                        </h4>
                        <img src="{{ asset('menu/img/TA.svg') }}" alt="" class="card__img">
                        <a href="{{ route('mahasiswaTA.beranda') }}" class="card__button"><b>Masuk</b></a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 mb-3">
                    <div class="card__glass">
                        <h4 class="card__name text-center text-light">
                            Pendadaran
                        </h4>
                        <img src="{{ asset('menu/img/pendadaran.svg') }}" alt="" class="card__img">
                        <a href="{{ route('mahasiswaPendadaran.beranda') }}" class="card__button"><b>Masuk</b></a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 mb-3">
                    <div class="card__glass">
                        <h4 class="card__name text-center text-light">
                            Yudisium
                        </h4>
                        <img src="{{ asset('menu/img/graduation.svg') }}" alt="" class="card__img">
                        <a href="{{ route('mahasiswaYudisium.beranda') }}" class="card__button"><b>Masuk</b></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer" style="padding: 50px">
        <div class="container-fluid clearfix">
            <span class="text-muted d-block text-center"><b>Copyright © fakultas teknik 2021</b></span>
        </div>
    </footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.8.0/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.8.0/TextPlugin.min.js"></script>
    <script>
        // gsap.to(body, {duration: 2, physics2D: {velocity: 300, angle: -60, acceleration: 50, accelerationAngle: 180}});
        gsap.from('.sticky-top', {duration:1.5, y:'-100%', opacity:0, ease:'bounce'});
        // gsap.from('.card__glass', {duration:1.5, rotateY:360, opacity:0});
        gsap.to('.text-muted', {duration:1.5, text:'Copyright © fakultas teknik 2021'});
    </script>
    <script type="text/javascript" src="{{ asset('menu/js/vanilla-tilt.js') }}"></script>
    {{-- <script type="text/javascript">
        VanillaTilt.init(document.querySelectorAll(".card__glass"), {
            max: 25,
            speed: 400
        });
    </script> --}}

</body>

</html>
