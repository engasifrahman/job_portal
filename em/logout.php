<?php
	session_start();
	if(isset($_GET['em_logout']))
	{
        //require_once('../class_library/access_classes.php');
        require_once('../class_library/employer_access_class.php');
		$em_logout = new Employer_Access;
		$em_logout ->employer_logout();
	}
?>