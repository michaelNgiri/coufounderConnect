@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header teal white-text">
                    {{$idea->title}}
                </div>
                <div class="card-body">
                @forelse($idea->cofounders() as $cofounder)
                    <div class="cofounder">
                        {{$cofounder->name()}}
                    </div>
                @empty
                    <p class="grey-text">No Co-founder yet</p>
                @endforelse
                </div>
                <div class="card-footer">

                </div>
            </div>
        </div>
    </div>
</div>
@endsection