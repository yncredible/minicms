@extends('templates.app')
@section('content')
	<h1>Welkom</h1>
	@if ($contents->count())
			@foreach ($contents as $content)
				@if ($content->type == "youtube.com")

					<article class="media">
						<h3>{{ $content->content_title }}</h3>
						<iframe style="width:500px;border:0;min-height:281px;"
								src="{{ $content->url }}">
						</iframe>
					</article>

				@elseif ($content->type == "vimeo.com")
						
					<article class="media">
						<h3>{{ $content->content_title }}</h3>
						<iframe style="width:500px;border:0;min-height:281px;"
							src="{{ $content->url }}">
						</iframe>
					</article>
		
				@endif
			@endforeach
	@else
		<p>Nothing available yet.</p>
	@endif

@stop

