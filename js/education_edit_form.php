<?php
    session_start();
	require_once('../dbconfig.php');
	global $con;

    $js_id = $_SESSION['js_info']['id'];

	$id = $_POST['id'];

	if(empty($id))
	{
		?>
			<div class="center">No records found under this selection <a href="#" onclick="$('#education_edit_content').hide();$('.education_add').show();">HIDE THIS</a>
			</div>
		<?php
		die();
	}

	$query1 = "SELECT * FROM education where js_id='$js_id' AND id='$id'";
	if (!$result1 = mysqli_query($con, $query1))
    {
	        exit(mysqli_error($con));
	}

    $query2 = "SELECT degree_level FROM data_degree_level";
    if (!$result2=mysqli_query($con, $query2))
    {
        exit(mysqli_error($con));
    }

    if (mysqli_num_rows($result1) > 0)
    {
    	while($row = mysqli_fetch_assoc($result1))
    	{
    		?>
            <div class="card wizard-card" data-color="blue">
            <!--        You can switch " data-color="rose" "  with one of the next bright colors: "blue", "green", "orange", "purple"        -->
                <form id="education_edit_form" class="form" method="post" action="">
                    <div class="form-body">

                        <div class="row">

                            <p class="pb-1 text-info text-bold-700 text-xs-center text-sm-center text-md-center">Please fill out the <strong class="text-danger">*required</strong> fields</p>

                            <input type="text" name="id" style="display:none;" value="<?php echo $row['id']; ?>">

                            <div class="col-md-6 col-sm-6 pl-2 pr-2">
                                <div class="form-group label-floating">
                                    <label class="control-label">Degree Level<strong class="text-danger">*</strong></label>
                                    <select id="degree_level_edit" name="degree_level_edit" class="form-control form-control-success form-control-danger" required>
                                    <option value=""></option>
                                    <?php
                                    if (mysqli_num_rows($result2) > 0)
                                    {
                                        while($degree_data=mysqli_fetch_assoc($result2))
                                        {
                                            echo
                                            '
                                                <option value="'.$degree_data['degree_level'].'">'.$degree_data['degree_level'].'</option>
                                            ';
                                        } 
                                    }
                                    else
                                    {
                                        echo
                                            '
                                                <option value="">Sorry! data not availabe please try again later</option>
                                            ';
                                    }
                                    ?>
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
                                    <label class="control-label">Degree Title<strong class="text-danger">*</strong></label>
                                    <input type="text" id="degree_title_edit" name="degree_title_edit" value="<?php echo $row['degree_title']; ?>" class="form-control form-control-success form-control-danger" required>
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
                                    <label class="control-label">Major Area/Group<strong class="text-danger">*</strong></label>
                                    <input type="text" id="major_subject_edit" name="major_subject_edit" value="<?php echo $row['major_subject']; ?>" class="form-control form-control-success form-control-danger" required>
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
                                    <label class="control-label">Institution<strong class="text-danger">*</strong></label>
                                    <input type="text" id="institution_edit" name="institution_edit" value="<?php echo $row['institution']; ?>" class="form-control form-control-success form-control-danger" required>
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
                                    <label class="control-label">Result System<strong class="text-danger">*</strong></label>
                                    <select id="result_system_edit" name="result_system_edit" class="form-control form-control-success form-control-danger" required>
                                        <option value=""></option>
                                        <option value="Grade">Grade</option>
                                        <option value="Class">Class</option>
                                        <option value="Division">Division</option>
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
                                    <label class="control-label"  id="grade-label">Grade Scale<strong class="text-danger">*</strong></label>
                                    <input type="text" id="grade_scale_edit" name="grade_scale_edit" value="<?php echo $row['grade_scale']; ?>" class="form-control form-control-success form-control-danger" required>
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

                            <div class="col-md-6 col-sm-6 pl-2 pr-2" id="result_achieved_grade">
                                <div class="form-group label-floating">
                                    <label class="control-label">Result Achieved<strong class="text-danger">*</strong></label>
                                    <input type="text" id="result_achieved_grade_edit" name="result_achieved_grade_edit" value="<?php echo $row['result_achieved']; ?>" class="form-control form-control-success form-control-danger" required>
                                    <span class="before check">
                                    <i class="material-icons">done</i>
                                    </span>
                                    <span class="before cross">
                                      <i class="material-icons">clear</i>
                                    </span>
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-6 pl-2 pr-2" id="result_achieved_div_class" style="display:none;">
                                <div class="form-group label-floating">
                                    <label class="control-label">Result Achieved<strong class="text-danger">*</strong></label>
                                    <select id="result_achieved_div_class_edit" name="result_achieved_div_class_edit" class="form-control form-control-success form-control-danger" style="display:none;" required>
                                        <option value=""></option>
                                        <option value="1st">1st</option>
                                        <option value="2nd">2nd</option>
                                        <option value="3rd">3rd</option>
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
                                    <label class="control-label">Duration (year)<strong class="text-danger">*</strong></label>
                                    <input type="text" id="duration_edit" name="duration_edit" value="<?php echo $row['duration']; ?>" class="form-control form-control-success form-control-danger" required>
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
                                    <label class="control-label">Passing Year<strong class="text-danger">*</strong></label>
                                    <input type="text" id="passing_year_edit" name="passing_year_edit" value="<?php echo $row['passing_year']; ?>" class="form-control form-control-success form-control-danger" required>
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
                        <button type="reset" class="btn btn-outline-warning mr-1" onclick="$('#education_edit_content').slideUp(400);$('#education_view_content').slideDown(400);$('#education_add').show();$('#education').show();$('#education_with_edit_icon').hide();$('#education_edit_add_cancel').hide();">
                            <i class="icon-cross2"></i> Cancel
                        </button>
                       
                        <button type="submit" class="btn btn-outline-primary" name="education_update">
                            <i class="icon-check2"></i> Update
                        </button>
                     </div>

                </form>
            </div>
    	<?php
            $degree_level=$row['degree_level'];
            $result_system=$row['result_system'];
            $result_achieved=$row['result_achieved'];
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

    $("#degree_level_edit").val('<?php echo $degree_level; ?>');
    $("#result_system_edit").val('<?php echo $result_system; ?>');
    $("#result_achieved_div_class_edit").val('<?php echo $result_achieved; ?>');


    $('#education_edit_form').on('click mouseover',function() {
        var result_system_edit = $('select[name="result_system_edit"] option:selected').val();
        if (result_system_edit=="Grade")
        {
            $('#grade-label').show();
            $('#result_achieved_grade').show();
            $('#result_achieved_grade_edit').show();
            $('#result_achieved_div_class').hide();
            $("#result_achieved_div_class_edit").val('');
            $('#result_achieved_div_class_edit').hide();
            $("#grade_scale_edit").prop('required',true);
            $('#grade_scale_edit').prop('hidden', false);
        }
        else if (result_system_edit=="Class")
        {
            $('#result_achieved_grade').hide();
            $("#result_achieved_grade_edit").val('');
            $('#result_achieved_grade_edit').hide();
            $('#grade-label').hide();
            $('#result_achieved_div_class').show();
            $('#result_achieved_div_class_edit').show();
            $("#grade_scale_edit").val('');
            $("#grade_scale_edit").prop('required',false);
            $('#grade_scale_edit').prop('hidden', true);
        }
        else if (result_system_edit=="Division")
        {
            $('#result_achieved_grade').hide();
            $("#result_achieved_grade_edit").val('');
            $('#result_achieved_grade_edit').hide();
            $('#grade-label').hide();
            $('#result_achieved_div_class').show();
            $('#result_achieved_div_class_edit').show();
            $("#grade_scale_edit").val('');
            $("#grade_scale_edit").prop('required',false);
            $('#grade_scale_edit').prop('hidden', true);
        }
    });

    //############################### BEGIN UPDATE ##############################//
    $('button[name="education_update"]').click(function(e){

        $.ajax({
            type: 'post',
            url: 'uedu',   // here your php file to do something with postdata
            data: $('#education_edit_form').serialize(), // here you set the data to send to php file
            beforeSend: function() {
                $('#education_notification_content').show().fadeOut(6100).html('<div class="text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">OPERATION IS RUNNING PLEASE WAIT..</div>');
            },
            success: function (data) {
              $('#education_notification_content').show().fadeOut(6100).html(data);
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
    $('#education_edit_form').bootstrapValidator({

        fields:
        {

            degree_level_edit: 
            {
                message: 'Degree Level is not valid',
                validators: {
                    notEmpty: {
                        message: 'Degree Level is required and cannot be empty'
                    },
                    stringLength: {
                        min: 1,
                        max: 50,
                        message: 'Degree Level must be maximum 50 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z /]+$/,
                        message: 'Degree Level can only consist of alphabetical, back slash & space'
                    }
                }
            },

            degree_title_edit: 
            {
                message: 'Degree Title is not valid',
                validators: {
                    notEmpty: {
                        message: 'Degree Title is required and cannot be empty'
                    },
                    stringLength: {
                        min: 1,
                        max: 100,
                        message: 'Degree Title must be maximum 100 characters long'
                    },
                     regexp: {
                        regexp: /^[a-zA-Z0-9.&()_ /-]+$/,
                        message: 'Degree Title can only consist of alphabetical, number, dot, space, underscore, hyphen, ampersand & parentheses'
                    }
                }
            },

            major_subject_edit: 
            {
                message: 'Major Area/Group is not valid',
                validators: {
                    notEmpty: {
                        message: 'Major Area/Group is required and cannot be empty'
                    },
                    stringLength: {
                        min: 1,
                        max: 50,
                        message: 'Major Area/Group must be maximum 50 characters long'
                    },
                     regexp: {
                        regexp: /^[a-zA-Z &()_/-]+$/,
                        message: 'Major Area/Group can only consist of alphabetical, space, underscore, hyphen, ampersand & parentheses'
                    }
                }
            },

            institution_edit: 
            {
                message: 'Institution is not valid',
                validators: {
                    notEmpty: {
                        message: 'Institution is required and cannot be empty'
                    },
                    stringLength: {
                        min: 1,
                        max: 200,
                        message: 'Institution must be maximum 200 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z &()_/-]+$/,
                        message: 'Institution can only consist of alphabetical, space, underscore, hyphen, ampersand & parentheses'
                    }
                }
            },

            result_system_edit: 
            {
                message: 'Result System is not valid',
                validators: {
                    notEmpty: {
                        message: 'Result System is required and cannot be empty'
                    },
                    stringLength: {
                        min: 1,
                        max: 8,
                        message: 'Result System must be maximum 8 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z]+$/,
                        message: 'Result System can only consist of alphabetical'
                    }
                }
            },

            grade_scale_edit: 
            {
                message: 'Grade Scale is not valid',
                validators: {
                    notEmpty: {
                        message: 'Grade Scale is required and cannot be empty'
                    },
                    stringLength: {
                        min: 1,
                        max: 4,
                        message: 'Grade Scale must be maximum 4 digit long'
                    },
                    regexp: {
                        regexp: /^[0-9.]+$/,
                        message: 'Grade Scale can only consist of numeric data'
                    }
                }
            },

            result_achieved_grade_edit: 
            {
                message: 'Result Achieved is not valid',
                validators: {
                    notEmpty: {
                        message: 'Result Achieved is required and cannot be empty'
                    },
                    stringLength: {
                        min: 1,
                        max: 4,
                        message: 'Result Achieved must be maximum 4 digit long'
                    },
                    regexp: {
                        regexp: /^[0-9.]+$/,
                        message: 'Result Achieved can only consist of numeric data'
                    }
                }
            },

            result_achieved_div_class_edit: 
            {
                message: 'Result Achieved is not valid',
                validators: {
                    notEmpty: {
                        message: 'Result Achieved is required and cannot be empty'
                    },
                    stringLength: {
                        min: 1,
                        max: 3,
                        message: 'Result Achieved must be maximum 3 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9]+$/,
                        message: 'Result Achieved can only consist of alphanumeric data'
                    }
                }
            },

            duration_edit: 
            {
                message: 'Duration is not valid',
                validators: {
                    notEmpty: {
                        message: 'Duration is required and cannot be empty'
                    },
                    stringLength: {
                        min: 1,
                        max: 5,
                        message: 'Duration must be maximum 5 digit long'
                    },
                    regexp: {
                        regexp: /^[0-9.]+$/,
                        message: 'Duration can only consist of numeric data'
                    }
                }
            },

            passing_year_edit: 
            {
                message: 'Passing Year is not valid',
                validators: {
                    notEmpty: {
                        message: 'Passing Year is required and cannot be empty'
                    },
                    stringLength: {
                        min: 4,
                        max: 4,
                        message: 'Passing Year must be 4 digit long'
                    },
                    regexp: {
                        regexp: /^[0-9]+$/,
                        message: 'Passing Year can only consist of numeric data'
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