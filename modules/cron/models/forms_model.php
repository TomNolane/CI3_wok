<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Forms_model extends CI_Model
{
	
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
	
	
        public function get4cron_all($gate,$minute, $limit){
                $this->db->where('step = 3 and ('.$gate.'_status = 0 OR '.$gate.'_status is NULL) and (create_date < NOW() - INTERVAL '.$minute.' MINUTE)');
                $this->db->order_by("id", "asc"); 
                $this->db->limit($limit);
		$query = $this->db->get('forms');
                //echo $this->db->last_query().'<br/>';
		return $query->result_array();            
        }
        
	public function update($id, $data)
	{
		$data = $this->clean_data($data);
		$this->db->where('id', $id);
		$this->db->update('forms', $data);
                echo $this->db->last_query();
	}
	public function log($data){
		$data = $this->clean_data($data);
		$this->db->insert('forms_stat', $data);
                //echo $this->db->last_query();
		return $this->db->insert_id();
	}	
	private function clean_data($data)
	{
		if (isset($data['id'])) unset($data['id']);
		if (isset($data['reg_same'])) unset($data['reg_same']);
		return $data;
	}
	public function get_region($region){
		$this->db->like('name', $region);
		$query = $this->db->get('region',1);
                //echo $this->db->last_query(); 
                return $region = $query->result_array();
	}        
        
	public function get_leadgid_sity($name){
		$this->db->like('name', $name);
		$query = $this->db->get('regions');
                //echo $this->db->last_query(); 
                $region = $query->result_array();
                
                $this->db->where('region_id', $region[0]['region_id']);
                $query = $this->db->get('cities');
                return $query->result_array();
	}        
        public function gate_settings($gate=null){
            if(isset($gate)){
                $query = $this->db->where('gate', $gate);
            }         
            $query = $this->db->get('gate_settings');
            return $query->result_array();
        }    
        public function get_gate(){
            $this->db->where('delay >', 0);
            $this->db->order_by('delay');
            $query = $this->db->get('gate_settings');
            return $query->result_array();
        }        
}