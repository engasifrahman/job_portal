<?php
	session_start();
	require_once('../dbconfig.php');
	global $con;

	$post_id = $_POST['post_id'];
	$action = $_POST['action'];
		
	if(!empty($post_id) && !empty($action) && $action=='Active')
	{

		$query = "UPDATE circular_post SET action='$action' WHERE post_id='$post_id'";

		if (!$result = mysqli_query($con, $query))
		{
	        exit(mysqli_error($con));
	    }
	    else
	    {
	    	?>

    		<script type="text/javascript">
			    $.post("lpostv", function(data) {
			        $("#post_list_view_content").html(data);
			    });
	    	</script>

	    	<?php
	    }

	}
	elseif(!empty($post_id) && !empty($action) && $action=='Deactive')
	{

		$query = "UPDATE circular_post SET action='$action' WHERE post_id='$post_id'";

		if (!$result = mysqli_query($con, $query))
		{
	        exit(mysqli_error($con));
	    }
	    else
	    {
	    	?>

    		<script type="text/javascript">
			    $.post("lpostv", function(data) {
			        $("#post_list_view_content").html(data);
			    });
	    	</script>

	    	<?php
	    }

	}
	elseif(!empty($post_id) && !empty($action) && $action=='Hide')
	{

		$query = "UPDATE circular_post SET action='$action' WHERE post_id='$post_id'";

		if (!$result = mysqli_query($con, $query))
		{
	        exit(mysqli_error($con));
	    }
	    else
	    {
	    	?>

    		<script type="text/javascript">
			    $.post("lpostv", function(data) {
			        $("#post_list_view_content").html(data);
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