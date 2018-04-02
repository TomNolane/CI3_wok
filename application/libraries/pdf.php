<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once 'MPDF57/mpdf.php';

class pdf
{
	public function generate($file_name, $content)
	{
		$mpdf = new mPDF();
		$mpdf->WriteHTML($content);
		$mpdf->Output($file_name);
	}
}