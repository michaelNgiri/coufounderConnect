@extends('layouts.app')
@section('content')
 <div class="container">
     <div class="row">
         <div class="col-md-12">
             <div class="card">
                 <div class="card-header white-text teal">
                     Cofounder Requests for {{$idea->title}}
                 </div>
                 <div class="card-body">
                <b class="teal-text">Pending</b>
                     <hr>
                     <div class="row">
                     @forelse($idea->pendingCofounderRequests() as $pendingCofounderRequest)
                      <div class="col-md-4" style=" border:1px solid #f3f3f3; padding-top:8px; text-align:center; justify-text:all;">
                         <img height="80px" width="80px" src="{{asset($pendingCofounderRequest->user()->imagePath())}}" alt="{{$pendingCofounderRequest."'s picture'"}}"><br>
                         {{$pendingCofounderRequest->user()->name()}}<br>
                          @if($pendingCofounderRequest->role()->id ==1)
                              <b style="background: red;" class="badge">{{$pendingCofounderRequest->role()->name}}</b>
                          @elseif($pendingCofounderRequest->role()->id == 2)
                              <b style="background: orange;" class="badge">{{$pendingCofounderRequest->role()->name}}</b>
                          @elseif($pendingCofounderRequest->role()->id ==3)
                              <b style="background: yellow;" class="badge">{{$pendingCofounderRequest->role()->name}}</b>
                          @elseif($pendingCofounderRequest->role()->id ==4)
                              <b style="background: green;" class="badge">{{$pendingCofounderRequest->role()->name}}</b>
                          @elseif($pendingCofounderRequest->role()->id ==5)
                              <b style="background: brown;" class="badge">{{$pendingCofounderRequest->role()->name}}</b>
                          @elseif($pendingCofounderRequest->role()->id ==6)
                              <b style="background: plum;" class="badge">{{$pendingCofounderRequest->role()->name}}</b>
                          @else
                              <b class="badge badge-info">{{$pendingCofounderRequest->role()->name}}</b>
                          @endif
                          <p>{{Str::words($pendingCofounderRequest->other_info, 20,'....')}}</p>
                          <a href="{{route('ideas.cofounders.accept-request',['id'=>$pendingCofounderRequest->id])}}" class="">Accept</a>
                          {{--<p>--}}
                              {{--<a class="teal-text" style="border: 1px solid teal; border-radius: 10%;" href="">Accept</a>--}}
                              {{--<a href="">View Profile</a>--}}
                              {{--<a class="materialize-red-text" style="border: 1px solid red; border-radius:10%;" href="">Spam</a>--}}
                          {{--</p>--}}
                      </div>
                     @empty
                     <p class="grey-text">No Pending request</p>
                     @endforelse
                 </div>
                 </div>
                 <div class="card-footer">

                 </div>
             </div>
         </div>
     </div>
 </div>
@endsection