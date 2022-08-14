<?php
	require_once('db_connect_class.php');
	require_once('bad_words.php');
	//echo '<pre>';
	//print_r($badwords);
	//echo '</pre>';
	function badword($string)
	{
		global $badwords;
		$worderror=NULL;
		$i=NULL;
		foreach ($badwords as $words)
		{
			if(stripos($string, $words)!==false)
			{
				$pos = stripos($string, $words);
				$worderror .=$words;
				$i++;
				foreach ($badwords as $words)
				{
					if(stripos($string, $words)!==false)
					{
						$anothrer_pos = stripos($string, $words);
						if($anothrer_pos!==$pos)
						{
							$i++;
							$worderror .=", ". $words;
						}
					}
				}
				$return_error = "You entered ".$i." vulgar word(s) (".$worderror.")";
				return $return_error;
			}
		}
	}

	class Employer_Job_Post extends DB_Connection
	{
		
		public function em_post_data_insert($data)
		{
			$em_id 				= $_SESSION['em_info']['id'];
			$job_title			= $data['job_title'];
			$job_category		= $data['job_category'];
			$job_description	= $data['job_description'];
			$vacancies_no		= $data['vacancies_no'];
			$job_level			= $data['job_level'];
			$job_nature			= $data['job_nature'];
			$job_location		= $data['job_location'];
			$details_location	= $data['details_location'];
			$skills_req			= $data['skills_requirements'];
			$gender_req			= $data['gender_requirements'];
			$age_reqFrom		= $data['age_requirementsFrom'];
			$age_reqTo			= $data['age_requirementsTo'];
			$exp_years			= $data['experience_years'];

			if(isset($data['experience_yearsFrom']))
			{
				$exp_yearsFrom	= $data['experience_yearsFrom'];
			}
			
			if(isset($data['experience_yearsTo']))
			{
				$exp_yearsTo	= $data['experience_yearsTo'];
			}

			$edu_req			= $data['educational_requirements'];
			$additional_req		= $data['additional_requirements'];
			$salary_range		= $data['salary_range'];

			if(isset($data['salary_rangeFrom']))
			{
				$salary_rangeFrom	= $data['salary_rangeFrom'];
			}

			if(isset($data['salary_rangeTo']))
			{
				$salary_rangeTo	= $data['salary_rangeTo'];
			}

			$salary_details		= $data['salary_details'];
			$extra_facilities	= $data['extra_facilities'];
			$apply_instructions	= $data['apply_instructions'];
			$app_deadline		= $data['application_deadline'];
			$action 			= "Active";


			$error=NULL;
			$db_error=NULL;
			$success=NULL;
			$job_title_er=NULL;
			$job_category_er=NULL;
			$job_description_er=NULL;
			$vacancies_no_er=NULL;
			$job_level_er=NULL;
			$job_nature_er=NULL;
			$job_location_er=NULL;
			$details_location_er=NULL;
			$skills_req_er=NULL;
			$gender_req_er=NULL;
			$age_req_er=NULL;
			$exp_years_er=NULL;
			$edu_req_er=NULL;
			$additional_req_er=NULL;
			$salary_range_er=NULL;
			$salary_details_er=NULL;
			$extra_facilities_er=NULL;
			$apply_instructions_er=NULL;
			$app_deadline_er=NULL;


		
			################### Data Validation #####################

			// validation for job_title
			if(strlen($job_title)>=10 && strlen($job_title)<=150 && preg_match('/^[a-zA-Z0-9 ]/',$job_title))
			{
				$job_title_er=badword($job_title);
				if($job_title_er)
				{
					$error='1';
				}
				else
				{
					//echo $job_title.'<br>';
				}
			}
			else
			{
				$job_title_er="The job title can only consist of alphabetical, space, number, dot, underscore & parenthesis";
				$error='1';
			}


			// validation for job category
			if(strlen($job_category)>=10 && strlen($job_category)<=150 && str_word_count($job_category)<10 && preg_match('/^[a-zA-Z0-9&() .,\-\/]*$/',$job_category))
			{
				$job_category_er=badword($job_category);
				if($job_category_er)
				{
					$error='1';
				}
				else
				{
					//echo $job_category.'<br>';
				}
			}
			else
			{
				$job_category_er="Job Category can only consist of alphabetical, number, ampersand, dot, comma, hyphen, backslash, space And pranthasis";
				$error='1';
			}


			// validation for job description
			if(strlen($job_description) >=20 && strlen($job_description)<=1000 && str_word_count($job_description)<=250 && preg_match('/^[a-zA-Z0-9# ]/',$job_description))
			{
				$job_description_er=badword($job_description);
				if($job_description_er)
				{
					$error='1';
				}
				else
				{
					//echo $job_description.'<br>';
				}
			}
			else
			{
				$job_description_er="Job description will be max 250 words and 20-1000 charecter";
				$error='1';
			}


			// validation for vacancies no
			if($vacancies_no>=1 && $vacancies_no<=1000)
			{
				//echo $vacancies_no.'<br>';
			}
			else
			{
				$vacancies_no_er="VACANCIES: Don't try to be smart";
				$error='1';
			}


			// validation for job level
			if(isset($job_level[0]) && ($job_level[0]=="Entry" || $job_level[0]=="Mid" || $job_level[0]=="Top"))
			{
				$jobLevel=$job_level[0];

				if(isset($job_level[1]) && ($job_level[1]=="Mid" || $job_level[1]=="Top"))
				{
					$jobLevel.=' / '.$job_level[1];

					if(isset($job_level[2]) && $job_level[2]=="Top")
					{
						$jobLevel.=' / '.$job_level[2];
					}
				}
				//echo $jobLevel.'<br>';	
			}
			else
			{
				$job_level_er="LEVEL: Don't try to be smart";
				$error='1';
			}


			// validation for job nature
			if(isset($job_nature[0]) && ($job_nature[0]=="Full Time" || $job_nature[0]=="Part Time" || $job_nature[0]=="Contractual" || $job_nature[0]=="Internship"))
			{
				$jobNature=$job_nature[0];

				if(isset($job_nature[1]) && ($job_nature[1]=="Part Time" || $job_nature[1]=="Contractual" || $job_nature[1]=="Internship"))
				{
					$jobNature.=' / '.$job_nature[1];

					if(isset($job_nature[2]) && ($job_nature[2]=="Contractual" || $job_nature[2]=="Internship"))
					{
						$jobNature.=' / '.$job_nature[2];

						if(isset($job_nature[3]) && $job_nature[3]=="Internship")
						{
							$jobNature.=' / '.$job_nature[3];
						}
					}
				}
				//echo $jobNature.'<br>';	
			}
			else
			{
				$job_nature_er="NATURE: Don't try to be smart";
				$error='1';
			}


			// validation for Job Location
			if(strlen($job_location) >=3 && strlen($job_location)<=100 && str_word_count($job_location)<=1 && preg_match('/^[a-zA-Z ]*$/',$job_location))
			{
				$job_location_er=badword($job_location);
				if($job_location_er)
				{
					$error='1';
				}
				else
				{
					//echo $job_location.'<br>';
				}
			}
			else
			{
				$job_location_er="LOCATION: Don't try to be smart";
				$error='1';
			}


			// validation for Details Location
			if(empty($details_location))
			{
				$details_location="Not mentioned";
				//echo $details_location.'<br>';
			}
			else if(strlen($details_location) >=3 && strlen($details_location)<=120 && str_word_count($details_location)<=20 && preg_match('/^[a-zA-Z0-9# ]/',$details_location))
			{
				$details_location_er=badword($details_location);
				if($details_location_er)
				{
					$error='1';
				}
				else
				{
					//echo $details_location.'<br>';
				}
			}
			else
			{
				$details_location_er="Details location will be max 20 words and 3-120 charecter";
				$error='1';
			}


			// validation for Skills Requirement
			if(strlen($skills_req) >=3 && strlen($skills_req)<=500 && str_word_count($skills_req)<=100 && preg_match('/^[a-zA-Z0-9# ]/',$skills_req))
			{
				$skills_req_er=badword($skills_req);
				if($skills_req_er)
				{
					$error='1';
				}
				else
				{
					//echo $skills_req.'<br>';
				}
			}
			else
			{
				$skills_req_er="Skills Requirement will be max 100 words and 3-400 charecter";
				$error='1';
			}


			// validation for Gender requirement
			if($gender_req == 'Any' || $gender_req == 'Male' || $gender_req == 'Female' || $gender_req == 'Others')
			{
				//echo $gender_req.'<br>';
			}
			else
			{
				$gender_req_er="GENDER: Don't try to be smart";
				$error='1';
			}


			// validation for Age requirement
			if($age_reqFrom>=18 && $age_reqFrom<=50 && $age_reqTo>=18 && $age_reqTo<=50)
			{
				$age_req=$age_reqFrom." to ".$age_reqTo." Year(s)";
				//echo $age_req.'<br>';
			}
			else
			{
				$age_req_er="Age: Don't try to be smart";
				$error='1';
			}


			// validation for Experience requirement
			if($exp_years=="N/A")
			{
				//echo $exp_years.'<br>';
			}
			else if($exp_years=="Experience Required")
			{
				if(isset($data['experience_yearsFrom']) && isset($data['experience_yearsTo']) && $exp_yearsFrom>=1 && $exp_yearsFrom<=15 && $exp_yearsTo>=1 && $exp_yearsTo<=15)
				{
					$exp_years = $exp_yearsFrom." to ".$exp_yearsTo." Year(s)";
					//echo $exp_years.'<br>';
				}
			}
			else
			{
				$exp_years_er="EXPERIENCE: Don't try to be smart";
				$error='1';
			}

			// validation for Educational requirements
			if(strlen($edu_req)>=3 && strlen($edu_req)<=200 && str_word_count($edu_req)<=40 && preg_match('/^[a-zA-Z0-9# ]/',$edu_req))
			{
				$edu_req_er=badword($edu_req);
				if($edu_req_er)
				{
					$error='1';
				}
				//echo $edu_req.'<br>';
			}
			else
			{
				$edu_req_er="Educational requirement will be max 40 words & 3-200 letter only";
				$error='1';
			}


			// validation for Additional reqirement
			if(empty($additional_req))
			{
				$additional_req="Not mentioned";
				//echo $additional_req.'<br>';
			}
			else if(strlen($additional_req) >=3 && strlen($additional_req)<=1000 && str_word_count($additional_req)<=250 && preg_match('/^[a-zA-Z0-9# ]/',$additional_req))
			{
				$additional_req_er=badword($additional_req);
				if($additional_req_er)
				{
					$error='1';
				}
				else
				{
					//echo $additional_req.'<br>';
				}
			}
			else
			{
				$additional_req_er="Additional requirements will be max 250 words and 3-1000 charecter";
				$error='1';
			}


			// validation for Salary range
			if($salary_range=="Negotiable")
			{
				//echo $salary_range.'<br>';
			}
			else if($salary_range=="Not mentioned")
			{
				//echo $salary_range.'<br>';
			}
			else if($salary_range=="Want to provide salary range")
			{
				if(isset($data['salary_rangeFrom']) && isset($data['salary_rangeTo']) && $salary_rangeFrom>=5000 && $salary_rangeFrom<=50000 && $salary_rangeTo>=5000 && $salary_rangeTo<=50000)
				{
					$salary_range = $salary_rangeFrom." to ".$salary_rangeTo." TK";
					//echo $salary_range.'<br>';
				}
			}
			else
			{
				$salary_range_er="EXPERIENCE: Don't try to be smart";
				$error='1';
			}


			// validation for Salary details
			if(empty($salary_details))
			{
				$salary_details="Not mentioned";
				//echo $salary_details.'<br>';
			}
			else if(strlen($salary_details) >=3 && strlen($salary_details)<=120 && str_word_count($salary_details)<=20 && preg_match('/^[a-zA-Z0-9# ]/',$salary_details))
			{
				$salary_details_er=badword($salary_details);
				if($salary_details_er)
				{
					$error='1';
				}
				//echo $salary_details.'<br>';
			}
			else
			{
				$salary_details_er="Salary details will be max 20 words and 3-120 charecter";
				$error='1';
			}


			// validation for Extra facilities
			if(empty($extra_facilities))
			{
				$extra_facilities="Not mentioned";
				//echo $extra_facilities.'<br>';
			}
			else if(strlen($extra_facilities) >=3 && strlen($extra_facilities)<=250 && str_word_count($extra_facilities)<=50 && preg_match('/^[a-zA-Z0-9# ]/',$extra_facilities))
			{
				$extra_facilities_er=badword($extra_facilities);
				if($extra_facilities_er)
				{
					$error='1';
				}
				else
				{
					//echo $extra_facilities.'<br>';
				}
			}
			else
			{
				$extra_facilities_er="Extra facilities will be max 50 words and 3-250 charecter";
				$error='1';
			}


			// validation for Apply instructions
			if(empty($apply_instructions))
			{
				$apply_instructions="Not mentioned";
				//echo $apply_instructions.'<br>';
			}
			else if(strlen($apply_instructions) >=3 && strlen($apply_instructions)<=250 && str_word_count($apply_instructions)<=50 && preg_match('/^[a-zA-Z0-9# ]/',$apply_instructions))
			{
				$apply_instructions_er=badword($apply_instructions);
				if($apply_instructions_er)
				{
					$error='1';
				}
				else
				{
					//echo $apply_instructions.'<br>';
				}
			}
			else
			{
				$apply_instructions_er="Apply instructions will be max 50 words and 3-250 charecter";
				$error='1';
			}


			// validation for Application deadline
			list($y, $m, $d) = explode('-', $app_deadline);

			if(checkdate($m, $d, $y))
			{
				//echo $d.'-'.$m.'-'.$y. '<br>';
			}
			else
			{
				$app_deadline_er="DEADLINE: Don't try to be smart";
				$error="1";
			}


			###########   Data Inserting Query ###########################		
			if(!$error)
			{	
				$db_connt=$this->connect;

				$sql_insert="INSERT INTO circular_post(em_id, job_title, job_category, job_description, vacancies_no, job_level, job_nature, job_location, details_location, skills_requirements, gender_requirements, age_requirements, experience_years, educational_requirements, additional_requirements, salary_range, salary_details, extra_facilities, apply_instructions, application_deadline, action) VALUES ('$em_id','$job_title','$job_category','$job_description','$vacancies_no','$jobLevel','$jobNature','$job_location','$details_location','$skills_req','$gender_req','$age_req','$exp_years','$edu_req','$additional_req','$salary_range','$salary_details','$extra_facilities','$apply_instructions','$app_deadline','$action')";

				$result=$db_connt->query($sql_insert);

				if($db_connt->error)
				{
					//echo 'Error:'.$db_connt->error;
					$db_error =$db_connt->error;
					return array("db_error"=>$db_error);
				}
				else
				{
					//echo '<br> You are successfully registered';
					$success = 'You are successfully posted the circular';
					return array("success"=>$success);

					//colse DB connection
					$db_connt->close();
				}
			}
			else
			{
				//echo '<br>Error: <br>'.$error;
				return array(
					"job_title_er"=>$job_title_er,
					"job_category_er"=>$job_category_er,
					"job_description_er"=>$job_description_er,
					"vacancies_no_er"=>$vacancies_no_er,
					"job_level_er"=>$job_level_er,
					"job_nature_er"=>$job_nature_er,
					"job_location_er"=>$job_location_er,
					"details_location_er"=>$details_location_er,
					"skills_req_er"=>$skills_req_er,
					"gender_req_er"=>$gender_req_er,
					"age_req_er"=>$age_req_er,
					"exp_years_er"=>$exp_years_er,
					"edu_req_er"=>$edu_req_er,
					"additional_req_er"=>$additional_req_er,
					"salary_range_er"=>$salary_range_er,
					"salary_details_er"=>$salary_details_er,
					"extra_facilities_er"=>$extra_facilities_er,
					"apply_instructions_er"=>$apply_instructions_er,
					"app_deadline_er"=>$app_deadline_er,
					"error"=>$error
				);
			}
	  	}// em_job_post_insert method ending


		public function em_post_data_update($data)
		{
			$em_id 				= $_SESSION['em_info']['id'];
			$post_id			= $data['post_id'];
			$job_title			= $data['job_title'];
			$job_category		= $data['job_category'];
			$job_description	= $data['job_description'];
			$vacancies_no		= $data['vacancies_no'];
			$job_level			= $data['job_level'];
			$job_nature			= $data['job_nature'];
			$job_location		= $data['job_location'];
			$details_location	= $data['details_location'];
			$skills_req			= $data['skills_requirements'];
			$gender_req			= $data['gender_requirements'];
			$age_reqFrom		= $data['age_requirementsFrom'];
			$age_reqTo			= $data['age_requirementsTo'];
			$exp_years			= $data['experience_years'];

			if(isset($data['experience_yearsFrom']))
			{
				$exp_yearsFrom	= $data['experience_yearsFrom'];
			}
			
			if(isset($data['experience_yearsTo']))
			{
				$exp_yearsTo	= $data['experience_yearsTo'];
			}

			$edu_req			= $data['educational_requirements'];
			$additional_req		= $data['additional_requirements'];
			$salary_range		= $data['salary_range'];

			if(isset($data['salary_rangeFrom']))
			{
				$salary_rangeFrom	= $data['salary_rangeFrom'];
			}

			if(isset($data['salary_rangeTo']))
			{
				$salary_rangeTo	= $data['salary_rangeTo'];
			}

			$salary_details		= $data['salary_details'];
			$extra_facilities	= $data['extra_facilities'];
			$apply_instructions	= $data['apply_instructions'];
			$app_deadline		= $data['application_deadline'];
			$action 			= "Active";


			$error=NULL;
			$db_error=NULL;
			$success=NULL;
			$job_title_er=NULL;
			$job_category_er=NULL;
			$job_description_er=NULL;
			$vacancies_no_er=NULL;
			$job_level_er=NULL;
			$job_nature_er=NULL;
			$job_location_er=NULL;
			$details_location_er=NULL;
			$skills_req_er=NULL;
			$gender_req_er=NULL;
			$age_req_er=NULL;
			$exp_years_er=NULL;
			$edu_req_er=NULL;
			$additional_req_er=NULL;
			$salary_range_er=NULL;
			$salary_details_er=NULL;
			$extra_facilities_er=NULL;
			$apply_instructions_er=NULL;
			$app_deadline_er=NULL;

		
			################### Data Validation #####################

			// validation for job_title
			if(strlen($job_title)>=10 && strlen($job_title)<=150 && preg_match('/^[a-zA-Z0-9 ]/',$job_title))
			{
				$job_title_er=badword($job_title);
				if($job_title_er)
				{
					$error='1';
				}
				else
				{
					//echo $job_title.'<br>';
				}
			}
			else
			{
				$job_title_er="The job title can only consist of alphabetical, space, number, dot, underscore & parenthesis";
				$error='1';
			}


			// validation for job category
			if(strlen($job_category)>=10 && strlen($job_category)<=150 && str_word_count($job_category)<10 && preg_match('/^[a-zA-Z0-9&() .,\-\/]*$/',$job_category))
			{
				$job_category_er=badword($job_category);
				if($job_category_er)
				{
					$error='1';
				}
				else
				{
					//echo $job_category.'<br>';
				}
			}
			else
			{
				$job_category_er="Job Category can only consist of alphabetical, number, ampersand, dot, comma, hyphen, backslash, space And pranthasis";
				$error='1';
			}


			// validation for job description
			if(strlen($job_description) >=20 && strlen($job_description)<=1000 && str_word_count($job_description)<=250 && preg_match('/^[a-zA-Z0-9# ]/',$job_description))
			{
				$job_description_er=badword($job_description);
				if($job_description_er)
				{
					$error='1';
				}
				else
				{
					//echo $job_description.'<br>';
				}
			}
			else
			{
				$job_description_er="Job description will be max 250 words and 20-1000 charecter";
				$error='1';
			}


			// validation for vacancies no
			if($vacancies_no>=1 && $vacancies_no<=1000)
			{
				//echo $vacancies_no.'<br>';
			}
			else
			{
				$vacancies_no_er="VACANCIES: Don't try to be smart";
				$error='1';
			}


			// validation for job level
			if(isset($job_level[0]) && ($job_level[0]=="Entry" || $job_level[0]=="Mid" || $job_level[0]=="Top"))
			{
				$jobLevel=$job_level[0];

				if(isset($job_level[1]) && ($job_level[1]=="Mid" || $job_level[1]=="Top"))
				{
					$jobLevel.=' / '.$job_level[1];

					if(isset($job_level[2]) && $job_level[2]=="Top")
					{
						$jobLevel.=' / '.$job_level[2];
					}
				}
				//echo $jobLevel.'<br>';	
			}
			else
			{
				$job_level_er="LEVEL: Don't try to be smart";
				$error='1';
			}


			// validation for job nature
			if(isset($job_nature[0]) && ($job_nature[0]=="Full Time" || $job_nature[0]=="Part Time" || $job_nature[0]=="Contractual" || $job_nature[0]=="Internship"))
			{
				$jobNature=$job_nature[0];

				if(isset($job_nature[1]) && ($job_nature[1]=="Part Time" || $job_nature[1]=="Contractual" || $job_nature[1]=="Internship"))
				{
					$jobNature.=' / '.$job_nature[1];

					if(isset($job_nature[2]) && ($job_nature[2]=="Contractual" || $job_nature[2]=="Internship"))
					{
						$jobNature.=' / '.$job_nature[2];

						if(isset($job_nature[3]) && $job_nature[3]=="Internship")
						{
							$jobNature.=' / '.$job_nature[3];
						}
					}
				}
				//echo $jobNature.'<br>';	
			}
			else
			{
				$job_nature_er="NATURE: Don't try to be smart";
				$error='1';
			}


			// validation for Job Location
			if(strlen($job_location) >=3 && strlen($job_location)<=100 && str_word_count($job_location)<=1 && preg_match('/^[a-zA-Z ]*$/',$job_location))
			{
				$job_location_er=badword($job_location);
				if($job_location_er)
				{
					$error='1';
				}
				else
				{
					//echo $job_location.'<br>';
				}
			}
			else
			{
				$job_location_er="LOCATION: Don't try to be smart";
				$error='1';
			}


			// validation for Details Location
			if(empty($details_location))
			{
				$details_location="Not mentioned";
				//echo $details_location.'<br>';
			}
			else if(strlen($details_location) >=3 && strlen($details_location)<=120 && str_word_count($details_location)<=20 && preg_match('/^[a-zA-Z0-9# ]/',$details_location))
			{
				$details_location_er=badword($details_location);
				if($details_location_er)
				{
					$error='1';
				}
				else
				{
					//echo $details_location.'<br>';
				}
			}
			else
			{
				$details_location_er="Details location will be max 20 words and 3-120 charecter";
				$error='1';
			}


			// validation for Skills Requirement
			if(strlen($skills_req) >=3 && strlen($skills_req)<=500 && str_word_count($skills_req)<=100 && preg_match('/^[a-zA-Z0-9# ]/',$skills_req))
			{
				$skills_req_er=badword($skills_req);
				if($skills_req_er)
				{
					$error='1';
				}
				else
				{
					//echo $skills_req.'<br>';
				}
			}
			else
			{
				$skills_req_er="Skills Requirement will be max 100 words and 3-400 charecter";
				$error='1';
			}


			// validation for Gender requirement
			if($gender_req == 'Any' || $gender_req == 'Male' || $gender_req == 'Female' || $gender_req == 'Others')
			{
				//echo $gender_req.'<br>';
			}
			else
			{
				$gender_req_er="GENDER: Don't try to be smart";
				$error='1';
			}


			// validation for Age requirement
			if($age_reqFrom>=18 && $age_reqFrom<=50 && $age_reqTo>=18 && $age_reqTo<=50)
			{
				$age_req=$age_reqFrom." to ".$age_reqTo." Year(s)";
				//echo $age_req.'<br>';
			}
			else
			{
				$age_req_er="Age: Don't try to be smart";
				$error='1';
			}


			// validation for Experience requirement
			if($exp_years=="N/A")
			{
				//echo $exp_years.'<br>';
			}
			else if($exp_years=="Experience Required")
			{
				if(isset($data['experience_yearsFrom']) && isset($data['experience_yearsTo']) && $exp_yearsFrom>=1 && $exp_yearsFrom<=15 && $exp_yearsTo>=1 && $exp_yearsTo<=15)
				{
					$exp_years = $exp_yearsFrom." to ".$exp_yearsTo." Year(s)";
					//echo $exp_years.'<br>';
				}
			}
			else
			{
				$exp_years_er="EXPERIENCE: Don't try to be smart";
				$error='1';
			}

			// validation for Educational requirements
			if(strlen($edu_req)>=3 && strlen($edu_req)<=200 && str_word_count($edu_req)<=40 && preg_match('/^[a-zA-Z0-9# ]/',$edu_req))
			{
				$edu_req_er=badword($edu_req);
				if($edu_req_er)
				{
					$error='1';
				}
				//echo $edu_req.'<br>';
			}
			else
			{
				$edu_req_er="Educational requirement will be max 40 words & 3-200 letter only";
				$error='1';
			}


			// validation for Additional reqirement
			if(empty($additional_req))
			{
				$additional_req="Not mentioned";
				//echo $additional_req.'<br>';
			}
			else if(strlen($additional_req) >=3 && strlen($additional_req)<=1000 && str_word_count($additional_req)<=250 && preg_match('/^[a-zA-Z0-9# ]/',$additional_req))
			{
				$additional_req_er=badword($additional_req);
				if($additional_req_er)
				{
					$error='1';
				}
				else
				{
					//echo $additional_req.'<br>';
				}
			}
			else
			{
				$additional_req_er="Additional requirements will be max 250 words and 3-1000 charecter";
				$error='1';
			}


			// validation for Salary range
			if($salary_range=="Negotiable")
			{
				//echo $salary_range.'<br>';
			}
			else if($salary_range=="Not mentioned")
			{
				//echo $salary_range.'<br>';
			}
			else if($salary_range=="Want to provide salary range")
			{
				if(isset($data['salary_rangeFrom']) && isset($data['salary_rangeTo']) && $salary_rangeFrom>=5000 && $salary_rangeFrom<=50000 && $salary_rangeTo>=5000 && $salary_rangeTo<=50000)
				{
					$salary_range = $salary_rangeFrom." to ".$salary_rangeTo." TK";
					//echo $salary_range.'<br>';
				}
			}
			else
			{
				$salary_range_er="EXPERIENCE: Don't try to be smart";
				$error='1';
			}


			// validation for Salary details
			if(empty($salary_details))
			{
				$salary_details="Not mentioned";
				//echo $salary_details.'<br>';
			}
			else if(strlen($salary_details) >=3 && strlen($salary_details)<=120 && str_word_count($salary_details)<=20 && preg_match('/^[a-zA-Z0-9# ]/',$salary_details))
			{
				$salary_details_er=badword($salary_details);
				if($salary_details_er)
				{
					$error='1';
				}
				//echo $salary_details.'<br>';
			}
			else
			{
				$salary_details_er="Salary details will be max 20 words and 3-120 charecter";
				$error='1';
			}


			// validation for Extra facilities
			if(empty($extra_facilities))
			{
				$extra_facilities="Not mentioned";
				//echo $extra_facilities.'<br>';
			}
			else if(strlen($extra_facilities) >=3 && strlen($extra_facilities)<=250 && str_word_count($extra_facilities)<=50 && preg_match('/^[a-zA-Z0-9# ]/',$extra_facilities))
			{
				$extra_facilities_er=badword($extra_facilities);
				if($extra_facilities_er)
				{
					$error='1';
				}
				else
				{
					//echo $extra_facilities.'<br>';
				}
			}
			else
			{
				$extra_facilities_er="Extra facilities will be max 50 words and 3-250 charecter";
				$error='1';
			}


			// validation for Apply instructions
			if(empty($apply_instructions))
			{
				$apply_instructions="Not mentioned";
				//echo $apply_instructions.'<br>';
			}
			else if(strlen($apply_instructions) >=3 && strlen($apply_instructions)<=250 && str_word_count($apply_instructions)<=50 && preg_match('/^[a-zA-Z0-9# ]/',$apply_instructions))
			{
				$apply_instructions_er=badword($apply_instructions);
				if($apply_instructions_er)
				{
					$error='1';
				}
				else
				{
					//echo $apply_instructions.'<br>';
				}
			}
			else
			{
				$apply_instructions_er="Apply instructions will be max 50 words and 3-250 charecter";
				$error='1';
			}


			// validation for Application deadline
			list($y, $m, $d) = explode('-', $app_deadline);

			if(checkdate($m, $d, $y))
			{
				//echo $d.'-'.$m.'-'.$y. '<br>';
			}
			else
			{
				$app_deadline_er="DEADLINE: Don't try to be smart";
				$error="1";
			}


			###########   Data Updating Query ###########################		
			if(!$error)
			{	
				$db_connt=$this->connect;

				$sql_insert="UPDATE circular_post SET em_id='$em_id', job_title='$job_title', job_category='$job_category', job_description='$job_description', vacancies_no='$vacancies_no', job_level='$jobLevel', job_nature='$jobNature', job_location='$job_location', details_location='$details_location', skills_requirements='$skills_req', gender_requirements='$gender_req', age_requirements='$age_req', experience_years='$exp_years', educational_requirements='$edu_req', additional_requirements='$additional_req', salary_range='$salary_range', salary_details='$salary_details', extra_facilities='$extra_facilities', apply_instructions='$apply_instructions', application_deadline='$app_deadline', action='$action' WHERE em_id='$em_id' AND post_id='$post_id'";

				$result=$db_connt->query($sql_insert);

				if($db_connt->error)
				{
					//echo 'Error:'.$db_connt->error;
					$db_error =$db_connt->error;
					return array("db_error"=>$db_error);
				}
				else
				{
					//echo '<br> You are successfully registered';
					$success = 'New record successfully updated!';
					return array("success"=>$success);

					//colse DB connection
					$db_connt->close();
				}
			}
			else
			{
				//echo '<br>Error: <br>'.$error;
				return array(
					"job_title_er"=>$job_title_er,
					"job_category_er"=>$job_category_er,
					"job_description_er"=>$job_description_er,
					"vacancies_no_er"=>$vacancies_no_er,
					"job_level_er"=>$job_level_er,
					"job_nature_er"=>$job_nature_er,
					"job_location_er"=>$job_location_er,
					"details_location_er"=>$details_location_er,
					"skills_req_er"=>$skills_req_er,
					"gender_req_er"=>$gender_req_er,
					"age_req_er"=>$age_req_er,
					"exp_years_er"=>$exp_years_er,
					"edu_req_er"=>$edu_req_er,
					"additional_req_er"=>$additional_req_er,
					"salary_range_er"=>$salary_range_er,
					"salary_details_er"=>$salary_details_er,
					"extra_facilities_er"=>$extra_facilities_er,
					"apply_instructions_er"=>$apply_instructions_er,
					"app_deadline_er"=>$app_deadline_er,
					"error"=>$error
				);
			}
		}// em_job_post_update method ending

	  	public function em_post_data_hide($data)
		{
			$em_id 		= $_SESSION['em_info']['id'];
			$post_id	= $data['post_id'];
			$db_connt=$this->connect;

			$sql_hide = "UPDATE circular_post SET action='Hide' WHERE em_id='$em_id' AND post_id=$post_id";
			$result=$db_connt->query($sql_hide);

			if($db_connt->error)
			{
				//echo 'Error:'.$db_connt->error;
				$db_error =$db_connt->error;
				return array("db_error"=>$db_error);
			}
			else
			{
				$success = 'Circular deleted successfully!';
				return array("success"=>$success);

				//colse DB connection
				$db_connt->close();
			}
		}// em_job_post_hide method ending

	  	public function em_post_data_deactive($data)
		{
			$em_id 		= $_SESSION['em_info']['id'];
			$post_id	= $data['post_id'];
			$db_connt=$this->connect;

			$sql_hide = "UPDATE circular_post SET action='Deactive' WHERE em_id='$em_id' AND post_id=$post_id";
			$result=$db_connt->query($sql_hide);

			if($db_connt->error)
			{
				//echo 'Error:'.$db_connt->error;
				$db_error =$db_connt->error;
				return array("db_error"=>$db_error);
			}
			else
			{
				$success = 'Circular deactivated successfully!';
				return array("success"=>$success);

				//colse DB connection
				$db_connt->close();
			}
		}// em_job_post_deactive method ending

		public function em_post_data_active($data)
		{
			$em_id 		= $_SESSION['em_info']['id'];
			$post_id	= $data['post_id'];
			$db_connt=$this->connect;

			$sql_hide = "UPDATE circular_post SET action='Active' WHERE em_id='$em_id' AND post_id=$post_id";
			$result=$db_connt->query($sql_hide);

			if($db_connt->error)
			{
				//echo 'Error:'.$db_connt->error;
				$db_error =$db_connt->error;
				return array("db_error"=>$db_error);
			}
			else
			{
				$success = 'Circular activated successfully!';
				return array("success"=>$success);

				//colse DB connection
				$db_connt->close();
			}
		}// em_job_post_deactive method ending


	}// Employer_Job_Post class ending

?>