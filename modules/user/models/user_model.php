<?php defined('BASEPATH') OR exit('No direct script access allowed');
class User_model extends CI_Model
{
    function get_user($email){
        $this->db->select('f,i,o,birth,phone,email,passport,passport_date,passport_who,passport_code,birthplace,reg_region,reg_city,reg_street,reg_building,reg_housing,reg_flat,region,city,street,building,housing,flat,work_occupation,work_salary,work_name,work_experience,work_phone,work_region,work_city,work_street,work_house,work_building,work_office');
	$this->db->where('email', $email);
        $this->db->where('step', 3);
	$query = $this->db->get('forms');
	$res = ($query->num_rows() > 0)? $query->result_array() : array(false);
	return $res[0];        
    }
}