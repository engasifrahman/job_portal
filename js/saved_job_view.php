<?php
	session_start();
	require_once('../dbconfig.php');
	global $con;

	$js_id=$_SESSION['js_info']['id'];

	$query = "SELECT SJ.post_id, saved_at, company_name, job_title, vacancies_no, application_deadline FROM saved_job SJ, circular_post AS CP, employer AS EM WHERE js_id='$js_id' AND CP.post_id=SJ.post_id AND EM.id=em_id AND CP.action='Active' AND EM.action='Active' ORDER BY SJ.id DESC";

	if (!$result = mysqli_query($con, $query))
	{
	    exit(mysqli_error($con));
	}
?>

<div class="col-md-12">
	<?php
    if (mysqli_num_rows($result) > 0)
    {
    	$total_saved_job=mysqli_num_rows($result);
		?>
		<div class="table-responsive card wizard-card" data-color="green">

			<div class="mt-1 pl-2 col-md-12 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center"><strong class="success">Total Saved Job's: </strong><?php echo $total_saved_job; ?>
			</div>
			<div class="col-md-12">
				<table id="dtBasicExample" class="table table-bordered mt-1 col-md-12 col-xs-12" cellspacing="0" width="100%">
					<thead>
						<tr class="info">
							<th class="w5 text-sm-center text-md-center text-lg-center text-xl-center">
								# &nbsp; <i class="fa fa-sort grey" aria-hidden="true"></i>
							</th>
							<th class="w20 text-sm-center text-md-center text-lg-center text-xl-center">
								Job Title &nbsp; <i class="fa fa-sort grey" aria-hidden="true"></i>
							</th>
							<th class="w15 text-sm-center text-md-center text-lg-center text-xl-center">
								Company &nbsp; <i class="fa fa-sort grey" aria-hidden="true"></i>
							</th>
							<th class="w15 text-sm-center text-md-center text-lg-center text-xl-center">
								No of Vacancies &nbsp; <i class="fa fa-sort grey" aria-hidden="true"></i>
							</th>
							<th class="w15 text-sm-center text-md-center text-lg-center text-xl-center">
								Deadline &nbsp; <i class="fa fa-sort grey" aria-hidden="true"></i>
							</th>
							<th class="w15 text-sm-center text-md-center text-lg-center text-xl-center">
								Save Date &nbsp; <i class="fa fa-sort grey" aria-hidden="true"></i>
							</th>
							<th class="w15 text-sm-center text-md-center text-lg-center text-xl-center">
								Action &nbsp; <i class="fa fa-sort grey" aria-hidden="true"></i>
							</th>
						</tr>
					</thead>
				<?php

				$i=1;
				while($saved_data = mysqli_fetch_assoc($result))
				{	
					list($y, $m, $d) = explode('-', $saved_data['saved_at']);
					$d=explode(' ',$d);
					$saved_at=$y;
					$saved_at.='-'.$m;
					$saved_at.='-'.$d['0'];
					$post_id=$saved_data['post_id'];
					echo 
					' 
						<tr>
							<td class="w5 text-sm-center text-md-center text-lg-center text-xl-center">'.$i++.'</td>
							<td class="w25 text-sm-center text-md-center text-lg-center text-xl-center">
								<a href="jvd<'.$post_id.'" title="Click to view details">'.$saved_data['job_title'].' <i class="fa fa-external-link" aria-hidden="true"></i>
								</a>
							</td>
							<td class="w15 text-sm-center text-md-center text-lg-center text-xl-center">'.$saved_data['company_name'].'</td>
							<td class="w10 text-sm-center text-md-center text-lg-center text-xl-center">'.$saved_data['vacancies_no'].'</td>
							<td class="w15 text-sm-center text-md-center text-lg-center text-xl-center">'.$saved_data['application_deadline'].'</td>
							<td class="w15 text-sm-center text-md-center text-lg-center text-xl-center">'.$saved_at.'</td>
							<td class="w15 text-sm-center text-md-center text-lg-center text-xl-center">
								<a class="remove_saved_job" data-toggle="modal" data-target="#saved_job_remove_Modal'.$post_id.'" title="Remove"> 
			                        <i class="fa fa-trash-o fa-lg text-danger"></i>
			                    </a>
							</td>
						</tr>
						<!-- Remove Modal -->
			            <div class="modal fade text-xs-left" id="saved_job_remove_Modal'.$post_id.'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel18" aria-hidden="true">
			              <div class="modal-dialog" role="document">
			                <div class="modal-content">
			                  <div class="modal-header">
			                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			                      <span aria-hidden="true">&times;</span>
			                    </button>
			                    <h4 class="modal-title text-sm-center text-md-center text-lg-center text-xl-center" id="myModalLabel18"><i class="fa fa-trash-o fa-lg text-danger"></i> Remove Confirmation</h4>
			                  </div>
			                  <div class="modal-body">
			                    <div class="alert alert-warning text-sm-center text-md-center text-lg-center text-xl-center" role="alert">
			                        <strong>Are you sure!</strong> To confirm remove please press on "Confirm" button
			                    </div>
			                  </div>
			                  <div class="modal-footer text-sm-center text-md-center text-lg-center text-xl-center">
			                    <button type="button" class="btn btn-outline-warning" data-dismiss="modal">Cancel</button>

			                    <button data-dismiss="modal" type="button" id="'.$post_id.'" class="saved_job_remove_confirm btn btn-outline-primary">Confirm</button>
			                  </div>
			                </div>
			              </div>
			            </div>
			            <!-- /Remove Modal -->
					';
				}
				?>
					<tfoot>
						<tr class="info">
							<th class="w5 text-sm-center text-md-center text-lg-center text-xl-center">#</th>
							<th class="w20 text-sm-center text-md-center text-lg-center text-xl-center">Job Title</th>
							<th class="w15 text-sm-center text-md-center text-lg-center text-xl-center">Company</th>
							<th class="w15 text-sm-center text-md-center text-lg-center text-xl-center">No of Vacancies</th>
							<th class="w15 text-sm-center text-md-center text-lg-center text-xl-center">Deadline</th>
							<th class="w15 text-sm-center text-md-center text-lg-center text-xl-center">Save Date</th>
							<th class="w15 text-sm-center text-md-center text-lg-center text-xl-center">Action</th>
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
				<strong class="text-warning">Until now, you have not saved any job</strong>
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

	//############################### BEGIN REMOVE ##############################//
	$('.saved_job_remove_confirm').click(function(e) {
		var post_id = $(this).attr('id');
		
		$('.app-content').modal('hide'); 
		$('body').removeClass('modal-open'); //these 3 lines for fully close the modal
		$('.modal-backdrop').remove();

		$.ajax({
		    url : "sjr",
		    type: "POST",
		    data : { post_id: post_id },
		    success: function(data)
		    {
		    	$('#saved_job_notification_content').show().fadeOut(3100).html(data);
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
	//############################### END REMOVE ##############################//
	$('#dtBasicExample_filter').addClass("dataTables_filter form-group label-floating");
    $('#dtBasicExample_length').addClass("dataTables_length bs-select form-group label-floating");
</script>
