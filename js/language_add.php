<?php
	session_start();
	require_once('../dbconfig.php');
	global $con;

	$js_id = $_SESSION['js_info']['id'];

	$language = $_POST['language'];
	$reading = $_POST['reading'];
	$writing = $_POST['writing'];
	$speaking = $_POST['speaking'];

	if(!empty($language) && !empty($reading) && !empty($writing) && !empty($speaking))
	{

		$query = "INSERT INTO language (js_id, language, reading, writing, speaking) VALUES ('$js_id', '$language', '$reading', '$writing', '$speaking')";

		if (!$result = mysqli_query($con, $query))
		{
	        exit(mysqli_error($con));
	    }
	    else
	    {
	    	?>
	    	
	    	<script type="text/javascript">
	    		$('#language_add_content').slideUp(400); //this is actually hide
                $('#language_view_content').slideDown(400); //this is actually show
                $('#language_add').show();
                $('#language').show();
                $('#language_with_add_icon').hide();
                $('#language_edit_add_cancel').hide();
                $('#language_add_form').trigger("reset");

                $.post("vlang", function(data) {
                    $("#language_view_content").html(data);
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