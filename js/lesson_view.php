<?php 
	//include 'header.php';
	require 'header.php';
	require_once('../dbconfig.php');
	global $con;

	$fail=0;
	$current_date=date('Y-m-d');

	$fail=0;
	if(isset($_GET['s_id']) && !empty($_GET['s_id']))
	{
		$sub_id=$_GET['s_id'];
		$query1 = "SELECT subject FROM preparation_sub WHERE id='$sub_id' AND action='Public'";

		if (!$result1 = mysqli_query($con, $query1))
		{
		    exit(mysqli_error($con));
		}
		$subject=NULL;
		while($row1 = mysqli_fetch_assoc($result1))
		{
			$subject=$row1['subject'];
		}					

		$query = "SELECT subject, AD.full_name AS posted_by, PL.id, PL.lesson_title,  PL.created_at  AS posted_at  FROM preparation_lesson PL, preparation_sub PS, admin AD WHERE PL.sub_id='$sub_id' AND PS.id='$sub_id' AND AD.id=PL.posted_by AND PS.action='Public' AND  PL.action='Public' ORDER BY PL.id DESC";

		if (!$result = mysqli_query($con, $query))
		{
		    exit(mysqli_error($con));
		}
	}

	else
	{
		$fail=1;
	}
?>
<!--############################# BEGIN Content Area ###########################-->
<style type="text/css">
	.lesson_hover:hover{
		background-color: #ddd;
	}

</style>
<div class="app-content content ">
  <div class="content-wrapper">
    <div class="content-body">
				
		<div class="row">
			<div class="col-md-12">

				<section id="display-headings" class="card" style="min-height:100vh !important;background-color: #F3F3F3;">
					<div class="card-header bg-white">
						<h4 class="card-title">Total Lesson's: <?php if($fail!=1){ echo mysqli_num_rows($result);} else{echo '0';}?> </h4>
						<div class="heading-elements d-none d-sm-block">
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
						<div class="card-block">
							<?php
							if ($fail!=1)
							{

								if (mysqli_num_rows($result) > 0)
								{
									$x=1;
									while($lesson_data = mysqli_fetch_assoc($result))
									{
										$id 			= $lesson_data['id'];
										$lesson_title	= $lesson_data['lesson_title'];
										$posted_by		= $lesson_data['posted_by'];
										
										list($y, $m, $d) = explode('-', $lesson_data['posted_at']);
										$d=explode(' ',$d);
										$posted_at=$d['0'];
										$posted_at.='-'.$m;
										$posted_at.='-'.$y;
										$posted_at.=' ('.$d['1'].')';

										?>
										<div class="col-xl-12 col-lg-12 col-md-12 col-xs-12 mobile-device">
											<div class="card lesson_hover">
												<div class="card-body">
													<a href="read_lesson?l_id=<?php echo $id; ?>" class="grey">
													<div class="card-block">
														<div class="media">
															<div class="media-body text-xs-left">
																<h3 class="info"><i class="icon-paper"></i> <?php echo $lesson_title; ?></h3>
																<span>By <?php echo $posted_by.' &nbsp;<i class="fa fa-clock-o" aria-hidden="true"></i> '.$posted_at; ?></span>
															</div>
															<div class="media-right media-middle">
																<i class="fa fa-paper-plane-o info font-large-2 float-xs-right"></i>
															</div>
														</div>
													</div>
													</a>
												</div>
											</div>
										</div>
										<?php
									}
								}
								else
								{
									?>
										<p colspan="9" align="center">
											Sorry! No lesson available right now
										</p>
									<?php
								}
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
					</div>
				</section>

			</div>
		</div>
    </div>
  </div>
</div>
<!--/############################# END Content Area ###########################-->
<?php 
	//include 'footer.php';
	require 'footer.php';
?>