<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Feedback_model extends CI_Model
{
	public function insert($data)
	{
		$data = $this->clean_data($data);
		$this->db->insert('feedback', $data);
		return $this->db->insert_id();
	}
	
	private function clean_data($data)
	{
		if (isset($data['id'])) unset($data['id']);
		return $data;
	}
}