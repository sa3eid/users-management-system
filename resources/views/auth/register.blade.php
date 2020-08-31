@extends('layouts.app')

@section('content')

<div class="limiter">
    <div class="container-login100" style="background-image: url('{{asset('login-register-theme/images/bg-01.jpg')}}')">
        <div class="wrap-login100">
            <form method="POST" action="{{ route('register') }}" class="login100-form" >
                @csrf
                <span class="login100-form-logo">
                    <i class="zmdi zmdi-landscape"></i>
                </span>

                <span class="login100-form-title p-b-34 p-t-27">
                    Register
                </span>

                <div class="wrap-input100 validate-input" data-validate = "Enter username">
                    <input placeholder="Name" id="name" type="text" class="input100 @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    <span class="focus-input100" data-placeholder="&#xf207;"></span>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong style="color: tomato;font-size: 0.8vw;">{{ $message }}</strong>
                        </span>
                    @enderror
                            
                </div>
                <div class="wrap-input100 validate-input" data-validate = "Enter username">
                    <input placeholder="E-Mail Address" id="email" type="email" class="input100 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    <span class="focus-input100" data-placeholder="&#9993;"></span>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong style="color: tomato;font-size: 0.8vw;">{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="wrap-input100 validate-input" data-validate="Enter password">
                    <input placeholder="Password" id="password" type="password" class="input100 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    <span class="focus-input100" data-placeholder="&#xf191;"></span>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong style="color: tomato;font-size: 0.8vw;">{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="wrap-input100 validate-input" data-validate="Enter password">  
                    <input placeholder="Confirm Password" id="password-confirm" type="password" class="input100" name="password_confirmation" required autocomplete="new-password">
                    <span class="focus-input100" data-placeholder="&#xf191;"></span>
                </div>

                <div class="container-login100-form-btn">
                    <button type="submit" class="login100-form-btn">
                        {{ __('Register') }}
                    </button>      
                </div>
            </form>
        </div>
    </div>
</div>


<div id="dropDownSelect1"></div>


@endsection
