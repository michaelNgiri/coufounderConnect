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
				Ideas
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
					 <a style="padding:2px; border-radius: 4px; text-decoration: none;" class="pull-right white-text btn btn-outline-success" href="{{route('ideas.details.details', ['slug'=>$idea->slug])}}">View Details</a>
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
		</div><p style="float: right;" class="pull-right">{{$ideas->appends($_GET)->links()}}</p>
	</div>
</div>
@endsection
