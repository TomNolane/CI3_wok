<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Forms_model extends CI_Model
{
    public function forms($date1=null, $date2=null, $site=null, $referrer=null){
        
        isset($date1)?:$date1=date('Y-m-d');
        isset($date2)?:$date2=date('Y-m-d');

        if(isset($site) && $site <> 'all'){
            $query = $this->db->where('site', $site);
        }
        if(isset($referrer) && $referrer <> 'all'){
            $query = $this->db->like('referer', '&utm_source='.$referrer);
        }        
        $query = $this->db->where('DATE_FORMAT(create_date, "%Y-%m-%d") >= DATE_FORMAT("'."$date1 00:00:00".'", "%Y-%m-%d")');
        $query = $this->db->where('DATE_FORMAT(create_date, "%Y-%m-%d") <= DATE_FORMAT("'."$date2 23:59:59".'", "%Y-%m-%d")');            
        
        $query = $this->db->order_by("create_date", "desc");
        $query = $this->db->get('forms');
        return $query->result_array();
    }
    public function form(){
        $this->db->select('id, site, f,i,o,create_date,step,referer');
        $this->db->order_by("id", "desc");
        $this->db->limit(1000);
        $query = $this->db->get('forms');
        return $query->result_array();
        
    }    
    public function form_status($id){
        $this->db->where('forms_id', $id);
        $this->db->where('(func = "send" OR func = "cron")');
        $query = $this->db->get('forms_stat');
        return $query->result_array();
    }
    public function forms_stat($date1=null, $date2=null, $site=null, $referrer=null){
        
        isset($date1)?:$date1=date('Y-m-d');
        isset($date2)?:$date2=date('Y-m-d');

        if(isset($site) && $site <> 'all'){
            $query = $this->db->where('site', $site);
        }
        if(isset($referrer) && $referrer <> 'all'){
            $query = $this->db->like('referer', '&utm_source='.$referrer);
        }        
        $query = $this->db->select('gate, gate_status, date', FALSE);
        
        $query = $this->db->where('DATE_FORMAT(date, "%Y-%m-%d") >= DATE_FORMAT("'."$date1 00:00:00".'", "%Y-%m-%d")');
        $query = $this->db->where('DATE_FORMAT(date, "%Y-%m-%d") <= DATE_FORMAT("'."$date2 23:59:59".'", "%Y-%m-%d")');            
        
        $query = $this->db->order_by("date", "desc");
        $query = $this->db->get('forms_stat');
        return $query->result_array();
    }
    public function forms_stat21($date1=null, $date2=null, $site=null, $referrer=null){
        
        isset($date1)?:$date1=date('Y-m-d');
        isset($date2)?:$date2=date('Y-m-d');

        if(isset($site) && $site <> 'all'){
            $query = $this->db->where('site', $site);
        }
        if(isset($referrer) && $referrer <> 'all'){
            $query = $this->db->like('referer', '&utm_source='.$referrer);
        }        
        $query = $this->db->where('DATE_FORMAT(date, "%Y-%m-%d") >= DATE_FORMAT("'."$date1 00:00:00".'", "%Y-%m-%d")');
        $query = $this->db->where('DATE_FORMAT(date, "%Y-%m-%d") <= DATE_FORMAT("'."$date2 23:59:59".'", "%Y-%m-%d")');            
        $query = $this->db->where('func', '21');
        $query = $this->db->order_by("date", "desc");
        $query = $this->db->get('forms_stat');
        return $query->result_array();
    }    
    public function direct_add($item, $name, $token){
        $sql = 'INSERT INTO direct (`name`,`campaignid`, `statdate`, `showssearch`, `clickssearch`, `goalcostsearch`, `goalconversionsearch`, `sumsearch`, `sessiondepthsearch`, `showscontext`, `goalconversioncontext`, `clickscontext`, `sessiondepthcontext`, `goalcostcontext`, `sumcontext`, `token`) '
             . 'VALUES ("'.$name.'",  "'.$item->CampaignID.'","'.$item->StatDate.'","'.$item->ShowsSearch.'","'.$item->ClicksSearch.'","'.$item->GoalCostSearch.'","'.$item->GoalConversionSearch.'","'.$item->SumSearch.'","'.$item->SessionDepthSearch.'","'.$item->ShowsContext.'","'.$item->GoalConversionContext.'","'.$item->ClicksContext.'","'.$item->SessionDepthContext.'","'.$item->GoalCostContext.'","'.$item->SumContext.'","'.$token.'") '
             . 'ON DUPLICATE KEY UPDATE'
             . '`name`="'.$name.'", '   
             . '`showssearch`="'.$item->ShowsSearch.'", '
             . '`clickssearch`="'.$item->ClicksSearch.'", '
             . '`goalcostsearch`="'.$item->GoalCostSearch.'", '
             . '`goalconversionsearch`="'.$item->GoalConversionSearch.'", '
             . '`sumsearch`="'.$item->SumSearch.'", '
             . '`sessiondepthsearch`="'.$item->SessionDepthSearch.'", '
             . '`showscontext`="'.$item->ShowsContext.'", '
             . '`goalconversioncontext`="'.$item->GoalConversionContext.'", '
             . '`clickscontext`="'.$item->ClicksContext.'", '
             . '`sessiondepthcontext`="'.$item->SessionDepthContext.'", '
             . '`sumcontext`="'.$item->SumContext.'", '  
             . '`goalcostcontext`="'.$item->GoalCostContext.'";';
        $this->db->query($sql);
        return $this->db->last_query();
        //return $this->db->affected_rows();
    } 
    public function direct_get($date1=null, $date2=null){
        if(isset($date1) and isset($date2)){
            $this->db->where('DATE_FORMAT(statdate, "%Y-%m-%d") >= DATE_FORMAT("'."$date1 00:00:00".'", "%Y-%m-%d")');
            $this->db->where('DATE_FORMAT(statdate, "%Y-%m-%d") <= DATE_FORMAT("'."$date2 23:59:59".'", "%Y-%m-%d")');            
        }      
        $this->db->select('name, SUM(showssearch) as showssearch, SUM(clickssearch) as clickssearch, SUM(goalcostsearch) as goalcostsearch, SUM(goalconversionsearch) as goalconversionsearch, SUM(sumsearch) as sumsearch, SUM(sessiondepthsearch) as sessiondepthsearch, SUM(showscontext) as showscontext, SUM(goalconversioncontext)/COUNT(goalconversioncontext) as goalconversioncontext, SUM(clickscontext) as clickscontext, SUM(sessiondepthcontext) as sessiondepthcontext, SUM(goalcostcontext) as goalcostcontext, SUM(sumcontext) as sumcontext', FALSE);
        $this->db->group_by('name');
        $this->db->order_by("statdate", "desc");
        $query = $this->db->get('direct');
        //$this->db->last_query();
        return $query->result_array();
    }    
    public function source($source, $date1=null, $date2=null){
        
        if(isset($date1) and isset($date2)){
            $query = $this->db->where('DATE_FORMAT(create_date, "%Y-%m-%d") >= DATE_FORMAT("'."$date1 00:00:00".'", "%Y-%m-%d")');
            $query = $this->db->where('DATE_FORMAT(create_date, "%Y-%m-%d") <= DATE_FORMAT("'."$date2 23:59:59".'", "%Y-%m-%d")');            
        } else {
            $query = $this->db->limit(500);        
        }
        
        $query = $this->db->like('referer', '&utm_source='.$source); 
        $query = $this->db->order_by("id", "desc");
        $query = $this->db->get('forms');
        return $query->result_array();
        
    }   
    public function pixel($date1=null, $date2=null, $site=null){
        
        isset($date1)?:$date1=date('Y-m-d');
        isset($date2)?:$date2=date('Y-m-d');

        if(isset($site) && $site <> 'all'){
            $query = $this->db->where('site', $site);
        }        
        $query = $this->db->where('DATE_FORMAT(date, "%Y-%m-%d") >= DATE_FORMAT("'."$date1 00:00:00".'", "%Y-%m-%d")');
        $query = $this->db->where('DATE_FORMAT(date, "%Y-%m-%d") <= DATE_FORMAT("'."$date2 23:59:59".'", "%Y-%m-%d")');            
        
        $query = $this->db->order_by("date", "desc");
        $query = $this->db->get('pixel');
        return $query->result_array();
    }  
    public function time($date1=null, $date2=null, $site=null){
        
        isset($date1)?:$date1=date('Y-m-d');
        isset($date2)?:$date2=date('Y-m-d');

        if(isset($site) && $site <> 'all'){
            $query = $this->db->where('site', $site);
        }        
        $query = $this->db->where('DATE_FORMAT(date, "%Y-%m-%d") >= DATE_FORMAT("'."$date1 00:00:00".'", "%Y-%m-%d")');
        $query = $this->db->where('DATE_FORMAT(date, "%Y-%m-%d") <= DATE_FORMAT("'."$date2 23:59:59".'", "%Y-%m-%d")');            
        
        $query = $this->db->order_by("date", "desc");
        $query = $this->db->get('time');
        return $query->result_array();
    }    
    public function turn($gate=null){
        
        if(isset($gate)){
            $this->db->where('step = 3 and('. $gate.'_status = 0 OR '.$gate.'_status is NULL)');
        }else{
            $this->db->where('leadia_status', 0);
            $this->db->where('vteleport_status', 0);
        }
        
        $query = $this->db->get('forms');
        //echo $this->db->last_query();

        return $query->result_array();
    }    
    public function request($forms_id){
        
        if(isset($forms_id)){$this->db->where('forms_id', $forms_id);}
        
        $this->db->order_by("id", "desc");
        $query = $this->db->get('forms_stat', 5000);
        //echo $this->db->last_query();
        return $query->result_array();
    }     
    public function mail_settings(){
        $query = $this->db->get('mail_settings');
        return $query->result_array();
    }
    public function get_questions(){
        $this->db->update('feedback', array('status' => 1));
        $query = $this->db->group_by('email'); 
        $query = $this->db->get('feedback');
        return $query->result_array();
    }
    public function get_new_questions(){
        $query = $this->db->where('status is NULL');
        $query = $this->db->group_by('email'); 
        $query = $this->db->get('feedback');
        return $query->num_rows();
    }    
    
    
    
    public function site_settings($site=null){
        
        if(isset($site)){
            $query = $this->db->where('site', $site);
        }        
        
        $query = $this->db->get('site_settings');
        return $query->result_array();
    }    
    public function popup_settings($id, $data){
        $this->db->update('site_settings', $data, array('id' => $id)); 
        echo $this->db->last_query();
        return $this->db->affected_rows();
    }
    public function gate_settings(){
        $query = $this->db->order_by("delay", "asc");
        $query = $this->db->get('gate_settings');
        return $query->result_array();
    } 
    public function gate_settings_update($id, $data){
        $this->db->update('gate_settings', $data, array('id' => $id));      
        return $this->db->affected_rows();
    }    
}