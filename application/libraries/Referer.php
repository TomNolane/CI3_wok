<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Referer
{
	public function __construct()
	{
		// Если посетитель уже залоген, завершаем функцию
		if (logged_in()) return;
		
		// Если у посетителя реферер уже есть
		if (isset($_COOKIE['referer'])) return;
		
		// Определяем id реферера
		$referer = isset($_REQUEST['ref'])? abs(intval($_REQUEST['ref'])) : 0;
		
		// Устанавливаем "печеньку" с id реферера
		setcookie('referer', $referer, time()+31536000, '/');
		
		return true;
	}
}

/* End of file Referer.php */