<?php

	require_once('../dbconfig.php');
	global $con;
	$em_id = $_POST['em_id'];

	if(empty($em_id))
	{
		?>
			<div class="center">No records found under this selection <a href="#" onclick="$('#cp_info_edit_content').hide();$('.cp_info_edit').show();">Hide this</a>
			</div>
		<?php
		die();
	}

	$query = "SELECT * FROM em_contact_person WHERE em_id='$em_id'";

    if (!$result = mysqli_query($con, $query)) {
            exit(mysqli_error($con));
    }

    if (mysqli_num_rows($result) > 0)
    {

        while($row = mysqli_fetch_assoc($result))
        {

    		?>
            <div class="card wizard-card" data-color="blue">
            <!--        You can switch " data-color="rose" "  with one of the next bright colors: "blue", "green", "orange", "purple"        -->
                <form id="cp_info_edit_form" class="form" method="post" action="" >
                    <div class="form-body">

                        <div class="row">
                            <p class="pb-1 text-info text-bold-700 text-xs-center text-sm-center text-md-center">Please fill out the <strong class="text-danger">*required</strong> fields</p>
                            <div class="col-md-6 col-sm-6 pl-2 pr-2">
                                <div class="form-group label-floating">
                                    <label class="control-label">Name<strong class="text-danger">*</strong></label>
                                    <input type="text" id="full_name" name="full_name" value="<?php echo $row['full_name']; ?>" class="form-control form-control-success form-control-danger"required>
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
                                    <label class="control-label">Gender<strong class="text-danger">*</strong></label>         
                                    <select id="gender" name="gender" class="form-control form-control-success form-control-danger" required>
                                        <option value=""></option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Others">Others</option>
                                    </select>
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
                                    <label class="control-label">Designation<strong class="text-danger">*</strong></label>
                                    <input type="text" id="designation" name="designation" value="<?php echo $row['designation']; ?>" class="form-control form-control-success form-control-danger" required>
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
                                    <label class="control-label">Department<strong class="text-danger">*</strong></label>
                                    <input type="text" id="department" name="department" value="<?php echo $row['department']; ?>" class="form-control form-control-success form-control-danger" required>
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
                                    <label class="control-label">Mobile No<strong class="text-danger">*</strong></label>
                                    <input type="text" id="mobile_no" name="mobile_no" value="<?php echo $row['mobile_no']; ?>" class="form-control form-control-success form-control-danger" required>
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
                                    <label class="control-label">Phone No</label>
                                    <input type="text" id="phone_no" name="phone_no" value="<?php echo $row['phone_no']; ?>" class="form-control form-control-success form-control-danger">
                                    </textarea>
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
                                    <label class="control-label">Email<strong class="text-danger">*</strong></label>
                                    <input type="email" id="email" name="email" value="<?php echo $row['email']; ?>" class="form-control form-control-success form-control-danger" required>

                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 pl-2 pr-2">
                                <div class="form-group label-floating">
                                    <label class="control-label">Address<strong class="text-danger">*</strong></label>
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
                        <button type="button" class="btn btn-outline-warning mr-1" onclick="$('#cp_info_edit_content').slideUp(400);$('#cp_info_view_content').slideDown(400);$('.cp_info_edit').show();$('#cp_info').show();$('#cp_info_with_edit_icon').hide();$('#cp_info_edit_cancel').hide();">
                            <i class="icon-cross2"></i> Cancel
                        </button>
                       
                        <button type="submit" class="btn btn-outline-primary" name="cp_info_update">
                            <i class="icon-check2"></i> Save
                        </button>
                    </div>

                </form>
            </div>
    	<?php
        $gender=$row['gender'];
    	}
    }
    else
    {
        echo
        '
            <div class="text-sm-center text-md-center text-lg-center text-xl-center">Somthing is wrong no data available</div>
        ';
    }
?>

<script type="text/javascript">

    $("#gender").val('<?php echo $gender; ?>');

    //############################### BEGIN UPDATE ##############################//
    $('button[name="cp_info_update"]').click(function(e){
        
        $.ajax({
            type: 'post',
            url: 'ucpi',   // here your php file to do something with postdata
            data: $('#cp_info_edit_form').serialize(), // here you set the data to send to php file
            beforeSend: function() {
                $('#cp_info_notification_content').show().fadeOut(6100).html('<div class="text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">OPERATION IS RUNNING PLEASE WAIT...</div>');
            },
            success: function (data) {
              $('#cp_info_notification_content').show().fadeOut(6100).html(data);
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
    $('#cp_info_edit_form').bootstrapValidator({

        fields:
        {
            full_name: 
            {
                message: 'Full Name is not valid',
                validators: {
                    notEmpty: {
                        message: 'Full Name is required and cannot be empty'
                    },
                    stringLength: {
                        min: 2,
                        max: 50,
                        message: 'Full Name must be 2 to 50 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z() \.]+$/,
                        message: 'Full Name can only consist of alphabetical, space, dot and parenthesis'
                    },
                    remote: {
                        type: 'POST',
                        url: 'rmt',
                        message: 'You entered a vulgar word'
                    }
                }
            },

            gender: 
            {
                validators: {
                    notEmpty: {
                        message: 'Gender is required and cannot be empty'
                    },
                    stringLength: {
                        min: 0,
                        max: 10,
                        message: 'Don\'t try to be smart!'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z]+$/,
                        message: 'Don\'t try to be smart!'
                    },
                    choice: {
                        min: 1,
                        max: 1,
                        message: 'Please choose one option only'
                    }
                }
            },

            designation: 
            {
                message: 'Designation is not valid',
                validators: {
                    notEmpty: {
                        message: 'Designation is required and cannot be empty'
                    },
                    stringLength: {
                        min: 0,
                        max: 50,
                        message: 'Designation must be maximum 50 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z &()_/-]+$/,
                        message: 'Designation can only consist of alphabetical, space, underscore, hyphen, ampersand & parentheses'
                    }
                }
            },

            department: 
            {
                message: 'Department Name is not valid',
                validators: {
                    notEmpty: {
                        message: 'Department Name is required and cannot be empty'
                    },
                    stringLength: {
                        min: 0,
                        max: 100,
                        message: 'Department Name must be maximum 100 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z &()_/-]+$/,
                        message: 'Department Name can only consist of alphabetical, space, underscore, hyphen, ampersand & parentheses'
                    }
                }
            },

            email: 
            {
                message: 'Email is not valid',
                validators: {
                    notEmpty: {
                        message: 'Email is required and cannot be empty'
                    },
                    emailAddress: {
                        message: 'This is not a valid email address'
                    }
                }
            },

            mobile_no: 
            {
                message: 'Mobile Number is not valid',
                validators: {
                    notEmpty: {
                        message: 'Mbile Number is required and cannot be empty'
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

            phone_no: 
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

            address: 
            {
                message: 'Address is not valid',
                validators: {
                    notEmpty: {
                        message: 'Address is required and cannot be empty'
                    },
                    stringLength: {
                        min: 0,
                        max: 120,
                        message: 'Address must be more 0 to 120 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9/#_() ;:, .\-]+$/,
                        message: 'Address can only consist of alphabetical, space, number, hash, comma, dot, underscore, colon, semi-colon, hyphen and backslash'
                    },
                    remote: {
                        type: 'POST',
                        url: 'rmt',
                        message: 'You entered a vulgar word'
                    }
                }
            },

        }
    });
    //############################# END Form Validation ###########################//

</script>
<script src="../assets/js/material-bootstrap-wizard/jquery.bootstrap.js" type="text/javascript"></script>
<!--  Plugin for the Wizard -->
<script src="../assets/js/material-bootstrap-wizard/material-bootstrap-wizard.js"></script>
<!--  More information about jquery.validate here: http://jqueryvalidation.org/  -->
<script src="../assets/js/material-bootstrap-wizard/jquery.validate.min.js"></script>