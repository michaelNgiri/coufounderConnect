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
                        <img height="120px" width="100px" src="{{asset(auth()->user()->imagePath())}}">
                        @if(!Auth::user()->isVerified())
                        <hr>
                        <p class="alert-text alert-danger">
                            Your account is not yet verified, please check your email for the verification link
                        </p>
                        <a href="{{route('connections.verify-email')}}}" class="btn alert-danger">Resend Verification Link</a>
                        @endif
                        <hr>
                        
                        <a style="color: #fff;" href="{{route('profile.update')}}">
                            <button type="submit" class="btn btn-primary">{{ __('Change Profile Picture') }}</button>
                        </a>
                        
                    </div>
                    <div class="profileDetails" style="text-align: left;"><hr>
                    <p><b>Name:</b> {{Auth::user()->name()}} </p>
                    <p><b>Address:</b></p>
                    <p><b>Age:</b></p>
                    <p><b>City:</b></p>
                    <p><b>Country of Residence:</b></p>
                    <p><b>AVailability:</b></p>
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
@endsection
