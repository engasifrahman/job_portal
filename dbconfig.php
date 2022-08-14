<?php

	require_once('db_details.php');

	global $con;

	$con = mysqli_connect(DB_Host,DB_User,DB_Pass,DB_Name);

	if (mysqli_connect_errno())
	{
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}