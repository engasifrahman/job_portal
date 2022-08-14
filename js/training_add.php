<?php
	session_start();
	require_once('../dbconfig.php');
	global $con;

	$js_id = $_SESSION['js_info']['id'];

	$training_type = $_POST['training_type'];
	$training_title = $_POST['training_title'];
	$institution = $_POST['institution'];
	$training_duration = $_POST['training_duration'];
	$start_date = $_POST['start_date'];
	$end_date = $_POST['end_date'];
	if (!empty($_POST['certification']))
	{
		$certification = $_POST['certification'];
	}
	else
	{
		$certification = NULL;
	}
	
	$training_description = $_POST['training_description'];

	if(!empty($training_type) && !empty($training_title) && !empty($institution) && !empty($training_duration) && !empty($start_date) && !empty($end_date) && !empty($certification))
	{

		$query = "INSERT INTO training_workshop (js_id, training_type, training_title, institution, training_duration, start_date, end_date, certification, training_description) VALUES ('$js_id', '$training_type', '$training_title', '$institution', '$training_duration', '$start_date', '$end_date', '$certification', '$training_description')";

		if (!$result = mysqli_query($con, $query))
		{
	        exit(mysqli_error($con));
	    }
	    else
	    {
	    	?>
	    	
	    	<script type="text/javascript">
	    		$('#training_add_content').slideUp(400); //this is actually hide
                $('#training_view_content').slideDown(400); //this is actually show
                $('#training_add').show();
                $('#training').show();
                $('#training_with_add_icon').hide();
                $('#training_edit_add_cancel').hide();
                $('#training_add_form').trigger("reset");

                $.post("vtrain", function(data) {
                    $("#training_view_content").html(data);
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