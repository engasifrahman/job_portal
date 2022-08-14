<?php
	require 'header.php';
	require_once('../dbconfig.php');
	global $con;

	$em_id=$_SESSION['em_info']['id'];

	$query = "SELECT CP.post_id, job_title, job_category, vacancies_no, application_deadline, posted_at, COUNT(js_id), CP.action FROM circular_post CP, selected_applied_applicants FAA, job_seeker JS WHERE FAA.em_id='$em_id'AND CP.em_id='$em_id' AND CP.post_id=FAA.post_id AND CP.action IN ('Active','Deactive') AND JS.id=FAA.js_id AND JS.action IN ('Active','Deactive') GROUP BY CP.post_id order by CP.post_id DESC";

	if (!$result = mysqli_query($con, $query))
	{
	        exit(mysqli_error($con));
	}
?>
<!--############################# BEGIN Content Area ###########################-->
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-body">

            <!--################################ BEGIN Selected Applicants Information ################################-->
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="card-header text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
                            <h4 class="card-title info" id="personal_info">
                            	<i class="fa fa-check-square-o" aria-hidden="true"></i> Selected Applicants Per Circular
                            </h4>
                        </div>
                        <div class="card-body collapse in">
                            <div class="card-block custom-card-block">
                                <div class="col-md-12 col-sm-12 col-xs-12 table_content">
                                	<?php
								    if (mysqli_num_rows($result) > 0)
								    {
								    	$total_circular=mysqli_num_rows($result);
										?>
										<div class="table-responsive card wizard-card" data-color="green">

											<div class="mt-1 pl-2 col-md-12 text-sm-center text-md-center text-lg-center text-xl-center"><strong class="success">Total Selected List: </strong><?php echo $total_circular; ?>
											</div>

											<div class="col-md-12">
												<table id="dtBasicExample" class="table table-bordered mt-1 col-md-12 col-xs-12" cellspacing="0" width="100%">
													<thead>
														<tr class="info">
															<th class="w5 text-sm-center text-md-center text-lg-center text-xl-center">#
															</th>
															<th class="w25 text-sm-center text-md-center text-lg-center text-xl-center">
																Job Title &nbsp; <i class="fa fa-sort grey" aria-hidden="true"></i>
															</th>
															<th class="w20 text-sm-center text-md-center text-lg-center text-xl-center">
																Job Category &nbsp; <i class="fa fa-sort grey" aria-hidden="true"></i>
															</th>
															<th class="w10 text-sm-center text-md-center text-lg-center text-xl-center">
																Vacancies &nbsp; <i class="fa fa-sort grey" aria-hidden="true"></i>
															</th>
															<th class="w10 text-sm-center text-md-center text-lg-center text-xl-center">
																Status &nbsp; <i class="fa fa-sort grey" aria-hidden="true"></i>
															</th>
															<th class="w10 text-sm-center text-md-center text-lg-center text-xl-center">
																Deadline &nbsp; <i class="fa fa-sort grey" aria-hidden="true"></i>
															</th>
															<th class="w10 text-sm-center text-md-center text-lg-center text-xl-center">
																Post Date &nbsp; <i class="fa fa-sort grey" aria-hidden="true"></i>
															</th>
															<th class="w10 text-sm-center text-md-center text-lg-center text-xl-center">
																Selected &nbsp; <i class="fa fa-sort grey" aria-hidden="true"></i>
															</th>
														</tr>
													</thead>
													<?php

												$i=1;
												while($post_data = mysqli_fetch_assoc($result))
												{			
													list($y, $m, $d) = explode('-', $post_data['posted_at']);
													$d=explode(' ',$d);
													$posted_at=$y;
													$posted_at.='-'.$m;
													$posted_at.='-'.$d['0'];

													$post_id=$post_data['post_id'];
													?>
														<tr>
															<td class="w5 text-sm-center text-md-center text-lg-center text-xl-center"><?php echo $i++; ?>
															</td>
															<td class="w25 text-sm-center text-md-center text-lg-center text-xl-center">
																<a href="sappp?post_id=<?php echo $post_id; ?>"  title="Click to view selected applicants"><?php echo $post_data['job_title']; ?> <i class="fa fa-external-link" aria-hidden="true"></i>
																</a>
															</td>
															<td class="w20 text-sm-center text-md-center text-lg-center text-xl-center"><?php echo $post_data['job_category']; ?>
															</td>
															<td class="w10 text-sm-center text-md-center text-lg-center text-xl-center"><?php echo $post_data['vacancies_no']; ?>
															</td>
															<td class="w10 text-sm-center text-md-center text-lg-center text-xl-center">
																<?php 
																if ($post_data['action']=='Active')
																{
																	echo
																	'
																	 	<span class="round tag tag-info">
																	 		Active
																	 	</span>
																	';
																}
																elseif ($post_data['action']=='Deactive')
																{
																	echo
																	'
																	 	<span class="round tag tag-default">
																	 		Deactive
																	 	</span>
																	';
																}
																?>
															</td>
															<td class="w10 text-sm-center text-md-center text-lg-center text-xl-center"><?php echo $posted_at; ?>
															</td>
															<td class="w10 text-sm-center text-md-center text-lg-center text-xl-center"><?php echo $post_data['application_deadline']; ?>
															</td>
															<td class="w10 text-sm-center text-md-center text-lg-center text-xl-center">
																<a href="sappp?post_id=<?php echo $post_id; ?>"  title="Click to view selected applicants">
																<span class="round tag tag-success">
														 			<?php echo $post_data['COUNT(js_id)']; ?>&nbsp;&nbsp;
														 		 <i class="fa fa-external-link" aria-hidden="true"></i>
														 		 </span>
																</a>
															</td>
														</tr>
													<?php
												}
												?>
													<tfoot>
														<tr class="info">
															<th class="w5 text-sm-center text-md-center text-lg-center text-xl-center">#</th>
															<th class="w25 text-sm-center text-md-center text-lg-center text-xl-center">Job Title</th>
															<th class="w20 text-sm-center text-md-center text-lg-center text-xl-center">Job Category</th>
															<th class="w10 text-sm-center text-md-center text-lg-center text-xl-center">Vacancies</th>
															<th class="w10 text-sm-center text-md-center text-lg-center text-xl-center">Status</th>
															<th class="w10 text-sm-center text-md-center text-lg-center text-xl-center">Deadline</th>
															<th class="w10 text-sm-center text-md-center text-lg-center text-xl-center">Post Date</th>
															<th class="w10 text-sm-center text-md-center text-lg-center text-xl-center">Total Selected</th>
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
												<strong class="text-warning"> There are no selected applicant\'s available for any circular </strong>
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
            <!--################################ END Selected Applicants Information ################################-->

        </div>
    </div>
</div>
<!--############################# END Content Area ###########################-->
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