<?php
	session_start();
	require_once('../dbconfig.php');
	global $con;

	$js_id = $_SESSION['js_info']['id'];

	$em_id = $_POST['em_id'];


	if(!empty($js_id) && !empty($em_id))
	{

		$query = "DELETE FROM js_following_em where js_id='$js_id' AND em_id='$em_id'";

		if (!$result = mysqli_query($con, $query)) {
		        exit(mysqli_error($con));
		}

		else
		{
			?>

			<script type="text/javascript">
			    $.post("emlv", function(data) {
			        $("#em_list_view_content").html(data);
			    });
			    
			    $.post("fev", function(data) {
			        $("#following_em_view_content").html(data);
			    });

			    $.post("rvv", function(data) {
			        $("#resume_visited_view_content").html(data);
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