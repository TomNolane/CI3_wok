<?php if (!defined('BASEPATH')) exit('No direct script access allowed');



class Dashboard extends MX_Controller
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
		$this->load->library('grocery_CRUD');
	}
	
	public function index($all=false)
	{
		if ($all) $all = true;
		
		$this->grocery_crud->set_table('forms');
		//if (!$all)
		///$this->grocery_crud->where('leadia_status >= 1 AND leads_status >= 1 AND upfinance_status >= 1 AND vteleport_status >= 1');
		
		// Ищем дату в POST
		$y = abs(intval($this->input->post('yyyy', true)));
		$m = $this->input->post('mm', true);
		$d = $this->input->post('dd', true);
		$y2 = abs(intval($this->input->post('yyyy2', true)));
		$m2 = $this->input->post('mm2', true);
		$d2 = $this->input->post('dd2', true);
                
		// Если дана команда сбросить фильтры
		if (isset($_POST['drop_date_filter']))
		{
			$y = false;
			$m = false;
			$d = false;
			$this->session->unset_userdata('y', $y);
			$this->session->unset_userdata('m', $m);
			$this->session->unset_userdata('d', $d);
			$y2 = false;
			$m2 = false;
			$d2 = false;
			$this->session->unset_userdata('y2', $y2);
			$this->session->unset_userdata('m2', $m2);
			$this->session->unset_userdata('d2', $d2);                        
		}
		
		// Если нашли дату в POST, сохраняем в сессию
		if ($y && $m && $d)
		{
			$this->session->set_userdata('y', $y);
			$this->session->set_userdata('m', $m);
			$this->session->set_userdata('d', $d);
			$this->session->set_userdata('y2', $y2);
			$this->session->set_userdata('m2', $m2);
			$this->session->set_userdata('d2', $d2);                        
		}
		// Если не нашли, ищем дату в сессии
		else
		{
			$y = $this->session->userdata('y');
			$m = $this->session->userdata('m');
			$d = $this->session->userdata('d');
			$y2 = $this->session->userdata('y2');
			$m2 = $this->session->userdata('m2');
			$d2 = $this->session->userdata('d2');                        
		}
		
		// Если нашли дату
		if ($y && $m && $d)
		{
			$this->grocery_crud->where('DATE_FORMAT(create_date, "%Y%m%d") >= DATE_FORMAT("'."$y/$m/$d 00:00:00".'", "%Y%m%d")');
                        $this->grocery_crud->where('DATE_FORMAT(create_date, "%Y%m%d") <= DATE_FORMAT("'."$y2/$m2/$d2 23:59:59".'", "%Y%m%d")');
		}
		$this->grocery_crud->order_by('create_date', 'desc');
		$state = $this->grocery_crud->getState();
		
		if ($state == 'export' || $state == 'print'){
                    $this->grocery_crud->columns('f','i','o','email','phone','referer');
                }else{
                    $this->grocery_crud->columns('site','id', 'create_date','f','i','amount','period','gender','city','birth',/*'email',*/ 'phone', 'referer','leadia_status','vteleport_status','upfinance_status','time','step');
                }
                
		$this->grocery_crud->field_type('gender', 'dropdown', array(0 => 'Ж', 1 => 'М'));		
		$this->grocery_crud->callback_column('site',array($this,'_index_site'));
		$this->grocery_crud->callback_column('upfinance_text_status',array($this,'_index_upfinance_text_status'));
		
		$this->grocery_crud->callback_column('upfinance_status',array($this,'_index_upfinance_status'));
		$this->grocery_crud->callback_column('leadia_status',array($this,'_index_leadia_status'));
		$this->grocery_crud->callback_column('leads_status',array($this,'_index_leads_status'));
		$this->grocery_crud->callback_column('vteleport_status',array($this,'_index_vteleport_status'));
		$this->grocery_crud->callback_column('time',array($this,'_time'));
                $this->grocery_crud->callback_column('step',array($this,'_step'));
                $this->grocery_crud->callback_column('phone',array($this,'_phone'));
                $this->grocery_crud->callback_column('referer',array($this,'_referer'));
                
		$this->grocery_crud->add_action('Отправить анкету', '/modules/dashboard/img/send.png', '','fancybox',array($this,'_index_send_button'));
		
		$this->grocery_crud->display_as('id', 'ID');
		$this->grocery_crud->display_as('site', 'Сайт');
		$this->grocery_crud->display_as('f', 'Фамилия');
		$this->grocery_crud->display_as('i', 'Имя');
		$this->grocery_crud->display_as('o', 'Отчество');
		$this->grocery_crud->display_as('amount', 'Сумма');
		$this->grocery_crud->display_as('period', 'Срок');
		$this->grocery_crud->display_as('gender', 'Пол');
		$this->grocery_crud->display_as('reg_region', 'Регистрация. Регион');
		$this->grocery_crud->display_as('reg_city', 'Регистрация. Город');
		$this->grocery_crud->display_as('reg_street', 'Регистрация. Улица');
		$this->grocery_crud->display_as('reg_building', 'Регистрация. Дом');
		$this->grocery_crud->display_as('region', 'Регион проживания');
		$this->grocery_crud->display_as('city', 'Город проживания');
		$this->grocery_crud->display_as('passport', 'Паспорт');
		$this->grocery_crud->display_as('passport_date', 'Паспорт. Дата выдачи');
		$this->grocery_crud->display_as('passport_who', 'Паспорт. Кем выдан');
		$this->grocery_crud->display_as('passport_code', 'Паспорт. Подразделение');
		$this->grocery_crud->display_as('birth', 'ДР');
		$this->grocery_crud->display_as('phone', 'Телефон');
		$this->grocery_crud->display_as('email', 'Email');
                $this->grocery_crud->display_as('referer', 'UTM');
		$this->grocery_crud->display_as('work', 'Работа');
		$this->grocery_crud->display_as('upfinance_text_status', 'Unicom');
		$this->grocery_crud->display_as('upfinance_status', 'Unicom');
		$this->grocery_crud->display_as('leadia_status', 'Leadia');
		$this->grocery_crud->display_as('leads_status', 'Leads');
		$this->grocery_crud->display_as('vteleport_status', 'Teleport');
                $this->grocery_crud->display_as('time', 'Время');
                $this->grocery_crud->display_as('step', 'Шаг');
		$this->grocery_crud->display_as('create_date', 'Создано');
		$this->grocery_crud->display_as('change_date', 'Изменено');
		
		$data = $this->grocery_crud->render();
		$data->y = $y;
		$data->m = $m;
		$data->d = $d;
		$data->y2 = $y2;
		$data->m2 = $m2;
		$data->d2 = $d2;                
		$data->content = $this->load->view('tabs', $data, true);
		
		$this->output($data);
	}
	
	public function _index_site($value, $row)
	{
		$theme = $this->config->item('themes');
		return empty($theme[$value])? '' : '<img src="/templates/'.$theme[$value].'/img/favicon.png" title="'.$value.'">';
	}
	
	public function _index_send_button($value, $row)
	{
		return '/add/send_manual/'.$row->id.'" data-fancybox-type="iframe';
	}
	
	public function _index_upfinance_text_status($value, $row)
	{
		$status = array('pending' => 'В ожидании', 'approve' => 'Принято');
		return isset($status[$value])? $status[$value] : $this->status($row->upfinance_status, $row, 'upfinance');
	}
	
	public function _index_upfinance_status($value, $row) {return $this->status($value, $row, 'upfinance');}
	public function _index_leadia_status($value, $row) {return $this->status($value, $row, 'leadia');}
	public function _index_leads_status($value, $row) {return $this->status($value, $row, 'leads');}
	public function _index_vteleport_status($value, $row) {return $this->status($value, $row, 'vteleport');}
        public function _step($value, $row){
            return "<span class='s".$value."'>".$value."</span>";
        }
        public function _phone($value, $row){
            return "+7".$value." ";
        }        
        public function _referer($value, $row){         
            parse_str($value, $output);
            if(isset($output['utm_source'])){
                $utm = $output['utm_source']; 
            }else{
                $utm = ''; 
            }
            return $utm;
        }        
        public function _time($value, $row){
            
            if($row->vteleport_date){
                $vdate ='<span title="Teleport">(T) '.date('H:i', strtotime($row->vteleport_date)).'</span><span> '.$row->vteleport_status.'</span>';
            } else {$vdate = false;}
            
            if($row->leadia_date){
                $ldate ='<span title="Leadia">(L) '.date('H:i', strtotime($row->leadia_date)).'</span><span> '.$row->leadia_status.'</span>';
            } else {$ldate = false;}
            
            if($row->upfinance_date){
                $udate ='<span title="Unicom">(U) '.date('H:i', strtotime($row->upfinance_date)).'</span><span> '.$row->upfinance_status.'</span>';
            } else {$udate = false;}           
            
            $time = $ldate.'<br/>'.$vdate.'<br/>'.$udate;
            
            return $time;
        }
	private function status($value, $row, $broker)
	{
		if ($value == 2)
		{
			$field = $broker.'_error';
			$error = json_decode($row->$field);
			
			// Leadia
			if ($broker == 'leadia')
			{
				if (empty($error)) return 'Нет ответа';
				else $error = $this->var2str($error);
			}
			// Leads.su
			elseif ($broker == 'leads')
			{
				if (isset($error->error) && isset($error->error->params))
				{
					foreach($error->error->params as $item)
					if (isset($item->message) && (strpos(' '.$item->message, 'Дубл') > 0 || strpos($item->message, 'уже есть') > 0)) return 'Дубль';
				}
				$error = $this->var2str($error);
			}
			// Upfinance
			elseif ($broker == 'upfinance')
			{
				if (empty($error->data))
					$error = $this->var2str($error);
				else
				{
					if ($error->data == 'Эта анкета уже есть в базе') return '-';
					else $error = $this->var2str($error->data);
				}
                            return '-';    
			}
			// vTeleport
			elseif ($broker == 'vteleport')
			{
				if (strpos($row->$field, 'error double') > 0) return '-';
				$error = $row->$field;
			}
			
			return '<a href="#'.$broker.$row->id.'" class="fancybox">Ошибка</a><div id="'.$broker.$row->id.'" style="display:none;">'.$error.'</div>';
		}
		elseif ($value == 4)
		{
			if ($broker == 'leadia')
				return 'В ожидании';
			elseif ($broker == 'leads')
				return 'K24 - OK';
		}
		elseif ($value == 3)
		{
			if ($broker == 'leadia')
				return 'В обработке';
			elseif ($broker == 'vteleport')
				return '< 30 000';
			elseif ($broker == 'leads')
			{
				$field = $broker.'_error';
				$error = json_decode($row->$field);
				if (isset($error->error) && isset($error->error->params))
				{
					foreach($error->error->params as $item)
					if (isset($item->message) && (strpos(' '.$item->message, 'Дубл') > 0 || strpos($item->message, 'уже есть') > 0)) return 'K24 - Дубль';
				}
				$error = $this->var2str($error);
				return '<a href="#'.$broker.$row->id.'" class="fancybox">K24 - Ошибка</a><div id="'.$broker.$row->id.'" style="display:none;">'.$error.'</div>';
			}
		}
		elseif ($value == 1)
		{
			// vTeleport (костыль, т.к. иногда дубль почему-то со статусом ОК)
			$field = $broker.'_error';
			if ($broker == 'vteleport' && strpos($row->$field, 'error double') > 0) return '-';
			
			return 'OK';
		}
		else
			return '—';
	}
	
	private function var2str($mixed = null)
	{
		ob_start();
		echo '<pre>';
		print_r($mixed);
		echo '</pre>';
		$content = ob_get_contents();
		ob_end_clean();
		return $content;
	}
	
	private function output($output=false)
	{
		$data = $output? $output : $this->grocery_crud->render();
		$data->theme = 'common';
		$data->template = 'admin';
		$this->load->view('template', $data);
	}
	
	public function test($all=false)
	{
		$q = $this->db->query('SELECT email, f, i, o FROM forms WHERE DATE_FORMAT(create_date, "%Y%m%d") >= 20160622 ORDER BY create_date DESC');
		foreach($q->result_array() as $row)
		echo $row['email'].','.$row['f'].','.$row['i'].','.$row['o'].','."\r\n";
	}
}