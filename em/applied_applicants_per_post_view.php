<?php 
	session_start();
	require_once('../dbconfig.php');
	global $con;

	$em_id=$_SESSION['em_info']['id'];

	if (isset($_POST['post_id']) && !empty($_POST['post_id']))
	{
		$post_id=$_POST['post_id'];
		$query1 = "SELECT JS.id,pic_dir,full_name,email,mobile_number,gender,applied_at FROM circular_post AS CP, applied_job AS AJ, job_seeker AS JS WHERE CP.em_id='$em_id' AND CP.post_id='$post_id' AND AJ.post_id='$post_id' AND JS.id=AJ.js_id AND JS.action IN ('Active','Deactive') ORDER BY AJ.id ASC";

		if (!$result1 = mysqli_query($con, $query1))
		{
		    exit(mysqli_error($con));
		}


		$query2 = "SELECT js_id FROM selected_applied_applicants where em_id='$em_id' AND post_id='$post_id' ORDER BY id ASC";
		if (!$result2 = mysqli_query($con, $query2)) {
		    exit(mysqli_error($con));
		}
		if (mysqli_num_rows($result2) > 0)
    	{
			while($row = mysqli_fetch_assoc($result2))
			{
				$applied_js[]=$row['js_id'];
			}
		}
		else
		{
			$applied_js=NULL;
		}

		?>


		<div class="col-md-12 col-sm-12 col-xs-12 table_content">
			<?php
		    if (mysqli_num_rows($result1) > 0)
		    {
		    	$total_applied=mysqli_num_rows($result1);
				?>

				<div class="mt-1 pl-2 col-md-12 text-sm-center text-md-center text-lg-center text-xl-center"><strong class="success">Total Applied: </strong><?php echo $total_applied; ?>
				</div>

				<div class="table-responsive card wizard-card" data-color="green">
					<div class="col-md-12">
						<table id="dtBasicExample" class="table table-bordered mt-1 col-md-12 col-xs-12" cellspacing="0" width="100%">
							<thead>
								<tr class="info">
									<th class="w5 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
										# &nbsp; <i class="fa fa-sort grey" aria-hidden="true"></i>
									</th>
									<th class="w5 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
										Picture
									</th>
									<th class="w25 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
										Name &nbsp; <i class="fa fa-sort grey" aria-hidden="true"></i>
									</th>
									<th class="w20 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
										Email &nbsp; <i class="fa fa-sort grey" aria-hidden="true"></i>
									</th>
									<th class="w20 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
										Mobile No &nbsp; <i class="fa fa-sort grey" aria-hidden="true"></i>
									</th>
									<th class="w15 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
										Apply Date &nbsp; <i class="fa fa-sort grey" aria-hidden="true"></i>
									</th>
									<th class="w10 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
										Action &nbsp; <i class="fa fa-sort grey" aria-hidden="true"></i>
									</th>
								</tr>
							</thead>
							<?php

						$i=1;
						$total_selected=0;
						while($applied_js_info = mysqli_fetch_assoc($result1))
						{			
							$applied_at=$applied_js_info['applied_at'];
							$picture=$applied_js_info['pic_dir'];
							$gender=$applied_js_info['gender'];
							$js_id=$applied_js_info['id'];
							$js_id_array[]=$applied_js_info['id'];
							?>
								<tr>
									<td class="w5 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center"><?php echo $i++; ?>
									</td>

									<td class="w5 text-xs-centertext-sm-center text-md-center text-lg-center text-xl-center">
										 
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

									<td class="w25 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
										<a href="vj?js_id=<?php echo $js_id; ?>&post_id=<?php echo $post_id; ?>"  title="View Resume"><?php echo $applied_js_info['full_name']; ?> <i class="fa fa-external-link" aria-hidden="true"></i>
										</a>
									</td>

									<td class="w20 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center"><?php echo $applied_js_info['email']; ?>
									</td>

									<td class="w20 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
										<?php echo $applied_js_info['mobile_number']; ?>	
									</td>

									<td class="w15 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center"><?php echo $applied_at; ?>
									</td>

									<td class="w10 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
										<?php
										if (empty($applied_js))
										{
											echo
											'
												<button type="submit" id="'.$js_id.'" name="select_js" class="round btn btn-outline-info" title="Click To Select">
								                    <i class="icon-check2"></i> Select
							                	</button>
											';
										}
										elseif (in_array($js_id, $applied_js))
										{
											$total_selected++;
											echo
											'
												<button type="submit" id="'.$js_id.'" name="unselect_js" class="round btn btn-info" title="Click To Unselect">
								                    <i class="icon-cross2"></i> Unselect
							                	</button>
											';
										}
										else
										{	
											echo
											'
												<button type="submit" id="'.$js_id.'" name="select_js" class="round btn btn-outline-info" title="Click To Select">
								                    <i class="icon-check2"></i> Select
							                	</button>
											';
										}	
										?>
									</td>

								</tr>
							<?php
						}

						$all_js_id=implode(',', $js_id_array);

						?>
						<div class="col-md-12 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center pt-1">
							<?php
							if ($total_selected>=1)
							{
								echo
								'
									<a href="sappp?post_id='.$post_id.'">
										<button type="button" class="btn btn-outline-info mr-1" title="Click to view total selected applicants">
											<i class="fa fa-th-list" aria-hidden="true"></i> Selected List
										</button>
									</a>
								';
							}


							if ($total_applied==$total_selected)
							{
								echo
								'
								<button type="submit" class="btn btn-success" title="Already All Applied Applicants Selected">
								<i class="fa fa-check-square-o" aria-hidden="true"></i> All Selected
								</button>
								';
							}
							else
							{
								echo
								'
									<button type="submit" class="btn btn-outline-info" data-toggle="modal" data-target="#select_all_applied_applicants_modal" title="Click To Select All Applied Applicants">
										<i class="fa fa-check-square-o" aria-hidden="true"></i> Select All
									</button>
								';
							}
							?>

						</div>

						<!-- Select All Modal -->
			            <div class="modal fade text-xs-left" id="select_all_applied_applicants_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel18" aria-hidden="true">
			              <div class="modal-dialog" role="document">
			                <div class="modal-content">
			                  <div class="modal-header">
			                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			                      <span aria-hidden="true">&times;</span>
			                    </button>
			                    <h4 class="modal-title text-sm-center text-md-center text-lg-center text-xl-center info" id="myModalLabel18"><i class="fa fa-check-square-o" aria-hidden="true"></i> Select All Confirmation</h4>
			                  </div>
			                  <div class="modal-body">
			                    <div class="text-sm-center text-md-center text-lg-center text-xl-center" role="alert">
			                        <strong>Are you sure?</strong> Once you <b>SELECT ALL</b> You cannot be able to <b>UNSELECT ALL</b> from this page
			                        <br>To confirm <b>SELECT ALL</b> please press on <b>"Confirm"</b> button
			                    </div>
			                  </div>
			                  <div class="modal-footer text-sm-center text-md-center text-lg-center text-xl-center">
			                    <button type="button" class="btn btn-outline-warning" data-dismiss="modal">Cancel</button>

			                    <button data-dismiss="modal" type="button" id="<?php echo $all_js_id; ?>" name="select_all_js" class="language_delete btn btn-outline-primary">Confirm</button>
			                  </div>
			                </div>
			              </div>
			            </div>
			            <!-- /Select All Modal -->
							<tfoot>
								<tr class="info">
									<th class="w5 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">#</th>
									<th class="w5 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">Picture</th>
									<th class="w25 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">Name</th>
									<th class="w20 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">Email</th>
									<th class="w20 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">Mobile No</th>
									<th class="w15 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">Apply Date</th>
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
		        ?>
		        <script type="text/javascript">
		            $.notify({
		                // where to append the toast notification
		                wrapper: 'body',

		                // toast message
		                message: 'Something went wrong please try again later',

		                // success, info, error, warn
		                type: 'warn',

		                // 1: top-left, 2: top-center, 3: top-right
		                // 4: mid-left, 5: mid-right
		                // 6: bottom-left, 7: bottom-center, 8: bottom-right
		                position: 3,

		                // or 'rtl'
		                dir: 'ltr',

		                // enable/disable auto close
		                autoClose: false,

		                // timeout in milliseconds
		                duration: 4000
		              
		            });
		        </script>
		        <?php
			}
			?>
		</div>
	<?php
	}
	else
	{
        ?>
        <script type="text/javascript">
            $.notify({
                // where to append the toast notification
                wrapper: 'body',

                // toast message
                message: 'Something went wrong please try again later',

                // success, info, error, warn
                type: 'warn',

                // 1: top-left, 2: top-center, 3: top-right
                // 4: mid-left, 5: mid-right
                // 6: bottom-left, 7: bottom-center, 8: bottom-right
                position: 3,

                // or 'rtl'
                dir: 'ltr',

                // enable/disable auto close
                autoClose: false,

                // timeout in milliseconds
                duration: 4000
              
            });
        </script>
        <?php
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

	//############################### BEGIN Select All ##############################//
    $('button[name="select_all_js"]').click(function(e){
    	var post_id='<?php echo $post_id; ?>';
    	var all_js_id =$(this).attr('id');

    	$('.app-content').modal('hide'); 
		$('body').removeClass('modal-open'); //these 3 lines for fully close the modal
		$('.modal-backdrop').remove();

        $.ajax({
            type: 'post',
            url: 'select_all',   // here your php file to do something with postdata
            data: { post_id:post_id, all_js_id:all_js_id },
           	beforeSend: function() {
                $('#applied_applicants_per_post_notification_content').show().fadeOut(6100).html('<div class="text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">OPERATION IS RUNNING PLEASE WAIT...</div>');
            },
            success: function (data) {
              $('#applied_applicants_per_post_notification_content').show().fadeOut(4100).html(data);
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
    //############################### END Select All ##############################//

    //############################### BEGIN Select ##############################//
    $('button[name="select_js"]').click(function(e){
    	var js_id = $(this).attr('id');
    	var post_id='<?php echo $post_id; ?>';
        $.ajax({
            type: 'post',
            url: 'select',   // here your php file to do something with postdata
            data: { post_id:post_id, js_id:js_id },
            success: function (data) {
              $('#applied_applicants_per_post_notification_content').show().fadeOut(4100).html(data);
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
    //############################### END Select ##############################//

    //############################### BEGIN Unselect ##############################//
	$('button[name="unselect_js"]').click(function(e) {
		var js_id = $(this).attr('id');
		var post_id='<?php echo $post_id; ?>';
		$.ajax({
		    url : "unselect",
		    type: "POST",
		    data : { post_id:post_id, js_id:js_id },
            success: function (data) {
              $('#applied_applicants_per_post_notification_content').show().fadeOut(4100).html(data);
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
	//############################### END Unselect ##############################//
	$('#dtBasicExample_filter').addClass("dataTables_filter form-group label-floating");
    $('#dtBasicExample_length').addClass("dataTables_length bs-select form-group label-floating");
 </script>