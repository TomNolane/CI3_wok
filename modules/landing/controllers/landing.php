<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Landing extends MX_Controller
{
	public function index()
	{
		$data = new StdClass();
		$uri = $this->uri->segment(1); 
		if (empty($uri)) $data->template = 'index'; 
		elseif ($uri == 'admin') show_404();
		elseif ($uri == 'form')
		{
			//$_url = 'https://dengibystra.ru/?&utm_source=google&utm_medium=cpc&utm_campaign=na_cartu1';
			if(isset($_SERVER['HTTP_REFERER']))
			{ 
				$data->referer = $_SERVER['HTTP_REFERER'];
				parse_str($data->referer, $output); 
					if(isset($output['utm_source']))
					{
						$this->load->model('landing/landing_m', 'landing_m');
						$data->utm = $this->landing_m->get_id($output['utm_source']);   
					}
					else     
					{
						$data->utm = ''; 
					}
					$data->ad_id = '4'.$data->utm; 
			} else {
				$data->referer = $_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
				$data->ad_id = '4'; 
				$data->utm = '4';
			}; 
			 
			$data->template = 'form';
		}
		elseif ($uri == 'history') $data->template = 'history';
		elseif (is_file(FCPATH.'templates/'.$this->theme().'/internal-'.$uri.'.php')) $data->template = 'internal';
		else show_404();
		//$data->template = ($page == 'result')? 'result' : 'index';
		$this->output($data);
	}
	
	private function theme()
	{
		$this->load->helper('themes');
		return theme();
	}
	
	private function output($data=false)
	{
		$data || $data = new stdClass;
		$data->theme = $this->theme();
		$this->load->view('template', $data);
	}
}