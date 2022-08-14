<?php

	require_once('../dbconfig.php');
	global $con;
	$js_id = $_POST['js_id'];

	if(empty($js_id))
	{
		?>
			<div class="center">No records found under this selection <a href="#" onclick="$('#targeted_job_edit_content').hide();$('.targeted_job_edit').show();">Hide this</a>
			</div>
		<?php
		die();
	}

	$query = "SELECT * FROM targeted_job where js_id='$js_id'";
	if (!$result = mysqli_query($con, $query)) {
	        exit(mysqli_error($con));
	}

    $query2 = "SELECT * FROM data_job_category";
    if (!$result2 = mysqli_query($con, $query2)) {
            exit(mysqli_error($con));
    }

    $query3 = "SELECT * FROM data_job_location";
    if (!$result3 = mysqli_query($con, $query3)) {
            exit(mysqli_error($con));
    }

    $query4 = "SELECT * FROM data_business_category";
    if (!$result4 = mysqli_query($con, $query4)) {
            exit(mysqli_error($con));
    }

	while($row = mysqli_fetch_assoc($result))
	{
        $job_categories=explode(', ', $row['job_categories']);
        $job_location=explode(', ', $row['job_location']);
        $business=explode(', ', $row['business']);
		?>
        <div class="card wizard-card" data-color="blue">
        <!--        You can switch " data-color="rose" "  with one of the next bright colors: "blue", "green", "orange", "purple"        -->
            <form id="targeted_job_edit_form" class="form" method="post" action="" >
                
                <div class="row">
                    <p class="pb-1 text-info text-bold-700 text-xs-center text-sm-center text-md-center">Please fill out the <strong class="text-danger">*required</strong> fields</p>
                    <div class="col-md-6 col-sm-6 pl-2 pr-2">
                        <div class="form-group label-floating">
                            <label class="control-label">Keywords <span style="font-size: 11px; color:#E08E0B ">(You can add maximum 25 kwywords manually)</span> </label>
                            <input type="text" id="keywords" name="keywords[]" value="<?php echo $row['keywords']; ?>" class="form-control form-control-success form-control-danger" multiple>
                            <span style="font-size: 11px; color:#E08E0B ">Keywords like; MBA, CSE, PHP, Marketing, Media, ACCA etc.</span>
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
                            <label class="control-label">Preferred Job Categories<strong class="text-danger">*</strong> <span style="font-size: 11px; color:#E08E0B ">(You can add maximum 10 job categories)</span> </label>
                            <select id="job_categories" name="job_categories[]" class="demo-default form-control form-control-success form-control-danger" multiple required>
                            <?php
                                if (mysqli_num_rows($result2) > 0)
                                {
                                    while($data2 = mysqli_fetch_assoc($result2))
                                    {

                                    ?>

                                      <option value="<?php echo $data2['category_name']; ?>" <?php if(in_array($data2['category_name'],$job_categories)){
                                        echo "selected"; } ?> > <?php echo $data2['category_name']; ?></option>

                                    <?php
                                    }
                                }

                                else
                                {

                                ?>

                                    <option>SORRY! Job Caterory Not Available Right Now</option>

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
                </div>

                <div class="row mt-1">
                    <div class="col-md-6 col-sm-6 pl-2 pr-2">
                        <div class="form-group label-floating height-adjust">
                            <label class="control-label">Preferred Job Location <span style="font-size: 11px; color:#E08E0B ">(You can add maximum 25 job location)</span> </label>
                            <select id="job_location" name="job_location[]" class="form-control form-control-success form-control-danger" multiple>

                            <?php
                                if (mysqli_num_rows($result3) > 0)
                                {
                                    while($data3 = mysqli_fetch_assoc($result3))
                                    {

                                    ?>

                                      <option value="<?php echo $data3['location_name']; ?>" <?php if(in_array($data3['location_name'],$job_location)){
                                        echo "selected"; } ?> > <?php echo $data3['location_name']; ?></option>

                                    <?php
                                    }
                                }

                                else
                                {

                                ?>

                                    <option>SORRY! Business category Not Available Right Now</option>

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
                    <div class="col-md-6 col-sm-6 pl-2 pr-2 height-adjust">
                        <div class="form-group label-floating">
                            <label class="control-label">Preferred Business <span style="font-size: 11px; color:#E08E0B ">(You can add maximum 25 business categories)</span> </label>
                            <select id="business" name="business[]" class="form-control form-control-success form-control-danger" multiple>

                              <?php
                                if (mysqli_num_rows($result4) > 0)
                                {
                                    while($data4 = mysqli_fetch_assoc($result4))
                                    {

                                    ?>

                                      <option value="<?php echo $data4['category_name']; ?>" <?php if(in_array($data4['category_name'],$business)){
                                        echo "selected"; } ?> > <?php echo $data4['category_name']; ?></option>

                                    <?php
                                    }
                                }
                                
                                else
                                {

                                ?>

                                    <option>SORRY! Job Location Not Available Right Now</option>

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
                </div>
                
                <div class="form-actions custom-form-action center">
                    <button type="button" class="btn btn-outline-warning mr-1" onclick="$('#targeted_job_edit_content').slideUp(400);$('#targeted_job_view_content').slideDown(400);$('.targeted_job_edit').show();$('#targeted_job').show();$('#targeted_job_with_edit_icon').hide();$('#targeted_job_edit_cancel').hide();">
                        <i class="icon-cross2"></i> Cancel
                    </button>
                   
                    <button type="submit" class="btn btn-outline-primary" name="targeted_job_update">
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
    $('button[name="targeted_job_update"]').click(function(e){

        $.ajax({
            type: 'post',
            url: 'utj',   // here your php file to do something with postdata
            data: $('#targeted_job_edit_form').serialize(), // here you set the data to send to php file
            beforeSend: function() {
                $('#targeted_job_notification_content').show().fadeOut(6100).html('<div class="text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">OPERATION IS RUNNING PLEASE WAIT..</div>');
            },
            success: function (data) {
              $('#targeted_job_notification_content').show().fadeOut(6100).html(data);
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

    //########################## BEGIN Form Validation ########################//
    var REG=/^[a-z\d\-_()/&*\s]+$/i;
    $('#keywords').selectize({
        plugins: ['remove_button','drag_drop'],
        maxItems:25,
        persist: false,
        create: true,
        createFilter:REG,
        render: {
            item: function(data, escape) {
                return '<div>' + escape(data.text) + '</div>';
            }
        }
    });

    $('#job_categories').selectize({
        plugins: ['drag_drop'],
        maxItems:10,
        persist: true,
        create: false,
        createFilter:REG,
        render: {
            item: function(data, escape) {
                return '<div>' + escape(data.text) + '</div>';
            }
        }
    });

    $('#job_location').selectize({
        plugins: ['drag_drop'],
        maxItems:25,
        persist: true,
        create: false,
        createFilter:REG,
        render: {
            item: function(data, escape) {
                return '<div>' + escape(data.text) + '</div>';
            }
        }
    });

    $('#business').selectize({
        plugins: ['drag_drop'],
        maxItems:25,
        persist: true,
        create: false,
        createFilter:REG,
        render: {
            item: function(data, escape) {
                return '<div>' + escape(data.text) + '</div>';
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