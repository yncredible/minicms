<nav class="navbar navbar-default" role="navigation">
	<!-- Brand and toggle get grouped for better mobile display -->
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="/">SCRAP3R</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse navbar-ex1-collapse">
			<ul class="nav navbar-nav">
				<li><a href="/">Home</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
			@if (Auth::check())
				<li class="navbar-brand">Hi, {{ Auth::user()->username }}</li>
				<li><a href="#">Add</a></li>
				<li><a href="#">Log out</a></li>
			@else
				<li><a href="{{ route('auth.signup') }}">Sign up</a></li>
				<li><a href="{{ route('auth.signin') }}">Sign in</a></li>
			@endif
			</ul>
		</div><!-- /.navbar-collapse -->
	</div>
</nav>