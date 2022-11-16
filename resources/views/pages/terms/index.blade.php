@extends('layouts.app')
@section('content')
<section class="page-title page-title-layout6 bg-overlay bg-parallax">
  <div class="bg-img"><img src="http://7oroof.com/demos/mintech/assets/images/page-titles/6.jpg" alt="background"></div>
  <div class="container">
    <div class="row">
      <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <h1 style="margin-bottom: 10px;" class="pagetitle__heading">Terms and Conditions</h1>
        <nav>
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ url('') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ url('aboutus') }}">Company</a></li>
            <li class="breadcrumb-item active" aria-current="page">Terms and Conditions</li>
          </ol>
        </nav>
      </div> 
    </div> 
  </div> 
</section> 
@include('pages.secondrynav')
<section class="privacy-policy-area ptb-100">
   <div class="container">
    <p>Welcome to Sark Solution Software House and IT Agency. By using Sarck Solution, you are agreeing to comply with and be bound by the following terms of use. Please review the following terms carefully. If you do not agree to these terms, you should not use this site. The term “Sarck Solution” or “us” or “we” or “our” refers to Sarck Solution.com, the owner of the Web site. The term “you” refers to the user or viewer of Sarcksolution.com
</p>
       <div class="row">
           <div class="col-lg-12 col-md-12">
               <div class="privacy-policy-content">
                   <?php foreach(DB::table('termsandconditions')->get() as $r){ ?>
                      <h5 style="color: #ff0000;">{{ $r->id }}. {{ $r->heading }}</h5>
                      <?php if($r->important == 1){ ?> <blockquote class="blockquote"> <?php } ?>

                      <p>{{ $r->paragraph }}</p>
                      <?php if($r->important == 1){ ?> </blockquote> <?php } ?>
                   <?php } ?>
               </div>
           </div>
       </div>
   </div>
</section>
@endsection