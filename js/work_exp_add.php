<?php
	session_start();
	require_once('../dbconfig.php');
	global $con;

	$js_id = $_SESSION['js_info']['id'];

	$organization_name = $_POST['organization_name'];
	$organization_website = $_POST['organization_website'];
	$position_title = $_POST['position_title'];
	$position_level = $_POST['position_level'];
	$type_of_employment = $_POST['type_of_employment'];
	$department = $_POST['department'];
	$join_date = $_POST['join_date'];

	if (!empty($_POST['resign_date'])) {
		
		$resign_date = $_POST['resign_date'];
	}
	elseif (!empty($_POST['resign_date_continue']))
	{
		$resign_date = $_POST['resign_date_continue'];
	}
	else
	{
		$resign_date = NULL;
	}

	$responsibility_and_achivement = $_POST['responsibility_and_achivement'];
	$ref_name = $_POST['ref_name'];
	$ref_position_dept = $_POST['ref_position_dept'];
	$ref_contact_no = $_POST['ref_contact_no'];
	$ref_email = $_POST['ref_email'];

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

		$query = "INSERT INTO work_experience (js_id, organization_name, organization_website, position_title, position_level, type_of_employment, department, join_date, resign_date, years_of_exp, responsibility_and_achivement, ref_name, ref_position_dept, ref_contact_no,ref_email) VALUES ('$js_id','$organization_name', '$organization_website','$position_title', '$position_level','$type_of_employment', '$department', '$join_date', '$resign_date', '$years_of_exp','$responsibility_and_achivement', '$ref_name','$ref_position_dept', '$ref_contact_no', '$ref_email')";

		if (!$result = mysqli_query($con, $query))
		{
	        exit(mysqli_error($con));
	    }
	    else
	    {
	    	?>
	    	
	    	<script type="text/javascript">
	    		$('#work_exp_add_content').slideUp(400); //this is actually hide
                $('#work_exp_view_content').slideDown(400); //this is actually show
                $('#work_exp_add').show();
                $('#work_exp').show();
                $('#work_exp_with_add_icon').hide();
                $('#work_exp_edit_add_cancel').hide();
                $('#work_exp_add_form').trigger("reset");

                $.post("vwe", function(data) {
                    $("#work_exp_view_content").html(data);
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