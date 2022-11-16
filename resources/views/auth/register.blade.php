@extends('layouts.app')
@section('content')
<section style="background-color: #f3f3f1;" class="mb-5 mb-special mt-50">
<div class="container container-custom">
    <div class="row">
        <div class="col-md-8 offset-md-2 col-lg-8 offset-lg-2">
            <div class="get-in-touch">
                <h3>Register</h3>
                @if(session()->has('error'))
                    <div style="text-align: center;color: red;" id="result">{{ session()->get('error') }}</div>
                @endif
                <br>
                <form method="POST" action="{{ route('register') }}">
                        @csrf
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="name" class="">{{ __('Name') }}</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>{{ __('E-Mail Address') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                 
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>{{ __('Confirm Password') }}</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                        <input style="height: 15px; width: 15px;" type="checkbox"  name="" required=""> <span style="margin-left: 10px;font-size: 15px;font-weight: 600;">I agree the <a style="color: #007bff;" href="{{ url('terms-nd-condition') }}">Terms and Conditions</a> and <a style="color: #007bff;" href="{{ url('privacy-policy') }}">Privacy Policy</a></span>
                    </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                        <div class="g-recaptcha brochure__form__captcha" data-sitekey="6LezaykaAAAAADCdkFXrW6JUmuS9z25BmgPp0Nr8"></div>
                    </div>
                    </div>
                </div>
                 <div class="row">
                    <div class="col-lg-12">
                        <button class="btn btn__secondary btn__block " type="submit">{{ __('Register') }}</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
</section>
@endsection
