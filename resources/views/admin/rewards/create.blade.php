@extends('layouts.admin_layout')

@section('subnav')
<li><h2>Add a New Reward</h2></li>
@endsection

@section('content')
<form method="POST" enctype="multipart/form-data" action="/admin/rewards" class="form-horizontal">
    @csrf

    <div class="card">
        <div class="card-header"><h4>Reward Details</h4></div>

        <div class="card-body">        
            <div class="row">

                <div class="col-12">

                    <div class="form-group">
                        <label class="col-sm-12 control-label">Title<span class="req">*</span></label>
                        <div class="col-sm-12">
                            <input type="text" id="title" name="title" class="form-control" value="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-12 control-label">Reward Type<span class="req">*</span></label>
                        <div class="col-sm-12">
                            <select class="custom-select" id="reward_type_id" name="reward_type_id">
                                <option></option>
                                @foreach($types as $type)
                                <option value="{{ $type->id }}">{{ $type->type }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>                    

                    <div class="form-group"><label class="col-sm-12 control-label">Description<span class="req">*</span></label>
                        <div class="col-sm-12">
                            <textarea class="form-control" rows="5" id="description" name="description"></textarea>
                        </div>
                    </div>

                    <div class="form-group"><label class="col-sm-12 control-label">Points<span class="req">*</span></label>
                        <div class="col-sm-12">
                            <input type="text" id="points" name="points" class="form-control" value="">
                        </div>
                    </div>                    

                    <div class="form-group"><label class="col-sm-12 control-label">Image<span class="req">*</span></label>
                        <small>Some info about the specs for a logo file should go here...</small>
                        <div class="input-group col-12">
                            <div class="custom-file">
                                <input type="file" class="form-control-file" id="rewardimage" name="rewardimage">
                            </div>
                            <!-- <div class="input-group-append">
                                <span class="input-group-text" id="">Upload</span>
                            </div> -->
                        </div>
                    </div>
                </div>
        </div>
        </div>
    </div>



    <div class="form-group">
        <div class="col-sm-10 col-sm-offset-2">
            <button class="client-create btn btn-primary" type="submit"><i class="fa fa-check"></i><span> Create New Reward</span></button>
            <a class="btn btn-white" href="/admin/rewards"><i class="fa fa-close"></i> Cancel</a>

        </div>
    </div>
</form>
@endsection