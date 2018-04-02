<?php require 'header.php'; ?>

<link href="/templates/rublimo/css/form.css" rel="stylesheet" media="screen">

<?php
// IP
$this->load->helper('ip');
// GEO
require_once FCPATH.'modules/ipgeobase/ipgeobase.php';
$gb = new IPGeoBase();
$geo = $gb->getRecord(IP::$ip);
if ($geo)
{
	if (isset($geo['region'])) $region_name = $geo['region'];
	if (isset($geo['city'])) $city_name = $geo['city'];
}
// Список регионов
$this->load->model('geo/geo_model', 'geo');
$regions = $this->geo->regions();
?>

<div class="container">

<section class="steps">
<div class="row">
	<div class="col-xs-12">
		<div class="form-steps-line">
			<div class="form-steps-green-line">
		<div class="row" role="tablist" id="form-steps">
			<div class="col-xs-2 col-xs-offset-3 text-center" role="presentation">
				<a href="#form1" aria-controls="form1" role="tab"><span class="btn btn-circle" id="step1">1</span></a>
			</div>
			<div class="col-xs-2 text-center" role="presentation">
				<a href="#form2" aria-controls="form1" role="tab"><span class="btn btn-circle off" id="step2">2</span></a>
			</div>
			<div class="col-xs-2 text-center" role="presentation">
				<a href="#form3" aria-controls="form1" role="tab"><span class="btn btn-circle off" id="step3">3</span></a>
			</div>
		</div>
			</div>
		</div>
	</div>
</div>
</section>

<section>
<div class="row">
	<div class="col-sm-8 col-sm-offset-2 col-xs-12">
		<h1>Заполните свои личные данные</h1>
		<h1 style="display:none;">Заполните свои паспортные данные</h1>
		<h1 style="display:none;">Заполните свои личные данные</h1>
	</div>
</div>
</section>

<section>
<div class="row">
	<div class="col-sm-6 col-sm-offset-3 col-xs-12 text-center">
		<div class="secure">
			<div class="secure-body">
				<div class="secure-item"><img src="/templates/rublimo/img/form/lock.png"></div>
				<div class="secure-item"><span>
					Ваши персональные данные<br>
					<span>надёжно защищены</span>
				</span></div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
</section>

<section class="form">
<div class="row">
	<div class="col-md-8 col-md-offset-2 col-xs-12">
		<form class="form-horizontal" id="anketa" action="/add" method="post" onsubmit="return validate();" autocomplete="off">
			<input type="hidden" name="referer" value="<?php if (isset($_SERVER['HTTP_REFERER'])) echo $_SERVER['HTTP_REFERER']; ?>">
			<input type="hidden" name="id" value="">
			<?php
			if (!empty($_REQUEST['ad_id']))
			echo '<input type="hidden" name="ad_id" value="'.$_REQUEST['ad_id'].'">';
			?>
			<!--input type="hidden" id="amount" name="amount" value="<?php echo empty($_POST['amount'])? 15000 : $_POST['amount']; ?>" />
			<input type="hidden" id="period" name="period" value="<?php echo empty($_POST['period'])? 30 : $_POST['period']; ?>" /-->
				
			<div class="tab-content">
				<div role="tabpanel" class="tab-pane active" id="form1">
					<?php require 'form1.php'; ?>
					<div class="shadow pull-right"><a class="btn btn-next" id="next">Далее <i class="fa fa-caret-right"></i></a></div>
					<div class="clearfix"></div>
				</div>
				<div role="tabpanel" class="tab-pane" id="form2">
					<?php require('form2.php'); ?>
					<div class="clearfix">&nbsp;</div>
					<!--div class="shadow pull-left hidden-xs"><a class="btn btn-next" id="prev2"><i class="fa fa-caret-left"></i> Назад</a></div-->
					<div class="shadow pull-right"><a class="btn btn-next" id="next2">Далее <i class="fa fa-caret-right"></i></a></div>
					<div class="clearfix"></div>
				</div>
				<div role="tabpanel" class="tab-pane" id="form3">
					<?php require('form3.php'); ?>
					<!--button class="btn btn-lg btn-warning btn-block" id="form-send" name="send">Отправить заявку</button-->
					<div class="row">
						<div class="col-sm-5 col-sm-offset-2 col-xs-12"><div class="shadow"><a class="btn btn-ok btn-block" id="form-send">Отправить заявку</a></div></div>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>
</section>

<section class="triggers hidden-xs hidden-sm">
<div class="row">
	<div class="col-sm-2 col-sm-offset-2">
		<img src="/templates/rublimo/img/form/t1.png">
		<p>Удобное получение денег</p>
	</div>
	<div class="col-sm-2">
		<img src="/templates/rublimo/img/form/t2.png">
		<p>Принимаем заявки с любой кредитной историей</p>
	</div>
	<div class="col-sm-2">
		<img src="/templates/rublimo/img/form/t3.png">
		<p>Получение займа онлайн</p>
	</div>
	<div class="col-sm-2">
		<img src="/templates/rublimo/img/form/t4.png">
		<p>Деньги Вас ждут прямо сейчас</p>
	</div>
</div>
</section>

</div>

<div class="clearfix">&nbsp;</div>

<script src="/templates/common/js/validate2.js"></script>

<script>
$(document).ready(function(){
	function setcookies() {
		$('.ec').each(function(){
			var variant = $(this).attr('name');
			var value = $(this).val();
			if ($(this).context.tagName == 'INPUT'){
				if ($(this).context.type == 'radio') {if ($(this).prop('checked')) setcookie(variant, value);}
				else setcookie(variant, value);
			}
			else setcookie(variant, value);
		});
		setcookie('lk', '1');
	}
	
	$('#next').click(function(){
		if (validate1()) {
			send_form();
			$('#step2').removeClass('off');
			$('.form-steps-green-line').addClass('step2');
			$('.form-steps-line').show();
			$('#form-steps a[href="#form2"]').tab('show');
			$('html, body').animate({scrollTop:$('#form-steps').offset().top}, 1000);
			markTarget('form-step-1');
		}
		showBzzz = false;
		$('.reg_same').change();
		setcookies();
		$('select[name="reg_type"]').change();
	});
	
	$('#next2').click(function(){
		if (validate2()) {
			send_form();
			$('#step3').removeClass('off');
			$('.form-steps-green-line').addClass('step3');
			$('.form-steps-line').show();
			$('#form-steps a[href="#form3"]').tab('show');
			$('html, body').animate({scrollTop:$('#form-steps').offset().top}, 1000);
			markTarget('form-step-2');
		}
		showBzzz = false;
		setcookies();
	});
	
	$('#form-send').click(function(){
		if (validate()) {
			$('#form-modal').show();
			send_form(true, '/lk');
			markTarget('form-step-3');
		}
		showBzzz = false;
		setcookies();
	});
	
	$('select[name="reg_type"]').change(function(){
		if ($(this).val() == '0') {
			$('.reg_same[value="1"]').prop('checked', true);
			$('#reg_same').hide();
			$('#reg_address').hide();
			$('#reg_address').prop('disabled', true);
		}
		else $('#reg_same').show();
	}).change();
	
	$('.reg_same').change(function(){
		if ($('.reg_same:checked').val() == '1' || $('select[name="reg_type"]').val() == '0') {
			$('#reg_address').prop('disabled', true);
			$('#reg_address').hide();
		}
		else {
			$('#reg_address').prop('disabled', false);
			$('#reg_address').show();
		}
	}).change();
});
</script>

<?php require 'footer.php'; ?>