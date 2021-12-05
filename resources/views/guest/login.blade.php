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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
</head>

<body>
    <div class="container-fluid">
        <div class="row fixed-top sticky-top" style="background: linear-gradient(to right, #95b6fc,#1f3a93 ) !important; box-shadow: 0px 1px 20px #2f3b96;">
            <div class="col">
                <header class="d-flex py-3 header" style="position: sticky;">
                    <div class="d-flex align-items-center text-light" style="padding-left: 100px">
                        <span style="width: 40px;">
                            <img src=" {{ asset('sitak/assets/images/unsoed.png') }}">
                        </span>
                        {{-- <span class="fs-5" style="letter-spacing: 3px; margin-left:30px; text-shadow:0px 5px 4px #5f638a;"><b>UNIVERSITAS JENDERAL SOEDIRMAN</b></span> --}}
                        <span class="fs-5 tulisan" style="letter-spacing: 3px; margin-left:30px; text-shadow:0px 5px 4px #5f638a;"><b>FAKULTAS TEKNIK</b></span>
                    </div>
                </header>
            </div>
        </div>
        <div class="row">
            <div class="l-form">
                <div class="shape1"></div>
                <div class="shape2"></div>
                <div class="form">
                    <img src="{{ asset('masuk/assets/img/auth4.svg') }}" alt="" class="form__img move" data-speed="2">
                    <div class="form__content">
                        <div class="d-grid gap-2 mx-auto">
                            <form action="{{ route('login') }}" method="POST">
                                @csrf
                                <span class="login100-form-logo">
                                    <img src="{{ asset('sitak/assets/images/unsoed.png') }}">
                                </span>
                                <span class="form__social-text" style="text-align: center; "><b>Sistem Pengelolaan Studi Akhir <br>Fakultas Teknik UNSOED</b></span>

                                @if(session()->has('loginError'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{ session('loginError') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                @endif

                                <div class="form__div form__div-one">
                                    <div class="form__icon">
                                        <i class='bx bx-user-circle'></i>
                                    </div>
                                    <div class="form__div-input">
                                        <label for="email" class="form__label">E-mail</label>
                                        <input type="text" class="form__input @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" autocomplete="email">
                                        @error('email')
                                        <span class="invalid-feedback mt-4" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form__div">
                                    <div class="form__icon">
                                        <i class='bx bx-lock'></i>
                                    </div>
                                    <div class="form__div-input">
                                        <label for="password" class="form__label">Password</label>
                                        <input type="password" class="form__input @error('password') is-invalid @enderror" id="password" type="password" name="password" autocomplete="current-password">
                                        @error('password')
                                        <span class="invalid-feedback mt-4" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <button type="submit" class="form__button">
                                    {{ __('Login') }}
                                </button>
                            </form>
                            <form action="{{ route('cas.login') }}" method="get">
                                @csrf
                                <button class="form__button" href="">Login SSO</button>
                                <div class="form__social">
                                    <span class="form__social-text"><i class='bx bx-info-circle'></i> Selain admin silahkan login menggunakan SSO</span>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer mt-auto py-3 bg-light fixed-bottom">
        <div class="container">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © fakultas teknik 2021</span>
        </div>
    </footer>
    <!-- ===== MAIN JS ===== -->
    <script src="{{ asset('masuk/assets/js/main.js') }}"></script>
    <!-- ===== BOOTSTRAP ===== -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <!-- GSAP -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.8.0/gsap.min.js"></script>
    <script>
        gsap.from('.form__img', {duration:1.5, y:'-100%', opacity:0, ease:'bounce'});
        gsap.from('.login100-form-logo', {duration:1.5, rotateY:360, opacity:0});
    </script>
</body>

</html>
