<?php
	require 'header.php';
	require_once('../dbconfig.php');
	global $con;

	if (isset($_GET['em_id']) && !empty($_GET['em_id']))
	{
		$em_id=$_GET['em_id'];

		$query = "SELECT * FROM employer WHERE id='$em_id'";

		if (!$result = mysqli_query($con, $query)) 
		{
		        exit(mysqli_error($con));
		}

		$query2 = "SELECT * FROM em_contact_person WHERE em_id='$em_id'";

		if (!$result2 = mysqli_query($con, $query2)) {
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
		                            	<i class="icon-android-person"></i> Employer Details
		                            </h4>
		                        </div>
		                        <div class="card-body collapse in">
		                            <div class="card-block custom-card-block">
		                            	<?php
		                            	while($row = mysqli_fetch_assoc($result))
										{
											list($y, $m, $d) = explode('-', $row['created_at']);
											$d=explode(' ',$d);
											$created_at=$d['0'];
											$created_at.='-'.$m;
											$created_at.='-'.$y;
											$created_at.=' ('.$d['1'].')';

								            list($y, $m, $d) = explode('-', $row['updated_at']);
											$d=explode(' ',$d);
											$updated_at=$d['0'];
											$updated_at.='-'.$m;
											$updated_at.='-'.$y;
											$updated_at.=' ('.$d['1'].')';
											?>

											<div class="col-md-12 col-xs-12 mobile-device text-center pull-left pt-1 pb-1 border-bottom-grey">
												<div>
													<strong>Joined at:</strong> <?php echo $created_at; ?>
												</div>
											</div>

											<div class="col-xs-6 col-sm-6 col-md-6 col-xs-12 p-0 border-right-grey">
												<h3 class="text-center text-xs-center info border-bottom-grey">Company Information</h3>
	
												<div class="col-md-12 col-xs-12 mobile-device text-center pull-left mt-1">
													<div>
														<strong>Updated at:</strong> <?php echo $updated_at; ?>
													</div>
												</div>
												<?php

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
													if (!empty($row['profile_privacy']))
													{
														?>
														<div class="col-xs-6 col-sm-6 col-md-6 text-xs-right text-sm-right text-md-right text-lg-right text-xl-right mobile-device"><strong class="info">Profile Privacy :&nbsp</strong></div>
														<div class="col-xs-6 col-sm-6 col-md-6 text-justify mobile-device"><?php echo $row['profile_privacy']; ?></div>
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

											</div>

											<div class="col-xs-6 col-sm-6 col-md-6 col-xs-12 p-0">
												<h3 class="text-center text-xs-center info border-bottom-grey">Contact Person Info</h3>
				                                <?php
												while($row2 = mysqli_fetch_assoc($result2))
												{
													$cp_name	=$row2['full_name'];
													$cp_pic		=$row2['pic_dir'];
													$cp_gender	=$row2['gender'];

										            list($y, $m, $d) = explode('-', $row2['updated_at']);
													$d=explode(' ',$d);
													$updated_at=$d['0'];
													$updated_at.='-'.$m;
													$updated_at.='-'.$y;
													$updated_at.=' ('.$d['1'].')';

													?>
													<div class="col-md-12 col-xs-12 mobile-device text-center pull-left mt-1">
														<div>
															<strong>Updated at:</strong> <?php echo $updated_at; ?>
														</div>
													</div>
													<?php

														if ($cp_pic=='not_defined_yet' && $cp_gender=='Male')
														{
															echo
															'
														        <div class="col-md-12 col-sm-12 col-xs-12 pt-2 pb-1 text-center text-xs-center">
														            <img src="../images/demo/male.png" alt="'.$cp_name.'" style="width:100px; height:120px; border: 1px solid #2494BE;">
														        </div>
															';
														}

														elseif ($cp_pic=='not_defined_yet' && $cp_gender=='Female')
														{
															echo
															'
														        <div class="col-md-12 col-sm-12 col-xs-12 pt-2 pb-1 text-center text-xs-center" >
														            <img src="../images/demo/female.png" alt="'.$cp_name.'" style="width:100px; height:120px; border: 1px solid #2494BE;">
														        </div>
															';
														}

														elseif ($cp_pic=='not_defined_yet' && $cp_gender=='Others')
														{
															echo
															'
														        <div class="col-md-12 col-sm-12 col-xs-12 pt-2 pb-1 text-center text-xs-center" >
														            <img src="../images/demo/others.png" alt="'.$cp_name.'" style="width:100px; height:120px; border: 1px solid #2494BE;">
														        </div>
															';
														}

														else
														{
															echo
															'
														        <div class="col-md-12 col-sm-12 col-xs-12 pt-2 pb-1 text-center text-xs-center" >
														            <img src="'.$cp_pic.'" alt="'.$cp_name.'" style="width:100px; height:120px; border: 1px solid #2494BE;">
														        </div>
															';
														}

													?>
													<div class="col-md-12 pt-1">

														<div class="col-xs-6 col-sm-6 col-md-6 text-xs-right text-sm-right text-md-right text-lg-right text-xl-right mobile-device"><strong class="info">Full Name :&nbsp</strong></div>
														<div class="col-xs-6 col-sm-6 col-md-6 text-justify mobile-device"><?php echo $row2['full_name']; ?></div>
														<div class="clearfix pb-1"></div>

														<div class="col-xs-6 col-sm-6 col-md-6 text-xs-right text-sm-right text-md-right text-lg-right text-xl-right mobile-device"><strong class="info">Gender :&nbsp</strong></div>
														<div class="col-xs-6 col-sm-6 col-md-6 text-justify mobile-device"><?php echo $row2['gender']; ?></div>
														<div class="clearfix pb-1"></div>

														<?php
														if (!empty($row2['designation']))
														{
															?>
															<div class="col-xs-6 col-sm-6 col-md-6 text-xs-right text-sm-right text-md-right text-lg-right text-xl-right mobile-device"><strong class="info">Designation :&nbsp</strong></div>
															<div class="col-xs-6 col-sm-6 col-md-6 text-justify mobile-device"><?php echo $row2['designation']; ?></div>
															<div class="clearfix pb-1"></div>
															<?php
														}
														?>

														<?php
														if (!empty($row2['department']))
														{
															?>
															<div class="col-xs-6 col-sm-6 col-md-6 text-xs-right text-sm-right text-md-right text-lg-right text-xl-right mobile-device"><strong class="info">Department :&nbsp</strong></div>
															<div class="col-xs-6 col-sm-6 col-md-6 text-justify mobile-device"><?php echo $row2['department']; ?></div>
															<div class="clearfix pb-1"></div>
															<?php
														}
														?>

														<?php
														if (!empty($row2['mobile_no']))
														{
															?>
															<div class="col-xs-6 col-sm-6 col-md-6 text-xs-right text-sm-right text-md-right text-lg-right text-xl-right mobile-device"><strong class="info">Mobile No :&nbsp</strong></div>
															<div class="col-xs-6 col-sm-6 col-md-6 text-justify mobile-device"><?php echo $row2['mobile_no']; ?></div>
															<div class="clearfix pb-1"></div>
															<?php
														}
														?>

														<?php
														if (!empty($row2['phone_no']))
														{
															?>
															<div class="col-xs-6 col-sm-6 col-md-6 text-xs-right text-sm-right text-md-right text-lg-right text-xl-right mobile-device"><strong class="info">Phone No :&nbsp</strong></div>
															<div class="col-xs-6 col-sm-6 col-md-6 text-justify mobile-device"><?php echo $row2['phone_no']; ?></div>
															<div class="clearfix pb-1"></div>
															<?php
														}
														?>
														
														<?php
														if (!empty($row2['phone_no']))
														{
															?>
															<div class="col-xs-6 col-sm-6 col-md-6 text-xs-right text-sm-right text-md-right text-lg-right text-xl-right mobile-device"><strong class="info">Email :&nbsp</strong></div>
															<div class="col-xs-6 col-sm-6 col-md-6 text-justify mobile-device"><?php echo $row2['email']; ?></div>
															<div class="clearfix pb-1"></div>
															<?php
														}
														?>
														
														<?php
														if (!empty($row2['address']))
														{
															?>
															<div class="col-xs-6 col-sm-6 col-md-6 text-xs-right text-sm-right text-md-right text-lg-right text-xl-right mobile-device"><strong class="info">Address :&nbsp</strong></div>
															<div class="col-xs-6 col-sm-6 col-md-6 text-justify mobile-device"><?php echo $row2['address']; ?></div>
															<div class="clearfix pb-1"></div>
															<?php
														}
														?>

													</div>
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
