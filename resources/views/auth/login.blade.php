@extends('layouts.app', ['bodyClass' => 'd-flex align-items-center bg-auth border-top border-top-2 border-warning'])

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-5 col-xl-4 my-5">
                <h1 class="display-4 text-center mb-3">Store<span class="text-warning">Worx</span></h1>
                <p class="text-muted text-center mb-5">Corporate Asset Warehouse Management System</p>

                <form method="POST" action="{{ route('login') }}" autocomplete="off">
                    @csrf
                    <div class="form-group">
                        <label>Email Address</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="name@company.co.nz" value="{{ old('email') }}" name="email">
                        @error('email')
                            <div class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label>Password</label>
                            </div>
                            <div class="col-auto">
                                <a href="/password-reset" class="form-text small text-muted">
                                    Forgot password?
                                </a>
                            </div>
                        </div>
                        <div class="input-group input-group-merge">
                            <input type="password" class="form-control form-control-appended @error('password') is-invalid @enderror" placeholder="Enter your password" name="password">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="fe fe-eye"></i>
                                </span>
                            </div>
                            @error('password')
                            <div class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                        </div>
                    </div>

                    <button type="submit" class="btn btn-lg btn-block btn-warning mb-3">Login</button>

                    <div class="text-center">
                        <small class="text-muted text-center">
                            Don't have an account yet? <a href="/register" class="text-dark">Register Now</a>.
                        </small>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
