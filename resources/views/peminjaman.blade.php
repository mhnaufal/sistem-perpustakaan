<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Peminjaman Buku | Perpustakaan</title>
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

    <link rel="icon" href="{{ URL::asset('img/brand/favicon.png') }}" type="image/png">

    <link rel="stylesheet" href="{{ URL::asset('css/maicons.css') }}">

    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.css') }}">

    <link rel="stylesheet" href="{{ URL::asset('vendor/animate/animate.css') }}">

    <link rel="stylesheet" href="{{ URL::asset('css/theme.css') }}">

</head>

<body>

    <!-- Back to top button -->
    <div class="back-to-top"></div>

    @include('header')

    <div class="container mt-5">
        <a class="btn btn-success mb-2" href="{{ route('homepage') }}">🏠 Beranda</a>
        <a class="btn btn-success mb-2" href="{{ route('dashboard') }}">💠 Dashboard</a>
        <div class="card">
            <div class="card-header fw-bold fs-4">Peminjaman Buku</div>
            <div class="card-body">
                <br>
                <form action="{{ route('add.loan') }}" autocomplete="on" method="post">
                    @csrf
                    @if (session('errors'))
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                    @if (Session::has('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    @if (Session::has('error'))
                        <div class="alert alert-danger">
                            {{ Session::get('error') }}
                        </div>
                    @endif

                    <table class="table">
                        <div class="form-group row">
                            <label for="nim" class="col-sm-2 col-form-label">NIM anggota : </label>
                            <div class="col-sm-10">
                                <input type="text" name="nim" id="nim" class="form-control"
                                    placeholder="Masukkan NIM anggota" required /><br>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-sm-2 col-form-label">Buku : </label>
                            <div class="col-sm-10">
                                <select style="color: #707070" name="buku" class="form-control">
                                    @foreach ($bukus as $buku)
                                        <option value="{{ $buku->judul }}">{{ $buku->judul }}</option>
                                    @endforeach
                                </select><br>
                            </div>
                        </div>
                        <a class="btn btn-secondary ms-2 m-1" style="float: right"
                            href="{{ route('dashboard') }}">Kembali</a>
                        <button type="submit" class="btn btn-primary m-1" style="float: right">Pinjam</button>
                    </table>
                </form>
            </div>
        </div>
    </div>

    <div><br><br><br><br><br></div>

    @include('footer')

    <link rel="stylesheet" href="{{ URL::asset('js/jquery3.min.js') }}">

    <link rel="stylesheet" href="{{ URL::asset('js/boostrap.bundle.min.js') }}">

    <link rel="stylesheet" href="{{ URL::asset('js/google-maps.js') }}">

    <link rel="stylesheet" href="{{ URL::asset('vendor/wow/wow.min.js') }}">

    <link rel="stylesheet" href="{{ URL::asset('js/theme.js') }}">

</body>

</html>
