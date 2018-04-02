<?php
$this->load->helper('themes');
$template = (isset($theme)? $theme : theme()).'/'.(isset($template)? $template : 'index').'.php';
if (file_exists(FCPATH.'templates/'.$template))
	require FCPATH.'templates/'.$template;
else
	show_404();
?>