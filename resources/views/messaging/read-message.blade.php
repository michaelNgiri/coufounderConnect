@extends('layouts.app')
@section('content')
    <div class="container">
            <div class="card" style="min-width: 300px;">
                <div class="col-md-12">
                    <div class="card-header teal white-text">
                        <a href="{{route('messaging.messages')}}" class="mdi text-capitalize white-text mdi-backburger"></a>
                        {{' '.$message->title.'  from '}} <a href="" class="teal white-text btn">{{$message->sender()->name()}}</a>
                        <span><img height="30px" width="30px" style="border-radius: 50%; float: right; margin-left: 4px;" src="{{asset($message->sender()->imagePath())}}" alt="sender's photo"></span>
                        <span class="pink-text pull-right">{{' '.$timestamp}}</span>
                    </div>
                    <div class="card-body">{{$message->message_body}}</div>
                    <div class="card-footer">
                        <i class="mdi mdi-reply teal-text"></i>
                        <i class="mdi mdi-delete teal-text"></i>
                    </div>
                </div>
            </div>
        </div>
@endsection