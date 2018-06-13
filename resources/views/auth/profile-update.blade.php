@extends('layouts.app')
@section('content')

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
                                <img height="80px" width="100px" style="border-radius: 10%;" src="{{asset(auth()->user()->imagePath())}}">
                            <!--  @if(!Auth::user()->isVerified())
                                <hr>
                                <p class="alert-text alert-danger">
                                    Your account is not yet verified, please check your email for the verification link
                                </p>
                                <button class="btn alert-danger">Resend Verification Link</button>
@endif -->
                                <hr>

                                <form action="{{route('profile.save-image')}}" class="form-horizontal form-group" method="post" role="form" enctype="multipart/form-data">
                                    @csrf
                                    <p>
                                        <label for="avatar">Choose a new picture<i title="important" class="badge badge-info">!</i></label>
                                        <input class="form-control" type="file" name="avatar"><br>
                                        <button type="submit" class="btn btn-primary">{{ __('Upload') }}</button>
                                    </p>
                                </form>

                            </div>
             <form class="form-group" action="{{route('profile.save-update')}}" method="post" enctype="multipart/form-data">
                 @csrf
               <div class="profileDetails col-form-label-lg" style="text-align: left;">
                                <hr>
                     <span>
                       <label for="first_name"><b>Last Name</b></label>
                       <input type="text" name="first_name" placeholder="{{Auth::user()->last_name}}">
                     </span>
                   <span>
                       <label for="last_name"><b>First Name</b></label>
                       <input type="text" name="last_name" placeholder="{{Auth::user()->first_name}}">
                   </span>
                   <span>
                        <label for="date_of_birth"><b>Birthday<i title="important" class="badge badge-info">!</i></b></label>
                        <input type="date" name="date_of_birth" placeholder="{{Auth::user()->date_of_birth}}">
                   </span>
                   <span>
                        <label for="bio"><b>A short bio about you<i title="important" class="badge badge-info">!</i></b></label>
                        <textarea name="bio" id="bio" cols="60" rows="10"></textarea>
                   </span>
                   <span>
                        <label for="address"><b>Street Address<i title="important" class="badge badge-info">!</i></b></label>
                        <input type="text" name="" placeholder="{{Auth::user()->Address}}">
                   </span>
                   <span>
                        <label for="city"><b>City<i title="important" class="badge badge-info">!</i></b></label>
                        <input type="text" name="city">
                   </span>
                   <span>
                         <label for="phone"><b>Phone No</b></label>
                         <input type="tel" name="phone">
                   </span>
                   <span>
                        <label for="primary_role"><b>Primary Role<i title="important" class="badge badge-info">!</i></b></label>
                        <select name="primary_role" id="role" class="form-control">
                            <option value="">Choose your Primary role</option>
                            @forelse($skills as $skill)
                                <option value="{{$skill->id}}">{{$skill->name}}</option>
                            @empty
                                <option value="">No available Skill to choose from</option>
                            @endforelse
                        </select>
                   </span>

                   <span>
                        <label for="secondary_role"><b>Secondary Role</b></label>
                        <select name="secondary_role" id="role" class="form-control">
                            <option value="">Choose a secondary role if applicable</option>
                            @forelse($skills as $skill)
                                <option value="{{$skill->id}}">{{$skill->name}}</option>
                            @empty
                                <option value="">No available Skill to choose from</option>
                            @endforelse
                        </select>
                   </span>
                   <span>
                    <label for="country"><b>Country of Residence<i title="important" class="badge badge-info">!</i></b></label>
                    <select name="country" class="form-control" data-live-search="true">
                        <option value="">Select your Country</option>
                        @forelse($countries as $country)
                            <option value="{{$country->id}}">{{$country->name}}</option>
                            @empty
                            <option value="">null</option>
                        @endforelse
                    </select>
                    </span>       <br>
                    <span>
                         <label for="availability"><b>Availability<i title="important" class="badge badge-info">!</i></b></label>
                         <select name="availability" id="availability" class="form-control"
                                        data-live-search="true">
                                    <option value="">Number of hours you are available per week</option>
                                    @forelse($availabilities as $availability)
                                        <option value="{{$availability->id}}">{{$availability->name}}</option>
                                        @empty
                                        <p value="">null</p>
                                    @endforelse
                         </select>
                    </span>
              </div>
                 <button type="submit" class="btn btn-primary">{{ __('Save updates') }}</button>
             </form>
        </div>

                        @else
                            <div class="card-body" style="text-align: center;">
                                please login to update your profile
                            </div>
                            @endauth
                    </div>
                </div>
            </div>
        </div>

@endsection