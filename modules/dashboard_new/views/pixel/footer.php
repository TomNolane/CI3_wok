
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
            location.href = 'http://dengimo.ru/dashboard_new/pixel/'+picker.startDate.format('YYYY-MM-DD')+'/'+picker.endDate.format('YYYY-MM-DD')+'/<?=$site?>';
        });        
        </script>
        <script>
            var lineChartData = {
                <?= 'labels : ['?>
                    <?php foreach( array_reverse($data) as $item) { ?>
                        <?='"'.date('d M', strtotime($item['date'])).'",'?>
                    <?php } ?>
                <?= '],'?>          
                datasets : [
                    
                    {
                        label: "Kredito24",
                        fillColor : "rgba(220,220,220,0.2)",
                        strokeColor : "rgba(31,152,225,1)",
                        pointColor : "rgba(31,152,225,1)",
                        pointStrokeColor : "#fff",
                        pointHighlightFill : "#fff",
                        pointHighlightStroke : "rgba(220,220,220,1)",
                        data : [
                            <?php foreach(array_reverse($data) as $item) { ?>
                                <?='"'. ($item['data']['bzaim5.ru']['Kredito24']+$item['data']['dengoman.ru']['Kredito24']+$item['data']['dengimo.ru']['Kredito24']+$item['data']['rublimo.ru']['Kredito24']+$item['data']['edenga.ru']['Kredito24']+$item['data']['vkredito.ru']['Kredito24']) .'",'?>
                            <?php } ?> 
                        ]
                    },
                    
                    {
                        label: "Fastmoney",
                        fillColor : "rgba(220,220,220,0.2)",
                        strokeColor : "rgba(225,197,31,1)",
                        pointColor : "rgba(225,197,31,1)",
                        pointStrokeColor : "#fff",
                        pointHighlightFill : "#fff",
                        pointHighlightStroke : "rgba(220,220,220,1)",
                        data : [
                            <?php foreach(array_reverse($data) as $item) { ?>
                                <?='"'. ($item['data']['bzaim5.ru']['fastmoney']+$item['data']['dengoman.ru']['fastmoney']+$item['data']['dengimo.ru']['fastmoney']+$item['data']['rublimo.ru']['fastmoney']+$item['data']['edenga.ru']['fastmoney']+$item['data']['vkredito.ru']['fastmoney']) .'",'?>
                            <?php } ?> 
                        ]
                    },              
                    {
                        label: "Займер",
                        fillColor : "rgba(220,220,220,0.2)",
                        strokeColor : "rgba(225,150,31,1)",
                        pointColor : "rgba(225,150,31,1)",
                        pointStrokeColor : "#fff",
                        pointHighlightFill : "#fff",
                        pointHighlightStroke : "rgba(220,220,220,1)",
                        data : [
                            <?php foreach(array_reverse($data) as $item) { ?>
                                <?='"'. ($item['data']['bzaim5.ru']['Займер']+$item['data']['dengoman.ru']['Займер']+$item['data']['dengimo.ru']['Займер']+$item['data']['rublimo.ru']['Займер']+$item['data']['edenga.ru']['Займер']+$item['data']['vkredito.ru']['Займер']) .'",'?>
                            <?php } ?> 
                        ]
                    },              
                    {
                        label: "Турбозайм",
                        fillColor : "rgba(220,220,220,0.2)",
                        strokeColor : "rgba(225,15,31,1)",
                        pointColor : "rgba(225,15,31,1)",
                        pointStrokeColor : "#fff",
                        pointHighlightFill : "#fff",
                        pointHighlightStroke : "rgba(220,220,220,1)",
                        data : [
                            <?php foreach(array_reverse($data) as $item) { ?>
                                <?='"'. ($item['data']['bzaim5.ru']['Турбозайм']+$item['data']['dengoman.ru']['Турбозайм']+$item['data']['dengimo.ru']['Турбозайм']+$item['data']['rublimo.ru']['Турбозайм']+$item['data']['edenga.ru']['Турбозайм']+$item['data']['vkredito.ru']['Турбозайм']) .'",'?>
                            <?php } ?> 
                        ]
                    },              
                    {
                        label: "Moneyman",
                        fillColor : "rgba(220,220,220,0.2)",
                        strokeColor : "rgba(225,15,31,1)",
                        pointColor : "rgba(225,15,31,1)",
                        pointStrokeColor : "#fff",
                        pointHighlightFill : "#fff",
                        pointHighlightStroke : "rgba(220,220,220,1)",
                        data : [
                            <?php foreach(array_reverse($data) as $item) { ?>
                                <?='"' .($item['data']['bzaim5.ru']['Moneyman']+$item['data']['dengoman.ru']['Moneyman']+$item['data']['dengimo.ru']['Moneyman']+$item['data']['rublimo.ru']['Moneyman']+$item['data']['edenga.ru']['Moneyman']+$item['data']['vkredito.ru']['Moneyman']).'",'?>
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


