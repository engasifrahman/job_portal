<?php 
	//include 'header.php';
	require 'header.php';
	require_once('dbconfig.php');
	global $con;

	$fail=0;
	$current_date=date('Y-m-d');

	if(isset($_GET['job_search']) && empty($_GET['keywords']) && empty($_GET['job_nature']) && empty($_GET['org_type']))
	{

		echo '<script>window.location.href = "/jobskillbd.com";</script>';

	}
	elseif(isset($_GET['job_search']) && (!empty($_GET['keywords']) || !empty($_GET['job_nature']) || !empty($_GET['org_type'])) )
	{
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
		if (!$result = mysqli_query($con, $query))
	    {
	        exit(mysqli_error($con));
	    }
	}


	elseif(isset($_GET['jc_id']))
	{
		if (!empty($_GET['jc_id']))
		{
			$jc_id=$_GET['jc_id'];
			$query = "SELECT * FROM data_job_category AS DJC, circular_post AS CP, employer AS EM WHERE DJC.id='$jc_id' AND category_name=job_category AND em_id=EM.id AND CP.action='Active' AND EM.action='Active' AND application_deadline >= '$current_date' ORDER BY post_id DESC";
		    if (!$result = mysqli_query($con, $query))
		    {
		        exit(mysqli_error($con));
		    }
		}
		else
		{
			$fail=1;
		}
	}


	elseif(isset($_GET['l_id']))
	{
		if (!empty($_GET['l_id']))
		{
			$l_id=$_GET['l_id'];
			$query = "SELECT * FROM data_job_location AS DJL, circular_post AS CP, employer AS EM WHERE DJL.id='$l_id' AND location_name=job_location AND em_id=EM.id AND CP.action='Active' AND EM.action='Active' AND application_deadline >= '$current_date' ORDER BY post_id DESC";
		    if (!$result = mysqli_query($con, $query))
		    {
		        exit(mysqli_error($con));
		    }
		}
		else
		{
			$fail=1;
		}
	}


	elseif(isset($_GET['bc_id']))
	{
		if (!empty($_GET['bc_id']))
		{
			$bc_id=$_GET['bc_id'];
			$query = "SELECT * FROM data_business_category AS DBC, circular_post AS CP, employer AS EM WHERE DBC.id='$bc_id' AND category_name=company_category AND EM.id=em_id AND EM.action='Active' AND CP.action='Active' AND application_deadline >= '$current_date' ORDER BY post_id DESC";
		    if (!$result = mysqli_query($con, $query))
		    {
		        exit(mysqli_error($con));
		    }
		}
		else
		{
			$fail=1;
		}
	}


	elseif(isset($_GET['em_id']))
	{
		if (!empty($_GET['em_id']))
		{
			$em_id=$_GET['em_id'];
			$query = "SELECT * FROM circular_post AS CP, employer AS EM WHERE id=$em_id AND id=em_id AND CP.action='Active' AND EM.action='Active' AND application_deadline >= '$current_date' ORDER BY post_id DESC";
			if (!$result = mysqli_query($con, $query))
			{
		        exit(mysqli_error($con));
			}
		}
		else
		{
			$fail=1;
		}

	}



	else
	{
		$query = "SELECT * FROM circular_post AS CP, employer AS EM WHERE em_id=id AND CP.action='Active' AND EM.action='Active' AND application_deadline >= '$current_date' ORDER BY post_id DESC";
		if (!$result = mysqli_query($con, $query))
		{
		    exit(mysqli_error($con));
		}
	}
?>
<!--############################# BEGIN Content Area ###########################-->
<div class="app-content content ">
  <div class="content-wrapper">
    <div class="content-body">
				
		<div class="row">
			<div class="col-md-12">

				<section id="display-headings" class="card" style="min-height:100vh !important;background-color: #F3F3F3;">
					<div class="card-header bg-white">
						<h4 class="card-title">Total Circular's: <?php if($fail!=1){ echo mysqli_num_rows($result);} else{echo '0';}?> </h4>
						<div class="heading-elements">
							<ul class="list-inline mb-0">
								<li><a data-action="expand"><i class="icon-expand2"></i></a></li>
							</ul>
						</div>
					</div>
					<div class="card-body collapse in">
						<div class="card-block">
							<?php
							if ($fail!=1)
							{

								if (mysqli_num_rows($result) > 0)
								{
									$x=1;
									while($post_data = mysqli_fetch_assoc($result))
									{
										
										$post_id 			= $post_data['post_id'];
										$em_id 				= $post_data['em_id'];
										$company_name		= $post_data['company_name'];
										$job_title			= $post_data['job_title'];
										$job_category		= $post_data['job_category'];
										$educational_req	= $post_data['educational_requirements'];
										$vacancies_no		= $post_data['vacancies_no'];
										$job_location		= $post_data['job_location'];
										$skills_req			= $post_data['skills_requirements'];
										$exp_years			= $post_data['experience_years'];
										$salary_range		= $post_data['salary_range'];
										$action 			= $post_data['action'];
										
										list($y, $m, $d) 	= explode('-', $post_data['application_deadline']);
										$app_deadline=$d;
										$app_deadline.='-'.$m;
										$app_deadline.='-'.$y;
										
										
										list($y, $m, $d) = explode('-', $post_data['posted_at']);
										$d=explode(' ',$d);

										$posted_at=$d['0'];
										$posted_at.='-'.$m;
										$posted_at.='-'.$y;

										?>

										<section id="display-headings" class="card jobView no-border" >
											<div class="card-header bg-blue-grey bg-darken-2 text-white">
												<h5 class="card-title">
													<a class="text-white jobLink" href="job_details?post_id=<?php echo $post_id; ?>" >
														<?php echo $job_title; ?>
													</a> 
												</h5>

												<div class="heading-elements d-none d-sm-block">
													<ul class="list-inline mb-0">
														<li>Job No: <?php echo $x++; ?></li>
														<li>
															<a data-action="collapse">
																<i class="icon-minus4 text-white"></i>
															</a>
														</li>
													</ul>
												</div>
											</div>

											<div class="card-body collapse in">
												<div class="card-block">
													<div class="card-text">
														<p>
															<i class="icon-office"></i>
															<strong>
																<?php 
																echo $company_name; ?>
															</strong>
														</p>
													</div>

													<div class="card-text">
														<p>
															<i class="fa fa-briefcase pr-1"></i>
															<span><?php echo $exp_years; ?></span>

															<i class="fa fa-map-marker pl-3 pr-1"></i>
															<span><?php echo $job_location; ?></span>
														</p>
													</div>

													<div class="card-text">
														<p>
															<strong>Education:</strong>
															<span><?php echo $educational_req; ?></span>
														</p>
													</div>

													<div class="card-text">
														<p>
															<strong>Skills:</strong>
															<span><?php echo $skills_req; ?></span>
														</p>
													</div>

													<div class="card-text row">
														<div class="col-md-3 bg-grey bg-lighten-3 pt-1 pb-1 jobBorder">
															<strong>Salary:</strong>
															<span><?php echo $salary_range; ?></span>
														</div>
														<div class="col-md-3 bg-grey bg-lighten-3 pt-1 pb-1 jobBorder">
															<strong>Vacancies:</strong>
															<span><?php echo $vacancies_no; ?></span>
														</div>
														<div class="col-md-3 bg-grey bg-lighten-3 pt-1 pb-1 jobBorder">
															<strong>Job Posted:</strong>
															<span><?php echo $posted_at; ?></span>
														</div>
														<div class="col-md-3 bg-grey bg-lighten-3 pt-1 pb-1">
															<strong>Deadline:</strong>
															<span><?php echo $app_deadline; ?></span>
														</div>
													</div>
												</div>
											</div>

										</section>

										<?php
									}
								}
								else
								{
									?>
										<p colspan="9" align="center">
											Sorry! No circular available right now
										</p>
									<?php
								}
							}
							else
							{
								echo
								'
									<div class="col-md-12 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">Sorry! Something is wrong [Try again later]
									</div>
								';
							}
							?>
						</div>
					</div>
				</section>

			</div>
			<div class="socialnav hidden-md-down">
				 <a href="#" class="one facebook"> <i class="fa fa-facebook padd" aria-hidden="true"></i>Facebook</a>
				 <a href="#" class="two twitter"> <i class="fa fa-twitter padd" aria-hidden="true"></i>Twitter</a>
				 <a href="#" class="three youtube"> <i class="fa fa-youtube padd" aria-hidden="true"></i>Youtube</a>
				 <a href="#" class="four contact"> <i class="fa fa-phone padd" aria-hidden="true"></i>Contact</a>
			</div>
		</div>
    </div>
  </div>
</div>
<!--/############################# END Content Area ###########################-->
<?php 
	//include 'footer.php';
	require 'footer.php';
?>