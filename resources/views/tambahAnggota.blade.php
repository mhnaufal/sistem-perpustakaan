<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Tambah Anggota | Perpustakaan</title>
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

    <div><br><br></div>

    <div class="container mt-5">
        <div class="card">
            <div class="card-header fw-bold fs-4">Tambah Anggota Baru</div>
            <div class="card-body">
                <br>
                <form action="{{ route('add.member') }}" autocomplete="on" method="post">
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
                            <label for="nim" class="col-sm-2 col-form-label">NIM : </label>
                            <div class="col-sm-10">
                                <input type="text" name="nim" id="nim" class="form-control"
                                    placeholder="Masukkan NIM anggota" required /><br>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nama" class="col-sm-2 col-form-label">Nama : </label>
                            <div class="col-sm-10">
                                <input type="text" name="nama" id="nama" class="form-control"
                                    placeholder="Masukkan nama anggota" required /><br>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-sm-2 col-form-label">Password : </label>
                            <div class="col-sm-10">
                                <input type="password" name="password" id="password" class="form-control"
                                placeholder="Masukkan password anggota" required /><br>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="alamat" class="col-sm-2 col-form-label">Alamat : </label>
                            <div class="col-sm-10">
                                <input type="text" name="alamat" id="alamat" class="form-control"
                                    placeholder="Masukkan nama alamat anggota" required /><br>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kota" class="col-sm-2 col-form-label">Kota : </label>
                            <div class="col-sm-10">
                                <input type="text" name="kota" id="kota" class="form-control"
                                    placeholder="Masukkan nama kota" required /><br>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label">Email : </label>
                            <div class="col-sm-10">
                                <input type="email" name="email" id="email" class="form-control"
                                    placeholder="Masukkan email anggota" required /><br>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="no_telp" class="col-sm-2 col-form-label">No. Telepon : </label>
                            <div class="col-sm-10">
                                <input type="text" name="no_telp" id="no_telp" class="form-control"
                                    placeholder="Masukkan nomor telepon anggota" required /><br>
                            </div>
                        </div>
                        <a class="btn btn-secondary ms-2 m-1" style="float: right"
                            href="{{ route('view.members') }}">Kembali</a>
                        <button type="submit" class="btn btn-primary m-1" style="float: right">Tambah</button>
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
