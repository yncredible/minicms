@extends('templates.app')
@section('content')


	@if ($contents->count())
		@foreach ($contents as $content)

		<div class="row">
			<div class="col-lg-8">
				<div class="media">
					@if ($content->type == "youtube.com" || $content->type == "vimeo.com")
							<iframe class="gridVidLg"
										src="{{ $content->url }}">
							</iframe>
					@else
							<img class="gridVidLg imgLg" src="{{ $content->url }}" alt="">
					@endif
				</div>
				<hr>
				<div class="commentForm">
					<form action="{{ route('comment.add') }}" method="POST" class="form-inline" role="form">				
						<div class="form-group">
							<input style="width:400px" type="text" class="form-control" name="comment" id="comment" placeholder="Comment">
						</div>					
						<button type="submit" class="btn btn-default btnSeeMe">Add Comment</button>
						<input type="hidden" name="_token" value="{{ Session::token() }}">
					</form>
				</div>
			</div>
			<div class="col-lg-4">
				<h3>{{ $content->content_title }}</h3>
				<hr>
			</div>
		</div>

		@endforeach
	@endif

@stop

