<!--ul class="nav nav-tabs">
	<li<?php if (!strpos(' '.uri_string(), 'dashboard/index/all')) echo ' class="active"'; ?>><a href="/dashboard/">Большие формы</a></li>
	<li<?php if (strpos(' '.uri_string(), 'dashboard/index/all')) echo ' class="active"'; ?>><a href="/dashboard/index/all">Все</a></li>
</ul>

<div class="clearfix">&nbsp;</div-->


<!--<script type="text/javascript" src="//cdn.jsdelivr.net/jquery/1/jquery.min.js"></script>-->
<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/3/css/bootstrap.css" />
<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />

<div class="row">
	<div class="col-xs-10">
            <form id="filter_form" method="post" class="form-inline">
                <input type="text" class="btn btn-sm" name="daterange" id="daterange" autocomplete="off" value="<?=($y)? $y : date('Y');?>-<?=($m)? $m : date('m');?>-<?=($d)? $d : date('d');?> - <?=($y2)? $y2 : date('Y');?>-<?=($m2)? $m2 : date('m');?>-<?=($d2)? $d2 : date('d');?>" />
                <input type="hidden" name="yyyy" id="yyyy" value="">
                <input type="hidden" name="mm" id="mm" value="">
                <input type="hidden" name="dd" id="dd" value="">
                <input type="hidden" name="yyyy2" id="yyyy2" value="">
                <input type="hidden" name="mm2" id="mm2" value="">
                <input type="hidden" name="dd2" id="dd2" value="">                
            </form>
	</div>
	<div class="col-xs-2 text-right">
		<form method="post" class="form-inline"><input type="submit" class="btn btn-sm" name="drop_date_filter" value="Сбросить фильтр"></form>
	</div>
</div>

<div class="clearfix">&nbsp;</div>

<script type="text/javascript">
$(function() {
    $('#daterange').daterangepicker({
        "autoApply": true,
        "locale": {
                "format": "YYYY-MM-DD",
                "separator": " - ",
                "daysOfWeek": [
                    "Вс",
                    "Пн",
                    "Вт",
                    "Ср",
                    "Чт",
                    "Пт",
                    "Сб"
                ],
                "monthNames": [
                    "Январь",
                    "Февраль",
                    "Март",
                    "Апрель",
                    "Май",
                    "Июнь",
                    "Июль",
                    "Август",
                    "Сентябрь",
                    "Октябрь",
                    "Ноябрь",
                    "Декабрь"
                ],
                "firstDay": 1
            }
    });
    $('#daterange').on('apply.daterangepicker', function(ev, picker) {
        //$("#startdate").val(picker.startDate.format('YYYY-MM-DD'));
        //$("#enddate").val(picker.endDate.format('YYYY-MM-DD'));
        
        $("#yyyy").val(picker.startDate.format('YYYY'));
        $("#mm").val(picker.startDate.format('MM'));
        $("#dd").val(picker.startDate.format('DD'));

        $("#yyyy2").val(picker.endDate.format('YYYY'));
        $("#mm2").val(picker.endDate.format('MM'));
        $("#dd2").val(picker.endDate.format('DD'));
        
        $('#filter_form').submit();
    });
});
</script>