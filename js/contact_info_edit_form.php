<?php

	require_once('../dbconfig.php');
	global $con;
	$js_id = $_POST['js_id'];

	if(empty($js_id))
	{
		?>
			<div class="center">no records found under this selection <a href="#" onclick="$('#contact_info_edit_content').hide();$('.contact_info_edit').show();">Hide this</a>
			</div>
		<?php
		die();
	}

	$query = "SELECT * FROM job_seeker where id='$js_id'";
	if (!$result = mysqli_query($con, $query)) {
	        exit(mysqli_error($con));
	}

	while($row = mysqli_fetch_assoc($result))
	{
		?>
        <div class="card wizard-card" data-color="blue">
        <!--        You can switch " data-color="rose" "  with one of the next bright colors: "blue", "green", "orange", "purple"        -->
            <form id="contact_info_edit_form" class="form" method="post" action="" >
                <div class="form-body">

                    <div class="row">
                        <p class="pb-1 text-info text-bold-700 text-xs-center text-sm-center text-md-center">Please fill out the <strong class="text-danger">*required</strong> fields</p>
                        <div class="col-md-6 col-sm-6 pl-2 pr-2">
                            <div class="form-group label-floating">
                                <label class="control-label">Mobile Number<strong class="text-danger">*</strong></label>
                                <input type="text" id="mobile_number" name="mobile_number" value="<?php echo $row['mobile_number']; ?>" class="form-control form-control-success form-control-danger" placeholder="Mobile Number" required>
                                <span class="before check">
                                  <i class="material-icons">done</i>
                                </span>
                                <span class="before cross">
                                  <i class="material-icons">clear</i>
                                </span>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 pl-2 pr-2 ">
                            <div class="form-group label-floating">
                                <label class="control-label">Phone Number</label>         
                                <input type="text" id="phone_number" name="phone_number" value="<?php echo $row['phone_number']; ?>" class="form-control form-control-success form-control-danger">
                                <span class="before check">
                                  <i class="material-icons">done</i>
                                </span>
                                <span class="before cross">
                                  <i class="material-icons">clear</i>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 col-sm-6 pl-2 pr-2">
                            <div class="form-group label-floating">
                                <label class="control-label">Alternative Email</label>
                                <input type="email" id="alternative_email" name="alternative_email" value="<?php echo $row['alternative_email']; ?>" class="form-control form-control-success form-control-danger">
                                <span class="before check">
                                  <i class="material-icons">done</i>
                                </span>
                                <span class="before cross">
                                  <i class="material-icons">clear</i>
                                </span>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 pl-2 pr-2">
                            <div class="form-group label-floating">
                                <label class="control-label">Present Address<strong class="text-danger">*</strong></label>
                                <input type="text" id="present_address" name="present_address" value="<?php echo $row['present_address']; ?>"class="form-control form-control-success form-control-danger" required>
                                <span class="before check">
                                  <i class="material-icons">done</i>
                                </span>
                                <span class="before cross">
                                  <i class="material-icons">clear</i>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 pl-2 pr-2">
                            <div class="form-group label-floating">
                                <label class="control-label">Permanent Address<strong class="text-danger">*</strong></label>
                                <input type="text" id="permanent_address" name="permanent_address" value="<?php echo $row['permanent_address']; ?>" class="form-control form-control-success form-control-danger" required>
                                <span class="before check">
                                  <i class="material-icons">done</i>
                                </span>
                                <span class="before cross">
                                  <i class="material-icons">clear</i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-actions custom-form-action center">
                    <button type="button" class="btn btn-outline-warning mr-1" onclick="$('#contact_info_edit_content').slideUp(400);$('#contact_info_view_content').slideDown(400);$('.contact_info_edit').show();$('#contact_info').show();$('#contact_info_with_edit_icon').hide();$('#contact_info_edit_cancel').hide();">
                        <i class="icon-cross2"></i> Cancel
                    </button>
                    <button type="submit" class="btn btn-outline-primary" id="<?php echo $row['js_id']; ?>" name="contact_info_update">
                        <i class="icon-check2"></i> Save
                    </button>
                </div>
            </form>
        </div>
	<?php
	}
?>

<script type="text/javascript">

    //############################### BEGIN UPDATE ##############################//
    $('button[name="contact_info_update"]').click(function(e){

        $.ajax({
            type: 'post',
            url: 'uci',   // here your php file to do something with postdata
            data: $('#contact_info_edit_form').serialize(), // here you set the data to send to php file
            beforeSend: function() {
                $('#contact_info_notification_content').show().fadeOut(6100).html('<div class="text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">OPERATION IS RUNNING PLEASE WAIT..</div>');
            },
            success: function (data) {
              $('#contact_info_notification_content').show().fadeOut(6100).html(data);
            },
            error: function() {
                $.notify({

                    // where to append the toast notification
                    wrapper: 'body',

                    // toast message
                    message: 'Error here',

                    // success, info, error, warn
                    type: 'error',

                    // 1: top-left, 2: top-center, 3: top-right
                    // 4: mid-left, 5: mid-right
                    // 6: bottom-left, 7: bottom-center, 8: bottom-right
                    position: 3,

                    // or 'rtl'
                    dir: 'ltr',

                    // enable/disable auto close
                    autoClose: true,

                    // timeout in milliseconds
                    duration: 4000
                  
                });
            }
        });

        e.stopImmediatePropagation();
        
    });
    //############################### END UPDATE ##############################//

    /*

	$('button[name="contact_info_update"]').click(function() {

		var js_id = $(this).attr('id');

        var mobile_number = $('input[name=mobile_number]').val();
        var phone_number = $('input[name=phone_number]').val();
        var alternative_email = $('input[name=alternative_email]').val();
        var present_address = $('input[name=present_address]').val();
        var parmanent_address = $('input[name=parmanent_address]').val();
        

        $.ajax({
            url: "uci",
            type: "POST",
            data: { js_id: js_id, mobile_number: mobile_number, phone_number: phone_number, alternative_email: alternative_email, present_address: present_address, parmanent_address: parmanent_address
            },
            success: function(data, status, xhr) {
                $('#mobile_number').val('');
                $('#phone_number').val('');
                $('#alternative_email').val('');
                $('#present_address').val('');
                $('#parmanent_address').val('');

                $('#contact_info_notification_content').show().html(data);

                $.get("vci", function(data) {
                    $("#contact_info_view_content").html(data);
                });
            },

            complete: function() {
            	$('#contact_info_edit_content').slideUp(400); //this is actually hide
                $('#contact_info_view_content').slideDown(400); //this is actually show
                $('.contact_info_edit').show();
                $('#contact_info').show();
				$('#contact_info_with_edit_icon').hide();
				$('#contact_info_edit_cancel').hide();
            }
        });

    }); // update close

    */

    //############################# BEGIN Form Validation ###########################//
    $('#contact_info_edit_form').bootstrapValidator({

        fields:
        {
            mobile_number: 
            {
                message: 'Mobile Number is not valid',
                validators: {
                    notEmpty: {
                        message: 'Mobile Number is required and cannot be empty'
                    },
                    stringLength: {
                        min: 11,
                        max: 15,
                        message: 'Mobile Number must be 11 to 15 characters long'
                    },
                    regexp: {
                        regexp: /^[0-9+ -]+$/,
                        message: 'Mobile Number can only consist of digit, space, hyphen & plus(+) sign'
                    }
                }
            },

            phone_number: 
            {
                message: 'Phone Number is not valid',
                validators: {
                    stringLength: {
                        min: 11,
                        max: 15,
                        message: 'Phone Number must be 11 to 15 characters long'
                    },
                    regexp: {
                        regexp: /^[0-9+ -]+$/,
                        message: 'Phone Number can only consist of digit, space, hyphen & plus(+) sign'
                    }
                }
            },

            alternative_email: 
            {
                message: 'Alternative Email is not valid',
                validators: {
                    emailAddress: {
                        message: 'This is not a valid email address'
                    }
                }
            },

            present_address: 
            {
                message: 'Present Address is not valid',
                validators: {
                    notEmpty: {
                        message: 'Present Address is required and cannot be empty'
                    },
                    stringLength: {
                        min: 3,
                        max: 120,
                        message: 'Present Address must be more 3 to 120 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9/#_() ;:, .\-]+$/,
                        message: 'Present Address can only consist of alphabetical, space, number, hash, comma, dot, underscore, colon, semi-colon, hyphen and backslash'
                    },
                    remote: {
                        type: 'POST',
                        url: 'rmt',
                        message: 'You entered a vulgar word'
                    }
                }
            },

            Permanent_address: 
            {
                message: 'Permanent Address is not valid',
                validators: {
                    notEmpty: {
                        message: 'Permanent Address is required and cannot be empty'
                    },
                    stringLength: {
                        min: 3,
                        max: 120,
                        message: 'Permanent Address must be more 3 to 120 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9/#_() ;:, .\-]+$/,
                        message: 'Permanent Address can only consist of alphabetical, space, number, hash, comma, dot, underscore, colon, semi-colon, hyphen and backslash'
                    },
                    remote: {
                        type: 'POST',
                        url: 'rmt',
                        message: 'You entered a vulgar word'
                    }
                }
            }

        }
    });
    //############################# END Form Validation ###########################//

</script>
<script src="../assets/js/material-bootstrap-wizard/jquery.bootstrap.js" type="text/javascript"></script>
<!--  Plugin for the Wizard -->
<script src="../assets/js/material-bootstrap-wizard/material-bootstrap-wizard.js"></script>
<!--  More information about jquery.validate here: http://jqueryvalidation.org/  -->
<script src="../assets/js/material-bootstrap-wizard/jquery.validate.min.js"></script>