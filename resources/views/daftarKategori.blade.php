<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Daftar Kategori | Perpustakaan</title>
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
            <div class="card-header fw-bold fs-4">Daftar Kategori</div>
            <div class="card-body">
                <br>
                <a class="btn btn-primary mb-2" href="{{ route('view.add.category') }}">➕ Tambah Kategori</a>
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
                        <th>ID</th>
                        <th>Kategori</th>
                        <th>Aksi</th>
                    </tr>
                    @if ($categories->isNotEmpty())
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $category->idkategori }}</td>
                                <td>{{ $category->nama }}</td>
                                <td>
                                    <a class="btn btn-sm btn-info my-1" style="color: #F6F5FC"
                                        href="edit-category/{{ $category->idkategori }}">🔧Edit</a>
                                    <a class="btn btn-danger btn-sm" style="color: #F6F5FC"
                                        href="delete-category/{{ $category->idkategori }}">🗑️Hapus</a>
                                </td>

                            </tr>
                        @endforeach
                    @else
                        <div>
                            <p class="card-text">Kategori kosong!</p>
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
