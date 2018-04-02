<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Forms_model extends CI_Model
{
    public function get($id){
	$this->db->where('id', $id);
	$query = $this->db->get('forms');
	$res = ($query->num_rows() > 0)? $query->result_array() : array(false);
	return $res[0];
    }   
}