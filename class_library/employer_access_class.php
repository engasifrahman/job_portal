<?php
	require_once('db_connect_class.php');
	class Employer_Access extends DB_Connection
	{

		public function employer_login($data)
		{
			$email_or_uname 	=$data['em_email_or_uname'];
			$password 			=$data['em_password'];

			if(isset($data['em_remember']))
			{
				$remember=$data['em_remember'];
			}

			$email=NULL;
			$uname=NULL;

			if(filter_var($email_or_uname,FILTER_VALIDATE_EMAIL))
			{
				$email=$email_or_uname;
			}
			elseif(strlen($email_or_uname) >=3 && strlen($email_or_uname) <=50 && preg_match('/^[a-z0-9._-]*$/',$email_or_uname))
			{
				$uname=$email_or_uname;
			}
			else
			{
				$email_error='Please enter currect email or username';
				return array("email_error"=>$email_error);
			}
		
			if (!empty($email))
			{		 
				$db_connt=$this->connect;
				$sql_check ="SELECT id, EM.email, username, logo_dir, company_name, company_category, city, location, mobile_number, web_url, password, action, full_name, gender, pic_dir FROM employer AS Em, em_contact_person AS CP WHERE EM.email='$email' AND em_id=id";
				
				$result=$db_connt->query($sql_check);
				
				if($db_connt->error)
				{
					die('Error: '.$db_connt->error);
				}
				else
				{
					if($result->num_rows > 0)
					{
						$data=$result->fetch_assoc();

						$em_id 					=$data['id'];
						$em_email 				=$data['email'];
						$em_uname 				=$data['username'];
						$em_logo_dir 			=$data['logo_dir'];
						$em_Company_name		=$data['company_name'];
						$em_Company_category	=$data['company_category'];
						$em_city				=$data['city'];
						$em_location			=$data['location'];
						$em_mobile_number		=$data['mobile_number'];
						$em_web_url				=$data['web_url'];
						$em_password 			=$data['password'];
						$em_action 				=$data['action'];
						$cp_name 				=$data['full_name'];
						$cp_gender 				=$data['gender'];
						$cp_pic_dir 			=$data['pic_dir'];

						$em_info=array(
							'id'				=>$em_id,
							'email'				=>$em_email,
							'uname'				=>$em_uname,
							'logo'				=>$em_logo_dir,
							'company_name'		=>$em_Company_name,
							'company_category'	=>$em_Company_category,
							'city'				=>$em_city,
							'location'			=>$em_location,
							'mobile_number'		=>$em_mobile_number,
							'web_url'			=>$em_web_url,
							'pass'				=>$em_password,
							'cp_name'			=>$cp_name,
							'cp_gender'			=>$cp_gender,
							'cp_pic'			=>$cp_pic_dir,
							);

						if(md5($password)==$em_password)
						{
							if ($em_action=='Active')
							{

								############ COOkie Settings #############
								if(isset($remember))
								{
									if($remember==='Y')
									{
										$c_time= 60*60*24*30;
										$set_cookietime= time()+ $c_time;
										setcookie('em_email_or_uname',$email,$set_cookietime,'/');
										setcookie('em_password',$password,$set_cookietime,'/');
									}
									else
									{
										setcookie('em_email_or_uname','',0,'/');
										setcookie('em_password','',0,'/');
									}
								}
								else
								{
									setcookie('em_email_or_uname','',0,'/');
									setcookie('em_password','',0,'/');
								}

								############ Session Settings #############
								$_SESSION['em_info']=$em_info;
								header('Location:0/');
								//echo "<br>You successfully login";
							}
							else
							{
								//echo '<br>Your account is not active please contact with admin';
								$action_error='Your account is deactivated/suspended [please contact with admin]';
								return array("action_error"=>$action_error);
							}					  
						}
						else
						{
						//echo '<br>Password does not match';
						$pass_error='Password does not match';
						return array("pass_error"=>$pass_error);
						}				
					}
					else
					{
						//echo '<br>Email does not match';
						$email_error='Email does not match';
						return array("email_error"=>$email_error);
					}
				}
			}

			elseif (!empty($uname))
			{		 
				$db_connt=$this->connect;
				$sql_check ="SELECT * FROM employer WHERE username='$uname'";
				
				$sql_check ="SELECT id, EM.email, username, logo_dir, company_name, company_category, city, location, mobile_number, web_url, password, action, full_name, gender, pic_dir FROM employer AS Em, em_contact_person AS CP WHERE EM.username='$uname' AND em_id=id";
				
				$result=$db_connt->query($sql_check);
				
				if($db_connt->error)
				{
					die('Error: '.$db_connt->error);
				}
				else
				{
					if($result->num_rows > 0)
					{
						$data=$result->fetch_assoc();


						$em_id 					=$data['id'];
						$em_email 				=$data['email'];
						$em_uname 				=$data['username'];
						$em_logo_dir 			=$data['logo_dir'];
						$em_Company_name		=$data['company_name'];
						$em_Company_category	=$data['company_category'];
						$em_city				=$data['city'];
						$em_location			=$data['location'];
						$em_mobile_number		=$data['mobile_number'];
						$em_web_url				=$data['web_url'];
						$em_password 			=$data['password'];
						$em_action 				=$data['action'];
						$cp_name 				=$data['full_name'];
						$cp_gender 				=$data['gender'];
						$cp_pic_dir 			=$data['pic_dir'];

						$em_info=array(
							'id'				=>$em_id,
							'email'				=>$em_email,
							'uname'				=>$em_uname,
							'logo'				=>$em_logo_dir,
							'company_name'		=>$em_Company_name,
							'company_category'	=>$em_Company_category,
							'city'				=>$em_city,
							'location'			=>$em_location,
							'mobile_number'		=>$em_mobile_number,
							'web_url'			=>$em_web_url,
							'pass'				=>$em_password,
							'cp_name'			=>$cp_name,
							'cp_gender'			=>$cp_gender,
							'cp_pic'			=>$cp_pic_dir,
							);

						if(md5($password)==$em_password)
						{
							if ($em_action=='Active')
							{

								############ COOkie Settings #############
								if(isset($remember))
								{
									if($remember==='Y')
									{
										$c_time= 60*60*24*30;
										$set_cookietime= time()+ $c_time;
										setcookie('em_email_or_uname',$uname,$set_cookietime,'/');
										setcookie('em_password',$password,$set_cookietime,'/');
									}
									else
									{
										setcookie('em_email_or_uname','',0,'/');
										setcookie('em_password','',0,'/');
									}
								}
								else
								{
									setcookie('em_email_or_uname','',0,'/');
									setcookie('em_password','',0,'/');
								}

								############ Session Settings #############
								$_SESSION['em_info']=$em_info;
								header('Location:0/');
								//echo "<br>You successfully login";
							}
							else
							{
								//echo '<br>Your account is not active please contact with admin';
								$action_error='Your account is deactivated/suspended [please contact with admin]';
								return array("action_error"=>$action_error);
							}					  
						}
						else
						{
						//echo '<br>Password does not match';
						$pass_error='Password does not match';
						return array("pass_error"=>$pass_error);
						}				
					}
					else
					{
						//echo '<br>Username does not match';
						$email_error='Username does not match';
						return array("email_error"=>$email_error);
					}
				}
			}		
		}
		public function employer_logout()
		{
			//session_unset();
			//session_destroy();
			unset($_SESSION['em_info']);
			header('Location:../0sin');
			//echo 'successfully logout';
		}
	}
?>