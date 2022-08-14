<?php
	session_start();

	if(isset($_GET['js_logout']))
	{
		//var_export($_GET);
        //require_once('../class_library/access_classes.php');
        require_once('../class_library/job_seeker_access_class.php');
		$js_logout = new Job_Seeker_Access;
		$js_logout ->job_seeker_logout();
	}
?>