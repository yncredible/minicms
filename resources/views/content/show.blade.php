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
						<div class="form-group{{ $errors->has('comment') ? ' has-error' : '' }}">
							<input style="max-width:100%;width:400px;" type="text" class="form-control" name="comment" id="comment" placeholder="Comment" value="{{ Request::old('comment') ?: '' }}">
							@if ($errors->has('comment'))
								<span class="help-block">{{ $errors->first('comment') }}</span>
							@endif
						</div>					
						<button type="submit" class="btn btn-default btnSeeMe">Add Comment</button>
						<input type="hidden" name="_token" value="{{ Session::token() }}">
						<input type="hidden" name="content_id" value="{{ $content->id }}">
					</form>
				</div>
			</div>
			<div class="col-lg-4">
				<h3>{{ $content->content_title }}</h3>
				<small>scraped from {{ $content->type }}</small>
				<hr>
				@if ($comments)
					<h4>{{ $count }} comments</h4>
					@foreach ($comments as $comment)
						<div class="commentItem clearfix">
							<div class="avatar pull-left"></div>
							<div class="commentBody pull-left">
								<h5>{{ $comment->username }} said:</h5>
								<p>{{ $comment->comment }}</p>
							</div>
						</div>
					@endforeach
				@else
					<div class="commentItem emptystate text-center">
						<h1>Alas :(</h1>
						<h4>No comments available yet.</h4>
						<small class="clearfix">Why don't you write the first comment?</small>
					</div>
				@endif
			</div>
		</div>

		@endforeach
	@endif

@stop

