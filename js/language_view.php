<?php
	session_start();
	require_once('../dbconfig.php');
	global $con;

	$js_id=$_SESSION['js_info']['id'];

	$query = "SELECT * FROM language WHERE js_id='$js_id' AND status='user_data' order by id ASC";

	if (!$result = mysqli_query($con, $query)) {
	        exit(mysqli_error($con));
	}

    if (mysqli_num_rows($result) > 0)
    {
		?>
		<div class="table-responsive">
		<table class="table table-bordered mt-1 col-md-12 col-xs-12">
			<tr class="info">
				<th class="w5">No</th>
				<th class="w25">Language</th>
				<th class="w20">Reading</th>
				<th class="w20">Writing</th>
				<th class="w20">Speaking</th>
				<th class="w10 text-sm-center text-md-center text-lg-center text-xl-center">Action</th>
			</tr>
		<?php

		$i=0;
		while($row = mysqli_fetch_assoc($result))
		{
			$i++;
			echo 
			'
				<tr>
					<td class="w5">'.$i.'</td>
					<td class="w25">'.$row['language'].'</td>
					<td class="w20">'.$row['reading'].'</td>
					<td class="w20">'.$row['writing'].'</td>
					<td class="w20">'.$row['speaking'].'</td>
					<td class="w10 text-sm-center text-md-center text-lg-center text-xl-center">

						<a id="'.$row['id'].'" class="language_edit" title="Edit"> 
	                        <i class="fa fa-pencil-square-o fa-lg text-info"></i>&nbsp;
	                    </a>

						<a data-toggle="modal" data-target="#language'.$row['id'].'" title="Delete"> 
	                        <i class="fa fa-trash-o fa-lg text-danger"></i>

	                    </a>
					</td>
				</tr>

	            <!-- Delete Modal -->
	            <div class="modal fade text-xs-left" id="language'.$row['id'].'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel18" aria-hidden="true">
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

	                    <button data-dismiss="modal" type="button" id="'.$row['id'].'" class="language_delete btn btn-outline-primary">Confirm</button>
	                  </div>
	                </div>
	              </div>
	            </div>
	            <!-- /Delete Modal -->
			';
		}
		echo '</table>';
		echo '</div>';
	}

	else
	{
		echo
		'
			<div class="text-sm-center text-md-center text-lg-center text-xl-center">
				<strong class="text-warning">You have no records yet</strong>
			</div>
		';
	}
?>

<script type="text/javascript">

	//############################### BEGIN ADD ##############################//
	$('.language_add').click(function() {
		var id = $(this).attr('id');

        $('#language_edit_add_cancel').show();
        $('#language_add').hide();
        $('#language').hide();
        $('#language_with_add_icon').show();

		$.ajax({
		    url : 'aflang',
		    type: 'POST',
		    data : { id: id },
		    success: function(data)
		    {
		        $("#language_add_content").html(data);

		        $('#language_view_content').slideUp(400); //this is actually hide
		        $('#language_add_content').slideDown(400); //this is actually show
		    }
		});
    });
    //############################### END ADD ##############################//

	//############################### BEGIN EDIT ##############################//
	$('.language_edit').click(function() {
		var id = $(this).attr('id');

		$('#language_add').hide();
		$('#language').hide();
		$('#language_with_edit_icon').show();
		$('#language_edit_add_cancel').show();

		$.ajax({
		    url : 'elang',
		    type: 'POST',
		    data : { id: id },
		    success: function(data)
		    {
	    		$("#language_edit_content").html(data);

	    		$('#language_view_content').slideUp(400);  //this is actually hide
	    		$('#language_edit_content').slideDown(400); //this is actually show
		    }
		});
	});
	//############################### END EDIT ##############################//

	//############################### BEGIN DELETE ##############################//
	$('.language_delete').click(function() {
		var id = $(this).attr('id');

		$('.app-content').modal('hide'); 
		$('body').removeClass('modal-open'); //these 3 lines for fully close the modal
		$('.modal-backdrop').remove();

		$.ajax({
		    url : "dlang",
		    type: "POST",
		    data : { id: id },
		    success: function(data)
		    {
		    	$('#language_notification_content').show().fadeOut(3100).html(data);
		    }
		});
	});
	//############################### END DELETE ##############################//

</script>