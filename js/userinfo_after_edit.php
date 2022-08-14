<?php
session_start();
?>

<a data-toggle="dropdown" class="dropdown-toggle nav-link dropdown-user-link">
	<span class="avatar avatar-online">
	    <?php
	      $name=$_SESSION['js_info']['name'];
	      $gender=$_SESSION['js_info']['gender'];
	      $picture=$_SESSION['js_info']['picture'];

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
	<span class="user-name"><?php echo $_SESSION['js_info']['name']; ?></span>
</a>

<div class="dropdown-menu dropdown-menu-right">

	<a href="stng" class="dropdown-item <?php if(basename($_SERVER['PHP_SELF'])=='settings.php'){ echo 'active'; } ?>">
    	<i class="icon-cog"></i> Settings
  	</a>

	<a href="sout?js_logout=js_logout" class="dropdown-item <?php if(basename($_SERVER['PHP_SELF'])=='logout.php'){ echo 'active'; } ?>">
    	<i class="icon-power3"></i> Logout
  	</a>

</div>