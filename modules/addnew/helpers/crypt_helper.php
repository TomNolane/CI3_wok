<?php
function cryptID($str, $passw='hku&69gjhgYu*%glPDRdj8ygj9')
{
	$salt = 'slUT&76y%^&9sjlghsiGUyskjghk0[ahjr';
	$len = strlen($str);
	$gamma = '';
	$n = $len>100 ? 8 : 2;
	while( strlen($gamma)<$len )
	{
		$gamma .= substr(pack('H*', sha1($passw.$gamma.$salt)), 0, $n);
	}
	return $str^$gamma;
}

function cryptID_encode($str)
{
	return base64_encode(cryptID($str));
}

function cryptID_decode($str)
{
	return cryptID(base64_decode($str));
}
?>