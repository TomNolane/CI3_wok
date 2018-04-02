<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Geo_model extends CI_Model
{
	public function regions()
	{
		$query = $this->db->order_by('region_id')->get('regions');// oc_region
		$regions = array();
		if ($query->num_rows())
		foreach($query->result_array() as $row)
		$regions[$row['region_id']] = $row;
		return $regions;
		//return $query->result_array();
	}
	
	public function city($region_id)
	{
		
		$query = $this->db
			->select('city_id, name')
			->where('region_id', filter_var($region_id, FILTER_VALIDATE_INT))
			->order_by('name')
			->get('cities');// oc_city
		$cities = array();
		if ($query->num_rows())
		foreach($query->result_array() as $row)
		$cities[$row['city_id']] = $row;
		return $cities;
		//return $query->result_array();
	}
	
	public function region($city_id)
	{
		
		$query = $this->db->query('SELECT regions.region_id, regions.name FROM regions, cities '.
					  'WHERE cities.city_id = '.filter_var($city_id, FILTER_VALIDATE_INT).' '.
					  'AND regions.region_id = cities.region_id LIMIT 1');
		return $query->row_array();
	}
}