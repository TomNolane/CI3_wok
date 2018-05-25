<?php
 if($this->input->get('code') != '' && strpos($this->input->get('state'), 'source=vk') )
 { 
    $phone = explode("_",$this->input->get('state','79771234567'))[0];
    $sum = explode("_",$this->input->get('state','25000'))[1];
    $email = "";
    $name = "";
    $last_name = "";
     
    $client_id = '6488317'; // ID приложения
    $client_secret = '5fqVYjRCpEenlHbZz9qM'; // Защищённый ключ
    $redirect_uri = 'https://zaimnow.tk/callback'; // Адрес сайта
    $params = array(
        'client_id' => $client_id,
        'client_secret' => $client_secret,
        'code' => $this->input->get('code'),
        'redirect_uri' => $redirect_uri
    );
    $token = json_decode(file_get_contents('https://oauth.vk.com/access_token' . '?' . urldecode(http_build_query($params))), true);
    $email = $token["email"];
    
    $params2 = array(
        'access_token' => $token["access_token"],
        'v' => "5.78"
    );

    $r = json_decode(file_get_contents('https://api.vk.com/method/users.get' . '?' . urldecode(http_build_query($params2))), true);
    $name = $r['response'][0]['first_name']; 
    $last_name = $r['response'][0]['last_name']; 
    file_get_contents("https://zaimnow.tk/addnew/?send=true&display=0&referer=https%3A%2F%2Fzaimnow.tk%2F&id=&step=3&ad_id=4&amount=$sum&period=21&f=$last_name&i=$name&o=%D0%98%D0%B2%D0%B0%D0%BD%D0%BE%D0%B2%D0%B0&gender=1&birth_dd=%D0%B2%D1%8B%D0%B1%D0%B5%D1%80%D0%B8&birth_mm=%D0%B2%D1%8B%D0%B1%D0%B5%D1%80%D0%B8&birth_yyyy=%D0%B2%D1%8B%D0%B1%D0%B5%D1%80%D0%B8&birthdate=24%2F05%2F2000&phone=$phone&email=$email&delays_type=never&passport=4510+123456&passport_s=4510&passport_n=451012&passport_dd=04&passport_mm=06&passport_yyyy=2000&passportdate=24%2F05%2F2013&passport_code=770-098&passport_who=%D0%9E%D0%A2%D0%94%D0%95%D0%9B%D0%95%D0%9D%D0%98%D0%95+%D0%A3%D0%A4%D0%9C%D0%A1+%D0%A0%D0%9E%D0%A1%D0%A1%D0%98%D0%98+%D0%9F%D0%9E+%D0%93%D0%9E%D0%A0.+%D0%9C%D0%9E%D0%A1%D0%9A%D0%92%D0%95+%D0%9F%D0%9E+%D0%A0%D0%90%D0%99%D0%9E%D0%9D%D0%A3+%D0%A9%D0%A3%D0%9A%D0%98%D0%9D%D0%9E&birthplace=%D0%B3.+%D0%9D%D0%BE%D0%B2%D0%BE%D1%81%D0%B8%D0%B1%D0%B8%D1%80%D1%81%D0%BA%2C+%D0%9D%D0%BE%D0%B2%D0%BE%D1%81%D0%B8%D0%B1%D0%B8%D1%80%D1%81%D0%BA%D0%BE%D0%B3%D0%BE+%D1%80%D0%B0%D0%B9%D0%BE%D0%BD%D0%B0&region=%D0%A0%D0%B5%D1%81%D0%BF%D1%83%D0%B1%D0%BB%D0%B8%D0%BA%D0%B0+%D0%9A%D0%B0%D1%80%D0%B5%D0%BB%D0%B8%D1%8F&city=%D0%9F%D0%B5%D1%82%D1%80%D0%BE%D0%B7%D0%B0%D0%B2%D0%BE%D0%B4%D1%81%D0%BA&street=%D1%83%D0%BB.+%D0%9B%D0%B5%D0%BD%D0%B8%D0%BD%D0%B0&building=14&housing=&flat=&reg_type=1&reg_same=1&work=%D0%A8%D0%A2%D0%90%D0%A2%D0%9D%D0%AB%D0%99+%D0%A1%D0%9E%D0%A2%D0%A0%D0%A3%D0%94%D0%9D%D0%98%D0%9A&work_name=%D0%B7%D0%B0%D0%B2%D0%BE%D0%B4&work_occupation=%D1%8D%D0%BB%D0%B5%D0%BA%D1%82%D1%80%D0%B8%D0%BA-%D0%BC%D0%BE%D0%BD%D1%82%D0%B0%D0%B6%D0%BD%D0%B8%D0%BA&work_phone=8+(912)+123+4567&work_experience=12&work_salary=25000&work_region=%D0%A0%D0%B5%D1%81%D0%BF%D1%83%D0%B1%D0%BB%D0%B8%D0%BA%D0%B0+%D0%9A%D0%B0%D1%80%D0%B5%D0%BB%D0%B8%D1%8F&work_city=%D0%9F%D0%B5%D1%82%D1%80%D0%BE%D0%B7%D0%B0%D0%B2%D0%BE%D0%B4%D1%81%D0%BA&work_street=%D0%B3.+%D0%9D%D0%BE%D0%B2%D0%BE%D1%81%D0%B8%D0%B1%D0%B8%D1%80%D1%81%D0%BA&work_house=14&work_building=&work_office=14");
    header("Location: https://zaimnow.tk/lk");
    die();
 } 
 else if(strpos($this->input->get('state'), 'source=fb')) {
    $phone = explode("_",$this->input->get('state','79771234567'))[0];
    $sum = explode("_",$this->input->get('state','25000'))[1];
    $email = explode("_",$this->input->get('state','test@test.ru'))[2];
    $name = explode("_",$this->input->get('state','Иван'))[3];
    $last_name = explode("_",$this->input->get('state','Иванов'))[4];
    file_get_contents("https://zaimnow.tk/addnew/?send=true&display=0&referer=https%3A%2F%2Fzaimnow.tk%2F&id=&step=3&ad_id=4&amount=$sum&period=21&f=$last_name&i=$name&o=%D0%98%D0%B2%D0%B0%D0%BD%D0%BE%D0%B2%D0%B0&gender=1&birth_dd=%D0%B2%D1%8B%D0%B1%D0%B5%D1%80%D0%B8&birth_mm=%D0%B2%D1%8B%D0%B1%D0%B5%D1%80%D0%B8&birth_yyyy=%D0%B2%D1%8B%D0%B1%D0%B5%D1%80%D0%B8&birthdate=24%2F05%2F2000&phone=$phone&email=$email&delays_type=never&passport=4510+123456&passport_s=4510&passport_n=451012&passport_dd=04&passport_mm=06&passport_yyyy=2000&passportdate=24%2F05%2F2013&passport_code=770-098&passport_who=%D0%9E%D0%A2%D0%94%D0%95%D0%9B%D0%95%D0%9D%D0%98%D0%95+%D0%A3%D0%A4%D0%9C%D0%A1+%D0%A0%D0%9E%D0%A1%D0%A1%D0%98%D0%98+%D0%9F%D0%9E+%D0%93%D0%9E%D0%A0.+%D0%9C%D0%9E%D0%A1%D0%9A%D0%92%D0%95+%D0%9F%D0%9E+%D0%A0%D0%90%D0%99%D0%9E%D0%9D%D0%A3+%D0%A9%D0%A3%D0%9A%D0%98%D0%9D%D0%9E&birthplace=%D0%B3.+%D0%9D%D0%BE%D0%B2%D0%BE%D1%81%D0%B8%D0%B1%D0%B8%D1%80%D1%81%D0%BA%2C+%D0%9D%D0%BE%D0%B2%D0%BE%D1%81%D0%B8%D0%B1%D0%B8%D1%80%D1%81%D0%BA%D0%BE%D0%B3%D0%BE+%D1%80%D0%B0%D0%B9%D0%BE%D0%BD%D0%B0&region=%D0%A0%D0%B5%D1%81%D0%BF%D1%83%D0%B1%D0%BB%D0%B8%D0%BA%D0%B0+%D0%9A%D0%B0%D1%80%D0%B5%D0%BB%D0%B8%D1%8F&city=%D0%9F%D0%B5%D1%82%D1%80%D0%BE%D0%B7%D0%B0%D0%B2%D0%BE%D0%B4%D1%81%D0%BA&street=%D1%83%D0%BB.+%D0%9B%D0%B5%D0%BD%D0%B8%D0%BD%D0%B0&building=14&housing=&flat=&reg_type=1&reg_same=1&work=%D0%A8%D0%A2%D0%90%D0%A2%D0%9D%D0%AB%D0%99+%D0%A1%D0%9E%D0%A2%D0%A0%D0%A3%D0%94%D0%9D%D0%98%D0%9A&work_name=%D0%B7%D0%B0%D0%B2%D0%BE%D0%B4&work_occupation=%D1%8D%D0%BB%D0%B5%D0%BA%D1%82%D1%80%D0%B8%D0%BA-%D0%BC%D0%BE%D0%BD%D1%82%D0%B0%D0%B6%D0%BD%D0%B8%D0%BA&work_phone=8+(912)+123+4567&work_experience=12&work_salary=25000&work_region=%D0%A0%D0%B5%D1%81%D0%BF%D1%83%D0%B1%D0%BB%D0%B8%D0%BA%D0%B0+%D0%9A%D0%B0%D1%80%D0%B5%D0%BB%D0%B8%D1%8F&work_city=%D0%9F%D0%B5%D1%82%D1%80%D0%BE%D0%B7%D0%B0%D0%B2%D0%BE%D0%B4%D1%81%D0%BA&work_street=%D0%B3.+%D0%9D%D0%BE%D0%B2%D0%BE%D1%81%D0%B8%D0%B1%D0%B8%D1%80%D1%81%D0%BA&work_house=14&work_building=&work_office=14");
    header("Location: https://zaimnow.tk/lk");
    die();
 }