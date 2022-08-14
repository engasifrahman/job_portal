<?php
    session_start();
	require_once('../dbconfig.php');
	global $con;

    $js_id = $_SESSION['js_info']['id'];

	$id = $_POST['id'];

	if(empty($id))
	{
		?>
			<div class="center">No records found under this selection <a href="#" onclick="$('#training_edit_content').hide();$('.training_add').show();">HIDE THIS</a>
			</div>
		<?php
		die();
	}

	$query = "SELECT * FROM training_workshop where js_id='$js_id' AND id='$id'";
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
                <form id="training_edit_form" class="form" method="post" action="" >
                    <div class="form-body">

                        <div class="row">

                            <p class="pb-1 text-info text-bold-700 text-xs-center text-sm-center text-md-center">Please fill out the <strong class="text-danger">*required</strong> fields</p>

                            <input type="hidden" id="organization_name_edit" name="id" value="<?php echo $row['id']; ?>" class="form-control form-control-success form-control-danger" >
                            
                            <div class="col-md-6 col-sm-6 pl-2 pr-2">
                                <div class="form-group label-floating">
                                    <label class="control-label">Training/Workshop Type<strong class="text-danger">*</strong></label>
                                    <input type="text" id="training_type_edit" name="training_type_edit" value="<?php echo $row['training_type']; ?>" class="form-control form-control-success form-control-danger" required>
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
                                    <label class="control-label">Training/Workshop Title<strong class="text-danger">*</strong></label>
                                    <input type="text" id="training_title_edit" name="training_title_edit" value="<?php echo $row['training_title']; ?>" class="form-control form-control-success form-control-danger" required>
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
                                    <label class="control-label">Institute/Organization<strong class="text-danger">*</strong></label>
                                    <input type="text" id="institution_edit" name="institution_edit" value="<?php echo $row['institution']; ?>" class="form-control form-control-success form-control-danger" required>
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
                                    <label class="control-label">Training/Workshop Duration<strong class="text-danger">*</strong></label>
                                    <input type="text" id="training_duration_edit" name="training_duration_edit" value="<?php echo $row['training_duration']; ?>" class="form-control form-control-success form-control-danger" required>
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
                                    <label class="control-label">Start Date<strong class="text-danger">*</strong></label>
                                    <input type="date" id="start_date_edit" name="start_date_edit" value="<?php echo $row['start_date']; ?>" class="form-control form-control-success form-control-danger" required>
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
                                    <label class="control-label">End Date<strong class="text-danger">*</strong></label>
                                    <input type="date" id="end_date_edit" name="end_date_edit" value="<?php echo $row['end_date']; ?>" class="form-control form-control-success form-control-danger" required>
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
                                    <label class="control-label">Training/Workshop Description</label>
                                    <textarea id="training_description_edit" name="training_description_edit" class="form-control form-control-success form-control-danger"><?php echo $row['training_description']; ?></textarea>
                                    <span class="before check">
                                      <i class="material-icons">done</i>
                                    </span>
                                    <span class="before cross">
                                      <i class="material-icons">clear</i>
                                    </span> 
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-6 pl-2 pr-2" style="padding-top: 52px;">
                                <div class="form-group label-floating">
                                    <label class="control-label">Certification<strong class="text-danger">*</strong><span style="font-size: 11px; color:#E08E0B "> (Do you have any certification for this training/workshop)</span></label>
                                    <div class="input-group">
                                    <label class="display-inline-block custom-control custom-radio">
                                        <input type="radio" value="Yes" name="certification_edit" class="custom-control-input" <?php if ($row['certification']=='Yes') {echo 'checked';} ?> required>
                                        <span class="custom-control-indicator"></span>
                                        <span class="custom-control-description ml-0">Yes</span>
                                    </label>

                                    <label class="display-inline-block custom-control custom-radio ml-1">
                                        <input type="radio" value="No" name="certification_edit" class="custom-control-input" <?php if ($row['certification']=='No') {echo 'checked';} ?> required>
                                        <span class="custom-control-indicator"></span>
                                        <span class="custom-control-description ml-0">No</span>
                                    </label>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                    <div class="form-actions custom-form-action center">
                        <button type="reset" class="btn btn-outline-warning mr-1" onclick="$('#training_edit_content').slideUp(400);$('#training_view_content').slideDown(400);$('#training_add').show();$('#training').show();$('#training_with_edit_icon').hide();$('#training_edit_add_cancel').hide();">
                            <i class="icon-cross2"></i> Cancel
                        </button>
                       
                        <button type="submit" class="btn btn-outline-primary" name="training_update">
                            <i class="icon-check2"></i> Update
                        </button>
                     </div>

                </form>
            </div>
    	    <?php
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

    //############################### BEGIN UPDATE ##############################//
    $('button[name="training_update"]').click(function(e){

        $.ajax({
            type: 'post',
            url: 'utrain',   // here your php file to do something with postdata
            data: $('#training_edit_form').serialize(), // here you set the data to send to php file
            beforeSend: function() {
                $('#training_notification_content').show().fadeOut(6100).html('<div class="text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">OPERATION IS RUNNING PLEASE WAIT..</div>');
            },
            success: function (data) {
              $('#training_notification_content').show().fadeOut(6100).html(data);
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
   $('#training_edit_form').bootstrapValidator({
        fields:
        {

            training_type_edit: 
            {
                message: 'Training/Workshop Type is not valid',
                validators: {
                    notEmpty: {
                        message: 'Training/Workshop Type is required and cannot be empty'
                    },
                    stringLength: {
                        min: 1,
                        max: 50,
                        message: 'Training/Workshop Type must be maximum 50 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9#&(),._/ /-]+$/,
                        message: 'Training/Workshop Type can only consist of alphabetical, number, back slash, space, dot, comma, ampersand(&), underscore, hyphen, & parentheses'
                    }
                }
            },

            training_title_edit: 
            {
                message: 'Training/Workshop Title is not valid',
                validators: {
                    notEmpty: {
                        message: 'Training/Workshop Title is required and cannot be empty'
                    },
                    stringLength: {
                        min: 1,
                        max: 200,
                        message: 'Training/Workshop Title must be maximum 200 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9#&(),._/ /-]+$/,
                        message: 'Training/Workshop Title can only consist of alphabetical, number, back slash, space, dot, comma, ampersand(&), underscore, hyphen, & parentheses'
                    }
                }
            },

            institution_edit: 
            {
                message: 'Institute/Organization Name is not valid',
                validators: {
                    notEmpty: {
                        message: 'Institute/Organization Name is required and cannot be empty'
                    },
                    stringLength: {
                        min: 1,
                        max: 200,
                        message: 'Institute/Organization Name must be maximum 50 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9#&(),._/ /-]+$/,
                        message: 'Institute/Organization can only consist of alphabetical, number, back slash, space, dot, comma, ampersand(&), underscore, hyphen, & parentheses'
                    }
                }
            },

            training_duration_edit: 
            {
                message: 'Training/Workshop Duration is not valid',
                validators: {
                    notEmpty: {
                        message: 'Training/Workshop Duration is required and cannot be empty'
                    },
                    stringLength: {
                        min: 1,
                        max: 4,
                        message: 'Training/Workshop Duration must be maximum 4 digits long'
                    },
                    digits: {
                        message: 'Training/Workshop Duration can only consist of digits'
                    }
                }
            },

            start_date_edit: 
            {
                message: 'Start Date is not valid',
                validators: {
                    notEmpty: {
                        message: 'Start Date is required and cannot be empty'
                    },
                    date: {
                        format: 'YYYY/MM/DD',
                        message: 'Start Date is not valid'
                    }
                }
            },

            end_date_edit: 
            {
                message: 'End Date is not valid',
                validators: {
                    notEmpty: {
                        message: 'End Date is required and cannot be empty'
                    },
                    date: {
                        format: 'YYYY/MM/DD',
                        message: 'End Date is not valid'
                    }
                }
            },

            certification_edit: 
            {
                message: 'Certification is not valid',
                validators: {
                    notEmpty: {
                        message: 'Certification is required and cannot be empty'
                    },
                    stringLength: {
                        min: 1,
                        max: 3,
                        message: "Don't try to be smart! Certificationmust be 21 characters long"
                    },
                    regexp: {
                        regexp: /^[a-zA-Z]+$/,
                        message: "Don't try to be smart! Certification can only consist of alphabetical"
                    }
                }
            },

            training_description_edit: 
            {
                message: 'Training/Workshop Description is not valid',
                validators: {
                    stringLength: {
                        min: 1,
                        max: 500,
                        message: 'Training/Workshop Description must be maximum 500 digit long'
                    },
                    regexp: {
                       regexp: /^[a-zA-Z0-9/#_() ;:,&+ .\-\n]+$/,
                        message: 'Training/Workshop Description can only consist of alphabetical, space, number, hash, comma, dot, underscore, colon, semi-colon, hyphen, plus sign, amparsand(&), backslash, paranthesis & new line break'
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