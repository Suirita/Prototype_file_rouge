@extends('layouts.layout')

@section('content')
<div class="card card-outline card-primary">
    <div class="card-header text-center">
        <a href="{{ url('/') }}" class="h1"><b>Soli-</b>Blogs</a>
    </div>
    <div class="card-body">
        {{-- TODO :  --}}
        <div class="card card-info mb-2">
            <p class="card-header text-center">Sign in to start your session</p>
        </div>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="input-group mb-3">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                       value="{{ old('name') }}" required autocomplete="name" placeholder="Name" autofocus>
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-address-card"></span>
                    </div>
                </div>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="input-group mb-3">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                       value="{{ old('email') }}" required autocomplete="email" placeholder="Email">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                    </div>
                </div>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="input-group mb-3">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                       name="password" required autocomplete="current-password" placeholder="Password">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="input-group mb-3">
                <input id="password-confirm" type="password" class="form-control"
                       name="password_confirmation" required autocomplete="current-password" placeholder="Confirm password">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
            </div>

            <div class="row d-flex justify-content-end">
                <div class="col-4">
                    <button type="submit" class="btn btn-primary btn-block">Register</button>
                </div>
            </div>
        </form>
        <p class="mb-0">
            <a href="{{ route('login') }}" class="text-center">I already have a membership</a>
        </p>
    </div>
</div>
@endsection
