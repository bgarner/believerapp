@extends('layouts.admin_layout')

@section('mainnav')
<li class="nav-item"><a href="/admin/clients" class="nav-link">Clients</a></li>
<li class="nav-item"><a href="/admin/rewards" class="nav-link">Rewards</a></li>
<li class="nav-item active"><a href="/admin/redemptions" class="nav-link">Reward Redemptions</a></li>
<li class="nav-item"><a href="/admin/missiontypes" class="nav-link">Mission Types</a></li>
<li class="nav-item"><a href="/admin/reports" class="nav-link">Reports</a></li>
@endsection

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body p-10">
            <div class="table-responsive dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                <table id="table_id" class="datatable-redemptions table table-striped dataTable no-footer">
                <thead>
                    <tr>
                        <th>User</th>
                        <th>Reward</th>
                        <th>Redemption Date</th>
                        <th>Completed At</th>
                        <th>Complete</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($redemptions as $r)
                <tr id="redemption{{ $r->id }}">
                    <td><strong>{{ $r->user->first }} {{ $r->user->last}}</strong>
                        <p style="font-weight: normal; line-height: 1.2">
                            {{$r->user->address1}}<br />
                            @if($r->user->address2)
                            {{$r->user->address2}}<br />
                            @endif
                            {{$r->user->city}}, {{$r->user->province}}<br />
                            {{$r->user->postal_code}}<br />
                            {{$r->user->email}}<br />
                        </p>
                    </td>
                    <td>{{ $r->reward->title }}</td>
                    <td>{{ $r->created_at }}</td>
                    <td>{{ $r->completed }}</td>
                    {{-- <td>{{ $client->total_believers }}</td>
                    <td>{{ $client->challenge_completions }}</td>
                    <td>{{ $client->total_points }}</td> --}}
                    <td>
                        <h5>
                            @if($r->completed)
                            <a href="#" class="redeemed markAsRedeemed" data-item-id="{{ $r->id }}"><i class="fa fa-check"></i></a>
                            @else
                            <a href="#" class="notRedeemed markAsRedeemed" data-item-id="{{ $r->id }}"><i class="fa fa-check"></i></a>
                            @endif
                        </h5>
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
