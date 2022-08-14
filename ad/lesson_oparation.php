<?php
	session_start();
	require_once('../dbconfig.php');
	global $con;

	$ad_id=$_SESSION['ad_info']['id'];

	if (isset($_POST['lesson_title']))
	{
		$lesson_title = $_POST['lesson_title'];
	}

	if (isset($_POST['lesson_content']))
	{
		$lesson_content = addslashes($_POST['lesson_content']);
	}

	if (isset($_POST['sub_id']))
	{
		$sub_id = $_POST['sub_id'];
	}

	if (isset($_POST['lesson_id']))
	{
		$lesson_id = $_POST['lesson_id'];
	}

	$action  = $_POST['action'];
		
	if(!empty($ad_id) && !empty($sub_id) && !empty($lesson_title) && !empty($lesson_content) && !empty($action) && $action=='Insert')
	{

		$query = "INSERT INTO preparation_lesson (sub_id, lesson_title, lesson_content, posted_by) VALUES ('$sub_id', '$lesson_title', '$lesson_content', '$ad_id')";

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

	    		$('#lesson_add_content').slideUp(400); //this is actually hide
                $('#lesson_view_content').slideDown(400); //this is actually show
                $('#lesson_add').show();
                $('#lesson').show();
                $('#lesson_with_add_icon').hide();
                $('#lesson_edit_add_cancel').hide();
                $('#lesson_add_form').trigger("reset");

			    $.post("view_lesson", function(data) {
			        $("#lesson_view_content").html(data);
			    });

			    $.notify({
					// where to append the toast notification
					wrapper: 'body',

					// toast message
					message: 'Lesson added successfully!',

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

	elseif(!empty($ad_id) && !empty($sub_id) && !empty($lesson_id) && !empty($lesson_title) && !empty($lesson_content) && !empty($action) && $action=='Edit')
	{

		$query = "UPDATE preparation_lesson SET sub_id='$sub_id', lesson_title='$lesson_title', lesson_content='$lesson_content', updated_by='$ad_id'  WHERE id='$lesson_id'";

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

	    		$('#lesson_edit_content').slideUp(400); //this is actually hide
                $('#lesson_view_content').slideDown(400); //this is actually show
                $('#lesson_add').show();
                $('#lesson').show();
                $('#lesson_with_edit_icon').hide();
                $('#lesson_edit_add_cancel').hide();

			    $.post("view_lesson", function(data) {
			        $("#lesson_view_content").html(data);
			    });

			    $.notify({
					// where to append the toast notification
					wrapper: 'body',

					// toast message
					message: 'Lesson updated successfully!',

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

	elseif(!empty($ad_id) && !empty($lesson_id) && !empty($action) && $action=='Delete')
	{

		$query = "DELETE FROM preparation_lesson WHERE id='$lesson_id'";

		if (!$result = mysqli_query($con, $query))
		{
	        exit(mysqli_error($con));
	    }
	    else
	    {
	    	?>

    		<script type="text/javascript">
			    $.post("view_lesson", function(data) {
			        $("#lesson_view_content").html(data);
			    });
	    	</script>

	    	<?php
	    }

	}

	elseif(!empty($ad_id) && !empty($lesson_id) && !empty($action) && $action=='Public')
	{

		$query = "UPDATE preparation_lesson SET action='$action' WHERE id='$lesson_id'";

		if (!$result = mysqli_query($con, $query))
		{
	        exit(mysqli_error($con));
	    }
	    else
	    {
	    	?>

    		<script type="text/javascript">
			    $.post("view_lesson", function(data) {
			        $("#lesson_view_content").html(data);
			    });
	    	</script>

	    	<?php
	    }

	}

	elseif(!empty($ad_id) && !empty($lesson_id) && !empty($action) && $action=='Hide')
	{

		$query = "UPDATE preparation_lesson SET action='$action' WHERE id='$lesson_id'";

		if (!$result = mysqli_query($con, $query))
		{
	        exit(mysqli_error($con));
	    }
	    else
	    {
	    	?>

    		<script type="text/javascript">
			    $.post("view_lesson", function(data) {
			        $("#lesson_view_content").html(data);
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
				message: 'Something went wrong please try again',

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