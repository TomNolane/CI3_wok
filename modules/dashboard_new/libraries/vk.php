<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Vk{
	private $link = 'https://api.vk.com/method/';
	public function query($method, $param){
		$url = $this->link.$method.'?';
		$url .= http_build_query($param);
		
                //echo $url;
                
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false );
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false );
		$result = curl_exec($curl);
		curl_close($curl);
	
		$res = json_decode($result, TRUE);
		return $res['response'];
	}
        public function get_query($query, $param){
            $this->vk=new vk;
            return $this->vk->query($query, $param);
	}
}