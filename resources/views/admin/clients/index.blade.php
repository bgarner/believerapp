@extends('layouts.admin')
@section('content')
	<h2>Clients</h2>
	<ul>
	@foreach($clients as $client)
		<li>{{$client->name}}</li>
		<p>{{$client->description}}</p>
	@endforeach
	</ul>
@endsection