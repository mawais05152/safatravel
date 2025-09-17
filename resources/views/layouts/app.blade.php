<!DOCTYPE html>
<html lang="en">
<head>

    @yield('title')
    @include('layouts.partials.meta-tags')
    <link rel="icon" type="image/x-icon" href="{{ asset('img/favicon.ico') }}">
    <link href="{{ asset('img/favicon.ico') }}" rel="icon">
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />



    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="css/btn.css">
    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.min.css" />


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/jquery.datetimepicker.full.min.js"></script>


<script>


$(document).ready(function(){

$(document).on("input", "#enquiry-phone", function() {
    this.value = this.value.replace(/\D/g,'');
     $('#msg10').html('please enter only numaric value');

});


$(document).on("input", "#beat-phone", function() {
    this.value = this.value.replace(/\D/g,'');
     $('#beatmsg3').html('please enter only numaric value');

});
$(document).on("input", "#enquiry-phone1", function() {
    this.value = this.value.replace(/\D/g,'');
     $('#engmsg3').html('please enter only numaric value');

});


  $('#btn-contact').click(function() {

  $('#name-msg').html('');
  $('#phone-msg').html('');
  $('#email-msg').html('');
  $('#city-msg').html('');
  $('#enq-msg').html('');


    var email = $('#enquiry-email').val();

    var form = document.querySelector('#frm-contact');

    var formData = $(form).serialize();



    if($('#enquiry-name').val() == '') {
     $('#name-msg').html('Please Enter Name');

    return false;
    }
     if($('#enquiry-phone').val() == '') {
     $('#phone-msg').html('Please Enter Contact No.');

    return false;
    }

     if(IsEmail(email)==false){
     $('#email-msg').html('Please Enter Valid Email');

    return false;
    }
     if($('#enquiry-city').val() == '') {
     $('#city-msg').html('Please Enter City.');

    return false;
    }
     if($('#enquiry-mesg').val() == '') {
     $('#enq-msg').html('Please Enter Message.');

    return false;
    }

    $.ajax({

        url: "contactus.php",

        type: "post",

        data: formData,

        beforeSend: function() {

          $('#btn-contact').html('Submitting...');

        },

        success: function(result) {


          $('#enquiry-success-msg').html('We have received your enquiry! Thank you, our team will get back to you soon!');

          $('#btn-contact').html('Send message');

          $('#enquiry-email').val('');
          $('#enquiry-name').val('');
          $('#enquiry-phone').val('');
          $('#enquiry-city').val('');
          $('#enquiry-mesg').val('');


          $('#btn-close').click();


        }

    });

    return false;

  });




  $('#btn-enquiry').click(function() {

  $('#msg1').html('');
  $('#msg2').html('');
  $('#msg3').html('');
  $('#msg4').html('');
  $('#msg5').html('');
$('#msg6').html('');
  $('#msg7').html('');
  $('#msg8').html('');
  $('#msg9').html('');
  $('#msg10').html('');
  $('#msg11').html('');


    var email = $('#enquiry-email').val();

    var form = document.querySelector('#frm-enquiry');

    var formData = $(form).serialize();




     if($('#enquiry-departure').val() == '') {
       $('#msg1').html('Please Departure Airport');

      return;

    }

    if($('#enquiry-departuredate').val() == '') {
      $('#msg2').html('Please Enter Departure Date');

      return;

    }


    if($('#enquiry-hotelcategory').val() == '') {
       $('#msg4').html('Please Select Hotel Category');

      return;

    }
    if($('#enquiry-duration').val() == '') {
      $('#msg5').html('Please Enter Duration');

      return;

    }
    if($('#enquiry-travelers').val() == '') {
      $('#msg6').html('Please Select No. of Travelers');

      return;

    }

    if($('#enquiry-name').val() == '') {
     $('#msg9').html('Please Enter Name');

    return false;
    }
     if($('#enquiry-phone').val() == '') {
     $('#msg10').html('Please Enter Contact No.');

    return false;
    }

     if(IsEmail(email)==false){
     $('#msg11').html('Please Enter Valid Email');

    return false;
    }




    $.ajax({

        url: "enquiry.php",

        type: "post",

        data: formData,

        beforeSend: function() {

          $('#btn-enquiry').html('Submitting...');

        },

        success: function(result) {


          $('#enquiry-success-msg1').html('We have received your enquiry! Thank you, our team will get back to you soon!');

          $('#btn-enquiry').html('Send message');

          $('#enquiry-email').val('');
          $('#enquiry-departure').val('');
          $('#enquiry-departuredate').val('');
          $('#enquiry-hotelcategory').val('');
          $('#enquiry-duration').val('');

          $('#enquiry-travelers').val('');
          $('#enquiry-name').val('');
          $('#enquiry-phone').val('');


          $('#btn-close').click();


        }

    });

    return false;

  });


  $('#btn-beat').click(function() {


  $('#beatmsg1').html('');
  $('#beatmsg2').html('');
  $('#beatmsg3').html('');
  $('#beatmsg4').html('');
  $('#beatmsg5').html('');
  $('#beatmsg6').html('');
  $('#beatmsg7').html('');
  $('#beatmsg8').html('');
  $('#beatmsg9').html('');
  $('#beatmsg10').html('');


    var email = $('#beat-email').val();

    var form = document.querySelector('#frm-beat');

    var formData = $(form).serialize();




     if($('#beat-name').val() == '') {
       $('#beatmsg1').html('Please Enter Full Name');

      return;

    }
    if(IsEmail(email)==false){
     $('#beatmsg2').html('Please Enter Valid Email');

    return false;
    }
    if($('#beat-phone').val() == '') {
     $('#beatmsg3').html('Please Enter Contact No.');

    return false;
    }

     if($('#beat-passengers').val() == '') {
      $('#beatmsg4').html('Please Enter Passengers');

      return;

    }

    if($('#beat-nmakkah').val() == '') {
      $('#beatmsg5').html('Please Enter Nights in Makkah');

      return;

    }
    if($('#beat-nmadina').val() == '') {
      $('#beatmsg6').html('Please Enter Nights in Madina');

      return;

    }



    if($('#beat-departuredate').val() == '') {
      $('#beatmsg7').html('Please Enter Departure Date');

      return;

    }

    if($('#beat-returndate').val() == '') {
      $('#beatmsg8').html('Please Enter Return Date');

      return;

    }
     if($('#beat-quote').val() == '') {
      $('#beatmsg10').html('Please Enter Package Quote');

      return;

    }


    if($('#beat-mesg').val() == '') {
     $('#beatmsg9').html('Please Enter Message');

    return false;
    }



    $.ajax({

        url: "beat-config.php",

        type: "post",

        data: formData,

        beforeSend: function() {

          $('#btn-beat').html('Submitting...');

        },

        success: function(result) {


          $('#beat-success-msg').html('We have received your enquiry! Thank you, our team will get back to you soon!');

          $('#btn-beat').html('Send message');

          $('#beat-name').val('');
          $('#beat-phone').val('');
          $('#beat-email').val('');
          $('#beat-passengers').val('');
            $('#beat-nmakkah').val('');
            $('#beat-nmadina').val('');
          $('#beat-departuredate').val('');
          $('#beat-returndate').val('');
          $('#beat-mesg').val('');
          $('#beat-quote').val('');


          $('#btn-close').click();


        }

    });

    return false;

  });

  $('#btn-enquiry1').click(function() {

  $('#enqmsg1').html('');
  $('#enqmsg2').html('');
  $('#enqmsg3').html('');
  $('#enqmsg4').html('');
  $('#enqmsg5').html('');
$('#enqmsg6').html('');
  $('#enqmsg7').html('');
  $('#enqmsg8').html('');
  $('#enqmsg9').html('');
  $('#enqmsg10').html('');
  $('#enqmsg11').html('');


    var email = $('#enquiry-email1').val();

    var form = document.querySelector('#frm-enquiry1');

    var formData = $(form).serialize();


  if($('#enquiry-name1').val() == '') {
     $('#enqmsg1').html('Please Enter Name');

    return false;
    }
    if(IsEmail(email)==false){
     $('#enqmsg2').html('Please Enter Valid Email');

    return false;
    }
     if($('#enquiry-phone1').val() == '') {
     $('#enqmsg3').html('Please Enter Contact No.');

    return false;
    }

    if($('#enquiry-travelers1').val() == '') {
      $('#enqmsg4').html('Please Select No. of Travelers');

      return;

    }

     if($('#enquiry-nmakkah1').val() == '') {
       $('#enqmsg5').html('Please Enter Nights in Makkah');

      return;

    }

    if($('#enquiry-nmadina1').val() == '') {
      $('#enqmsg6').html('Please Enter Nights in Madina');

      return;

    }


   if($('#enquiry-departuredate1').val() == '') {
      $('#enqmsg7').html('Please Enter Departure Date');

      return;

    }

    if($('#enquiry-returndate1').val() == '') {
      $('#enqmsg8').html('Please Enter Return Date');

      return;

    }
     if($('#enquiry-mesg1').val() == '') {
      $('#enqmsg9').html('Please Enter Message');

      return;

    }




    $.ajax({

        url: "enquiry1.php",

        type: "post",

        data: formData,

        beforeSend: function() {

          $('#btn-enquiry1').html('Submitting...');

        },

        success: function(result) {


          $('#enquiry-success-msg1').html('We have received your enquiry! Thank you, our team will get back to you soon!');

          $('#btn-enquiry1').html('Send message');

          $('#enquiry-nmakkah1').val('');
          $('#enquiry-nmadina1').val('');
          $('#enquiry-departuredate1').val('');
          $('#enquiry-returndate1').val('');
          $('#enquiry-mesg1').val('');
          $('#enquiry-email1').val('');
          $('#enquiry-travelers1').val('');
          $('#enquiry-name1').val('');
          $('#enquiry-phone1').val('');

          $('#btn-close').click();


        }

    });

    return false;

  });


});

function IsEmail(email) {
        var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if(!regex.test(email)) {
           return false;
        }else{
           return true;
        }
      }


function phoneFormat(input){
        // Strip all characters from the input except digits
        input = input.replace(/\D/g,'');

        // Trim the remaining input to ten characters, to preserve phone number format
        input = input.substring(0,10);

        // Based upon the length of the string, we add formatting as necessary
        var size = input.length;
        if(size == 0){
                input = input;
        }else if(size < 4){
                input = '('+input;
        }else if(size < 7){
                input = '('+input.substring(0,3)+') '+input.substring(3,6);
        }else{
                input = '('+input.substring(0,3)+') '+input.substring(3,6)+' - '+input.substring(6,10);
        }
        return input;
}
</script>
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-FK0020HZ7L"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-FK0020HZ7L');
</script>

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-W8SW2V5G1B"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-W8SW2V5G1B');
</script>

<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/685945586873051921d6280b/1iuebdp5o';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
<style>

    /* Navbar background on mobile */
@media (max-width: 991px) {
  .navbar-collapse {
    background-color: #f3f8e8;
    border-radius: 12px;   /* optional */
    padding: 10px;
  }
}

/* Dropdown menu styling */
.nav-item .dropdown-menu {
  background-color: #f3f8e8;  /* Dropdown ka background */
  border-radius: 12px;        /* Curve effect */
  border: none;               /* Default border remove */
  box-shadow: 0 4px 12px rgba(0,0,0,0.1); /* Soft shadow */
  padding: 8px 0;
}

/* Dropdown items */
.nav-item .dropdown-menu .dropdown-item {
  padding: 10px 15px;
  border-radius: 8px;
  transition: background 0.3s ease;
}

/* Hover effect */
.nav-item .dropdown-menu .dropdown-item:hover {
  background-color: rgba(0,0,0,0.05);
}

.btn-socialmedia {
  color: #fff !important;               /* icon white */
  border: 1px solid #fff;            /* same border as bg */
  transition: all 0.3s ease;            /* smooth hover */
}

.btn-socialmedia:hover {
  background-color: #fff !important;    /* bg white */
  color: #b49144 !important;            /* icon goldish */
  border-color: #b49144;                /* border match icon */
}


</style>

</head>

<body>

    <!-- Topbar Start -->
    <div class="px-5 d-none d-lg-block" style="background-color: #167567;">
        <div class="container-fluid row gx-0 ">
            <div class="col-lg-2 text-center text-lg-start mb-2 mb-lg-0">
                <div class="d-inline-flex align-items-center" style="height: 45px;">
                </div>
            </div>
           <div class="col-lg-10 text-center text-lg-end px-4 py-lg-0">
                <span class="me-3 text-white fonts"><i class="fa fa-phone-alt me-2"></i><a href="tel:02032867666">020 3286 7666</a></span>
                <span class="me-3 text-white"><i class="fa fa-envelope-open me-2"></i><a href="mailto:info@safatravel.co.uk">info@safatravel.co.uk</a></span>
                <span class="me-3 text-white"><i class="fas fa-location-arrow me-2"></i>13 Station Rd, London SE25 5AH</span>
                <div class="d-inline-flex align-items-center" style="height: 45px;">
                    <a class="btn btn-sm btn-socialmedia btn-sm-square rounded-circle me-2" href="https://www.facebook.com/safatravel.co.uk" target="_blank"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-sm btn-socialmedia btn-sm-square rounded-circle me-2" href="https://www.instagram.com/safatraveluk" target="_blank"><i class="fab fa-instagram"></i></a>
                    <a class="btn btn-sm btn-socialmedia btn-sm-square rounded-circle me-2" href="https://www.twitter.com/safatravel_uk" target="_blank"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-sm btn-socialmedia btn-sm-square rounded-circle me-2" href="https://www.pinterest.co.uk/safatraveluk" target="_blank"><i class="fab fa-pinterest"></i></a>
                    <a class="btn btn-sm btn-socialmedia btn-sm-square rounded-circle me-2" href="https://www.linkedin.com/company/safa-travel-tours" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar & Hero Start -->
    <div class="position-relative p-0">
        <nav class="container-xxl navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
            <a href="https://www.safatravel.co.uk/" class="navbar-brand p-0">
                <img src="img/logo.png" alt="Logo">
            </a>
                         <a href="https://wa.me/02032867666" target="_blank" class="iconwhats"> <i class="fab fa-whatsapp" aria-hidden="true"></i> 020 3286 7666</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    <a href="https://www.safatravel.co.uk/" class="nav-item nav-link home">Home</a>

<div class="nav-item dropdown">
  <a href="https://www.safatravel.co.uk/umrah-packages.html"
     class="nav-link dropdown-toggle home"
     data-bs-toggle="dropdown">
     Umrah Packages
  </a>
  <div class="dropdown-menu m-0">
    <a href="https://www.safatravel.co.uk/umrah-packages.html" class="dropdown-item ">Umrah Packages</a>
    <a href="https://www.safatravel.co.uk/december-umrah-packages.html" class="dropdown-item">December Umrah</a>
    <a href="https://www.safatravel.co.uk/ramadan-umrah-packages.html" class="dropdown-item">Ramadan Umrah</a>
    <a href="https://www.safatravel.co.uk/easter-umrah-packages.html" class="dropdown-item">Easter Umrah</a>
    <a href="https://www.safatravel.co.uk/umrah-packages-2026.html" class="dropdown-item">Umrah 2026</a>
  </div>
</div>

                    <a href="https://www.safatravel.co.uk/hajj-packages.html" class="nav-item nav-link home">Hajj Packages</a>
                    <a href="https://www.safatravel.co.uk/about.html" class="nav-item nav-link home">About Us</a>
                    <a href="https://www.safatravel.co.uk/contact.html" class="nav-item nav-link home">Contact</a>
                </div>
                <a href="https://www.safatravel.co.uk/beat-my-quote.html" class="btn btn-primary py-2 px-4">Beat My Quote</a>
            </div>
        </nav>
        </div>
