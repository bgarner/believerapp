@extends('layouts.client_layout')

@section('mainnav')
<li class="nav-item"><a href="/client/missions" class="nav-link">Missions</a></li>
<li class="nav-item"><a href="/client/believers" class="nav-link">Believers</a></li>
<li class="nav-item active"><a href="/client/messages" class="nav-link">Messages</a></li>
<li class="nav-item"><a href="/client/referrals" class="nav-link">Referrals</a></li>
<li class="nav-item"><a href="/client/reports" class="nav-link">Reports</a></li>
@endsection

@section('subnav')
<li class="nav-item">
    <a class="btn btn-primary" href="/client/messages/create" role="button"><i class="fa fa-plus"></i> Create a New Message</a>
</li>
@endsection

@section('content')
<div class="card">
    <div class="card-header"><h4>{{ $message->subject }}</h4></div>
    <div class="card-body">
        {!! $message->body !!}
    </div>

</div>
@endsection
