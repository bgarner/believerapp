@extends('layouts.client_layout')

@section('subnav')
<li class="nav-item">
    <a class="btn btn-primary" href="/client/missions/create" role="button"><i class="fa fa-plus"></i> Create a New Mission</a>
</li>
@endsection

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body p-10">
            <div class="table-responsive dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                <table id="table_id" class="datatable-clients table table-striped dataTable no-footer">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Start</th>
                        <th>End</th>
                        <th>Completed</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
{{--                 @foreach($clients as $client)
                <tr id="client{{ $client->id }}">
                    <td><a href="/client/missions/{{ $client->id }}">{{ $client->name }}</a></td>
                    <td>{{ $client->created_at }}</td>
                    <td>{{ $client->total_believers }}</td>
                    <td>{{ $client->challenge_completions }}</td>
                    <td>{{ $client->total_points }}</td>
                    <td>
                        <h3><a href="#" class="req deleteClient" data-item-id="{{ $client->id }}"><i class="fa fa-trash"></i></a></h3>
                    </td>
                </tr>

                @endforeach --}}
                </tbody>
                </table>
            </div>
            </div>
        </div>
        </div>
    </div>
@endsection
