<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Members extends MX_Controller
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
		$this->grocery_crud->set_table('users');
		
		$this->grocery_crud->columns('id', 'email', 'active', 'created_on', 'last_login');
		$this->grocery_crud->add_fields('email');
		$this->grocery_crud->edit_fields('email', 'active');
		
		$this->grocery_crud->display_as('id', 'ID');
		$this->grocery_crud->display_as('email', 'Email');
		$this->grocery_crud->display_as('active', 'Состояние');
		$this->grocery_crud->display_as('created_on', 'Дата регистрации');
		$this->grocery_crud->display_as('last_login', 'Дата посещения');
		
		$this->grocery_crud->callback_insert(array($this, '_new_member'));
		
		$this->grocery_crud->unset_read();
		
		$this->output();
	}
	
	public function _new_member($post)
	{
		//$username, $password, $email, $additional_data = array(), $group_name = array()
		$post['password'] = $this->password($this->config->item('min_password_length', 'ion_auth'));
		$this->ion_auth->register(null, $post['password'], $post['email']);
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