 @extends('layouts.app')
@section('title')
    <title>Beat My Quote</title>
@endsection
@section('content')
 <div class="container-xxl py-5" data-wow-delay="0.1s">
     <div class="row">
         <div class="col-md-8">
             <div class="">
                 <div class="wow fadeInUp" data-wow-delay="0.1s">
                     <div class="mb-5 fonttext">Get a 5% special discount on your First Umrah Package with Safa Travel.
                     </div>
                 </div>
                 <div class="row g-4 bg-white">
                     <form id="frm-beat" name="frm-beat" method="post" onsubmit="return false;">
                         <div class="row g-3">
                             <div class="col-md-4">
                                 <div class="form-floating">
                                     <input type="text" class="form-control" id="beat-name" name="beat-name"
                                         placeholder="Your Name">
                                     <label for="email">Full Name</label>
                                     <div id="beatmsg1"></div>
                                 </div>
                             </div>
                             <div class="col-md-4">
                                 <div class="form-floating">
                                     <input type="email" class="form-control" id="beat-email" name="beat-email"
                                         placeholder="Your Email">
                                     <label for="email">Email</label>
                                     <div id="beatmsg2"></div>
                                 </div>
                             </div>
                             <div class="col-md-4">
                                 <div class="form-floating">
                                     <input type="text" class="form-control" id="beat-phone" name="beat-phone"
                                         placeholder="Phone No">
                                     <label for="email">Phone Number</label>
                                     <div id="beatmsg3"></div>
                                 </div>
                             </div>
                             <div class="col-md-4">
                                 <select class="form-select mb-2" id="beat-passengers" name="beat-passengers">
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
                                 <div id="beatmsg4"></div>
                             </div>
                             <div class="col-md-4">
                                 <select class="form-select mb-2" id="beat-nmakkah" name="beat-nmakkah">
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
                                 <div id="beatmsg5"></div>
                             </div>
                             <div class="col-md-4">
                                 <select class="form-select mb-2" id="beat-nmadina" name="beat-nmadina">
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
                                 <div id="beatmsg6"></div>
                             </div>
                             <div class="col-md-4 mb-2">

                                 <input type="text" id="beat-departuredate" name="beat-departuredate"
                                     class="datetimepicker form-select" placeholder="Departure Date" />
                                 <div id="beatmsg7"></div>
                             </div>

                             <div class="col-md-4 mb-2">
                                 <input type="text" id="beat-returndate" name="beat-returndate"
                                     class="datetimepicker form-select" placeholder="Return Date" />
                                 <div id="beatmsg8"></div>
                             </div>
                             <div class="col-md-4">
                                 <div class="form-floating">
                                     <input type="text" class="form-control" id="beat-quote" name="beat-quote"
                                         placeholder="Package Quote">
                                     <label for="email">Package Quote</label>
                                     <div id="beatmsg10"></div>
                                 </div>
                             </div>
                             <div class="col-12">
                                 <div class="form-floating">
                                     <textarea class="form-control" placeholder="Leave a message here" id="beat-mesg" name="beat-mesg"
                                         style="height: 100px"></textarea>
                                     <label for="message">Message</label>
                                     <div id="beatmsg9"></div>
                                 </div>
                             </div>
                             <div class="col-12">
                                 <div id="beat-success-msg"></div>
                                 <button class="btn btn-primary w-100 py-3" type="button" id="btn-beat">Send
                                     Message</button>
                             </div>
                         </div>
                     </form>
                 </div>
                 <div class="col-12 mb-5">
                 </div>
             </div>
         </div>
         @include('layouts.rightside_beat')
     </div>
 </div>
@endsection
