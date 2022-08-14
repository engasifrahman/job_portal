<?php 
	//include 'header.php';
	require 'header.php';
	require_once('../dbconfig.php');
	global $con;

	$em_id=$_SESSION['em_info']['id'];
	$logo=$_SESSION['em_info']['logo'];
	$company_name=$_SESSION['em_info']['company_name'];
	$location=$_SESSION['em_info']['location'];

	$current_date=date('Y-m-d');

	$query = "SELECT post_id FROM circular_post WHERE em_id='$em_id' AND action IN('Active', 'Deactive')";
	if (!$result = mysqli_query($con, $query))
	{
	    exit(mysqli_error($con));
	}
	if (mysqli_num_rows($result) >0)
	{
		$total_post=mysqli_num_rows($result);
	}
	else
	{
		$total_post=0;
	}

	$query2 = "SELECT post_id FROM circular_post WHERE em_id='$em_id' AND action='Active'";
	if (!$result2 = mysqli_query($con, $query2))
	{
	    exit(mysqli_error($con));
	}
	if (mysqli_num_rows($result2) >0)
	{
		$active_post=mysqli_num_rows($result2);
	}
	else
	{
		$active_post=0;
	}

	$query3 = "SELECT post_id FROM circular_post WHERE em_id='$em_id' AND action='Deactive'";
	if (!$result3 = mysqli_query($con, $query3))
	{
	    exit(mysqli_error($con));
	}
	if (mysqli_num_rows($result3) >0)
	{
		$deactive_post=mysqli_num_rows($result3);
	}
	else
	{
		$deactive_post=0;
	}


	$query4 = "SELECT post_id FROM circular_post WHERE em_id='$em_id' AND action='Active' AND application_deadline >= '$current_date'";
	if (!$result4 = mysqli_query($con, $query4))
	{
	    exit(mysqli_error($con));
	}
	if (mysqli_num_rows($result4) >0)
	{
		$live_post=mysqli_num_rows($result4);
	}
	else
	{
		$live_post=0;
	}


	$query5 = "SELECT MAX(post_id) AS last_post_id FROM circular_post WHERE em_id='$em_id' AND action='Active' ORDER BY post_id DESC";
	if (!$result5 = mysqli_query($con, $query5))
	{
	    exit(mysqli_error($con));
	}
	if (mysqli_num_rows($result5) >0)
	{

		while($last_post_data = mysqli_fetch_assoc($result5))
		{
			$last_post_id=$last_post_data['last_post_id'];
		}
		if (!empty($last_post_id))
		{
			$query6 = "SELECT id FROM applied_job WHERE  post_id='$last_post_id'";
			if (!$result6 = mysqli_query($con, $query6))
			{
			    exit(mysqli_error($con));
			}
			if (mysqli_num_rows($result6) >0)
			{
				$total_applied_last_post=mysqli_num_rows($result6);
			}
			else
			{
				$total_applied_last_post=0;
			}


			$query7 = "SELECT SUM(visit_count) AS total_visit_last_post FROM circular_visited CV, job_seeker JS WHERE CV.post_id='$last_post_id' AND JS.id=CV.js_id AND js.action='Active'";
			if (!$result7 = mysqli_query($con, $query7))
			{
			    exit(mysqli_error($con));
			}
			if (mysqli_num_rows($result7) >0)
			{

				while($visit_data = mysqli_fetch_assoc($result7))
				{
					$total_visit_last_post=$visit_data['total_visit_last_post'];
				}
				if (empty($total_visit_last_post))
				{
					$total_visit_last_post=0;
				}
			}
			else
			{
				$total_visited_last_post=0;
			}
		}
		else
		{
			$total_applied_last_post=0;
			$total_visit_last_post=0;
		}
		
	}
	else
	{
		$total_applied_last_post=0;
		$total_visit_last_post=0;
	}


	$query8 = "SELECT EMFJS.id FROM em_following_js EMFJS, job_seeker JS WHERE em_id='$em_id' AND JS.id=EMFJS.js_id AND action='Active'";
	if (!$result8 = mysqli_query($con, $query8))
	{
	        exit(mysqli_error($con));
	}
	if (mysqli_num_rows($result8) > 0)
	{
		$total_following=mysqli_num_rows($result8);
	}
	else
	{
		$total_following=0;
	}

	$query9 = "SELECT JSFEM.id FROM js_following_em JSFEM, job_seeker JS WHERE em_id='$em_id' AND JS.id=JSFEM.js_id AND action='Active'";
	if (!$result9 = mysqli_query($con, $query9))
	{
	        exit(mysqli_error($con));
	}
	if (mysqli_num_rows($result9) > 0)
	{
		$total_follower=mysqli_num_rows($result9);
	}
	else
	{
		$total_follower=0;
	}

?>
	<!--############################# BEGIN Content Area ###########################-->
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
								if ($logo=='not_defined_yet')
								{
									?>
									<img src="../images/demo/nologo.png" alt="<?php echo $company_name; ?>" style="width:160px; height:120px; border: 1px solid #2494BE;">
									<?php
								}
								else
								{
									?>
									<img src="<?php echo $logo; ?>" alt="<?php echo $company_name; ?>" style="width:160px; height:120px; border: 1px solid #2494BE;">
									<?php
								}
								?>
								<h3 class="pt-1"><b><?php echo $company_name; ?></b></h3>
								<span><?php echo $location; ?></span>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-xl-3 col-lg-6 col-xs-12">
					<div class="card">
						<div class="card-body">
							<a href="cicurlar" class="grey">
							<div class="card-block">
								<div class="media">
									<div class="media-body text-xs-left">
										<h3 class="green"><?php echo $total_post; ?></h3>
										<span>Total Circular</span>
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
				<div class="col-xl-3 col-lg-6 col-xs-12">
					<div class="card">
						<div class="card-body">
							<a href="cicurlar" class="grey">
							<div class="card-block">
								<div class="media">
									<div class="media-body text-xs-left">
										<h3 class="teal"><?php echo $active_post; ?></h3>
										<span>Active Circular</span>
									</div>
									<div class="media-right media-middle">
										<i class="icon-circle-check teal font-large-2 float-xs-right"></i>
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
							<a href="cicurlar" class="grey">
							<div class="card-block">
								<div class="media">
									<div class="media-body text-xs-left">
										<h3 class="red"><?php echo $deactive_post; ?></h3>
										<span>Deactive Circular</span>
									</div>
									<div class="media-right media-middle">
										<i class="icon-circle-cross red font-large-2 float-xs-right"></i>
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
							<a href="cicurlar" class="grey">
							<div class="card-block">
								<div class="media">
									<div class="media-body text-xs-left">
										<h3 class="cyan"><?php echo $live_post; ?></h3>
										<span>Live Circular</span>
									</div>
									<div class="media-right media-middle">
										<i class="fa fa-desktop cyan font-large-2 float-xs-right"></i>
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
							<a href="aappp?post_id=<?php echo $last_post_id; ?>" class="grey">
							<div class="card-block">
								<div class="media">
									<div class="media-body text-xs-left">
										<h3 class="green"><?php echo $total_applied_last_post; ?></h3>
										<span>Total Applied <small>(Last Circular)</small></span>
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
							<a href="visit_details?post_id=<?php echo $last_post_id; ?>" class="grey">
							<div class="card-block">
								<div class="media">
									<div class="media-body text-xs-left">
										<h3 class="deep-orange"><?php echo $total_visit_last_post; ?></h3>
										<span>Total Visited <small>(Last Circular)</small></span>
									</div>
									<div class="media-right media-middle">
										<i class="fa fa-eye deep-orange font-large-2 float-xs-right"></i>
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
							<a href="fjs" class="grey">
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
							<a href="fjs" class="grey">
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