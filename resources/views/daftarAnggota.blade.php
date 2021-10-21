<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Daftar Anggota | Perpustakaan</title>
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
            <div class="card-header fw-bold fs-4">Daftar Anggota</div>
            <div class="card-body">
                <br>
                <a class="btn btn-primary mb-2" href="{{ route('view.add.member') }}">➕ Tambah Anggota</a>
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
                        <th>🔢 NIM</th>
                        <th>📛 Nama</th>
                        <th>📌 Alamat</th>
                        <th>📧 Email</th>
                        <th>📞 No. Telepon</th>
                    </tr>
                    @if ($members->isNotEmpty())
                        @foreach ($members as $member)
                            <tr>
                                <td>{{ $member->nim }}</td>
                                <td>{{ $member->nama }}</td>
                                <td>{{ $member->alamat }}</td>
                                <td>{{ $member->email }}</td>
                                <td>{{ $member->no_telp }}</td>
                            </tr>
                        @endforeach
                    @else
                        <div>
                            <p class="card-text">Anggota kosong!</p>
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
