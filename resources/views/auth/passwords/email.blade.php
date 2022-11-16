@extends('layouts.app')
@section('content')
<section style="background-color: #f3f3f1;" class="mb-5 mb-special mt-50">
<div class="container container-custom">
    <div class="row">
        <div class="col-md-3 col-lg-3"></div>
        <div class="col-md-6 col-lg-6">
            <div class="get-in-touch">
                <h3>Forget Password</h3>
                @if(session()->has('error'))
                    <div style="text-align: center;color: red;" id="result">{{ session()->get('error') }}</div>
                @endif
                <br>
                 <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div class="form-group">
                        <label>{{ __('E-Mail Address') }}</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button class="btn btn__secondary btn__block " type="submit" >Send Password Reset Link</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</section>
@endsection

