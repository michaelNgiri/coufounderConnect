@extends('layouts.app')
@section('content')
  <div class="container">
      <div class="row">
          <div class="col-md-12">
              <div class="card">
                  <div class="card-header">
                      <div class="pull-left">
                          <b style="font-size: 1.6em;" class="teal-text">{{$thread->topic}}</b><br>
                          @if($thread->owner() == auth()->user())
                              <span style="font-size: 10px;" class="pull-left blue-grey-text">{{$thread->timeStamp().' '.'by'.' '.'Me'}}</span><br>
                          @else
                              <span style="font-size: 10px;" class="pull-left blue-grey-text">{{$thread->timeStamp().' '.'by'.' '.$thread->owner()->name()}}</span><br>
                          @endif
                          @if(!is_null($thread->owner()->primaryRole()))
                              <span style="font-size: 10px;"><i style="font-size: 8px; color: brown;" class="mdi mdi-briefcase"></i>{{$thread->owner()->primaryRole()->name}}</span><br>
                          @endif
                      </div>
                      <div class="pull-right" style="display:block;">
                          @if($thread->owner() == auth()->user())

                              <form action="">
                                  <a style="color: grey;" href="" class="gray-text"><i class="mdi mdi-close"></i> Revoke</a><br>
                              </form>
                              <form action="">
                                  <a style="color: grey;"  href="" class="gray-text"><i class="mdi mdi-pencil"></i> Edit</a><br>
                              </form>
                              <form action="">
                                  <a style="color: grey;"  href="" class="gray-text"><i class="mdi mdi-delete"></i> Delete</a>
                              </form>
                          {{--<a style="color: grey;" href="{{route('discussions.revoke',['slug'=>$thread->slug])}}" class="gray-text"><i class="mdi mdi-close"></i> Revoke</a><br>--}}
                          {{--<a style="color: grey;"  href="{{route('discussions.update-thread', ['slug'=>$thread->slug])}}" class="gray-text"><i class="mdi mdi-pencil"></i> Edit</a><br>--}}
                              {{--<form action="{{route('discussions.delete')}}" method="post">--}}
                                  {{--@csrf--}}
                                  {{--<input name="id" type="hidden" value="{{$thread->id}}">--}}
                                  {{--<button type="submit" onclick="confirm('are you sure you want to delete this thread ?')" class="mdi mdi-delete">Delete</button>--}}

                              {{--</form>--}}
                          @endif
                      </div>
                  </div>
                  <div class="card-body">

                    <p style="font-size: 1.4em; background-color: #f3f3f3; padding: 1em; justify-content: space-around;"><pre style="white-space: pre-wrap; font-family: 'Yu Gothic UI'; font-size: 1.5em; justify-content:center; text-justify: inter-cluster; ">{{$thread->thread}}</pre></p>
                      <br>
                      {{--container div for comments--}}
                      @forelse($thread->allComments() as $comment)
                          <div class="row">
                              <div class="col-md-2"></div>
                              <div class="col-md-10">
                                  @if($comment->commenter() == auth()->user())
                                      <div class="comment-div pull-right" style="background-color: beige; padding: 1em; border-radius: 1em;">
                                          @else
                                              <div class="comment-div pull-right" style="background-color: #f3f3f3; padding: 1em; border-radius: 1em;">
                                                  @endif
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
                                  <p class="grey-text"> no comment yet</p>
                              @endforelse
                      {{--form for adding comments--}}
                      <div class="row">
                          <div class="col-md-12">
                             @auth
                              <div class="form-group">
                                  <form action="{{route('discussions.save-comment', ['topic'=>$thread->topic])}}" method="post">
                                      @csrf
                                      <input type="hidden" name="thread_id" value="{{$thread->id}}">
                                      <label for="comment">Add a comment</label>
                                      <textarea name="comment" id="comment" cols="30" rows="10" required></textarea>
                                      <button style="padding: 2px; text-transform: capitalize;" class="white teal-text btn pull-right">Publish</button>
                                  </form>
                              </div>
                              @else
                                  <p class="grey-text">Login to add a comment</p>
                              @endif
                          </div>
                      </div>
                      <br>

                          </div>
                      </div>

                  </div>

                  <div class="card-footer">

                  </div>
              </div>
          </div>
      </div>
  </div>
@endsection