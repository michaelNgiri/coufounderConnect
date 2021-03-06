@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header teal white-text">
                        Update Thread <i class="badge badge-danger">+</i>
                    </div>
                    <div class="card-body">
                        <form action="{{route('discussions.save-updates')}}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{$thread->id}}">
                            <div class="form-control">
                                <label for="topic"><i class="badge badge-warning" title="this field is required">!</i>Topic</label>
                                <input required autofocus autocomplete type="text" name="topic" id="topic" value="{{$thread->topic}}">
                            </div>

                            <div class="form-control">
                                <label for="body"><i class="badge badge-warning" title="this field is required">!</i>Thread</label>
                                <textarea name="thread" id="thread" cols="30" rows="10" required autofocus>{{$thread->thread}}</textarea>
                            </div>

                            <div class="form-control">
                                <label for="tags">Tags</label>
                                <input type="text" name="tags" value="{{$thread->tags}}">
                            </div>
                            <hr>
                            <button class="btn btn-success pull-right">{{__('update')}}</button>

                        </form>
                    </div>
                    <div class="card-footer">

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection