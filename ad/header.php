<?php
    session_start();
  if(! $_SESSION['ad_info'])
  {
    header('Location: ../');
  }

  $name=$_SESSION['ad_info']['name'];
  $gender=$_SESSION['ad_info']['gender'];
  $picture=$_SESSION['ad_info']['picture'];

  date_default_timezone_set("Asia/Dhaka");
?>
<!DOCTYPE html>
<html lang="en" data-textdirection="ltr" class="loading">
  <head>
  
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Robust admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, robust admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
	
    <title>jobskillbd.com</title>
	
  	<!--BEGIN title icon photo link-->
    <link rel="apple-touch-icon" sizes="60x60" href="../assets/images/ico/favicon.png">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/images/ico/favicon.png">
    <link rel="apple-touch-icon" sizes="120x120" href="../assets/images/ico/favicon.png">
    <link rel="apple-touch-icon" sizes="152x152" href="../assets/images/ico/favicon.png">
    <link rel="shortcut icon" type="image/x-icon" href="../assets/images/ico/favicon.png">
    <link rel="shortcut icon" type="image/png" href="../assets/images/ico/favicon.png">
  	<!--/END title icon photo link-->
  	
    <!--##################### BEGIN Page Style Link ###################-->	
   
   	<!--BEGIN Font-icon css-->
    <link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/icomoon.css">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  	<!--END font icons-->
  	
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../assets/vendors/css/extensions/pace.css">
    <!-- END VENDOR CSS-->
    <link rel="stylesheet" href="../assets/css/selectize.bootstrap4.css">

    <!-- Material Design Bootstrap -->
    <link href="../assets/css/mdb.min.css" rel="stylesheet">
    <!-- MDBootstrap Datatables  -->
    <link href="../assets/css/addons/datatables.min.css" rel="stylesheet">

    <!-- Toast-Notification-Notify  -->
    <link href="../assets/css/jquery.notify.css" rel="stylesheet">

    <!-- material-bootstrap-wizard  -->
    <link href="../assets/css/material-bootstrap-wizard.css" rel="stylesheet" />

    <!-- BEGIN Froala Editor -->
    <link rel="stylesheet" href="../assets/css/froala/froala_editor.min.css">
    <link rel="stylesheet" href="../assets/css/froala/froala_style.min.css">
    <link rel="stylesheet" href="../assets/css/froala/plugins/code_view.css">
    <link rel="stylesheet" href="../assets/css/froala/plugins/draggable.css">
    <link rel="stylesheet" href="../assets/css/froala/plugins/colors.css">
    <link rel="stylesheet" href="../assets/css/froala/plugins/emoticons.css">
    <link rel="stylesheet" href="../assets/css/froala/plugins/image_manager.css">
    <link rel="stylesheet" href="../assets/css/froala/plugins/image.css">
    <link rel="stylesheet" href="../assets/css/froala/plugins/line_breaker.css">
    <link rel="stylesheet" href="../assets/css/froala/plugins/table.css">
    <link rel="stylesheet" href="../assets/css/froala/plugins/char_counter.css">
    <link rel="stylesheet" href="../assets/css/froala/plugins/video.css">
    <link rel="stylesheet" href="../assets/css/froala/plugins/fullscreen.css">
    <link rel="stylesheet" href="../assets/css/froala/plugins/file.css">
    <link rel="stylesheet" href="../assets/css/froala/plugins/quick_insert.css">
    <link rel="stylesheet" href="../assets/css/froala/plugins/help.css">
    <link rel="stylesheet" href="../assets/css/froala/third_party/spell_checker.css">
    <link rel="stylesheet" href="../assets/css/froala/plugins/special_characters.css">

    <!-- Include all Editor plugins CSS style. -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.css">

    <link rel="stylesheet" href="../assets/css/froala/froala_editor.pkgd.min.css">
    <!-- END Froala Editor -->

    <!-- BEGIN ROBUST CSS-->
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/app.css">
    <!-- END ROBUST CSS-->

    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="../assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/core/menu/menu-types/vertical-overlay-menu.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/core/colors/palette-gradient.css">
    <!-- END Page Level CSS-->

    <script src="../assets/js/core/libraries/jquery.min.js" type="text/javascript"></script>
    <script src="../assets/js/jquery-cookie/jquery.cookie.js" type="text/javascript"></script>
    <script src="../assets/js/core/libraries/jqueryui.js" type="text/javascript"></script>
    <script src="../assets/js/Toast-Notification-Notify/jquery.notify.js"></script>
    <script src="../assets/vendors/js/ui/tether.min.js" type="text/javascript"></script>
    <script src="../assets/js/core/libraries/bootstrap.min.js" type="text/javascript"></script>
    <script src="../assets/js/core/libraries/bootstrapValidator.js" type="text/javascript"></script>
    <script src="../assets/js/selectize/standalone/selectize.min.js" type="text/javascript"></script>

    <link rel="stylesheet" type="text/css" href="../assets/css/resume&cover_letter.css">

    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="../assets/css/custom_cpanel.css">
    <!-- END Custom CSS-->

    <link rel="stylesheet" type="text/css" href="../assets/css/colors.css">

  	<!--/##################### END Page Style Link ###################-->
	
  </head>
  
  <body data-open="click" data-menu="vertical-menu" data-col="2-columns" class="vertical-layout vertical-menu 2-columns  fixed-navbar">

    <!--##################### BEGIN navbar-fixed-top ###################-->
    <nav class="header-navbar navbar navbar-with-menu navbar-fixed-top navbar-semi-dark navbar-shadow">
      <div class="navbar-wrapper">
        <div class="navbar-header">
          <ul class="nav navbar-nav">
            <li class="nav-item mobile-menu hidden-md-up float-xs-left">
				<a class="nav-link nav-menu-main menu-toggle hidden-xs">
					<i class="icon-menu5 font-large-1"></i>
				</a>
			</li>
            <li class="nav-item">
				<a href="/jobskillbd.com/109/" class="navbar-brand nav-link">
					<img data-expand="../assets/images/logo/black_logo.png" 
					data-collapse="../assets/images/logo/small-logo.png" class="brand-logo">
				</a>
			</li>
          </ul>
        </div>
        <div class="navbar-container content container-fluid">
          <div>
            <ul class="nav navbar-nav">
              <li class="nav-item hidden-sm-down"><a class="nav-link nav-menu-main menu-toggle hidden-xs"><i class="icon-menu5"></i></a></li>
            </ul>
            <ul class="nav navbar-nav float-xs-right">

              <li class="dropdown dropdown-user nav-item" id="adinfo_before_edit">

                <a data-toggle="dropdown" class="dropdown-toggle nav-link dropdown-user-link">
                  <span class="avatar avatar-online">
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
                    <i></i>
                  </span>
                  <span class="user-name"><?php echo $name; ?></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right">

                  <a href="stng" class="dropdown-item <?php if(basename($_SERVER['PHP_SELF'])=='settings.php'){ echo 'active'; } ?>">
                      <i class="icon-cog"></i> Settings
                  </a>

                  <a href="sout?ad_logout=ad_logout" class="dropdown-item <?php if(basename($_SERVER['PHP_SELF'])=='logout.php'){ echo 'active'; } ?>">
                      <i class="icon-power3"></i> Logout
                    </a>

                </div>

              </li>

              <li class="dropdown dropdown-user nav-item" id="adinfo_after_edit" style="display:none;"></li>
            </ul>
          </div>
        </div>
      </div>
    </nav>
	<!--/##################### END navbar-fixed-top ###################-->

    <!--##################### BEGIN main menu #########################-->
    <div data-scroll-to-active="true" class="main-menu menu-fixed menu-dark menu-accordion menu-shadow">

      <!-- main menu content-->
      <div class="main-menu-content">
        <ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">
		   <!-- <li class=" navigation-header"></li> -->
          <li class="nav-item <?php if(basename($_SERVER['PHP_SELF'])=='index.php'){ echo 'active'; } ?>">
            <a href="/jobskillbd.com/109/">
              <i class="fa fa-home"></i>
              <span class="menu-title">Home</span>
            </a>
          </li>
		  
          <li class="nav-ite <?php if(basename($_SERVER['PHP_SELF'])=='js_list.php' || basename($_SERVER['PHP_SELF'])=='js_details.php'){ echo 'active'; } ?>">
            <a href="ljs">
              <i class="fa fa-graduation-cap"></i>
              <span class="menu-title">Job Seeker List</span>
            </a>
          </li>

          <li class="nav-ite <?php if(basename($_SERVER['PHP_SELF'])=='em_list.php'){ echo 'active'; } ?>">
            <a href="lem">
             <i class="icon-android-person" aria-hidden="true"></i>
              <span class="menu-title">Employer List</span>
            </a>
          </li>

		      <li class="nav-ite <?php if(basename($_SERVER['PHP_SELF'])=='post_list.php'){ echo 'active'; } ?>">
            <a href="lpost">
              <i class="icon-briefcase2"></i>
              <span class="menu-title">Circular List</span>
            </a>
          </li>

          <li class="nav-ite <?php if(basename($_SERVER['PHP_SELF'])=='job_preparation.php' || basename($_SERVER['PHP_SELF'])=='lesson_details.php'){ echo 'active'; } ?>">
            <a href="preparation">
              <i class="icon-stack"></i>
              <span class="menu-title">Job Preparation</span>
            </a>
          </li>

          <li class="nav-item <?php if(basename($_SERVER['PHP_SELF'])=='settings.php'){ echo 'active'; } ?>">
            <a href="stng">
              <i class="icon-cog"></i>
              <span class="menu-title">Settings</span>
            </a>
          </li>
		  
          <li class="nav-item <?php if(basename($_SERVER['PHP_SELF'])=='logout.php'){ echo 'active'; } ?>">
            <a href="sout?ad_logout=ad_logout">
              <i class="icon-exit"></i>
              <span class="menu-title">Sign Out</span>
            </a>
          </li>

        </ul>
      </div>
      <!-- /main menu content-->

    </div>
    <!--/##################### END main menu #########################-->