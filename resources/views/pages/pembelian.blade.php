@extends('layouts.app')

@section('tittle', 'Daftar Pemebelian | FaridPutraStore')

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
                  <li class="breadcrumb-item active"><p>Daftar Pembelian</p></li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </section>
      <!-- akhir section untuk breadcrumbs -->

      <!-- Section untuk gambar dan detail produk  -->
      <section class="section-pembelian">
        <div class="container">
            <div class="row">
                <div class="col-12 mt-3">
                    <ul class="nav nav-pills mb-4" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Menunggu Pembayaran</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Proses</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Pengiriman</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                            <a href="{{ route('detail-pembelian-produk') }}" class="card card-list mb-4 d-block " data-aos="fade-in">
                                <div class="card-body">
                                    <div class="row">
                                    <div class="col-md-1">
                                        <img
                                        src="/image/sofa.png"
                                        class="w-100"
                                        alt=""
                                        />
                                    </div>
                                    <div class="col-md-4">
                                        <h6>Sofa nyaman terapanjang</h6>
                                    </div>
                                    <div class="col-md-3">
                                        <h6>Dwi</h6>
                                    </div>
                                    <div class="col-md-3">
                                        <h6>22 April 2022</h6>
                                    </div>
                                    <div class="col-md-1">
                                        <i class="material-icons d-none d-md-block"
                                        >chevron_right</i
                                        >
                                    </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                        ...
                        </div>
                        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                        ...
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </section>
      <!-- Akhir Section untuk review produk  -->
    </div>
@endsection
