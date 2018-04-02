<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Leads_model extends CI_Model
{
	public function offers($birth, $amount, $region, $city)
	{
		$offers = array();
		$result = array();
		
		// Определить возраст
		$age = $this->age($birth);
		
		// Выбрать офферы по сумме и по возрасту, отсортировав по приоритету
		$this->db->from('offers');
		$this->db->where('offers.min_year <=', $age);
		$this->db->where('offers.max_year >=', $age);
		$this->db->where('offers.min_amount <=', $amount);
		$this->db->where('offers.max_amount >=', $amount);
		$this->db->where('active', 1);
		$this->db->order_by('priority');
		$query = $this->db->get();
		$offers_aa = $query->result_array();
		
		// Пробегаем по всем выбранным офферам
		foreach($offers_aa as $offer)
		{
			// Создаём список офферов. В качестве ключа массива - ID оффера
			$offers[$offer['id']] = $offer;
			// Если оффер работает по всей стране, то сразу его добавляем в список подходящих офферов
			if ($offer['full_country'] == 1)
			$result[$offer['id']] = $offer;
		}
		/*
		echo '<pre>';
		print_r($offers);
		echo '</pre><hr>';
		*/
		// Выбрать офферы по региону
		$this->db->from('offer_region, regions');
		$this->db->where('offer_region.region_id = regions.region_id');
		$this->db->where('regions.name', $region);
		$query = $this->db->get();
		$offers_r = $query->result_array();
		
		// Пробегаем по всем выбранным офферам
		foreach($offers_r as $offer)
		{
			// Если оффер работает по всему региону, то сразу его добавляем в список подходящих офферов
			if ($offer['full_region'] == 1 && isset($offers[$offer['offer_id']]) && !isset($result[$offer['offer_id']]))
			$result[$offer['offer_id']] = $offers[$offer['offer_id']];
		}
		/*
		echo '<pre>';
		print_r($offers_r);
		echo '</pre><hr>';
		*/
		// Выбрать офферы по городу
		$this->db->from('offer_city, cities');
		$this->db->where('offer_city.city_id = cities.city_id');
		$this->db->where('cities.name', $city);
		$query = $this->db->get();
		$offers_c = $query->result_array();
		
		// Пробегаем по всем выбранным офферам
		foreach($offers_c as $offer)
		{
			// Добавляем в список подходящих офферов
			if (isset($offers[$offer['offer_id']]) && !isset($result[$offer['offer_id']]))
			$result[$offer['offer_id']] = $offers[$offer['offer_id']];
		}
		/*
		echo '<pre>';
		print_r($offers_c);
		echo '</pre><hr>';
		*/
		
		// Сортируем массив с результатами
		uasort($result, array($this, 'cmp'));
		/*
		echo '<pre>';
		print_r($result);
		echo '</pre>';
		*/
		
		return $result;
	}
	
	// Функция сравнения
	private function cmp($a, $b)
	{
		if ($a['priority'] == $b['priority'])
		{
			return ($a['id'] < $b['id']) ? -1 : 1;
		}
		return ($a['priority'] < $b['priority']) ? -1 : 1;
	}
	
	private function age($birthday)
	{
		$birthday_timestamp = strtotime($birthday);
		$age = date('Y') - date('Y', $birthday_timestamp);
		if (date('md', $birthday_timestamp) > date('md')) $age--;
		return $age;
	}
}