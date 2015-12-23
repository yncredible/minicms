@extends('templates.app')
@section('content')
	<h1>SCRAP3D CONTENT</h1>
	<hr>
	@if ($contents->count())
		@foreach ($contents as $content)
			@if ($content->type == "youtube.com")

				<article class="media gridItem">
					<iframe class="gridVid"
							src="{{ $content->url }}">
					</iframe>
					<div class="gridBody">{{ $content->content_title }}</div>
				</article>

			@elseif ($content->type == "vimeo.com")
					
				<article class="media gridItem">
					<iframe class="gridVid"
						src="{{ $content->url }}">
					</iframe>
					<div class="gridBody">{{ $content->content_title }}</div>
				</article>
	
			@elseif ($content->type == "soundcloud.com")
					
				<article class="media gridItem">
					<div class="gridVid"></div>
					<div class="gridBody">{{ $content->content_title }}</div>
				</article>

			@else
					
				<article class="media gridItem">
					<div class="gridVid"></div>
					<div class="gridBody">{{ $content->content_title }}</div>
				</article>
	
			@endif
		@endforeach
	@else

		<p>Nothing content available yet.</p>

	@endif

@stop

