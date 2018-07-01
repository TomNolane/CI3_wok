<?php
mb_internal_encoding("UTF-8");
list(, $char_a) = unpack('N', mb_convert_encoding("а", 'UCS-4BE', 'UTF-8'));
list(, $char_b) = unpack('N', mb_convert_encoding("б", 'UCS-4BE', 'UTF-8'));
list(, $char_v) = unpack('N', mb_convert_encoding("в", 'UCS-4BE', 'UTF-8'));
list(, $char_g) = unpack('N', mb_convert_encoding("г", 'UCS-4BE', 'UTF-8'));
list(, $char_d) = unpack('N', mb_convert_encoding("д", 'UCS-4BE', 'UTF-8'));
list(, $char_e) = unpack('N', mb_convert_encoding("е", 'UCS-4BE', 'UTF-8'));
list(, $char_ee) = unpack('N', mb_convert_encoding("ё", 'UCS-4BE', 'UTF-8'));
list(, $char_j) = unpack('N', mb_convert_encoding("ж", 'UCS-4BE', 'UTF-8'));
list(, $char_z) = unpack('N', mb_convert_encoding("з", 'UCS-4BE', 'UTF-8'));
list(, $char_i) = unpack('N', mb_convert_encoding("и", 'UCS-4BE', 'UTF-8'));
list(, $char_ii) = unpack('N', mb_convert_encoding("й", 'UCS-4BE', 'UTF-8'));
list(, $char_k) = unpack('N', mb_convert_encoding("к", 'UCS-4BE', 'UTF-8'));
list(, $char_l) = unpack('N', mb_convert_encoding("л", 'UCS-4BE', 'UTF-8'));
list(, $char_m) = unpack('N', mb_convert_encoding("м", 'UCS-4BE', 'UTF-8'));
list(, $char_n) = unpack('N', mb_convert_encoding("н", 'UCS-4BE', 'UTF-8'));
list(, $char_o) = unpack('N', mb_convert_encoding("о", 'UCS-4BE', 'UTF-8'));
list(, $char_p) = unpack('N', mb_convert_encoding("п", 'UCS-4BE', 'UTF-8'));
list(, $char_r) = unpack('N', mb_convert_encoding("р", 'UCS-4BE', 'UTF-8'));
list(, $char_s) = unpack('N', mb_convert_encoding("с", 'UCS-4BE', 'UTF-8'));
list(, $char_t) = unpack('N', mb_convert_encoding("т", 'UCS-4BE', 'UTF-8'));
list(, $char_y) = unpack('N', mb_convert_encoding("у", 'UCS-4BE', 'UTF-8'));
list(, $char_f) = unpack('N', mb_convert_encoding("ф", 'UCS-4BE', 'UTF-8'));
list(, $char_h) = unpack('N', mb_convert_encoding("х", 'UCS-4BE', 'UTF-8'));
list(, $char_chs) = unpack('N', mb_convert_encoding("ц", 'UCS-4BE', 'UTF-8'));
list(, $char_ch) = unpack('N', mb_convert_encoding("ч", 'UCS-4BE', 'UTF-8'));
list(, $char_sh) = unpack('N', mb_convert_encoding("ш", 'UCS-4BE', 'UTF-8'));
list(, $char_shc) = unpack('N', mb_convert_encoding("щ", 'UCS-4BE', 'UTF-8'));
list(, $char_mz) = unpack('N', mb_convert_encoding("ь", 'UCS-4BE', 'UTF-8'));
list(, $char_iii) = unpack('N', mb_convert_encoding("ы", 'UCS-4BE', 'UTF-8'));
list(, $char_tz) = unpack('N', mb_convert_encoding("ъ", 'UCS-4BE', 'UTF-8'));
list(, $char_ae) = unpack('N', mb_convert_encoding("э", 'UCS-4BE', 'UTF-8'));
list(, $char_u) = unpack('N', mb_convert_encoding("ю", 'UCS-4BE', 'UTF-8'));
list(, $char_ya) = unpack('N', mb_convert_encoding("я", 'UCS-4BE', 'UTF-8'));
list(, $char_0) = unpack('N', mb_convert_encoding("0", 'UCS-4BE', 'UTF-8'));
list(, $char_1) = unpack('N', mb_convert_encoding("1", 'UCS-4BE', 'UTF-8'));
list(, $char_2) = unpack('N', mb_convert_encoding("2", 'UCS-4BE', 'UTF-8'));
list(, $char_3) = unpack('N', mb_convert_encoding("3", 'UCS-4BE', 'UTF-8'));
list(, $char_4) = unpack('N', mb_convert_encoding("4", 'UCS-4BE', 'UTF-8'));
list(, $char_5) = unpack('N', mb_convert_encoding("5", 'UCS-4BE', 'UTF-8'));
list(, $char_6) = unpack('N', mb_convert_encoding("6", 'UCS-4BE', 'UTF-8'));
list(, $char_7) = unpack('N', mb_convert_encoding("7", 'UCS-4BE', 'UTF-8'));
list(, $char_8) = unpack('N', mb_convert_encoding("8", 'UCS-4BE', 'UTF-8'));
list(, $char_9) = unpack('N', mb_convert_encoding("9", 'UCS-4BE', 'UTF-8'));
 
$array = array(
    $char_a => "01",
    $char_b => "02",
    $char_v => "03",
    $char_g => "04",
    $char_d => "05",
    $char_e => "06",
    $char_ee => "07",
    $char_j => "08",
    $char_z => "09",
    $char_i => "10",
    $char_ii => "11",
    $char_k => "12",
    $char_l => "13",
    $char_m => "14",
    $char_n => "15",
    $char_o => "16",
    $char_p => "17",
    $char_r => "18",
    $char_s => "19",
    $char_t => "20",
    $char_y => "21",
    $char_f => "22",
    $char_h => "23",
    $char_chs => "24",
    $char_ch => "25",
    $char_sh => "26",
    $char_shc => "27",
    $char_mz => "28",
    $char_iii => "29",
    $char_tz => "30",
    $char_ae => "31",
    $char_u => "32",
    $char_ya => "33",
    $char_0 => "34",
    $char_1 => "35",
    $char_2 => "36",
    $char_3 => "37",
    $char_4 => "38",
    $char_5 => "39",
    $char_6 => "40",
    $char_7 => "41",
    $char_8 => "42",
    $char_9 => "43"
);


ERROR

//$s = array("мне нужно займ","мне нужен займ","мне нужен заим","жене нужно займ","хотел бы найти займ","загрузить документы","хочу найти займ");
$query = $this->db->select('id,question')->get('bot_feedback');
$s = $query->result();
$s2 = array("привет");



$f0 = [];
foreach($s as $ss)
{
    array_push($f0,$ss->question); 
}

$f = GetIntLenght($f0,$array);  
$f2 = GetIntLenght($s2,$array);



/* FOR GetIntLenght to All question from DB and UPDATE */

$this->db->select('id,question');
$query = $this->db->get('bot_feedback');
$ds = [];
foreach ($query->result() as $row)
    array_push($ds,['id'=>$row->id,'code' => implode("",GetIntLenght([$row->question],$array))]); 
$this->db->update_batch('bot_feedback', $ds, 'id');
echo 'Done'; 

    // $f3 = CompareWords($f,$f2);  

    // $f4 =[]; $ttemp = 1;
    // foreach($f3 as $f33)
    // {
    //     array_push($f4, ["id" => $ttemp , '%' => $f33]); 
    //     $ttemp++;
    // }

    // function cmp_function_desc($a, $b){
    //     return ($a['%'] < $b['%']);
    // } 

    // uasort($f4, 'cmp_function_desc');
    
    // echo '<pre>'; 
    // var_dump(  $f4 );
    // echo '</pre>';
    // return;

    // $query = $this->db->select('id,answers')->where('id', current($f4)['id'])->get('bot_feedback');
    // $s = $query->result();

    // echo $s[0]->answers;
     
// echo '<pre>'; 
// echo current($f4)['id'];
// echo '</pre>';



function CompareWords($f, $f2)
{
    $temp = GetPairs($f);
    $temp2 = GetPairs($f2);
    $sss = end($temp[0]);
    $ls = array();
    foreach($temp as $s)
    {
        $dd = GetPercent($s,GetComareItems($s, $temp2[0] ));  
        array_push($ls,intval($dd));
    }
    return $ls;
}

function ExploidStr($temp,$i)
{
    $d = array(); 
 
    $int_temp = 0; $arr_temp = '';
    $temp = preg_split('//u',$temp,-1,PREG_SPLIT_NO_EMPTY);
    foreach($temp as $r)
    { 
        if($int_temp != 0 && $int_temp % $i == 0)
        { 
            array_push($d,$arr_temp);
            $arr_temp = '';
        }
        $arr_temp .= $r;
        $int_temp++;
    } 
    array_push($d,$arr_temp);
    return $d;
}

function GetComareItems($f, $f2)
{  
    $main = implode("", $f); 
    $h = ExploidStr(implode("", $f2),4);  
    $h2 = ExploidStr(implode("", $f2),6);  
    $h3 = ExploidStr(implode("", $f2),8); 

    $temp = 0; 

    foreach($h3 as $s3)
    {
        if(mb_strlen($s3, "UTF-8") == 8)
        {
            $tt = preg_match('/'.$s3.'/',$main);
            if(preg_match('/'.$s3.'/',$main))
                $temp += 4;
        }  
    }

    foreach($h2 as $s2)
    {
        if(mb_strlen($s2, "UTF-8") == 6)
            if(preg_match('/'.$s2.'/',$main) > 0)
                $temp += 3 ;
    }

    // foreach($h as $s)
    // {
    //     if(mb_strlen($s, "UTF-8") == 4)
    //         if(preg_match('/'.$s.'/',$main) > 0)
    //             $temp += 2;
    // } 
    return $temp;
}

function GetPercent($f, $x)
{ 
    if($x != 0)
        return (($x * 100) / count($f)) . "";
    else return "0";
}

function GetPairs($f)
{   
    $d = array(); 
    foreach($f as $temp)
    {
        $temp = str_replace("0.","",$temp);
        $ss = ExploidStr($temp,2); 
        array_push($d, $ss);
    } 
    return $d;
}

function GetIntLenght($s,$array)
{ 
    $temp = array();
    if(is_array($s)){
        foreach($s as $word)
        {    
            $sb = '';
            $word = preg_split('//u',str_replace(" ","",$word),-1,PREG_SPLIT_NO_EMPTY);
            foreach ($word as $c)
            { 
                $rr = (int)implode("",unpack('N', mb_convert_encoding($c, 'UCS-4BE', 'UTF-8')));
                if(array_key_exists($rr ,$array))
                    $sb .= $array[ $rr ];
            }
            array_push($temp,"0.".$sb); 
        }
    }
    else
    {
        foreach(str_split($s) as $word)
        {    
            $sb = '';
            $word = preg_split('//u',$word,-1,PREG_SPLIT_NO_EMPTY);
            foreach ($word as $c)
            { 
                $rr = (int)implode("",unpack('N', mb_convert_encoding($c, 'UCS-4BE', 'UTF-8')));
                if(array_key_exists( $rr ,$array))
                    $sb .= $array[ $rr ];
            }
            array_push($temp,"0.".$sb); 
        }
    }
     
    return $temp;
} 