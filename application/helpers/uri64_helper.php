<?php
function uri64_encode($str)
{
	return strtr(base64_encode($str), '=+/', '~-_');
}

function uri64_decode($str)
{
	return base64_decode(strtr($str, '~-_', '=+/'));
}
?>