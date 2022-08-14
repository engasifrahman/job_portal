<?php
    session_start();
	require_once('../dbconfig.php');
	global $con;

    $js_id = $_SESSION['js_info']['id'];

	$l_id = $_POST['l_id'];

	if(empty($l_id))
	{
		?>
			<div class="center"> Something is wrong please try again later <a href="#" onclick="$('#lesson_comment').hide();">HIDE THIS</a>
			</div>
		<?php
		die();
	}

	$query = "SELECT * FROM lesson_comment WHERE l_id='$l_id' AND action='Active' ORDER BY commented_at ASC";
	if (!$result = mysqli_query($con, $query))
    {
	    exit(mysqli_error($con));
	}

	?>

	<div class="col-md-12 col-sm-12 col-xs-12 mobile-device">

		<div class="card wizard-card" data-color="blue">
		<!--        You can switch " data-color="rose" "  with one of the next bright colors: "blue", "green", "orange", "purple"        -->
		    <form id="add_comment_form" class="form" method="post" action="" >
		        
		        <div class="form-body">

		            <div class="row">

		                <div class="col-md-12 col-sm-12 col-xs-12 pt-3">
			                <div class="col-md-1 col-sm-1 col-xs-2" style="padding: 0px !important">
			                  <span class="avatar avatar-online">
			                    <?php
			                      $name=$_SESSION['js_info']['name'];
			                      $gender=$_SESSION['js_info']['gender'];
			                      $picture=$_SESSION['js_info']['picture'];

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
			                </div>

		                    <div class="col-md-9 col-sm-11 col-xs-10 form-group label-floating mobile-device">
		                        <label class="control-label">Your comment</label>
		                        <textarea id="comment" name="comment" class="form-control form-control-success form-control-danger" style="height: 32px;"></textarea>
		                        <span class="before check">
		                          <i class="material-icons">done</i>
		                        </span>
		                        <span class="before cross">
		                          <i class="material-icons">clear</i>
		                        </span>
		                    </div>

		                     <div class="col-md-2 col-sm-12 col-xs-12 text-right text-xs-right mobile-device">
					            <button type="submit" class="btn btn-outline-primary" name="comment_add" disabled>
					                <i class="icon-check2"></i> Comment
					            </button>
				        	</div>
		                </div>

		            </div>
		        </div>
		    </form>
		</div>
	</div>

	<?php
    if (mysqli_num_rows($result) > 0)
    {
		?>
    	<div class="col-md-12 col-xs-12 mobile-device" style="margin:10px 0px; padding: 5px 0px; border-top: 1px solid #ddd; border-bottom: 1px solid #ddd;">
    		<?php echo 'Comment\'s: '.mysqli_num_rows($result); ?>
    	</div>
    	<?php
    	while($row = mysqli_fetch_assoc($result))
    	{
    		$id				=$row['id'];
    		$c_id			=$row['c_id'];
    		$status			=$row['status'];
    		$comment 		=$row['comment'];
    		$commented_at 	=$row['commented_at'];

    		list($y, $m, $d) = explode('-', $row['commented_at']);
			$d=explode(' ',$d);
			$commented_at=$d['0'];
			$commented_at.='-'.$m;
			$commented_at.='-'.$y;
			$commented_at.=' ('.$d['1'].')';

    		if ($status=='User')
    		{
    			$query2 = "SELECT full_name, gender, pic_dir FROM job_seeker WHERE id='$c_id'";
				if (!$result2 = mysqli_query($con, $query2))
			    {
				    exit(mysqli_error($con));
				}

				if (mysqli_num_rows($result2) > 0)
			    {

			    	while($row2 = mysqli_fetch_assoc($result2))
			    	{
			    		$name		=$row2['full_name'];
			    		$gender 	=$row2['gender'];
			    		$picture 	=$row2['pic_dir'];
			    		?>
			    		<div class="col-md-12 mobile-device">
				    		<div class="col-md-1 col-sm-1 col-xs-2 mobile-device">
			                  <span class="avatar">
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
			                </div>

			                <div class="col-md-11 col-sm-11 col-xs-10 mb-1 mobile-device">
			                	<?php
			                	if ($c_id==$js_id)
			                	{
			                		?>
			                		<div class="col-md-10 col-sm-10 col-xs-8 font-small-1 mobile-device">
			                			<?php echo '<b>'.$name.'</b> &nbsp; <i class="fa fa-clock-o" aria-hidden="true"></i> '.$commented_at; ?>
			                		</div>

				                	<div class="col-md-2 col-sm-2 col-xs-4 text-right comment_action">
				                		<a id="<?php echo $row['id']; ?>" class="comment_edit" title="Edit"> 
					                        <i class="fa fa-pencil-square-o fa-lg text-info"></i>&nbsp;
					                    </a>

										<a id="<?php echo $row['id']; ?>"  class="comment_delete" title="Delete"> 
					                        <i class="fa fa-trash-o fa-lg text-danger"></i>
					                    </a>
				                	</div>


				                	<div class="col-md-12 col-sm-12 col-xs-12 card wizard-card" data-color="blue" id="comment_edit_form<?php echo $row['id']; ?>" style="display: none">
									<!--        You can switch " data-color="rose" "  with one of the next bright colors: "blue", "green", "orange", "purple"        -->
									    <form id="edit_comment_form<?php echo $row['id']; ?>" class="form edit_comment_form" method="post" action="" >
									        
									        <div class="form-body">

									            <div class="row">
									                <div class="col-md-12 col-sm-12 col-xs-12 pt-2">
									                    <div class="col-md-9 col-sm-12 col-xs-12 form-group label-floating mobile-device">
									                        <label class="control-label">Edit comment</label>
									                        <textarea id="comment" name="comment" class="form-control form-control-success form-control-danger" style="height: 32px;"><?php echo $comment; ?></textarea>
									                        <span class="before check">
									                          <i class="material-icons">done</i>
									                        </span>
									                        <span class="before cross">
									                          <i class="material-icons">clear</i>
									                        </span>
									                    </div>

									                     <div class="col-md-3 col-sm-12 col-xs-12 text-right" style="padding: 0px !important">
									                     	<button type="reset" class="btn btn-outline-warning mr-1" onclick="$('#comment_edit_form<?php echo $row['id']; ?>').slideUp(400);$('#comment_box<?php echo $row['id']; ?>').slideDown(400);$('.comment_action').show();">
									                            <i class="icon-cross2"></i> Cancel
									                        </button>
												            <button type="submit" class="btn btn-outline-primary" name="comment_update" id="<?php echo $row['id']; ?>" disabled >
												                <i class="icon-check2"></i> Update
												            </button>
											        	</div>
									                </div>
									            </div>

									        </div>
									    </form>
									</div>
					                <?php
			                	}
			                	else
			                	{
			                		?>
			                		<div class="col-md-12 col-sm-12 col-xs-12 font-small-1 mobile-device">
			                			<?php echo '<b>'.$name.'</b> &nbsp; <i class="fa fa-clock-o" aria-hidden="true"></i> '.$commented_at; ?>
			                		</div>
			                		<?php
			                	}
			                	?>
			                	<div class="col-md-12 col-sm-12 col-xs-12 mobile-device" id="comment_box<?php echo $row['id']; ?>"><?php echo $comment; ?></div>
			                </div>
			            </div>
			    		<?php
			    	}
			    }
    		}

    		elseif ($status=='Admin')
    		{
    			$query3 = "SELECT full_name, gender, pic_dir FROM admin WHERE id='$c_id'";
				if (!$result3 = mysqli_query($con, $query3))
			    {
				    exit(mysqli_error($con));
				}

				if (mysqli_num_rows($result3) > 0)
			    {

			    	while($row3 = mysqli_fetch_assoc($result3))
			    	{
			    		$name		=$row3['full_name'];
			    		$gender 	=$row3['gender'];
			    		$picture 	=$row3['pic_dir'];
			    		?>
			    		<div class="col-md-12 mobile-device">
				    		<div class="col-md-1 col-sm-1 col-xs-2 mobile-device">
			                  <span class="avatar">
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
			                </div>

			                <div class="col-md-11 col-sm-11 col-xs-10 mb-1 mobile-device">

		                		<div class="col-md-12 col-sm-12 col-xs-12 font-small-1 mobile-device">
		                			<span class="tag tag-default round">
		                				<?php echo $name; ?> <i class="fa fa-star" aria-hidden="true"></i> 
		                			</span>
		                			<span>
		                				&nbsp; <i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo $commented_at; ?>
		                			</span>
		                		</div>

			                	<div class="col-md-12 col-sm-12 col-xs-12 mobile-device" id="comment_box<?php echo $row['id']; ?>"><?php echo $comment; ?></div>
			                </div>
			            </div>
			    		<?php
			    	}
			    }
    		}

    	}
    }
    else
    {
        echo 
        '	<div class="clearfix"></div>
            <div class="text-warning text-center text-xs-center border no-border-left no-border-right">
            	No one has commented yet
            </div>
        ';
    }
?>

<script type="text/javascript">
	//############################### BEGIN ADD ##############################//
    $('button[name="comment_add"]').click(function(e){
    	var l_id='<?php echo $l_id; ?>';
    	var action = 'Add';

        $.ajax({
            type: 'post',
            url: 'comment_oparation',   // here your php file to do something with postdata
            data: $('#add_comment_form').serialize() + "&l_id=" + l_id + "&action=" + action,
            success: function (data) {
              $('#comment_view').show().html(data);
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
    //############################### END ADD ##############################//

   	//############################### BEGIN EDIT ##############################//
	$('.comment_edit').click(function() {
		var id = $(this).attr('id');

		$('.comment_action').hide();
		$('#comment_box'+id).slideUp(400);
		$('#comment_edit_form'+id).slideDown(400);
	});
	//############################### END EDIT ##############################//

    //############################### BEGIN UPDATE ##############################//
    $('button[name="comment_update"]').click(function(e){
    	var id = $(this).attr('id');
    	var l_id = '<?php echo $l_id; ?>';
    	var action = 'Update';

        $.ajax({
            type: 'post',
            url: 'comment_oparation',   // here your php file to do something with postdata
            data: $('#edit_comment_form'+id).serialize() + "&l_id=" + l_id + "&id=" + id + "&action=" + action, // here you set the data to send to php file
            success: function (data) {
              $('#comment_view').show().html(data);
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

      e.stopImmediatePropagation();

    });
    //############################### END UPDATE ##############################//

    //############################### BEGIN DELETE ##############################//
	$('.comment_delete').click(function() {
		var id = $(this).attr('id');
		var l_id = '<?php echo $l_id; ?>';
    	var action = 'Delete';

		$.ajax({
		    url : "comment_oparation",
		    type: "POST",
		    data : { id:id, l_id:l_id, action:action },
		    success: function(data)
		    {
		    	$('#comment_view').show().html(data);
		    }
		});
	});
	//############################### END DELETE ##############################//

    //############################# BEGIN Form Validation ###########################//
    $('#add_comment_form').bootstrapValidator({

        fields:
        {
            comment: 
            {
                message: 'Comment is not valid',
                validators: {
                    stringLength: {
                        min: 0,
                        max: 500,
                        message: 'Comment can be maximum 500 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9/~!@$%><|^*+={}[#_();:''"",&+ .\-\n\?\]]+$/,
                        message: 'This special character is not allowed'
                    },
                    remote: {
                        type: 'POST',
                        url: 'rmt',
                        message: 'You entered a vulgar word'
                    }
                }
            }
        }
    });

    $('.edit_comment_form').bootstrapValidator({

        fields:
        {
            comment: 
            {
                message: 'Comment is not valid',
                validators: {
                    stringLength: {
                        min: 0,
                        max: 500,
                        message: 'Comment can be maximum 500 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9/~!@$%><|^*+={}[#_();:''"",&+ .\-\n\?\]]+$/,
                        message: 'This special character is not allowed'
                    },
                    remote: {
                        type: 'POST',
                        url: 'rmt',
                        message: 'You entered a vulgar word'
                    }
                }
            }
        }
    });
    //############################# END Form Validation ###########################//
</script>

<script src="../assets/js/material-bootstrap-wizard/jquery.bootstrap.js" type="text/javascript"></script>
<!--  Plugin for the Wizard -->
<script src="../assets/js/material-bootstrap-wizard/material-bootstrap-wizard.js"></script>
<!--  More information about jquery.validate here: http://jqueryvalidation.org/  -->
<script src="../assets/js/material-bootstrap-wizard/jquery.validate.min.js"></script>