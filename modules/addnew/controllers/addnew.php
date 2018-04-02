<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Addnew extends MX_Controller
{
	// Ключ от ID
	protected $id_key = 'fjlkKJR#(9($RjlejklKEJKRLLEFEWnbnorieaoIJRw';
	
	// Настройки для leadia.ru
	protected $leadiaru_userid = 8112;
	protected $leadiaru_feed_company = 'babakov-webmaster';
	protected $leadiaru_feed_salt = 'e326c692801d9e4c43c0f05de488e4a9';
	protected $leadiaru_test_mode = false; // Режим отладки
	
	// Настройки для leads.su
	protected $leadssu_token = '6a2b733910e71c00d4d72b7e7c2d5483';
	protected $leadssu_platform_id = 1091642;
	protected $leadssu_test_mode = false; // Режим отладки
	
	// Настройки для vteleport.ru
	protected $vteleportru_uid = 'xMOlBdXE27';
	protected $vteleportru_test_mode = false; // Режим отладки
	
	// Настройки для upfinance.ru
	//protected $upfinanceru_partner = 'babakov';
	protected $upfinanceru_token = 'G9EgG2CJ90ApfwX5';
	protected $upfinanceru_test_mode = false; // Режим отладки
	
	// Unisender
	protected $unisender_api_key = '6i3jt81pmphum955911yqqdrjziwk3u3bkxhrbje';
	protected $unisender_list_mini = 84280095;
        protected $unisender_list_welcome = 10086355;
	protected $unisender_list_14days = 6964330;
	protected $unisender_list_general = 6974746;
	
	protected $order = array('teleport','leadia');
	
	public function index()
	{
		// Получаем данные
		$data = $this->data();
		 
		// Расшифровываем ID
		$this->load->library('encrypt');
		$id = (!empty($data['id']))? abs(intval($this->encrypt->decode($data['id'], $this->id_key))) : null;
		// Сохраняем в БД
		if (!empty($data['email']))
		{
			$this->load->model('forms_model', 'forms');                       
                        if (empty($id)){
                            
                            // ищем данные пользователя в существующих анкетах
                            $find = $this->forms->find($data['phone']);
                            if($find){
                                foreach ($find as $key => $value){
                                    $data[$key] = $value;
                                }                                
                            }
                            
                            //
                        $id = $this->forms->add($data); // Добавляем данные
                        } else {
                            $this->forms->update($id, $data); // Обновляем данные
                        }
		}
		$this->load->helper('cookie');
                set_cookie('id',$id,'3600');
		$this->load->helper('json');
		
		// Отправляем в биржи
		if (isset($_REQUEST['send']))
		{
			$this->send($id, $data);
			json_result('OK', array('id' => $this->encrypt->encode($id, $this->id_key), 'redirect' => true));
			//redirect('result');
		}
		// Возвращаем ID
		else
		{
			json_result('OK', array('id' => $this->encrypt->encode($id, $this->id_key), 'redirect' => false));
		}
	}
	
	// Отправка анкет вручную
	public function send_manual($id=null)
	{
		if (!logged_in() && !is_admin())
		{
			$identity = $this->config->item('identity', 'ion_auth');
			$this->session->set_userdata($identity, false);
			redirect('/login/?from='.uri_string());
		}
		
		$this->load->helper('idna');
		
		$id = abs(intval($id));
		if (empty($id)) exit('Не указан ID анкеты.');
		
		$this->load->model('forms_model', 'forms');
		$data = $this->forms->get($id);
		if (!$data) exit('Анкета с таким ID не найдена.');
		
		echo '<pre>';
		print_r($this->send($id, $data));
		echo '</pre>';
	}
	
	// Отправка мини анкеты
	public function send_mini()
	{
		$this->load->helper('idna');
		
		$this->load->model('forms_model', 'forms');
		$data = $this->forms->get4mini();                                               
                
		if (is_array($data))
		{
			//echo '<pre>';
			//print_r($data);
			foreach($data as $item)
			{
//file_put_contents(FCPATH.'log','send_mini |'.$item['id'].'|'.$item['f'].' '.$item['i'].'|'.$item['city'].'|'.date('Y-m-d H:i:s')."\n", FILE_APPEND);

				// Отправляем в Unisender
				// $this->send_unisender($item, $this->unisender_list_mini);
				
				// Отправляем в первую биржу
				$func = 'send_'.$this->order[0];
				$this->$func($item['id'], $item);
			}
			//echo '</pre>';
		}
	}
	
	// Отправляем по расписанию анкеты в Телепорт
	public function send_cron()
	{
		$this->load->helper('idna');
		
		$this->load->model('forms_model', 'forms');
		$data = $this->forms->get4cron();                
                
		if (is_array($data))
		{
			//echo '<pre>';
			//print_r($data);
			foreach($data as $item)
			{
//file_put_contents(FCPATH.'log','send_cron |'.$item['id'].'|'.$item['f'].' '.$item['i'].'|'.$item['city'].'|'.date('Y-m-d H:i:s')."\n", FILE_APPEND);
                            
				$func = 'send_'.$this->order[1];
				$this->$func($item['id'], $item);
                                
			}
			//echo '</pre>';
		}
	}
	
	// Отправляем по расписанию анкеты в Апфинанс
	public function send_cron_upfinance()
	{
		// Запускаем только с 15 до 23 по БРН
		//$h = date('H');
		//if (($h > 0 && $h < 11) || ($h >= 21 && $h <= 23)) return;
		
		$this->load->helper('idna');
		
		$this->load->model('forms_model', 'forms');
		$data = $this->forms->get4cron_upfinance();
		//var_dump($data);return;
		
		if (is_array($data))
		{
			//echo '<pre>';
			//print_r($data);return;
			foreach($data as $item)
			{
				//if (!$this->upfinanceru_test_mode)
				//{
					$this->send_upfinance($item['id'], $item);
				//}
			}
			//echo '</pre>';
		}
	}
	
	/* ОТПРАВКА АНКЕТ ЧЕРЕЗ 21 ДЕНЬ */
	
	public function send21()
	{
            //
            $this->load->library('email');
            //            
		$this->load->helper('idna');
		
		$this->load->model('forms_model', 'forms');
		$data = $this->forms->get4cron21();
		if (is_array($data))
		{
			//echo '<pre>';
			//print_r($data);
			foreach($data as $item)
			{
                            /*
                                $this->email->from($this->config->item('noreply_mail'));			
                                $this->email->to('vasiljevalentin@yandex.ru');
                                $this->email->subject($item['site'].' 21 день');
                                $this->email->message('ID '.$item['id'].' FIO '.$item['f'].$item['upfinance_status'].$item['leadia_status'].$item['vteleport_status']);
                                if(!$this->email->send()){
                                    echo $this->email->print_debugger();
                                }
                            */
                                echo 'ID '.$item['id'].' FIO '.$item['f'].' '.$item['i'].' '.$item['o'].' UP '.$item['upfinance_status'].' LE '.$item['leadia_status'].' TL '.$item['vteleport_status'];
                                echo '<br/>'.$func = 'send_'.$this->order[0];
                                echo '<br/>'.$this->$func($item['id'], $item, true);

			}
			//echo '</pre>';
                }
	}
	
	/* ---------------------------- */
	
	// Отправка анкеты
	private function send($id, $data)
	{            
		$this->load->helper('idna');
		
		$this->load->model('forms_model', 'forms');
		$test_data = $this->forms->get($id);
		
		$result = array();
		
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
		
		if (($this->order[0] == 'leadia' && $test_data['leadia_status'] != '1') || ($this->order[0] == 'teleport' && $test_data['vteleport_status'] != '1'))
		{
                    //file_put_contents(FCPATH.'uni', $id."\n", FILE_APPEND);
                    // Отправляем в Unisender
                    //$uni = $this->send_unisender($data, $this->unisender_list_welcome);
                    //file_put_contents(FCPATH.'uni', "BEGIN ", FILE_APPEND);
                    //(FCPATH.'uni', date('Y-m-d H:i:s').' '.$id.' '.$uni, FILE_APPEND);
                    //file_put_contents(FCPATH.'uni', "END \n", FILE_APPEND);
                    
			// Отправляем в первую биржу
			$func = 'send_'.$this->order[0];
			$result[$this->order[0]] = $this->$func($id, $data, false, 'send');
                        
file_put_contents(FCPATH.'log', $result[$this->order[0]]." ".date('Y-m-d H:i:s')."\n", FILE_APPEND);
			
			// Если заявка отклонена (либо сразу же, либо после проверки), отправляем её во вторую биржу
			if ($result[$this->order[0]] != 'OK')
			{
				$func = 'send_'.$this->order[1];
				$result[$this->order[1]] = $this->$func($id, $data, false, 'send');
				file_put_contents(FCPATH.'leadia', $id.'|'.$this->order[0].'|'.trim($result[$this->order[0]]).'|'.trim($result[$this->order[1]])."\n", FILE_APPEND);         
                        }
			if ($result[$this->order[1]] != 'OK')
			{
				$this->send_unicom($id, $data, 'send');
                        }  
                        
		}

                
		return $result;
	}
	
	// Leadia.ru
	private function send_leadia($id, $data, $renew_status=false, $func=null)
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
                    'forms_id' => $id, 
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
	private function send_teleport($id, $data, $renew_status=false, $func=null)
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
                curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
		curl_setopt($ch, CURLOPT_TIMEOUT, 60);
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
		
		file_put_contents(FCPATH.'teleport_empty', $id.'|'.trim($output).'|'.trim($result)."\n", FILE_APPEND);
                $this->forms->log( array(
                    'forms_id' => $id, 
                    'site' => $data['site'],
                    'referer' => $data['referer'],
                    'ad_id' => $data['ad_id'],
                    'step' => $data['step'],
                    'func' => $func,
                    'gate' => 'teleport',
                    'gate_status' => $output,
                    'gate_data' => print_r($post_data, true),
                    'date' => date('Y-m-d H:i:s'),
                ) );		
		return $result;
	}
        private function send_unicom($id, $data, $func=null){
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
            
            if($offers['created']){
                $this->forms->update($id, array('upfinance_status' => 1, 'upfinance_text_status'=>$offers['status'], 'upfinance_date' => date('Y.m.d H:i:s')));               
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
	
	// Отправка в Unisender
	private function send_unisender($item, $list_id)
	{
		$item = (object)$item;
		if (empty($item->email) || empty($item->phone)) return;
		
		$this->load->library('unisender/unisender', $this->unisender_api_key);
		$uni = $this->unisender->subscribe(array('list_ids' => (is_array($list_id)? implode(',', $list_id) : $list_id),
		'fields' => array(
                    'Name' => (empty($item->i)? '' : $item->i.' '),
                    'email' => $item->email),
                    //'request_ip' => $item->ip,
                    //'confirm_ip' => $item->ip,
                    'double_optin' => 3,
                    'overwrite' => 2
                    ));
		//$this->load->model('debug/debug_model', 'debug');
		//$this->debug->variant($uni);
                return $uni;
	}
	
	/* ---------------------------- */
	
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
                
                $passportdate = str_replace('/', '-', $this->input->get_post('passportdate', true));
                $form->passportdate = date("Y.m.d", strtotime($passportdate) );
                
		$form->passport_who = $this->input->get_post('passport_who', true);
		$form->passport_code = $this->input->get_post('passport_code', true);
		
		$form->reg_region = $this->input->get_post('reg_region', true);
		$form->reg_city = $this->input->get_post('reg_city', true);
		$form->reg_street = $this->input->get_post('reg_street', true);
		$form->reg_building = $this->input->get_post('reg_building', true);
		
		$form->region = $this->input->get_post('region', true);
		$form->city = $this->input->get_post('city', true);
                $birthdate = str_replace('/', '-', $this->input->get_post('birthdate', true));
                $form->birth = date("Y.m.d", strtotime($birthdate) );
                /*
		$form->d = $this->input->get_post('birth_dd', true);
		$form->m = $this->input->get_post('birth_mm', true);
		$form->y = abs(intval($this->input->get_post('birth_yyyy', true)));
                */
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
                if ($form->birth) $data['birth'] = $form->birth;
		//if ($form->d && $form->m && $form->y) $data['birth'] = $form->y.'.'.$form->m.'.'.$form->d;
		// Паспорт
		if ($form->passport) $data['passport'] = $form->passport;
                if ($form->passportdate) $data['passport_date'] = $form->passportdate;
		//if ($form->passport_d && $form->passport_m && $form->passport_y) $data['passport_date'] = $form->passport_y.'.'.$form->passport_m.'.'.$form->passport_d;
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
        
	private function clean_ip($ip)
	{
		$ip = explode(',', $ip);
		return $ip[0];
	}
}