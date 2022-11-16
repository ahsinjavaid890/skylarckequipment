@extends('layouts.app')
@section('content')
<section class="page-title page-title-layout6 bg-overlay bg-parallax">
<div class="bg-img"><img src="http://7oroof.com/demos/mintech/assets/images/page-titles/6.jpg" alt="background"></div>
<div class="container">
  <div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-7">
      <h1 class="pagetitle__heading">Why Chose Us</h1>
      <nav>
        <ol class="breadcrumb mb-0">
          <li class="breadcrumb-item"><a href="{{ url('') }}">Home</a></li>
          <li class="breadcrumb-item"><a href="{{ url('aboutus') }}">Company</a></li>
          <li class="breadcrumb-item active" aria-current="page">Why Chose Us</li>
        </ol>
      </nav>
    </div> 
  </div> 
</div> 
</section> 
@include('pages.secondrynav')
<div style="margin-top: 20px;margin-bottom: 20px;" class="container">
   <?php echo DB::table('cms')->where('pagename', 'why')->first()->description; ?>
</div>
@endsection