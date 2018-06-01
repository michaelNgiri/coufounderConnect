@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <b class="pull-left grey-text">Profile View</b>
                    <b class="teal-text pull-right text-capitalize">{{$user->name()}}</b>
                </div>

                @auth
                <div class="card-body">
                    <div class="profileHeader alert alert-success center-align">
                        <img height="120px" width="100px" src="{{asset($user->imagePath())}}">

                        <hr>
                        <form class="inline" action="{{route('messaging.compose',['username'=>$user->username])}}" method="post">
                        <div class="connectionLinks inline" >
                            <a href="{{route('connections.connect',['id'=>$user->id, 'name'=>$user->name()])}}" class="btn btn-primary white-text">
                                <i class="mdi mdi-link red-text"></i>
                            {{ __('connect') }}
                        </a>

                                @csrf
                                <button  class="btn btn-primary white-text">{{ __('Message') }}</button>
                                <input name="id" type="hidden" value="{{$user->id}}">
                                <input name="username" type="hidden" value="{{$user->username}}">

                             <a href="" class="btn btn-primary white-text" disabled>
                                <i class="mdi mdi-check-all"></i>
                            <!--  {{ __('Follow') }} -->
                            </a>
                        </div>
                        </form>
                    </div>
                    <div class="profileDetails pull-left blue-grey-text"><br>
                            @if(!is_null($user->location()))
                                <span><i style="font-size: 2em;" class="mdi mdi-home teal-text"></i> {{'Lives in'.' '.$user->location()}}</span><br>
                            @endif
                            @if(!is_null($user->availability))
                                <span><i style="font-size: 2em;" class="mdi teal-text mdi-timer"></i>{{'Available'.' '.$user->availability()->name.'/week'}}</span><br>
                            @endif
                            @if(!is_null($user->phone))
                                <span><i style="font-size: 2em;" class="mdi mdi-phone teal-text"></i>{{$user->phone}}</span>
                            @endif
                    </div>

                    <div class="bio pull-left">
                            @if(!is_null($user->bio))
                                <fieldset>
                                    <legend><b class="grey-text">Bio</b></legend>
                                    <p class="teal-text">
                                        {{$user->bio}}
                                    </p>
                                </fieldset>
                            @endif
                    </div>
                    <div class="experiences pull-left">
                        @if(!is_null($user->bio))
                            <fieldset>
                                <legend><b class="grey-text">Experiences</b></legend>
                                <p class="teal-text">
                                    {{$user->bio}}
                                </p>
                            </fieldset>
                        @endif
                    </div>

                    </div>
                <div class="card-footer">
                    @if($user->hasNoSocial())
                        <p class="teal-text pull-right"><b class="grey-text pull-left">Socials:</b>
                            <i class="mdi mdi-emoticon-sad"></i>
                        </p>
                    @else
                    <div class="socials inline pull-right" style="font-size: 2em;"><b class="grey-text pull-left">Socials:</b>
                        @if(!is_null($user->facebook))
                            <a title="{{'Find'.' '.$user->first_name.' '.'on Facebook'}}" style="padding: 8px;" class="social" target="_blank" href="{{$user->facebook()}}"><i class="mdi mdi-facebook blue-text darken-5"></i></a>
                        @endif
                        @if(!is_null($user->twitter))
                            <a title="{{'Follow'.' '.$user->first_name.' '.'on twitter'}}" style="padding: 8px;" class="social" target="_blank" href="{{$user->twitter()}}"><i class="mdi mdi-twitter light-blue-text"></i></a>
                        @endif
                        @if(!is_null($user->instagram))
                           <a title="{{'Follow '.$user->first_name.' '.'on Instagram' }}" style="padding: 8px;" class="social" target="_blank" href="{{$user->instagram()}}"><i class="mdi mdi-instagram red-text"></i></a>
                        @endif
                        @if(!is_null($user->linkedin))
                           <a title="{{'connect with'.' '.$user->first_name.' on Linkedin'}}" style="padding: 8px;" class="social" target="_blank" href="{{$user->linkedin()}}"><i class="mdi mdi-linkedin blue-grey-text"></i></a>
                        @endif
                        @if(!is_null($user->website))
                           <a title="{{'visit'.' '.$user->first_name.' website'}}" style="padding: 8px;" class="social" target="_blank" href="{{$user->website()}}"><i class="mdi mdi-internet-explorer blue-grey-text"></i></a>
                        @endif
                    </div>
                    @endif
                </div>

                @else
                <div class="card-body center-align">
                     <div class="profileHeader alert alert-success">
                        <img height="120px" width="100px" src="{{asset($user->imagePath())}}">
                    </div>
                    <div class="profileDetails center-align teal-text"><hr>
                    <b>{{$user->name()}}</b>
                    </div><hr>
                   <span class="black-text"> Register or Login to view this User's full profile</span>
                </div>
                @endauth
            </div>
        </div>
    </div>
</div>
@endsection

