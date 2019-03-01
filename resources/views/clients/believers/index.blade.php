@extends('layouts.client_layout')

@section('content')

    @foreach($followers as $f)

    {{ $f->name }} | {{ $f->email }} | {{ $f->point_balance }}<br />

    @endforeach


@endsection
