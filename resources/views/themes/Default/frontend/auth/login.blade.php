<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width, initial-scale=1">

	<title>Sign in</title>

	<!-- Bootstrap CDN -->
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">
	<!-- FontAwesome CDN -->
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
	<!-- Custom CSS -->
	{!! HTML::style('dashboard_css/dashboard.css') !!}

	</head>
	<body class="authenticate">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-6 col-md-offset-3">
					<h1><a href="{{ Link::home() }}"><strong>{{ $site->name }}</strong></a></h1>
					@if(Session::get('authenticate') !== null)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> {{ Session::get('authenticate') }}
						</div>
					@endif
					<div class="panel panel-default">
						<div class="panel-heading">Login</div>
						<div class="panel-body">
							@if (count($errors) > 0)
								<div class="alert alert-danger">
									<strong>Whoops!</strong> There were some problems with your input.<br><br>
									<ul>
										@foreach ($errors->all() as $error)
											<li>{{ $error }}</li>
										@endforeach
									</ul>
								</div>
							@endif

							<form class="form-horizontal" role="form" method="POST" action="/auth/login">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">

								<div class="form-group">
									<label class="col-md-4 control-label">E-Mail Address</label>
									<div class="col-md-6">
										<input type="email" class="form-control" name="email" value="{{ old('email') }}">
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-4 control-label">Password</label>
									<div class="col-md-6">
										<input type="password" class="form-control" name="password">
									</div>
								</div>

								<div class="form-group">
									<div class="col-md-6 col-md-offset-4">
										<div class="checkbox">
											<label>
												<input type="checkbox" name="remember"> Remember Me
											</label>
										</div>
									</div>
								</div>

								<div class="form-group">
									<div class="col-md-6 col-md-offset-4">
										<button type="submit" class="btn btn-primary">
											Login
										</button>
										<a href="{{ route('register') }}" class="btn btn-default" style="margin-right: 15px;">Register</a>
										<a href="/password/email">Forgot Your Password?</a>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
@yield('scripts')
<!-- jQuery -->
<script src="//code.jquery.com/jquery.js"></script>
<!-- Bootstrap JavaScript -->
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
</body>
</html>