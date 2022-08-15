<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="{{ asset('/image/logo.svg') }}" rel="shortcut icon" />
    <!-- css lokal -->
    <link rel="stylesheet" href="{{ asset('/css/main.css') }}" />
    <!-- akhir css lokal -->

    <!-- css boostrap  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous" />
    <!-- akhir css boostrap -->

    {{-- CSS untuk datatables --}}
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.12.0/datatables.min.css" />
    {{-- AKhir CSS untuk datatables --}}


    <!-- icon google -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <!-- icon google -->

    <!-- link css animasi dengan mneggunakan AOS -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <!-- Akhir link css animasi dengan menggunakan AOS -->

    <!-- link font awesome  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <!-- akhir font awesome  -->


    <!-- <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script> -->
</head>

<body>
    <!-- Membuat page dashboard -->
    <div class="page-dashboard">
        <div class="d-flex" id="wrapper" data-aos="fade-right">
            <!-- Menu sidebar  -->
            <div class="border-right" id="sidebar-wrapper">
                <div class="sidebar-heading text-center">
                    <img src="{{ asset('/image/png_logo.png') }}" class="w-100 my-4" alt="" />
                </div>
                <div class="list-group list-group-flush">
                    <a href="{{ route('toko-dashboard') }}"
                        class="list-group-item list-group-item-action {{ request()->is('toko/dashboard') ? 'active' : '' }}">Dashboard</a>
                    <a href="{{ route('produk.index') }}"
                        class="list-group-item list-group-item-action {{ request()->is('toko/produk', 'toko/produk/create') ? 'active' : '' }}">Produk
                        Saya</a>
                    <a href="{{ route('toko-transaksi') }}"
                        class="list-group-item list-group-item-action {{ request()->is('toko/transaksi-produk', 'toko/detail-transaksi') ? 'active' : '' }}">Transaksi</a>
                    <a href="{{ route('toko-pengaturan-toko') }}"
                        class="list-group-item list-group-item-action {{ request()->is('toko/pengaturan-toko') ? 'active' : '' }}">Pengaturan
                        Toko</a>
                    {{-- <a
              href="/admin/akun.html"
              class="list-group-item list-group-item-action"
              >Akun Saya</a
            > --}}
                    <a href="/admin/dashboard-account.html" class="list-group-item list-group-item-action">Keluar</a>
                </div>
            </div>
            <!-- Akhir Menu sidebar  -->

            <!-- Page content dashboard  -->
            <div id="page-content-wrapper">
                <nav class="navbar navbar-expand-lg navbar-light fixed-top navbar-store navbar-fixed-top"
                    data-aos="fade-down">
                    <div class="container-fluid">
                        <button class="btn btn-secondary d-md-none mr-auto mr-2" id="menu-toggle">
                            &laquo; Menu
                        </button>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarResponsive">
                            <!-- Navbar untuk desktop menu -->
                            <ul class="navbar-nav d-none d-lg-flex ml-auto">
                                <li class="nav-item">
                                    <a class="nav-link px-2" href="#">
                                        <i class="fa fa-shopping-cart keranjang"></i>
                                        <div class="card-badge">5</div>
                                    </a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link" id="navbarDropwdown" role="button" data-toggle="dropdown"
                                        href="#">
                                        <img src="{{ asset('/image/user.png') }}" alt=""
                                            class="rounded-circle mr-2 profil-picture" style="background-color: #ddd" />
                                        Hi, Putra
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="" class="dropdown-item">Dashboard</a>
                                        <a href="" class="dropdown-item">Profil</a>
                                        <a href="" class="dropdown-item">Setting</a>
                                        <div class="dropdown-divider"></div>
                                        <a href="" class="dropdown-item">Logout</a>
                                    </div>
                                </li>
                            </ul>
                            <!-- Akhir navbar untuk desktop -->

                            <!-- Navbar untuk tampilan mobile -->
                            <ul class="navbar-nav d-block d-lg-none">
                                <li class="nav-item">
                                    <a href="" class="nav-link"> Keranjang </a>
                                </li>
                                <li class="nav-item">
                                    <a href="" class="nav-link d-inline-block"> Masuk </a>
                                </li>
                                <li class="nav-item">
                                    <a href="" class="nav-link d-inline-block"> Daftar </a>
                                </li>
                            </ul>
                            <!-- Akhir Navbar untuk tampilan mobile -->
                        </div>
                    </div>
                </nav>
                <!-- Section content untuk dashboard -->
                @yield('content')
                <!-- Akhir Section content untuk dashboard -->
            </div>
            <!-- Akhir Page content dashboard  -->
        </div>
    </div>
    <!-- Akhir Membuat page dashboard -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>

    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.12.0/datatables.min.js"></script>

    <!-- Java script main -->
    <script src="{{ asset('/js/sidebar.js') }}"></script>
    <!-- akhir javascrip main -->

    <!-- link java script untuk animasi dengan AOS -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <!-- Akhir link java script animasi dengan AOS -->
    @stack('addon-javascript')
    @include('sweetalert::alert')
</body>

</html>
