<?php
    session_start();
	require_once('../dbconfig.php');
	global $con;
	$js_id = $_POST['js_id'];

	if(empty($js_id))
	{
		?>
			<div class="center">no records found under this selection <a href="#" onclick="$('#cover_letter_info_edit_content').hide();$('.cover_letter_info_edit').show();">Hide this</a>
			</div>
		<?php
		die();
	}

	$query = "SELECT * FROM cover_letter_info where js_id='$js_id'";
	if (!$result = mysqli_query($con, $query)) {
	        exit(mysqli_error($con));
	}

	while($row = mysqli_fetch_assoc($result))
	{
		?>
        <div class="card wizard-card" data-color="blue">
        <!--        You can switch " data-color="rose" "  with one of the next bright colors: "blue", "green", "orange", "purple"        -->
            <form id="cover_letter_info_edit_form" class="form" method="post" action="" >
                <div class="form-body">
                    <div class="row">
                        <p class="pb-1 text-info text-bold-700 text-xs-center text-sm-center text-md-center">Please fill out the <strong class="text-danger">*required</strong> fields</p>
                        <div class="col-md-6 col-sm-6 pl-2 pr-2">
                            <div class="form-group label-floating">
                                <label class="control-label">Position<strong class="text-danger">*</strong></label>
                                <input type="text" id="position" name="position" value="<?php echo $row['position']; ?>" class="form-control form-control-success form-control-danger" required>
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
                                <label class="control-label">Published on<strong class="text-danger">*</strong></label>   
                                <input type="text" id="published_on" name="published_on" value="<?php echo $row['published_on']; ?>" class="form-control form-control-success form-control-danger" required>
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
                                <label class="control-label">To (Director)<strong class="text-danger">*</strong></label>
                                <input type="text" id="to_director" name="to_director" value="<?php echo $row['to_director']; ?>" class="form-control form-control-success form-control-danger" required>
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
                                <label class="control-label">Institution Name<strong class="text-danger">*</strong></label>
                                <input type="text" id="institution" name="institution" value="<?php echo $row['institution']; ?>" class="form-control form-control-success form-control-danger" required>
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
                                <label class="control-label">Contact No (Institution)<strong class="text-danger">*</strong></label>
                                <input type="text" id="contact_no" name="contact_no" value="<?php echo $row['contact_no']; ?>" class="form-control form-control-success form-control-danger" required>
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
                                <label class="control-label">Email (Institution)<strong class="text-danger">*</strong></label>
                                <input type="text" id="email" name="email" value="<?php echo $row['email']; ?>" class="form-control form-control-success form-control-danger" required>
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
                        <div class="col-md-12 col-sm-12 pl-2 pr-2">
                            <div class="form-group label-floating">
                                <label class="control-label">Address (Institution)<strong class="text-danger">*</strong></label>
                                <input type="text" id="address" name="address" value="<?php echo $row['address']; ?>" class="form-control form-control-success form-control-danger" required>
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
                    <button type="button" class="btn btn-outline-warning mr-1" onclick="$('#cover_letter_info_edit_content').slideUp(400);$('#cover_letter_info_view_content').slideDown(400);$('.cover_letter_info_edit').show();$('#cover_letter_info').show();$('#cover_letter_info_with_edit_icon').hide();$('#cover_letter_info_edit_cancel').hide();">
                        <i class="icon-cross2"></i> Cancel
                    </button>
                    <button type="submit" class="btn btn-outline-primary" id="<?php echo $row['js_id']; ?>" name="cover_letter_info_update"   >
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
    $('button[name="cover_letter_info_update"]').click(function(e){

        $.ajax({
            type: 'post',
            url: 'ucli',   // here your php file to do something with postdata
            data: $('#cover_letter_info_edit_form').serialize(), // here you set the data to send to php file
            beforeSend: function() {
                $('#cover_letter_info_notification_content').show().fadeOut(6100).html('<div class="text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">OPERATION IS RUNNING PLEASE WAIT..</div>');
            },
            success: function (data) {
              $('#cover_letter_info_notification_content').show().fadeOut(6100).html(data);
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

    //############################# BEGIN Form Validation ###########################//
    $('#cover_letter_info_edit_form').bootstrapValidator({

        fields:
        {

            position: 
            {
                message: 'Position is not valid',
                validators: {
                    notEmpty: {
                        message: 'Position is required and cannot be empty'
                    },
                    stringLength: {
                        min: 0,
                        max: 250,
                        message: 'Position must be maximum 250 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9(), \.]+$/,
                        message: 'Position can only consist of alphabetical, number, space, comma, dot and parenthesis'
                    }
                }
            },


            published_on: 
            {
                message: 'Published on is not valid',
                validators: {
                    notEmpty: {
                        message: 'Published on is required and cannot be empty'
                    },
                    stringLength: {
                        min: 0,
                        max: 250,
                        message: 'Published on must be maximum 250 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9()/: \.]+$/,
                        message: 'Published on can only consist of alphabetical, number, space, dot, colon, backslash and parenthesis'
                    }
                }
            },

            to_director: 
            {
                message: 'To is not valid',
                validators: {
                    notEmpty: {
                        message: 'To is required and cannot be empty'
                    },
                    stringLength: {
                        min: 0,
                        max: 250,
                        message: 'To must be maximum 250 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z()\- \.]+$/,
                        message: 'To can only consist of alphabetical, space, dot, hyphen and parenthesis'
                    }
                }
            },

            institution: 
            {
                message: 'Institution name is not valid',
                validators: {
                    notEmpty: {
                        message: 'Institution name is required and cannot be empty'
                    },
                    stringLength: {
                        min: 0,
                        max: 250,
                        message: 'Institution name must be maximum 250 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9/ ()\.]+$/,
                        message: 'Institution name can only consist of alphabetical, number, space, dot and parenthesis'
                    }
                }
            },

            contact_no: 
            {
                message: 'Contact no is not valid',
                validators: {
                    notEmpty: {
                        message: 'Contact no is required and cannot be empty'
                    },
                    stringLength: {
                        min: 9,
                        max: 15,
                        message: 'Contact no must be 9 to 15 characters long'
                    },
                    regexp: {
                        regexp: /^[0-9+ -]+$/,
                        message: 'Contact no can only consist of digit, space, hyphen & plus(+) sign'
                    }
                }
            },

            email: 
            {
                message: 'Email is not valid',
                validators: {
                    emailAddress: {
                        message: 'This is not a valid email address'
                    }
                }
            },
            address: 
            {
                message: 'Address is not valid',
                validators: {
                    notEmpty: {
                        message: 'Address is required and cannot be empty'
                    },
                    stringLength: {
                        min: 0,
                        max: 250,
                        message: 'Address must be maximum 250 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9/#_() ;:, .\-]+$/,
                        message: 'Address can only consist of alphabetical, space, number, hash, comma, dot, underscore, colon, semi-colon, hyphen and backslash'
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