<?php
		$current_date=date('Y-m-d');
		$org_check=0;
		if (!empty($_GET['org_type']))
		{
			$org_check=1;
			$org_type="'";
			$org_type.=$_GET['org_type'];
			$org_type.="'";
		}

		$nature_check=0;
		if (!empty($_GET['job_nature']))
		{
			$nature_check=1;
			$job_nature="'%";
			$job_nature.=$_GET['job_nature'];
			$job_nature.="%'";
		}
		
		$keywords_check=0;
		if (!empty($_GET['keywords']))
		{
			$keywords_check=1;
			$keywords=$_GET['keywords'];
			$comma=explode(',', $keywords);

			if (!empty($comma))
			{
				foreach($comma as $keyword)
				{
				    $sql[] = 'company_name LIKE \'%'.$keyword.'%\' OR company_type LIKE \'%'.$keyword.'%\' OR company_category LIKE \'%'.$keyword.'%\' OR job_title LIKE \'%'.$keyword.'%\' OR job_category LIKE \'%'.$keyword.'%\' OR job_description LIKE \'%'.$keyword.'%\' OR job_level LIKE \'%'.$keyword.'%\' OR  job_location LIKE \'%'.$keyword.'%\' OR details_location LIKE \'%'.$keyword.'%\' OR skills_requirements LIKE \'%'.$keyword.'%\' OR gender_requirements LIKE \'%'.$keyword.'%\' OR educational_requirements LIKE \'%'.$keyword.'%\' OR additional_requirements LIKE \'%'.$keyword.'%\'';
				}
			}
		}

		$query = "SELECT * FROM circular_post AS CP, employer AS EM 
		WHERE em_id=id AND CP.action='Active' AND EM.action='Active' AND application_deadline >= '$current_date' 
		".($org_check == 1 ? 'AND company_type='.$org_type:'')." 
		".($nature_check == 1 ? 'AND job_nature LIKE '.$job_nature:'')." 

		GROUP BY post_id
		".($keywords_check == 1 ? 'HAVING '.implode(" OR ", $sql):'')."
		ORDER BY post_id DESC
		";

		echo $query;
?>