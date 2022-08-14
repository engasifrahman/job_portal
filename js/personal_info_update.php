<?php
	session_start();
	require_once('../dbconfig.php');
	global $con;

	$name_in_session=$_SESSION['js_info']['name'];
	$gender_in_session=$_SESSION['js_info']['gender'];

	$js_id = $_SESSION['js_info']['id'];

	$full_name = $_POST['full_name'];
	$dob = $_POST['dob'];

	if (isset($_POST['gender']))
	{
		$gender = $_POST['gender'];
	}
	else
	{
		$gender = NULL;
	}

	$marital_status = $_POST['marital_status'];
	$nationality = $_POST['nationality'];
	$nid = $_POST['nid'];
	$birth_certificate = $_POST['birth_certificate'];
	$father_name = $_POST['father_name'];
	$mother_name = $_POST['mother_name'];
	$profile_privacy = $_POST['profile_privacy'];

	if(!empty($js_id) && !empty($full_name) && !empty($dob) && !empty($marital_status) && !empty($nationality) && !empty($father_name) && !empty($mother_name) && !empty($profile_privacy) && ($full_name==$name_in_session) && ($gender==$gender_in_session))
	{

		$query = "UPDATE job_seeker  SET full_name='$full_name', dob='$dob', gender='$gender', marital_status='$marital_status', nationality='$nationality', nid='$nid', birth_certificate='$birth_certificate', father_name='$father_name', mother_name='$mother_name', profile_privacy='$profile_privacy' WHERE id='$js_id'";
		if (!$result = mysqli_query($con, $query))
		{
	        exit(mysqli_error($con));
	    }
	    else
	    {
	    	?>

	    	<script type="text/javascript">
				$('#personal_info_edit_content').slideUp(400); //this is actually hide
                $('#personal_info_view_content').slideDown(400); //this is actually show
                $('.personal_info_edit').show();
                $('#personal_info').show();
                $('#personal_info_with_edit_icon').hide();
                $('#personal_info_edit_cancel').hide();

                $.post("vpi", function(data) {
                    $("#personal_info_view_content").html(data);
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

	elseif(!empty($js_id) && !empty($full_name) && !empty($dob) && !empty($marital_status) && !empty($nationality) && !empty($father_name) && !empty($mother_name) && !empty($profile_privacy) && !(($full_name==$name_in_session) && ($gender==$gender_in_session)))
	{
		$query = "UPDATE job_seeker  SET full_name='$full_name', dob='$dob', gender='$gender', marital_status='$marital_status', nationality='$nationality', nid='$nid', birth_certificate='$birth_certificate', father_name='$father_name', mother_name='$mother_name', profile_privacy='$profile_privacy' WHERE id='$js_id'";
		if (!$result = mysqli_query($con, $query)) 
		{
	        exit(mysqli_error($con));
	    }

	    else
	    {
	    	$_SESSION['js_info']['name']=$full_name;
	    	$_SESSION['js_info']['gender']=$gender;

	    	?>

	    	<script type="text/javascript">
	    		
			    $.post("vpp", function(data) {
			        $("#profile_pic_view_content").html(data);
			    });
	    		
                $.post("euia", function(data) {
                    $("#userinfo_after_edit").html(data);
                });

                $("#userinfo_before_edit").hide();
                $("#userinfo_after_edit").show();

				$('#personal_info_edit_content').slideUp(400); //this is actually hide
                $('#personal_info_view_content').slideDown(400); //this is actually show
                $('.personal_info_edit').show();
                $('#personal_info').show();
                $('#personal_info_with_edit_icon').hide();
                $('#personal_info_edit_cancel').hide();

                $.post("vpi", function(data) {
                    $("#personal_info_view_content").html(data);
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