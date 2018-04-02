        <script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
        <script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
        <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
        <script src="/modules/lumino/js/bootstrap-table.js"></script>      
	<script src="/modules/lumino/js/chart.min.js"></script>
        
	<script>
		!function ($) {
			$(document).on("click","ul.nav li.parent > a > span.icon", function(){		  
				$(this).find('em:first').toggleClass("glyphicon-minus");	  
			}); 
			$(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		})
	</script>
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
        });
        $('#daterange').on('apply.daterangepicker', function(ev, picker) {
            location.href = 'http://edenga.ru/dashboard_new/market21/'+picker.startDate.format('YYYY-MM-DD')+'/'+picker.endDate.format('YYYY-MM-DD')+'/<?=$site?>/<?=$referrer?>';
        });        
        </script>
        <script>
        var randomScalingFactor = function(){ return Math.round(Math.random()*1000)};	
	var lineChartData = {
            <?= 'labels : ['?>
                <?php foreach( array_reverse($data) as $item) { ?>
                    <?='"'.date('d M', strtotime($item['date'])).'",'?>
                <?php } ?>
            <?= '],'?>          
            datasets : [
                {
                    label: "Leadia (Принято)",
                    fillColor : "rgba(220,220,220,0.2)",
                    strokeColor : "rgba(31,152,225,1)",
                    pointColor : "rgba(31,152,225,1)",
                    pointStrokeColor : "#fff",
                    pointHighlightFill : "#fff",
                    pointHighlightStroke : "rgba(220,220,220,1)",
                    data : [
                        <?php foreach(array_reverse($data) as $item) { ?>
                            <?='"'.$item['l']['leadia']['ok'].'",'?>
                        <?php } ?> 
                    ]
		},               
                {
                    label: "Teleport (Принято)",
                    fillColor : "rgba(220,220,220,0.2)",
                    strokeColor : "rgba(31,225,93,1)",
                    pointColor : "rgba(31,225,93,1)",
                    pointStrokeColor : "#fff",
                    pointHighlightFill : "#fff",
                    pointHighlightStroke : "rgba(220,220,220,1)",
                    data : [
                        <?php foreach(array_reverse($data) as $item) { ?>
                            <?='"'.$item['l']['teleport']['success'].'",'?>
                        <?php } ?> 
                    ]
		},              
                {
                    label: "Unicom (Принято)",
                    fillColor : "rgba(220,220,220,0.2)",
                    strokeColor : "rgba(225,197,31,1)",
                    pointColor : "rgba(225,197,31,1)",
                    pointStrokeColor : "#fff",
                    pointHighlightFill : "#fff",
                    pointHighlightStroke : "rgba(220,220,220,1)",
                    data : [
                        <?php foreach(array_reverse($data) as $item) { ?>
                            <?='"'.($item['l']['unicom']['NEW']+$item['l']['unicom']['SENT']).'",'?>
                        <?php } ?> 
                    ]
		},
                {
                    label: "Cityads (Принято)",
                    fillColor : "rgba(220,220,220,0.2)",
                    strokeColor : "rgba(225,197,12,1)",
                    pointColor : "rgba(225,197,12,1)",
                    pointStrokeColor : "#fff",
                    pointHighlightFill : "#fff",
                    pointHighlightStroke : "rgba(220,220,220,1)",
                    data : [
                        <?php foreach(array_reverse($data) as $item) { ?>
                            <?='"'.$item['l']['firanoall']['1'].'",'?>
                        <?php } ?> 
                    ]
		}                 
            ]
	}
        window.onload = function(){
            var chart1 = document.getElementById("line-chart").getContext("2d");
            window.myLine = new Chart(chart1).Line(lineChartData, {
                responsive: true
            });
        };    
        </script>
</body>

</html>


