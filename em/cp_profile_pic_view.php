<?php
	session_start();
	require_once('../dbconfig.php');
	global $con;

	$em_id=$_SESSION['em_info']['id'];
	$cp_pic=$_SESSION['em_info']['cp_pic'];
	$cp_name=$_SESSION['em_info']['cp_name'];
	$cp_gender=$_SESSION['em_info']['cp_gender'];

	if ($cp_pic=='not_defined_yet' && $cp_gender=='Male')
	{
		echo
		'
	        <div class="col-md-12 col-sm-12 col-xs-12 pt-2 pb-1">
	            <img src="../images/demo/male.png" alt="'.$cp_name.'" style="width:100px; height:120px; border: 1px solid #2494BE;">
	            <div>
	                <a id="Male" class="bg-info white change_picture" style="width:100px; height:20px; padding:3px 6px 3px 6px; font-size: 0.81rem">&nbsp;<i class="fa fa-pencil" aria-hidden="true"></i> Change Picture&nbsp;</a>
	            </div>
	        </div>
		';
	}

	elseif ($cp_pic=='not_defined_yet' && $cp_gender=='Female')
	{
		echo
		'
	        <div class="col-md-12 col-sm-12 col-xs-12 pt-2 pb-1" >
	            <img src="../images/demo/female.png" alt="'.$cp_name.'" style="width:100px; height:120px; border: 1px solid #2494BE;">
	            <div>
	                <a id="Female" class="bg-info white change_picture" style="width:100px; height:20px; padding:3px 6px 3px 6px; font-size: 0.81rem">&nbsp;<i class="fa fa-pencil" aria-hidden="true"></i> Change Picture&nbsp;</a>
	            </div>
	        </div>
		';
	}

	elseif ($cp_pic=='not_defined_yet' && $cp_gender=='Others')
	{
		echo
		'
	        <div class="col-md-12 col-sm-12 col-xs-12 pt-2 pb-1" >
	            <img src="../images/demo/others.png" alt="'.$cp_name.'" style="width:100px; height:120px; border: 1px solid #2494BE;">
	            <div>
	                <a id="Others" class="bg-info white change_picture" style="width:100px; height:20px; padding:3px 6px 3px 6px; font-size: 0.81rem">&nbsp;<i class="fa fa-pencil" aria-hidden="true"></i> Change Picture&nbsp;</a>
	            </div>
	        </div>
		';
	}

	else
	{
		echo
		'
	        <div class="col-md-12 col-sm-12 col-xs-12 pt-2 pb-1" >
	            <img src="'.$cp_pic.'" alt="'.$cp_name.'" style="width:100px; height:120px; border: 1px solid #2494BE;">
	            <div>
	                <a id="exist" class="bg-info white change_picture" style="width:100px; height:20px; padding:3px 6px 3px 6px; font-size: 0.81rem">&nbsp;<i class="fa fa-pencil" aria-hidden="true"></i> Change Picture&nbsp;</a>
	            </div>
	        </div>
		';
	}

?>

<script type="text/javascript">

	//############################### BEGIN EDIT ##############################//
	$('.change_picture').click(function() {
		var id = $(this).attr('id');

		$.ajax({
		    url : 'ecppp',
		    type: 'POST',
		    data : { id: id },
		    success: function(data)
		    {
	    		$("#cp_profile_pic_edit_content").html(data);

	    		$('#cp_profile_pic_edit_content').slideDown(400); //this is actually show
		    }
		});
	});
	//############################### END EDIT ##############################//

</script>