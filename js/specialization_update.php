<?php
	session_start();
	require_once('../dbconfig.php');
	global $con;

	$js_id = $_SESSION['js_info']['id'];

	if (isset($_POST['specialized_skills']) && !empty($_POST['specialized_skills']))
	{
		$specialized_skills = $_POST['specialized_skills'];
		$specialized_skills=implode(', ',$specialized_skills);
	}
	else
	{
		$specialized_skills = NULL;
	}

	if (isset($_POST['extracurricular_activities']) && !empty($_POST['extracurricular_activities']))
	{
		$extracurricular_activities = $_POST['extracurricular_activities'];
	}
	else
	{
		$extracurricular_activities = NULL;
	}
	

	if(!empty($js_id) && !empty($specialized_skills))
	{

		$query = "UPDATE specialization SET specialized_skills='$specialized_skills', extracurricular_activities='$extracurricular_activities' WHERE js_id='$js_id'";

		if (!$result = mysqli_query($con, $query))
		{
	        exit(mysqli_error($con));
	    }
	    else
	    {
	    	?>
	    	
	    	<script type="text/javascript">
	    		$('#specialization_edit_content').slideUp(400); //this is actually hide
                $('#specialization_view_content').slideDown(400); //this is actually show
                $('.specialization_edit').show();
                $('#specialization').show();
                $('#specialization_with_edit_icon').hide();
                $('#specialization_edit_cancel').hide();

                $.post("vsp", function(data) {
                    $("#specialization_view_content").html(data);
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