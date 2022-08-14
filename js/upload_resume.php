<?php
	//include 'header.php';
	require 'header.php';
?>

<!--############################# BEGIN Content Area ###########################-->
<div class="app-content content container-fluid">
  <div class="content-wrapper">
    <div class="content-body">
	 <div class="row">

	 	<div class="col-md-8 offset-md-2" id="resume_upload_notification_content" style="display: none;"></div>
	 	<div class="col-md-12" id="resume_upload_view_content"></div>

    </div>
  </div>
</div>
<!--/############################# END Content Area ###########################-->

<!--############################ BEGIN Page Control ##########################-->
<script type="text/javascript" >
	$(document).ready(function() {
		//##################### BEGIN Upload Resume #####################//
		$('#resume_upload_notification_content').hide();

		$.post("uplrv", function(data) {
		    $("#resume_upload_view_content").html(data);
		});
		//###################### END Upload Resume ######################//
	}); 
</script>
<!--############################# END Page Control ###########################-->

<?php 
	//include 'footer.php';
	require 'footer.php';
?>