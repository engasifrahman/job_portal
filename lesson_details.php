<?php
	require 'header.php';
	require_once('dbconfig.php');
	global $con;

	$l_id=$_GET['l_id'];

	$query = "SELECT lesson_title, lesson_content, posted_by, PL.created_at AS posted_at, PL.updated_at AS updated_at, subject  FROM preparation_lesson PL, preparation_sub PS WHERE PL.id='$l_id' AND PS.id=sub_id AND PL.action='Public' AND PS.action='Public'";

	if (!$result = mysqli_query($con, $query))
	{
	    exit(mysqli_error($con));
	}

?>
<!--############################# BEGIN Content Area ###########################-->

<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-body">
        	<?php
        	if (mysqli_num_rows($result) > 0)
		    {
		    	while ($l_data=mysqli_fetch_assoc($result))
		    	{
		    		$subject		=$l_data['subject'];
		    		$lesson_title	=$l_data['lesson_title'];
		    		$lesson_content	=$l_data['lesson_content'];
		    		$posted_by		=$l_data['posted_by'];

		    		list($y, $m, $d) = explode('-', $l_data['posted_at']);
					$d=explode(' ',$d);
					$posted_at=$d['0'];
					$posted_at.='-'.$m;
					$posted_at.='-'.$y;
					$posted_at.=' ('.$d['1'].')';

	    			$query2 = "SELECT full_name AS posted_by  FROM admin WHERE id='$posted_by'";

					if (!$result2 = mysqli_query($con, $query2))
					{
					    exit(mysqli_error($con));
					}
					while ($ad_data=mysqli_fetch_assoc($result2))
	    			{
	    				$posted_by	=$ad_data['posted_by'];
	    			}
		    	}
		    	?>
		    	
	            <!--################################ BEGIN Lesson Details ################################-->
	            <div class="row">
	                <div class="col-md-12 col-sm-12 col-xs-12">
	                    <div class="card">
	                        <div class="card-header text-left">
	                            <h4 class="card-title info">
	                            	<span class="text-left"><i class="icon-paper"></i> <?php echo $lesson_title; ?></span>
	                            </h4>
	                            <div class="heading-elements">
									<ul class="list-inline mb-0">
										<li>
											<h4 class="card-title">
												<i class="fa fa-book card-title black" aria-hidden="true"></i> <?php echo $subject; ?>
											</h4>
										</li>
									</ul>
								</div>
	                        </div>
	                        <div class="card-body collapse in">
	                            <div class="card-block custom-card-block">
	                                <div class="col-md-12 col-sm-12 col-xs-12">

	                                	<div class="col-md-12 col-sm-12 col-xs-12 mb-2">
	                                		<small class="orange bg-white">
	                                			By <?php echo $posted_by.' &nbsp; <i class="fa fa-clock-o" aria-hidden="true"></i> '.$posted_at; ?>
	                                		</small>
	                                	</div>

	                                	<div class="col-md-12 col-sm-12 col-xs-12">
                                			<div class="fr-view">
												<?php echo $lesson_content; ?>
                                			</div>
	                                	</div>
										
	                                	<div class="col-md-12 col-sm-12 col-xs-12 mb-3 mt-2" id="comment_view" style="border-top: 1px solid #ddd; "></div>

	                            	</div>
	                        	</div>
	                    	</div>
	                	</div>
	            	</div>
	            </div>
	            <!--################################ END Lesson Details ################################-->

	            <script type="text/javascript">
				    //##################### BEGIN Lesson Comment Control #####################//
				    var l_id='<?php echo $l_id; ?>';

				    $.post("comment_view",{l_id:l_id},function(data) {
				        $("#comment_view").html(data);
				    });
				    //###################### END Lesson Comment Control ######################//
				</script>

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
						message: 'Data not found please try again later',

						// success, info, error, warn
						type: 'error',

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
    </div>
</div>
<!--############################# END Content Area ###########################-->
<?php 
	//include 'footer.php';
	require 'footer.php';
?>