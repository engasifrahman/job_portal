<?php
	session_start();
	require_once('../dbconfig.php');
	global $con;

	$em_id=$_SESSION['em_info']['id'];

	$query = "SELECT * FROM employer WHERE id='$em_id'";

	if (!$result = mysqli_query($con, $query)) {
	        exit(mysqli_error($con));
	}

	while($row = mysqli_fetch_assoc($result))
	{

		echo
		'
			<div class="form-group pt-1">

				<div class="col-xs-5 col-sm-4 col-md-3 text-xs-right text-sm-right text-md-right text-lg-right text-xl-right mobile-device"><strong class="info">Company Name :&nbsp</strong></div>
				<div class="col-xs-7 col-sm-7 col-md-8 text-justify mobile-device">'.$row['company_name'].'</div>
				<div class="clearfix pb-1"></div>

				<div class="col-xs-5 col-sm-4 col-md-3 text-xs-right text-sm-right text-md-right text-lg-right text-xl-right mobile-device"><strong class="info">Company Type :&nbsp</strong></div>
				<div class="col-xs-7 col-sm-7 col-md-8 text-justify mobile-device">'.$row['company_type'].'</div>
				<div class="clearfix pb-1"></div>

				<div class="col-xs-5 col-sm-4 col-md-3 text-xs-right text-sm-right text-md-right text-lg-right text-xl-right mobile-device"><strong class="info">Company Category :&nbsp</strong></div>
				<div class="col-xs-7 col-sm-7 col-md-8 text-justify mobile-device">'.$row['company_category'].'</div>
				<div class="clearfix pb-1"></div>

				<div class="col-xs-5 col-sm-4 col-md-3 text-xs-right text-sm-right text-md-right text-lg-right text-xl-right mobile-device"><strong class="info">Company Size :&nbsp</strong></div>
				<div class="col-xs-7 col-sm-7 col-md-8 text-justify mobile-device">'.$row['company_size'].'</div>
				<div class="clearfix pb-1"></div>

				<div class="col-xs-5 col-sm-4 col-md-3 text-xs-right text-sm-right text-md-right text-lg-right text-xl-right mobile-device"><strong class="info">Employer Type :&nbsp</strong></div>
				<div class="col-xs-7 col-sm-7 col-md-8 text-justify mobile-device">'.$row['employer_type'].'</div>
				<div class="clearfix pb-1"></div>

				<div class="col-xs-5 col-sm-4 col-md-3 text-xs-right text-sm-right text-md-right text-lg-right text-xl-right mobile-device"><strong class="info">City :&nbsp</strong></div>
				<div class="col-xs-7 col-sm-7 col-md-8 text-justify mobile-device">'.$row['city'].'</div>
				<div class="clearfix pb-1"></div>

				<div class="col-xs-5 col-sm-4 col-md-3 text-xs-right text-sm-right text-md-right text-lg-right text-xl-right mobile-device"><strong class="info">ZIP Code :&nbsp</strong></div>
				<div class="col-xs-7 col-sm-7 col-md-8 text-justify mobile-device">'.$row['zip_code'].'</div>
				<div class="clearfix pb-1"></div>

				<div class="col-xs-5 col-sm-4 col-md-3 text-xs-right text-sm-right text-md-right text-lg-right text-xl-right mobile-device"><strong class="info">Location :&nbsp</strong></div>
				<div class="col-xs-7 col-sm-7 col-md-8 text-justify mobile-device">'.$row['location'].'</div>
				<div class="clearfix pb-1"></div>

				<div class="col-xs-5 col-sm-4 col-md-3 text-xs-right text-sm-right text-md-right text-lg-right text-xl-right mobile-device"><strong class="info">Web Site :&nbsp</strong></div>
				<div class="col-xs-7 col-sm-7 col-md-8 text-justify mobile-device">'.$row['web_url'].'</div>
				<div class="clearfix pb-1"></div>

				<div class="col-xs-5 col-sm-4 col-md-3 text-xs-right text-sm-right text-md-right text-lg-right text-xl-right mobile-device"><strong class="info">Mobile No :&nbsp</strong></div>
				<div class="col-xs-7 col-sm-7 col-md-8 text-justify mobile-device">'.$row['mobile_number'].'</div>
				<div class="clearfix pb-1"></div>

				<div class="col-xs-5 col-sm-4 col-md-3 text-xs-right text-sm-right text-md-right text-lg-right text-xl-right mobile-device"><strong class="info">Phone No :&nbsp</strong></div>
				<div class="col-xs-7 col-sm-7 col-md-8 text-justify mobile-device">'.$row['phone_number'].'</div>
				<div class="clearfix pb-1"></div>

				<div class="col-xs-5 col-sm-4 col-md-3 text-xs-right text-sm-right text-md-right text-lg-right text-xl-right mobile-device"><strong class="info">Profile Privacy :&nbsp</strong></div>
				<div class="col-xs-7 col-sm-7 col-md-8 text-justify mobile-device">'.$row['profile_privacy'].'</div>
				<div class="clearfix pb-1"></div>

				<div class="col-xs-5 col-sm-4 col-md-3 text-xs-right text-sm-right text-md-right text-lg-right text-xl-right mobile-device"><strong class="info">Portfolio :&nbsp</strong></div>
				<div class="col-xs-7 col-sm-7 col-md-8 text-justify mobile-device">
					<div class="fr-view">
						'.$row['portfolio'].'
					</div>
				</div>
				<div class="clearfix pb-1"></div>
			</div>
		';
		
	}
	
?>

<script type="text/javascript">

	//############################# BEGIN EDIT ##############################//
	$('.company_info_edit').click(function() {
		var em_id = $(this).attr('id');

		$('.company_info_edit').hide();
		$('#company_info').hide();
		$('#company_info_with_edit_icon').show();
		$('#company_info_edit_cancel').show();

		$.ajax({
		    url : 'eci',
		    type: 'POST',
		    data : { em_id: em_id },
		    beforeSend: function() {
                $('#cp_info_notification_content').show().fadeOut(6100).html('<div class="text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">LOADING...</div>');
            },
		    success: function(data)
		    {
	    		$("#company_info_edit_content").html(data);

	    		$('#company_info_view_content').slideUp(400);  //this is actually hide
	    		$('#company_info_edit_content').slideDown(400); //this is actually show
		    },
            error: function() {
                $.notify({
                    // where to append the toast notification
                    wrapper: 'body',

                    // toast message
                    message: 'Error here',

                    // success, info, error, warn
                    type: 'error',

                    // 1: top-left, 2: top-center, 3: top-right
                    // 4: mid-left, 5: mid-right
                    // 6: bottom-left, 7: bottom-center, 8: bottom-right
                    position: 3,

                    // or 'rtl'
                    dir: 'ltr',

                    // enable/disable auto close
                    autoClose: true,

                    // timeout in milliseconds
                    duration: 4000
                  
                });
            }
		});
	});
	//############################# END EDIT ##############################//

</script>