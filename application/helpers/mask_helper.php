<?php
function mask_email($value)
{
	if (!$value) return '';
	$tmp = explode('@', $value);
	$value = substr($tmp[0], 0, 2).'***';
	if (isset($tmp[1])) $value .= '@'.$tmp[1];
	return $value;
}

function mask_phone($value)
{
	if (!$value) return '';
	return substr($value, 0, 1).' ('.substr($value, 1, 3).') *** '.substr($value, 7, 2).' '.substr($value, 9, 2);
}
?>