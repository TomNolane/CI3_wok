<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Templates extends MX_Controller
{
	public function index($theme, $bg='')
	{
		$data->bg = $bg;
		$data->theme = $theme;
		$data->template = 'index';
		$this->output($data);
	}
	
	private function output($data=false)
	{
		$this->load->view('template', $data);
	}
}