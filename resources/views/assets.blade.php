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
                            <h1 class="header-title">Assets</h1>
                        </div>
                    </div>

                    <div class="row">
                        @foreach($assets as $asset)
                            <div class="col-12 col-md-3">
                                <div class="card">
                                    <a href="#" data-toggle="modal" data-target="#asset-check-{{ $asset->id }}">
                                        <img src="{{ $asset->upload ? \Illuminate\Support\Facades\Storage::url('uploads/'.$asset->upload['temp']) : '/img/placeholder.png' }}" class="card-img-top">
                                    </a>
                                    <div class="card-body">
                                        <div class="row align-items-center mb-4">
                                            <div class="col">
                                                <h3 class="mb-2">
                                                    <a href="#" data-toggle="modal" data-target="#asset-check-{{ $asset->id }}">{{ $asset->name }}</a>
                                                </h3>
                                                <p class="small text-muted mb-0">{{ $asset->description }}</p>
                                            </div>
                                        </div>
                                        <div class="row no-gutters border-top border-bottom">
                                            <div class="col-6 py-4 text-center">
                                                <h6 class="text-uppercase text-success">Available</h6>
                                                <h2 class="mb-0">{{ $asset->available }}</h2>
                                            </div>
                                            <div class="col-6 py-4 text-center border-left">
                                                <h6 class="text-uppercase text-danger">Reserved</h6>
                                                <h2 class="mb-0">{{ $asset->reserved }}</h2>
                                            </div>
                                        </div>
                                        <div class="list-group list-group-flush mb-4">
                                            <div class="list-group-item">
                                                <div class="row align-items-center">
                                                    <div class="col">
                                                        <small>Location</small>
                                                    </div>
                                                    <div class="col-auto">
                                                        <small class="text-muted">{{ $asset->location }}</small>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="list-group-item">
                                                <div class="row align-items-center">
                                                    <div class="col">
                                                        <small>Finishes</small>
                                                    </div>
                                                    <div class="col-auto">
                                                        <small class="text-muted">{{ $asset->finishes }}</small>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="list-group-item">
                                                <div class="row align-items-center">
                                                    <div class="col">
                                                        <small>Dimensions</small>
                                                    </div>
                                                    <div class="col-auto">
                                                        <small class="text-muted">{{ $asset->dimensions }}</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row align-items-center justify-content-between">
                                            <div class="col-auto">
                                                <small>
                                                    @if($asset->available < 1)
                                                        <span class="text-danger">●</span> Out of stock
                                                    @else
                                                        <span class="text-success">●</span> Available
                                                    @endif
                                                </small>
                                            </div>
                                            <div class="col-auto">
                                                <a href="/jobs/create/{{ $asset->id }}" class="btn btn-sm btn-warning {{ $asset->available < 1 ? 'disabled' : '' }}">
                                                    Create job
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    @foreach($assets as $asset)
        <div class="modal fade" id="asset-check-{{ $asset->id }}" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="row m-3">
                            <div class="col-12 col-md-5">
                                <div class="row">
                                    <div class="col-12">
                                        <img src="{{ $asset->upload ? \Illuminate\Support\Facades\Storage::url('uploads/'.$asset->upload['temp']) : '/img/placeholder.png' }}" alt="asset-img" class="img-fluid rounded mb-3">
                                    </div>
                                    <div class="col-12">
                                        <hr class="navbar-divider">
                                        <div class="row">
                                            <div class="col-12">
                                                <b>Description</b>
                                                <p class="text-muted">{{ $asset->description }}</p>
                                            </div>
                                            <div class="col-12">
                                                <b>Code</b>
                                                <p class="text-muted">{{ $asset->code }}</p>
                                            </div>
                                            <div class="col-12">
                                                <b>Dimensions</b>
                                                <p class="text-muted">{{ $asset->dimensions }}</p>
                                            </div>
                                            <div class="col-12">
                                                <b>Finishes</b>
                                                <p class="text-muted">{{ $asset->finishes }}</p>
                                            </div>
                                            <div class="col-12">
                                                <b>Location</b>
                                                <p class="text-muted">{{ $asset->location }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-7">
                                <div class="row">
                                    <div class="col-12">
                                        <h1 class="header-title">{{ $asset->name }}</h1>
                                        <span class="text-muted">{{ $asset->dimensions }}</span>
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-6">
                                        <h3><span class="text-primary">{{ $asset->quantity }}</span> <span>Quantity</span></h3>
                                    </div>
                                    <div class="col-6">
                                        <h3><span class="text-success">{{ $asset->available }}</span> <span>Available</span></h3>
                                    </div>
                                    <div class="col-6">
                                        <h3><span class="text-warning">{{ $asset->reserved }}</span> <span>Reserved</span></h3>
                                    </div>
                                    <div class="col-6">
                                        <h3><span class="text-danger">{{ $asset->damaged }}</span> <span>Damaged</span></h3>
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="container">
                                        <div class="card card-fill">
                                            <div class="card-header">
                                                <h4 class="card-header-title">
                                                    Recent Activity
                                                </h4>
                                                <a class="small" href="#">View all</a>
                                            </div>
                                            <div class="card-body">
                                                <div class="list-group list-group-flush list-group-activity my-n3">
                                                    @foreach($asset->activities as $activity)
                                                        <div class="list-group-item">
                                                            <div class="row">
                                                                <div class="col-auto">
                                                                    <div class="avatar avatar-sm textwa">
                                                                        <div class="avatar-title font-size-lg bg-primary-soft rounded-circle text-primary">
                                                                            <i class="fe {{ $activity->icon }}"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col ml-n2">
                                                                    {!! $activity->description !!}
                                                                    <small class="text-muted">
                                                                        2m ago
                                                                    </small>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                        <a href="/assets/edit/{{ $asset->id }}" class="btn btn-outline-danger">Edit asset</a>
                        <a href="/jobs/create/{{ $asset->id }}" class="btn btn-warning {{ $asset->available < 1 ? 'disabled' : '' }}">Create job</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
