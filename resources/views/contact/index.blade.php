 @extends('layouts.app')
@section('title')
    <title>Safa Travel UK - Contact Us | Queries & Support fo...</title>
    <meta name="description"
        content="Have questions about our Hajj or Umrah services? C...">
@endsection
@section('content')
@include('partials.home.banner')
 <div class="container-xxl py-5">
        <div class="container-xxl">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Contact Us</h6>
                <h1 class="mb-5">Contact For Any Query</h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <h5>Get In Touch</h5>
                    <p class="mb-4">Do you have any question or feedback regarding our services or you want us to get back to you? Fill out the below given form and our team will get back to you within 1 to 2 hours.
                    You data is secured with us as information gathered from you will never be shared with any third party without your consent.</p>
                    <div class="d-flex align-items-center mb-4">
                        <div class="d-flex align-items-center justify-content-center flex-shrink-0 bg-primary" style="width: 50px; height: 50px;">
                            <i class="fa fa-map-marker-alt text-white"></i>
                        </div>
                        <div class="ms-3">
                            <h5 class="text-primary">Office</h5>
                            <p class="mb-0">13 Station Rd, London SE25 5AH</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center mb-4">
                        <div class="d-flex align-items-center justify-content-center flex-shrink-0 bg-primary" style="width: 50px; height: 50px;">
                            <i class="fa fa-phone-alt text-white"></i>
                        </div>
                        <div class="ms-3">
                            <h5 class="text-primary">Mobile</h5>
                            <p class="mb-0"><a href="tel:02032867666">020 3286 7666</a></p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="d-flex align-items-center justify-content-center flex-shrink-0 bg-primary" style="width: 50px; height: 50px;">
                            <i class="fa fa-envelope-open text-white"></i>
                        </div>
                        <div class="ms-3">
                            <h5 class="text-primary">Email</h5>
                            <p class="mb-0"><a href="mailto:info@safatravel.co.uk">info@safatravel.co.uk</a></p>
                        </div>
                    </div>
                </div>
               <!--  <div class="col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <iframe class="position-relative rounded w-100 h-100"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3001156.4288297426!2d-78.01371936852176!3d42.72876761954724!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4ccc4bf0f123a5a9%3A0xddcfc6c1de189567!2sNew%20York%2C%20USA!5e0!3m2!1sen!2sbd!4v1603794290143!5m2!1sen!2sbd"
                        frameborder="0" style="min-height: 300px; border:0;" allowfullscreen="" aria-hidden="false"
                        tabindex="0"></iframe>
                </div>-->
                <div class="col-lg-6 col-md-12 wow fadeInUp" data-wow-delay="0.5s">
                    <form name="frm-contact" id="frm-contact" method="post" onsubmit="return false;">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="enquiry-name" name="enquiry-name" placeholder="Your Name">
                                    <label for="email">Your Name</label>
                                    <div id="name-msg" ></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="enquiry-phone" name="enquiry-phone" placeholder="Phone No">
                                    <label for="email">Phone No.</label>
                                     <div id="phone-msg" ></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="email" class="form-control" id="enquiry-email" name="enquiry-email" placeholder="Your Email">
                                    <label for="email">Your Email</label>
                                    <div id="email-msg" ></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="enquiry-city" name="enquiry-city" placeholder="Your Email">
                                    <label for="email">Your City</label>
                                    <div id="city-msg" ></div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave a message here" id="enquiry-mesg" name="enquiry-mesg" style="height: 100px"></textarea>
                                    <label for="message">Message</label>
                                    <div id="enq-msg" ></div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div id="enquiry-success-msg" ></div>
                                <button class="btn btn-primary w-100 py-3" type="button" id="btn-contact" >Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
