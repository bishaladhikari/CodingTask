<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{asset('css/font-awesome.css')}}" rel="stylesheet" type="text/css"/>
    <!-- Scripts -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
    <link href="{{asset('js/sweetalert/sweetalert.css')}}" rel="stylesheet">
    <script src="{{asset('js/sweetalert/sweetalert.min.js')}}"></script>

    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>

</head>
<body>

<div id="app">


    <nav class="navbar navbar-default navbar-static-top" style="border: none;">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right top-nav">
                    <!-- Authentication Links -->

                    <li><a href="#">About</a></li>
                    <li><a href="#">Blogs</a></li>
                    <li><a href="#">Contact us</a></li>

                </ul>
            </div>
        </div>
    </nav>
    @if (Session::has('message'))
        <div class="alert alert-green text-center" style="position:absolute;top:50px;width: 100%;
      /*background: #39b54a;*/
      color:white">{{ Session::get('message') }}</div>
    @endif

    @yield('content')
</div>

<!-- Scripts -->

{{--<script src="https://code.jquery.com/jquery-3.2.1.js"--}}
{{--integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="--}}
{{--crossorigin="anonymous"></script>--}}
@yield('page-scripts')

<script src="{{ asset('js/app.js') }}"></script>
<script>
    $('div.alert').delay(3000).slideUp(300);

</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js"></script>
@if(config('app.env') == 'local')
    <script src="http://localhost:35729/livereload.js"></script>
@endif
</body>
</html>
