<?php
	session_start();
	require_once('../dbconfig.php');
	global $con;

	$js_id = $_SESSION['js_info']['id'];

	$ref_person_name = $_POST['ref_person_name'];
	$designation = $_POST['designation'];
	$organization_name = $_POST['organization_name'];
	$mobile = $_POST['mobile'];
	$land_phone = $_POST['land_phone'];
	$ref_email = $_POST['ref_email'];
	$relationship = $_POST['relationship'];

	if(!empty($ref_person_name) && !empty($designation) && !empty($organization_name) && !empty($mobile) && !empty($ref_email) && !empty($relationship))
	{

		$query = "INSERT INTO reference (js_id, ref_person_name, designation, organization_name, mobile, land_phone, ref_email, relationship) VALUES ('$js_id', '$ref_person_name', '$designation', '$organization_name', '$mobile', '$land_phone', '$ref_email', '$relationship')";

		if (!$result = mysqli_query($con, $query))
		{
	        exit(mysqli_error($con));
	    }
	    else
	    {
	    	?>
	    	
	    	<script type="text/javascript">
	    		$('#reference_add_content').slideUp(400); //this is actually hide
                $('#reference_view_content').slideDown(400); //this is actually show
                $('#reference_add').show();
                $('#reference').show();
                $('#reference_with_add_icon').hide();
                $('#reference_edit_add_cancel').hide();
                $('#reference_add_form').trigger("reset");

                $.post("vref", function(data) {
                    $("#reference_view_content").html(data);
                });
                
                $.notify({

					// where to append the toast notification
					wrapper: 'body',

					// toast message
					message: 'New record inserted successfully!',

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