<?php 
	session_start();	
	if(isset($_SESSION['js_info']))
	{
		header('Location:js/');
	}
	else if(isset($_POST['js_subbtn']))
	{
		require_once('class_library/job_seeker_reg_class.php');
		
		$js_reg_data_insert= new Job_Seeker_Registraion;
		$js_error = $js_reg_data_insert->js_reg_data_insert($_POST);

	}
	include 'header.php';
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
									if(isset($js_error['reg_success']))
									{
										?>
										<script type="text/javascript">
                                            $.notify({

                                                // where to append the toast notification
                                                wrapper: 'body',

                                                // toast message
                                                message: '<strong>Congratulations!</strong> <?php echo $js_error['reg_success']; ?>',

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

									if(isset($js_error['error']))
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

				                    if(isset($js_error['db_error']))
                                    {
                                        ?>
										<script type="text/javascript">
                                            $.notify({

                                                // where to append the toast notification
                                                wrapper: 'body',

                                                // toast message
                                                message: '<?php echo $js_error['db_error']; ?>',

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

									if(isset($js_error['dball_error']))
                                    {
                                        ?>
										<script type="text/javascript">
                                            $.notify({

                                                // where to append the toast notification
                                                wrapper: 'body',

                                                // toast message
                                                message: '<?php echo $js_error['dball_error']; ?>',

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
												<a class="text-white btn btn-info active pl-2 pl-md-3 pl-xs-3" href="1sup">Job Seeker</a>

												<a class="text-info btn btn-secondary" href="0sup">Employer</a>
											</div>

										</div>

										<div class="tab-content p-1 col-lg-12 col-md-12 col-sm-12 col-xs-12">
											<div class="card wizard-card" data-color="green">
    											<form id="js_reg_form" class="form" method="post" action="">

                                                    <div class="row">
        												<div class="col-md-12 mt-2">
                                                            <div class="form-group label-floating">
                                                                <label class="control-label">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Enter Full Name</label>
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
		                                                            if(isset($js_error['name_error']))
		                                                            {
		                                                                ?>
		                                                                <span class="red">
		                                                                    <strong class="font-small-2">  
		                                                                    	<?php echo $js_error['name_error'] ?>
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
		                                                            if(isset($js_error['uname_error']))
		                                                            {
		                                                                ?>
		                                                                <span class="red">
		                                                                    <strong class="font-small-2">  
		                                                                    	<?php echo $js_error['uname_error'] ?>
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
                                                                <label class="control-label">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Enter Date of Birth</label>
                                                                <div class="position-relative has-icon-left">
																	<input type="date" class="form-control form-control-success form-control-danger" name="dob" required>
																	<div class="form-control-position">
																		<i class="fa fa-birthday-cake"></i>
																	</div>
																	<span class="before check">
											                          <i class="material-icons">done</i>
											                        </span>
											                        <span class="before cross">
											                          <i class="material-icons">clear</i>
											                        </span>
																	<?php
		                                                            if(isset($js_error['dob_error']))
		                                                            {
		                                                                ?>
		                                                                <span class="red">
		                                                                    <strong class="font-small-2">  
		                                                                    	<?php echo $js_error['dob_error'] ?>
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
                                                                <label class="control-label">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Select Gender</label>
                                                                <div class="position-relative has-icon-left">
																	<select name="gender" class="form-control form-control-success form-control-danger" required>
																		<option value=""></option>
																		<option value="Male">Male</option>
																		<option value="Female">Female</option>
																	</select>
																	<div class="form-control-position">
																		<i class="fa fa-venus-mars"></i>
																	</div>
																	<span class="before check">
											                          <i class="material-icons">done</i>
											                        </span>
											                        <span class="before cross">
											                          <i class="material-icons">clear</i>
											                        </span>

																	<?php
		                                                            if(isset($js_error['gender_error']))
		                                                            {
		                                                                ?>
		                                                                <span class="red">
		                                                                    <strong class="font-small-2">  
		                                                                    	<?php echo $js_error['gender_error'] ?>
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
                                                                <label class="control-label">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Enter Mobile No</label>
                                                                <div class="position-relative has-icon-left">
																	<input type="text" class="form-control form-control-success form-control-danger" name="mobile_number" required>
																	<div class="form-control-position">
																		<i class="fa fa-mobile fa-lg"></i>
																	</div>
																	<span class="before check">
											                          <i class="material-icons">done</i>
											                        </span>
											                        <span class="before cross">
											                          <i class="material-icons">clear</i>
											                        </span>

																	<?php
		                                                            if(isset($js_error['mobile_error']))
		                                                            {
		                                                                ?>
		                                                                <span class="red">
		                                                                    <strong class="font-small-2">  
		                                                                    	<?php echo $js_error['mobile_error'] ?>
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
		                                                            if(isset($js_error['email_error']))
		                                                            {
		                                                                ?>
		                                                                <span class="red">
		                                                                    <strong class="font-small-2">  
		                                                                    	<?php echo $js_error['email_error'] ?>
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
		                                                            if(isset($js_error['pass_error']))
		                                                            {
		                                                                ?>
		                                                                <span class="red">
		                                                                    <strong class="font-small-2">  
		                                                                    	<?php echo $js_error['pass_error'] ?>
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
																	<input type="password" class="form-control form-control-success form-control-danger" id="js-confirm-password" name="password_confirm" placeholder="" required>
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
		                                                            if(isset($js_error['cpass_error']))
		                                                            {
		                                                                ?>
		                                                                <span class="red">
		                                                                    <strong class="font-small-2">  
		                                                                    	<?php echo $js_error['cpass_error'] ?>
		                                                                    </strong>
		                                                                </span>
		                                                                <?php
		                                                            }
			                                                        ?>
																</div>
															</div>
														</div>
													</div>

													<button type="submit" name="js_subbtn" class="btn btn-info btn-lg btn-block mt-2"><i class="icon-unlock2"></i> Register</button>
												</form>
											</div>
										</div>
									</div>
								</div>
								<p class="text-xs-center">Already have an account ? <a href="1sin" class="card-link">Login</a></p>
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
	$('#js_reg_form').bootstrapValidator({

        fields:
        {
            full_name: 
            {
                message: 'Full Name is not valid',
                validators: {
                    notEmpty: {
                        message: 'Full Name is required and cannot be empty'
                    },
                    stringLength: {
                        min: 2,
                        max: 50,
                        message: 'Full Name must be between 2 to 50 characters'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z() \.]+$/,
                        message: 'Full Name can only consist of alphabetical, space, dot and parenthesis'
                    },
                    remote: {
                        type: 'POST',
                        url: '1/rmt',
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
                        message: 'Username must be between 3 to 50 characters'
                    },
                    regexp: {
                        regexp: /^[a-z0-9&._-]+$/,
                        message: 'Username can only consist of small letters, digits, dot, ampersand, underscore or hyphen'
                    },
                    remote: {
                        type: 'POST',
                        url: '1/rmt',
                        delay: 1500
                    }
                }
            },

            dob: 
            {
                message: 'Date of birth is not valid',
                validators: {
                    notEmpty: {
                        message: 'Date of birth is required and cannot be empty'
                    },
                    date: {
                        format: 'YYYY/MM/DD',
                        message: 'Date of birth is not valid'
                    }
                }
            },

            gender: 
            {
                validators: {
                    notEmpty: {
                        message: 'Gender is required and cannot be empty'
                    },
                    stringLength: {
                        min: 3,
                        max: 10,
                        message: 'Gender must be between 3 to 10 characters'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z]+$/,
                        message: 'Gender can only consist of alphabetical'
                    },
                    choice: {
                        min: 1,
                        max: 1,
                        message: 'Please choose one option only'
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
	                    url: '1/rmt',
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
                        message: 'Password must be between 6 to 50 characters'
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
                        message: 'Confirm password must be between 6 to 50 characters'
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
