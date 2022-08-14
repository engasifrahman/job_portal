<?php
	require_once('db_connect_class.php');
	class admin_Access extends DB_Connection
	{		
		public function admin_login($data)
		{
			$email_or_uname 	= $data['ad_email_or_uname'];
			$password 			= $data['ad_password'];

			if(isset($data['ad_remember']))
			{
				$remember   = $data['ad_remember'];
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
				$sql_check ="SELECT * FROM admin WHERE email='$email'";
				
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

						$ad_id 			=$data['id'];
						$ad_email 		=$data['email'];
						$ad_uname 		=$data['username'];
						$ad_name 		=$data['full_name'];
						$ad_gender 		=$data['gender'];
						$ad_password 	=$data['password'];
						$ad_pic 		=$data['pic_dir'];
						$ad_action 		=$data['action'];

						$ad_info=array(
							'id' 		=>$ad_id,
							'email' 	=>$ad_email,
							'uname' 	=>$ad_uname,
							'name' 		=>$ad_name,
							'gender' 	=>$ad_gender,
							'picture' 	=>$ad_pic,
							'pass'	 	=>$ad_password,
							'action'	=>$ad_action
							);
										
						if(md5(md5($password))==$ad_password)
						{ 
							if ($ad_action=='SUperAdmIN' || 'Admin')
							{								
								############ Session Settings #############
								$_SESSION['ad_info']=$ad_info;

								header('Location: 109/');
								//echo "<br>You successfully login"; 
							}

							else
							{

								//echo '<br>Your account is not active please contact with admin';
								$action_error='Your account is deactivated/suspended [please contact with main admin]';
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
				$sql_check ="SELECT * FROM admin WHERE username='$uname'";
				
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

						$ad_id 			=$data['id'];
						$ad_email 		=$data['email'];
						$ad_uname 		=$data['username'];
						$ad_name 		=$data['full_name'];
						$ad_gender 		=$data['gender'];
						$ad_password 	=$data['password'];
						$ad_pic 		=$data['pic_dir'];
						$ad_action 		=$data['action'];

						$ad_info=array(
							'id' 		=>$ad_id,
							'email' 	=>$ad_email,
							'uname' 	=>$ad_uname,
							'name' 		=>$ad_name,
							'gender' 	=>$ad_gender,
							'picture' 	=>$ad_pic,
							'pass'	 	=>$ad_password,
							'action'	=>$ad_action
							);
										
						if(md5(md5($password))==$ad_password)
						{ 
							if ($ad_action=='SUperAdmIN' || 'Admin')
							{
								############ Session Settings #############
								$_SESSION['ad_info']=$ad_info;

								header('Location: 109/');
								//echo "<br>You successfully login"; 
							}

							else
							{

								//echo '<br>Your account is not active please contact with admin';
								$action_error='Your account is deactivated/suspended [please contact with main admin]';
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
		public function admin_logout()
		{
			//session_unset();
			//session_destroy();
			unset($_SESSION['ad_info']);
			header('Location:../');
			//echo 'successfully logout';
		}
	}
?>