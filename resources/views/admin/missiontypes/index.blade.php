@extends('layouts.admin_layout')

@section('mainnav')
<li class="nav-item"><a href="/admin/clients" class="nav-link">Clients</a></li>
<li class="nav-item"><a href="/admin/rewards" class="nav-link">Rewards</a></li>
<li class="nav-item active"><a href="/admin/missiontypes" class="nav-link">Mission Types</a></li>
<li class="nav-item"><a href="/admin/reports" class="nav-link">Reports</a></li>
@endsection

@section('subnav')
<li class="nav-item">
    <a class="btn btn-primary" href="/admin/missiontypes/create" role="button"><i class="fa fa-plus"></i> Add New Mission Type</a>
</li>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body p-10">
            <div class="table-responsive dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                <table id="table_id" class="datatable-missiontypes table table-striped dataTable no-footer">
                <thead>
                    <tr>
                        <th>Type</th>
                        <th>Point Value</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                @foreach($mission_types as $mt)
                <tr id="missionType{{ $mt->id }}">
                    <td><a href="/admin/missiontypes/{{ $mt->id }}/edit">{{ $mt->type }}</a></td>
                    <td>{{ $mt->points }}</td>
                    <td>
                        <h5><a href="#" class="req deleteMissionType" data-item-id="{{ $mt->id }}"><i class="fa fa-trash"></i></a></h5>
                    </td>
                </tr>

                @endforeach
                </tbody>
                </table>
            </div>
            </div>
        </div>
        </div>
    </div>
@endsection
