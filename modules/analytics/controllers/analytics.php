<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Analytics extends MX_Controller{
    
    public $databases = array('default','second','nalihka');
    
    public function __construct(){
	parent::__construct();
        
        error_reporting(E_ALL & ~E_NOTICE);
        
	$this->load->helper('url');
	$this->load->helper('permissions');
		
	if (!logged_in() && !is_admin()){
            $identity = $this->config->item('identity', 'ion_auth');
            $this->session->set_userdata($identity, false);
            redirect('/login/?from='.uri_string());
	}	
        $this->load->database();
        $this->load->model('analytics_model', 'forms');       

    }
    public function index($utm = null, $date = null){
        $i=0;
        $date ? null : $date = date('Y-m-d');
        $utm ? null : $utm = 'all';
        $data = array();
        
        foreach ($this->databases as $bdname){
            $forms = $this->forms->forms($bdname, $utm, $date);
            array_push($data, $forms);
        }
        //print_r($data);  
        
        $data = array(
            'data' => $data,
            'utm' => $utm,
            'date' => $date
        );
        
        $this->load->view('/main/header.php');
        $this->load->view('/main/nav.php');
        $this->load->view('/main/sidebar.php');
        $this->load->view('/main/body.php', $data);
        $this->load->view('/main/footer.php');
    }
    public function formstat($formid, $site){
        
        switch ($site) {
            case 'bzaim5.ru': $bdname='default'; break;
            case 'dengimo.ru': $bdname='default'; break;
            case 'dengoman.ru': $bdname='default'; break;
            case 'edenga.ru': $bdname='second'; break;
            case 'rublimo.ru': $bdname='second'; break;
            case 'vkredito.ru': $bdname='second'; break; 
            case 'dengibystra.ru': $bdname='nalihka'; break; 
        } 
        $forms = $this->forms->formstat($bdname, $formid);   
        $data = array(
            'data' => $forms
        );      
        $this->load->view('/main/header.php');
        $this->load->view('/main/nav.php');
        $this->load->view('/main/sidebar.php');
        $this->load->view('/formstat/body.php', $data);
        $this->load->view('/formstat/footer.php');
    }    
    public function dashboard(){
        $data = array(
            'data' => ''
        );        
        $this->load->view('/main/header.php');
        $this->load->view('/main/nav.php');
        $this->load->view('/main/sidebar.php');
        $this->load->view('/dashboard/body.php', $data);
        $this->load->view('/dashboard/footer.php');
    }    
    public function api($date = null){
        if(empty($date)){$date = date('Y-m-d');}else{$date = date('Y-m-d', strtotime("-1 day", strtotime($date)));}
        $i=0;
        $data = array();        
        $g = array();
        
        foreach ($this->databases as $bdname){
            $i++;
            $forms = $this->forms->api($bdname, $date);
            $gates = $this->forms->getgate($bdname);
            
            foreach ($forms as $f){
                foreach ($gates as $gate){
                    if ( $f[$gate['gate'].'_status'] == 1){$g[$i][$gate['gate']]['1']++;}
                    if ( $f[$gate['gate'].'_status'] == 2){$g[$i][$gate['gate']]['2']++;}
                }                
            }            
        }
        //print_r($g);
        $keys = array_keys($g[2]);
        
        foreach ($keys as $gate){
            foreach ($g as $gg){
                $d[$gate]['1'] += $gg[$gate]['1'];
                $d[$gate]['2'] += $gg[$gate]['2'];
            }
        }
//      print_r($data);
        $dd = array(
            'date' => $date,
            'd' => $d
        );
        
        $this->load->view('/main/header.php');
        $this->load->view('/main/nav.php');
        $this->load->view('/main/sidebar.php');
        $this->load->view('/api/body.php', $dd);
        $this->load->view('/api/footer.php');
    }    
    public function apiupdate($date){
        $date = date('Y-m-d', strtotime("-1 day", strtotime($date)));
        $i=0;
        $data = array();        
        $g = array();
        foreach ($this->databases as $bdname){
            $i++;
            $forms = $this->forms->api($bdname, $date);
            $gates = $this->forms->getgate($bdname);
            
            foreach ($forms as $f){
                foreach ($gates as $gate){
                    if ( $f[$gate['gate'].'_status'] == 1){$g[$i][$gate['gate']]['1']++;}
                    if ( $f[$gate['gate'].'_status'] == 2){$g[$i][$gate['gate']]['2']++;}
                }                
            }            
        }
        //print_r($g);
        $keys = array_keys($g[2]);
        foreach ($keys as $gate){
            foreach ($g as $gg){
                $d[$gate]['1'] += $gg[$gate]['1'];
                $d[$gate]['2'] += $gg[$gate]['2'];
            }
        }
//      print_r($data);
        $dd = array(
            'date' => $date,
            'd' => $d
        );     
        $dd = json_encode($dd);
        print_r($dd);
    }
    
    public function form(){
        
        $traffic = array('0','1','2','3','4');
        
        foreach ($this->databases as $bdname){
            $forms = $this->forms->form($bdname,date('Y-m-d'));
            
            //print_r($forms);
            
            foreach ($forms as $item){
                $traffic[$item['page']]++;
            }
            
        }
//      print_r($traffic);
//      print_r($data);
        $dd = array(
            'date' => date('Y-m-d'),
            'd' => $traffic
        );
        
        $this->load->view('/main/header.php');
        $this->load->view('/main/nav.php');
        $this->load->view('/main/sidebar.php');
        $this->load->view('/form/body.php', $dd);
        $this->load->view('/form/footer.php');
    }    
    
    public function formupdate($date){
        $date = date('Y-m-d', strtotime("-1 day", strtotime($date)));
        $traffic = array('0','1','2','3','4');
        foreach ($this->databases as $bdname){
            $forms = $this->forms->form($bdname, $date);
            foreach ($forms as $item){
                $traffic[$item['page']]++;
            }            
        }
        $dd = array(
            'date' => $date,
            'd' => $traffic
        );
        $dd = json_encode($dd); 
        print_r($dd);
    }
    public function pixel(){        
        foreach ($this->databases as $bdname){
            $pixel = $this->forms->pixel($bdname,date('Y-m-d'));
            foreach ($pixel as $item){
                $p[$item['pixel']]++;
            }
        }
        asort($p);
        $dd = array(
            'date' => date('Y-m-d'),
            'd' => $p
        );
        $this->load->view('/main/header.php');
        $this->load->view('/main/nav.php');
        $this->load->view('/main/sidebar.php');
        $this->load->view('/pixel/body.php', $dd);
        $this->load->view('/pixel/footer.php');
    }    
    public function pixelupdate($date){        
        $date = date('Y-m-d', strtotime("-1 day", strtotime($date)));
        foreach ($this->databases as $bdname){
            $pixel = $this->forms->pixel($bdname,$date);
            foreach ($pixel as $item){
                $p[$item['pixel']]++;
            }
        }
        asort($p);
        $dd = array(
            'date' => $date,
            'd' => $p
        );
        $dd = json_encode($dd); 
        print_r($dd);
    }    
}