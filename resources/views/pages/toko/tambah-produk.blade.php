@extends('layouts.admin-toko')


@section('title', 'Tambah Produk | FaridPutraStore')

@section('content')
    <div class="section-content dashboard-home" data-aos="fade-up">
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard-tittle">Produk Toko</h2>
                <p class="dashboard-subtittle">
                    Lengkapi dan Tambahkan produk untuk toko anda
                </p>
            </div>
            <div class="dashboard-content">
                <!-- page untuk trmasaksi terakhir  -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    {{-- </div> --}}
                @elseif ($message = Session::get('gagal'))
                    <div class="alert alert-danger alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        {{ $message }}
                    </div>
                @endif
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('produk.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="namaProduk">Nama Produk</label>
                                                <input spellcheck="false" type="text" class="form-control" name="name"
                                                    id="namaProduk" value="{{ old('name') }}" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="hargaProduk">Harga Produk</label>
                                                <input spellcheck="false" type="number" class="form-control" name="price"
                                                    id="hargaProduk" value="{{ old('price') }}" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="Kategori">Kategori Produk</label>
                                                <select class="form-control" name="categories_id" id="Kategori">
                                                    <option selected>
                                                        --Pilih Kategori--
                                                    </option>
                                                    @foreach ($categori as $categori)
                                                        <option value="{{ $categori->id }}">{{ $categori->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="Kategori">Kondisi Produk</label>
                                                <select class="form-control" name="condition" id="Kategori">
                                                    <option value="" disabled>
                                                        Pilih Kategori
                                                    </option>
                                                    <option value="baru">Baru</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="Kategori">Gambar Produk</label>
                                                <input type="file" name="photos[]" multiple="true" class="form-control" />
                                                <small class="text-muted">Anda dapat menambahkan maksimal 4
                                                    gambar</small>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="stockProduk">Stock Produk</label>
                                                <input spellcheck="false" type="number" class="form-control" name="stock"
                                                    id="stockProduk" value="{{ old('stock') }}" />
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="Kategori">Deskripsi Produk</label>
                                                <textarea name="description">{!! old('description') !!}</textarea>
                                            </div>
                                        </div>
                                        <div class="col text-right mt-4 mb-3">
                                            <button type="submit" class="btn btn-success px-4">
                                                Simpan Produk
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- page untuk trmasaksi terakhir  -->
            </div>
        </div>
    </div>
@endsection

@push('addon-javascript')
    <!-- Java script untuk CK Editor -->
    <script src="https://cdn.ckeditor.com/4.18.0/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace("description");
    </script>
    <!-- Akhir Java script untuk CK Editor -->
@endpush
