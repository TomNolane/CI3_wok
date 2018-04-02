<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Debug_model extends CI_Model
{
	public function variant($var)
	{
		file_put_contents(
						  FCPATH.'modules/debug/data/.ht.variant',
						  date('Y.m.d H:i:s')."\n".serialize($var)."\n",
						  FILE_APPEND);
	}
}