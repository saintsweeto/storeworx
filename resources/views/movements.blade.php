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
                                    <h6 class="header-pretitle">Overview</h6>
                                    <h1 class="header-title">Movements</h1>
                                </div>
                                <div class="col-auto">
                                    <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#move-form-modal">Move</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-header-title">All running movements</h4>
                                </div>
                                <div class="table-responsive mb-0">
                                    <table class="table table-sm table-nowrap card-table">
                                        <thead>
                                        <tr>
                                            <th>Item</th>
                                            <th>Type</th>
                                            <th>Job #</th>
                                            <th>From</th>
                                            <th>To</th>
                                            <th>Quantity</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($movements as $movement)
                                            <tr>
                                                <td>{{ $movement->asset->name }}</td>
                                                <td>
                                                    @if($movement->type == 'in')
                                                        <span class="badge badge-success">IN</span>
                                                    @elseif($movement->type == 'out')
                                                        <span class="badge badge-danger">OUT</span>
                                                    @endif
                                                </td>
                                                <td>{{ $movement->job_no }}</td>
                                                <td>{{ $movement->from }}</td>
                                                <td>{{ $movement->to }}</td>
                                                <td>{{ $movement->quantity }}</td>
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

        <!-- Modal -->
        <div class="modal fade" id="move-form-modal" tabindex="-1" aria-labelledby="move-form-modalLabel">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="move-form-modalLabel">Create movment</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div>
                            <div class="form-group text-center">
                                <select class="form-control js-asset" data-toggle="select">
                                    @foreach($assets as $asset)
                                        <option value="{{ $asset->id }}">{{ $asset->name }}</option>
                                    @endforeach
                                </select>
                                <label class="text-muted">Asset</label>
                            </div>

                            <div class="form-group text-center">
                                <select class="form-control js-type" data-toggle="select">
                                    <option value="in">IN</option>
                                    <option value="out">OUT</option>
                                </select>
                                <label class="text-muted">Type</label>
                            </div>

                            <button type="button" class="btn btn-warning btn-block js-move">Move item</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
{{--    <script src="/dashkit/node_modules/jquery/dist/jquery.min.js"></script>--}}
{{--    <script src="/dashkit/node_modules/select2/dist/js/select2.full.min.js"></script>--}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.12/js/select2.full.min.js"></script>
    <script src="/dashkit/src/assets/js/select2.js"></script>
    <script>
        $(function () {
            $('.js-move').on('click', function () {
                const asset = $('.js-asset').val();
                const type = $('.js-type').val();
                window.open('/movements/create/' + type + '/' + asset);
            })
        })
    </script>
@endsection
