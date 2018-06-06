@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header teal white-text">
                    All Connections
                </div>
                <div class="card-body">
                    <div>
                       <div class="card-header">
                           Received
                       </div>
                        <hr>
                        @forelse($allReceived as $incoming)
                            <form action="{{route('connections.accept-request')}}" method="post">
                                @csrf
                            <p>
                                <img height="30px" width="30px" src="{{asset($incoming->sender()->imagePAth())}}" alt=""><br>
                            <b style="text-transform: capitalize;">{{$incoming->sender()->name()}}</b>
                            @if(!$incoming->accepted())
                            <button class="btn btn-success pull-right" type="submit">{{__('accept')}}</button>
                            @elseif(!$incoming->spammed())
                            <button  class="btn btn-primary pull-right teal-text" disabled><i class="mdi mdi-link teal-text"></i>                                        {{ __('connected') }}
                            </button>
                            @endif
                            <span class="center-align grey-text"><i class="mdi mdi-timer"></i>{{' '.$incoming->timestamp()}}</span>
                                <input type="hidden" name="id" value="{{$incoming->id}}"><br>
                                <span class="blue-grey-text"><i class="mdi mdi-briefcase teal-text"></i>{{$incoming->sender()->primaryRole()->name}}</span><br>
                                <span class="blue-grey-text"><i class="mdi mdi-briefcase teal-text"></i>{{$incoming->sender()->secondaryRole()->name}}</span>
                            </p>
                            </form>
                            <hr>
                        @empty
                            <b class="grey-text">nothing here</b>
                        @endforelse
                        <hr>
                    </div>
                </div>
                <div class="card-footer">

                </div>
                <br>
                <div class="card-header">
                    <b>Sent</b>
                </div>
                <div class="card-body">

                </div>
            </div>
        </div>
    </div>
</div>
@endsection