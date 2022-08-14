<?php
  session_start();
  require_once('../dbconfig.php');
  global $con;

  if(! $_SESSION['js_info'])
  {
    header('Location: ../js_login.php');
  }
  
  $name=$_SESSION['js_info']['name'];
  $gender=$_SESSION['js_info']['gender'];
  $picture=$_SESSION['js_info']['picture'];

  date_default_timezone_set("Asia/Dhaka");

  $query = "SELECT id, subject FROM preparation_sub WHERE action='Public' ORDER BY id ASC";

  if (!$result = mysqli_query($con, $query))
  {
    exit(mysqli_error($con));
  }
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
    <link rel="stylesheet" type="text/css" href="../assets/css/animate.css">
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
    <link rel="stylesheet" href="../assets/css/froala/froala_editor.css">
    <link rel="stylesheet" href="../assets/css/froala/froala_style.css">
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
    <script src="../assets/js/selectize/standalone/selectize.js" type="text/javascript"></script>

    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="../assets/css/custom_cpanel.css">
    <!-- END Custom CSS-->

    <link rel="stylesheet" type="text/css" href="../assets/css/colors.css">

  	<!--/##################### END Page Style Link ###################-->
	
  </head>
  
  <body data-open="click" data-menu="vertical-menu" data-col="2-columns" class="vertical-layout vertical-menu 2-columns  fixed-navbar" onkeypress="return disableCtrlKeyCombination(event);" onkeydown="return disableCtrlKeyCombination(event);">

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
				<a href="/jobskillbd.com/1/" class="navbar-brand nav-link">
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

              <li class="dropdown dropdown-user nav-item" id="userinfo_before_edit">

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

                  <a href="sout?js_logout=js_logout" class="dropdown-item <?php if(basename($_SERVER['PHP_SELF'])=='logout.php'){ echo 'active'; } ?>">
                      <i class="icon-power3"></i> Logout
                    </a>

                </div>

              </li>

              <li class="dropdown dropdown-user nav-item" id="userinfo_after_edit" style="display:none;"></li>

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
        <li class=" nav-item <?php if(basename($_SERVER['PHP_SELF'])=='index.php'){ echo 'active'; } ?>">
          <a href="/jobskillbd.com/1/">
            <i class="fa fa-home"></i>
            <span class="menu-title">Home</span>
          </a>
        </li>
	  
        <li class="nav-item"><a href="#"><i class="icon-files-empty"></i><span class="menu-title">Resume & Cover Letter</span></a>
          <ul class="menu-content">
		  
            <li class="<?php if(basename($_SERVER['PHP_SELF'])=='update_resume.php'){ echo 'active'; } ?>">
              <a href="updr" class="menu-item"><i class="icon-edit2"></i> Update Resume</a>
            </li>
		  
            <li class="<?php if(basename($_SERVER['PHP_SELF'])=='upload_resume.php'){ echo 'active'; } ?>">
              <a href="uplr" class="menu-item"><i class="icon-upload3"></i> Upload Resume</a>
            </li>

            <li class="<?php if(basename($_SERVER['PHP_SELF'])=='resume_template.php'){ echo 'active';} ?>">
              <a href="tempr" class="menu-item"><i class="icon-download22"></i> Resume Template</a>
            </li>

            <li class="<?php if(basename($_SERVER['PHP_SELF'])=='cover_letter_template.php'){ echo 'active';} ?>">
              <a href="tempcl" class="menu-item"><i class="icon-download3"></i> Cover Letter Template</a>
            </li>
		
          </ul>
        </li>
	      <li class="nav-item"><a href="#"><i class="icon-stack"></i><span class="menu-title">Job Preparation</span></a>
          <ul class="menu-content">
            <?php
            if (mysqli_num_rows($result) > 0)
            {
              while($row = mysqli_fetch_assoc($result))
              {
                ?>
                <li class="<?php if(basename($_SERVER['PHP_SELF'])=='lesson_view.php' || basename($_SERVER['PHP_SELF'])=='lesson_details.php'){ echo 'active'; } ?>">
                  <a href="lesson_list?s_id=<?php echo $row['id']; ?>" class="menu-item"><i class="fa fa-book" aria-hidden="true"></i> <?php echo $row['subject']; ?></a>
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

        <li class="nav-item <?php if(basename($_SERVER['PHP_SELF'])=='job_search.php'){ echo 'active'; } ?>">
          <a href="js">
            <i class="icon-search4"></i>
            <span class="menu-title">Search Jobs</span>
          </a>
        </li>
	  
        <li class="nav-item <?php if(basename($_SERVER['PHP_SELF'])=='preferred_job.php'){ echo 'active'; } ?>">
          <a href="pj">
            <i class="fa fa-heart-o"></i>
            <span class="menu-title">Preferred Jobs</span>
          </a>
        </li>
	  
        <li class="nav-item <?php if(basename($_SERVER['PHP_SELF'])=='applied_job.php'){ echo 'active';} ?>">
          <a href="aj">
            <i class="fa fa-paper-plane-o"></i>
            <span class="menu-title">Applied Jobs</span>
          </a>
        </li>
	  
        <li class="nav-item <?php if(basename($_SERVER['PHP_SELF'])=='saved_job.php'){ echo 'active';} ?>">
          <a href="sj">
            <i class="fa fa-thumb-tack"></i>
            <span class="menu-title">Saved Jobs</span>
          </a>
      </li>
	  
        <li class="nav-item <?php if(basename($_SERVER['PHP_SELF'])=='em_list.php'){ echo 'active';} ?>">
          <a href="eml">
            <i class="icon-android-person"></i>
            <span class="menu-title">Employer List</span>
          </a>
        </li>
	  
        <li class="nav-item <?php if(basename($_SERVER['PHP_SELF'])=='following_em.php'){ echo 'active';} ?>">
          <a href="fe">
            <i class="icon-ios-people"></i>
            <span class="menu-title">Following Employer</span>
          </a>
        </li>
	  
        <li class="nav-item <?php if(basename($_SERVER['PHP_SELF'])=='resume_visited.php'){ echo 'active';} ?>" >
          <a href="rv">
            <i class="fa fa-eye"></i>
            <span class="menu-title">Resume Visited</span>
          </a>
        </li>
	  
        <li style="display: none" class="nav-item"><a href="#"><i class="fa fa-envelope-open-o"></i><span class="menu-title">Employer Invitation</span></a></li>
	  
        <li style="display: none" class="nav-item"><a href="#"><i class="fa fa-lock"></i><span class="menu-title">Block Employer</span></a></li>
	  
        <li class="nav-item <?php if(basename($_SERVER['PHP_SELF'])=='settings.php')
          { echo 'active'; } ?>">
          <a href="stng">
            <i class="icon-cog"></i>
            <span class="menu-title">Settings</span>
          </a>
        </li>
	  
        <li class="nav-item <?php if(basename($_SERVER['PHP_SELF'])=='logout.php')
          { echo 'active'; } ?>">
          <a href="sout?js_logout=js_logout">
            <i class="icon-exit"></i>
            <span class="menu-title">Logout</span>
          </a>
        </li>

      </ul>
    </div>
    <!-- /main menu content-->

  </div>
  <!--/##################### END main menu #########################-->