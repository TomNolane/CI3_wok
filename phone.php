<?php

$lines = file('phone.txt');
$result = array_unique($lines);

//print_r($result);


foreach ($result as $str => $val){
    file_put_contents('phone2.txt', $val ,FILE_APPEND);
}
/*
for($i=0; $i<=100; $i++){
    echo $result[$i];
    file_put_contents('phone2.txt', $result[$i],FILE_APPEND);
}
 * 
 */