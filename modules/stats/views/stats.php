<?php
function table($good, $bad, $broker)
{
	echo '<table class="table table-striped"><tr><th>Дата</th><th>% прохождения</th><th>Прошло</th><th>Отклонено</th><th>Всего</th></tr>';
	
	foreach($good as $date => $item)
	{
		$good_val = $item[$broker];
		$sum = $good_val + $bad[$date][$broker];
		echo '<tr><td>'.$date.'</td><td><b>'.round(100 * $good_val / $sum).'%</b></td><td>'.$good_val.'</td><td>'.$bad[$date][$broker].'</td><td>'.$sum.'</td></tr>';
	}
	
	echo '</table>';
}
?>

<script src="/modules/jquery-flot/jquery.flot.min.js"></script>
<script src="/modules/jquery-flot/jquery.flot.categories.js"></script>
<script>
$(function() {
$.plot("#flot", <?php echo json_encode($dataset); ?>, {
			series: {
		lines: { show: true },
		points: { show: true }    
	},
			xaxis: {
				mode: "categories",
				tickLength: 0
			}
});
});
</script>

<style>
#flot{width:95%;height:400px;margin:auto;}
</style>

<form method="get">
	<button class="btn-period btn btn-<?php echo (isset($_REQUEST['period']) && $_REQUEST['period'] == 'week')? 'info'  : 'default'; ?>" type="submit" name="period" value="week">Неделя</button>
	<button class="btn-period btn btn-<?php echo (isset($_REQUEST['period']) && $_REQUEST['period'] == 'month')? 'info' : 'default'; ?>" type="submit" name="period" value="month">Месяц</button>
	<button class="btn-period btn btn-<?php echo (isset($_REQUEST['period']) && $_REQUEST['period'] == 'year')? 'info'  : 'default'; ?>" type="submit" name="period" value="year">Год</button>
	<button class="btn-period btn btn-<?php echo (empty($_REQUEST['period']) || (isset($_REQUEST['period']) && $_REQUEST['period'] == 'full'))? 'info'  : 'default'; ?>" type="submit" name="period" value="full">Всё время</button>
</form>

<div class="clearfix">&nbsp;</div>

<div id="flot"></div>

<div class="clearfix">&nbsp;</div>

<ul class="nav nav-tabs" role="tablist">
	<li role="presentation" class="active"><a href="#leadia" aria-controls="leadia" role="tab" data-toggle="tab">Leadia</a></li>
	<li role="presentation"><a href="#leads" aria-controls="leads" role="tab" data-toggle="tab">Leads.su</a></li>
	<li role="presentation"><a href="#upfinance" aria-controls="upfinance" role="tab" data-toggle="tab">Upfinance</a></li>
	<li role="presentation"><a href="#teleport" aria-controls="teleport" role="tab" data-toggle="tab">Teleport</a></li>
</ul>

<div class="clearfix">&nbsp;</div>

<div class="tab-content">
	<div role="tabpanel" class="tab-pane active" id="leadia">
		<?php table($good, $bad, 'leadia'); ?>
	</div>
	<div role="tabpanel" class="tab-pane" id="leads">
		<?php table($good, $bad, 'leads'); ?>
	</div>
	<div role="tabpanel" class="tab-pane" id="upfinance">
		<?php table($good, $bad, 'upfinance'); ?>
	</div>
	<div role="tabpanel" class="tab-pane" id="teleport">
		<?php table($good, $bad, 'vteleport'); ?>
	</div>
</div>
