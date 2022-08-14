<?php
	session_start();
	require_once('../dbconfig.php');
	global $con;

	$query1 = "SELECT post_id, EM.id, logo_dir, company_name, job_title, job_category, vacancies_no, posted_at, application_deadline, CP.action
	FROM employer EM, circular_post CP
    WHERE em_id=id
	GROUP BY post_id 
	ORDER BY post_id DESC";
	if (!$result1 = mysqli_query($con, $query1))
	{
	        exit(mysqli_error($con));
	}

	$query2="SELECT CP.post_id AS post_id, COUNT(DISTINCT  CV.js_id) AS 
	visitors, SUM(CV.visit_count) AS hits
	FROM circular_post CP, circular_visited CV
    WHERE CV.post_id=CP.post_id
	GROUP BY CP.post_id
	ORDER BY CP.post_id DESC";
	if (!$result2 = mysqli_query($con, $query2))
	{
	        exit(mysqli_error($con));
	}
	while($visit_data = mysqli_fetch_assoc($result2))
	{
		$total_visitors[''.$visit_data['post_id'].'']=$visit_data['visitors'];
		$total_hits[''.$visit_data['post_id'].'']=$visit_data['hits'];
	}

	$query3="SELECT CP.post_id AS post_id, COUNT(AJ.js_id) AS 
	applied
	FROM circular_post CP, applied_job AJ
    WHERE AJ.post_id=CP.post_id
	GROUP BY CP.post_id
	ORDER BY CP.post_id DESC";
	if (!$result3 = mysqli_query($con, $query3))
	{
	        exit(mysqli_error($con));
	}
	while($post_data3 = mysqli_fetch_assoc($result3))
	{
		$applied[''.$post_id=$post_data3['post_id'].'']=$post_data3['applied'];
	}
?>

<div class="col-md-12 mobile-device">
	<?php
    if (mysqli_num_rows($result1) > 0)
    {
    	$total_circular=mysqli_num_rows($result1);
		?>
		 
		<div class="table-responsive card wizard-card" data-color="green">

			<div class="mt-1 pl-2 col-md-12 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center"><strong class="success">Total Circulars's: </strong><?php echo $total_circular; ?>
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
								<small>Title</small><i class="fa fa-sort fa-xs " aria-hidden="true"></i>
							</th>
							<th class="w5 font-small-3 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
								<small>Category</small><i class="fa fa-sort fa-xs " aria-hidden="true"></i>
							</th>
							<th class="w5 font-small-3 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
								<small>Vacancy</small><i class="fa fa-sort fa-xs " aria-hidden="true"></i>
							</th>
							<th class="w5 font-small-3 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
								<small>Visitors</small><i class="fa fa-sort fa-xs " aria-hidden="true" style=""></i>
							</th>
							<th class="w3 font-small-3 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
								<small>Hits</small><i class="fa fa-sort fa-xs " aria-hidden="true"></i>
							</th>
							<th class="w5 font-small-3 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
								<small>Applied</small><i class="fa fa-sort fa-xs " aria-hidden="true"></i>
							</th>
							<th class="w5 font-small-3 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
								<small>Posted</small><i class="fa fa-sort fa-xs " aria-hidden="true"></i>
							</th>
							<th class="w5 font-small-3 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
								<small>Deadline</small><i class="fa fa-sort fa-xs " aria-hidden="true"></i>
							</th>
							<th class="w30 font-small-3 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
								<small>Action</small>
							</th>
						</tr>
					</thead>
					<?php

					$i=1;
					while($post_data = mysqli_fetch_assoc($result1))
					{
						$picture=$post_data['logo_dir'];
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
								<a href="emd?em_id=<?php echo $post_data['id'] ?>" title="View Company Details"><?php echo $post_data['company_name']?>  <i class="fa fa-external-link" aria-hidden="true"></i>
								</a>
							</td>
							<td class="w5 font-small-3 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
								<a href="postd?post_id=<?php echo $post_data['post_id']; ?>" title="View Circular Details"><?php echo $post_data['job_title']; ?>  <i class="fa fa-external-link" aria-hidden="true"></i>
								</a>
							</td>
							<td class="w5 font-small-3 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center"><?php echo $post_data['job_category']; ?> </td>
							<td class="w5 font-small-3 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center"><?php echo $post_data['vacancies_no']; ?> </td>
							<td class="w5 font-small-3 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center"><?php 
							if(!empty($total_visitors[''.$post_data['post_id'].'']))
							{ 
								echo $total_visitors[''.$post_data['post_id'].''];
							} 
							else
							{ 
								echo '0';
							} 
							?> 
							</td>

							<td class="w5 font-small-3 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center"><?php 
								if (!empty($total_hits[''.$post_data['post_id'].''])) 
								{
									echo $total_hits[''.$post_data['post_id'].''];
								} 
								else
								{ 
									echo '0';
								} 
								?> 
							</td>
							<td class="w5 font-small-3 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
								<?php 
									if (!empty($applied[''.$post_data['post_id'].'']))
									{
										echo $applied[''.$post_data['post_id'].''];
									}
									else
									{
										echo '0';
									}
									
								?> 
							</td>
							<td class="w5 font-small-3 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center"><?php echo $post_data['posted_at'] ?> </td>
							<td class="w5 font-small-3 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center"><?php echo $post_data['application_deadline'] ?> </td>
							<td class="w30 font-small-3 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
								<?php
								if ($post_data['action']=='Active')
								{
									echo 
									'
										<div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
			                                <button type="button" class="btn btn-info round-left">Active</button>
			                                <button type="button" id="'.$post_data['post_id'].'" name="action_deactive" class="btn btn-outline-warning">Deactive</button>
			                                <button type="button" id="'.$post_data['post_id'].'" name="action_hide" class="btn btn-outline-danger round-right">Hide</button>
			                            </div>
									';
								}
								elseif ($post_data['action']=='Deactive')
								{
									echo 
									'
										<div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
			                                <button type="button" id="'.$post_data['post_id'].'" name="action_active" class="btn btn-outline-info round-left">Active</button>
			                                <button type="button" class="btn btn-warning">Deactive</button>
			                                <button type="button" id="'.$post_data['post_id'].'" name="action_hide" class="btn btn-outline-danger round-right">Hide</button>
			                            </div>
									';
								}
								elseif ($post_data['action']=='Hide')
								{
									echo 
									'
										<div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
			                                <button type="button" id="'.$post_data['post_id'].'" name="action_active" class="btn btn-outline-info round-left">Active</button>
			                                <button type="button" id="'.$post_data['post_id'].'" name="action_deactive" class="btn btn-outline-warning">Deactive</button>
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
								<small>Title</small>
							</th>
							<th class="w5 font-small-3 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
								<small>Category</small>
							</th>
							<th class="w5 font-small-3 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
								<small>Vacancy</small>
							</th>
							<th class="w5 font-small-3 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
								<small>Visitors</small> 
							</th>
							<th class="w3 font-small-3 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
								<small>Hits</small>
							</th>
							<th class="w5 font-small-3 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
								<small>Applied</small>
							</th>
							<th class="w5 font-small-3 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
								<small>Posted</small>
							</th>
							<th class="w5 font-small-3 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
								<small>Deadline</small>
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

    	var post_id = $(this).attr('id');
    	var action = 'Active';

        $.ajax({
            type: 'post',
            url: 'lpostu',   // here your php file to do something with postdata
            data: { post_id:post_id, action:action },
            success: function (data) {
              $('#post_list_notification_content').show().fadeOut(4100).html(data);
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

    	var post_id = $(this).attr('id');
    	var action = 'Deactive';

        $.ajax({
            type: 'post',
            url: 'lpostu',   // here your php file to do something with postdata
            data: { post_id:post_id, action:action },
            success: function (data) {
              $('#post_list_notification_content').show().fadeOut(4100).html(data);
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

    	var post_id = $(this).attr('id');
    	var action = 'Hide';

        $.ajax({
            type: 'post',
            url: 'lpostu',   // here your php file to do something with postdata
            data: { post_id:post_id, action:action },
            success: function (data) {
              $('#post_list_notification_content').show().fadeOut(4100).html(data);
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
    