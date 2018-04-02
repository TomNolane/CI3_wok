<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Members_model extends CI_Model
{
	// Возвращает список скриптов
	public function set_org_id($org_id=false, $user_id=false)
	{
		$org_id  || $org_id  = $this->session->userdata('user_id');
		$user_id || $user_id = $this->session->userdata('user_id');
		return $this->db->update('users', array('org_id' => $org_id), 'id = '.$user_id);
	}
	
	public function get($user_id=false)
	{
		$user_id || $user_id = $this->session->userdata('user_id');
		$query = $this->db->where('id', $user_id)->get('users', 1);
		return $query->num_rows()? $query->row_array() : false;
	}
	
	public function referer($user_id=false)
	{
		$user_id || $user_id = $this->session->userdata('user_id');
		$query = $this->db->select('referer_id')->where('id', $user_id)->get('users', 1);
		$referer = $query->row_array();
		if (isset($referer['referer_id']) && $referer['referer_id'])
		{
			$query = $this->db->where('id', $referer['referer_id'])->get('users', 1);
			return $query->num_rows()? $query->row_array() : false;
		}
		return;
	}
}