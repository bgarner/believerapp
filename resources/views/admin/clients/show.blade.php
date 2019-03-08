@extends('layouts.admin_layout')

@section('logo')
  @if($client->logo != null)
    <img src="/uploads/clients/{{ $client->logo }}" class="profile-logo" />
  @endif
@endsection

@section('subnav')
  @if($client->logo == null)
    <li class="nav-item"><h2>{{ $client->name }}</h2></li>
  </ul>
  @endif
<ul class="navbar-nav pull-right" style="float: right;">
    <li class="nav-item" style="padding-right: 10px;"><a href="/{{ $client->unique_name }}" target="_blank"><i class="fa fa-share" aria-hidden="true"></i> believerapp.com/<strong>{{ $client->unique_name }}</strong></a></li>
    <li class="nav-item">
        <a class="btn btn-primary" href="/admin/clients/{{ $client->id }}/edit" role="button"><i class="fa fa-pencil-square-o"></i> Edit</a>
    </li>

@endsection

@section('content')
@if($client->logo == null)
<div class="row">
@else
<div class="row" style="padding-top: 60px;">
@endif
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                  <i class="fa fa-user"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Believers</h4>
                  </div>
                  <div class="card-body">
                    {{ $stats['follower_count'] }}
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                  <i class="fa fa-newspaper-o"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Active Missions</h4>
                  </div>
                  <div class="card-body">
                    {{ $stats['active_missions'] }}
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                  <i class="fa fa-file"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>All-Time Mission Completions</h4>
                  </div>
                  <div class="card-body">
                    {{ $stats['mission_completions'] }}
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                  <i class="fa fa-circle"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Points Awarded</h4>
                  </div>
                  <div class="card-body">
                    {{ $stats['total_points'] }}
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-6 col-md-6 col-12">
              <div class="card">
                <div class="card-header">
                  <h4>Leaderboard</h4>
                </div>
                <div class="card-body">
                    @foreach($stats['leaderboard'] as $leader)
                    <div class="mb-4">
                        <div class="text-small float-right font-weight-bold text-muted">{{ $leader->point_balance }}</div>
                        <div class="font-weight-bold mb-1">{{ $leader->first }} {{ $leader->last }}
                        <small class="text-muted">{{ $leader->city }}, {{ $leader->province }}</small>
                        </div>

                    </div>
                    @endforeach

                </div>
              </div>

            </div>
            <div class="col-lg-6 col-md-6 col-12">
              <div class="card">
                <div class="card-header">
                  <h4>This Week Stats</h4>
                  <div class="card-header-action">
                  </div>
                </div>
                <div class="card-body">
                  <div class="summary">
                    <div class="summary-info">
                      <h4>{{ $stats['total_points_this_week'] }} points</h4>
                      <div class="text-muted">on {{ $stats['mission_completions_this_week'] }} completed missions.</div>
                      <div class="d-block mt-2">
                        {{-- <a href="#">View All</a> --}}
                      </div>
                    </div>

                  </div>
                </div>
              </div>

            </div>
          </div>
@endsection
