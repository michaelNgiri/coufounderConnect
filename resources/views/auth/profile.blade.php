@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <em style="font-size: 1em; color: grey; text-transform:capitalize; float: left;">{{Auth::user()->username()}}</em>
                    <p style="float: right;  padding-right: 48px;">Dashboard</p>
                </div>
                @auth
                <div class="card-body" style="text-align: center;">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="profileHeader alert alert-success">
                        <a style="color: #fff;" href="{{route('profile.update')}}">
                            <img height="120px" width="100px" style="border-radius: 10%;" src="{{asset(auth()->user()->imagePath())}}">
                        </a>
                        <a style="float: right;" href="{{route('profile.update')}}" class="teal-text mdi mdi-pencil" title="edit profile"></a>
                        @if(!Auth::user()->isVerified())
                        <hr>
                        <p class="alert-text alert-danger">
                            Your account is not yet verified, please check your email for the verification link
                        </p>
                        <a href="{{route('profile.resend-verification')}}" class="btn alert-danger">Resend Verification Link</a>
                        @endif
                        @if(!Auth::user()->profileUpdated())
                            <br>
                            <p class="alert alert-info" style="margin-top: 8px;">
                                {{Auth::user()->profileUpdateInfo()}}
                            </p>
                        @endif
                        <hr>
                        <span title="profile views" class="badge badge-success" disabled onclick="alert('this feature is available in premium mode only')">
                            <i style="color: #fff;" class="mdi mdi-eye">{{' '.'+'.'x'}}</i>
                        </span>
                        <a href="{{route('connections.requests')}}" title="connection requests">
                            @if($noOfConnectionRequests > 0)
                                <span class="badge badge-secondary">
                            <i style="color: #fff;" class="mdi mdi-link">{{' '.'+'.$noOfConnectionRequests}}</i>
                        </span>
                            @else
                                <span class="badge badge-secondary" title="connection requests">
                            <i style="color: #fff;" class="mdi mdi-link"></i>
                            </span>
                            @endif
                        </a>
                        <a href="{{route('messaging.messages')}}" title="messages">
                            @if($noOfMessages > 0)
                            <span class="badge badge-danger">
                                <i style="color: #fff;" class="mdi mdi-message">
                                    {{' '.'+'.$noOfMessages}}
                                </i>
                             </span>
                                @else
                                <span class="badge badge-light">
                                <i  class="mdi mdi-message"></i>
                                 </span>
                                @endif
                        </a>
                        <a href="" title="cofounder requests" disabled="disabled">
                            @if(Auth::user()->noOfPendingCofounderRequests()>0)
                                <span class="badge" style="background: orangered;">
                                <i style="color: #fff;" class="mdi mdi-group">
                                    {{' '.'+'.Auth::user()->noOfPendingCofounderRequests()}}
                                </i>
                             </span>
                            @else
                                <span class="badge" style="background: darkgray;">
                                <i  class="mdi mdi-group"></i>
                                 </span>
                            @endif
                        </a>
                        <br>

                        
                    </div>

                    <div class="profileDetails" style="text-align: left; color: #607d8b;"><hr>
                        <i style="font-size: 1em;" class="mdi mdi-face teal-text"></i>
                    <p>Name:<b> {{' '.Auth::user()->name()}} </b></p>
                    <p>Age:<b>{{' '.Auth::user()->age()}}</b></p>
                        <i style="font-size: 1em;" class="mdi mdi-home"></i>
                    <p>Address:<b>{{' '.Auth::user()->address}}</b></p>
                    <p>City:<b>{{' '.Auth::user()->city}}</b></p>
                    <p>Country of Residence:<b>{{' '.Auth::user()->country()}}</b></p>
                        <i style="font-size: 1em;" class="mdi mdi-timer"></i>
                     @if(!is_null(Auth::user()->availability()))
                    <p>Availability:<b>{{' '.Auth::user()->availability()->name.' '.'/week'}}</b></p>
                     @endif
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">
                                    <a style="color: #fff;" href="{{route('profile.update')}}">
                                        <i class="mdi mdi-update"></i>
                                    {{ __('Update Your Profile') }}</a>
                </button>
                @else
                <div class="card-body" style="text-align: center;">
                    please login to view your profile
                </div>
                @endauth
            </div>
        </div>
    </div>
</div>
    <script>
        document.ready(function () {
            location.reload();
        })
    </script>
@endsection
