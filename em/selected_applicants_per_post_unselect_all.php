<?php
	session_start();
	require_once('../dbconfig.php');
	global $con;

	$em_id = $_SESSION['em_info']['id'];
	$post_id = $_POST['post_id'];
		
	if(!empty($em_id) && !empty($post_id))
	{

		$query = "DELETE FROM selected_applied_applicants where em_id='$em_id' AND post_id='$post_id'";

		if (!$result = mysqli_query($con, $query)) {
		        exit(mysqli_error($con));
		}

		else
		{
			?>

			<script type="text/javascript">

                $.post("sapppv",{ post_id:post_id }, function(data) {
                    $("#selected_applicants_per_post_view_content").html(data);
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