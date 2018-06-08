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
								{{--@if(!is_null($user->phone))--}}
									{{--<span><i class="mdi mdi-phone phone-icon"></i>{{$user->phone }}</span> <br>--}}
								{{--@endif--}}
								{{--<span class="email green-text text-lowercase"><i class="mdi mdi-email email-icon"></i>{{$user->email }}</span> <br>--}}
								@if(!is_null($user->location()))
									<span class="location"><i class="mdi green-text mdi-map-marker map-icon">{{$user->location()}}</i></span><br>
								@endif
								@if(!is_null($user->primaryRole()))
									<span class="role"><i class="mdi mdi-briefcase role-icon"></i>{{$user->primaryRole()->name }}</span>
									<br>
								@endif
								@if(!is_null($user->secondaryRole()))
									<span class="role orange-text"><i class="mdi mdi-briefcase role-icon"></i>{{$user->secondaryRole()->name }}</span>
								@endif
							</div>
							<form action="{{ route('connections.view-profile',['username'=>$user->username])}}" method="post">
								@csrf
								<button  class="btn btn-default pull-right">{{ __('view') }}</button>
								<input name="id" type="hidden" value="{{$user->id}}">
								<input name="username" type="hidden" value="{{$user->username}}">
							</form>
						</div>
						<div class="bio alert alert-success">
							@if(!is_null($user->bio))
								<span><b class="grey-text">Bio</b></span>
							<p>{{$user->bio}}</p>
								@else
								<p class="grey-text">No Bio</p>
							@endif
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