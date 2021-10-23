@extends('layouts.app')
@section('content')
<div class="container-fluid p-md-5">
    <div class="card col-12 mx-auto p-md-5">
        <div class="row d-flex">
            <div class="d-none d-md-block col-md-6">
                <div class="">
                    <div class="row px-3 justify-content-center mt-4 mb-5 border-line"> <img src="https://i.imgur.com/uNGdWHi.png" class="image"> </div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <h1 class="company-name text-center">R Corp <br /> Employee Management</h1>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                <div class="card2 card border-0 px-4 py-5">
                    <div class="row px-3"> 
                        <label class="mb-1">
                            <h6 class="mb-0 text-sm">Email Address</h6>
                        </label> 
                        <input  id="email" type="email" class="form-control mb-4 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus> 
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="row px-3"> 
                        <label class="mb-1">
                            <h6 class="mb-0 text-sm">Password</h6>
                        </label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="row px-3 mb-4">
                        <div class="custom-control custom-checkbox custom-control-inline"> <input id="chk1" type="checkbox" name="chk" class="custom-control-input"> <label for="chk1" class="custom-control-label text-sm">Remember me</label> </div> <a href="#" class="ml-auto mb-0 text-sm">Forgot Password?</a>
                    </div>
                    <div class="row mb-3 px-3"> <button type="submit" class="btn btn-primary text-center">Login</button> </div>
                    <div class="row mb-4 px-3"> <small class="font-weight-bold">Don't have an account? <a class="text-danger ">Register</a></small> </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection