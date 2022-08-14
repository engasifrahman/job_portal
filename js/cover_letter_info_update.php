<?php
	session_start();
	require_once('../dbconfig.php');
	global $con;

	$js_id = $_SESSION['js_info']['id'];

	$position 		= $_POST['position'];
	$published_on 	= $_POST['published_on'];
	$to_director 	= $_POST['to_director'];
	$institution 	= $_POST['institution'];
	$contact_no 	= $_POST['contact_no'];
	$email 			= $_POST['email'];
	$address 		= $_POST['address'];


	if(!empty($js_id) && !empty($position) && !empty($published_on) && !empty($to_director) && !empty($institution) && !empty($contact_no) && !empty($email) && !empty($address))
	{
		$query = "UPDATE cover_letter_info SET position='$position', published_on='$published_on', to_director='$to_director', institution='$institution', contact_no='$contact_no', email='$email', address='$address' WHERE js_id='$js_id'";
		if (!$result = mysqli_query($con, $query)) {
	        exit(mysqli_error($con));
	    }
	    else
	    {
	    	?>

	    	<script type="text/javascript">
	    		$('#cover_letter_info_edit_content').slideUp(400); //this is actually hide
                $('#cover_letter_info_view_content').slideDown(400); //this is actually show
                $('.cover_letter_info_edit').show();
                $('#cover_letter_info').show();
                $('#cover_letter_info_with_edit_icon').hide();
                $('#cover_letter_info_edit_cancel').hide();

                /*$.notify({

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
					duration: 1500
				  
				});*/

				window.location.href = "tempcl";

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