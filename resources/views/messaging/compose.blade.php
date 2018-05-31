@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Send Message to: <b class="teal-text">{{$user->name()}}</b>
                    </div>
                    <div class="card-body">
                        <form action="{{route('messaging.send-message')}}" method="get" class="messageForm">
                            <input type="text" placeholder="Message Title" name="title" autofocus onautocomplete="next()"><br>
                            <textarea cols="120" rows="600" name="message">Type your Message here</textarea>
                            <br>
                            <input type="hidden" value="{{$user->id}}" name="id">
                        <button type="submit" class="btn btn-primary pull-right">
                            {{__('send')}}
                            <i class="mdi mdi-send"></i>
                        </button>
                        </form>
                    </div>
                    <div class="card-footer">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection