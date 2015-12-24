@extends('templates.app')
@section('content')
	<h1>SCRAP<span class="colorMe">3</span>D CONTENT</h1>
	<hr>
	@if ($contents->count())
		@foreach ($contents as $content)
			@if ($content->type == "youtube.com")

				<article class="media gridItem">
					<iframe class="gridVid"
							src="{{ $content->url }}">
					</iframe>
					<div class="gridBody">
						<p class="gridTitle"><a href="{{ route('content.show', ['id' => $content->id]) }}">{{ $content->content_title }}</a></p>
					</div>
				</article>

			@elseif ($content->type == "vimeo.com")
					
				<article class="media gridItem">
					<iframe class="gridVid"
						src="{{ $content->url }}">
					</iframe>
					<div class="gridBody">
						<p class="gridTitle"><a href="{{ route('content.show', ['id' => $content->id]) }}">{{ $content->content_title }}</a></p>
					</div>
				</article>
	
			@elseif ($content->type == "soundcloud.com")
					
				<article class="gridItem website">
					<div class="gridVid">
						<img src="{{ $content->url }}" alt="">
					</div>
					<div class="gridBody">
						<p class="gridTitle"><a href="#">{{ $content->content_title }} (not finished)</a></p>
					</div>
				</article>

			@else
					
				<article class="gridItem website">
					<div class="gridVid">
						<a href="{{ route('content.show', ['id' => $content->id]) }}">
							<img src="{{ $content->url }}" alt="">
						</a>
					</div>
					<div class="gridBody">
						<p class="gridTitle"><a href="{{ route('content.show', ['id' => $content->id]) }}">{{ $content->content_title }}</a></p>
					</div>
				</article>
	
			@endif
		@endforeach
	@else
		<div class="row">
			<div class="col-lg-8 col-lg-offset-2 emptystate text-center">
				<h1>Alas :(</h1>
				<h2>No content available yet.</h2>
				<small class="clearfix">So buddy, why don't you add some content now?</small>
				<a href="{{ Route('content.add') }}" class="btn btn-default btnSeeMe">ADD CONTENT</a>
			</div>
		</div>

	@endif

@stop

