$(document).ready(function() {
    $(document).on("input", "#enquiry-phone", function() {
        this.value = this.value.replace(/\D/g, '');
        $('#msg10').html('please enter only numaric value');

    });
    $(document).on("input", "#beat-phone", function() {
        this.value = this.value.replace(/\D/g, '');
        $('#beatmsg3').html('please enter only numaric value');
    });
    $(document).on("input", "#enquiry-phone1", function() {
        this.value = this.value.replace(/\D/g, '');
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
        if ($('#enquiry-name').val() == '') {
            $('#name-msg').html('Please Enter Name');
            return false;
        }
        if ($('#enquiry-phone').val() == '') {
            $('#phone-msg').html('Please Enter Contact No.');
            return false;
        }
        if (IsEmail(email) == false) {
            $('#email-msg').html('Please Enter Valid Email');
            return false;
        }
        if ($('#enquiry-city').val() == '') {
            $('#city-msg').html('Please Enter City.');
            return false;
        }
        if ($('#enquiry-mesg').val() == '') {
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
                $('#enquiry-success-msg').html(
                    'We have received your enquiry! Thank you, our team will get back to you soon!'
                    );
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




        if ($('#enquiry-departure').val() == '') {
            $('#msg1').html('Please Departure Airport');

            return;

        }

        if ($('#enquiry-departuredate').val() == '') {
            $('#msg2').html('Please Enter Departure Date');

            return;

        }


        if ($('#enquiry-hotelcategory').val() == '') {
            $('#msg4').html('Please Select Hotel Category');

            return;

        }
        if ($('#enquiry-duration').val() == '') {
            $('#msg5').html('Please Enter Duration');

            return;

        }
        if ($('#enquiry-travelers').val() == '') {
            $('#msg6').html('Please Select No. of Travelers');

            return;

        }

        if ($('#enquiry-name').val() == '') {
            $('#msg9').html('Please Enter Name');

            return false;
        }
        if ($('#enquiry-phone').val() == '') {
            $('#msg10').html('Please Enter Contact No.');

            return false;
        }

        if (IsEmail(email) == false) {
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


                $('#enquiry-success-msg1').html(
                    'We have received your enquiry! Thank you, our team will get back to you soon!'
                    );

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
        if ($('#beat-name').val() == '') {
            $('#beatmsg1').html('Please Enter Full Name');
            return;
        }
        if (IsEmail(email) == false) {
            $('#beatmsg2').html('Please Enter Valid Email');
            return false;
        }
        if ($('#beat-phone').val() == '') {
            $('#beatmsg3').html('Please Enter Contact No.');
            return false;
        }

        if ($('#beat-passengers').val() == '') {
            $('#beatmsg4').html('Please Enter Passengers');
            return;
        }

        if ($('#beat-nmakkah').val() == '') {
            $('#beatmsg5').html('Please Enter Nights in Makkah');
            return;
        }
        if ($('#beat-nmadina').val() == '') {
            $('#beatmsg6').html('Please Enter Nights in Madina');

            return;

        }



        if ($('#beat-departuredate').val() == '') {
            $('#beatmsg7').html('Please Enter Departure Date');

            return;

        }

        if ($('#beat-returndate').val() == '') {
            $('#beatmsg8').html('Please Enter Return Date');

            return;

        }
        if ($('#beat-quote').val() == '') {
            $('#beatmsg10').html('Please Enter Package Quote');

            return;

        }


        if ($('#beat-mesg').val() == '') {
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


                $('#beat-success-msg').html(
                    'We have received your enquiry! Thank you, our team will get back to you soon!'
                    );

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


        if ($('#enquiry-name1').val() == '') {
            $('#enqmsg1').html('Please Enter Name');

            return false;
        }
        if (IsEmail(email) == false) {
            $('#enqmsg2').html('Please Enter Valid Email');

            return false;
        }
        if ($('#enquiry-phone1').val() == '') {
            $('#enqmsg3').html('Please Enter Contact No.');

            return false;
        }

        if ($('#enquiry-travelers1').val() == '') {
            $('#enqmsg4').html('Please Select No. of Travelers');

            return;

        }

        if ($('#enquiry-nmakkah1').val() == '') {
            $('#enqmsg5').html('Please Enter Nights in Makkah');

            return;

        }

        if ($('#enquiry-nmadina1').val() == '') {
            $('#enqmsg6').html('Please Enter Nights in Madina');

            return;

        }


        if ($('#enquiry-departuredate1').val() == '') {
            $('#enqmsg7').html('Please Enter Departure Date');

            return;

        }

        if ($('#enquiry-returndate1').val() == '') {
            $('#enqmsg8').html('Please Enter Return Date');

            return;

        }
        if ($('#enquiry-mesg1').val() == '') {
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


                $('#enquiry-success-msg1').html(
                    'We have received your enquiry! Thank you, our team will get back to you soon!'
                    );

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
    if (!regex.test(email)) {
        return false;
    } else {
        return true;
    }
}
function phoneFormat(input) {
    // Strip all characters from the input except digits
    input = input.replace(/\D/g, '');

    // Trim the remaining input to ten characters, to preserve phone number format
    input = input.substring(0, 10);

    // Based upon the length of the string, we add formatting as necessary
    var size = input.length;
    if (size == 0) {
        input = input;
    } else if (size < 4) {
        input = '(' + input;
    } else if (size < 7) {
        input = '(' + input.substring(0, 3) + ') ' + input.substring(3, 6);
    } else {
        input = '(' + input.substring(0, 3) + ') ' + input.substring(3, 6) + ' - ' + input.substring(6, 10);
    }
    return input;
}

function openModal() {
    document.getElementById("myModal").style.display = "block";
}

function closeModal() {
    document.getElementById("myModal").style.display = "none";
}

$(".datetimepicker").each(function () {
    $(this).datetimepicker();
});
