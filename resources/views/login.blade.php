<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Login | Perpustakaan</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta content="PBP, Lab A2, Form, tugas, praktikum, pemrograman berbasis platform, informatika, undip, universitas diponegoro" name="keywords" />
    <meta content="Tugas Mini Project PBP Kelas A" name="description" />
    <meta property="og:title" content="Kelas A" />
    <meta property="og:description" content="Tugas Mini Project PBP Kelas A" />
    <meta name="title" content="Kelas A" />
    <meta name="description" content="Tugas Mini Project PBP Kelas A" />

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
                <a href="#" class="navbar-brand">Sistem<span class="text-primary">Perpustakaan.</span></a>

                <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarContent"
                    aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="navbar-collapse collapse" id="navbarContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="/">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-primary ml-lg-2" href="#">Login</a>
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
                        <p class="text-lg text-grey mb-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab
                            quae veritatis natus! Facere sunt</p>
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
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam porro sapiente minima
                                saepe.</p>
                            <a href="#" class="btn btn-primary">Read More</a>
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
                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Architecto perferendis nemo
                                eos. Maiores!</p>
                            <a href="#" class="btn btn-primary">Read More</a>
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
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis architecto nesciunt
                                delectus porrodfdfdf!</p>
                            <a href="#" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- .container -->
    </div> <!-- .page-section -->


    <footer class="page-footer bg-image" style="background-image: url({{ URL::asset('img/world_pattern.svg') }});">
        <div class="container">
            <div class="row mb-5">
                <div class="col-lg-5 py-3">
                    <h3>Perpustakaan</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero amet, repellendus eius blanditiis
                        in iusto eligendi iure.</p>

                    <div class="social-media-button">
                        <a href="#"><span class="mai-logo-facebook-f"></span></a>
                        <a href="#"><span class="mai-logo-twitter"></span></a>
                        <a href="#"><span class="mai-logo-google-plus-g"></span></a>
                        <a href="#"><span class="mai-logo-instagram"></span></a>
                        <a href="#"><span class="mai-logo-youtube"></span></a>
                    </div>
                </div>
                <br>
                <div class="col-lg-4 py-3">
                    <h3>Anggota Kelompok 11</h3>
                    <h5>Cenayang PBP</h5>
                    <ul class="footer-menu">
                        <li><a href="#">Hendinur Faizal - <span style="color: #35bb78">24060119130053</span></a></li>
                        <li><a href="#">Imas Ayu Wardani - <span style="color: #35bb78">24060119120005</span></a></li>
                        <li><a href="#">Muhammad Naufal Pratama - <span style="color: #35bb78">24060119130056</span></a></li>
                        <li><a href="#">Safira Marsha - <span style="color: #35bb78">24060119140111</span></a></li>
                        <li><a href="#">Adinda Rosman - <span style="color: #35bb78">24060119130085</span></a></li>
                    </ul>
                </div>
            </div>

            <p class="text-center" id="copyright">Copyright &copy; 2020. This template design and develop by <a
                    href="https://macodeid.com/" target="_blank">MACode ID</a></p>
        </div>
    </footer>

    <link rel="stylesheet" href="{{ URL::asset('js/jquery3.min.js') }}">

    <link rel="stylesheet" href="{{ URL::asset('js/boostrap.bundle.min.js') }}">

    <link rel="stylesheet" href="{{ URL::asset('js/google-maps.js') }}">

    <link rel="stylesheet" href="{{ URL::asset('vendor/wow/wow.min.js') }}">

    <link rel="stylesheet" href="{{ URL::asset('js/theme.js') }}">

</body>

</html>
