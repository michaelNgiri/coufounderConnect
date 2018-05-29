@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="card" style="min-width: 300px;">
            <div class="col-md-12">
                    <div class="card-header teal white-text">
                        <a href="{{route('messaging.messages')}}" style="text-transform: capitalize;" class="mdi white-text mdi-backburger"></a>
                        {{' '.$message->title}} <span class="pink-text" style="float: right;">{{' '.$timestamp}}</span>
                    </div>
                    <div class="card-body">{{$message->message_body}}</div>
                    <div class="card-footer">
                        <i class="mdi mdi-reply teal-text"></i>
                        <i class="mdi mdi-delete teal-text"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection