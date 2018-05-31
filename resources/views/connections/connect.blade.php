@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<a href="{{route('connections.my-connections')}}" class="btn btn-secondary pull-right">My Connections
				<i class="mdi mdi-link"></i>
			</a>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12 card grey lighten-5">
			<div class="card-header teal white-text">
				Connect with Potential Co-founders
			</div>
			<div class="card-body">
				@forelse($users as $user)
					@if($user != auth()->user())
						<div class="connections">
							<div class="profileHeader alert alert-success">
								<img class="user-image pull-left" height="100px" width="100px" src="{{asset($user->imagePath())}}"></div>
							<div class="user-icons">
								<span class="teal-text"><b>{{$user->name() }}</b></span><hr>
								@if(!is_null($user->phone))
									<span><i class="mdi mdi-phone phone-icon"></i>{{$user->phone }}</span> <br>
								@endif
								<span class="email green-text text-lowercase"><i class="mdi mdi-email email-icon"></i>{{$user->email }}</span> <br>
								@if(!is_null($user->location()))
									<span class="location"><i class="mdi mdi-map-marker map-icon">{{$user->location()}}</i></span><br>
								@endif
								@if(!is_null($user->primaryRole()))
									<span class="role"><i class="mdi mdi-briefcase role-icon"></i>{{$user->primaryRole()->name }}</span>
								@endif
								@if(!is_null($user->secondaryRole()))
									<span class="role"><i class="mdi mdi-briefcase role-icon"></i>{{$user->secondaryRole()->name }}</span>
								@endif
								<input type="hidden" name="user_id" value="{{$user->username}}">
							</div> <a href="{{ route('connections.view-profile',['username'=>$user->username])}}"  class="btn btn-default pull-right">{{ __('view') }}</a>
						</div>
						<div class="bio alert alert-success">
							<p>this is a short description for this user this is a short description for this user this is a short description for this user this is a short description for
							</p>
						</div>

						<hr>
					@endif
				@empty
					<i class="mdi mdi-emoticon-sad no-connection"></i>
					<p class="center-align">Sorry, No one's home
					</p>
				@endforelse
			</div>
			<div class="card-footer"></div>
		</div><p>{{$users->appends($_GET)->links()}}</p>
	</div>
</div>
@endsection