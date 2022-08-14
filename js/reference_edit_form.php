<?php
    session_start();
	require_once('../dbconfig.php');
	global $con;

    $js_id = $_SESSION['js_info']['id'];

	$id = $_POST['id'];

	if(empty($id))
	{
		?>
			<div class="center">No records found under this selection <a href="#" onclick="$('#reference_edit_content').hide();$('.reference_add').show();">HIDE THIS</a>
			</div>
		<?php
		die();
	}

	$query = "SELECT * FROM reference where js_id='$js_id' AND id='$id'";
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
                <form id="reference_edit_form" class="form" method="post" action="" >
                    <div class="form-body">

                        <div class="row">

                            <p class="text-info text-bold-700 text-xs-center text-sm-center text-md-center">Please fill out the <strong class="text-danger">*required</strong> fields</p>

                            <input type="hidden" id="id" name="id" value="<?php echo $row['id']; ?>" class="form-control form-control-success form-control-danger" >
                            
                            <div class="col-md-6 col-sm-6 pl-2 pr-2">
                                <div class="form-group label-floating">
                                    <label class="control-label">Reference Person's Name<strong class="text-danger">*</strong></label>
                                    <input type="text" id="ref_person_name_edit" name="ref_person_name_edit" value="<?php echo $row['ref_person_name']; ?>" class="form-control form-control-success form-control-danger" required>
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
                                    <label class="control-label">Designation<strong class="text-danger">*</strong></label>
                                    <input type="text" id="designation_edit" name="designation_edit"  value="<?php echo $row['designation']; ?>" class="form-control form-control-success form-control-danger" required>
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
                                    <label class="control-label">Mobile No<strong class="text-danger">*</strong></label>
                                    <input type="text" id="mobile_edit" name="mobile_edit" value="<?php echo $row['mobile']; ?>" class="form-control form-control-success form-control-danger" required>
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
                                    <label class="control-label">Phone No</label>
                                    <input type="text" id="land_phone_edit" name="land_phone_edit" value="<?php echo $row['land_phone']; ?>" class="form-control form-control-success form-control-danger">
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
                                    <label class="control-label">Email<strong class="text-danger">*</strong></label>
                                    <input type="email" id="ref_email_edit" name="ref_email_edit" value="<?php echo $row['ref_email']; ?>" class="form-control form-control-success form-control-danger" required>
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
                                    <label class="control-label">Relationship<strong class="text-danger">*</strong></label>
                                    <select id="relationship_edit" name="relationship_edit" class="form-control form-control-success form-control-danger" required>
                                        <option value="">Select Relationship</option>
                                        <option value="Academic">Academic</option>
                                        <option value="Professional">Professional</option>
                                        <option value="Relative">Relative</option>
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
                    </div>

                    <div class="form-actions custom-form-action center">
                        <button type="reset" class="btn btn-outline-warning mr-1" onclick="$('#reference_edit_content').slideUp(400);$('#reference_view_content').slideDown(400);$('#reference_add').show();$('#reference').show();$('#reference_with_edit_icon').hide();$('#reference_edit_add_cancel').hide();">
                            <i class="icon-cross2"></i> Cancel
                        </button>
                       
                        <button type="submit" class="btn btn-outline-primary" name="reference_update">
                            <i class="icon-check2"></i> Update
                        </button>
                     </div>

                </form>
            </div>
    	    <?php
            $relationship=$row['relationship'];
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
    $("#relationship_edit").val('<?php echo $relationship; ?>');

    //############################### BEGIN UPDATE ##############################//
    $('button[name="reference_update"]').click(function(e){

        $.ajax({
            type: 'post',
            url: 'uref',   // here your php file to do something with postdata
            data: $('#reference_edit_form').serialize(), // here you set the data to send to php file
            beforeSend: function() {
                $('#reference_notification_content').show().fadeOut(6100).html('<div class="text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">OPERATION IS RUNNING PLEASE WAIT..</div>');
            },
            success: function (data) {
              $('#reference_notification_content').show().fadeOut(6100).html(data);
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
   $('#reference_edit_form').bootstrapValidator({


        fields:
        {

            ref_person_name_edit: 
            {
                message: 'Reference Persons Name is not valid',
                validators: {
                    notEmpty: {
                        message: 'Reference Persons Name is required and cannot be empty'
                    },
                    stringLength: {
                        min: 1,
                        max: 100,
                        message: 'Reference Persons Name must be maximum 100 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z .()]+$/,
                        message: 'Reference Persons Name can only consist of alphabetical, space, dot & parentheses'
                    }
                }
            },

            designation_edit: 
            {
                message: 'Designation is not valid',
                validators: {
                    notEmpty: {
                        message: 'Designation is required and cannot be empty'
                    },
                    stringLength: {
                        min: 1,
                        max: 100,
                        message: 'Designation must be maximum 100 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z .()]+$/,
                        message: 'Designation can only consist of alphabetical, space, dot & parentheses'
                    }
                }
            },

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
                        message: 'Organization Name must be maximum 50 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9#&(),._/ /-]+$/,
                        message: 'Institute/Organization can only consist of alphabetical, number, back slash, space, dot, comma, ampersand(&), underscore, hyphen, & parentheses'
                    }
                }
            },

           mobile_edit: 
            {
                message: 'Mobile No is not valid',
                validators: {
                     notEmpty: {
                        message: 'Mobile No is required and cannot be empty'
                    },
                    stringLength: {
                        min: 1,
                        max: 20,
                        message: 'Mobile No must be maximum 20 digits long'
                    },
                    regexp: {
                        regexp: /^[0-9 ()+]+$/,
                        message: "Mobile No can only consist of digits, space, plus sign(+) & parentheses"
                    }
                }
            },

            land_phone_edit: 
            {
                message: 'Phone No is not valid',
                validators: {
                    stringLength: {
                        min: 1,
                        max: 20,
                        message: 'Phone No must be maximum 20 digits long'
                    },
                    regexp: {
                        regexp: /^[0-9 ()+]+$/,
                        message: "Phone No can only consist of digits, space, plus sign(+) & parentheses"
                    }
                }
            },
             ref_email_edit: 
            {
                message: 'Reference Email is not valid',
                validators: {
                    notEmpty: {
                        message: 'Reference Email is required and cannot be empty'
                    },
                    emailAddress: {
                        message: 'The input is not a valid email address'
                    }
                }
            },
            relationship_edit: 
            {
                message: 'Relationship is not valid',
                validators: {
                     notEmpty: {
                        message: 'Relationship is required and cannot be empty'
                    },
                    stringLength: {
                        min: 1,
                        max: 15,
                        message: 'Relationship must be maximum 6 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z]+$/,
                        message: "Relationship can only consist of alphabetical"
                    },
                    choice: {
                        min: 1,
                        max: 1,
                        message: "Don't try to be smart! You can choose maximum 1 option"
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