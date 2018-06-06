@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header teal white-text">
                    Connections
                        <span title="pending requests" class="badge badge-success red-text"> <i class="mdi mdi-arrow-down-bold white-text"></i>{{$noOfPendingReceived}}</span>
                        <span title="sent requests" class="badge badge-success red-text"><i class="mdi mdi-arrow-up-bold white-text"></i>{{$totalAcceptedSent}}</span>
                        <span title="all requests" class="badge badge-success white-text"><i class="mdi mdi-link"></i><a
                                    href="{{route('connections.all-connections')}}">{{$noOfBlockedRequests}}</a></span>
                        <span title="blocked connections" class="badge badge-danger"><i class="mdi mdi-link-variant-off"></i><a class="white-text"
                                    href="{{route('connections.blocked-requests')}}">{{$totalAcceptedSent + $totalAcceptedReceived}}</a></span>

                    </div>
                    <div class="card-body">
                        @forelse($pendingReceived as $pending)
                            @if(!$pending->accepted())
                                <div>
                                    <form action="{{route('connections.accept-request')}}" method="post">
                                        @csrf
                                        <p class="teal-text"><b>{{$pending->sender()->name()}}</b>
                                            <input type="hidden" name="id" value="{{$pending->id}}">
                                            <button onclick="confirm('are you sure you want to accept this request')" title="accept this request" type="submit" class="btn pull-right">{{__('Accept')}}</button>
                                            <br>
                                            @if(!is_null($pending->sender()->primaryRole()))
                                                <em><i class="mdi mdi-briefcase red-text"></i>{{' '.$pending->sender()->primaryRole()->name}}</em>
                                                <br>
                                            @endif
                                            @if(!is_null($pending->sender()->secondaryRole()))
                                                <em><i class="mdi orange-text mdi-briefcase"></i>{{' '.$pending->sender()->secondaryRole()->name}}</em>
                                            @endif
                                            <span class="pull-right mdi mdi-clock-alert">{{$pending->timeStamp()}}</span>
                                        </p>
                                    </form>
                                </div>
                                <hr>
                                @else
                                <p>No pending request</p>
                            @endif
                            @empty
                        <span class="grey-text center-align">No pending request</span>
                            @endforelse
                    </div>
                    <div class="card-footer">

                    </div>
                </div>
            </div>
        </div>
{{--pending connections--}}
        {{--<div class="row">--}}
            {{--<div class="col-md-12">--}}
                {{--<div class="card">--}}
                    {{--<div class="card-header teal white-text">--}}
                        {{--My Connections--}}
                        {{--<span class="badge badge-success">{{$totalAcceptedSent + $totalAcceptedReceived}}</span>--}}
                    {{--</div>--}}
                    {{--<div class="card-body">--}}
                        {{--@forelse($myAcceptedConnections as $myAcceptedConnection)--}}
                            {{--<div>--}}
                                {{--<p class=""></p>--}}
                            {{--</div>--}}
                        {{--@empty--}}
                            {{--<span class="grey-text center-align">No Connections yet</span>--}}
                        {{--@endforelse--}}
                    {{--</div>--}}
                    {{--<div class="card-footer">--}}

                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}

        {{--sent requests--}}
        {{--<div class="row">--}}
            {{--<div class="col-md-12">--}}
                {{--<div class="card">--}}
                    {{--<div class="card-header teal white-text">--}}
                        {{--Sent Requests--}}
                        {{--<span class="badge badge-success">{{$totalAcceptedSent}}</span>--}}
                    {{--</div>--}}
                    {{--<div class="card-body">--}}
                        {{--@forelse($sentRequests as $sent)--}}
                            {{--<div>--}}
                                {{--<p class=""></p>--}}
                            {{--</div>--}}
                        {{--@empty--}}
                            {{--<span class="grey-text center-align">No Connections yet</span>--}}
                        {{--@endforelse--}}
                    {{--</div>--}}
                    {{--<div class="card-footer">--}}

                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}

    {{--</div>--}}


@endsection