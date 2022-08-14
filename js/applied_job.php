<?php
	require 'header.php';
	require_once('../dbconfig.php');
	global $con;

	$js_id=$_SESSION['js_info']['id'];

	$query = "SELECT AJ.post_id, applied_at, company_name, job_title, vacancies_no, application_deadline FROM applied_job AJ, circular_post CP, employer AS EM WHERE js_id='$js_id' AND CP.post_id=AJ.post_id AND EM.id=em_id AND CP.action='Active' AND EM.action='Active' ORDER BY AJ.id DESC";

	if (!$result = mysqli_query($con, $query))
	{
	        exit(mysqli_error($con));
	}
?>
<!--############################# BEGIN Content Area ###########################-->
<style type="text/css">
	.form-group {
	    padding-bottom: 0px;
	    margin: 0;
	}
	.form-group .form-control {
	    margin-bottom: 0px;
	}
	.form-group input[type=search] {
	    height: 24px;
	}
</style>
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-body">

            <!--################################ BEGIN Applied Job Information ################################-->
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="card-header text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
                            <h4 class="card-title info" id="personal_info">
                            	<i class="fa fa-paper-plane-o"></i> Applied Jobs
                            </h4>
                        </div>
                        <div class="card-body collapse in">
                            <div class="card-block custom-card-block">
                                <div class="col-md-12 col-sm-12 col-xs-12 table_content">
                                	<?php
                                	$total_applied=mysqli_num_rows($result);
								    if (mysqli_num_rows($result) > 0)
								    {
										?>
										<div class="table-responsive card wizard-card" data-color="green">
											<div class="mt-1 pl-2 col-md-12 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center"><strong class="success">Total Applied Job's: </strong><?php echo $total_applied; ?>
											</div>
											<div class="col-md-12">
												<table id="dtBasicExample" class="table table-bordered mt-1 col-md-12 col-xs-12" cellspacing="0" width="100%">
													<thead>
														<tr class="info">
															<th class="w5 text-sm-center text-md-center text-lg-center text-xl-center">
																# &nbsp; <i class="fa fa-sort grey" aria-hidden="true"></i>
															</th>
															<th class="w25 text-sm-center text-md-center text-lg-center text-xl-center">
																Job Title &nbsp; <i class="fa fa-sort grey" aria-hidden="true"></i>
															</th>
															<th class="w25 text-sm-center text-md-center text-lg-center text-xl-center">
																Company &nbsp; <i class="fa fa-sort grey" aria-hidden="true"></i>
															</th>
															<th class="w15 text-sm-center text-md-center text-lg-center text-xl-center">
																No of Vacancies &nbsp; <i class="fa fa-sort grey" aria-hidden="true"></i>
															</th>
															<th class="w15 text-sm-center text-md-center text-lg-center text-xl-center">
																Deadline &nbsp; <i class="fa fa-sort grey" aria-hidden="true"></i>
															</th>
															<th class="w15 text-sm-center text-md-center text-lg-center text-xl-center">
																Apply Date &nbsp; <i class="fa fa-sort grey" aria-hidden="true"></i>
															</th>
														</tr>
													</thead>
												<?php

												$i=0;
												while($applied_data = mysqli_fetch_assoc($result))
												{			
													list($y, $m, $d) = explode('-', $applied_data['applied_at']);
													$d=explode(' ',$d);
													$applied_at=$y;
													$applied_at.='-'.$m;
													$applied_at.='-'.$d['0'];
													$post_id=$applied_data['post_id'];
													?>
													<tr>
														<td class="w5 text-sm-center text-md-center text-lg-center text-xl-center"><?php $i++; echo $i; ?></td>
														<td class="w25 text-sm-center text-md-center text-lg-center text-xl-center">
															<a href="jvd<<?php  echo $post_id; ?>"  title="Click to view details"><?php  echo $applied_data['job_title']; ?> <i class="fa fa-external-link" aria-hidden="true"></i>
															</a>
														</td>
														<td class="w25 text-sm-center text-md-center text-lg-center text-xl-center"><?php  echo $applied_data['company_name']; ?></td>
														<td class="w15 text-sm-center text-md-center text-lg-center text-xl-center"><?php  echo $applied_data['vacancies_no']; ?></td>
														<td class="w15 text-sm-center text-md-center text-lg-center text-xl-center"><?php  echo $applied_data['application_deadline']; ?></td>
														<td class="w15 text-sm-center text-md-center text-lg-center text-xl-center"><?php  echo $applied_at; ?></td>
													</tr>
													<?php
												}

												?>
													<tfoot>
														<tr class="info">
															<th class="w5 text-sm-center text-md-center text-lg-center text-xl-center">#</th>
															<th class="w25 text-sm-center text-md-center text-lg-center text-xl-center">Job Title</th>
															<th class="w25 text-sm-center text-md-center text-lg-center text-xl-center">Company</th>
															<th class="w15 text-sm-center text-md-center text-lg-center text-xl-center">No of Vacancies</th>
															<th class="w15 text-sm-center text-md-center text-lg-center text-xl-center">Deadline</th>
															<th class="w15 text-sm-center text-md-center text-lg-center text-xl-center">Apply Date</th>
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
												<strong class="text-warning">Until now, you have not applied for any job</strong>
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
        </div>
            <!--################################ END Applied Job Information ################################-->

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