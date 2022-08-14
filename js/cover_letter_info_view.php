<?php
	session_start();
	require_once('../dbconfig.php');
	global $con;

	$js_id=$_SESSION['js_info']['id'];

	$query = "SELECT * FROM cover_letter_info WHERE js_id='$js_id'";

	if (!$result = mysqli_query($con, $query)) {
	        exit(mysqli_error($con));
	}

	while($row = mysqli_fetch_assoc($result))
	{
		echo
		'
			<div class="form-group pt-1 pb-1">

				<div class="col-xs-6 col-sm-6 col-md-6 text-xs-right text-sm-right text-md-right text-lg-right text-xl-right mobile-device"><strong class="info">Position :&nbsp</strong></div>
				<div class="col-xs-6 col-sm-6 col-md-6 text-justify mobile-device">'.$row['position'].'</div>
				<div class="clearfix pb-1"></div>

				<div class="col-xs-6 col-sm-6 col-md-6 text-xs-right text-sm-right text-md-right text-lg-right text-xl-right mobile-device"><strong class="info">Published on :&nbsp</strong></div>
				<div class="col-xs-6 col-sm-6 col-md-6 text-justify mobile-device">'.$row['published_on'].'</div>
				<div class="clearfix pb-1"></div>

				<div class="col-xs-6 col-sm-6 col-md-6 text-xs-right text-sm-right text-md-right text-lg-right text-xl-right mobile-device"><strong class="info">To (Director) :&nbsp</strong></div>
				<div class="col-xs-6 col-sm-6 col-md-6 text-justify mobile-device">'.$row['to_director'].'</div>
				<div class="clearfix pb-1"></div>

				<div class="col-xs-6 col-sm-6 col-md-6 text-xs-right text-sm-right text-md-right text-lg-right text-xl-right mobile-device"><strong class="info">Institution :&nbsp</strong></div>
				<div class="col-xs-6 col-sm-6 col-md-6 text-justify mobile-device">'.$row['institution'].'</div>
				<div class="clearfix pb-1"></div>

				<div class="col-xs-6 col-sm-6 col-md-6 text-xs-right text-sm-right text-md-right text-lg-right text-xl-right mobile-device"><strong class="info">Contact :&nbsp</strong></div>
				<div class="col-xs-6 col-sm-6 col-md-6 text-justify mobile-device">'.$row['contact_no'].'</div>
				<div class="clearfix pb-1"></div>

				<div class="col-xs-6 col-sm-6 col-md-6 text-xs-right text-sm-right text-md-right text-lg-right text-xl-right mobile-device"><strong class="info">Email :&nbsp</strong></div>
				<div class="col-xs-6 col-sm-6 col-md-6 text-justify mobile-device">'.$row['email'].'</div>
				<div class="clearfix"></div>

				<div class="pt-1 col-xs-6 col-sm-6 col-md-6 text-xs-right text-sm-right text-md-right text-lg-right text-xl-right mobile-device"><strong class="info">Address :&nbsp</strong></div>
				<div class="pt-1 col-xs-6 col-sm-6 col-md-6 text-justify mobile-device">'.$row['address'].'</div>
				<div class="clearfix"></div>

			</div>
		';
	}
	
?>

<script type="text/javascript">

	//############################# BEGIN EDIT ##############################//
	$('.cover_letter_info_edit').click(function() {
		var js_id = $(this).attr('id');

		$('.cover_letter_info_edit').hide();
		$('#cover_letter_info').hide();
		$('#cover_letter_info_with_edit_icon').show();
		$('#cover_letter_info_edit_cancel').show();

		$.ajax({
		    url : 'ecli',
		    type: 'POST',
		    data : { js_id: js_id },
		    success: function(data)
		    {
	    		$("#cover_letter_info_edit_content").html(data);

	    		$('#cover_letter_info_view_content').slideUp(400);  //this is actually hide
	    		$('#cover_letter_info_edit_content').slideDown(400); //this is actually show
		    }
		});
	});
	//############################# END EDIT ##############################//

</script>