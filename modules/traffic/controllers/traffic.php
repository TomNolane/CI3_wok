<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Traffic extends MX_Controller
{
    public function __construct(){
	parent::__construct();
    }
    public function index(){
        if(isset($_POST['site'])){          
            $this->load->model('traffic/traffic_model', 'traffic');
            $traffic = $this->traffic->traffic($_POST['site'], $_POST['page']);
            echo $traffic;
        } else {
            echo 'null';
        }
    }
}