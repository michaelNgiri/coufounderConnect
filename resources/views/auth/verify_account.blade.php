@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8">
			<h3>Click the Link To Verify Your Email</h3>
			Click the following link to verify your email {{ url('/verifyemail/' . $email_token) }}

		</div>
	</div>
</div>