<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Backup extends MX_Controller
{
	public function Index($count){
            $this->load->model('backup_model', 'backup');
            $row = $this->backup->get_row($count);
                foreach ($row as $item){
                    echo $item['id'].'<br/>';
                    
                    $backup = $this->backup->backup_row($item);
                    
                    if($backup == 1){
                        $this->backup->del_row($item['id']);
                    }
                    
                }
	}
	public function restore($count){
            $this->load->model('backup_model', 'backup');
            
            $row = $this->backup->get_row_restore($count);
                foreach ($row as $item){
                    echo $item['id'].'<br/>';
                    
                    $restore = $this->backup->restore_row($item);
                    
                    if($restore == 1){
                        $this->backup->del_row_restore($item['id']);
                    }
                    
                }
	}        
	public function pass(){
            $this->load->model('backup_model', 'backup');
            
            $xml = simplexml_load_file('http://pdcheck.ru/identity/ruspassport/issuers?xml');
            //var_dump($xml);
            foreach($xml->children() as $key){               
                //if( empty($key['end_date']) ){ $key['end_date']='0000-00-00'; }
                //echo $key['id'] .' '. $key['code'].' '. $key['title'].' '. $key['end_date'].'<br/>';
                
                echo $backup = $this->backup->pass($key);
            }            
	}        
} 