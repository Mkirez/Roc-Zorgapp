@extends('layouts.loginlogo')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-xs-4 col-md-4   col-lg-4">
            <div class="card shadow">
                <div class="card-header" style="border: none; padding:39px 0px 8px 0px; ">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h2><strong>{{ __('sign in') }}</strong></h2>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf


                        <div class="container">
                            <div class="form-group row">
                           

                            <div class="col-md-12">
                                <input id="email" placeholder="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <input id="password" placeholder="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                       
                        <div class="form-group row ">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary" style="width: 100%;">
                                    {{ __('Login') }}
                                </button>

                                <!-- @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif -->
                            </div>
                        </div>
                         <div class="form-group text-center">
                            <div class="form-check justify-content-center">
                              
                              <label class="form-check-label" for="gridCheck">
                                dont have a account
                              </label>
                              <a href="{{ route('register') }}" class="gridCheck">sign in</a>
                            </div>
                         </div>

                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
