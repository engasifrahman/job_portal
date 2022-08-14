<?php
	session_start();
	require_once('../dbconfig.php');
	global $con;

	$em_id=$_SESSION['em_info']['id'];

   if(isset($_FILES['company_logo']))
   {
   		$folder_dir = '../user_info/employer/'.$em_id.'/company_logo';

   		if (!is_dir($folder_dir)) {
		    mkdir($folder_dir, 0777, true);
		}

	    $file_tmp = $_FILES['company_logo']['tmp_name'];
	   	$file_name = $_FILES['company_logo']['name'];
	    $file_size = $_FILES['company_logo']['size'];
	    $file_type = $_FILES['company_logo']['type'];

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
	                message: 'Imsge size can not be more than 2 MB',

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

				$query = "UPDATE employer SET logo_dir='$target_dir' WHERE id='$em_id'";

				if (!$result = mysqli_query($con, $query))
				{
			        exit(mysqli_error($con));
			    }
			    else
			    {
			    	$_SESSION['em_info']['logo']=$target_dir;
			    	?>
			    	
			    	<script type="text/javascript">

		                $( document ).ready(function() {
		                    $('#company_logo_modal').modal('hide');
		                });

		                $.post("vcl", function(data) {
		                    $("#company_logo_view_content").html(data);
		                });
			    		$('#company_logo_edit_content').slideUp(400); //this is actually hide

		                $.notify({
		                    // where to append the toast notification
		                    wrapper: 'body',

		                    // toast message
		                    message: 'Company Logo uploaded Successfully!',

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
		                message: 'Sorry, Bad Image format please choose another image',

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
                message: 'Please choose a valid image',

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