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
                                    <h1 class="header-title">Create a new job</h1>
                                </div>
                            </div>
                        </div>
                    </div>

                    <form class="mb-4" method="POST" action="/jobs/store" autocomplete="off">
                        @csrf
                        <div class="row">
                            <div class="col-12 col-md-4">
                                <p class="text-center mb-3">
                                    <img src="{{ $asset->upload ? \Illuminate\Support\Facades\Storage::url('uploads/'.$asset->upload['temp']) : '/img/placeholder.png' }}" alt="asset-img" class="img-fluid rounded">
                                </p>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Item Name</label>
                                            <select id="select2" class="form-control" data-toggle="select">
                                                <option value=""></option>
                                                @foreach($assets as $item)
                                                    <option value="{{ $item->id }}" {{ $item->id === $asset->id ? 'selected' : '' }}>{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                            <small class="form-text text-muted">
                                                Don't see your asset? <a href="/assets/create">Create one</a> here now
                                            </small>
                                            <input type="hidden" name="asset_id" value="{{ $asset->id }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label>Item Type / Code</label>
                                            <input type="text" class="form-control" value="{{ $asset->code }}"
                                                   data-toggle="tooltip" data-placement="bottom" title="Read only input" readonly>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label>Item SKU</label>
                                            <input type="text" class="form-control" value="{{ $asset->sku }}"
                                                   data-toggle="tooltip" data-placement="bottom" title="Read only input" readonly>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label>Item Dimensions</label>
                                            <input type="text" class="form-control" value="{{ $asset->dimensions }}"
                                                   data-toggle="tooltip" data-placement="bottom" title="Read only input" readonly>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label>Quantity</label>
                                            <input type="number" class="form-control @error('quantity') is-invalid @enderror" name="quantity" max="{{ $asset->available }}"
                                                   data-toggle="tooltip" data-placement="bottom" title="You can only request {{ $asset->available }} more">
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
                                            <input type="text" class="form-control @error('requester') is-invalid @enderror" name="requester">
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
                                            <input type="text" class="form-control @error('date') is-invalid @enderror" name="date" data-toggle="flatpickr" data-options='{"dateFormat": "d M Y"}'>
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
                                            <input type="text" class="form-control @error('from') is-invalid @enderror" name="from">
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
                                            <input type="text" class="form-control @error('to') is-invalid @enderror" name="to">
                                            @error('to')
                                            <div class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                            @enderror
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
{{--    <link rel="stylesheet" href="/dashkit/node_modules/flatpickr/dist/flatpickr.min.css">--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.3/flatpickr.min.css">
@endsection

@section('scripts')
{{--    <script src="/dashkit/node_modules/jquery/dist/jquery.min.js"></script>--}}
{{--    <script src="/dashkit/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>--}}
{{--    <script src="/dashkit/node_modules/flatpickr/dist/flatpickr.min.js"></script>--}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.3/flatpickr.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.12/js/select2.full.min.js"></script>
    <script src="/dashkit/src/assets/js/flatpickr.js"></script>
    <script src="/dashkit/src/assets/js/tooltip.js"></script>
    <script src="/dashkit/src/assets/js/select2.js"></script>
    <script>
        select2.on('change', function (e) {
            window.location.replace('/jobs/create/' + e.target.value)
        })
    </script>
@endsection
