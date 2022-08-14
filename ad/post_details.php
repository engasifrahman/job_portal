<?php 
	//include 'header.php';
	require 'header.php';
	require_once('../dbconfig.php');
	global $con;

	if(isset($_GET['post_id']))
	{
		$post_id=$_GET['post_id'];
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

	    $.post("postdv",{ post_id:post_id }, function(data) {
	        $("#job_view_details_view_content").html(data);
	    });
    	//###################### END Job Search Details page control######################//
	</script>
<?php 
	//include 'footer.php';
	require 'footer.php';
?>