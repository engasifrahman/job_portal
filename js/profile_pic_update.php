<?php
	session_start();
	require_once('../dbconfig.php');
	global $con;

	$js_id=$_SESSION['js_info']['id'];

   if(isset($_FILES['profile_pic']))
   {
   		$folder_dir = '../user_info/job_sekeer/'.$js_id.'/profile_picture';

   		if (!is_dir($folder_dir)) {
		    mkdir($folder_dir, 0777, true);
		}

	    $file_tmp = $_FILES['profile_pic']['tmp_name'];
	   	$file_name = $_FILES['profile_pic']['name'];
	    $file_size = $_FILES['profile_pic']['size'];
	    $file_type = $_FILES['profile_pic']['type'];

	    $file_ext=strtolower(pathinfo($file_name,PATHINFO_EXTENSION));
		$target_dir = $folder_dir .'/'.date('d_m_Y_H_i_s').'.'.$file_ext;
	    $expensions= array("jpeg","jpg","png");
		$uploadOk = 1;

		// Allow certain file formats
      	if(in_array($file_ext,$expensions)=== false)
      	{
      		?>
			<script type="text/javascript">
				$.notify({

					// where to append the toast notification
					wrapper: 'body',

					// toast message
					message: 'Extension not allowed, please choose a JPEG, JPG or PNG file',

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

         	$uploadOk = 0;
      	}

      	// Check file size
      	if($file_size > 2097160)
      	{
      		?>
			<script type="text/javascript">
				$.notify({

					// where to append the toast notification
					wrapper: 'body',

					// toast message
					message: 'File size can not be more than 2 MB',

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
			
         	$uploadOk = 0;
      	}

      	// Check if $uploadOk is set to 1 
		if ($uploadOk == 1)
		{
     		if (move_uploaded_file($file_tmp,$target_dir))
     		{

				$query = "UPDATE job_seeker SET pic_dir='$target_dir' WHERE id='$js_id'";

				if (!$result = mysqli_query($con, $query))
				{
			        exit(mysqli_error($con));
			    }
			    else
			    {
			    	$_SESSION['js_info']['picture']=$target_dir;
			    	?>
			    	
			    	<script type="text/javascript">

		                $.post("euia", function(data) {
		                    $("#userinfo_after_edit").html(data);
		                });

		                $.post("vpp", function(data) {
		                    $("#profile_pic_view_content").html(data);
		                });
		                
		                $("#userinfo_before_edit").hide();
		                $("#userinfo_after_edit").show();

		                $( document ).ready(function() {
		                    $('#profile_pic_modal').modal('hide');
		                });

			    		$('#profile_pic_edit_content').slideUp(400); //this is actually hide

		                $.notify({

							// where to append the toast notification
							wrapper: 'body',

							// toast message
							message: 'Profile picture uploaded Successfully!',

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
						message: 'Bad Image format please select another image',

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
				message: 'Please choose an valid image',

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
    	</script>
		<?php
	}