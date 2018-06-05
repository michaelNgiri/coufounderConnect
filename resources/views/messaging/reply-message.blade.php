@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">{{dd($user->id)}}
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header teal">
                        <span class="red-text">Send Message to: </span> <b class="white-text">{{ $user->name()}}</b>
                        <span class="pull-right"><img style="border-radius: 50%;" height="30px" width="30px" src="{{ asset($user->imagePath())}}" alt="{{ $user->name().'`s'.' picture'}}"></span>
                    </div>
                    <div class="card-body">
                        <form action="{{route('messaging.send-message')}}" method="post" class="messageForm" enctype="multipart/form-data">
                            @csrf
                            <input type="text" placeholder="Message Title" name="title" autofocus onautocomplete="next()"><br>
                            <label class="grey-text" for="message">Message body:</label>
                            <textarea class="" name="message"></textarea>
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