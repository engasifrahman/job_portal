<?php
	session_start();
	require_once('../dbconfig.php');
	global $con;

	$js_id=$_SESSION['js_info']['id'];

	$query1 = "SELECT keywords, job_categories, business FROM targeted_job WHERE js_id='$js_id'";

	if (!$result1 = mysqli_query($con, $query1))
	{
	    exit(mysqli_error($con));
	}
	while($targeted_data = mysqli_fetch_assoc($result1))
	{

		$keywords=explode(',', $targeted_data['keywords']);
    	$job_categories=NULL;
    	$business=NULL;

    }
    if (!empty($keywords) || !empty($job_categories) || !empty($business))
	{
		$keywords_check=0;
		if (!empty($keywords))
		{
			$keywords_check=1;
			foreach ($keywords as $keyword)
			{
				$sql[] = 'company_name LIKE \'%'.$keyword.'%\' OR company_type LIKE \'%'.$keyword.'%\' OR company_category LIKE \'%'.$keyword.'%\' OR job_title LIKE \'%'.$keyword.'%\' OR job_category LIKE \'%'.$keyword.'%\' OR job_description LIKE \'%'.$keyword.'%\' OR job_level LIKE \'%'.$keyword.'%\' OR  job_location LIKE \'%'.$keyword.'%\' OR details_location LIKE \'%'.$keyword.'%\' OR skills_requirements LIKE \'%'.$keyword.'%\' OR gender_requirements LIKE \'%'.$keyword.'%\' OR educational_requirements LIKE \'%'.$keyword.'%\' OR additional_requirements LIKE \'%'.$keyword.'%\'';
			}
		}


		$job_catg_check=0;
		if (!empty($job_categories))
		{
			$job_catg_check=1;

			if ($keywords_check==1)
			{
				foreach ($job_categories as $job_catg) 
				{
					$sql[].='job_category LIKE \'%'.$job_catg.'%\'';
				}
			}
			else
			{
				foreach ($job_categories as $job_catg) 
				{
					$sql[]='job_category LIKE \'%'.$job_catg.'%\'';
				}
			}
		}


		$business_check=0;
		if (!empty($business))
		{
			$business_check=1;

			if ($keywords_check==1 || $job_catg_check==1)
			{
				foreach ($business as $bsns_catg) 
				{
					$sql[].='company_category LIKE \'%'.$bsns_catg.'%\'';
				}
			}
			else
			{
				foreach ($business as $bsns_catg) 
				{
					$sql[]='company_category LIKE \'%'.$bsns_catg.'%\'';
				}
			}
		}


		$current_date=date('Y-m-d');

		$query2 = "SELECT * FROM circular_post AS CP, employer AS EM 
		WHERE em_id=id AND CP.action='Active' AND EM.action='Active' AND application_deadline >= '$current_date'
		GROUP BY post_id 
		".($keywords_check || $job_catg_check || $business_check == 1 ? 'HAVING '.implode(' OR ', $sql):'')." 
		ORDER BY post_id DESC";

		echo $query2;
	}
	else
	{
		echo "Targeted Data Not Found";
	}
	
?>