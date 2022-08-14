<?php
	session_start();
	require_once('../dbconfig.php');
	global $con;

	$em_id = $_SESSION['em_info']['id'];

	$full_name 		= $_POST['full_name'];
	$gender 		= $_POST['gender'];
	$designation 	= $_POST['designation'];
	$department 	= $_POST['department'];
	$mobile_no 		= $_POST['mobile_no'];
	$phone_no 		= $_POST['phone_no'];
	$email 			= $_POST['email'];
	$address 		= $_POST['address'];
	
	if(!empty($em_id) && !empty($full_name) && !empty($gender) && !empty($designation) && !empty($department) && !empty($mobile_no) && !empty($email) && !empty($address))
	{

		$query = "UPDATE em_contact_person SET full_name='$full_name', gender='$gender', designation='$designation', department='$department', mobile_no='$mobile_no', phone_no='$phone_no',email='$email', address='$address' WHERE em_id='$em_id'";

		if (!$result = mysqli_query($con, $query))
		{
	        exit(mysqli_error($con));
	    }
	    else
	    {
            $_SESSION['em_info']['cp_name']=$full_name;
	    	?>
	    	<script type="text/javascript">
	    		$('#cp_info_edit_content').slideUp(400); //this is actually hide
                $('#cp_info_view_content').slideDown(400); //this is actually show
                $('.cp_info_edit').show();
                $('#cp_info').show();
                $('#cp_info_with_edit_icon').hide();
                $('#cp_info_edit_cancel').hide();
                $("#userinfo_before_edit").hide();
                $("#userinfo_after_edit").show();

                $.post("euia", function(data) {
                    $("#userinfo_after_edit").html(data);
                });

                $.post("vcpi", function(data) {
                    $("#cp_info_view_content").html(data);
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