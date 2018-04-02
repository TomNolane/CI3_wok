<?php
require 'header.php';

$this->load->model('offers/offers_model', 'offers');
$data = $this->offers->all();/*array(
	array(
		'img' => 'kredito24',
		'title' => 'Кредито24',
		'percent' => '1',
		'amount' => '30000',
		'period' => '30',
		'prob' => '97',
		'link' => '2c8ef5dc3275111792c7d583611abd2a'
	),
	array(
		'img' => 'zaymer',
		'title' => 'Займер',
		'percent' => '0,63',
		'amount' => '30000',
		'period' => '30',
		'prob' => '94',
		'link' => 'ab87d75cc0e499b5c899f373ba2af389'
	),
	array(
		'img' => 'moneyman',
		'title' => 'Moneyman',
		'percent' => '1',
		'amount' => '50000',
		'period' => '120',
		'prob' => '95',
		'link' => 'd9c44c93690abe3960f66baf4d3b7884'
	),
	array(
		'img' => 'turbozaim',
		'title' => 'Турбозайм',
		'percent' => '2,2',
		'amount' => '16000',
		'period' => '30',
		'prob' => '90',
		'link' => '830dbcac3c3b977891bdeeb04e2358bc'
	),
	array(
		'img' => 'mili',
		'title' => 'Мили',
		'percent' => '1',
		'amount' => '9000',
		'period' => '30',
		'prob' => '95',
		'link' => '7862ccc0a4cc0c9dfe72e353d4f470a5'
	),
	array(
		'img' => 'migcredit',
		'title' => 'Мигкредит',
		'percent' => '0,76',
		'amount' => '99000',
		'period' => '308',
		'prob' => '89',
		'link' => '33ea3cd29d337b43b5104c38b5e81c06'
	),
	array(
		'img' => 'ekapusta',
		'title' => 'еКапуста',
		'percent' => '2',
		'amount' => '15000',
		'period' => '30',
		'prob' => '85',
		'link' => 'b5f352425af4457d94cadaa24b4d278a'
	),
	array(
		'img' => 'chesslovo',
		'title' => 'Честное слово',
		'percent' => '1',
		'amount' => '15000',
		'period' => '30',
		'prob' => '77',
		'link' => 'a7ddec803850e4237ec692d65e25d4fd'
	),
	array(
		'img' => 'ezaem',
		'title' => 'Ё-заем',
		'percent' => '5',
		'amount' => '30000',
		'period' => '30',
		'prob' => '75',
		'link' => '098ef198ae2a0bc8acf685690d93ea6b'
	)
);*/
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
?>

<link href="/templates/rublimo/css/lk.css" rel="stylesheet" media="screen">

<div class="container">
	<div class="row">
		<div class="col-md-3">
			<div class="small-card">
				<img src="/templates/rublimo/img/lk/avatar.png">
				<strong><span class="f ec"></span><br><span class="i ec"></span><br><span class="o ec"></span></strong>
				
				<div class="clearfix">&nbsp;</div>
				
				<div class="form-group">
					<div class="form-slider green">
						<div class="form-label-1 pull-left">Сумма займа</div>
						<div class="form-label-2 current_amount_color pull-right"><span class="current_amount">15 000</span> <i class="fa fa-rub"></i></div>
						<div class="clearfix"></div>
						<input type="text" class="amount" name="amount" value="30000" />
						<div class="clearfix"></div>
					</div>
				</div>
				
				<div class="form-group">
					<div class="form-label-1">Регион</div>
					<div class="shadow"><select class="form-control ec" id="region">
						<option value="0">-- Все регионы --</option>
						<?php
						if (isset($regions) && is_array($regions))
						{
							foreach($regions as $region)
							echo '<option value="'.$region['region_id'].'"'.((isset($region_name) && $region_name == $region['name'])? ' selected' : '').'>'.$region['name'].'</option>';
						}
						?>
					</select></div>
				</div>
				
				<div class="form-group">
					<div class="col-md-6">
						<label><input type="checkbox" class="offer-type" data-id="card" checked> На карту</label>
					</div>
					<div class="col-md-6">
						<label><input type="checkbox" class="offer-type" data-id="qiwi" checked> На QIWI</label>
					</div>
				</div>
				
				<div class="form-group">
					<div class="col-md-6">
						<label><input type="checkbox" class="offer-type" data-id="yandex" checked> Онлайн</label>
					</div>
					<div class="col-md-6">
						<label><input type="checkbox" class="offer-type" data-id="contact" checked> Переводом</label>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-9">
			<div class="panel panel-default">
				<div class="panel-body">
					<h1>Список подходящих микрозаймов</h1>
					<table class="results table hidden-xs">
						<thead>
							<tr>
								<th>Название</th>
								<th class="hidden-xs">Ставка, %</th>
								<th class="hidden-xs">Макс. сумма</th>
								<th class="hidden-xs">Макс. срок</th>
								<th>Вероятность<br>одобрения</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							<?php
							foreach($data as $item)
							{
								echo '
								<tr data-id="'.$item['id'].'" data-amount="'.$item['amount'].'" data-card="'.$item['card'].'" data-qiwi="'.$item['qiwi'].'" data-yandex="'.$item['yandex'].'" data-contact="'.$item['contact'].'">
								<td>
									<a href="https://pxl.leads.su/click/'.$item['link'].'" onclick="markTarget(\'pixel_result\', \''.$item['title'].'\')" target="_blank">
										<img src="/templates/common/img/offers/'.$item['img'].'.png" alt="'.$item['title'].'">
									</a>
								</td>
								<td class="hidden-xs">'.$item['percent'].'%</td>
								<td class="hidden-xs">'.number_format($item['amount'],0,'',' ').' Р</td>
								<td class="hidden-xs">'.$item['period'].' дней</td>
								<td><span class="label label-success">'.$item['prob'].'%</span></td>
								<td><a href="https://pxl.leads.su/click/'.$item['link'].'" onclick="markTarget(\'pixel_result\', \''.$item['title'].'\')" class="btn" target="_blank">Получить</a></td>
								</tr>
								';
							}
							?>
						</tbody>
					</table>
					
					<div class="results-small visible-xs">
					<?php
					foreach($data as $item)
					{
						echo '<hr>
						<div class="row">
							<div class="col-sm-4 text-center">
								<a href="https://pxl.leads.su/click/'.$item['link'].'" onclick="markTarget(\'pixel_result\', \''.$item['title'].'\')" target="_blank"><img src="/templates/common/img/offers/'.$item['img'].'.png" alt="'.$item['title'].'"></a>
							</div>
							<div class="col-sm-4 text-center"><p>Вероятность одобрения: '.$item['prob'].'%</p></div>
							<div class="col-sm-4 text-center">
								<a href="https://pxl.leads.su/click/'.$item['link'].'" onclick="markTarget(\'pixel_result\', \''.$item['title'].'\')" class="btn" target="_blank">Получить</a>
							</div>
						</div>';
					}
					?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
var by_reg = null;
$(document).ready(function(){
	$('#region').change(function(){
		$.getJSON('/offers/by_region/' + $(this).val())
		.done(function(data){
			if (data.length) {
				by_reg = data;
				update_offers();
				/*$('.results tr').hide();
				data.forEach(function(index, offer){
					$('.results tr[data-id="' + offer.id + '"]').show();
				});*/
			}
			else
			{
				by_reg = null;
				$('.results tr').show();
			}
		})
		.fail(function(){$('.results tr').show();})
		.always(function(){/*Loading(0);*/});
	});
	
	$('.offer-type').change(function(){
		update_offers();
	});
	
	function update_offers() {
		var str = '.results tr';
		$('.results tr').hide();
		// Способы получения денег
		$('.offer-type').each(function(i, e){
			str += '[data-' + $(e).data('id') + '="' + $(e).prop('checked') + '"]';
		});
		// Регион
		if (typeof by_reg == 'null') $(str).show();
		else{
			by_reg.forEach(function(index, offer){console.log(offer);
				$(str + '[data-id="' + offer.id + '"]').show();
			});
		}
		// Сумма
		$('.results tr').each(function(indx, element){
			if ($(element).data('amount') < amount) $(element).hide();
		});
	}
});
</script>

<?php require 'footer.php'; ?>