<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<!-- Yield meta -->
		@yield('meta', '<title>'.$site->name.'</title>')

		<!-- Bootstrap CDN -->
		<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">
		<!-- FontAwesome CDN -->
		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

	</head>
	<body style="padding-top:70px;">

		<!-- Navbar fixed-top -->
		<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
			<div class="container">

				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					{!! HTML::linkRoute('home', $site->name, NULL, array( 'class' => 'navbar-brand' ))!!}
				</div>
			
				<div class="collapse navbar-collapse navbar-ex1-collapse">
					<ul class="nav navbar-nav navbar-right">
						@if (Auth::guest())
							<li>{!! HTML::linkRoute('login', 'Login') !!}</li>
							<li>{!! HTML::linkRoute('register', 'Register') !!}</li>
						@else
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Menu <span class="caret"></span></a>
								<ul class="dropdown-menu" role="menu">
									<li>{!! HTML::linkRoute('logout', 'logout') !!}</li>
									<li>{!! HTML::linkRoute('dashboard', 'Dashboard') !!}</li>
								</ul>
							</li>
						@endif
					</ul>
				</div>

			</div>
		</nav>

		@include('themes.Default.frontend.layouts.alerts')

		<!-- Yield content -->
		@yield('content')

		<!-- Yield Scripts  -->
		@yield('scripts')
		
		<!-- jQuery -->
		<script src="//code.jquery.com/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
	</body>
</html>