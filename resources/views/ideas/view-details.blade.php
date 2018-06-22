@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header teal white-text">
                    {{$idea->title}}
                @auth
                    @if(auth()->user()->id != $idea->owner()->id)
                        <a href="{{route('ideas.details.cofounder-request', ['slug'=>$idea->slug])}}" class="btn btn-success pull-right">Cofound this idea</a>
                    @else
                        <a href="{{route('ideas.details.view-requests', ['slug'=>$idea->slug])}}" class="btn btn-success pull-right">View Requests</a>
                    @endif
                @endauth
                </div>
                <div class="card-body">
                    <div class="basics" style="text-align: center;">
                        <img height="120px" width="120px" src="{{asset($idea->owner()->imagePath())}}" alt="owner of this idea"><br>
                        <b>{{$idea->owner()->name()}}</b>
                    </div>
                    <br>
                    <div class="idea-info">
                    {{$idea->details}}
                    </div>
                    <br>
                    <div class="idea-stage">
                        <b class="teal-text">Idea Stage:</b>
                        {{--different badges for different idea stages--}}
                        @if($idea->progress()->id == 1)
                            <i class="badge" style="background:red">{{$idea->progress()->name}}</i>
                        @elseif($idea->progress()->id == 2)
                            <i class="badge" style="background:darkorange">{{$idea->progress()->name}}</i>
                        @elseif($idea->progress()->id == 3)
                            <i class="badge" style="background:yellow">{{$idea->progress()->name}}</i>
                        @elseif($idea->progress()->id == 4)
                            <i class="badge" style="background:blue; color: white">{{$idea->progress()->name}}</i>
                        @elseif($idea->progress()->id == 5)
                            <i class="badge" style="background:teal; color: whitesmoke;">{{$idea->progress()->name}}</i>
                        @else
                            <i class="badge badge-info">{{$idea->progress()->name}}</i>
                        @endif
                    </div>
                    <br>
                    <div class="required-skills">
                        <b class="teal-text">Required Skills</b>
                        @forelse($idea->ideaSkills() as $ideaSkill)
                            <p class="badge badge-info">{{$ideaSkill->name}}</p>
                        @empty
                        <b>No skill Specified</b>
                        @endforelse
                    </div>
                    <hr>
                    @if((count($idea->cofounders())>0) && (count($idea->cofounders())<2)))
                    <!--this text shows only if the idea has a cofounder-->
                    <p style="font-style: italic" class="teal-text">Co-founder</p><br>
                    @elseif(count($idea->cofounders())>1)
                        <p style="font-style: italic" class="teal-text">Co-founders</p><br>
                    @endif

                    <div class="row">

                        @forelse($idea->cofounders() as $cofounder)
                            <div class="col-md-3" style="text-align: center; border: 1px solid grey; border-radius: 10%; margin: 1em;">
                                <div class="cofounder">
                                    <div class="cofounder-image">
                                        <img height="120px" width="100px" style="border-radius: 50%; padding: 1em;" src="{{asset($cofounder->user()->imagePath())}}" alt="">

                                    </div>
                                    <div class="cofounder">
                                        <b style="text-transform: capitalize;">{{$cofounder->user()->name()}}</b>
                                    </div>
                                    <div>
                                        {{$cofounder->role()->name}}
                                    </div>
                                    <hr>
                                    {{--<div class="cofounder-info">--}}
                                        {{--{{Str::words($cofounder->other_info, 10,'....')}}--}}
                                    {{--</div>--}}
                                </div>
                            </div>
                        @empty
                            <a style="text-align: center; margin: auto;" class="badge badge-danger center-align" href="{{route('ideas.details.cofounder-request', ['slug'=>$idea->slug])}}">Be the first Co-founder</a>
                        @endforelse
                    </div>

                </div>
                <div class="card-footer">
                    @if($idea->owner()->id != auth()->user()->id)
                        {{--display this link if the current user is not the owner of the idea--}}
                        <a style="font-size: 9px;" class="grey-text pull-left" href="{{route('ideas.details.cofounder-request', ['slug'=>$idea->slug])}}">Become {{$idea->owner()->name()." 's "}} Co-founder</a>
                    @endif
                    <div class="ideaOwner pull-right teal-text">
                        @if(!is_null($idea->owner()))
                            {{--this is necessary because the lastname and first name are nullable--}}
                            <span>{{'Posted by '.' '.$idea->owner()->name()}}</span>
                        @endif

                        @if(!is_null($idea->owner()->primaryRole()))
                            <span style="font-size: 11px;">{{'- '}}<i class="mdi mdi-briefcase-outline blue-grey-text"></i>{{$idea->owner()->primaryRole()->name}}</span>
                        @endif
                        @if(!is_null($idea->owner()->secondaryRole()))
                            <span style="font-size: 11px;">{{'and'.' '}}<i class="mdi mdi-briefcase-outline blue-text"></i>{{$idea->owner()->secondaryRole()->name}}</span>
                        @endif<hr>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection