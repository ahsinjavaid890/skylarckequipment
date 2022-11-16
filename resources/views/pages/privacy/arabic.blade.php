@extends('layouts.app')
@section('content')
<!-- Start Page Title Area -->
<section class="page-title-area">
   <div class="container">
      <div style="text-align: right;" class="page-title-content">
         <h2>سياسة الخصوصية </h2>
      </div>
   </div>
   <div class="shape-img2"><img src="https://templates.envytheme.com/tracer/default/assets/img/shape/shape2.png" alt="image"></div>
   <div class="shape-img3"><img src="https://templates.envytheme.com/tracer/default/assets/img/shape/shape3.png" alt="image"></div>
</section>
<section class="privacy-policy-area ptb-100">
   <div class="container">
       <div style="direction: rtl;" class="row">
           <div class="col-lg-8 col-md-12">
               <div class="privacy-policy-content">
                   <?php foreach(DB::table('privacypolicies')->get() as $r){ ?>
                      <h3 style="text-align: right;">{{ $r->id }}. {{ $r->heading_arabic }}</h3>
                      <?php if($r->important == 1){ ?> <blockquote class="blockquote"> <?php } ?>

                      <p style="text-align: right;">{{ $r->paragraph_arabic }}</p>
                      <?php if($r->important == 1){ ?> </blockquote> <?php } ?>
                   <?php } ?>
               </div>
           </div>

           <div class="col-lg-4 col-md-12">
               <aside class="widget-area">
                   <section class="widget widget_insight">
                       <ul style="padding-right: unset; list-style-type: none;">
                           <li><a style="text-align: right;" href="{{ url('why-tamwilly') }}">لماذا تمويلي</a></li>
                           <li><a style="text-align: right;" href="{{ url('commission') }}">التكليف</a></li>
                           <li class="active"><a style="text-align: right;"href="{{ url('privacy-policy') }}">سياسة خاصة</a></li>
                           <li><a style="text-align: right;" href="{{ url('terms-nd-condition') }}">البنود و الظروف</a></li>
                       </ul>
                   </section>

                   <section class="widget widget_recent_courses">
                       <h3 style="text-align: right;" class="widget-title">خدمات مشهورة</h3>
                     <?php foreach(DB::table('childservices')->inRandomOrder()->limit(1)->get() as $r){ ?>
                        <div class="row">
                          <div class="col-lg-12 col-md-6">
                            <div class="single-blog-post bg-fffbf5">
                                <div class="post-image">
                                    <a href="{{url('viewservice')}}/{{$r->id}}">
                                        <img style="height: 320px;" src="{{url('public/images/chlidservices/')}}/{{$r->englishimage}}" alt="image">
                                    </a>
                                </div>

                                <div class="post-content">
                                    <ul class="post-meta d-flex justify-content-between align-items-center">
                                        <li>
                                            <div class="post-author d-flex align-items-center">
                                                <!-- <img src="assets/img/user1.jpg" class="rounded-circle" alt="image"> -->
                                                <span>By Admin</span>
                                            </div>
                                        </li>
                                        <li>
                                            <i class="flaticon-calendar"></i>{{ date('M-d-Y') , $r->created_at }}
                                        </li>
                                    </ul>
                                    <h3 style="text-align: right;"><a href="{{url('viewservice')}}/{{$r->id}}">{{$r->arabicname}}</a></h3>
                                    <div style="text-align: right;">
                                      {!! Str::limit($r->arabicdescription, 100) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                          </div>
                      <?php } ?>
                   </section>
               </aside>
           </div>
       </div>
   </div>
</section>
@endsection