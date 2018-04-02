<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Forms_model extends CI_Model
{
	public function get($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get('forms');
		$res = ($query->num_rows() > 0)? $query->result_array() : array(false);
		return $res[0];
	}
	public function find($phone){
                $this->db->select('reg_type,reg_region,reg_city,reg_street,reg_building,reg_housing,reg_flat,region,city,street,building,housing,flat,passport,passport_date,passport_who,passport_code,birthplace,work,delays,delays_type,work_occupation,work_salary,work_name,work_experience,work_phone,work_region,work_city,work_street,work_house,work_building,work_office');
		$this->db->where('phone', $phone);
                $this->db->where('work_house <>', '');
		$query = $this->db->get('forms');
		$res = ($query->num_rows() > 0)? $query->result_array() : array(false);
		return $res[0];
	}	
	public function get4mini()
	{
		$this->db->select('*, UNIX_TIMESTAMP(change_date), UNIX_TIMESTAMP(NOW())');
		$this->db->where('UNIX_TIMESTAMP(NOW()) - UNIX_TIMESTAMP(change_date) >= 2400');
		$this->db->where('leadia_status', 0);
		$this->db->where('vteleport_status', 0);
		$this->db->order_by('create_date', 'DESC');
		$query = $this->db->get('forms', 5);
		return $query->result_array();
	}
	
	public function get4cron()
	{
		$this->db->select('*, UNIX_TIMESTAMP(change_date), UNIX_TIMESTAMP(NOW())');
		$this->db->where('UNIX_TIMESTAMP(NOW()) - UNIX_TIMESTAMP(change_date) >= 1500');
		$this->db->where('leadia_status > ', 0);
		$this->db->where('vteleport_status', 0);
                $this->db->order_by("id", "desc"); 
                $this->db->limit(3);
		$query = $this->db->get('forms');
		return $query->result_array();
	}
	
	public function get4cron_upfinance()
	{
		$this->db->select('*, UNIX_TIMESTAMP(change_date), UNIX_TIMESTAMP(NOW())');
		$this->db->where('UNIX_TIMESTAMP(NOW()) - UNIX_TIMESTAMP(change_date) >= 3600');
		$this->db->where('UNIX_TIMESTAMP(change_date) >= 1464555600');
		//$this->db->where('vteleport_status > ', 0);
		$this->db->where('leadia_status > ', 0);
		$this->db->where('upfinance_status', 0);
		$query = $this->db->get('forms', 5);
		return $query->result_array();
	}
	
	/* ОТПРАВКА АНКЕТ ЧЕРЕЗ 21 ДЕНЬ */
	
	public function get4cron21()
	{
		$this->db->where('date_format(date_add(create_date, interval +30240 minute), "%Y%m%d%H%i") = date_format(now(), "%Y%m%d%H%i")');                          
		//$this->db->where('vteleport_status', '1');
		//$this->db->where('leadia_status', '1');
		//$this->db->where('upfinance_status', '1');
              	$this->db->order_by('create_date', 'DESC');

                $query = $this->db->get('forms');
                //echo $this->db->last_query();
		return $query->result_array();
	}
	
	/* ---------------------------- */
	
	public function upfinance_check()
	{
		$this->db->select('id');
		$this->db->where('UNIX_TIMESTAMP(change_date) >= 1463500800');
		$this->db->order_by('change_date');
		$this->db->where('upfinance_text_status', '');
		$this->db->or_where('upfinance_text_status', 'pending');
		$query = $this->db->get('forms', 100);
		$arr = array();
		foreach($query->result_array() as $item)
		{
			$arr[] = $item['id'];
		}
		return $arr;//'aff_ids[]='.implode('&aff_ids[]=', $arr);
	}
	
	public function add($data)
	{
		$data = $this->clean_data($data);
		$this->db->insert('forms', $data);
		return $this->db->insert_id();
	}
	
	public function update($id, $data)
	{
		$data = $this->clean_data($data);
		$this->db->where('id', $id);
		$this->db->update('forms', $data);
	}
	public function log($data){
		$data = $this->clean_data($data);
		$this->db->insert('forms_stat', $data);
		return $this->db->insert_id();
	}	
	private function clean_data($data)
	{
		if (isset($data['id'])) unset($data['id']);
		if (isset($data['reg_same'])) unset($data['reg_same']);
		return $data;
	}
}