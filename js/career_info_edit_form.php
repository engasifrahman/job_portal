<?php

	require_once('../dbconfig.php');
	global $con;
	$js_id = $_POST['js_id'];

	if(empty($js_id))
	{
		?>
			<div class="center">No records found under this selection <a href="#" onclick="$('#career_info_edit_content').hide();$('.career_info_edit').show();">Hide this</a>
			</div>
		<?php
		die();
	}

	$query = "SELECT * FROM career_info where js_id='$js_id'";
	if (!$result = mysqli_query($con, $query)) {
	        exit(mysqli_error($con));
	}

	while($row = mysqli_fetch_assoc($result))
	{
        $jobLevel=explode(', ', $row['job_level']);
        $jobNature=explode(', ', $row['job_nature']);
		?>
        <div class="card wizard-card" data-color="blue">
        <!--        You can switch " data-color="rose" "  with one of the next bright colors: "blue", "green", "orange", "purple"        -->
            <form id="career_info_edit_form" class="form" method="post" action="" >
                <div class="form-body">

                    <div class="row">
                        <p class="pb-1 text-info text-bold-700 text-xs-center text-sm-center text-md-center">Please fill out the <strong class="text-danger">*required</strong> fields</p>
                        <div class="col-md-6 col-sm-6 pl-2 pr-2">
                            <div class="form-group label-floating">
                                <label class="control-label">Career Objective<strong class="text-danger">*</strong></label>
                                <textarea type="text" id="objective" name="objective" class="form-control form-control-success form-control-danger" required><?php echo $row['objective']; ?></textarea>
                                </span>
                                <span class="before cross">
                                  <i class="material-icons">clear</i>
                                </span>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 pl-2 pr-2">
                            <div class="input-group">
                                <div class="form-group label-floating">
                                    <label class="control-label">Career Summary</label>
                                    <textarea type="text" id="summary" name="summary" class="form-control form-control-success form-control-danger"><?php echo $row['summary']; ?></textarea>
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

                    <div class="row">
                        <div class="col-md-6 col-sm-6 pl-2 pr-2">
                            <div class="input-group">
                                <div class="form-group label-floating">
                                    <label class="control-label">Present Salary</label>
                                    <input type="number" id="present_salary" name="present_salary" value="<?php echo $row['present_salary']; ?>" class="form-control form-control-success form-control-danger">
                                    <span class="before check">
                                      <i class="material-icons">done</i>
                                    </span>
                                    <span class="before cross">
                                      <i class="material-icons">clear</i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 pl-2 pr-2">
                            <div class="input-group">
                                <div class="form-group label-floating">
                                    <label class="control-label">Expected Salary<strong class="text-danger">*</strong></label>
                                    <input type="number" id="expected_salary" name="expected_salary" value="<?php echo $row['expected_salary']; ?>"class="form-control form-control-success form-control-danger" required>
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

                    <div class="row">
                        <div class="form-group col-md-6 col-sm-6 pl-2 pr-2">
                            <label class="control-label">Job Level<strong class="text-danger">*</strong></label>
                            <div class="input-group">
                                <label class="display-inline-block custom-control custom-checkbox">
                                    <input type="checkbox" value="Entry Level" name="job_level[]" class="custom-control-input" 
                                    <?php if(in_array("Entry Level",$jobLevel)){echo "checked";} ?> required>
                                    <span class="custom-control-indicator"></span>
                                    <span class="custom-control-description ml-0">Entry Level</span>
                                </label>
                                <label class="display-inline-block custom-control custom-checkbox">
                                    <input type="checkbox" value="Mid Level" name="job_level[]"  class="custom-control-input" <?php if(in_array("Mid Level",$jobLevel)){echo "checked";} ?> required>
                                    <span class="custom-control-indicator"></span>
                                    <span class="custom-control-description ml-0">Mid Level</span>
                                </label>
                                <label class="display-inline-block custom-control custom-checkbox">
                                    <input type="checkbox" value="Top Level" name="job_level[]"  class="custom-control-input" <?php if(in_array("Top Level",$jobLevel)){echo "checked";} ?> required>
                                    <span class="custom-control-indicator"></span>
                                    <span class="custom-control-description ml-0">Top Level</span>
                                </label>
                            </div>
                        </div>
                        <div class="form-group col-md-6 col-sm-6 pl-2 pr-2">
                            <label class="control-label">Job Nature<strong class="text-danger">*</strong></label>
                            <div class="input-group">
                                <label class="display-inline-block custom-control custom-checkbox">
                                    <input type="checkbox" value="Full Time" name="job_nature[]" class="custom-control-input" <?php if(in_array("Full Time",$jobNature)){echo "checked";} ?> required>
                                    <span class="custom-control-indicator"></span>
                                    <span class="custom-control-description ml-0">Full Time</span>
                                </label>
                                <label class="display-inline-block custom-control custom-checkbox">
                                    <input type="checkbox" value="Part Time" name="job_nature[]"  class="custom-control-input" <?php if(in_array("Part Time",$jobNature)){echo "checked";} ?> required>
                                    <span class="custom-control-indicator"></span>
                                    <span class="custom-control-description ml-0">Part Time</span>
                                </label>
                                <label class="display-inline-block custom-control custom-checkbox">
                                    <input type="checkbox" value="Contractual" name="job_nature[]"  class="custom-control-input" <?php if(in_array("Contractual",$jobNature)){echo "checked";} ?> required>
                                    <span class="custom-control-indicator"></span>
                                    <span class="custom-control-description ml-0">Contractual</span>
                                </label>
                                <label class="display-inline-block custom-control custom-checkbox">
                                    <input type="checkbox" value="Internship" name="job_nature[]"  class="custom-control-input" <?php if(in_array("Internship",$jobNature)){echo "checked";} ?> required>
                                    <span class="custom-control-indicator"></span>
                                    <span class="custom-control-description ml-0">Internship</span>
                                </label>
                            </div>
                        </div>
                    </div>

                <div class="form-actions custom-form-action center">
                    <button type="button" class="btn btn-outline-warning mr-1" onclick="$('#career_info_edit_content').slideUp(400);$('#career_info_view_content').slideDown(400);$('.career_info_edit').show();$('#career_info').show();$('#career_info_with_edit_icon').hide();$('#career_info_edit_cancel').hide();">
                        <i class="icon-cross2"></i> Cancel
                    </button>
                   
                    <button type="submit" class="btn btn-outline-primary" name="career_info_update">
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
    $('button[name="career_info_update"]').click(function(e){
        
        $.ajax({
            type: 'post',
            url: 'ucri',   // here your php file to do something with postdata
            data: $('#career_info_edit_form').serialize(), // here you set the data to send to php file
            beforeSend: function() {
                $('#career_info_notification_content').show().fadeOut(6100).html('<div class="text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">OPERATION IS RUNNING PLEASE WAIT..</div>');
            },
            success: function (data) {
              $('#career_info_notification_content').show().fadeOut(6100).html(data);
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

	$('button[name="career_info_update"]').click(function(e) {
       e.preventDefault();


		var id = $(this).attr('id');

        var objective = $('textarea[name=objective]').val();
        var summary = $('textarea[name=summary]').val();
        var present_salary = $('input[name=present_salary]').val();
        var expected_salary = $('input[name=expected_salary]').val();
        /*var job_level = [];
        $.each($('input[name="job_level"]:checked'), function(){        
            job_level.push($(this).val());
        });*//*
        var job_level = $('input[name="job_level[]"]:checked').map(function () {
            return this.value;
        }).get();
        var job_nature = $('input[name="job_nature[]"]:checked').map(function () {
            return this.value;
        }).get();

        $.ajax({
            url: "career_info_update.php",
            type: "POST",
            data: { id: id, objective: objective, summary: summary, present_salary: present_salary, expected_salary: expected_salary, job_level: job_level, job_nature: job_nature
            },
            success: function(data, status, xhr) {
                $('#objective').val('');
                $('#summary').val('');
                $('#present_salary').val('');
                $('#expected_salary').val('');

                $('#career_info_notification_content').show().html(data);

                $.get("career_info_view.php", function(data) {
                    $("#career_info_view_content").html(data);
                });
            },

            complete: function() {
            	$('#career_info_edit_content').slideUp(400); //this is actually hide
                $('#career_info_view_content').slideDown(400); //this is actually show
                $('.career_info_edit').show();
                $('#career_info').show();
				$('#career_info_with_edit_icon').hide();
				$('#career_info_edit_cancel').hide();
            }
        });

    }); // update close 

    */
    
    //############################# BEGIN Form Validation ###########################//
    $('#career_info_edit_form').bootstrapValidator({

        fields:
        {
            objective: 
            {
                message: 'Career Objective is not valid',
                validators: {
                    notEmpty: {
                        message: 'Career Objective is required and cannot be empty'
                    },
                    stringLength: {
                        min: 0,
                        max: 500,
                        message: 'Career Objective can be maximum 400 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9/#_() ;:,&+ .\-\n]+$/,
                        message: 'Career Objective can only consist of alphabetical, space, number, hash, comma, dot, underscore, colon, semi-colon, hyphen, plus sign, amparsand(&), backslash, paranthesis & new line break'
                    },
                    remote: {
                        type: 'POST',
                        url: 'rmt',
                        message: 'You entered a vulgar word'
                    }
                }
            },

            summary: 
            {
                message: 'Career Summary is not valid',
                validators: {
                    stringLength: {
                        min: 0,
                        max: 1000,
                        message: 'Career Summary can be maximum 1000 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9/#_() ;:,&+ .\-\n]+$/,
                        message: 'Career Summary can only consist of alphabetical, space, number, hash, comma, dot, underscore, colon, semi-colon, hyphen, plus sign, ampersand(&), backslash, paranthesis & new line break'
                    },
                    remote: {
                        type: 'POST',
                        url: 'rmt',
                        message: 'You entered a vulgar word'
                    }
                }
            },

            present_salary: 
            {
                message: 'Present Salary is not valid',
                validators: {
                    stringLength: {
                        min: 0,
                        max: 15,
                        message: 'Present Salary must be 0 to 15 characters long'
                    },
                    regexp: {
                        regexp: /^[0-9]+$/,
                        message: 'Present Salary can only consist of digit'
                    }
                }
            },

            expected_salary: 
            {
                message: 'Expected Salary is not valid',
                validators: {
                    notEmpty: {
                        message: 'Expected Salary is required and cannot be empty'
                    },
                    stringLength: {
                        min: 0,
                        max: 15,
                        message: 'Expected Salary must be 0 to 15 characters long'
                    },
                    regexp: {
                        regexp: /^[0-9]+$/,
                        message: 'Present Salary can only consist of digit'
                    }
                }
            },

             'job_level[]': 
             {
                validators: {
                    notEmpty: {
                        message: 'Job Level is required and cannot be empty'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z ]+$/,
                        message: 'Job Level can only consist of alphabetical & space'
                    },
                    choice: {
                        min: 1,
                        max: 3,
                        message: 'Please choose 1 to 3 job level you are looking for'
                    }
                }
            },

            'job_nature[]': 
            {
                validators: {
                    notEmpty: {
                        message: 'Job Nature is required and cannot be empty'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z ]+$/,
                        message: 'Job Nature can only consist of alphabetical & space'
                    },
                    choice: {
                        min: 1,
                        max: 4,
                        message: 'Please choose 1 to 4 job nature you are available for'
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