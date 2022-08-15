@extends('layouts.succes')

@section('tittle', 'Success | FaridPutraStore')


@section('content')
     <!-- content untuk halaman sukses ketika checkout dan login  -->
    <div class="page-content page-success">
      <div class="section-success" data-aos="zoom-in">
        <div class="container">
          <div class="row align-items-center row-login justify-content-center">
            <div class="col-lg-6 text-center">
              <img src="{{ asset ('/image/png_logo.png') }}" class="mb-4" />
              <h2>Selamat Datang di PutraStore</h2>
              <p>
                Pusat toko Online terlengkap dan terpercaya dengan pengiriman
                yang super kilat, nikmati gratis ongkir serta selamat berbelanja
              </p>
              <div>
                <a href="" class="btn btn-success w-50 mt-4">Profil Saya</a>
                <a href="/" class="btn btn-signup w-50 mt-2">Kembali Belanja</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Akhir content untuk halaman sukses ketika checkout dan login  -->
@endsection
