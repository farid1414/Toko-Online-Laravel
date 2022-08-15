@extends('layouts.admin-toko')

@section('title', 'Dashboard | FaridPutraStore')


@section('content')
          <div class="section-content dashboard-home" data-aos="fade-up">
            <div class="container-fluid">
              <div class="dashboard-heading">
                <h2 class="dashboard-tittle">Dashboard</h2>
                <p class="dashboard-subtittle">look what you have made today</p>
              </div>
              <div class="dashboard-content">
                <div class="row">
                  <!-- Card untuk konten dashboard -->
                  <div class="col-md-4">
                    <div class="card mb-2">
                      <div class="card-body">
                        <div class="dashboard-card-tittle">Pelanggan</div>
                        <div class="dashboard-card-subtittle">15.000</div>
                      </div>
                    </div>
                  </div>
                  <!-- akhir card content dashboard -->
                  <!-- Card untuk konten dashboard -->
                  <div class="col-md-4">
                    <div class="card mb-2">
                      <div class="card-body">
                        <div class="dashboard-card-tittle">Pendapatan</div>
                        <div class="dashboard-card-subtittle">Rp 1.500.000</div>
                      </div>
                    </div>
                  </div>
                  <!-- akhir card content dashboard -->
                  <!-- Card untuk konten dashboard -->
                  <div class="col-md-4">
                    <div class="card mb-2">
                      <div class="card-body">
                        <div class="dashboard-card-tittle">Transaksi</div>
                        <div class="dashboard-card-subtittle">15.000</div>
                      </div>
                    </div>
                  </div>
                  <!-- akhir card content dashboard -->
                </div>
                <!-- page untuk trmasaksi terakhir  -->
                <div class="row mt-3">
                  <div class="col-12 mt-4">
                    <h5 class="mb-4">Transaksi Terakhir</h5>
                    <!-- Card hasil untuk transaksi terkahir -->
                    <a
                      href="/admin/transaksi-detail.html"
                      class="card card-list d-block"
                    >
                      <div class="card-body">
                        <div class="row">
                          <div class="col-md-1">
                            <img src="/image/sofa.png" class="w-100" alt="" />
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
                            <img src="/image/milo.png" class="w-100" alt="" />
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
                <!-- page untuk trmasaksi terakhir  -->
              </div>
            </div>
          </div>
@endsection
