@extends('layouts.admin_layout')

@section('content')

<div class="row">
                  <div class="col-12">
                    <div class="card">
                      <div class="card-header">
                        <h4>Clients</h4>
                        <div class="card-header-form">
                          <form _lpchecked="1">
                            <div class="input-group">
                              <input type="text" class="form-control" placeholder="Search">
                              <div class="input-group-btn">
                                <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                              </div>
                            </div>
                          </form>
                        </div>
                      </div>
                      <div class="card-body p-0">
                        <div class="table-responsive">
                          <table class="table table-striped">
                            <tbody><tr>
                              <th>Name</th>
                              <th>Team Members</th>
                              <th>Date Joined</th>
                              <th>Believers</th>
                              <th>Missions Completed</th>
                              <th>Points Awarded</th>
                              <th>Delete</th>
                            </tr>
                            @foreach($clients as $client)
                            <tr>
                              <td><a href="/admin/clients/edit/{{ $client->id }}">{{ $client->name }}</a></td>
                              <td><img alt="image" src="/img/avatar/avatar-5.png" class="rounded-circle" width="20" data-toggle="tooltip" title="" data-original-title="Wildan Ahdian"></td>
                              <td>{{ $client->created_at }}</td>  
                              <td>{{ $client->total_believers }}</td>
                              <td>{{ $client->challenge_completions }}</td>
                              <td>{{ $client->total_points }}</td>
                              <td><a href="#" class="btn btn-danger"><i class="fa fa-trash"></i></a></td>
                            </tr>

                            @endforeach                 
                          </tbody></table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
@endsection