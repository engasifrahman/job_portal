<?php
	session_start();
	require_once('../dbconfig.php');
	global $con;

	$em_id=$_SESSION['em_info']['id'];
	$query1 = "SELECT started_at, js_id, email, full_name, pic_dir, gender FROM em_following_js EMFJS, job_seeker JS WHERE em_id='$em_id' AND JS.id=js_id AND action='Active' ORDER BY EMFJS.id DESC";
	if (!$result1 = mysqli_query($con, $query1))
	{
	    exit(mysqli_error($con));
	}


	$query2 = "SELECT js_id FROM js_following_em WHERE em_id='$em_id'";
	if (!$result2 = mysqli_query($con, $query2))
	{
	    exit(mysqli_error($con));
	}
	if (mysqli_num_rows($result2) > 0)
	{
		while($follower_data = mysqli_fetch_assoc($result2))
		{
			$follower_js_id[]=$follower_data['js_id'];
		}
	}
	else
	{
		$follower_js_id=NULL;
	}
?>

<div class="col-md-12">
	<?php
	if (mysqli_num_rows($result1) > 0)
	{
		$total_following=mysqli_num_rows($result1);
		?>
		<div class="table-responsive card wizard-card" data-color="green">
			<div class="col-md-12">
				<table id="dtBasicExample" class="table table-bordered mt-1 col-md-12 col-xs-12" cellspacing="0" width="100%">
					<thead>
						<tr class="info">
							<th class="w7 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
								# &nbsp; <i class="fa fa-sort grey" aria-hidden="true"></i>
							</th>
							<th class="w7 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
								Picture
							</th>
							<th class="w15 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
								Name &nbsp; <i class="fa fa-sort grey" aria-hidden="true"></i>
							</th>
							<th class="w15 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
								Email &nbsp; <i class="fa fa-sort grey" aria-hidden="true"></i>
							</th>
							<th class="w25 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
								Preffered Job &nbsp; <i class="fa fa-sort grey" aria-hidden="true"></i>
							</th>
							<th class="w15 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
								Form &nbsp; <i class="fa fa-sort grey" aria-hidden="true"></i>
							</th>
							<th class="w15 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
								Follower Status &nbsp; <i class="fa fa-sort grey" aria-hidden="true"></i>
							</th>
							<th class="w10 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
								Action
							</th>
						</tr>
					</thead>
				<?php

				$i=1;
				$total_follower=0;
				while($follow_data = mysqli_fetch_assoc($result1))
				{
					list($y, $m, $d) = explode('-', $follow_data['started_at']);
					$d=explode(' ',$d);
					$follow_date=$y;
					$follow_date.='-'.$m;
					$follow_date.='-'.$d['0'];
							
					$js_id=$follow_data['js_id'];

					$picture=$follow_data['pic_dir'];
					$gender=$follow_data['gender'];

					$query3 = "SELECT job_categories FROM targeted_job WHERE js_id='$js_id'";

					if (!$result3 = mysqli_query($con, $query3))
					{
					    exit(mysqli_error($con));
					}
					else
					{
						while($targeted_data = mysqli_fetch_assoc($result3))
						{
							$targeted_job=$targeted_data['job_categories'];
						}
						
					}

					?>
					<tr>
						<td class="w5 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center"><?php echo $i++; ?></td>

						<td class="w5 text-xs-centertext-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
							 
							<span class="avatar avatar-online">
							<?php
		                      if ($picture=='not_defined_yet' && $gender=='Male')
		                      {
		                        echo
		                        '
		                          <img src="../images/demo/male.png" style="width:60px;height:30px;float:right;" class="avatar-bg" alt="avatar">
		                        ';
		                      }

		                      elseif ($picture=='not_defined_yet' && $gender=='Female')
		                      {
		                        echo
		                        '
		                          <img src="../images/demo/female.png" style="width:60px;height:30px;float:right;" class="avatar-bg" alt="avatar">
		                        ';
		                      }

		                      elseif ($picture=='not_defined_yet' && $gender=='Others')
		                      {
		                        echo
		                        '
		                          <img src="../images/demo/others.png" style="width:60px;height:30px;float:right;" class="avatar-bg" alt="avatar">
		                        ';
		                      }

		                      else
		                      {
		                        echo
		                        '
		                          <img src="'.$picture.'" style="width:60px;height:30px;float:right;" class="avatar-bg" alt="avatar">
		                        ';
		                      }
		                    ?>
		                    </span>

						</td>
						
						<td class="w15">
							<a href="vj?js_id=<?php echo $js_id; ?>" title="View Resume"><?php echo $follow_data['full_name']; ?> <i class="fa fa-external-link" aria-hidden="true"></i>
							</a>
						</td>
						<td class="w15"><?php echo $follow_data['email']; ?></td>
						<td class="w25"><?php echo $targeted_job; ?></td>
						<td class="w15 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center"><?php echo $follow_date; ?></td>
						<td class="w15 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">									
							<?php 
								if (empty($follower_js_id))
								{
									echo
									'
									 	<span class="round tag tag-default" style="margin-top:10px;">
									 		Not Following
									 	</span>
									';
								}
								elseif (in_array($js_id, $follower_js_id))
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
						<td class="w10 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
							<button type="submit" data-toggle="modal" data-target="#following_js_unfollow<?php echo $js_id; ?>" class="round btn btn-info remove_saved_job" title="Click To Unfollow">
			                    <i class="icon-cross2"></i> Unfollow
		                	</button>
						</td>
					</tr>

					<!-- Unfollow Modal -->
		            <div class="modal fade text-xs-left" id="following_js_unfollow<?php echo $js_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel18" aria-hidden="true">
		              <div class="modal-dialog" role="document">
		                <div class="modal-content">
		                  <div class="modal-header">
		                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		                      <span aria-hidden="true">&times;</span>
		                    </button>
		                    <h4 class="modal-title text-sm-center text-md-center text-lg-center text-xl-center info" id="myModalLabel18"><i class="icon-cross2"></i> Unfollow Confirmation</h4>
		                  </div>
		                  <div class="modal-body">
		                    <div class="alert alert-warning text-xs-center text-sm-center text-md-center text-lg-center text-xl-center" role="alert">
		                        <strong>Are you sure!</strong> To confirm unfollow please press on "Confirm" button
		                    </div>
		                  </div>
		                  <div class="modal-footer text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
		                    <button type="button" class="btn btn-outline-warning" data-dismiss="modal">Cancel</button>

		                    <button data-dismiss="modal" type="button" id="<?php echo $js_id; ?>" class="js_unfollow_confirm btn btn-outline-primary">Confirm</button>
		                  </div>
		                </div>
		              </div>
		            </div>
		            <!-- /Unfollow Modal -->
					<?php
				}
				?>
					<div class="mt-1 success col-md-12 col-sm-12 col-xs-12 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
						<strong>Here..</strong>
					</div>
					
					<div class="mt-1 p-1 no-border-right col-md-6 col-sm-6 col-xs-6 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center" style="border:2px solid #E3EBF3;">
						<strong class="success">Total Follower: </strong><?php echo $total_follower;?>
					</div>

					<div class="mt-1 p-1 col-md-6 col-sm-6 col-xs-6 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center" style="border:2px solid #E3EBF3;">
						<strong class="success">Total Following: </strong><?php echo $total_following;?>
					</div>
					<tfoot>
						<tr class="info">
							<th class="w5 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">#</th>
							<th class="w7 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">Picture</th>
							<th class="w15 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">Name</th>
							<th class="w15 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">Email</th>
							<th class="w25 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">Preffered Job</th>
							<th class="w15 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">Form</th>
							<th class="w15 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">Follower Status</th>
							<th class="w10 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">Action</th>
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
			<div class="text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
				<strong class="text-warning">Until now, you are not following any employer</strong>
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

    //############################### BEGIN UNFOLLOW ##############################//
	$('.js_unfollow_confirm').click(function(e) {

		var js_id = $(this).attr('id');

		$('.app-content').modal('hide'); 
		$('body').removeClass('modal-open'); //these 3 lines for fully close the modal
		$('.modal-backdrop').remove();

		$.ajax({
		    url : "js_unfollow",
		    type: "POST",
		    data : { js_id: js_id },
            success: function (data) {
              $('#following_js_notification_content').show().fadeOut(4100).html(data);
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
