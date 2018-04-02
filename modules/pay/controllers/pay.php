<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class pay extends MX_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->database();
	}
	public function index(){
	}
	public function addpay(){
            $this->load->model('pay_model', 'pay');           
            $data = array('uid' => $_POST['id']);
            $result = $this->pay->addpay($data);
            return $result;
	}
	public function check(){
            header("Content-Type: application/xml");
            $customerNumber = $_POST['customerNumber'];
            $this->load->model('pay_model', 'pay');          
            $result = $this->pay->get($customerNumber);
            if(!empty($result)){
                $request = '<?xml version="1.0" encoding="UTF-8"?><checkOrderResponse performedDatetime="'.$_POST['requestDatetime'].'" code="0" invoiceId="'.$_POST['invoiceId'].'" shopId="133822"/>';
            } else {
                $request = '1';
            }
            echo $request;
	}
	public function aviso(){
            $this->load->model('pay_model', 'pay');
            
            $data = array('uid' => $_POST['id']);
            $result = $this->pay->addpay($data);
            return $result;
	}
	public function test(){
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, 'https://dengimo.ru/pay/check/');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_TIMEOUT, 30);
		curl_setopt($ch, CURLOPT_POSTFIELDS, 'action=checkOrder&shopId=100500&scid=555777&customerNumber=421336&cdd_pan_mask=444444|4448 \
&orderNumber=38&paymentType=AC&invoiceId=2000000833650&shopSumAmount=100.00&md5=2A409E2B81D7A77A2B745A2F62916C42 \
&orderSumAmount=3200.00&cdd_exp_date=1217&paymentPayerCode=4100322062290&cdd_rrn=&external_id=deposit \
&requestDatetime=2016-07-11T15:29:35.438+03:00&depositNumber=tNGTnJmP7sPdWnPiSeOXLUFLB5MZ.001f.201607 \
&cps_user_country_code=PL&orderCreatedDatetime=2016-07-11T15:29:35.360+03:00&sk=yed009c9df4e4f0a47d15e20d4af3231e \
&shopSumBankPaycash=1003&shopSumCurrencyPaycash=10643&rebillingOn=false&orderSumBankPaycash=1003&cps_region_id=213 \
&orderSumCurrencyPaycash=10643&merchant_order_id=38_110716152918_00000_64759 \
&unilabel=1f15a4dd-0009-5000-8000-0000116d476c&yandexPaymentId=2570052456918');
		$output = curl_exec($ch);
		if ($output === false) $output = curl_error($ch);
		curl_close($ch);
		print_r($output);
	}        
}