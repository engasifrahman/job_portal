<?php
	session_start();
	require_once('../dbconfig.php');
	global $con;

	$query1 = "SELECT id, email, full_name, pic_dir, gender  FROM job_seeker WHERE action='Active' AND profile_privacy='Public'";

	if (!$result1 = mysqli_query($con, $query1))
	{
	        exit(mysqli_error($con));
	}

	$em_id=$_SESSION['em_info']['id'];
	$query2 = "SELECT id,js_id FROM em_following_js WHERE em_id='$em_id'";
	if (!$result2 = mysqli_query($con, $query2))
	{
	        exit(mysqli_error($con));
	}
	if (mysqli_num_rows($result2) > 0)
	{
		while($follow_data = mysqli_fetch_assoc($result2))
		{
			$following_js_id[]=$follow_data['js_id'];
		}
	}
	else
	{
		$following_js_id=NULL;
	}
?>

<div class="col-md-12">
	<?php
    if (mysqli_num_rows($result1) > 0)
    {
    	$total_job_seeker=mysqli_num_rows($result1);
		?>
		<div class="mt-1 pl-2 col-md-12 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center"><strong class="success">Total Seeker's: </strong><?php echo $total_job_seeker; ?>
		</div>

		<div class="table-responsive card wizard-card" data-color="green">
			<div class="col-md-12">
				<table id="dtBasicExample" class="table table-bordered mt-1 col-md-12 col-xs-12" cellspacing="0" width="100%">
					<thead>
						<tr class="info">
							<th class="w7 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
								# &nbsp; <i class="fa fa-sort grey" aria-hidden="true"></i>
							</th>
							<th class="w5 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
								Picture
							</th>
							<th class="w25 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
								Name &nbsp; <i class="fa fa-sort grey" aria-hidden="true"></i>
							</th>
							<th class="w25 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
								Email &nbsp; <i class="fa fa-sort grey" aria-hidden="true"></i>
							</th>
							<th class="w35 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
								Preffered Job &nbsp; <i class="fa fa-sort grey" aria-hidden="true"></i>
							</th>
							<th class="w10 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
								Action &nbsp; <i class="fa fa-sort grey" aria-hidden="true"></i>
							</th>
						</tr>
					</thead>
					<?php

					$i=1;
					while($js_data = mysqli_fetch_assoc($result1))
					{
						$picture=$js_data['pic_dir'];
						$gender=$js_data['gender'];
								
						$js_id=$js_data['id'];
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
								<td class="w7 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center"><?php echo $i++; ?></td>
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
								<td class="w25">
									<a href="vj?js_id=<?php echo $js_id; ?>" title="View Resume"><?php echo $js_data['full_name']; ?> <i class="fa fa-external-link" aria-hidden="true"></i>
									</a>
								</td>
								<td class="w25"><?php echo $js_data['email']; ?></td>
								<td class="w35"><?php echo $targeted_job; ?></td>
								<td class="w10 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
								<?php
								if (empty($following_js_id))
								{
									echo
									'
										<button type="submit" id="<?php echo $js_id; ?>" name="follow_js" class="round btn btn-outline-info" title="Click To Follow">
						                    <i class="icon-plus4"></i> Follow
					                	</button>
				                	';
				                }
				                elseif (in_array($js_id, $following_js_id))
								{
									echo
									'
										<button type="submit" id="'.$js_id.'" name="unfollow_js" class="round btn btn-info" title="Click To Unfollow">
						                    <i class="icon-cross2"></i> Unfollow
					                	</button>
					                ';
					            }
					            else
								{
									echo 
									'
										<button type="submit" id="'.$js_id.'" name="follow_js" class="round btn btn-outline-info" title="Click To Follow">
						                    <i class="icon-plus4"></i> Follow
					                	</button>
					                ';
					            }
				                ?>
								</td>
							</tr>
						<?Php
					}
					?>
					<tfoot>
						<tr class="info">
							<th class="w7 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">#</th>
							<th class="w5 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">Picture</th>
							<th class="w25 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">Name</th>
							<th class="w25 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">Email</th>
							<th class="w35 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">Preffered Job</th>
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
				<strong class="text-warning">Sorry! No job seeker availabe right now</strong>
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

    //############################### BEGIN FOLLOW ##############################//
    $('button[name="follow_js"]').click(function(e){

    	var js_id = $(this).attr('id');

        $.ajax({
            type: 'post',
            url: 'js_follow',   // here your php file to do something with postdata
            data: { js_id: js_id },
            success: function (data) {
              $('#js_list_notification_content').show().fadeOut(4100).html(data);
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
	$('button[name="unfollow_js"]').click(function(e) {

		var js_id = $(this).attr('id');

		$.ajax({
		    url : "js_unfollow",
		    type: "POST",
		    data : { js_id: js_id },
            success: function (data) {
              $('#js_list_notification_content').show().fadeOut(4100).html(data);
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
