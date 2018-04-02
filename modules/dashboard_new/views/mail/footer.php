
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
            $(document).ready(function(){
                $('.mail-settings').click(function(){
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
                        url: '/mailsender/mail_settings/',
                        data: 'id='+id+'&query=status&data='+status,
                        success: function(data){
                            $('#'+id).html(n);
                            $('#'+id).removeClass('disabled');
                            //console.log(data);
                        }    
                    });
                });
            });
	</script> 
        <script>
            $( document ).ready(function() {
                $('.btn-number').click(function(e){
                    e.preventDefault();

                    var fieldName = $(this).attr('data-field');
                    var type      = $(this).attr('data-type');
                    var id        = $(this).attr('data-id');
                    var input     = $("input[name='"+fieldName+"']");
                    var currentVal = parseInt(input.val());
                    if (!isNaN(currentVal)) {
                        if(type == 'minus') {
                            var minValue = parseInt(input.attr('min'));
                            if(!minValue) minValue = 1;
                            if(currentVal > minValue) {
                                input.val(currentVal - 1).change();

                                $.ajax({
                                    type: 'POST',
                                    url: '/mailsender/mail_settings/',
                                    data: 'id='+id+'&query=delay&data='+(currentVal-1),
                                    success: function(data){
                                        //console.log(data);
                                    }    
                                });
                            } 
                            if(parseInt(input.val()) == minValue) {
                                $(this).attr('disabled', true);
                            }

                        } else if(type == 'plus') {
                            var maxValue = parseInt(input.attr('max'));
                            if(!maxValue) maxValue = 100;
                            if(currentVal < maxValue) {
                                input.val(currentVal + 1).change();
                                
                                $.ajax({
                                    type: 'POST',
                                    url: '/mailsender/mail_settings/',
                                    data: 'id='+id+'&query=delay&data='+(currentVal+1),
                                    success: function(data){
                                        //console.log(data);
                                    }    
                                });                               
                            }
                            if(parseInt(input.val()) == maxValue) {
                                $(this).attr('disabled', true);
                            }

                        }
                    } else {
                        input.val(0);
                    }
                });
                $('.input-number').focusin(function(){
                   $(this).data('oldValue', $(this).val());
                });
                $('.input-number').change(function() {

                    var minValue =  parseInt($(this).attr('min'));
                    var maxValue =  parseInt($(this).attr('max'));
                    if(!minValue) minValue = 1;
                    if(!maxValue) maxValue = 100;
                    var valueCurrent = parseInt($(this).val());

                    var name = $(this).attr('name');
                    if(valueCurrent >= minValue) {
                        $(".btn-number[data-type='minus'][data-field='"+name+"']").removeAttr('disabled')
                    } else {
                        alert('Sorry, the minimum value was reached');
                        $(this).val($(this).data('oldValue'));
                    }
                    if(valueCurrent <= maxValue) {
                        $(".btn-number[data-type='plus'][data-field='"+name+"']").removeAttr('disabled')
                    } else {
                        alert('Sorry, the maximum value was reached');
                        $(this).val($(this).data('oldValue'));
                    }


                });
                $(".input-number").keydown(function (e) {
                        // Allow: backspace, delete, tab, escape, enter and .
                        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
                             // Allow: Ctrl+A
                            (e.keyCode == 65 && e.ctrlKey === true) || 
                             // Allow: home, end, left, right
                            (e.keyCode >= 35 && e.keyCode <= 39)) {
                                 // let it happen, don't do anything
                                 return;
                        }
                        // Ensure that it is a number and stop the keypress
                        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                            e.preventDefault();
                        }
                });
                
                $('.m').click(function(e){
                    $('#domensettings').modal('show');
                    $('#feedbackModalLabelname').html( $('#'+this.id).data('name') ); 
                    $('#save_domen_settings').data('id', $('#'+this.id).data('id')); 
                    
                    $('input:checked').prop('checked', false);
                    
                    
                    var domen = $('#'+this.id).data('domen').split(";");
                    domen.forEach(function(item, i, arr) {
                        $("input[name='"+item+"']").prop("checked", true);                       
                    });                                     
                }); 
                
                $('#save_domen_settings').click(function(e){
                    $('#save_domen_settings').html('Сохраняю <span class="glyphicon glyphicon-refresh" aria-hidden="true"></span>');
                    $('#save_domen_settings').addClass('disabled');
                    
                    var str='';
                    $("input:checkbox:checked").each(function(){
                        str += $(this).val()+';';
                    });
                    str=str.slice(0,-1);
                    $.ajax({
                        type: 'POST',
                        url: '/mailsender/mail_settings/',
                        data: 'id='+$('#save_domen_settings').data('id')+'&query=domen&data='+str,
                        success: function(data){
                            $('#save_domen_settings').html('Сохранить');
                            $('#save_domen_settings').removeClass('disabled');
                            $('#domen'+$('#save_domen_settings').data('id')).html(str); 
                            //console.log(data);
                        }
                    });                   
                });
                
            });           
        </script>
</body>

</html>


