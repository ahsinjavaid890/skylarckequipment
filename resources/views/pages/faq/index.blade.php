@extends('layouts.app')
@section('content')
<!-- ========================
       page title 
    =========================== -->
    <section class="page-title page-title-layout6 bg-overlay bg-parallax">
      <div class="bg-img"><img src="http://7oroof.com/demos/mintech/assets/images/page-titles/6.jpg" alt="background"></div>
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-12 col-xl-7">
            <h1 class="pagetitle__heading">Frequently Asked Questions </h1>
            <nav>
              <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ url('') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ url('aboutus') }}">Company</a></li>
                <li class="breadcrumb-item active" aria-current="page">Faqs</li>
              </ol>
            </nav>
          </div> 
        </div> 
      </div> 
    </section> 
   @include('pages.secondrynav')
    <section class="faq pt-130 pb-100">
      <div class="container">
        <div class="row" id="accordion">
          <div class="col-sm-12 col-md-12 col-lg-6">

            <?php foreach(DB::table('faqquestions')->orderBy('id', 'asc')->take(5)->get() as $r){ ?>
            <div class="accordion-item">
              <div class="accordion-item__header" data-toggle="collapse" data-target="#idnumber{{ $r->id }}">
                <a class="accordion-item__title" href="#">{{ $r->e_question }}</a>
              </div>
              <div id="idnumber{{ $r->id }}" class="collapse" data-parent="#accordion">
                   <div class="accordion-item__body">
                     <p>{{ $r->e_answer }}</p>
                   </div>
               </div>
            </div> 
            <?php } ?>

        </div>  
          <div class="col-sm-12 col-md-12 col-lg-6">

            <?php foreach(DB::table('faqquestions')->orderBy('id', 'desc')->take(5)->get() as $r){ ?>
            <div class="accordion-item">
              <div class="accordion-item__header" data-toggle="collapse" data-target="#idnumber{{ $r->id }}">
                <a class="accordion-item__title" href="#">{{ $r->e_question }}</a>
              </div>
              <div id="idnumber{{ $r->id }}" class="collapse" data-parent="#accordion">
                   <div class="accordion-item__body">
                     <p>{{ $r->e_answer }}</p>
                   </div>
               </div>
            </div> 
            <?php } ?>

        </div> 
      </div> 
    </section>
@endsection