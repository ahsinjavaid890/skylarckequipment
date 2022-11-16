@extends('layouts.app')
@section('content')
      <div class="page-title-section" style="background-image: url('{{ url('public/images/pagetitle.jpg') }}');">
        <div class="container">
            <h1>About Us</h1>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="about.html">About</a></li>
            </ul>
        </div>
    </div>
        <div class="section-block" style="background-image: url('{{url("public/img/bg/bg13.jpg")}}')">
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-sm-5 col-12"> <img src="{{url('public/images/home13.jpg')}}" class="rounded-border shadow-primary" alt="img"> </div>
                <div class="col-md-7 col-sm-7 col-12">
                    <div class="pl-30-md mt-40">
                        <div class="section-heading">
                            <h3>Who We Are</h3>
                        </div>
                        <div class="section-heading-line-left"></div>
                                <p>End to End has a highly skilled machine repair team that can rebuild and refurshib your machinary
offering a cost-effective alternative to buying new. While many machine repair and refurbishment
job can be completed on-site,our fully equipped faculity can accommodate major tasks with
speed and efficiency,minimizing downtown.</p>
                        <div class="mt-20">
                            <ul class="primary-list">
                                <li><i class="fa fa-caret-right"></i>Exceed our customer's expectation utilizing our turn key solutions,partnership, <br>and empowered employees.</li>
                                <li><i class="fa fa-caret-right"></i>Be the most desired workplace by valuing our employees and providing the utmost <br>supprotto communities</li>
                                <li><i class="fa fa-caret-right"></i>Be the most respectd industrial contractor in the natoin</li>
                            </ul>
                        </div>
                        <div class="mt-25"> <a href="{{ url('contactus') }}" class="primary-button button-sm mb-15-xs">Contact Us</a> </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
      @include('sections.plans')
@endsection