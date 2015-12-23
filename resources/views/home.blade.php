@extends('templates.app')
@section('content')
	<h1>Welkom</h1>
	<ul>
	@foreach ($contents as $content)
		<li>{{ $content->url }}</li>
	@endforeach
	</ul>
@stop

