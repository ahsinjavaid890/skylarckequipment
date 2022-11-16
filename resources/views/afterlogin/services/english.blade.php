@extends('layouts.app')
@section('content')
<div class="Nav_Bar" style="height: 70px; background-color: #3b4155;">
    <div class="container">
        <ul>
            <?php foreach(DB::table('services')->where('status' , 1)->get() as $r){ ?>
                <li class="<?php if($id == $r->id){ echo "activebottomnavbar"; } ?>" ><a href="{{ url('servicedetails') }}/{{ $r->id }}">{{$r->englishname}}</a></li>
            <?php }  ?>
        </ul>
    </div>
</div>
<div style="margin-top: 20px;margin-bottom: 20px;" class="container">
    <div class="row">
        <?php foreach(DB::table('childservices')->where('category_id', $id)->get() as $r){ ?>
        <div class="col-lg-4 col-md-6">
            <div class="single-blog-post bg-fffbf5">
                <div class="post-image">
                    <div class="article-image-slides owl-carousel owl-theme">
                       @foreach (explode('|', $r->englishimage) as $image)
                       <div class="article-image">
                             <img style="height: 320px;" src="{{ url('public/images/') }}/{{$image}}" alt="image">
                       </div>
                       @endforeach
                    </div>
                </div>
                <div class="post-content">
                    <ul class="post-meta d-flex justify-content-between align-items-center">
                        <li>
                            <div class="post-author d-flex align-items-center">
                                <span>By Admin</span>
                            </div>
                        </li>
                        <li>
                            <i class="flaticon-calendar"></i>{{ date('M-d-Y') , $r->created_at }}
                        </li>
                    </ul>
                    <h3><a href="{{url('viewservice')}}/{{$r->id}}">{{$r->englishname}}</a></h3>
                    <div>
                        {!! Str::limit($r->englishdescription, 100) !!}
                   </div>
                </div>
            </div>
        </div>
    <?php } ?>
    </div>
</div>
<div style="margin-top: 20px;margin-bottom: 20px;" class="container">
  <h2>Advertisement</h2>
    <div class="row">
        <?php foreach(DB::table('advertisements')->where('parent_id', $id)->get() as $r){ ?>
        <div class="col-lg-4 col-md-6">
            <div class="single-blog-post bg-fffbf5">
                <div class="post-image">
                       <div class="article-image-slides owl-carousel owl-theme">
                       @foreach (explode('|', $r->englishimage) as $image)
                       <div class="article-image">
                             <img style="height: 320px;" src="{{ url('public/images/') }}/{{$image}}" alt="image">
                       </div>
                       @endforeach
                    </div>
                </div>
                <div class="post-content">
                    <ul class="post-meta d-flex justify-content-between align-items-center">
                        <li>
                            <div class="post-author d-flex align-items-center">
                                <span>By Admin</span>
                            </div>
                        </li>
                        <li>
                            <i class="flaticon-calendar"></i>{{ date('M-d-Y') , $r->created_at }}
                        </li>
                    </ul>
                    <h3>{{$r->englishname}}</h3>
                    <div>
                        {!! $r->englishdescription !!}
                   </div>
                </div>
            </div>
        </div>
    <?php } ?>
    </div>
</div>
<script type="text/javascript">
  var element = document.getElementById("why");
  element.classList.remove("active");
  var element2 = document.getElementById("home");
  element2.classList.remove("active");
  var element3 = document.getElementById("services");
  element3.classList.add("active");
</script>
@endsection
