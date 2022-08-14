<?php
	session_start();

	require_once('../class_library/employer_job_posts_view_class.php');
	$post_view= new Circulars_Data_View;
	$post_table=$post_view->circulars_data_table();
	$x=NULL;
?>
	<?php
	if($post_table->num_rows >0)
	{
		?>
		<div class="table-responsive card wizard-card" data-color="green">

			<div class="mt-1 pl-2 col-md-12 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
				<strong class="success">Total Circular: </strong><?php echo $post_table->num_rows; ?>
			</div>
			
			<div class="col-md-12">
				<table id="dtBasicExample" class="table table-bordered mt-1 col-md-12 col-xs-12" cellspacing="0" width="100%">
					<thead>
						<tr class="info">
							<th class="w5 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
								# &nbsp; <i class="fa fa-sort grey" aria-hidden="true"></i>
							</th>
							<th class="w10 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
								Title &nbsp; <i class="fa fa-sort grey" aria-hidden="true"></i>
							</th>
							<th class="w15 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
								Category &nbsp; <i class="fa fa-sort grey" aria-hidden="true"></i>
							</th>
							<th class="w10 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
								Vacancies &nbsp; <i class="fa fa-sort grey" aria-hidden="true"></i>
							</th>
							<th class="w10 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
								Experience &nbsp; <i class="fa fa-sort grey" aria-hidden="true"></i>
							</th>
							<th class="w10 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
								Salary &nbsp; <i class="fa fa-sort grey" aria-hidden="true"></i>
							</th>
							<th class="w10 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
								Posted At &nbsp; <i class="fa fa-sort grey" aria-hidden="true"></i>
							</th>
							<th class="w10 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
								Deadline &nbsp; <i class="fa fa-sort grey" aria-hidden="true"></i>
							</th>
							<th class="w10 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
								Status &nbsp; <i class="fa fa-sort grey" aria-hidden="true"></i>
							</th>
							<th class="w15 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
								Action
							</th>
						</tr>
					</thead>
					<?php
					$x=1;
					while($post_data = $post_table->fetch_assoc())
					{
						$post_id			= $post_data['post_id'];
						$p_id[]				= $post_data['post_id'];
						$job_title			= $post_data['job_title'];
						$job_category		= $post_data['job_category'];
						$vacancies_no		= $post_data['vacancies_no'];
						$exp_years			= $post_data['experience_years'];
						$salary_range		= $post_data['salary_range'];
						$posted_at 			= $post_data['posted_at'];
						$app_deadline		= $post_data['application_deadline'];
						$action 			= $post_data['action'];
						?>
						<tr>
							<td class="w5 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
								<?php echo $x++; ?>
							</td>
							<td class="w10 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
								<a href="post_details?post_id=<?php echo $post_id; ?>" title="View Details">
									<?php echo $job_title; ?> <i class="fa fa-external-link" aria-hidden="true"></i>
								</a> 
							</td>
							<td class="w15 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
								<?php echo $job_category; ?>
							</td>
							<td class="w10 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
								<?php echo $vacancies_no; ?>
							</td>
							<td class="w10 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
								<?php echo $exp_years; ?>
							</td>
							<td class="w10 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
								<?php echo $salary_range; ?>
							</td>
							<td class="w10 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
								<?php echo $posted_at; ?>
							</td>
							<td class="w10 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
								<?php echo $app_deadline; ?>
							</td>
							<td class="w10 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
								<?php 
								if ($post_data['action']=='Active')
								{
									?>
									 	<button type="submit" id="<?php echo $post_id; ?>" class="deactive_post round btn btn-info" title="Click to Deactive">
						                    Active
					                	</button>
									<?php
								}
								elseif ($post_data['action']=='Deactive')
								{
									?>
									 	<button type="submit" id="<?php echo $post_id; ?>" class="active_post round btn btn-grey" title="Click to Active">
						                    Deactive
					                	</button>
									<?php
								}
								?>
							</td>

							<td class="w10 text-sm-center text-md-center text-lg-center text-xl-center">

								<a id="<?php echo $post_id; ?>" class="circular_edit" title="Edit"> 
			                        <i class="fa fa-pencil-square-o fa-lg text-info"></i>&nbsp;
			                    </a>

								<a data-toggle="modal" data-target="#circular<?php echo $post_id; ?>" title="Delete"> 
			                        <i class="fa fa-trash-o fa-lg text-danger"></i>

			                    </a>
							</td>
						</tr>

			            <!-- Delete Modal -->
			            <div class="modal fade text-xs-left" id="circular<?php echo $post_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel18" aria-hidden="true">
			              <div class="modal-dialog" role="document">
			                <div class="modal-content">
			                  <div class="modal-header">
			                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			                      <span aria-hidden="true">&times;</span>
			                    </button>
			                    <h4 class="modal-title text-sm-center text-md-center text-lg-center text-xl-center" id="myModalLabel18"><i class="fa fa-trash-o fa-lg text-danger"></i> Delete Confirmation</h4>
			                  </div>
			                  <div class="modal-body">
			                    <div class="alert alert-warning text-sm-center text-md-center text-lg-center text-xl-center" role="alert">
			                        <strong>Are you sure!</strong> To confirm delete please press on "Confirm" button
			                    </div>
			                  </div>
			                  <div class="modal-footer text-sm-center text-md-center text-lg-center text-xl-center">
			                    <button type="button" class="btn btn-outline-warning" data-dismiss="modal">Cancel</button>

			                    <button data-dismiss="modal" type="button" id="<?php echo $post_id; ?>" class="circular_delete btn btn-outline-primary">Confirm</button>
			                  </div>
			                </div>
			              </div>
			            </div>
			            <!-- /Delete Modal -->
			            <?php
					}
					//$s=sizeof($p_id);$p=$s-1;for($i=0; $i<$p;$i++){ echo '.circular_edit'.$p_id[''.$i.''].', ';} echo '.circular_edit'.$p_id[''.$p.''];
					?>
					<tfoot>
						<tr class="info">
							<th class="w5 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">#</th>
							<th class="w10 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">Title</th>
							<th class="w15 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">Category</th>
							<th class="w10 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">Vacancies</th>
							<th class="w10 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">Experience</th>
							<th class="w10 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">Salary</th>
							<th class="w10 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">Posted At</th>
							<th class="w10 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">Deadline</th>
							<th class="w10 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">Status</th>
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
			<div class="text-sm-center text-md-center text-lg-center text-xl-center">
				<strong class="text-warning">You have no posted circular yet</strong>
			</div>
		';
	}
?>

<script type="text/javascript">

	$(document).ready(function () {

	    $('#dtBasicExample').DataTable({
		    //"searching": false // false to disable search (or any other option)
		    //"ordering": false // false to disable sorting (or any other option)
		    "paging": false // false to disable pagination (or any other option)
		 });
	 	$('.dataTables_length').addClass('bs-select');
	});

	//############################### BEGIN ADD ##############################//
	$('.circular_add').click(function() {
		var id = $(this).attr('id');

        $('#circular_edit_add_cancel').show();
        $('#circular_add').hide();
        $('#circular').hide();
        $('#circular_with_add_icon').show();

		$.ajax({
		    url : 'afcircular',
		    type: 'POST',
		    data : { id:id },
		    success: function(data)
		    {
		        $("#circular_add_content").html(data);

		        $('#circular_view_content').slideUp(400); //this is actually hide
		        $('#circular_add_content').slideDown(400); //this is actually show
		    }
		});
    });
    //############################### END ADD ##############################//

	//############################### BEGIN EDIT ##############################//
	$('.circular_edit').click(function() {
		var post_id = $(this).attr('id');

		$('#circular_add').hide();
		$('#circular').hide();
		$('#circular_with_edit_icon').show();
		$('#circular_edit_add_cancel').show();

		$.ajax({
		    url : 'ecircular',
		    type: 'POST',
		    data : { post_id:post_id },
		    success: function(data)
		    {
	    		$("#circular_edit_content").html(data);

	    		$('#circular_view_content').slideUp(400);  //this is actually hide
	    		$('#circular_edit_content').slideDown(400); //this is actually show
		    }
		});
	});
	//############################### END EDIT ##############################//

	//############################### BEGIN DELETE ##############################//
	$('.circular_delete').click(function() {

		var post_id = $(this).attr('id');
		var oparation= 'Delete';
		
		$('.app-content').modal('hide'); 
		$('body').removeClass('modal-open'); //these 3 lines for fully close the modal
		$('.modal-backdrop').remove();

		$.ajax({
		    url : "c_op",
		    type: "POST",
		    data : { post_id:post_id, oparation:oparation},
		    success: function(data)
		    {
		    	$('#circular_notification_content').show().fadeOut(3100).html(data);
		    }
		});
	});
	//############################### END DELETE ##############################//

	//############################### BEGIN ACTIVE ##############################//
	$('.active_post').click(function() {

		var post_id = $(this).attr('id');
		var oparation= 'Active';
		
		$('.app-content').modal('hide'); 
		$('body').removeClass('modal-open'); //these 3 lines for fully close the modal
		$('.modal-backdrop').remove();

		$.ajax({
		    url : "c_op",
		    type: "POST",
		    data : { post_id:post_id, oparation:oparation},
		    success: function(data)
		    {
		    	$('#circular_notification_content').show().fadeOut(3100).html(data);
		    }
		});
	});
	//############################### END ACTIVE ##############################//

	//############################### BEGIN DEACTIVE ##############################//
	$('.deactive_post').click(function() {

		var post_id = $(this).attr('id');
		var oparation= 'Deactive';
		
		$('.app-content').modal('hide'); 
		$('body').removeClass('modal-open'); //these 3 lines for fully close the modal
		$('.modal-backdrop').remove();

		$.ajax({
		    url : "c_op",
		    type: "POST",
		    data : { post_id:post_id, oparation:oparation},
		    success: function(data)
		    {
		    	$('#circular_notification_content').show().fadeOut(3100).html(data);
		    }
		});
	});
	//############################### END DEACTIVE ##############################//

    $('#dtBasicExample_filter').addClass("dataTables_filter form-group label-floating");
    $('#dtBasicExample_length').addClass("dataTables_length bs-select form-group label-floating");

</script>