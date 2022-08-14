<?php
	require_once('db_connect_class.php');
	class Job_Seeker_Access extends DB_Connection
	{		
		public function job_seeker_login($data)
		{
			$email_or_uname 	= $data['js_email_or_uname'];
			$password 			= $data['js_password'];

			if(isset($data['js_remember']))
			{
				$remember   = $data['js_remember'];
			}

			$email=NULL;
			$uname=NULL;

			if(filter_var($email_or_uname,FILTER_VALIDATE_EMAIL))
			{
				$email=$email_or_uname;
			}
			elseif(strlen($email_or_uname) >=3 && strlen($email_or_uname) <=50 && preg_match('/^[a-zA-Z0-9._-]*$/',$email_or_uname))
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
				$sql_check ="SELECT * FROM job_seeker WHERE email='$email'";
				
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

						$js_id 			=$data['id'];
						$js_email 		=$data['email'];
						$js_uname 		=$data['username'];
						$js_name 		=$data['full_name'];
						$js_gender 		=$data['gender'];
						$js_password 	=$data['password'];
						$js_pic 		=$data['pic_dir'];
						$js_resume 		=$data['up_resume_dir'];
						$js_action 		=$data['action'];

						$js_info=array(
							'id' 		=>$js_id,
							'email' 	=>$js_email,
							'uname' 	=>$js_uname,
							'name' 		=>$js_name,
							'gender' 	=>$js_gender,
							'picture' 	=>$js_pic,
							'resume' 	=>$js_resume,
							'pass'	 	=>$js_password
							);
										
						if(md5($password)==$js_password)
						{ 
							if ($js_action=='Active')
							{
								############ COOkie Settings #############
		 						if(isset($remember))
								{
									if($remember==='Y')
									{
										$c_time= 60*60*24*30;
										$set_cookietime= time()+ $c_time;
										setcookie('js_email_or_uname',$email,$set_cookietime,'/');
										setcookie('js_password',$password,$set_cookietime,'/');
									}
									else
									{
										setcookie('js_email_or_uname','',0,'/');
										setcookie('js_password','',0,'/');
									}
								}
								else
								{
									setcookie('js_email_or_uname','',0,'/');
									setcookie('js_password','',0,'/');
								}
								
								############ Session Settings #############
								$_SESSION['js_info']=$js_info;

								header('Location: 1/');
								//echo "<br>You successfully login"; 
							}

							else
							{
								if ($js_action=='REG_PROBLEM')
								{
									//echo '<br>Until now, Your account is not activated because of some problem while you are registered [please contact with admin]';
									$action_error='Until now, Your account is not activated because of some problem while you are registered [please contact with admin]';
									return array("action_error"=>$action_error);
								}
								else
								{
									//echo '<br>Your account is not active please contact with admin';
									$action_error='Your account is deactivated/suspended [please contact with admin]';
									return array("action_error"=>$action_error);
								}
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
				$sql_check ="SELECT * FROM job_seeker WHERE username='$uname'";
				
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

						$js_id 			=$data['id'];
						$js_email 		=$data['email'];
						$js_uname 		=$data['username'];
						$js_name 		=$data['full_name'];
						$js_gender 		=$data['gender'];
						$js_password 	=$data['password'];
						$js_pic 		=$data['pic_dir'];
						$js_resume 		=$data['up_resume_dir'];
						$js_action 		=$data['action'];

						$js_info=array(
							'id' 		=>$js_id,
							'email' 	=>$js_email,
							'uname' 	=>$js_uname,
							'name' 		=>$js_name,
							'gender' 	=>$js_gender,
							'picture' 	=>$js_pic,
							'resume' 	=>$js_resume,
							'pass'	 	=>$js_password
							);
										
						if(md5($password)==$js_password)
						{ 
							if ($js_action=='Active')
							{
								############ COOkie Settings #############
		 						if(isset($remember))
								{
									if($remember==='Y')
									{
										$c_time= 60*60*24*30;
										$set_cookietime= time()+ $c_time;
										setcookie('js_email_or_uname',$uname,$set_cookietime,'/');
										setcookie('js_password',$password,$set_cookietime,'/');
									}
									else
									{
										setcookie('js_email_or_uname','',0,'/');
										setcookie('js_password','',0,'/');
									}
								}
								else
								{
									setcookie('js_email_or_uname','',0,'/');
									setcookie('js_password','',0,'/');
								}
								
								############ Session Settings #############
								$_SESSION['js_info']=$js_info;

								header('Location: 1/');
								//echo "<br>You successfully login"; 
							}

							else
							{
								if ($js_action=='REG_PROBLEM')
								{
									//echo '<br>Until now, Your account is not activated because of some problem while you are registered [please contact with admin]';
									$action_error='Until now, Your account is not activated because of some problem while you are registered [please contact with admin]';
									return array("action_error"=>$action_error);
								}
								else
								{
									//echo '<br>Your account is not active please contact with admin';
									$action_error='Your account is deactivated/suspended [please contact with admin]';
									return array("action_error"=>$action_error);
								}
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
		public function job_seeker_logout()
		{
			//session_unset();
			//session_destroy();
			unset($_SESSION['js_info']);
			header('Location:../1sin');
			//echo 'successfully logout';
		}
	}
?>