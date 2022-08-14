<div class="card wizard-card" data-color="blue">
<!--        You can switch " data-color="rose" "  with one of the next bright colors: "blue", "green", "orange", "purple"        -->
    <form id="training_add_form" class="form" method="post" action="" >
        
        <div class="form-body">

            <div class="row">

                <p class="text-info text-bold-700 text-xs-center text-sm-center text-md-center">Please fill out the <strong class="text-danger">*required</strong> fields</p>

                <div class="col-md-6 col-sm-6 pl-2 pr-2">
                    <div class="form-group label-floating">
                        <label class="control-label">Training/Workshop Type<strong class="text-danger">*</strong></label>
                        <input type="text" id="training_type" name="training_type" class="form-control form-control-success form-control-danger" required>
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
                        <input type="text" id="training_title" name="training_title" class="form-control form-control-success form-control-danger" required>
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
                        <input type="text" id="institution" name="institution" class="form-control form-control-success form-control-danger" required>
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
                        <input type="text" id="training_duration" name="training_duration" class="form-control form-control-success form-control-danger" required>
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
                        <input type="date" id="start_date" name="start_date" class="form-control form-control-success form-control-danger" required>
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
                        <input type="date" id="end_date" name="end_date" class="form-control form-control-success form-control-danger" required>
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
                        <textarea id="training_description" name="training_description" class="form-control form-control-success form-control-danger"></textarea> 
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
                            <input type="radio" value="Yes" name="certification" class="custom-control-input" required>
                            <span class="custom-control-indicator"></span>
                            <span class="custom-control-description ml-0">Yes</span>
                        </label>

                        <label class="display-inline-block custom-control custom-radio ml-1">
                            <input type="radio" value="No" name="certification" class="custom-control-input" required>
                            <span class="custom-control-indicator"></span>
                            <span class="custom-control-description ml-0">No</span>
                        </label>
                        </div>
                    </div>
                </div>

            </div>

        </div>

        <div class="form-actions custom-form-action center">
            <button type="reset" class="btn btn-outline-warning mr-1" onclick="$('#training_add_content').slideUp(400);$('#training_view_content').slideDown(400);$('#training_add').show();$('#training').show();$('#training_with_add_icon').hide();$('#training_edit_add_cancel').hide();">
                <i class="icon-cross2"></i> Cancel
            </button>
           
            <button type="submit" class="btn btn-outline-primary" name="training_add">
                <i class="icon-check2"></i> Add
            </button>
         </div>

    </form>
</div>

<script type="text/javascript">

    //################################# BEGIN INSERT ################################//
    $('button[name="training_add"]').click(function (e){

        $.ajax({
            type: 'post',
            url: 'atrain',   // here your php file to do something with postdata
            data: $('#training_add_form').serialize(), // here you set the data to send to php file
            beforeSend: function() {
                $('#training_notification_content').show().fadeOut(6100).html('<div class="text-xs-center-center text-sm-center text-md-center text-lg-center text-xl-center">OPERATION IS RUNNING PLEASE WAIT..</div>');
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
    //################################## END INSERT #################################//
    
    //############################# BEGIN Form Validation ###########################//
    $('#training_add_form').bootstrapValidator({

        fields:
        {

            training_type: 
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

            training_title: 
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

            institution: 
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
                        message: 'Institute/Organization Name can only consist of alphabetical, number, back slash, space, dot, comma, ampersand(&), underscore, hyphen, & parentheses'
                    }
                }
            },

            training_duration: 
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

            start_date: 
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

            end_date: 
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

            certification: 
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

            training_description: 
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