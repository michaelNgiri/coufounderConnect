@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <a href="{{route('discussions.create')}}" class="btn btn-secondary">Start a Discussion Thread +</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header teal white-text">
                        Discussion Threads
                    </div>
                    <div class="card-body">
                        @forelse($threads as $thread)
                          <div class="teal-text">
                                <fieldset>
                                    <b>{{$thread->topic}}</b><br>
                                    <span style="font-size: 10px;" class="pull-left blue-grey-text">{{$thread->timeStamp().' '.'by'.' '.$thread->owner()->name()}}</span><br>
                                    @if(!is_null($thread->owner()->primaryRole()))
                                        <span style="font-size: 10px;"><i style="font-size: 8px; color: brown;" class="mdi mdi-briefcase"></i>{{$thread->owner()->primaryRole()->name}}</span><br>
                                    @endif
                                        <hr>
                                    <p class="blue-grey-text">{{$thread->thread}}</p>
                                    <form action="{{route('discussions.save-comment')}}" method="post">
                                        <input type="hidden" name="thread_id" value="{{$thread->id}}">
                                        <label for="comment">Add a comment</label>
                                        <textarea name="comment" id="comment" cols="30" rows="10"></textarea>
                                        <button style="padding: 2px;" class="white teal-text btn pull-right">Publish</button>
                                    </form><br>
                                </fieldset>
                          </div>

                         @empty
                        <div class="grey-text center-align">
                            No active Threads
                        </div>
                         @endforelse
                    </div>
                    <div class="card-footer">

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection