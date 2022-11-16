<div class="section-block-grey">
   <div class="container">
      <div class="section-heading text-center">
         <h4>Client Opinions & Reviews</h4>
         <div class="section-heading-line"></div>
      </div>
      <div class="row mt-50">
         <div class="owl-carousel owl-theme" id="testmonials-box-4">
            <?php foreach(DB::table('testimonials')->get() as $r){ ?>
            <div class="testmonial-box-4">
               <div class="row">
                  <div class="col-md-4 col-sm-4 col-4">
                     <div class="testmonial-box-4-img"> <img src="{{url('public/images')}}/{{ $r->image }}"> </div>
                  </div>
                  <div class="col-md-8 col-sm-8 col-8">
                     <div class="testmonial-box-4-text">
                        <p>{{ $r->testimonial }} </p>
                        <h4>{{ $r->name }}</h4>
                        <h5>{{ $r->designation }}</h5>
                     </div>
                  </div>
               </div>
            </div>
            <?php  } ?>
            
            
         </div>
      </div>
   </div>
</div>