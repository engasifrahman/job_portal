<?php
    session_start();
?>
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

<link rel="stylesheet" href="../assets/css/resume&cover_letter.css"></link>

<style type="text/css">
	progress {
	  display: inline-block;
	  vertical-align: baseline;
	}
	@-webkit-keyframes progress-bar-stripes {
	  from {
	    background-position: 1rem 0;
	  }
	  to {
	    background-position: 0 0;
	  }
	}

	@-o-keyframes progress-bar-stripes {
	  from {
	    background-position: 1rem 0;
	  }
	  to {
	    background-position: 0 0;
	  }
	}

	@keyframes progress-bar-stripes {
	  from {
	    background-position: 1rem 0;
	  }
	  to {
	    background-position: 0 0;
	  }
	}

	.progress {
	  display: -webkit-box;
	  display: -webkit-flex;
	  display: -ms-flexbox;
	  display: flex;
	  overflow: hidden;
	  font-size: 0.75rem;
	  line-height: 1rem;
	  text-align: center;
	  background-color: #eceeef;
	  border-radius: 0.25rem;
	}

	.progress-bar {
	  height: 1rem;
	  color: #fff;
	  background-color: #0275d8;
	}

	.progress-bar-striped {
	  background-image: -webkit-linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
	  background-image: -o-linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
	  background-image: linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
	  -webkit-background-size: 1rem 1rem;
	          background-size: 1rem 1rem;
	}

	.progress-bar-animated {
	  -webkit-animation: progress-bar-stripes 1s linear infinite;
	       -o-animation: progress-bar-stripes 1s linear infinite;
	          animation: progress-bar-stripes 1s linear infinite;
	}
	/*####### CUSTOM ##########*/
	.progress {
		padding: 0rem !important;
    	margin: 0rem !important;
    	border-radius: 0rem;
	}
	.fr-view table th {
    	background: none;
	}
	.fr-view strong {
    	font-weight: bolder;
	}
	/*####### CUSTOM ##########*/
</style>

<!--/##################### END Page Style Link ###################-->