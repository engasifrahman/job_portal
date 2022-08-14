<?php
	session_start();
	require_once('../dbconfig.php');
	global $con;

	$js_id=$_SESSION['js_info']['id'];

	$query = "SELECT specialized_skills,extracurricular_activities FROM specialization WHERE js_id='$js_id'";

	if (!$result = mysqli_query($con, $query))
	{
	        exit(mysqli_error($con));
	}

	while($row = mysqli_fetch_assoc($result))
	{
		if (empty($row['specialized_skills']) && empty($row['extracurricular_activities'])) 
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

					<div class="col-xs-5 col-sm-4 col-md-3 text-xs-right text-sm-right text-md-right text-lg-right text-xl-right mobile-device"><strong class="info">Specialized skills :&nbsp</strong></div>
					<div class="col-xs-7 col-sm-7 col-md-8 text-justify mobile-device">'.$row['specialized_skills'].'</div>
					<div class="clearfix pb-1"></div>

					<div class="col-xs-5 col-sm-4 col-md-3 text-xs-right text-sm-right text-md-right text-lg-right text-xl-right mobile-device"><strong class="info">Extracurricular Activities :&nbsp</strong></div>
					<div class="col-xs-7 col-sm-7 col-md-8 text-justify mobile-device">'.$row['extracurricular_activities'].'</div>
					<div class="clearfix"></div>

				</div>
			';
		}
	}
	
?>

<script type="text/javascript">

	//############################### BEGIN EDIT ##############################//
	$('.specialization_edit').click(function() {
		var js_id = $(this).attr('id');

		$('.specialization_edit').hide();
		$('#specialization').hide();
		$('#specialization_with_edit_icon').show();
		$('#specialization_edit_cancel').show();

		$.ajax({
		    url : 'esp',
		    type: 'POST',
		    data : { js_id: js_id },
		    success: function(data)
		    {
	    		$("#specialization_edit_content").html(data);

	    		$('#specialization_view_content').slideUp(400);  //this is actually hide
	    		$('#specialization_edit_content').slideDown(400); //this is actually show
		    }
		});
	});
	//############################### END EDIT ##############################//

</script>