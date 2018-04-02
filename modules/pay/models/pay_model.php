<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Pay_model extends CI_Model
{
    public function addpay($data){
	$this->db->insert('ki', $data);
	return $this->db->insert_id();
    }  
    public function get($uid){
	$this->db->where('uid', $uid);
	$query = $this->db->get('ki');
	$res = ($query->num_rows() > 0)? $query->result_array() : array(false);
	return $res[0];
    }    
}