@extends('templates.app')
@section('content')
	<h1>Welkom</h1>
	@if ($contents->count())
			@foreach ($contents as $content)
				@if ($content->type == "youtube.com")

				<article class="media">
					<h3>{{ $content->content_title }}</h3>
					<iframe style="width:500px;border:0;min-height:300px;"
							src="{{ $content->url }}">
					</iframe>
				</article>

				@elseif ($content->type == "vimeo.com")
					<p>VIMEO: {{ $content->url }} | {{ $content->type }}</p>
				@endif
			@endforeach
	@else
		<p>Nothing available yet.</p>
	@endif

@stop

