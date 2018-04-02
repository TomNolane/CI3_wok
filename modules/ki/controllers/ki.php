<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class ki extends MX_Controller{
	public function __construct(){
		parent::__construct();
		
		$this->load->helper('url');
		//$this->load->helper('permissions');
		$this->load->database();
	}
	public function index(){
		$this->output();
	}
	public function pay($ki){
            $this->load->model('forms_model', 'forms');
            $data = $this->forms->get($ki);
            
            $username = 'egorbabakov92@gmail.com';
            $password = 'n1994k1992';
            /*
                Данные клиента на которого делается запрос:
                first_name - Имя клиента
                middle_name - Отчество клиента
                second_name - Фамилия клиента
                passport - серия и номер паспорта (слитно без пробелов, 10 цифр)
                passport_date - дата выдачи паспорта в формате YYYY-MM-DD
                dob - дата рождения в формате YYYY-MM-DD
            */
            $post_data_array = array(
               'first_name' => $data['i'],
               'middle_name'=> $data['o'],
               'second_name'=> $data['f'],
               'passport' => str_replace(" ","",$data['passport']),
               'passport_date' => $data['passport_date'],
               'dob' => $data['birth']
            );
            $post_data = http_build_query($post_data_array);
            $http_headers =  array(
                'Content-Type: application/x-www-form-urlencoded',
                'Content-Length: ' . strlen($post_data)
            );
            $ch = curl_init('https://unicom24.ru/api/partners/rfh/v1/request/');
            curl_setopt($ch, CURLOPT_POST, 1 );
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST" );
            curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data );
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true );
            curl_setopt($ch, CURLOPT_USERPWD, $username . ":" . $password );
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER , false );
            curl_setopt($ch, CURLOPT_HTTPHEADER, $http_headers);
            $result = curl_exec($ch);
            if(!$result) {
                curl_error($ch);
            } else {
                $output_var = json_decode($result);
                //var_dump($output_var);
                //exit;
            }
            //echo $output_var->pdf_link;
            
            $CurlConnect = curl_init();
            curl_setopt($CurlConnect, CURLOPT_URL, $output_var->pdf_link);
            curl_setopt($CurlConnect, CURLOPT_POST,   0);
            curl_setopt($CurlConnect, CURLOPT_RETURNTRANSFER, 1 );
                //curl_setopt($CurlConnect, CURLOPT_POSTFIELDS, $request);
            curl_setopt($CurlConnect, CURLOPT_USERPWD, $username.':'.$password);
            $Result = curl_exec($CurlConnect);

            header('Cache-Control: public'); 
            header('Content-type: application/pdf');
            header('Content-Disposition: attachment; filename="new.pdf"');
            header('Content-Length: '.strlen($Result));

            echo $Result;

            
            
            
            $this->output($data);
	}
	private function output($data){
                //print_r($data);
		$data['template'] = 'ki';
                $data['f'] = $data['f'];
		$this->load->view('template', $data);
	}
}