@extends('layouts.admin-toko')


@section('title', 'Transaksi | FaridPutraStore')

@section('content')
 <!-- Section content untuk dashboard -->
          <div class="section-content dashboard-home" data-aos="fade-up">
            <div class="container-fluid">
              <div class="dashboard-heading">
                <h2 class="dashboard-tittle">Transaksi</h2>
                <p class="dashboard-subtittle">
                  Belanja hemat harga bersahabat
                </p>
              </div>
              <div class="dashboard-content">
                <!-- page untuk trmasaksi terakhir  -->
                <div class="row">
                  <div class="col-12 mt-4">
                    <!-- Menu untuk pilihan barang yang terjual  -->
                    <ul
                      class="nav nav-pills mb-3"
                      id="pills-tab"
                      role="tablist"
                    >
                      <li class="nav-item" role="presentation">
                        <a
                          class="nav-link active"
                          id="pills-home-tab"
                          data-toggle="pill"
                          href="#pills-home"
                          role="tab"
                          aria-controls="pills-home"
                          aria-selected="true"
                          >Terjual</a
                        >
                      </li>
                      <li class="nav-item" role="presentation">
                        <a
                          class="nav-link"
                          id="pills-profile-tab"
                          data-toggle="pill"
                          href="#pills-profile"
                          role="tab"
                          aria-controls="pills-profile"
                          aria-selected="false"
                          >Beli</a
                        >
                      </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                      <div
                        class="tab-pane fade show active"
                        id="pills-home"
                        role="tabpanel"
                        aria-labelledby="pills-home-tab"
                      >
                        <a href="" class="card card-list d-block">
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
                        <!-- Akhir card untuk hasil transaksi terkahir -->
                      </div>
                      <div
                        class="tab-pane fade"
                        id="pills-profile"
                        role="tabpanel"
                        aria-labelledby="pills-profile-tab"
                      >
                        <!-- Card hasil untuk transaksi terkahir -->
                        <a href="" class="card card-list d-block">
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
                        <!-- Akhir card untuk hasil transaksi terkahir -->
                        <!-- Card hasil untuk transaksi terkahir -->
                        <a href="" class="card card-list d-block">
                          <div class="card-body">
                            <div class="row">
                              <div class="col-md-1">
                                <img
                                  src="/image/milo.png"
                                  class="w-100"
                                  alt=""
                                />
                              </div>
                              <div class="col-md-4">
                                <h6>Milo Bubuk Kemasan 250g</h6>
                              </div>
                              <div class="col-md-3">
                                <h6>Putra</h6>
                              </div>
                              <div class="col-md-3">
                                <h6>18 April 2022</h6>
                              </div>
                              <div class="col-md-1">
                                <i class="material-icons d-none d-md-block"
                                  >chevron_right</i
                                >
                              </div>
                            </div>
                          </div>
                        </a>
                        <!-- Akhir card untuk hasil transaksi terkahir -->
                      </div>
                    </div>
                    <!-- Menu untuk pilihan barang yang terjual  -->
                  </div>
                </div>
                <!-- page untuk trmasaksi terakhir  -->
              </div>
            </div>
</div>
<!-- Akhir Section content untuk dashboard -->
@endsection
