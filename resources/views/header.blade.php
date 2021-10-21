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
                                class="text-dark ">Selamat datang</span> <span
                                class="text-light">{{ $user }} 😀</span></button>
                        </form>
                    </li>
                </ul>
            </div>

        </div>
    </nav>
</header>