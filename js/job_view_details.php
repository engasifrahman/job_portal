<?php 
	//include 'header.php';
	require 'header.php';
	require_once('../dbconfig.php');
	global $con;

	if(isset($_GET['post_id']))
	{
		$post_id=$_GET['post_id'];

		$current_date=date('Y-m-d');
		$check_query = "SELECT * FROM circular_post AS CP, employer AS EM WHERE post_id='$post_id' AND CP.action='Active' AND EM.action='Active' AND application_deadline >= '$current_date' AND em_id=id ";
		if (!$check_result = mysqli_query($con, $check_query))
		{
		   	exit(mysqli_error($con));
		}

		if (mysqli_num_rows($check_result) > 0)
	    {

	    	########################## BEGIN Page Visit Records collecttion ###############################
			$js_id=$_SESSION['js_info']['id'];

			$sql_select = "SELECT * FROM circular_visited WHERE post_id='$post_id' AND js_id='$js_id'";

			if (!$select = mysqli_query($con, $sql_select))
			{
			    exit(mysqli_error($con));
			}
			if (mysqli_num_rows($select) > 0)
			{
				while($visited_data = mysqli_fetch_assoc($select))
				{
					$visit_count=$visited_data['visit_count'];
					$visit_count+=1;
					
					$sql_update = "UPDATE circular_visited SET visit_count='$visit_count' WHERE post_id='$post_id' AND js_id='$js_id'";
					if (!$update = mysqli_query($con, $sql_update))
					{
					    exit(mysqli_error($con));
					}
				}

			}
			else
			{
				$visit_count=1;
				
				$sql_insert = "INSERT INTO circular_visited (js_id, post_id, visit_count) VALUES ('$js_id', '$post_id', '$visit_count')";
				if (!$insert = mysqli_query($con, $sql_insert))
				{
				    exit(mysqli_error($con));
				}
			}
			########################## END Page Visit Records collecttion ###############################
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
?>
	<!--############################# BEGIN Content Area ###########################-->
    <div class="app-content content ">
      <div class="content-wrapper">
        <div class="content-body">	
        	<div class="row">
        		<div class="col-md-12" id="job_view_details_notification_content" style="display: none"></div>
        		<div class="col-md-12" id="job_view_details_view_content"></div>
			</div>
        </div>
      </div>
    </div>
	<!--/############################# END Content Area ###########################-->
	<script type="text/javascript">
		//##################### BEGIN Job Search Details page control#####################//
	    $('#job_view_details_notification_content').hide();

	    var post_id='<?php echo $post_id; ?>';

	    $.post("jvdv",{ post_id:post_id }, function(data) {
	        $("#job_view_details_view_content").html(data);
	    });
    	//###################### END Job Search Details page control######################//
	</script>
<?php 
	//include 'footer.php';
	require 'footer.php';
?>