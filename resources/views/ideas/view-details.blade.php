@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header teal white-text">
                    {{$idea->title}}
                    <a href="" class="btn btn-success pull-right">Cofound this idea</a>
                </div>
                <div class="card-body">
                    <div class="idea-info">
                    {{$idea->details}}
                    </div>
                    <p style="font-style: italic" class="teal-text">Co-founders</p>
                    <hr>

                    <div class="row">
                        @forelse($idea->cofounders() as $cofounder)
                            <div class="col-md-4" style="text-align: center;">
                                <div class="cofounder card">
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
                                    <div class="cofounder-info">
                                        {{$cofounder->other_info}}
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p class="grey-text">No Co-founder yet</p>
                        @endforelse
                    </div>

                </div>
                <div class="card-footer">
                    <div class="ideaOwner pull-right teal-text">
                        @if(!is_null($idea->owner()))
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