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
<div class="section-header">
    <h1>Audiences</h1>
    <div class="section-header-breadcrumb">
        <form method="POST" enctype="multipart/form-data" action="/clients/believers/invite">
            @csrf
            <label>Audience Name</label>
            <input type="text" id="audience_name" name="audience_name" />
            <input type="hidden" name="client_id" id="client_id" value="{{ $client_id }}" />
            <input type="hidden" name="uploader_id" id="uploader_id" value="{{ $uploader_id }}" />
            <a class="btn btn-sm btn-primary newAudience" href="" role="button"><i class="fa fa-plus" aria-hidden="true"></i> Create a New Audience</a>
        </form>
    </div>
</div>

<div class="section-body">

      <div class="card">
        <div class="card-body">

        </div>
    </div>
</div>
@endsection
