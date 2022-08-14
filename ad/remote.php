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

		$ad_uname=$_SESSION['ad_info']['uname'];

		if ($ad_uname!=$string)
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

		$ad_email=$_SESSION['ad_info']['email'];

		if ($ad_email!=$string)
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

		$ad_pass=$_SESSION['ad_info']['pass'];

		if ($ad_pass!=md5(md5($string)))
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

		$query = "SELECT username FROM admin";

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

		$query = "SELECT email FROM admin";

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


	else if(isset($_POST['old_uname']))
	{

		$result = uname_check($_POST['old_uname']);

		if($result)
		{
			$valid=false;
			$message =$result;

		}
	}

	else if(isset($_POST['new_uname']))
	{

		$result = unique_uname_check($_POST['new_uname']);

		if($result)
		{
			$valid=false;
			$message =$result;

		}
	}

	else if(isset($_POST['old_email']))
	{

		$result = email_check($_POST['old_email']);

		if($result)
		{
			$valid=false;
			$message =$result;

		}
	}

	else if(isset($_POST['new_email']))
	{

		$result = unique_email_check($_POST['new_email']);

		if($result)
		{
			$valid=false;
			$message =$result;

		}
	}

	else if(isset($_POST['old_pass']))
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
