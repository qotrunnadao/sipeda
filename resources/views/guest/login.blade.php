<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- ===== CSS ===== -->
    <link rel="stylesheet" href="{{ asset('masuk/assets/css/styles.css') }}">
    <!-- ===== BOX ICONS ===== -->
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
    <!-- ===== BOOTSRAP ===== -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
</head>

<body>
    <div class="l-form">
        <div class="shape1"></div>
        <div class="shape2"></div>
        <div class="form">
            <img src="{{ asset('masuk/assets/img/auth4.svg') }}" alt="" class="form__img move" data-speed="2">
            <form action="" class="form__content">
                <span class="login100-form-logo">
                    <img src="{{ asset('sitak/assets/images/unsoed.png') }}">
                </span>
                <span class="form__social-text" style="text-align: center"><b>Sistem Infromasi Pengelolaan Tugas Akhir <br>Fakultas Teknik UNSOED</b></span>
                <div class="form__div form__div-one">
                    <div class="form__icon">
                        <i class='bx bx-user-circle'></i>
                    </div>
                    <div class="form__div-input">
                        <label for="" class="form__label">Username</label>
                        <input type="text" class="form__input">
                    </div>
                </div>
                <div class="form__div">
                    <div class="form__icon">
                        <i class='bx bx-lock'></i>
                    </div>
                    <div class="form__div-input">
                        <label for="" class="form__label">Password</label>
                        <input type="password" class="form__input">
                    </div>
                </div>
                <div class="d-grid gap-2 mx-auto">
                    <a class="form__button" href="<?= url('') ?>/admin/beranda" role="button" style="text-decoration: none; text-align:center;">Admin</a>
                    <a class="form__button" href="<?= url('') ?>/komisi/beranda" role="button" style="text-decoration: none; text-align:center;">Komisi</a>
                    <a class="form__button" href="<?= url('') ?>/dosen/beranda" role="button" style="text-decoration: none; text-align:center;">Dosen</a>
                    <a class="form__button" href="<?= url('') ?>/guest/menu" role="button" style="text-decoration: none; text-align:center;">Login SSO</a>
                </div>
                <div class="form__social">
                    <span class="form__social-text"><i class='bx bx-info-circle'></i> Mahasiswa Silahkan Login Menggunakan Akun SSO</span>
                </div>
            </form>
        </div>
    </div>
    <!-- ===== MAIN JS ===== -->
    <script src="{{ asset('masuk/assets/js/main.js') }}"></script>
    <!-- ===== BOOTSTRAP ===== -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</body>

</html>
