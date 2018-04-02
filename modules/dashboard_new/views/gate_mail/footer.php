
        <script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
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
            $(document).on('change', 'input:radio', function () {
               var id = $('#'+this.id).data('id');
               var mail = $('#'+this.id).val();              
               //console.log( $('#'+this.id).data('id') +' '+$('#'+this.id).val() );
                    $.ajax({
                        type: 'POST',
                        url: '/dashboard_new/gate_settings/',
                        data: 'id='+id+'&query=mail&data='+mail,
                        success: function(data){
                            //console.log(data);
                        }    
                    });                
            });
	</script>        
</body>

</html>


