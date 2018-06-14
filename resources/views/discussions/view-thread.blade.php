@extends('layouts.app')
@section('content')
  <div class="container">
      <div class="row">
          <div class="col-md-12">
              <div class="card">
                  <div class="card-header">
                      <div class="pull-left">
                          <a href="{{route('discussions.view-thread', ['$thread'=>$thread->topic, 'id'=>$thread->id])}}" style="font-size: 1.6em;" class="teal-text"><b>{{$thread->topic}}</b></a><br>
                          @if($thread->owner() == auth()->user())
                              <span style="font-size: 10px;" class="pull-left blue-grey-text">{{$thread->timeStamp().' '.'by'.' '.'Me'}}</span><br>
                          @else
                              <span style="font-size: 10px;" class="pull-left blue-grey-text">{{$thread->timeStamp().' '.'by'.' '.$thread->owner()->name()}}</span><br>
                          @endif
                          @if(!is_null($thread->owner()->primaryRole()))
                              <span style="font-size: 10px;"><i style="font-size: 8px; color: brown;" class="mdi mdi-briefcase"></i>{{$thread->owner()->primaryRole()->name}}</span><br>
                          @endif
                      </div>
                      <div class="pull-right">
                          @if($thread->owner() == auth()->user())
                          <a style="color: grey;" href="" class="gray-text"><i class="mdi mdi-close"></i> Revoke</a><br>
                          <a style="color: grey;"  href="" class="gray-text"><i class="mdi mdi-pencil"></i> Edit</a><br>
                          <a style="color: grey;"  href="" class="gray-text"><i class="mdi mdi-delete"></i> Delete</a>
                          @endif
                      </div>
                  </div>
                  <div class="card-body">
                    <p style="font-size: 1.4em; justify-content: flex-end;">{{$thread->thread}}</p>
                      <br>
                      @forelse($thread->allComments() as $comment)
                          <div class="row">
                              <div class="col-md-2"></div>
                              <div class="col-md-10">

                                  <div class="comment-div pull-right">
                                      @if($comment->commenter() == auth()->user())
                                          <span  style="font-size: 12px;" class="teal-text">{{'I'.' '.'said:'}}</span>
                                      @else
                                          <span  style="font-size: 12px;" class="teal-text">{{$comment->commenter()->name().' '.'said:'}}</span>
                                      @endif
                                      <br>
                                      <span style="font-size: 1em;" class="black-text float-md-right gray" >{{Str::words($comment->comment, 45,'....')}}</span>
                                      <br>
                                      <span style="font-size: 12px;" class="grey-text pull-right">{{'[' .$comment->timeStamps().']'}}</span>
                                  </div>
                              </div><hr>
                          </div>

                      @empty
                          <p> no comment yet</p>
                      @endforelse
                  </div>
                  <div class="card-footer">

                  </div>
              </div>
          </div>
      </div>
  </div>
@endsection