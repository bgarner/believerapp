@extends('layouts.client_layout')

@section('subnav')
<li class="nav-item">
    <a class="nav-link" href="/client/believers/invite" role=""><i class="fa fa-envelope-o" aria-hidden="true"></i> Invite</a>
</li>
<li class="nav-item">
    <a class="nav-link" href="/client/believers/audiences" role=""><i class="fa fa-users" aria-hidden="true"></i> Audiences</a>
</li>
@endsection

@section('content')
    audiences
@endsection
