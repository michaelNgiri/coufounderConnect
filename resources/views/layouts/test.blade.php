<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'KofoundME') }}</title>

    <!-- Fonts -->

    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('mdi/css/materialdesignicons.css')}}">
    <link href="{{ asset('assets/mdi/fonts/materialdesignicons-webfont.eot') }}" rel="stylesheet">
    <link href="{{ asset('assets/mdi/fonts/materialdesignicons-webfont.svg') }}" rel="stylesheet">
    <link href="{{ asset('assets/mdi/fonts/materialdesignicons-webfont.ttf') }}" rel="stylesheet">
    <link href="{{ asset('assets/mdi/fonts/materialdesignicons-webfont.woff') }}" rel="stylesheet">
    <link href="{{ asset('assets/mdi/fonts/materialdesignicons-webfont.woff2') }}" rel="stylesheet">
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @section('styles')
        @parent

    @endsection
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">Disabled</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>
<div class="container">
    <div class="row">
        <div class="col-md-8">

        </div>
    </div>
</div>
    @yield('home_page')
    <main class="py-2">

        <div class="alert container">
            <div class="row">
                <div class="col-md-12">
                    @if(isset($success))
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong style="float:right;" class="success alert alert-success">{{$success}}</strong>
                    @elseif(isset($warning))
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong style="float:right;" class="warning alert alert-danger">{{$warning}}</strong>
                    @endif
                </div>
                @if(isset($info))
                    <div class="col-md-12">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong style="float:right;" class="info alert alert-warning">{{ $info }}</strong>
                    </div>
                @endif
            </div>
        </div>

        @yield('content')
    </main>
</div>
@yield('test')

@section('scripts')
    @parent

@endsection
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>
<script src="{{ asset('js/jquery3.3.1.min.js') }}" defer></script>
<script src="{{ asset('js/jquery.dropdown.min.js') }}" defer></script>
<script src="{{ asset('js/bootstrap.js') }}" defer></script>
{{--<script src="{{ asset('js/app.js') }}" defer></script>--}}
{{--<script src="{{ asset('js/app.js') }}" defer></script>--}}
{{--<script src="{{ asset('js/jquery3.3.1.min.js') }}" defer></script>--}}
{{--<script src="{{ asset('js/jquery.dropdown.min.js') }}" defer></script>--}}
{{--<script src="{{ asset('js/bootstrap.js') }}" defer></script>--}}
</body>
</html>
