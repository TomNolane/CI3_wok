<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Cron extends MX_Controller {

public function send_mini(){
    $this->load->helper('idna');
    $this->load->model('forms_model', 'forms');
    $data = $this->forms->get4mini(); 
        if (is_array($data)){
            foreach($data as $item){
                $uni = $this->send_unisender($item, $this->unisender_list_mini);                               

                $this->send_vteleport($item['id'], $item, false, 'mini');
                $this->send_leadia($item['id'], $item, false, 'mini');
                $this->send_unicom($item['id'], $item, false, 'mini');
                $this->send_leadgid($item['id'], $item, false, 'mini');    
                $this->send_leadgid1($item['id'], $item, false, 'mini');
                $this->send_firano($item['id'], $item, false, 'mini');    
                $this->send_Linkprofit($item['id'], $item, false, 'mini');
                $this->send_Linkprofit1($item['id'], $item, false, 'mini');                                
            }
        }
}

public function send_cron(){
    $this->load->helper('idna');		
    $this->load->model('forms_model', 'forms');
    $gate = $this->forms->get_gate();
        foreach ($gate as $item){
            $forms = $this->forms->get4cron_all($item['gate'], ($item['delay']), 10);
            if (!empty($forms)){
                foreach($forms as $i){
                    echo $item['gate'].' '.$i['id'].' '.$i[$item['gate'].'_status'].' '.$i['create_date'].'<br/>';
                }
            
            /*    
                foreach($forms as $i){
                    echo $func = 'send_'.$item['gate'];
                    echo'<br/>';
                    $this->$func($i['id'], $i, false, 'cron');
                }
            */    
            } else {
                echo 'Для '. $item['gate'] .' на это время нет анкет<br/>';
            }
        }            		
}



	private function send_leadia($id, $data, $renew_status=false, $func=null){
		if (!empty($data['birth']))
		{
			if ($data['birth'] == '0000-00-00') $data['birth'] = '';
			else $data['birth'] = str_replace('.', '-', $data['birth']);
		}
		if (!empty($data['passport_date']))
		{
			if ($data['passport_date'] == '0000-00-00') $data['passport_date'] = '';
			else $data['passport_date'] = str_replace('.', '-', $data['passport_date']);
		}
		if (!empty($data['passport'])) $passport = explode(' ', $data['passport']);
		
		// Режим отладки
		if ($this->leadiaru_test_mode) $data['i'] = 'тест';
		
		$gender = array('Женский', 'Мужской');
		
		$url = 'http://cloud1.leadia.ru/lead.php';
		$post_data = array();
		$post_data['form_page'] = 'http://'.IDN_encode($data['site']).'/';
		$post_data['referer'] = '';//$data['referer'];
		$post_data['client_ip'] = $this->clean_ip($data['ip']);
		$post_data['userid'] = $this->leadiaru_userid;
		$post_data['product'] = 'paydayru';
		$post_data['template'] = 'default';
		$post_data['key'] = '';
		
		$form_data_json = array(
			'amount'    => $data['amount'],
			'term_days' => $data['period'],
			'first_name' => $data['i'],
			'last_name'  => $data['f'],
			'patronymic' => $data['o'],
			'cell_phone' => '+7'.$data['phone'],
			//'email' => $data['email'],
                        'email' => $this->fake_email($data['i'],$data['f']),
			'argee_with_terms' => '1',
			'birth_date' => $data['birth'],
			'income_type' => $data['work'],
			'gender' => isset($gender[$data['gender']])? $gender[$data['gender']] : $gender[1]
		);
		// Паспорт
		if (!empty($passport[0])) $form_data_json['passport_seria'] = $passport[0];
		if (!empty($passport[1])) $form_data_json['passport_num']   = $passport[1];
		if (!empty($data['passport_who']))  $form_data_json['passport_issued'] = $data['passport_who'];
		if (!empty($data['passport_date'])) $form_data_json['passport_date']   = $data['passport_date'];
		if (!empty($data['passport_code'])) $form_data_json['passport_kod']    = $data['passport_code'];
		// Дата рождения
		if (!empty($data['birthplace'])) $form_data_json['birth_place'] = $data['birthplace'];
		// Место жительства
		if (!empty($data['region']))   $form_data_json['real_region']   = $data['region'];
		if (!empty($data['city']))     $form_data_json['real_city']     = $data['city'];
		if (!empty($data['street']))   $form_data_json['real_street']   = $data['street'];
		if (!empty($data['building'])) $form_data_json['real_housenum'] = $data['building'];
		// Регистрация
		if (!empty($data['reg_same']))     $form_data_json['real_placement_differs'] = $data['reg_same']? 0 : 1;
		if (!empty($data['reg_region']))   $form_data_json['registration_region']   = $data['reg_region'];
		if (!empty($data['reg_city']))     $form_data_json['registration_city']     = $data['reg_city'];
		if (!empty($data['reg_street']))   $form_data_json['registration_street']   = $data['reg_street'];
		if (!empty($data['reg_building'])) $form_data_json['registration_housenum'] = $data['reg_building'];
		// Работа
		if (!empty($data['work_phone'])) $form_data_json['work_phone'] = '+7'.$data['work_phone'];
		if (!empty($data['work_salary'])) $form_data_json['monthly_income'] = $data['work_salary'];
		if (!empty($data['work_experience'])) $form_data_json['record_of_service'] = ($data['work_experience'] <= 360)? $data['work_experience'] : 360;
		if (!empty($data['work_name'])) $form_data_json['company_name'] = $data['work_name'];
		if (!empty($data['work_region'])) $form_data_json['work_region'] = $data['work_region'];
		if (!empty($data['work_city'])) $form_data_json['work_city'] = $data['work_city'];
		if (!empty($data['work_street'])) $form_data_json['work_street'] = $data['work_street'];
		if (!empty($data['work_house'])) $form_data_json['work_house_num'] = $data['work_house'];
		
		$post_data['form_data_json'] = json_encode($form_data_json);
		
		$post_data['first_last_name'] = $data['i'].' '.$data['f'];
		$post_data['phone'] = '+7'.$data['phone'];
		//$post_data['email'] = $data['email'];
                $post_data['email'] = $this->fake_email($data['i'],$data['f']);                
		$post_data['region'] = $data['city']; // Именно город
		$post_data['question'] = '
Сумма: '.$data['amount'].' руб. Срок: '.$data['period'].' дней.
ФИО: '.$data['f'].' '.$data['i'].' '.$data['o'].'
Город: '.$data['city'].'
Контакты: +7 '.$data['phone'].', '.$data['email'].'
Дата рождения: '.$data['birth'].'
Занятость: '.$data['work'];
		$post_data['external_lead_id'] = $id;
                //$post_data['subaccount'] = str_replace(".", "_", $data['site']);
		if (!empty($data['ad_id'])) $post_data['subaccount'] = $data['ad_id'];                   
                             
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
		$output = curl_exec($ch);
		if ($output === false) $output = curl_error($ch);
		else $output = json_decode($output);
		curl_close($ch);
		//var_dump($output);
		
		$res_arr = $renew_status? array('vteleport_status' => 0, 'vteleport_error' => '', 'upfinance_status' => 0, 'upfinance_error' => '') : array();
		$this->db->where('id', $id);
		if (isset($output->status))
		{
			if ($output->status == 'ok')
			{
				$res_arr = array_merge($res_arr, array('leadia_status' => 1, 'leadia_date' => date('Y.m.d H:i:s')));
				$this->db->update('forms', $res_arr);
				$result = 'OK';
			}
			else
			{
				$res_arr = array_merge($res_arr, array('leadia_status' => 2, 'leadia_error' => json_encode($output), 'leadia_date' => date('Y.m.d H:i:s')));
				$this->db->update('forms', $res_arr);
				$result = $output;
			}
		}
		else
		{
			$res_arr = array_merge($res_arr, array('leadia_status' => 2, 'leadia_error' => $output));
			$this->db->update('forms', $res_arr);
			$result = 'Сервер не дал ответ';
		}
                $this->forms->log( array(
                    'forms_id' => $data['id'], 
                    'site' => $data['site'],
                    'referer' => $data['referer'],
                    'ad_id' => $data['ad_id'],
                    'step' => $data['step'],
                    'func' => $func,
                    'gate' => 'leadia',
                    'gate_status' => $output->status,
                    'date' => date('Y-m-d H:i:s'),
                ) );		
		return $result;
	}
	
	// Проверяем, нужно ли дать Leadia.ru время на обработку заявки
	private function leadia_wait($id)
	{
		// Запрашиваем статус анкеты
		$url = 'http://advertisers.leadia.ru/main/scripts/babakov-feed?external_id[]='.$id.'&hash='.md5($this->leadiaru_feed_company.$id.$this->leadiaru_feed_salt);
		$res = file_get_contents($url);
		
		// Если сервер ничего не вернул, возвращаем 1
		if (empty($res)) return true;
		
		// Если сервер вернул статус анкеты, проверяем его
		$res = json_decode($res, true);
		//print_r($res);
		
		$this->db->where('id', $id);
		if ($res['status'] == 'ok')
		{
			// Выделяем информацию об анкете
			$result = array_shift($res['leads']);
			
			// Если анкета принята, возвращаем 0
			if ($result['status'] == 'success')
			{
				$this->db->update('forms', array('leadia_status' => 1));
				return;
			}
			// Если анкета отклонена, возвращаем 0
			elseif ($result['status'] == 'fail')
			{
				$this->db->update('forms', array('leadia_status' => 0));
				return;
			}
			// Если анкета отклонена, возвращаем 0
			elseif ($result['status'] == 'process')
			{
				$this->db->update('forms', array('leadia_status' => 3));
				return true;
			}
			// Если анкета отклонена, возвращаем 0
			elseif ($result['status'] == 'wait')
			{
				$this->db->update('forms', array('leadia_status' => 4));
				return true;
			}
		}
		elseif ($res['status'] == 'error')
		{
			$this->db->update('forms', array('leadia_status' => 2, 'leadia_error' => json_encode($res['errors'])));
			return;
		}
		
		// Во всех иных случаях возвращаем 1
		return true;
	}
	
	// Leads.su
	private function send_leadsu($id, $data)
	{
		if (!empty($data['birth']))
		{
			if ($data['birth'] == '0000-00-00') $data['birth'] = '';
			else $data['birth'] = str_replace('.', '-', $data['birth']);
		}
		if (!empty($data['passport_date']))
		{
			if ($data['passport_date'] == '0000-00-00') $data['passport_date'] = '';
			else $data['passport_date'] = str_replace('.', '-', $data['passport_date']);
		}
		
		$occupation = array('ШТАТНЫЙ СОТРУДНИК' => 'worker',
							'ИНДИВИДУАЛЬНЫЙ ПРЕДПРИНИМАТЕЛЬ' => 'entrepreneur',
							'СТУДЕНТ' => 'student',
							'ПЕНСИОНЕР' => 'pensioner',
							'БЕЗРАБОТНЫЙ' => 'unemployed');
		//$url = 'http://api.leads.su/webmaster/leads/check';
		$url = 'http://api.leads.su/webmaster/leads/multiPush';
		$post_data = array();
		// Режим отладки
		if ($this->leadssu_test_mode) $post_data['is_test'] = '1';
		$post_data['token'] = $this->leadssu_token;
		$post_data['offer_id'] = 539;
		$post_data['platform_id'] = $this->leadssu_platform_id;
		$post_data['lead_time'] = date('Y-m-d H:i:s');
		//$post_data['citizenship'] = 'RU';
		$post_data['firstname']  = $data['i'];
		$post_data['lastname']   = $data['f'];
		$post_data['middlename'] = $data['o'];
		$post_data['birthdate'] = $data['birth'];
		if (isset($data['work']) && isset($occupation[$data['work']]))
		$post_data['occupation'] = $occupation[$data['work']];
		$post_data['gender'] = $data['gender'];
		$post_data['mphone'] = '7'.$data['phone'];
		$post_data['email'] = $data['email'];
		// Место жительства
		if (!empty($data['region']))   $post_data['fact_region_name'] = $data['region'];
		if (!empty($data['city']))     $post_data['fact_city_name']   = $data['city'];
		if (!empty($data['street']))   $post_data['fact_street']      = $data['street'];
		if (!empty($data['building'])) $post_data['fact_house']       = $data['building'];
		if (!empty($data['housing']))  $post_data['fact_housing']     = $data['housing'];
		if (!empty($data['flat']))     $post_data['fact_flat']        = $data['flat'];
		// Регистрация
		if (!empty($data['reg_type']))     $post_data['reg_permanent']   = $data['reg_type'];
		if (!empty($data['reg_region']))   $post_data['reg_region_name'] = $data['reg_region'];
		if (!empty($data['reg_city']))     $post_data['reg_city_name']   = $data['reg_city'];
		if (!empty($data['reg_street']))   $post_data['reg_street']      = $data['reg_street'];
		if (!empty($data['reg_building'])) $post_data['reg_house']       = $data['reg_building'];
		if (!empty($data['reg_housing']))  $post_data['reg_housing']     = $data['reg_housing'];
		if (!empty($data['reg_flat']))     $post_data['reg_flat']        = $data['reg_flat'];
		// Паспорт
		if (!empty($data['passport'])) $post_data['passport_code']  = str_replace(' ', '', $data['passport']);
		$post_data['passport_title'] = $data['passport_code'].' '.$data['passport_who'];
		if (!empty($data['passport_date'])) $post_data['passport_date']  = $data['passport_date'];
		$post_data['credit_sum']  = $data['amount'];
		$post_data['credit_days'] = $data['period'];
		if (!empty($data['birthplace'])) $post_data['birthplace'] = $data['birthplace'];
		// Кредитная история
		//if (!empty($data['delays'])) $post_data['overdue_loans'] = 'has_delay';
		if (!empty($data['delay_type'])) $post_data['overdue_loans'] = $data['delay_type'];
		// Работа
		if (!empty($data['work_occupation'])) $post_data['work_occupation'] = $data['work_occupation'];
		if (!empty($data['work_salary'])) $post_data['work_salary'] = $data['work_salary'];
		if (!empty($data['work_name'])) $post_data['work_organization'] = $data['work_name'];
		if (!empty($data['work_experience'])) $post_data['work_experience'] = $data['work_experience'];
		if (!empty($data['work_phone'])) $post_data['work_phone'] = '7'.$data['work_phone'];
		if (!empty($data['work_region'])) $post_data['work_region_name'] = $data['work_region'];
		if (!empty($data['work_city'])) $post_data['work_city_name'] = $data['work_city'];
		if (!empty($data['work_street'])) $post_data['work_street'] = $data['work_street'];
		if (!empty($data['work_house'])) $post_data['work_house'] = $data['work_house'];
		
		$this->load->model('leads_model', 'leads');
		$offers = $this->leads->offers($post_data['birthdate'], $post_data['credit_sum'], $data['region'], $data['city']);
		$arr = array();
		foreach($offers as $key => $val)
		{
			$arr[] = $key;
			if ($key == 288) $k24 = true;
		}
		if (count($arr)) $post_data['algorithm'] = json_encode(array(array("offers" => $arr)));
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
		$output = curl_exec($ch);
		if ($output === false) $output = curl_error($ch);
		else $output = json_decode($output);
		curl_close($ch);
		//var_dump($output);
		
		$this->db->where('id', $id);
		if (isset($output->status))
		{
			if ($output->status == 'success')
			{
				$this->db->update('forms', array('leads_status' => (empty($k24)? 1 : 4)));
				$result = 'OK';
			}
			else
			{
				$this->db->update('forms', array('leads_status' => (empty($k24)? 2 : 3), 'leads_error' => json_encode($output)));
				$result = $output;
			}
		}
		else
		{
			$this->db->update('forms', array('leads_status' => 2, 'leads_error' => $output));
			$result = 'Сервер не дал ответ';
		}
		
		return $result;
	}
	
	// Upfinance.ru
	private function send_upfinance($id, $data)
	{
		if (!empty($data['birth']))
		{
			if ($data['birth'] == '0000-00-00') $data['birth'] = '';
			else $data['birth'] = str_replace('.', '-', $data['birth']);
		}
		if (!empty($data['passport_date']))
		{
			if ($data['passport_date'] == '0000-00-00') $data['passport_date'] = '';
			else $data['passport_date'] = str_replace('.', '-', $data['passport_date']);
		}
		
		//$url = 'https://upfinance.ru/api/push/'.$this->upfinanceru_partner;
		$url = 'http://mailgun.gutlead.ru/api/push/'.$this->upfinanceru_token;
		$post_data = array();
		$post_data['aff_id'] = $id;
		$post_data['webmaster_id'] = 1;
		$post_data['webmaster_url'] = 'http://'.IDN_encode($data['site']).'/';
		$post_data['email']  = $data['email'];
		$post_data['mphone'] = '7'.$data['phone'];
		$post_data['firstname']  = $data['i'];
		$post_data['lastname']   = $data['f'];
		$post_data['middlename'] = $data['o'];
		$post_data['gender'] = $data['gender'];
		if (!empty($data['birth'])) $post_data['bday'] = $data['birth'];
		// Регистрация
		$post_data['reg_country_name'] = 'Россия';
		if (!empty($data['reg_region']))   $post_data['reg_region_name'] = $data['reg_region'];
		if (!empty($data['reg_city']))     $post_data['reg_city_name']   = $data['reg_city'];
		if (!empty($data['reg_street']))   $post_data['reg_street']      = $data['reg_street'];
		if (!empty($data['reg_building'])) $post_data['reg_house']       = $data['reg_building'];
		if (!empty($data['reg_housing']))  $post_data['reg_housing']     = $data['reg_housing'];
		if (!empty($data['reg_flat']))     $post_data['reg_flat']        = $data['reg_flat'];
		// Место жительства
		$post_data['fact_country_name'] = 'Россия';
		if (!empty($data['region']))   $post_data['fact_region_name'] = $data['region'];
		if (!empty($data['city']))     $post_data['fact_city_name']   = $data['city'];
		if (!empty($data['street']))   $post_data['fact_street']      = $data['street'];
		if (!empty($data['building'])) $post_data['fact_house']       = $data['building'];
		if (!empty($data['housing']))  $post_data['fact_housing']     = $data['housing'];
		if (!empty($data['flat']))     $post_data['fact_flat']        = $data['flat'];
		// Паспорт
		if (!empty($data['passport']))      $post_data['passport_code']  = str_replace(' ', '', $data['passport']);
		if (!empty($data['passport_date'])) $post_data['passport_date']  = $data['passport_date'];
		if (!empty($data['passport_who']))  $post_data['passport_title'] = $data['passport_who'];
		if (!empty($data['passport_code'])) $post_data['passport_podr']  = $data['passport_code'];
		// Кредит
		$post_data['credit_sum']  = $data['amount'];
		$post_data['credit_days'] = $data['period'];
		// Работа
		if (!empty($data['work_occupation'])) $post_data['work_occupation'] = $data['work_occupation'];
		if (!empty($data['work_salary'])) $post_data['work_salary'] = $data['work_salary'];
		if (!empty($data['work_name'])) $post_data['work_organization'] = $data['work_name'];
		if (!empty($data['work_experience'])) $post_data['work_experience'] = $data['work_experience'];
		if (!empty($data['work_phone'])) $post_data['work_phone'] = '7'.$data['work_phone'];
		if (!empty($data['work_region'])) $post_data['work_region_name'] = $data['work_region'];
		if (!empty($data['work_city'])) $post_data['work_city_name'] = $data['work_city'];
		if (!empty($data['work_street'])) $post_data['work_street'] = $data['work_street'];
		if (!empty($data['work_house'])) $post_data['work_house'] = $data['work_house'];
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
		$output = curl_exec($ch);
		if ($output === false) $output = curl_error($ch);
		else $output = json_decode($output);
		curl_close($ch);
		//var_dump($output);
		
		$this->db->where('id', $id);
		if (isset($output->status))
		{
			if ($output->status == 'success')
			{
				$this->db->update('forms', array('upfinance_status' => 1));
				$result = 'OK';
			}
			else
			{
				$this->db->update('forms', array('upfinance_status' => 2, 'upfinance_error' => json_encode($output), 'upfinance_date' => date('Y.m.d H:i:s')));
				$result = $output;
			}
		}
		else
		{
			$this->db->update('forms', array('upfinance_status' => 2, 'upfinance_error' => $output, 'upfinance_date' => date('Y.m.d H:i:s')));
			$result = 'Сервер не дал ответ';
		}
		
		return $result;
	}
	
	public function check_upfinance()
	{
		$this->load->model('forms_model', 'forms');
		
		$url = 'http://mailgun.gutlead.ru/api/feed/'.$this->upfinanceru_token;
		$post_data = array();
		$post_data['aff_ids'] = $this->forms->upfinance_check();
		$post_data['aff_ids'][] = 10406;
		//$post_data['date_from'] = '2016-05-20';
		//$post_data['date_to'] = '2016-05-21';
		//print_r($post_data);return;
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, urlencode(http_build_query($post_data)));
		$output = curl_exec($ch);
		if ($output === false) $output = curl_error($ch);
		else $output = json_decode($output);
		curl_close($ch);
		print_r($output);//return;
		if (!empty($output->data))
		{
			//$status = array('pending' => 5, 'approved' => 6);
			
			foreach($output->data as $item)
			{
				//if ($item->status == 'pending' || $item->status == 'approved')
				$this->forms->update($item->aff_id, array('upfinance_text_status' => $item->status));
				//echo $item->aff_id.': '.$status[$item->status]."\n";
			}
		}
		
		return;
		/*
		$this->db->where('id', $id);
		if (isset($output->status))
		{
			if ($output->status == 'success')
			{
				$this->db->update('forms', array('upfinance_status' => 1));
				$result = 'OK';
			}
			else
			{
				$this->db->update('forms', array('upfinance_status' => 2, 'upfinance_error' => json_encode($output)));
				$result = $output;
			}
		}
		else
		{
			$this->db->update('forms', array('upfinance_status' => 2, 'upfinance_error' => $output));
			$result = 'Сервер не дал ответ';
		}
		*/
		return $result;
	}
	
	// Телепорт
	private function send_vteleport($id, $data, $renew_status=false, $func=null)
	{
		if (!empty($data['birth']))
		{
			if ($data['birth'] == '0000-00-00') $data['birth'] = '';
			else $data['birth'] = str_replace('.', '-', $data['birth']);
		}
		if (!empty($data['passport_date']))
		{
			if ($data['passport_date'] == '0000-00-00') $data['passport_date'] = '';
			else $data['passport_date'] = str_replace('.', '-', $data['passport_date']);
		}
		if (!empty($data['passport'])) $passport = explode(' ', $data['passport']);
		
		$gender = array(2, 1);
		$url = 'http://gate.vteleport.ru/sendrequestxml';
		$post_data = array();
		$post_data['UID'] = $this->vteleportru_uid;
		$post_data['data'] = '<?xml version="1.0" encoding="UTF-8"?>
<requests>
<request>
<id>'.$id.'</id>
'.(empty($data['ad_id'])? '' : '<subid>'.$data['ad_id'].'</subid>').'
<amount>'.$data['amount'].'</amount>
<period>'.ceil($data['period']/7).'</period>
<last_name>'.$data['f'].'</last_name>
<first_name>'.$data['i'].'</first_name>
<middle_name>'.$data['o'].'</middle_name>
<phone>'.'+7'.$data['phone'].'</phone>
<birthday>'.$data['birth'].'</birthday>
<email>'.$data['email'].'</email>
<source_domain>'.$data['site'].'</source_domain>    
<id_sex>'.(isset($gender[$data['gender']])? $gender[$data['gender']] : $gender[1]).'</id_sex>
<passport_series>'.(isset($passport[0])? $passport[0] : '').'</passport_series>
<passport_number>'.(isset($passport[1])? $passport[1] : '').'</passport_number>
<passport_date_of_issue>'.$data['passport_date'].'</passport_date_of_issue>
<passport_org>'.$data['passport_who'].'</passport_org>
<passport_code>'.$data['passport_code'].'</passport_code>
'.(empty($data['birthplace'])? '' : '<birthplace>'.$data['birthplace'].'</birthplace>').'
<registration_region>'.$data['reg_region'].'</registration_region>
<registration_city>'.$data['reg_city'].'</registration_city>
<registration_street>'.$data['reg_street'].'</registration_street>
<registration_house>'.$data['reg_building'].'</registration_house>
'.(empty($data['reg_housing'])? '' : '<registration_building>'.$data['reg_housing'].'</registration_building>').'
'.(empty($data['reg_flat'])?    '' : '<registration_apartment>'.$data['reg_flat'].'</registration_apartment>').'
<residential_region>'.$data['region'].'</residential_region>
<residential_city>'.$data['city'].'</residential_city>
<residential_street>'.$data['street'].'</residential_street>
<residential_house>'.$data['building'].'</residential_house>
'.(empty($data['housing'])? '' : '<residential_building>'.$data['housing'].'</residential_building>').'
'.(empty($data['flat'])?    '' : '<residential_apartment>'.$data['flat'].'</residential_apartment>').'
'.(empty($data['work_occupation'])? '' : '<occupation>'.$data['work_occupation'].'</occupation>').'
'.(empty($data['work_salary'])? '' : '<incoming>'.$data['work_salary'].'</incoming>').'
'.(empty($data['work_name'])? '' : '<work_name>'.$data['work_name'].'</work_name>').'
'.(empty($data['work_experience'])? '' : '<experience>'.$data['work_experience'].'</experience>').'
'.(empty($data['work_phone'])? '' : '<work_phone>'.'+7'.$data['work_phone'].'</work_phone>').'
'.(empty($data['work_region'])? '' : '<work_region>'.$data['work_region'].'</work_region>').'
'.(empty($data['work_city'])? '' : '<work_city>'.$data['work_city'].'</work_city>').'
'.(empty($data['work_street'])? '' : '<work_street>'.$data['work_street'].'</work_street>').'
'.(empty($data['work_house'])? '' : '<work_house>'.$data['work_house'].'</work_house>').'
'.(empty($data['work_building'])? '' : '<work_building>'.$data['work_building'].'</work_building>').'
'.(empty($data['work_office'])? '' : '<work_apartment>'.$data['work_office'].'</work_apartment>').'
</request>
</requests>';

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_TIMEOUT, 30);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
		$output = curl_exec($ch);
		if ($output === false) $output = curl_error($ch);
		curl_close($ch);
		//var_dump($output);
		
		$res_arr = $renew_status? array('leadia_status' => 0, 'leadia_error' => '', 'upfinance_status' => 0, 'upfinance_error' => '') : array();
		$this->db->where('id', $id);
		if (empty($output) || $output == 'success')
		{
			$res_arr = array_merge($res_arr, array('vteleport_status' => 1, 'vteleport_date' => date('Y.m.d H:i:s')));
			$this->db->update('forms', $res_arr);
			$result = 'OK';
		}
		else
		{
			$res_arr = array_merge($res_arr, array('vteleport_status' => 2, 'vteleport_error' => $output, 'vteleport_date' => date('Y.m.d H:i:s')));
			$this->db->update('forms', $res_arr);
			$result = $output;
		}
                $this->forms->log( array(
                    'forms_id' => $data['id'], 
                    'site' => $data['site'],
                    'referer' => $data['referer'],
                    'ad_id' => $data['ad_id'],
                    'step' => $data['step'],
                    'func' => $func,
                    'gate' => 'teleport',
                    'gate_status' => $output,
                    'date' => date('Y-m-d H:i:s'),
                ) );		
		file_put_contents(FCPATH.'teleport_empty', $id.'|'.trim($output).'|'.trim($result)."\n", FILE_APPEND);
		
		return $result;
	}
	
	/* ---------------------------- */
	
	// Отправка в Unisender
	private function send_unisender($item, $list_id)
	{
		$item = (object)$item;
		if (empty($item->email) || empty($item->phone)) return;
		
		$this->load->library('unisender/unisender', $this->unisender_api_key);
		$uni = $this->unisender->subscribe(array('list_ids' => (is_array($list_id)? implode(',', $list_id) : $list_id),
												  'fields' => array(
																	'Name' => (empty($item->f)? '' : $item->f.' ').(empty($item->i)? '' : $item->i.' ').(empty($item->o)? '' : $item->o.' '),
																	'email' => $item->email),
												  'request_ip' => $item->ip,
												  'confirm_ip' => $item->ip,
												  'double_optin' => 3));
		//$this->load->model('debug/debug_model', 'debug');
		//$this->debug->variant($uni);
                return $uni;
	}
	// Leadia.ru
	function send_unicom($id, $data, $renew_status=false, $func=null){
            $this->load->library('UnicomAPI');

            $unicom_login = 'babakov.egor92@gmail.com';
            $unicom_password = 'N1994k1992';
            $city_name = $data['reg_city']; // Название города
            $region_name = $data['reg_region']; // Название региона из справочника

            if (!empty($data['birth']))
		{
			if ($data['birth'] == '0000-00-00') $data['birth'] = '';
			else $data['birth'] = str_replace('.', '-', $data['birth']);
		}
		if (!empty($data['passport_date']))
		{
			if ($data['passport_date'] == '0000-00-00') $data['passport_date'] = '';
			else $data['passport_date'] = str_replace('.', '-', $data['passport_date']);
		}
		if (!empty($data['passport'])) $passport = explode(' ', $data['passport']);            
            
            $anketa = array(
                    "loan_type"=>"qiwi",            // Тип заявки qiwi - потреб
                    "surname"=>$data['f'],            // Фамилия клиента
                    "name"=>$data['i'],                 // Имя клиента
                    "patronymic"=>$data['o'],       // Отчество клиента
                    "mobile_phone"=>$data['phone'],   // Номер телефона клиента без +7
                    "email"=>$this->fake_email($data['i'],$data['f']),        // e-mail клиента
                    "passport"=>$passport[0].$passport[1],       // Серия и номер российского паспорта клиента бех пробелов и -
                    "passport_code"=>$data['passport_code'],      // Код подразделения
                    "passport_date"=>$data['passport_date'],  // Дата выдачи паспорта в формате YYYY-MM-DD
                    "birth_date"=>$data['birth'],     // Дата рождения в формате YYYY-MM-DD
                    "birth_place"=>$data['birthplace'],  // Место рождения
                    "credit_sum"=>$data['amount'],          // Желаемая сумма кредита
                    "job"=>$data['work_occupation'],              // Наименование работодателя           
                    "street"=>$data['reg_street'],
                    "house"=>$data['reg_housing'],
                    "sub_id"=>$data['ad_id'],
                    "fact_street"=>$data['reg_street'],
                    "fact_house"=>$data['reg_housing']
            );
            
            $U24API = new UnicomAPI();
            $U24API->init($unicom_login,$unicom_password);
            // Загружаем массив регионов
            $region = $U24API->getRegion( $region_name );
            // Ищем в нужном регионе нужный ID города
            $city_id = $U24API->getCityID( $city_name, $region[ "code" ] );
            // Создаем анкету
            $reqest = $U24API->createRequest( $anketa, $region[ "id" ], $city_id );
            //Отправляем анкету во все предложения
            $offers = $U24API->sendAllLeads( $reqest );
            
            if(isset($offers['created'])){
                $this->forms->update($id, array('upfinance_status' => 1, 'upfinance_text_status'=>$offers['status'], 'upfinance_date' => date('Y.m.d H:i:s'))); 
                $this->forms->update($id, array('unicom_status' => 1, 'unicom_date' => date('Y.m.d H:i:s')));
            } else {
                $this->forms->update($id, array('upfinance_status' => 2, 'upfinance_text_status'=>$offers['status'], 'upfinance_error'=>$offers, 'upfinance_date' => date('Y.m.d H:i:s')));  
                $this->forms->update($id, array('unicom_status' => 2, 'unicom_date' => date('Y.m.d H:i:s')));
            }
                $this->forms->log( array(
                    'forms_id' => $data['id'], 
                    'site' => $data['site'],
                    'referer' => $data['referer'],
                    'ad_id' => $data['ad_id'],
                    'step' => $data['step'],
                    'func' => $func,
                    'gate' => 'unicom',
                    'gate_status' => $offers['status'],
                    'date' => date('Y-m-d H:i:s'),
                ) );             
            //Отправляем анкету на бонусное предложение
            //$bonus_offer = $U24API->sendBonusLead( $reqest );            
	}	
	/* ---------------------------- */
	private function send_leadgid($id, $data, $renew_status=false, $func=null){
            
            $r = $this->get_leadgid_region($data['region']);
            $city = $this->get_leadgid_sity($r);
                      
            if (!empty($data['birth'])){
                if ($data['birth'] == '0000-00-00') $data['birth'] = '';
                else $data['birth'] = str_replace('.', '-', $data['birth']);
            }
            if (!empty($data['passport_date'])){
                if ($data['passport_date'] == '0000-00-00') $data['passport_date'] = '';
                else $data['passport_date'] = str_replace('.', '-', $data['passport_date']);
            }
            if (!empty($data['passport'])) $passport = explode(' ', $data['passport']);
						
		$gender = array('female', 'male');

		$url = 'http://api3.leadgid.ru/api/universal/applications?affiliate_id='.$this->leadgid_id.'&api_key='.$this->leadgid_token;
                $post_data = array(
                        "amount"=>$data['amount'],
                        "term"=>$data['period'],
                        "last_name"=>$data['f'],
                        "first_name"=>$data['i'],
                        "middle_name"=>$data['o'],
                        "gender" => isset($gender[$data['gender']])? $gender[$data['gender']] : $gender[1],
                        "birthdate" => $data['birth'],
                        "birth_place" => $data['birthplace'],
                        "email" => $this->fake_email($data['i'],$data['f']),           
                        //"email" => $this->get_email('Leadgid', $data['email']),
                        "phone" => $data['phone'],
                        "region" => $r['id'],
                        "city" => $city,
                        "street" => $data['street'],                      
                        "passport_series" => $passport[0],
                        "passport_number" => $passport[1],
                        "passport_issued_date" => $data['passport_date'],
                        "passport_issued_by" => $data['passport_who'],
                        "passport_unit_code" => $data['passport_code'],
                        "residential_address_street_id" => $data['street'],
                        "residential_address_house" => $data['building'],
                        "income" => $data['work_salary'],
                        "work_organization" => $data['work_name'],
                        "work_address" => $data['work_region'].' '.$data['work_city'].' '.$data['work_street'].' '.$data['work_house'],
                        "work_occupation" => $data['work_occupation'],
                        "work_experience" => $data['work_experience'],
                        "work_phone" => $data['work_phone']
                );
                //print_r($post_data);               
                
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
                
		$output = curl_exec($ch);
		if ($output === false) $output = curl_error($ch);
		else $output = json_decode($output);
		curl_close($ch);
		var_dump($output);
                $this->forms->update($data['id'], array('leadgid_status' => 1, 'leadgid_date' => date('Y.m.d H:i:s')));

                $this->forms->log( array(
                    'forms_id' => $data['id'], 
                    'site' => $data['site'],
                    'referer' => $data['referer'],
                    'ad_id' => $data['ad_id'],
                    'step' => $data['step'],
                    'func' => $func,
                    'gate' => 'leadgid',
                    'gate_status' => 1,
                    'date' => date('Y-m-d H:i:s'),
                ) );		

		//return $result;
	}
        
	private function send_leadgid1($id, $data, $renew_status=false, $func=null){
            
            $r = $this->get_leadgid_region($data['region']);
            $city = $this->get_leadgid_sity($r);
                      
            if (!empty($data['birth'])){
                if ($data['birth'] == '0000-00-00') $data['birth'] = '';
                else $data['birth'] = str_replace('.', '-', $data['birth']);
            }
            if (!empty($data['passport_date'])){
                if ($data['passport_date'] == '0000-00-00') $data['passport_date'] = '';
                else $data['passport_date'] = str_replace('.', '-', $data['passport_date']);
            }
            if (!empty($data['passport'])) $passport = explode(' ', $data['passport']);
						
		$gender = array('female', 'male');

		$url = 'http://api3.leadgid.ru/api/oneclickmoney/application?affiliate_id='.$this->leadgid_id.'&api_key='.$this->leadgid_token;
                $post_data = array(
                        "amount"=>$data['amount'],
                        "term"=>21,
                        "lastname"=>$data['f'],
                        "firstname"=>$data['i'],
                        "middlename"=>$data['o'],
                        "gender" => isset($gender[$data['gender']])? $gender[$data['gender']] : $gender[1],
                        "birthdate" => $data['birth'],
                        "birth_place" => $data['birthplace'],
                        "email" => $this->fake_email($data['i'],$data['f']), 
                        //"email" => $this->get_email('Leadgid', $data['email']),
                        "phone" => $data['phone'],
                        "reg_region"=>$data['reg_region'],
                        "reg_area"=>$data['reg_region'],
                        "reg_city"=>$data['reg_city'],
                        "reg_street"=> $data['reg_street'],  
                        "fact_region"=>$data['region'], 
                        "fact_area"=>$data['region'],
                        "fact_city"=>$data['city'],
                        "fact_street"=>$data['street'],
                        "reg_kladr_code"=> $this->get_region($data['reg_region']),
                        "fact_kladr_code"=> $this->get_region($data['region']),
                    
                        "region" => $r['id'],
                        "city" => $city,
                        "street" => $data['street'],                      
                        "passport_series" => $passport[0],
                        "passport_number" => $passport[1],
                        "passport_issued_date" => $data['passport_date'],
                        "passport_issued_by" => $data['passport_who'],
                        "passport_unit_code" => $data['passport_code'],
                        "residential_address_street_id" => $data['street'],
                        "residential_address_house" => $data['building'],
                        "income" => $data['work_salary'],
                        "work_organization" => $data['work_name'],
                        "work_address" => $data['work_region'].' '.$data['work_city'].' '.$data['work_street'].' '.$data['work_house'],
                        "work_occupation" => $data['work_occupation'],
                        "work_experience" => $data['work_experience'],
                        "work_phone" => $data['work_phone']
                );
                //print_r($post_data);               
                
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
                
		$output = curl_exec($ch);
		if ($output === false) $output = curl_error($ch);
		else $output = json_decode($output);
		curl_close($ch);
		var_dump($output);
                $this->forms->update($data['id'], array('leadgid1_status' => 1, 'leadgid1_date' => date('Y.m.d H:i:s')));

                $this->forms->log( array(
                    'forms_id' => $data['id'], 
                    'site' => $data['site'],
                    'referer' => $data['referer'],
                    'ad_id' => $data['ad_id'],
                    'step' => $data['step'],
                    'func' => $func,
                    'gate' => 'leadgid1',
                    'gate_status' => 1,
                    'date' => date('Y-m-d H:i:s'),
                ) );		

		//return $result;
	}        
            
	private function send_renessans($id, $data, $renew_status=false, $func=null){
            if (!empty($data['passport'])) $passport = explode(' ', $data['passport']);            
            $phone = '+7('.substr($data['phone'], 0, 3).')'.substr($data['phone'], 3, 3).'-'.substr($data['phone'], 6, 2).'-'.substr($data['phone'], 8, 2);
            $applicationData = '{"surname":"'.$data['f'].'",'
                . '"name":"'.$data['i'].'",'
                . '"patronymic":"'.$data['o'].'",'
                . '"birth_date":"'.$data['birth'].'",'
                . '"birth_place":"'.$data['birthplace'].'",'
                . '"mobile":"'.$phone.'",'
                . '"email":"'.$this->fake_email($data['i'],$data['f']).'",'    
                . '"income_personal":"'.$data['work_salary'].'",'
                . '"amount":"'.$data['amount'].'",'
                . '"term":24,'
                . '"work_status":'.rand(10,12).','
                . '"work_start":"'.rand(1990,2017).'-'.rand(01,12).'-'.rand(01,28).'",'
                . '"address_reg":{'
                    . '"region":"'.$this->get_region($data['region']).'",'
                    . '"city":"'.$data['city'].'",'
                    . '"street":"'.$data['street'].'",'
                    . '"house":"'.$data['building'].'",'
                    . '"flat":'.rand(1,123).'},'
                . '"passport":{'
                    . '"issue_by":"'.$data['passport_who'].'",'
                    . '"issue_date":"'.$data['passport_date'].'",'
                    . '"number":"'.$passport[1].'",'
                    . '"series":"'.$passport[0].'"}}';

            $queryParams = array(
                'wm_id' => '4iuG',
                'offer_id' => 19885,
                'bank_id' => 1009,
                'token' => 'BWrTeW2mwPqQxEuU',
                'sandbox' => 0 // тестовый режим
            );

            $url = 'https://api.firano.ru/api/rest/v1/applications.json';

            $headers = array(
                'Content-Type: application/json'
            );

            $curl = curl_init($url . '?' . http_build_query($queryParams));
            curl_setopt($curl, CURLOPT_TIMEOUT, 50);
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $applicationData);
            curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt($curl, CURLOPT_MAXREDIRS, 3);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            //curl_setopt($curl, CURLOPT_HEADER, 1);

            $response = curl_exec($curl);
            $response = json_decode($response);
            print_r($response);
            
            if(isset($response->error)){
                $result = 0;
                $status = $response->error->message;
            } else {
                $status = $response->application->id;
                $result = 1;
            }
            
                $this->forms->log( array(
                    'forms_id' => $data['id'], 
                    'site' => $data['site'],
                    'referer' => $data['referer'],
                    'ad_id' => $data['ad_id'],
                    'step' => $data['step'],
                    'func' => $func,
                    'gate' => 'smsfinance',
                    'gate_status' => $status,
                    'date' => date('Y-m-d H:i:s'),
                ) );		
            
		return $result;
	}
	private function send_smsfinance($id, $data, $renew_status=false, $func=null){
            if (!empty($data['passport'])) $passport = explode(' ', $data['passport']);            
            $phone = '+7('.substr($data['phone'], 0, 3).')'.substr($data['phone'], 3, 3).'-'.substr($data['phone'], 6, 2).'-'.substr($data['phone'], 8, 2);
            $applicationData = '{"surname":"'.$data['f'].'",'
                . '"name":"'.$data['i'].'",'
                . '"patronymic":"'.$data['o'].'",'
                . '"birth_date":"'.$data['birth'].'",'
                . '"birth_place":"'.$data['birthplace'].'",'
                . '"mobile":"'.$phone.'",'
                . '"email":"'.$this->fake_email($data['i'],$data['f']).'",'
                . '"income_personal":"'.$data['work_salary'].'",'
                . '"amount":"'.$data['amount'].'",'
                . '"term":24,'
                . '"work_status":'.rand(10,12).','
                . '"work_start":"'.rand(1990,2017).'-'.rand(01,12).'-'.rand(01,28).'",'
                . '"address_reg":{'
                    . '"region":"'.$this->get_region($data['region']).'",'
                    . '"city":"'.rand(1,10).'",'
                    . '"street":"'.$data['street'].'",'
                    . '"house":"'.$data['building'].'",'
                    . '"flat":'.rand(1,123).'},'
                . '"passport":{'
                    . '"issue_by":"'.$data['passport_who'].'",'
                    . '"issue_date":"'.$data['passport_date'].'",'
                    . '"number":"'.$passport[1].'",'
                    . '"series":"'.$passport[0].'"}}';

            $queryParams = array(
                'wm_id' => '4iuG',
                'offer_id' => 28867,
                'bank_id' => 1092,
                'token' => 'BWrTeW2mwPqQxEuU',
                'sandbox' => 0 // тестовый режим
            );

            $url = 'https://api.firano.ru/api/rest/v1/applications.json';

            $headers = array(
                'Content-Type: application/json'
            );

            $curl = curl_init($url . '?' . http_build_query($queryParams));
            curl_setopt($curl, CURLOPT_TIMEOUT, 50);
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $applicationData);
            curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt($curl, CURLOPT_MAXREDIRS, 3);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            //curl_setopt($curl, CURLOPT_HEADER, 1);

            $response = curl_exec($curl);
            $response = json_decode($response);
            print_r($response);
            
            if(isset($response->error)){
                $result = 0;
                $status = $response->error->message;
            } else {
                $status = $response->application->id;
                $result = 1;
            }
            
                $this->forms->log( array(
                    'forms_id' => $data['id'], 
                    'site' => $data['site'],
                    'referer' => $data['referer'],
                    'ad_id' => $data['ad_id'],
                    'step' => $data['step'],
                    'func' => $func,
                    'gate' => 'renessans',
                    'gate_status' => $result,
                    'date' => date('Y-m-d H:i:s'),
                ) );		
            
		return $result;
	}        
	private function send_firano($id, $data, $renew_status=false, $func=null){
            if (!empty($data['passport'])) $passport = explode(' ', $data['passport']);            
            $phone = '+7('.substr($data['phone'], 0, 3).')'.substr($data['phone'], 3, 3).'-'.substr($data['phone'], 6, 2).'-'.substr($data['phone'], 8, 2);

            $applicationData = '{'
                    . '"surname"    :"'.$data['f'].'",'
                    . '"name"       :"'.$data['i'].'",'
                    . '"mobile"     :"'.$phone.'",'
                    . '"patronymic" :"'.$data['o'].'",'
                    . '"birth_date" :"'.$data['birth'].'",'
                    . '"birth_place":"'.$data['birthplace'].'",'
                    . '"gender"     :"m",'
                    . '"phone"      :"'.$phone.'",'
                    . '"passport":{'
                        . '"series"     :"'.$passport[0].'",'
                        . '"number"     :"'.$passport[1].'",'
                        . '"issue_date" :"'.$data['passport_date'].'",'
                        . '"issue_code" :"'.$data['passport_code'].'",'
                        . '"issue_by"   :"'.$data['passport_who'].'"},'
                    . '"address_reg":{'
                        . '"region" :"'.$this->get_region($data['region']).'",'
                        . '"city"   :"'.$data['city'].'",'
                        . '"street" :"'.$data['street'].'",'
                        . '"house"  :"'.$data['building'].'",'
                        . '"flat"   :"'.rand(1,123).'"},'
                    . '"address_live":{'
                        . '"region" :"'.$this->get_region($data['region']).'",'
                        . '"city"   :"'.$data['city'].'",'
                        . '"street" :"'.$data['street'].'",'
                        . '"house"  :"'.$data['building'].'",'
                        . '"flat"   :"'.rand(1,123).'"},'
                    . '"income_personal":"'.$data['work_salary'].'",'
                    . '"amount"         :"'.$data['amount'].'",'
                    . '"term"           :24,'
                    . '"email"          :"'.$this->fake_email($data['i'],$data['f']).'",'
                    . '"work_name"      :"'.$data['work_name'].'",'
                    . '"address_work":{'
                        . '"region"     :"01",'
                        . '"area"       :"Московский район",'
                        . '"city"       :"Москва",'
                        . '"street"     :"Ленина",'
                        . '"house"      :"32",'
                        . '"flat"       :"123"},'
                    . '"work_status"    :"'.rand(10,12).'",'
                    . '"work_experience":"'.$data['work_experience'].'",'
                    . '"sub_id":"123"}'; 
            //print_r($applicationData);
            $queryParams = array( 'wm_id' => '4iuG', 'token' => 'BWrTeW2mwPqQxEuU', 'sandbox' => 0); 
            $url = 'https://finance.cityads.com/api/rest/v2/applications.json'; 
            $headers = array( 'Content-Type: application/json' ); 
            $curl = curl_init($url . '?' . http_build_query($queryParams)); 
            curl_setopt($curl, CURLOPT_TIMEOUT, 50); 
            curl_setopt($curl, CURLOPT_POST, true); 
            curl_setopt($curl, CURLOPT_HTTPHEADER, $headers); 
            curl_setopt($curl, CURLOPT_POSTFIELDS, $applicationData); 
            curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1); 
            curl_setopt($curl, CURLOPT_MAXREDIRS, 3); 
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); 
            curl_setopt($curl, CURLOPT_HEADER, 0); 
            $response = curl_exec($curl);
            $response = json_decode($response);
            //var_dump($response);            
            
            if(isset($response->error)){
                $result = 0;
                $status = $response->error->message;
                $this->forms->update($data['id'], array('firano_status' => 2, 'firano_date' => date('Y.m.d H:i:s')));
            } else {
                $status = $response->application->id;
                $result = 1;
                $this->forms->update($data['id'], array('firano_status' => 1, 'firano_date' => date('Y.m.d H:i:s')));
            }
                $this->forms->log( array(
                    'forms_id' => $data['id'], 
                    'site' => $data['site'],
                    'referer' => $data['referer'],
                    'ad_id' => $data['ad_id'],
                    'step' => $data['step'],
                    'func' => $func,
                    'gate' => 'firanoall',
                    'gate_status' => $result,
                    'date' => date('Y-m-d H:i:s'),
                ) );		
		return $result;
	}
	private function send_firano1($id, $data, $renew_status=false, $func=null){
            $phone = '+7('.substr($data['phone'], 0, 3).')'.substr($data['phone'], 3, 3).'-'.substr($data['phone'], 6, 2).'-'.substr($data['phone'], 8, 2);

            $applicationData = '{'
                    . '"surname"    :"'.$data['f'].'",'
                    . '"name"       :"'.$data['i'].'",'
                    . '"mobile"     :"'.$phone.'"}'; 
            //print_r($applicationData);
            $queryParams = array(
                'wm_id' => '4iuG',
                'offer_id' => 28404,
                'bank_id' => 1088,
                'token' => 'BWrTeW2mwPqQxEuU',
                'sandbox' => 0);
            $url = 'https://api.firano.ru/api/rest/v1/applications.json';
            $headers = array( 'Content-Type: application/json' ); 
            $curl = curl_init($url . '?' . http_build_query($queryParams));
                curl_setopt($curl, CURLOPT_TIMEOUT, 50);
                curl_setopt($curl, CURLOPT_POST, true);
                curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
                curl_setopt($curl, CURLOPT_POSTFIELDS, $applicationData);
                curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
                curl_setopt($curl, CURLOPT_MAXREDIRS, 3);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($curl, CURLOPT_HEADER, 1); 
            $response = curl_exec($curl);
            $response = json_decode($response);
            //var_dump($response);            
            
            if(isset($response->error)){
                $result = 0;
                $status = $response->error->message;
                $this->forms->update($data['id'], array('firano1_status' => 2, 'firano1_date' => date('Y.m.d H:i:s')));
            } else {
                $status = $response->application->id;
                $result = 1;
                $this->forms->update($data['id'], array('firano1_status' => 1, 'firano1_date' => date('Y.m.d H:i:s')));
            }
                $this->forms->log( array(
                    'forms_id' => $data['id'], 
                    'site' => $data['site'],
                    'referer' => $data['referer'],
                    'ad_id' => $data['ad_id'],
                    'step' => $data['step'],
                    'func' => $func,
                    'gate' => 'firano1',
                    'gate_status' => $result,
                    'date' => date('Y-m-d H:i:s'),
                ) );		
		return $result;
	}
	private function send_linkprofit($id, $data, $renew_status=false, $func=null){
            if (!empty($data['passport'])) $passport = explode(' ', $data['passport']);            

            $applicationData = array(
                "lname" => $data['f'],
                "fname" =>$data['i'],
                "mname"=>$data['o'],
                "bdate"=>$data['birth'],
                "bplace" =>$data['birthplace'],
                "gender"=>"m",
                "phone"=>$data['phone'],
                "region"=>$data['region'],
                "city" =>$data['city'],
                "street"=>$data['street'],
                "house" =>$data['housing'],
                "building" =>$data['building'],
                "apartment"=>$data['flat'],
                "of_region"=>$data['reg_region'],
                "of_city"=>$data['reg_city'],
                "of_street"=>$data['reg_street'],
                "of_house"   =>$data['reg_building'],
                "of_building"=>$data['reg_housing'],
                "of_apartment"=>$data['reg_flat'],
                "pass_num"=>$passport[1],
                "pass_srs"=> $passport[0],
                "pass_date"=>$data['passport_date'],
                "pass_plc"=>$data['passport_who'],
                "pass_code" =>$data['passport_code'],
                "work_region"=>$data['work_region'],
                "work_st"=>"работает",
                "work_plc"=>$data['work_name'],
                "work_addr"=>$data['work_street'],
                "work_phone" =>$data['work_phone'],
                "work_pos" =>$data['work_occupation'],
                "cur_exp"=>$data['work_experience'],
                "salary"=>$data['work_salary'],
                "sum"=>$data['amount'],
                "time"=>$data['period'],
                "email"=>$this->fake_email($data['i'],$data['f']),
                "wmid" => "34538"
            );
            print_r($applicationData);
            echo '--------------------------- <br/>';
            $url = 'http://gtw.linkprofit.ru/cgi/send?'.http_build_query($applicationData); 
            $headers = array( 'Content-Type: application/json' ); 
            $curl = curl_init($url); 
            curl_setopt($curl, CURLOPT_TIMEOUT, 50); 
            curl_setopt($curl, CURLOPT_POST, true); 
            curl_setopt($curl, CURLOPT_HTTPHEADER, $headers); 
            curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($applicationData)); 
            curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1); 
            curl_setopt($curl, CURLOPT_MAXREDIRS, 3); 
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); 
            curl_setopt($curl, CURLOPT_HEADER, 0); 
            $response = curl_exec($curl);
            $response = json_decode($response);
            var_dump($response);
            $this->forms->update($data['id'], array('linkprofit_status' => 1, 'linkprofit_date' => date('Y.m.d H:i:s')));

            
                $this->forms->log( array(
                    'forms_id' => $data['id'], 
                    'site' => $data['site'],
                    'referer' => $data['referer'],
                    'ad_id' => $data['ad_id'],
                    'step' => $data['step'],
                    'func' => $func,
                    'gate' => 'linkprofit',
                    'gate_status' => 1,
                    'date' => date('Y-m-d H:i:s'),
                ) );		
		return $result;
             
	}  

	private function send_linkprofit1($id, $data, $renew_status=false, $func=null){    
            if (!empty($data['passport'])) $passport = explode(' ', $data['passport']);            

            $applicationData = array(
                "lname" => $data['f'],
                "fname" =>$data['i'],
                "mname"=>$data['o'],
                "bdate"=>$data['birth'],
                "bplace" =>$data['birthplace'],
                "gender"=>"m",
                "phone"=>$data['phone'],
                "region"=>$data['region'],
                "city" =>$data['city'],
                "street"=>$data['street'],
                "house" =>$data['housing'],
                "building" =>$data['building'],
                "apartment"=>$data['flat'],
                "of_region"=>$data['reg_region'],
                "of_city"=>$data['reg_city'],
                "of_street"=>$data['reg_street'],
                "of_house"   =>$data['reg_housing'],
                "of_building"=>$data['reg_building'],
                "of_apartment"=>$data['reg_flat'],
                "pass_num"=>$passport[1],
                "pass_srs"=> $passport[0],
                "pass_date"=>$data['passport_date'],
                "pass_plc"=>$data['passport_who'],
                "pass_code" =>$data['passport_code'],
                "work_region"=>$data['work_region'],
                "work_st"=>"работает",
                "work_plc"=>$data['work_name'],
                "work_addr"=>$data['work_street'],
                "work_phone" =>$data['work_phone'],
                "work_pos" =>$data['work_occupation'],
                "cur_exp"=>$data['work_experience'],
                "salary"=>$data['work_salary'],
                "sum"=>$data['amount'],
                "time"=>$data['period'],
                "email"=>$this->fake_email($data['i'],$data['f']),
                "wmid" => "34538"
            );
            print_r($applicationData);
            echo '--------------------------- <br/>';
            $url = 'http://sync.linkprofit.ru/gateways/ubrir_cc/send?'.http_build_query($applicationData); 
            $headers = array( 'Content-Type: application/json' ); 
            $curl = curl_init($url); 
            curl_setopt($curl, CURLOPT_TIMEOUT, 50); 
            curl_setopt($curl, CURLOPT_POST, true); 
            curl_setopt($curl, CURLOPT_HTTPHEADER, $headers); 
            curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($applicationData)); 
            curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1); 
            curl_setopt($curl, CURLOPT_MAXREDIRS, 3); 
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); 
            curl_setopt($curl, CURLOPT_HEADER, 0); 
            $response = curl_exec($curl);
            $response = json_decode($response);
            var_dump($response); 
            $this->forms->update($data['id'], array('linkprofit1_status' => 1, 'linkprofit1_date' => date('Y.m.d H:i:s')));

            
                $this->forms->log( array(
                    'forms_id' => $data['id'], 
                    'site' => $data['site'],
                    'referer' => $data['referer'],
                    'ad_id' => $data['ad_id'],
                    'step' => $data['step'],
                    'func' => $func,
                    'gate' => 'linkprofit1',
                    'gate_status' => 1,
                    'date' => date('Y-m-d H:i:s'),
                ) );		
		return $result;
             
	}
        public function admitad_auth(){           
            $headers = array(
                'Content-Type:application/x-www-form-urlencoded',
                'Authorization: Basic YTg4MWJiYzdkMzY3ZTZlMzM0ODFkODY3YzM0YWIwOjhlMDY3NDNjODI0ZGZhYjVlOGUzYzEwY2FhYzBmNQ=='
            );
            $process = curl_init('https://api.admitad.com/token/');
            curl_setopt($process, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($process, CURLOPT_HEADER, 1);
            curl_setopt($process, CURLOPT_USERPWD, "a881bbc7d367e6e33481d867c34ab0:8e06743c824dfab5e8e3c10caac0f5");
            curl_setopt($process, CURLOPT_TIMEOUT, 30);
            curl_setopt($process, CURLOPT_POST, 1);
            curl_setopt($process, CURLOPT_POSTFIELDS, http_build_query(array(
                'client_id'=>'a881bbc7d367e6e33481d867c34ab0',
                'scope'=>'manage_broker_application advcampaigns',
                'grant_type' => 'client_credentials'
            )));
            curl_setopt($process, CURLOPT_RETURNTRANSFER, TRUE);
            $return = curl_exec($process);
            curl_close($process);
            print_r($return);
        }      
        private function send_admitad($id, $data, $renew_status=false, $func=null){
            //08501440c2
            //print_r($data);           
            
            $d = array(
                "campaigns"=>'[17809]',
                "first_name" => $data['i'],
                "last_name" => $data['f'],
                "middle_name" => $data['o'],
                "birth_date" => date('d.m.Y', strtotime($data['birth'])),
                "birth_place" => $data['birthplace'],
                "gender" => $data['gender'],
//                "mobile_phone" => '7'.$data['phone'],
                "phone" => '7'.$data['phone'],
                "occupation" => $data['work_occupation'],
                "work_salary" => $data['work_salary'],
                "work_organization" => $data['work_name'],
                "work_address" => $data['work_street'],
                "work_occupation" => $data['work_occupation'],
                "email" => $this->fake_email($data['i'],$data['f']),
                "passport_cn" => $data['passport'],
                "passport_date" => date('d.m.Y', strtotime($data['passport_date'])),
                "passport_title" => $data['passport_who'],
                "fact_region_name" => $data['region'],
                "fact_city_name" => $data['city'],
                "fact_street" => $data['street'],
                "fact_house" => $data['building'],
                "fact_housing" => $data['housing'],
                "fact_flat" => $data['flat'],
                "reg_region_name" => $data['reg_region'],
                "reg_city_name" => $data['reg_city'],
                "reg_street" => $data['reg_street'],
                "reg_house" => $data['reg_building'],
                "reg_housing" => $data['reg_housing'],
                "reg_flat" => $data['reg_flat'],
                "credit_sum" => $data['amount'],
                "credit_days" => $data['period'],
                "subid" => $data['ad_id']
            );
            $headers = array(
                'Authorization: Bearer 08501440c2'
            );
            $process = curl_init('https://api.admitad.com/website/378079/broker/applications/create/');
            curl_setopt($process, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($process, CURLOPT_HEADER, false);
            curl_setopt($process, CURLOPT_USERPWD, "a881bbc7d367e6e33481d867c34ab0:8e06743c824dfab5e8e3c10caac0f5");
            curl_setopt($process, CURLOPT_TIMEOUT, 30);
            curl_setopt($process, CURLOPT_POST, 1);
            curl_setopt($process, CURLOPT_POSTFIELDS, http_build_query($d));
            curl_setopt($process, CURLOPT_RETURNTRANSFER, true);
            $r = curl_exec($process);
            curl_close($process);
            $r = json_decode($r);
//            print_r($r);
            
            if(isset($r->errors)){
                $status = 2;
                $text_status = $r->errors[0]->message;              
            } else {
                $status = 1;
                $text_status = $r->responses[0]->status;                
            }
                $this->forms->update($data['id'], array('admitad_status' => $status, 'admitad_date' => date('Y.m.d H:i:s')));
            
                $this->forms->log( array(
                    'forms_id' => $data['id'], 
                    'site' => $data['site'],
                    'referer' => $data['referer'],
                    'ad_id' => $data['ad_id'],
                    'step' => $data['step'],
                    'func' => $func,
                    'gate' => 'admitad',
                    'gate_status' => print_r($text_status,true),
                    'date' => date('Y-m-d H:i:s'),
                ) );		
                sleep(5);
		return $status;
        }
        public function get_kladr($region){
            $this->load->model('forms_model', 'forms');
            $data = $this->forms->get_region($region);
            return $data;            
        }        
        
        public function get_region($region){
            $this->load->model('forms_model', 'forms');
            $data = $this->forms->get_region($region);
            return $data[0]['id'];            
        }

        private function get_leadgid_region($region){
            $region = str_replace('область', 'обл', $region);
            $region = str_replace('автономный округ', 'АО', $region);
            $region = str_replace('Санкт-Петербург', 'г Санкт-Петербург', $region);
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, 'http://api3.leadgid.ru/api/universal/regions?affiliate_id=23263&api_key=yO67uomR2Fiy');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POST, 0);
		$output = curl_exec($ch);
		if ($output === false) $output = curl_error($ch);
		else $output = json_decode($output);
		curl_close($ch);
		//var_dump($output);
                $regionid = 0;
                foreach ($output as $item){
                    //print_r($item);
                    if(!strnatcasecmp($item->name, $region)){
                        $regionid = $item->id;
                        $regionname = $item->name;
                        echo $item->id.' '.$item->name.' = '.urldecode($region).'<br/>';
                    } else {
                       echo $item->name.' <> '.urldecode($region).'<br/>';
                    }
                }
            return array('id'=>$regionid,'name'=>$regionname);
	}  
	private function get_leadgid_sity($r){   
            $region = $this->forms->get_leadgid_sity($r['name']);                
            $rand_keys = array_rand($region);
            return $region[$rand_keys]['name'];
	}        
	public function data()
	{
		// Определяем адрес сайта
		$this->load->helper('ip');
		$this->load->helper('idna');
		$domain = str_replace('www.', '', $this->input->server('HTTP_HOST'));
		
		// Обезвреживаем данные
		$form = new stdClass;
                $form->step = $this->input->get_post('step', true);
		$form->amount = abs(intval($this->input->get_post('amount', true)));
		$form->period = abs(intval($this->input->get_post('period', true)));
		
		$form->f = $this->input->get_post('f', true);
		$form->i = $this->input->get_post('i', true);
		$form->o = $this->input->get_post('o', true);
		
		$form->phone = substr(preg_replace('/[^0-9]/', '', $this->input->get_post('phone', true)), 1);
		$form->email = str_replace(' ', '', $this->input->get_post('email', true));
		$form->gender = abs(intval($this->input->get_post('gender', true)));
		
		$form->passport = $this->input->get_post('passport_s', true).' '.$this->input->get_post('passport_n', true);
		$form->passport_d = $this->input->get_post('passport_dd', true);
		$form->passport_m = $this->input->get_post('passport_mm', true);
		$form->passport_y = abs(intval($this->input->get_post('passport_yyyy', true)));
		$form->passport_who = $this->input->get_post('passport_who', true);
		$form->passport_code = $this->input->get_post('passport_code', true);
		
		$form->reg_region = $this->input->get_post('reg_region', true);
		$form->reg_city = $this->input->get_post('reg_city', true);
		$form->reg_street = $this->input->get_post('reg_street', true);
		$form->reg_building = $this->input->get_post('reg_building', true);
		
		$form->region = $this->input->get_post('region', true);
		$form->city = $this->input->get_post('city', true);
		$form->d = $this->input->get_post('birth_dd', true);
		$form->m = $this->input->get_post('birth_mm', true);
		$form->y = abs(intval($this->input->get_post('birth_yyyy', true)));
		$form->work = $this->input->get_post('work', true);
		$form->referer = $this->input->get_post('referer', true);
		//$data-> = $this->input->get_post('', true);
		
		// Сохраняем анкету в БД
		$data = array('create_date' => date('Y.m.d H:i:s'));
		$data['site'] = IDN_decode($domain);
		$data['ip'] = IP::$ip;
		$data['id'] = $this->input->get_post('id', true);
		$data['referer'] = $this->input->get_post('referer', true);
		$data['ad_id'] = $this->input->get_post('ad_id', true);
		$data['amount'] = $form->amount;
		$data['period'] = $form->period;
                $data['step'] = $form->step;
		if ($form->f) $data['f'] = $form->f;
		if ($form->i) $data['i'] = $form->i;
		if ($form->o) $data['o'] = $form->o;
		if ($form->phone) $data['phone'] = $form->phone;
		if ($form->email) $data['email'] = $form->email;
		if ($form->gender <= 1) $data['gender'] = $form->gender;
		if ($form->d && $form->m && $form->y) $data['birth'] = $form->y.'.'.$form->m.'.'.$form->d;
		// Паспорт
		if ($form->passport) $data['passport'] = $form->passport;
		if ($form->passport_d && $form->passport_m && $form->passport_y) $data['passport_date'] = $form->passport_y.'.'.$form->passport_m.'.'.$form->passport_d;
		if ($form->passport_who) $data['passport_who'] = $form->passport_who;
		if ($form->passport_code) $data['passport_code'] = $form->passport_code;
		$data['birthplace'] = $this->input->get_post('birthplace', true);
		// Место жительства
		$data['region'] = $form->region;
		$data['city'] = $form->city;
		$data['street'] = $this->input->get_post('street', true);
		$data['building'] = $this->input->get_post('building', true);
		$data['housing'] = $this->input->get_post('housing', true);
		$data['flat'] = $this->input->get_post('flat', true);
		// Регистрация
		$data['reg_type'] = $this->input->get_post('reg_type', true);
		$data['reg_same'] = $this->input->get_post('reg_same', true);
		if ($data['reg_same'])
		{
			$data['reg_region']   = $data['region'];
			$data['reg_city']     = $data['city'];
			$data['reg_street']   = $data['street'];
			$data['reg_building'] = $data['building'];
			$data['reg_housing']  = $data['housing'];
			$data['reg_flat']     = $data['flat'];
		}
		else
		{
			$data['reg_region'] = $form->reg_region;
			$data['reg_city'] = $form->reg_city;
			$data['reg_street'] = $form->reg_street;
			$data['reg_building'] = $form->reg_building;
			$data['reg_housing'] = $this->input->get_post('reg_housing', true);
			$data['reg_flat'] = $this->input->get_post('reg_flat', true);
		}
		// Кредитная история
		$data['delays'] = abs(intval($this->input->get_post('delays', true)));
		$data['delays_type'] = $this->input->get_post('delays_type', true);
		// Работа
		$data['work'] = $form->work;
		$data['work_occupation'] = $this->input->get_post('work_occupation', true);
		$data['work_salary'] = abs(intval($this->input->get_post('work_salary', true)));
		$data['work_name'] = $this->input->get_post('work_name', true);
		$data['work_experience'] = abs(intval($this->input->get_post('work_experience', true)));
		$data['work_phone'] = substr(preg_replace('/[^0-9]/', '', $this->input->get_post('work_phone', true)), 1);
		$data['work_region'] = $this->input->get_post('work_region', true);
		$data['work_city'] = $this->input->get_post('work_city', true);
		$data['work_street'] = $this->input->get_post('work_street', true);
		$data['work_house'] = $this->input->get_post('work_house', true);
		$data['work_building'] = $this->input->get_post('work_building', true);
		$data['work_office'] = $this->input->get_post('work_office', true);
		
		return $data;
	}
        
        private function fake_email($i, $f){
            $domen = array('yandex.ru', 'mail.ru', 'rambler.ru', 'inbox.ru');

            $name = substr(str_shuffle(str_repeat($x='abcdefghijklmnopqrstuvwxyz', ceil(5/strlen($x)) )),1,5);
            
            $fake_email = $name.'@'.$domen[array_rand($domen)];
            return $fake_email;
	}
        private function get_email($gate, $email){
            $this->load->model('forms_model', 'forms');
            $gate = $this->forms->gate_settings($gate);
            //print_r($gate);
            switch ($gate[0]['mail']) {
            case 0: $mail = ''; exit;
            case 1: $mail = $email; exit;
            case 2:
                $m = explode("@", $email);
                $mail = strrev($m[0]).'@'.$m[1];
                exit;               
            }
            return $mail;
	}        
	private function clean_ip($ip)
	{
		$ip = explode(',', $ip);
		return $ip[0];
	}
}