@extends('layouts.admin-toko')

@section('title', 'Pengaturan Toko | FaridPutraStore')


@section('content')
 <!-- Section content untuk dashboard -->
<div class="section-content dashboard-home" data-aos="fade-up">
    <div class="container-fluid">
              <div class="dashboard-heading">
                <h2 class="dashboard-tittle">Pengaturan Toko</h2>
                <p class="dashboard-subtittle">
                  Atur dan kreasikan toko anda dengan mudah
                </p>
              </div>
              <div class="dashboard-content">
                <!-- page untuk trmasaksi terakhir  -->
                <div class="row">
                  <div class="col-12 mt-4">
                    <form action="">
                      <div class="card">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label>Nama Toko</label>
                                <input
                                  type="email"
                                  name=""
                                  class="form-control"
                                />
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="Kategori">Kategori</label>
                                <select class="form-control" id="Kategori">
                                  <option value="" disabled>
                                    Pilih Kategori
                                  </option>
                                </select>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label>Status Toko</label>
                                <p class="text-muted">Status toko saat ini</p>
                                <div
                                  class="custom-control custom-radio custom-control-inline"
                                >
                                  <input
                                    class="custom-control-input"
                                    type="radio"
                                    name="exampleRadios"
                                    id="exampleRadios1"
                                    value="option1"
                                  />
                                  <label
                                    class="custom-control-label"
                                    for="exampleRadios1"
                                  >
                                    Buka
                                  </label>
                                </div>
                                <div
                                  class="custom-control custom-radio custom-control-inline"
                                >
                                  <input
                                    class="custom-control-input"
                                    type="radio"
                                    name="exampleRadios"
                                    id="tutup"
                                    value="option1"
                                  />
                                  <label
                                    class="custom-control-label"
                                    for="tutup"
                                  >
                                    Tutup
                                  </label>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
                <!-- page untuk trmasaksi terakhir  -->
              </div>
        </div>
</div>
<!-- Akhir Section content untuk dashboard -->
@endsection
