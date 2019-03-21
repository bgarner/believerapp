@extends('layouts.client_layout')

@section('mainnav')
<li class="nav-item"><a href="/client/missions" class="nav-link">Missions</a></li>
<li class="nav-item"><a href="/client/believers" class="nav-link">Believers</a></li>
<li class="nav-item active"><a href="/client/messages" class="nav-link">Messages</a></li>
<li class="nav-item"><a href="/client/referrals" class="nav-link">Referrals</a></li>
<li class="nav-item"><a href="/client/reports" class="nav-link">Reports</a></li>
@endsection


@section('content')

<form method="POST" id="message-form" enctype="multipart/form-data" action="/client/messages" class="form-horizontal">
    @csrf
    <input type="hidden" name="brand_id" id="brand_id" value="{{ $brand_id }}" />
    <input type="hidden" name="body" id="body" value="{{ $brand_id }}" />
    <div class="card">
        <div class="card-header"><h4>Create a New Message</h4></div>

        <div class="card-body">
            <div class="row">

                <div class="col-8">

                    <div class="form-group">
                        <label class="col-sm-12 control-label">Subject<span class="req">*</span></label>
                        <div class="col-sm-10">
                            <input type="text" id="subject" name="subject" class="form-control" value="" required>
                        </div>
                    </div>


                    <div class="form-group"><label class="col-sm-12 control-label">Message<span class="req">*</span></label>
                        <div class="col-sm-10">
                            <div class="editable"></div>
                        </div>
                    </div>


                    <div class="form-group"><label class="col-sm-12 control-label">Action Title</label>
                        <small>This is the text that will appear on the action button at the bottom of your message.</small>
                        <div class="col-sm-10">
                            <input type="text" id="action_title" name="action_title" class="form-control" value="" />
                        </div>
                    </div>

                    <div class="form-group"><label class="col-sm-12 control-label">Action URL</label>
                        <small>When the action button is clicked, this is where the user will be taken. Don't foget to include 'http://'</small>
                        <div class="col-sm-10">
                            <input type="text" id="action_url" name="action_url" class="form-control" value="" />
                        </div>
                    </div>
                </div>

                <div class="col-4">
                    <div class="form-group"><label class="col-sm-12 control-label">Audience</label>
                        <small>Select an audience to send this message to.</small>
                        <div class="col-sm-10">
                            <select name="audience_select" id="audience_select" class="form-control">
                                <option></option>
                                @foreach($audiences as $audience)
                                    <option value="{{ $audience->id }}">{{ $audience->name }}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>


                </div>
            </div>

        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-10 col-sm-offset-2">
            <button class="message-create btn btn-primary" type="submit"><i class="fa fa-check"></i><span> Create Message</span></button>
            <a class="btn btn-white" href="/clients/messages"><i class="fa fa-close"></i> Cancel</a>

        </div>
    </div>
</form>

@endsection
