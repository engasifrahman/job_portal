<?php
	session_start();
	require_once('../dbconfig.php');
	global $con;

	$ad_id=$_SESSION['ad_info']['id'];

	$action = $_POST['action'];

	$l_id = $_POST['l_id'];

	if (isset($_POST['id']))
	{
		$id = $_POST['id'];
	}
	else
	{
		$id=NULL;
	}

	if (isset($_POST['c_id']))
	{
		$c_id = $_POST['c_id'];
	}
	else
	{
		$c_id=NULL;
	}

	if (isset($_POST['comment']))
	{
		$comment = addslashes($_POST['comment']);
	}
	else
	{
		$comment=NULL;
	}
		
	if(!empty($ad_id) && !empty($l_id) && !empty($comment) && !empty($action) && $action=='Add')
	{

		$query = "INSERT INTO lesson_comment (l_id, c_id, comment, status) VALUES ('$l_id', '$ad_id', '$comment', 'Admin')";

		if (!$result = mysqli_query($con, $query))
		{
	        exit(mysqli_error($con));
	    }
	    else
	    {
	    	?>

    		<script type="text/javascript">
			    $.post("comment_view",{l_id:l_id}, function(data) {
			        $("#comment_view").html(data);
			    });
	    	</script>

	    	<?php
	    }

	}

	elseif(!empty($ad_id) && !empty($l_id) && !empty($id) && !empty($comment) && !empty($action) && $action=='Update')
	{

		$query = "UPDATE lesson_comment SET comment='$comment' WHERE l_id='$l_id' AND c_id='$ad_id' AND id='$id' AND status='Admin'";

		if (!$result = mysqli_query($con, $query))
		{
	        exit(mysqli_error($con));
	    }
	    else
	    {
	    	?>

    		<script type="text/javascript">
			    $.post("comment_view",{l_id:l_id}, function(data) {
			        $("#comment_view").html(data);
			    });
	    	</script>

	    	<?php
	    }

	}

	elseif(!empty($ad_id) && !empty($l_id) && !empty($id) && !empty($action) && $action=='Delete_Own')
	{

		$query = "UPDATE lesson_comment SET action='Hide' WHERE  id='$id' AND l_id='$l_id' AND c_id='$ad_id' AND status='Admin'";

		if (!$result = mysqli_query($con, $query))
		{
	        exit(mysqli_error($con));
	    }
	    else
	    {
	    	?>

    		<script type="text/javascript">
			    $.post("comment_view",{l_id:l_id}, function(data) {
			        $("#comment_view").html(data);
			    });
	    	</script>

	    	<?php
	    }

	}

	elseif(!empty($ad_id) && !empty($id) && !empty($l_id) && !empty($c_id) && !empty($action) && $action=='Delete_User')
	{

		$query = "UPDATE lesson_comment SET action='Hide' WHERE id='$id' AND l_id='$l_id' AND c_id='$c_id' AND status='User'";

		if (!$result = mysqli_query($con, $query))
		{
	        exit(mysqli_error($con));
	    }
	    else
	    {
	    	?>

    		<script type="text/javascript">
			    $.post("comment_view",{l_id:l_id}, function(data) {
			        $("#comment_view").html(data);
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
				message: 'Something went wrong please try again later <?php echo $c_id; ?>',

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