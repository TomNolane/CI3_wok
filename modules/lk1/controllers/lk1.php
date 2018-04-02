<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Lk1 extends MX_Controller
{
	public function __construct()
	{
		parent::__construct();
		
		$this->load->helper('url');
		//$this->load->helper('permissions');
		//$this->load->database();
	}
	
	public function index()
	{
		$data = $this->variants();
		$this->output($data);
	}
	
	public function data()
	{
		$data = $this->variants();
		$this->output($data);
	}
	
	public function history()
	{
		$data = $this->variants();
		$this->output($data);
	}
	
	public function subscribe()
	{
		$data = $this->variants();
		$this->output($data);
	}
	
	private function variants()
	{
		$arr = array(
			'f' => (string)rawurldecode($this->input->cookie('f', true)),
			'i' => (string)rawurldecode($this->input->cookie('i', true)),
			'o' => (string)rawurldecode($this->input->cookie('o', true))
		);
		
		return $arr;
	}
	
	private function output($data=array())
	{
		$data['template'] = 'lk1';
		$data = array_merge($data, $this->variants());
		$this->load->view('template', $data);
	}
}