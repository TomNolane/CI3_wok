<?php
function is_md5($str)
{
	//if (mb_strlen($str) == 32) return preg_match("/^[a-f0-9]*$/i", $str);
	//return false;
	return preg_match("/^[a-f0-9]{32}$/i", $str);
}
?>