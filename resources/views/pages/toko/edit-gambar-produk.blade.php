@extends('layouts.admin-toko')


@section('title', 'Edit Gambar Produk | FaridPutraStore')

@section('content')
    <div class="section-content dashboard-home" data-aos="fade-up">
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard-tittle">Edit Gambar Produk</h2>
                <p class="dashboard-subtittle">
                    Edit gambar produk anda dari sini
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
                                <form action="{{ route('toko-edit-gambar-produk', $galleri->id) }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="namaProduk">Nama Produk</label>
                                            </div>
                                        </div>
                                        {{-- <input type="hidden" name="products_id" value="{{ $produk->id }}"> --}}
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="namaProduk">
                                                    <h5>{{ $produk->name }}</h5>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="namaProduk">
                                                    Gambar produk
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <img src="{{ Storage::url($galleri->photos) }}" width="150px" alt="">
                                        </div>
                                        <div class="col-md-12 mt-3">
                                            <div class="form-group">
                                                <label for="Kategori">Edit Gambar Produk </label>
                                                <input type="file" name="photos" multiple="true" class="form-control" />
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
