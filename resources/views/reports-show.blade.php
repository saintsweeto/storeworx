@extends('layouts.app')

@section('content')
    @include('layouts.navigation')
    <div class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-10 col-xl-8">
                    <div class="header mt-md-5">
                        <div class="header-body">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h6 class="header-pretitle">
                                        Reports
                                    </h6>
                                    <h1 class="header-title">
                                        Report #SX{{ $report->id }}
                                    </h1>
                                </div>
                                <div class="col-auto">
                                    <a href="#" class="btn btn-white lift disabled"><i class="fe fe-download"></i> Download</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card card-body p-5">
                        <div class="row">
                            <div class="col text-right">
                                <div class="badge badge-danger">Demo</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col text-center">
                                <img src="/img/client-logo.png" class="img-fluid mb-4" style="max-width: 10rem;">
                                <h2 class="mb-2">{{ rtrim(ucfirst($report->type), 's') }} Report from Store<span class="text-warning">Worx</span></h2>
                                <p class="text-muted mb-6">Report #SX{{ $report->id }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <h6 class="text-uppercase text-muted">Report Date</h6>
                                <p class="mb-4">{{ date('d M Y', strtotime($report->created_at)) }}</p>
                                <h6 class="text-uppercase text-muted">Report Name</h6>
                                <p class="mb-4">{{ $report->name }}</p>
                            </div>
                            <div class="col-12 col-md-6 text-md-right">
                                <h6 class="text-uppercase text-muted">Report Type</h6>
                                <p class="text-muted mb-4">
                                    <strong class="text-body text-uppercase">{{ $report->type }}</strong>
                                </p>
                                <h6 class="text-uppercase text-muted">Requester</h6>
                                <p class="mb-4">{{ $report->requester }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table class="table my-4">
                                        <thead>
                                        <tr>
                                            <th class="px-0 bg-transparent border-top-0">
                                                <span class="h6">Item name</span>
                                            </th>
                                            @foreach($fields as $field)
                                                <th class="px-0 bg-transparent border-top-0">
                                                    <span class="h6">{{ $field }}</span>
                                                </th>
                                            @endforeach
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($assets as $asset)
                                            <tr>
                                                <td>{{ $asset->name }}</td>
                                                @for($x = 0; $x < count($fields); $x++)
                                                    <td>{{ rand(10, 100) }}</td>
                                                @endfor
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
        </div>
    </div>
@endsection
