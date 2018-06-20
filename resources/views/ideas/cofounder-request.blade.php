@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header teal-text">
                    <b>Request to be a cofounder of {{$idea->title}}</b>
                </div>
                <div class="card-body">
                    <label for="role_id">What role do you want to play in {{$idea->title}} <i title="this is a required field" class="badge badge-danger">!</i></label>
                    <form action="{{route('ideas.details.cofound', ['slug'=>$idea->slug])}}">
                        @csrf
                        <select name="role_id" id="role_id" class="form-control" required>
                            <option value="">Choose a role</option>
                                @forelse($skills as $skill)
                                    <option value="{{$skill->id}}">{{$skill->name}}</option>
                                @empty
                                <p class="grey-text">No skill to choose from</p>
                                @endforelse
                        </select><br>
                        <label for="other_info">Additional information (Make a convincing speech about yourself in 100 words)<i title="this is a required field" class="badge badge-danger">!</i></label></label>
                        <textarea  minlength="20" maxlength="100" required name="other_info" id="other_info" cols="30" rows="10" ></textarea>
                        {{--Total word Count : <span id="display_count">0</span> words--}}
                        <button class="btn btn-success text-capitalize pull-right">Submit</button>
                    </form>
                </div>
                <div class="card-footer">

                </div>
            </div>
        </div>
    </div>
</div>
@endsection