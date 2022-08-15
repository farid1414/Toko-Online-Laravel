@extends('layouts.admin')

@section('title', 'Dashboard | FaridPutraStore')


@section('content')
          <div class="section-content dashboard-home" data-aos="fade-up">
            <div class="container-fluid">
              <div class="dashboard-heading">
                <h2 class="dashboard-tittle">Dashboard Admin</h2>
                <p class="dashboard-subtittle">look what you have made today</p>
              </div>
              <div class="dashboard-content">
                <div class="row">
                  <!-- Card untuk konten dashboard -->
                  <div class="col-md-4">
                    <div class="card mb-2">
                      <div class="card-body">
                        <div class="dashboard-card-tittle">Pelanggan</div>
                        <div class="dashboard-card-subtittle">{{ $user }}</div>
                      </div>
                    </div>
                  </div>
                  <!-- akhir card content dashboard -->
                  <!-- Card untuk konten dashboard -->
                  <div class="col-md-4">
                    <div class="card mb-2">
                      <div class="card-body">
                        <div class="dashboard-card-tittle">Pendapatan</div>
                        <div class="dashboard-card-subtittle">Rp {{ $pendapatan }}</div>
                      </div>
                    </div>
                  </div>
                  <!-- akhir card content dashboard -->
                  <!-- Card untuk konten dashboard -->
                  <div class="col-md-4">
                    <div class="card mb-2">
                      <div class="card-body">
                        <div class="dashboard-card-tittle">Transaksi</div>
                        <div class="dashboard-card-subtittle">{{ $transaksi }}</div>
                      </div>
                    </div>
                  </div>
                  <!-- akhir card content dashboard -->
                </div>
              </div>
            </div>
          </div>
@endsection
