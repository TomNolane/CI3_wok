<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Traffic_model extends CI_Model
{
    public function traffic($site,$page){
        $data = array(
            'site' => $site,
            'page'=>$page,
            'date' => date('Y-m-d H:i:s')
        );
        
        $this->db->insert('traffic', $data);
        return $this->db->insert_id();
        //echo $this->db->last_query();
    }
    
}