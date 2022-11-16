@include('alerts')
<div class="section-block-bg" style="background-image: url('{{url("public/img/bg/bg13.jpg")}}')">
<div class="container-fluid">
   <div class="section-heading center-holder">
      <h2>Sky Lark Industrial Equipments</h2>
      <div class="section-heading-line"></div>
      <p>Sky Lark Industrial Equipments has a highly skilled machine repair team that can rebuild and refurshib your machinary offering a cost-effective alternative to buying new. While many machine repair and refurbishment job can be completed on-site,our fully equipped faculity can accommodate major tasks with speed and efficiency, minimizing downtime </p>
   </div>
</div>
</div> 
<section style="background-image: url('{{url("public/img/bg/team5.jpg")}}');    background-size: cover;
background-repeat: no-repeat;
background-position: 50% 50%;
padding: 90px 0px 90px 0px;">        
<div class="row">
   <div class="col-md-6">
      <div id="erdunt_any_questions-3" class="service-widget sidebar-widget widget_erdunt_any_questions">
         <!--Start Single Sidebar-->
         <div class="single-sidebar-box" >
            <div class="sidebar-contact-info">
               <div class="icon">
                  <span class="icon-phone">
                  <img src="{{ url('public/images/callicon.png') }}" alt="">
                  </span>
               </div>
               <div class="container">
                  <h3>Got any Questions?<br> Call us Today!</h3>
                  <div class="border-box"></div>
                  <div class="phone">
                     <a href="tel:{{DB::table('sitesettings')->where('id', 1)->first()->phoneno}}">{{DB::table('sitesettings')->where('id', 1)->first()->phoneno}}</a>
                  </div>
                  <div class="mail">
                     <a href="mailto:info@example.com">{{DB::table('sitesettings')->where('id', 1)->first()->email}}</a>
                  </div>
               </div>
            </div>
         </div>
         <!--End Single Sidebar-->
      </div>
   </div>
   <div class="col-md-6">
      <div class="container">
         <form method="POST" action="{{ url('submitcontactus') }}">
            {{ csrf_field() }}
         <div class="card1">
            <div class="card">
               <div class="card-body">
                  <div class="box">
                     <div class="text-center">
                        <h2 class="h2">Get A Free Consultation</h2>
                        <p class="p">We'll reply within 48 hrs for better support</p>
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="lab">Your Name</label>
                     <input name="name" class="form-control" placeholder="Enter your Name....">
                  </div>
                  <div class="form-group">
                     <div class="row">
                        <div class="col-md-6">
                           <label class="lab">Email</label>
                           <input name="email" class="form-control" placeholder="Enter your Email">
                        </div>
                        <div class="col-md-6">
                           <label class="lab">Phone</label>
                           <input name="phone" class="form-control" placeholder="Enter your Phone">
                        </div>
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="lab">Subject</label>
                     <input name="websitename" class="form-control" placeholder="Enter Subject....">
                  </div>
                  <div class="form-group">
                     <label class="lab">Message</label>
                     <textarea name="message" class="form-control" rows="5" placeholder="Enter your Message......"></textarea>
                  </div>
                  <div class="form-group">
                     <button class="btn btn-primary btn-block">Send Query</button>
                  </div>
               </div>
            </div>
         </div>
         </form>
      </div>
   </div>
</div>
</section>