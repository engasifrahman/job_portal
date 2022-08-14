<?php
	session_start();
	require_once('../dbconfig.php');
	global $con;

	$js_id = $_SESSION['js_info']['id'];
	$js_email = $_SESSION['js_info']['email'];
	$js_uname = $_SESSION['js_info']['uname'];
	$js_pass = $_SESSION['js_info']['pass'];


	$old_uname_n_js_uname_match=0;
	$new_uname_n_old_uname_unmatch=0;
	$old_email_n_js_email_match=0;
	$new_email_n_old_email_unmatch=0;
	$old_pass_n_js_pass_match=0;
	$new_pass_n_old_pass_unmatch=0;
	$new_pass_n_cpass_match=0;


	$uname_email_pass_check=0;
	$uname_email_check=0;
	$email_pass_check=0;
	$uname_pass_check=0;
	$uname_check=0;
	$email_check=0;
	$pass_check=0;


	$uname_email_pass_update=0;

	$uname_email_update=0;
	$email_pass_update=0;
	$uname_pass_update=0;

	$uname_update=0;
	$email_update=0;
	$pass_update=0;

	//############################# BEGIN Username, Email & Password Check for Update #############################//
	if (!empty($_POST['old_uname']) && !empty($_POST['new_uname']) && !empty($_POST['old_email']) && !empty($_POST['new_email']) && !empty($_POST['old_pass']) && !empty($_POST['new_pass']) && !empty($_POST['confirm_pass']))
	{
		$uname_email_pass_check=1;

		if ($_POST['old_uname']==$js_uname)
		{
			$old_uname_n_js_uname_match=1;
		}
		if ($_POST['new_uname']!=$js_uname)
		{
			$new_uname_n_old_uname_unmatch=1;
		}


		if ($_POST['old_email']==$js_email)
		{
			$old_email_n_js_email_match=1;
		}
		if ($_POST['new_email']!=$js_email)
		{
			$new_email_n_old_email_unmatch=1;
		}


		if (md5($_POST['old_pass'])==$js_pass)
		{
			$old_pass_n_js_pass_match=1;
		}
		if (md5($_POST['new_pass'])!=$js_pass)
		{
			$new_pass_n_old_pass_unmatch=1;
		}
		if ($_POST['new_pass']==$_POST['confirm_pass'])
		{
			$new_pass_n_cpass_match=1;
		}

		if ($old_uname_n_js_uname_match==1 && $new_uname_n_old_uname_unmatch==1 && $old_email_n_js_email_match==1 && $new_email_n_old_email_unmatch==1 && $old_pass_n_js_pass_match==1 && $new_pass_n_old_pass_unmatch==1 && $new_pass_n_cpass_match==1)
		{
			$uname_email_pass_update=1;
		}
	}############################# END Username, Email & Password Check for Upd##############################//

	//################################## BEGIN Username & email Check for Update##################################//
	elseif (!empty($_POST['old_uname']) && !empty($_POST['new_uname']) && !empty($_POST['old_email']) && !empty($_POST['new_email']) && empty($_POST['old_pass']) && empty($_POST['new_pass']) && empty($_POST['confirm_pass']))
	{
		$uname_email_check=1;
		if ($_POST['old_uname']==$js_uname)
		{
			$old_uname_n_js_uname_match=1;
		}
		if ($_POST['new_uname']!=$js_uname)
		{
			$new_uname_n_old_uname_unmatch=1;
		}


		if ($_POST['old_email']==$js_email)
		{
			$old_email_n_js_email_match=1;
		}
		if ($_POST['new_email']!=$js_email)
		{
			$new_email_n_old_email_unmatch=1;
		}


		if ($old_uname_n_js_uname_match==1 && $new_uname_n_old_uname_unmatch==1 && $old_email_n_js_email_match==1 && $new_email_n_old_email_unmatch==1)
		{
			$uname_email_update=1;
		}
	}
	//############################# END Username & email Check for Update ####################//

	//############################ BEGIN Email & Password Check for Upd####################//
	elseif (empty($_POST['old_uname']) && empty($_POST['new_uname']) && !empty($_POST['old_email']) && !empty($_POST['new_email']) && !empty($_POST['old_pass']) && !empty($_POST['new_pass']) && !empty($_POST['confirm_pass']))
	{
		$email_pass_check=1;
		if ($_POST['old_email']==$js_email)
		{
			$old_email_n_js_email_match=1;
		}
		if ($_POST['new_email']!=$js_email)
		{
			$new_email_n_old_email_unmatch=1;
		}


		if (md5($_POST['old_pass'])==$js_pass)
		{
			$old_pass_n_js_pass_match=1;
		}
		if (md5($_POST['new_pass'])!=$js_pass)
		{
			$new_pass_n_old_pass_unmatch=1;
		}
		if ($_POST['new_pass']==$_POST['confirm_pass'])
		{
			$new_pass_n_cpass_match=1;
		}


		if ($old_email_n_js_email_match==1 && $new_email_n_old_email_unmatch==1 && $old_pass_n_js_pass_match==1 && $new_pass_n_old_pass_unmatch==1 && $new_pass_n_cpass_match==1)
		{
			$email_pass_update=1;
		}
	}
	//###################################### END Email & Password Check for Update######################################//

	//################################### BEGIN Username & Password Check for Update ###################################//
	elseif (!empty($_POST['old_uname']) && !empty($_POST['new_uname']) && empty($_POST['old_email']) && empty($_POST['new_email']) && !empty($_POST['old_pass']) && !empty($_POST['new_pass']) && !empty($_POST['confirm_pass']))
	{
		$uname_pass_check=1;

		if ($_POST['old_uname']==$js_uname)
		{
			$old_uname_n_js_uname_match=1;
		}
		if ($_POST['new_uname']!=$js_uname)
		{
			$new_uname_n_old_uname_unmatch=1;
		}


		if (md5($_POST['old_pass'])==$js_pass)
		{
			$old_pass_n_js_pass_match=1;
		}
		if (md5($_POST['new_pass'])!=$js_pass)
		{
			$new_pass_n_old_pass_unmatch=1;
		}
		if ($_POST['new_pass']==$_POST['confirm_pass'])
		{
			$new_pass_n_cpass_match=1;
		}

		if ($old_uname_n_js_uname_match==1 && $new_uname_n_old_uname_unmatch==1 && $old_pass_n_js_pass_match==1 && $new_pass_n_old_pass_unmatch==1 && $new_pass_n_cpass_match==1)
		{
			$uname_pass_update=1;
		}
	}
	//################################### END Username & Password Check for Update ####################################//

	//###################################### BEGIN Username Check for Update ######################################//
	elseif (!empty($_POST['old_uname']) && !empty($_POST['new_uname']) && empty($_POST['old_email']) && empty($_POST['new_email']) && empty($_POST['old_pass']) && empty($_POST['new_pass']) && empty($_POST['confirm_pass']))
	{
		$uname_check=1;
		if ($_POST['old_uname']==$js_uname)
		{
			$old_uname_n_js_uname_match=1;
		}
		if ($_POST['new_uname']!=$js_uname)
		{
			$new_uname_n_old_uname_unmatch=1;
		}

		if ($old_uname_n_js_uname_match==1 && $new_uname_n_old_uname_unmatch==1)
		{
			$uname_update=1;
		}
	}
	//######################################## END Username Check for Update ########################################//

	//######################################## BEGIN Email Check for Update ########################################//
	elseif (empty($_POST['old_uname']) && empty($_POST['new_uname']) && !empty($_POST['old_email']) && !empty($_POST['new_email']) && empty($_POST['old_pass']) && empty($_POST['new_pass']) && empty($_POST['confirm_pass']))
	{
		$email_check=1;
		if ($_POST['old_email']==$js_email)
		{
			$old_email_n_js_email_match=1;
		}
		if ($_POST['new_email']!=$js_email)
		{
			$new_email_n_old_email_unmatch=1;
		}

		if ( $old_email_n_js_email_match==1 && $new_email_n_old_email_unmatch==1)
		{
			$email_update=1;
		}
	}
	//######################################## END Email Check for Update ########################################//

	//###################################### BEGIN Password Check for Update ######################################//

	elseif (empty($_POST['old_uname']) && empty($_POST['new_uname']) && empty($_POST['old_email']) && empty($_POST['new_email']) && !empty($_POST['old_pass']) && !empty($_POST['new_pass']) && !empty($_POST['confirm_pass']))
	{
		$pass_check=1;
		if (md5($_POST['old_pass'])==$js_pass)
		{
			$old_pass_n_js_pass_match=1;
		}
		if (md5($_POST['new_pass'])!=$js_pass)
		{
			$new_pass_n_old_pass_unmatch=1;
		}
		if ($_POST['new_pass']==$_POST['confirm_pass'])
		{
			$new_pass_n_cpass_match=1;
		}

		if ($old_pass_n_js_pass_match==1 && $new_pass_n_old_pass_unmatch==1 && $new_pass_n_cpass_match==1)
		{
			$pass_update=1;
		}
	}
	//####################################### END Password Check for Update #######################################//

	//############################# BEGIN Username, Email & Password Update #############################//
	if ($uname_email_pass_update==1) 
	{
		$new_email=$_POST['new_email'];
		$new_uname=$_POST['new_uname'];
		$new_pass=md5($_POST['new_pass']);

		$query = "UPDATE job_seeker SET email='$new_email', username='$new_uname', password='$new_pass' WHERE id='$js_id'";

		if (!$result = mysqli_query($con, $query))
		{
	        //exit(mysqli_error($con));
			?>
			<script type="text/javascript">
				$.notify({

					// where to append the toast notification
					wrapper: 'body',

					// toast message
					message: 'This email/username already used please choose another email',

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
					duration: 3000
				  
				});
			</script>
			<?php
	    }
	    else
	    {

	    	$_SESSION['js_info']['email']=$new_email;
	    	$_SESSION['js_info']['uname']=$new_uname;
	    	$_SESSION['js_info']['pass']=$new_pass;

	    	?>
	    	<script type="text/javascript">
                $.post("stngv", function(data) {
                    $("#settings_view_content").html(data);
                });

				$.notify({

					// where to append the toast notification
					wrapper: 'body',

					// toast message
					message: 'New username, email & password updated successfully!',

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
	//############################# END Username, Email & Password Update #############################//

	//############################# BEGIN Username, Email Update #############################//
	elseif ($uname_email_update==1) 
	{
		$new_email=$_POST['new_email'];
		$new_uname=$_POST['new_uname'];

		$query = "UPDATE job_seeker SET email='$new_email', username='$new_uname' WHERE id='$js_id'";

		if (!$result = mysqli_query($con, $query))
		{
	        //exit(mysqli_error($con));
			?>
			<script type="text/javascript">
				$.notify({

					// where to append the toast notification
					wrapper: 'body',

					// toast message
					message: 'This email/username already used please choose another email/username',

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
					duration: 3000
				  
				});
			</script>
			<?php
	    }
	    else
	    {

	    	$_SESSION['js_info']['email']=$new_email;
	    	$_SESSION['js_info']['uname']=$new_uname;

	    	?>
	    	<script type="text/javascript">
                $.post("stngv", function(data) {
                    $("#settings_view_content").html(data);
                });
				$.notify({

					// where to append the toast notification
					wrapper: 'body',

					// toast message
					message: 'New username & email updated successfully!',

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
	//############################# END Username, Email Update #############################//

	//############################# BEGIN Email & Pass Update #############################//
	elseif ($email_pass_update==1) 
	{
		$new_email=$_POST['new_email'];
		$new_pass=md5($_POST['new_pass']);

		$query = "UPDATE job_seeker SET email='$new_email', password='$new_pass' WHERE id='$js_id'";

		if (!$result = mysqli_query($con, $query))
		{
	        //exit(mysqli_error($con));
			?>
			<script type="text/javascript">
				$.notify({

					// where to append the toast notification
					wrapper: 'body',

					// toast message
					message: 'This email already used please choose another email',

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
					duration: 3000
				  
				});
			</script>
			<?php
	    }
	    else
	    {

	    	$_SESSION['js_info']['email']=$new_email;
	    	$_SESSION['js_info']['pass']=$new_pass;

	    	?>
	    	<script type="text/javascript">
                $.post("stngv", function(data) {
                    $("#settings_view_content").html(data);
                });
	    		$.notify({

					// where to append the toast notification
					wrapper: 'body',

					// toast message
					message: 'New email & password updated successfully!',

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
	//############################# END Email & Pass Update #############################//

	//############################# BEGIN Username & Pass Update #############################//
	elseif ($uname_pass_update==1) 
	{
		$new_uname=$_POST['new_uname'];
		$new_pass=md5($_POST['new_pass']);

		$query = "UPDATE job_seeker SET username='$new_uname', password='$new_pass' WHERE id='$js_id'";

		if (!$result = mysqli_query($con, $query))
		{
	        //exit(mysqli_error($con));
			?>
			<script type="text/javascript">
				$.notify({

					// where to append the toast notification
					wrapper: 'body',

					// toast message
					message: 'This username already used please choose another username',

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
					duration: 3000
				  
				});
			</script>
			<?php
	    }
	    else
	    {

	    	$_SESSION['js_info']['uname']=$new_uname;
	    	$_SESSION['js_info']['pass']=$new_pass;

	    	?>
	    	<script type="text/javascript">
                $.post("stngv", function(data) {
                    $("#settings_view_content").html(data);
                });
	    		$.notify({

					// where to append the toast notification
					wrapper: 'body',

					// toast message
					message: 'New username & password updated successfully',

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
	//############################# END Username & Pass Update #############################//

	//############################# BEGIN Username Update #############################//
	elseif ($uname_update==1) 
	{
		$new_uname=$_POST['new_uname'];

		$query = "UPDATE job_seeker SET username='$new_uname' WHERE id='$js_id'";

		if (!$result = mysqli_query($con, $query))
		{
	        //exit(mysqli_error($con));
			?>
			<script type="text/javascript">
				$.notify({

					// where to append the toast notification
					wrapper: 'body',

					// toast message
					message: 'This username already used please choose another username',

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
					duration: 3000
				  
				});
			</script>
			<?php
	    }
	    else
	    {

	    	$_SESSION['js_info']['uname']=$new_uname;

	    	?>
	    	<script type="text/javascript">
                $.post("stngv", function(data) {
                    $("#settings_view_content").html(data);
                });
	    		$.notify({

					// where to append the toast notification
					wrapper: 'body',

					// toast message
					message: 'New username updated successfully!',

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
	//############################# END Username Update #############################//

	//############################# BEGIN Email Update #############################//
	elseif ($email_update==1) 
	{
		$new_email=$_POST['new_email'];

		$query = "UPDATE job_seeker SET email='$new_email' WHERE id='$js_id'";

		if (!$result = mysqli_query($con, $query))
		{
	        //exit(mysqli_error($con));
			?>
			<script type="text/javascript">
				$.notify({

					// where to append the toast notification
					wrapper: 'body',

					// toast message
					message: 'This email already used please choose another email',

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
					duration: 3000
				  
				});
			</script>
			<?php
	    }
	    else
	    {

	    	$_SESSION['js_info']['email']=$new_email;

	    	?>
	    	<script type="text/javascript">
                $.post("stngv", function(data) {
                    $("#settings_view_content").html(data);
                });
	    		$.notify({

					// where to append the toast notification
					wrapper: 'body',

					// toast message
					message: 'New email updated successfully!',

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
	//############################# END Email Update #############################//

	//############################# BEGIN Pass Update #############################//
	elseif ($pass_update==1) 
	{
		$new_pass=md5($_POST['new_pass']);

		$query = "UPDATE job_seeker SET password='$new_pass' WHERE id='$js_id'";

		if (!$result = mysqli_query($con, $query))
		{
	        //exit(mysqli_error($con));
			?>
			<script type="text/javascript">
				$.notify({

					// where to append the toast notification
					wrapper: 'body',

					// toast message
					message: 'Something went wrong please try again later',

					// success, info, error, warn
					type: 'error',

					// 1: top-left, 2: top-center, 3: top-right
					// 4: mid-left, 5: mid-right
				 	// 6: bottom-left, 7: bottom-center, 8: bottom-right
					position: 3,

					// or 'rtl'
					dir: 'ltr',

					// enable/disable auto close
					autoClose: false,

					// timeout in milliseconds
					duration: 4000
				  
				});
			</script>
			<?php
	    }
	    else
	    {

	    	$_SESSION['js_info']['pass']=$new_pass;

	    	?>
	    	<script type="text/javascript">
                $.post("stngv", function(data) {
                    $("#settings_view_content").html(data);
                });
	    		$.notify({

					// where to append the toast notification
					wrapper: 'body',

					// toast message
					message: 'New password updated successfully!',

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
					duration: 4000
				  
				});
			</script>
			<?php
	    }
	}
	//############################# END Pass Update #############################//

	if (($uname_email_pass_check==1 || $uname_email_check==1 || $uname_pass_check==1 || $uname_check==1) && $old_uname_n_js_uname_match==0)
	{
		?>
		<script type="text/javascript">
			$.notify({

				// where to append the toast notification
				wrapper: 'body',

				// toast message
				message: 'Old username does not match with the existing username',

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

	elseif (($uname_email_pass_check==1 || $uname_email_check==1 || $uname_pass_check==1 || $uname_check==1) && $new_uname_n_old_uname_unmatch==0)
	{
		?>
		<script type="text/javascript">
			$.notify({

				// where to append the toast notification
				wrapper: 'body',

				// toast message
				message: 'New username cannot be the same as old username',

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


	elseif(($uname_email_pass_check==1 || $uname_email_check==1 || $email_pass_check==1 || $email_check==1) && $old_email_n_js_email_match==0)
	{
		?>
		<script type="text/javascript">
			$.notify({

				// where to append the toast notification
				wrapper: 'body',

				// toast message
				message: 'Old email does not match with the existing email',

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

	elseif(($uname_email_pass_check==1 || $uname_email_check==1 || $email_pass_check==1 || $email_check==1) && $new_email_n_old_email_unmatch==0)
	{
		?>
		<script type="text/javascript">
			$.notify({

				// where to append the toast notification
				wrapper: 'body',

				// toast message
				message: 'New email cannot be the same as old email',

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

	elseif(($uname_email_pass_check==1 || $email_pass_check==1 || $uname_pass_check==1 || $pass_check==1) && $old_pass_n_js_pass_match==0)
	{
		?>
		<script type="text/javascript">
			$.notify({

				// where to append the toast notification
				wrapper: 'body',

				// toast message
				message: 'Old password does not match with the existing password',

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

	elseif(($uname_email_pass_check==1 || $email_pass_check==1 || $uname_pass_check==1 || $pass_check==1) && $new_pass_n_old_pass_unmatch==0)
	{
		?>
		<script type="text/javascript">
			$.notify({

				// where to append the toast notification
				wrapper: 'body',

				// toast message
				message: 'New password cannot be the same as old password',

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

	elseif(($uname_email_pass_check==1 || $email_pass_check==1 || $uname_pass_check==1 || $pass_check==1) && $new_pass_n_cpass_match==0)
	{
		?>
		<script type="text/javascript">
			$.notify({

				// where to append the toast notification
				wrapper: 'body',

				// toast message
				message: 'New password and confirm password does not match',

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

	if(	$uname_email_pass_check==0 && $uname_email_check==0 && $email_pass_check==0 && $uname_pass_check==0 && $uname_check==0 && $email_check==0 && $pass_check==0)
	{
		?>
		<script type="text/javascript">
			$.notify({

				// where to append the toast notification
				wrapper: 'body',

				// toast message
				message: 'Please fill out the specific fields correctly that you want to change',

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