@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <em style="font-size: 1em; color: grey; text-transform:capitalize; float: left;"></em>
                    <p style="float: right;  padding-right: 48px;">Profile View</p>
                </div>

                @auth
                <div class="card-body" style="text-align: center;">
                    <!-- @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif -->


                    <div class="profileHeader alert alert-success">
                        <img height="120px" width="100px" src="{{asset(auth()->user()->imagePath())}}">
                       <!--  @if(!Auth::user()->isVerified())
                        <hr>
                        <p class="alert-text alert-danger">
                            Your account is not yet verified, please check your email for the verification link
                        </p>
                        <button class="btn alert-danger">Resend Verification Link</button>
                        @endif -->
                        <hr>
                        
                        <div class="connectionLinks" style="display: inline;">
                            <a style="color: #fff;" href="{{route('connections.connect')}}" class="btn btn-primary">
                                <i style="color: red;" class="mdi mdi-link"></i>
                            {{ __('connect') }}
                        </a>
                            <a style="color: #fff;" href="{{route('messaging.messages')}}" class="btn btn-primary">
                                <i class="mdi mdi-message"></i>
                            {{ __('Message') }}
                        </a>
                             <a style="color: #fff;" href="}" class="btn btn-primary">
                                <i class="mdi mdi-check-all"></i>
                            <!--  {{ __('Follow  ') }} -->
                         </a>
                        </div>
                        
                    </div>
                    <div class="profileDetails" style="text-align: left;"><hr>
                    <p><b>Name:</b> {{$user->name()}}</p>
                    <p><b>Address: {{$user->address}} </b></p>
                    <p><b>Age:</b></p>
                    <p><b>City:</b></p>
                    <p><b>Country of Residence:</b></p>
                    <p><b>AVailability:</b></p>
                    </div>
                </div>

                @else
                <div class="card-body" style="text-align: center;">
                     <div class="profileHeader alert alert-success">
                        <img height="120px" width="100px" src="{{asset($user->imagePath())}}">
                    </div>
                    <div class="profileDetails" style="text-align: center;"><hr>
                    <b style="color: teal;">{{$user->name()}}</b>
                    </div><hr>
                   <span style="color: blue;"> Register or Login to view this User's full profile</span>
                </div>
                @endauth
            </div>
        </div>
    </div>
</div>
@endsection

