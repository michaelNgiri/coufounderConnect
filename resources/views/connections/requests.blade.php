@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header teal white-text">
                        Connection Requests
                        @if($noOfPendingRequests > 0)
                        <span class="badge badge-success">{{'('.$noOfPendingRequests.')'}}</span>
                            @else

                        @endif
                    </div>
                    <div class="card-body">
                        @forelse($pendingRequests as $pendingRequest)
                            @empty
                            <span class="grey-text center-align">No Pending Request</span>
                        @endforelse
                    </div>
                    <div class="card-footer">

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection