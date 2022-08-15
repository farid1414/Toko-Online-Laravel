@extends('layouts.admin')

@section('title', 'Carousel | FaridPutraStore')


@section('content')
    <div class="section-content dashboard-home" data-aos="fade-up">
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard-tittle">Edit Carousel</h2>
                <p class="dashboard-subtittle">Ubah Carousel dari sini </p>
            </div>
            <div class="dashboard-content">
                <div class="row">
                    <div class="col-md-12">
                        @if ($message = Session::get('gagal'))
                            <div class="alert alert-danger alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                {{ $message }}
                            </div>
                        @endif
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('carousel.update', $carousel->id) }}" method="post"
                                    enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="col">Gambar Carousel</label>
                                                <img src="{{ '/storage/' . $carousel->photos }}"
                                                    style="max-height: 150px; margin-top20px;margin-bottom:25px;margin-left:10px"
                                                    alt="">
                                                <input type="file" name="photos" class="form-control">
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
