@extends('layouts.app')

@section('tittle', 'Details | FaridPutraStore')

@section('content')
    <div class="page-content page-details">
        <!-- section untuk breadcrumbs -->
        <section class="store-breadcrumbs" data-aos="fade-down">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="/">Home</a>
                                </li>
                                <li class="breadcrumb-item active">
                                    <p>Product Details</p>
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
        <!-- akhir section untuk breadcrumbs -->

        <!-- Section untuk gambar dan detail produk  -->
        <section class="details-product">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-6 gambar-item">
                        <div class="gambar-produk">
                            <img src="{{ Storage::url($getProduks->galleries->first()->photos) }}" class="jumbo"
                                alt="" />
                        </div>
                        <div class="row">
                            @forelse ($getProduks->galleries as $galeri)
                                <div class="col-6 col-md-4 col-lg-3">
                                    <div class="thumbnail">
                                        <img src="{{ Storage::url($galeri->photos) }}" class="thumb" />
                                    </div>
                                </div>
                            @empty
                                <div class="col-6 col-md-4 col-lg-3">
                                    <div class="thumbnail">
                                        <h3>Tidak Ada Photo Produk</h3>
                                    </div>
                                </div>
                            @endforelse
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-5">
                        <div class="nama-produk">
                            {{ $getProduks->name }}
                        </div>
                        <div class="ket-produk">Stok {{ $getProduks->stock }}</div>
                        <div class="harga-produk">
                            <h3>@currency($getProduks->price)</h3>
                        </div>
                        <div class="kondisi-produk">
                            <p>Kondisi : <b>{{ $getProduks->condition }}</b></p>
                            <p>Kategory: <b>{{ $getProduks->categori->name }}</b></p>
                        </div>
                        <div class="deskripsi-produk">
                            Deskripsi:
                            <p>
                                {!! $getProduks->description !!}
                            </p>
                        </div>
                        <div class="pengiriman-produk">
                            Pengiriman:
                            <p>
                                <i class="fa fa-map-marker"></i> Dikirim dari :
                                <b>Surabaya</b>
                            </p>
                        </div>
                        <div class="toko-produk">
                            <div class="row">
                                <div class="col-3 col-md-2 col-lg-2">
                                    <div class="logo-toko">
                                        <div class="gambar-toko">
                                            <img src="{{ asset('image/toko.png') }}" class="" alt="" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4 col-md-4 col-lg-4">
                                    <div class="logo-toko">
                                        <div class="nama-toko">
                                            Raya_Store
                                            <p><i class="fa fa-star"> 5.0 Rating toko</i></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4 col-md-4 col-lg-4">
                                    <a href="" class="component-chat d-block">
                                        <div class="logo-toko">
                                            <div class="chat-toko">
                                                <p class="chat-text"><i class="fa fa-comments logo-chat"></i>Chat Toko</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 mt-4">
                                <form action="{{ route('add-to-card', $getProduks->id) }}" method="post">
                                    @csrf
                                    <h5 class="text-center quantity-text">Jumlah barang yang dibeli</h5>
                                    <div class="d-flex justify-content-center quantity mt-3">
                                        <button class=" btn-minus" type="button">-</button>
                                        <input type="text" name="quantity" id="quantity" readonly value="1">
                                        <button type="button" class=" btn-plus">+</button>
                                    </div>
                                    <div class="tombol-produk">
                                        @if ($getProduks->stock > 0 && Auth()->user())
                                            <button type="submit" class="btn btn-produk">Tambahkan ke
                                                <i class="fa fa-shopping-cart"></i></button>
                                </form>
                            @elseif (!Auth()->user())
                                <a href="{{ route('login') }}" class="btn btn-produk">Tambahkan ke
                                    <i class="fa fa-shopping-cart"></i></a>
                            @elseif($getProduks->stock == 0)
                                <button class="btn-sm btn-produk-mute" type="button">Tambahkan ke
                                    <i class="fa fa-shopping-cart"></i></button>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </section>
    <!-- Akhir Section untuk gambar dan detail produk  -->
    <!-- Section untuk review produk  -->
    <section class="review-product">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-8" data-aos="fade-up">
                    <h5>Customer Review (3)</h5>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-lg-8">
                    <ul class="list-unstyled mt-3">
                        <li class="media" data-aos="fade-up" data-aos-delay="100">
                            <img src="/image/toko.png" alt="" class="mr-3 rounded-circle" />
                            <div class="media-body">
                                <h5 class="mt-2 mb-1">Putra</h5>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit
                                    Vestibulum cursus ex ac dignissim condimentum. Quisque
                                    tincidunt imperdiet iaculis. Etiam placerat porta est, ac
                                    ornare nisi congue nec.
                                </p>
                            </div>
                        </li>
                        <li class="media" data-aos="fade-up" data-aos-delay="200">
                            <img src="/image/toko.png" alt="" class="mr-3 rounded-circle" />
                            <div class="media-body">
                                <h5 class="mt-2 mb-1">Putra</h5>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit
                                    Vestibulum cursus ex ac dignissim condimentum. Quisque
                                    tincidunt imperdiet iaculis. Etiam placerat porta est, ac
                                    ornare nisi congue nec.
                                </p>
                            </div>
                        </li>
                        <li class="media" data-aos="fade-up" data-aos-delay="300">
                            <img src="/image/toko.png" alt="" class="mr-3 rounded-circle" />
                            <div class="media-body">
                                <h5 class="mt-2 mb-1">Putra</h5>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit
                                    Vestibulum cursus ex ac dignissim condimentum. Quisque
                                    tincidunt imperdiet iaculis. Etiam placerat porta est, ac
                                    ornare nisi congue nec.
                                </p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- Akhir Section untuk review produk  -->
    </div>
@endsection

@push('addon-javascript')
    <script src="{{ asset('/js/gambar.js') }}"></script>

    <script>
        // mengeset default  atribute button minus ke disabled
        document.querySelector(".btn-minus").setAttribute("disabled", "disabled");

        // variabel untuk iput value
        var valueContent

        //    btn plus
        document.querySelector(".btn-plus").addEventListener("click", function() {
            // value inpur
            valueContent = document.getElementById("quantity").value;
            // pertaambahan untuk value input
            valueContent++;
            // set hasil value dari pertambahan
            document.getElementById("quantity").value = valueContent;

            if (valueContent > 1) {
                document.querySelector(".btn-minus").removeAttribute("disabled");
                document.querySelector(".btn-minus").classList.remove("disabled");
            }

        })

        //    btn minus
        document.querySelector(".btn-minus").addEventListener("click", function() {
            // value inpur
            valueContent = document.getElementById("quantity").value;
            // pertaambahan untuk value input
            valueContent--;
            // set hasil value dari pertambahan
            document.getElementById("quantity").value = valueContent;

            if (valueContent == 1) {
                document.querySelector(".btn-minus").setAttribute("disabled", "disabled");
            }
        })
    </script>
@endpush
