<?php 
	session_start();
    if(isset($_SESSION['em_info']))
    {
         header('Location:em/');
    }
    else
    {
		if(isset($_POST['em_subbtn']))
	    {
			require_once('class_library/employer_reg_class.php');
			
			$em_reg_data_insert= new Employer_Registraion;
			$em_error = $em_reg_data_insert->em_reg_data_insert($_POST);
		}


	   	include 'header.php';

	    $query = "SELECT * FROM data_organization_type ORDER BY id ASC";
	    if (!$result = mysqli_query($con, $query))
	    {
	        exit(mysqli_error($con));
	    }

	    $query2 = "SELECT * FROM data_business_category ORDER BY id ASC";
	    if (!$result2 = mysqli_query($con, $query2))
	    {
	        exit(mysqli_error($con));
	    }

	    $query3 = "SELECT * FROM data_job_location ORDER BY id ASC";
	    if (!$result3 = mysqli_query($con, $query3))
	    {
	        exit(mysqli_error($con));
	    }

	}


?>
<!-- ////////////////////////////////////////////////////////////////////////////-->
<main data-open="click" data-menu="vertical-menu" data-col="1-column" class="vertical-layout vertical-menu 1-column  blank-page blank-page">
	<div class="app-content content container-fluid">
		<div class="content-wrapper">
			<div class="content-header row">
			</div>
			<div class="content-body">
				<section class="container pt-3 pb-3">
					<div class="col-xl-6 offset-xl-3 col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-sm-10 offset-sm-1 col-xs-12 box-shadow-2 p-0">
						<div class="card border-grey border-lighten-3 m-0">
							<div class="card-header no-border">
								<div class="card-title text-xs-center">
									<h2 class="text-bold-700 text-success text-lowercase">
										<img src="assets/images/logo/white_logo.png">
									</h2>
								</div>
								<div>
									<?php
									if(isset($em_error['reg_success']))
									{
										?>
										<script type="text/javascript">
                                            $.notify({

                                                // where to append the toast notification
                                                wrapper: 'body',

                                                // toast message
                                                message: '<strong>Congratulations!</strong> <?php echo $em_error['reg_success']; ?>',

                                                // success, info, error, warn
                                                type: 'success',

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
                                        </script>
										<?php
									}

									if(isset($em_error['error']))
									{
										?>
										<script type="text/javascript">
                                            $.notify({

                                                // where to append the toast notification
                                                wrapper: 'body',

                                                // toast message
                                                message: '<strong>Warning!</strong> Problem Found, Check Details Below',

                                                // success, info, error, warn
                                                type: 'warn',

                                                // 1: top-left, 2: top-center, 3: top-right
                                                // 4: mid-left, 5: mid-right
                                                // 6: bottom-left, 7: bottom-center, 8: bottom-right
                                                position: 3,

                                                // or 'rtl'
                                                dir: 'ltr',

                                                // enable/disable auto close
                                                autoClose: true,

                                                // timeout in milliseconds
                                                duration: 5000
                                              
                                            });
                                        </script>
										<?php
									}

				                    if(isset($em_error['db_error']))
                                    {
                                        ?>
										<script type="text/javascript">
                                            $.notify({

                                                // where to append the toast notification
                                                wrapper: 'body',

                                                // toast message
                                                message: '<?php echo $em_error['db_error']; ?>',

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
                                                duration: 5000
                                              
                                            });
                                        </script>
                                        <?php
                                    }
                                    if(isset($em_error['dball_error']))
                                    {
                                        ?>
										<script type="text/javascript">
                                            $.notify({

                                                // where to append the toast notification
                                                wrapper: 'body',

                                                // toast message
                                                message: '<?php echo $em_error['dball_error']; ?>',

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
                                                duration: 5000
                                              
                                            });
                                        </script>
                                        <?php
                                    }
									?>
								</div>

								<h6 class="card-subtitle line-on-side text-muted text-xs-center font-small-3 pt-2"><span>Create Account</span></h6>
							</div>
															
							<div class="card-body collapse in">	
								<div class="card-block">
									<div class="row match-height">
										<h6 class="card-subtitle text-muted text-xs-center font-small-3 pb-1">
											<strong class="text-info">Register As..</strong>
										</h6>

										<div class="col-xl-7 offset-xl-3 col-sm-9 offset-sm-2 col-xs-12 offset-xs-1">
											<div class="btn-group" role="group" aria-label="Basic example">
												<a class="text-info btn btn-secondary pl-2 pl-md-3 pl-xs-3" href="1sup">Job Seeker</a>

												<a class="text-white btn btn-info active" href="0sup">Employer</a>
											</div>
										</div>
										
										<div class="tab-content p-1 col-lg-12 col-md-12 col-sm-12 col-xs-12">
											<div class="card wizard-card" data-color="green">
    											<form id="em_reg_form" class="form" method="post" action="">

                                                    <div class="row">
        												<div class="col-md-12 mt-2">
                                                            <div class="form-group label-floating">
                                                                <label class="control-label">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Enter Your Full Name (Contact Person)</label>
                                                                <div class="position-relative has-icon-left">
																	<input type="text" class="form-control form-control-success form-control-danger" name="full_name" required>
																	<div class="form-control-position">
																		<i class="icon-head"></i>
																	</div>
																	<span class="before check">
			                                                          <i class="material-icons">done</i>
			                                                        </span>
			                                                        <span class="before cross">
			                                                          <i class="material-icons">clear</i>
			                                                        </span>

																	<?php
			                                                        if(isset($em_error['name_error']))
			                                                        {
			                                                            ?>
			                                                            <span class="red">
			                                                                <strong class="font-small-2"> 
			                                                                	<?php echo $em_error['name_error'] ?>
			                                                                </strong>
			                                                            </span>
			                                                            <?php
			                                                        }
			                                                        ?>
																</div>
															</div>
														</div>
													</div>

													<div class="row">
        												<div class="col-md-12 mt-2">
                                                            <div class="form-group label-floating">
                                                                <label class="control-label">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Enter Username (Space not allowed)</label>
                                                                <div class="position-relative has-icon-left">
																	<input type="text" class="form-control form-control-success form-control-danger" name="username" required>
																	<div class="form-control-position">
																		<i class="fa fa-shield" aria-hidden="true"></i>
																	</div>
																	<span class="before check">
			                                                          <i class="material-icons">done</i>
			                                                        </span>
			                                                        <span class="before cross">
			                                                          <i class="material-icons">clear</i>
			                                                        </span>

																	<?php
			                                                        if(isset($em_error['uname_error']))
			                                                        {
			                                                            ?>
			                                                            <span class="red">
			                                                                <strong class="font-small-2"> 
			                                                                	<?php echo $em_error['uname_error'] ?>
			                                                                </strong>
			                                                            </span>
			                                                            <?php
			                                                        }
			                                                        ?>
																</div>
															</div>
														</div>
													</div>

													<div class="row">
        												<div class="col-md-12 mt-2">
                                                            <div class="form-group label-floating">
                                                                <label class="control-label">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Enter Company Name</label>
                                                                <div class="position-relative has-icon-left">
																	<input type="text" class="form-control form-control-success form-control-danger" name="company_name" required>
																	<div class="form-control-position">
																		<i class="icon-office"></i>
																	</div>
																	<span class="before check">
			                                                          <i class="material-icons">done</i>
			                                                        </span>
			                                                        <span class="before cross">
			                                                          <i class="material-icons">clear</i>
			                                                        </span>

																	<?php
			                                                        if(isset($em_error['cname_error']))
			                                                        {
			                                                            ?>
			                                                            <span class="red">
			                                                                <strong class="font-small-2"> 
			                                                                	<?php echo $em_error['cname_error'] ?>
			                                                                </strong>
			                                                            </span>
			                                                            <?php
			                                                        }
			                                                        ?>
																</div>
															</div>
														</div>
													</div>

													<div class="row">
        												<div class="col-md-12 mt-2">
                                                            <div class="form-group label-floating">
                                                                <label class="control-label">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Select Company Type</label>
                                                                <div class="position-relative has-icon-left">
																	<select id="company_type" name="company_type" class="form-control form-control-success form-control-danger" required>
								                                        <option value=""></option>
								                                        <?php
							                                            while ($c_type_data=mysqli_fetch_assoc($result))
							                                            {
							                                                echo
							                                                '
							                                                    <option value="'.$c_type_data['organization_type'].'">'.$c_type_data['organization_type'].'</option>
							                                                ';
							                                            }   
								                                        ?>
								                                    </select>
																	<div class="form-control-position">
																		<i class="fa fa-building"></i>
																	</div>
																	<span class="before check">
			                                                          <i class="material-icons">done</i>
			                                                        </span>
			                                                        <span class="before cross">
			                                                          <i class="material-icons">clear</i>
			                                                        </span>

																	<?php
			                                                        if(isset($em_error['ctype_error']))
			                                                        {
			                                                            ?>
			                                                            <span class="red">
			                                                                <strong class="font-small-2"> 
			                                                                	<?php echo $em_error['ctype_error'] ?>
			                                                                </strong>
			                                                            </span>
			                                                            <?php
			                                                        }
			                                                        ?>
																</div>
															</div>
														</div>
													</div>

													<div class="row">
        												<div class="col-md-12 mt-2">
                                                            <div class="form-group label-floating">
                                                                <label class="control-label">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Select Company Category</label>
                                                                <div class="position-relative has-icon-left">
																	<select id="company_category" name="company_category" class="form-control form-control-success form-control-danger" required>
								                                        <option value=""></option>
								                                        <?php
								                                        while ($c_catg_data=mysqli_fetch_assoc($result2))
								                                        {
								                                            echo
								                                            '
								                                                <option value="'.$c_catg_data['category_name'].'">'.$c_catg_data['category_name'].'</option>
								                                            ';
								                                        }     
								                                        ?>
								                                    </select>
																	<div class="form-control-position">
																		<i class="fa fa-th-list"></i>
																	</div>
																	<span class="before check">
			                                                          <i class="material-icons">done</i>
			                                                        </span>
			                                                        <span class="before cross">
			                                                          <i class="material-icons">clear</i>
			                                                        </span>

																	<?php
			                                                        if(isset($em_error['ccatg_error']))
			                                                        {
			                                                            ?>
			                                                            <span class="red">
			                                                                <strong class="font-small-2"> 
			                                                                	<?php echo $em_error['ccatg_error'] ?>
			                                                                </strong>
			                                                            </span>
			                                                            <?php
			                                                        }
			                                                        ?>
																</div>
															</div>
														</div>
													</div>

													<div class="row">
        												<div class="col-md-12 mt-2">
                                                            <div class="form-group label-floating">
                                                                <label class="control-label">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Select City</label>
                                                                <div class="position-relative has-icon-left">
																	<select id="city" name="city" class="form-control form-control-success form-control-danger" required>
								                                        <option value=""></option>
								                                        <?php
								                                        while ($city_data=mysqli_fetch_assoc($result3))
								                                        {
								                                            echo
								                                            '
								                                                <option value="'.$city_data['location_name'].'">'.$city_data['location_name'].'</option>
								                                            ';
								                                        }      
								                                        ?>
								                                    </select>
																	<div class="form-control-position">
																		<i class="fa fa-road"></i>
																	</div>
																	<span class="before check">
			                                                          <i class="material-icons">done</i>
			                                                        </span>
			                                                        <span class="before cross">
			                                                          <i class="material-icons">clear</i>
			                                                        </span>

																	<?php
			                                                        if(isset($em_error['city_error']))
			                                                        {
			                                                            ?>
			                                                            <span class="red">
			                                                                <strong class="font-small-2"> 
			                                                                	<?php echo $em_error['city_error'] ?>
			                                                                </strong>
			                                                            </span>
			                                                            <?php
			                                                        }
			                                                        ?>
																</div>
															</div>
														</div>
													</div>

													<div class="row">
        												<div class="col-md-12 mt-2">
                                                            <div class="form-group label-floating">
                                                                <label class="control-label">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Enter ZIP Code (Postal Code)</label>
                                                                <div class="position-relative has-icon-left">
																	<input name="zip_code" class="form-control form-control-success form-control-danger" required>
																	<div class="form-control-position">
																		<i class="fa fa-paper-plane-o"></i>
																	</div>
																	<span class="before check">
			                                                          <i class="material-icons">done</i>
			                                                        </span>
			                                                        <span class="before cross">
			                                                          <i class="material-icons">clear</i>
			                                                        </span>

																	<?php
			                                                        if(isset($em_error['zip_code_error']))
			                                                        {
			                                                            ?>
			                                                            <span class="red">
			                                                                <strong class="font-small-2"> 
			                                                                	<?php echo $em_error['zip_code_error'] ?>
			                                                                </strong>
			                                                            </span>
			                                                            <?php
			                                                        }
			                                                        ?>
																</div>
															</div>
														</div>
													</div>

													<div class="row">
        												<div class="col-md-12 mt-2">
                                                            <div class="form-group label-floating">
                                                                <label class="control-label">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Enter Compnay Location</label>
                                                                <div class="position-relative has-icon-left">
																	<input type="text" name="location" class="form-control form-control-success form-control-danger" id="js-email" name="location" required>
																	<div class="form-control-position">
																		<i class="fa fa-map-marker"></i>
																	</div>
																	<span class="before check">
			                                                          <i class="material-icons">done</i>
			                                                        </span>
			                                                        <span class="before cross">
			                                                          <i class="material-icons">clear</i>
			                                                        </span>

																	<?php
			                                                        if(isset($em_error['location_error']))
			                                                        {
			                                                            ?>
			                                                            <span class="red">
			                                                                <strong class="font-small-2"> 
			                                                                	<?php echo $em_error['location_error'] ?>
			                                                                </strong>
			                                                            </span>
			                                                            <?php
			                                                        }
			                                                        ?>
																</div>
															</div>
														</div>
													</div>

													<div class="row">
        												<div class="col-md-12 mt-2">
                                                            <div class="form-group label-floating">
                                                                <label class="control-label">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Enter Mobile Number</label>
                                                                <div class="position-relative has-icon-left">
																	<input type="text" class="form-control form-control-success form-control-danger" name="mobile_number" required>
																	<div class="form-control-position">
																		<i class="fa fa-phone"></i>
																	</div>
																	<span class="before check">
			                                                          <i class="material-icons">done</i>
			                                                        </span>
			                                                        <span class="before cross">
			                                                          <i class="material-icons">clear</i>
			                                                        </span>

																	<?php
			                                                        if(isset($em_error['mobile_error']))
			                                                        {
			                                                            ?>
			                                                            <span class="red">
			                                                                <strong class="font-small-2"> 
			                                                                	<?php echo $em_error['mobile_error'] ?>
			                                                                </strong>
			                                                            </span>
			                                                            <?php
			                                                        }
			                                                        ?>
																</div>
															</div>
														</div>
													</div>

													<div class="row">
        												<div class="col-md-12 mt-2">
                                                            <div class="form-group label-floating">
                                                                <label class="control-label">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Enter Email Address</label>
                                                                <div class="position-relative has-icon-left">
																	<input type="email" class="form-control form-control-success form-control-danger" name="email" required>
																	<div class="form-control-position">
																		<i class="icon-mail6"></i>
																	</div>
																	<span class="before check">
			                                                          <i class="material-icons">done</i>
			                                                        </span>
			                                                        <span class="before cross">
			                                                          <i class="material-icons">clear</i>
			                                                        </span>

																	<?php
			                                                        if(isset($em_error['email_error']))
			                                                        {
			                                                            ?>
			                                                            <span class="red">
			                                                                <strong class="font-small-2"> 
			                                                                	<?php echo $em_error['email_error'] ?>
			                                                                </strong>
			                                                            </span>
			                                                            <?php
			                                                        }
			                                                        ?>
																</div>
															</div>
														</div>
													</div>

													<div class="row">
        												<div class="col-md-12 mt-2">
                                                            <div class="form-group label-floating">
                                                                <label class="control-label">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Enter Password (Minimum 6 Characters)</label>
                                                                <div class="position-relative has-icon-left">
																	<input type="password" class="form-control form-control-success form-control-danger" name="password" required>
																	<div class="form-control-position">
																		<i class="icon-key22"></i>
																	</div>
																	<span class="before check">
			                                                          <i class="material-icons">done</i>
			                                                        </span>
			                                                        <span class="before cross">
			                                                          <i class="material-icons">clear</i>
			                                                        </span>

																	<?php
			                                                        if(isset($em_error['pass_error']))
			                                                        {
			                                                            ?>
			                                                            <span class="red">
			                                                                <strong class="font-small-2"> 
			                                                                	<?php echo $em_error['pass_error'] ?>
			                                                                </strong>
			                                                            </span>
			                                                            <?php
			                                                        }
			                                                        ?>
																</div>
															</div>
														</div>
													</div>

													<div class="row">
        												<div class="col-md-12 mt-2">
                                                            <div class="form-group label-floating">
                                                                <label class="control-label">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Enter Confirm Password</label>
                                                                <div class="position-relative has-icon-left">
																	<input type="password" class="form-control form-control-success form-control-danger" name="password_confirm" required>
																	<div class="form-control-position">
																		<i class="icon-key22"></i>
																	</div>
																	<span class="before check">
			                                                          <i class="material-icons">done</i>
			                                                        </span>
			                                                        <span class="before cross">
			                                                          <i class="material-icons">clear</i>
			                                                        </span>

																	<?php
			                                                        if(isset($em_error['cpass_error']))
			                                                        {
			                                                            ?>
			                                                            <span class="red">
			                                                                <strong class="font-small-2"> 
			                                                                	<?php echo $em_error['cpass_error'] ?>
			                                                                </strong>
			                                                            </span>
			                                                            <?php
			                                                        }
			                                                        ?>
																</div>
															</div>
														</div>
													</div>

													<button type="submit" name="em_subbtn" class="btn btn-info btn-lg btn-block mt-2"><i class="icon-unlock2"></i> Register
													</button>
												</form>
											</div>
										</div>
									</div>
								</div>
								<p class="text-xs-center">Already have an account ? <a href="0sin" class="card-link">Login</a></p>
							</div>
						</div>
					</div>
				</section>
			</div>
		</div>
	</div>
</main>
<!-- ////////////////////////////////////////////////////////////////////////////-->

<script type="text/javascript">
	//############################# BEGIN Form Validation ###########################//
	$('#em_reg_form').bootstrapValidator({

        fields:
        {
            full_name: 
            {
                message: 'Contact Person Name is not valid',
                validators: {
                    notEmpty: {
                        message: 'Contact Person Name is required and cannot be empty'
                    },
                    stringLength: {
                        min: 2,
                        max: 50,
                        message: 'Contact Person Name must be between 2 to 50 characters'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z() \.]+$/,
                        message: 'Contact Person Name can only consist of alphabetical, space, dot and parenthesis'
                    },
                    remote: {
                        type: 'POST',
                        url: '0/rmt',
                        message: 'You entered a vulgar word'
                    }
                }
            },

            username: 
            {
                message: 'Username is not valid',
                validators: {
                	notEmpty: {
                        message: 'Username is required and cannot be empty'
                    },
                    stringLength: {
                        min: 3,
                        max: 50,
                        message: 'Username must be be between 3 to 50 characters'
                    },
                    regexp: {
                        regexp: /^[a-z0-9&._-]+$/,
                        message: 'Username can only consist of small letters, digits, dot, ampersand, underscore or hyphen'
                    },
                    remote: {
                        type: 'POST',
                        url: '0/rmt',
                        delay: 1500
                    }
                }
            },

            company_name: 
            {
                message: 'Company name is not valid',
                validators: {
                    notEmpty: {
                        message: 'Company name is required and cannot be empty'
                    },
                    stringLength: {
                        min: 6,
                        max: 250,
                        message: 'Company name must be more then one word and 5 letters'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9/.& ()\-]+$/,
                        message: 'Company name can only consist of alphabetical, number, space, dot, hyphen, ampersand and parenthesis'
                    },
                    remote: {
                        type: 'POST',
                        url: '0/rmt',
                        message: 'You entered a vulgar word'
                    }
                }
            },

            company_type: 
            {
                message: 'Company type is not valid',
                validators: {
                    notEmpty: {
                        message: 'Company type is required and cannot be empty'
                    },
                    stringLength: {
                        min: 0,
                        max: 50,
                        message: 'Don\'t try to be smart!'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z/() &.\-]+$/,
                        message: 'Don\'t try to be smart!'
                    },
                    choice: {
                        min: 1,
                        max: 1,
                        message: 'Don\'t try to be smart! You can choose maximum 1 option'
                    }
                }
            },

            company_category: 
            {
                message: 'Company category is not valid',
                validators: {
                    notEmpty: {
                        message: 'Company category is required and cannot be empty'
                    },
                    stringLength: {
                        min: 0,
                        max: 50,
                        message: 'Don\'t try to be smart!'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9/() &.\-]+$/,
                        message: 'Don\'t try to be smart!'
                    },
                    choice: {
                        min: 1,
                        max: 1,
                        message: 'Don\'t try to be smart! You can choose maximum 1 option'
                    }
                }
            },

             city: 
             {
                validators: {
                    notEmpty: {
                        message: 'City is required and cannot be empty'
                    },
                    stringLength: {
                        min: 0,
                        max: 20,
                        message: 'Don\'t try to be smart!'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z ]+$/,
                        message: 'Don\'t try to be smart!'
                    },
                    choice: {
                        min: 1,
                        max: 1,
                        message: 'Don\'t try to be smart! You can choose maximum 1 option'
                    }
                }
            },

            zip_code: 
            {
                validators: {
                    notEmpty: {
                        message: 'ZIP code is required and cannot be empty'
                    },
                    digits: {
                        message: 'ZIP code can only consist of digits'
                    }
                }
            },

            location: 
            {
                message: 'Location is not valid',
                validators: {
                	notEmpty: {
                        message: 'Location is required and cannot be empty'
                    },
                    stringLength: {
                        min: 6,
                        max: 500,
                        message: 'Location can be between 6 to 500 characters'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9/#_() ;:,&+.\-]+$/,
                        message: 'Location can only consist of alphabetical, space, number, hash, comma, dot, underscore, colon, semi-colon, hyphen, plus sign, ampersand(&), backslash & paranthesis'
                    },
                    remote: {
                        type: 'POST',
                        url: '0/rmt',
                        message: 'You entered a vulgar word'
                    }
                }
            },

            mobile_number: 
            {
                message: 'Mobile Number is not valid',
                validators: {
                    notEmpty: {
                        message: 'Mobile Number is required and cannot be empty'
                    },
                    stringLength: {
                        min: 11,
                        max: 15,
                        message: 'Mobile Number must be between 11 to 15 characters'
                    },
                    regexp: {
                        regexp: /^[0-9+ -]+$/,
                        message: 'Mobile Number can only consist of digit, space, hyphen & plus(+) sign'
                    }
                }
            },

            email: 
            {
                message: 'Email address is not valid',
                validators: {
                	notEmpty: {
                        message: 'Email address is required and cannot be empty'
                    },
                	emailAddress: {
                        message: 'The input is not a valid email address'
                    },
                    remote: {
	                    type: 'POST',
	                    url: '0/rmt',
                        delay: 1500
                	}
                }
            },

            password: 
            {
                message: 'Password is not valid',
                validators: {
                	notEmpty: {
                        message: 'Password is required and cannot be empty'
                    },
                    stringLength: {
                        min: 6,
                        max: 50,
                        message: 'Password must be in one word & in between 6-50 characters'
                    }
                }
            },

            password_confirm: 
            {
                message: 'Confirm password is not valid',
                validators: {
                	notEmpty: {
                        message: 'Confirm password is required and cannot be empty'
                    },
                    stringLength: {
                        min: 6,
                        max: 50,
                        message: 'Confirm password must be in one word & in between 6-50 characters'
                    },
                    identical: {
                        field: 'password',
                        message: 'Confirm password is not the same as password'
                    }
                }
            }

        }
    });
    //############################# END Form Validation ###########################//
</script>

<?php 
	include 'footer.php';
?>		
