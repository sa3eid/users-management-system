@extends('layouts.app')

@section('content')

<div class="limiter">
    <div class="container-login100" style="background-image: url('{{asset('login-register-theme/images/bg-01.jpg')}}')">
        <div class="wrap-login100">
            <form method="POST" action="{{ route('login') }}" class="login100-form" >
                @csrf
                <span class="login100-form-logo">
                    <i class="zmdi zmdi-landscape"></i>
                </span>

                <span class="login100-form-title p-b-34 p-t-27">
                    Log in
                </span>

                <div class="wrap-input100 validate-input" data-validate = "Enter username">
                    {{-- <input class="input100" type="text" name="username" placeholder="Username"> --}}
                    <input placeholder="E-Mail Address" id="email" type="email" class="input100 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    {{-- <span class="focus-input100" data-placeholder="&#xf0e0;"></span> --}}
                    <span class="focus-input100" data-placeholder="&#9993;"></span>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong style="color: tomato;font-size: 0.8vw;">{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="wrap-input100 validate-input" data-validate="Enter password">
                    {{-- <input class="input100" type="password" name="pass" placeholder="Password"> --}}
                    <input placeholder="Password" id="password" type="password" class="input100 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    <span class="focus-input100" data-placeholder="&#xf191;"></span>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="contact100-form-checkbox">
                    {{-- <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me"> --}}
                    <input class="form-check-input input-checkbox100" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="label-checkbox100" for="remember">
                        Remember me
                    </label>
                </div>

                <div class="container-login100-form-btn">
                    <button type="submit" class="login100-form-btn">
                        Login         
                    </button>
                </div>
                <div class="text-center p-t-90">
                    @if (Route::has('password.request'))
                        <a style="color: cyan;" class="btn btn-link txt1" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                </div>
            </form>
        </div>
    </div>
</div>


<div id="dropDownSelect1"></div>
@endsection
