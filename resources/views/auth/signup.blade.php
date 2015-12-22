@extends('templates.app')
@section('content')
<div class="row">
<div class="col-lg-6 col-lg-offset-3">
	<form class="form-vertical" action="{{ route('auth.signup') }}" method="POST" role="form">
		<legend>Sign up</legend>
	
		<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
			<input type="email" class="form-control" name="email" id="email" placeholder="Email" value="{{ Request::old('email') ?: '' }}">
			@if ($errors->has('email'))
				<span class="help-block">{{ $errors->first('email') }}</span>
			@endif
		</div>
		<div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
			<input type="text" class="form-control" name="username" id="username" placeholder="Username" value="{{ Request::old('username') ?: '' }}">
			@if ($errors->has('username'))
				<span class="help-block">{{ $errors->first('username') }}</span>
			@endif
		</div>
		<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
			<input type="password" class="form-control" name="password" id="password" placeholder="Password">
			@if ($errors->has('password'))
				<span class="help-block">{{ $errors->first('password') }}</span>
			@endif		</div>
		<div class="form-group">
			<button type="submit" class="btn btn-default">Sign up</button>
		</div>
		<input type="hidden" name="_token" value="{{ Session::token() }}">
	</form>
</div>
</div>	
@stop

