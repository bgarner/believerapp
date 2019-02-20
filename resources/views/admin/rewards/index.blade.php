@extends('layouts.admin_layout')

@section('subnav')
<li class="nav-item">
    <a class="btn btn-primary" href="/admin/rewards/create" role="button"><i class="fa fa-plus"></i> Add New Reward</a>
</li>
@endsection

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body p-10">
            <div class="">
                <table id="table_id" class="datatable">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Image</th>
                        <th>Description</th>
                        <th>Points</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>                                
                @foreach($rewards as $reward)
                <tr id="reward{{ $reward->id }}">
                    <td><a href="/admin/rewards/{{ $reward->id }}">{{ $reward->title }}</a></td>
                    @if(!$reward->image)
                    <td><img src="/uploads/rewards/placeholder.jpg" width="100" /></td>
                    @else
                    <td><img src="/uploads/rewards/{{ $reward->image }}" width="100" /></td>
                    @endif
                    <td>{{ $reward->description }}</td>  
                    <td>{{ $reward->points }}</td>
                    <td>{{ $reward->status }}</td>
                    <td><a href="#" class="btn btn-danger deleteReward" data-item-id="{{ $reward->id }}"><i class="fa fa-trash"></i></a></td>
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

