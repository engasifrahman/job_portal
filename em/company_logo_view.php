<?php
	session_start();
	require_once('../dbconfig.php');
	global $con;

	$em_id=$_SESSION['em_info']['id'];
	$logo=$_SESSION['em_info']['logo'];
	$company_name=$_SESSION['em_info']['company_name'];


	if ($logo=='not_defined_yet')
	{
		echo
		'
	        <div class="col-md-12 col-sm-12 col-xs-12 pt-2 pb-1">
	            <img src="../images/demo/nologo.png" alt="'.$company_name.'" style="width:120px; height:120px; border: 1px solid #2494BE;">
	            <div>
	                <a id="Male" class="bg-info white change_logo" style="width:100px; height:20px; padding:3px 21.5px 3px 21px; font-size: 0.81rem">&nbsp;<i class="fa fa-pencil" aria-hidden="true"></i> Change Logo&nbsp;</a>
	            </div>
	        </div>
		';
	}

	else
	{
		echo
		'
	        <div class="col-md-12 col-sm-12 col-xs-12 pt-2 pb-1" >
	            <img src="'.$logo.'" alt="'.$company_name.'" style="width:120px; height:120px; border: 1px solid #2494BE;">
	            <div>
	                <a id="exist" class="bg-info white change_logo" style="width:100px; height:20px; padding:3px 21.5px 3px 21px; font-size: 0.81rem">&nbsp;<i class="fa fa-pencil" aria-hidden="true"></i> Change Logo&nbsp;</a>
	            </div>
	        </div>
		';
	}
	

?>

<script type="text/javascript">

	$('#close_icon').click(function(){
		$('#company_logo_modal').modal('hide');
	});

	//############################### BEGIN EDIT ##############################//
	$('.change_logo').click(function() {
		var id = $(this).attr('id');

		$.ajax({
		    url : 'ecl',
		    type: 'POST',
		    data : { id: id },
		    success: function(data)
		    {
	    		$("#company_logo_edit_content").html(data);

	    		$('#company_logo_edit_content').slideDown(400); //this is actually show
		    }
		});
	});
	//############################### END EDIT ##############################//

</script>