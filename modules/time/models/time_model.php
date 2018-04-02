<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Time_model extends CI_Model
{
    public function time($site, $time1,$time2,$time3){
        $data = array(
            'site' => $site,
            'date' => date('Y-m-d H:i:s'),
            'time1'=>$time1,
            'time2'=>$time2,
            'time3'=>$time3
        );
        
        $this->db->insert('time', $data);
        return $this->db->insert_id();
        //echo $this->db->last_query();        
        
    }
    
}