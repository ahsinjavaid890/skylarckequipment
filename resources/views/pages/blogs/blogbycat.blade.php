@extends('layouts.app')
@section('content')
<section class="page-title page-title-layout16 bg-overlay bg-parallax">
  <div class="bg-img"><img src="http://7oroof.com/demos/mintech/assets/images/page-titles/12.jpg" alt="background"></div>
  <div class="container">
    <div class="row">
      <div class="col-sm-12 col-md-12 col-lg-12">
        <h1 class="pagetitle__heading mb-10">{{ $metatags->name }} Blogs</h1>
        <nav>
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ url('') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Blog</li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
</section>
<section class="blog-grid">
  <div class="container">
    <div class="row">
     @foreach($data as $r)
      <div class="col-sm-12 col-md-6 col-lg-4">
        <div class="post-item">
          <div class="post-item__img">
            <a href="{{ url('') }}/{{ $r->url }}">
              <img src="{{ url('public/images') }}/{{ $r->image }}" alt="blog image">
            </a>
          </div>
          <div class="post-item__content">
            <div class="post-item__meta d-flex flex-wrap">
              <div class="post-item__meta__cat">
                <a href="{{ url('') }}/<?php echo DB::table('blogcategories')->where('id', $r->blogcategoryid)->first()->url; ?>"><?php echo DB::table('blogcategories')->where('id', $r->blogcategoryid)->first()->name; ?></a>
              </div>
              <span class="post-item__meta__date">{{ date('M d Y', strtotime($r->blogdate)) }}</span>
            </div>
            <h4 class="post-item__title"><a href="{{ url('') }}/{{ $r->url }}">{{ $r->tittle }}</a>
            </h4>
            <p class="post-item__desc">{!! Str::limit($r->description, 300) !!}
            </p>
            <a href="{{ url('') }}/{{ $r->url }}" class="btn btn__secondary btn__link">
              <span>Read More</span>
              <i class="icon-arrow-right"></i>
            </a>
          </div>
        </div>
      </div>
    @endforeach
    </div>
<!--     <div class="row">
      <div class="col-sm-12 col-md-12 col-lg-12 text-center">
        <nav class="pagination-area">
          <ul class="pagination justify-content-center">
            <li><a class="current" href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#"><i class="icon-arrow-right"></i></a></li>
          </ul>
        </nav>
      </div>
    </div> -->
  </div>
</section>
@endsection