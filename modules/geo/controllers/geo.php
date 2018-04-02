<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Geo extends MX_Controller
{
	public function __construct()
	{
		parent::__construct();
		
		$this->load->helper('url');
		$this->load->helper('permissions');//if (!is_admin()) redirect('/login/?from='.uri_string());
		
		$this->load->database();
		$this->load->library('grocery_CRUD');
		
		$this->grocery_crud->unset_read();
	}
	
	public function cities($region_id)
	{
		$this->load->model('geo_model', 'geo');
		echo json_encode($this->geo->city($region_id));
	}
	
	public function region()
	{
		if (!is_admin()) redirect('/login/?from='.uri_string());
		
		$this->grocery_crud->set_subject('Регион');
		$this->grocery_crud->set_table('regions');
		$this->grocery_crud->order_by('region_id');
		
		$this->grocery_crud->columns('name');
		$this->grocery_crud->fields('name');
		
		//$this->grocery_crud->display_as('region_id', 'ID');
		$this->grocery_crud->display_as('name', 'Регион');
		
		$data = $this->grocery_crud->render();
		$data->content = $this->load->view('tabs', null, true);
		
		$this->load->view('admin', $data);
		//$this->output($data);
	}
	
	public function city()
	{
		if (!is_admin()) redirect('/login/?from='.uri_string());
		
		$this->grocery_crud->set_subject('Город');
		$this->grocery_crud->set_table('cities');
		$this->grocery_crud->order_by('region_id');
		
		$this->grocery_crud->columns('region_id', 'name');
		$this->grocery_crud->fields('region_id', 'name');
		
		$this->grocery_crud->set_relation('region_id', 'regions', 'name');
		
		$this->grocery_crud->display_as('region_id', 'Регион');
		$this->grocery_crud->display_as('name', 'Город');
		
		$data = $this->grocery_crud->render();
		$data->content = $this->load->view('tabs', null, true);
		
		$this->load->view('admin', $data);
		//$this->output($data);
	}
	
	private function output($output=false)
	{
		//if (!$output) $output = $this->grocery_crud->render();
		$this->load->view('admin', $output? $output : $this->grocery_crud->render());
	}
}