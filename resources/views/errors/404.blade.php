@extends('layouts.app')
@section('content')
<section class="page-404 mt--100 py-0">
  <div class="bg-img"><img src="http://7oroof.com/demos/mintech/assets/images/banners/1.jpg" alt="background"></div>
  <div class="container">
    <div class="row">
      <div class="col-sm-12 col-md-12 col-lg-12 d-flex align-items-center vh-100 error-wrapper">
        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-6">
            <h1 class="error-code">404</h1>
          </div>
          <div class="col-sm-12 col-md-12 col-lg-6">
            <h2 class="error-title">Oops! That page can’t be found.</h2>
            <p class="error-desc">The page requested couldn't be found. This could be a spelling error in the
              URL or a removed page.
            </p>
            <a href="{{ url('') }}" class="btn btn__primary btn__icon btn__xl">
              <span>Back To Home</span> <i class="icon-arrow-right"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection