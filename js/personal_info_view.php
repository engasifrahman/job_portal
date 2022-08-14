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

				<div class="col-xs-6 col-sm-6 col-md-6 text-xs-right text-sm-right text-md-right text-lg-right text-xl-right mobile-device"><strong class="info">Full Name :&nbsp</strong></div>
				<div class="col-xs-6 col-sm-6 col-md-6 text-justify mobile-device">'.$row['full_name'].'</div>
				<div class="clearfix"></div>

				<div class="col-xs-6 col-sm-6 col-md-6 text-xs-right text-sm-right text-md-right text-lg-right text-xl-right mobile-device"><strong class="info">Date of Birth :&nbsp</strong></div>
				<div class="col-xs-6 col-sm-6 col-md-6 text-justify mobile-device">'.$row['dob'].'</div>
				<div class="clearfix"></div>

				<div class="col-xs-6 col-sm-6 col-md-6 text-xs-right text-sm-right text-md-right text-lg-right text-xl-right mobile-device"><strong class="info">Gender :&nbsp</strong></div>
				<div class="col-xs-6 col-sm-6 col-md-6 text-justify mobile-device">'.$row['gender'].'</div>
				<div class="clearfix"></div>

				<div class="col-xs-6 col-sm-6 col-md-6 text-xs-right text-sm-right text-md-right text-lg-right text-xl-right mobile-device"><strong class="info">Marital Status :&nbsp</strong></div>
				<div class="col-xs-6 col-sm-6 col-md-6 text-justify mobile-device">'.$row['marital_status'].'</div>
				<div class="clearfix"></div>

				<div class="col-xs-6 col-sm-6 col-md-6 text-xs-right text-sm-right text-md-right text-lg-right text-xl-right mobile-device"><strong class="info">Nationality :&nbsp</strong></div>
				<div class="col-xs-6 col-sm-6 col-md-6 text-justify mobile-device">'.$row['nationality'].'</div>
				<div class="clearfix"></div>

				<div class="col-xs-6 col-sm-6 col-md-6 text-xs-right text-sm-right text-md-right text-lg-right text-xl-right mobile-device"><strong class="info">National ID :&nbsp</strong></div>
				<div class="col-xs-6 col-sm-6 col-md-6 text-justify mobile-device">'.$row['nid'].'</div>
				<div class="clearfix"></div>

				<div class="col-xs-6 col-sm-6 col-md-6 text-xs-right text-sm-right text-md-right text-lg-right text-xl-right mobile-device"><strong class="info">Birth Certificate :&nbsp</strong></div>
				<div class="col-xs-6 col-sm-6 col-md-6 text-justify mobile-device">'.$row['birth_certificate'].'</div>
				<div class="clearfix"></div>

				<div class="col-xs-6 col-sm-6 col-md-6 text-xs-right text-sm-right text-md-right text-lg-right text-xl-right mobile-device"><strong class="info">Father Name :&nbsp</strong></div>
				<div class="col-xs-6 col-sm-6 col-md-6 text-justify mobile-device">'.$row['father_name'].'</div>
				<div class="clearfix"></div>

				<div class="col-xs-6 col-sm-6 col-md-6 text-xs-right text-sm-right text-md-right text-lg-right text-xl-right mobile-device"><strong class="info">Mother Name :&nbsp</strong></div>
				<div class="col-xs-6 col-sm-6 col-md-6 text-justify mobile-device">'.$row['mother_name'].'</div>
				<div class="clearfix"></div>

				<div class="col-xs-6 col-sm-6 col-md-6 text-xs-right text-sm-right text-md-right text-lg-right text-xl-right mobile-device"><strong class="info">Profile Privacy :&nbsp</strong></div>
				<div class="col-xs-6 col-sm-6 col-md-6 text-justify mobile-device">'.$row['profile_privacy'].'</div>
				<div class="clearfix"></div>

			</div>
		';
	}	
?>
<script type="text/javascript">

	//############################### BEGIN EDIT ##############################//
	$('.personal_info_edit').click(function() {
		var js_id = $(this).attr('id');

		$('.personal_info_edit').hide();
		$('#personal_info').hide();
		$('#personal_info_with_edit_icon').show();
		$('#personal_info_edit_cancel').show();

		$.ajax({
		    url : 'epi',
		    type: 'POST',
		    data : { js_id: js_id },
		    success: function(data)
		    {
	    		$("#personal_info_edit_content").html(data);
	    		
	    		$('#personal_info_view_content').slideUp(400); //this is actually hide
	    		$('#personal_info_edit_content').slideDown(400); //this is actually show
		    }
		});
	}); 
	//############################### END EDIT ##############################//

</script>