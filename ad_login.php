<?php 
	session_start();
	if(isset($_SESSION['ad_info']))
	{
		header('Location:109/');
	}

    else if(isset($_POST['ad_login']))
    {
        $email_or_uname=$_POST['ad_email_or_uname'];
        $password=$_POST['ad_password'];

        if(filter_var($_POST['ad_email_or_uname'],FILTER_VALIDATE_EMAIL) || strlen($_POST['ad_email_or_uname'])>=3 && strlen($_POST['ad_email_or_uname'])<=50 && preg_match('/^[a-z0-9._-]*$/',$_POST['ad_email_or_uname']))
        {
            if (strlen($_POST['ad_password'])>=6 && strlen($_POST['ad_password'])<=50 && str_word_count($_POST['ad_password'])<=1)
            {
                require_once('class_library/admin_access_class.php');
                $ad_login = new admin_Access;
                $ad_error=$ad_login->admin_login($_POST);

                //echo '<br>';
                //print_r($ad_error);
                //echo $ad_error['pass_error'];
            }
            else
            {

                $error = 'Password field supports minimum 6 characters';
            }

        }
        else
        {

            $error = 'Please fill out Email/Username fields correctly';
        }
        /*
        echo '<br><br><pre>';
        var_export($_POST);
        echo '</pre>';
        echo 'Hello';
        */
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
    									
                                        <div>
                                            <?php
                                            if(isset($error))
                                            {
                                                ?>
                                                <script type="text/javascript">
                                                $.notify({

                                                    // where to append the toast notification
                                                    wrapper: 'body',

                                                    // toast message
                                                    message: '<?php echo $error; ?>',

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
                                            if(isset($ad_error['action_error']))
                                            {
                                                ?>
                                                <script type="text/javascript">
                                                $.notify({

                                                    // where to append the toast notification
                                                    wrapper: 'body',

                                                    // toast message
                                                    message: '<?php echo $ad_error['action_error']; ?>',

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
    								</div>
    								<h6 class="card-subtitle line-on-side text-muted text-xs-center font-small-3 pt-2"><span>Login Panel</span></h6>
    							</div>
    							<div class="card-body collapse in">
    								<div class="card-block py-0">
    									<div class="row match-height">
    										<div class="tab-content col-lg-12 col-md-12 col-sm-12 col-xs-12">

                                                <div class="card wizard-card" data-color="green">
                                                    <form id="ad_login_form" class="form" method="post" action="">

                                                        <div class="row">
                                                            <div class="col-md-12 mt-2 mb-1">
                                                                <div class="form-group label-floating">
                                                                    <label class="control-label">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Enter Your Email/Username</label>
                                                                    <div class="position-relative has-icon-left">
                                                                        <input type="text" class="form-control form-control-success form-control-danger" name="ad_email_or_uname"required>
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
                                                                        if(isset($ad_error['email_error']))
                                                                        {
                                                                            ?>
                                                                            <span class="red">
                                                                                <strong class="font-small-2">  
                                                                                    <?php echo $ad_error['email_error'] ?>
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
                                                            <div class="col-md-12 mt-1 mb-2">
                                                                <div class="form-group label-floating">
                                                                    <label class="control-label">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Enter Your Password</label>
                                                                    <div class="position-relative has-icon-left">
                                                                        <input type="password" class="form-control form-control-success form-control-danger" name="ad_password" required>
                                                                        <div class="form-control-position">
                                                                            <i class="fa fa-unlock"></i>
                                                                        </div>
                                                                        <span class="before check">
                                                                          <i class="material-icons">done</i>
                                                                        </span>
                                                                        <span class="before cross">
                                                                          <i class="material-icons">clear</i>
                                                                        </span>

                                                                        <?php
                                                                        if(isset($ad_error['pass_error']))
                                                                        {
                                                                            ?>
                                                                            <span class="red">
                                                                                <strong class="font-small-2">  
                                                                                    <?php echo $ad_error['pass_error'] ?>
                                                                                </strong>
                                                                            </span>
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <button type="submit" name="ad_login" class="btn btn-info btn-lg btn-block"><i class="icon-unlock2"></i> Login
                                                        </button>

                                                    </form>
                                                </div>

    										</div>
    									</div>
    								</div>
    								<p class="text-xs-center mb-1">New to <span class="text-bold-700 text-info text-lowercase">www.jobskillbd.com</span>?&nbsp;<a href="ad_register.php" class="card-link">Sign Up</a></p>
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
        $('#ad_login_form').bootstrapValidator({

            fields:
            {

                ad_email_or_uname: 
                {
                    message: 'Email/Username is not valid',
                    validators: {
                        notEmpty: {
                            message: 'Email/Username is required and cannot be empty'
                        }
                    }
                },

                ad_password: 
                {
                    message: 'Password is not valid',
                    validators: {
                        notEmpty: {
                            message: 'Password is required and cannot be empty'
                        },
                        stringLength: {
                            min: 6,
                            max: 30,
                            message: 'Password must be more than 5 and less than 30 characters long'
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
