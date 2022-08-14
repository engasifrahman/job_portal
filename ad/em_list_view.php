<?php
	session_start();
	require_once('../dbconfig.php');
	global $con;

	$query1 = "SELECT EM.id, logo_dir, email, company_name, mobile_number, action, COUNT(DISTINCT  CV.js_id) AS 
	visitors, SUM(CV.visit_count) AS hits
	FROM employer EM 
	LEFT JOIN circular_visited CV ON CV.post_id IN (SELECT post_id FROM circular_post WHERE em_id=EM.id)
	GROUP BY EM.id 
	ORDER BY EM.id DESC";
	if (!$result1 = mysqli_query($con, $query1))
	{
	        exit(mysqli_error($con));
	}

	$query2="SELECT EM.id, COUNT(post_id) AS total_post
	FROM employer EM 
	LEFT JOIN circular_post CP ON CP.em_id=EM.id 
	GROUP BY EM.id 
	ORDER BY EM.id DESC";
	if (!$result2 = mysqli_query($con, $query2))
	{
	        exit(mysqli_error($con));
	}
	while($em_data2 = mysqli_fetch_assoc($result2))
	{
		$total_post[''.$em_data2['id'].'']=$em_data2['total_post'];
	}

	$query3="SELECT EM.id, COUNT(EMFJS.js_id) AS following
	FROM employer EM 
	LEFT JOIN em_following_js EMFJS ON EMFJS.em_id=EM.id
	GROUP BY EM.id 
	ORDER BY EM.id DESC";
	if (!$result3 = mysqli_query($con, $query3))
	{
	        exit(mysqli_error($con));
	}
	while($em_data3 = mysqli_fetch_assoc($result3))
	{
		$following[''.$em_data3['id'].'']=$em_data3['following'];
	}

	$query4="SELECT EM.id, COUNT(JSFEM.js_id) AS follower
	FROM employer EM 
	LEFT JOIN js_following_em JSFEM ON JSFEM.em_id=EM.id 
	GROUP BY EM.id 
	ORDER BY EM.id DESC";
	if (!$result4 = mysqli_query($con, $query4))
	{
	        exit(mysqli_error($con));
	}
	while($em_data4 = mysqli_fetch_assoc($result4))
	{
		$follower[''.$em_id=$em_data4['id'].'']=$em_data4['follower'];
	}

	$query5="SELECT EM.id, COUNT(AJ.js_id) AS 
	applied
	FROM employer EM 
	LEFT JOIN applied_job AJ ON AJ.post_id IN (SELECT post_id FROM circular_post WHERE em_id=EM.id)
	GROUP BY EM.id 
	ORDER BY EM.id DESC";
	if (!$result5 = mysqli_query($con, $query5))
	{
	        exit(mysqli_error($con));
	}
	while($em_data5 = mysqli_fetch_assoc($result5))
	{
		$applied[''.$em_id=$em_data5['id'].'']=$em_data5['applied'];
	}
?>

<div class="col-md-12 mobile-device">
	<?php
    if (mysqli_num_rows($result1) > 0)
    {
    	$total_employer=mysqli_num_rows($result1);
		?>
		 
		<div class="table-responsive card wizard-card" data-color="green">

			<div class="mt-1 pl-2 col-md-12 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center"><strong class="success">Total Employer's: </strong><?php echo $total_employer; ?>
			</div>
			<div class="col-md-12">
				<table id="dtBasicExample" class="table table-bordered mt-1 col-md-12 col-xs-12" cellspacing="0" width="100%">
				    <thead>
						<tr class="info">
							<th class="w3 font-small-3 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
								<small>#</small><i class="fa fa-sort fa-xs" aria-hidden="true"></i>
							</th>
							<th class="w5 font-small-3 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
								<small>logo</small>
							</th>
							<th class="w10 font-small-3 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
								<small>Company</small><i class="fa fa-sort fa-xs " aria-hidden="true"></i>
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
								<small>Circular's</small><i class="fa fa-sort fa-xs " aria-hidden="true"></i>
							</th>
							<th class="w5 font-small-3 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
								<small>Applied</small><i class="fa fa-sort fa-xs " aria-hidden="true"></i>
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
					while($em_data = mysqli_fetch_assoc($result1))
					{
						$picture=$em_data['logo_dir'];
						?>		
						<tr>
							<td class="w3 font-small-3 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center"><?php echo $i++; ?> </td>

							<td class="w5 font-small-3 text-xs-centertext-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
								 
								<span class="avatar avatar-online">
								<?php

			                      if ($picture=='not_defined_yet')
			                      {
			                        echo
			                        '
			                          <img src="../images/demo/nologo.png" style="width:60px; height:30px; float:right;" class="avatar-bg" alt="avatar">
			                        ';
			                      }

			                      else
			                      {
			                        echo
			                        '
			                          <img src="'.$picture.'" style="width:60px; height:30px; float:right;" class="avatar-bg" alt="avatar">
			                        ';
			                      }
			                    ?>
			                    </span>

							</td>

							<td class="w10 font-small-3 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
								<a href="emd?em_id=<?php echo $em_data['id'] ?>" title="View Details"><?php echo $em_data['company_name']?>  <i class="fa fa-external-link" aria-hidden="true"></i>
								</a>
							</td>

							<td class="w5 font-small-3 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center"> 	<?php echo $em_data['email'] ?> 
							</td>
							<td class="w5 font-small-3 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center"> 	<?php echo $em_data['mobile_number'] ?> 
							</td>
							<td class="w5 font-small-3 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center"> 	<?php echo $following[''.$em_data['id'].''] ?> 
							</td>
							<td class="w5 font-small-3 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center"> 	<?php echo $follower[''.$em_data['id'].''] ?> 
							</td>
							<td class="w5 font-small-3 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center"> 	<?php echo $total_post[''.$em_data['id'].''] ?> 
							</td>
							<td class="w5 font-small-3 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center"> 	<?php echo $applied[''.$em_data['id'].''] ?> 
							</td>
							<td class="w5 font-small-3 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center"> 	<?php echo $em_data['visitors'] ?> 
							</td>
							<td class="w5 font-small-3 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center"><?php 
								if (!empty($em_data['hits'])) 
								{
									echo $em_data['hits'];
								} 
								else
								{ 
									echo '0';
								} 
								?> 
							</td>
							<td class="w30 font-small-3 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center" style="padding:10px 0px 0px 0px !important;">
								<?php
								if ($em_data['action']=='Active')
								{
									echo 
									'
										<div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
			                                <button type="button" class="btn btn-info round-left">Active</button>
			                                <button type="button" id="'.$em_data['id'].'" name="action_deactive" class="btn btn-outline-warning">Deactive</button>
			                                <button type="button" id="'.$em_data['id'].'" name="action_hide" class="btn btn-outline-danger round-right">Hide</button>
			                            </div>
									';
								}
								elseif ($em_data['action']=='Deactive')
								{
									echo 
									'
										<div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
			                                <button type="button" id="'.$em_data['id'].'" name="action_active" class="btn btn-outline-info round-left">Active</button>
			                                <button type="button" class="btn btn-warning">Deactive</button>
			                                <button type="button" id="'.$em_data['id'].'" name="action_hide" class="btn btn-outline-danger round-right">Hide</button>
			                            </div>
									';
								}
								elseif ($em_data['action']=='Hide')
								{
									echo 
									'
										<div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
			                                <button type="button" id="'.$em_data['id'].'" name="action_active" class="btn btn-outline-info round-left">Active</button>
			                                <button type="button" id="'.$em_data['id'].'" name="action_deactive" class="btn btn-outline-warning">Deactive</button>
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
								<small>Company</small>
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
								<small>Circular's</small>
							</th>
							<th class="w5 font-small-3 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
								<small>Applied</small>
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

    	var em_id = $(this).attr('id');
    	var action = 'Active';

        $.ajax({
            type: 'post',
            url: 'lemu',   // here your php file to do something with postdata
            data: { em_id:em_id, action:action },
            success: function (data) {
              $('#em_list_notification_content').show().fadeOut(4100).html(data);
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

    	var em_id = $(this).attr('id');
    	var action = 'Deactive';

        $.ajax({
            type: 'post',
            url: 'lemu',   // here your php file to do something with postdata
            data: { em_id:em_id, action:action },
            success: function (data) {
              $('#em_list_notification_content').show().fadeOut(4100).html(data);
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

    	var em_id = $(this).attr('id');
    	var action = 'Hide';

        $.ajax({
            type: 'post',
            url: 'lemu',   // here your php file to do something with postdata
            data: { em_id:em_id, action:action },
            success: function (data) {
              $('#em_list_notification_content').show().fadeOut(4100).html(data);
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
    