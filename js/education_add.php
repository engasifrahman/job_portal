<?php
	session_start();
	require_once('../dbconfig.php');
	global $con;

	$js_id = $_SESSION['js_info']['id'];

	$degree_level = $_POST['degree_level'];
	$degree_title = $_POST['degree_title'];
	$major_subject = $_POST['major_subject'];
	$institution = $_POST['institution'];
	$result_system = $_POST['result_system'];
	$duration = $_POST['duration'];
	$passing_year = $_POST['passing_year'];


	if (!empty($_POST['grade_scale']))
	{
		$grade_scale = $_POST['grade_scale'];
	}
	else
	{
		$grade_scale =NULL;
	}

	if (!empty($_POST['result_achieved_grade'])) {
		
		$result_achieved = $_POST['result_achieved_grade'];
	}
	elseif ((!empty($_POST['result_achieved_div_class'])))
	{
		$result_achieved = $_POST['result_achieved_div_class'];
	}
	else
	{
		$result_achieved = NULL;
	}
		

	if(!empty($degree_level) && !empty($degree_title) && !empty($major_subject) && !empty($institution) && !empty($result_system) && !empty($result_achieved) && !empty($duration) && !empty($passing_year))
	{

		$query = "INSERT INTO education (js_id, degree_level, degree_title, major_subject, institution, result_system, grade_scale, result_achieved, duration,passing_year) VALUES ('$js_id','$degree_level', '$degree_title','$major_subject', '$institution','$result_system', '$grade_scale','$result_achieved', '$duration', '$passing_year')";

		if (!$result = mysqli_query($con, $query))
		{
	        exit(mysqli_error($con));
	    }
	    else
	    {
	    	?>
	    	
	    	<script type="text/javascript">
	    		$('#education_add_content').slideUp(400); //this is actually hide
                $('#education_view_content').slideDown(400); //this is actually show
                $('#education_add').show();
                $('#education').show();
                $('#education_with_add_icon').hide();
                $('#education_edit_add_cancel').hide();
                $('#education_add_form').trigger("reset");

                $.post("vedu", function(data) {
                    $("#education_view_content").html(data);
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