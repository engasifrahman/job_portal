<?php
	session_start();
	require_once('../dbconfig.php');
	global $con;

	$js_id = $_SESSION['js_info']['id'];

	$id = $_POST['id'];
	$organization_name = $_POST['organization_name_edit'];
	$organization_website = $_POST['organization_website_edit'];
	$position_title = $_POST['position_title_edit'];
	$position_level = $_POST['position_level_edit'];
	$type_of_employment = $_POST['type_of_employment_edit'];
	$department = $_POST['department_edit'];
	$join_date = $_POST['join_date_edit'];

	if (!empty($_POST['resign_date_edit'])) {
		
		$resign_date = $_POST['resign_date_edit'];
	}
	elseif ((!empty($_POST['resign_date_continue_edit'])))
	{
		$resign_date = $_POST['resign_date_continue_edit'];
	}
	else
	{
		$resign_date = NULL;
	}

	$responsibility_and_achivement = $_POST['responsibility_and_achivement_edit'];
	$ref_name = $_POST['ref_name_edit'];
	$ref_position_dept = $_POST['ref_position_dept_edit'];
	$ref_contact_no = $_POST['ref_contact_no_edit'];
	$ref_email = $_POST['ref_email_edit'];

	if (!empty($join_date) && !empty($resign_date) && $resign_date=='continue')
	{
		$current_date=date('Y-m-d');
		$date1 = new DateTime("$join_date");
		$date2 = new DateTime("$current_date");
		$interval = $date1->diff($date2);
		//echo "difference " . $interval->y . " years, " . $interval->m." months, ".$interval->d." days "; 

		// shows the total amount of days (not divided into years, months and days like above)
		//echo "difference " . $interval->days . " days ";
		//echo "<br> Year & Month ".$interval->y.".". $interval->m;
		$years_of_exp=$interval->y.".". $interval->m;
		if ($interval->d>15)
		{
			$years_of_exp+=.1;
		}
	}
	elseif (!empty($join_date) && !empty($resign_date))
	{
		$date1 = new DateTime("$join_date");
		$date2 = new DateTime("$resign_date");
		$interval = $date1->diff($date2);
		//echo "difference " . $interval->y . " years, " . $interval->m." months, ".$interval->d." days "; 

		// shows the total amount of days (not divided into years, months and days like above)
		//echo "difference " . $interval->days . " days ";
		//echo "<br> Year & Month ".$interval->y.".". $interval->m;
		$years_of_exp=$interval->y.".". $interval->m;
		if ($interval->d>15)
		{
			$years_of_exp+=.1;
		}
	}

	if(!empty($organization_name) && !empty($position_title) && !empty($position_level) && !empty($type_of_employment) && !empty($department) && !empty($join_date) && !empty($resign_date) && !empty($years_of_exp))
	{

		$query = "UPDATE work_experience SET organization_name='$organization_name', organization_website='$organization_website', position_title='$position_title', position_level='$position_level', type_of_employment='$type_of_employment', department='$department', join_date='$join_date', resign_date='$resign_date', years_of_exp='$years_of_exp', responsibility_and_achivement='$responsibility_and_achivement', ref_name='$ref_name', ref_position_dept='$ref_position_dept', ref_contact_no='$ref_contact_no', ref_email='$ref_email' WHERE js_id='$js_id' AND id=$id";

		if (!$result = mysqli_query($con, $query))
		{
	        exit(mysqli_error($con));
	    }
	    else
	    {
	    	?>
	    	
	    	<script type="text/javascript">
	    		$('#work_exp_edit_content').slideUp(400); //this is actually hide
                $('#work_exp_view_content').slideDown(400); //this is actually show
                $('#work_exp_add').show();
                $('#work_exp').show();
                $('#work_exp_with_edit_icon').hide();
                $('#work_exp_edit_add_cancel').hide();

                $.post("vwe", function(data) {
                    $("#work_exp_view_content").html(data);
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