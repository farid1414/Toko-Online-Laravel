<nav class="navbar navbar-expand-lg navbar-light navbar-store fixed-top navbar-fixed-top" data-aos="fade-down">
    <div class="container">
        <a class="navbar-brand" href="/">
            <img src="{{ asset('/image/brand.svg') }}" alt="" />
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
            aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarResponsive">
            <!-- Navbar untuk desktop menu -->
            <ul class="navbar-nav ml-auto d-none d-lg-flex">
                <li class="nav-item">
                    <form class="form-inline nav-link">
                        <input class="form-control px-4 mr-sm-1" type="search" placeholder="Cari barang anda disini"
                            aria-label="Search" />
                        <button class="btn btn-outline-primary px-2" type="submit">
                            <i class="fa fa-search"></i>
                        </button>
                    </form>
                </li>
                <li class="nav-item">
                    @if (Auth()->user())
                    @php
                        $carts = \App\Models\Carts::where('users_id', Auth()->user()->id)->count();
                    @endphp
                        <a class="nav-link px-3" href="{{ route('card') }}">
                            <i class="fa fa-shopping-cart keranjang"></i>
                            @if ($carts > 0)
                                <div class="card-badge">{{ $carts }}</div>
                            @endif
                        </a>
                    @else
                        <a class="nav-link px-3" href="{{ route('login') }}">
                            <i class="fa fa-shopping-cart keranjang"></i>
                        </a>
                    @endif
                </li>

                <li class="nav-item dropdown px-2 nav-toko ">
                    <a class="nav-link" id="navbarDropwdown" role="button" data-toggle="dropdown" href="#">
                        <img src="{{ asset('/image/toko.png') }}" alt=""
                            class="rounded-circle mr-2 profil-picture" style="background-color: #ddd" />
                        Toko
                    </a>
                    <div class="dropdown-menu dropdown-menu-right bg-white">
                        {{-- <a href="" class="dropdown-item">Dashboard</a> --}}
                        <div class="dropdown-item">
                            <p class="text-muted text-center">Anda belum memiliki toko</p>
                            <a href="" class="btn btn-success btn-block mb-2">Buka Toko Gratis</a>
                            <small class="text-muted">Ketentuan toko di FaridPutraStore <a href=""
                                    class="pelajari-toko">Pelajari Selengkapnya</a></small>
                        </div>
                    </div>
                </li>

                @if (Auth()->user())
                    <li class="nav-item dropdown">
                        <a class="nav-link" id="navbarDropwdown" role="button" data-toggle="dropdown" href="#">
                            <img src="{{ asset('/image/user.png') }}" alt=""
                                class="rounded-circle mr-2 profil-picture" style="background-color: #ddd" />
                            Halo, {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right bg-white">
                            <a href="{{ route('pembelian-produk') }}" class="dropdown-item">Pembelian</a>
                            <a href="" class="dropdown-item">Profil</a>
                            <a href="" class="dropdown-item">Setting</a>
                            <div class="dropdown-divider"></div>
                            <a href="{{ route('logout') }}" class="dropdown-item">Logout</a>
                        </div>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="btn btn-sm nav-link px-3 text-primary btn-masuk" href="{{ route('login') }}">Masuk</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-sm nav-link px-3 text-white btn-daftar"
                            href="{{ route('register') }}">Daftar</a>
                    </li>
                @endif


            </ul>
            <!-- Akhir navbar untuk desktop -->

            <!-- Navbar untuk tampilan mobile -->
            <ul class="navbar-nav d-block d-lg-none">
                <li class="nav-item">
                    <a href="" class="nav-link"> Keranjang </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('login') }}" class="nav-link d-inline-block"> Masuk </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('register') }}" class="nav-link d-inline-block"> Daftar </a>
                </li>
            </ul>
            <!-- Akhir Navbar untuk tampilan mobile -->
        </div>
    </div>
</nav>
