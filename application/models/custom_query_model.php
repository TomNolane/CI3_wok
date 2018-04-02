<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Custom_query_model extends grocery_CRUD_model {
	private $query_str = '';
	private $query_order_by = false;
	private $query_limit = false;
	
	function __construct()
	{
		parent::__construct();
	}
	
	function get_list()
	{
		if ($this->query_order_by) $this->query_str .= ' ORDER BY '.$this->query_order_by;
		if ($this->query_limit)    $this->query_str .= ' LIMIT '.$this->query_limit;
		//echo $this->query_str;
		$query=$this->db->query($this->query_str);
		
		$results_array=$query->result();
		return $results_array;	
	}
	
	public function set_query_str($query_str)
	{
		$this->query_str = $query_str;
	}
	
	public function order_by($str, $direction = false)
	{
		$this->query_order_by = ($direction && $direction != '')? "$str $direction" : $str;
	}
	
	function limit($value, $offset = false)
	{
		$this->query_limit = $offset? "$value, $offset" : $value;
	}
}