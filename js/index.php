<?php 
	//include 'header.php';
	require 'header.php';

	require_once('../dbconfig.php');
	global $con;

	$current_date=date('Y-m-d');
	$js_id=$_SESSION['js_info']['id'];

	$work_select = "SELECT id,join_date,resign_date FROM work_experience WHERE js_id='$js_id'";
	if (!$work_result = mysqli_query($con, $work_select))
	{
	    exit(mysqli_error($con));
	}

	if (mysqli_num_rows($work_result) > 0 && !isset($_COOKIE['date']))
	{
		while ($work_data=mysqli_fetch_assoc($work_result))
		{
			$id=$work_data['id'];
			$join_date=$work_data['join_date'];
			$resign_date=$work_data['resign_date'];

			if (!empty($join_date) && !empty($resign_date) && $resign_date=='continue')
			{
				$date1 = new DateTime("$join_date");
				$date2 = new DateTime("$current_date");
				$interval = $date1->diff($date2);
				//echo "difference " . $interval->y . " years, " . $interval->m." months, ".$interval->d." days "; 

				// shows the total amount of days (not divided into years, months and days like above)
				//echo "difference " . $interval->days . " days ";
				//echo "<br> Year & Month ".$interval->y.".". $interval->m;
				$years_of_exp=$interval->y.".". $interval->m;
				if ($interval->d>15)
				{
					$years_of_exp+=.1;
				}

				$query = "UPDATE work_experience SET years_of_exp='$years_of_exp' WHERE js_id='$js_id' AND id=$id";

				if (!$result = mysqli_query($con, $query))
				{
			        exit(mysqli_error($con));
			    }
			    ?>

				<script type="text/javascript"> 
					var current_date='<?php echo $current_date; ?>';
					$.cookie('date', current_date);
				</script>

				<?php
			}
		}
	}
	elseif (mysqli_num_rows($work_result) > 0 && $_COOKIE['date']!=$current_date)
	{
		while ($work_data=mysqli_fetch_assoc($work_result))
		{
			$id=$work_data['id'];
			$join_date=$work_data['join_date'];
			$resign_date=$work_data['resign_date'];

			if (!empty($join_date) && !empty($resign_date) && $resign_date=='continue')
			{
				$date1 = new DateTime("$join_date");
				$date2 = new DateTime("$current_date");
				$interval = $date1->diff($date2);
				//echo "difference " . $interval->y . " years, " . $interval->m." months, ".$interval->d." days "; 

				// shows the total amount of days (not divided into years, months and days like above)
				//echo "difference " . $interval->days . " days ";
				//echo "<br> Year & Month ".$interval->y.".". $interval->m;
				$years_of_exp=$interval->y.".". $interval->m;
				if ($interval->d>15)
				{
					$years_of_exp+=.1;
				}

				$query = "UPDATE work_experience SET years_of_exp='$years_of_exp' WHERE js_id='$js_id' AND id=$id";

				if (!$result = mysqli_query($con, $query))
				{
			        exit(mysqli_error($con));
			    }
			    ?>

				<script type="text/javascript">
					var current_date='<?php echo $current_date; ?>';
					$.cookie('date', current_date);
				</script>

				<?php
			}
		}
	}



	$applied_select = "SELECT AJ.post_id FROM applied_job AJ, circular_post CP, employer AS EM WHERE js_id='$js_id' AND CP.post_id=AJ.post_id AND EM.id=em_id AND CP.action='Active' AND EM.action='Active'";
	if (!$applied_result = mysqli_query($con, $applied_select))
	{
	    exit(mysqli_error($con));
	}
	if (mysqli_num_rows($applied_result) > 0)
	{
		$applied_jobs=mysqli_num_rows($applied_result);
	}
	else
	{
		$applied_jobs=0;
	}




	$saved_select = "SELECT SJ.post_id FROM saved_job SJ, circular_post AS CP, employer AS EM WHERE js_id='$js_id' AND CP.post_id=SJ.post_id AND EM.id=em_id AND CP.action='Active' AND EM.action='Active'";
	if (!$saved_result = mysqli_query($con, $saved_select))
	{
	    exit(mysqli_error($con));
	}
	if (mysqli_num_rows($saved_result) > 0)
	{
		$saved_jobs=mysqli_num_rows($saved_result);
	}
	else
	{
		$saved_jobs=0;
	}




	$targeted_select = "SELECT keywords, job_categories, business FROM targeted_job WHERE js_id='$js_id'";

	if (!$targeted_result = mysqli_query($con, $targeted_select))
	{
	    exit(mysqli_error($con));
	}

	while($targeted_data = mysqli_fetch_assoc($targeted_result))
	{
		$keywords		=explode(',', $targeted_data['keywords']);
        $job_categories	=explode(', ', $targeted_data['job_categories']);
        $business		=explode(', ', $targeted_data['business']);
        
        $a=$targeted_data['keywords'];
        $b=$targeted_data['job_categories'];
        $c=$targeted_data['business'];
    }

  $total_matched=0;

  if (!empty($a) || !empty($b) || !empty($c))
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


		$post_select = "SELECT * FROM circular_post AS CP, employer AS EM 
		WHERE em_id=id AND CP.action='Active' AND EM.action='Active' AND application_deadline >= '$current_date'
		GROUP BY post_id 
		".($keywords_check || $job_catg_check || $business_check == 1 ? 'HAVING '.implode(' OR ', $sql):'')." 
		ORDER BY post_id DESC";
		if (!$post_result = mysqli_query($con, $post_select))
		{
			exit(mysqli_error($con));
		}
		if (mysqli_num_rows($post_result) > 0)
		{
			$total_matched=mysqli_num_rows($post_result);
		}
	}





	$resume_visit_select = "SELECT SUM(visit_count) AS total_visit_count FROM resume_visited RV, employer EM WHERE js_id='$js_id' AND EM.id=em_id AND EM.action='Active'";
	if (!$resume_visit_result = mysqli_query($con, $resume_visit_select))
	{
	    exit(mysqli_error($con));
	}
	if (mysqli_num_rows($resume_visit_result) > 0)
	{
		$total_visit_count=0;
		while($resume_visit_data = mysqli_fetch_assoc($resume_visit_result))
		{
			$total_visit_count=$resume_visit_data['total_visit_count'];
		}
	}
	else
	{
		$total_visit_count=0;
	}




	$following_select = "SELECT JSFEM.id FROM js_following_em JSFEM, employer EM  WHERE js_id='$js_id' AND EM.id=JSFEM.em_id AND action='Active'";
	if (!$following_result = mysqli_query($con, $following_select))
	{
	        exit(mysqli_error($con));
	}
	if (mysqli_num_rows($following_result) > 0)
	{
		$total_following=mysqli_num_rows($following_result);
	}
	else
	{
		$total_following=0;
	}




	$follower_select = "SELECT EMFJS.id FROM em_following_js EMFJS, employer EM  WHERE js_id='$js_id' AND EM.id=EMFJS.em_id AND action='Active'";
	if (!$follower_result = mysqli_query($con, $follower_select))
	{
	        exit(mysqli_error($con));
	}
	if (mysqli_num_rows($follower_result) > 0)
	{
		$total_follower=mysqli_num_rows($follower_result);
	}
	else
	{
		$total_follower=0;
	}




	$last_week = date("Y-m-d", strtotime("-7 day"));
	$new_post_select = "SELECT post_id FROM circular_post AS CP, employer AS EM WHERE em_id=id AND CP.action='Active' AND EM.action='Active' AND DATE(posted_at) BETWEEN '$last_week' AND '$current_date' AND application_deadline >= '$current_date'";
	if (!$new_post_result = mysqli_query($con, $new_post_select))
	{
		exit(mysqli_error($con));
	}
	if (mysqli_num_rows($new_post_result) > 0)
	{
		$total_new_post=mysqli_num_rows($new_post_result);
	}
	else
	{
		$total_new_post=0;
	}



	$available_post_select = "SELECT post_id FROM circular_post AS CP, employer AS EM WHERE em_id=id AND CP.action='Active' AND EM.action='Active' AND application_deadline >= '$current_date'";
	if (!$available_post_result = mysqli_query($con, $available_post_select))
	{
		exit(mysqli_error($con));
	}
	if (mysqli_num_rows($available_post_result) > 0)
	{
		$total_available_post=mysqli_num_rows($available_post_result);
	}
	else
	{
		$total_available_post=0;
	}




	$govt_post_select = "SELECT post_id FROM circular_post AS CP, employer AS EM WHERE em_id=id AND CP.action='Active' AND EM.action='Active' AND application_deadline >= '$current_date' AND company_category='Govt. Organizations'";
	if (!$govt_post_result = mysqli_query($con, $govt_post_select))
	{
		exit(mysqli_error($con));
	}
	if (mysqli_num_rows($govt_post_result) > 0)
	{
		$total_govt_post=mysqli_num_rows($govt_post_result);
	}
	else
	{
		$total_govt_post=0;
	}




	$it_post_select = "SELECT post_id FROM circular_post AS CP, employer AS EM WHERE em_id=id AND CP.action='Active' AND EM.action='Active' AND application_deadline >= '$current_date' AND (job_category IN ('IT & Telecommunication', 'IT-Hardware', 'IT-Software', 'IT-Networking/ISP') OR company_category='Information Technology (IT)')";
	if (!$it_post_result = mysqli_query($con, $it_post_select))
	{
		exit(mysqli_error($con));
	}
	if (mysqli_num_rows($it_post_result) > 0)
	{
		$total_it_post=mysqli_num_rows($it_post_result);
	}
	else
	{
		$total_it_post=0;
	}




	$deadline_today_select = "SELECT post_id FROM circular_post AS CP, employer AS EM WHERE em_id=id AND CP.action='Active' AND EM.action='Active' AND application_deadline = '$current_date'";
	if (!$deadline_today_result = mysqli_query($con, $deadline_today_select))
	{
		exit(mysqli_error($con));
	}
	if (mysqli_num_rows($deadline_today_result) > 0)
	{
		$total_deadline_today=mysqli_num_rows($deadline_today_result);
	}
	else
	{
		$total_deadline_today=0;
	}


	$tomorrow = date("Y-m-d", strtotime('tomorrow'));
	$deadline_tomorrow_select = "SELECT post_id FROM circular_post AS CP, employer AS EM WHERE em_id=id AND CP.action='Active' AND EM.action='Active' AND application_deadline = '$tomorrow'";
	if (!$deadline_tomorrow_result = mysqli_query($con, $deadline_tomorrow_select))
	{
		exit(mysqli_error($con));
	}
	if (mysqli_num_rows($deadline_tomorrow_result) > 0)
	{
		$total_deadline_tomorrow=mysqli_num_rows($deadline_tomorrow_result);
	}
	else
	{
		$total_deadline_tomorrow=0;
	}

?>
	<!--############################# BEGIN Content Area ###########################-->
	<style type="text/css">
		.cv_photo{
		width: 100px;
		height: 100px;
		border-radius:1000px;
		}
	</style>
    <div class="app-content content ">
      <div class="content-wrapper">
        <div class="content-body">
		
			<!-- stats -->
			<div class="row">
				<div class="col-xl-4 offset-xl-4 col-lg-4 offset-lg-4 col-xs-12">
					<div class="card">
						<div class="card-body">
							<div class="card-block text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
								<?php
								if ($picture=='not_defined_yet' && $gender=='Male')
								{
								echo
								'
								  	<img src="../images/demo/male.png" class="avatar-bg cv_photo" alt="avatar">
								';
								}

								elseif ($picture=='not_defined_yet' && $gender=='Female')
								{
								echo
								'
								  	<img src="../images/demo/female.png" class="avatar-bg cv_photo" alt="avatar">
								';
								}

								elseif ($picture=='not_defined_yet' && $gender=='Others')
								{
								echo
								'
								  	<img src="../images/demo/others.png" class="avatar-bg cv_photo" alt="avatar">
								';
								}

								else
								{
								echo
								'
								  	<img src="'.$picture.'" class="avatar-bg cv_photo" alt="avatar">
								';
								}
								?>
								<h3 class="pt-1"><b><?php echo $name; ?></b></h3>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-xl-3 col-lg-6 col-xs-12">
					<div class="card">
						<div class="card-body">
							<a href="aj" class="grey">
							<div class="card-block">
								<div class="media">
									<div class="media-body text-xs-left">
										<h3 class="green"><?php echo $applied_jobs; ?></h3>
										<span>Applied Jobs</span>
									</div>
									<div class="media-right media-middle">
										<i class="fa fa-paper-plane-o green font-large-2 float-xs-right"></i>
									</div>
								</div>
							</div>
							</a>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-lg-6 col-xs-12">
					<div class="card">
						<div class="card-body">
							<a href="sj" class="grey">
							<div class="card-block">
								<div class="media">
									<div class="media-body text-xs-left">
										<h3 class="teal"><?php echo $saved_jobs; ?></h3>
										<span>Saved Jobs</span>
									</div>
									<div class="media-right media-middle">
										<i class="icon-pushpin teal font-large-2 float-xs-right"></i>
									</div>
								</div>
							</div>
							</a>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-lg-6 col-xs-12">
					<div class="card">
						<div class="card-body">
							<a href="pj" class="grey">
							<div class="card-block">
								<div class="media">
									<div class="media-body text-xs-left">
										<h3 class="pink"><?php echo $total_matched; ?></h3>
										<span>Prefrred Jobs</span>
									</div>
									<div class="media-right media-middle">
										<i class="fa fa-heart-o pink font-large-2 float-xs-right"></i>
									</div>
								</div>
							</div>
							</a>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-lg-6 col-xs-12">
					<div class="card">
						<div class="card-body">
							<a href="rv" class="grey">
							<div class="card-block">
								<div class="media">
									<div class="media-body text-xs-left">
										<h3 class="cyan"><?php echo $total_visit_count; ?><small class="grey font-small-1"> (Views)</small></h3>
										<span>Resume Visited</span>
									</div>
									<div class="media-right media-middle">
										<i class="fa fa-eye cyan font-large-2 float-xs-right"></i>
									</div>
								</div>
							</div>
							</a>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-xl-3 col-lg-6 col-xs-12">
					<div class="card">
						<div class="card-body">
							<a href="fe" class="grey">
							<div class="card-block">
								<div class="media">
									<div class="media-body text-xs-left">
										<h3 class="cyan"><?php echo $total_following; ?></h3>
										<span>You Following</span>
									</div>
									<div class="media-right media-middle">
										<i class="icon-android-person-add cyan font-large-2 float-xs-right"></i>
									</div>
								</div>
							</div>
							</a>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-lg-6 col-xs-12">
					<div class="card">
						<div class="card-body">
							<a href="fe" class="grey">
							<div class="card-block">
								<div class="media">
									<div class="media-body text-xs-left">
										<h3 class="teal"><?php echo $total_follower; ?></h3>
										<span>Your Follower</span>
									</div>
									<div class="media-right media-middle">
										<i class="icon-android-people teal font-large-2 float-xs-right"></i>
									</div>
								</div>
							</div>
							</a>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-lg-6 col-xs-12">
					<div class="card">
						<div class="card-body">
							<a href="jv@1" class="grey">
							<div class="card-block">
								<div class="media">
									<div class="media-body text-xs-left">
										<h3 class="pink"><?php echo $total_new_post; ?></h3>
										<span>New Jobs</span>
									</div>
									<div class="media-right media-middle">
										<i class="fa fa-calendar-plus-o pink font-large-2 float-xs-right"></i>
									</div>
								</div>
							</div>
							</a>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-lg-6 col-xs-12">
					<div class="card">
						<div class="card-body">
							<a href="jv" class="grey">
							<div class="card-block">
								<div class="media">
									<div class="media-body text-xs-left">
										<h3 class="green"><?php echo $total_available_post; ?></h3>

										<span>Available Jobs</span>
									</div>
									<div class="media-right media-middle">
										<i class="icon-briefcase2 green font-large-2 float-xs-right"></i>
									</div>
								</div>
							</div>
							</a>
						</div>
					</div>
				</div>
			</div>


			<div class="row">
				<div class="col-xl-3 col-lg-6 col-xs-12">
					<div class="card">
						<div class="card-body">
							<a href="jv-1" class="grey">
							<div class="card-block">
								<div class="media">
									<div class="media-body text-xs-left">
										<h3 class="deep-orange"><?php echo $total_govt_post; ?></h3>
										<span>Govt Jobs</span>
									</div>
									<div class="media-right media-middle">
										<i class="fa fa-coffee deep-orange font-large-2 float-xs-right"></i>
									</div>
								</div>
							</div>
							</a>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-lg-6 col-xs-12">
					<div class="card">
						<div class="card-body">
							<a href="jv~1" class="grey">
							<div class="card-block">
								<div class="media">
									<div class="media-body text-xs-left">
										<h3 class="teal"><?Php echo $total_it_post; ?></h3>
										<span>IT Based Jobs</span>
									</div>
									<div class="media-right media-middle">
										<i class="fa fa-desktop teal font-large-2 float-xs-right"></i>
									</div>
								</div>
							</div>
							</a>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-lg-6 col-xs-12">
					<div class="card">
						<div class="card-body">
							<a href="jv'1" class="grey">
							<div class="card-block">
								<div class="media">
									<div class="media-body text-xs-left">
										<h3 class="red"><?php echo $total_deadline_today; ?></h3>
										<span>Deadline Today</span>
									</div>
									<div class="media-right media-middle">
										<i class="fa fa-clock-o red font-large-2 float-xs-right"></i>
									</div>
								</div>
							</div>
							</a>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-lg-6 col-xs-12">
					<div class="card">
						<div class="card-body">
							<a href='jv"1' class="grey">
							<div class="card-block">
								<div class="media">
									<div class="media-body text-xs-left">
										<h3 class="warning"><?php echo $total_deadline_tomorrow; ?></h3>

										<span>Deadline Tomorrow</span>
									</div>
									<div class="media-right media-middle">
										<i class="fa fa-calendar-times-o warning font-large-2 float-xs-right"></i>
									</div>
								</div>
							</div>
							</a>
						</div>
					</div>
				</div>
			</div>

			<!--/ stats -->
			
			
        </div>
      </div>
    </div>
	<!--/############################# END Content Area ###########################-->
<?php
	//include 'footer.php';
	require 'footer.php';
?>