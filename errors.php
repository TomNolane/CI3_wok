<?php
register_shutdown_function('error_alert');

function error_alert()
{
	if(is_null($e = error_get_last()) === false)
   {
   	$f = fopen('/var/www/u0161871/logs/creds', 'a');
   	fwrite($f, print_r($e, true));
   	fclose($f);
   }
}
?>