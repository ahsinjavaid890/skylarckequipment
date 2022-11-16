@extends('layouts.app')
@section('content')

<div class="page-title-section" style="background-image: url('{{ url('public/images/pagetitle.jpg') }}');">
    <div class="container">
        <h1>Services</h1>
        <ul>
            <li><a href="{{url('')}}">Home</a></li>
            <li>Services</li>
        </ul>
    </div>
</div>

<div class="section-block-grey">
 <div class="container">
     <div class="row">
      <?php foreach(DB::table('services')->get() as $r){ ?>
         <div class="col-md-4 col-sm-4 col-12">
             <div class="blog-grid">
                 <div class="blog-grid-img"> <img src="{{ url('public/images/') }}/{{ $r->image }}" alt="img">
                     
                 </div>
                 <div class="blog-grid-text"> 
                     <h4>{{ $r->servicename }}</h4>
                     
                     <p>{{ Str::limit($r->serviceshortdescription, 100) }}</p>
                     <div class="mt-20 left-holder"> <a href="{{ url('') }}/{{ $r->serviceurl }}" class="primary-button button-sm">Read More</a> </div>
                 </div>
             </div>
         </div>

         <?php  } ?>

     </div>
 </div>
</div>
<div class="notice-section-grey notice-section-sm border-top">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-8 col-12">
                    <div class="mt-5">
                        <h6>Looking for Professional Approach and Quality Services ?</h6>
                        <div class="section-heading-line-left"></div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-12">
                    <div class="mt-10 right-holder-md"> <a href="#" class="primary-button button-sm mt-15-xs">Contact Us Today</a> </div>
                </div>
            </div>
        </div>
    </div>

@endsection