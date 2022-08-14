<?php
	session_start();
	require_once('../dbconfig.php');
	global $con;

	$js_id = $_SESSION['js_info']['id'];

	$objective = $_POST['objective'];
	$summary = $_POST['summary'];

	if (isset($_POST['present_salary']) && !empty($_POST['present_salary']))
	{
		$present_salary = $_POST['present_salary'];
	}
	else
	{
		$present_salary = NULL;
	}

	$expected_salary = $_POST['expected_salary'];

	if (isset($_POST['job_level']) && !empty($_POST['job_level']))
	{
		$job_level = $_POST['job_level'];
		$job_level=implode(', ',$job_level);
	}
	else
	{
		$job_level = NULL;
	}
	
	if (isset($_POST['job_nature']) && !empty($_POST['job_nature']))
	{
		$job_nature = $_POST['job_nature'];
		$job_nature=implode(', ',$job_nature);
	}
	else
	{
		$job_nature = NULL;
	}
	

	if(!empty($js_id) && !empty($objective) && !empty($expected_salary) && !empty($job_level) && !empty($job_nature))
	{

		$query = "UPDATE career_info SET objective='$objective', summary='$summary', present_salary='$present_salary', expected_salary='$expected_salary', job_level='$job_level', job_nature='$job_nature' WHERE js_id='$js_id'";

		if (!$result = mysqli_query($con, $query))
		{
	        exit(mysqli_error($con));
	    }
	    else
	    {
	    	?>
	    	
	    	<script type="text/javascript">
	    		$('#career_info_edit_content').slideUp(400); //this is actually hide
                $('#career_info_view_content').slideDown(400); //this is actually show
                $('.career_info_edit').show();
                $('#career_info').show();
                $('#career_info_with_edit_icon').hide();
                $('#career_info_edit_cancel').hide();

                $.post("vcri", function(data) {
                    $("#career_info_view_content").html(data);
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