<?php 
	//include 'header.php';
	require 'header.php';
	require_once('../dbconfig.php');
	global $con;

	$current_date=date('Y-m-d');

	$query = "SELECT post_id FROM circular_post";
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

	$query2 = "SELECT post_id FROM circular_post WHERE action='Active'";
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

	$query3 = "SELECT post_id FROM circular_post WHERE action='Deactive'";
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

	$query4 = "SELECT post_id FROM circular_post WHERE action='Hide'";
	if (!$result4 = mysqli_query($con, $query4))
	{
	    exit(mysqli_error($con));
	}
	if (mysqli_num_rows($result4) >0)
	{
		$suspended_post=mysqli_num_rows($result4);
	}
	else
	{
		$suspended_post=0;
	}

	$query5 = "SELECT post_id FROM circular_post WHERE action='Active' AND application_deadline >= '$current_date'";
	if (!$result5 = mysqli_query($con, $query5))
	{
	    exit(mysqli_error($con));
	}
	if (mysqli_num_rows($result5) >0)
	{
		$live_post=mysqli_num_rows($result5);
	}
	else
	{
		$live_post=0;
	}


	$query6 = "SELECT id FROM job_seeker";
	if (!$result6 = mysqli_query($con, $query6))
	{
	    exit(mysqli_error($con));
	}
	if (mysqli_num_rows($result6) >0)
	{
		$total_job_seeker=mysqli_num_rows($result6);
	}
	else
	{
		$total_job_seeker=0;
	}


	$query7 = "SELECT id FROM Employer";
	if (!$result7 = mysqli_query($con, $query7))
	{
	    exit(mysqli_error($con));
	}
	if (mysqli_num_rows($result7) >0)
	{
		$total_employer=mysqli_num_rows($result7);
	}
	else
	{
		$total_employer=0;
	}

	$query7 = "SELECT post_id FROM circular_post WHERE DATE(posted_at)='$current_date'";
	if (!$result7 = mysqli_query($con, $query7))
	{
	    exit(mysqli_error($con));
	}
	if (mysqli_num_rows($result7) >0)
	{
		$todays_circular=mysqli_num_rows($result7);
	}
	else
	{
		$todays_circular=0;
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
							<a href="ljs" class="grey">
							<div class="card-block">
								<div class="media">
									<div class="media-body text-xs-left">
										<h3 class="cyan"><?php echo $total_job_seeker; ?></h3>
										<span>Total Job Seeker</span>
									</div>
									<div class="media-right media-middle">
										<i class="fa fa-graduation-cap cyan font-large-2 float-xs-right"></i>
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
							<a href="lem" class="grey">
							<div class="card-block">
								<div class="media">
									<div class="media-body text-xs-left">
										<h3 class="teal"><?php echo $total_employer; ?></h3>
										<span>Total Employer</span>
									</div>
									<div class="media-right media-middle">
										<i class="icon-user1 teal font-large-2 float-xs-right"></i>
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
							<a href="lpost" class="grey">
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
							<a href="jv@1" class="grey">
							<div class="card-block">
								<div class="media">
									<div class="media-body text-xs-left">
										<h3 class="deep-orange"><?php echo $todays_circular; ?></h3>
										<span>Today's Circular</span>
									</div>
									<div class="media-right media-middle">
										<i class="fa fa-calendar-plus-o deep-orange font-large-2 float-xs-right"></i>
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
							<a href="lpost" class="grey">
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
							<a href="lpost" class="grey">
							<div class="card-block">
								<div class="media">
									<div class="media-body text-xs-left">
										<h3 class="orange"><?php echo $deactive_post; ?></h3>
										<span>Deactive Circular</span>
									</div>
									<div class="media-right media-middle">
										<i class="icon-circle-cross orange font-large-2 float-xs-right"></i>
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
							<a href="lpost" class="grey">
							<div class="card-block">
								<div class="media">
									<div class="media-body text-xs-left">
										<h3 class="red"><?php echo $suspended_post?></h3>
										<span>Suspended Circular</span>
									</div>
									<div class="media-right media-middle">
										<i class="icon-ban2 red font-large-2 float-xs-right"></i>
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
							<a href="lpost" class="grey">
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
			<!--/ stats -->
			
        </div>
      </div>
    </div>
	<!--/############################# END Content Area ###########################-->
<?php 
	//include 'footer.php';
	require 'footer.php';
?>