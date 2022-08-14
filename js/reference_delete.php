<?php
	session_start();
	require_once('../dbconfig.php');
	global $con;

	$js_id = $_SESSION['js_info']['id'];
	if (!empty($_POST['id']))
	{
		$id = $_POST['id'];
	}
	else
	{
		$id = NULL;
	}
	

	if(!empty($id))
	{

		$query = "DELETE FROM reference where js_id='$js_id' AND id='$id'";

		if (!$result = mysqli_query($con, $query)) {
		        exit(mysqli_error($con));
		}

		else
		{
			?>
			<script type="text/javascript">
		    	$.post("vref", function(data)
		    	{	
		    		$("#reference_view_content").html(data);
		    	});

				$.notify({

					// where to append the toast notification
					wrapper: 'body',

					// toast message
					message: 'Record deleted successfully!',

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
				message: 'Error while deleting [Please refresh your page]',

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