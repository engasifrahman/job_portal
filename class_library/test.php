

<?php
require_once('bad_words.php');
function badword($string)
{
	global $badwords;
	$worderror=NULL;
	$i=NULL;

	$c=explode(" ",$string);
	foreach ($c as $out) 
	{
		foreach ($badwords as $words)
		{
			if(strcasecmp($out, $words)==0)
			{
				if(isset($worderror))
				{
					$worderror .=", ". $words;
				}
				else
				{
					$worderror .=$words;
				}
				$i++;
			}
		}
	}
	if($i>0)
	{
		$return_error = "You entered ".$i." vulgar word(s) (".$worderror.")";
	}
	else
	{
		$return_error = NULL;
	}
	return $return_error;
}


function badwords($string)
{
	global $badwords;
	$worderror=NULL;
	$i=NULL;
	foreach ($badwords as $words)
	{
		if(stripos($string, $words)!==false)
		{
			$pos = stripos($string, $words);
			$worderror .=$words;
			$i++;
			foreach ($badwords as $words)
			{
				if(stripos($string, $words)!==false)
				{
					$anothrer_pos = stripos($string, $words);
					if($anothrer_pos!==$pos)
					{
						$i++;
						$worderror .=", ". $words;
					}
				}
			}
			$return_error = "You entered ".$i." vulgar word(s) (".$worderror.")";
			return $return_error;
		}
	}
}

$str="rubbish absurd absurd Your relationship started out hot. You had sex sexy sex rubbish anytime you could sneak it in. But after a while, the frequency of those middle-of-the-night romps, not to mention lusty daydreams and racy text messages, began to dwindle..

";

$er=badwords($str);
if($er)
{
	echo $er;
	echo 'hi';
}

echo '<br>';

$er=badword($str);
if($er)
{
	echo $er;
	echo 'hello';
}

$job="uhj_.,;:/#@$%^&*()_+=-cxv\'`[]{vcx 
	vcx}vxcv?";
if(preg_match('/^[a-zA-Z ]/',$job))
{
	echo '<br>';
 echo $job;
}

?> 
