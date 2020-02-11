@extends('layouts.app')

@section('content')
    @include('layouts.navigation')
    <div class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="header mt-md-5">
                        <div class="header-body">
                            <h6 class="header-pretitle">Overview</h6>
                            <h1 class="header-title">Reports</h1>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-xl-7">
                            @if(count($reports) > 0)
                                <div class="card">
                                <div class="card-header">
                                    <h4 class="card-header-title">All generated reports</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12 col-md-4">
                                            <div class="input-group input-group-merge">
                                                <input type="text" class="form-control form-control-prepended search" placeholder="Search">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <span class="fe fe-search"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-2">
                                            <div class="form-group">
                                                <select name="" id="" class="form-control">
                                                    <option value="">All</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12-col-md-2">
                                            <button class="btn btn-white lift">
                                                <i class="fe fe-filter"></i> Clear filters
                                            </button>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="table-responsive mb-0">
                                            <table class="table table-sm table-nowrap card-table">
                                                <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Type</th>
                                                    <th>Requester</th>
                                                    <th>Date</th>
                                                    <th></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($reports as $report)
                                                    <tr>
                                                        <td><span>{{ $report->name }} </span></td>
                                                        <td><span class="badge badge-dark">{{ strtoupper($report->type) }}</span>
                                                        <td>
                                                            <div class="avatar avatar-xs d-inline-block mr-2">
                                                                <img src="/img/user.png" alt="avatar-img" class="avatar-img rounded-circle">
                                                            </div>
                                                            {{ $report->requester }}
                                                        </td>
                                                        <td>{{ date('d M Y', strtotime($report->created_at)) }}</td>
                                                        <td><a href="/reports/show/{{ $report->id }}" class="text-warning">View Report</a></td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @else
                                <div class="card card-inactive">
                                <div class="card-body text-center">
                                    <img src="/dashkit/src/assets/img/illustrations/scale.svg" class="img-fluid" style="max-width: 182px;">
                                    <h1>No reports yet.</h1>
                                    <p class="text-muted">
                                        Create a report using the form in the right hand side
                                    </p>
                                </div>
                            </div>
                            @endif
                        </div>
                        <div class="col-12 col-xl-5">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-header-title">Generate new report</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <form method="POST" action="/reports/store" autocomplete="off">
                                            @csrf
                                            <div class="row">
                                                <div class="col-12 col-md-12">
                                                    <div class="form-group">
                                                        <label>Report name</label>
                                                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name">
                                                        @error('name')
                                                        <div class="invalid-feedback">
                                                            <strong>{{ $message }}</strong>
                                                        </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <div class="form-group">
                                                        <label>Report Type</label>
                                                        <select class="form-control" name="type">
                                                            <option value="assets">Assets</option>
                                                            <option value="jobs">Jobs</option>
                                                            <option value="movements">Movements</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <div class="form-group">
                                                        <label>Requester</label>
                                                        <input type="text" class="form-control @error('requester') is-invalid @enderror" name="requester">
                                                        @error('requester')
                                                        <div class="invalid-feedback">
                                                            <strong>{{ $message }}</strong>
                                                        </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-12">
                                                    <label>Included Assets</label>
                                                    <select class="form-control @error('included_assets') is-invalid @enderror" name="included_assets[]" data-toggle="select" multiple>
                                                        @foreach($assets as $asset)
                                                            <option value="{{ $asset->id }}">{{ $asset->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('included_assets')
                                                    <div class="invalid-feedback">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <hr class="mt-3">
                                            <h6 class="header-pretitle mb-4">Select fields</h6>
                                            <div class="row">
                                                @foreach($fields as $id => $field)
                                                    <div class="col-3 mr-n3"><small class="text-muted">{{ $field }}</small></div>
                                                    <div class="col-3">
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input js-switch" id="{{ $id }}" value="{{ $id }}" name="fields[]">
                                                            <label class="custom-control-label" for="{{ $id }}"></label>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <hr class="mt-5 mb-5">
                                            <button type="submit" class="btn btn-block btn-warning">Generate</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="/dashkit/node_modules/jquery/dist/jquery.min.js"></script>
    <script src="/dashkit/node_modules/select2/dist/js/select2.full.min.js"></script>
    <script src="/dashkit/src/assets/js/select2.js"></script>
@endsection
