<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Analytics_model extends CI_Model{
    
    public function forms($dbname, $utm, $date){
        $db = $this->load->database($dbname, TRUE);

        if(isset($utm) && $utm <> 'all'){
            $db->like('referer', '&utm_source='.$utm);
        }
        
        $db->where('DATE_FORMAT(create_date, "%Y-%m-%d") >= DATE_FORMAT("'.$date." 00:00:00".'", "%Y-%m-%d")');
        $db->where('DATE_FORMAT(create_date, "%Y-%m-%d") <= DATE_FORMAT("'.$date." 23:59:59".'", "%Y-%m-%d")');
        
        $db->order_by("create_date", "desc");
        $query = $db->get('forms');
        
        return $query->result_array();  
    }
    public function formstat($dbname, $formid){
        $db = $this->load->database($dbname, TRUE);
        $db->where('forms_id', $formid);
        $db->order_by("date", "desc");
        $query = $db->get('forms_stat');
        
        return $query->result_array();  
    }    
    public function getgate($dbname){
        $db = $this->load->database($dbname, TRUE);
        $db->select("gate");
        $db->order_by("delay", "asc");
        $query = $db->get('gate_settings');
        return $query->result_array();  
    }    
    public function api($dbname, $date){
        $db = $this->load->database($dbname, TRUE);
        
        $db->where('DATE_FORMAT(create_date, "%Y-%m-%d") >= DATE_FORMAT("'.$date." 00:00:00".'", "%Y-%m-%d")');
        $db->where('DATE_FORMAT(create_date, "%Y-%m-%d") <= DATE_FORMAT("'.$date." 23:59:59".'", "%Y-%m-%d")');            
        $db->order_by("create_date", "desc");
        
        $query = $db->get('forms');
        
        return $query->result_array();  
    }
    public function form($dbname, $date){
        $db = $this->load->database($dbname, TRUE);
        
        $db->where('DATE_FORMAT(date, "%Y-%m-%d") >= DATE_FORMAT("'.$date." 00:00:00".'", "%Y-%m-%d")');
        $db->where('DATE_FORMAT(date, "%Y-%m-%d") <= DATE_FORMAT("'.$date." 23:59:59".'", "%Y-%m-%d")');            
        
        $query = $db->get('traffic');
        
        return $query->result_array();  
    }
    public function pixel($dbname, $date){
        $db = $this->load->database($dbname, TRUE);
        $db->where('DATE_FORMAT(date, "%Y-%m-%d") >= DATE_FORMAT("'.$date." 00:00:00".'", "%Y-%m-%d")');
        $db->where('DATE_FORMAT(date, "%Y-%m-%d") <= DATE_FORMAT("'.$date." 23:59:59".'", "%Y-%m-%d")');
        $query = $db->get('pixel');
        return $query->result_array();  
    }    
}