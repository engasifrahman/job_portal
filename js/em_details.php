<?php
	require 'header.php';
	require_once('../dbconfig.php');
	global $con;

	if (isset($_GET['em_id']) && !empty($_GET['em_id']))
	{
		$em_id=$_GET['em_id'];

		$query = "SELECT * FROM employer WHERE id='$em_id' AND action='Active' AND profile_privacy='Public'";

		if (!$result = mysqli_query($con, $query)) 
		{
		        exit(mysqli_error($con));
		}
		?>


		<!--############################# BEGIN Content Area ###########################-->
		<div class="app-content content">
		    <div class="content-wrapper">
		        <div class="content-body">

		            <!--################################ BEGIN Employer Information ################################-->
		            <div class="row">
		                <div class="col-md-12 col-sm-12 col-xs-12">
		                    <div class="card">
		                        <div class="card-header text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
		                            <h4 class="card-title info" id="personal_info">
		                            	<i class="icon-android-person"></i> Employer Detals
		                            </h4>
		                        </div>
		                        <div class="card-body collapse in">
		                            <div class="card-block custom-card-block">

		                                <?php
										while($row = mysqli_fetch_assoc($result))
										{
											if ($row['logo_dir']=='not_defined_yet')
											{
												echo
												'
											        <div class="col-md-12 col-sm-12 col-xs-12 pt-2 pb-1 text-center text-xs-center">
											            <img src="../images/demo/nologo.png" alt="'.$row['company_name'].'" style="width:120px; height:120px; border: 1px solid #2494BE;">
											        </div>
												';
											}

											else
											{
												echo
												'
											        <div class="col-md-12 col-sm-12 col-xs-12 pt-2 pb-1 text-center text-xs-center" >
											            <img src="'.$row['logo_dir'].'" alt="'.$row['company_name'].'" style="width:120px; height:120px; border: 1px solid #2494BE;">
											        </div>
												';
											}

											?>
											<div class="col-md-12 pt-1">

												<div class="col-xs-6 col-sm-6 col-md-6 text-xs-right text-sm-right text-md-right text-lg-right text-xl-right mobile-device">
													<strong class="info">Company Name :&nbsp</strong>
												</div>
												<div class="col-xs-6 col-sm-6 col-md-6 text-justify mobile-device">
													<?php echo $row['company_name']; ?>
												</div>
												<div class="clearfix pb-1"></div>

												<div class="col-xs-6 col-sm-6 col-md-6 text-xs-right text-sm-right text-md-right text-lg-right text-xl-right mobile-device"><strong class="info">Company Type :&nbsp</strong></div>
												<div class="col-xs-6 col-sm-6 col-md-6 text-justify mobile-device"><?php echo $row['company_type']; ?></div>
												<div class="clearfix pb-1"></div>

												<div class="col-xs-6 col-sm-6 col-md-6 text-xs-right text-sm-right text-md-right text-lg-right text-xl-right mobile-device"><strong class="info">Company Category :&nbsp</strong></div>
												<div class="col-xs-6 col-sm-6 col-md-6 text-justify mobile-device"><?php echo $row['company_category']; ?></div>
												<div class="clearfix pb-1"></div>

												<?php
												if (!empty($row['company_size']))
												{
													?>
													<div class="col-xs-6 col-sm-6 col-md-6 text-xs-right text-sm-right text-md-right text-lg-right text-xl-right mobile-device"><strong class="info">Company Size :&nbsp</strong></div>
													<div class="col-xs-6 col-sm-6 col-md-6 text-justify mobile-device"><?php echo $row['company_size']; ?></div>
													<div class="clearfix pb-1"></div>
													<?php
												}
												?>
												

												<?php
												if (!empty($row['employer_type']))
												{
													?>
													<div class="col-xs-6 col-sm-6 col-md-6 text-xs-right text-sm-right text-md-right text-lg-right text-xl-right mobile-device"><strong class="info">Employer Type :&nbsp</strong></div>
													<div class="col-xs-6 col-sm-6 col-md-6 text-justify mobile-device"><?php echo $row['employer_type']; ?></div>
													<div class="clearfix pb-1"></div>
													<?php
												}
												?>												

												<div class="col-xs-6 col-sm-6 col-md-6 text-xs-right text-sm-right text-md-right text-lg-right text-xl-right mobile-device"><strong class="info">City :&nbsp</strong></div>
												<div class="col-xs-6 col-sm-6 col-md-6 text-justify mobile-device"><?php echo $row['city']; ?></div>
												<div class="clearfix pb-1"></div>

												<div class="col-xs-6 col-sm-6 col-md-6 text-xs-right text-sm-right text-md-right text-lg-right text-xl-right mobile-device"><strong class="info">ZIP Code :&nbsp</strong></div>
												<div class="col-xs-6 col-sm-6 col-md-6 text-justify mobile-device"><?php echo $row['zip_code']; ?></div>
												<div class="clearfix pb-1"></div>

												<div class="col-xs-6 col-sm-6 col-md-6 text-xs-right text-sm-right text-md-right text-lg-right text-xl-right mobile-device"><strong class="info">Location :&nbsp</strong></div>
												<div class="col-xs-6 col-sm-6 col-md-6 text-justify mobile-device"><?php echo $row['location']; ?></div>
												<div class="clearfix pb-1"></div>

												<?php
												if (!empty($row['web_url']))
												{
													?>
													<div class="col-xs-6 col-sm-6 col-md-6 text-xs-right text-sm-right text-md-right text-lg-right text-xl-right mobile-device"><strong class="info">Web Site :&nbsp</strong></div>
													<div class="col-xs-6 col-sm-6 col-md-6 text-justify mobile-device">
														<a href="<?php echo $row['web_url']; ?>" target="blank"><?php echo $row['web_url']; ?></a>
													</div>
													<div class="clearfix pb-1"></div>
													<?php
												}
												?>

												<div class="col-xs-6 col-sm-6 col-md-6 text-xs-right text-sm-right text-md-right text-lg-right text-xl-right mobile-device"><strong class="info">Mobile No :&nbsp</strong></div>
												<div class="col-xs-6 col-sm-6 col-md-6 text-justify mobile-device"><?php echo $row['mobile_number']; ?></div>
												<div class="clearfix pb-1"></div>

												<?php
												if (!empty($row['phone_number']))
												{
													?>
													<div class="col-xs-6 col-sm-6 col-md-6 text-xs-right text-sm-right text-md-right text-lg-right text-xl-right mobile-device"><strong class="info">Phone No :&nbsp</strong></div>
													<div class="col-xs-6 col-sm-6 col-md-6 text-justify mobile-device"><?php echo $row['phone_number']; ?></div>
													<div class="clearfix pb-1"></div>
													<?php
												}
												?>

												<?php
												if (!empty($row['portfolio']))
												{
													?>
													<div class="col-xs-12 col-sm-12 col-md-12 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center mobile-device">
													<strong class="info">Portfolio </strong>
													</div>
													<div class="col-xs-12 col-sm-12 col-md-12 text-justify mobile-device">
														<div class="fr-view">
															<?php echo $row['portfolio']; ?>
														</div>
													</div>
													<div class="clearfix pb-1"></div>
													<?php
												}
												?>

											</div>
											<?php
											
										}
										?>

		                        	</div>
		                    	</div>
		                	</div>
		            	</div>
		            </div>
		            <!--################################ END Employer Information ################################-->

		        </div>
		    </div>
		</div>
		<!--############################# END Content Area ###########################-->
		<?php
	}
	else
	{
		?>
		<script type="text/javascript">
			    $.notify({

                    // where to append the toast notification
                    wrapper: 'body',

                    // toast message
                    message: 'Something went wrong please try again later',

                    // success, info, error, warn
                    type: 'error',

                    // 1: top-left, 2: top-center, 3: top-right
                    // 4: mid-left, 5: mid-right
                    // 6: bottom-left, 7: bottom-center, 8: bottom-right
                    position: 3,

                    // or 'rtl'
                    dir: 'ltr',

                    // enable/disable auto close
                    autoClose: true,

                    // timeout in milliseconds
                    duration: 4000
                  
                });
		</script>
		<?php
	}

	require 'footer.php';
?>
