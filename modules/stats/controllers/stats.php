<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Stats extends MX_Controller
{
	public function __construct()
	{
		parent::__construct();
		
		$this->load->helper('url');
		$this->load->helper('permissions');
		
		if (!logged_in() && !is_admin())
		{
			$identity = $this->config->item('identity', 'ion_auth');
			$this->session->set_userdata($identity, false);
			redirect('/login/?from='.uri_string());
		}
		
		$this->load->database();
	}
        
	public function index($site=null, $date1=null, $date2=null){
            if($site == 'all'){$site=null;}
            if(empty($date1)){$date1=date('Y-m-d',strtotime("-14 days"));}
            if(empty($date2)){$date2=date('Y-m-d');}
            $this->load->model('stats_model', 'stats');
            $form = $this->stats->form($site, $date1, $date2);
            
            $d=1;
            $t=1; 
            $duplicate=0;
            $stack = array();
            foreach ($form as $item){
                $phone[$item['id']] = $item['phone'];                
            }
            $u_phone = array_unique($phone);            
            $p = array_diff_key($phone, $u_phone);
            
            foreach ($form as $item){
                if(isset($date) and ($date == $item['date'])){
                    //echo 'повтор даты';
                    $d++;
                    if (array_key_exists($item['id'], $p)) {
                        $t++;
                        $duplicate++;
                    }
                } elseif(isset($date) and ($date <> $item['date'])) {
                    $data = array(
                        "date" => $item['date'],
                        "count" => $d,
                        "duplicate" => $t
                    ); 
                    array_push($stack, $data); 
                    $d=1;
                    $t=1;
                }                
                $date = $item['date'];
            }
            
            $stack = array('data' => $stack, 'count' => count($form), 'duplicate' => $duplicate, 'site' => $site, 'date1' => $date1, 'date2' => $date2);         

            $this->load->view('/stats/header');
            $this->load->view('/stats/nav');
            $this->load->view('/stats/panels', $stack);
            $this->load->view('/stats/footer', $stack);            
	}
        
	public function form($site=null, $date1=null, $date2=null){
            if($site == 'all'){$site=null;}
            if(empty($date1)){$date1=date('Y-m-d',strtotime("-14 days"));}
            if(empty($date2)){$date2=date('Y-m-d');}            
            $this->load->model('stats_model', 'stats');
            $form = $this->stats->form($site, $date1, $date2);
            $d=1;
            $s0=0;
            $s1=0;
            $s2=0;
            $s3=0;
            $s0_sum=0;
            $s1_sum=0;
            $s2_sum=0;
            $s3_sum=0;
            
            $stack = array();
            //print_r($form);
            foreach ($form as $item){
                if(isset($date) and ($date == $item['date'])){
                    //echo 'повтор даты';
                    $d++;
                    
                    switch ($item['step']) {
                    case 0:
                        $s0++;
                        $s0_sum++;
                        break;                        
                    case 1:
                        $s1++;
                        $s1_sum++;
                        break;
                    case 2:
                        $s2++;
                        $s2_sum++;
                        break;
                    case 3:
                        $s3++;
                        $s3_sum++;
                        break;                    
                    default:
                        break;
                    }
                    
                } elseif(isset($date) and ($date <> $item['date'])) {
                    //echo $date.'('.$d.') '.$phone.'('.$t.')<br/>';
                    $data = array(
                        "date" => $item['date'],
                        "s0" => $s0,
                        "s1" => $s1,
                        "s2" => $s2,
                        "s3" => $s3
                    ); 
                    array_push($stack, $data); 
                    $d=1;
                    $s0=0;
                    $s1=0;
                    $s2=0;
                    $s3=0;
                }                
                //echo $date.'('.$d.') '.$item['phone'].'('.$t.')<br/>';
                $date = $item['date'];                
                //print_r($data);
               
            }
            //print_r($stack);
            //echo $item['date'].'('.$d.') '.$item['phone'].'('.$t.')<br/>'; 
            $stack = array('data' => $stack, 'count' => count($form), 's0_sum' => $s0_sum, 's1_sum' => $s1_sum, 's2_sum' => $s2_sum, 's3_sum' => $s3_sum, 'site' => $site, 'date1' => $date1, 'date2' => $date2);         
            //print_r($stack);
            //$this->load->view('admin', $stack);
            $this->load->view('/stats/header');
            $this->load->view('/stats/nav');
            $this->load->view('/stats/form/panels', $stack);
            $this->load->view('/stats/form/footer', $stack);
	}	
        
	public function unique($site=null, $date1=null, $date2=null){
            if($site == 'all'){$site=null;}
            if(empty($date1)){$date1=date('Y-m-d',strtotime("-14 days"));}
            if(empty($date2)){$date2=date('Y-m-d');}
            $this->load->model('stats_model', 'stats');
            $form = $this->stats->form($site, $date1, $date2);

            foreach ($form as $item){
                $phone[$item['id']] = $item['phone'];                
            }
            $u_phone = array_unique($phone);            
            $p = array_diff_key($phone, $u_phone);
            $p_count = array_count_values($p);

            $stack = array('form' => $form, 'count' => count($form), 'p' => $p, 'p_count' => $p_count, 'site' => $site, 'date1' => $date1, 'date2' => $date2);
            
            $this->load->view('/stats/header');
            $this->load->view('/stats/nav');
            $this->load->view('/stats/unique/panels', $stack);
            $this->load->view('/stats/unique/footer');            
	}
	public function history($phone=null, $date1=null, $date2=null){
            if(empty($date1)){$date1=date('Y-m-d',strtotime("-14 days"));}
            if(empty($date2)){$date2=date('Y-m-d');}
            $this->load->model('stats_model', 'stats');
            $form = $this->stats->history($phone, $date1, $date2);

            $stack = array('form' => $form, 'count' => count($form), 'phone' => $phone, 'date1' => $date1, 'date2' => $date2);
            
            $this->load->view('/stats/header');
            $this->load->view('/stats/nav');
            $this->load->view('/stats/history/panels', $stack);
            $this->load->view('/stats/history/footer', $stack);            
	}
       
	public function traffic($site=null, $date1=null, $date2=null){
            if($site == 'all'){$site=null;}
            if(empty($date1)){$date1=date('Y-m-d',strtotime("-14 days"));}
            if(empty($date2)){$date2=date('Y-m-d');}
            $this->load->model('stats_model', 'stats');
            $form = $this->stats->form($site, $date1, $date2);          
            //print_r($form);
            $countdate=1;
            $olddate=0;
            $newdate=0;
            $s0=0;
            $s1=0;
            $s2=0;
            $s3=0;
            $s0_sum=0;
            $s1_sum=0;
            $s2_sum=0;
            $s3_sum=0;    
            $mytarget=0;
            $direct=0;
            $YD=0;
            $email=0;            
            $stack = array(); 
            
            foreach ($form as $item){
                $newdate = $item['date'];
                
                if($olddate == $newdate){
                    $countdate++;                 
                    switch ($item['step']) {
                        case 0:
                            $s0++;
                            $s0_sum++;
                            break;                        
                        case 1:
                            $s1++;
                            $s1_sum++;
                            break;
                        case 2:
                            $s2++;
                            $s2_sum++;
                            break;
                        case 3:
                            $s3++;
                            $s3_sum++;
                            break;                    
                        default:
                            break;
                    }
                    
                    parse_str($item['referer'], $utm);
                    if(isset($utm['utm_source'])){
                        $utm = $utm['utm_source'];
                    }else{
                        $utm = ''; 
                    }
                    switch ($utm) {
                        case 'mytarget':
                            $mytarget++;
                            break;                        
                        case 'direct':
                            $direct++;
                            break;
                        case 'YD':
                            $YD++;
                            break;
                        case 'email':
                            $email++;
                            break;                    
                        default:
                            break;
                    }                    
                } elseif ( $olddate <> 0) {
                    $data = array(
                        "date" => $olddate,
                        "countdate" => $countdate,
                        "s0" => $s0,
                        "s1" => $s1,
                        "s2" => $s2,
                        "s3" => $s3,
                        "mytarget" => $mytarget,
                        "direct" => $direct,
                        "YD" => $YD,
                        "email" => $email
                    ); 
                    array_push($stack, $data);
                    $s0=0;
                    $s1=0;
                    $s2=0;
                    $s3=0;                    
                    $mytarget=0;
                    $direct=0;
                    $YD=0;
                    $email=0;                    
                    $countdate=1;
                }
                $olddate = $item['date'];
            }
            array_push($stack, array("date" => $item['date'],"countdate" => $countdate,"s0" => $s0,"s1" => $s1,"s2" => $s2,"s3" => $s3, "mytarget" => $mytarget, "direct" => $direct, "YD" => $YD, "email" => $email));        
            $stack = array('data' => $stack, 'count' => count($form), 'site' => $site, 'date1' => $date1, 'date2' => $date2);         
            //print_r($stack);
            $this->load->view('/stats/header');
            $this->load->view('/stats/nav');
            $this->load->view('/stats/traffic/panels', $stack);
            $this->load->view('/stats/traffic/footer', $stack);            
	}        
        
        
}