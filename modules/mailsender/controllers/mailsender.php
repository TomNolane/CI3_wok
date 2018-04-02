<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Mailsender extends MX_Controller
{
	public function Mailsender(){
                $this->load->helper('json');
		$this->load->library('email');
                $this->load->helper('idna');
                $this->load->model('mailsender_model', 'mailsender');
	}
        public function auto_feedback(){

            $feedback = $this->mailsender->get();
            
            if ($feedback){
                foreach ($feedback as $item){
                    //echo $item['name'].' '.$item['email'].'<br/>';
                        // Uppercase for first letter
                        $uname = $this->uname($item['name']); //uppercase
                        // /uppercase
                        
                        $settings = $this->settings();
                        $mail_settings = array(
                            "protocol" => "smtp",
                            "smtp_host" => "ssl://smtp.mail.ru",
                            "smtp_user" => $settings['smtp_user'],
                            "smtp_pass" => $settings['smtp_pass'],
                            "smtp_port" => 465,
                            "mailtype" => "html",
                            "charset" => "utf-8"
                        );           
                        $this->email->initialize($mail_settings);
                      
                        $this->email->from($settings['smtp_user'], $settings['domen']);	
                        //$this->email->to('vasiljevalentin@yandex.ru');   
                        $this->email->to($item['email']);
                        //$this->email->bcc('vasiljevalentin@yandex.ru');    
                        $this->email->subject($uname.', Вам подготовлен займ на карту VISA');
                        $this->email->message($this->load->view('feedback', $item, true));
                        
                        if ($this->email->send()){
                            echo 'Письмо отправлено';
                            $this->mailsender->update($item['id']);
                        } else {
                            echo $this->email->print_debugger();
                            echo('Не могу отправить сообщение. Свяжитесь с администратором сайта.');
                        }
                        
                    
                }
            } else {
                echo 'Очередь для рассылки пуста.';
            }
        }
        
        private function uname($uname){
            $first = mb_substr($uname,0,1, 'UTF-8');//первая буква
            $last = mb_substr($uname,1);//все кроме первой буквы
            $first = mb_strtoupper($first, 'UTF-8');
            $last = mb_strtolower($last, 'UTF-8');
            return $uname = $first.$last;    
        }
        
        public function welcome(){
            $get_settings = $this->mailsender->get_settings_welcome();
            //print_r($settings);
            if ($get_settings){
                foreach ($get_settings as $i){
                    //echo 'Название '.$item['name'].' Задержка '.$item['delay'].' Домены '.$item['domen'];                
                    $mail = $this->mailsender->welcome($i['delay']);
                    //print_r($mail);
                    if ($mail){
                        foreach ($mail as $item){
                            $settings = $this->set($i['domen']);
                            //print_r($item);
                                $domen = explode("@", $item['email']);
                                $uname = $this->uname($item['i']); //uppercase   
                                $this->email->from($settings['user'], $settings['domen']);			
                                //$this->email->to('vasiljevalentin@yandex.ru');
                                $this->email->to($item['email']);
                                //$this->email->bcc('vasiljevalentin@yandex.ru');
                                $this->email->_headers['X-Postmaster-Msgtype'] = $i['name'];
                                $this->email->subject($uname.', '.$i['subject']);
                                $this->email->message($this->load->view($i['template'], $item, true));
                                if ($this->email->send()){
                                    echo 'Письмо отправлено';
                                } else {
                                    echo $this->email->print_debugger();
                                }
                        }
                    } else {
                        echo 'Очередь для рассылки пуста.';
                    }                
                }
            }else{
                echo 'Все рассылки отключены';
            }
        }

        public function mail(){
            $get_settings = $this->mailsender->get_settings();
            //print_r($settings);
            if ($get_settings){
                foreach ($get_settings as $i){
                    //echo 'Название '.$item['name'].' Задержка '.$item['delay'].' Домены '.$item['domen'];                
                    $mail = $this->mailsender->mini($i['delay']);               
                    //print_r($mail);
                    if ($mail){
                        foreach ($mail as $item){
                            $settings = $this->set($i['domen']);
                            //print_r($item);
                                $domen = explode("@", $item['email']);
                                $uname = $this->uname($item['i']); //uppercase   
                                $this->email->from($settings['user'], $settings['domen'].' & '.$i['name']);			
                                $this->email->to('vasiljevalentin@yandex.ru');
                                //$this->email->to($item['email']);
                                //$this->email->bcc('vasiljevalentin@yandex.ru');
                                $this->email->_headers['X-Postmaster-Msgtype'] = $i['name'];
                                $this->email->subject($uname.', '.$i['subject']);
                                $this->email->message($this->load->view($i['template'], $item, true));
                                if ($this->email->send()){
                                    echo 'Письмо отправлено';
                                } else {
                                    echo $this->email->print_debugger();
                                }
                        }
                    } else {
                        echo 'Очередь для рассылки пуста.';
                    }                
                }
            }else{
                echo 'Все рассылки отключены';
            }
        }
        private function set($domen){
            
            $domen = explode(';', $domen);
            $rand = array_rand($domen);       
            $array = array(
                'edenga' => array(
                    0 => 'support@edenga.ru',
                    1 => 'help@edenga.ru',
                    2 => 'noreply@edenga.ru'
                ),
                'promo.edenga' => array(
                    0 => 'mail@promo.edenga.ru',
                    1 => 'support@promo.edenga.ru',
                    2 => 'noreply@promo.edenga.ru'
                ),
                'promo.vkredito' => array(
                    0 => 'mail@promo.vkredito.ru',
                    1 => 'help@promo.vkredito.ru'
                ),
                'vkredito' => array(
                    0 => 'support@vkredito.ru',
                    1 => 'mail@vkredito.ru',
                    2 => 'support@vkredito.ru',
                    3 => 'noreply@vkredito.ru'
                ),
                'dengimo' => array(
                    0 => 'mail@dengimo.ru',
                    1 => 'support@dengimo.ru',
                    2 => 'noreply@dengimo.ru'
                ),
                'promo.dengimo' => array(
                    0 => 'mail@promo.dengimo.ru',
                    1 => 'help@promo.dengimo.ru',
                    2 => 'noreply@promo.dengimo.ru',
                    3 => 'support@promo.dengimo.ru',
                ),
                'promo.rublimo' => array(
                    0 => 'mail@promo.rublimo.ru',
                    1 => 'help@promo.rublimo.ru',
                    2 => 'support@promo.rublimo.ru',
                    3 => 'noreply@promo.rublimo.ru'
                ),
                'dengoman' => array(
                    0 => 'mail@dengoman.ru'
                ),
                'promo.dengoman' => array(
                    0 => 'mail@promo.dengoman.ru'
                ),
            );
            
            $d = str_replace('promo.','',$domen[$rand]);
            $first = mb_substr($d,0,1, 'UTF-8');//первая буква
            $last = mb_substr($d,1);//все кроме первой буквы
            $d = mb_strtoupper($first, 'UTF-8').$last;
            
            $smtp_user = $array[$domen[$rand]][array_rand($array[$domen[$rand]])];
    
            $mail_settings = array(
                "protocol" => "smtp",
                "smtp_host" => "ssl://smtp.mail.ru",
                "smtp_user" => $smtp_user,
                "smtp_pass" => 'zeqvhany',
                "smtp_port" => 465,
                "mailtype" => "html",
                "charset" => "utf-8"
            );           
            $this->email->initialize($mail_settings);
            return $setting = array('user'=>$smtp_user, 'domen'=>$d);
        }        
        public function mail_settings(){
            $id = preg_replace('^\D+^','',$_POST['id']);
            $data = array($_POST['query'] => $_POST['data']);                       
            $mail_settings = $this->mailsender->mail_settings($id,$data); 
        }        
}