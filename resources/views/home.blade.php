@extends('layouts.app')

@section('content')
    @include('layouts.navigation')
    <div class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center mt-5">
                <div class="col-12 col-lg-10 col-xl-8">
                    <div class="row">
                        <div class="col-4 offset-4 text-center">
                            <p class="text-center mb-3">
                                <img src="/img/client-logo.png" alt="client-logo" class="img-fluid rounded">
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 text-center">
                            <h1 class="header-title mt-5 mb-5">
                                Welcome to Storeworx&trade;<br>
                                Your Online Warehouse Management System
                            </h1>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-12 col-md-3 offset-1">
                            <button class="btn btn-white btn-block lift">
                                <span class="mt-8">&nbsp;</span>
                                <h1>View Asset</h1>
                            </button>
                        </div>
                        <div class="col-12 col-md-3">
                            <button class="btn btn-white btn-block lift">
                                <span class="mt-8">&nbsp;</span>
                                <h1>Create Job</h1>
                            </button>
                        </div>
                        <div class="col-12 col-md-3">
                            <button class="btn btn-white btn-block lift">
                                <span class="mt-8">&nbsp;</span>
                                <h1>Reports</h1>
                            </button>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-12 col-md-4 offset-1 offset-2">
                            <button class="btn btn-white btn-block lift">
                                <span class="mt-8">&nbsp;</span>
                                <h1>Warehouse In</h1>
                            </button>
                        </div>
                        <div class="col-12 col-md-4">
                            <button class="btn btn-white btn-block lift">
                                <span class="mt-8">&nbsp;</span>
                                <h1>Warehouse Out</h1>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
