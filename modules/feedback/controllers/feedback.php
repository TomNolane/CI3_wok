<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Feedback extends MX_Controller
{
	public function index()
	{
		$this->load->helper('json');
		
		$data['email'] = filter_var($this->input->post('email', true), FILTER_VALIDATE_EMAIL);
		$data['phone'] = $this->input->post('phone', true);
		
		if (!empty($data['email']) || !empty($data['phone']))
		{
			$result_data = array();
			
			$data['name']  = $this->input->post('name', true);
			$data['comment'] = $this->input->post('comment', true);
			
			// Антиспам
			if ($data['comment'])
			{
				$this->load->helper('strip_tags_smart');
				$tmp = strip_tags_smart($data['comment']);
				if ($data['comment'] != $tmp) json_error('Использование тегов в сообщении запрещено.');
				if(!preg_match("/[а-яё]+/i", $data['comment'])) json_error('В тексте должна быть хоть одна буква русского алфавита.');
			}
			
			// GEO
			$this->load->helper('ip');
			require_once FCPATH.'modules/ipgeobase/ipgeobase.php';
			$gb = new IPGeoBase();
			$geo = $gb->getRecord(IP::$ip);
			if ($geo) $data['geo'] = $geo;
			
			$this->load->helper('idna');
			
			// Определяем домен
			$domain = str_replace('www.', '', $this->input->server('HTTP_HOST'));
			
			$data['host'] = IDN_decode($domain);
			$data['subject'] = '['.$data['host'].'] Вопрос с сайта';
			
                        // Записываем фидбек в бд
                        $this->load->model('feedback_model', 'feedback');			
                        $feedback = array(
                            'site' => $domain,
                            'region' => $geo['region'].', '.$geo['city'],
                            'name' => $data['name'],
                            'phone' => str_replace(" ","",$data['phone']),
                            'email' => $data['email'],
                            'comment' => $data['comment'],
                            'email_send' => '0',
                            'email_send_date' => '0000-00-00 00:00:00',
                            'create_date' => date('Y-m-d H:i:s')
                        );
                        $this->feedback->insert($feedback); // Добавляем данные                        
                        json_result('OK', $result_data);
                        /*
                        $this->load->library('email');
                        // Автоответ //Модуль mailsender
                        
                        if( (($data['email'] == 'vasiljevalentin@yandex.ru') or ($data['email'] == 'babakov-egor@mail.ru')) and (($domain == 'rublimo.ru') or ($domain == 'dengoman.ru')) ){
                            
                            $data['domain'] = $domain;
                            $domain_img = explode(".", $domain);
                            $data['domain_img'] = $domain_img[0];
                            $this->email->from($this->config->item('noreply_mail'), $data['host']);			
                            $this->email->to($data['email']);
                            $this->email->subject($data['name'].', Вам подготовлен займ на карту VISA');
                            $this->email->message($this->load->view('feedback', $data, true));
                            $this->email->send();
                        }
                        
			// Отправляем письмо

                        $mail_settings = array(
                            "protocol" => "smtp",
                            "smtp_host" => "ssl://smtp.mail.ru",
                            "smtp_user" => "support@vkredito.ru",
                            "smtp_pass" => "DL5Twr2vzsCBdnCM",
                            "smtp_port" => 465,
                            "mailtype" => "html",
                            "charset" => "utf-8"
                        );           
                        $this->email->initialize($mail_settings);                        
                        
			$this->email->from('support@vkredito.ru', $data['host']);			
                        $this->email->to($this->config->item('owner_mail'));
			$this->email->subject($data['subject']);
			$this->email->message($this->load->view('email', $data, true));
			if ($this->email->send())
			json_result('OK', $result_data);
			else json_error('Не могу отправить сообщение. Свяжитесь с администратором сайта.');
                        //echo $this->email->print_debugger();
                        */
		}
		else json_error('Необходимо указать контактные данные.');
	}
        
}