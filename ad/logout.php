<?php
	session_start();

	if(isset($_GET['ad_logout']))
	{
        require_once('../class_library/admin_access_class.php');
		$ad_logout = new admin_Access;
		$ad_logout ->admin_logout();
	}
?>