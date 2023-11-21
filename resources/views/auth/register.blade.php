@extends('layouts.login')
@section('title','Success')
@section('content')

<main>
    <div class="register-container">
        <div class="container">
            <div class="row page-register d-flex align-items-center">
                <div class="section-right col-12 col-md-6">
                    <h1 class="mb-4">Register</h1>
                    <img src="/frontend/images/background.jpg" alt="" class="w-75 d-none d-sm-flex">
                </div>
                <div class="section-left col-12 col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-center">
                                <img src="/frontend/images/logo.png" alt="" class="w-50 mb-4">
                            </div>
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input id="username" type="username" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                                    @error('username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword">Password</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="confirm-password">Confirm Password</label>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                                <button type="submit" class="btn btn-login btn-block">
                                    Register
                                </button>
                   
                            </form>
                        </div>
                    </div>
                </div>
        
            </div>
        </div>
    </div>
</main>

@endsection