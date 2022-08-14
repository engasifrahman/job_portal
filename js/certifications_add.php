<?php
	session_start();
	require_once('../dbconfig.php');
	global $con;

	$js_id = $_SESSION['js_info']['id'];

	$certificate_name = $_POST['certificate_name'];
	$exam_date = $_POST['exam_date'];
	$expire_date = $_POST['expire_date'];
	$score = $_POST['score'];
	$score_scale = $_POST['score_scale'];

	if(!empty($certificate_name) && !empty($exam_date))
	{

		$query = "INSERT INTO certifications (js_id, certificate_name, exam_date, expire_date, score, score_scale) VALUES ('$js_id', '$certificate_name', '$exam_date', '$expire_date', '$score', '$score_scale')";

		if (!$result = mysqli_query($con, $query))
		{
	        exit(mysqli_error($con));
	    }
	    else
	    {
	    	?>
	    	
	    	<script type="text/javascript">
	    		$('#certifications_add_content').slideUp(400); //this is actually hide
                $('#certifications_view_content').slideDown(400); //this is actually show
                $('#certifications_add').show();
                $('#certifications').show();
                $('#certifications_with_add_icon').hide();
                $('#certifications_edit_add_cancel').hide();
                $('#certifications_add_form').trigger("reset");

                $.post("vcerti", function(data) {
                    $("#certifications_view_content").html(data);
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