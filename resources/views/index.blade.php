@extends('layouts.assets')
@section('home_page')
    <style>
        .icon{
            width: 120px;
            height: 120px;
            border-radius: 60px;
            border: solid 1px #999;
            font-size: 30px;
            line-height: 120px;
            text-align: center;
            margin: 0 auto;
            color: #999;
        }
    </style>
<section>
    <div class="container"  style="background-size: cover; background-image:url('img/main-bg.jpg'); height: 40em; width: 100%; margin-top: 0em;">
        <div class="row">
            <div class="col-md-12 white-text center-align">
                <h1 data-animate="fadeInDown" style="color: teal;" class="teal-text center-align">KofoundMe!</h1>
                <p  class="message" data-animate="fadeInUp">A Paradigm shift...</p>

            </div>
        </div>
    </div>
</section>

{{--icons--}}
<section class="icons">
    <div class="container">
        <div class="row">
            <h2 class="title teal-text" style="text-align: center;" data-animate="fadeInDown">The KofoundME Advantage.</h2>

            <div class="row services">

                <div class="col-md-4" data-animate="fadeInUp">
                    <div class="icon"><i style="color: #009688; border: 60em;" class="mdi mdi-account-group"></i>
                    </div>
                    <h3 class="heading">Find new insights for your Ideas</h3>
                    <p>You have a great idea, see what others might think about it. </p>
                </div>

                <div class="col-md-4" data-animate="fadeInUp">
                    <div class="icon"><i style="color:red;" class="mdi mdi-link"></i>
                    </div>
                    <h3 class="heading">Find a Co-founder</h3>
                    <p>Every good idea needs people with the right skills,  We link you to the people you need to make your company succeed. </p>
                </div>

                <div class="col-md-4" data-animate="fadeInUp">
                    <div class="icon"><i style="color: #2ca02c;" class="mdi mdi-briefcase"></i>
                    </div>
                    <h3 class="heading">Showcase your Skills</h3>
                    <p>You have amazing skills, there are people looking for individuals just like you. Show your skills and be in demand. </p>
                </div>

            </div>
        </div>
    </div>
</section>

{{--join mail list--}}
{{--<section>--}}
        {{--<div class="container">--}}
            {{--<div class="row">--}}
                {{--<div class="col-md-6 col-md-offset-3 center-align" data-animate="fadeInUp">--}}
                    {{--<form action="#" method="post" id="frm-landingPage1" class="form">--}}
                        {{--<div class="input-group">--}}
                            {{--<p class="text-small">Join our mailing list.</p>--}}
                                {{--<input type="text" class="form-control" placeholder="your email address" name="email" id="frm-landingPage1-email" required value="">--}}
                                {{--<button class="btn btn-default pull-right" type="submit" value="Submit" name="_submit" id="frm-landingPage1-submit">SUBMIT</button>--}}

                        {{--</div>--}}
                        {{--<!-- /input-group -->--}}
                    {{--</form>--}}

                    {{----}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</section>--}}

@endsection




































{{--<!DOCTYPE html>--}}
{{--<html>--}}
{{--<head>--}}
    {{--<meta charset="utf-8">--}}
    {{--<meta http-equiv="X-UA-Compatible" content="IE=edge">--}}
    {{--<meta name="viewport" content="width=device-width, initial-scale=1">--}}

    {{--<!-- CSRF Token -->--}}
    {{--<meta name="csrf-token" content="{{ csrf_token() }}">--}}

    {{--<title>{{ config('app.name', 'KofoundME') }}</title>--}}

    {{--<!-- Fonts -->--}}

    {{--<link rel="stylesheet" type="text/css" href="{{ asset('css/app.css')}}">--}}
    {{--<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css')}}">--}}
    {{--<link rel="stylesheet" type="text/css" href="{{ asset('assets/mdi/css/materialdesignicons.css')}}">--}}
    {{--<link href="{{ asset('assets/mdi/fonts/materialdesignicons-webfont.eot') }}" rel="stylesheet">--}}
    {{--<link href="{{ asset('assets/mdi/fonts/materialdesignicons-webfont.svg') }}" rel="stylesheet">--}}
    {{--<link href="{{ asset('assets/mdi/fonts/materialdesignicons-webfont.ttf') }}" rel="stylesheet">--}}
    {{--<link href="{{ asset('assets/mdi/fonts/materialdesignicons-webfont.woff') }}" rel="stylesheet">--}}
    {{--<link href="{{ asset('assets/mdi/fonts/materialdesignicons-webfont.woff2') }}" rel="stylesheet">--}}
    {{--<link rel="dns-prefetch" href="https://fonts.gstatic.com">--}}
    {{--<link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">--}}
{{--</head>--}}
{{--<body>--}}





{{--<!-- Scripts -->--}}
{{--<script src="{{ asset('js/app.js') }}" defer></script>--}}
{{--<script src="{{ asset('js/app.js') }}" defer></script>--}}
{{--<script src="{{ asset('js/jquery3.3.1.min.js') }}" defer></script>--}}
{{--<script src="{{ asset('js/jquery.dropdown.min.js') }}" defer></script>--}}
{{--<script src="{{ asset('js/bootstrap.js') }}" defer></script>--}}
{{--</body>--}}
{{--</html>--}}