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
                        <b class="teal-text">Received</b>
                        <hr>
                        @forelse($allReceived as $incoming)
                            <form action="">
                            <p>
                            {{$incoming->sender()->name()}}
                            @if(!$incoming->accepted())
                            <button class="btn btn-success pull-right" type="submit">{{__('accept')}}</button>
                            @endif
                            <span class="center-align grey-text"><i class="mdi mdi-timer"></i>{{' '.$incoming->timestamp()}}</span>
                                <input type="hidden" name="id" value="{{$incoming->id}}"><br>
                            </p>
                            </form>
                        @empty
                            <b class="grey-text">nothing here</b>
                        @endforelse
                        <hr>
                    </div>
                    <div>
                        <b class="teal-text">Sent</b>
                        <hr>
                    </div>
                </div>
                <div class="card-footer">

                </div>
            </div>
        </div>
    </div>
</div>
@endsection