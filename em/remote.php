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

		$em_uname=$_SESSION['em_info']['uname'];

		if ($em_uname!=$string)
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

		$em_email=$_SESSION['em_info']['email'];

		if ($em_email!=$string)
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

		$em_pass=$_SESSION['em_info']['pass'];

		if ($em_pass!=md5($string))
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

		$query = "SELECT username FROM employer";

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
					$return_error = "This username already used please enter another username";
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

		$query = "SELECT email FROM employer";

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
					$return_error = "This email already used please enter another email";
					return $return_error;
				}
			}
			return;
		}

	}


	function unique_company_check($string)
	{

		require_once('../dbconfig.php');
		global $con;

		$query = "SELECT company_name FROM employer";

		if (!$data = mysqli_query($con, $query))
	    {
	    	$return_error = mysqli_error($con);
	    	return $return_error;
		}
		else
		{
			while($row = mysqli_fetch_assoc($data))
    		{

    			if (strtolower($row['company_name'])==strtolower($string))
				{
					$return_error = "This company already exist please enter right name (If you are real owner, contact with admin)";
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
						$another_pos = stripos($string, $words);
						if($another_pos!==$pos)
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


	if(isset($_POST['company_name']))
	{

		$result = badword($_POST['company_name']);

		if($result)
		{
			$valid=false;
			$message =$result; 

		}

		$result2 = unique_company_check($_POST['company_name']);

		if($result2)
		{
			$valid=false;
			$message =$result2; 

		}
	}

	elseif(isset($_POST['company_name_edit']))
	{

		$result = badword($_POST['company_name_edit']);

		if($result)
		{
			$valid=false;
			$message =$result; 

		}
	}

	else if(isset($_POST['location']))
	{

		$result = badword($_POST['location']);

		if($result)
		{
			$valid=false;
			$message =$result; 

		}
	}

	else if(isset($_POST['portfolio']))
	{

		$result = badword($_POST['portfolio']);

		if($result)
		{
			$valid=false;
			$message =$result; 

		}
	}

	else if(isset($_POST['full_name']))
	{

		$result = badword($_POST['full_name']);

		if($result)
		{
			$valid=false;
			$message =$result; 

		}
	}

	else if(isset($_POST['address']))
	{

		$result = badword($_POST['address']);

		if($result)
		{
			$valid=false;
			$message =$result; 

		}
	}


	elseif(isset($_POST['job_title']))
	{

		$result = badword($_POST['job_title']);

		if($result)
		{
			$valid=false;
			$message =$result; 

		}
	}

	else if(isset($_POST['job_description']))
	{
		$result = badword($_POST['job_description']);

		if($result)
		{
			$valid=false;
			$message =$result; 

		}

	}

	else if(isset($_POST['details_location']))
	{

		$result = badword($_POST['details_location']);

		if($result)
		{
			$valid=false;
			$message =$result; 

		}
	}

	else if(isset($_POST['skills_requirements']))
	{

		$result = badword($_POST['skills_requirements']);

		if($result)
		{
			$valid=false;
			$message =$result; 

		}
	}

	else if(isset($_POST['educational_requirements']))
	{

		$result = badword($_POST['educational_requirements']);

		if($result)
		{
			$valid=false;
			$message =$result; 

		}
	}

	else if(isset($_POST['additional_requirements']))
	{

		$result = badword($_POST['additional_requirements']);

		if($result)
		{
			$valid=false;
			$message =$result; 

		}
	}

	else if(isset($_POST['salary_details']))
	{

		$result = badword($_POST['salary_details']);

		if($result)
		{
			$valid=false;
			$message =$result; 

		}
	}

	else if(isset($_POST['extra_facilities']))
	{

		$result = badword($_POST['extra_facilities']);

		if($result)
		{
			$valid=false;
			$message =$result; 

		}
	}

	else if(isset($_POST['apply_instructions']))
	{

		$result = badword($_POST['apply_instructions']);

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

	else if(isset($_POST['email']))
	{

		$result = unique_email_check($_POST['email']);

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
