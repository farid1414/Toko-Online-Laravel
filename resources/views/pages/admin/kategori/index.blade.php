@extends('layouts.admin')

@section('title', 'Kategori | FaridPutraStore')


@section('content')
          <div class="section-content dashboard-home" data-aos="fade-up">
            <div class="container-fluid">
              <div class="dashboard-heading">
                <h2 class="dashboard-tittle">Kategori</h2>
                <p class="dashboard-subtittle">look what you have made today</p>
              </div>
              <div class="dashboard-content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <a href="{{ route('kategori.create') }}" class="btn btn-primary mb-3">
                                Tambah Kategori
                                </a>
                                <div class="table-responsive">
                                    <table class="table table-hover scroll-horizontal-vertical w-100" id="crudTabel">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Nama</th>
                                                <th>Photo</th>
                                                <th>Slug</th>
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
              </div>
            </div>
          </div>
@endsection

@push('addon-javascript')
    <script>
        var datatable = $('#crudTabel').DataTable({
            processing:true,
            serverSide:true,
            ordering:true,
            ajax:{
                url: '{!! url()->current() !!}',
            },
            columns:[
                { data: 'id', name: 'id'},
                { data: 'name', name: 'name'},
                { data: 'photo', name: 'photo'},
                { data: 'slug', name: 'slug'},
                {
                    data: 'action',
                    name: 'action',
                    orderable:false,
                    searcable:false,
                    width:'15%'
                },
            ]
        })
    </script>
@endpush
