<?php
	session_start();
	require_once('../dbconfig.php');
	global $con;

	$js_id = $_SESSION['js_info']['id'];

	$id = $_POST['id'];
	$ref_person_name = $_POST['ref_person_name_edit'];
	$designation = $_POST['designation_edit'];
	$organization_name = $_POST['organization_name_edit'];
	$mobile = $_POST['mobile_edit'];
	$land_phone = $_POST['land_phone_edit'];
	$ref_email = $_POST['ref_email_edit'];
	$relationship = $_POST['relationship_edit'];

	if(!empty($ref_person_name) && !empty($designation) && !empty($organization_name) && !empty($mobile) && !empty($ref_email) && !empty($relationship))
	{

		$query = "UPDATE reference SET ref_person_name='$ref_person_name', designation='$designation', organization_name='$organization_name', mobile='$mobile', land_phone='$land_phone', ref_email='$ref_email', relationship='$relationship' WHERE js_id='$js_id' AND id=$id";

		if (!$result = mysqli_query($con, $query))
		{
	        exit(mysqli_error($con));
	    }
	    else
	    {
	    	?>
	    	
	    	<script type="text/javascript">
	    		$('#reference_edit_content').slideUp(400); //this is actually hide
                $('#reference_view_content').slideDown(400); //this is actually show
                $('#reference_add').show();
                $('#reference').show();
                $('#reference_with_edit_icon').hide();
                $('#reference_edit_add_cancel').hide();

                $.post("vref", function(data) {
                    $("#reference_view_content").html(data);
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