@extends('layouts.admin-toko')

@section('title', 'Produk | FaridPutraShop')

@section('content')
    <div class="section-content dashboard-home" data-aos="fade-up">
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard-tittle">Produk Toko Saya</h2>
                <p class="dashboard-subtittle">
                    Lengakapi toko anda dengan mudah
                </p>
            </div>
            <div class="dashboard-content">
                <!-- button untuk tambah produk  -->
                <div class="row mt-2">
                    <div class="col-12">
                        <a href="{{ route('produk.create') }}" class="btn btn-success">Tambah Produk</a>
                    </div>
                </div>
                <!-- Akhir button untuk tambah produk  -->
                <!-- Card utuk produk  -->
                @php
                    $incrementProduk = 0;
                @endphp
                <div class="row mt-4">
                    {{-- @forelse ($produk as $produk)
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3" data-aos="fade-in"
                            data-aos-delay="{{ $incrementProduk += 100 }}">
                            <a href="{{ route('produk.show', $produk->slug) }}"
                                class="card card-dashboard-produk d-block">
                                <div class="card-body">
                                    <img src="{{ Storage::url($produk->galleries->first()->photos) }}"
                                        class="w-100 mb-3" style="min-height:150px;" />
                                    <div class="produk-tittle">{{ $produk->name }}</div>
                                    <div class="produk-price">Rp {{ $produk->price }}</div>
                                </div>
                            </a>
                        </div>
                    @empty
                        <div class="col text-center mt-4">
                            <h4>Produk Kosong</h4>
                        </div>
                    @endforelse --}}
                    <div class="col-md-12">
                        @if ($message = Session::get('gagal'))
                            <div class="alert alert-danger alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                {{ $message }}
                            </div>
                        @endif
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover scroll-horizontal-vertical w-100" id="crudTabelProduk">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Produk</th>
                                                <th>Kategori</th>
                                                <th>Gambar</th>
                                                <th>Harga</th>
                                                <th>Stock</th>
                                                <th>Deskripsi</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- Card utuk produk  -->
            </div>
        </div>
    </div>
@endsection

@push('addon-javascript')
    <script>
        var datatable = $('#crudTabelProduk').DataTable({
            processing: true,
            serverSide: true,
            ordering: true,
            ajax: {
                url: '{!! url()->current() !!}',
            },
            columns: [{
                    "data": null,
                    "sortable": false,
                    "searcable": false,
                    render: function(data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'categori.name',
                    name: 'categori.name',
                },
                {
                    data: 'photos',
                    name: 'photos',
                    orderable: false,
                    searcable: false,
                },
                {
                    data: 'price',
                    name: 'price',
                    render: $.fn.dataTable.render.number('.', ',', 0, 'Rp. ')
                },
                {
                    data: 'stock',
                    name: 'stock',
                },
                {
                    data: 'description',
                    name: 'description'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searcable: false,
                    width: '15%'
                },
            ]
        })
    </script>
@endpush
