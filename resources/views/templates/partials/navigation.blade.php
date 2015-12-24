<nav class="navbar navbar-inverse" role="navigation">
	<!-- Brand and toggle get grouped for better mobile display -->
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="/">SCRAP<span class="colorMe">3</span>R</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse navbar-ex1-collapse">
			<ul class="nav navbar-nav">
				<li><a href="/">Home</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
			@if (Auth::check())
				<li class="navbar-brand">Hi, {{ Auth::user()->username }}</li>
				<li><a class="btnSeeMe" href="{{ route('content.add') }}">Add Content</a></li>
				<li><a href="{{ route('auth.signout') }}"><small>Sign out</small></a></li>
			@else
				<li><a class="btnSeeMe" href="{{ route('auth.signup') }}">Sign up</a></li>
				<li><a href="{{ route('auth.signin') }}"><small>Sign in</small></a></li>
			@endif
			</ul>
		</div><!-- /.navbar-collapse -->
	</div>
</nav>