<section class="awards pt-20">
  <div class="container">
    <div class="row">
      <div class="col-sm-12 col-md-12 col-lg-8">
        <div class="heading-layout2">
          <h3 class="heading__title mb-50">We are working on these Technologies</h3>
        </div>
      </div>
    </div>
    <div class="row awards-wrapper">
    <?php foreach(DB::table('technologies')->limit(4)->get() as $r){ ?>
      <div style="margin-bottom: 20px;" class="col-sm-6 col-md-6 col-lg-3">
        <div class="gp_products_inner">
          <div class="gp_products_item_image">
            <a href="{{ url('') }}/{{ $r->technologiesurl }}">
              <img src="{{ url('public/images') }}/{{ $r->image }}" alt="{{ $r->technologyname }} | Sarck Solution">
            </a>
          </div>
        </div>
      </div>
    <?php } ?>
    </div>
    <div style="margin-top: 20px;" class="row align-items-center">
      <div class="col-sm-12 col-md-12 col-lg-5">
      </div>
      <div class="col-sm-12 col-md-12 col-lg-7 d-flex justify-content-end">
        <a href="{{ url('alltechnologies') }}" class="btn btn__primary btn__link">
          <span>Explore All Technologies</span><i class="icon-arrow-right icon-outlined"></i>
        </a>
      </div>
    </div>
  </div>
</section>