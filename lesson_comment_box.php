<?php
	require_once('dbconfig.php');
	global $con;

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

        <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12 text-center text-xs-left" style="padding-top: 10px;">
           		<span>
	    			<a href="1sin">
		    			<button type="submit" class="btn btn-info btn-sm">
							<i class="fa fa-sign-in" aria-hidden="true"></i> login to comment 
			            </button>
		            </a>
	    		</span>
            </div>

        </div>

	</div>

	<?php
    if (mysqli_num_rows($result) > 0)
    {
		?>
    	<div class="col-md-12 col-xs-12 mobile-device" style="margin:10px 0px; padding: 5px 0px; border-top: 1px solid #ddd; border-bottom: 1px solid #ddd;"><?php echo 'Comment\'s: '.mysqli_num_rows($result); ?>
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
			                          <img src="images/demo/male.png" style="width:60px;height:30px;float:right;" class="avatar-bg" alt="avatar">
			                        ';
			                      }

			                      elseif ($picture=='not_defined_yet' && $gender=='Female')
			                      {
			                        echo
			                        '
			                          <img src="images/demo/female.png" style="width:60px;height:30px;float:right;" class="avatar-bg" alt="avatar">
			                        ';
			                      }

			                      elseif ($picture=='not_defined_yet' && $gender=='Others')
			                      {
			                        echo
			                        '
			                          <img src="images/demo/others.png" style="width:60px;height:30px;float:right;" class="avatar-bg" alt="avatar">
			                        ';
			                      }

			                      else
			                      {
			                      	$picture	=explode('../', $picture);
			            			$picture	=$picture[1];
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
		                			<?php echo '<b>'.$name.'</b> &nbsp; <i class="fa fa-clock-o" aria-hidden="true"></i> '.$commented_at; ?>
		                		</div>

			                	<div class="col-md-12 col-sm-12 col-xs-12 mobile-device" id="comment_box<?php echo $row['id']; ?>"><?php echo $comment; ?>
			                	</div>
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
			                          <img src="images/demo/male.png" style="width:60px;height:30px;float:right;" class="avatar-bg" alt="avatar">
			                        ';
			                      }

			                      elseif ($picture=='not_defined_yet' && $gender=='Female')
			                      {
			                        echo
			                        '
			                          <img src="images/demo/female.png" style="width:60px;height:30px;float:right;" class="avatar-bg" alt="avatar">
			                        ';
			                      }

			                      elseif ($picture=='not_defined_yet' && $gender=='Others')
			                      {
			                        echo
			                        '
			                          <img src="images/demo/others.png" style="width:60px;height:30px;float:right;" class="avatar-bg" alt="avatar">
			                        ';
			                      }

			                      else
			                      {
			                      	$picture=explode('../', $picture);
			                      	$picture=$picture[1];
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
            <div class="mt-1 text-warning text-center text-xs-center border no-border-left no-border-right">
            	No one has commented yet
            </div>
        ';
    }
?>