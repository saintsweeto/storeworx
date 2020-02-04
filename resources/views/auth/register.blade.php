@extends('layouts.app', ['bodyClass' => 'd-flex align-items-center bg-auth border-top border-top-2 border-warning'])

@section('content')
    <div class="container-fluid">
        <div class="row align-items-center justify-content-center">
            <div class="col-12 col-md-5 col-lg-6 col-xl-4 px-lg-6 my-5">
                <h1 class="display-4 text-center mb-3">Store<span class="text-warning">Worx</span></h1>
                <p class="text-muted text-center mb-5">Register</p>

                <form method="POST" action="{{ route('register') }}" autocomplete="off">
                    @csrf
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control in- @error('name') is-invalid @enderror" placeholder="Sirius Black" value="{{ old('name') }}" name="name" autofocus>
                        @error('name')
                        <div class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="name@company.co.nz" value="{{ old('email') }}" name="email">
                        @error('email')
                        <div class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Password</label>
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

                    <div class="form-group">
                        <label>Confirm Password</label>
                        <div class="input-group input-group-merge">
                            <input type="password" class="form-control form-control-appended" placeholder="Repeat your password" name="password_confirmation">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="fe fe-eye"></i>
                                </span>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-lg btn-block btn-warning mb-3">Register</button>

                    <div class="text-center">
                        <small class="text-muted text-center">
                            Already have an account? <a href="/login" class="text-dark">Log in</a>.
                        </small>
                    </div>
                </form>
            </div>

            <div class="col-12 col-md-7 col-lg-6 col-xl-8 d-none d-lg-block">
                <div class="bg-cover vh-100 mt-n1 mr-n3" style="background-image: url(img/register-bg.jpg);"></div>
            </div>
        </div>
    </div>
@endsection
