@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8">
			<a href="{{route('connections.my-connections')}}" class="btn btn-secondary">My Connections
			<i class="mdi mdi-link"></i>
			</a>
		</div>
	</div>
	<div class="row">
		<div class="col-md-10 col-xs-10 card" style="background: #f3f3f3;">
			@forelse($users as $user)
			@if($user != auth()->user())
			<div class="cofounders" style="display: flex; padding-top: 8px;">
				<div class="profileHeader alert alert-success">
                <img style="float: left;" height="80px" width="100px" src="{{asset($user->imagePath())}}"></div>
			<div style="text-transform: capitalize; margin: 1em; border:2px grey;" class="">
				<span style="color: teal;"><b>{{$user->name() }}</b></span><br>
				<span style="color: #c6c6c6"><i class="mdi mdi-phone" style="color: blue;"></i>{{$user->phone }}</span> <br>
				<span style="color: darkblue;"><i class="mdi mdi-email" style="color:red;"></i>{{$user->email }}</span> <br>
				<span style="color: green;"><i class="mdi mdi-map-marker" style="color: orange;"></i></span><br>
				<span style="color: red;"><i class="mdi mdi-briefcase" style="color: grey;"></i>{{$user->role }}</span>
				<input type="hidden" name="user_id" value="{{$user->username}}">
			</div> <a href="{{ route('connections.view-profile',['username'=>$user->username])}}" style="float: right;"  class="btn btn-default">{{ __('view') }}</a>
			</div>
			<div class="bio alert alert-success">
				<p>this is a short description for this user this is a short description for this user this is a short description for this user this is a short description for
				</p>
			</div>

			<hr>
			@endif
			@empty
			<i style="font-size: 24px; text-align: center; color: red;" class="mdi mdi-emoticon-sad"></i>
			<p class="" style="text-align: center;">Sorry, No one's home
			</p>
			@endforelse
		</div><p>{{$users->appends($_GET)->links()}}</p>
	</div>
</div>
@endsection