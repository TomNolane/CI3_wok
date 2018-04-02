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
        <script>
            
            $( document ).ready(function() {
                update();
            });            
            
            $("button#download_more").on("click", function() {
                update();
            });
            function update(){
                $("button#download_more").html('Загрузить <span class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></span>');
                $("button#download_more").prop('disabled', true);
                
                var timerId = setInterval(function() {
                  download();
                }, 4000);
                setTimeout(function() {
                  clearInterval(timerId);
                  $("button#download_more").html('Загрузить');                  
                  $("button#download_more").prop('disabled', false);
                }, 40000);                
            }
            
            function download(){
                var lastdate = $('#tableapi tr td.date').last().text();
                $.ajax({
                    type: 'POST',
                    url: '/analytics/formupdate/'+lastdate,
                        success: function(data){
                            var d = JSON.parse(data);
                            $('#tableapi tr:last').after('<tr>\n\
                                <td class="bs-checkbox"><input type="checkbox" /></td>\n\
                                <td class="date">'+d.date+'</td>\n\
                                <td>'+d.d[0]+'</td>\n\
                                <td>'+d.d[1]+'</td>\n\
                                <td>'+d.d[2]+'</td>\n\
                                <td>'+d.d[3]+'</td>\n\
                                <td>'+d.d[4]+'</td>\n\
                                </tr>');
                            
                        }
                });            
            }
        </script>
</body>
</html>
