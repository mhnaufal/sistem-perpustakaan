<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="copyright" content="MACode ID, https://macodeid.com/">

    <title>Sistem Perpustakaan</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />

    <link rel="stylesheet" href="{{ URL::asset('css/maicons.css') }}">

    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.css') }}">

    <link rel="stylesheet" href="{{ URL::asset('vendor/animate/animate.css') }}">

    <link rel="stylesheet" href="{{ URL::asset('css/theme.css') }}">

</head>

<body>

    <!-- Back to top button -->
    <div class="back-to-top"></div>

    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-white sticky" data-offset="500">
            <div class="container">
                <a href="/" class="navbar-brand">Sistem<span class="text-primary">Perpustakaan.</span></a>

                <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarContent"
                    aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="navbar-collapse collapse" id="navbarContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-primary ml-lg-2" href="{{ route('login') }}">Login</a>
                        </li>
                    </ul>
                </div>

            </div>
        </nav>

        <div class="container">
            <div class="page-banner home-banner">
                <div class="row align-items-center flex-wrap-reverse h-100">
                    <div class="col-md-6 py-5 wow fadeInLeft">
                        <h1 class="mb-4">Perpustakaan!</h1>
                        <p class="text-lg text-grey mb-5">Where <span class="fw-bold">books 📚</span> find their <span class="fw-bold">readers 😁</span>!</p>
                    </div>
                    <div class="col-md-6 py-5 wow zoomIn">
                        <div class="img-fluid text-center">
                            <img src="{{ URL::asset('img/banner_image_1.svg') }}" alt="">
                        </div>
                    </div>
                </div>
                <a href="#about" class="btn-scroll" data-role="smoothscroll"><span
                        class="mai-arrow-down"></span></a>
            </div>
        </div>
    </header>

    <div class="page-section" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card-service wow fadeInUp">
                        <div class="header">
                            <img src="{{ URL::asset('img/services/service-1.svg') }}" alt="">
                        </div>
                        <div class="body">
                            <h5 class="text-secondary">Daftar Jadi Anggota!</h5>
                            <p>Jadilah anggota perpustakaan dan dapatkan jutaan manfaat dari buku di seluruh dunia!</p>
                            <a href="#" class="btn btn-primary">Baca Lebih Lanjut!</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card-service wow fadeInUp">
                        <div class="header">
                            <img src="{{ URL::asset('img/services/service-2.svg') }}" alt="">
                        </div>
                        <div class="body">
                            <h5 class="text-secondary">Cari Buku!</h5>
                            <p>Temukan buku-buku yang kamu cari hingga buku langka sekalipun, ada DI SINI!</p>
                            <a href="{{ route('view.books') }}" class="btn btn-primary">Baca Lebih Lanjut!</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card-service wow fadeInUp">
                        <div class="header">
                            <img src="{{ URL::asset('img/services/service-3.svg') }}" alt="">
                        </div>
                        <div class="body">
                            <h5 class="text-secondary">Pinjam Buku!</h5>
                            <p>Pinjam buku yang kamu inginkan tanpa perlu fotocopy KTP, tinggal sekali klik buku yang kamu sudah ada di genggamanmu!</p>
                            <a href="#" class="btn btn-primary">Baca Lebih Lanjut!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- .container -->
    </div> <!-- .page-section -->

    @include('footer')

    <link rel="stylesheet" href="{{ URL::asset('js/jquery3.min.js') }}">

    <link rel="stylesheet" href="{{ URL::asset('js/boostrap.bundle.min.js') }}">

    <link rel="stylesheet" href="{{ URL::asset('js/google-maps.js') }}">

    <link rel="stylesheet" href="{{ URL::asset('vendor/wow/wow.min.js') }}">

    <link rel="stylesheet" href="{{ URL::asset('js/theme.js') }}">

</body>

</html>
