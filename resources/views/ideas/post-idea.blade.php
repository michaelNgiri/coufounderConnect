@extends('layouts.app')
@section('content')

	<div class="container">
		<!-- show status <p id="test" onclick="test()">test</p> -->
		@if (session('error'))
		<div class="alert alert-warning">{{ session('error') }}</div>
		@elseif (session('success'))
		<div class="alert alert-success">{{ session('success') }}</div>
		@endif
		@auth
		<form class="postIdeaForm" action="{{route('ideas.submit-idea')}}">
		<div class="row teal-text">
			<div class="col-md-10 card">
				<div class="card-header teal white-text">
					<span>Post Your Idea, Let Cofounders look for you</span>
				</div>
				<div class="card-body">
				<label for="title">Title<i title="required" class="badge badge-danger">!</i>:</label>
				<input type="text" name="title" placeholder="Enter the name of the Idea">
				<label for="short_description">Descripton<i title="required" class="badge badge-danger">!</i></label>
				<input type="text" name="short_description" placeholder="A short Description for your idea">
				<label for="details"><i title="required" class="badge badge-danger">!</i></label>
				<textarea class="" placeholder="A small Elavator pitch for your idea" name="details"></textarea>
				<label for="tags">Tags:</label>
				<input type="text" name="tags" placeholder="tags/keywords">

					{{--<div class="post-form">--}}
						{{--<div class="dropdown-mul-1">--}}
							{{--<select style="display:none"  name="skills[]" id="skills" multiple placeholder="Select a skill">--}}
								{{--@foreach($skills as $skill)--}}

									{{--<option value="{{$skill->id}}" --}}
											{{--@if(!is_null(old('skills')) && in_array($skill->id, --}}
											{{--old('skill'))) selected @endif>{{$skill->name}}--}}
									{{--</option>--}}

								{{--@endforeach--}}
							{{--</select>--}}
						{{--</div>--}}
					{{--</div>--}}


                 	<select multiple name="skills[]" class="form-control" id="" required>
						<option value="">what Skills do you need<i title="required" class="badge badge-danger">!</i></option>
						@forelse($skills as $skill)
							<option value="{{$skill->id}}">
                                {{--{{$skill->name}}--}}
                                @if(!is_null(old('skills')) && in_array($skill->id,
                                old('skill'))) selected
                                @endif
                                {{$skill->name}}
                            </option>
						@empty
							<p>Nothing here</p>
						@endforelse
					</select>
					<br>

					<select name="progress" class="form-control" id="" required>
						<option value="">At what stage is your Idea</option>
						@forelse($progresses as $progress)
							<option value="{{$progress->id}}">{{$progress->name}}</option>
						@empty
							<p>Not available at the moment</p>
						@endforelse
					</select>
				</div>
				<div class="card-footer">
					<button  class="btn pull-right" type="Submit">Submit</button>
				</div>
			</div>
		</div>
	</form>
	@else
	<div class="card">
		<div class="card-header">
	<p>You are not logged in</p>
	</div>
	<div class="card-body">
		<p class="alert alert-warning">please login to post your idea</p>
	</div>
	</div>
	@endauth
	</div>
    <script>
        $('#test').click(alert('hi'));
    </script>

@endsection