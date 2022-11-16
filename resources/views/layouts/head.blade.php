<link href="{{ asset('public/images/favicon/favicon.png') }}" rel="icon">
<title>@if(!empty($metatags)){{ $metatags->mettatittle }} @else Sarck Solution @endif</title>
<meta name="keywords" content="Industrial Equipment , Equipment , Industrial , Services , Providers , Contact US" />
<meta name="description" content="Sky Lark Industrial Equipments has a highly skilled machine repair team that can rebuild and refurshib your machinary offering a cost-effective alternative to buying new. While many machine repair and refurbishment job can be completed on-site,our fully equipped faculity can accommodate major tasks with speed and efficiency, minimizing downtime">
<meta charset="UTF-8">
<link rel="shortcut icon" href="https://skylarkequipment.com/public/img/logos/logo.jpg"/>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="stylesheet" type="text/css" href="{{ asset('public/css/bootstrap.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/css/font-awesome.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/css/icomoon.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/css/swiper.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/css/rev-settings.css') }}">
<link rel="stylesheet" href="{{ asset('public/css/animate.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/css/switcher.css') }}">
<link rel="stylesheet" href="{{ asset('public/css/owl.carousel.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/css/swiper.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/css/slider.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/css/default.css') }}">
<script src="{{ url('public/js/jquery.min.js') }}"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('public/css/styles.css') }}" id="colors">
<link href="https://fonts.googleapis.com/css?family=Fira+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">
<input type="hidden" value="{{url('/')}}" id="url" name="url">
<?php $ogurl =  url()->current(); ?>
<meta property="og:url" content="{{ $ogurl }}"/>
<meta property="og:site_name" content="Sky Lark Industrial Equipment"/>
<meta property="og:type" content="website"/>
<link rel="canonical" href="{{ $ogurl }}">
<!-- <div id="preloader">
 <div class="row loader">
    <div class="loader-icon"></div>
 </div>
</div> -->
<div id="top-bar" class="hidden-sm-down">
 <div class="container">
    <div class="row">
       <div class="col-md-9 col-12">
          <div class="top-bar-welcome">
             <ul>
                <li>Sky Lark Industrial Equipment Trading LLC</li>
             </ul>
          </div>
          <div class="top-bar-info">
             <ul>
                <li><i class="fa fa-phone"></i>{{DB::table('sitesettings')->where('id', 1)->first()->phoneno}}
                <li> 
                <li><i class="fa fa-envelope"></i>{{DB::table('sitesettings')->where('id', 1)->first()->email}}
                <li> 
             </ul>
          </div>
       </div>
       <div class="col-md-3 col-12">
         <?php 
         $facebook =  DB::table('sitesettings')->where('id', 1)->first()->facebook; 
         $twitter = DB::table('sitesettings')->where('id', 1)->first()->twitter;
         $instagram = DB::table('sitesettings')->where('id', 1)->first()->instagram;
         $linkdlin = DB::table('sitesettings')->where('id', 1)->first()->linkdlin;
       ?>

          <ul class="social-icons hidden-md-down">
             @if(!empty($facebook))
           <li><a href="{{ $facebook }}"><i class="fa fa-facebook-square"></i></a></li>
           @endif
           @if(!empty($instagram))
           <li><a href="{{ $instagram }}"><i class="fa fa-instagram"></i></a></li>
           @endif
           @if(!empty($twitter))
           <li><a href="{{ $twitter }}"><i class="fa fa-pinterest"></i></a></li>
           @endif
           @if(!empty($linkedin))
           <li><a href="{{ $linkedin }}"><i class="fa fa-linkedin"></i></a></li>
           @endif
          </ul>
       </div>
    </div>
 </div>
</div>