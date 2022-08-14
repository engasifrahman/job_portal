<?php
	session_start();
	require_once('../dbconfig.php');
	global $con;

	$js_id=$_SESSION['js_info']['id'];
	$query1 = "SELECT  em_id, visit_count, last_visited_at, company_name, company_category FROM resume_visited RV, employer EM WHERE js_id='$js_id' AND EM.id=em_id AND EM.action='Active' ORDER BY RV.id DESC";
	if (!$result1 = mysqli_query($con, $query1))
	{
	    exit(mysqli_error($con));
	}

	$query2 = "SELECT em_id FROM js_following_em WHERE js_id='$js_id'";
	if (!$result2 = mysqli_query($con, $query2))
	{
	    exit(mysqli_error($con));
	}
	if (mysqli_num_rows($result2) > 0)
	{
		while($follow_data = mysqli_fetch_assoc($result2))
		{
			$following_em_id[]=$follow_data['em_id'];
		}
	}
	else
	{
		$following_em_id=NULL;
	}


	$query3 = "SELECT em_id FROM em_following_js WHERE js_id='$js_id'";
	if (!$result3 = mysqli_query($con, $query3))
	{
	    exit(mysqli_error($con));
	}
	if (mysqli_num_rows($result3) > 0)
	{
		while($follower_data = mysqli_fetch_assoc($result3))
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
		$total_visitor=mysqli_num_rows($result1);
		$total_visit_count=0;
		$total_follower=0;
		$total_following=0;
		?>
		<div class="table-responsive card wizard-card" data-color="green">
			<div class="col-md-12">
				<table id="dtBasicExample" class="table table-bordered mt-1 col-md-12 col-xs-12" cellspacing="0" width="100%">
					<thead>
						<tr class="info">
							<th class="w7 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
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
							<th class="w7 text-sm-center text-md-center text-lg-center text-xl-center">
								Hits &nbsp; <i class="fa fa-sort grey" aria-hidden="true"></i>
							</th>
							<th class="w10 text-sm-center text-md-center text-lg-center text-xl-center">
								Last Visit &nbsp; <i class="fa fa-sort grey" aria-hidden="true"></i>
							</th>
							<th class="w15 text-sm-center text-md-center text-lg-center text-xl-center">
								Follower Status &nbsp; <i class="fa fa-sort grey" aria-hidden="true"></i>
							</th>
							<th class="w10 text-sm-center text-md-center text-lg-center text-xl-center">
								Action &nbsp; <i class="fa fa-sort grey" aria-hidden="true"></i>
							</th>
						</tr>
					</thead>
				<?php

				$i=1;
				while($visit_data = mysqli_fetch_assoc($result1))
				{
					$last_visited_at=$visit_data['last_visited_at'];
					$em_id=$visit_data['em_id'];
					$visit_count=$visit_data['visit_count'];
					$total_visit_count+=$visit_count;

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
						<td class="w7 text-sm-center text-md-center text-lg-center text-xl-center"><?php echo $i++; ?></td>
						<td class="w20 text-sm-center text-md-center text-lg-center text-xl-center"><?php echo $visit_data['company_name']; ?></td>
						<td class="w20 text-sm-center text-md-center text-lg-center text-xl-center"><?php echo $visit_data['company_category']; ?></td>
						<td class="w15 text-sm-center text-md-center text-lg-center text-xl-center">	
							<a href='jv!<?php echo $em_id; ?>' title="View those circulars"><?php echo $total_job; ?> <i class="fa fa-external-link" aria-hidden="true"></i>
							</a>
						</td>
						<td class="w7 text-sm-center text-md-center text-lg-center text-xl-center"><?php echo $visit_count; ?>
						</td>
						<td class="w15 text-sm-center text-md-center text-lg-center text-xl-center"><?php echo $last_visited_at; ?>
						</td>
						<td class="w10 text-sm-center text-md-center text-lg-center text-xl-center">									
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
							<?php 
								if (empty($following_em_id))
								{
									echo
									'
										<button type="submit" id="'.$em_id.'" name="follow_em" class="round btn btn-outline-info" title="Click To Follow">
						                    <i class="icon-plus4"></i> Follow
					                	</button>
									';
								}
								elseif (in_array($em_id, $following_em_id))
								{
									$total_following++;
									echo
									'
										<button type="submit" id="'.$em_id.'" name="unfollow_em" class="round btn btn-info" title="Click To Unfollow">
						                    <i class="icon-cross2"></i> Unfollow
					                	</button>
									';
								}
								else
								{
									echo
									'
										<button type="submit" id="'.$em_id.'" name="follow_em" class="round btn btn-outline-info" title="Click To Follow">
						                    <i class="icon-plus4"></i> Follow
					                	</button>
									';
								}
							?>
						</td>
					</tr>
					<?php
				}
				?>
					<tfoot>
						<tr class="info">
							<th class="w7 text-sm-center text-md-center text-lg-center text-xl-center">#</th>
							<th class="w20 text-sm-center text-md-center text-lg-center text-xl-center">Company Name</th>
							<th class="w20 text-sm-center text-md-center text-lg-center text-xl-center">Company Category</th>
							<th class="w15 text-sm-center text-md-center text-lg-center text-xl-center">Availabe Jobs</th>
							<th class="w7 text-sm-center text-md-center text-lg-center text-xl-center">Hits</th>
							<th class="w10 text-sm-center text-md-center text-lg-center text-xl-center">Last Visit</th>
							<th class="w15 text-sm-center text-md-center text-lg-center text-xl-center">Follower Status</th>
							<th class="w10 text-sm-center text-md-center text-lg-center text-xl-center">Action</th>
						</tr>
					</tfoot>

					<div class="mt-1 success col-md-12 col-sm-12 col-xs-12 text-sm-center text-md-center text-lg-center text-xl-center">
						<strong>Here..</strong>
					</div>
					
					<div class="mt-1 p-1 no-border-right col-md-3 col-sm-3 col-xs-3 text-sm-center text-md-center text-lg-center text-xl-center" style="border:2px solid #E3EBF3;">
						<strong class="success">Total Visitors: </strong><?php echo $total_visitor;?>
					</div>

					<div class="mt-1 p-1 no-border-right col-md-3 col-sm-3 col-xs-3 text-sm-center text-md-center text-lg-center text-xl-center" style="border:2px solid #E3EBF3;">
						<strong class="success">Total Hits: </strong><?php echo $total_visit_count;?>
					</div> 

					<div class="mt-1 p-1 no-border-right col-md-3 col-sm-3 col-xs-3 text-sm-center text-md-center text-lg-center text-xl-center" style="border:2px solid #E3EBF3;">
						<strong class="success">Total Follower: </strong><?php echo $total_follower;?>
					</div> 

					<div class="mt-1 p-1 col-md-3 col-sm-3 col-xs-3 text-sm-center text-md-center text-lg-center text-xl-center" style="border:2px solid #E3EBF3;">
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
				<strong class="text-warning">Until now, no employer has visit your resume</strong>
			</div>
		';
	}
	?>
    </div>
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

    //############################### BEGIN FOLLOW ##############################//
    $('button[name="follow_em"]').click(function(e){

    	var em_id = $(this).attr('id');

        $.ajax({
            type: 'post',
            url: 'emlf',   // here your php file to do something with postdata
            data: { em_id: em_id },
            success: function (data) {
              $('#resume_visited_notification_content').show().fadeOut(4100).html(data);
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
    //############################### END FOLLOW ##############################//

    //############################### BEGIN UNFOLLOW ##############################//
	$('button[name="unfollow_em"]').click(function(e) {

		var em_id = $(this).attr('id');

		$.ajax({
		    url : "emlunf",
		    type: "POST",
		    data : { em_id: em_id },
            success: function (data) {
              $('#resume_visited_notification_content').show().fadeOut(4100).html(data);
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