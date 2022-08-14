	<?php
	session_start();
	require_once('../dbconfig.php');
	global $con;

	$js_id=$_SESSION['js_info']['id'];
	$js_name=$_SESSION['js_info']['name'];

   if(isset($_FILES['resume_upload']))
   {
   		$folder_dir = '../user_info/job_sekeer/'.$js_id.'/uploaded_resume';

   		if (!is_dir($folder_dir)) {
		    mkdir($folder_dir, 0777, true);
		}

	    $file_tmp = $_FILES['resume_upload']['tmp_name'];
	   	$file_name = $_FILES['resume_upload']['name'];
	    $file_size = $_FILES['resume_upload']['size'];
	    $file_type = $_FILES['resume_upload']['type'];

	    $file_ext=strtolower(pathinfo($file_name,PATHINFO_EXTENSION));
		$target_dir = $folder_dir .'/'.$js_name.' ('.date('Y-m-d').').'.$file_ext;
	    $expensions= array("pdf","doc","docx");
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
					message: 'Extension not allowed, please choose a PDF, DOC, DOCX file',

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
      	if($file_size > 1048580)
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

				$query = "UPDATE job_seeker SET up_resume_dir='$target_dir' WHERE id='$js_id'";

				if (!$result = mysqli_query($con, $query))
				{
			        exit(mysqli_error($con));
			    }
			    else
			    {
			    	$_SESSION['js_info']['resume']=$target_dir;
			    	?>
			    	
			    	<script type="text/javascript">
						 $.post("uplrv", function(data) {
		                    $("#resume_upload_view_content").html(data);
		                });

						$.notify({

							// where to append the toast notification
							wrapper: 'body',

							// toast message
							message: 'Resume uploaded Successfully!',

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
						message: 'Sorry, Bad Image format please select another image',

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