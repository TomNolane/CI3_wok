<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard_new extends MX_Controller{
    public function __construct(){
	parent::__construct();
	error_reporting(0);	
        /*
	$this->load->helper('url');
	$this->load->helper('permissions');
		
	if (!logged_in() && !is_admin()){
            $identity = $this->config->item('identity', 'ion_auth');
            $this->session->set_userdata($identity, false);
            redirect('/login/?from='.uri_string());
	}
         * 
         */	
        $this->load->database();
    }
	
    public function index($date1=null, $date2=null){
        $this->load->model('forms_model', 'forms');
        $forms = $this->forms->forms($date1, $date2);       
        //print_r($forms);
        $output = array();
               
        foreach ($forms as $item){
        
            parse_str($item['referer'], $output);
            if(isset($output['utm_source'])){
                switch ($output['utm_source']) {
                    case 'direct': $site[$item['site']]['direct']['count']++; $site[$item['site']]['direct'][$item['step']]++; break;
                    case 'mytarget': $site[$item['site']]['mytarget']['count']++; $site[$item['site']]['mytarget'][$item['step']]++; break;
                    case 'vk': $site[$item['site']]['vk']['count']++; $site[$item['site']]['vk'][$item['step']]++; break;
                    case 'adwords': $site[$item['site']]['adwords']['count']++; $site[$item['site']]['adwords'][$item['step']]++; break;                
                    case 'SendPulse': $site[$item['site']]['sendpulse']['count']++; $site[$item['site']]['sendpulse'][$item['step']]++; break;
                    default: break;
                }
            }else{
                $utm = ''; 
            }            
        }
        
        $data = array(
            'data' => $forms, 
            'site' => $site,            
            'date1' => $date1,
            'date2' => $date2
        );

        $this->load->view('/dashboard/header.php');
        $this->load->view('/dashboard/nav.php');    
        $this->load->view('/dashboard/sidebar.php');    
        $this->load->view('/dashboard/body.php', $data);
        $this->load->view('/dashboard/footer.php');    
    }
    
    public function forms($date1=null, $date2=null, $site=null){
        $this->load->model('forms_model', 'forms');
        $forms = $this->forms->form($date1, $date2);
        $data = array(
            'data' => $forms, 
            'site' => $site,            
            'date1' => $date1,
            'date2' => $date2
        );
        $this->load->view('/dashboard/header.php');
        $this->load->view('/dashboard/nav.php');    
        $this->load->view('/dashboard/sidebar.php');    
        $this->load->view('/form/body.php', $data);
        $this->load->view('/form/footer.php');
    }
    public function forms_stat_update(){
        $this->load->model('forms_model', 'forms');
        $forms = $this->forms->form_status($_POST['id']);
        $forms = json_encode($forms);
        echo($forms);
        //return $forms;
        
    }
    public function vk($date1=null, $date2=null){
        $Ads = array();
        $i=0;
        isset($date1) ? $date1 : $date1 = date('Y-m-d', strtotime('-4 days'));
        isset($date2) ? $date2 : $date2 = date('Y-m-d');
        $this->load->model('forms_model', 'forms');
        $forms = $this->forms->source('vk', $date1=null, $date2=null);    
        $this->load->library('vk');
        
        $getAds = $this->vk->get_query('ads.getAds', array(
            'account_id' => 1900002205,
            'client_id' => 1603989980,
            'access_token' => '34d15ab351f9cd1719d206d830a73474eda44d3d9f15aa83846ecb337166aad4f4a48615870ef75f2749e'
        ));
                
        if($getAds[0]['id']){
            foreach ($getAds as $ad){
                $i++;
                $getStatistics = $this->vk->get_query('ads.getStatistics', array(
                    'account_id' => 1900002205,
                    'ids_type' => 'ad',
                    'ids' => $ad['id'],
                    'period' => 'overall',
                    'date_from' => '0',
                    'date_to' => '0',
                    'access_token' => '34d15ab351f9cd1719d206d830a73474eda44d3d9f15aa83846ecb337166aad4f4a48615870ef75f2749e'
                ));
                //print_r($getStatistics);
                if(isset($getStatistics[0]['stats'][0]['impressions'])){
                    $Ads[$i] = array(
                        'id' => $ad['id'],
                        'campaign_id' => $ad['id'],
                        'name' => $ad['name'],
                        'status' => $ad['status'],
                        'approved' => $ad['approved'],
                        'all_limit' => $ad['all_limit'],
                        'cost_type' => $ad['cost_type'],
                        'cpc' => (isset($ad['cpc']) ? $ad['cpc'] : 0),
                        'day_from' => $getStatistics[0]['stats'][0]['day_from'],
                        'day_to' => $getStatistics[0]['stats'][0]['day_to'],
                        'spent' => $getStatistics[0]['stats'][0]['spent'],
                        'impressions' => $getStatistics[0]['stats'][0]['impressions'],
                        'clicks' => (isset($getStatistics[0]['stats'][0]['clicks']) ? $getStatistics[0]['stats'][0]['clicks'] : 0),
                    );                    
                }
                sleep(1);
            }                   
        }
        
        $vk = array('Ads' => $Ads);        
        $data = array('data' => $forms, 'vk' => $vk, 'date1' => $date1, 'date2' => $date2);
        
        $this->load->view('/dashboard/header.php');
        $this->load->view('/dashboard/nav.php');    
        $this->load->view('/dashboard/sidebar.php');    
        $this->load->view('/source/vk/body.php', $data);
        $this->load->view('/source/vk/footer.php', $data);    
    }  
    public function direct($date1=null, $date2=null){
        $this->load->model('forms_model', 'forms');
        $forms = $this->forms->source('direct',$date1, $date2);
        $stat = $this->forms->direct_get($date1, $date2);
         
        $data = array('data' => $forms, 'direct'=> $stat, 'date1' => $date1, 'date2' => $date2);
        $this->load->view('/dashboard/header.php');
        $this->load->view('/dashboard/nav.php');    
        $this->load->view('/dashboard/sidebar.php');    
        $this->load->view('/source/direct/body.php', $data);
        $this->load->view('/source/direct/footer.php');    
    }     

    public function direct_ids($token){
        $method = 'get';
        $params = array(
                "SelectionCriteria" => array('Ids'=>array(), 'Types'=>array(), 'States'=>array('ON'), 'Statuses'=>array(), 'StatusesPayment' => array()),
                "FieldNames" => array('Id', 'Name')
        );    
        $request = array(
                'method'=> $method,
                'params'=> $params,
                'locale'=> 'ru',
        );
        $request = json_encode($request);     
        
            $opts = array(
                'http'=>array(
                    'header' => "Content-Type: application/x-www-form-urlencoded\r\n".
                        "Authorization: Bearer $token\r\n".
                        "Accept-Language: ru",
                    'method'=>"POST",
                    'content'=>$request,
                )
            );
            $context = stream_context_create($opts);
            $result = file_get_contents('https://api.direct.yandex.com/json/v5/campaigns', 0, $context);            
            
            return $result = json_decode($result);                   
    }    

    public function direct_token(){
        // Идентификатор приложения
        $client_id = '7dab88adfa76411cbddd925fa2e1d2f0'; 
        // Пароль приложения
        $client_secret = 'ab943f21c73140a380e4097b1db83440';
        // Если скрипт был вызван с указанием параметра "code" в URL,
        // то выполняется запрос на получение токена
        if (isset($_GET['code']))
          {
            // Формирование параметров (тела) POST-запроса с указанием кода подтверждения
            $query = array(
              'grant_type' => 'authorization_code',
              'code' => $_GET['code'],
              'client_id' => $client_id,
              'client_secret' => $client_secret
            );
            $query = http_build_query($query);
            // Формирование заголовков POST-запроса
            $header = "Content-type: application/x-www-form-urlencoded";
            // Выполнение POST-запроса и вывод результата
            $opts = array('http' =>
              array(
              'method'  => 'POST',
              'header'  => $header,
              'content' => $query
              ) 
            );
            $context = stream_context_create($opts);
            $result = file_get_contents('https://oauth.yandex.ru/token', false, $context);
            $result = json_decode($result);
            // Токен необходимо сохранить для использования в запросах к API Директа
            echo $result->access_token;
          }
            // https://oauth.yandex.ru/authorize?response_type=token&client_id=7dab88adfa76411cbddd925fa2e1d2f0         
    } 
    public function cron_direct($token, $date){
        error_reporting(1);
        $this->load->model('forms_model', 'forms');
        $id = array();
        $i=0;
        $tokens = array(
            //'AQAAAAAA1X9EAAQYzlbM-S-WJkMbpWX-y3y_aS8', //мой
            'AQAAAAAVu1eZAAQYzoD_ssL2NU5_sn3ubr0Pk2k', // rk34882
            'AQAAAAAYh2E9AAQYzqGmCE75ck7Xme17dNu-8U8', // rk34882-2
            'AQAAAAAY-q18AAQYzsTTVOX49kWZj5O1VfZS5xk', // rk34882-3
            'AQAAAAAZKEReAAQYzjiFnlK-T0Gdp2dG8s3d4FM'  // rk34882-4
        );
        $ids = $this->direct_ids($token);
        
        //print_r($ids);
        
        foreach ($ids->result->Campaigns as $Campaign){
            //$id[$i++] = $Campaign->Id;
            $name = trim(preg_replace('/№\d/','',$Campaign->Name));
            switch ($name) {
                case "Рублимо": $name='Rublimo'; break;
                case "вкредито":  $name='vkredito';  break;
                case "Быстрый займ": $name='Bz';  break;
            }
            
            $method = 'GetSummaryStat';
            $params = array(
                            'CampaignIDS' => array($Campaign->Id),
                            'StartDate' => $date,
                            'EndDate' => $date
            );
            $request = array(
                            'token'=> $token,
                            'method'=> $method,
                            'param'=> $params,
                            'locale'=> 'ru',
            );
            $opts = array(
                            'http'=>array(
                                'header' => "Content-Type: application/x-www-form-urlencoded\r\n".
                                "Authorization: Bearer $token\r\n".
                                "Accept-Language: ru",
                                'method'=>"POST",
                                'content'=>json_encode($request),
                            )
            );
            $context = stream_context_create($opts);
            $result = file_get_contents('https://api.direct.yandex.ru/v4/json/', 0, $context);          
            $result = json_decode($result);
            
            //print_r($result->data[0]);
            
            echo $data = $this->forms->direct_add($result->data[0], $name, $token);
        }
    }

    public function metrika(){
        error_reporting(1);    
        if( $curl = curl_init() ) {
          curl_setopt($curl, CURLOPT_URL, 'https://api-metrika.yandex.ru/stat/v1/data?ids=39828725&metrics=ym:s:visits,ym:s:goal%3Cgoal_id%3Ereaches,ym:s:users,ym:s:bounceRate,ym:s:pageDepth,ym:s:avgVisitDurationSeconds&dimensions=ym:s:%3Cattribution%3EDirectClickOrder,ym:s:%3Cattribution%3EDirectClickBanner,ym:s:%3Cattribution%3EDirectPhraseOrCond,ym:s:%3Cattribution%3EDirectSearchPhrase&goal_id=23585055&date1=2017-03-19&date2=2017-03-19&oauth_token=AQAAAAAA1X9EAAQYzlbM-S-WJkMbpWX-y3y_aS8');
          curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
          curl_setopt($curl, CURLOPT_POST, false);
          $response = json_decode(curl_exec($curl));
          
          print_r($response -> data);
          curl_close($curl);
        }       
        
        foreach ($response -> data as $item){
            //print_r($item);
            echo $item->dimensions[1]->name.' '.$item->dimensions[2]->name.' '.$item->metrics[1].'<br/>';
        }
        
    }
    
    public function test(){
        for($i=1; $i<=9; $i++){
            echo $result = file_get_contents('http://edenga.ru/dashboard_new/cron_direct/AQAAAAAY-q18AAQYzsTTVOX49kWZj5O1VfZS5xk/2017-03-0'.$i); 
            sleep(2);            
        }
        for($i=10; $i<=20; $i++){
            echo $result = file_get_contents('http://edenga.ru/dashboard_new/cron_direct/AQAAAAAY-q18AAQYzsTTVOX49kWZj5O1VfZS5xk/2017-03-'.$i); 
            sleep(2);            
        } 
        
        for($i=1; $i<=9; $i++){
            echo $result = file_get_contents('http://edenga.ru/dashboard_new/cron_direct/AQAAAAAZKEReAAQYzjiFnlK-T0Gdp2dG8s3d4FM/2017-03-0'.$i); 
            sleep(2);            
        }
        for($i=10; $i<=20; $i++){
            echo $result = file_get_contents('http://edenga.ru/dashboard_new/cron_direct/AQAAAAAZKEReAAQYzjiFnlK-T0Gdp2dG8s3d4FM/2017-03-'.$i); 
            sleep(2);            
        }        
    }
    
    public function market($date1=null, $date2=null, $site=null, $referrer=null){
        
        isset($date1) ? $date1 : $date1 = date('Y-m-d', strtotime('-4 days'));
        isset($date2) ? $date2 : $date2 = date('Y-m-d');
        isset($site) ? $site : $site = 'all';
        isset($referrer) ? $referrer : $referrer = 'all';        
        
        $this->load->model('forms_model', 'forms');
        $forms = $this->forms->forms_stat($date1, $date2, $site, $referrer);
        //print_r($forms);              
        $dateold = 0;
        $i=0;
        $l = array();
        foreach ($forms as $item){
            if( date('Y-m-d', strtotime($item['date'])) == $dateold ){
                $l[$item['gate']][$item['gate_status']]++;
            } else {
                $d[$i++] = array('date'=>$dateold, 'l'=>$l);              
                unset($l);
            }
            $dateold = date('Y-m-d', strtotime($item['date']));           
        }
        $d[$i++] = array('date'=>$dateold, 'l'=>$l);
        unset($d[0]);     
        
        $data = array(
            'data' => $d, 
            'site' => $site,
            'referrer' => $referrer,
            'date1' => $date1,
            'date2' => $date2
        );
        $this->load->view('/dashboard/header.php');
        $this->load->view('/dashboard/nav.php');    
        $this->load->view('/dashboard/sidebar.php');    
        $this->load->view('/market/body.php', $data);
        $this->load->view('/market/footer.php', $data);
    }
    public function update_market($date1=null, $date2=null, $site=null, $referrer=null){
  
        $date2 = $_POST['date1'];
        $date1 = date('Y-m-d', (strtotime($_POST['date1']) - 86400) ); //432000
        
        isset($date1) ? $date1 : $date1 = date('Y-m-d', strtotime('-4 days'));
        isset($date2) ? $date2 : $date2 = date('Y-m-d');
        isset($site) ? $site : $site = 'all';
        isset($referrer) ? $referrer : $referrer = 'all';        
        
        $this->load->model('forms_model', 'forms');
        $forms = $this->forms->forms_stat($date1, $date2, $site, $referrer);
        //print_r($forms);              
        $dateold = 0;
        $i=0;
        $l = array();
        foreach ($forms as $item){
            if( date('Y-m-d', strtotime($item['date'])) == $dateold ){
                $l[$item['gate']][$item['gate_status']]++;
            } else {
                $d[$i++] = array('date'=>$dateold, 'l'=>$l);              
                unset($l);
            }
            $dateold = date('Y-m-d', strtotime($item['date']));           
        }
        $d[$i++] = array('date'=>$dateold, 'l'=>$l);
        unset($d[0]);     
        
        $data = array(
            'data' => $d, 
            'site' => $site,
            'referrer' => $referrer,
            'date1' => $date1,
            'date2' => $date2
        );
        $data = json_encode($data);
        print_r ($data);        
    } 
    
    
    public function market21($date1=null, $date2=null, $site=null, $referrer=null){
        
        isset($date1) ? $date1 : $date1 = date('Y-m-d', strtotime('-4 days'));
        isset($date2) ? $date2 : $date2 = date('Y-m-d');
        isset($site) ? $site : $site = 'all';
        isset($referrer) ? $referrer : $referrer = 'all';        
        
        $this->load->model('forms_model', 'forms');
        $forms = $this->forms->forms_stat21($date1, $date2, $site, $referrer);
        //print_r($forms);
        $dateold = 0;
        $i=0;
        $l = array();
        foreach ($forms as $item){
            if( date('Y-m-d', strtotime($item['date'])) == $dateold ){
                $l[$item['gate']][$item['gate_status']]++;
            } else {
                $d[$i++] = array('date'=>$dateold, 'l'=>$l);              
                unset($l);
            }
            $dateold = date('Y-m-d', strtotime($item['date']));           
        }
        $d[$i++] = array('date'=>$dateold, 'l'=>$l);
        unset($d[0]);     
        
        $data = array(
            'data' => $d, 
            'site' => $site,
            'referrer' => $referrer,
            'date1' => $date1,
            'date2' => $date2
        );
        $this->load->view('/dashboard/header.php');
        $this->load->view('/dashboard/nav.php');    
        $this->load->view('/dashboard/sidebar.php');    
        $this->load->view('/market21/body.php', $data);
        $this->load->view('/market21/footer.php', $data);
    }    
    
    
    public function pixel($date1=null, $date2=null, $site=null){
        
        isset($date1) ? $date1 : $date1 = date('Y-m-d', strtotime('-4 days'));
        isset($date2) ? $date2 : $date2 = date('Y-m-d');
        isset($site) ? $site : $site = 'all';        
        
        $this->load->model('forms_model', 'forms');
        $pixel = $this->forms->pixel($date1, $date2, $site);
        //print_r($pixel);              
        $p = array();
        $dateold = 0;
        $i=0;
        foreach ($pixel as $item){
            if( date('Y-m-d', strtotime($item['date'])) == $dateold ){               
                $p[$item['site']][$item['pixel']]++;
            } else {               
                $d[$i++] = array('date'=>$dateold, 'data'=>$p);              
                unset($p);
            }
            $dateold = date('Y-m-d', strtotime($item['date']));           
        }
        $d[$i++] = array('date'=>$dateold, 'data'=>$p);
        unset($d[0]);      
        
        $data = array(
            'data' => $d, 
            'site' => $site,
            'date1' => $date1,
            'date2' => $date2
        );

        $this->load->view('/dashboard/header.php');
        $this->load->view('/dashboard/nav.php');    
        $this->load->view('/dashboard/sidebar.php');    
        $this->load->view('/pixel/body.php', $data);
        $this->load->view('/pixel/footer.php', $data);
    }
    public function time($date1=null, $date2=null, $site=null){
        
        isset($date1) ? $date1 : $date1 = date('Y-m-d', strtotime('-4 days'));
        isset($date2) ? $date2 : $date2 = date('Y-m-d');
        isset($site) ? $site : $site = 'all';        
        
        $this->load->model('forms_model', 'forms');
        $pixel = $this->forms->time($date1, $date2, $site);
        //print_r($pixel);              
        $p = array();
        $dateold = 0;
        $i=0;
        foreach ($pixel as $item){
            if( date('Y-m-d', strtotime($item['date'])) == $dateold ){
                $p['time1'] += $item['time1'];
                $p['time2'] += $item['time2'];
                $p['time3'] += $item['time3'];
                $p['count']++;
            } else {               
                $d[$i++] = array('date'=>$dateold, 'data'=>$p);              
                unset($p);
            }
            $dateold = date('Y-m-d', strtotime($item['date']));           
        }
        $d[$i++] = array('date'=>$dateold, 'data'=>$p);
        unset($d[0]);      
        
        $data = array(
            'data' => $d, 
            'site' => $site,
            'date1' => $date1,
            'date2' => $date2
        );

        $this->load->view('/dashboard/header.php');
        $this->load->view('/dashboard/nav.php');    
        $this->load->view('/dashboard/sidebar.php');    
        $this->load->view('/time/body.php', $data);
        $this->load->view('/time/footer.php', $data);
    }   
    public function turn($gate=null){
        $this->load->model('forms_model', 'forms');
        $turn = $this->forms->turn($gate);
        //print_r($mail); 
        
        $data = array(
            'data' => $turn
        );        
        
        $this->load->view('/dashboard/header.php');
        $this->load->view('/dashboard/nav.php');    
        $this->load->view('/dashboard/sidebar.php');    
        $this->load->view('/turn/body.php', $data);
        $this->load->view('/turn/footer.php', $data);
    }   
    public function request($forms_id = null){
        $this->load->model('forms_model', 'forms');
        $request = $this->forms->request($forms_id);
        //print_r($mail); 
        
        $data = array(
            'data' => $request
        );        
        
        $this->load->view('/dashboard/header.php');
        $this->load->view('/dashboard/nav.php');    
        $this->load->view('/dashboard/sidebar.php');    
        $this->load->view('/request/body.php', $data);
        $this->load->view('/request/footer.php', $data);
    }    
    public function mail(){
        $this->load->model('forms_model', 'forms');
        $mail = $this->forms->mail_settings();
        //print_r($mail); 
        
        $data = array(
            'data' => $mail
        );        
        
        $this->load->view('/dashboard/header.php');
        $this->load->view('/dashboard/nav.php');    
        $this->load->view('/dashboard/sidebar.php');    
        $this->load->view('/mail/body.php', $data);
        $this->load->view('/mail/footer.php', $data);
    }
    public function mail_generation(){
        $this->load->view('/dashboard/header.php');
        $this->load->view('/dashboard/nav.php');    
        $this->load->view('/dashboard/sidebar.php');    
        $this->load->view('/mailgeneration/body.php', $data);
        $this->load->view('/mailgeneration/footer.php', $data);
    }    
    public function step($date1=null, $date2=null, $site=null){
        
        isset($date1) ? $date1 : $date1 = date('Y-m-d', strtotime('-4 days'));
        isset($date2) ? $date2 : $date2 = date('Y-m-d');
        isset($site) ? $site : $site = 'all';        
        
        $this->load->model('forms_model', 'forms');
        $step = $this->forms->forms($date1, $date2, $site);
        //print_r($pixel);              
        $p = array();
        $dateold = 0;
        $i=0;
        foreach ($step as $item){
            if( date('Y-m-d', strtotime($item['create_date'])) == $dateold ){               
                $p[$item['step']]++;
            } else {               
                $d[$i++] = array('date'=>$dateold, 'data'=>$p);              
                unset($p);
            }
            $dateold = date('Y-m-d', strtotime($item['create_date']));           
        }
        $d[$i++] = array('date'=>$dateold, 'data'=>$p);
        unset($d[0]);
//
        $pixel = $this->forms->pixel($date1, $date2, $site);
        //print_r($pixel);
        $px = array();
        $dold = 0;
        $j=0;
        foreach ($pixel as $i){
            if( date('Y-m-d', strtotime($i['date'])) == $dold ){               
                $px[$i['site']][$i['pixel']]++;
            } else {               
                $dx[$j++] = array('date'=>$dold, 'data'=>$px);              
                unset($px);
            }
            $dold = date('Y-m-d', strtotime($i['date']));           
        }
        $dx[$j++] = array('date'=>$dold, 'data'=>$px);
        unset($dx[0]);
        $ddx = array('step'=>$d, 'pixel'=>$dx);
//        
        $data = array(
            'data' => $ddx,
            'site' => $site,
            'date1' => $date1,
            'date2' => $date2
        );

        $this->load->view('/dashboard/header.php');
        $this->load->view('/dashboard/nav.php');    
        $this->load->view('/dashboard/sidebar.php');    
        $this->load->view('/step/body.php', $data);
        $this->load->view('/step/footer.php', $data);
    }
    public function js(){
        $this->load->model('forms_model', 'forms');
        $site = $this->forms->site_settings();
        //print_r($mail); 
        
        $data = array(
            'data' => $site
        );        

        $this->load->view('/dashboard/header.php');
        $this->load->view('/dashboard/nav.php');    
        $this->load->view('/dashboard/sidebar.php');    
        $this->load->view('/js/body.php', $data);
        $this->load->view('/js/footer.php', $data);
    }
    public function questions(){
        $this->load->model('forms_model', 'forms');
        $questions = $this->forms->get_questions();
        //print_r($questions); 
        
        $data = array(
            'data' => $questions
        );        

        $this->load->view('/dashboard/header.php');
        $this->load->view('/dashboard/nav.php');    
        $this->load->view('/dashboard/sidebar.php');    
        $this->load->view('/questions/body.php', $data);
        $this->load->view('/questions/footer.php', $data);
    }    
    public function popup_settings(){
        $this->load->model('forms_model', 'forms');
        $id = preg_replace('^\D+^','',$_POST['id']);
        $data = array($_POST['query'] => $_POST['data']);
        $this->forms->popup_settings($id,$data);         
    }
    public function gate_mail(){
        $this->load->model('forms_model', 'forms');
        $gate = $this->forms->gate_settings();
        //print_r($mail); 
        
        $data = array(
            'data' => $gate
        );        

        $this->load->view('/dashboard/header.php');
        $this->load->view('/dashboard/nav.php');
        $this->load->view('/dashboard/sidebar.php');
        $this->load->view('/gate_mail/body.php', $data);
        $this->load->view('/gate_mail/footer.php', $data);
    }
    public function gate_delay(){
        $this->load->model('forms_model', 'forms');
        $gate = $this->forms->gate_settings();
        //print_r($mail); 
        
        $data = array(
            'data' => $gate
        );        

        $this->load->view('/dashboard/header.php');
        $this->load->view('/dashboard/nav.php');
        $this->load->view('/dashboard/sidebar.php');
        $this->load->view('/gate_delay/body.php', $data);
        $this->load->view('/gate_delay/footer.php', $data);
    }    
    public function gate_settings(){
        $this->load->model('forms_model', 'forms');
        $data = array($_POST['query'] => $_POST['data']);
        $this->forms->gate_settings_update($_POST['id'],$data);         
    }    
    
}