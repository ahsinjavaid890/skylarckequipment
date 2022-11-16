@extends('layouts.app')
@section('content')
<div class="page-title-section" style="background-image: url('{{ url('public/images/pagetitle.jpg') }}');">
    <div class="container">
        <h1>Login</h1>
        <ul>
            <li><a href="{{url('')}}">Home</a></li>
            <li>Login</li>
        </ul>
    </div>
</div>
<div class="section-block-grey">
<div class="container">
    <div class="row">
        <div class="col-md-3">
            
        </div>
        <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Login
                    </div>
    <div class="card-body">
        @if(session()->has('error'))
            <div style="text-align: center;color: red;" id="result">{{ session()->get('error') }}</div>
        @endif
        <br>
        <form action="{{ route('login') }}" method="POST" id="form">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <input type="email" value="@if(session()->has('email')){{ session()->get('email') }}  @endif" class="form-control" name="email" placeholder="Enter Email" required>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <input type="password" class="form-control" name="password" placeholder="Enter Password" required>
                    </div>
                </div>
                
            </div>

            <div class="row">
                <div class="col-md-12 text-center">
                    <button type="submit" class="btn btn-primary btn__block ">Login Now</button>
                </div>
            </div>

        </form>
    </div>
    </div>
        </div>
    </div>
    
</div>
</div>
@endsection
