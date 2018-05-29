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
                                            @else
                                                <i style="color: darkred;" class="mdi mdi-email-open"></i>
                                            @endif
                                          <p><a href="{{route('messaging.read-message',['id'=>$receivedMessage->id,'title'=>$receivedMessage->title])}}">{{$receivedMessage->title}}</a></p>

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