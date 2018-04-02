<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Time extends MX_Controller
{
    public function __construct(){
	parent::__construct();
    }
	
    public function index(){
        if(isset($_POST['site'])){          
            $this->load->model('time/time_model', 'time');
            $time = $this->time->time($_POST['site'], $_POST['time1'], $_POST['time2'], $_POST['time3']);
            //echo $time;
        } else {
            echo 'null';
        }
    }
}