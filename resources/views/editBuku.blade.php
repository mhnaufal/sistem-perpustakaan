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
            <div class="card-header fw-bold fs-4">Edit Buku</div>
            <div class="card-body">
                <br>
                <form action="{{ route('add.book') }}" autocomplete="on" method="post">
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
                            <label for="isbn" class="col-sm-2 col-form-label">ISBN : </label>
                            <div class="col-sm-10">
                                <input type="text" name="isbn" id="isbn" class="form-control"
                                    placeholder="Masukkan ISBN buku" value="{{ $book->isbn }}" required /><br>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="judul" class="col-sm-2 col-form-label">Judul : </label>
                            <div class="col-sm-10">
                                <input type="text" name="judul" id="judul" class="form-control"
                                    placeholder="Masukkan judul buku" value="{{ $book->judul }}" required /><br>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-sm-2 col-form-label">Kategori : </label>
                            <div class="col-sm-10">
                                <select style="color: #707070" name="kategori" class="form-control">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->idkategori }}">{{ $category->nama }}</option>
                                    @endforeach
                                </select><br>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="pengarang" class="col-sm-2 col-form-label">Pengarang : </label>
                            <div class="col-sm-10">
                                <input type="text" name="pengarang" id="pengarang" class="form-control"
                                    placeholder="Masukkan nama pengarang buku" value="{{ $book->pengarang }}"
                                    required /><br>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="penerbit" class="col-sm-2 col-form-label">Penerbit : </label>
                            <div class="col-sm-10">
                                <input type="text" name="penerbit" id="penerbit" class="form-control"
                                    placeholder="Masukkan nama penerbit buku" value="{{ $book->penerbit }}"
                                    required /><br>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kota" class="col-sm-2 col-form-label">Kota : </label>
                            <div class="col-sm-10">
                                <input type="text" name="kota" id="kota" class="form-control"
                                    placeholder="Masukkan kota penerbit buku" value="{{ $book->kota_penerbit }}"
                                    required /><br>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="editor" class="col-sm-2 col-form-label">Editor : </label>
                            <div class="col-sm-10">
                                <input type="text" name="editor" id="editor" class="form-control"
                                    placeholder="Masukkan nama editor buku" value="{{ $book->editor }}"
                                    required /><br>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="gambar" class="col-sm-2 col-form-label">Gambar : </label>
                            <div class="col-sm-10">
                                <input type="file" name="gambar" id="gambar" class="form-control"
                                    placeholder="Masukkan gambar buku" value="{{ $book->file_gambar }}" required><br>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="stok" class="col-sm-2 col-form-label">Stok : </label>
                            <div class="col-sm-10">
                                <input type="number" name="stok" id="stok" class="form-control"
                                    placeholder="Masukkan jumlah stok buku" value="{{ $book->stok }}" required /><br>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tersedia" class="col-sm-2 col-form-label">Jumlah : </label>
                            <div class="col-sm-10">
                                <input type="number" name="tersedia" id="tersedia" class="form-control"
                                    placeholder="Masukkan jumlah yang tersedia buku"
                                    value="{{ $book->stok_tersedia }}" required /><br>
                            </div>
                        </div>
                        <a class="btn btn-secondary ms-2 m-1" href="{{ route('view.books') }}"
                            style="float: right">Kembali</a>
                        <button type="submit" class="btn btn-primary m-1" style="float: right">Perbarui</button>
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
