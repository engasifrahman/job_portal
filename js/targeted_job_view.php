<?php
	session_start();
	require_once('../dbconfig.php');
	global $con;

	$js_id=$_SESSION['js_info']['id'];

	$query = "SELECT * FROM targeted_job WHERE js_id='$js_id'";

	if (!$result = mysqli_query($con, $query))
	{
	        exit(mysqli_error($con));
	}

	while($row = mysqli_fetch_assoc($result))
	{
		if (empty($row['keywords']) && empty($row['job_categories']) && empty($row['job_location']) &&empty($row['business'])) 
		{
			echo
			'
				<div class="text-sm-center text-md-center text-lg-center text-xl-center">
					<strong class="text-warning">You have no records yet</strong>
				</div>
			';
		}

		else
		{
			echo 
			'
				<div class="form-group pt-1 pb-1">

					<div class="col-xs-5 col-sm-4 col-md-3 text-xs-right text-sm-right text-md-right text-lg-right text-xl-right mobile-device"><strong class="info">Keywords :&nbsp</strong></div>
					<div class="col-xs-7 col-sm-7 col-md-8 text-justify mobile-device">'.$row['keywords'].'</div>
					<div class="clearfix pb-1"></div>

					<div class="col-xs-5 col-sm-4 col-md-3 text-xs-right text-sm-right text-md-right text-lg-right text-xl-right mobile-device"><strong class="info">Preferred job Categories :&nbsp</strong></div>
					<div class="col-xs-7 col-sm-7 col-md-8 text-justify mobile-device">'.$row['job_categories'].'</div>
					<div class="clearfix pb-1"></div>

					<div class="col-xs-5 col-sm-4 col-md-3 text-xs-right text-sm-right text-md-right text-lg-right text-xl-right mobile-device"><strong class="info">Prefrred Job Location :&nbsp</strong></div>
					<div class="col-xs-7 col-sm-7 col-md-8 text-justify mobile-device ">'.$row['job_location'].'</div>
					<div class="clearfix pb-1"></div>

					<div class="col-xs-5 col-sm-4 col-md-3 text-xs-right text-sm-right text-md-right text-lg-right text-xl-right mobile-device"><strong class="info">Preferred Business :&nbsp</strong></div>
					<div class="col-xs-7 col-sm-7 col-md-8 text-justify mobile-device">'.$row['business'].'</div>
					<div class="clearfix"></div>

				</div>
			';
		}
	}
	
?>

<script type="text/javascript">

	//############################### BEGIN EDIT ##############################//
	$('.targeted_job_edit').click(function() {
		var js_id = $(this).attr('id');

		$('.targeted_job_edit').hide();
		$('#targeted_job').hide();
		$('#targeted_job_with_edit_icon').show();
		$('#targeted_job_edit_cancel').show();

		$.ajax({
		    url : 'etj',
		    type: 'POST',
		    data : { js_id: js_id },
		    success: function(data)
		    {
	    		$("#targeted_job_edit_content").html(data);

	    		$('#targeted_job_view_content').slideUp(400);  //this is actually hide
	    		$('#targeted_job_edit_content').slideDown(400); //this is actually show
		    }
		});
	});
	//############################### END EDIT ##############################//
</script>