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
                                    <h6 class="header-pretitle">Edit Job</h6>
                                    <h1 class="header-title">Update existing job</h1>
                                </div>
                            </div>
                        </div>
                    </div>

                    <form class="mb-4" method="POST" action="/jobs/update/{{ $job->id }}" autocomplete="off">
                        @method('PUT')
                        @csrf
                        <input type="hidden" name="asset_id" value="{{ $job->asset->id }}">
                        <div class="row">
                            <div class="col-12 col-md-4">
                                <p class="text-center mb-3">
                                    <img src="{{ $job->asset->upload ? \Illuminate\Support\Facades\Storage::url('uploads/'.$job->asset->upload['temp']) : '/img/placeholder.png' }}" alt="asset-img" class="img-fluid rounded">
                                </p>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="row">
                                    <div class="col-12 col-md-4">
                                        <div class="form-group">
                                            <label>Job #</label>
                                            <input type="text" class="form-control" value="{{ $job->id }}"
                                                   data-toggle="tooltip" data-placement="bottom" title="Read only input" readonly>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-8">
                                        <div class="form-group">
                                            <label>Item Name</label>
                                            <input type="text" class="form-control" value="{{ $job->asset->name }}"
                                                   data-toggle="tooltip" data-placement="bottom" title="Read only input" readonly>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label>Item Type / Code</label>
                                            <input type="text" class="form-control" value="{{ $job->asset->code }}"
                                                   data-toggle="tooltip" data-placement="bottom" title="Read only input" readonly>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label>Item SKU</label>
                                            <input type="text" class="form-control" value="{{ $job->asset->sku }}"
                                                   data-toggle="tooltip" data-placement="bottom" title="Read only input" readonly>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label>Item Dimensions</label>
                                            <input type="text" class="form-control" value="{{ $job->asset->dimensions }}"
                                                   data-toggle="tooltip" data-placement="bottom" title="Read only input" readonly>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label>Quantity</label>
                                            <input type="number" class="form-control @error('quantity') is-invalid @enderror" name="quantity" value="{{ $job->quantity }}" max="{{ $job->asset->available }}"
                                                   data-toggle="tooltip" data-placement="bottom" title="You can only request {{ $job->asset->available }} more">
                                            @error('quantity')
                                            <div class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label>Requester</label>
                                            <input type="text" class="form-control @error('requester') is-invalid @enderror" name="requester" value="{{ $job->requester }}">
                                            @error('requester')
                                            <div class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label>Date of Job</label>
                                            <input type="text" class="form-control @error('date') is-invalid @enderror" name="date" value="{{ date('d M Y', strtotime($job->date)) }}" data-toggle="flatpickr" data-options='{"dateFormat": "d M Y"}'>
                                            @error('date')
                                            <div class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-12">
                                        <div class="form-group">
                                            <label>From Location</label>
                                            <input type="text" class="form-control @error('from') is-invalid @enderror" name="from" value="{{ $job->from }}">
                                            @error('from')
                                            <div class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-12">
                                        <div class="form-group">
                                            <label>To Location</label>
                                            <input type="text" class="form-control @error('to') is-invalid @enderror" name="to" value="{{ $job->to }}">
                                            @error('to')
                                            <div class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-warning btn-block" name="action" value="pending">Update</button>
                                            <a href="/jobs" class="btn btn-block btn-link text-muted">Go back to job list</a>
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
                                                <textarea name="job_instructions"  cols="30" rows="10" class="form-control">{{ $job->job_instructions }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-12">
                                        <div class="card bg-light border ml-md-4">
                                            <div class="card-body">
                                                <p class="mb-2">Site Contact Details</p>
                                                <p class="small text-muted mb-2">Site contact name, phone. email</p>
                                                <textarea name="site_contact_details" cols="30" rows="10" class="form-control">{{ $job->site_contact_details }}</textarea>
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
{{--    <link rel="stylesheet" href="/dashkit/node_modules/flatpickr/dist/flatpickr.min.css">--}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.3/flatpickr.min.css">
@endsection

@section('scripts')
{{--    <script src="/dashkit/node_modules/flatpickr/dist/flatpickr.min.js"></script>--}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.3/flatpickr.min.js"></script>
    <script src="/dashkit/src/assets/js/flatpickr.js"></script>
    <script src="/dashkit/src/assets/js/tooltip.js"></script>
@endsection
