<?php
	session_start();
	require_once('../dbconfig.php');
	global $con;

	$js_id = $_SESSION['js_info']['id'];

	if (isset($_POST['keywords']) && !empty($_POST['keywords']))
	{
		$keywords = $_POST['keywords'];
		$keywords=implode(', ',$keywords);
	}
	else
	{
		$keywords = NULL;
	}

	if (isset($_POST['job_categories']) && !empty($_POST['job_categories']))
	{
		$job_categories = $_POST['job_categories'];
		$job_categories=implode(', ',$job_categories);
	}
	else
	{
		$job_categories = NULL;
	}
	
	if (isset($_POST['job_location']) && !empty($_POST['job_location']))
	{
		$job_location = $_POST['job_location'];
		$job_location=implode(', ',$job_location);
	}
	else
	{
		$job_location = NULL;
	}

	if (isset($_POST['business']) && !empty($_POST['business']))
	{
		$business = $_POST['business'];
		$business=implode(', ',$business);
	}
	else
	{
		$business = NULL;
	}
	

	if(!empty($js_id) && !empty($job_categories))
	{

		$query = "UPDATE targeted_job SET keywords='$keywords', job_categories='$job_categories', job_location='$job_location', business='$business' WHERE js_id='$js_id'";

		if (!$result = mysqli_query($con, $query))
		{
	        exit(mysqli_error($con));
	    }
	    else
	    {
	    	?>
	    	
	    	<script type="text/javascript">
	    		$('#targeted_job_edit_content').slideUp(400); //this is actually hide
                $('#targeted_job_view_content').slideDown(400); //this is actually show
                $('.targeted_job_edit').show();
                $('#targeted_job').show();
                $('#targeted_job_with_edit_icon').hide();
                $('#targeted_job_edit_cancel').hide();

                $.post("vtj", function(data) {
                    $("#targeted_job_view_content").html(data);
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