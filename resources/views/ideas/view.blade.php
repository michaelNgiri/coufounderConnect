@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-6 pull-left" >
			<a href="{{route('ideas.post-idea')}}" class="btn btn-secondary">Post your idea +</a>
		</div>
	</div>
	<div class="row">
		<div class="col-md-10 card">
			<div class="card-header teal white-text">
				View potential Co-founders
				{{--<a  href="{{route('ideas.my-idea')}}" class="btn btn-secondary pull-right">My Ideas</a>--}}
			</div>
			<div class="card-body">
				@forelse($ideas as $idea)
				<span>
				<fieldset class="idea-container" >
				<legend class="teal-text">{{$idea->title}}</legend>
				<img src="{{asset('img/profile-pictures/default.jpg')}}">
				<p></p>
				{{$idea->short_description}}
				<p>{{$idea->details}}</p><hr>
					@forelse($idea->ideaSkills() as $ideaSkill)
						<p class="teal-text"><i class="mdi mdi-briefcase materialize-red-text"></i>{{$ideaSkill->name}}</p>
					@empty
						<p>no skill specified</p>
					@endforelse
				@if(!is_null($idea->progress()))
                 <p class="teal-text">Progress: <br> </b><i class="mdi mdi-run"></i>{{$idea->progress()->name}}
                  <button class="btn btn-success pull-right">{{__('cofound this idea')}}</button>
				</p>
                @else
                    <p>No skill specified</p>
                @endif
				</fieldset></span>
				<hr>
				@empty
				<p class="">nothing here</p>
				@endforelse

			</div>
		</div><p>{{$ideas->appends($_GET)->links()}}</p>
	</div>
</div>
@endsection
