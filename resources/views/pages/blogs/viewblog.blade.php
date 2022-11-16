@extends('layouts.app')
@section('content')
<div class="page-title-section" style="background-image: url('{{ url('public/images/pagetitle.jpg') }}');">
  <div class="container">
      <h1>{{ $data->tittle }}</h1>
      <ul>
          <li><a href="{{ url('') }}">Home</a></li>
          <li>{{ $data->tittle }}</li>
      </ul>
  </div>
</div>
 <div class="section-block">
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-sm-8 col-12">
                <div class="blog-list-left"> <img src="{{ url('public/images') }}/{{ $data->image }}" alt="img">
                    <div class="data-box">
                        <h4>{{ date('d,', strtotime($data->blogdate)) }}</h4> <strong>{{ date('M', strtotime($data->blogdate)) }}</strong> </div>
                    <div class="blog-title-box">
                        <h2>{{ $data->tittle }}</h2> <span><i class="fa fa-calendar"></i>{{ date('M d, Y', strtotime($data->blogdate)) }}</span> <span><i class="fa fa-list-ul"></i>Business</span> </div>
                    <div class="blog-post-content">
                        {!! $data->description !!}
                        <div class="blog-comments mt-50">
                            <h3 class="mt-30">Your Comment:</h3>
                            <form class="comment-form" method="post" autocomplete="off">
                                <div class="row">
                                    <div class="col-6"> <input name="name" placeholder="Your Name"> </div>
                                    <div class="col-6"> <input name="email" placeholder="E-mail adress" type="email"> </div>
                                    <div class="col-12"> <textarea name="message" placeholder="Your Message"></textarea> </div>
                                </div>
                            </form>
                            <div class="mt-10 left-holder"> <a href="#" class="primary-button button-md">Send Comment</a> </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-4 col-12">
                <div class="blog-list-right">
                    <div id="search-input">
                        <div class="input-group"> <input type="text" class="form-control" placeholder="Search" /> <span class="input-group-btn"><button class="btn" type="button"><i class="glyphicon glyphicon-search"></i></button> </span> </div>
                    </div>
                    <div class="blog-list-left-heading">
                        <h4>Categories</h4>
                    </div>
                    <div class="blog-categories">
                        <ul>
                          @foreach (DB::table('blogcategories')->get() as $r)
                            <li><a href="{{ url('') }}/{{ $r->url  }}">{{ $r->name  }}</a></li>
                          @endforeach   
                        </ul>
                    </div>
                    <div class="blog-list-left-heading">
                        <h4>Recent News</h4>
                    </div>
                     @foreach (DB::table('blogs')->limit(4)->get() as $r)
                    <div class="latest-posts">
                        <div class="row">
                            <div class="col-md-5 col-sm-5 col-4 latest-posts-img"> <img src="{{ url('public/images') }}/{{ $r->image }}" alt="blog-img"> </div>
                            <div class="col-md-7 col-sm-7 col-8 latest-posts-text pl-0"> <a href="{{ url('') }}/{{ $r->url }}">{{ $r->tittle }}</a> <span>{{ date('M d Y', strtotime($r->blogdate)) }}</span> </div>
                        </div>
                    </div>
                    @endforeach
                    <div class="blog-list-left-heading">
                        <h4>Tags</h4>
                    </div>
                    <div class="mt-10"> 

                      @foreach (explode('|', $data->blogtags) as $tag)
                        <?php $blogurl =  DB::table('blogtags')->where('name', $tag)->first()->url; ?>
                        <a class="button-tag primary-button" href="{{ url('') }}/{{ $blogurl }}">{{ $tag }}</a>
                      @endforeach  
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection