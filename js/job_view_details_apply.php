<?php
	session_start();
	require_once('../dbconfig.php');
	global $con;

	$js_id = $_SESSION['js_info']['id'];

	$post_id = $_POST['post_id'];
		
	if(!empty($post_id) && !empty($js_id))
	{

		$query = "INSERT INTO applied_job (js_id, post_id) VALUES ('$js_id','$post_id')";

		if (!$result = mysqli_query($con, $query))
		{
	        exit(mysqli_error($con));
	    }
	    else
	    {
	    	?>

	    		<script type="text/javascript">
	    			var post_id='<?php echo $post_id; ?>';

				    $.post("jvdv",{ post_id:post_id }, function(data) {
				        $("#job_view_details_view_content").html(data);
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
                message: 'Something went wrong please try again later',

                // success, info, error, warn
                type: 'warn',

                // 1: top-left, 2: top-center, 3: top-right
                // 4: mid-left, 5: mid-right
                // 6: bottom-left, 7: bottom-center, 8: bottom-right
                position: 3,

                // or 'rtl'
                dir: 'ltr',

                // enable/disable auto close
                autoClose: false,

                // timeout in milliseconds
                duration: 4000
              
            });
        </script>
        <?php
	}