<?php

    require_once('../dbconfig.php');
    global $con;

    $query = "SELECT id, subject FROM preparation_sub WHERE action='Public' ORDER BY id ASC";

    if (!$result = mysqli_query($con, $query)) {
            exit(mysqli_error($con));
    }

?>
<style type="text/css">
    body, p, h1, h2, h3, h4, h5, h6 {
        width: 100% !important;
        font-family: 'Titillium Web', sans-serif !important;
        color: black !important;
        background-color: white !important;
    }

    h1, h2, h3, h4, h5, h6, p {
        padding: 5px 20px 0px 20px !important;
    }
</style>
<div class="card wizard-card" data-color="blue">
<!--        You can switch " data-color="rose" "  with one of the next bright colors: "blue", "green", "orange", "purple"        -->
    <form id="lesson_add_form" class="form" method="post" action="" >
        
        <div class="form-body">

            <div class="row">
                <div class="col-md-6 col-sm-6 pl-2 pr-2 pt-3">
                    <div class="form-group label-floating">
                        <label class="control-label">Select Subject<strong class="text-danger">*</strong></label>
                        <select id="sub_id" name="sub_id" class="demo-default form-control form-control-success form-control-danger" required>
                            <option value=""></option>
                        <?php
                            if (mysqli_num_rows($result) > 0)
                            {
                                while($data = mysqli_fetch_assoc($result))
                                {

                                ?>

                                  <option value="<?php echo $data['id']; ?>"><?php echo $data['subject']; ?></option>

                                <?php
                                }
                            }

                            else
                            {

                            ?>

                                <option value="">Subject List Empty (Add at least one subject first)</option>

                            <?php
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

                <div class="col-md-6 col-sm-6 pl-2 pr-2 pt-3">
                    <div class="form-group label-floating">
                        <label class="control-label">Lesson Title<strong class="text-danger">*</strong></label>
                        <input type="text" id="lesson_title" name="lesson_title" class="form-control form-control-success form-control-danger" required>
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
                <div class="col-md-12 col-sm-12 pl-2 pr-2 pb-2">
                    <div class="form-group label-floating">
                        <label><small>Lesson Content</small><strong class="text-danger">*</strong></label>
                        <textarea id="lesson_content" name="lesson_content" class="form-control form-control-success form-control-danger" required></textarea> 
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
            <button type="reset" class="btn btn-outline-warning mr-1" onclick="$('#lesson_add_content').slideUp(400);$('#lesson_view_content').slideDown(400);$('#lesson_add').show();$('#lesson').show();$('#lesson_with_add_icon').hide();$('#lesson_edit_add_cancel').hide();">
                <i class="icon-cross2"></i> Cancel
            </button>
           
            <button type="submit" class="btn btn-outline-primary" id="Insert" name="lesson_add">
                <i class="icon-check2"></i> Add
            </button>
         </div>

    </form>
</div>

 

<script type="text/javascript">

    $(function(){
      $('#lesson_content').froalaEditor({
          toolbarButtons: ['undo', 'redo', '|', 'bold', 'italic', 'underline', 'strikeThrough', 'subscript', 'superscript', '|', 'fontFamily', 'fontSize', 'lineHeight', 'paragraphFormat', 'clearFormatting', '|', 'color', '|', 'align', 'formatOL', 'formatUL', 'outdent', 'indent', '|', 'print', 'getPDF', 'fullscreen', 'insertHR', 'selectAll','insertLink', 'insertTable', '|', 'emoticons', 'fontAwesome', 'specialCharacters', 'html', 'help']
        })
    });

    //################################# BEGIN INSERT ################################//
    $('button[name="lesson_add"]').click(function (e){
        
        var action = $(this).attr('id');

        $.ajax({
            type: 'post',
            url: 'update_lesson',   // here your php file to do something with postdata
            data: $('#lesson_add_form').serialize() + "&action=" + action, // here you set the data to send to php file
            beforeSend: function() {
                $('#lesson_notification_content').show().fadeOut(6100).html('<div class="text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">OPERATION IS RUNNING PLEASE WAIT..</div>');
            },
            success: function (data) {
              $('#lesson_notification_content').show().html(data);
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
    $('#lesson_add_form').bootstrapValidator({

        fields:
        {

            subject: 
            {
                message: 'Subject is not valid',
                validators: {
                    notEmpty: {
                        message: 'Subject is required and cannot be empty'
                    },
                    stringLength: {
                        min: 0,
                        max: 200,
                        message: 'Subject can be maximum 200 characters long'
                    },
                    choice: {
                        min: 1,
                        max: 1,
                        message: 'Please choose one option only'
                    }
                }
            },

            lesson_title: 
            {
                message: 'Lesson title is not valid',
                validators: {
                    notEmpty: {
                        message: 'Lesson title is required and cannot be empty'
                    },
                    stringLength: {
                        min: 0,
                        max: 200,
                        message: 'Lesson title can be maximum 200 characters long'
                    }
                }
            },

            lesson_content: 
            {
                message: 'Lesson content is not valid',
                validators: {
                    notEmpty: {
                        message: 'Lesson content is required and cannot be empty'
                    },
                    stringLength: {
                        min: 0,
                        max: 10000,
                        message: 'Lesson content can be maximum 10000 characters long'
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