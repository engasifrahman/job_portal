<?php
	session_start();
	require_once('../dbconfig.php');
	global $con;

	$js_id = $_SESSION['js_info']['id'];

	$id = $_POST['id'];
	$degree_level = $_POST['degree_level_edit'];
	$degree_title = $_POST['degree_title_edit'];
	$major_subject = $_POST['major_subject_edit'];
	$institution = $_POST['institution_edit'];
	$result_system = $_POST['result_system_edit'];
	$duration = $_POST['duration_edit'];
	$passing_year = $_POST['passing_year_edit'];


	if (!empty($_POST['grade_scale_edit']))
	{
		$grade_scale = $_POST['grade_scale_edit'];
	}
	else
	{
		$grade_scale =NULL;
	}

	if (!empty($_POST['result_achieved_grade_edit'])) {
		
		$result_achieved = $_POST['result_achieved_grade_edit'];
	}
	elseif ((!empty($_POST['result_achieved_div_class_edit'])))
	{
		$result_achieved = $_POST['result_achieved_div_class_edit'];
	}
	else
	{
		$result_achieved = NULL;
	}
		

	if(!empty($degree_level) && !empty($degree_title) && !empty($major_subject) && !empty($institution) && !empty($result_system) && !empty($result_achieved) && !empty($duration) && !empty($passing_year))
	{

		$query = "UPDATE education SET degree_level='$degree_level', degree_title='$degree_title', major_subject='$major_subject', institution='$institution', result_system='$result_system', grade_scale='$grade_scale', result_achieved='$result_achieved', duration='$duration',passing_year='$passing_year' WHERE js_id='$js_id' AND id=$id";

		if (!$result = mysqli_query($con, $query))
		{
	        exit(mysqli_error($con));
	    }
	    else
	    {
	    	?>
	    	
	    	<script type="text/javascript">
	    		$('#education_edit_content').slideUp(400); //this is actually hide
                $('#education_view_content').slideDown(400); //this is actually show
                $('#education_add').show();
                $('#education').show();
                $('#education_with_edit_icon').hide();
                $('#education_edit_add_cancel').hide();

                $.post("vedu", function(data) {
                    $("#education_view_content").html(data);
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