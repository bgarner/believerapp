@extends('layouts.client_layout')

@section('mainnav')
<li class="nav-item active"><a href="/client/missions" class="nav-link">Missions</a></li>
<li class="nav-item"><a href="/client/believers" class="nav-link">Believers</a></li>
<li class="nav-item"><a href="/client/messages" class="nav-link">Messages</a></li>
<li class="nav-item"><a href="/client/referrals" class="nav-link">Referrals</a></li>
<li class="nav-item"><a href="/client/reports" class="nav-link">Reports</a></li>
@endsection

@section('content')

        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Mission Details</h4>
                        <div class="card-header-action">
                        <a class="btn btn-primary" href="/client/missions/{{ $mission->id }}/edit" role="button"><i class="fa fa-pencil-square-o"></i> Edit Mission</a>
                        </div>
                    </div>
                    <div class="card-body">

                        <div class="row">
                            <div class="col-6">
                                @if( $mission->image == "")
                                <img src="/images/placeholder.jpg" width="100%" />
                                @else
                                <img src="/uploads/missions/{{ $mission->image }}" />
                                @endif
                            </div>

                            <div class="col-6">
                                <small class="text-muted">{{ $mission->start }} <i class="fa fa-long-arrow-right" aria-hidden="true"></i> {{ $mission->end }}</small>

                                <h4>{{ $mission->name }}</h4>
                                <p>{{ $mission->content }}</p>
                                {{ $mission }}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                  <i class="fa fa-user"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Completions</h4>
                  </div>
                  <div class="card-body">
                    {{ $stats['completion_count']}}
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                  <i class="fa fa-newspaper-o"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Completions This Week</h4>
                  </div>
                  <div class="card-body">
                    {{ $stats['completions_this_week_count']}}
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
              <div class="card">
                <div class="card-body">

                    <div class="table-responsive dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                        <table id="table_id" class="datatable-redemptions table table-striped dataTable no-footer">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Completed On</th>
                                <th>Point Balance</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($stats['users'] as $user)
                        <tr id="believer{{ $user->id }}">
                            <td>{{ $user->first }} {{ $user->last }}<br />
                                <small class="text-muted">{{ $user->email }}</small>
                            </td>
                            <td>{{ $user->address1 }}<br />
                                {{ $user->address2}}
                                {{ $user->city }}, {{ $user->province }}<br />
                                {{ $user->postal_code }}
                            </td>
                            <td>{{ $user->completed_at }}</td>
                            <td>{{ $user->point_balance }}<br />
                                 <small class="text-muted">as of {{ now() }}</small>
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
