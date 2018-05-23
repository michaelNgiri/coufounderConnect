@extends('layouts.app')
@section('content')
<form class="profileUpdateForm" action="{{route('profile.save-update')}}" method="post" enctype="multipart/form-data">
	@csrf
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <em style="font-size: 1em; color: grey; text-transform:capitalize; float: left;">{{Auth::user()->username()}}</em>
                    <p style="float: right;  padding-right: 48px;">Profile Update</p>
                </div>

                @auth
                <div class="card-body" style="text-align: center;">                   

                    <div class="profileHeader alert alert-success">
                        <img height="80px" width="100px" src="{{asset(auth()->user()->imagePath())}}">
                       <!--  @if(!Auth::user()->isVerified())
                        <hr>
                        <p class="alert-text alert-danger">
                            Your account is not yet verified, please check your email for the verification link
                        </p>
                        <button class="btn alert-danger">Resend Verification Link</button>
                        @endif -->
                        <hr>
                        
                        <p>
                        	<label for="avatar">Choose a new picture</label>
                        	<input type="file" name="avatar" value="Change profile photo"><br>
                            <button type="submit" class="btn btn-primary">{{ __('Upload') }}</button>
                        </p>
                        
                    </div>
                    <div class="profileDetails" style="text-align: left;"><hr>
                   <span><b>Name:</b><input type="text" name="" placeholder="{{Auth::user()->name()}}"></span>
                    <span><b>Address:</b><input type="text" name="" placeholder="{{Auth::user()->Address}}"></span>
                    <span><b>Age:</b><input type="date" name="" placeholder="{{Auth::user()->city}}"></span>
                    <span><b>City:</b><input type="text" name="city"></span>
                    <span><b>Country of Residence:</b><input type="text" name="nationality" placeholder=""></span>
                    <span><b>AVailability:</b><input type="text" name="AVailability"></span>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">{{ __('Update Your Profile') }}</button>
                @else
                <div class="card-body" style="text-align: center;">
                    please login to update your profile
                </div>
                @endauth
            </div>
        </div>
    </div>
    </div>
</form>
@endsection