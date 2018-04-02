<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Stats_model extends CI_Model
{
	public function forms($from=null, $to=null)
	{
		if (!empty($from)) $this->db->where('create_date >=', $from);
		if (!empty($to))   $this->db->where('create_date <=', $to);
		$this->db->where('site', 'быстрыйзайм5.рф');
		$this->db->select('*, EXTRACT(YEAR from create_date) AS y, EXTRACT(MONTH from create_date) AS m, EXTRACT(DAY from create_date) AS d');
		$query = $this->db->order_by('create_date')->get('forms');
		return $query->result_array();
	}
        public function count(){
            $this->db->where("UNIX_TIMESTAMP(NOW()) - UNIX_TIMESTAMP(create_date) <= 1209600");
            $query = $this->db->get("forms");
            return $query->num_rows();
        }        
        
	public function form($site, $date1, $date2){
                $this->db->select("DATE_FORMAT(create_date, '%Y-%m-%d') as date, id, phone, email, f, i, o, step, referer", FALSE); 
                //$this->db->where("UNIX_TIMESTAMP(NOW()) - UNIX_TIMESTAMP(create_date) <= 1209600");
                if( (!empty($date1)) && (!empty($date2)) ){
                    $this->db->where('create_date >=', $date1.' 00:00:00');
                    $this->db->where('create_date <=', $date2.' 23:59:59');
                }
                if(!empty($site)){$this->db->where('site', $site);}
                $this->db->order_by('create_date');
		$query = $this->db->get("forms");
                //echo $this->db->last_query();
                return $query->result_array();
	}   
        public function history($phone, $date1, $date2){
            $this->db->where('phone', $phone);
            if( (!empty($date1)) && (!empty($date2)) ){
                $this->db->where('create_date >=', $date1.' 00:00:00');
                $this->db->where('create_date <=', $date2.' 23:59:59');
            }            
            $this->db->order_by('create_date', "desc");
            $query = $this->db->get("forms");
            return $query->result_array();
        }         
}