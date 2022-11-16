@extends('layouts.app')
@section('content')
@if(session()->has('modal'))
     <script type="text/javascript">
        $(document).ready(function(){
          $('#loginmodalarabic').modal('show');
        });
    </script>
@endif
<div class="Nav_Bar" style="height: 70px; background-color: #3b4155;">
	<div style="direction: rtl;" class="container">
		<ul style="text-align: center;">
			<?php foreach(DB::table('services')->where('status' , 1)->get() as $r){ ?>
		    	<li><a href="{{ url('servicedetails') }}/{{ $r->id }}">{{$r->arabicname}}</a></li>
		    <?php }  ?>
		</ul>
	</div>
</div>
<div style="margin-top: 20px;margin-bottom: 20px;" class="container">
    <div class="row">
    	<?php foreach(DB::table('childservices')->get() as $r){ ?>
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