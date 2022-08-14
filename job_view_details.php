<?php 
	//include 'header.php';
	require 'header.php';
	if(isset($_GET['post_id']))
	{
		$post_id=$_GET['post_id'];
	}
?>
	<!--############################# BEGIN Content Area ###########################-->
    <div class="app-content content ">
      <div class="content-wrapper">
        <div class="content-body">	
        	<div class="row">
        		
        		<div class="col-md-12" id="job_view_details_notification_content" style="display: none"></div>
        		<div class="col-md-12" id="job_view_details_view_content"></div>

        		<div class="socialnav hidden-md-down">
				 	<a href="#" class="one facebook"> <i class="fa fa-facebook padd" aria-hidden="true"></i>Facebook</a>
				 	<a href="#" class="two twitter"> <i class="fa fa-twitter padd" aria-hidden="true"></i>Twitter</a>
				 	<a href="#" class="three youtube"> <i class="fa fa-youtube padd" aria-hidden="true"></i>Youtube</a>
				 	<a href="#" class="four contact"> <i class="fa fa-phone padd" aria-hidden="true"></i>Contact</a>
				</div>

			</div>
        </div>
      </div>
    </div>
	<!--/############################# END Content Area ###########################-->
	<script type="text/javascript">
		//##################### BEGIN Job Search Details page control#####################//
	    $('#job_view_details_notification_content').hide();

	    var post_id='<?php echo $post_id; ?>';

	    $.post("job_view_details_view.php",{ post_id:post_id }, function(data) {
	        $("#job_view_details_view_content").html(data);
	    });
    	//###################### END Job Search Details page control######################//
	</script>
<?php 
	//include 'footer.php';
	require 'footer.php';
?>