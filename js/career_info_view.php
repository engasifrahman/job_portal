<?php
	session_start();
	require_once('../dbconfig.php');
	global $con;

	$js_id=$_SESSION['js_info']['id'];

	$query = "SELECT * FROM career_info WHERE js_id='$js_id'";

	if (!$result = mysqli_query($con, $query)) {
	        exit(mysqli_error($con));
	}

	while($row = mysqli_fetch_assoc($result))
	{
		if (empty($row['objective']) && empty($row['summary']) && empty($row['present_salary']) &&empty($row['expected_salary']) && empty($row['job_level']) && empty($row['job_nature']))
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

			if (!empty($job_level))
			{
				$jl="Job";
			}
			else
			{
				$jl="";
			}

			if (!empty($job_nature))
			{
				$jn="Job";
			}
			else
			{
				$jn="";
			}

			echo
			'
				<div class="form-group pt-1 pb-1">

					<div class="col-xs-5 col-sm-4 col-md-3 text-xs-right text-sm-right text-md-right text-lg-right text-xl-right mobile-device"><strong class="info">Career Objective :&nbsp</strong></div>
					<div class="col-xs-7 col-sm-7 col-md-8 text-justify mobile-device">'.$row['objective'].'</div>
					<div class="clearfix pb-1"></div>

					<div class="col-xs-5 col-sm-4 col-md-3 text-xs-right text-sm-right text-md-right text-lg-right text-xl-right mobile-device"><strong class="info">Career Summary :&nbsp</strong></div>
					<div class="col-xs-7 col-sm-7 col-md-8 text-justify mobile-device">'.$row['summary'].'</div>
					<div class="clearfix pb-1"></div>

					<div class="col-xs-5 col-sm-4 col-md-3 text-xs-right text-sm-right text-md-right text-lg-right text-xl-right mobile-device"><strong class="info">Present Salary :&nbsp</strong></div>
					<div class="col-xs-7 col-sm-7 col-md-8 text-justify mobile-device">'.$row['present_salary'].'</div>
					<div class="clearfix pb-1"></div>

					<div class="col-xs-5 col-sm-4 col-md-3 text-xs-right text-sm-right text-md-right text-lg-right text-xl-right mobile-device"><strong class="info">Expected Salary :&nbsp</strong></div>
					<div class="col-xs-7 col-sm-7 col-md-8 text-justify mobile-device">'.$row['expected_salary'].'</div>
					<div class="clearfix pb-1"></div>

					<div class="col-xs-5 col-sm-4 col-md-3 text-xs-right text-sm-right text-md-right text-lg-right text-xl-right mobile-device"><strong class="info">Looking for :&nbsp</strong></div>
					<div class="col-xs-7 col-sm-7 col-md-8 text-justify mobile-device">'.$row['job_level'].' '.$jl.'</div>
					<div class="clearfix pb-1"></div>

					<div class="col-xs-5 col-sm-4 col-md-3 text-xs-right text-sm-right text-md-right text-lg-right text-xl-right mobile-device"><strong class="info">Available For :&nbsp</strong></div>
					<div class="col-xs-7 col-sm-7 col-md-8 text-justify mobile-device">'.$row['job_nature'].' '.$jn.'</div>
					<div class="clearfix"></div>

				</div>
			';
		}
	}
	
?>

<script type="text/javascript">

	//############################# BEGIN EDIT ##############################//
	$('.career_info_edit').click(function() {
		var js_id = $(this).attr('id');

		$('.career_info_edit').hide();
		$('#career_info').hide();
		$('#career_info_with_edit_icon').show();
		$('#career_info_edit_cancel').show();

		$.ajax({
		    url : 'ecri',
		    type: 'POST',
		    data : { js_id: js_id },
		    success: function(data)
		    {
	    		$("#career_info_edit_content").html(data);

	    		$('#career_info_view_content').slideUp(400);  //this is actually hide
	    		$('#career_info_edit_content').slideDown(400); //this is actually show
		    }
		});
	});
	//############################# END EDIT ##############################//

</script>