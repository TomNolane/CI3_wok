
<footer>
	<div class="container">
		<div class="row">
			<div class="col-sm-3">
				<div class="row">
					<div class="col-xs-6 col-sm-12"><img src="/templates/rublimo/img/logo-footer.png" class="logo"></div>
					<div class="col-xs-5 col-xs-offset-1 visible-xs">
						<div class="social">
							<div class="row">
							<div class="col-xs-4 text-right"><a href="#"><img src="/templates/rublimo/img/social/vk.png"></a></div>
							<div class="col-xs-4 text-right"><a href="#"><img src="/templates/rublimo/img/social/fb.png"></a></div>
							<div class="col-xs-4 text-right"><a href="#"><img src="/templates/rublimo/img/social/tw.png"></a></div>
							</div>
						</div>
					</div>
				</div>
				<div class="disclimer">
					<p>«RUBLIMO» — самый быстрый и удобный сервис для тех, кому нужен срочный займ.
					Для получения займа достаточно заполнить заявку и получить деньги в течение 15 минут.</p>
					<!--p>«RUBLIMO» — не является финансовым учреждением, банком или кредитором, и не несёт ответственности за любые заключенные договоры или условия.</p-->
				</div>
			</div>
			<div class="col-sm-2 col-sm-offset-1 hidden-xs">
				<div class="menu"><a href="#">Сервис</a></div>
				<div class="submenu text-left hidden-xs">
					<a class="internal-link" href="/about">О нас</a><br>
					<a class="" href="/contacts">Контакты</a><br>
					<a class="" href="/faq">Вопросы-ответы</a><br>
					<a class="" href="/info">Статьи о займах</a>
				</div>
				<div class="social hidden-xs">
					<div class="row">
					<div class="col-xs-4"><a href="#"><img src="/templates/rublimo/img/social/vk.png"></a></div>
					<div class="col-xs-4"><a href="#"><img src="/templates/rublimo/img/social/fb.png"></a></div>
					<div class="col-xs-4"><a href="#"><img src="/templates/rublimo/img/social/tw.png"></a></div>
					</div>
				</div>
			</div>
			<div class="col-sm-3 hidden-xs">
				<div class="menu"><a href="#">Получение займа</a></div>
				<div class="submenu text-left hidden-xs">
					<a class="" href="/zaim-card/">Займ на банковскую карту</a><br>
					<a class="" href="/zaim-qiwi/">Займ на QIWI кошелёк</a><br>
					<a class="" href="/zaim-yandex/">Займ на Яндекс.Деньги</a><br>
					<a class="" href="/zaim-contact/">Займ через Contact</a><br>
					<a class="" href="/zaim-bank/">Займ на банковский счёт</a>
				</div>
			</div>
			<div class="col-sm-3 hidden-xs">
				<div class="menu"><a href="#">Правовые документы</a></div>
				<div class="submenu text-left hidden-xs">
					<a class="" href="/oferta/">Публичная оферта</a><br>
					<a class="" href="/agree/">Пользовательское соглашение</a><br>
					<a class="" href="/soglasie/">Согласие на обработку данных</a><br>
					<a class="" href="/rules/">Правила предоставления займов</a>
				</div>
			</div>
		</div>
		
		<div class="clearfix">&nbsp;</div>
		
		<div class="row"><div class="col-xs-12 text-center"><div class="copy">Все права защищены © <?php echo date('Y'); ?></div></div></div>
	</div>
</footer>

<script src="/modules/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="/modules/jquery-maskedinput/jquery.maskedinput.min.js"></script>
<script src="/modules/jquery.ion.rangeslider/js/ion.rangeSlider.min.js"></script>

<script>
function setcookie(name, value, expires, path, domain, secure)
{
    document.cookie =    name + "=" + escape(value) +
                        ((expires) ? "; expires=" + (new Date(expires)) : "") +
                        ((path) ? "; path=" + path : "; path=/") +
                        ((domain) ? "; domain=" + domain : "") +
                        ((secure) ? "; secure" : "");
}

function getcookie(name)
{
    var cookie = " " + document.cookie;
    var search = " " + name + "=";
    var setStr = null;
    var offset = 0;
    var end = 0;
    
    if (cookie.length > 0)
    {
        offset = cookie.indexOf(search);
        
        if (offset != -1)
        {
            offset += search.length;
            end = cookie.indexOf(";", offset)
            
            if (end == -1)
            {
                end = cookie.length;
            }
            
            setStr = unescape(cookie.substring(offset, end));
        }
    }
    
    return(setStr);
}

var amount = 15000;

$(document).ready(function(){
	$('[data-toggle="popover"]').popover();
	$('input[type="tel"]').mask("8 999 999 9999");
	//$('input#passport').mask("9999 999999");
	//$('input#passport-s').mask("9999");
	//$('input#passport-n').mask("999999");
	$('input#passport_code').mask("999-999");
	//$('.fancybox').fancybox();
	
	$('.ec').each(function(){
		var variant = ($(this).context.tagName == 'SPAN')? $(this).context.classList[0] : $(this).attr('name');
		var value = getcookie(variant);
		if (value !== null) {
			if ($(this).context.tagName == 'INPUT'){
				if ($(this).context.type == 'radio' || $(this).context.type == 'checkbox'){
					$(this).prop('checked', ($(this).val() == value));
				}
				else $(this).val(value);
			}
			else if ($(this).context.tagName == 'SELECT') $(this).find('option[value="' + value + '"]').attr('selected', true);
			else if ($(this).context.tagName == 'SPAN'){
				if (variant == 'reg_region' && value == '0') $(this).text('Совадает с адресом проживания');
				else $(this).text(value);
			}
		}
		//setcookie('lk', '1');
	});
	
	/*
	ec.get('lk', function(value){
		var variants = ['f', 'i', 'o'];
		if (typeof value != 'undefined' && !!value) {
			variants.forEach(function(variant, id){
				ec.get(variant, function(value){
					if (typeof value != 'undefined') $('.' + variant).text(value);
				});
			});
		}
	});*/
	
	$('.amount').ionRangeSlider({
		min: 1000,
		max: 100000,
		step: 1000,
		from: <?php echo empty($_POST['amount'])? 15000 : $_POST['amount']; ?>,
		postfix: '',
		onChange:function(range){
			var percent = 0;
			var attr = '';
			var color = '';
			
			if (range.from <= 7000) {
				percent = 97;
				//attr = 'Автоматическое <br>одобрение';
				color = 'green';
			}
			else if (range.from <= 15000) {
				percent = 94;
				//attr = 'Может понадобиться <br>паспорт';
				color = 'green';
			}
			else if (range.from <= 30000) {
				percent = 84;
				//attr = 'Нужен только <br>паспорт';
				color = 'orange';
			}
			else if (range.from <= 50000) {
				percent = 72;
				//attr = 'Может понадобиться подтверждение места работы';
				color = 'orange';
			}
			else {
				percent = 64;
				//attr = 'Может понадобиться справка о доходах (или под залог)';
				color = 'red';
			}
			$('.current_amount').text(String(range.from).split(/(?=(?:\d{3})+$)/).join(' '));
			$('#percent_rate').text(percent + '%');
			//$('#credit_hint').html(attr);
			//$('#ranges-label').hide();
			$('.form-slider, .form-button, .js-irs-0, .current_amount_color').removeClass('green').removeClass('orange').removeClass('red').addClass(color).show();
			$('.results tr').each(function(indx, element){
				if ($(element).data('amount') < range.from) $(element).hide();
				else $(element).show();
			});
			amount = range.form;
		}
	});
	$('#period').ionRangeSlider({
		min: 5,
		max: 30,
		from: <?php echo empty($_POST['period'])? 10 : $_POST['period']; ?>,
		postfix: ' сут.',
		onChange:function(range){
			$('#current_period').text(range.from);
		}
	});
});
</script>

<!-- Yandex.Metrika counter --> <script type="text/javascript"> (function (d, w, c) { (w[c] = w[c] || []).push(function() { try { w.yaCounter39264105 = new Ya.Metrika({ id:39264105, clickmap:true, trackLinks:true, accurateTrackBounce:true, webvisor:true }); } catch(e) { } }); var n = d.getElementsByTagName("script")[0], s = d.createElement("script"), f = function () { n.parentNode.insertBefore(s, n); }; s.type = "text/javascript"; s.async = true; s.src = "https://mc.yandex.ru/metrika/watch.js"; if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); } })(document, window, "yandex_metrika_callbacks"); </script> <noscript><div><img src="https://mc.yandex.ru/watch/39264105" style="position:absolute; left:-9999px;" alt="" /></div></noscript> <!-- /Yandex.Metrika counter -->

<script>
function markTarget(target,param){
    if (typeof yaCounter39264105 == 'undefined') return;
	if (typeof param == 'undefined') yaCounter39264105.reachGoal(target);
	else yaCounter39264105.reachGoal(target,param);
}
</script>

</body>
</html>