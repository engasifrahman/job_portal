<?php
	// This is a sample PHP script which demonstrates the 'remote' validator
	// To make it work, point the web server to root Bootstrap Validate directory
	// and open the remote.html file:
	// http://domain.com/demo/remote.html

	//sleep(5);
	session_start();
	require_once('../class_library/bad_words.php');
	$valid =true;
	$message = '';
	$result = '';

	function uname_check($string)
	{

		$js_uname=$_SESSION['js_info']['uname'];

		if ($js_uname!=$string)
		{
			$return_error = "This username does not match with the existing username";

		}
		else
		{
			return;
		}
		return $return_error;
	}

	function email_check($string)
	{

		$js_email=$_SESSION['js_info']['email'];

		if ($js_email!=$string)
		{
			$return_error = "This email does not match with the existing email";

		}
		else
		{
			return;
		}
		return $return_error;
	}


	function pass_check($string)
	{

		$js_pass=$_SESSION['js_info']['pass'];

		if ($js_pass!=md5($string))
		{
			$return_error = "This password does not match with the existing password";

		}
		else
		{
			return;
		}
		return $return_error;
	}


	function unique_uname_check($string)
	{

		require_once('../dbconfig.php');
		global $con;

		$query = "SELECT username FROM job_seeker";

		if (!$data = mysqli_query($con, $query))
	    {
	    	$return_error = mysqli_error($con);
	    	return $return_error;
		}
		else
		{
			while($row = mysqli_fetch_assoc($data))
    		{

    			if ($row['username']==$string)
				{
					$return_error = "This username already used please choose another username";
					return $return_error;
				}
			}
			return;
		}

	}


	function unique_email_check($string)
	{

		require_once('../dbconfig.php');
		global $con;

		$query = "SELECT email FROM job_seeker";

		if (!$data = mysqli_query($con, $query))
	    {
	    	$return_error = mysqli_error($con);
	    	return $return_error;
		}
		else
		{
			while($row = mysqli_fetch_assoc($data))
    		{

    			if ($row['email']==$string)
				{
					$return_error = "This email already used please choose another email";
					return $return_error;
				}
			}
			return;
		}

	}
	

	function badword($string)
	{
		global $badwords;
		$worderror=NULL;
		$i=NULL;
		foreach ($badwords as $words)
		{
			if(stripos($string, $words)!==false)
			{
				$pos = stripos($string, $words);
				$worderror .=$words;
				$i++;
				foreach ($badwords as $words)
				{
					if(stripos($string, $words)!==false)
					{
						$anothrer_pos = stripos($string, $words);
						if($anothrer_pos!==$pos)
						{
							$i++;
							$worderror .=", ". $words;
						}
					}
				}
				$return_error = "You entered ".$i." vulgar word(s) (".$worderror.")";
				return $return_error;
			}
		}
		return;
	}

	if(isset($_POST['full_name']))
	{

		$result = badword($_POST['full_name']);

		if($result)
		{
			$valid=false;
			$message =$result; 

		}
	}

	elseif(isset($_POST['nationality']))
	{
		$result = badword($_POST['nationality']);

		if($result)
		{
			$valid=false;
			$message =$result; 

		}

	}

	elseif(isset($_POST['father_name']))
	{

		$result = badword($_POST['father_name']);

		if($result)
		{
			$valid=false;
			$message =$result; 

		}
	}

	elseif(isset($_POST['mother_name']))
	{

		$result = badword($_POST['mother_name']);

		if($result)
		{
			$valid=false;
			$message =$result; 

		}
	}

	elseif(isset($_POST['present_address']))
	{

		$result = badword($_POST['present_address']);

		if($result)
		{
			$valid=false;
			$message =$result; 

		}
	}

	elseif(isset($_POST['Permanent_address']))
	{

		$result = badword($_POST['Permanent_address']);

		if($result)
		{
			$valid=false;
			$message =$result; 

		}
	}

	elseif(isset($_POST['objective']))
	{

		$result = badword($_POST['objective']);

		if($result)
		{
			$valid=false;
			$message =$result; 

		}
	}

	elseif(isset($_POST['summary']))
	{

		$result = badword($_POST['summary']);

		if($result)
		{
			$valid=false;
			$message =$result; 

		}
	}
	elseif(isset($_POST['comment']))
	{

		$result = badword($_POST['comment']);

		if($result)
		{
			$valid=false;
			$message =$result; 

		}
	}
	elseif(isset($_POST['comment_edit']))
	{

		$result = badword($_POST['comment_edit']);

		if($result)
		{
			$valid=false;
			$message =$result; 

		}
	}




	elseif(isset($_POST['old_uname']))
	{

		$result = uname_check($_POST['old_uname']);

		if($result)
		{
			$valid=false;
			$message =$result;

		}
	}

	elseif(isset($_POST['username']))
	{

		$result = unique_uname_check($_POST['username']);

		if($result)
		{
			$valid=false;
			$message =$result;

		}

		$result2 = badword($_POST['username']);

		if($result2)
		{
			$valid=false;
			$message =$result2; 

		}
	}

	elseif(isset($_POST['new_uname']))
	{

		$result = unique_uname_check($_POST['new_uname']);

		if($result)
		{
			$valid=false;
			$message =$result;

		}
	}

	elseif(isset($_POST['old_email']))
	{

		$result = email_check($_POST['old_email']);

		if($result)
		{
			$valid=false;
			$message =$result;

		}
	}

	elseif(isset($_POST['email']))
	{

		$result = unique_email_check($_POST['email']);

		if($result)
		{
			$valid=false;
			$message =$result;

		}
	}

	elseif(isset($_POST['new_email']))
	{

		$result = unique_email_check($_POST['new_email']);

		if($result)
		{
			$valid=false;
			$message =$result;

		}
	}

	elseif(isset($_POST['old_pass']))
	{

		$result = pass_check($_POST['old_pass']);

		if($result)
		{
			$valid=false;
			$message =$result;

		}
	}

	echo json_encode(
		$valid ? array('valid' => $valid) : array('valid' => $valid, 'message' => $message)
	);
