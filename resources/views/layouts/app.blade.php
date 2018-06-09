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

	<!-- <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css')}}"> -->
	<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/mdi/css/materialdesignicons.css')}}">
    <link href="{{ asset('assets/mdi/fonts/materialdesignicons-webfont.eot') }}" rel="stylesheet">
    <link href="{{ asset('assets/mdi/fonts/materialdesignicons-webfont.svg') }}" rel="stylesheet">  
    <link href="{{ asset('assets/mdi/fonts/materialdesignicons-webfont.ttf') }}" rel="stylesheet">  
    <link href="{{ asset('assets/mdi/fonts/materialdesignicons-webfont.woff') }}" rel="stylesheet">
    <link href="{{ asset('assets/mdi/fonts/materialdesignicons-webfont.woff2') }}" rel="stylesheet">  
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <style>
        .warning{
            float: right;
        }
        .success{
float: right;
}
.info{
float: left;
}
</style>
<!-- Styles -->
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
@section('styles')
@parent

@endsection
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel" style="background: #f3f3f3; color: teal; ">
            <div class="container">
                <a class="navbar-brand" href="{{route('home')}}">
                    <b class="teal-text">KofoundME</b>
                    {{--<img height="30px" width="40px" style="border-radius: 10%" src="{{ asset('img/logo.png') }}">--}}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-link">
                                <a active style="color: teal;" href="{{route('connections.index')}}">
                                    {{--<i class="mdi mdi-link"></i>--}}
                                    Connect</a>
                            </li>
                            <li class="nav-link">
                                <a style="color: teal;" href="{{ route('ideas.idea')}}">Ideas</a>
                            </li>
                            <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                            <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                            @else
                                <li class="nav-link">
                                    <a active style="color: teal;" href="{{route('messaging.messages')}}">Messaging</a>
                                </li>
                                <li class="nav-link">
                                    <a disabled active style="color: teal;" href="{{route('discussions.index')}}">Discuss</a>
                                </li>
                                <li class="nav-link">
                                    <a active style="color: teal;" href="{{route('connections.index')}}">Connect</a>
                                </li>
                                <li class="nav-link">
                                    <a style="color: teal;" href="{{ route('ideas.idea')}}">Ideas</a>
                                </li>

                                <li class="nav-item dropdown">
                                    <a style="text-transform: capitalize;" id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->first_name }} <span class="caret"></span>
                                    </a>

                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                                <li class="nav-link">
                                    <a style="color: teal;" href="{{ route('profile.view')}}">
                                        <img height="40px" width="60px" style="border-radius: 50%;" src="{{asset(auth()->user()->imagePath())}}">
                                    </a>
                                </li>


                                @endguest
                    </ul>
                </div>
            </div>
        </nav>
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
    <script src="{{ asset('js/app.js') }}" defer></script>
	<script src="{{ asset('js/jquery3.3.1.min.js') }}" defer></script>
    <script src="{{ asset('js/jquery.dropdown.min.js') }}" defer></script>
	<script src="{{ asset('js/bootstrap.js') }}" defer></script>
</body>
</html>
