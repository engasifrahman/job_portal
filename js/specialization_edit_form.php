<?php
	require_once('../dbconfig.php');
	global $con;

	$js_id = $_POST['js_id'];

	if(empty($js_id))
	{
		?>
			<div class="center">No records found under this selection <a href="#" onclick="$('#specialization_edit_content').hide();$('.specialization_edit').show();">Hide this</a>
			</div>
		<?php
		die();
	}

	$query = "SELECT specialized_skills,extracurricular_activities FROM specialization where js_id='$js_id'";
	if (!$result = mysqli_query($con, $query)) {
	        exit(mysqli_error($con));
	}

	while($row = mysqli_fetch_assoc($result))
	{
		?>
         <div class="card wizard-card" data-color="blue">
        <!--        You can switch " data-color="rose" "  with one of the next bright colors: "blue", "green", "orange", "purple"        -->
            <form id="specialization_edit_form" class="form" method="post" action="" >
                <div class="form-body">

                    <div class="row">
                        <p class="pb-1 text-info text-bold-700 text-xs-center text-sm-center text-md-center">Please fill out the <strong class="text-danger">*required</strong> fields</p>
                        <div class="col-md-6 col-sm-6 pl-2 pr-2">
                            <div class="form-group label-floating height-adjust">
                                <label class="control-label">Specialized skills <strong class="text-danger">*</strong><span style="font-size: 11px; color:#E08E0B ">(You can add maximum 50 skills manually)</span> </label>
                                <input type="text" id="specialized_skills" name="specialized_skills[]" value="<?php echo $row['specialized_skills']; ?>" class="form-control form-control-success form-control-danger" multiple required>

                                <span style="font-size: 11px; color:#E08E0B ">Specialized skills like: Excel, Photoshop, Web Development, Communication, Presentation etc.</span>
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
                                <label class="control-label">Extracurricular Activities</label>
                                <textarea rows="6" id="extracurricular_activities" name="extracurricular_activities" class="form-control form-control-success form-control-danger"><?php echo $row['extracurricular_activities']; ?></textarea>
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
                    <button type="button" class="btn btn-outline-warning mr-1" onclick="$('#specialization_edit_content').slideUp(400);$('#specialization_view_content').slideDown(400);$('.specialization_edit').show();$('#specialization').show();$('#specialization_with_edit_icon').hide();$('#specialization_edit_cancel').hide();">
                        <i class="icon-cross2"></i> Cancel
                    </button>
                   
                    <button type="submit" class="btn btn-outline-primary" name="specialization_update">
                        <i class="icon-check2"></i> Save
                    </button>
                 </div>

            </form>
        </div>
	<?php
	}
?>

<script type="text/javascript">

    //############################# BEGIN UPDATE ############################//
    $('button[name="specialization_update"]').click(function(e){

        $.ajax({
            type: 'post',
            url: 'usp',   // here your php file to do something with postdata
            data: $('#specialization_edit_form').serialize(), // here you set the data to send to php file
            beforeSend: function() {
                $('#specialization_notification_content').show().fadeOut(6100).html('<div class="text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">OPERATION IS RUNNING PLEASE WAIT..</div>');
            },
            success: function (data) {
              $('#specialization_notification_content').show().fadeOut(6100).html(data);
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

        //e.stopImmediatePropagation();
        e.preventDefault();

    });
    //############################### END UPDATE ##############################//

    //######################### BEGIN Form Validation #######################//
    var REG=/^[a-z\d\-+#%._()/&*\s]+$/i;
    $('#specialized_skills').selectize({
        plugins: ['remove_button','drag_drop'],
        maxItems:50,
        persist: false,
        create: true,
        createFilter:REG,
        render: {
            item: function(data, escape) {
                return '<div>' + escape(data.text) + '</div>';
            }
        }
    });

    $('#specialization_edit_form').bootstrapValidator({

        fields:
        {

            extracurricular_activities: 
            {
                message: 'Extracurricular activities is not valid',
                validators: {
                    stringLength: {
                        min: 0,
                        max: 500,
                        message: 'Extracurricular activities must be maximum 500 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9#%,._()+/ \-\n]+$/,
                        message: 'Extracurricular activities can only consist of alphabetical, digits, comma, dot, hash, percentage, underscore, parentheses, plus sign(+), hyphen back slash space & line break (new line)'
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