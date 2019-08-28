@extends('layouts.admin_layout')

@section('mainnav')
<li class="nav-item active"><a href="/admin/clients" class="nav-link">Clients</a></li>
<li class="nav-item"><a href="/admin/rewards" class="nav-link">Rewards</a></li>
<li class="nav-item"><a href="/admin/missiontypes" class="nav-link">Mission Types</a></li>
<li class="nav-item"><a href="/admin/reports" class="nav-link">Reports</a></li>
@endsection

@section('subnav')
<li class="nav-item"><h2>Edit: {{ $client->name }}</h2></li>

@endsection

@section('content')

<form method="POST" enctype="multipart/form-data" action="/admin/updateClient" class="form-horizontal">
    @csrf
    <input type="hidden" name="client_id" id="client_id" value="{{ $client->id }}" />

    <div class="card">
        <div class="card-header"><h4>Client Details</h4></div>

        <div class="card-body">
            <div class="row">

                <div class="col-6">

                    <div class="form-group">
                        <label class="col-sm-12 control-label">Name<span class="req">*</span></label>
                        <div class="col-sm-10">
                            <input type="text" id="name" name="name" class="form-control" value="{{ $client->name }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-6 control-label">Unique Name<span class="req">*</span></label>
                        <small>This the landing page alias (i.e. believerapp.com/<strong>timhortons</strong>). Needs to be one word, lowercase. Can contain dashes(-) or underscores(_).</small>
                        <div class="col-sm-10">
                            <input type="text" id="unique_name" name="unique_name" class="form-control" value="{{ $client->unique_name }}">
                        </div>
                    </div>

                    <div class="form-group"><label class="col-sm-12 control-label">Description<span class="req">*</span></label>
                        <div class="col-sm-10">
                            <textarea class="form-control" rows="5" id="description" name="description">{{ $client->description }}</textarea>

                        </div>
                    </div>

                    <div class="form-group"><label class="col-sm-12 control-label">Primary Logo<span class="req">*</span></label>
                        <small>Some info about the specs for a logo file should go here...</small>
                        <div class="input-group col-12">
                            <div class="custom-file">
                                <input type="file" class="form-control-file" id="clientimage" name="clientimage">
                            </div>
                        </div>
                    </div>

                    <div class="form-group"><label class="col-sm-12 control-label">Secondary Logo</label>
                        <small>Some info about the specs for a logo file should go here...</small>
                        <div class="input-group col-12">
                            <div class="custom-file">
                                <input type="file" class="form-control-file" id="clientimage2" name="clientimage2">
                            </div>
                        </div>
                    </div>

                    <div class="form-group"><label class="col-sm-12 control-label">Banner Image<span class="req">*</span></label>
                        <small>Some info about the specs for a logo file should go here...</small>
                        <div class="input-group col-12">
                            <div class="custom-file">
                                <input type="file" class="form-control-file" id="bannerimage" name="bannerimage">
                            </div>
                        </div>
                    </div>
            </div>



        <div class="col-6">

            <div class="form-group">
                <label class="col-sm-6 control-label">Address<span class="req">*</span></label>
                <div class="col-sm-10">
                    <input type="text" id="address1" name="address1" class="form-control" value="{{ $client->address1 }}" placeholder="Address Line 1"><br />
                    <input type="text" id="address2" name="address2" class="form-control" value="{{ $client->address2 }}" placeholder="Address Line 2 (optional)">
                </div>
            </div>

            <div class="input-group form-group col-10">
                <input type="text" class="form-control" name="city" id="city" placeholder="City" value="{{ $client->city }}">
                <input type="text" class="form-control" name="province" id="province" placeholder="Province/State" value="{{ $client->province }}">
                <input type="text" class="form-control" name="postal_code" id="postal_code" placeholder="Postal/Zip Code" value="{{ $client->postal_code }}">
            </div>

            <div class="form-group">
                <label class="col-sm-6 control-label">Phone<span class="req">*</span></label>
                <div class="col-sm-10">
                    <input type="text" id="phone1" name="phone1" class="form-control" value="{{ $client->phone1 }}" placeholder="Phone 1"><br />
                    <input type="text" id="phone2" name="phone2" class="form-control" value="{{ $client->phone2 }}" placeholder="Phone 2 (optional)">
                </div>
            </div>


        </div>
        </div>
        </div>
    </div>



    <div class="form-group">
        <div class="col-sm-10 col-sm-offset-2">
            <!-- <button class="event-create btn btn-primary" type="submit"><i class="fa fa-check"></i><span> Update Client</span></button> -->
            <a class="event-create btn btn-primary editClient" href="#"><i class="fa fa-check"></i><span> Update Client</span></button>
            <a class="btn btn-white" href="/admin/clients"><i class="fa fa-close"></i> Cancel</a>

        </div>
    </div>
</form>
@endsection

@section('scripts')

@endsection
