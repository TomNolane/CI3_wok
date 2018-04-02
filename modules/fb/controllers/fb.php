<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Fb extends MX_Controller{
    
    public function index($str){
        $this->load->library('email');                
        $mail_settings = array(
            "protocol" => "smtp",
            "smtp_host" => "ssl://smtp.yandex.ru",
            "smtp_user" => "vasiljevalentin@yandex.ru",
            "smtp_pass" => "sms_93_ZAK_322ZAK934",
            "smtp_port" => 465,
            "mailtype" => "html",
            "charset" => "utf-8"
        );           
        $this->email->initialize($mail_settings);               
        $this->email->from('vasiljevalentin@yandex.ru');			
        $this->email->to('vasiljevalentin@yandex.ru');
        $this->email->subject('fb');
        $this->email->message( $str );
        $this->email->send();        
    }
    
}