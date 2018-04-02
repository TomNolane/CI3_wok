<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Pixel_model extends CI_Model
{
    public function stat($site){
        $data = array(
            'date' => date('Y-m-d H:i:s'),
            'site' => $site
        );
        $this->db->insert('pixel', $data);
        return $this->db->insert_id();
    }
    public function pixel($id, $pixel){
        $data = array(
            'pixel' => $pixel
        );
        
	$this->db->where('id', $id);
	$this->db->update('pixel', $data);
        //echo $this->db->last_query();        
        
    }
    
}