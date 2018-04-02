<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Gogo extends MX_Controller
{
	public $js = '<!DOCTYPE html>
<html><head><script>window.location.href = "URL";</script></head><body></body></html>';
	
	public function __construct()
	{
		parent::__construct();
	}
	
	public function k24($str)
	{
		echo str_replace('URL', 'https://www.kredito24.ru/?kt_aff=56981&utm_campaign=49131&utm_content=56981&utm_medium=AFFILIATES&utm_source=Scorim&utm_term=24355&amc=aff.kreditech.49131.56981.24355&smc1='.$str, $this->js);
	}
	
	public function pxl($offer, $str)
	{
		if ($offer == 'k24')
			echo str_replace('URL', 'https://pxl.leads.su/click/68a106ca2f6a95b510eaf2b6bd7df7b7?source='.$str, $this->js);
		elseif ($offer == 'tz')
			echo str_replace('URL', 'https://pxl.leads.su/click/aa6b9f49e7796f1babe1b42f4cc99b0d?source='.$str, $this->js);
		else
			$this->k24($str);
	}
        
	public function redirect($domen){
            echo str_replace('URL', 'http://'.$domen, $this->js);
	}        
}