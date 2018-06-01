@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header teal white-text">
                    Pending Requests
                        <span class="badge badge-success">{{$totalConnections}}</span>
                    </div>
                    <div class="card-body">
                        @forelse($myAcceptedConnections as $myAcceptedConnection)
                            <div>
                            <p class=""></p>
                            </div>
                            @empty
                        <span class="grey-text center-align">No Connections yet</span>
                            @endforelse
                    </div>
                    <div class="card-footer">

                    </div>
                </div>
            </div>
        </div>
{{--pending connections--}}
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header teal white-text">
                        My Connections
                        <span class="badge badge-success">{{$totalConnections}}</span>
                    </div>
                    <div class="card-body">
                        @forelse($myAcceptedConnections as $myAcceptedConnection)
                            <div>
                                <p class=""></p>
                            </div>
                        @empty
                            <span class="grey-text center-align">No Connections yet</span>
                        @endforelse
                    </div>
                    <div class="card-footer">

                    </div>
                </div>
            </div>
        </div>

        {{--sent requests--}}
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header teal white-text">
                        Sent Requests
                        <span class="badge badge-success">{{$totalConnections}}</span>
                    </div>
                    <div class="card-body">
                        @forelse($myAcceptedConnections as $myAcceptedConnection)
                            <div>
                                <p class=""></p>
                            </div>
                        @empty
                            <span class="grey-text center-align">No Connections yet</span>
                        @endforelse
                    </div>
                    <div class="card-footer">

                    </div>
                </div>
            </div>
        </div>

    </div>


@endsection