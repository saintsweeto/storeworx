@extends('layouts.app')

@section('content')
    @include('layouts.navigation')
    <div class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-12 col-xl-12">
                    <div class="header mt-md-5">
                        <div class="header-body">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h6 class="header-pretitle">New Job</h6>
                                    <h1 class="header-title">{{ $asset->name }}</h1>
                                </div>
                            </div>
                        </div>
                    </div>

                    <form class="mb-4" method="POST" action="/jobs/store" autocomplete="off">
                        @csrf
                        <input type="hidden" name="asset_id" value="{{ $asset->id }}">
                        <div class="row">
                            <div class="col-12 col-md-4">
                                <p class="text-center mb-3">
                                    <img src="/img/placeholder.png" alt="asset-img" class="img-fluid rounded">
                                </p>
                                <p>Description: <span class="text-muted">{{ $asset->description }}</span></p>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label>Item Type / Code</label>
                                            <input type="text" class="form-control" placeholder="{{ $asset->code }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label>Item SKU</label>
                                            <input type="text" class="form-control" placeholder="{{ $asset->sku }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-8">
                                        <div class="form-group">
                                            <label>Item Dimensions</label>
                                            <input type="text" class="form-control" placeholder="{{ $asset->dimensions }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <div class="form-group">
                                            <label>Quantity</label>
                                            <input type="number" class="form-control" name="quantity">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label>Requester</label>
                                            <input type="text" class="form-control" name="requester">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label>Date of Job</label>
                                            <input type="text" class="form-control" name="date" data-toggle="flatpickr" data-options='{"dateFormat": "d M Y"}'>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-12">
                                        <div class="form-group">
                                            <label>From Location</label>
                                            <input type="text" class="form-control" name="from">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-12">
                                        <div class="form-group">
                                            <label>To Location</label>
                                            <input type="text" class="form-control" name="to">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-warning btn-block" name="action" value="pending">Confirm</button>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-outline-danger btn-block" name="action" value="reserved">Reserve</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="row">
                                    <div class="col-12 col-md-12">
                                        <div class="card bg-light border ml-md-4">
                                            <div class="card-body">
                                                <p class="mb-2">Job Instructions</p>
                                                <p class="small text-muted mb-2">Please add specifc job instructions</p>
                                                <textarea name="job_instructions"  cols="30" rows="10" class="form-control"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-12">
                                        <div class="card bg-light border ml-md-4">
                                            <div class="card-body">
                                                <p class="mb-2">Site Contact Details</p>
                                                <p class="small text-muted mb-2">Site contact name, phone. email</p>
                                                <textarea name="site_contact_details" cols="30" rows="10" class="form-control"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('plugins')
    <link rel="stylesheet" href="/dashkit/node_modules/flatpickr/dist/flatpickr.min.css">
@endsection

@section('scripts')
    <script src="/dashkit/node_modules/flatpickr/dist/flatpickr.min.js"></script>
    <script src="/dashkit/src/assets/js/flatpickr.js"></script>
@endsection
