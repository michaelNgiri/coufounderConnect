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
                                   <div class="row">
                                       <div class="col-md-12">
                                           <a href="" style="font-size: 1.6em;" class="teal-text"><b>{{$thread->topic}}</b></a><br>
                                           <span style="font-size: 10px;" class="pull-left blue-grey-text">{{$thread->timeStamp().' '.'by'.' '.$thread->owner()->name()}}</span><br>
                                           @if(!is_null($thread->owner()->primaryRole()))
                                               <span style="font-size: 10px;"><i style="font-size: 8px; color: brown;" class="mdi mdi-briefcase"></i>{{$thread->owner()->primaryRole()->name}}</span><br>
                                           @endif
                                           <br>
                                           <p style="font-size: 1.4em;" class="blue-grey-text">{{Str::words($thread->thread, 60,'....')}}</p>
                                       </div>
                                   </div>
                                    {{--container div for comments--}}
                                    <div class="row">

                                        @forelse($thread->comments() as $comment)
                                        <div class="col-md-4"></div>
                                        <div class="col-md-8">

                                                <div class="comment-div pull-right">
                                                    <span  style="font-size: 10px;" class="blue-grey-text">{{$comment->commenter()->name().' '.'said:'}}</span>
                                                    <br>
                                                    <p style="font-size: 0.9em;" class="teal-text float-md-right gray" >{{$comment->comment.' '.'(' .$comment->timeStamps().')'}}</p>
                                                    <br>

                                                </div>
                                        </div>
                                        @empty
                                            <p> no comment yet</p>
                                        @endforelse

                                    </div>
                                    {{--form for adding comments--}}
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <form action="{{route('discussions.save-comment', ['topic'=>$thread->topic])}}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="thread_id" value="{{$thread->id}}">
                                                    <label for="comment">Add a comment</label>
                                                    <textarea name="comment" id="comment" cols="30" rows="10" required></textarea>
                                                    <button style="padding: 2px; text-transform: capitalize;" class="white teal-text btn pull-right">Publish</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                </fieldset>
                          </div>
                            <hr>
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