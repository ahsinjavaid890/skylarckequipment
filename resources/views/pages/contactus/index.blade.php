@extends('layouts.app')
@section('content')
@include('alerts')
<div class="page-title-section" style="background-image: url('{{ url('public/images/pagetitle.jpg') }}');">
    <div class="container">
        <h1>Contact</h1>
        <ul>
            <li><a href="{{ url('') }}">Home</a></li>
            <li><a href="{{ url('contactus') }}">Contact</a></li>
        </ul>
    </div>
</div>
<div class="section-block-grey">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-6 col-12">
                <div class="contact-box"> <i class="fa fa-phone-square"></i>
                    <h4>Call Us</h4> <span>{{DB::table('sitesettings')->where('id', 1)->first()->phoneno}}</span> </div>
            </div>
            <div class="col-md-4 col-sm-6 col-12">
                <div class="contact-box"> <i class="fa fa-map"></i>
                    <h4>Visit Us</h4> <span>{{DB::table('sitesettings')->where('id', 1)->first()->address}}</span> </div>
            </div>
            <div class="col-md-4 col-sm-6 col-12">
                <div class="contact-box"> <i class="fa fa-envelope"></i>
                    <h4>Mail Us</h4> <span>{{DB::table('sitesettings')->where('id', 1)->first()->email}}</span> </div>
            </div>
        </div>
    </div>
</div>
<div class="section-block">
    <div class="container">
        <div class="section-heading center-holder"> <span>Get in Touch</span>
            <h3>Let's Talk about Your Business</h3>
            <div class="section-heading-line"></div>
        </div>
        <div class="mt-50">
            <div class="contact-form-box">
                <form method="POST" action="{{ url('submitcontactus') }}" class="contact-form row">
                  {{ csrf_field() }}
                    <div class="col-md-6 col-sm-6 col-12"> 
                      <input type="text" name="name" placeholder="Name"> 
                    </div>
                    <div class="col-md-6 col-sm-6 col-12"> 
                      <input type="email" name="email" placeholder="E-mail"> 
                    </div>
                    <div class="col-md-12"> 
                      <input type="text" name="phone" placeholder="Phone Number"> 
                    </div>
                    <div class="col-md-12"> 
                      <input type="text" name="websitename" placeholder="Subject"> 
                    </div>
                    <div class="col-md-12"> 
                      <textarea name="message" placeholder="Message"></textarea> 
                    </div>
                    <div class="col-md-12">
                        <div class="center-holder"> 
                          <button type="submit">Send Message</button> 
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection