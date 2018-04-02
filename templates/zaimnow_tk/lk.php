<?php
$my_header = "Вам автоматически одобрен займ";
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
$pixel = $this->pixel->stat('zaimnow.ru');

$_plural_years = array('год', 'года', 'лет');
$_plural_months = array('месяц', 'месяца', 'месяцев');
$_plural_days = array('день', 'дня', 'дней');
$_plural_times = array('раз', 'раза', 'раз');
function plural_type($n) { 
    return ($n%10==1 && $n%100!=11 ? 0 : ($n%10>=2 && $n%10<=4 && ($n%100<10 || $n%100>=20) ? 1 : 2)); 
} 

$arr = array(
    // array(
    // "text" => "Ваша Карта \"Совесть\" одобрена! Рассрочка 0% до 12 мес! Лимит до 300 000 руб.<br><br><br>",
    // "img" => "/templates/cashnow1_tk/assets/img/lk1.png",
    // "header" => "Карта \"Совесть\"",
    // "link" => "http://c.cpl7.ru/mybA",
    // "btn" => "Получить карту"
    // ),
    array(
        "text" =>  "Играй и выигрывай от 9856 рублей в день! Специальное предложение для Вас. 100% бонус от клуба Вулкан!<br><br>",
        "img" => "/templates/cashnow1_tk/assets/img/lk2.jpg",
        "header" => "Забери свои деньги",
        "link" => "http://c.cpl7.ru/mA3p",
        "btn" => "Начать выигрывать"
    ),
    array(
        "text" => "Минус 10-12 кг в месяц без строгих диет и фитнеса! Gardenin FatFlex по скидке сегодня 50% специально для Вас!<br><br>",
        "img" => "/templates/cashnow1_tk/assets/img/lk3.jpg",
        "header" => "\"Gardenin FatFlex\"",
        "link" => "http://c.twtn.ru/mzhP",
        "btn" => "Заказать со скидкой"
    ),
    array(
        "text" => "Продай свой автомобиль за считанные минуты, а главное за хорошую цену! Бонус специально для Вас! Сервис номер один в России!",
        "img" => "/templates/cashnow1_tk/assets/img/lk4.jpg",
        "header" => "\"СarPrice\"",
        "link" => "http://c.cpl7.ru/mAq2",
        "btn" => "Продать авто"
    )
);

?>
<style>
    .lk-img {
        padding-right: 20px;
    }
</style>
<div class="ex-offerta">
<div class="container ">
    <h1>Вам автоматически одобрен займ в следующих организациях:</h1>
</div>
<div class="ex-offerta-bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="ex-offerta-head">
                    <table>
                        <tbody>
                        <tr>
                            <td><div></div></td> 
                            <td><div></div></td>
                            <td></td><td></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <?php  
                    foreach($arr as $item)
                    {
                        $domen = str_replace('www.','',$_SERVER['HTTP_HOST']);
                        $item['link'] = str_replace("#site", $domen, $item['link']);

                        echo '<div class="ex-offerta-block ex-on-small-device">
                            <table>
                                <tbody>
                                <tr>
                                    <td data-label="Кредитная организация">
                                        <div><a href="'.$item['link'].'" onclick="markTarget(\'pixel_result\', \''.$item['header'].'\', \''.$pixel.'\')" target="_blank">
                                            <img class="lk-img '.$item['img'].'" src="'.$item['img'].'" alt="'.$item['header'].'">
                                        </a></div>
                                    </td>
                                    <td data-label="Сумма займа"> 
                                        <p class="text-left">'.$item['text'].'</p>
                                    </td>
                                    <td data-label="">
                                        <div>
                                            <a href="'.$item['link'].'" onclick="markTarget(\'pixel_result\', \''.$item['header'].'\', \''.$pixel.'\')" target="_blank"><button class="ex-main-btn">'.$item['btn'].'</button></a>
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
            </div>
        </div>
    </div>
</div> 
<?php require 'footer.php'; ?>