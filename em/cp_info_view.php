<?php
	session_start();
	require_once('../dbconfig.php');
	global $con;

	$em_id=$_SESSION['em_info']['id'];

	$query = "SELECT * FROM em_contact_person WHERE em_id='$em_id'";

	if (!$result = mysqli_query($con, $query)) {
	        exit(mysqli_error($con));
	}

	while($row = mysqli_fetch_assoc($result))
	{

		echo
		'
			<div class="form-group pt-1">

				<div class="col-xs-5 col-sm-4 col-md-3 text-xs-right text-sm-right text-md-right text-lg-right text-xl-right mobile-device"><strong class="info">Name :&nbsp</strong></div>
				<div class="col-xs-7 col-sm-7 col-md-8 text-justify mobile-device">'.$row['full_name'].'</div>
				<div class="clearfix pb-1"></div>

				<div class="col-xs-5 col-sm-4 col-md-3 text-xs-right text-sm-right text-md-right text-lg-right text-xl-right mobile-device"><strong class="info">Gender :&nbsp</strong></div>
				<div class="col-xs-7 col-sm-7 col-md-8 text-justify mobile-device">'.$row['gender'].'</div>
				<div class="clearfix pb-1"></div>

				<div class="col-xs-5 col-sm-4 col-md-3 text-xs-right text-sm-right text-md-right text-lg-right text-xl-right mobile-device"><strong class="info">Designation :&nbsp</strong></div>
				<div class="col-xs-7 col-sm-7 col-md-8 text-justify mobile-device">'.$row['designation'].'</div>
				<div class="clearfix pb-1"></div>

				<div class="col-xs-5 col-sm-4 col-md-3 text-xs-right text-sm-right text-md-right text-lg-right text-xl-right mobile-device"><strong class="info">Department :&nbsp</strong></div>
				<div class="col-xs-7 col-sm-7 col-md-8 text-justify mobile-device">'.$row['department'].'</div>
				<div class="clearfix pb-1"></div>

				<div class="col-xs-5 col-sm-4 col-md-3 text-xs-right text-sm-right text-md-right text-lg-right text-xl-right mobile-device"><strong class="info">Mobile No :&nbsp</strong></div>
				<div class="col-xs-7 col-sm-7 col-md-8 text-justify mobile-device">'.$row['mobile_no'].'</div>
				<div class="clearfix pb-1"></div>

				<div class="col-xs-5 col-sm-4 col-md-3 text-xs-right text-sm-right text-md-right text-lg-right text-xl-right mobile-device"><strong class="info">Phone No :&nbsp</strong></div>
				<div class="col-xs-7 col-sm-7 col-md-8 text-justify mobile-device">'.$row['phone_no'].'</div>
				<div class="clearfix pb-1"></div>
				
				<div class="col-xs-5 col-sm-4 col-md-3 text-xs-right text-sm-right text-md-right text-lg-right text-xl-right mobile-device"><strong class="info">Email :&nbsp</strong></div>
				<div class="col-xs-7 col-sm-7 col-md-8 text-justify mobile-device">'.$row['email'].'</div>
				<div class="clearfix pb-1"></div>

				<div class="col-xs-5 col-sm-4 col-md-3 text-xs-right text-sm-right text-md-right text-lg-right text-xl-right mobile-device"><strong class="info">Address :&nbsp</strong></div>
				<div class="col-xs-7 col-sm-7 col-md-8 text-justify mobile-device">'.$row['address'].'</div>
				<div class="clearfix pb-1"></div>

			</div>
		';
		
	}
	
?>

<script type="text/javascript">

	//############################# BEGIN EDIT ##############################//
	$('.cp_info_edit').click(function() {
		var em_id = $(this).attr('id');

		$('.cp_info_edit').hide();
		$('#cp_info').hide();
		$('#cp_info_with_edit_icon').show();
		$('#cp_info_edit_cancel').show();

		$.ajax({
		    url : 'ecpi',
		    type: 'POST',
		    data : { em_id: em_id },
		    beforeSend: function() {
                $('#cp_info_notification_content').show().fadeOut(6100).html('<div class="text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">LOADING...</div>');
            },
		    success: function(data)
		    {
	    		$("#cp_info_edit_content").html(data);

	    		$('#cp_info_view_content').slideUp(400);  //this is actually hide
	    		$('#cp_info_edit_content').slideDown(400); //this is actually show
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
	});
	//############################# END EDIT ##############################//

</script>