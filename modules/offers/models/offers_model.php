<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Offers_model extends CI_Model
{
	public function all()
	{
		$query = $this->db->select('id, title, amount, period, percent, prob, link, img, card, qiwi, yandex, contact')->where('active', 1)->order_by('prob', 'desc')->get('offers');
		return $query->result_array();
	}
	
	public function by_region($region_id=0)
	{
		if ($region_id > 0)
		{
			$query = $this->db->select('offers.id'/*'offers.id, offers.title, offers.amount, offers.period, offers.percent, offers.prob, offers.link, offers.img'*/)
			->from('offers, offer_region')
			->where('offers.id = offer_region.offer_id')
			->where('offer_region.region_id', $region_id)
			->where('offers.active', 1)
			->order_by('priority')
			->get();
			$res = $query->result_array();
			
			$query = $this->db->select('id')->where('active', 1)->where('full_country', 1)->order_by('priority')->get('offers');
			return array_merge($res, $query->result_array());
		}
		else
		{
			$query = $this->db->select('id'/*'id, title, amount, period, percent, prob, link, img'*/)->where('active', 1)->order_by('priority')->get('offers');
			return $query->result_array();
		}
	}
	
	public function offer($offer_id)
	{
		$this->db->where('id', $offer_id);
		$query = $this->db->get('offers');
		$res = ($query->num_rows() > 0)? $query->result_array() : array(false);
		return $res[0];
	}
	
	public function region($region_id)
	{
		$this->db->where('region_id', $region_id);
		$query = $this->db->get('regions');
		$res = ($query->num_rows() > 0)? $query->result_array() : array(false);
		return $res[0];
	}
	
	public function add_regions($offer_id, $regions)
	{
		$data = array();
		foreach($regions as $region)
		{
			$region = abs(intval($region));
			$data[] = array('offer_id' => (int)$offer_id, 'region_id' => $region, 'full_region' => 1);
		}
		$this->db->insert_batch('offer_region', $data);
	}
}