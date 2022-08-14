<?php
	require_once('db_connect_class.php');
	
	class Circulars_Data_View extends DB_Connection
	{

	  	############# Employer Circulars Data Table View ###########
	  
	  	public function circulars_data_table()
	  	{
		 
			$db_connt=$this->connect;

			$db_error=NULL;
			$em_id=$_SESSION['em_info']['id'];

			$sql_view="SELECT * FROM circular_post WHERE em_id='$em_id' AND action IN ('Active','Deactive') ORDER BY post_id DESC";
		
			$result= $db_connt->query($sql_view);
		
			if($db_connt->error)
			{
				$db_error = 'DB Error:'.$db_connt->error;
				return $db_error;
			}
			else
			{
				return $result;
				
				//colse DB connection
				$db_connt->close();
			}
	  	}

	  	public function circular_details_data($post_id)
	  	{
		 
			$db_connt=$this->connect;

			$db_error=NULL;

			$sql_view="SELECT * FROM circular_post WHERE post_id='$post_id' AND action IN ('Active','Deactive')";
		
			$result= $db_connt->query($sql_view);
		
			if($db_connt->error)
			{
				$db_error = 'DB Error:'.$db_connt->error;
				return $db_error;
			}
			else
			{
				return $result;
				
				//colse DB connection
				$db_connt->close();
			}
	  	}
	
	}//Circulars_Data_View class ending

?>