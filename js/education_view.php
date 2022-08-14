<?php
	session_start();
	require_once('../dbconfig.php');
	global $con;

	$js_id=$_SESSION['js_info']['id'];

	$query = "SELECT * FROM education WHERE js_id='$js_id' AND status='user_data' order by id ASC";

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
				<th class="w10">Degree Level</th>
				<th class="w15">Degree Title</th>
				<th class="w20">Institution</th>
				<th class="w5">Result System</th>
				<th class="w5">Result Achieved</th>
				<th class="w5">Grade Scale</th>
				<th class="w5">Passing Year</th>
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
					<td class="w10">'.$row['degree_level'].'</td>
					<td class="w25">'.$row['degree_title'].'</td>
					<td class="w30">'.$row['institution'].'</td>
					<td class="w5">'.$row['result_system'].'</td>
					<td class="w5">'.$row['result_achieved'].'</td>
					<td class="w5">'.$row['grade_scale'].'</td>
					<td class="w5">'.$row['passing_year'].'</td>
					<td class="w10 text-sm-center text-md-center text-lg-center text-xl-center">

						<a id="'.$row['id'].'" class="education_edit" title="Edit"> 
	                        <i class="fa fa-pencil-square-o fa-lg text-info"></i>&nbsp;
	                    </a>

						<a data-toggle="modal" data-target="#education'.$row['id'].'" title="Delete"> 
	                        <i class="fa fa-trash-o fa-lg text-danger"></i>

	                    </a>
					</td>
				</tr>

	            <!-- Delete Modal -->
	            <div class="modal fade text-xs-left" id="education'.$row['id'].'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel18" aria-hidden="true">
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

	                    <button data-dismiss="modal" type="button" id="'.$row['id'].'" class="education_delete btn btn-outline-primary">Confirm</button>
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
	$('.education_add').click(function() {
		var id = $(this).attr('id');

        $('#education_edit_add_cancel').show();
        $('#education_add').hide();
        $('#education').hide();
        $('#education_with_add_icon').show();

		$.ajax({
		    url : 'afedu',
		    type: 'POST',
		    data : { id: id },
		    success: function(data)
		    {
		        $("#education_add_content").html(data);

		        $('#education_view_content').slideUp(400); //this is actually hide
		        $('#education_add_content').slideDown(400); //this is actually show
		    }
		});
    });
    //############################### END ADD ##############################//

	//############################### BEGIN EDIT ##############################//
	$('.education_edit').click(function() {
		var id = $(this).attr('id');

		$('#education_add').hide();
		$('#education').hide();
		$('#education_with_edit_icon').show();
		$('#education_edit_add_cancel').show();

		$.ajax({
		    url : 'eedu',
		    type: 'POST',
		    data : { id: id },
		    success: function(data)
		    {
	    		$("#education_edit_content").html(data);

	    		$('#education_view_content').slideUp(400);  //this is actually hide
	    		$('#education_edit_content').slideDown(400); //this is actually show
		    }
		});
	});
	//############################### END EDIT ##############################//

	//############################### BEGIN DELETE ##############################//
	$('.education_delete').click(function() {
		var id = $(this).attr('id');

		$('.app-content').modal('hide'); 
		$('body').removeClass('modal-open'); //these 3 lines for fully close the modal
		$('.modal-backdrop').remove();

		$.ajax({
		    url : "dedu",
		    type: "POST",
		    data : { id: id },
		    success: function(data)
		    {
		    	$('#education_notification_content').show().fadeOut(3100).html(data);
		    }
		});
	});
	//############################### END DELETE ##############################//

</script>