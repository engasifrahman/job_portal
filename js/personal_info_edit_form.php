<?php
    session_start();
	require_once('../dbconfig.php');
	global $con;
	$js_id = $_POST['js_id'];

	if(empty($js_id))
	{
		?>
			<div class="center">no records found under this selection <a href="#" onclick="$('#personal_info_edit_content').hide();$('.personal_info_edit').show();">Hide this</a>
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
            <form id="personal_info_edit_form" class="form" method="post" action="" >
                <div class="form-body">
                    <div class="row">
                        <p class="pb-1 text-info text-bold-700 text-xs-center text-sm-center text-md-center">Please fill out the <strong class="text-danger">*required</strong> fields</p>
                        <div class="col-md-6 col-sm-6 pl-2 pr-2">
                            <div class="form-group label-floating">
                                <label class="control-label">Full Name<strong class="text-danger">*</strong></label>
                                <input type="text" id="full_name" name="full_name" value="<?php echo $row['full_name']; ?>" class="form-control form-control-success form-control-danger" required>
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
                                <label class="control-label">Date of Birth<strong class="text-danger">*</strong></label>   
                                <input type="date" id="dob" name="dob" value="<?php echo $row['dob']; ?>" class="form-control form-control-success form-control-danger" required>
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
                        <div class="col-md-6 col-sm-6 pl-2 pr-2">
                            <div class="form-group label-floating">
                                <label class="control-label">Marital Status<strong class="text-danger">*</strong></label>
                                <select id="marital_status" name="marital_status" class="form-control form-control-success form-control-danger" required>
    								<option value=""></option>
    								<option value="Unmarried">Unmarried</option>
    								<option value="Married">Married</option>
    								<option value="Divorced">Divorced</option>
    								<option value="Widow">Widow</option>
    								<option value="Widower">Widower</option>
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
                                <label class="control-label">Nationality<strong class="text-danger">*</strong></label>
                                <input type="text" id="nationality" name="nationality" value="<?php echo $row['nationality']; ?>" class="form-control form-control-success form-control-danger" required>
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
                                <label class="control-label">National ID</label>
                                <input type="text" id="nid" name="nid" value="<?php echo $row['nid']; ?>"class="form-control form-control-success form-control-danger">
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
                                <label class="control-label">Father Name<strong class="text-danger">*</strong></label>
                                <input type="text" id="father_name" name="father_name" value="<?php echo $row['father_name']; ?>" class="form-control form-control-success form-control-danger" required>
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
                                <label class="control-label">Mother Name<strong class="text-danger">*</strong></label>
                                <input type="text" id="mother_name" name="mother_name" value="<?php echo $row['mother_name']; ?>"class="form-control form-control-success form-control-danger" required>
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
                                <label class="control-label">Birth Certificate</label> 
                                <input type="text" id="birth_certificate" name="birth_certificate" value="<?php echo $row['birth_certificate']; ?>" class="form-control form-control-success form-control-danger">
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
                                <label class="control-label">Profile Privacy<strong class="text-danger">*</strong> <small class="font-small-2"><b>(If you select public, Anyone able to see  your resume)</b></small> </label>
                                <select id="profile_privacy" name="profile_privacy" class="form-control form-control-success form-control-danger" required>
                                    <option value=""></option>
                                    <option value="Public">Public</option>
                                    <option value="Private">Private</option>
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
                </div>

                <div class="form-actions custom-form-action center">
                    <button type="button" class="btn btn-outline-warning mr-1" onclick="$('#personal_info_edit_content').slideUp(400);$('#personal_info_view_content').slideDown(400);$('.personal_info_edit').show();$('#personal_info').show();$('#personal_info_with_edit_icon').hide();$('#personal_info_edit_cancel').hide();">
                        <i class="icon-cross2"></i> Cancel
                    </button>
                    <button type="submit" class="btn btn-outline-primary" id="<?php echo $row['js_id']; ?>" name="personal_info_update"   >
                        <i class="icon-check2"></i> Save
                    </button>
                </div>
            </form>
        </div>
	<?php
    
		$marital_status=$row['marital_status'];
        $gender=$row['gender'];
        $profile_privacy=$row['profile_privacy'];
	}
?>

<script type="text/javascript">
    $("#marital_status").val('<?php echo $marital_status; ?>');
    $("#gender").val('<?php echo $gender; ?>');
    $("#profile_privacy").val('<?php echo $profile_privacy; ?>');

    //############################### BEGIN UPDATE ##############################//
    $('button[name="personal_info_update"]').click(function(e){

        $.ajax({
            type: 'post',
            url: 'upi',   // here your php file to do something with postdata
            data: $('#personal_info_edit_form').serialize(), // here you set the data to send to php file
            beforeSend: function() {
                $('#personal_info_notification_content').show().fadeOut(6100).html('<div class="text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">OPERATION IS RUNNING PLEASE WAIT..</div>');
            },
            success: function (data) {
              $('#personal_info_notification_content').show().fadeOut(6100).html(data);
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

    $("#marital_status").val('<?php echo $marital_status; ?>');

    $('button[name="personal_info_update"]').click(function(e){
        e.preventDefault();

        var js_id = $(this).attr('id');
        var full_name = $('input[name=full_name]').val();
        var dob = $('input[name=dob]').val();
        var gender = $('input[name=gender]:checked').val();
        var marital_status = $('select[name="marital_status"] option:selected').val();
        var nationality = $('input[name=nationality]').val();
        var nid = $('input[name=nid]').val();
        var birth_certificate = $('input[name=birth_certificate]').val();
        var father_name = $('input[name=father_name]').val();
        var mother_name = $('input[name=mother_name]').val();
        

        $.ajax({
            url: "upi",
            type: "POST",
            data: { js_id: js_id, full_name: full_name, dob: dob, gender: gender, marital_status: marital_status, nationality: nationality, nid : nid, birth_certificate: birth_certificate, father_name: father_name, mother_name:mother_name
            },
            success: function(data, status, xhr) {
                $('#full_name').val('');
                $('#dob').val('');
                $('#gender').val('');
                $('#marital_status').val('');
                $('#nationality').val('');
                $('#nid').val('');
                $('#birth_certificate').val('');
                $('#father_name').val('');
                $('#mother_name').val('');

                $('#personal_info_notification_content').show().html(data);

                $.get("vpi", function(data) {
                    $("#personal_info_view_content").html(data);
                });
            },
            
            complete: function() {
                $('#personal_info_edit_content').slideUp(400); //this is actually hide
                $('#personal_info_view_content').slideDown(400); //this is actually show
                $('.personal_info_edit').show();
                $('#personal_info').show();
                $('#personal_info_with_edit_icon').hide();
                $('#personal_info_edit_cancel').hide();
            }
        });

    }); // update close 

    */

    //############################# BEGIN Form Validation ###########################//
    $('#personal_info_edit_form').bootstrapValidator({

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

            dob: 
            {
                message: 'Date of birth is not valid',
                validators: {
                    notEmpty: {
                        message: 'Date of birth is required and cannot be empty'
                    },
                    date: {
                        format: 'YYYY/MM/DD',
                        message: 'Date of birth is not valid'
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
                        min: 3,
                        max: 10,
                        message: 'Gender must be 3 to 10 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z]+$/,
                        message: 'Gender can only consist of alphabetical'
                    },
                    choice: {
                        min: 1,
                        max: 1,
                        message: 'Please choose one option only'
                    }
                }
            },

            marital_status: 
            {
                message: 'Marital Status is not valid',
                validators: {
                    notEmpty: {
                        message: 'Marital Status is required and cannot be empty'
                    },
                    stringLength: {
                        min: 5,
                        max: 15,
                        message: 'Marital Status must be 5 to 15 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z]+$/,
                        message: 'Marital Status can only consist of alphabetical'
                    },
                    choice: {
                        min: 1,
                        max: 1,
                        message: 'Please choose one option only'
                    }
                }
            },

            nationality: 
            {
                message: 'Nationality is not valid',
                validators: {
                    notEmpty: {
                        message: 'Nationality is required and cannot be empty'
                    },
                    stringLength: {
                        min: 2,
                        max: 20,
                        message: 'Nationality must be 2 to 20 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z]+$/,
                        message: 'Nationality can only consist of alphabetical'
                    },
                    remote: {
                        type: 'POST',
                        url: 'rmt',
                        message: 'You entered a vulgar word'
                    }
                }
            },

             father_name: 
            {
                message: 'Father Name is not valid',
                validators: {
                    notEmpty: {
                        message: 'Father Name is required and cannot be empty'
                    },
                    stringLength: {
                        min: 2,
                        max: 30,
                        message: 'Father Name must be 2 to 30 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z() \.]+$/,
                        message: 'Father Name can only consist of alphabetical, space, dot and parenthesis'
                    },
                    remote: {
                        type: 'POST',
                        url: 'rmt',
                        message: 'You entered a vulgar word'
                    }
                }
            },

             mother_name: 
            {
                message: 'Mother Name is not valid',
                validators: {
                    notEmpty: {
                        message: 'Mother Name is required and cannot be empty'
                    },
                    stringLength: {
                        min: 2,
                        max: 30,
                        message: 'Mother Name must be 2 to 30 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z() \.]+$/,
                        message: 'Mother Name can only consist of alphabetical, space, dot and parenthesis'
                    },
                    remote: {
                        type: 'POST',
                        url: 'rmt',
                        message: 'You entered a vulgar word'
                    }
                }
            },

            nid: 
            {
                message: 'National ID is not valid',
                validators: {
                    stringLength: {
                        min: 9,
                        max: 17,
                        message: 'National ID must be 9 to 17 characters long'
                    },
                    regexp: {
                        regexp: /^[0-9]+$/,
                        message: 'National ID can only consist of number'
                    }
                }
            },


            birth_certificate: 
            {
                message: 'Birth Certificate is not valid',
                validators: {
                    stringLength: {
                        min: 9,
                        max: 17,
                        message: 'Birth Certificate must be 9 to 17 characters long'
                    },
                    regexp: {
                        regexp: /^[0-9]+$/,
                        message: 'Birth Certificate can only consist of number'
                    }
                }
            },

            profile_privacy: 
            {
                message: 'Profile privacy is not valid',
                validators: {
                    notEmpty: {
                        message: 'Profile privacy is required and cannot be empty'
                    },
                    stringLength: {
                        min: 0,
                        max: 20,
                        message: 'Don\'t try to be smart!'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z-]+$/,
                        message: 'Don\'t try to be smart!'
                    },
                    choice: {
                        min: 1,
                        max: 1,
                        message: 'Don\'t try to be smart! You can choose maximum 1 option'
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