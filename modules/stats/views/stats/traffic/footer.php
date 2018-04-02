    <!-- jQuery -->
    <script src="/modules/jquery/jquery-1.11.3.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="/modules/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    
    <!-- daterangepicker -->
    <script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
   
    <!-- Metis Menu Plugin JavaScript -->
    <script src="/modules/metisMenu/metisMenu.min.js"></script>
   
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
            location.href = '/stats/traffic/<?php if(empty($site)){echo 'all';}else{echo $site;}?>/'+picker.startDate.format('YYYY-MM-DD')+'/'+picker.endDate.format('YYYY-MM-DD');
        });
    });
    </script>    
    <!-- Custom Theme JavaScript -->
    <script src="/modules/sb/sb-admin-2.js"></script>

<style>
#chartdiv, #chartdivutm {
	width	: 100%;
	height	: 500px;
}					
</style>    
<!-- Resources -->
<script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
<script src="https://www.amcharts.com/lib/3/serial.js"></script>
<script src="https://www.amcharts.com/lib/3/themes/light.js"></script>
<script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
<link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />

<!-- Chart code -->
<script>
var chart = AmCharts.makeChart("chartdiv", {
    "type": "serial",
    "theme": "light",
    "language": "ru",
    "legend": {
        "useGraphSettings": true
    },
    "dataDateFormat":"YYYY-MM-DD",
    "dataProvider": [
        <?php foreach($data as $item) { ?>
            <?php echo ' {"date": "'.$item['date'].'", "all" : '.$item['countdate'].', "3": '.$item['s3'].',"2": '.$item['s2'].',"1": '.$item['s1'].',"0": '.$item['s0'].'},'; ?>
        <?php } ?>        
    ],
    "valueAxes": [{
        "integersOnly": false,
        "maximum": 4000,
        "minimum": 0,
        "reversed": false,
        "axisAlpha": 0,
        "dashLength": 5,
        "gridCount": 10,
        "position": "left",
        "title": ""
    }],
    "graphs": [{
        "balloonText": "[[category]]: [[value]]",
        "bullet": "round",
        "hidden": false,
        "title": "Всего",
        "valueField": "all",
        "type": "smoothedLine",
	"fillAlphas": 0
    }, {
        "balloonText": "[[category]]: [[value]]",
        "bullet": "round",
        "title": "3 шаг",
        "valueField": "3",
        "type": "smoothedLine",
	"fillAlphas": 0
    }, {
        "balloonText": "[[category]]: [[value]]",
        "bullet": "round",
        "title": "2 шаг",
        "valueField": "2",
        "type": "smoothedLine",
	"fillAlphas": 0
    }, {
        "balloonText": "[[category]]: [[value]]",
        "bullet": "round",
        "title": "1 шаг",
        "valueField": "1",
        "type": "smoothedLine",
	"fillAlphas": 0
    }, {
        "balloonText": "[[category]]: [[value]]",
        "bullet": "round",
        "hidden": true,
        "title": "Ошибки",
        "valueField": "0",
        "type": "smoothedLine",
	"fillAlphas": 0
    }],
    "chartCursor": {
        "cursorAlpha": 0,
        "zoomable": false
    },
    "categoryField": "date",
    "categoryAxis": {
        "parseDates": true,
        "gridPosition": "start",
        "axisAlpha": 0,
        "fillAlpha": 0.05,
        "fillColor": "#000000",
        "gridAlpha": 0,
        "position": "top"
    }
});
</script>
<script>
var chart = AmCharts.makeChart("chartdivutm", {
    "type": "serial",
    "theme": "light",
    "language": "ru",
    "legend": {
        "useGraphSettings": true
    },
    "dataDateFormat":"YYYY-MM-DD",
    "dataProvider": [
        <?php foreach($data as $item) { ?>
            <?php echo ' {"date": "'.$item['date'].'", "mytarget" : '.$item['mytarget'].', "direct": '.$item['direct'].',"YD": '.$item['YD'].',"email": '.$item['email'].'},'; ?>
        <?php } ?>        
    ],
    "valueAxes": [{
        "integersOnly": false,
        "maximum": 100,
        "minimum": 0,
        "reversed": false,
        "axisAlpha": 0,
        "dashLength": 5,
        "gridCount": 10,
        "position": "left",
        "title": ""
    }],
    "graphs": [{
        "balloonText": "[[category]]: [[value]]",
        "bullet": "round",
        "hidden": false,
        "title": "mytarget",
        "valueField": "mytarget",
        "type": "smoothedLine",
	"fillAlphas": 0
    }, {
        "balloonText": "[[category]]: [[value]]",
        "bullet": "round",
        "title": "direct",
        "valueField": "direct",
        "type": "smoothedLine",
	"fillAlphas": 0
    }, {
        "balloonText": "[[category]]: [[value]]",
        "bullet": "round",
        "title": "YD",
        "valueField": "YD",
        "type": "smoothedLine",
	"fillAlphas": 0
    }, {
        "balloonText": "[[category]]: [[value]]",
        "bullet": "round",
        "title": "email",
        "valueField": "email",
        "type": "smoothedLine",
	"fillAlphas": 0
    }],
    "chartCursor": {
        "cursorAlpha": 0,
        "zoomable": false
    },
    "categoryField": "date",
    "categoryAxis": {
        "parseDates": true,
        "gridPosition": "start",
        "axisAlpha": 0,
        "fillAlpha": 0.05,
        "fillColor": "#000000",
        "gridAlpha": 0,
        "position": "top"
    }
});
</script>
</body> 
</html>
