<?php
	require_once('../dbconfig.php');
	global $con;

	$query = "SELECT PS.id, subject, PS.created_at, PS.updated_at, PS.action, AD.full_name  FROM preparation_sub PS, admin AD WHERE AD.id=PS.created_by ORDER BY PS.id DESC";

	if (!$result = mysqli_query($con, $query)) {
	        exit(mysqli_error($con));
	}

    if (mysqli_num_rows($result) > 0)
    {
		?>
		<div class="table-responsive card wizard-card" data-color="green">
			<div class="col-md-12">
				<table id="dtBasicExample" class="table table-bordered mt-1 col-md-12 col-xs-12" cellspacing="0" width="100%">
					<thead>
						<tr class="info">
							<th class="w5 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
								# &nbsp; <i class="fa fa-sort grey" aria-hidden="true"></i>
							</th>
							<th class="w30 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
								Subject &nbsp; <i class="fa fa-sort grey" aria-hidden="true"></i>
							</th>
							<th class="w20 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
								Created By &nbsp; <i class="fa fa-sort grey" aria-hidden="true"></i>
							</th>
							<th class="w10 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
								Create Date&nbsp;<i class="fa fa-sort grey" aria-hidden="true"></i>
							</th>
							<th class="w10 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
								Update Date&nbsp;<i class="fa fa-sort grey" aria-hidden="true"></i>
							</th>
							<th class="w15 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
								Status &nbsp; <i class="fa fa-sort grey" aria-hidden="true"></i>
							</th>
							<th class="w10 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
								Action
							</th>
						</tr>
					</thead>
				<?php

				$i=0;
				while($row = mysqli_fetch_assoc($result))
				{
					$i++;
					?>
						<tr>
							<td class="text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
								<?php echo $i; ?>
							</td>
							<td class="text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
								<?php echo $row['subject']; ?>
							</td>
							<td class="text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
								<?php echo $row['full_name']; ?>
							</td>
							<td class="text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
								<?php echo $row['created_at']; ?>
							</td>
							<td class="text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
								<?php echo $row['updated_at']; ?>
							</td>
							<td class="font-small-3 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center" style="padding:10px 0px 0px 0px !important;">
								<?php
								if ($row['action']=='Public')
								{
									echo 
									'
										<div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
			                                <button type="button" class="btn btn-info round-left">Public</button>
			                                <button type="button" id="'.$row['id'].'" name="status_hide" class="btn btn-outline-danger round-right">Hide</button>
			                            </div>
									';
								}
								elseif ($row['action']=='Hide')
								{
									echo 
									'
										<div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
			                                <button type="button" id="'.$row['id'].'" name="status_public" class="btn btn-outline-info round-left">Public</button>
			                                <button type="button" class="btn btn-danger round-right">Hide</button>
			                            </div>
									';
								}
								?>
							</td>
							<td class="w10 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">

								<a id="<?php echo $row['id']; ?>" class="subject_edit" title="Edit"> 
			                        <i class="fa fa-pencil-square-o fa-lg text-info"></i>&nbsp;
			                    </a>

								<a data-toggle="modal" data-target="#subject<?php echo $row['id']; ?>" title="Delete"> 
			                        <i class="fa fa-trash-o fa-lg text-danger"></i>

			                    </a>
							</td>
						</tr>

			            <!-- Delete Modal -->
			            <div class="modal fade text-xs-left" id="subject<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel18" aria-hidden="true">
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

			                    <button data-dismiss="modal" type="button" id="<?php echo $row['id']; ?>" class="subject_delete btn btn-outline-primary">Confirm</button>
			                  </div>
			                </div>
			              </div>
			            </div>
			            <!-- /Delete Modal -->
					<?php
				}
				?>
					<tfoot>
						<tr class="info">
							<th class="text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">#</th>
							<th class="text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">Subject</th>
							<th class="text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">Created By</th>
							<th class="text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">Create Date</th>
							<th class="text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">Update Date</th>
							<th class="text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">Status</th>
							<th class="text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">Action</th>
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
				<strong class="text-warning">Subject list is empty</strong>
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
	$('.subject_add').click(function() {

		var action = $(this).attr('id');

        $('#subject_edit_add_cancel').show();
        $('#subject_add').hide();
        $('#subject').hide();
        $('#subject_with_add_icon').show();

		$.ajax({
		    url : 'afsubject',
		    type: 'POST',
		    data : { action: action },
		    success: function(data)
		    {
		        $("#subject_add_content").html(data);

		        $('#subject_view_content').slideUp(400); //this is actually hide
		        $('#subject_add_content').slideDown(400); //this is actually show
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
    });
    //############################### END ADD ##############################//

	//############################### BEGIN EDIT ##############################//
	$('.subject_edit').click(function() {

		var id = $(this).attr('id');

		$('#subject_add').hide();
		$('#subject').hide();
		$('#subject_with_edit_icon').show();
		$('#subject_edit_add_cancel').show();

		$.ajax({
		    url : 'efsubject',
		    type: 'POST',
		    data : { id: id },
		    success: function(data)
		    {
	    		$("#subject_edit_content").html(data);

	    		$('#subject_view_content').slideUp(400);  //this is actually hide
	    		$('#subject_edit_content').slideDown(400); //this is actually show
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
	});
	//############################### END EDIT ##############################//

	//############################### BEGIN DELETE ##############################//
	$('.subject_delete').click(function() {

		var sub_id = $(this).attr('id');
		var action = 'Delete';

		$('.app-content').modal('hide'); 
		$('body').removeClass('modal-open'); //these 3 lines for fully close the modal
		$('.modal-backdrop').remove();

		$.ajax({
		    url : "update_subject",
		    type: "POST",
		    data : { sub_id:sub_id, action:action },
		    success: function(data)
		    {
		    	$('#subject_notification_content').show().html(data);
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
	});
	//############################### END DELETE ##############################//

	//############################### BEGIN PUBLIC ##############################//
    $('button[name="status_public"]').click(function(e){

    	var sub_id = $(this).attr('id');
    	var action = 'Public';

        $.ajax({
            type: 'post',
            url: 'update_subject',   // here your php file to do something with postdata
            data: { sub_id:sub_id, action:action },
            success: function (data) {
              $('#subject_notification_content').show().html(data);
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
    //############################### END PUBLIC ##############################//

    //############################### BEGIN HIDE ##############################//
    $('button[name="status_hide"]').click(function(e){

    	var sub_id = $(this).attr('id');
    	var action = 'Hide';

        $.ajax({
            type: 'post',
            url: 'update_subject',   // here your php file to do something with postdata
            data: { sub_id:sub_id, action:action },
            success: function (data) {
              $('#subject_notification_content').show().html(data);
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