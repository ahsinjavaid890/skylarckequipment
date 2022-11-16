@extends('layouts.app')
@section('content')
<div class="page-title-section" style="background-image: url('{{ url('public/images/pagetitle.jpg') }}'">
    <div class="container">
        <h1>{{ $data->servicename }}</h1>
        <ul>
            <li><a href="{{ url('') }}">Home</a></li>
            <li>{{ $data->servicename }}</li>
        </ul>
    </div>
</div>
<!-- ========================
  About Layout 4
=========================== -->
<div class="section-block">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-4 col-12">
                <div class="services-single-left-box">
                    <div class="services-single-left-heading">
                        <h4>All Services</h4>
                    </div>
                    <div class="services-single-menu mt-30">
                        <ul>
                          <?php foreach(DB::table('services')->get() as $r){ ?>
                            <li @if($r->id == $data->id) class="services-active" @endif ><a href="{{ url('') }}/{{ $r->serviceurl }}">{{ $r->servicename }}</a></li>
                          <?php  } ?>
                        </ul>
                    </div>
                    <div class="services-single-left-heading mt-40">
                        <h4>Need Help ?</h4>
                    </div>
                    <ul class="primary-list mt-30">
                        <li><i class="fa fa-globe"></i>Street Sheram 113/11 9007</li>
                        <li><i class="fa fa-phone"></i>(+123) 123-456-789</li>
                        <li><i class="fa fa-envelope-open"></i>SpecThemes@gmail.com</li>
                    </ul>
                    <div class="callback-box mt-30">
                        <div class="services-single-left-heading">
                            <h4>Request a Callback</h4>
                        </div>
                        <form method="get" action="#" class="callback-box-form mt-20"> <input type="text" name="name" placeholder="Your Name"> <input type="text" name="phone" placeholder="Phone Number"> <button type="submit">Request</button> </form>
                    </div>
                </div>
            </div>
            <div class="col-md-9 col-sm-8 col-12">
                <div style="height: 350px;" class="services-single-right"> 
                  <img style="width:100%;height: 100%;" src="{{ url('public/images/') }}/{{ $data->image }}" class="rounded-border" alt="img">
                </div>
                 <div style="margin-top: 50px;" class="container">
                    {!! $data->servicedescription !!}
                  </div>
            </div>
        </div>
    </div>
</div>
@endsection