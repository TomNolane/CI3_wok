<?php
class IP
{
	static $ip = '127.0.0.1';
	static $proxy = true;
	
	function __construct()
	{
		if (getenv('HTTP_VIA') != ''            ||
			getenv('HTTP_FORWARDED') != ''       ||
	    	getenv('HTTP_X_FORWARDED_FOR') != '' ||
			getenv('HTTP_CLIENT_IP') != ''      ||
		    getenv('HTTP_XROXY_CONNECTION') != '' ||
	    	getenv('HTTP_PROXY_CONNECTION') != '' ||
		    getenv('HTTP_X_FORWARDED') != ''   ||
		    getenv('HTTP_FORWARDED_FOR') != '' ||
	    	getenv('HTTP_X_COMING_FROM') != '' ||
		    getenv('HTTP_COMING_FROM') != ''   ||
		    getenv('HTTP_FROM') != '')
		{
			$proxy = true;
			
			$HTTP_CLIENT_IP = strtolower(getenv('HTTP_CLIENT_IP'));
			$HTTP_X_FORWARDED_FOR = strtolower(getenv('HTTP_X_FORWARDED_FOR'));
			$REMOTE_ADDR = strtolower(getenv('REMOTE_ADDR'));
			
        	if (!empty($HTTP_CLIENT_IP) && $HTTP_CLIENT_IP != 'unknown' && $HTTP_CLIENT_IP != '127.0.0.1')
		    	$ip = (self::check_IPval(getenv('HTTP_CLIENT_IP')))? getenv('HTTP_CLIENT_IP') : '0.0.0.0';
      	elseif (!empty($HTTP_X_FORWARDED_FOR) && $HTTP_X_FORWARDED_FOR != 'unknown' && $HTTP_X_FORWARDED_FOR != '127.0.0.1')
			    $ip = (self::check_IPval(getenv('HTTP_X_FORWARDED_FOR')))? getenv('HTTP_X_FORWARDED_FOR') : '0.0.0.0';
     		elseif (!empty($REMOTE_ADDR) && $REMOTE_ADDR != 'unknown')
		    	$ip = (self::check_IPval(getenv('REMOTE_ADDR')))? getenv('REMOTE_ADDR') : '0.0.0.0';
     		else
		    	$ip = '0.0.0.0';
		}
		else
		{// Либо настоящий IP, либо IP of High Anonimity (Elite) Proxy.
			$proxy = false;
			
			$REMOTE_ADDR = strtolower(getenv('REMOTE_ADDR'));
			
			if (!empty($REMOTE_ADDR) && $REMOTE_ADDR != 'unknown')
		    	$ip = (self::check_IPval(getenv('REMOTE_ADDR')))? getenv('REMOTE_ADDR') : '0.0.0.0';
      	else
		    	$ip = '0.0.0.0';
		}
		
		self::$ip = $ip;
		self::$proxy = $proxy;
	}
	
	static function check_IPval($str)
	{
		return preg_match("!(\d{1,3})\.(\d{1,3})\.(\d{1,3})\.(\d{1,3})!", $str);
	}
}
new IP;
?>