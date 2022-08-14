<?php
$date1 = new DateTime("2007-03-08");
$date2 = new DateTime("2009-06-26");
$interval = $date1->diff($date2);
echo "difference " . $interval->y . " years, " . $interval->m." months, ".$interval->d." days "; 

// shows the total amount of days (not divided into years, months and days like above)
echo "difference " . $interval->days . " days ";
echo "<br> Year & Month ".$interval->y.".". $interval->m;

$years_of_exp=$interval->y.".". $interval->m;
echo $years_of_exp;
if ($interval->d>15)
{
	$years_of_exp+=.1;
	echo '<Br>'.$years_of_exp;
}
?>