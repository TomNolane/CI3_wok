<?php
    $my_title = 'Вам автоматически одобрен займ';
    require 'header.php';
    $this->load->model('offers/offers_model', 'offers');
    $data = $this->offers->all();
    // IP
    $this->load->helper('ip');
    // GEO
    require_once FCPATH.'modules/ipgeobase/ipgeobase.php';
    $gb = new IPGeoBase();
    $geo = $gb->getRecord(IP::$ip);
    if ($geo)
    {
        if (isset($geo['region'])) $region_name = $geo['region'];
    }
    // Список регионов
    $this->load->model('geo/geo_model', 'geo');
    $regions = $this->geo->regions();

    //pixel stat
    $this->load->model('pixel/pixel_model', 'pixel');
    $pixel = $this->pixel->stat('cashnow.su');
?>
<div class="ex-offerta">
    <div class="container ">
        <h1>Вам автоматически одобрен займ в следующих организациях:</h1>
    </div>
    <div class="container">
    <div class="ex-offerta-head">
<table>
    <tbody>
    <tr>
        <td>
            <div>Кредитная организация</div>
        </td>
        <td>
            <div>Сумма займа</div>
        </td>
        <td>
            <div>Срок займа</div>
        </td>
        <td>
            <div>Основная ставка</div>
        </td>
        <td></td>
    </tr>
    </tbody>
</table>
</div>
<?php  
function plural_type($n) { 
    return ($n%10==1 && $n%100!=11 ? 0 : ($n%10>=2 && $n%10<=4 && ($n%100<10 || $n%100>=20) ? 1 : 2)); 
} 

$arr = array(
    array(
        "title" => "Zaimer",
        "img" => "zaymer",
        "text" => "Займы онлайн в Казахстане от Займер",
        "link" => "https://pxl.leads.su/click/64d72b33de41d8fbc5d8007e108e3914?aff_sub1=Zaimnow.su",
        "amount" => "200000",
        "period" => "21",
        "percent" => "0,49"
      ),
      array(
        "title" => "Zing",
        "img" => "zing",
        "text" => "Займы онлайн в Казахстане от Zing",
        "link" => "https://pxl.leads.su/click/a604b113bfa4287bd880c340a6bb9825?aff_sub1=Zaimnow.su",
        "amount" => "200000",
        "period" => "30",
        "percent" => "0.50"
      ),
      array(
        "title" => "ccloan",
        "img" => "ccloan",
        "text" => "Займы онлайн в Казахстане от ccloan",
        "link" => "https://pxl.leads.su/click/a35dfa2f3d49fe02d7ffcb7ed3f1b0f1?aff_sub1=Zaimnow.su",
        "amount" => "200000",
        "period" => "30",
        "percent" => "1.00"
      ),
      array(
        "title" => "Moneyman",
        "img" => "moneyman",
        "text" => "Займы онлайн в Казахстане от Moneyman",
        "link" => "https://pxl.leads.su/click/3fede75a05555fc1afbedaf279d75e21?aff_sub1=Zaimnow.su",
        "amount" => "200000",
        "period" => "31",
        "percent" => "0.50"
      )
);

$_plural_years = array('год', 'года', 'лет');
$_plural_months = array('месяц', 'месяца', 'месяцев');
$_plural_days = array('день', 'дня', 'дней');
$_plural_times = array('раз', 'раза', 'раз');
// <a href="'.$item['link'].'" onclick="markTarget(\'pixel_result\', \''.$item['title'].'\', \''.$pixel.'\')" target="_blank"><img  src="/templates/common/img/offers/'.$item['img'].'.png" class="'.$item['img'].'" alt="'.$item['title'].'"></a>
//  до <b>'.$item["amount"].' рублей<
//  до <b>'.$item["period"].' '.$_plural_days[plural_type($item['period'])].'
// <a style="color: #000000" href="'.$item['link'].'" onclick="markTarget(\'pixel_result\', \''.$item['title'].'\', \''.$pixel.'\')"   target="_blank"><button class="ex-main-btn ">Получить деньги</button></a>
// <b>от '.$item["percent"].'%</b>

 foreach($arr as $item){ 
    $domen = str_replace('www.','',$_SERVER['HTTP_HOST']);
    $item['link'] = str_replace("#site", $domen, $item['link']);
echo '
<div class="ex-offerta-block">
<table>
    <tbody>
    <tr>
        <td data-label="Кредитная организация">
            <div><a href="'.$item['link'].'" onclick="markTarget(\'pixel_result\', \''.$item['title'].'\', \''.$pixel.'\')" target="_blank"><img  src="/templates/common/img/offers/'.$item['img'].'.png" class="img-fluid2 '.$item['img'].'" alt="'.$item['title'].'"></a></div>
        </td>
        <td data-label="Сумма займа">
            <div>&nbsp;&nbsp; до <b>'.$item["amount"].' ₸</div>
        </td>
        <td data-label="Срок займа">
            <div>&nbsp;&nbsp; до <b>'.$item["period"].' '.$_plural_days[plural_type($item['period'])].'</div>
        </td>
        <td data-label="Основная ставка">
            <div>&nbsp;&nbsp;  от '.$item["percent"].'%</div>
        </td>
        <td data-label="">
            <div>
                <a style="color: #000000" href="'.$item['link'].'" onclick="markTarget(\'pixel_result\', \''.$item['title'].'\', \''.$pixel.'\')"   target="_blank"><button class="ex-main-btn ">Получить деньги</button></a>
            </div>
        </td>
    </tr> 
    </tbody>
</table>
</div>';
}
?>
 </div>
</div>
<?php include "footer.php"; ?>