<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>@yield('tittle')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="{{ asset('/image/logo.svg')  }}" rel="shortcut icon" />

    {{-- include Style css --}}
    @include('includes.style')

  </head>

  <body>
    <!-- navbar -->
    @include('includes.navbar')
    <!-- akhir navbar -->

    <!-- page content carousel  -->
    @yield('content')
    <!-- Akhir page content carousel  -->

    <!-- footer -->
    @include('includes.footer');
    <!--  footer -->

    <!-- Java script main -->
    @include('includes.script');

    @stack('addon-javascript')
  </body>
</html>