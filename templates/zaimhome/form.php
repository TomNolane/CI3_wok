<?php 
if(!isset($my_title))
{
	$my_title = 'Подача Заявки на Получение Займа Онлайн | Сервис Zaimhome';
	$description = 'Хотите получить денежный заем в сжатые сроки?Тогда заполните несложную форму заявка на нашем онлайн-сервисе по выдаче денежных займов в России';
}  
// IP
$this->load->helper('ip');
// GEO
require_once FCPATH.'modules/ipgeobase/ipgeobase.php';
$gb = new IPGeoBase();
$geo = $gb->getRecord(IP::$ip);
if ($geo)
    {
        if (isset($geo['region'])){
            $region_name = $geo['region'];
        }else{
            $region_name = 'Владимир';
        }
        if (isset($geo['city'])){
            $city_name = $geo['city'];
        }else{
            $city_name = 'Владимир';
        }
    }else{
        $region_name = 'Владимир';
        $city_name = 'Владимир';
	}
// Список регионов
$this->load->model('geo/geo_model', 'geo');
$regions = $this->geo->regions();

if(isset($_SERVER['HTTP_REFERER'])){
    $referer = $_SERVER['HTTP_REFERER'];
    parse_str($_SERVER['HTTP_REFERER'], $output);
        if(isset($output['utm_source'])){
            switch ($output['utm_source']) {
                case 'vk':
                    $utm = '1';
                    break;
                case 'direct':
                    $utm = '2';
                    break;
                case 'mytarget':
                    $utm = '3';
                    break;
                case 'google':
                    $utm = '4';
                    break;    
                case 'google_cms':
                    $utm = '5';
                    break;
                default:
                    $utm = '0';
                }
        }else{
            $utm = ''; 
        }
	$ad_id = '4'.$utm; 
} else {
    $referer = $_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
	$ad_id = '4'; 
}

require 'header.php';
?>
<div class="container ex-form">
    <h1 class="text-center" id="to_scroll">Как получить деньги?</h1>
    <div class="row">
        <div class="col-md-12 col-md-offset-0 col-xs-10 col-xs-offset-1">
            <div class="row">
                <div class="col-sm-10 col-sm-offset-1">
                    <div class="ex-indicator-scope ex-on-second-step ex-on-last-step nav nav-tabs" role="tablist">
                        <figure class="ex-first-step">
                            <p>
                                <br> </p>
                        </figure>
                        <figure class="ex-second-step">
                            <div>
                                <span></span>
                            </div>
                            <p>Личные данные 
                                <br> (всего 1 шаг)</p>
                        </figure>
                        <figure class="ex-last-step">
                            <p style="width: 105px; left: -130%;"></p>
                        </figure>
                    </div>
                </div>
            </div>
            <div class="row tab-content">
                <form class="form-horizontal form-label form-css-label" id="anketa" action="/lk" method="post" onsubmit="return validate();" autocomplete="off" novalidate>
                    <input type="hidden" name="display" id="display" value="0">
                    <input type="hidden" name="referer" value="<?=$referer?>">
                    <input type="hidden" name="id" value="">
                    <input type="hidden" name="step" value="1">
                    <input type="hidden" name="ad_id" value="<?=$ad_id?>">
                    <input type="hidden" id="amount" name="amount" value="<?php if(isset($_GET['amount'])) { $sum = '20000'; switch($_GET['amount']) { case '1000': $sum = '1000' ; break; case '2000': $sum = '2000' ; break; case '3000': $sum = '3000' ; break; case '4000': $sum = '4000' ; break; case '5000': $sum = '5000' ; break; case '6000': $sum = '6000' ; break; case '7000': $sum = '7000' ; break; case '8000': $sum = '8000' ; break; case '9000': $sum = '9000' ; break; case '10000': $sum = '10000' ; break; case '11000': $sum = '11000' ; break; case '12000': $sum = '12000' ; break; case '13000': $sum = '13000' ; break; case '14000': $sum = '14000' ; break; case '15000': $sum = '15000' ; break; case '20000': $sum = '20000' ; break; case '25000': $sum = '25000' ; break; case '30000': $sum = '30000' ; break; case '40000': $sum = '40000' ; break; case '50000': $sum = '50000' ; break; case '80000': $sum = '80000' ; break; case '100000': $sum = '100000' ; break; } echo $sum; if ($sum <= 10000) { $period = '7'; } else if ($sum <= 15000) { $period = '14'; } else if ($sum <= 20000) { $period = '21'; } else if ($sum <= 30000) { $period = '21'; } else if ($sum <= 50000) { $period = '30'; } else { $period = '30'; } } elseif(!isset($_POST['amount'])) echo '20000'; else echo $_POST['amount'];  ?>"/>
                    <input type="hidden" id="period" name="period" value="<?php if(isset($period)) { echo $period; } else echo empty($_POST['period'])? 21 : $_POST['period']; ?>" />
                    <div class="row tab-content">
                        <div role="tabpanel" class="tab-pane fade in active col-xs-12" id="firstTabContent">
                            <?php  require 'form1.php'; ?>
                        </div>
                    </div>
                    <div class="row tab-content">
                        <div role="tabpanel" class="tab-pane col-xs-12" id="secondTabContent">
                            <?php  require 'form2.php'; ?>
                        </div>
                    </div>
                    <div class="row tab-content">
                        <div role="tabpanel" class="tab-pane col-xs-12" id="lastTabContent">
                            <?php  require 'form3.php'; ?>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<br><br>
<?php require 'footer.php';?>
</body>
</html>