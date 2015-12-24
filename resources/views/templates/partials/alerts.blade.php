@if (Session::has('info'))
	<div class="alert alert-scraper" role="alert">
		{{ Session::get('info') }}
	</div>
@endif