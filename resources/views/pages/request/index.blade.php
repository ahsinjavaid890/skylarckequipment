@extends('layouts.app')
@section('content')
<section class="page-title page-title-layout12 bg-overlay bg-parallax text-center">
  <div class="bg-img"><img src="http://7oroof.com/demos/mintech/assets/images/page-titles/4.jpg" alt="Request Quote Sarck Solution"></div>
  <div class="container">
    <div class="row">
      <div class="col-sm-12 col-md-12 col-lg-12 col-xl-6 offset-xl-3">
        <h1 class="pagetitle__heading">Request a Quote</h1>
      </div>
    </div>
  </div>
</section>
<section class=" bg-overlay bg-overlay-primary">
  <div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
          <div class="contact-panel">
            <form class="contact-panel__form" method="post" action="assets/php/contact.php" id="contactForm">
              <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                  <h4 class="contact-panel__title">Request A Quote</h4>
                </div> <!-- /.col-lg-12 -->
                <div class="col-sm-6 col-md-6 col-lg-6">
                  <div class="form-group">
                    <label for="contact-name">Name (required)</label>
                    <input type="text" class="form-control" placeholder="Name" id="contact-name" name="contact-name"
                      required>
                  </div>
                </div><!-- /.col-lg-6 -->
                <div class="col-sm-6 col-md-6 col-lg-6">
                  <div class="form-group">
                    <label for="contact-email">Email (required)</label>
                    <input type="email" class="form-control" placeholder="Email" id="contact-email"
                      name="contact-email" required>
                  </div>
                </div><!-- /.col-lg-6 -->
                <div class="col-sm-6 col-md-6 col-lg-6">
                  <div class="form-group">
                    <label for="contact-Phone">Inquiry (required)</label>
                    <select class="form-control">
                      <option value="0">IT Management Services</option>
                      <option value="1">IT Management Services 2</option>
                      <option value="2">IT Management Services 3</option>
                    </select>
                  </div>
                </div><!-- /.col-lg-6 -->
                <div class="col-sm-6 col-md-6 col-lg-6">
                  <div class="form-group">
                    <label for="contact-Phone">Phone (Optional)</label>
                    <input type="text" class="form-control" placeholder="Phone" id="contact-Phone"
                      name="contact-phone">
                  </div>
                </div><!-- /.col-lg-6 -->
                <div class="col-sm-12 col-md-12 col-lg-12">
                  <div class="form-group">
                    <label for="contact-message">Additional Details (optional)</label>
                    <textarea class="form-control" placeholder="Describe your inquirey!" id="contact-message"
                      name="contact-message"></textarea>
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
        </div><!-- /.col-xl-6 -->
  </div>
  </div>
    
</section>
@endsection
