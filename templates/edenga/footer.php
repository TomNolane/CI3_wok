<?php $from = '15'; ?>
<div class="clearfix buffer"></div>
<?php
if($this->uri->segment(1) == '' || $this->uri->segment(1) == ' ' || $this->uri->segment(1) == 'index' || $this->uri->segment(1) == 'allarticles')
{
    echo '<a href="#0" class="cd-top">Наверх</a>';
}
if($this->uri->segment(1) != 'form')
{
    echo '<!-- Декстоп --><div id="ya-rtb"><div id="yandex_rtb_R-A-243982-2"></div>';
    if($this->uri->segment(1) == 'lk' || $this->uri->segment(1) == 'lk2') { 
        echo '<!-- Мобайл --><div id="yandex_rtb_R-A-243982-1"></div>';
    }
    echo '</div>';
	echo '<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <!-- Еденьга -->
    <ins class="adsbygoogle text-center"
    style="display:block"
    data-ad-client="ca-pub-4970738258373085"
    data-ad-slot="7951350323"
    data-ad-format="auto"></ins>
    <script>
    (adsbygoogle = window.adsbygoogle || []).push({});
    </script>';
}
?>
<footer class="">
    <div class="container">
        <div class="row">
            <div class="col-md-2 col-xs-12">
                <a href="/"><img src="/templates/edenga/img/logo.png" class="logo"></a>
            </div>
            <div class="col-md-3 col-xs-12 spec_footer4">
                Cервис по подбору выгодных онлайн займов находящийся по адресу Россия, Новосибирская область г. Новосибирск, ул. Маршала Покрышкина, 12, оф 201
                Россия, Ленинградская обл. г. Санкт-Петербург, ул. Осипенко, 12, оф 201 <a href="mailto:support@edenga.ru" target="_blank">support@edenga.ru</a> <span class="hidden-xs hidden-sm">| +7(495) 006 19 61</span>
            </div>
            <div class="col-md-7 hidden-xs hidden-sm spec_footer5">
                Займы предоставляются на сумму от 1 000 до 100 000 рублей включительно на срок от 61 до 365 дней. Максимальная процентная ставка по займу составляет 0,98% в день, а минимальная 0,08%. Пример расчета общей стоимости займа: заём 20 000 руб. срок пользования 10 недель под 0,08% в день; проценты за весь период составят 11 200 руб. Итого к выплате 31 200 рублей. Первый заём до 10 000 рублей выдается по ставке 0% в случае своевременного погашения.
                <br>ООО «Альянс» ОГРН 5177746353054 ИНН 9705113909 КПП 770501001
            </div>    
        </div>
        <div class="clearfix">&nbsp;</div>
    </div>
</footer> 
<?php
require 'templates/common/get_display_size.php';
echo '<script>';
require 'modules/jquery/jquery-1.11.3.min.js';
echo '</script>'; 
echo '<script>';
require 'modules/bootstrap/3.3.6/js/bootstrap.min.js';
echo '</script>';
echo '<script>';
require 'modules/jquery-maskedinput/jquery.maskedinput.1.4.2.min.js';
echo '</script>';
echo '<script>';
require 'modules/jquery.ion.rangeslider/js/ion.rangeSlider.min.js';
echo '</script>';
echo '<script>';
require 'templates/edenga/js/get_parameter.js';
echo '</script>';
echo '<script>';
require 'templates/edenga/js/coockie.js';
echo '</script>';
echo '<script>
jQuery(document).ready(function(o){var l=300,s=1200,c=700,d=o(".cd-top");o(window).scroll(function(){o(this).scrollTop()>l?d.addClass("cd-is-visible"):d.removeClass("cd-is-visible cd-fade-out"),o(this).scrollTop()>s&&d.addClass("cd-fade-out")}),d.on("click",function(l){l.preventDefault(),o("body,html").animate({scrollTop:0},c)})});</script>';
echo '<script>';
require 'modules/jquery-ui/1.10.4/js/jquery-ui-1.10.4.custom.min.js';
echo '</script>'; 
echo '<script>';
require 'templates/edenga/js/validate.js';
echo '</script>';
echo '<script>';
require 'modules/poshytip-1.2/src/jquery.poshytip.min.js';
echo '</script>';
echo '<script>';
require 'templates/edenga/js/jquery.form-validator.js';
echo '</script>';
echo '<script>';
require 'templates/edenga/js/jquery.suggestions.min.js';
echo '</script>';
require 'templates/common/detect.min.php';
echo '<script>';
require 'templates/edenga/js/settings.js';
echo '</script>';

if ($this->uri->segment(1) == '' || $this->uri->segment(1) == ' ' || $this->uri->segment(1) == 'index') 
{
    echo '<script>';
    require 'modules/3dgallery/js/modernizr.custom.53451.js';
    echo '</script>';
    echo '<script>';
    require 'modules/3dgallery/js/jquery.gallery.js';
    echo '</script>'; 
    echo '<script>
    $(document).ready(function () {
        $("#dg-container").gallery();
    });
    </script> ';
}elseif ($this->uri->segment(1) == 'form') {
    echo ' <script>
    $("#work").change(function(){
        if($(this).val().toLowerCase() == "пенсионер" || $(this).val().toLowerCase() == "безработный")
        { 
            $("#work_name").addClass("valid");
            $("#work_name").parent().addClass("has-success").removeClass("has-error");
            $("#work_name").parent().parent().prev().removeClass("label_er").addClass("label_true");
            $("#work_name").removeClass("er");
            $("#work_namestatus").removeClass("glyphicon-remove").addClass("glyphicon-ok"); 

            $("#work_occupation").addClass("valid");
            $("#work_occupation").parent().addClass("has-success").removeClass("has-error");
            $("#work_occupation").parent().parent().prev().removeClass("label_er").addClass("label_true");
            $("#work_occupation").removeClass("er");
            $("#work_occupationstatus").removeClass("glyphicon-remove").addClass("glyphicon-ok"); 

            $("#work_phone").addClass("valid");
            $("#work_phone").parent().addClass("has-success").removeClass("has-error");
            $("#work_phone").parent().parent().prev().removeClass("label_er").addClass("label_true");
            $("#work_phone").removeClass("er");
            $("#work_phonestatus").removeClass("glyphicon-remove").addClass("glyphicon-ok");

            $("#work_experience").addClass("valid");
            $("#work_experience").parent().addClass("has-success").removeClass("has-error");
            $("#work_experience").parent().parent().prev().removeClass("label_er").addClass("label_true");
            $("#work_experience").removeClass("er");
            $("#work_experiencestatus").removeClass("glyphicon-remove").addClass("glyphicon-ok");

            $("#work_salary").removeClass("valid");
            $("#work_salary").parent().addClass("has-error").removeClass("has-success");
            $("#work_salary").parent().parent().prev().removeClass("label_true").addClass("label_er");
            $("#work_salary").addClass("er");
            $("#work_salary").focus();
            $("#work_salarystatus").addClass("glyphicon-remove");

            $("#work_region").addClass("valid");
            $("#work_region").parent().addClass("has-success").removeClass("has-error");
            $("#work_region").parent().parent().prev().removeClass("label_er").addClass("label_true");
            $("#work_region").removeClass("er");

            $("#work_city").addClass("valid");
            $("#work_city").parent().addClass("has-success").removeClass("has-error");
            $("#work_city").parent().parent().prev().removeClass("label_er").addClass("label_true");
            $("#work_city").removeClass("er");
            $("#work_citystatus").removeClass("glyphicon-remove").addClass("glyphicon-ok"); 

            $("#work_street").addClass("valid");
            $("#work_street").parent().addClass("has-success").removeClass("has-error");
            $("#work_street").parent().parent().prev().removeClass("label_er").addClass("label_true");
            $("#work_street").removeClass("er");
            $("#work_streetstatus").removeClass("glyphicon-remove").addClass("glyphicon-ok"); 

            $("#work_house").addClass("valid");
            $("#work_house").parent().addClass("has-success").removeClass("has-error");
            $("#work_house").parent().parent().prev().removeClass("label_er").addClass("label_true");
            $("#work_house").removeClass("er");
            $("#work_streetstatus").removeClass("glyphicon-remove").addClass("glyphicon-ok"); 

            $("#work_office").addClass("valid");
            $("#work_office").parent().addClass("has-success").removeClass("has-error");
            $("#work_office").parent().parent().prev().removeClass("label_er").addClass("label_true");
            $("#work_office").removeClass("er");
            $("#work_officestatus").removeClass("glyphicon-remove").addClass("glyphicon-ok"); 
            
            if($(this).val().toLowerCase() == "пенсионер")
            $("#work_name").val("пенсионер");
            else  $("#work_name").val("безработный");
            if($(this).val().toLowerCase() == "пенсионер")
            $("#work_occupation").val("пенсионер");
            else  $("#work_occupation").val("безработный");
            var teemp = $("#phone").val();
            $("#work_phone").val(teemp);
            $("#work_experience").val(100);
            $("#work_salary").val("");

            var teemp2 = Number($("#region").find(":selected").index());
            $("#work_region option").eq(teemp2).prop("selected", true);
            var teemp3 = $("#city").val();
            $("#work_city").val(teemp3);
            var teemp4 = $("#street").val();
            $("#work_street").val(teemp4);
            var teemp5 = $("#building").val();
            $("#work_house").val(teemp5);
            $("#work_building").val(" ");
            var teemp6 = $("#flat").val();
            $("#work_office").val(teemp6);
        }
        else { 

            $("#work_name").val("");
            $("#work_name").removeClass("valid");
            $("#work_name").parent().removeClass("has-success");
            $("#work_name").parent().parent().prev().removeClass("label_true"); 
            $("#work_namestatus").removeClass("glyphicon-ok");

            $("#work_occupation").val("");
            $("#work_occupation").removeClass("valid");
            $("#work_occupation").parent().removeClass("has-success");
            $("#work_occupation").parent().parent().prev().removeClass("label_true"); 
            $("#work_occupationstatus").removeClass("glyphicon-ok"); 

            $("#work_phone").val("");
            $("#work_phone").removeClass("valid");
            $("#work_phone").parent().removeClass("has-success");
            $("#work_phone").parent().parent().prev().removeClass("label_true"); 
            $("#work_phonestatus").removeClass("glyphicon-ok");

            $("#work_experience").val("");
            $("#work_experience").removeClass("valid");
            $("#work_experience").parent().removeClass("has-success");
            $("#work_experience").parent().parent().prev().removeClass("label_true"); 
            $("#work_experiencestatus").removeClass("glyphicon-ok");

            $("#work_salary").val("");
            $("#work_salary").removeClass("valid");
            $("#work_salary").parent().removeClass("has-success");
            $("#work_salary").parent().parent().prev().removeClass("label_true"); 
            $("#work_salarystatus").removeClass("glyphicon-ok");
 
            $("#work_region").removeClass("valid");
            $("#work_region").parent().removeClass("has-success");
            $("#work_region").parent().parent().prev().removeClass("label_true");

            $("#work_city").val("");
            $("#work_city").removeClass("valid");
            $("#work_city").parent().removeClass("has-success");
            $("#work_city").parent().parent().prev().removeClass("label_true"); 
            $("#work_citystatus").removeClass("glyphicon-ok"); 

            $("#work_street").val("");
            $("#work_street").removeClass("valid");
            $("#work_street").parent().removeClass("has-success");
            $("#work_street").parent().parent().prev().removeClass("label_true"); 
            $("#work_streetstatus").removeClass("glyphicon-ok"); 

            $("#work_house").val("");
            $("#work_house").removeClass("valid");
            $("#work_house").parent().removeClass("has-success");
            $("#work_house").parent().parent().prev().removeClass("label_true"); 
            $("#work_housestatus").removeClass("glyphicon-ok");

            $("#work_office").val("");
            $("#work_office").removeClass("valid");
            $("#work_office").parent().removeClass("has-success");
            $("#work_office").parent().parent().prev().removeClass("label_true"); 
            $("#work_officestatus").removeClass("glyphicon-ok");
            $("#work_name").val(""); 
             $("#work_occupation").val(""); 
            $("#work_phone").val("");
            $("#work_experience").val(""); 
            $("#work_salary").val("");
            $("#work_region option").eq(0, true).prop("selected", true);
            $("#work_city").val("");
            $("#work_street").val("");
            $("#work_house").val("");
            $("#work_building").val("");
            $("#work_office").val("");
        }
    }); 
    </script>';  
        echo '
            <script type="text/javascript">
                $("#email").suggestions({
                    serviceUrl: "https://suggestions.dadata.ru/suggestions/api/4_1/rs",
                    token: "78fc76023580df0ec78566913b31a87d909f1ec0",
                    type: "EMAIL",
                    count: 3,
                    scrollOnFocus: false
                });
            </script>';
        }
?>  
<script>
    $("#feedback-email").suggestions({
        serviceUrl: "https://suggestions.dadata.ru/suggestions/api/4_1/rs",
        token: "78fc76023580df0ec78566913b31a87d909f1ec0",
        type: "EMAIL",
        count: 3,
        scrollOnFocus: false
    });
  $(document).ready(function () {
    if (location.hash) {
      location.hash && $(location.hash + '.collapse').collapse('show');
      $('body').animate({
        scrollTop: $($(location.hash).parent()).offset().top - 50
      }, 1000);
      return false;
    }
  });
function setcookie(name, value, expires, path, domain, secure)
{
    document.cookie =
    name + "=" + escape(value) +
    ((expires) ? "; expires=" + (new Date(expires)) : "") +
    ((path) ? "; path=" + path : "; path=/") +
    ((domain) ? "; domain=" + domain : "") +
    ((secure) ? "; secure" : "");
}
function traffic(site, page){
    $.ajax({
        type: 'POST',
        url: '/traffic/',
        data: 'site='+site+'&page='+page,
            success: function(data){
            }
    });
}
//traffic(window.location.hostname,window.location.pathname);
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
    function Loading(flag){
        if (typeof flag == 'undefined'){
            $('#feedback-send').prop('disabled', true);
            $('#feedback-send').html('Отправка <i class="fa fa-spinner fa-spin fa-pulse"></i>');
        }
        else if (!flag){
            $('#feedback-send').html('Отправить');
            $('#feedback-send').prop('disabled', false); 
        } 
    }
    
	$('#feedback-send').click(function(){
		Loading();
                
		var data;
        if(window.location.pathname == '/form')
        {
            var _input = $('#anketa').serialize();
            _input = decodeURIComponent(_input);
            _input = _input.replace(new RegExp("&step",'g'),"&Шаг");
            _input = _input.replace(new RegExp("&period",'g'),"&Срок");
            _input = _input.replace(new RegExp("display=0",'g'),"Декстоп версия");
            _input = _input.replace(new RegExp("display=1",'g'),"Мобайл версия");
            _input = _input.replace(new RegExp("referer",'g'),"Откуда пришли");
            _input = _input.replace(new RegExp("&f=",'g'),"&Фамилия=");
            _input = _input.replace(new RegExp("&i=",'g'),"&Имя=");
            _input = _input.replace(new RegExp("&o=",'g'),"&Отчество=");
            _input = _input.replace(new RegExp("gender=0",'g'),"Пол женский");
            _input = _input.replace(new RegExp("gender=1",'g'),"Пол мужской");
            _input = _input.replace(new RegExp("&birth_dd=0&birth_mm=0&birth_yyyy=0",'g'),"");
            _input = _input.replace(new RegExp("birthdate",'g'),"Дата рождения");
            _input = _input.replace(new RegExp("&phone=",'g'),"&Телефон=");
            _input = _input.replace(new RegExp("&email",'g'),"&Емаил");
            _input = _input.replace(new RegExp("&delays_type=never",'g'),"&Никогда не брал(а) кредитов");
            _input = _input.replace(new RegExp("&delays_type=credit_closed_no_delay",'g'),"&Кредиты закрыты, просрочек не было");
            _input = _input.replace(new RegExp("&delays_type=credit_open_no_delay",'g'),"&Кредиты есть, просрочек нет");
            _input = _input.replace(new RegExp("&delays_type=credit_closed_had_delay",'g'),"&Кредиты закрыты, просрочки были");
            _input = _input.replace(new RegExp("&delays_type=had_delay",'g'),"&Просрочки были, сейчас нет");
            _input = _input.replace(new RegExp("&delays_type=had_delay",'g'),"&Просрочки сейчас есть");
            _input = _input.replace(new RegExp("rangeSlider",'g'),"Сумма");
            _input = _input.replace(new RegExp("ammount",'g'),"Сумма");
            _input = _input.replace(new RegExp("amount",'g'),"Сумма");
            _input = _input.replace(new RegExp("&passport=",'g'),"&Серия и номер паспорта=");
            _input = _input.replace(new RegExp("passport_s",'g'),"Серия паспорта");
            _input = _input.replace(new RegExp("passport_n",'g'),"Номер паспорта");
            _input = _input.replace(new RegExp("passport_dd",'g'),"День выдачи");
            _input = _input.replace(new RegExp("passport_mm",'g'),"Месяц выдачи");
            _input = _input.replace(new RegExp("passport_yyyy",'g'),"Год выдачи");
            _input = _input.replace(new RegExp("passportdate",'g'),"Дата выдачи");
            _input = _input.replace(new RegExp("passport_code",'g'),"Код подразделения");
            _input = _input.replace(new RegExp("passport_who",'g'),"Кем выдан");
            _input = _input.replace(new RegExp("birthplace",'g'),"Место рождения");
            _input = _input.replace(new RegExp("&region=",'g'),"&Регион=");
            _input = _input.replace(new RegExp("&city=",'g'),"&Населённый пункт=");
            _input = _input.replace(new RegExp("&street=",'g'),"&Улица проживания=");
            _input = _input.replace(new RegExp("&building=",'g'),"&Дом=");
            _input = _input.replace(new RegExp("&housing=",'g'),"&Корпус=");
            _input = _input.replace(new RegExp("flat=",'g'),"Квартира=");
            _input = _input.replace(new RegExp("reg_type=1",'g'),"Постоянная регистрация");
            _input = _input.replace(new RegExp("reg_type=0",'g'),"Без регистрации");
            _input = _input.replace(new RegExp("reg_type=2",'g'),"Временная регистрация");
            _input = _input.replace(new RegExp("&reg_same=1",'g'),"");
            _input = _input.replace(new RegExp("&work=",'g'),"&Вид трудоустройства=");
            _input = _input.replace(new RegExp("work_name",'g'),"Место работы"); 
            _input = _input.replace(new RegExp("work_occupation",'g'),"Должность");
            _input = _input.replace(new RegExp("work_phone",'g'),"Рабочий телефон");
            _input = _input.replace(new RegExp("work_experience",'g'),"Стаж");
            _input = _input.replace(new RegExp("work_salary",'g'),"Зарплата");
            _input = _input.replace(new RegExp("work_region",'g'),"Регион работы");
            _input = _input.replace(new RegExp("work_city",'g'),"Город работы");
            _input = _input.replace(new RegExp("work_street",'g'),"Улица работы");
            _input = _input.replace(new RegExp("work_house",'g'),"Номер дома работы");
            _input = _input.replace(new RegExp("work_office",'g'),"Офис работы");

            _info = _info.replace(new RegExp("undefined",'g'),"неопределено");
            data = {
                name: $('#feedback-name').val(),
                phone: $('#feedback-phone').val(),
                email: $('#feedback-email').val(),
                comment: 'Обращение: ' + $('#feedback-comment').val() + _info + "\n | Разрешение экрана: " + x_size + " x " + y_size + "\n | Данные:" + _input
            };
        }
        else
        {
            data = {
                name: $('#feedback-name').val(),
                phone: $('#feedback-phone').val(),
                email: $('#feedback-email').val(),
                comment: 'Обращение: ' + $('#feedback-comment').val() + _info + "\n | Разрешение экрана: " + x_size + " x " + y_size
            };
        }

		if ((typeof data.phone != 'undefined' && data.phone != '') && (typeof data.email != 'undefined' && data.email != '') && (typeof data.comment != 'undefined' && data.comment != '')) {
			$.ajax({
				url:'/feedback/',
				type:'POST',
				dataType:'json',
				data:data
			}).done(function(response){
				if (response != null){
					if (typeof response.error != 'undefined') {
						alert('Ошибка. ' + response.error);
					}
					else {
						$('#feedbackModal').modal('hide');
						Loading(0);
						alert('Заявка отправлена. Мы ответим вам в ближайшее время.');
					}
				}
				else{alert('Не получилось отправить. Попробуйте ещё раз.');}
			}).fail(function(jqxhr,textStatus,error){
				alert('Не получилось отправить. Попробуйте ещё раз.');
			}).always(function(){Loading(0);});
		} else {Loading(0);alert('Пожалуйста, заполните все поля.');}
	});

    var amount = 15000;
    var day = 10;
    var comm1 = 0;
    var comm2 = 0;
    var percent = 0;

$(document).ready(function(){ 
	$('.amount').ionRangeSlider({
        values: [1000, 2000, 3000, 4000, 5000,6000,7000,8000,9000,10000,11000,12000,13000,14000,15000,20000,25000,30000,40000,50000,80000,100000],    
        hide_min_max: true,
        from: <?php 
        if(isset($_GET['amount'])) 
        {  
            switch($_GET['amount'])
            {
                case '1000': $from = '0' ; break;
                case '2000': $from = '1' ; break;
                case '3000': $from = '2' ; break;
                case '4000': $from = '3' ; break;
                case '5000': $from = '4' ; break;
                case '6000': $from = '5' ; break;
                case '7000': $from = '6' ; break;
                case '8000': $from = '7' ; break;
                case '9000': $from = '8' ; break;
                case '10000': $from = '9' ; break;
                case '11000': $from = '10' ; break;
                case '12000': $from = '11' ; break;
                case '13000': $from = '12' ; break;
                case '14000': $from = '13' ; break;
                case '15000': $from = '14' ; break;
                case '20000': $from = '15' ; break;
                case '25000': $from = '16' ; break;
                case '30000': $from = '17' ; break;
                case '40000': $from = '18' ; break;
                case '50000': $from = '19' ; break;
                case '80000': $from = '20' ; break;
                case '100000': $from = '21' ; break;
            }
            echo $from; 
        }
        elseif(!isset($_POST['form_slrd'])) echo '15'; else echo $_POST['form_slrd']; 
        ?>,
		onChange:function(range){
			var percent = 0;
			var attr = '';
			var color = '';
            <?php if ($this->uri->segment(1) == 'form') { ?>
            if (range.from_value <= 10000) {
                $('#p').val('7');
                $('#period2').val('От 61 дня');
			}
			else if (range.from_value <= 15000) {
                $('#p').val('14');
                $('#period2').val('От 61 дня');
			}
			else if (range.from_value <= 20000) {
                $('#p').val('21');
                $('#period2').val('От 130 дней');
			}
			else if (range.from_value <= 30000) {
                $('#p').val('30');
                $('#period2').val('От 130 дней');
			}
			else if (range.from_value <= 50000) {
                $('#p').val('30');
                $('#period2').val('От 260 дней');
			}
			else {
                $('#p').val('30');
                $('#period2').val('До 365 дней');
            }
            $('#amount').val(range.from_value);
            <?php } ?>
            <?php if ($this->uri->segment(1) == '' || $this->uri->segment(1) == 'index' || $this->uri->segment(1) == ' ') { ?>
			if (range.from_value <= 7000) {
            
                period.update({
                    from: 15
                }); 
                $('#p').val('7');
                $('#period2').val('7'); 
				perc = 97;
				attr = 'Автоматическое одобрение';
				color = 'green';
                day_comment = 'От 61 дня';
                day=1;
			}
			else if (range.from_value <= 15000) { 
                period.update({
                    from: 30
                }); 
                $('#p').val('14');
                $('#period2').val('14');
				perc = 94;
				attr = 'Может понадобиться паспорт';
				color = 'green';
                day_comment = 'От 130 дней';
                day=15;
			}
			else if (range.from_value <= 30000) { 
                period.update({
                    from: 120
                }); 
                $('#p').val('21');
                $('#period2').val('21');
				perc = 84;
				attr = 'Нужен только паспорт';
				color = 'orange';
                day_comment = 'От 130 дней';
                day=15;
			}
			else if (range.from_value <= 50000) { 
                period.update({
                    from: 240
                }); 
                $('#p').val('30');
                $('#period2').val('30');
				perc = 72;
				attr = 'Нужна справка о доходах';
				color = 'orange';
                day_comment = 'От 230 дней';
                day=15;
			}
			else { 
                period.update({
                    from: 365
                }); 
                $('#p').val('30');
                $('#period2').val('30');
				perc = 64;
				attr = 'Нужна справка о доходах';
				color = 'red';
                day_comment = 'До 365 дней';
                day=30;
            }
            amount = range.from_value;
            $('#spec_ind2').val(range.from_value);
            $('#spec_ind').val(range.from_value);
            $('#form_slrd').val(range.from);
            $('#amount').val(range.from_value); 

			$('.current_amount').text(String(range.from_value).split(/(?=(?:\d{3})+$)/).join(' '));
			// $('.percent_rate').text(perc + '%');
            $('.comment').text(attr);
            $('.current_period').text(day_comment);
			//$('#credit_hint').html(attr);
			//$('#ranges-label').hide();
			$('.results tr').each(function(indx, element){
				if ($(element).data('amount') < range.from_value) $(element).hide();
				else $(element).show();
			});
            <?php } ?>
			
            updateComm();
		}
	});
    var slider = $('.amount').data('ionRangeSlider');
    var slider2 = $('#spec_ind2').data('ionRangeSlider');
    
        <?php if ($this->uri->segment(1) == '' || $this->uri->segment(1) == 'index' || $this->uri->segment(1) == ' ') { ?>
            var slider_plus = true;
            var n = 10;
            var slider_init = setInterval(function () {
                if (slider_plus) {
                    n++;
                } else {
                    n--;
                }
                if (n == 21 && n != <?php echo $from;?>) {
                    slider_plus = false;
                }else if (n == <?php echo $from;?> && slider_plus == false) {
                    clearInterval(slider_init);
                }else if (n == 21 && n == <?php echo $from;?>) {
                    clearInterval(slider_init);
                }
         
                slider.update({
                    from: n
                });

                slider2.update({
                    from: n
                }); 

            if (slider.result.from_value <= 7000) {
                period.update({
                    from: 15
                });

                $('#p').val('7');
                $('#period2').val('7');
				perc = 97;
				attr = 'Автоматическое одобрение';
				color = 'green';
                day_comment = 'От 61 дня';
                day=1;
			}
			else if (slider.result.from_value <= 15000) {
                period.update({
                    from: 30
                });
                $('#p').val('14');
                $('#period2').val('14');
				perc = 94;
				attr = 'Может понадобиться паспорт';
				color = 'green';
                day_comment = 'От 130 дней';
                day=15;
			}
			else if (slider.result.from_value <= 30000) {
                period.update({
                    from: 120
                });
                $('#p').val('21');
                $('#period2').val('21');
				perc = 84;
				attr = 'Нужен только паспорт';
				color = 'orange';
                day_comment = 'От 130 дней';
                day=15;
			}
			else if (slider.result.from_value <= 50000) {
                period.update({
                    from: 240
                });
                $('#p').val('30');
                $('#period2').val('30');
				perc = 72;
				attr = 'Нужна справка о доходах';
				color = 'orange';
                day_comment = 'От 230 дней';
                day=15;
			}
			else {
                period.update({
                    from: 365
                });
                $('#p').val('30');
                $('#period2').val('30');
				perc = 64;
				attr = 'Нужна справка о доходах';
				color = 'red';
                day_comment = 'До 365 дней';
                day=30;
            }
            
            if(slider.result.from_value<=30000){
             percent = 1.3;
			 comm1 = Math.ceil((slider.result.from_value/100)*percent)*day;
			 comm2 = 0;
            }
            if(slider.result.from_value>30000){
                            percent=0.2;
                comm1 = 390*day;
                comm2 = Math.ceil(((slider.result.from_value-30000)/100)*percent)*day;
            }
            comm = comm1 + comm2;
            summ = slider.result.from_value + comm;
            amount = slider.result.from_value;

            $('#amount').val(slider.result.from_value);
            $('#amount').val(slider2.result.from_value);
            $('#form_slrd').val(slider.result.from);

            $('.perc').text(percent);
            $('.am').text(amount);
            $('.comm').text(comm);
            $('.sum').text(String(summ).split(/(?=(?:\d{3})+$)/).join(' '));

            updateComm();
            }, 50); 
        <?php } ?>
	$('#period').ionRangeSlider({
		min: 65,
		max: 365,
		from: <?php echo empty($_POST['period'])? 10 : $_POST['period']; ?>,
		postfix: ' сут.',
        from_fixed: true,
		onChange:function(range){
            day = range.from;
            updateComm();
		}
	});
    var period = $("#period").data("ionRangeSlider");
	<?php if ($this->uri->segment(1) == '') { ?>
	var slider = $('.amount').data('ionRangeSlider');
	var slider_plus = true;
	var slider_intl = setInterval(function(){
		var step = slider_plus? slider.options.from+slider.options.step : slider.options.from-slider.options.step;
		if (step == slider.options.max) slider_plus = false;
		if (step < <?php 

        if(isset($_GET['amount'])) 
        {  
            switch($_GET['amount'])
            {
                case '1000': $from = '0' ; break;
                case '2000': $from = '1' ; break;
                case '3000': $from = '2' ; break;
                case '4000': $from = '3' ; break;
                case '5000': $from = '4' ; break;
                case '6000': $from = '5' ; break;
                case '7000': $from = '6' ; break;
                case '8000': $from = '7' ; break;
                case '9000': $from = '8' ; break;
                case '10000': $from = '9' ; break;
                case '11000': $from = '10' ; break;
                case '12000': $from = '11' ; break;
                case '13000': $from = '12' ; break;
                case '14000': $from = '13' ; break;
                case '15000': $from = '14' ; break;
                case '20000': $from = '15' ; break;
                case '25000': $from = '16' ; break;
                case '30000': $from = '17' ; break;
                case '40000': $from = '18' ; break;
                case '50000': $from = '19' ; break;
                case '80000': $from = '20' ; break;
                case '100000': $from = '21' ; break;
            }
            echo $from; 
        }
        elseif(!isset($_POST['form_slrd'])) echo '15'; else echo $_POST['form_slrd']; 
        ?>) {
			clearInterval(slider_intl);
		}
		else slider.update({from:step});
        updateComm();
	}, 50);
	<?php } ?>
        
        var updateComm = function () {
            
		if(amount<=30000){
            percent = 1.3;
			comm1 = Math.ceil((amount/100)*percent)*day;
			comm2 = 0;
		}
		if(amount>30000){
            percent=0.2;
			comm1 = 390*day;
			comm2 = Math.ceil(((amount-30000)/100)*percent)*day;
		}
		comm = comm1 + comm2;
		summ = amount + comm;
		$('.perc').text(percent);
        $('.am').text(amount);
        $('.comm').text(comm);
        $('.sum').text(String(summ).split(/(?=(?:\d{3})+$)/).join(' '));

        <?php if ($this->uri->segment(1) == '' || $this->uri->segment(1) == 'index' || $this->uri->segment(1) == ' ') {  ?>
        var slider3 = $('.amount').data('ionRangeSlider');
        $('#spec_ind2').val(slider3.result.from_value);
        $('#spec_ind').val(slider3.result.from_value); 
        $('#form_slrd').val(slider3.result.from);

        $('.current-button-main.am').text(amount);
        $('.current-button-main.current_period').text(day_comment);
        $('.current-button-main.comm').text(comm);
        $('.current-button-main.sum').text(String(summ).split(/(?=(?:\d{3})+$)/).join(' '));
        $('.current-button-main.percent_rate').text(percent+'%');
        $('.current-button-main.percent_rate2').text(percent+'%');
        <?php } ?>
    };
    $('#spec_ind2').ionRangeSlider({
        values: [1000, 2000, 3000, 4000, 5000,6000,7000,8000,9000,10000,11000,12000,13000,14000,15000,20000,25000,30000,40000,50000,80000,100000],
        from: <?php 
        if(isset($_GET['amount'])) 
        {  
            switch($_GET['amount'])
            {
                case '1000': $from = '0' ; break;
                case '2000': $from = '1' ; break;
                case '3000': $from = '2' ; break;
                case '4000': $from = '3' ; break;
                case '5000': $from = '4' ; break;
                case '6000': $from = '5' ; break;
                case '7000': $from = '6' ; break;
                case '8000': $from = '7' ; break;
                case '9000': $from = '8' ; break;
                case '10000': $from = '9' ; break;
                case '11000': $from = '10' ; break;
                case '12000': $from = '11' ; break;
                case '13000': $from = '12' ; break;
                case '14000': $from = '13' ; break;
                case '15000': $from = '14' ; break;
                case '20000': $from = '15' ; break;
                case '25000': $from = '16' ; break;
                case '30000': $from = '17' ; break;
                case '40000': $from = '18' ; break;
                case '50000': $from = '19' ; break;
                case '80000': $from = '20' ; break;
                case '100000': $from = '21' ; break;
            }
            echo $from; 
        }
        elseif(!isset($_POST['form_slrd'])) echo '15'; else echo $_POST['form_slrd']; 
        ?>,
        onChange: function(range2){
            if (range2.from_value <= 10000) {
                $('#p').val('7');
                $('#period2').val('От 61 дня');
			}
			else if (range2.from_value <= 15000) {
                $('#p').val('14');
                $('#period2').val('От 61 дня');
			}
			else if (range2.from_value <= 20000) {
                $('#p').val('21');
                $('#period2').val('От 130 дней');
			}
			else if (range2.from_value <= 30000) {
                $('#p').val('30');
                $('#period2').val('От 130 дней');
			}
			else if (range2.from_value <= 50000) {
                $('#p').val('30');
                $('#period2').val('От 260 дней');
			}
			else {
                $('#p').val('30');
                $('#period2').val('До 365 дней');
            }

            $('#spec_ind2').val(range2.from_value);
            $('#spec_ind').val(range2.from_value);
            $('#form_slrd').val(range2.from);
            $('#amount').val(range2.from_value);
            updateComm();
	    }
    });
});
</script> 
<?php
if($this->uri->segment(1) == 'reviews'){
    echo '<script>';
    require 'modules/owl/owl.carousel.js';
    echo '</script>';
    echo "<script>
    $(document).ready(function() {
      $('#owl-demo').owlCarousel({
          autoPlay: 5000, //Set AutoPlay to 3 seconds
          items : 2,
          itemsDesktop : [1199,3],
          itemsDesktopSmall : [979,3],
          navigation : false
      });
    });
    </script>";
}elseif($this->uri->segment(1) == 'lk' || $this->uri->segment(1) == 'lk2'){?>
<script>
var offers = <?php echo json_encode($data); ?>;
var by_reg = null;
$(document).ready(function(){
	$('.offer-type').change(function(){
		update_offers();
	});
    if (getcookie('i')){
        var i = getcookie('i');
        $('.i').text(i);
    }	
	function update_offers() {
		var str = '.results tbody tr';
		//var curr = clone(by_reg.length? by_reg : offers);
		var ot_card = $('.offer-type[data-id="card"]').prop('checked');
		var ot_qiwi = $('.offer-type[data-id="qiwi"]').prop('checked');
		var ot_yandex = $('.offer-type[data-id="yandex"]').prop('checked');
		var ot_contact = $('.offer-type[data-id="contact"]').prop('checked');
		// Прячем всё
		$(str).hide();
		// Пробегаемся по списку офферов
		((by_reg !== null)? by_reg : offers).forEach(function(offer, i){
			var $tr = $(str + '[data-id="' + offer.id + '"]');
			if ($tr.data('amount') >= amount){
				if (ot_card && !!$tr.data('card') == ot_card) $tr.show();
				else if (ot_qiwi && !!$tr.data('qiwi') == ot_qiwi) $tr.show();
				else if (ot_yandex && !!$tr.data('yandex') == ot_yandex) $tr.show();
				else if (ot_contact && !!$tr.data('contact') == ot_contact) $tr.show();
			}
		});
	}
});

function clone(o) {
	if(!o || 'object' !== typeof o) return o;
	var c = 'function' === typeof o.pop ? [] : {};
	var p, v;
	for(p in o) {
		if(o.hasOwnProperty(p)) {
			v = o[p];
			if(v && 'object' === typeof v) {
				c[p] = clone(v);
			}
			else {
				c[p] = v;
			}
		}
	}
	return c;
} 
</script>
<?php } ?>
<?php require 'yandex_metrika.php'; ?> 
<script>
function markTarget(target,param,id){
    if (typeof yaCounter40307865 == 'undefined') return;
	if (typeof param == 'undefined') yaCounter40307865.reachGoal(target);
	else yaCounter40307865.reachGoal(target,param);
        
        $.ajax({
            type: 'POST',
            url: '/pixel/',
            data: 'id='+id+'&pixel='+param,
            success: function(data){
                //console.log(data);
            }
        });
}
</script>
<script type="text/javascript">(window.Image ? (new Image()) : document.createElement('img')).src = location.protocol + '//vk.com/rtrg?r=oUIrxEEED8qFrsbZJVRzG6duZ39T8*M4rPAzc85XgSNJGHvUfFFTr*9nZ58V0olTf5G3bB6OmSvKfhe0KKVpL59wDXvoeJKk6bhKowF8eH0ftUpimXiJQjVbz966t3x2pGl72xUo/MH3sCBkZn*ZLtslFpEET2fM*kev/d/iwPU-&pixel_id=1000099083';</script>
<!--Константин Гутлид-->
<script type="text/javascript">(window.Image ? (new Image()) : document.createElement('img')).src = location.protocol + '//vk.com/rtrg?r=wqJ*K2aGdcpg2liN6EhsYyFiF/6V/WyeQDg3Fhe0LS0BD72zEww9dHFpCCZoPNfX5wX32Mp*ZUkoX15dQfo7LWYGZpJPbd10TICdApDxTC6EeiIgyRTsu8jBiK9Y1NV5KNux8UYE2rP10qeO297yIxm5gcl9RV2TyjnYnnP2EzU-&pixel_id=1000099729';</script>
<script type="text/javascript">
    var isMobile = false; //initiate as false
        // device detection
        if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|ipad|iris|kindle|Android|Silk|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(navigator.userAgent) 
            || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(navigator.userAgent.substr(0,4))) isMobile = true;
        if(isMobile){
            (function(w, d, n, s, t) {
            w[n] = w[n] || [];
            w[n].push(function() {
            Ya.Context.AdvManager.render({
            blockId: "R-A-243982-1",
            renderTo: "yandex_rtb_R-A-243982-1",
            async: true
            });
            });
            t = d.getElementsByTagName("script")[0];
            s = d.createElement("script");
            s.type = "text/javascript";
            s.src = "//an.yandex.ru/system/context.js";
            s.async = true;
            t.parentNode.insertBefore(s, t);
            })(this, this.document, "yandexContextAsyncCallbacks");
            $('#display').val(1);
        }else{
            (function(w, d, n, s, t) {
            w[n] = w[n] || [];
            w[n].push(function() {
            Ya.Context.AdvManager.render({
            blockId: "R-A-243982-2",
            renderTo: "yandex_rtb_R-A-243982-2",
            async: true
            });
            });
            t = d.getElementsByTagName("script")[0];
            s = d.createElement("script");
            s.type = "text/javascript";
            s.src = "//an.yandex.ru/system/context.js";
            s.async = true;
            t.parentNode.insertBefore(s, t);
            })(this, this.document, "yandexContextAsyncCallbacks");
        }
</script> 

<!-- Код тега ремаркетинга Google -->
<!-- ------------------------------------------------
С помощью тега ремаркетинга запрещается собирать информацию, по которой можно идентифицировать личность пользователя. Также запрещается размещать тег на страницах с контентом деликатного характера. Подробнее об этих требованиях и о настройке тега читайте на странице http://google.com/ads/remarketingsetup.
------------------------------------------------- -->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 843631316;
var google_custom_params = window.google_tag_params;
var google_remarketing_only = true;
/* ]]> */
</script> 
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/843631316/?guid=ON&amp;script=0"/>
</div>
</noscript>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js"></script>
</body>
</html>