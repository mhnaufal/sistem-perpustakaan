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
            <div class="card-header fw-bold fs-4">Hapus Kategori</div>
            <div class="card-body">
                <br>
                <form action="{{ route('delete.category', $category->idkategori) }}" autocomplete="on" method="post">
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
                        <tr>
                            <th>ID</th>
                            <th>Kategori</th>
                        </tr>
                        <tr>
                            <td>{{ $category->idkategori }}</td>
                            <td>{{ $category->nama }}</td>
                        </tr>
                        <p>Yakin ingin menghapus kategori <span class="fw-bold fs-5">{{ $category->nama }}</span>?
                        </p>
                        <a class="btn btn-secondary ms-2 m-1" href="{{ route('view.categories') }}"
                            style="float: right">Kembali</a>
                        <button type="submit" class="btn btn-danger m-1" style="float: right">Hapus</button>
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
