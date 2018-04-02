<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Validate extends MX_Controller
{
    public function Index(){
    }
        
    public function phone(){
                
        if(isset($_POST['phone'])){
            $phone = preg_replace('~\D+~','',$_POST['phone']);
            $phone = file_get_contents('http://www.megafon.ru/api/mfn/info?msisdn='.$phone);
            $phone = json_decode($phone, true);
            //var_dump($phone); 
            if(isset($phone['operator_id'])){
                $status = 1;
                switch ($phone['operator_id']){
                case 1:
                    $operator =  "mts";
                    break;
                case 2:
                    $operator =  "megafon";
                    break;
                case 20:
                    $operator =  "tele2";
                    break;
                case 99:
                    $operator =  "beeline";
                    break;                
                default:
                    $status = 1;
                    $operator = 'undefined';
                }
            }else{
                $operator = 'undefined';
                $status = 0;
            }           
        }else{
            $status = 0;
            $operator = 'undefined';
        }
        $request = array( 'status'=>$status, 'operator'=>$operator );
        echo json_encode($request);
    } 
    public function passport_code(){
        if(isset($_POST['passport_code'])){
            $this->load->model('pass_model', 'pass');
            $pass = $this->pass->get_pass(preg_replace('~\D+~','',$_POST['passport_code']));
            if(isset($pass['title'])){
                $status = 1;
                $who = preg_replace('%[\']%', '',$pass['title']);
            } else {
                $status = 0;
                $who = 'Пожалуйста, введите код подразделения правильно';                 
            }       
        }else{
            $status = 0;
            $who = 'Пожалуйста, введите код подразделения правильно';
        }
        $request = array( 'status'=>$status, 'who'=>$who );
        echo json_encode($request);
    }    
}