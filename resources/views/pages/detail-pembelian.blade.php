@extends('layouts.app')

@section('tittle', 'Detail Pembelian  | FaridPutraStore')

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
                  <li class="breadcrumb-item active"><p>Detail Pembelian</p></li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </section>
      <!-- akhir section untuk breadcrumbs -->

      <!-- Section untuk gambar dan detail produk  -->
      <section class="section-detail-pembelian">
        <div class="container">
            <div class="row">
                  <div class="col-12">
                    <div class="card">
                      <div class="card-body">
                        <div class="row">
                          <div class="col-12 col-md-4">
                            <img
                              src="{{ asset('/image/milo.png') }}"
                              class="w-100 mb-2"
                              style="background-color: #ddd; border-radius: 8px"
                              alt=""
                            />
                          </div>
                          <div class="col-12 col-md-8">
                            <div class="row">
                              <div class="col-12 col-md-6">
                                <div class="produk-tittle">Nama Pembeli</div>
                                <div class="produk-subtittle">Putra</div>
                              </div>
                              <div class="col-12 col-md-6">
                                <div class="produk-tittle">Nama Produk</div>
                                <div class="produk-subtittle">
                                  Milo kemasan 250g
                                </div>
                              </div>
                              <div class="col-12 col-md-6">
                                <div class="produk-tittle">
                                  Tanggal Transaksi
                                </div>
                                <div class="produk-subtittle">
                                  20 April 2022
                                </div>
                              </div>
                              <div class="col-12 col-md-6">
                                <div class="produk-tittle">Status</div>
                                <div class="produk-subtittle text-danger">
                                  Pending
                                </div>
                              </div>
                              <div class="col-12 col-md-6">
                                <div class="produk-tittle">Total Biaya</div>
                                <div class="produk-subtittle">Rp 4.230.000</div>
                              </div>
                              <div class="col-12 col-md-6">
                                <div class="produk-tittle">No Telephone</div>
                                <div class="produk-subtittle">08785869547</div>
                              </div>
                              <div class="col-12 ">
                                <div class="produk-tittle">No Resi Barang anda</div>
                                <div class="produk-subtittle">NA190867AS</div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row" data-aos="fade-in">
                          <div class="col-12 mt-4">
                            <h5>Informasi Pengiriman</h5>
                          </div>
                          <div class="col-12 mt-4">
                            <div class="row">
                              <div class="col-12 col-md-6">
                                <div class="produk-tittle">Alamat Pembeli</div>
                                <div class="produk-subtittle">
                                  Kemendung Cerme
                                </div>
                              </div>
                              <div class="col-12 col-md-6">
                                <div class="produk-tittle">Catatan Alamat</div>
                                <div class="produk-subtittle">
                                  Rumah warna hijau pagar hitam
                                </div>
                              </div>
                              <div class="col-12 col-md-6">
                                <div class="produk-tittle">Kecamatan</div>
                                <div class="produk-subtittle">Cerme</div>
                              </div>
                              <div class="col-12 col-md-6">
                                <div class="produk-tittle">Kode Pos</div>
                                <div class="produk-subtittle">61171</div>
                              </div>
                              <div class="col-12 col-md-6">
                                <div class="produk-tittle">
                                  Kota / Kabupaten
                                </div>
                                <div class="produk-subtittle">Gresik</div>
                              </div>
                              <div class="col-12 col-md-6">
                                <div class="produk-tittle">Provinsi</div>
                                <div class="produk-subtittle">Jawa Timur</div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
        </div>
      </section>
      <!-- Akhir Section untuk review produk  -->
</div>
@endsection
