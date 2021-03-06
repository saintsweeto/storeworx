@extends('layouts.app')

@section('content')
    @include('layouts.navigation')
    <div class="main-content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-10 col-xl-8">
                    <div class="header mt-md-5">
                        <div class="header-body">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h6 class="header-pretitle">New asset</h6>
                                    <h1 class="header-title">Create a new asset</h1>
                                </div>
                            </div>
                        </div>
                    </div>

                    <form class="mb-4" method="POST" action="/assets/store" autocomplete="off">
                        @csrf
                        <div class="form-group">
                            <label>Item name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name">
                            @error('name')
                            <div class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="mb-1">Item description</label>
                            <small class="form-text text-muted">This is how others will learn about the item, so make it good!</small>
                            <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="5"></textarea>
                            @error('description')
                            <div class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label>Item Type / Code</label>
                                    <input type="text" class="form-control @error('code') is-invalid @enderror" name="code">
                                    @error('code')
                                    <div class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label>Item SKU</label>
                                    <input type="text" class="form-control @error('sku') is-invalid @enderror" name="sku">
                                    @error('sku')
                                    <div class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <hr class="mt-4 mb-5">
                        <div class="form-group">
                            <label class="mb-1">Photo</label>
                            <small class="form-text text-muted">
                                Please use an image no larger than 700 * 600px.
                            </small>
                            <div class="dropzone dropzone-single mb-3" data-toggle="dropzone"
                                 data-options='{"url": "/assets/upload", "maxFiles": 1, "acceptedFiles": "image/*", "headers": { "X-CSRF-TOKEN": "{{ csrf_token() }}" }}'>
                                <div class="fallback">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="file-upload" name="image">
                                        <label class="custom-file-label" for="file-upload">Choose file</label>
                                    </div>
                                </div>
                                <div class="dz-preview dz-preview-single">
                                    <div class="dz-preview-cover">
                                        <img class="dz-preview-img" src="data:image/svg+xml,%3csvg3c/svg%3e" data-dz-thumbnail>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" class="dropzone-response" name="upload_id">
                        </div>
                        <hr class="mt-5 mb-5">
                        <div class="row">
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label>Dimensions</label>
                                    <input type="text" class="form-control @error('dimensions') is-invalid @enderror" name="dimensions">
                                    @error('dimensions')
                                    <div class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label>Finishes</label>
                                    <input type="text" class="form-control @error('finishes') is-invalid @enderror" name="finishes">
                                    @error('finishes')
                                    <div class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label>Location</label>
                                    <input type="text" class="form-control @error('location') is-invalid @enderror" name="location">
                                    @error('location')
                                    <div class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label class="mb-1">Define Initial Values</label>
                                    <small class="form-text text-muted">If you know the initial values of this item, you can define it now</small>
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="switch-define-value">
                                        <label class="custom-control-label" for="switch-define-value"></label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="row" id="row-initial-values" style="display: none;">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Quantity</label>
                                            <input type="number" class="form-control" name="quantity">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Damaged</label>
                                            <input type="number" class="form-control" name="damaged">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="mt-5 mb-5">
                        <button type="submit" class="btn btn-block btn-warning">Create item</button>
                        <a href="/assets" class="btn btn-block btn-link text-muted">Cancel creating this item</a>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('plugins')
{{--    <link rel="stylesheet" href="/dashkit/node_modules/flatpickr/dist/flatpickr.min.css">--}}
{{--    <link rel="stylesheet" href="/dashkit/node_modules/quill/dist/quill.core.css">--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.3/flatpickr.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/quill/1.3.7/quill.core.min.css">
@endsection

@section('scripts')
{{--    <script src="/dashkit/node_modules/flatpickr/dist/flatpickr.min.js"></script>--}}
{{--    <script src="/dashkit/node_modules/dropzone/dist/min/dropzone.min.js"></script>--}}
{{--    <script src="/dashkit/node_modules/quill/dist/quill.min.js"></script>--}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.3/flatpickr.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/quill/1.3.7/quill.core.min.js"></script>
    <script src="/dashkit/src/assets/js/flatpickr.js"></script>
    <script src="/dashkit/src/assets/js/dropzone.js"></script>
    <script src="/dashkit/src/assets/js/quill.js"></script>
    <script>
        const initialValuesRow = document.querySelector('#row-initial-values');
        const defineSwitch = document.querySelector('#switch-define-value');
        defineSwitch.addEventListener('change', function (e) {
            if(e.target.checked) {
                initialValuesRow.style.display = 'block';
            }
            else {
                initialValuesRow.style.display = 'none';
            }
        });
    </script>
@endsection
