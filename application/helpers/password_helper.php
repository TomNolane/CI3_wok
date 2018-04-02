<?php
function password($symcnt)
{
	$arr = array(
		'a', 'b', 'c', 'd', 'e',
 		'f', 'g', 'h', 'i', 'j',
		'k', 'l', 'm', 'n', 'o',
		'p', 'q', 'r', 's', 't',
		'u', 'v', 'w', 'x', 'y',
		'z', '0', '1', '2', '3',
		'4', '5', '6', '7', '8',
		'9', 'A', 'B', 'C', 'D',
		'E', 'F', 'G', 'H', 'I',
		'J', 'K', 'L', 'M', 'N',
		'O', 'P', 'Q', 'R', 'S',
		'T', 'U', 'V', 'W', 'X',
		'Y', 'Z'
	);
	
	$max = count($arr) - 1;
	
	for($i=0;$i<$symcnt;$i++)
	{
		$letrs[] = $arr[mt_rand(0, $max)];
	}
	
	return implode('', $letrs);
}
?>