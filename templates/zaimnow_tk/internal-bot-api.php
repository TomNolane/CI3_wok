<?php
header('Content-Type: application/json');
//ar_dump($this->input->post()); 
try { 
    $d = $this->input->post("question", TRUE);
    $d = "хотел бы получить займ для мужа";

    if(empty($d))
    {
        echo '{"answers":"Здравствуйте! Я могу:<br>1) Оформить займ<br>2) Ответить на вопрос<br>3) Отправить вопрос администрации<br>Какой № Вы выбираете?"}';
        return;
    } 
    $d = str_replace("хотелбы","",$d);
    $d = str_replace("хотел бы","",$d);
    $d = str_replace("хотела бы","",$d);
    $d = str_replace("хотелабы","",$d);
    $d = str_replace("не могу","",$d);
    $d = str_replace("понять","",$d);
    $d = str_replace("возможно","",$d);
    $d = str_replace("какова","",$d);
    $d = str_replace("каков","",$d);
    $d = str_replace("где","",$d);
    $d = str_replace("почему","",$d);

    if($d[0] == ' ')
    $d = substr($d, 1);
 
    $temp = explode(" ",$d); 

    $this->db->select('*');
    $this->db->from('bot_feedback');
    //$this->db->like('question', $array, 'both');
    foreach($temp as $t)
    {
        $this->db->or_like('question', $t, 'both'); 
    }
    
    $query = $this->db->get();
    //var_dump($query->result());
    $temp2 = '';
    foreach ($query->result() as $row)
    {
        $temp = explode(";",$row->answers);
        $temp2 = $temp[rand(0,count($temp)-1)];
        $temp2 = str_replace("\n","",$temp2);
        if(!empty($temp2)) echo '{"answers":"'.$temp2.'"}';
        else echo '{"answers":"Я вас не поняла. Для получения справки введите знак \'?\'"}';
        break;
     } 
}
catch (Exception $e) {
    var_dump( $e);
}
?>