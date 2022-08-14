<?php
	session_start();
	require_once('../dbconfig.php');
	global $con;

	$ad_id=$_SESSION['ad_info']['id'];

	if (isset($_POST['subject']))
	{
		$subject = $_POST['subject'];
	}
	else
	{
		$subject = NULL;
	}

	if (isset($_POST['sub_id']))
	{
		$sub_id = $_POST['sub_id'];
	}
	else
	{
		$sub_id = NULL;
	}

	$action  = $_POST['action'];
		
	if(!empty($ad_id) && !empty($subject) && !empty($action) && $action=='Insert')
	{

		$query = "INSERT INTO preparation_sub (subject, created_by) VALUES ('$subject', '$ad_id')";

		if (!$result = mysqli_query($con, $query))
		{
	        //exit(mysqli_error($con));
	        ?>
	    	<script type="text/javascript">
	    		$.notify({
					// where to append the toast notification
					wrapper: 'body',

					// toast message
					message: 'Duplicate entry not allowed',

					// success, info, error, warn
					type: 'error',

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
	    else
	    {
	    	?>

    		<script type="text/javascript">

	    		$('#subject_add_content').slideUp(400); //this is actually hide
                $('#subject_view_content').slideDown(400); //this is actually show
                $('#subject_add').show();
                $('#subject').show();
                $('#subject_with_add_icon').hide();
                $('#subject_edit_add_cancel').hide();
                $('#subject_add_form').trigger("reset");

			    $.post("view_subject", function(data) {
			        $("#subject_view_content").html(data);
			    });

			    $.notify({
					// where to append the toast notification
					wrapper: 'body',

					// toast message
					message: 'Subject added successfully!',

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

	elseif(!empty($ad_id) && !empty($sub_id) && !empty($subject) && !empty($action) && $action=='Update')
	{

		$query = "UPDATE preparation_sub SET subject='$subject' WHERE id='$sub_id'";

		if (!$result = mysqli_query($con, $query))
		{
	       	//exit(mysqli_error($con));
	        ?>
	    	<script type="text/javascript">
	    		$.notify({
					// where to append the toast notification
					wrapper: 'body',

					// toast message
					message: 'Duplicate entry not allowed',

					// success, info, error, warn
					type: 'error',

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
	    else
	    {
	    	?>

    		<script type="text/javascript">

	    		$('#subject_edit_content').slideUp(400); //this is actually hide
                $('#subject_view_content').slideDown(400); //this is actually show
                $('#subject_add').show();
                $('#subject').show();
                $('#subject_with_edit_icon').hide();
                $('#subject_edit_add_cancel').hide();

			    $.post("view_subject", function(data) {
			        $("#subject_view_content").html(data);
			    });

			    $.notify({
					// where to append the toast notification
					wrapper: 'body',

					// toast message
					message: 'Subject updated successfully!',

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

	elseif(!empty($ad_id) && !empty($sub_id) && !empty($action) && $action=='Delete')
	{

		$query = "DELETE FROM preparation_sub WHERE id='$sub_id'";

		if (!$result = mysqli_query($con, $query))
		{
	        exit(mysqli_error($con));
	    }
	    else
	    {
	    	?>

    		<script type="text/javascript">
			    $.post("view_subject", function(data) {
			        $("#subject_view_content").html(data);
			    });
	    	</script>

	    	<?php
	    }

	}

	elseif(!empty($ad_id) && !empty($sub_id) && !empty($action) && $action=='Public')
	{

		$query = "UPDATE preparation_sub SET action='$action' WHERE id='$sub_id'";

		if (!$result = mysqli_query($con, $query))
		{
	        exit(mysqli_error($con));
	    }
	    else
	    {
	    	?>

    		<script type="text/javascript">
			    $.post("view_subject", function(data) {
			        $("#subject_view_content").html(data);
			    });
	    	</script>

	    	<?php
	    }

	}

	elseif(!empty($ad_id) && !empty($sub_id) && !empty($action) && $action=='Hide')
	{

		$query = "UPDATE preparation_sub SET action='$action' WHERE id='$sub_id'";

		if (!$result = mysqli_query($con, $query))
		{
	        exit(mysqli_error($con));
	    }
	    else
	    {
	    	?>

    		<script type="text/javascript">
			    $.post("view_subject", function(data) {
			        $("#subject_view_content").html(data);
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
				message: 'Something is wrong please try again',

				// success, info, error, warn
				type: 'error',

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