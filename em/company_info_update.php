<?php
	session_start();
	require_once('../dbconfig.php');
	global $con;

	$em_id = $_SESSION['em_info']['id'];

	$company_name_edit 	= $_POST['company_name_edit'];
	$company_type 		= $_POST['company_type'];
	$company_category 	= $_POST['company_category'];
	$company_size 		= $_POST['company_size'];
	$portfolio 			= addslashes($_POST['portfolio']);
	$city 				= $_POST['city'];
	$zip_code 			= $_POST['zip_code'];
	$location 			= $_POST['location'];
	$web_url 			= $_POST['web_url'];
	$mobile_number 		= $_POST['mobile_number'];
	$phone_number 		= $_POST['phone_number'];

	if (isset($_POST['employer_type']) && !empty($_POST['employer_type']))
	{
		$employer_type = $_POST['employer_type'];
	}
	else
	{
		$employer_type = NULL;
	}
	
	if (isset($_POST['profile_privacy']) && !empty($_POST['profile_privacy']))
	{
		$profile_privacy = $_POST['profile_privacy'];
	}
	else
	{
		$profile_privacy = NULL;
	}
	

	if(!empty($em_id) && !empty($company_name_edit) && !empty($company_type) && !empty($company_category) && !empty($company_size) && !empty($city) && !empty($location) && !empty($mobile_number) && !empty($employer_type) && !empty($profile_privacy))
	{

		$query = "UPDATE employer SET company_name='$company_name_edit', company_type='$company_type', company_category='$company_category', company_size='$company_size', portfolio='$portfolio', city='$city',zip_code='$zip_code', location='$location', web_url='$web_url', mobile_number='$mobile_number', phone_number='$phone_number', employer_type='$employer_type', profile_privacy='$profile_privacy' WHERE id='$em_id'";

		if (!$result = mysqli_query($con, $query))
		{
	        exit(mysqli_error($con));
	    }
	    else
	    {
	    	$_SESSION['em_info']['company_name']=$company_name_edit;
	    	?>
	    	
	    	<script type="text/javascript">
	    		$('#company_info_edit_content').slideUp(400); //this is actually hide
                $('#company_info_view_content').slideDown(400); //this is actually show
                $('.company_info_edit').show();
                $('#company_info').show();
                $('#company_info_with_edit_icon').hide();
                $('#company_info_edit_cancel').hide();

                $.post("vci", function(data) {
                    $("#company_info_view_content").html(data);
                });

                $.notify({
                    // where to append the toast notification
                    wrapper: 'body',

                    // toast message
                    message: 'New record updated successfully!',

                    // success, info, error, warn
                    type: 'success',

                    // 1: top-left, 2: top-center, 3: top-right
                    // 4: mid-left, 5: mid-right
                    // 6: bottom-left, 7: bottom-center, 8: bottom-right
                    position: 3,

                    // or 'rtl'
                    dir: 'ltr',

                    // enable/disable auto close
                    autoClose: true,

                    // timeout in milliseconds
                    duration: 3000
                  
                });
	    	</script>
	    	<?php
	    }

	}

	else
	{
		?>
		<script type="text/javascript">
		    $.notify({
                // where to append the toast notification
                wrapper: 'body',

                // toast message
                message: 'Please fill up required field',

                // success, info, error, warn
                type: 'warn',

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
		</script>
		<?php
	}