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
                                    <h6 class="header-pretitle">New movement</h6>
                                    <h1 class="header-title">Create a new movement</h1>
                                </div>
                            </div>
                        </div>
                    </div>

                    <form class="mb-4" method="POST" action="/movements/store" autocomplete="off">
                        @csrf
                        <input type="hidden" value="{{ $asset->id }}" name="asset_id">
                        <input type="hidden" value="{{ $type }}" name="type">
                        <div class="row">
                            <div class="col-12 col-md-4">
                                <div class="row">
                                    <div class="col-12">
                                        <p class="text-center">
                                            <img src="{{ $asset->upload ? \Illuminate\Support\Facades\Storage::url('uploads/'.$asset->upload['temp']) : '/img/placeholder.png' }}" alt="asset-img" class="img-fluid rounded mb-3">
                                        </p>
                                    </div>
                                    <div class="col-12">
                                        <div class="accordion">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h2 class="mb-0">
                                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#movements-collapse">
                                                            Running movements for this item
                                                        </button>
                                                    </h2>
                                                </div>
                                                <div id="movements-collapse" class="collapse">
                                                    <div class="table-responsive">
                                                        <table class="table table-nowrap">
                                                            <thead>
                                                            <tr>
                                                                <th scope="col">Entry #</th>
                                                                <th scope="col">Type</th>
                                                                <th scope="col">Clean Qty.</th>
                                                                <th scope="col">Dmg. Qty.</th>
                                                                <th scope="col">Total Avail.</th>
                                                                <th scope="col">Total Dmg.</th>
                                                                <th scope="col">Res.</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>
                                                                <td>1000021</td>
                                                                <td><span class="badge badge-success">IN</span></td>
                                                                <td>20</td>
                                                                <td>0</td>
                                                                <td>20</td>
                                                                <td>0</td>
                                                                <td>0</td>
                                                            </tr>
                                                            <tr>
                                                                <td>1000031</td>
                                                                <td><span class="badge badge-danger">OUT</span></td>
                                                                <td>55</td>
                                                                <td>0</td>
                                                                <td>55</td>
                                                                <td>0</td>
                                                                <td>2</td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label>Type</label>
                                            <input type="text" class="form-control text-{{ $type == 'in' ? 'success' : 'danger' }}" value="WAREHOUSE {{ strtoupper($type) }}"
                                                   data-toggle="tooltip" data-placement="bottom" title="Read only input" readonly>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label>Entry #</label>
                                            <input type="text" class="form-control" value="{{ $entry_no }}"
                                                   data-toggle="tooltip" data-placement="bottom" title="Read only input" readonly>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-12">
                                        <h6 class="text-uppercase text-muted">Asset details</h6>
                                        <hr class="navbar-divider my-3">
                                    </div>
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
                                    <div class="col-12 col-md-12">
                                        <div class="form-group">
                                            <label>Item Dimensions</label>
                                            <input type="text" class="form-control" value="{{ $asset->dimensions }}"
                                                   data-toggle="tooltip" data-placement="bottom" title="Read only input" readonly>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-12">
                                        <h6 class="text-uppercase text-muted">Completed movement</h6>
                                        <hr class="navbar-divider my-3">
                                    </div>
                                    <div class="col-12 col-md-6">
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
                                    <div class="col-12 col-md-6">
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
                                            <label>Quantity</label>
                                            <input type="number" class="form-control @error('quantity') is-invalid @enderror" name="quantity">
                                            @error('quantity')
                                            <div class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label>Damaged Quantity</label>
                                            <input type="number" class="form-control @error('damaged') is-invalid @enderror" name="damaged">
                                            @error('damaged')
                                            <div class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-12">
                                        <div class="form-group">
                                            <label>P.O. #</label>
                                            <input type="text" class="form-control @error('po_no') is-invalid @enderror" name="po_no">
                                            @error('po_no')
                                            <div class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-warning btn-block">Confirm</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="row">
                                    <div class="col-12 col-md-12">
                                        <div class="card bg-light border ml-md-4">
                                            <div class="card-body">
                                                <p class="mb-2">Comments</p>
                                                <p class="small text-muted mb-2">Condition, comments, source details and any special comments</p>
                                                <textarea name="comments" cols="30" rows="10" class="form-control @error('comments') is-invalid @enderror"></textarea>
                                                @error('comments')
                                                <div class="invalid-feedback">
                                                    <strong>{{ $message }}</strong>
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-12">
                                        <div class="card bg-light border ml-md-4">
                                            <div class="card-body">
                                                <p class="mb-2">Bill of Materials</p>
                                                <p class="small text-muted mb-2">List the item parts here</p>
                                                <textarea name="bill_materials" cols="30" rows="10" class="form-control @error('bill_materials') is-invalid @enderror"></textarea>
                                                @error('bill_materials')
                                                <div class="invalid-feedback">
                                                    <strong>{{ $message }}</strong>
                                                </div>
                                                @enderror
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

@section('scripts')
{{--    <script src="/dashkit/node_modules/jquery/dist/jquery.min.js"></script>--}}
{{--    <script src="/dashkit/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>--}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.12/js/select2.full.min.js"></script>
    <script src="/dashkit/src/assets/js/tooltip.js"></script>
    <script src="/dashkit/src/assets/js/select2.js"></script>
    <script>
        select2.on('change', function (e) {
            window.location.replace('/movements/create/{{ $type }}/' + e.target.value)
        })
    </script>
@endsection
