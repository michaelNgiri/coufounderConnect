@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-8">
					<a href="{{route('messaging.send-message')}}" class="btn btn-secondary">
						<i class="mdi mdi-message"></i>
						Send a Private Message</a>
				</div>
			</div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header teal">
                            <span class="white-text" style="float:right;">My Messages</span>
                        </div>
                        <div class="card-body">

                            <div class="row">
                                <div class="col-md-5">
                                    @forelse($sentMessages as $sentMessage)
                                    <p class="title teal-text">Sent Messages</p>
                                    <span class="message">
                                        {{$sentMessage->title}}
                                    </span>
                                    <hr>
                                    @empty
                                        <p class="grey-text">No Messages</p>
                                    @endforelse
                                </div>
                                <div class="col-md-2" role="separator"></div>
                                <div class="col-md-5">
                                    @forelse($receivedMessages as $receivedMessage)
                                        <p class="title teal-text">Received Messages</p>
                                        <span class="message">
                                        {{$receivedMessage->title}}
                                    </span>
                                        <span class="message">
                                            <div class="row">
                                                <div class="col-md-8 messageBody">
                                                    <p style="float: right; font-family:monospace;"></p>
                                                    {{--{{$sentMessage->message_body}}--}}
                                                </div>
                                            </div>
                                    </span>
                                        <hr>
                                    @empty
                                        <p class="grey-text">No Messages</p>
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