@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <ddiv class="card-header teal white-text">
                    Blocked Requests
                </ddiv>
                <div class="card-body">
                    @forelse($blockedRequests as $blockedRequest)

                    @empty
                    <p class="grey-text center-align">no blocked request</p>
                    @endforelse
                </div>
                <div class="card-footer">

                </div>
            </div>
        </div>
    </div>
</div>
@endsection