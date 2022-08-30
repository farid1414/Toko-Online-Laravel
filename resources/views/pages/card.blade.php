@extends('layouts.app')

@section('tittle', 'Card | FaridPutraStore')

@section('content')
    <div class="page-content page-cart">
        <!-- section untuk breadcrumbs -->
        <section class="store-breadcrumbs" data-aos="fade-down">
            <div class="container">
                <div class="row">
                    @if ($message = Session::get('sukses'))
                        <div class="col-12">
                            <div class="alert alert-success alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                {{ $message }}
                            </div>
                        </div>
                    @elseif($message = Session::get('gagal'))
                        <div class="col-12">
                            <div class="alert alert-danger alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                {{ $message }}
                            </div>
                        </div>
                    @endif
                    <div class="col-12">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="/index.html">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Cart</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
        <!-- akhir section untuk breadcrumbs -->

        <!-- Section untuk store cart  -->

        <section class="store-cart">
            <div class="container">
                @if (Auth()->user() && $cards->count() > 0)
                    <div class="row" data-aos="fade-up" data-aos-delay="100">
                        <div class="col-12 mb-4">
                            <h2>Keranjang</h2>
                        </div>
                    </div>
                    <div class="row" data-aos="fade-up" data-aos-delay="150">
                        <div class="col-12 table-responsive col-table">
                            <table class="table table-borderless table-cart">
                                <thead>
                                    <tr>
                                        <th class="text-center">Produk</th>
                                        <th class="px-4">Nama Produk &amp Nama Toko</th>
                                        <th class="px-4">Kuantitas</th>
                                        <th>Harga</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $totalPrice = 0;
                                    @endphp
                                    @foreach ($cards as $card)
                                        <tr>
                                            <td style="width: 20%">
                                                <img src="{{ Storage::url($card->product->galleries->first()->photos) }}"
                                                    class="w-100 img-cart" alt="" />
                                            </td>
                                            <td style="width: 30%" class="px-4">
                                                <div class="product-tittle">{{ $card->product->name }}</div>
                                                <div class="product-toko">Raya Store</div>
                                            </td>
                                            <td style="width:20%" class="px-4 ">
                                                <div class="product-tittle">{{ $card->quantity }}</div>
                                            </td>
                                            <td style="width: 20%">
                                                <div class="product-tittle">@currency($card->product->price)
                                            </td>
                                            <td style="width: 20%" class="text-center">
                                                <form action="{{ route('delete-card', $card->id) }}" method="post">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit" class="btn btn-remove-cart"
                                                        onclick="confirm('apakah yakin untuk menghapus produk  {{ $card->product->name }}')">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @php
                                            $totalPrice += $card->product->price * $card->quantity;
                                        @endphp
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row" data-aos="fade-up" data-aos-delay="200">
                        <div class="col-12 mb-4">
                            <h2>Rincian Pengiriman</h2>
                        </div>
                    </div>
                    <form action="{{ route('checkout-card') }}" method="POST" id="locations" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="total_price" value="{{ $totalPrice }}">
                        <div class="row" data-aos="fade-up" data-aos-delay="200">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="alamatSatu">Alamat Lengkap</label>
                                    <input spellcheck="false" type="text" class="form-control" name="alamat"
                                        id="alamatSatu" value="Kemendung Cerme" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="catatanAlamat">Catatan Alamat</label>
                                    <textarea spellcheck="false" name="catatanAlamat" id="catatanAlamat" class="form-control" rows="3">Rumah warna hijau pagar hitam</textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="provinsi">Provinsi</label>
                                    <select name="provinces_id" id="provinces_id" class="form-control" v-if="provinces"
                                        v-model="provinces_id">
                                        <option v-for="province in provinces" :value="province.id">@{{ province.name }}
                                        </option>
                                    </select>
                                    <select v-else class="form-control"></select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="noTelp">No Telphone</label>
                                    <input spellcheck="false" type="number" class="form-control" name="noTelp"
                                        id="noTelp" value="08580547893" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="kota">Kota / Kabupaten</label>
                                    <select name="regencies_id" id="regencies_id" class="form-control" v-if="regencies"
                                        v-model="regencies_id">
                                        <option v-for="regency in regencies" :value="regency.id">@{{ regency.name }}
                                        </option>
                                    </select>
                                    <select v-else class="form-control"></select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="Kecamatan">Kecamatan</label>
                                    <select name="districs_id" id="districs_id" class="form-control" v-if="districs"
                                        v-model="districs_id">
                                        <option v-for="distric in districs" :value="distric.id">@{{ distric.name }}
                                        </option>
                                    </select>
                                    <select v-else class="form-control"></select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="kodePos">Kode Pos</label>
                                    <input spellcheck="false" type="text" class="form-control" name="kodePos"
                                        id="kodePos" value="61171" />
                                </div>
                            </div>
                        </div>
                        <div class="row" data-aos="fade-up" data-aos-delay="250">
                            <div class="col-12 mt-4 mb-4">
                                <h2>Rincian Pembayaran</h2>
                            </div>
                        </div>
                        <div class="row" data-aos="fade-up" data-aos-delay="300">
                            <div class="col-4 col-md-3 mb-3">
                                <div class="prodcut-tittle">Subtotal Produk</div>
                                <div class="product-toko">Rp {{ number_format($totalPrice ?? 0) }}</div>
                            </div>
                            <div class="col-4 col-md-2 mb-3">
                                <div class="prodcut-tittle">Subtotal Pengiriman</div>
                                <div class="product-toko">Rp 35.000</div>
                            </div>
                            <div class="col-4 col-md-2 mb-3">
                                <div class="prodcut-tittle">Total Diskon</div>
                                <div class="product-toko">Rp 1.000</div>
                            </div>
                            <div class="col-4 col-md-2 mb-3">
                                <div class="prodcut-tittle text-primary">Total Pembayaran</div>
                                <div class="product-toko">Rp {{ number_format($totalPrice ?? 0) }}</div>
                            </div>
                            <div class="col-8 col-md-3 mb-3">
                                {{-- <a href="" class="btn btn-store mt-2 px-4 btn-block">Beli</a> --}}
                                <button type="submit" class="btn btn-store mt-2 px-4 btn-block">Beli</button>
                            </div>
                        </div>
                    </form>
                @else
                    <div class="row" data-aos="fade-up" data-aos-delay="100">
                        <div class="col-12 justify-content-center text-center mt-4">
                            <h3>Anda Belum Memasukkan Belanja Ke Keranjang</h3>
                        </div>
                    </div>
                @endif

            </div>
        </section>
        <!-- Akhir Section untuk store cart  -->
    </div>
    <!-- Akhir page content  -->
@endsection


@push('addon-javascript')
    <script src="{{ asset('vendor/vue/vue.js') }}"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>
        var locations = new Vue({
            el: "#locations",
            mounted() {
                AOS.init();
                this.getProvinces();
            },
            data: {
                provinces: null,
                regencies: null,
                districs: null,
                provinces_id: null,
                regencies_id: null,
                districs_id: null
            },
            methods: {
                getProvinces() {
                    var self = this;
                    axios.get('{{ route('api-provinsi') }}')
                        .then(function(response) {
                            self.provinces = response.data;
                        })
                },
                getRegenciesData() {
                    var self = this;
                    axios.get('{{ url('api/regencies') }}/' + self.provinces_id)
                        .then(function(response) {
                            self.regencies = response.data;
                        })
                },
                getDistricsData() {
                    var self = this;
                    axios.get('{{ url('api/distric') }}/' + self.regencies_id)
                        .then(function(response) {
                            self.districs = response.data;
                        })
                },
            },
            // watch untuk mrlihat data ketika ada perubahan
            watch: {
                provinces_id: function(val, oldval) {
                    this.regencies_id =
                        null; //membuat null regencied atau kabupaten ketika ada perubahan provinsi
                    this.getRegenciesData(); //memanggil method data kabupate sesuai dengan perubahan provinsi
                },
                regencies_id: function(val, oldval) {
                    this.districs_id =
                        null; //membuat null regencied atau kabupaten ketika ada perubahan provinsi
                    this.getDistricsData(); //memanggil method data kabupate sesuai dengan perubahan provinsi
                }
            }
        })
    </script>
@endpush
