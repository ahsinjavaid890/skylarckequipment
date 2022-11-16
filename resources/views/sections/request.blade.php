<section style="padding-bottom: 10px;padding-top: 10px;padding-right: 10px; margin-bottom: unset;" class="banner-layout3">
<div class="bg-img"><img src="http://7oroof.com/demos/mintech/assets/images/backgrounds/8.jpg" alt="background"></div>
  <div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-6">
        <div class="su-content-wrap">
          <div style="padding: 40px;">
              <div style="margin-top: 70px;" class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                  <h4 style="color: white;">Quality Products</h4>
                  <p style="color: white;">We believe in Software Quality that is essential to deliver the product on time and on the required quality.</p>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                  <h4 style="color: white;">Timely Work</h4>
                  <p style="color: white;">We always plan the Project Development schedule for deploying the Project on time with all completed requirements.</p>
                </div>
              </div>
              <div style="margin-top: 60px;" class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                  <h4 style="color: white;">Relaibility</h4>
                  <p style="color: white;">Failure Free Products are our main target.We always develope the most reliable Products without any failure issue on future.</p>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                  <h4 style="color: white;">Maintainable</h4>
                  <p style="color: white;">Our Products are fully maintainable for the injection of any new Functionality or Requirement.</p>
                </div>
              </div>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-6">
        <div class="contact-panel">
        <form class="contact-panel__form" method="post" id="contactForm" novalidate="novalidate">
          {{ csrf_field() }}
          <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
              <h4 class="contact-panel__title">Request A Quote</h4>
            </div> <!-- /.col-lg-12 -->
            <div class="col-sm-6 col-md-6 col-lg-6">
              <div class="form-group">
                <label for="contact-name">Name (required)</label>
                <input type="text" class="form-control" placeholder="Name" id="contact-name" name="name" required="" aria-required="true">
              </div>
            </div> 
            <div class="col-sm-6 col-md-6 col-lg-6">
              <div class="form-group">
                <label for="contact-email">Email (required)</label>
                <input type="email" class="form-control" placeholder="Email" id="contact-email" name="email" required="" aria-required="true">
              </div>
            </div> 
           <div class="col-sm-6 col-md-6 col-lg-6">
              <div class="form-group">
                <label for="contact-Phone">Inquiry</label>
                <select id="contact-service" name="service" required=""  class="form-control">
                  <option value="">Select Service</option>
                  <?php foreach(DB::table('services')->get() as $r){ ?>
                    <option value="{{ $r->servicename }}">{{ $r->servicename }}</option>
                  <?php } ?>
                </select>
              </div>
            </div> 
            <div class="col-sm-6 col-md-6 col-lg-6">
              <div class="form-group">
                <label for="contact-Phone">Phone (Optional)</label>
                <input type="text" class="form-control" placeholder="Phone" id="Phone" name="phone">
              </div>
            </div> 
            <div class="col-sm-12 col-md-12 col-lg-12">
              <div class="form-group">
                <label for="contact-message">Additional Details (optional)</label>
                <textarea class="form-control" placeholder="Describe your inquirey!" id="message" name="message"></textarea>
              </div>
              <div class="custom-control custom-checkbox d-flex align-items-center mb-20">
                <input type="checkbox" class="custom-control-input" id="terms">
                <label class="custom-control-label" for="terms">I accept the privacy and terms.</label>
              </div>
              <button type="submit" class="btn btn__secondary btn__xl btn__block">Submit Request </button>
              <div class="contact-result"></div>
            </div><!-- /.col-lg-12 -->
          </div><!-- /.row -->
        </form>
      </div>
    </div>
</div>
</section>