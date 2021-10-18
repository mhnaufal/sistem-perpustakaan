<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Daftar Buku | Perpustakaan</title>
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
                            <a class="nav-link" href="/">Welcome...!</a>
                        </li>
                        <li class="nav-item">
                            {{-- TODO: kasih nama user yang login --}}
                            {{-- <a class="btn btn-primary ml-lg-2" href="{{ route('login') }}">Login</a> --}}
                        </li>
                    </ul>
                </div>

            </div>
        </nav>
    </header>

    <div><br><br></div>

    <div class="container">
        <div class="card">
            <div class="card-header">Daftar Buku</div>
            <div class="card-body">
                <br>
                <a class="btn btn-primary mb-2" href="{{ route('view.add.book') }}">+ Tambah Buku</a>
                @if (Session::has('deleted'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('deleted') }}
                    </div>
                @endif
                <table class="table table-stripped">
                    <thead>
                        <tr>
                            <th>ISBN</th>
                            <th>Author</th>
                            <th>Title</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @foreach ($books as $book)
                            <tr>
                                <td>{{ $book->isbn }}</td>
                                <td>{{ $book->author }}</td>
                                <td>{{ $book->title }}</td>
                                <td>{{ $book->price }}</td>
                                <td>
                                    <a class="btn btn-warning btn-sm" href="/edit-book/{{ $book->id }}">Edit</a>
                                    <a class="btn btn-danger btn-sm" href="/delete-book/{{ $book->id }}">Delete</a>
                                </td>
                            </tr>
                        @endforeach --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div><br><br><br><br><br></div>

    <footer class="page-footer mt-5 bg-image" style="background-image: url({{ URL::asset('img/world_pattern.svg') }});">
        <div class="container">
            <div class="row mb-5">
                <div class="col-lg-5 py-3">
                    <h3>Perpustakaan</h3>
                    <p>Tugas Pengembangan Berbasis Platform A</p>

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
