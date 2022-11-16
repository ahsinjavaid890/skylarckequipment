@extends('layouts.app')
@section('content')
<section class="page-title page-title-layout4 text-center bg-overlay bg-parallax">
  <div class="bg-img"><img src="http://7oroof.com/demos/mintech/assets/images/page-titles/4.jpg" alt="background"></div>
  <div class="container">
    <div class="row">
      <div class="col-sm-12 col-md-12 col-lg-12 col-xl-6 offset-xl-3">
        <h1 class="pagetitle__heading mb-10">All Technologies</h1>
        <p class="pagetitle__desc">We Are Working On These Technologies</p>
      </div>
    </div>
  </div>
</section>
@include('pages.secondrynav')
<script type="text/javascript">
$( document ).ready(function() {
    $('#aboutus').removeClass('active');
    $('#whyus').removeClass('active');
    $('#alltechnologies').addClass('active');
    $('#pricingplans').removeClass('active');
    $('#faq').removeClass('active');
    $('#careers').removeClass('active');
});
</script>
<style type="text/css">
	.fancybox-item__desc p{
		text-align: justify;
	}
</style>
<section class="awards">
  <div class="container">
		<div class="row awards-wrapper">

		<?php foreach(DB::table('technologies')->get() as $r){ ?>
			
			  <div class="col-sm-6 col-md-6 col-lg-3">
			  	<a href="{{ url('') }}/{{ $r->technologiesurl }}">
			    <div style="    padding: 13px 17px 15px;" class="fancybox-item">
			      <div class="fancybox-item__icon__img">
			        <img src="{{ url('public/images') }}/{{ $r->image }}" alt="{{ $r->technologyname }} | Sarck Solution">
			      </div>
			      <div class="fancybox-item__content">
			        <h4 class="fancybox-item__title">{{ $r->technologyname }}</h4>
			        <div style="color: black;" class="fancybox-item__desc">{!! Str::limit($r->description, 130) !!} <span style="color: #00c881;font-weight: bold;">Read More</span></div>
			      </div>
			    </div>
			    </a>
			  </div>
		  
		<?php } ?>

		</div>
  </div><!-- /.container -->
</section>

@endsection