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
            <img src="{{ asset('sitak/assets/images/404.svg') }}" alt="" class="form__img move" data-speed="2" style="width: 500px">
            <div class="card">
                <div class="card-body">
                    <h1> Maaf Anda Belum dapat mengakses Halamanan ini</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- ===== MAIN JS ===== -->
    <script src="{{ asset('masuk/assets/js/main.js') }}"></script>
    <!-- ===== BOOTSTRAP ===== -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</body>

</html>
