<?php

	//include 'header.php';
	require 'header.php';

	require_once('../dbconfig.php');
	global $con;

	if (!empty($_GET['js_id']) && empty($_GET['post_id']))
	{
		$js_id=$_GET['js_id'];
		$post_id=NULL;
	}
	elseif (!empty($_GET['js_id']) && !empty($_GET['post_id']))
	{
		$js_id=$_GET['js_id'];
		$post_id=$_GET['post_id'];
	}
	else
	{
		$js_id=NULL;
		$post_id=NULL;
	}

	if (!empty($_GET['js_id']))
	{

		$check_query = "SELECT * FROM job_seeker WHERE id='$js_id'";

		if (!$check_result = mysqli_query($con, $check_query)) {
		        exit(mysqli_error($con));
		}
		if (mysqli_num_rows($check_result) > 0)
		{

			########################## BEGIN Page Visit Records collecttion ###############################
			$em_id=$_SESSION['em_info']['id'];

			$sql_select = "SELECT * FROM resume_visited WHERE js_id='$js_id' AND em_id='$em_id'";

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

					$sql_update = "UPDATE resume_visited SET visit_count='$visit_count' WHERE js_id='$js_id' AND em_id='$em_id'";
					if (!$update = mysqli_query($con, $sql_update))
					{
					    exit(mysqli_error($con));
					}

				}
			}
			else
			{
				$visit_count=1;
				$sql_insert = "INSERT INTO resume_visited (js_id, em_id, visit_count) VALUES ('$js_id', '$em_id', '$visit_count')";
				if (!$insert = mysqli_query($con, $sql_insert))
				{
				    exit(mysqli_error($con));
				}
			}
		}	########################## END Page Visit Records collecttion ###############################
	}
?>

<!--############################# BEGIN Content Area ###########################-->
<div class="app-content content container-fluid">
  <div class="content-wrapper">
    <div class="content-body">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12" id="visit_js_notification_content" style="display:none">
				
			</div>

            <div class="col-md-12 col-sm-12 col-xs-12 bg-white pt-2 pb-2" id="visit_js_view_content"></div>
		</div>
    </div>
  </div>
</div>
<!--/############################# END Content Area ###########################-->

<script type="text/javascript">
    //##################### BEGIN Applied Applicatns List Content Control #####################//
    $('#visit_js_notification_content').hide();
    var js_id='<?php echo $js_id;?>';
    var post_id='<?php echo $post_id;?>';

    $.post("vjv",{ js_id:js_id, post_id:post_id }, function(data) {
        $("#visit_js_view_content").html(data);
    });
    //###################### END Applied Applicatns List Content Control ######################//
</script>

<?php
	//include 'footer.php';
	require 'footer.php';
?>