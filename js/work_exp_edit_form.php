<?php
    session_start();
	require_once('../dbconfig.php');
	global $con;

    $js_id = $_SESSION['js_info']['id'];

	$id = $_POST['id'];

	if(empty($id))
	{
		?>
			<div class="center">No records found under this selection <a href="#" onclick="$('#work_exp_edit_content').hide();$('.work_exp_add').show();">HIDE THIS</a>
			</div>
		<?php
		die();
	}

	$query = "SELECT * FROM work_experience where js_id='$js_id' AND id='$id'";
	if (!$result = mysqli_query($con, $query))
    {
	        exit(mysqli_error($con));
	}

    if (mysqli_num_rows($result) > 0)
    {
    	while($row = mysqli_fetch_assoc($result))
    	{
    		?>
            <div class="card wizard-card" data-color="blue">
            <!--        You can switch " data-color="rose" "  with one of the next bright colors: "blue", "green", "orange", "purple"        -->
                <form id="work_exp_edit_form" class="form" method="post" action="" >
                    <div class="form-body">

                        <div class="row">

                            <p class="pb-1 text-info text-bold-700 text-xs-center text-sm-center text-md-center">Please fill out the <strong class="text-danger">*required</strong> fields</p>

                            <input type="hidden" id="id" name="id" value="<?php echo $row['id']; ?>" class="form-control form-control-success form-control-danger" >
                            
                            <div class="col-md-6 col-sm-6 pl-2 pr-2">
                                <div class="form-group label-floating">
                                    <label class="control-label">Organization Name<strong class="text-danger">*</strong></label>
                                    <input type="text" id="organization_name_edit" name="organization_name_edit" value="<?php echo $row['organization_name']; ?>" class="form-control form-control-success form-control-danger" required>
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
                                    <label class="control-label">Organization Website</label>
                                    <input type="url" id="organization_website_edit" name="organization_website_edit" value="<?php echo $row['organization_website']; ?>" class="form-control form-control-success form-control-danger">
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
                                    <label class="control-label">Position Title<strong class="text-danger">*</strong></label>
                                    <input type="text" id="position_title_edit" name="position_title_edit" value="<?php echo $row['position_title']; ?>" class="form-control form-control-success form-control-danger" required>
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
                                    <input type="text" id="department_edit" name="department_edit" value="<?php echo $row['department']; ?>" class="form-control form-control-success form-control-danger" required>
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
                                    <label class="control-label">Position Level<strong class="text-danger">*</strong></label>
                                    <select id="position_level_edit" name="position_level_edit" class="form-control form-control-success form-control-danger"
                                    required>
                                        <option value=""></option>
                                        <option value="Entry Level">Entry Level</option>
                                        <option value="Mid Level">Mid Level</option>
                                        <option value="Top Level">Top Level</option>
                                        <option value="Internship">Internship</option>
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
                                    <label class="control-label">Type of Employment<strong class="text-danger">*</strong></label>
                                    <select id="type_of_employment_edit" name="type_of_employment_edit" class="form-control form-control-success form-control-danger" required>
                                        <option value=""></option>
                                        <option value="Full Time">Full Time</option>
                                        <option value="Part Time">Part Time</option>
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
                                    <label class="control-label">Join Date<strong class="text-danger">*</strong></label>
                                    <input type="date" id="join_date_edit" name="join_date_edit" value="<?php echo $row['join_date']; ?>" class="form-control form-control-success form-control-danger" required>
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
                                    <label class="control-label">Resign Date<strong class="text-danger">*</strong></label>
                                    <input type="date" id="resign_date_edit" name="resign_date_edit" value="<?php echo $row['resign_date']; ?>" class="form-control form-control-success form-control-danger mb-1" required>
                                    <span class="before check">
                                      <i class="material-icons">done</i>
                                    </span>
                                    <span class="before cross">
                                      <i class="material-icons">clear</i>
                                    </span>

                                    <label class="display-inline-block custom-control custom-checkbox">
                                        <input type="checkbox" id="resign_date_continue_edit" name="resign_date_continue_edit" value="continue" class="custom-control-input" <?php if($row['resign_date']=='continue'){echo 'checked';} ?>>
                                        <span class="custom-control-indicator"></span>
                                        <span class="custom-control-description ml-0">I currently work here</span>
                                    </label>

                                </div>
                            </div>

                        </div>

                        <div class="row">

                            <div class="col-md-12 col-sm-12 pl-2 pr-2">
                                <div class="form-group label-floating">
                                    <label class="control-label">Responsibility & Acheivments</label>
                                    <textarea id="responsibility_and_achivement_edit" name="responsibility_and_achivement_edit" class="form-control form-control-success form-control-danger" rows="4"><?php echo $row['responsibility_and_achivement']; ?></textarea>
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
                                    <label class="control-label">Reference Name</label>
                                    <input type="text" id="ref_name_edit" name="ref_name_edit" value="<?php echo $row['ref_name']; ?>" class="form-control form-control-success form-control-danger">
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
                                    <label class="control-label">Reference Position & Department</label>
                                    <input type="text" id="ref_position_dept_edit" name="ref_position_dept_edit" value="<?php echo $row['ref_position_dept']; ?>" class="form-control form-control-success form-control-danger">
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
                                    <label class="control-label">Reference Contact Number</label>
                                    <input type="text" id="ref_contact_no_edit" name="ref_contact_no_edit" value="<?php echo $row['ref_contact_no']; ?>" class="form-control form-control-success form-control-danger">
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
                                    <label class="control-label">Reference Email</label>
                                    <input type="text" id="ref_email_edit" name="ref_email_edit" value="<?php echo $row['ref_email']; ?>" class="form-control form-control-success form-control-danger">
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
                        <button type="reset" class="btn btn-outline-warning mr-1" onclick="$('#work_exp_edit_content').slideUp(400);$('#work_exp_view_content').slideDown(400);$('#work_exp_add').show();$('#work_exp').show();$('#work_exp_with_edit_icon').hide();$('#work_exp_edit_add_cancel').hide();">
                            <i class="icon-cross2"></i> Cancel
                        </button>
                       
                        <button type="submit" class="btn btn-outline-primary" name="work_exp_update">
                            <i class="icon-check2"></i> Update
                        </button>
                     </div>

                </form>
            </div>
    	    <?php
            $position_level=$row['position_level'];
            $type_of_employment=$row['type_of_employment'];
    	}
    }
    else
    {
        echo '
                <div class="text-warning text-sm-center text-md-center text-lg-center text-xl-center">Something is wrong please refresh your web page</div>
            ';
    }
?>

<script type="text/javascript">

    $("#position_level_edit").val('<?php echo $position_level; ?>');
    $("#type_of_employment_edit").val('<?php echo $type_of_employment; ?>');

    $('#work_exp_edit_form').on("change mouseover",function() {

        if ($('#resign_date_continue_edit').is(':checked'))
        {
            $('#resign_date_edit').val('');
            $('#resign_date_edit').prop('required',false);
            $('#resign_date_edit').prop('disabled', true);
        }
        else
        {
            $('#resign_date_edit').prop('required',true);
            $('#resign_date_edit').prop('disabled', false);
        }

    });

    //############################### BEGIN UPDATE ##############################//
    $('button[name="work_exp_update"]').click(function(e){

        $.ajax({
            type: 'post',
            url: 'uwe',   // here your php file to do something with postdata
            data: $('#work_exp_edit_form').serialize(), // here you set the data to send to php file
            beforeSend: function() {
                $('#work_exp_notification_content').show().fadeOut(6100).html('<div class="text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">OPERATION IS RUNNING PLEASE WAIT..</div>');
            },
            success: function (data) {
              $('#work_exp_notification_content').show().fadeOut(6100).html(data);
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
    
    ///############################# BEGIN Form Validation ###########################////
   $('#work_exp_edit_form').bootstrapValidator({

        fields:
        {

            organization_name_edit: 
            {
                message: 'Organization Name is not valid',
                validators: {
                    notEmpty: {
                        message: 'Organization Name is required and cannot be empty'
                    },
                    stringLength: {
                        min: 1,
                        max: 200,
                        message: 'Organization Name must be maximum 200 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9#&(),._/ /-]+$/,
                        message: 'Organization Name can only consist of alphabetical, number, back slash, space, dot, comma, ampersand(&), underscore, hyphen, & parentheses'
                    }
                }
            },

            organization_website_edit: 
            {
                message: 'Organization Website is not valid',
                validators: {
                    uri: {
                        message: 'The input is not a valid url'
                    }
                }
            },

            position_title_edit: 
            {
                message: 'Position Title is not valid',
                validators: {
                    notEmpty: {
                        message: 'Position Title is required and cannot be empty'
                    },
                    stringLength: {
                        min: 1,
                        max: 50,
                        message: 'Position Title must be maximum 50 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z &()_/-]+$/,
                        message: 'Position Title can only consist of alphabetical, space, underscore, hyphen, ampersand & parentheses'
                    }
                }
            },

            department_edit: 
            {
                message: 'Department Name is not valid',
                validators: {
                    notEmpty: {
                        message: 'Department Name is required and cannot be empty'
                    },
                    stringLength: {
                        min: 1,
                        max: 100,
                        message: 'Department Name must be maximum 100 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z &()_/-]+$/,
                        message: 'Department Name can only consist of alphabetical, space, underscore, hyphen, ampersand & parentheses'
                    }
                }
            },

            position_level_edit: 
            {
                message: 'Position Level is not valid',
                validators: {
                    notEmpty: {
                        message: 'Position Level is required and cannot be empty'
                    },
                    stringLength: {
                        min: 1,
                        max: 15,
                        message: 'Position Level must be maximum 15 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z ]+$/,
                        message: 'Position Level can only consist of alphabet & spaces'
                    },
                    choice: {
                        min: 1,
                        max: 1,
                        message: "Don't try to be smart! You can choose maximum 1 option"
                    }
                }
            },

            type_of_employment_edit: 
            {
                message: 'Type of Employment is not valid',
                validators: {
                    notEmpty: {
                        message: 'Type of Employment is required and cannot be empty'
                    },
                    stringLength: {
                        min: 1,
                        max: 10,
                        message: 'Type of Employment must be maximum 8 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z ]+$/,
                        message: 'Type of Employment can only consist of alphabetical & spaces'
                    }
                }
            },

            join_date_edit: 
            {
                message: 'Join Date is not valid',
                validators: {
                    notEmpty: {
                        message: 'Join Date is required and cannot be empty'
                    },
                    date: {
                        format: 'YYYY/MM/DD',
                        message: 'Join Date is not valid'
                    }
                }
            },

            resign_date_edit: 
            {
                message: 'Resign Date is not valid',
                validators: {
                    notEmpty: {
                        message: 'Resign Date is required and cannot be empty'
                    },
                    date: {
                        format: 'YYYY/MM/DD',
                        message: 'Resign Date is not valid'
                    }
                }
            },

            resign_date_continue_edit: 
            {
                message: 'Resign Date is not valid',
                validators: {
                    stringLength: {
                        min: 1,
                        max: 21,
                        message: "Don't try to be smart! Resign Date must be 21 characters long"
                    },
                    regexp: {
                        regexp: /^[a-zA-Z ]+$/,
                        message: "Don't try to be smart! Resign Date can only consist of alphabetical & space"
                    }
                }
            },

            responsibility_and_achivement_edit: 
            {
                message: 'Responsibility & Achivement is not valid',
                validators: {
                    stringLength: {
                        min: 1,
                        max: 500,
                        message: 'Responsibility & Achivement must be maximum 500 digit long'
                    },
                    regexp: {
                       regexp: /^[a-zA-Z0-9/#_() ;:,&+ .\-\n]+$/,
                        message: 'Responsibility & Achivement can only consist of alphabetical, space, number, hash, comma, dot, underscore, colon, semi-colon, hyphen, plus sign, amparsand(&), backslash, paranthesis & new line break'
                    }
                }
            },

            ref_name_edit: 
            {
                message: 'Reference Name is not valid',
                validators: {
                    stringLength: {
                        min: 1,
                        max: 50,
                        message: 'Reference Name must be maximum 50 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z ()./-]+$/,
                        message: 'Reference Name can only consist of alphabetical, numeric, dot, hyphen & back slash'
                    }
                }
            },
            ref_position_dept_edit: 
            {
                message: 'Reference Position & Department is not valid',
                validators: {
                    stringLength: {
                        min: 1,
                        max: 250,
                        message: 'Reference Position & Department must be maximum 250 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z ()./-]+$/,
                        message: 'Reference Position & Department can only consist of alphabetical, numeric, dot, hyphen & back slash'
                    }
                }
            },
            ref_contact_no_edit: 
            {
                message: 'Reference Contact Number is not valid',
                validators: {
                    stringLength: {
                        min: 11,
                        max: 15,
                        message: 'Reference Contact Number must be 11 to 15 characters long'
                    },
                    regexp: {
                        regexp: /^[0-9+ /-]+$/,
                        message: 'Reference Contact Number can only consist of digits, space, hyphen & plus sign(+)'
                    }
                }
            },
            ref_email_edit: 
            {
                message: 'Reference Email Number is not valid',
                validators: {
                    emailAddress: {
                        message: 'The input is not a valid email address'
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