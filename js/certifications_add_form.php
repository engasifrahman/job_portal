<div class="card wizard-card" data-color="blue">
<!--        You can switch " data-color="rose" "  with one of the next bright colors: "blue", "green", "orange", "purple"        -->
    <form id="certifications_add_form" class="form" method="post" action="" >
        
        <div class="form-body">

            <div class="row">

                <p class="pb-1 text-info text-bold-700 text-xs-center text-sm-center text-md-center">Please fill out the <strong class="text-danger">*required</strong> fields</p>

                <div class="col-md-12 col-sm-12 pl-2 pr-2">
                    <div class="form-group label-floating">
                        <label class="control-label">Certificate Name<strong class="text-danger">*</strong></label>
                        <input type="text" id="certificate_name" name="certificate_name" class="form-control form-control-success form-control-danger" required>
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
                        <label class="control-label">Exam Date<strong class="text-danger">*</strong></label>
                        <input type="date" id="exam_date" name="exam_date" class="form-control form-control-success form-control-danger" required>
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
                        <label class="control-label">Expire Date</label>
                        <input type="date" id="expire_date" name="expire_date" class="form-control form-control-success form-control-danger">
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
                        <label class="control-label">Score</label>
                        <input type="text" id="score" name="score" class="form-control form-control-success form-control-danger">
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
                        <label class="control-label">Score Scale</label>
                        <input type="text" id="score_scale" name="score_scale" class="form-control form-control-success form-control-danger">
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
            <button type="reset" class="btn btn-outline-warning mr-1" onclick="$('#certifications_add_content').slideUp(400);$('#certifications_view_content').slideDown(400);$('#certifications_add').show();$('#certifications').show();$('#certifications_with_add_icon').hide();$('#certifications_edit_add_cancel').hide();">
                <i class="icon-cross2"></i> Cancel
            </button>
           
            <button type="submit" class="btn btn-outline-primary" name="certifications_add">
                <i class="icon-check2"></i> Add
            </button>
         </div>

    </form>
</div>

<script type="text/javascript">

    //################################# BEGIN INSERT ################################//
    $('button[name="certifications_add"]').click(function (e){

        $.ajax({
            type: 'post',
            url: 'acerti',   // here your php file to do something with postdata
            data: $('#certifications_add_form').serialize(), // here you set the data to send to php file
            beforeSend: function() {
                $('#certifications_notification_content').show().fadeOut(6100).html('<div class="text-sm-center text-md-center text-lg-center text-xl-center">OPERATION IS RUNNING PLEASE WAIT..</div>');
            },
            success: function (data) {
              $('#certifications_notification_content').show().fadeOut(6100).html(data);
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
    $('#certifications_add_form').bootstrapValidator({

        fields:
        {

            certificate_name: 
            {
                message: 'Certificate Name is not valid',
                validators: {
                    notEmpty: {
                        message: 'Certificate Name is required and cannot be empty'
                    },
                    stringLength: {
                        min: 1,
                        max: 200,
                        message: 'Certificate Name must be maximum 200 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9#&(),._/ /-]+$/,
                        message: 'Certificate Name can only consist of alphabetical, number, back slash, space, dot, comma, ampersand(&), underscore, hyphen, & parentheses'
                    }
                }
            },

            exam_date: 
            {
                message: 'Exam Date is not valid',
                validators: {
                    notEmpty: {
                        message: 'Exam Date is required and cannot be empty'
                    },
                    date: {
                        format: 'YYYY/MM/DD',
                        message: 'Exam Date is not valid'
                    }
                }
            },

            expire_date: 
            {
                message: 'Expire Date is not valid',
                validators: {
                    date: {
                        format: 'YYYY/MM/DD',
                        message: 'Expire Date is not valid'
                    }
                }
            },

            score: 
            {
                message: 'Score is not valid',
                validators: {
                    stringLength: {
                        min: 1,
                        max: 4,
                        message: 'Score must be maximum 4 digits long'
                    },
                    regexp: {
                        regexp: /^[0-9.]+$/,
                        message: "Score can only consist of numeric data"
                    }
                }
            },
           score_scale: 
            {
                message: 'Score Scale is not valid',
                validators: {
                    stringLength: {
                        min: 1,
                        max: 4,
                        message: 'Score Scale must be maximum 4 digits long'
                    },
                    regexp: {
                        regexp: /^[0-9.]+$/,
                        message: "Score Scale can only consist of numeric data"
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