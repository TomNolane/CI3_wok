<?php
function theme()
{
	CI::$APP->load->helper('idna');
	$themes = CI::$APP->config->item('themes');
	$domain = IDN_decode(str_replace('www.', '', CI::$APP->input->server('HTTP_HOST')));
	return isset($themes[$domain])? $themes[$domain] : 'zaimhome';
}
?>