        <script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
        <script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
        <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
        <script src="/modules/lumino/js/bootstrap-table.js"></script>
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
                singleDatePicker: true,
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
            //$("#startdate").val(picker.startDate.format('YYYY-MM-DD'));
            //$("#enddate").val(picker.endDate.format('YYYY-MM-DD'));
            location.href = 'https://bzaim5.ru/analytics/index/<?=$utm?>/'+picker.startDate.format('YYYY-MM-DD');
        });        
        </script>        
</body>

</html>