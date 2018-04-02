<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Install extends MX_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('permissions');if (!is_admin()) redirect('/login/?from='.uri_string());
		$this->load->database();
		$this->load->dbforge();
	}
	
	public function index()
	{
		// forms
		//$this->dbforge->drop_table('forms');
		if (!$this->db->table_exists('forms'))
		{
			$fields = array(
					'f' => array(
						'type' => 'VARCHAR',
						'constraint' => '100'
					),
					'i' => array(
						'type' => 'VARCHAR',
						'constraint' => '100'
					),
					'o' => array(
						'type' => 'VARCHAR',
						'constraint' => '100'
					),
					'amount' => array(
						'type' => 'INT',
						'constraint' => '6'
					),
					'period' => array(
						'type' => 'INT',
						'constraint' => '2'
					),
					'gender' => array(
						'type' => 'TINYINT',
						'constraint' => '1'
					),
					'region' => array(
						'type' => 'VARCHAR',
						'constraint' => '100'
					),
					'city' => array(
						'type' => 'VARCHAR',
						'constraint' => '100'
					),
					'passport' => array(
						'type' => 'VARCHAR',
						'constraint' => '12'
					),
					'passport_date' => array(
						'type' => 'DATE'
					),
					'passport_who' => array(
						'type' => 'VARCHAR',
						'constraint' => '255'
					),
					'passport_code' => array(
						'type' => 'VARCHAR',
						'constraint' => '7'
					),
					'birth' => array(
						'type' => 'DATE'
					),
					'phone' => array(
						'type' => 'VARCHAR',
						'constraint' => '10'
					),
					'email' => array(
						'type' => 'VARCHAR',
						'constraint' => '100'
					),
					'reg_region' => array(
						'type' => 'VARCHAR',
						'constraint' => '100'
					),
					'reg_city' => array(
						'type' => 'VARCHAR',
						'constraint' => '100'
					),
					'reg_street' => array(
						'type' => 'VARCHAR',
						'constraint' => '100'
					),
					'reg_building' => array(
						'type' => 'VARCHAR',
						'constraint' => '50'
					),
					'work' => array(
						'type' => 'VARCHAR',
						'constraint' => '60'
					),
					'delays' => array(
						'type' => 'TINYINT',
						'constraint' => '1'
					),
					'work_occupation' => array(
						'type' => 'VARCHAR',
						'constraint' => '255'
					),
					'work_salary' => array(
						'type' => 'INT'
					),
					'work_name' => array(
						'type' => 'VARCHAR',
						'constraint' => '255'
					),
					'work_experience' => array(
						'type' => 'INT',
						'constraint' => '3'
					),
					'work_phone' => array(
						'type' => 'VARCHAR',
						'constraint' => '10'
					),
					'work_region' => array(
						'type' => 'VARCHAR',
						'constraint' => '128'
					),
					'work_city' => array(
						'type' => 'VARCHAR',
						'constraint' => '128'
					),
					'work_street' => array(
						'type' => 'VARCHAR',
						'constraint' => '128'
					),
					'work_house' => array(
						'type' => 'VARCHAR',
						'constraint' => '10'
					),
					'work_building' => array(
						'type' => 'VARCHAR',
						'constraint' => '10'
					),
					'work_office' => array(
						'type' => 'VARCHAR',
						'constraint' => '10'
					),
					'upfinance_status' => array(
						'type' => 'TINYINT',
						'constraint' => '1',
						'default' => '0'
					),
					'leadia_status' => array(
						'type' => 'TINYINT',
						'constraint' => '1',
						'default' => '0'
					),
					'leads_status' => array(
						'type' => 'TINYINT',
						'constraint' => '1',
						'default' => '0'
					),
					'vteleport_status' => array(
						'type' => 'TINYINT',
						'constraint' => '1',
						'default' => '0'
					),
					'upfinance_error' => array(
						'type' => 'VARCHAR',
						'constraint' => '255'
					),
					'leadia_error' => array(
						'type' => 'VARCHAR',
						'constraint' => '255'
					),
					'leads_error' => array(
						'type' => 'VARCHAR',
						'constraint' => '255'
					),
					'vteleport_error' => array(
						'type' => 'VARCHAR',
						'constraint' => '255'
					),
					'create_date' => array(
						'type' => 'DATETIME',
						'null' => TRUE
					),
					'change_date' => array(
						'type' => 'TIMESTAMP'
					)
			);
			$this->dbforge->add_field('id');
			$this->dbforge->add_field($fields);
			$this->dbforge->create_table('forms', TRUE);
			$this->dbforge->add_key('id', TRUE);
			echo '[t] forms<br>';
		}
		
		// offers
		//$this->dbforge->drop_table('offers');
		if (!$this->db->table_exists('offers'))
		{
			$fields = array(
					'title' => array(
						'type' => 'VARCHAR',
						'constraint' => '50'
					),
					'min_year' => array(
						'type' => 'INT',
						'constraint' => '2'
					),
					'max_year' => array(
						'type' => 'INT',
						'constraint' => '2'
					),
					'min_amount' => array(
						'type' => 'INT',
						'constraint' => '6'
					),
					'max_amount' => array(
						'type' => 'INT',
						'constraint' => '6'
					),
					'full_country' => array(
						'type' => 'TINYINT',
						'constraint' => 1,
						'unsigned' => TRUE,
						'default' => '0'
					),
					'priority' => array(
						'type' => 'INT',
						'constraint' => '2'
					)
			);
			$this->dbforge->add_field('id');
			$this->dbforge->add_field($fields);
			$this->dbforge->create_table('offers', TRUE);
			$this->dbforge->add_key('id', TRUE);
			echo '[t] offers<br>';
		}
		
		// offer_region
		//$this->dbforge->drop_table('offer_region');
		if (!$this->db->table_exists('offer_region'))
		{
			$fields = array(
					'offer_id' => array(
						'type' => 'INT',
						'unsigned' => TRUE
					),
					'region_id' => array(
						'type' => 'INT',
						'unsigned' => TRUE
					),
					'full_region' => array(
						'type' => 'TINYINT',
						'constraint' => 1,
						'unsigned' => TRUE,
						'default' => '0'
					)
			);
			$this->dbforge->add_field('id');
			$this->dbforge->add_field($fields);
			$this->dbforge->create_table('offer_region', TRUE);
			$this->dbforge->add_key('id', TRUE);
			echo '[t] offer_region<br>';
		}
		
		// offer_city
		//$this->dbforge->drop_table('offer_city');
		if (!$this->db->table_exists('offer_city'))
		{
			$fields = array(
					'offer_id' => array(
						'type' => 'INT',
						'unsigned' => TRUE
					),
					'city_id' => array(
						'type' => 'INT',
						'unsigned' => TRUE
					)
			);
			$this->dbforge->add_field('id');
			$this->dbforge->add_field($fields);
			$this->dbforge->create_table('offer_city', TRUE);
			$this->dbforge->add_key('id', TRUE);
			echo '[t] offer_city<br>';
		}
	}
	
	public function geo()
	{
		$regions = array();
		$regions_order = array();
		$base = file(FCPATH.'modules/ipgeobase/cities.txt');
		// Генерим список регионов
		foreach($base as $row)
		{
			$row = mb_convert_encoding($row, 'utf-8', 'windows-1251');
			list($id, $city, $region, $okrug,,) = explode("\t", $row);
			if (!strpos($okrug, 'Украина'))
			{
				if (!isset($regions[$region]))
				{
					$regions[$region] = array();
					$regions_order[$region] = $region;
				}
				$regions[$region][] = $city;
			}
			
		}
		// Упорядочиваем регионы
		sort($regions_order);
		//print_r(array_flip($regions));
		//print_r($regions_order);
		// Упорядочиваем города
		foreach($regions as $key => $val)
		{
			sort($regions[$key]);
		}
		//print_r($regions);
		// Создаём таблицы
		// regions
		$this->dbforge->drop_table('regions');
		if (!$this->db->table_exists('regions'))
		{
			$fields = array(
					'region_id' => array(
						'type' => 'INT',
						'unsigned' => TRUE,
						'auto_increment' => TRUE
					),
					'name' => array(
						'type' => 'VARCHAR',
						'constraint' => '128'
					),
					'status' => array(
						'type' => 'TINYINT',
						'constraint' => '1',
						'default' => '1'
					)
			);
			//$this->dbforge->add_field('region_id', TRUE);
			$this->dbforge->add_field($fields);
			$this->dbforge->add_key('region_id', TRUE);
			$this->dbforge->create_table('regions', TRUE);
			echo '[t] regions<br>';
		}
		// cities
		$this->dbforge->drop_table('cities');
		if (!$this->db->table_exists('cities'))
		{
			$fields = array(
					'city_id' => array(
						'type' => 'INT',
						'unsigned' => TRUE,
						'auto_increment' => TRUE
					),
					'name' => array(
						'type' => 'VARCHAR',
						'constraint' => '128'
					),
					'region_id' => array(
						'type' => 'INT'
					),
					'status' => array(
						'type' => 'TINYINT',
						'constraint' => '1',
						'default' => '1'
					)
			);
			//$this->dbforge->add_field('city_id', TRUE);
			$this->dbforge->add_field($fields);
			$this->dbforge->add_key('city_id', TRUE);
			$this->dbforge->create_table('cities', TRUE);
			echo '[t] cities<br>';
		}
		// Заполняем таблицы
		foreach($regions_order as $region)
		{
			$this->db->insert('regions', array('name' => $region));
			$region_id = $this->db->insert_id();
			foreach($regions[$region] as $city)
			{
				$this->db->insert('cities', array('name' => $city, 'region_id' => $region_id));
			}
		}
	}
}