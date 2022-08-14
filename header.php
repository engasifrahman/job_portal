<?Php 
	require_once('dbconfig.php');
	global $con;

	date_default_timezone_set("Asia/Dhaka");

	$query = "SELECT id, subject FROM preparation_sub WHERE action='Public' ORDER BY id ASC";

	if (!$result = mysqli_query($con, $query))
	{
	exit(mysqli_error($con));
	}
?>
<!DOCTYPE html>
<html lang="en" >
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
	  
		<title>jobskillbd.com</title>

		<!--BEGIN title icon photo link-->
	    <link rel="apple-touch-icon" sizes="60x60" href="assets/images/ico/favicon.png">
	    <link rel="apple-touch-icon" sizes="76x76" href="assets/images/ico/favicon.png">
	    <link rel="apple-touch-icon" sizes="120x120" href="assets/images/ico/favicon.png">
	    <link rel="apple-touch-icon" sizes="152x152" href="assets/images/ico/favicon.png">
	    <link rel="shortcut icon" type="image/x-icon" href="assets/images/ico/favicon.png">
	    <link rel="shortcut icon" type="image/png" href="assets/images/ico/favicon.png">
		<!--/END title icon photo link-->
		  
		<!--BEGIN Font-icon css-->
		<link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">
		<link rel="stylesheet" type="text/css" href="assets/css/icomoon.css">
		<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
		<!--END font icons-->
		
		<!-- BEGIN VENDOR CSS-->
		<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="assets/vendors/css/extensions/pace.css">
		<link rel="stylesheet" type="text/css" href="assets/css/drawer.css">
		<link rel="stylesheet" type="text/css" href="assets/css/animate.css">
		<link rel="stylesheet" type="text/css" href="assets/css/bootstrapValidator.css">
		<link rel="stylesheet" href="assets/css/selectize.bootstrap4.css">
		<!-- END VENDOR CSS-->
		
	    <!-- Toast-Notification-Notify  -->
	    <link rel="stylesheet" href="assets/css/jquery.notify.css">

	    <!-- material-bootstrap-wizard  -->
	    <link rel="stylesheet" href="assets/css/material-bootstrap-wizard.css">

		<!-- BEGIN ROBUST CSS-->
		<link rel="stylesheet" type="text/css" href="assets/css/bootstrap-extended.css">
		<link rel="stylesheet" type="text/css" href="assets/css/app.css">
		<!-- END ROBUST CSS-->
		
		<!-- BEGIN Page Level CSS-->
		<link rel="stylesheet" type="text/css" href="assets/css/pages/login-register.css">
		<!-- END Page Level CSS-->

		<!-- BEGIN Froala Editor -->
		<link rel="stylesheet" href="assets/css/froala/froala_editor.css">
    	<link rel="stylesheet" href="assets/css/froala/froala_style.css">
    	<!-- END Froala Editor -->

		<script src="assets/js/core/libraries/jquery.min.js" type="text/javascript"></script>
		<script src="assets/js/core/libraries/jqueryui.js" type="text/javascript"></script>
		<script src="assets/js/Toast-Notification-Notify/jquery.notify.js"></script>
		<script src="assets/vendors/js/ui/tether.min.js" type="text/javascript"></script>
		<script src="assets/js/core/libraries/bootstrap.min.js" type="text/javascript"></script>
		<script src="assets/js/core/libraries/bootstrapValidator.js" type="text/javascript"></script>
		<script src="assets/js/selectize/standalone/selectize.min.js"></script>

		<!-- BEGIN CUSTOM CSS-->
		<link rel="stylesheet" type="text/css" href="assets/css/custom_drawer.css">
		<link rel="stylesheet" type="text/css" href="assets/css/custom_intro.css">
		<!-- END CUSTOM CSS-->

		<link rel="stylesheet" type="text/css" href="assets/css/colors.css">

		
	</head>
	
	<body>
		<header class="drawer drawer--left drawer--navbarTopGutter">
			<div class="drawer-navbar drawer-navbar--fixed" role="banner">
				<div class="drawer-container">
					<div class="drawer-navbar-header">
						<a class="drawer-brand text-success" href="/jobskillbd.com"><img src="assets/images/logo/white_logo.png"></a>
						<button type="button" class="drawer-toggle drawer-hamburger">
						<span class="sr-only">toggle navigation</span>
						<span class="drawer-hamburger-icon"></span>
						</button>
					</div>

					<nav class="drawer-nav" role="navigation">
						<ul class="drawer-menu drawer-menu--center">
							<li class="hidden-lg-up salign">
								<a class="padd2 padd3 facebook" href="index.html"><i class="fa fa-facebook" aria-hidden="true"></i></a>
								<a class="padd2 twitter" href="index.html"><i class="fa fa-twitter" aria-hidden="true"></i></a>
								<a class="padd2 youtube" href="index.html"><i class="fa fa-youtube" aria-hidden="true"></i></a>
								<a class="padd2 contact" href="index.html"><i class="fa fa-phone" aria-hidden="true"></i></a>
							</li>

							<li>
								<a class="drawer-menu-item <?php if(basename($_SERVER['PHP_SELF'])=='index.php')
								{ echo 'active'; } ?>" href="/jobskillbd.com">
								<i class="fa fa-home space hidden-lg-up"></i>Home</a>
							</li>
							<li>
								<a class="drawer-menu-item <?php if(basename($_SERVER['PHP_SELF'])
								=='about_us.php'){ echo 'active'; } ?>" href="about">
								<i class="fa fa-info-circle space hidden-lg-up"></i>About Us</a>
							</li>
							<li>
								<a class="drawer-menu-item <?php if(basename($_SERVER['PHP_SELF'])
								=='contact_us.php'){ echo 'active'; } ?>" href="contact">
								<i class="fa fa-phone space hidden-lg-up"></i>Contact Us</a>
							</li>
							<li class="drawer-dropdown">
								<a class="drawer-menu-item <?php if(basename($_SERVER['PHP_SELF'])=='lesson_view.php' || basename($_SERVER['PHP_SELF'])=='lesson_details.php'){ echo 'active'; } ?>" data-target="#" href="#" data-toggle="dropdown" role="button" aria-expanded="false">
									<i class="icon-stack space hidden-lg-up"></i>Job Preparation <span class="drawer-caret"></span>
								</a>
								<ul class="drawer-dropdown-menu animated fadeInLeft">
									<?php
						            if (mysqli_num_rows($result) > 0)
						            {
						              while($row = mysqli_fetch_assoc($result))
						              {
						                ?>
										<li>
											<a class="drawer-dropdown-menu-item" href="lesson_list?s_id=<?php echo $row['id']; ?>">
											<i class="fa fa-book" aria-hidden="true"></i> <?php echo $row['subject']; ?>
											</a>
										</li>
										<?php
						              }
						            }
						            else
						            {
						              ?>
						              <li><a href="#" class="menu-item">No post available right now</a></li>
						              <?php
						            }
						            ?>
								</ul>
							</li>
							<li>
								<a class="drawer-menu-item 
								<?php 
									if(basename($_SERVER['PHP_SELF'])=='js_register.php')
									{
										echo 'active'; 
									}
									else if(basename($_SERVER['PHP_SELF'])=='em_register.php')
									{
										echo 'active'; 
									} 
								?>" 
								href="1sup">
								<i class="fa fa-pencil-square-o space hidden-lg-up"></i>Register</a>
							</li>
							<li>
								<a class="drawer-menu-item 
								<?php 
									if(basename($_SERVER['PHP_SELF'])=='js_login.php')
									{
										echo 'active'; 
									}
									else if(basename($_SERVER['PHP_SELF'])=='em_login.php')
									{
										echo 'active'; 
									} 
								?>" 
								href="1sin">
								<i class="fa  fa-sign-in space hidden-lg-up"></i>login</a>
							</li>
						</ul>
					</nav>
				</div>
			</div>
		</header>
