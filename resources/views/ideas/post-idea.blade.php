@extends('layouts.app')
@section('content')

	<div class="container">
		<!-- show status -->
		@if (session('error'))
		<div class="alert alert-warning">{{ session('error') }}</div>
		@elseif (session('success'))
		<div class="alert alert-success">{{ session('success') }}</div>
		@endif
		<form class="postIdeaForm" action="{{route('ideas.submit-idea')}}">
		<div class="row" style="color: teal;">
			<div class="col-md-10 card">
				<div class="card-header">
					<span>Post Your Idea, Let Cofounders look for you</span>
				</div>
				<div class="card-body">
				<label for="title">Title:</label>
				<input type="text" name="title" placeholder="Enter the name of the Idea">
				<label for="short_description">Descripton</label>
				<input type="text" name="short_description" placeholder="A short Description for your idea">
				<label for="details"></label>
				<textarea placeholder="A small Elavator pitch for your idea" name="details"></textarea>
				<label for="tags">Tags:</label>
				<input type="text" name="tags" placeholder="tags/keywords">
				
					@forelse($skills as $skill)
					<input type="checkbox" name="skill" id="{{$skill->id}}" value="{{$skill->name}}">
					@empty
					<p>No skill to choose from</p>
					@endforelse
				</div>
				<div class="card-footer">
					<button style="float: right;" class="btn" type="Submit">Submit</button>
				</div>
			</div>
		</div>
	</form>
	</div>

@endsection