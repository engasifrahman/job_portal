<?php 
	include 'header.php';

	require_once('dbconfig.php');
	global $con;

	$current_date=date('Y-m-d');

	$query1 = "SELECT * FROM data_job_category order by id ASC";
    if (!$result1 = mysqli_query($con, $query1)) 
    {
            exit(mysqli_error($con));
    }

    $query2 = "SELECT * FROM data_job_location";
    if (!$result2 = mysqli_query($con, $query2)) {
            exit(mysqli_error($con));
    }

    $query3 = "SELECT * FROM data_business_category order by id ASC";
    if (!$result3 = mysqli_query($con, $query3)) 
    {
            exit(mysqli_error($con));
    }

    $query7 = "SELECT * FROM data_organization_type order by id ASC";
    if (!$result7 = mysqli_query($con, $query7)) 
    {
            exit(mysqli_error($con));
    }
?>
				
    <!--############################# BEGIN Content Area ###########################-->
	<style type="text/css">
	  .selectize-input {
	      min-height: 28px !important;
	      max-height: 28px !important;
	  }
	</style>
    <div class="app-content content  ">

		<div id="-example-caption" class="carousel slide" data-ride="carousel">
			<div class="carousel-inner" role="listbox">
				<div class="carousel-item active">
					<img src="assets/images/intro-carousel/1.jpg" alt="First slide">
					<div class="carousel-caption hidden-sm-down">
						<!--<h3>First Slide Label</h3>
						<p>Jujubes I love brownie gummi bears I love donut sweet chocolate.</p>-->
					</div>
				</div>
				<div class="carousel-item">
					<img src="assets/images/intro-carousel/2.jpg" alt="Second slide">
					<div class="carousel-caption hidden-sm-down">
						<!--<h3>Second Slide Label</h3>
						<p>Chocolate bar jelly caramels jujubes chocolate cake gummies.</p>-->
					</div>
				</div>
				<div class="carousel-item">
					<img src="assets/images/intro-carousel/3.jpg" alt="Third slide">
					<div class="carousel-caption hidden-sm-down">
						<!--<h3>Third Slide Label</h3>
						<p>Chocolate bar sweet tiramisu cheesecake chocolate cotton candy pastry muffin.</p>-->
					</div>
				</div>
			</div>
		</div>

      <div class="content-wrapper">
        <div class="content-body">

        	<div class="row">

				<div class="col-md-12 mb-2">
					<nav class="col-md-12 navbar navbar-light bg-white mobile-device pt-1 pb-1">
						<div class="card wizard-card" data-color="green">
						  	<form method="get" action="job_list" class="form">

								<div class="col-md-5">
								  	<div class="form-group label-floating mb-0">
	                                	<label class="control-label">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Keywords</label>
								  		<div class="position-relative has-icon-left"> 
									  		<input type="text" id="keywords" name="keywords" class="form-control" multiple>
								  			<div class="form-control-position">
												<i class="fa fa-tags" aria-hidden="true"></i>
											</div>
										 </div>
								  	</div>
							  	</div>

							  	<div class="col-md-2">
								  	<div class="form-group label-floating mb-0">
	                                	<label class="control-label">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Job Nature</label>
										<div class="position-relative has-icon-left"> 
										    <select name="job_nature" class="form-control ">
										    	<option value=""></option>
										    	<option value="Full Time">Full Time</option>
										    	<option value="Part Time">Part Time</option>
										    	<option value="Contractual">Contractual</option>
										    	<option value="Internship">Internship</option>
										    
										    </select>
										    <div class="form-control-position">
												<i class="icon-briefcase2"></i>
											</div>
										</div>
			 						</div>
		 						</div>

							  	<div class="col-md-3">
								  	<div class="form-group label-floating mb-0">
	                                	<label class="control-label">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Organization Type</label>
										<div class="position-relative has-icon-left"> 
										    <select name="org_type" class="form-control ">
										    	<option value=""></option>
										    	<?php
										    	while($data7 = mysqli_fetch_assoc($result7))
						                        {
										    		echo '<option value="'.$data7['organization_type'].'">'.$data7['organization_type'].'</option>';
										    	}
										    	?>
										    </select>
										    <div class="form-control-position">
												<i class="fa fa-building-o" aria-hidden="true"></i>
											</div>
										</div>
			 						</div>
		 						</div>

		 						<div class="col-md-2 text-xs-center mobile-device">
			 						<div class="form-group mb-0">
								    	<button name="job_search" class="search-btn btn btn-sm btn-info" type="submit"><i class="icon-search5"></i>
								     		<b>Search</b>
								     	</button> 
								 	</div>
								</div>

							</form>
						</div>
					</nav>
				</div>

        		<div class="col-md-12">
					<div class="card">
						<div class="card-header">
	 
							<h4 class="card-title info text-bold-900 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center"><b>Category Job Listing</b></h4>
						</div>
						<div class="card-body collapse in">
							<div class="card-block custom-card-block pb-1">

								<div class="col-md-6 col-sm-6 col-xs-12">

									<div class="pt-1 text-bold-700 font-medium-3 deep-orange text-xs-center  text-sm-center text-md-center text-lg-center text-xl-center">
										Functional Category
									</div>

									<hr>
									<?php 
									if (mysqli_num_rows($result1) > 0)
                                	{
                                		$total_matched1=0;
	                                    while($data1 = mysqli_fetch_assoc($result1))
	                                    {
	                                    	$j_category_id=$data1['id'];
	                                    	$j_category_name=$data1['category_name'];

											$query4 = "SELECT id FROM circular_post AS CP, employer AS EM WHERE em_id=id AND CP.action='Active' AND EM.action='Active' AND application_deadline >= '$current_date' AND job_category='$j_category_name'";
											if (!$result4 = mysqli_query($con, $query4))
											{
												exit(mysqli_error($con));
											}
											if (mysqli_num_rows($result4) > 0)
											{
	
												$total_matched1=mysqli_num_rows($result4);
											}
											else
											{
												$total_matched1=0;
											}

	                                    	echo 
	                                    	'
											<div class="col-md-6 col-sm-12 col-xs-12">
												<i class="fa fa-angle-right text-bold-800 deep-orange" aria-hidden="true"></i>
												<a href="job_list?jc_id='.$j_category_id.'" class="black">
													<span class="font-small-3">'.$j_category_name.'<span class="deep-orange">('.$total_matched1.')</span></span>
												</a>
											</div>
											';
										}
										$total_matched1=0;
									}
	                                else
	                                {
	                                    echo '<div class="text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">SORRY! Functional Category Not Available Right Now</div>';
	                                }
                                    ?>

								</div>



								<div class="col-md-6 col-sm-6 col-xs-12" style="border-left:1px solid #E5E5E5 !important;">

									<div class="pt-1 text-bold-700 font-medium-3 deep-orange text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
										Location Category
									</div>

									<hr>
									<?php 
									if (mysqli_num_rows($result2) > 0)
                                	{
                                		$total_matched2=0;
	                                    while($data2 = mysqli_fetch_assoc($result2))
	                                    {
	                                    	$location_id=$data2['id'];
	                                    	$location_name=$data2['location_name'];

											$query5 = "SELECT id FROM circular_post AS CP, employer AS EM WHERE em_id=id AND CP.action='Active' AND EM.action='Active' AND application_deadline >= '$current_date' AND job_location='$location_name'";
											if (!$result5 = mysqli_query($con, $query5))
											{
												exit(mysqli_error($con));
											}
											if (mysqli_num_rows($result5) > 0)
											{
	
												$total_matched2=mysqli_num_rows($result5);
											}
											else
											{
												$total_matched2=0;
											}

	                                    	echo 
	                                    	'
											<div class="col-md-3 col-sm-6 col-xs-6">
												<i class="fa fa-angle-right text-bold-800 deep-orange" aria-hidden="true"></i>
												<a href="job_list?l_id='.$location_id.'" class="black">
													<span class="font-small-3">'.$location_name.'<span class="deep-orange">('.$total_matched2.')</span></span>
												</a>
											</div>
											';
										}
										$total_matched2=0;
									}
	                                else
	                                {
	                                    echo '<div class="text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">SORRY! Functional Category Not Available Right Now</div>';
	                                }
                                    ?>

								</div>


								<div class="col-md-12 col-sm-12 col-xs-12">

									<hr>
									<div class="text-bold-700 font-medium-3 deep-orange text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
										Industry Category
									</div>
									<hr>

									<?php 
									if (mysqli_num_rows($result3) > 0)
                                	{
                                		$total_matched3=0;
	                                    while($data3 = mysqli_fetch_assoc($result3))
	                                    {
	                                    	$b_category_id=$data3['id'];
	                                    	$b_category_name=$data3['category_name'];

											$query6 = "SELECT id FROM circular_post AS CP, employer AS EM WHERE em_id=id AND CP.action='Active' AND EM.action='Active' AND application_deadline >= '$current_date' AND company_category='$b_category_name'";
											if (!$result6 = mysqli_query($con, $query6))
											{
												exit(mysqli_error($con));
											}
											if (mysqli_num_rows($result6) > 0)
											{
	
												$total_matched3=mysqli_num_rows($result6);
											}
											else
											{
												$total_matched3=0;
											}

	                                    	echo 
	                                    	'
											<div class="col-md-3 col-sm-6 col-xs-12">
												<i class="fa fa-angle-right text-bold-800 deep-orange" aria-hidden="true"></i>
												<a href="job_list?bc_id='.$b_category_id.'" class="black">
													<span class="font-small-3">'.$b_category_name.'<span class="deep-orange">('.$total_matched3.')</span></span>
												</a>
											</div>
											';
										}
										$total_matched3=0;
									}
	                                else
	                                {
	                                    echo '<div class="text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">SORRY! Industry Category Not Available Right Now</div>';
	                                }
                                    ?>

								</div>

							</div>
						</div>
					</div>
				</div>

			</div>

			<div class="socialnav hidden-md-down">
			  <a href="#" class="one facebook"> <i class="fa fa-facebook padd" aria-hidden="true"></i>Facebook</a>
			  <a href="#" class="two twitter"> <i class="fa fa-twitter padd" aria-hidden="true"></i>Twitter</a>
			  <a href="#" class="three youtube"> <i class="fa fa-youtube padd" aria-hidden="true"></i>Youtube</a>
			  <a href="contact" class="four contact"> <i class="fa fa-phone padd" aria-hidden="true"></i>Contact</a>
			</div>

        </div>
      </div>
    </div>
	<!--/############################# END Content Area ###########################-->

<script type="text/javascript">

    //############################# BEGIN Form Validation ###########################//
    var REG=/^[a-z\d\-_()/&*\s]+$/i;
    $('#keywords').selectize({
        plugins: ['remove_button','drag_drop'],
        maxItems:15,
        persist: false,
        create: true,
        createFilter:REG,
        render: {
            item: function(data, escape) {
                return '<div>' + escape(data.text) + '</div>';
            }
        }
    });
    //############################# END Form Validation ###########################//

</script>

<?php 
	include 'footer.php';
?>		

