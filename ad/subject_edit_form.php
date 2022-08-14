<?php
    session_start();
	require_once('../dbconfig.php');
	global $con;

	$id = $_POST['id'];

	if(empty($id))
	{
		?>
			<div class="center">No records found under this selection <a href="#" onclick="$('#subject_edit_content').hide();$('.subject_add').show();">HIDE THIS</a>
			</div>
		<?php
		die();
	}

	$query = "SELECT subject FROM preparation_sub where id='$id'";
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
                <form id="subject_edit_form" class="form" method="post" action="" >
                    <div class="form-body">

                        <div class="row">

                            <div class="col-md-12 col-sm-12 pl-2 pr-2 pt-3 pb-3">
                                <div class="form-group label-floating">
                                    <label class="control-label">Subject<strong class="text-danger">*</strong></label>
                                    <input type="text" id="subject" name="subject" value="<?php echo $row['subject']; ?>" class="form-control form-control-success form-control-danger" required>
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
                        <button type="reset" class="btn btn-outline-warning mr-1" onclick="$('#subject_edit_content').slideUp(400);$('#subject_view_content').slideDown(400);$('#subject_add').show();$('#subject').show();$('#subject_with_edit_icon').hide();$('#subject_edit_add_cancel').hide();">
                            <i class="icon-cross2"></i> Cancel
                        </button>
                       
                        <button type="submit" class="btn btn-outline-primary" id="<?php echo $id; ?>" name="subject_update">
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
        ?>
        <script type="text/javascript">
            $.notify({
                // where to append the toast notification
                wrapper: 'body',

                // toast message
                message: 'Something went wrong please refresh your web page',

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
                duration: 3000
              
            });
        </script>
        <?php
    }
?>

<script type="text/javascript">

    //############################### BEGIN UPDATE ##############################//
    $('button[name="subject_update"]').click(function(e){

        var sub_id = $(this).attr('id');
        var action = 'Update';

        $.ajax({
            type: 'post',
            url: 'update_subject',   // here your php file to do something with postdata
            data: $('#subject_edit_form').serialize() + "&sub_id=" + sub_id + "&action=" + action, // here you set the data to send to php file
            beforeSend: function() {
                $('#subject_notification_content').show().fadeOut(6100).html('<div class="text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">OPERATION IS RUNNING PLEASE WAIT..</div>');
            },
            success: function (data) {
              $('#subject_notification_content').show().fadeOut(6100).html(data);
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

    //############################# BEGIN Form Validation ###########################//
    $('#subject_edit_form').bootstrapValidator({

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
                        min: 1,
                        max: 200,
                        message: 'Subject must be maximum 200 characters long'
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