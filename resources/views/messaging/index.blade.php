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
                                <span  style="background: #f3f3f3; float: right;" class="btn btn-group-toggle title teal-text"><b>{{__('sent')}}</b></span>
                                <span  style="background: #f3f3f3; float: right;" class="btn btn-group-toggle title teal-text"><b>{{__('inbox')}}</b></span>
                            </div>
                            <span class="white-text" style="text-align: left;">Messages</span>
                        </div>
                        <div class="card-body">

                            <div class="row">
                                 <div class="col-md-12">

                                    @forelse($receivedMessages as $receivedMessage)
                                        <div>
                                            @if($receivedMessage->read == false)
                                                <i style="color: teal;" class="mdi mdi-email"></i>
                                                <p><b><a href="{{route('messaging.read-message',['id'=>$receivedMessage->id,'title'=>$receivedMessage->title])}}">{{$receivedMessage->title}}</a></b></p>

                                            @else
                                                <i style="color: grey;" class="mdi mdi-email-open"></i>
                                                <p><a href="{{route('messaging.read-message',['id'=>$receivedMessage->id,'title'=>$receivedMessage->title])}}">{{$receivedMessage->title}}</a></p>

                                            @endif

                                            <hr>
                                        </div>
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