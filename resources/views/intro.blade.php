<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Laravel</title>

	<link href="{{ asset('/css/app.css') }}" rel="stylesheet">

	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="{{ url('/Introduction') }}">Answer It</a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
				<li><a href="{{ url('/feedback') }}">Contact Us</a></li>
				</ul>
					<ul class="nav navbar-nav navbar-right">
					@if (Auth::guest())
						<li><a href="{{ url('/auth/login') }}">Login</a></li>
						<li><a href="{{ url('/auth/register') }}">Register</a></li>
						
					@else
					<ul class="nav navbar-nav">	
						<li><a href="{{ url('/') }}">Home</a></li>
						<li><a href="{{ url('/auth/logout') }}">Logout</a></li>
					</ul>
					@endif
				</ul>
			</div>
		</div>
	</nav>

<div class="container">
	<div class="row">
	<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
			<h3>What is Answer It</h3>
			<img src="{{ asset('/img/ansIt.jpg') }}" class="img-responsive"><br>
			How can you use Answer It:
			<ul>
			<li>Ask question to your friend</li>
			<li>You can see your question on your friend's Wall after his/her approval</li>
			<li>You can Answer all questions and submit them</li>
			</ul> 
			<br>
			Note:This webApp is of Feedback category so the options are always either "Yes", "No" or "Yes,I think". So please post questions accordingly.
			</div>
	</div>
	</div>
</div>
	<!-- Scripts -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
<script type="text/javascript" src="{{ asset('/js/client_side.js') }}"></script>
<script type="text/javascript" src="{{ asset('/js/store.js') }}"></script>
</body>
</html>
