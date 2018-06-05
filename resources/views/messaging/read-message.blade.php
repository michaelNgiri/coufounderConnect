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
                    <div class="card-footer inline" style="display: flex;">
                        <form action="{{route('messaging.reply',['title'=>$message->title])}}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{$message->sender_id}}">
                            <button type="submit" title="reply" role="button" class="mdi mdi-reply white-text btn"></button>
                        </form>
                        <form action="{{route('messaging.delete',['title'=>$message->title])}}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{$message->id}}">
                        <button type="submit" title="delete" role="button" class="mdi mdi-delete red-text btn"></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection