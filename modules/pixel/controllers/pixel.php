<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Pixel extends MX_Controller
{
    public function __construct(){
	parent::__construct();
    }
	
    public function index(){
        if(isset($_POST['id']) && isset($_POST['pixel'])){
            //echo $_POST['id'].' '.$_POST['pixel'];
            $this->load->model('pixel/pixel_model', 'pixel');
            $pixel = $this->pixel->pixel($_POST['id'], $_POST['pixel']);
            //echo $pixel;
        } else {
            echo 'null';
        }
    }
}