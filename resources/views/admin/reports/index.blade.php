@extends('layouts.admin_layout')

@section('mainnav')
<li class="nav-item"><a href="/admin/clients" class="nav-link">Clients</a></li>
<li class="nav-item"><a href="/admin/rewards" class="nav-link">Rewards</a></li>
<li class="nav-item active"><a href="/admin/reports" class="nav-link">Reports</a></li>
@endsection

@section('content')
<p>This is the REPORT index view</p>
@endsection
