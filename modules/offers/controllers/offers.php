<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Offers extends MX_Controller
{
	public function __construct()
	{
		parent::__construct();
		
		$this->load->helper('url');
		$this->load->helper('permissions');
		
		$this->load->database();
	}
	
	public function index()
	{
		$this->check_auth();
		
		$this->load->library('grocery_CRUD');
		
		$this->grocery_crud->unset_read();
		$this->grocery_crud->unset_print();
		$this->grocery_crud->unset_export();
		
		$this->grocery_crud->set_subject('Оффер');
		$this->grocery_crud->set_table('offers');
		$this->grocery_crud->order_by('priority');
		
		$this->grocery_crud->columns('id', 'title', 'amount', 'period', 'percent', 'prob', 'link', 'card', 'qiwi', 'yandex', 'contact', 'full_country', 'regions', 'active', 'priority');
		$this->grocery_crud->fields('id', 'title', 'amount', 'period', 'percent', 'prob', 'link', 'img', 'card', 'qiwi', 'yandex', 'contact', 'full_country', 'regions', 'priority', 'active');
		
		$this->grocery_crud->set_relation_n_n('regions', 'offer_region', 'regions', 'offer_id', 'region_id', 'name');
		
		$this->grocery_crud->add_action('Настроить регионы', '/modules/offers/img/regions.png', '','',array($this,'_index_regions_button'));
		
		$this->grocery_crud->display_as('id', 'ID');
		$this->grocery_crud->display_as('title', 'Название');
		$this->grocery_crud->display_as('amount', 'Сумма');
		$this->grocery_crud->display_as('period', 'Срок');
		$this->grocery_crud->display_as('percent', '%');
		$this->grocery_crud->display_as('prob', 'Вероятность');
		$this->grocery_crud->display_as('link', 'Ссылка');
		$this->grocery_crud->display_as('img', 'Логотип');
		
		$this->grocery_crud->display_as('card', 'Карты');
		$this->grocery_crud->display_as('qiwi', 'QIWI');
		$this->grocery_crud->display_as('yandex', 'Я.Д');
		$this->grocery_crud->display_as('contact', 'CONTACT');
		
		$this->grocery_crud->display_as('min_year', 'Мин. возраст');
		$this->grocery_crud->display_as('max_year', 'Макс. возраст');
		$this->grocery_crud->display_as('min_amount', 'Мин. сумма');
		$this->grocery_crud->display_as('max_amount', 'Макс. сумма');
		
		$this->grocery_crud->display_as('full_country', 'Вся страна');
		$this->grocery_crud->display_as('regions', 'Регионы');
		$this->grocery_crud->display_as('priority', 'Порядок');
		$this->grocery_crud->display_as('active', 'Статус');
		
		/*$data = $this->grocery_crud->render();
		$data->content = $this->load->view('offers', null, true);
		
		$this->output($data);*/
		
		$this->output();
	}
	
	public function _index_regions_button($value, $row)
	{
		return '/offers/regions/'.$row->id;
	}
	
	public function by_region($region_id=0)
	{
		$region_id = abs(intval($region_id));
		$this->load->model('offers_model', 'offers');
		echo json_encode($this->offers->by_region($region_id));
	}
	
	public function regions($offer_id)
	{
		$this->check_auth();
		
		$this->load->library('grocery_CRUD');
		
		$this->grocery_crud->unset_read();
		$this->grocery_crud->unset_print();
		$this->grocery_crud->unset_export();
		
		$this->grocery_crud->set_subject('Регион');
		$this->grocery_crud->set_table('offer_region');
		$this->grocery_crud->where('offer_id', $offer_id);
		
		$this->grocery_crud->columns('region_id', 'full_region', 'cities');
		$this->grocery_crud->add_fields('region_id', 'full_region', 'offer_id');
		$this->grocery_crud->edit_fields('region_id', 'full_region');
		
		$this->grocery_crud->field_type('offer_id', 'hidden', $offer_id);
		
		$this->grocery_crud->set_relation('region_id', 'regions', 'name');
		$this->grocery_crud->set_relation_n_n('cities', 'offer_city', 'cities', 'offer_id', 'city_id', 'name');
		
		$this->grocery_crud->add_action('Настроить города', '/modules/offers/img/regions.png', '','',array($this,'_regions_cities_button'));
		
		$this->grocery_crud->display_as('region_id', 'Регион');
		$this->grocery_crud->display_as('full_region', 'Весь регион');
		$this->grocery_crud->display_as('cities', 'Города');
		
		$data = $this->grocery_crud->render();
		$data->offer_id = $offer_id;
		$data->content = $this->load->view('regions', $data, true);
		
		$this->output($data);
	}
	
	public function _regions_cities_button($value, $row)
	{
		return '/offers/cities/'.$row->offer_id.'/'.$row->region_id;
	}
	
	public function cities($offer_id, $region_id)
	{
		$this->check_auth();
		
		$this->load->library('grocery_CRUD');
		
		$this->grocery_crud->unset_read();
		$this->grocery_crud->unset_print();
		$this->grocery_crud->unset_export();
		
		$this->grocery_crud->set_subject('Город');
		$this->grocery_crud->set_table('offer_city');
		$this->grocery_crud->where('offer_id', $offer_id);
		
		$this->grocery_crud->columns('city_id');
		$this->grocery_crud->fields('city_id', 'offer_id');
		
		$this->grocery_crud->field_type('offer_id', 'hidden', $offer_id);
		
		$this->grocery_crud->set_relation('city_id', 'cities', 'name', array('region_id' => $region_id));
		
		$this->grocery_crud->display_as('city_id', 'Город');
		
		$data = $this->grocery_crud->render();
		$data->offer_id = $offer_id;
		$data->region_id = $region_id;
		$data->content = $this->load->view('cities', $data, true);
		
		$this->output($data);
	}
	
	public function bulk_regions($offer_id)
	{
		$this->check_auth();
		
		if (isset($_POST['regions']))
		{
			$this->load->model('offers_model', 'offers');
			$this->offers->add_regions($offer_id, $this->input->post('regions', true));
			redirect('/offers/regions/'.$offer_id);
		}
		else
		{
			$this->load->model('geo/geo_model', 'geo');
			
			$data = new stdClass;
			$data->regions = $this->geo->regions();
			$data->offer_id = $offer_id;
			$data->content = $this->load->view('bulk_regions', $data, true);
			
			$this->output($data);
		}
	}
	
	public function check_auth()
	{
		if (!logged_in() || !is_admin())
		{
			$identity = $this->config->item('identity', 'ion_auth');
			$this->session->set_userdata($identity, false);
			redirect('/login/?from='.uri_string());
		}
	}
	
	private function output($output=false)
	{
		$data = $output? $output : $this->grocery_crud->render();
		$data->template = 'admin';
		$this->load->view('template', $data);
	}
}