<?php
header('Content-Type: text/html; charset =utf-8');
$my_title = "Вам автоматически одобрен займ";
require 'header.php';
echo '<style>
.container3 .offers{
    background-color: #ffffff !important;}
</style>';
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
$pixel = $this->pixel->stat('mikrodengi.ml');

$_plural_years = array('год', 'года', 'лет');
$_plural_months = array('месяц', 'месяца', 'месяцев');
$_plural_days = array('день', 'дня', 'дней');
$_plural_times = array('раз', 'раза', 'раз');
function plural_type($n) { 
    return ($n%10==1 && $n%100!=11 ? 0 : ($n%10>=2 && $n%10<=4 && ($n%100<10 || $n%100>=20) ? 1 : 2)); 
}
function removeBOM($str="") {
    if(substr($str, 0, 3) == pack('CCC', 0xef, 0xbb, 0xbf)) {
        $str = substr($str, 3);
    }
    return $str;
}
$opts = array(
    'http'=>array(
      'method'=>"GET",
      'header'=>"Accept-language: en\r\n" .
                "Cookie: foo=bar\r\n"
    )
  );
  
  $context = stream_context_create($opts);
  
  // Open the file using the HTTP headers set above
  $file = file_get_contents('https://mikrodengi.su/lk9', false, $context);?>
<main class="ex-offerta">
    <div class="container">
        <h1 class="text-center"></h1>
        <div class="ex-offers-content">
            <div class="row">

<?php  echo removeBOM($file);
?><br><br><br><br><br><br>
<?php 
echo '<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- Микроденьги.мл -->
<ins class="adsbygoogle"
    style="display:block"
    data-ad-client="ca-pub-2018999784099007"
    data-ad-slot="9403700271"
    data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>';
echo '            </div>
</div>
</div>
<div class="buffer2"></div>
</main>';
require 'footer.php'; ?>