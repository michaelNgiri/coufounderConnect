@extends('layouts.app')
@section('content')
    <div class="container">
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