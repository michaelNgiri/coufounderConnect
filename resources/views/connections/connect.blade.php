@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-xs-10 card" style="background: #f3f3f3;">
			@forelse($users as $user)
			<div class="cofounders" style="display: flex; padding-top: 8px;">
				<div class="profileHeader alert alert-success">
                <img style="float: left;" height="80px" width="100px" src="{{asset('img/profile-pictures/default.jpg')}}"></div>
			<div style="text-transform: capitalize; margin: 1em; border:2px grey;" class="">
				<span style="color: teal;"><b>{{$user->name() }}</b></span><br>
				<span style="color: #c6c6c6"><i class="mdi mdi-phone" style="color: blue;"></i>{{$user->phone }}</span> <br>
				<span style="color: darkblue;"><i class="mdi mdi-email" style="color:red;"></i>{{$user->email }}</span> <br>
				<span style="color: green;"><i class="mdi mdi-map-marker" style="color: orange;"></i></span><br>
				<span style="color: red;"><i class="mdi mdi-briefcase" style="color: grey;"></i>{{$user->role }}</span>
			</div> <a href="{{ route('profile.view')}}" style="float: right;"  class="btn btn-default">{{ __('view') }}</a>
			</div>
			<div class="bio alert alert-success">
				<p>this is a short description for this user this is a short description for this user this is a short description for this user this is a short description for
				</p>
			</div>

			<hr>
			@empty
			<p class="grey">
				nothing here
			</p>
			@endforelse
		</div><p>{{$users->appends($_GET)->links()}}</p>
	</div>
</div>
@endsection