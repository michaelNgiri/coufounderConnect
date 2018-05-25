<!DOCTYPE html>
<html>
<head>
	<title>Email Verification</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css')}}">
</head>
<body>
<div class="container"><br><br><hr>
	<div class="row">
		<div class="col-md-12 " style="text-align: center;">
			<div class="card">
				<div class="card-header">
					<h5 class="" style="color: teal">Email Verification</h5>
				</div>
				<div class="card-body alert alert-success">
					<h3>Hello, <b class=""> {{auth()->user()->first_name}}!</b></h3>
				<h4>Thanks for Registering on KofoundME  platform</h4>
				<h5>there is only one step remaining</h5>
				<a href="{{ route('verification.email',['username'=>auth()->user()->username, 'code'=>auth()->user()->email_verification_code ])}}" class="btn btn-primary" type="submit">Click Here to verify your email</a>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="{{ asset('js/jquery3.3.1.min.js') }}" defer></script>
	<script src="{{ asset('js/bootstrap.js') }}" defer></script>
</body>
</html>



