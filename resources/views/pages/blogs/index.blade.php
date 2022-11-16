@extends('layouts.app')
@section('content')
<div class="page-title-section" style="background-image: url('{{ url('public/images/pagetitle.jpg') }}');">
    <div class="container">
        <h1>Blog Grid</h1>
        <ul>
            <li><a href="index.html">Home</a></li>
            <li><a href="blog-grid.html">Blog Grid</a></li>
        </ul>
    </div>
</div>
<div class="section-block-grey">
  <div class="container">
      <div class="row">
          <?php foreach(DB::table('blogs')->get() as $r){ ?>
          <div class="col-md-4 col-sm-4 col-12">
              <div class="blog-grid">
                  <div class="blog-grid-img"> <img src="{{ url('public/images') }}/{{ $r->image }}" alt="{{ $r->tittle }}">
                      <div class="data-box-grid">
                          <h4>{{ date('d', strtotime($r->blogdate)) }}</h4>
                          <p>{{ date('M', strtotime($r->blogdate)) }}</p>
                      </div>
                  </div>
                  <div class="blog-grid-text"> <span><a href="{{ url('') }}/<?php echo DB::table('blogcategories')->where('id', $r->blogcategoryid)->first()->url; ?>"><?php echo DB::table('blogcategories')->where('id', $r->blogcategoryid)->first()->name; ?></a></span>
                      <h4>{{ $r->tittle }}</h4>
                      <ul>
                          <li><i class="fa fa-calendar"></i>{{ date('M d Y', strtotime($r->blogdate)) }}</li>
                          <li><i class="fa fa-list-ul"></i><a href="{{ url('') }}/<?php echo DB::table('blogcategories')->where('id', $r->blogcategoryid)->first()->url; ?>"><?php echo DB::table('blogcategories')->where('id', $r->blogcategoryid)->first()->name; ?></a></li>
                      </ul>
                      <p>{{ Str::limit($r->blogshortdescription, 200) }}</p>
                      <div class="mt-20 left-holder"> <a href="{{ url('') }}/{{ $r->url }}" class="primary-button button-sm">Read More</a> </div>
                  </div>
              </div>
          </div>
          <?php  } ?>
      </div>
  </div>
</div>
@endsection