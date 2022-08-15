@extends('layouts.auth')

@section('tittle', 'Daftar | FaridPutraStore');

@section('content')
    <!-- Page content untuk login -->
    <div class="page-content page-auth">
        <div class="section-store-login" data-aos="fade-up">
            <div class="container">
                <div class="row align-items-center justify-content-center row-login">
                    <div class="col-lg-4 store-register">
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
                        <h3 class="text-center">Daftar Sekarang</h3>
                        <div class="store-masuk text-center">
                            Sudah punya akun PutraShop ? <a href="{{ route('login') }}">Masuk</a>
                        </div>
                        <form action="{{ route('post-regis') }}" method="post" class="mt-4">
                            @csrf
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" name="name" oninput="registerCek()" class="form-control"
                                    autofocus />
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" oninput="registerCek()" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" oninput="registerCek()" class="form-control" />
                            </div>
                            <button type="submit" class="btn btn-block mt-4 mb-3"
                                style="background-color: #f3f3f3;color: rgba(177, 177, 177, 1)">
                                Daftar
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir Page content untuk login -->

@endsection

@push('addon-javascript')
    <script>
        function registerCek() {
            const submit = document.getElementsByClassName("store-register")[0].children[2].children[4];

            if (document.getElementsByName('name')[0].value.length > 1 && document.getElementsByName('email')[0].value
                .length > 1 && document.getElementsByName('password')[0].value
                .length >= 6) {
                submit.style.backgroundColor = "green";
                submit.style.color = "white";
            } else {
                submit.style.backgroundColor = "#f3f3f3";
                submit.style.color = "rgba(177, 177, 177, 1)";
            }
        }
    </script>
@endpush
