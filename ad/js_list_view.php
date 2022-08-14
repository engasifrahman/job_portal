<?php
	session_start();
	require_once('../dbconfig.php');
	global $con;

	$query1 = "SELECT JS.id, pic_dir, email, full_name, gender, mobile_number, action, COUNT(RV.em_id) AS visitors, SUM(RV.visit_count) AS hits
	FROM job_seeker JS 
	LEFT JOIN resume_visited RV ON RV.js_id=JS.id
	GROUP BY JS.id 
	ORDER BY JS.id DESC";
	if (!$result1 = mysqli_query($con, $query1))
	{
	        exit(mysqli_error($con));
	}

	$query2="SELECT JS.id, COUNT(JSFEM.em_id) AS following
	FROM job_seeker JS 
	LEFT JOIN js_following_em JSFEM ON JSFEM.js_id=JS.id 
	GROUP BY JS.id 
	ORDER BY JS.id DESC";
	if (!$result2 = mysqli_query($con, $query2))
	{
	        exit(mysqli_error($con));
	}
	while($js_data2 = mysqli_fetch_assoc($result2))
	{
		$following[''.$js_data2['id'].'']=$js_data2['following'];
	}

	$query3="SELECT JS.id, COUNT(EMFJS.em_id) AS follower
	FROM job_seeker JS 
	LEFT JOIN em_following_js EMFJS ON EMFJS.js_id=JS.id 
	GROUP BY JS.id 
	ORDER BY JS.id DESC";
	if (!$result3 = mysqli_query($con, $query3))
	{
	        exit(mysqli_error($con));
	}
	while($js_data3 = mysqli_fetch_assoc($result3))
	{
		$follower[''.$js_data3['id'].'']=$js_data3['follower'];
	}

	$query4="SELECT JS.id, COUNT(AJ.post_id) AS applied
	FROM job_seeker JS 
	LEFT JOIN applied_job AJ ON AJ.js_id=JS.id
	GROUP BY JS.id 
	ORDER BY JS.id DESC";
	if (!$result4 = mysqli_query($con, $query4))
	{
	    exit(mysqli_error($con));
	}
	while($js_data4 = mysqli_fetch_assoc($result4))
	{
		$applied[''.$js_data4['id'].'']=$js_data4['applied'];
	}

	$query5="SELECT JS.id, COUNT(SJ.post_id) AS saved
	FROM job_seeker JS 
	LEFT JOIN saved_job SJ ON SJ.js_id=JS.id 
	GROUP BY JS.id 
	ORDER BY JS.id DESC";
	if (!$result5 = mysqli_query($con, $query5))
	{
	    exit(mysqli_error($con));
	}
	while($js_data5 = mysqli_fetch_assoc($result5))
	{
		$saved[''.$js_data5['id'].'']=$js_data5['saved'];
	}
?>

<div class="col-md-12 mobile-device">
	<?php
    if (mysqli_num_rows($result1) > 0)
    {
    	$total_job_seeker=mysqli_num_rows($result1);
		?>
		 
		<div class="table-responsive card wizard-card" data-color="green">

			<div class="mt-1 pl-2 col-md-12 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center"><strong class="success">Total Job Seeker's: </strong><?php echo $total_job_seeker; ?>
			</div>
			<div class="col-md-12">
				<table id="dtBasicExample" class="table table-bordered mt-1 col-md-12 col-xs-12" cellspacing="0" width="100%">
				    <thead>
						<tr class="info">
							<th class="w3 font-small-3 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
								<small>#</small><i class="fa fa-sort fa-xs" aria-hidden="true"></i>
							</th>
							<th class="w5 font-small-3 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
								<small>Picture</small>
							</th>
							<th class="w10 font-small-3 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
								<small>Name</small><i class="fa fa-sort fa-xs " aria-hidden="true"></i>
							</th>
							<th class="w5 font-small-3 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
								<small>Email</small><i class="fa fa-sort fa-xs " aria-hidden="true"></i>
							</th>
							<th class="w5 font-small-3 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
								<small>Phone</small><i class="fa fa-sort fa-xs " aria-hidden="true"></i>
							</th>
							<th class="w5 font-small-3 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
								<small>Following</small><i class="fa fa-sort fa-xs " aria-hidden="true"></i>
							</th>
							<th class="w5 font-small-3 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
								<small>Follower</small><i class="fa fa-sort fa-xs " aria-hidden="true"></i>
							</th>
							<th class="w5 font-small-3 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
								<small>Applied</small><i class="fa fa-sort fa-xs " aria-hidden="true"></i>
							</th>
							<th class="w5 font-small-3 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
								<small>Saved</small><i class="fa fa-sort fa-xs " aria-hidden="true"></i>
							</th>
							<th class="w5 font-small-3 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
								<small>Visitors</small><i class="fa fa-sort fa-xs " aria-hidden="true" style=""></i>
							</th>
							<th class="w3 font-small-3 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
								<small>Hits</small><i class="fa fa-sort fa-xs " aria-hidden="true"></i>
							</th>
							<th class="w30 font-small-3 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
								<small>Action</small>
							</th>
						</tr>
					</thead>
					<?php

					$i=1;
					while($js_data = mysqli_fetch_assoc($result1))
					{
						$picture=$js_data['pic_dir'];
						$gender=$js_data['gender'];
						?>		
						<tr>
							<td class="w3 font-small-3 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center"><?php echo $i++; ?> </td>
							<td class="w5 font-small-3 text-xs-centertext-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
								 
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

							<td class="w10 font-small-3 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
								<a href="jsd?js_id=<?php echo $js_data['id']; ?>" title="View Details"><?php echo $js_data['full_name']?>  <i class="fa fa-external-link" aria-hidden="true"></i>
								</a>
							</td>
							<td class="w5 font-small-3 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center"><?php echo $js_data['email'] ?> </td>
							<td class="w5 font-small-3 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center"><?php echo $js_data['mobile_number'] ?> </td>
							<td class="w5 font-small-3 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center"><?php echo $following[''.$js_data['id'].''] ?> </td>
							<td class="w5 font-small-3 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center"><?php echo $follower[''.$js_data['id'].''] ?> </td>
							<td class="w5 font-small-3 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center"><?php echo $applied[''.$js_data['id'].''] ?> </td>
							<td class="w5 font-small-3 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center"><?php echo $saved[''.$js_data['id'].''] ?> </td>
							<td class="w5 font-small-3 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center"><?php echo $js_data['visitors'] ?> </td>
							<td class="w5 font-small-3 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center"><?php 
								if (!empty($js_data['hits'])) 
								{
									echo $js_data['hits'];
								} 
								else
								{ 
									echo '0';
								} 
								?> 
							</td>
							<td class="w30 font-small-3 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center" style="padding:10px 0px 0px 0px !important;">
								<?php
								if ($js_data['action']=='Active')
								{
									echo 
									'
										<div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
			                                <button type="button" class="btn btn-info round-left">Active</button>
			                                <button type="button" id="'.$js_data['id'].'" name="action_deactive" class="btn btn-outline-warning">Deactive</button>
			                                <button type="button" id="'.$js_data['id'].'" name="action_hide" class="btn btn-outline-danger round-right">Hide</button>
			                            </div>
									';
								}
								elseif ($js_data['action']=='Deactive')
								{
									echo 
									'
										<div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
			                                <button type="button" id="'.$js_data['id'].'" name="action_active" class="btn btn-outline-info round-left">Active</button>
			                                <button type="button" class="btn btn-warning">Deactive</button>
			                                <button type="button" id="'.$js_data['id'].'" name="action_hide" class="btn btn-outline-danger round-right">Hide</button>
			                            </div>
									';
								}
								elseif ($js_data['action']=='Hide')
								{
									echo 
									'
										<div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
			                                <button type="button" id="'.$js_data['id'].'" name="action_active" class="btn btn-outline-info round-left">Active</button>
			                                <button type="button" id="'.$js_data['id'].'" name="action_deactive" class="btn btn-outline-warning">Deactive</button>
			                                <button type="button" class="btn btn-danger round-right">Hide</button>
			                            </div>
									';
								}
								?>
							</td>
						</tr>
						<?Php
					}
					?>
					<thead>
						<tr class="info">
							<th class="w5 font-small-3 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
								<small>#</small>
							</th>
							<th class="w5 font-small-3 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
								<small>Picture</small>
							</th>
							<th class="w10 font-small-3 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
								<small>Name</small>
							</th>
							<th class="w5 font-small-3 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
								<small>Email</small>
							</th>
							<th class="w5 font-small-3 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
								<small>Phone</small>
							</th>
							<th class="w5 font-small-3 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
								<small>Following</small>
							</th>
							<th class="w5 font-small-3 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
								<small>Follower</small>
							</th>
							<th class="w5 font-small-3 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
								<small>Applied</small>
							</th>
							<th class="w5 font-small-3 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
								<small>Saved</small>
							</th>
							<th class="w5 font-small-3 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
								<small>Visitors</small> 
							</th>
							<th class="w3 font-small-3 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
								<small>Hits</small>
							</th>
							<th class="w30 font-small-3 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
								<small>Action</small>
							</th>
						</tr>
					</thead>
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

    //############################### BEGIN ACTIVE ##############################//
    $('button[name="action_active"]').click(function(e){

    	var js_id = $(this).attr('id');
    	var action = 'Active';

        $.ajax({
            type: 'post',
            url: 'ljsu',   // here your php file to do something with postdata
            data: { js_id:js_id, action:action },
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
    //############################### END ACTIVE ##############################//

    //############################### BEGIN DEACTIVE ##############################//
    $('button[name="action_deactive"]').click(function(e){

    	var js_id = $(this).attr('id');
    	var action = 'Deactive';

        $.ajax({
            type: 'post',
            url: 'ljsu',   // here your php file to do something with postdata
            data: { js_id:js_id, action:action },
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
    //############################### END DEACTIVE ##############################//


    //############################### BEGIN HIDE ##############################//
    $('button[name="action_hide"]').click(function(e){

    	var js_id = $(this).attr('id');
    	var action = 'Hide';

        $.ajax({
            type: 'post',
            url: 'ljsu',   // here your php file to do something with postdata
            data: { js_id:js_id, action:action },
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
    //############################### END HIDE ##############################//

    $('#dtBasicExample_filter').addClass("dataTables_filter form-group label-floating");
    $('#dtBasicExample_length').addClass("dataTables_length bs-select form-group label-floating");
    
</script>
    