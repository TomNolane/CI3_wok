        <link href="/modules/jquery.ion.rangeslider/css/ion.rangeSlider.css" rel="stylesheet" media="screen">
        <link href="/modules/jquery.ion.rangeslider/css/ion.rangeSlider.skinHTML5.css" rel="stylesheet" media="screen">
        <script src="/modules/jquery.ion.rangeslider/js/ion.rangeSlider.min.js"></script>
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
            var url = 'http://bzaim5.ru/form/?&amount=6000&utm_source=email';
            var site = 'http://bzaim5.ru';
            var select_url ='form/';
            var sum = 6000;
            var name = '<?=date('Ymd')?>';
            var utm = 'email';
            var popup = '';
            $('.amount').ionRangeSlider({
                values: [1000, 2000, 3000, 4000, 5000,6000,7000,8000,9000,10000,11000,12000,13000,14000,15000,20000,25000,30000,40000,50000,80000,100000],    
                hide_min_max: true,
                onChange:function(range){
                    sum = range.from_value;
                    url = site+'/'+select_url+'?'+popup+'&amount='+sum+'&utm_source='+utm;
                    $('#textareaurl').val(url);
                    $('#copyurl').html('Копировать');
                }                
            });
            $('#select_site').on('change', function() {
                site = $('#select_site').val();
                url = site+'/'+select_url+'?'+popup+'&amount='+sum+'&utm_source='+utm;
                $('#textareaurl').val(url);
                $('#copyurl').html('Копировать');
            });
            $('#select_url').on('change', function() {
                select_url = $('#select_url').val();
                url = site+'/'+select_url+'?'+popup+'&amount='+sum+'&utm_source='+utm;
                $('#textareaurl').val(url);
                $('#copyurl').html('Копировать');
            });            
            $('#utm_source').bind('input propertychange', function() {
                utm = $('#utm_source').val();
                url = site+'/'+select_url+'?'+popup+'&amount='+sum+'&utm_source='+utm;
                $('#textareaurl').val(url);
                $('#copyurl').html('Копировать');
            });

            $('#popup').change(function(){
                if(this.checked) {
                    popup = '&popup=1&email={{Email}}';
                } else {
                    popup = '';
                }
                url = site+'/'+select_url+'?'+popup+'&amount='+sum+'&utm_source='+utm;
                $('#textareaurl').val(url);
                $('#copyurl').html('Копировать');
            });
            $('#textareatext').on('change',function(){
                    $.ajax({
                        type: 'POST',
                        url: '/dashboard_new/popup_settings/',
                        data: 'id=1&query=popup_text&data='+$('#textareatext').val(),
                        success: function(data){
                            console.log(data);
                        }    
                    });
            });

        </script>
        <script>        
            $(document).on("click","#copyurl", function(){
		copy = copyToClipboard(document.getElementById("textareaurl"));
                if(copy){
                    $('#copyurl').html('Сохранено');
                }
            });
            function copyToClipboard(elem) {
                      // create hidden text element, if it doesn't already exist
                var targetId = "_hiddenCopyText_";
                var isInput = elem.tagName === "INPUT" || elem.tagName === "TEXTAREA";
                var origSelectionStart, origSelectionEnd;
                if (isInput) {
                    // can just use the original source element for the selection and copy
                    target = elem;
                    origSelectionStart = elem.selectionStart;
                    origSelectionEnd = elem.selectionEnd;
                } else {
                    // must use a temporary form element for the selection and copy
                    target = document.getElementById(targetId);
                    if (!target) {
                        var target = document.createElement("textarea");
                        target.style.position = "absolute";
                        target.style.left = "-9999px";
                        target.style.top = "0";
                        target.id = targetId;
                        document.body.appendChild(target);
                    }
                    target.textContent = elem.textContent;
                }
                // select the content
                var currentFocus = document.activeElement;
                target.focus();
                target.setSelectionRange(0, target.value.length);

                // copy the selection
                var succeed;
                try {
                      succeed = document.execCommand("copy");
                } catch(e) {
                    succeed = false;
                }
                // restore original focus
                if (currentFocus && typeof currentFocus.focus === "function") {
                    currentFocus.focus();
                }

                if (isInput) {
                    // restore prior selection
                    elem.setSelectionRange(origSelectionStart, origSelectionEnd);
                } else {
                    // clear temporary content
                    target.textContent = "";
                }
                return succeed;
            }        
        </script>        
</body>

</html>


