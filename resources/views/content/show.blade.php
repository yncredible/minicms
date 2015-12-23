@extends('templates.app')
@section('content')


	@if ($contents->count())
		@foreach ($contents as $content)

		<div class="row">
		<div class="col-lg-8">
				<iframe class="gridVidLg"
							src="{{ $content->url }}">
				</iframe>
				<h1>{{ $content->content_title }}</h1>
				<hr>
		</div>
		</div>

		@endforeach
	@endif

@stop

