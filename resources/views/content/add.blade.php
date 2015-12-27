@extends('templates.app')
@section('content')
<div class="row">
<div class="col-lg-6 col-lg-offset-3">
	<form action="{{ route('content.add') }}" method="POST" class="form-inline" role="form">
		<legend> Add content </legend>
		<div class="form-group{{ $errors->has('url') ? ' has-error' : '' }}">
			<input style="width:400px" type="text" class="form-control" id="url" name="url" placeholder="URL">
			@if ($errors->has('url'))
				<span class="help-block">{{ $errors->first('url') }}</span>
			@endif		
		</div>
	
		<button type="submit" class="btn btn-default btnSeeMe">Add Content</button>

		<input type="hidden" name="_token" value="{{ Session::token() }}">
	</form>
	<hr>
	<div class="instructions emptystate">
		<h1>Helper</h1>
		<h3>I. Youtube</h3>
		<p>Copy a YouTube URL <span class="help-block">Example: https://www.youtube.com/watch?v=jRt-wkzr5Kg</span></p>
		<h3>II. Vimeo</h3>
		<p>Copy a Vimeo URL <span class="help-block">Example: https://vimeo.com/18047390</span></p>
		<h3>III. SoundCloud</h3>
		<p>Copy a SoundCloud URL <span class="help-block">Example: https://soundcloud.com/50_cent/im-the-man-ft-sonny-digital</span></p>
		<h3>IIII. Random</h3>
		<p>Copy a random URL, fetch first <code>img</code> <span class="help-block">Example: http://yannicknijs.be/</span></p>
	</div>
</div>
</div>
@stop

