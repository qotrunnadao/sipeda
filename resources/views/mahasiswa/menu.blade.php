<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--========== BOX ICONS ==========-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

    <!--========== CSS ==========-->
    <link rel="stylesheet" href="{{ asset('menu/css/style.css') }}">

    <title>Menu Studi Akhir</title>
</head>

<body>
    <section class="card">
        <div class="shape1"></div>
        <div class="shape2"></div>

        <div class="title">
            <h2>Pilih Tahapan Studi Akhir</h2>
        </div>

        <div class="card__container bd-container">
            <div class="card__glass" data-tilt data-tilt-max="50" data-tilt-speed="400" data-tilt-perspective="500">
                <img src="{{ asset('menu/img/TA.svg') }}" alt="" class="card__img">
                <a href="{{ route('mahasiswaTA.beranda') }}" class="card__button">Tugas akhir</a>
            </div>

            <div class="card__glass" data-tilt data-tilt-max="50" data-tilt-speed="400" data-tilt-perspective="500">
                <img src="{{ asset('menu/img/pendadaran.svg') }}" alt="" class="card__img">
                <a href="<?= url('') ?>/mahasiswa/pendadaran/beranda" class="card__button">Pendadaran</a>
            </div>

            <div class="card__glass" data-tilt data-tilt-max="50" data-tilt-speed="400" data-tilt-perspective="500">
                <img src="{{ asset('menu/img/graduation.svg') }}" alt="" class="card__img">
                <a href="<?= url('') ?>/mahasiswa/yudisium/beranda" class="card__button">Yudisium</a>
            </div>
        </div>
    </section>

    <script type="text/javascript" src="{{ asset('menu/js/vanilla-tilt.js') }}"></script>
    <script type="text/javascript">
        VanillaTilt.init(document.querySelectorAll(".card__glass"), {
            max: 25,
            speed: 400
        });
    </script>
</body>

</html>
