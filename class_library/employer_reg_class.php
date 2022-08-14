<?php

	require_once('db_connect_class.php');
	
	class Employer_Registraion extends DB_Connection
	{
		
		
		public function em_reg_data_insert($data)
		{
			
			$full_name			= $data['full_name'];
			$username			= $data['username'];
			$company_name		= $data['company_name'];
			$company_type		= $data['company_type'];
			$company_category	= $data['company_category'];
			$city				= $data['city'];
			$zip_code			= $data['zip_code'];
			$location			= $data['location'];
			$mobile_number		= $data['mobile_number'];
			$email				= $data['email'];
			$password			= $data['password'];
			$password_confirm	= $data['password_confirm'];

			$error=NULL;
			$name_error=NULL;
			$uname_error=NULL;
			$cname_error=NULL;
			$ctype_error=NULL;
			$ccatg_error=NULL;
			$city_error=NULL;
			$zip_code_error=NULL;
			$location_error=NULL;
			$mobile_error=NULL;
			$email_error=NULL;
			$pass_error=NULL;
			$cpass_error=NULL;
		
			################### Data Validation #####################

			// validation for username
			if(strlen($username) >=3 && strlen($username) <=50 && preg_match('/^[a-z0-9._-]*$/',$username))
			{
				//echo $username.'<br>';
			}
			else
			{
				$uname_error="Username must be 3 to 50 characters long with only small letters, digits, dot, underscore or hyphen [space and others special characters are not allowed]";
				$error.=$uname_error.'<br>';
			}


			// validation for Contact Person Full Name
			if(strlen($full_name) >=2 && preg_match('/^[a-zA-Z. ]/',$full_name))
			{
				//echo $full_name.'<br>';
			}
			else
			{
				$name_error="Contact Person Full Name must be more than 2 letters";
				$error.=$name_error."<br>";
			}

			// validation for company name
			if(strlen($company_name) >=6 && str_word_count($company_name)>=2 && preg_match('/^[a-zA-Z0-9&.() \-\/]*$/',$company_name))
			{
				//echo $company_name.'<br>';
			}
			else
			{
				$cname_error="Company name must be more then one word and 5 letters with only alphabetical, number, space, dot, hyphen, ampersand and parenthesis";
				$error.= $cname_error.'<br>';
			}

			// validation for company category
			if(strlen($company_type) >=2 && preg_match('/^[a-zA-Z() &.\-\/]*$/',$company_type))
			{
				//echo $company_category.'<br>';
			}
			else
			{
				$ctype_error="CATEGORY: Don't try to be smart";
				$error.=$ctype_error."<br>";
			}

			// validation for company category
			if(strlen($company_category) >=2 && preg_match('/^[a-zA-Z0-9() &.\-\/]*$/',$company_category))
			{
				//echo $company_category.'<br>';
			}
			else
			{
				$ccatg_error="CATEGORY: Don't try to be smart";
				$error.=$ccatg_error."<br>";
			}

			// validation for city
			if(strlen($city) <=20 && preg_match('/^[a-zA-Z ]/',$city))
			{
				//echo $city.'<br>';
			}
			else
			{
				$city_error="CITY: Don't try to be smart";
				$error.= $city_error."<br>";
			}

			// validation for zip_code
			if(strlen($zip_code) <=10 && preg_match('/^[0-9]/',$zip_code))
			{
				//echo $zip_code.'<br>';
			}
			else
			{
				$zip_code_error="ZIP code only consist of digits & it's can maximum 10 digits long";
				$error.=$zip_code_error."<br>";
			}

			// validation for Location
			if(strlen($location) >=6 && str_word_count($location)<20 && preg_match('/^[a-zA-Z0-9#_() ;:,&+.\-\/]/',$location))
			{
				//echo $location.'<br>';
			}
			else
			{
				$location_error="Location must be less then 20 words and more then 5 letters with alphabetical, space, number, hash, comma, dot, underscore, colon, semi-colon, hyphen, plus sign, ampersand(&), backslash & paranthesis";
				$error.= $location_error.'<br>';
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
				$email_error='Only valid email can be insert';
				$error.=$email_error.'<br>';
			}
			
			// validation for User Password
			if(strlen($password)>=6 && strlen($password)<=50 && str_word_count($password)<=1)
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
				$pass_error= 'Password must be in one word & in between 6-50 characters';
				$error.=$pass_error.'<br>';
			}
			
			###########   Data Inserting Query ###########################		
			if(!$error)
			{	
				$db_connt=$this->connect;
				$db_connt2=$this->connect;
				$db_connt_select=$this->connect;
				$db_connt_update=$this->connect;


				$password			= md5($data['password']);
				$password_confirm	= md5($data['password_confirm']);

				$sql_insert="INSERT INTO employer(username, company_name,  company_type, company_category, city, zip_code, location, mobile_number, email, password) VALUES ('$username', '$company_name', '$company_type', '$company_category', '$city', '$zip_code', '$location', '$mobile_number', '$email', '$password')";

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
					$sql_select="SELECT id FROM employer WHERE email='$email'";
					$select_result=$db_connt_select->query($sql_select);

					if ($db_connt_select->error)
					{
						$dball_error ='Error: "EMIDS Error" please contact with admin';
						$error.=$db_connt_select->error.'<br>';
						return array("dball_error"=>$dball_error,"error"=>$error);
					}

					$em_data=$select_result->fetch_assoc();
					$em_id=$em_data['id'];

					$sql_insert2="INSERT INTO em_contact_person(em_id, full_name) VALUES ('$em_id', '$full_name')";
					$result2=$db_connt2->query($sql_insert2);

					if($db_connt2->error)
					{
						$sql_update="UPDATE employer SET action = 'REG_PROBLEM' WHERE em_id='$em_id'";
						$update_result=$db_connt_update->query($sql_update);

						if($db_connt_update->error)
						{
							$dball_error ='Error: "AU Error" please contact with admin';
							$error.=$db_connt_update->error.'<br>';
							return array("dball_error"=>$dball_error,"error"=>$error);
						}
						
						//echo 'Error:'.$db_connt->error;
						$dball_error ='Error: "CPI_I Error" please contact with admin';
						$error.=$db_connt2->error.'<br>';
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
					"uname_error"=>$uname_error,
					"cname_error"=>$cname_error,
					"ctype_error"=>$ccatg_error,
					"ccatg_error"=>$ccatg_error,
					"city_error"=>$city_error,
					"zip_code_error"=>$zip_code_error,
					"location_error"=>$location_error,
					"mobile_error"=>$mobile_error,
					"email_error"=>$email_error,
					"pass_error"=>$pass_error,
					"cpass_error"=>$cpass_error,
					"error"=>$error
				);
			}
	  	}
	}// Employer_Registraion class ending
?>