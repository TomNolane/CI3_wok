<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Admin extends MX_Controller
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
		
		$this->grocery_crud->unset_read();
	}
	
	public function index()
	{
		redirect('/geo/admin/regions');
	}
	
	public function regions()
	{
		$this->grocery_crud->set_subject('Регион');
		$this->grocery_crud->set_table('regions');
		$this->grocery_crud->order_by('region_id');
		
		$this->grocery_crud->columns('name', 'status');
		$this->grocery_crud->fields('name', 'status');
		
		//$this->grocery_crud->display_as('region_id', 'ID');
		$this->grocery_crud->display_as('name', 'Регион');
		$this->grocery_crud->display_as('status', 'Состояние');
		
		$data = $this->grocery_crud->render();
		$data->content = $this->load->view('tabs', null, true);
		
		$this->output($data);
	}
	
	public function cities()
	{
		$this->grocery_crud->set_subject('Город');
		$this->grocery_crud->set_table('cities');
		$this->grocery_crud->order_by('region_id');
		
		$this->grocery_crud->columns('region_id', 'name', 'status');
		$this->grocery_crud->fields('region_id', 'name', 'status');
		
		$this->grocery_crud->set_relation('region_id', 'regions', 'name');
		
		$this->grocery_crud->display_as('region_id', 'Регион');
		$this->grocery_crud->display_as('name', 'Город');
		$this->grocery_crud->display_as('status', 'Состояние');
		
		$data = $this->grocery_crud->render();
		$data->content = $this->load->view('tabs', null, true);
		
		$this->output($data);
	}
	
	private function output($output=false)
	{
		$data = $output? $output : $this->grocery_crud->render();
		$data->template = 'admin';
		$this->load->view('template', $data);
	}
}