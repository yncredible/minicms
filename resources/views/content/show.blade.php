@extends('templates.app')
@section('content')


	@if ($contents->count())
		@foreach ($contents as $content)

		<div class="row">
		<div class="col-lg-8">
		@if ($content->type == "youtube.com" || $content->type == "vimeo.com")
				<iframe class="gridVidLg"
							src="{{ $content->url }}">
				</iframe>
		@else
				<img class="gridVidLg imgLg" src="{{ $content->url }}" alt="">
		@endif
				<h1>{{ $content->content_title }}</h1>
				<hr>
		</div>
		</div>

		@endforeach
	@endif

@stop

