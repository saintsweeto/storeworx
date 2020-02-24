@extends('layouts.app')

@section('content')
    @include('layouts.navigation')
    <div class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="header mt-md-5">
                        <div class="header-body">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h6 class="header-pretitle">Overview</h6>
                                    <h1 class="header-title">Job Orders</h1>
                                </div>
                                <div class="col-auto">
                                    <a href="/jobs/create" class="btn btn-warning lift disabled">New job</a>
                                </div>
                            </div>
                            <div class="row align-items-center">
                                <div class="col">
                                    <ul class="nav nav-tabs nav-overflow header-tabs">
                                        <li class="nav-item">
                                            <a href="/jobs/all" class="nav-link active">
                                                All <span class="badge badge-pill badge-soft-secondary">{{ count($jobs) }}</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="/jobs/reserved" class="nav-link">
                                                Reserved <span class="badge badge-pill badge-soft-secondary">0</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="/jobs/pending" class="nav-link">
                                                Pending <span class="badge badge-pill badge-soft-secondary">0</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="/jobs/completed" class="nav-link">
                                                Completed <span class="badge badge-pill badge-soft-secondary">0</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card" data-toggle="lists">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    <form class="row align-items-center">
                                        <div class="col-auto pr-0">
                                            <span class="fe fe-search text-muted"></span>
                                        </div>
                                        <div class="col">
                                            <input type="search" class="form-control form-control-flush search" placeholder="Search">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-sm table-nowrap card-table">
                                <thead>
                                <tr>
                                    <th>
                                        <div class="custom-control custom-checkbox table-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="job-select-all">
                                            <label class="custom-control-label" for="job-select-all">&nbsp;</label>
                                        </div>
                                    </th>
                                    <th><a href="#" class="text-muted sort" data-sort="job-no">Job #</a></th>
                                    <th><a href="#" class="text-muted sort" data-sort="requester">Requester</a></th>
                                    <th><a href="#" class="text-muted sort" data-sort="from">From</a></th>
                                    <th><a href="#" class="text-muted sort" data-sort="to">To</a></th>
                                    <th><a href="#" class="text-muted sort" data-sort="date">Date</a></th>
                                    <th><a href="#" class="text-muted sort" data-sort="Status">Status</a></th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody class="list">
                                @foreach($jobs as $job)
                                    <tr>
                                        <td>
                                            <div class="custom-control custom-checkbox table-checkbox">
                                                <input type="checkbox" class="custom-control-input" name="ordersSelect" id="job-{{ $job->id }}">
                                                <label class="custom-control-label" for="job-{{ $job->id }}">&nbsp;</label>
                                            </div>
                                        </td>
                                        <td class="job-no">{{ $job->id }}</td>
                                        <td class="requester">
                                            <a href="/profile" class="avatar avatar-xs d-inline-block mr-2">
                                                <img src="/img/user.png" alt="avatar-image" class="avatar-img rounded-circle">
                                            </a>
                                            <span>{{ $job->requester }}</span>
                                        </td>
                                        <td class="from">
                                            {{ $job->from }}
                                        </td>
                                        <td>
                                            {{ $job->to }}
                                        </td>
                                        <td>
                                            {{ date('d M Y', strtotime($job->date)) }}
                                        </td>
                                        <td>
                                            @if($job->status === 'pending')
                                                <span class="text-warning">●</span> Pending
                                            @elseif($job->status === 'reserved')
                                                <span class="text-danger">●</span> Reserved
                                            @endif
                                        </td>
                                        <td>
                                            <a href="/jobs/show/{{ $job->id }}" class="btn btn-primary btn-sm disabled">View</a>
                                            <a href="/jobs/edit/{{ $job->id }}" class="btn btn-outline-warning btn-sm" type="button">Edit</a>
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
    </div>
@endsection
