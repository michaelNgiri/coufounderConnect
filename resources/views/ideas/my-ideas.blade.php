@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-6 pull-left" >
                <a href="{{route('ideas.post-idea')}}" class="btn btn-secondary">Post another idea +</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10 card">
                <div class="card-header teal-text">
                   <b>My Ideas</b>
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
				<p class="teal-text">Required Skill: <br> </b><i class="mdi mdi-briefcase materialize-red-text"></i>{{$idea->requiredSkill()}}</p>
				<p class="teal-text">Progress: <br> </b><i class="mdi mdi-run"></i>{{$idea->progress()->name}}</p>
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