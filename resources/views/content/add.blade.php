@extends('templates.app')
@section('content')
<div class="row">
<div class="col-lg-6 col-lg-offset-3">
	<form action="{{ route('content.add') }}" method="POST" class="form-inline" role="form">
		<legend> Add content </legend>
		<div class="form-group{{ $errors->has('url') ? ' has-error' : '' }}">
			<input type="text" class="form-control" id="url" name="url" placeholder="URL">
			@if ($errors->has('url'))
				<span class="help-block">{{ $errors->first('url') }}</span>
			@endif		
		</div>
	
		<button type="submit" class="btn btn-default">Add</button>

		<input type="hidden" name="_token" value="{{ Session::token() }}">
	</form>
</div>
</div>
@stop

