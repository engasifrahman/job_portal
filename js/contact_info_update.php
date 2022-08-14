<?php
	session_start();
	require_once('../dbconfig.php');
	global $con;

	$js_id = $_SESSION['js_info']['id'];

	$mobile_number = $_POST['mobile_number'];
	$phone_number = $_POST['phone_number'];
	$alternative_email = $_POST['alternative_email'];
	$present_address = $_POST['present_address'];
	$permanent_address = $_POST['permanent_address'];



	if(!empty($js_id) && !empty($mobile_number) && !empty($present_address) && !empty($permanent_address))
	{
		$query = "UPDATE job_seeker  SET mobile_number='$mobile_number', phone_number='$phone_number', alternative_email='$alternative_email', present_address='$present_address', permanent_address='$permanent_address' WHERE id='$js_id'";
		if (!$result = mysqli_query($con, $query)) {
	        exit(mysqli_error($con));
	    }
	    else
	    {
	    	?>

	    	<script type="text/javascript">
	    		$('#contact_info_edit_content').slideUp(400); //this is actually hide
                $('#contact_info_view_content').slideDown(400); //this is actually show
                $('.contact_info_edit').show();
                $('#contact_info').show();
                $('#contact_info_with_edit_icon').hide();
                $('#contact_info_edit_cancel').hide();

                $.post("vci", function(data) {
                    $("#contact_info_view_content").html(data);s
                });

                $.notify({

					// where to append the toast notification
					wrapper: 'body',

					// toast message
					message: 'New record updated successfully!',

					// success, info, error, warn
					type: 'success',

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

	}

	else
	{
		?>
		<script type="text/javascript">
			$.notify({

				// where to append the toast notification
				wrapper: 'body',

				// toast message
				message: 'Please fill up required field',

				// success, info, error, warn
				type: 'warn',

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
    	</script>
		<?php
	}