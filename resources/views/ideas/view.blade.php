@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8">
			<a href="{{route('ideas.post-idea')}}" class="btn btn-secondary">Post your idea +</a>
		</div>
	</div>
	<div class="row">
		<div class="col-md-10 card">
			<div class="card-header">
				View potential Cofounders
			</div>
			<div class="card-body">
				@forelse($ideas as $idea)
				<span>
				<fieldset style="border: 1px solid teal; text-transform: capitalize; border-radius: 8px;">
				<legend style="color: teal;">{{$idea->title}}</legend>
				<img src="{{asset('img/profile-pictures/default.jpg')}}">	
				<p></p>
				{{$idea->short_description}}
				<p>{{$idea->details}}</p>
				</fieldset></span>
				<hr>
				@empty
				<p class="">nothing here</p>
				@endforelse
				
			</div>
		</div>
	</div>
</div>
@endsection