<?php
	require 'header.php';
	require_once('../dbconfig.php');
	global $con;

	$js_id=$_SESSION['js_info']['id'];

	$query1 = "SELECT keywords,job_categories,job_location,business FROM targeted_job WHERE js_id='$js_id'";

	if (!$result1 = mysqli_query($con, $query1))
	{
	    exit(mysqli_error($con));
	}
	while($targeted_data = mysqli_fetch_assoc($result1))
	{

		$keywords=explode(',', $targeted_data['keywords']);
    	$job_categories=explode(', ', $targeted_data['job_categories']);
    	$business=explode(', ', $targeted_data['business']);

        $a=$targeted_data['keywords'];
        $b=$targeted_data['job_categories'];
        $c=$targeted_data['business'];
    }

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

		$current_date=date('Y-m-d');

		$query2 = "SELECT * FROM circular_post AS CP, employer AS EM 
		WHERE em_id=id AND CP.action='Active' AND EM.action='Active' AND application_deadline >= '$current_date'
		GROUP BY post_id 
		".($keywords_check || $job_catg_check || $business_check == 1 ? 'HAVING '.implode(' OR ', $sql):'')." 
		ORDER BY post_id DESC";

		if (!$result2 = mysqli_query($con, $query2))
		{
			exit(mysqli_error($con));
		}
		?>

		<!--############################# BEGIN Content Area ###########################-->
		<style type="text/css">
			.form-group input[type=search] {
			    height: 24px;
			}
		</style>
		<div class="app-content content">
		    <div class="content-wrapper">
		        <div class="content-body">

		            <!--########################## BEGIN Applied Job Information ##########################-->
		            <div class="row">
		                <div class="col-md-12 col-sm-12 col-xs-12">
		                    <div class="card">
		                        <div class="card-header text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
		                            <h4 class="card-title info" id="personal_info">
		                            	<i class="fa fa-heart-o"></i> Preferred Jobs
		                            </h4>
		                        </div>
		                        <div class="card-body collapse in">
		                            <div class="card-block custom-card-block">
		                                <div class="col-md-12 col-sm-12 col-xs-12 table_content">
		                                	<?php
										    if (mysqli_num_rows($result2) > 0)
										    {

										    	$total_matched=mysqli_num_rows($result2);

										    	?>
												<div class="table-responsive card wizard-card" data-color="green">

													<div class="mt-1 pl-2 col-md-12 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center"><strong class="success">Total Matched Job's: </strong><?php echo $total_matched; ?>
													</div>
													<div class="col-md-12">
														<table id="dtBasicExample" class="table table-bordered mt-1 col-md-12 col-xs-12	" cellspacing="0" width="100%">
															<thead>
																<tr class="info">
																	<th class="w5 text-sm-center text-md-center text-lg-center text-xl-center">
																		# &nbsp; <i class="fa fa-sort grey" aria-hidden="true"></i>
																	</th>
																	<th class="w30 text-sm-center text-md-center text-lg-center text-xl-center">
																		Job Title &nbsp; <i class="fa fa-sort grey" aria-hidden="true"></i>
																	</th>
																	<th class="w30 text-sm-center text-md-center text-lg-center text-xl-center">
																		Company &nbsp; <i class="fa fa-sort grey" aria-hidden="true"></i>
																	</th>
																	<th class="w15 text-sm-center text-md-center text-lg-center text-xl-center">
																		No of Vacancies &nbsp; <i class="fa fa-sort grey" aria-hidden="true"></i>
																	</th>
																	<th class="w20 text-sm-center text-md-center text-lg-center text-xl-center">
																		Deadline &nbsp; <i class="fa fa-sort grey" aria-hidden="true"></i>
																	</th>
																</tr>
															</thead>
									    				<?php
									    				$i=1;
														while($post_data = mysqli_fetch_assoc($result2))
														{
															$post_id				=$post_data['post_id'];
															$company_name			=$post_data['company_name'];
															$vacancies_no			=$post_data['vacancies_no'];
															$application_deadline	=$post_data['application_deadline'];

																echo
																'
																<tr>
																	<td class="w5 text-sm-center text-md-center text-lg-center text-xl-center">'.$i++.'
																	</td>
																	<td class="w30 text-sm-center text-md-center text-lg-center text-xl-center">
																		<a href="jvd<'.$post_id.'" title="Click to view details">'.$post_data['job_title'].' <i class="fa fa-external-link" aria-hidden="true"></i>
																		</a>
																	</td>
																	<td class="w30 text-sm-center text-md-center text-lg-center text-xl-center">'.$post_data['company_name'].'
																	</td>
																	<td class="w15 text-sm-center text-md-center text-lg-center text-xl-center">'.$post_data['vacancies_no'].'
																	</td>
																	<td class="w20 text-sm-center text-md-center text-lg-center text-xl-center">'.$post_data['application_deadline'].'
																	</td>

																</tr>
															';
														}
														?>
															<tfoot>
																<tr class="info">
																	<th class="w5 text-sm-center text-md-center text-lg-center text-xl-center">
																		#
																	</th>
																	<th class="w30 text-sm-center text-md-center text-lg-center text-xl-center">
																		Job Title
																	</th>
																	<th class="w30 text-sm-center text-md-center text-lg-center text-xl-center">
																		Company
																	</th>
																	<th class="w15 text-sm-center text-md-center text-lg-center text-xl-center">
																		No of Vacancies
																	</th>
																	<th class="w20 text-sm-center text-md-center text-lg-center text-xl-center">
																		Deadline</i>
																	</th>
																</tr>
															</tfoot>
														</table>
													</div>
												</div>
											<?php
											}

											else
											{
												echo
												'
													<div class="text-sm-center text-md-center text-lg-center text-xl-center">
														<strong class="text-warning">No matching job found</strong>
													</div>
												';
											}
											?>
		                            	</div>
		                        	</div>
		                    	</div>
		                	</div>
		            	</div>
		            </div>
		            <!--########################### END Applied Job Information ###########################-->

		        </div>
		    </div>
		</div>
		<!--############################# END Content Area ###########################-->
		<?php
	}
	else
	{
		echo
		'
		<div class="app-content content">
		    <div class="content-wrapper">
		        <div class="content-body">
					<div class="text-sm-center text-md-center text-lg-center text-xl-center">
						<strong class="text-warning">Targeted job is not mentioned yet</strong>
					</div>
				</div>
			</div>
		</div>
		';
	}
	?>
<script type="text/javascript">

	$(document).ready(function () {

	    $('#dtBasicExample').DataTable({
		    //"searching": false // false to disable search (or any other option)
		    //"ordering": false // false to disable sorting (or any other option)
		    "paging": false // false to disable pagination (or any other option)
		 });
	 	$('.dataTables_length').addClass('bs-select');
	});

</script>
<?php 
	//include 'footer.php';
	require 'footer.php';
?>