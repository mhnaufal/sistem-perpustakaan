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
    
    <link rel="stylesheet" href="{{ URL::asset('vendor/nucleo/css/nucleo.css') }}" type="text/css">

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
            <div class="card-header fw-bold fs-4">Daftar Buku</div>
            <div class="card-body">
                <!-- Search form -->
                <form class="navbar-search navbar-search-light form-inline mr-sm-3" id="navbar-search-main" method="GET" action="{{ route('search.books') }}">
                    @csrf
                    <div class="form-group mb-0">
                        <div class="input-group input-group-alternative input-group-merge">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="ni ni-world"></i></span>
                            </div>
                            <input class="form-control" placeholder="Search" type="text" name="cari">
                        </div>
                    </div>
                </form>
                <br>
                <a class="btn btn-primary mb-2" href="{{ route('view.add.book') }}">➕ Tambah Buku</a>
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
                @if (Session::has('deleted'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('deleted') }}
                    </div>
                @endif
                <table class="table table-stripped">
                    <tr>
                        <th>🔢 ID</th>
                        <th>🔑 <p>ISBN</p></th>
                        <th>📗 <p>Judul</p></th>
                        <th>🚩 Kategori</th>
                        <th>✏ Pengarang</th>
                        <th>🏢 <p>Penerbit</p></th>
                        {{-- <th>🌃 <p>Kota</p></th> --}}
                        {{-- <th>🖊 <p>Editor</p></th> --}}
                        {{-- <th>Gambar</th> --}}
                        {{-- <th>📓 Jumlah</th> --}}
                        <th>📚 Stok</th>
                        <th>⭐ <p>Aksi</p></th>
                    </tr>
                    @if ($books->isNotEmpty())
                        @foreach ($books as $book)
                            <tr>
                                <td>{{ $book->idbuku }}</td>
                                <td>{{ $book->isbn }}</td>
                                <td>{{ $book->judul }}</td>
                                <td>@if ($book->idkategori === 1) Novel @elseif ($book->idkategori === 2) Fiksi @elseif ($book->idkategori === 3) Cerpen @else Lainnya @endif</td>
                                <td>{{ $book->pengarang }}</td>
                                <td>{{ $book->penerbit }}</td>
                                {{-- <td>{{ $book->kota_penerbit }}</td> --}}
                                {{-- <td>{{ $book->editor }}</td> --}}
                                {{-- <td>{{ $book->file_gambar }}</td> --}}
                                {{-- <td>{{ $book->stok }}</td> --}}
                                <td>{{ $book->stok_tersedia }}</td>
                                <td>
                                    <a class="btn btn-sm btn-info my-1" style="color: #F6F5FC"
                                        href="edit-book/{{ $book->idbuku }}">🔧Edit</a>
                                    <a class="btn btn-danger btn-sm" style="color: #F6F5FC"
                                        href="delete-book/{{ $book->idbuku }}">🗑️Hapus</a>
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

    @include('footer')

    <link rel="stylesheet" href="{{ URL::asset('js/jquery3.min.js') }}">

    <link rel="stylesheet" href="{{ URL::asset('js/boostrap.bundle.min.js') }}">

    <link rel="stylesheet" href="{{ URL::asset('js/google-maps.js') }}">

    <link rel="stylesheet" href="{{ URL::asset('vendor/wow/wow.min.js') }}">

    <link rel="stylesheet" href="{{ URL::asset('js/theme.js') }}">

</body>

</html>
