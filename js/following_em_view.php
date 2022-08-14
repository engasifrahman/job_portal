<?php
	session_start();
	require_once('../dbconfig.php');
	global $con;

	$js_id=$_SESSION['js_info']['id'];
	$query1 = "SELECT em_id, started_at, company_name, company_category FROM js_following_em JSFEM, employer EM  WHERE js_id='$js_id' AND EM.id=JSFEM.em_id AND action='Active' ORDER BY JSFEM.id DESC";
	if (!$result1 = mysqli_query($con, $query1))
	{
	    exit(mysqli_error($con));
	}

	$query2 = "SELECT em_id FROM em_following_js WHERE js_id='$js_id'";
	if (!$result2 = mysqli_query($con, $query2))
	{
	    exit(mysqli_error($con));
	}
	if (mysqli_num_rows($result2) > 0)
	{
		while($follower_data = mysqli_fetch_assoc($result2))
		{
			$follower_em_id[]=$follower_data['em_id'];
		}
	}
	else
	{
		$follower_em_id=NULL;
	}
?>

<div class="col-md-12">
	<?php
	if (mysqli_num_rows($result1) > 0)
	{
		$total_following=mysqli_num_rows($result1);
		$total_follower=0;
		?>
		<div class="table-responsive card wizard-card" data-color="green">

			<div class="col-md-12">
				<table id="dtBasicExample" class="table table-bordered mt-1 col-md-12 col-xs-12	" cellspacing="0" width="100%">
					<thead>
						<tr class="info">
							<th class="w5 text-sm-center text-md-center text-lg-center text-xl-center">
								# &nbsp; <i class="fa fa-sort grey" aria-hidden="true"></i>
							</th>
							<th class="w20 text-sm-center text-md-center text-lg-center text-xl-center">
								Company Name &nbsp; <i class="fa fa-sort grey" aria-hidden="true"></i>
							</th>
							<th class="w20 text-sm-center text-md-center text-lg-center text-xl-center">
								Company Category &nbsp; <i class="fa fa-sort grey" aria-hidden="true"></i>
							</th>
							<th class="w15 text-sm-center text-md-center text-lg-center text-xl-center">
								Availabe Jobs &nbsp; <i class="fa fa-sort grey" aria-hidden="true"></i>
							</th>
							<th class="w15 text-sm-center text-md-center text-lg-center text-xl-center">
								Following From &nbsp; <i class="fa fa-sort grey" aria-hidden="true"></i>
							</th>
							<th class="w15 text-sm-center text-md-center text-lg-center text-xl-center">
								Follower Status &nbsp; <i class="fa fa-sort grey" aria-hidden="true"></i>
							</th>
							<th class="w10 text-sm-center text-md-center text-lg-center text-xl-center">
								Action
							</th>
						</tr>
					</thead>
				<?php

				$i=0;
				while($follow_data = mysqli_fetch_assoc($result1))
				{
					list($y, $m, $d) = explode('-', $follow_data['started_at']);
					$d=explode(' ',$d);
					$follow_date=$y;
					$follow_date.='-'.$m;
					$follow_date.='-'.$d['0'];
							
					$em_id=$follow_data['em_id'];

					$current_date=date('Y-m-d');
					$query4 = "SELECT post_id FROM circular_post WHERE em_id='$em_id' AND action='Active' AND application_deadline >= '$current_date'";
					if (!$result4 = mysqli_query($con, $query4))
					{
					    exit(mysqli_error($con));
					}
					if (mysqli_num_rows($result4) > 0)
	    			{
	    				$total_job=0;
						while($post_data = mysqli_fetch_assoc($result4))
						{
							$total_job++;
						}
					}
					else
					{
						$total_job=0;
					}

					?>
					<tr>
						<td class="w5 text-sm-center text-md-center text-lg-center text-xl-center"><?php $i++; echo $i; ?></td>
						<td class="w20 text-sm-center text-md-center text-lg-center text-xl-center">
							<a href="emd?em_id=<?php echo $em_id; ?>" title="View those circulars"><?php echo $follow_data['company_name']; ?> <i class="fa fa-external-link" aria-hidden="true"></i>
							</a>
						</td>
						<td class="w20 text-sm-center text-md-center text-lg-center text-xl-center"><?php echo $follow_data['company_category']; ?>
						</td>
						<td class="w15 text-sm-center text-md-center text-lg-center text-xl-center">
							<a href="jv!<?php echo $em_id; ?>" title="View those circulars"><?php echo $total_job; ?> <i class="fa fa-external-link" aria-hidden="true"></i>
							</a>
						</td>
						<td class="w15 text-sm-center text-md-center text-lg-center text-xl-center"><?php echo $follow_date; ?>
						</td>
						<td class="w15 text-sm-center text-md-center text-lg-center text-xl-center">									
							<?php 
								if (empty($follower_em_id))
								{
									echo
									'
									 	<span class="round tag tag-default" style="margin-top:10px;">
									 		Not Following
									 	</span>
									';
								}
								elseif (in_array($em_id, $follower_em_id))
								{
									$total_follower++;
									echo
									'
									 	<span class="round tag tag-info" style="margin-top:10px;">
									 		Following
									 	</span>
									';
								}
								else
								{
									echo
									'
									 	<span class="round tag tag-default"  style="margin-top:10px;">
									 		Not Following
									 	</span>
									';
								}
							?>
							
						</td>
						<td class="w10 text-sm-center text-md-center text-lg-center text-xl-center">
							<button type="submit" data-toggle="modal" data-target="#following_em_unfollow<?php echo $em_id; ?>" class="round btn btn-info remove_saved_job" title="Click To Unfollow">
			                    <i class="icon-cross2"></i> Unfollow
		                	</button>
						</td>
					</tr>

					<!-- Unfollow Modal -->
		            <div class="modal fade text-xs-left" id="following_em_unfollow<?php echo $em_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel18" aria-hidden="true">
		              <div class="modal-dialog" role="document">
		                <div class="modal-content">
		                  <div class="modal-header">
		                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		                      <span aria-hidden="true">&times;</span>
		                    </button>
		                    <h4 class="modal-title text-sm-center text-md-center text-lg-center text-xl-center info" id="myModalLabel18"><i class="icon-cross2"></i> Unfollow Confirmation</h4>
		                  </div>
		                  <div class="modal-body">
		                    <div class="alert alert-warning text-sm-center text-md-center text-lg-center text-xl-center" role="alert">
		                        <strong>Are you sure!</strong> To confirm unfollow please press on "Confirm" button
		                    </div>
		                  </div>
		                  <div class="modal-footer text-sm-center text-md-center text-lg-center text-xl-center">
		                    <button type="button" class="btn btn-outline-warning" data-dismiss="modal">Cancel</button>

		                    <button data-dismiss="modal" type="button" id="<?php echo $em_id; ?>" class="em_unfollow_confirm btn btn-outline-primary">Confirm</button>
		                  </div>
		                </div>
		              </div>
		            </div>
		            <!-- /Unfollow Modal -->
				<?php
				}
				?>
					<tfoot>
						<tr class="info">
							<th class="w5 text-sm-center text-md-center text-lg-center text-xl-center">#</th>
							<th class="w20 text-sm-center text-md-center text-lg-center text-xl-center">Company Name</th>
							<th class="w20 text-sm-center text-md-center text-lg-center text-xl-center">Company Category</th>
							<th class="w15 text-sm-center text-md-center text-lg-center text-xl-center">Availabe Jobs</th>
							<th class="w15 text-sm-center text-md-center text-lg-center text-xl-center">Following From</th>
							<th class="w15 text-sm-center text-md-center text-lg-center text-xl-center">Follower Status</th>
							<th class="w10 text-sm-center text-md-center text-lg-center text-xl-center">Action</th>
						</tr>
					</tfoot>

					<div class="mt-1 success col-md-12 col-sm-12 col-xs-12 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
						<strong>Here..</strong>
					</div>
					
					<div class="mt-1 p-1 no-border-right col-md-6 col-sm-6 col-xs-6 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center" style="border:2px solid #E3EBF3;">
						<strong class="success">Total Follower: </strong><?php echo $total_follower;?>
					</div>

					<div class="mt-1 p-1 col-md-6 col-sm-6 col-xs-6 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center" style="border:2px solid #E3EBF3;">
						<strong class="success">Total Following: </strong><?php echo $total_following;?>
					</div>

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
				<strong class="text-warning">Until now, you are not following any employer</strong>
			</div>
		';
	}
	?>
</div>


<script type="text/javascript">

	$(document).ready(function () {

	    $('#dtBasicExample').DataTable({
		    //"searching": false // false to disable search (or any other option)
		    //"ordering": false // false to disable sorting (or any other option)
		    "paging": false // false to disable pagination (or any other option)
		 });
	 	$('.dataTables_length').addClass('bs-select');
	});

    //############################### BEGIN UNFOLLOW ##############################//
	$('.em_unfollow_confirm').click(function(e) {

		var em_id = $(this).attr('id');

		$('.app-content').modal('hide'); 
		$('body').removeClass('modal-open'); //these 3 lines for fully close the modal
		$('.modal-backdrop').remove();

		$.ajax({
		    url : "emlunf",
		    type: "POST",
		    data : { em_id: em_id },
            success: function (data) {
              $('#following_em_notification_content').show().fadeOut(4100).html(data);
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
	//############################### END UNFOLLOW ##############################//
	$('#dtBasicExample_filter').addClass("dataTables_filter form-group label-floating");
    $('#dtBasicExample_length').addClass("dataTables_length bs-select form-group label-floating");
</script>
