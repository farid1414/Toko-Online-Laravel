@extends('layouts.app')

@section('tittle', 'Home | Farid Putra Store')

@section('content')
    <div class="page-content pages-home">
        <!-- Awal carousel -->
        <section class="store-carousel">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12" data-aos="zoom-in">
                        <div id="storeCarousel" class="carousel slide" data-ride="carousel">
                            {{-- <ol class="carousel-indicators">
                  <li
                    class="active"
                    data-target="#storeCarousel"
                    data-slide-to="0"
                  ></li>
                  <li data-target="#storeCarousel" data-slide-to="1"></li>
                  <li data-target="#storeCarousel" data-slide-to="2"></li>
                </ol> --}}
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img class="d-block w-100 h-100" src="{{ asset('image/Banner.png') }}" alt=""
                                        srcset="" />
                                </div>
                                <div class="carousel-item ">
                                    <img class="d-block w-100" src="{{ asset('image/Banner_2.png') }}" alt=""
                                        srcset="" />
                                </div>
                                <div class="carousel-item ">
                                    <img class="d-block w-100" src="{{ asset('image/Banner_3.png') }}" alt=""
                                        srcset="" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Akhir carousel  -->

        <!-- Awal untuk kategori pilihan -->
        <section class="store-trend-categories">
            <div class="container">
                <div class="row">
                    <div class="col-12" data-aos="fade-right">
                        <h5>KATEGORI PILIHAN</h5>
                    </div>
                </div>
                <div class="row">
                    @php
                        $incrementCategori = 0;
                    @endphp
                    <!-- mulai icon kategori komputer -->
                    @forelse ($categories as $categori)
                        <div class="col-6 col-md-3 col-lg-2" data-aos="fade-left"
                            data-aos-delay="{{ $incrementCategori += 100 }}">
                            <a href="" class="component-categori d-block">
                                <div class="categori-image">
                                    <img src="{{ Storage::url($categori->photo) }} " alt="" class="w-100" />
                                </div>
                                <p class="categori-text">{{ $categori->name }}</p>
                            </a>
                        </div>
                        <!-- akhir kategori kompoter -->
                    @empty
                    @endforelse

                </div>
            </div>
        </section>
        <!-- akhir untuk kategori pilihan -->

        <!-- Awal untuk section  produk terbaru  -->
        <section class="store-new-categories">
            <div class="container">
                <div class="row">
                    <div class="col-12" data-aos="fade-up">
                        <h5>PRODUK TERBARU</h5>
                    </div>
                </div>
                <div class="row">
                    @php
                        $incrementProduct = 0;
                    @endphp
                    @foreach ($products as $product)
                        <div class="col-6 col-md-4 col-lg-2 card-produk" data-aos="fade-up"
                            data-aos-delay="{{ $incrementProduct += 100 }}">
                            <a href="{{ route('details', $product->slug) }}" class="component-products d-block">
                                <div class="product-thumbnail">
                                    <div class="product-image"
                                        style="background-image: url({{ Storage::url($product->galleries->first()->photos) }}); background-color: #ddd;background-position: center;background-repeat:no-repeat; background-size: auto 100%">
                                    </div>
                                </div>
                                <div class="product-text">
                                    {{ $product->name }}
                                </div>
                                <div class="product-price">
                                    <p>@currency($product->price)</p>
                                </div>
                                <div class="product-location fixed-bottom mb-2 ml-2">
                                    <small><i class="fa fa-map-marker"></i> Jakarta Selatan</small>
                                </div>
                            </a>
                        </div>
                        <!-- AKhir produk -->
                    @endforeach
                </div>
            </div>
        </section>
        <!-- Akhir untuk section produk terbaeru  -->

        <!-- Awal section untuk kenapa pilih putraShop -->
        <section class="store-putrashop">
            <div class="container">
                <div class="row">
                    <div class="col-12" data-aos="fade-up">
                        <h5>KENAPA PILIH PUTRASHOP</h5>
                    </div>
                </div>
                <div class="row">
                    <!--  kenapa pilih putrashop  -->
                    <div class="col-9 col-md-9 col-lg-4 card-putrashop" data-aos="fade-up" data-aos-delay="100">
                        <div class="row">
                            <div class="col-5">
                                <img src="{{ asset('image/transparan.png') }}" class="w-100" alt="" />
                            </div>
                            <div class="col-7">
                                <div class="putrashop-judul">Transparan</div>
                                <div class="putrashop-isi">
                                    <p>
                                        Pembayaran anda akan diteruskan ke penjual apabila barang
                                        sudah diterima pembeli
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Akhir kenapa pilih putrashop -->
                    <!--  kenapa pilih putrashop  -->
                    <div class="col-9 col-md-9 col-lg-4 card-putrashop" data-aos="fade-up" data-aos-delay="200">
                        <div class="row">
                            <div class="col-5">
                                <img src="{{ asset('image/aman.png') }}" class="w-100" alt="" />
                            </div>
                            <div class="col-7">
                                <div class="putrashop-judul">Aman</div>
                                <div class="putrashop-isi">
                                    <p>
                                        Belanja di putra Shop uang dan barang anda terjamin aman
                                        dan keasliannya
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Akhir kenapa pilih putrashop -->
                    <!--  kenapa pilih putrashop  -->
                    <div class="col-9 col-md-9 col-lg-4 card-putrashop" data-aos="fade-up" data-aos-delay="300">
                        <div class="row">
                            <div class="col-5">
                                <img src="{{ asset('image/cepat.png') }}" class="w-100" alt="" />
                            </div>
                            <div class="col-7">
                                <div class="putrashop-judul">Cepat</div>
                                <div class="putrashop-isi">
                                    <p>
                                        Pelayanan dan proses pengemasan akan dilakukan dalam waktu
                                        24 jam
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Akhir kenapa pilih putrashop -->
                </div>
            </div>
        </section>
        <!-- Akhir Awal section untuk kenapa pilih putraShop -->
    </div>
@endsection
