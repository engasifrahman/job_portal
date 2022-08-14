<?php
    require'../dbconfig.php';
    global $con;

    $query = "SELECT degree_level FROM data_degree_level";
    if (!$result=mysqli_query($con, $query))
    {
        exit(mysqli_error($con));
    }

?>
<div class="card wizard-card" data-color="blue">
<!--        You can switch " data-color="rose" "  with one of the next bright colors: "blue", "green", "orange", "purple"        -->
    <form id="education_add_form" class="form" method="post" action="" >
        
        <div class="form-body">

            <div class="row">

                <p class="pb-1 text-info text-bold-700 text-xs-center text-sm-center text-md-center">Please fill out the <strong class="text-danger">*required</strong> fields</p>

                <div class="col-md-6 col-sm-6 pl-2 pr-2">
                    <div class="form-group label-floating">
                        <label class="control-label">
                            Degree Level<strong class="text-danger">*</strong>
                        </label>
                        <select id="degree_level" name="degree_level" class="form-control form-control-success form-control-danger" required>
                            <option value=""></option>
                            <?php
                            if (mysqli_num_rows($result) > 0)
                            {
                                while($degree_data=mysqli_fetch_assoc($result))
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
                        <input type="text" id="degree_title" name="degree_title" class="form-control form-control-success form-control-danger" required>
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
                        <input type="text" id="major_subject" name="major_subject" class="form-control form-control-success form-control-danger" required>
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
                        <input type="text" id="institution" name="institution" class="form-control form-control-success form-control-danger" required>
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
                        <select id="result_system" name="result_system" class="form-control form-control-success form-control-danger" required>
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
                        <label class="control-label" id="grade-label">Grade Scale<strong class="text-danger">*</strong></label>
                        <input type="text" id="grade_scale" name="grade_scale" class="form-control form-control-success form-control-danger" required>
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
                        <label class="control-label">Result Achieved<strong class="text-danger">*</strong></label>
                        <input type="text" id="result_achieved_grade" name="result_achieved_grade" class="form-control form-control-success form-control-danger" required>

                        <select id="result_achieved_div_class" name="result_achieved_div_class" class="form-control form-control-success form-control-danger" style="display:none;" required
                        >
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
                        <input type="text" id="duration" name="duration" class="form-control form-control-success form-control-danger" required>
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
                        <input type="text" id="passing_year" name="passing_year" class="form-control form-control-success form-control-danger" required>
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
            <button type="reset" class="btn btn-outline-warning mr-1" onclick="$('#education_add_content').slideUp(400);$('#education_view_content').slideDown(400);$('#education_add').show();$('#education').show();$('#education_with_add_icon').hide();$('#education_edit_add_cancel').hide();">
                <i class="icon-cross2"></i> Cancel
            </button>
           
            <button type="submit" class="btn btn-outline-primary" name="education_add">
                <i class="icon-check2"></i> Add
            </button>
         </div>

    </form>
</div>

<script type="text/javascript">

    $('#education_add_form').on("click mouseover",function() {

        var result_system = $('select[name="result_system"] option:selected').val();
        if (result_system=="Grade")
        {
            $('#grade-label').show();
            $('#result_achieved_grade').show();
            $("#result_achieved_div_class").val('');
            $('#result_achieved_div_class').hide();
            $("#grade_scale").prop('required',true);
            $('#grade_scale').prop('hidden', false);
        }
        else if (result_system=="Class")
        {
            $("#result_achieved_grade").val('');
            $('#result_achieved_grade').hide();
            $('#grade-label').hide();
            $('#result_achieved_div_class').show();
            $("#grade_scale").val('');
            $("#grade_scale").prop('required',false);
            $('#grade_scale').prop('hidden', true);
        }
        else if (result_system=="Division")
        {
            $("#result_achieved_grade").val('');
            $('#result_achieved_grade').hide();
            $('#grade-label').hide();
            $('#result_achieved_div_class').show();
            $("#grade_scale").val('');
            $("#grade_scale").prop('required',false);
            $('#grade_scale').prop('hidden', true);
        }

    });

    //################################# BEGIN INSERT ################################//
    $('button[name="education_add"]').click(function (e){

        $.ajax({
            type: 'post',
            url: 'aedu',   // here your php file to do something with postdata
            data: $('#education_add_form').serialize(), // here you set the data to send to php file
            beforeSend: function() {
                $('#education_notification_content').show().fadeOut(6100).html('<div class="text-xs-center  text-sm-center text-md-center text-lg-center text-xl-center">OPERATION IS RUNNING PLEASE WAIT..</div>');
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
    //################################## END INSERT #################################//
    
    //############################# BEGIN Form Validation ###########################//
    $('#education_add_form').bootstrapValidator({

        fields:
        {

            degree_level: 
            {
                message: 'Degree Level is not valid',
                validators: {
                    notEmpty: {
                        message: 'Degree Level is required and cannot be empty'
                    },
                    stringLength: {
                        min: 1,
                        max: 50,
                        message: 'Degree Level can be maximum 50 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z /]+$/,
                        message: 'Degree Level can only consist of alphabetical, back slash & space'
                    }
                }
            },

            degree_title: 
            {
                message: 'Degree Title is not valid',
                validators: {
                    notEmpty: {
                        message: 'Degree Title is required and cannot be empty'
                    },
                    stringLength: {
                        min: 0,
                        max: 100,
                        message: 'Degree Title can be maximum 100 characters long'
                    },
                     regexp: {
                        regexp: /^[a-zA-Z0-9.&()_ /-]+$/,
                        message: 'Degree Title can only consist of alphabetical, number, dot, space, underscore, hyphen, ampersand & parentheses'
                    }
                }
            },

            major_subject: 
            {
                message: 'Major Area/Group is not valid',
                validators: {
                    notEmpty: {
                        message: 'Major Area/Group is required and cannot be empty'
                    },
                    stringLength: {
                        min: 1,
                        max: 50,
                        message: 'Major Area/Group can be maximum 50 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z &()_/-]+$/,
                        message: 'Major Area/Group can only consist of alphabetical, space, underscore, hyphen, ampersand & parentheses'
                    }
                }
            },

            institution: 
            {
                message: 'Institution is not valid',
                validators: {
                    notEmpty: {
                        message: 'Institution is required and cannot be empty'
                    },
                    stringLength: {
                        min: 1,
                        max: 200,
                        message: 'Institution can be maximum 200 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z &()_/-]+$/,
                        message: 'Institution can only consist of alphabetical, space, underscore, hyphen, ampersand & parentheses'
                    }
                }
            },

            result_system: 
            {
                message: 'Result System is not valid',
                validators: {
                    notEmpty: {
                        message: 'Result System is required and cannot be empty'
                    },
                    stringLength: {
                        min: 1,
                        max: 8,
                        message: 'Result System can be maximum 8 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z]+$/,
                        message: 'Result System can only consist of alphabetical'
                    }
                }
            },

            grade_scale: 
            {
                message: 'Grade Scale is not valid',
                validators: {
                    notEmpty: {
                        message: 'Grade Scale is required and cannot be empty'
                    },
                    stringLength: {
                        min: 1,
                        max: 4,
                        message: 'Grade Scale can be maximum 4 digit long'
                    },
                    regexp: {
                        regexp: /^[0-9.]+$/,
                        message: 'Grade Scale can only consist of numeric data'
                    }
                }
            },

            result_achieved_grade: 
            {
                message: 'Result Achieved is not valid',
                validators: {
                    notEmpty: {
                        message: 'Result Achieved is required and cannot be empty'
                    },
                    stringLength: {
                        min: 1,
                        max: 4,
                        message: 'Result Achieved can be maximum 4 digit long'
                    },
                    regexp: {
                        regexp: /^[0-9.]+$/,
                        message: 'Result Achieved can only consist of numeric data'
                    }
                }
            },

            result_achieved_div_class: 
            {
                message: 'Result Achieved is not valid',
                validators: {
                    notEmpty: {
                        message: 'Result Achieved is required and cannot be empty'
                    },
                    stringLength: {
                        min: 1,
                        max: 3,
                        message: 'Result Achieved can be maximum 3 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9]+$/,
                        message: 'Result Achieved can only consist of alphanumeric data'
                    }
                }
            },

            duration: 
            {
                message: 'Duration is not valid',
                validators: {
                    notEmpty: {
                        message: 'Duration is required and cannot be empty'
                    },
                    stringLength: {
                        min: 1,
                        max: 5,
                        message: 'Duration can be maximum 5 digit long'
                    },
                    regexp: {
                        regexp: /^[0-9.]+$/,
                        message: 'Duration can only consist of numeric data'
                    }
                }
            },

            passing_year: 
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