<?php
	session_start();
	require_once('../dbconfig.php');
	global $con;

	$js_id=$_SESSION['js_info']['id'];

	$query = "SELECT * FROM job_seeker WHERE id='$js_id'";

	if (!$result = mysqli_query($con, $query)) {
	        exit(mysqli_error($con));
	}

	while($row = mysqli_fetch_assoc($result))
	{

		echo 
		'
			<div class="form-group pt-1 pb-1">

				<div class="col-xs-6 col-sm-6 col-md-6 text-xs-right text-sm-right text-md-right text-lg-right text-xl-right mobile-device"><strong class="info">Mobile Number :&nbsp</strong></div>
				<div class="col-xs-6 col-sm-5 col-md-5 text-justify mobile-device">'.$row['mobile_number'].'</div>
				<div class="clearfix"></div>

				<div class="col-xs-6 col-sm-6 col-md-6 text-xs-right text-sm-right text-md-right text-lg-right text-xl-right mobile-device"><strong class="info">Phone Number :&nbsp</strong></div>
				<div class="col-xs-6 col-sm-5 col-md-5 text-justify mobile-device">'.$row['phone_number'].'</div>
				<div class="clearfix"></div>

				<div class="col-xs-6 col-sm-6 col-md-6 text-xs-right text-sm-right text-md-right text-lg-right text-xl-right mobile-device"><strong class="info">Alternative Email :&nbsp</strong></div>
				<div class="col-xs-6 col-sm-5 col-md-5 text-justify mobile-device">'.$row['alternative_email'].'</div>
				<div class="clearfix"></div>

				<div class="col-xs-6 col-sm-6 col-md-6 text-xs-right text-sm-right text-md-right text-lg-right text-xl-right mobile-device"><strong class="info">Present Address :&nbsp</strong></div>
				<div class="col-xs-6 col-sm-5 col-md-5 text-justify mobile-device">'.$row['present_address'].'</div>
				<div class="clearfix"></div>

				<div class="col-xs-6 col-sm-6 col-md-6 text-xs-right text-sm-right text-md-right text-lg-right text-xl-right mobile-device"><strong class="info">Parmanent Address :&nbsp</strong></div>
				<div class="col-xs-6 col-sm-5 col-md-5 text-justify mobile-device">'.$row['permanent_address'].'</div>
				<div class="clearfix"></div>

			</div>
		';
	}
	
?>
<script type="text/javascript">

	//############################# BEGIN EDIT ##############################//
	$('.contact_info_edit').click(function() {
		var js_id = $(this).attr('id');

		$('.contact_info_edit').hide();
		$('#contact_info').hide();
		$('#contact_info_with_edit_icon').show();
		$('#contact_info_edit_cancel').show();

		$.ajax({
		    url : 'eci',
		    type : 'POST',
		    data : { js_id: js_id },
		    success: function(data)
		    {
	    		$("#contact_info_edit_content").html(data);

	    		$('#contact_info_view_content').slideUp(400);  //this is actually hide
	    		$('#contact_info_edit_content').slideDown(400); //this is actually show
		    }
		});
	});
	//############################# END EDIT ##############################//

</script>