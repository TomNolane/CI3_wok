<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Backup_model extends CI_Model
{
    function get_row($count){

        $db['default']['hostname'] = 'localhost';
        $db['default']['username'] = 'u0161871_second';
        $db['default']['password'] = 'fneZ%MFRdA$X';
        $db['default']['database'] = 'u0161871_second';
        $db['default']['dbdriver'] = 'mysql';
        $db['default']['dbprefix'] = '';
        $db['default']['pconnect'] = TRUE;
        $db['default']['db_debug'] = TRUE;
        $db['default']['cache_on'] = FALSE;
        $db['default']['cachedir'] = '';
        $db['default']['char_set'] = 'utf8';
        $db['default']['dbcollat'] = 'utf8_general_ci';
        $db['default']['swap_pre'] = '';
        $db['default']['autoinit'] = TRUE;
        $db['default']['stricton'] = FALSE;        
        
        $this->load->database($db['default'], true);
        $this->db->order_by('id', "asc");
        $query = $this->db->get('forms', $count);  
        return $query->result_array();
    }
    function del_row($id){

        $db['default']['hostname'] = 'localhost';
        $db['default']['username'] = 'u0161871_second';
        $db['default']['password'] = 'fneZ%MFRdA$X';
        $db['default']['database'] = 'u0161871_second';
        $db['default']['dbdriver'] = 'mysql';
        $db['default']['dbprefix'] = '';
        $db['default']['pconnect'] = TRUE;
        $db['default']['db_debug'] = TRUE;
        $db['default']['cache_on'] = FALSE;
        $db['default']['cachedir'] = '';
        $db['default']['char_set'] = 'utf8';
        $db['default']['dbcollat'] = 'utf8_general_ci';
        $db['default']['swap_pre'] = '';
        $db['default']['autoinit'] = TRUE;
        $db['default']['stricton'] = FALSE;        
        
        $this->load->database($db['default'], true);
        $this->db->where('id', $id);
        $this->db->delete('forms');
        return $this->db->affected_rows();
    }
    function backup_row($data){

        $db['backup']['hostname'] = 'localhost';
        $db['backup']['username'] = 'u0161871_second';
        $db['backup']['password'] = 'fneZ%MFRdA$X';
        $db['backup']['database'] = 'u0161871_third';
        $db['backup']['dbdriver'] = 'mysql';
        $db['backup']['dbprefix'] = '';
        $db['backup']['pconnect'] = TRUE;
        $db['backup']['db_debug'] = TRUE;
        $db['backup']['cache_on'] = FALSE;
        $db['backup']['cachedir'] = '';
        $db['backup']['char_set'] = 'utf8';
        $db['backup']['dbcollat'] = 'utf8_general_ci';
        $db['backup']['swap_pre'] = '';
        $db['backup']['autoinit'] = TRUE;
        $db['backup']['stricton'] = FALSE;
        
        $this->load->database($db['backup'], true);        
        $this->db->insert('forms', $data);
        return $this->db->affected_rows();
    }    
    function pass($item){
        
        $db['default']['hostname'] = 'localhost';
        $db['default']['username'] = 'u0161871_second';
        $db['default']['password'] = 'fneZ%MFRdA$X';
        $db['default']['database'] = 'u0161871_second';
        $db['default']['dbdriver'] = 'mysql';
        $db['default']['dbprefix'] = '';
        $db['default']['pconnect'] = TRUE;
        $db['default']['db_debug'] = TRUE;
        $db['default']['cache_on'] = FALSE;
        $db['default']['cachedir'] = '';
        $db['default']['char_set'] = 'utf8';
        $db['default']['dbcollat'] = 'utf8_general_ci';
        $db['default']['swap_pre'] = '';
        $db['default']['autoinit'] = TRUE;
        $db['default']['stricton'] = FALSE;        
        
        $this->load->database($db['default'], true);        
        
        $data = array(
                'id' => $item['id'],
                'code' => preg_replace('~\D+~','',$item['code']),
                'title' => "'".$item['title']."'",
                'end_date' => '"'.$item['end_date'].'"'
        );
        $this->db->insert('passport', $data);
        echo $this->db->last_query();
        return $this->db->affected_rows();
    }  
    
    function get_row_restore($count){

        $db['backup']['hostname'] = 'localhost';
        $db['backup']['username'] = 'u0161871_second';
        $db['backup']['password'] = 'fneZ%MFRdA$X';
        $db['backup']['database'] = 'u0161871_third';
        $db['backup']['dbdriver'] = 'mysql';
        $db['backup']['dbprefix'] = '';
        $db['backup']['pconnect'] = TRUE;
        $db['backup']['db_debug'] = TRUE;
        $db['backup']['cache_on'] = FALSE;
        $db['backup']['cachedir'] = '';
        $db['backup']['char_set'] = 'utf8';
        $db['backup']['dbcollat'] = 'utf8_general_ci';
        $db['backup']['swap_pre'] = '';
        $db['backup']['autoinit'] = TRUE;
        $db['backup']['stricton'] = FALSE;       
        
        $this->load->database($db['backup'], true);
        $this->db->order_by('id', "desc");
        $query = $this->db->get('forms', $count);  
        return $query->result_array();
    }    
    function restore_row($data){

        $db['default']['hostname'] = 'localhost';
        $db['default']['username'] = 'u0161871_second';
        $db['default']['password'] = 'fneZ%MFRdA$X';
        $db['default']['database'] = 'u0161871_second';
        $db['default']['dbdriver'] = 'mysql';
        $db['default']['dbprefix'] = '';
        $db['default']['pconnect'] = TRUE;
        $db['default']['db_debug'] = TRUE;
        $db['default']['cache_on'] = FALSE;
        $db['default']['cachedir'] = '';
        $db['default']['char_set'] = 'utf8';
        $db['default']['dbcollat'] = 'utf8_general_ci';
        $db['default']['swap_pre'] = '';
        $db['default']['autoinit'] = TRUE;
        $db['default']['stricton'] = FALSE;        
        
        $this->load->database($db['default'], true);        
        $this->db->insert('forms', $data);
        return $this->db->affected_rows();
    }  
       function del_row_restore($id){

        $db['backup']['hostname'] = 'localhost';
        $db['backup']['username'] = 'u0161871_second';
        $db['backup']['password'] = 'fneZ%MFRdA$X';
        $db['backup']['database'] = 'u0161871_third';
        $db['backup']['dbdriver'] = 'mysql';
        $db['backup']['dbprefix'] = '';
        $db['backup']['pconnect'] = TRUE;
        $db['backup']['db_debug'] = TRUE;
        $db['backup']['cache_on'] = FALSE;
        $db['backup']['cachedir'] = '';
        $db['backup']['char_set'] = 'utf8';
        $db['backup']['dbcollat'] = 'utf8_general_ci';
        $db['backup']['swap_pre'] = '';
        $db['backup']['autoinit'] = TRUE;
        $db['backup']['stricton'] = FALSE;       
        
        $this->load->database($db['backup'], true);
        $this->db->where('id', $id);
        $this->db->delete('forms');
        return $this->db->affected_rows();
    }
}