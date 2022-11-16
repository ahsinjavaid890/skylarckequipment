<div class="section-block-grey">
 <div class="container">
    <div class="section-heading text-center">
         <h4>Our Services</h4>
         <div class="section-heading-line"></div>
      </div>
     <div class="row">
      <?php foreach(DB::table('services')->get() as $r){ ?>
         <div class="col-md-4 col-sm-4 col-12">
             <div class="blog-grid">
                 <div class="blog-grid-img"> <img src="{{ url('public/images/') }}/{{ $r->image }}" alt="img">
                     
                 </div>
                 <div class="blog-grid-text"> 
                     <h4>{{ $r->servicename }}</h4>
                     
                     <p>{{ Str::limit($r->serviceshortdescription, 100) }}</p>
                     <div class="mt-20 left-holder"> <a href="{{ url('') }}/{{ $r->serviceurl }}" class="primary-button button-sm">Read More</a> </div>
                 </div>
             </div>
         </div>

         <?php  } ?>

     </div>
 </div>
</div>