<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Mailsender_model extends CI_Model
{
        function get(){
		$this->db->where('feedback.email_send', 0);
		$this->db->order_by('create_date');
		$query = $this->db->get('feedback', 5);
		return $query->result_array();
        }
	public function mini1(){
		$this->db->where('date_format(date_add(create_date, interval +1 minute), "%Y%m%d%H%i") = date_format(now(), "%Y%m%d%H%i")');
		$this->db->where('leadia_status', 0);
		$this->db->where('vteleport_status', 0);
                $this->db->order_by('create_date', 'DESC');
                $query = $this->db->get('forms', 5);
                //echo $this->db->last_query();
		return $query->result_array();
	}        
	public function mini5(){
		$this->db->where('date_format(date_add(create_date, interval +5 minute), "%Y%m%d%H%i") = date_format(now(), "%Y%m%d%H%i")');
		$this->db->where('leadia_status', 0);
		$this->db->where('vteleport_status', 0);
                $this->db->order_by('create_date', 'DESC');
                $query = $this->db->get('forms', 5);
                //echo $this->db->last_query();
		return $query->result_array();
	}        
	public function mini10(){
		$this->db->where('date_format(date_add(create_date, interval +10 minute), "%Y%m%d%H%i") = date_format(now(), "%Y%m%d%H%i")');
		$this->db->where('leadia_status', 0);
		$this->db->where('vteleport_status', 0);
                $this->db->order_by('create_date', 'DESC');
                $query = $this->db->get('forms', 5);
                //echo $this->db->last_query();
		return $query->result_array();
	}    
        public function mini15(){
		$this->db->where('date_format(date_add(create_date, interval +15 minute), "%Y%m%d%H%i") = date_format(now(), "%Y%m%d%H%i")');
		$this->db->where('leadia_status', 0);
		$this->db->where('vteleport_status', 0);
                $this->db->order_by('create_date', 'DESC');
                $query = $this->db->get('forms', 5);
                //echo $this->db->last_query();
		return $query->result_array();
	}  
        public function mini20(){
		$this->db->where('date_format(date_add(create_date, interval +20 minute), "%Y%m%d%H%i") = date_format(now(), "%Y%m%d%H%i")');
		$this->db->where('leadia_status', 0);
		$this->db->where('vteleport_status', 0);
                $this->db->order_by('create_date', 'DESC');
                $query = $this->db->get('forms', 5);
                //echo $this->db->last_query();
		return $query->result_array();
	}        
        public function mini25(){
		$this->db->where('date_format(date_add(create_date, interval +25 minute), "%Y%m%d%H%i") = date_format(now(), "%Y%m%d%H%i")');
		$this->db->where('step', 3);
                $this->db->order_by('create_date', 'DESC');
                $query = $this->db->get('forms', 5);
                //echo $this->db->last_query();
		return $query->result_array();
	}        
        public function get14(){
		$this->db->where('date_format(date_add(create_date, interval +20160 minute), "%Y%m%d%H%i") = date_format(now(), "%Y%m%d%H%i")');
		$this->db->order_by('create_date', 'DESC');
                $query = $this->db->get('forms', 5);
		return $query->result_array();
	}        
        function update($id){
            
            $data = array(
               'email_send' => 1,
               'email_send_date' => date('Y-m-d H:i:s')
            );
            
            $this->db->update('feedback', $data, array('id' => $id));
            return $this->db->affected_rows();
        }
        function update_mini($id){
            $data = array(
               'send_mini_feedback' => 1
            );
            
            $this->db->update('forms', $data, array('id' => $id));
            return $this->db->affected_rows();
        }
        
        public function mini($delay){
            $this->db->where('date_format(date_add(create_date, interval +'.$delay.' minute), "%Y%m%d%H%i") = date_format(now(), "%Y%m%d%H%i")');
            $this->db->where('leadia_status', 0);
            $this->db->where('step < ', 3);
            $this->db->order_by('create_date', 'DESC');
            $query = $this->db->get('forms', 5);
            return $query->result_array();
	}        
        public function welcome($delay){
            $this->db->where('date_format(date_add(create_date, interval +'.$delay.' minute), "%Y%m%d%H%i") = date_format(now(), "%Y%m%d%H%i")');
            $this->db->where('step', 3);
            $this->db->order_by('create_date', 'DESC');
            $query = $this->db->get('forms', 5);
            return $query->result_array();
	}
        function get_settings(){
            $this->db->where('status',1);
            $this->db->where('name <> "welcome"');
            $query = $this->db->get('mail_settings');
            return $query->result_array();
        }   
        function get_settings_welcome(){
            $this->db->where('status',1);
            $this->db->where('name = "welcome"');
            $query = $this->db->get('mail_settings');
            return $query->result_array();
        }   
        
        function mail_settings($id, $data){
            $this->db->update('mail_settings', $data, array('id' => $id));
            //echo $this->db->last_query();
            return $this->db->affected_rows();
        }        
}