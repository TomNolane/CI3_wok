<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Pass_model extends CI_Model
{
    function get_pass($code){
        $this->db->select('title');
	$this->db->where('code', $code);
	$query = $this->db->get('passport');
	$res = ($query->num_rows() > 0)? $query->result_array() : array(false);
	return $res[0];        
    }
}