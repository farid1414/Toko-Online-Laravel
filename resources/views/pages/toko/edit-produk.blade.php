@extends('layouts.admin-toko')

@section('title', 'Edit produk | FaridPutraStore')


@section('content')
    <div class="section-content dashboard-home" data-aos="fade-up">
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard-tittle">{{ $produk->name }}</h2>
                <p class="dashboard-subtittle">Produk detail</p>
            </div>
            <div class="dashboard-content">
                <!-- page untuk trmasaksi terakhir  -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('produk.update', $produk->id) }}" method="post">
                                    @method('PUT')
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="namaProduk">Nama Produk</label>
                                                <input spellcheck="false" type="text" class="form-control" name="name"
                                                    id="namaProduk" value="{{ $produk->name }}" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="hargaProduk">Harga Produk</label>
                                                <input spellcheck="false" type="number" class="form-control" name="price"
                                                    id="hargaProduk" value="{{ $produk->price }}" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="stockProduk">Stock Produk</label>
                                                <input spellcheck="false" type="number" class="form-control" name="stock"
                                                    id="stockProduk" value="{{ $produk->stock }}" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="Kategori">Kondisi Produk</label>
                                                <select class="form-control" id="Kategori">
                                                    <option value="baru" selected>
                                                        Baru
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="Kategori">Kategori Produk</label>
                                                <select class="form-control" name="categories_id" id="Kategori">
                                                    {{-- <option value="{{ $produk->categories_id }}" selected>
                                                        {{ $produk->categori->name }}</option> --}}
                                                    @foreach ($categories as $categori)
                                                        <option value="{{ $categori->id }}"
                                                            @if ($categori->id === $produk->categories_id) selected @endif>
                                                            {{ $categori->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="Kategori">Deskripsi Produk</label>
                                                <textarea name="description">{!! $produk->description !!}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-success btn-block">
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
                <div class="row mt-3 mb-3">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    @foreach ($produk->galleries as $galleri)
                                        <div class="col-md-3 mb-2">
                                            <div class="gallery-container">
                                                <img src="{{ '/storage/' . $galleri->photos }}"
                                                    class="w-100 produk-gallery" alt="" />
                                                {{-- <input type="file" style="display: none" name="photos" id="photo">
                                                <a href="" class="edit-gallery"><img src="/image/edit.svg" --}}
                                                {{-- class="w-100" alt="" onclick="thisFileEdit()" /></a> --}}
                                                <a href=" {{ route('toko-show-gambar-produk', $galleri->id) }}"
                                                    class="edit-gallery "><img src="/image/edit.svg" class="w-100"
                                                        alt="" /></a>
                                                <form action="{{ route('toko-hapus-gambar', $galleri->id) }}"
                                                    method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit" class="delete-gallery"
                                                        style="border:none;background:none;"
                                                        onclick="return confirm('Apakah anda yakin untuk menghapus gambar produk ini??')"><img
                                                            src="/image/hapus.svg" class="w-100" alt=""></button>
                                                </form>
                                            </div>
                                        </div>
                                    @endforeach
                                    <div class="col-md-12 mb-2">
                                        {{-- <form action="{{ route('toko-edit-gambar', $produk->id) }}" method="post"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <input type="file" name="photos[]" id="file" style="display: none"
                                                multiple="true" />
                                            <button class="btn btn-secondary btn-block mt-3" type="submit"
                                                onclick="thisFileUpload()">
                                                Tambah Foto Produk
                                            </button>
                                        </form> --}}
                                        {{-- route untuk pergi ke edit gambar --}}
                                        {{-- {{ route('toko-show-gambar-produk', $produk->slug) }} --}}
                                        <a href="" class="btn btn-secondary btn-block mt-3" data-toggle="modal"
                                            data-target="#exampleModal">Tambah Gambar
                                            Produk</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- modal --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Gambar Produk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('toko-store-gambar-produk', $produk->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="namaProduk">Nama Produk</label>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="namaProduk">
                                        <h5>{{ $produk->name }}</h5>
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-12 mt-3">
                                <div class="form-group">
                                    <label for="Kategori">Gambar Produk untuk {{ $produk->name }}</label>
                                    <input type="file" name="photos[]" multiple="true" class="form-control" />
                                    <small class="text-muted">Anda dapat menambahkan maksimal 4
                                        gambar</small>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                    <button type="submit" class="btn btn-success px-4">Simpan Gambar</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    {{-- akhir untuk modal --}}
@endsection

@push('addon-javascript')
    <!-- Akhir link java script animasi dengan AOS -->
    <!-- Java script untuk CK Editor -->
    <script src="https://cdn.ckeditor.com/4.18.0/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace("description");
    </script>
    <!-- Akhir Java script untuk CK Editor -->
    <!-- Script untuk tambah foto fi button tambah foto produk -->
    <script>
        function thisFileUpload() {
            document.getElementById("file").click();
        }

        function thisFileEdit() {
            document.getElementById("photo").click();
        }
    </script>
    <!-- Script untuk tambah foto fi button tambah foto produk -->
@endpush
