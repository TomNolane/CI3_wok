<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Test extends MX_Controller
{
	public function __construct()
	{
		parent::__construct();
		
		$this->load->helper('url');
		$this->load->helper('permissions');
		
		if (!logged_in() && !is_admin())
		{
			$identity = $this->config->item('identity', 'ion_auth');
			$this->session->set_userdata($identity, false);
			redirect('/login/?from='.uri_string());
		}
		
		$this->load->database();
		$this->load->library('grocery_CRUD');
	}
	
	public function index()
	{
		$this->db->from('forms');
		$this->db->where('upfinance_status = 1');
		$this->db->order_by('create_date', 'desc');
		$res = $this->db->get();
		foreach($res->result_array() as $item)
		{
			echo $item['create_date'].'<br>';
			echo 'ID: '.$item['id'].'<br>';
			echo $item['f'].' '.$item['i'].' '.$item['o'].'<br>';
			echo $item['email'].'<br>';
			echo $item['phone'].'<br>';
			echo '<br><br>';
		}
	}
	
	public function email()
	{
		//$username, $password, $email, $additional_data = array(), $group_name = array()
		$post['password'] = $this->password($this->config->item('min_password_length', 'ion_auth'));
		
		$this->email->clear();
		$this->email->from($this->config->item('noreply_mail'), $this->config->item('mail_name'));
		$this->email->to('artel-studio@yandex.ru');
		$this->email->subject('Отладка');
		$this->email->message($post['password']);
		
		var_dump($this->email->send());
		echo $this->email->print_debugger();
	}
	
	private function password($symcnt)
	{
		$arr = array('a', 'b', 'c', 'd', 'e',
	 			'f', 'g', 'h', 'i', 'j',
				'k', 'l', 'm', 'n', 'o',
				'p', 'q', 'r', 's', 't',
				'u', 'v', 'w', 'x', 'y',
				'z', '0', '1', '2', '3',
				'4', '5', '6', '7', '8',
				'9', 'A', 'B', 'C', 'D',
				'E', 'F', 'G', 'H', 'I',
				'J', 'K', 'L', 'M', 'N',
				'O', 'P', 'Q', 'R', 'S',
				'T', 'U', 'V', 'W', 'X',
				'Y', 'Z');
		
		$max = count($arr) - 1;
		
		for($i=0;$i<$symcnt;$i++)
		{
			$letrs[] = $arr[mt_rand(0, $max)];
		}
		
		return implode('', $letrs);
	}
	
	private function output($output=false)
	{
		$data = $output? $output : $this->grocery_crud->render();
		$data->template = 'admin';
		$this->load->view('template', $data);
	}
}