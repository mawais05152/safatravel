@extends('layouts.app')
@section('title')
    <title>Enquire Now</title>
@endsection
@section('content')
<div class="container-xxl py-5" data-wow-delay="0.1s">
    <div class="row">
        <div class="col-md-8">
            <div class="">
                <div class="wow fadeInUp" data-wow-delay="0.1s">
                    <div class="mb-5 fonttext">Get a 5% special discount on your First Umrah Package with Safa Travel.
                        Enquire Now!</div>
                </div>
                <div class="row g-4 bg-white">
                    <form name="frm-enquiry1" id="frm-enquiry1" method="post" onsubmit="return false;">
                        <div class="row g-3">

                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="enquiry-name1" name="enquiry-name1"
                                        placeholder="Your Name">
                                    <label for="email">Full Name</label>
                                    <div id="enqmsg1"></div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input type="email" class="form-control" id="enquiry-email1" name="enquiry-email1"
                                        placeholder="Your Email">
                                    <label for="email">Email</label>
                                    <div id="enqmsg2"></div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="enquiry-phone1" name="enquiry-phone1"
                                        placeholder="Phone No">
                                    <label for="email">Phone Number</label>
                                    <div id="enqmsg3"></div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <select class="form-select mb-2" id="enquiry-travelers1" name="enquiry-travelers1">
                                    <option value="">Passengers</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                    <option value="10">11</option>
                                </select>
                                <div id="enqmsg4"></div>
                            </div>
                            <div class="col-md-3">
                                <select class="form-select mb-2" id="enquiry-nmakkah1" name="enquiry-nmakkah1">
                                    <option value="">Makkah Nights</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                    <option value="10">11</option>
                                </select>
                                <div id="enqmsg5"></div>
                            </div>
                            <div class="col-md-3">
                                <select class="form-select mb-2" id="enquiry-nmadina1" name="enquiry-nmadina1">
                                    <option value="">Madina Nights</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                    <option value="10">11</option>
                                </select>
                                <div id="enqmsg6"></div>
                            </div>
                            <div class="col-md-3 mb-2">
                                <input type="text" id="enquiry-departuredate1" name="enquiry-departuredate1"
                                    class="datetimepicker form-select" placeholder="Departure Date" />
                                <div id="enqmsg7"></div>
                            </div>

                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave a message here" id="enquiry-mesg1" name="enquiry-mesg1"
                                        style="height: 100px"></textarea>
                                    <label for="message">Message</label>
                                    <div id="enqmsg9"></div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div id="enquiry-success-msg1"></div>

                                <button class="btn btn-primary w-100 py-3" type="button" id="btn-enquiry1">Send
                                    Message</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-12 mb-5">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
