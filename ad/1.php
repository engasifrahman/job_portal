<?php
	session_start();
	require_once('dbconfig.php');
	global $con;

	$query1 = "SELECT JS.id, email, username, full_name, contact_no, action, created_at, COUNT(RV.em_id) AS visitors, SUM(RV.visit_count) AS hits
	FROM job_seeker JS 
	LEFT JOIN resume_visited RV ON RV.js_id=Js.id
	GROUP BY JS.id 
	ORDER BY JS.id DESC";
	if (!$result1 = mysqli_query($con, $query1))
	{
	        exit(mysqli_error($con));
	}




	$query2="SELECT JS.id, COUNT(JSFEM.em_id) AS following
	FROM job_seeker JS 
	LEFT JOIN js_following_em JSFEM ON Js.id=JSFEM.js_id 
	GROUP BY JS.id 
	ORDER BY JS.id DESC";
	if (!$result2 = mysqli_query($con, $query2))
	{
	        exit(mysqli_error($con));
	}
	while($js_data2 = mysqli_fetch_assoc($result2))
	{
		$following[''.$js_id=$js_data2['id'].'']=$js_data2['following'];
	}
	print_r($following);



	$query3="SELECT JS.id, COUNT(EMFJS.em_id) AS follower
	FROM job_seeker JS 
	LEFT JOIN em_following_js EMFJS ON Js.id=EMFJS.js_id 
	GROUP BY JS.id 
	ORDER BY JS.id DESC";
	if (!$result3 = mysqli_query($con, $query3))
	{
	        exit(mysqli_error($con));
	}
	while($js_data3 = mysqli_fetch_assoc($result3))
	{
		$follower[''.$js_id=$js_data3['id'].'']=$js_data3['follower'];
	}
	echo '<br>';
	print_r($follower);



	$query4="SELECT JS.id, COUNT(AJ.post_id) AS applied
	FROM job_seeker JS 
	LEFT JOIN applied_job AJ ON Js.id=AJ.js_id 
	GROUP BY JS.id 
	ORDER BY JS.id DESC";
	if (!$result4 = mysqli_query($con, $query4))
	{
	        exit(mysqli_error($con));
	}
	while($js_data4 = mysqli_fetch_assoc($result4))
	{
		$applied[''.$js_id=$js_data4['id'].'']=$js_data4['applied'];
	}
	echo '<br>';
	print_r($applied);



	$query5="SELECT JS.id, COUNT(SJ.post_id) AS saved
	FROM job_seeker JS 
	LEFT JOIN saved_job SJ ON Js.id=SJ.js_id 
	GROUP BY JS.id 
	ORDER BY JS.id DESC";
	if (!$result5 = mysqli_query($con, $query5))
	{
	        exit(mysqli_error($con));
	}
	while($js_data5 = mysqli_fetch_assoc($result5))
	{
		$saved[''.$js_id=$js_data5['id'].'']=$js_data5['saved'];
	}
	echo '<br>';
	print_r($saved);
?>