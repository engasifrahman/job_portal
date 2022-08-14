<?php
	require_once('db_connect_class.php');
	
	class Related_Data_Table extends DB_Connection
	{
	  
	  	public function job_category_data_table()
	  	{
	  		$db_connt=$this->connect;

			$db_error=NULL;

			$sql_view="SELECT * FROM data_job_category ORDER BY id ASC";
		
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

	  	
	  	public function job_location_data_table()
	  	{
	  		$db_connt=$this->connect;

			$db_error=NULL;

			$sql_view="SELECT * FROM data_job_location ORDER BY id ASC";
		
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

	}