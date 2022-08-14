<?php 
	//include 'header.php';
	require 'header.php';

	require_once('../class_library/employer_job_posts_view_class.php');
	$post_view= new Circulars_Data_View;
	$post_table=$post_view->circulars_data_table();
	$x='';
?>
	<!--############################# BEGIN Content Area ###########################-->
    <div class="app-content content ">
      <div class="content-wrapper">
        <div class="content-body">
					
			<div class="row">
				<div class="col-md-13">

					<section id="display-headings" class="card bg-blue-grey bg-lighten-4" style="min-height:100vh !important;">
						<div class="card-header bg-cyan bg-darken-3 text-white no-border-bottom">
							<h4 class="card-title">Total Circular's: <?php echo $post_table->num_rows;?> </h4>
							<div class="heading-elements">
								<ul class="list-inline mb-0">
									<li><a data-action="expand"><i class="icon-expand2 text-white"></i></a></li>
								</ul>
							</div>
						</div>
						<div class="card-body collapse in">
							<div class="card-block">
								<?php
									//echo "<pre>";
					        		//print_r($post_table);
					        		//echo "</pre>";
									if($post_table->num_rows >0)
									{
										$x=1;
										while($post_data = $post_table->fetch_assoc())
										{
											
											$post_id 			= $post_data['post_id'];
											$em_id 				= $post_data['em_id'];
											$job_title			= $post_data['job_title'];
											$job_category		= $post_data['job_category'];
											$educational_req	= $post_data['educational_requirements'];
											$vacancies_no		= $post_data['vacancies_no'];
											$job_location		= $post_data['job_location'];
											$skills_req			= $post_data['skills_requirements'];
											$exp_years			= $post_data['experience_years'];
											$salary_range		= $post_data['salary_range'];
											$app_deadline		= $post_data['application_deadline'];
											$action 			= $post_data['action'];
											$posted_at 			= $post_data['posted_at'];

											?>

											<section id="display-headings" class="card jobView no-border" >
												<div class="card-header bg-blue-grey bg-darken-2 text-white">
													<h5 class="card-title">
														<a class="text-white jobLink" href="circular_details.php?post_id=<?php echo $post_id; ?>" >
															<?php echo $job_title; ?>
														</a> 
													</h5>

													<div class="heading-elements">
														<ul class="list-inline mb-0">
															<li>Post No: <?php echo $x++; ?></li>
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
																	echo $_SESSION['em_info']['company_name']; ?>
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
												You have not posted any circular yet!
											</p>
										<?php
									}
								?>
							</div>
						</div>
					</section>

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