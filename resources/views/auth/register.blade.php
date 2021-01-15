@extends('layouts.loginlogo')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-xs-4 col-md-4   col-lg-5">
            <div class="card shadow" style="border: none; padding:29px 0px 8px 0px; ">
                 <div class="col-md-12 text-center">
                            <h2><strong>create account</strong></h2>
                        </div>

                <div class="card-body" style="    padding: 3.55rem;">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group row">
                          
                            <div class="col-md-12">
                                <select class="mt-2 form-control" name="user_type" id="user_type" onchange="displayDivDemo('hideValuesOnSelect', this)" required>
                                    <option value="" {{ old('user_type') == "" ? "selected" :""}}>Function</option>
                                    <option value="0" {{ old('user_type') == "0" ? "selected" :""}}>Education</option>
                                    <option value="1" {{ old('user_type') == "1" ? "selected" :""}}>Student</option>
                                    <option value="2" {{ old('user_type') == "2" ? "selected" :""}}>BPV</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                           

                            <div class="col-md-12">

                                <input id="name" type="text" placeholder="Name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row" id="hideValuesOnSelect" style="display:none;">
                            
                            <div class="col-md-12">
                                
                                <input id="organization" type="text" placeholder="organization" class="form-control @error('organization') is-invalid @enderror" name="organization" value="{{ old('organization') }}" autocomplete="organization" autofocus>

                                @error('organization')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                           

                            <div class="col-md-12">
                                <input id="email" placeholder="E-mail" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            

                            <div class="col-md-12">
                                <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            

                            <div class="col-md-12">
                                <input id="password-confirm" placeholder="confirm password" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary" style="width: 100%;">
                                    Create
                                </button>
                            </div>
                        </div>
                        <div class="form-check text-center mt-3">
                              
                              <label class="form-check-label" for="gridCheck">
                                Already have an account?
                              </label>
                              <a href="{{ route('login') }}"  class="gridCheck">Sign in</a>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function displayDivDemo(id, elementValue) {
      document.getElementById(id).style.display = elementValue.value == 2 ? '' : 'none';
   }
</script>
@endsection