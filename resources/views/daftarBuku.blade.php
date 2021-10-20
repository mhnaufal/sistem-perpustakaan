<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Daftar Buku | Perpustakaan</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta
        content="PBP, Lab A2, Form, tugas, praktikum, pemrograman berbasis platform, informatika, undip, universitas diponegoro"
        name="keywords" />
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
                            <form method="POST" autocomplete="on" action="{{ route('logout') }}">
                                @csrf
                                <button class="nav-link fs-5 fw-bold btn btn-primary"><span
                                        class="text-dark">Welcome</span> <span
                                        class="text-decoration-underline text-light">{{ $user }}</span>!</button>
                            </form>
                        </li>
                    </ul>
                </div>

            </div>
        </nav>
    </header>

    <div class="container mt-5">
        <a class="btn btn-success mb-2" href="{{ route('homepage') }}">Home</a>
        <div class="card">
            <div class="card-header fw-bold fs-4">Daftar Buku</div>
            <div class="card-body">
                <br>
                <a class="btn btn-primary mb-2" href="{{ route('view.add.book') }}">+ Tambah Buku</a>
                @if (Session::has('deleted'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('deleted') }}
                    </div>
                @endif
                <table class="table table-stripped">
                    <tr>
                        <th>ID</th>
                        <th>ISBN</th>
                        <th>Judul</th>
                        <th>Kategori</th>
                        <th>Pengarang</th>
                        <th>Penerbit</th>
                        <th>Kota</th>
                        <th>Editor</th>
                        <th>Gambar</th>
                        <th>Jumlah</th>
                        <th>Stok</th>
                        <th>Aksi</th>
                    </tr>
                    @if ($bukus->isNotEmpty())
                        @foreach ($bukus as $buku)
                            <tr>
                                <td>{{ $buku->idbuku }}</td>
                                <td>{{ $buku->isbn }}</td>
                                <td>{{ $buku->judul }}</td>
                                <td>@if ($buku->idkategori == 1) Novel @elseif ($buku->idkategori == 1) Fiksi @else Cerpen @endif</td>
                                <td>{{ $buku->pengarang }}</td>
                                <td>{{ $buku->penerbit }}</td>
                                <td>{{ $buku->kota_penerbit }}</td>
                                <td>{{ $buku->editor }}</td>
                                <td>{{ $buku->file_gambar }}</td>
                                <td>{{ $buku->stok }}</td>
                                <td>{{ $buku->stok_tersedia }}</td>
                                <td>
                                    <a class="btn btn-sm btn-info my-1" style="color: #F6F5FC"
                                        href="edit-book/{{ $buku->idbuku }}">Edit</a>
                                    <a class="btn btn-danger btn-sm" style="color: #F6F5FC"
                                        href="delete-book/{{ $buku->idbuku }}">Hapus</a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <div>
                            <p class="card-text">Buku saat ini sedang kosong!</p>
                        </div>
                    @endif
                </table>
            </div>
        </div>
    </div>

    <div><br><br><br><br><br></div>

    <footer class="page-footer mt-5 bg-image"
        style="background-image: url({{ URL::asset('img/world_pattern.svg') }});">
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
                        <li><a href="#">Muhammad Naufal Pratama - <span style="color: #35bb78">24060119130056</span></a>
                        </li>
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
