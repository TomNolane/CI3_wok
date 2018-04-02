
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
            location.href = 'http://edenga.ru/dashboard_new/step/'+picker.startDate.format('YYYY-MM-DD')+'/'+picker.endDate.format('YYYY-MM-DD')+'/<?=$site?>';
        });        
        </script>
	<script>
            $(document).ready(function(){
                $('.popup-settings').click(function(){
                    var id = this.id;
                    var status = $('#'+id).data('id');                                        
                    if(!status){
                        $('#'+id).data('id',1);
                        var n = '<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>';
                    } else {
                        $('#'+id).data('id',0);
                        var n = '<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>';
                    }
                    
                    $('#'+id).html('<span class="glyphicon glyphicon-refresh" aria-hidden="true"></span>');
                    $('#'+id).addClass('disabled');
                    
                    $.ajax({
                        type: 'POST',
                        url: '/dashboard_new/popup_settings/',
                        data: 'id='+id+'&query=popup&data='+status,
                        success: function(data){
                            $('#'+id).html(n);
                            $('#'+id).removeClass('disabled');
                            //console.log(data);
                        }    
                    });
                });
            });
	</script>        
</body>

</html>


