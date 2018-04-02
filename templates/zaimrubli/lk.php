<?php 
    $my_title = "Вам автоматически одобрен займ";
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
    $pixel = $this->pixel->stat('zaimrubli.ru');
?>
<main class="ex-offers">
    <div class="container">
        <h2 class="text-center">Вам автоматически одобрен займ<br>в следующих организациях:</h2>
    </div>
    <div class="ex-offers-content">
        <div class="container">
            <div class="row"> 

        <?php 
                function plural_type($n) { 
                    return ($n%10==1 && $n%100!=11 ? 0 : ($n%10>=2 && $n%10<=4 && ($n%100<10 || $n%100>=20) ? 1 : 2)); 
                } 
                
                $_plural_years = array('год', 'года', 'лет');
                $_plural_months = array('месяц', 'месяца', 'месяцев');
                $_plural_days = array('день', 'дня', 'дней');
                $_plural_times = array('раз', 'раза', 'раз');

                foreach($data as $item)
                {
                    $domen = str_replace('www.','',$_SERVER['HTTP_HOST']);
                    $item['link'] = str_replace("#site", $domen, $item['link']);

                    echo '<div class="col-md-3">
                        <div class=" ex-off-block">
                            <figure class="text-center ">
                                <div class="ex-img-offerta">
                                <a href="'.$item['link'].'" onclick="markTarget(\'pixel_result\', \''.$item['title'].'\', \''.$pixel.'\')" target="_blank">
                                    <img class="lk-img '.$item['img'].'" src="/templates/common/img/offers/'.$item['img'].'.png" alt="'.$item['title'].'">
                                </a> 
                                </div>
                                <table>
                                    <tbody>
                                    <tr>
                                        <td>Сумма займа</td>
                                        <td>до '.number_format($item['amount'],0,'',' ').' рублей</td>
                                    </tr>
                                    <tr>
                                        <td>Срок займа</td>
                                        <td>до '.$item['period'].' '.$_plural_days[plural_type($item['period'])].'</td>
                                    </tr>
                                    <tr>
                                        <td>Основная ставка</td>
                                        <td>'.$item['percent'].'%</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </figure>
                            <div class="ex-offers-foot">
                                <p class="text-center">
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                </p>
                                <a href="'.$item['link'].'" onclick="markTarget(\'pixel_result\', \''.$item['title'].'\', \''.$pixel.'\')" target="_blank"><button class="ex-main-btn">Получить деньги</button></a> 
                            </div>
                        </div>
                    </div>';
                }
?>
            </div>
        </div>
    </div>
</main>
<!-- Google Code for  
&#1050;&#1086;&#1085;&#1074;&#1077;&#1088;&#1089;&#1080;&#1103; Conversion  
Page -->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 822854490;
var google_conversion_label = "joByCJCX5XoQ2oaviAM";
var google_remarketing_only = false;
/* ]]> */
</script>
<script type="text/javascript"  
src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt=""  
src="//www.googleadservices.com/pagead/conversion/822854490/?label=joByCJCX5XoQ2oaviAM&amp;guid=ON&amp;script=0"/>
</div>
</noscript>
<?php require 'footer.php'; ?>