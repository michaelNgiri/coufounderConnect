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
		</div>
	</div>
</div>
@endsection