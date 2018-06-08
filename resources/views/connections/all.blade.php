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
                                <img height="30px" width="30px" src="{{asset($incoming->sender()->imagePAth())}}" alt="{{$sent->recipient()->name()."'s photo'"}}"><br>
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
                <br>
               <div class="card-body">
                    <div>
                        <div class="card-header">
                            Sent
                        </div>
                        <hr>
                        @forelse($allSent as $sent)

                                    <img height="30px" width="30px" src="{{asset($sent->recipient()->imagePAth())}}" alt="{{$sent->recipient()->name()."'s photo'"}}"><br>
                                    <b class="teal-text" style="text-transform: capitalize;">{{$sent->recipient()->name()}}</b><br>
                                    <span class="center-align grey-text"><i class="mdi mdi-timer"></i>{{' '.$sent->timestamp()}}</span>
                                    {{--action group--}}
                                    @if($sent->accepted())
                                        <button  class="btn btn-primary pull-right teal-text" disabled><i class="mdi mdi-link teal-text"></i>
                                            {{ __('accepted') }}
                                        </button>
                                    @elseif($sent->spammed())
                                        <button  class="btn btn-primary pull-right teal-text" disabled><i class="mdi mdi-link-variant-off red-text"></i>
                                            {{ __('spammed') }}
                                        </button>
                                    @elseif(!$sent->cancelled())
                                    <button class="btn btn-success pull-right" type="submit">{{__('cancel')}}</button>
                                    <form action="{{route('connections.cancel-request')}}" method="post">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$sent->id}}">
                                    </form>
                                     @else
                                     <button class="btn grey pull-right" type="submit"><i class="mdi mdi-check">{{__('sent')}}</i></button>
                                    @endif
                                    <br>
                                    @if(!is_null($sent->recipient()->primaryRole()))
                                         <span class="blue-grey-text"><i class="mdi mdi-briefcase teal-text"></i>{{$sent->recipient()->primaryRole()->name}}</span>
                                    @endif
                                    <br>
                                    @if(!is_null($sent->recipient()->secondaryRole()))
                                        <span class="blue-grey-text"><i class="mdi mdi-briefcase teal-text"></i>{{$sent->recipient()->secondaryRole()->name}}</span>
                                    @endif
                            <hr>
                        @empty
                            <b class="grey-text center-align">nothing here</b>
                        @endforelse

                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection