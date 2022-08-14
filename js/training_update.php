<?php
	session_start();
	require_once('../dbconfig.php');
	global $con;

	$js_id = $_SESSION['js_info']['id'];

	$id = $_POST['id'];
	$training_type = $_POST['training_type_edit'];
	$training_title = $_POST['training_title_edit'];
	$institution = $_POST['institution_edit'];
	$training_duration = $_POST['training_duration_edit'];
	$start_date = $_POST['start_date_edit'];
	$end_date = $_POST['end_date_edit'];
	$certification = $_POST['certification_edit'];
	$training_description = $_POST['training_description_edit'];

	if(!empty($training_type) && !empty($training_title) && !empty($institution) && !empty($training_duration) && !empty($start_date) && !empty($end_date) && !empty($certification))
	{

		$query = "UPDATE training_workshop SET training_type='$training_type', training_title='$training_title', institution='$institution', training_duration='$training_duration', start_date='$start_date', end_date='$end_date', certification='$certification', training_description='$training_description' WHERE js_id='$js_id' AND id=$id";

		if (!$result = mysqli_query($con, $query))
		{
	        exit(mysqli_error($con));
	    }
	    else
	    {
	    	?>
	    	
	    	<script type="text/javascript">
	    		$('#training_edit_content').slideUp(400); //this is actually hide
                $('#training_view_content').slideDown(400); //this is actually show
                $('#training_add').show();
                $('#training').show();
                $('#training_with_edit_icon').hide();
                $('#training_edit_add_cancel').hide();

                $.post("vtrain", function(data) {
                    $("#training_view_content").html(data);
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