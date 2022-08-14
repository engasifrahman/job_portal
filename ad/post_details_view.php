<?php 
	session_start();
	require_once('../dbconfig.php');
	global $con;
	if(isset($_POST['post_id']))
	{
		$post_id=$_POST['post_id'];
		$current_date=date('Y-m-d');

		$query1 = "SELECT * FROM circular_post AS CP, employer AS EM WHERE post_id='$post_id' AND em_id=id ";
		if (!$result1 = mysqli_query($con, $query1)) {
		        exit(mysqli_error($con));
		}
	}

?>
<div class="col-md-12">

	<?php

	    if (mysqli_num_rows($result1) > 0)
	    {
	    	while($post_data = mysqli_fetch_assoc($result1))
	    	{
				$id 				= $post_data['post_id'];
				$em_id 				= $post_data['em_id'];
				$company_name		= $post_data['company_name'];
				$job_title			= $post_data['job_title'];
				$job_category		= $post_data['job_category'];
				$job_description	= $post_data['job_description'];
				$vacancies_no		= $post_data['vacancies_no'];
				$job_level			= $post_data['job_level'];
				$job_nature			= $post_data['job_nature'];
				$job_location		= $post_data['job_location'];
				$details_location	= $post_data['details_location'];
				$skills_req			= $post_data['skills_requirements'];
				$gender_req			= $post_data['gender_requirements'];
				$age_req 			= $post_data['age_requirements'];
				$exp_years			= $post_data['experience_years'];
				$edu_req			= $post_data['educational_requirements'];
				$additional_req		= $post_data['additional_requirements'];	
				$salary_range		= $post_data['salary_range'];
				$salary_details		= $post_data['salary_details'];
				$extra_facilities	= $post_data['extra_facilities'];
				$apply_instructions	= $post_data['apply_instructions'];
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
				$posted_at.=' ('.$d['1'].')';

				list($y, $m, $d) = explode('-', $post_data['updated_at']);
				$d=explode(' ',$d);

				$updated_at=$d['0'];
				$updated_at.='-'.$m;
				$updated_at.='-'.$y;
				$updated_at.=' ('.$d['1'].')';

				?>

				<section id="display-headings" class="card no-border" >
					<div class="card-header bg-blue-grey bg-darken-2 text-white">
						<h5 class="card-title" style="color:white !important;">
								<?php echo $job_title; ?>
						</h5>
						<div class="heading-elements d-none d-sm-block">
							<ul class="list-inline mb-0">
								<li>Deadline: <?php echo $app_deadline; ?></li>
							</ul>
						</div>
					</div>

					<div class="card-body collapse in">
						<div class="card-block">

							<div class="card-text text-center border-bottom">
								<div><strong>Posted at:</strong> <?php echo $posted_at; ?> &nbsp;&nbsp; <strong>Updated at:</strong> <?php echo $updated_at; ?></div>
							</div>

							<div class="card-text mt-2">
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
									<i class="fa fa-map-marker pr-1"></i>
									<span>
										<?php
											if($details_location=="Not mentioned")
											{
												echo $job_location;
											}
											else
											{
												echo $job_location.', '.$details_location; 
											}
										?>
									</span>
								</p>
							</div>

							<div class="card-text">
								<p>
									<strong>Job Description:</strong>
									<div class="pl-3 text-justify">
										<?php echo $job_description; ?>
									</div>
								</p>
							</div>

							<div class="card-text">
								<p>
									<strong>Job Requirements:</strong>
									<div class="pl-3">

										<strong>Job Category:</strong>
										<span >
											<?php echo $job_category; ?>
										</span><br><br>

										<strong>Job Level:</strong>
										<span >
											<?php echo $job_level; ?>
										</span><br><br>

										<strong>Job Nature:</strong>
										<span >
											<?php echo $job_nature; ?>
										</span><br><br>

										<strong>Vacancies No:</strong>
										<span >
											<?php echo $vacancies_no; ?>
										</span><br><br>

										<strong>Skills Requirements:</strong>
										<span >
											<?php echo $skills_req; ?>
										</span><br><br>

										<strong>Educational Requirements:</strong>
										<span >
											<?php echo $edu_req; ?>
										</span><br><br>

										<strong>Experience Requirements:</strong>
										<span >
											<?php echo $exp_years; ?>
										</span><br><br>
										
										<strong>Age Requirements:</strong>
										<span >
											<?php echo $age_req; ?>
										</span><br><br>

										<strong>Gender Requirements:</strong>
										<span >
											<?php echo $gender_req; ?>
										</span><br><br>
										

										<strong>Additional Requirements:</strong>
										<div class="pl-3">
											<?php echo $additional_req; ?>
										</div>
									</div>
								</p>
							</div>

							<div class="card-text">
								<p>
									<strong>Salary Range:</strong>
									<div class="pl-3 text-justify">
										<?php 
											echo $salary_range;
											if(!$salary_details=="Not mentioned")
											{
												echo '<br>'.$salary_details;
											}
										?>
									</div>
								</p>
							</div>

							<div class="card-text">
								<p>
									<strong>Other Benefits:</strong>
									<div class="pl-3 text-justify">
										<?php echo $extra_facilities; ?>
									</div>
								</p>
							</div>

							<div class="card-text">
								<p>
									<strong>Apply Instraction's:</strong>
									<div class="pl-3 text-justify">
										<?php echo $apply_instructions; ?>
									</div>
								</p>
							</div>

							<div class="card-text">
								<p>
									<strong>Application Deadline:</strong>
									<div class="pl-3 text-justify">
										<?php echo $app_deadline; ?>
									</div>
								</p>
							</div>

							<div class="card-text">
								<p>
									<strong>Job Posted At:</strong>
									<div class="pl-3 text-justify">
										<?php echo $posted_at; ?>
									</div>
								</p>
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
			
			<p align="center" class="warning">Sorry! Details of this circular are not found [Either removed or it's exceeding the deadline]</p>

			<?php
		}
	?>

</div>

<script type="text/javascript">

    //############################### BEGIN APPLY ##############################//
    $('button[name="apply_job"]').click(function(e){
    	var post_id = $(this).attr('id');
        $.ajax({
            type: 'post',
            url: 'jvda',   // here your php file to do something with postdata
            data: { post_id: post_id },
            success: function (data) {
              $('#job_view_details_notification_content').show().fadeOut(4100).html(data);
            },
            error: function() {
                $.notify({

                    // where to append the toast notification
                    wrapper: 'body',

                    // toast message
                    message: 'Error here',

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
            }
      });

      e.preventDefault();

    });
    //############################### END APPLY ##############################//

    //############################### BEGIN SAVE ##############################//
    $('button[name="save_job"]').click(function(e){
    	var post_id = $(this).attr('id');
        $.ajax({
            type: 'post',
            url: 'jvds',   // here your php file to do something with postdata
            data: { post_id: post_id },
            success: function (data) {
              $('#job_view_details_notification_content').show().fadeOut(4100).html(data);
            },
            error: function() {
                $.notify({

                    // where to append the toast notification
                    wrapper: 'body',

                    // toast message
                    message: 'Error here',

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
            }
      });

      e.preventDefault();

    });
    //############################### END SAVE ##############################//

    //############################### BEGIN UNSAVE ##############################//
	$('button[name="unsave_job"]').click(function(e) {
		var post_id = $(this).attr('id');

		$.ajax({
		    url : "sjr",
		    type: "POST",
		    data : { post_id: post_id },
            success: function (data) {
              $('#job_view_details_notification_content').show().fadeOut(4100).html(data);
            },
            error: function() {
                $.notify({

                    // where to append the toast notification
                    wrapper: 'body',

                    // toast message
                    message: 'Error here',

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
            }
		});
		e.preventDefault();
	});
	//############################### END UNSAVE ##############################//
 </script>