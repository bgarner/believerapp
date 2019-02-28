@extends('layouts.client_layout')

@section('subnav')
<li class="nav-item">
    <a class="btn btn-primary" href="/client/missions/create" role="button"><i class="fa fa-plus"></i> Create a New Mission</a>
</li>
@endsection

@section('content')
<form method="POST" enctype="multipart/form-data" action="/client/missions" class="form-horizontal needs-validation">
    @csrf

    <div class="card">
        <div class="card-header"><h4>Create a New Mission</h4></div>

        <div class="card-body">
            <div class="row">

                <div class="col-6">

                    <div class="form-group">
                        <label class="col-sm-12 control-label">Title<span class="req">*</span></label>
                        <div class="col-sm-10">
                            <input type="text" id="name" name="name" class="form-control" value="" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-12 control-label">Misson Type<span class="req">*</span></label>
                        <div class="col-sm-10">
                            <select class="form-control" id="challenge_type" name="challenge_type" required>
                                <option></option>
                                @foreach($challenge_types as $type)
                                <option value="{{ $type->id }}">{{ $type->type }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group"><label class="col-sm-12 control-label">Description<span class="req">*</span></label>
                        <div class="col-sm-10">
                            <textarea class="form-control" rows="5" id="description" name="description" required></textarea>

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-6 control-label">Start and End Date<span class="req">*</span></label>
                        <div class="col-sm-10">
                            <input type="text" id="mission_create_daterange" class="form-control" id="missionrange" name="missionrange" value="">
                            <input type="hidden" id="start" name="start" value="" />
                            <input type="hidden" id="end" name="end" value="" />
                        </div>
                    </div>



                    <div class="form-group"><label class="col-sm-12 control-label">Image<span class="req">*</span></label>
                        <small>Some info about the specs for a logo file should go here...</small>
                        <div class="input-group col-12">
                            <div class="custom-file">
                                <input type="file" class="form-control-file" id="missionimage" name="missionimage" required>
                            </div>
                        </div>
                    </div>
            </div>


        </div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-10 col-sm-offset-2">
            <button class="client-create btn btn-primary" type="submit"><i class="fa fa-check"></i><span> Create Mission</span></button>
            <a class="btn btn-white" href="/admin/clients"><i class="fa fa-close"></i> Cancel</a>

        </div>
    </div>
</form>

@endsection
