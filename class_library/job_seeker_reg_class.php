<?php

	require_once('db_connect_class.php');
	
	class Job_Seeker_Registraion extends DB_Connection
	{	
		public function js_reg_data_insert($data)
		{
		
			$full_name			= $data['full_name'];
			$username			= $data['username'];
			$dob				= $data['dob'];
			$gender				= $data['gender'];
			$mobile_number		= $data['mobile_number'];
			$email				= $data['email'];
			$password			= $data['password'];
			$password_confirm	= $data['password_confirm'];				

			$error=NULL;
			$name_error=NULL;
			$uname_error=NULL;
			$dob_error=NULL;
			$gender_error=NULL;
			$mobile_error=NULL;
			$email_error=NULL;
			$pass_error=NULL;
			$cpass_error=NULL;
		
			################### Data Validation #####################

			// validation for job_seeker userame
			if(strlen($username) >=3 && strlen($username) <=50 && preg_match('/^[a-z0-9._-]*$/',$username))
			{
				//echo $username.'<br>';
			}
			else
			{
				$uname_error="Userame must be 3 to 50 charecters long with only small letters, digits, dot, underscore or hyphen [space and others spacial character are not allowed]";
				$error.=$uname_error.'<br>';
			}

			// validation for job_seeker Full Name
			if(strlen($full_name) >=2 && preg_match('/^[a-zA-Z. ]/',$full_name))
			{
				//echo $full_name.'<br>';
			}
			else
			{
				$name_error="Name must be more then 2 letter";
				$error.=$name_error."<br>";
			}

			// validation for Date of Birth
			list($y, $m, $d) = explode('-', $dob);

			if(checkdate($m, $d, $y))
			{
				//echo $d.'-'.$m.'-'.$y. '<br>';
			}
			else
			{
				$dob_error="DOB: Don't try to be smart";
				$error.=$dob_error."<br>";
			}

			// validation for User Gender
			if($gender == 'Male' || $gender == 'Female' || $gender == 'Others')
			{
				//echo $gender.'<br>';
			}
			else
			{
				$gender_error="GENDER: Don't try to be smart";
				$error.= $gender_error."<br>";
			}

			// validation for Mobile Number
			if(strlen($mobile_number)>=11 && strlen($mobile_number)<=15 && preg_match('/^[0-9+ -]*$/',$mobile_number))
			{
				//echo $mobile_number.'<br>';
			}
			else
			{
				$mobile_error='Mobile number must be numarical number & in between 11 to 15 characters';
				$error.=$mobile_error.'<br>';
			}

			// validation for User Email
			if(filter_var($email,FILTER_VALIDATE_EMAIL))
			{
				//echo $email.'<br>';
			}
			else
			{
				$email_error='This is not a valid email';
				$error.=$email_error.'<br>';
			}
			
			// validation for User Password
			if(strlen($password)>=6 && strlen($password)<=100 && str_word_count($password)<=1)
			{
				if($password==$password_confirm)
				{
					//echo $password.'<br>';
				}
				else
				{
					$cpass_error= 'Confirm password does not match';
					$error.=$cpass_error.'<br>';
				}
				
			}
			else
			{
				$pass_error= 'Password must be 6-50 characters long and space not allowed';
				$error.=$pass_error.'<br>';
			}
			
			###########   Data Inserting Query ###########################		
			if(!$error)
			{
				
				$db_connt=$this->connect;
				$db_connt2=$this->connect;
				$db_connt3=$this->connect;
				$db_connt4=$this->connect;
				$db_connt5=$this->connect;
				$db_connt6=$this->connect;
				$db_connt7=$this->connect;
				$db_connt8=$this->connect;
				$db_connt9=$this->connect;
				$db_connt10=$this->connect;
				$db_connt11=$this->connect;
				$db_connt_select=$this->connect;
				$db_connt_update=$this->connect;

				$password			= md5($data['password']);
				$password_confirm	= md5($data['password_confirm']);

				$sql_insert="INSERT INTO job_seeker(full_name, username, dob, gender, mobile_number, email, password) VALUES ('$full_name', '$username', '$dob', '$gender', '$mobile_number', '$email', '$password')";

				$result=$db_connt->query($sql_insert);

				if($db_connt->error)
				{
					//echo 'Error:'.$db_connt->error;
					$db_error = 'This Email/Username already Used please try another email/username';
					$error.='Error:'.$db_connt->error.'<br>';
					return array("db_error"=>$db_error,"error"=>$error);
				}
				else
				{

					$sql_select="SELECT id FROM job_seeker WHERE email='$email'";
					$select_result=$db_connt_select->query($sql_select);

					if ($db_connt_select->error)
					{
						$dball_error ='Error: "JSIDS Error" please contact with admin'; //JSIDS -> JS ID Select 
						$error.=$db_connt_select->error.'<br>';
						return array("dball_error"=>$dball_error,"error"=>$error);
					}

					$js_data=$select_result->fetch_assoc();
					$js_id=$js_data['id'];

					$sql_insert2="INSERT INTO career_info (js_id) VALUES ('$js_id')";
					$sql_insert3="INSERT INTO specialization (js_id) VALUES ('$js_id')";
					$sql_insert4="INSERT INTO targeted_job (js_id) VALUES ('$js_id')";
					$sql_insert5="INSERT INTO education (js_id, status) VALUES ('$js_id', 'user_existence')";
					$sql_insert6="INSERT INTO work_experience (js_id, status) VALUES ('$js_id', 'user_existence')";
					$sql_insert7="INSERT INTO training_workshop (js_id, status) VALUES ('$js_id', 'user_existence')";
					$sql_insert8="INSERT INTO certifications (js_id, status) VALUES ('$js_id', 'user_existence')";
					$sql_insert9="INSERT INTO language (js_id, status) VALUES ('$js_id', 'user_existence')";
					$sql_insert10="INSERT INTO reference (js_id, status) VALUES ('$js_id', 'user_existence')";
					$sql_insert11="INSERT INTO cover_letter_info (js_id) VALUES ('$js_id')";

					$result2=$db_connt2->query($sql_insert2);
					$result3=$db_connt3->query($sql_insert3);
					$result4=$db_connt4->query($sql_insert4);
					$result5=$db_connt5->query($sql_insert5);
					$result6=$db_connt6->query($sql_insert6);
					$result7=$db_connt7->query($sql_insert7);
					$result8=$db_connt8->query($sql_insert8);
					$result9=$db_connt9->query($sql_insert9);
					$result10=$db_connt10->query($sql_insert10);
					$result11=$db_connt11->query($sql_insert11);

					if($db_connt2->error || $db_connt3->error || $db_connt4->error || $db_connt5->error || $db_connt6->error || $db_connt7->error || $db_connt8->error || $db_connt9->error || $db_connt10->error || $db_connt11->error)
					{
						$sql_update="UPDATE job_seeker SET action = 'REG_PROBLEM' WHERE js_id='$js_id'";
						$update_result=$db_connt_update->query($sql_update);

						if($db_connt_update->error)
						{
							$dball_error ='Error: "AU Error" please contact with admin'; //AU -> Action Update
							$error.=$db_connt_update->error.'<br>';
							return array("dball_error"=>$dball_error,"error"=>$error);
						}

						//echo 'Error:'.$db_connt->error;
						$dball_error ='Error: "CSTCL_I Error" please contact with admin'; //CSTCL_I -> Career, Specialization, Targeted_job, Cover_letter, Insert 
						$error.=$db_connt2->error.' <br> '.$db_connt3->error.' <br> '.$db_connt4->error.'<br>'.$db_connt5->error.' <br> '.$db_connt6->error.' <br> '.$db_connt7->error.'<br>'.$db_connt8->error.' <br> '.$db_connt9->error.' <br> '.$db_connt10->error.'<br>'.$db_connt11->error.'<br>';
						return array("dball_error"=>$dball_error,"error"=>$error);
					}
					else
					{
						//echo '<br> You are successfully registered';
						$reg_success = 'You are successfully registered';
						return array("reg_success"=>$reg_success);
						$db_connt->close();
					}
				}
			}
			else
			{
				//echo '<br>Error: <br>'.$error;
				return array(
					"name_error"=>$name_error,
					"uname_error"=>$uname_error,
					"dob_error"=>$dob_error,
					"gender_error"=>$gender_error,
					"$mobile_error"=>$mobile_error,
					"email_error"=>$email_error,
					"pass_error"=>$pass_error,
					"cpass_error"=>$cpass_error,
					"error"=>$error
				);
			}
	  	}
	}// Job_Seeker_Registraion class ending
?>