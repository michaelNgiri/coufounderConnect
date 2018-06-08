@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-8">
                    {{--{{route('messaging.send-message')}}--}}
					<a href="" class="btn btn-secondary" disabled title="Customized Messaging: available on premium mode">
						<i class="mdi mdi-message" onclick="alert('Private Messaging is available on premium mode only')"></i>
						Send a Customized Message <b class="red-text">(premium)</b></a>
				</div>
			</div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header teal">
                            <div>
                                <span class="btn btn-group-toggle title teal-text pull-right grey lighten-5"><b>{{__('sent')}}</b></span>
                                <span class="btn btn-group-toggle title teal-text grey lighten-5 pull-right"><b>{{__('inbox')}}</b></span>
                            </div>
                            <span class="white-text pull-left">Messages</span>
                        </div>
                        <div class="card-body">

                            <div class="row">
                                 <div class="col-md-12">

                                    @forelse($receivedMessages as $receivedMessage)
                                        <div>
                                            @if(!$receivedMessage->read())
                                                <i class="mdi mdi-email teal-text">{{$receivedMessage->sender()->name()}}</i>
                                                <form action="{{route('messaging.read-message',['title'=>$receivedMessage->title])}}">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{$receivedMessage->id}}">
                                                    <p><b><button title="read message" class="teal white-text btn btn-success" type="submit">{{$receivedMessage->title}}</button></b>
                                                    <span>{{Str::words($receivedMessage->message_body, 8,'....')}}</span>
                                                        <span class="teal-text" style="float: right;">{{$receivedMessage->timeStamp()}}</span>
                                                    </p>
                                                </form>


                                            @else
                                                <i class="mdi mdi-email-open blue-grey-text">{{$receivedMessage->sender()->name()}}</i>
                                                <form action="{{route('messaging.read-message',['title'=>$receivedMessage->title])}}">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{$receivedMessage->id}}">
                                                    <p><b><button title="read message" class="grey white-text btn btn-success" type="submit">{{$receivedMessage->title}}</button></b>
                                                        <span>{{Str::words($receivedMessage->message_body, 8,'....')}}</span>
                                                        <span class="teal-text" style="float: right;">{{$receivedMessage->timeStamp()}}</span>
                                                    </p>
                                                </form>
                                            @endif

                                            <hr>
                                        </div>
                                    @empty
                                        <p class="grey-text">No new Message</p>
                                    @endforelse
                                </div>
                            </div>


                        </div>
                        <div class="card-footer">

                        </div>
                    </div>
                </div>
            </div>
		</div>
	</div>
</div>
@endsection