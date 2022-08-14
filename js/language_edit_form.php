<?php
    session_start();
	require_once('../dbconfig.php');
	global $con;

    $js_id = $_SESSION['js_info']['id'];

	$id = $_POST['id'];

	if(empty($id))
	{
		?>
			<div class="center">No records found under this selection <a href="#" onclick="$('#language_edit_content').hide();$('.language_add').show();">HIDE THIS</a>
			</div>
		<?php
		die();
	}

	$query = "SELECT * FROM language where js_id='$js_id' AND id='$id'";
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
                <form id="language_edit_form" class="form" method="post" action="" >
                    <div class="form-body">

                        <div class="row">

                            <p class="pb-1 text-info text-bold-700 text-xs-center text-sm-center text-md-center">Please fill out the <strong class="text-danger">*required</strong> fields</p>

                            <input type="hidden" id="id" name="id" value="<?php echo $row['id']; ?>" class="form-control form-control-success form-control-danger" >
                            
                            <div class="col-md-6 col-sm-6 pl-2 pr-2">
                                <div class="form-group label-floating">
                                    <label class="control-label">Language<strong class="text-danger">*</strong></label>
                                    <input type="text" id="language_edit" name="language_edit" value="<?php echo $row['language']; ?>" class="form-control form-control-success form-control-danger">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 pl-2 pr-2">
                                <div class="form-group label-floating">
                                    <label class="control-label">Reading <strong class="text-danger">*</strong></label>
                                    <select id="reading_edit" name="reading_edit" class="form-control form-control-success form-control-danger" required>
                                        <option value=""></option>
                                        <option value="High">High</option>
                                        <option value="Medium">Medium</option>
                                        <option value="Low">Low</option>
                                    </select>
                                </div>
                            </div>

                        </div>

                        <div class="row">

                            <div class="col-md-6 col-sm-6 pl-2 pr-2">
                                <div class="form-group label-floating">
                                    <label class="control-label">Writing<strong class="text-danger">*</strong></label>
                                    <select id="writing_edit" name="writing_edit" class="form-control form-control-success form-control-danger" required>
                                        <option value=""></option>
                                        <option value="High">High</option>
                                        <option value="Medium">Medium</option>
                                        <option value="Low">Low</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 pl-2 pr-2">
                                <div class="form-group label-floating">
                                    <label class="control-label">Speaking<strong class="text-danger">*</strong></label>
                                    <select id="speaking_edit" name="speaking_edit" class="form-control form-control-success form-control-danger" required>
                                        <option value=""></option>
                                        <option value="High">High</option>
                                        <option value="Medium">Medium</option>
                                        <option value="Low">Low</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="form-actions custom-form-action center">
                        <button type="reset" class="btn btn-outline-warning mr-1" onclick="$('#language_edit_content').slideUp(400);$('#language_view_content').slideDown(400);$('#language_add').show();$('#language').show();$('#language_with_edit_icon').hide();$('#language_edit_add_cancel').hide();">
                            <i class="icon-cross2"></i> Cancel
                        </button>
                       
                        <button type="submit" class="btn btn-outline-primary" name="language_update">
                            <i class="icon-check2"></i> Update
                        </button>
                     </div>

                </form>
            </div>
    	    <?php
            $reading=$row['reading'];
            $writing=$row['writing'];
            $speaking=$row['speaking'];
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
    $("#reading_edit").val('<?php echo $reading; ?>');
    $("#writing_edit").val('<?php echo $writing; ?>');
    $("#speaking_edit").val('<?php echo $speaking; ?>');

    //############################### BEGIN UPDATE ##############################//
    $('button[name="language_update"]').click(function(e){

        $.ajax({
            type: 'post',
            url: 'ulang',   // here your php file to do something with postdata
            data: $('#language_edit_form').serialize(), // here you set the data to send to php file
            beforeSend: function() {
                $('#language_notification_content').show().fadeOut(6100).html('<div class="text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">OPERATION IS RUNNING PLEASE WAIT..</div>');
            },
            success: function (data) {
              $('#language_notification_content').show().fadeOut(6100).html(data);
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
   $('#language_edit_form').bootstrapValidator({

        fields:
        {

            language_edit: 
            {
                message: 'Language is not valid',
                validators: {
                    notEmpty: {
                        message: 'Language is required and cannot be empty'
                    },
                    stringLength: {
                        min: 1,
                        max: 20,
                        message: 'Language must be maximum 20 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z]+$/,
                        message: 'Language can only consist of alphabetical'
                    }
                }
            },

            reading_edit: 
            {
                message: ' is not valid',
                validators: {
                    notEmpty: {
                        message: 'Reading is required and cannot be empty'
                    },
                    stringLength: {
                        min: 1,
                        max: 6,
                        message: 'Reading must be maximum 6 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z]+$/,
                        message: "Reading can only consist of alphabetical"
                    },
                    choice: {
                        min: 1,
                        max: 1,
                        message: "Don't try to be smart! You can choose maximum 1 option"
                    }
                }
            },

            writing_edit: 
            {
                message: 'Writing is not valid',
                validators: {
                     notEmpty: {
                        message: 'Writing is required and cannot be empty'
                    },
                    stringLength: {
                        min: 1,
                        max: 6,
                        message: 'Writing must be maximum 6 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z]+$/,
                        message: "Writing can only consist of alphabetical"
                    },
                    choice: {
                        min: 1,
                        max: 1,
                        message: "Don't try to be smart! You can choose maximum 1 option"
                    }
                }
            },

           speaking_edit: 
            {
                message: 'Speaking is not valid',
                validators: {
                     notEmpty: {
                        message: 'Speaking is required and cannot be empty'
                    },
                    stringLength: {
                        min: 1,
                        max: 6,
                        message: 'Speaking must be maximum 6 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z]+$/,
                        message: "Speaking can only consist of alphabetical"
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