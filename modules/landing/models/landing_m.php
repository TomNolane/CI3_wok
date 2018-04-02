<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Landing_m extends CI_Model
{
    public function get_utm($utm_source)
    {   
        if (strpos('vk direct mytarget google_cms google', $utm_source) !== false) 
        {
            return $this->db->get_where('utm', array('utm_source' => $utm_source), 1)->row()->utm_source;
        }
        else
        {
            return 'default';
        } 
    }

    public function get_id($utm_source)
    {   
        if (strpos('vk direct mytarget google_cms google', $utm_source) !== false) 
        {
            return $this->db->get_where('utm', array('utm_source' => $utm_source), 1)->row()->id;
        }
        else
        {
            return 0;
        } 
    }
    
}