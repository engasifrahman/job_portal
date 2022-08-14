<?php
	session_start();
	require_once('../dbconfig.php');
	global $con;

  $name=$_SESSION['js_info']['name'];
  $gender=$_SESSION['js_info']['gender'];
  $picture=$_SESSION['js_info']['picture'];


	if ($picture=='not_defined_yet' && $gender=='Male')
	{
		echo
		'
	        <div class="col-md-12 col-sm-12 col-xs-12 pt-2 pb-1">
	            <img src="../images/demo/male.png" alt="'.$name.'" style="width:100px;height:100px;border: 1px solid #2494BE;">
	            <div>
	                <a id="Male" class="bg-info white change_picture" style="width:100px; height:20px; padding:3px 6px 3px 6px; font-size: 0.81rem">&nbsp;<i class="fa fa-pencil" aria-hidden="true"></i> Change Picture&nbsp;</a>
	            </div>
	        </div>
		';
	}

	elseif ($picture=='not_defined_yet' && $gender=='Female')
	{
		echo
		'
	        <div class="col-md-12 col-sm-12 col-xs-12 pt-2 pb-1" >
	            <img src="../images/demo/female.png" alt="'.$name.'" style="width:100px;height:100px;border: 1px solid #2494BE;">
	            <div>
	                <a id="Female" class="bg-info white change_picture" style="width:100px; height:20px; padding:3px 6px 3px 6px; font-size: 0.81rem">&nbsp;<i class="fa fa-pencil" aria-hidden="true"></i> Change Picture&nbsp;</a>
	            </div>
	        </div>
		';
	}

	elseif ($picture=='not_defined_yet' && $gender=='Others')
	{
		echo
		'
	        <div class="col-md-12 col-sm-12 col-xs-12 pt-2 pb-1" >
	            <img src="../images/demo/others.png" alt="'.$name.'" style="width:100px;height:100px;border: 1px solid #2494BE;">
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
	            <img src="'.$picture.'" alt="'.$name.'" style="width:100px;height:120px;border: 1px solid #2494BE;">
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
		    url : 'epp',
		    type: 'POST',
		    data : { id: id },
		    success: function(data)
		    {
	    		$("#profile_pic_edit_content").html(data);

	    		$('#profile_pic_edit_content').slideDown(400); //this is actually show
		    }
		});
	});
	//############################### END EDIT ##############################//

</script>