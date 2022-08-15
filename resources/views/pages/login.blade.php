@extends('layouts.auth')

@section('tittle', 'Masuk | FaridPutraStore')

@section('content')
    <!-- Page content untuk login -->
    <div class="page-content page-auth">
        <div class="section-store-login" data-aos="fade-up">
            <div class="container">
                <div class="row align-items-center row-login">
                    <div class="col-lg-6 text-center">
                        <img src="image/png_logo.png" class="w-50 mb-4 mb-lg-none" alt="" />
                    </div>
                    <div class="col-lg-5 login">
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
                        @elseif ($message = Session::get('gagal'))
                            <div class="alert alert-danger alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                {{ $message }}
                            </div>
                        @endif
                        <h3>Belanja kebutuhan mu dengan cepat dan Mudah</h3>
                        <form action="{{ route('post-login') }}" method="post" class="mt-4">
                            @csrf
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" oninput="loginCek()" class="form-control w-100 " />
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" oninput="loginCek()" class="form-control w-100" />
                            </div>
                            <button type="submit" class="btn btn-block w-100 mt-3 mb-3"
                                style="background-color: #f3f3f3;color: rgba(177, 177, 177, 1)">
                                Masuk
                            </button>
                            <a href="{{ route('register') }}" class="btn btn-register btn-block w-100 mt-2">Daftar</a>
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
        function loginCek() {
            const submit = document.getElementsByClassName("login")[0].children[1].children[3];

            if (document.getElementsByName('email')[0].value.length > 1 && document.getElementsByName('password')[0].value
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
