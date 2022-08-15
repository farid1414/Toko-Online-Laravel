@extends('layouts.admin-toko')

@section('title', 'Detail Transaksi | FaridPutraShop')

@section('content')
              <!-- Section content untuk dashboard -->
          <div class="section-content dashboard-home" data-aos="fade-up">
            <div class="container-fluid">
              <div class="dashboard-heading">
                <h2 class="dashboard-tittle">#STORE001</h2>
                <p class="dashboard-subtittle">Tramsaksi detail</p>
              </div>
              <div class="dashboard-content" id="transaksiDetail">
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
                                  Sofa panjang ternyaman
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
                            </div>
                          </div>
                        </div>
                        <div class="row">
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
                              <div class="col-12 col-md-3">
                                <div class="produk-tittle">Status</div>
                                <select
                                  name="status"
                                  id="status"
                                  class="form-control mt-1"
                                  v-model="status"
                                >
                                  <option value="UNPAID">Unpaid</option>
                                  <option value="PENDING">Pending</option>
                                  <option value="SHIPPING">Shipping</option>
                                  <option value="SUCCESS">Success</option>
                                </select>
                              </div>
                              <template v-if="status == 'SHIPPING'">
                                <div class="col-md-3">
                                  <div class="produk-tittle">Masukkan Resi</div>
                                  <input
                                    type="text"
                                    name="resi"
                                    class="form-control mt-1"
                                    id="resi"
                                    v-model="resi"
                                  />
                                </div>
                                <div class="col-md-2">
                                  <button
                                    type="submit"
                                    class="btn btn-success btn-block mt-4"
                                  >
                                    Update Resi
                                  </button>
                                </div>
                              </template>
                            </div>
                          </div>
                        </div>
                        <div class="row mt-4">
                          <div class="col-12 text-right">
                            <button type="submit" class="btn btn-success">
                              Simpan
                            </button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Akhir Section content untuk dashboard -->
</div>
<!-- Akhir Page content dashboard  -->
@endsection

@push('addon-javascript')
 <!-- java script untuk vue js -->
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.12/dist/vue.js"></script>
    <script>
      var detailTransaksi = new Vue({
        el: "#transaksiDetail",
        data: {
          status: "SHIPPING",
          resi: "NA190867AS",
        },
      });
    </script>
    <!-- Akhir java script untuk vue js -->
@endpush
