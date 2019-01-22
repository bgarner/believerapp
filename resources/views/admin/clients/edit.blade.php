@extends('layouts.admin')
@section('title', 'Edit Client')
@section('content')
<form method="POST" action="/admin/clients/{{$client->id}}" class="form-horizontal">
    @method('patch')
    @csrf
    <div class="form-group">
        <label class="col-sm-2 control-label">Name<span class="req">*</span></label>
        <div class="col-sm-10">
            <input type="text" id="name" name="name" class="form-control" value="{{$client->name}}">
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">Unique Name<span class="req">*</span></label>
        <div class="col-sm-10">
            <input type="text" id="unique_name" name="unique_name" class="form-control" value="{{$client->unique_name}}">
        </div>
    </div>

    <div class="form-group"><label class="col-sm-2 control-label">Description<span class="req">*</span></label>
        <div class="col-sm-10">
            <textarea class="form-control" rows="5" id="description" name="description">{{$client->description}}</textarea>

        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-10 col-sm-offset-2">
            <a class="btn btn-white" href="/admin/clients"><i class="fa fa-close"></i> Cancel</a>
            <button class="event-create btn btn-primary" type="submit"><i class="fa fa-check"></i><span> Update Client</span></button>

        </div>
    </div>
</form>
@endsection

@section('scripts')

@endsection