<?php
		session_start();
		$em_id=$_SESSION['em_info']['id'];
		$post_id=$_GET['post_id'];

		$current_date=date('Y-m-d');

		$experience_check=0;
		if (!empty($_GET['experience']))
		{
			$experience_check=1;
			$experience="'";
			$experience.=$_GET['experience'];
			$experience.="'";
		}

		$degree3_check=0;
		if (!empty($_GET['degree3']))
		{
			$degree3_check=1;
			$degree3="'";
			$degree3.=$_GET['degree3'];
			$degree3.="'";
		}

		$degree4_check=0;
		if (!empty($_GET['degree4']))
		{
			$degree4_check=1;
			$degree4="'";
			$degree4.=$_GET['degree4'];
			$degree4.="'";
		}

		$degree5_check=0;
		if (!empty($_GET['degree5']))
		{
			$degree5_check=1;
			$degree5="'";
			$degree5.=$_GET['degree5'];
			$degree5.="'";
		}

		$degree6_check=0;
		if (!empty($_GET['degree6']))
		{
			$degree6_check=1;
			$degree6="'";
			$degree6.=$_GET['degree6'];
			$degree6.="'";
		}

		$degree7_check=0;
		if (!empty($_GET['degree7']))
		{
			$degree7_check=1;
			$degree7="'";
			$degree7.=$_GET['degree7'];
			$degree7.="'";
		}

		$skills_check=0;
		if (!empty($_GET['skills']))
		{
			$skills_check=1;
			$skills=$_GET['skills'];
			$comma1=explode(',', $skills);

			if (!empty($comma1))
			{
				foreach($comma1 as $skill)
				{
				    $sql1[] = 'specialized_skills LIKE \'%'.$skill.'%\'';
				}
				$l=sizeof($sql1);
				$sql1[$l-1].=')';
			}
		}

		$keywords_check=0;
		if (!empty($_GET['keywords']))
		{
			$keywords_check=1;
			$keywords=$_GET['keywords'];
			$comma2=explode(',', $keywords);

			if (!empty($comma2))
			{
				foreach($comma2 as $keyword)
				{
				   $sql2[] = 'extracurricular_activities LIKE \'%'.$keyword.'%\' OR certificate_name LIKE \'%'.$keyword.'%\' OR gender LIKE \'%'.$keyword.'%\' OR marital_status LIKE \'%'.$keyword.'%\' OR nationality LIKE \'%'.$keyword.'%\' OR present_address LIKE \'%'.$keyword.'%\' OR permanent_address LIKE \'%'.$keyword.'%\' OR  organization_name LIKE \'%'.$keyword.'%\' OR position_title LIKE \'%'.$keyword.'%\' OR position_level LIKE \'%'.$keyword.'%\' OR type_of_employment LIKE \'%'.$keyword.'%\' OR department LIKE \'%'.$keyword.'%\' OR training_type LIKE \'%'.$keyword.'%\' OR training_title LIKE \'%'.$keyword.'%\' OR language LIKE \'%'.$keyword.'%\' OR degree_level LIKE \'%'.$keyword.'%\' OR degree_title LIKE \'%'.$keyword.'%\' OR major_subject LIKE \'%'.$keyword.'%\'';
				}
				$l2=sizeof($sql2);
				$sql2[$l2-1].=')';
			}
		}

			
			$query1 = "SELECT DISTINCT JS.id, pic_dir, full_name, email, mobile_number, gender, applied_at 
			FROM circular_post CP, applied_job AJ, job_seeker JS, specialization SP, work_experience WE, education  EDU, certifications CER, training_workshop TW, language LAN 
			WHERE CP.em_id='$em_id' AND CP.post_id='$post_id' AND CP.post_id=AJ.post_id AND AJ.js_id=JS.id AND AJ.js_id=SP.js_id AND AJ.js_id=WE.js_id AND AJ.js_id=EDU.js_id AND AJ.js_id=CER.js_id AND AJ.js_id=TW.js_id AND AJ.js_id=LAN.js_id 
			".($experience_check == 1 ? 'AND years_of_exp>='.$experience:'')." 
			".($degree3_check == 1 ? 'AND (degree_level=\'SSC/Equivalant\' AND result_achieved>='.$degree3.')':'')." 
			".($degree4_check == 1 ? 'AND (degree_level=\'HSC/Equivalant\' AND result_achieved>='.$degree4.')':'')." 
			".($degree5_check == 1 ? 'AND (degree_level=\'Diploma\' AND result_achieved>='.$degree5.')':'')." 
			".($degree6_check == 1 ? 'AND (degree_level=\'Bachelors Degree\' AND result_achieved>='.$degree6.')':'')."
			".($degree7_check == 1 ? 'AND (degree_level IN (\'Post Graduate Degree\',\'Masters Degree\') AND result_achieved>='.$degree7.')':'')." 
			".($skills_check == 1 ? 'AND ('.implode(' OR ', $sql1):'')." 
			".($keywords_check == 1 ? 'AND ('.implode(" OR ", $sql2):'')." 
			ORDER BY AJ.id ASC";

echo $query1;
?>