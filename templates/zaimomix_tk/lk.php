<?php
$my_header = "Воспользуйтесь уникальным предложением:";
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
    array(
        "text" => "&nbsp;&nbsp;&nbsp;&nbsp;Внимание! Предложение ограничено. Инвестиции 11500 рублей Ваша гарантированная прибыль от 70 000 руб.! Все риски берет на себя компания.<br><br>",
        "img" => "/templates/mikrodengi/img/img4.jpg",
        "header" => "НАЧНИ ЗАРАБАТЫВАТЬ УЖЕ СЕГОДНЯ ОТ 70 000 РУБЛЕЙ!<br><br>",
        "link" => "http://tracker.fffgfry.com/tracker?offer_id=866&aff_id=998&cb=0",
        "btn" => "Узнать подробнее"
    ),
    array(
       "text" => "&nbsp;&nbsp;&nbsp;&nbsp;Воспользуйся уникальным предложением! Вноси депозит от 1000 РУБ и получай БОНУСОМ +2000 РУБ на счет!<br><br><br>",
       "img" => "/templates/mikrodengi/img/img1.png",
       "header" => "Лучшие игровые автоматы здесь! Играй и выигрывай от 10 000 РУБ ежедневно!<br><br>",
       "link" => "https://helpjob.tk?utm_source=mikrodengi1_mikrodengi2_mikrodengi3",
       "btn" => "Начать выигрывать"
    ),
    array(
        "text" =>  "&nbsp;&nbsp;&nbsp;&nbsp;Играй и выигрывай от 9856 рублей в день! Специальное предложение для Вас. 100% бонус от клуба Вулкан!<br><br><br>",
        "img" => "/templates/mikrodengi/assets/img/lk2.jpg",
        "header" => "ЗАБЕРИ СВОИ ДЕНЬГИ<br>Каждую секунду здесь выигрывают от 582 рублей!",
        "link" => "http://c.cpl7.ru/mA3p",
        "btn" => "Начать выигрывать"
    ),
    array(
        "text" => "&nbsp;&nbsp;&nbsp;&nbsp;Уникальный лифтинг-стик с коллагеном от бренда Maxclinic. Разглаживает морщины на лице и шее, восстанавливает обмен и выработку коллагена, подтягивает кожу и делает ее более упругой.<br><br>",
        "img" => "/templates/mikrodengi/img/img2.jpg",
        "header" => "Революция для вашей кожи!<br>МИНУС 10 ЛЕТ ЗА 5 МИНУТ!<br>",
        "link" => "https://qualityby.ru/land_maxclinic-stick3/?ref=162875&lnk=1918544",
        "btn" => "Заказать со скидкой"
    ),
    array(
       "text" => "&nbsp;&nbsp;&nbsp;&nbsp;Персональный магический амулет на богатство. Изготавливается из имперских монет, заговаривается на имя конкретного человека. Оберегает от финансовых неудач и помогает выйти на новый уровень жизни.<br><br>",
       "img" => "/templates/mikrodengi/img/img1.jpg",
       "header" => "ЗАБУДЬТЕ О НЕУДАЧАХ, ДЕНЬГИ БУДУТ ВАШИ!",
       "link" => "https://payshopss.ru/money-amulet5/?ref=162875&lnk=1918518",
       "btn" => "Заказать со скидкой"
    ),
    array(
        "text" => "&nbsp;&nbsp;&nbsp;&nbsp;Миостимулятор нового поколения - худейте без диет и фитнеса. Отличается высокочастотными импульсами, бьющими точно в цель мышечных волокон и жировых клеток. Пояс можно носить под одеждой, даже когда вы на работе или в дороге!",
        "img" => "/templates/mikrodengi/img/img3.jpg",
        "header" => "ВСЕГО 23 МИНУТЫ В ДЕНЬ - И ВАШЕ ТЕЛО КАК С ОБЛОЖКИ ЖУРНАЛА!",
        "link" => "https://bestshopby.ru/ems-trainer20/?ref=162875&lnk=1918552",
        "btn" => "Заказать со скидкой"
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
    <h1>Воспользуйтесь уникальным предложением:</h1>
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