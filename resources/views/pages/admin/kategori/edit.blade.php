@extends('layouts.admin')

@section('title', 'Kategori | FaridPutraStore')


@section('content')
          <div class="section-content dashboard-home" data-aos="fade-up">
            <div class="container-fluid">
              <div class="dashboard-heading">
                <h2 class="dashboard-tittle">Edit Kategori</h2>
                <p class="dashboard-subtittle">Ubah kategori </p>
              </div>
              <div class="dashboard-content">
                <div class="row">
                    <div class="col-md-12">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            
                        @endif
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('kategori.update', $kategori->id) }}" method="post" enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group row">
                                                <label class="col-sm-2">Nama Kategori</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="name" class="form-control" value="{{ $kategori->name }}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col">Photo Kategori {{ $kategori->name}}</label>
                                                    <img src="{{'/storage/'. $kategori->photo }}" style="max-height: 100px; margin-top20px;margin-bottom:25px;margin-left:10px" alt="">
                                                <input type="file" name="photo" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col text-right">
                                            <button type="submit" class="btn btn-success px-5 mt-4">Simpan</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
@endsection
