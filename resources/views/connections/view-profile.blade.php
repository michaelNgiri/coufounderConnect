@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header teal-text pull-right">
                    <b>Profile View</b>
                </div>

                @auth
                <div class="card-body center-align">
                    <div class="profileHeader alert alert-success">
                        <img height="120px" width="100px" src="{{asset($user->imagePath())}}">
                       <!--  @if(!Auth::user()->isVerified())
                        <hr>
                        <p class="alert-text alert-danger">
                            Your account is not yet verified, please check your email for the verification link
                        </p>
                        <button class="btn alert-danger">Resend Verification Link</button>
                        @endif -->
                        <hr>
                        
                        <div class="connectionLinks inline" >
                            <a href="{{route('connections.connect',['id'=>$user->id, 'name'=>$user->name()])}}" class="btn btn-primary white-text">
                                <i class="mdi mdi-link red-text"></i>
                            {{ __('connect') }}
                        </a>
                            <a href="{{route('messaging.compose',['name'=>$user->name(), 'id'=>$user->id])}}" class="btn btn-primary white-text">
                                <i class="mdi mdi-message"></i>
                            {{ __('Message') }}
                        </a>
                             <a href="" class="btn btn-primary white-text" disabled>
                                <i class="mdi mdi-check-all"></i>
                            <!--  {{ __('Follow  ') }} -->
                         </a>
                        </div>
                        
                    </div>
                    <div class="profileDetails center-align"><hr>
                    <p><b>Name:</b> {{$user->name()}}</p>
                    <p><b>Address: {{$user->address}} </b></p>
                    <p><b>Age:</b></p>
                    <p><b>City:</b></p>
                    <p><b>Country of Residence:</b></p>
                    <p><b>Availability:</b></p>
                    </div>
                </div>

                @else
                <div class="card-body center-align">
                     <div class="profileHeader alert alert-success">
                        <img height="120px" width="100px" src="{{asset($user->imagePath())}}">
                    </div>
                    <div class="profileDetails center-align teal-text"><hr>
                    <b>{{$user->name()}}</b>
                    </div><hr>
                   <span class="black-text"> Register or Login to view this User's full profile</span>
                </div>
                @endauth
            </div>
        </div>
    </div>
</div>
@endsection

