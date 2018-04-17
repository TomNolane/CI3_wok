<?php 
$from = '15'; 
?>

<div class="buffer"></div>
 
<?php
if($this->uri->segment(1) == '' || $this->uri->segment(1) == ' ' || $this->uri->segment(1) == 'index' || $this->uri->segment(1) == 'allarticles')
{
    echo '<a href="#0" class="cd-top">Наверх</a>';
}

if($this->uri->segment(1) != 'form' && $this->uri->segment(1) != 'lk' && $this->uri->segment(1) != 'lk2')
{
	echo ' ';
}
?> 
<footer>
    <div class="container">
        <div class="col-md-12 col-xs-12">
            <div class="row">
                <div class="col-md-2 col-xs-12">
                    <div>
                        <img src="/templates/best-money/img/logo-f.png" align="" alt="logo" class="logo">
                    </div>
                </div>
                <div class="col-md-4 col-xs-12 spec_footer4"></div>
                <div class="col-md-6 hidden-xs hidden-sm spec_footer5">
                        <div class="row">
                            <div class="col-sm-12 great-support-box wow fadeInLeft">
                                <div class="great-support-box-text great-support-box-text-left">
                                    <p class="footer_spec99">Сайт НЕ является представительством МФО или банком, не выдает займов и кредитов. Персональные данные пользователей не собираются и не хранятся. Все рекомендуемые на сайте кредитные учреждения имеют соответствующие лицензии. Условия неуплаты можно уточнить на сайте МФО.</p>
                                </div>
                            </div>
                        </div> 
                    <div class="footer_spec99"> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
</div>


<?php
    require 'templates/common/get_display_size.php';
    echo '<script>';
    require 'templates/best-money/vendor/jquery/jquery.min.js';
    echo '</script>';
    echo '<script>';
    require 'templates/best-money/vendor/bootstrap/js/bootstrap.min.js';
    echo '</script>';
    echo '<script>';
    require 'modules/jquery-maskedinput/jquery.maskedinput.1.4.2.min.js';
    echo '</script>';
    echo '<script>';
    require 'modules/jquery.ion.rangeslider/js/ion.rangeSlider.min.js';
    echo '</script>';
    echo '<script>';
    require 'templates/best-money/js/get_parameter.js';
    echo '</script>';
    echo '<script>';
    require 'templates/best-money/js/coockie.js';
    echo '</script>';
    echo '<script>';
    require 'modules/jquery-ui/1.10.4/js/jquery-ui-1.10.4.custom.min.js';
    echo '</script>';
    echo '<script>';
    require 'modules/poshytip-1.2/src/jquery.poshytip.min.js';
    echo '</script>';
    echo '<script>';
    require 'templates/best-money/js/jquery.form-validator.js';
    echo '</script>';
    echo '<script>';
    require 'templates/best-money/js/jquery.suggestions.min.js';
    echo '</script>';
    echo '<script>';
    require 'templates/best-money/js/settings_form.js';
    echo '</script>';
    require 'templates/common/detect.min.php';
?> 
<!--[if lt IE 10]>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ajaxtransport-xdomainrequest/1.0.1/jquery.xdomainrequest.min.js"></script>
    <![endif]-->
<?php if ($this->uri->segment(1) == 'form') {
    echo ' <script>
    $("#work").change(function(){
        if($(this).val().toLowerCase() == "пенсионер" || $(this).val().toLowerCase() == "безработный")
        { 
            $("#work_name").addClass("valid");
            $("#work_name").parent().addClass("has-success").removeClass("has-error");
            $("#work_name").parent().parent().prev().removeClass("label_er").addClass("label_true");
            $("#work_name").removeClass("er");
            $("#"+$("#work_name").id+"status").removeClass("glyphicon-remove").addClass("glyphicon-ok"); 

            $("#work_occupation").addClass("valid");
            $("#work_occupation").parent().addClass("has-success").removeClass("has-error");
            $("#work_occupation").parent().parent().prev().removeClass("label_er").addClass("label_true");
            $("#work_occupation").removeClass("er");
            $("#"+ $("#work_occupation").id+"status").removeClass("glyphicon-remove").addClass("glyphicon-ok"); 

            $("#work_phone").addClass("valid");
            $("#work_phone").parent().addClass("has-success").removeClass("has-error");
            $("#work_phone").parent().parent().prev().removeClass("label_er").addClass("label_true");
            $("#work_phone").removeClass("er");
            $("#"+$("#work_phone").id+"status").removeClass("glyphicon-remove").addClass("glyphicon-ok");

            $("#work_experience").addClass("valid");
            $("#work_experience").parent().addClass("has-success").removeClass("has-error");
            $("#work_experience").parent().parent().prev().removeClass("label_er").addClass("label_true");
            $("#work_experience").removeClass("er");
            $("#"+$("#work_experience").id+"status").removeClass("glyphicon-remove").addClass("glyphicon-ok");

            $("#work_salary").removeClass("valid");
            $("#work_salary").parent().addClass("has-error").removeClass("has-success");
            $("#work_salary").parent().parent().prev().removeClass("label_true").addClass("label_er");
            $("#work_salary").addClass("er"); 
            $("#work_salary").focus();
            $("#"+$("#work_salary").id+"status").removeClass("glyphicon-ok").addClass("glyphicon-remove");

            $("#work_region").addClass("valid");
            $("#work_region").parent().addClass("has-success").removeClass("has-error");
            $("#work_region").parent().prev().removeClass("label_er").addClass("label_true");
            $("#work_region").removeClass("er");
            $("#"+$("#work_region").id+"status").removeClass("glyphicon-remove").addClass("glyphicon-ok"); 

            $("#work_city").addClass("valid");
            $("#work_city").parent().addClass("has-success").removeClass("has-error");
            $("#work_city").parent().parent().prev().removeClass("label_er").addClass("label_true");
            $("#work_city").removeClass("er");
            $("#"+ $("#work_city").id+"status").removeClass("glyphicon-remove").addClass("glyphicon-ok"); 

            $("#work_street").addClass("valid");
            $("#work_street").parent().addClass("has-success").removeClass("has-error");
            $("#work_street").parent().parent().prev().removeClass("label_er").addClass("label_true");
            $("#work_street").removeClass("er");
            $("#"+$("#work_street").id+"status").removeClass("glyphicon-remove").addClass("glyphicon-ok"); 

            $("#work_house").addClass("valid");
            $("#work_house").parent().addClass("has-success").removeClass("has-error");
            $("#work_house").parent().parent().prev().removeClass("label_er").addClass("label_true");
            $("#work_house").removeClass("er");
            $("#"+$("#work_house").id+"status").removeClass("glyphicon-remove").addClass("glyphicon-ok"); 

            $("#work_office").addClass("valid");
            $("#work_office").parent().addClass("has-success").removeClass("has-error");
            $("#work_office").parent().parent().prev().removeClass("label_er").addClass("label_true");
            $("#work_office").removeClass("er");
            $("#"+$("#work_office").id+"status").removeClass("glyphicon-remove").addClass("glyphicon-ok"); 

//            $("#work_name").prop("disabled", true);
            if($(this).val().toLowerCase() == "пенсионер")
            $("#work_name").val("пенсионер");
            else  $("#work_name").val("безработный");

//            $("#work_occupation").prop("disabled", true);
            if($(this).val().toLowerCase() == "пенсионер")
            $("#work_occupation").val("пенсионер");
            else  $("#work_occupation").val("безработный"); 

//            $("#work_phone").prop("disabled", true);
            var teemp = $("#phone").val();
            $("#work_phone").val(teemp);

//            $("#work_experience").prop("disabled", false);
            $("#work_experience").val(100);

//            $("#work_salary").prop("disabled", false);
            $("#work_salary").val("");

            var teemp2 = Number($("#region").find(":selected").index());
            $("#work_region option").eq(teemp2).prop("selected", true);
//            $("#work_region").prop("disabled", false); 

//            $("#work_city").prop("disabled", true);
            var teemp3 = $("#city").val();
            $("#work_city").val(teemp3);

//            $("#work_street").prop("disabled", true);
            var teemp4 = $("#street").val();
            $("#work_street").val(teemp4);

            
            var teemp5 = $("#building").val();
            $("#work_house").val(teemp5);

//            $("#work_building").prop("disabled", true);
            $("#work_building").val(" ");

//            $("#work_office").prop("disabled", true);
            var teemp6 = $("#flat").val();
            $("#work_office").val(teemp6);
        }
        else { 

            $("#work_name").val("");
            $("#work_name").removeClass("valid");
            $("#work_name").parent().removeClass("has-success");
            $("#work_name").parent().parent().prev().removeClass("label_true"); 
            $("#"+$("#work_name").id+"status").removeClass("glyphicon-ok");

            $("#work_occupation").val("");
            $("#work_occupation").removeClass("valid");
            $("#work_occupation").parent().removeClass("has-success");
            $("#work_occupation").parent().parent().prev().removeClass("label_true"); 
            $("#"+ $("#work_occupation").id+"status").removeClass("glyphicon-ok"); 

            $("#work_phone").val("");
            $("#work_phone").removeClass("valid");
            $("#work_phone").parent().removeClass("has-success");
            $("#work_phone").parent().parent().prev().removeClass("label_true"); 
            $("#"+$("#work_phone").id+"status").removeClass("glyphicon-ok");

            $("#work_experience").val("");
            $("#work_experience").removeClass("valid");
            $("#work_experience").parent().removeClass("has-success");
            $("#work_experience").parent().parent().prev().removeClass("label_true"); 
            $("#"+$("#work_experience").id+"status").removeClass("glyphicon-ok");

            $("#work_salary").val("");
            $("#work_salary").removeClass("valid");
            $("#work_salary").parent().removeClass("has-success");
            $("#work_salary").parent().parent().prev().removeClass("label_true"); 
            $("#"+$("#work_salary").id+"status").removeClass("glyphicon-ok");
 
            $("#work_region").removeClass("valid");
            $("#work_region").parent().removeClass("has-success");
            $("#work_region").parent().prev().removeClass("label_true"); 
            $("#"+$("#work_region").id+"status").removeClass("glyphicon-ok");

            $("#work_city").val("");
            $("#work_city").removeClass("valid");
            $("#work_city").parent().removeClass("has-success");
            $("#work_city").parent().parent().prev().removeClass("label_true"); 
            $("#"+ $("#work_city").id+"status").removeClass("glyphicon-ok"); 

            $("#work_street").val("");
            $("#work_street").removeClass("valid");
            $("#work_street").parent().removeClass("has-success");
            $("#work_street").parent().parent().prev().removeClass("label_true"); 
            $("#"+$("#work_street").id+"status").removeClass("glyphicon-ok"); 

            $("#work_house").val("");
            $("#work_house").removeClass("valid");
            $("#work_house").parent().removeClass("has-success");
            $("#work_house").parent().parent().prev().removeClass("label_true"); 
            $("#"+$("#work_house").id+"status").removeClass("glyphicon-ok");

            $("#work_office").val("");
            $("#work_office").removeClass("valid");
            $("#work_office").parent().removeClass("has-success");
            $("#work_office").parent().parent().prev().removeClass("label_true"); 
            $("#"+$("#work_office").id+"status").removeClass("glyphicon-ok");

//            $("#work_name").prop("disabled", false);
            $("#work_name").val(""); 
 
//            $("#work_occupation").prop("disabled", false);
             $("#work_occupation").val(""); 

//            $("#work_phone").prop("disabled", false);
            $("#work_phone").val("");

//            $("#work_experience").prop("disabled", false);
            $("#work_experience").val("");

//            $("#work_salary").prop("disabled", false);
            $("#work_salary").val("");

            $("#work_region option").eq(0, true).prop("selected", true);
//            $("#work_region").prop("disabled", false); 

//            $("#work_city").prop("disabled", false);
            $("#work_city").val("");

//            $("#work_street").prop("disabled", false);
            $("#work_street").val("");

//            $("#work_house").prop("disabled", false);
            $("#work_house").val("");

//            $("#work_building").prop("disabled", false);
            $("#work_building").val("");

//            $("#work_office").prop("disabled", false);
            $("#work_office").val("");
        }
    }); 

    </script>';
   
 
    
        
    }
    elseif($this->uri->segment(1) == 'lk' || $this->uri->segment(1) == 'lk2')
    {
        echo '<script>
        var offers = '.json_encode($data).';
        var by_reg = null;
        $(document).ready(function(){
            $(\'.offer-type\').change(function(){
                update_offers();
            });
            
            function update_offers() {
                var str = \'.results tbody tr\';
                //var curr = clone(by_reg.length? by_reg : offers);
                var ot_card = $(\'.offer-type[data-id="card"]\').prop(\'checked\');
                var ot_qiwi = $(\'.offer-type[data-id="qiwi"]\').prop(\'checked\');
                var ot_yandex = $(\'.offer-type[data-id="yandex"]\').prop(\'checked\');
                var ot_contact = $(\'.offer-type[data-id="contact"]\').prop(\'checked\');
                // Прячем всё
                $(str).hide();
                // Пробегаемся по списку офферов
                ((by_reg !== null)? by_reg : offers).forEach(function(offer, i){
                    var $tr = $(str + \'[data-id="\' + offer.id + \'"]\');
                    if ($tr.data(\'amount\') >= amount){
                        if (ot_card && !!$tr.data(\'card\') == ot_card) $tr.show();
                        else if (ot_qiwi && !!$tr.data(\'qiwi\') == ot_qiwi) $tr.show();
                        else if (ot_yandex && !!$tr.data(\'yandex\') == ot_yandex) $tr.show();
                        else if (ot_contact && !!$tr.data(\'contact\') == ot_contact) $tr.show();
                    }
                });
            }  
                if (getcookie(\'i\')){
                    var i = getcookie(\'i\');
                    $(\'#i\').text(i);
                }
        });
        
        </script>';
    }
    ?>
<script type="text/javascript">
    //backtotop
    jQuery(document).ready(function (o) {
        var l = 300,
            s = 1200,
            c = 700,
            d = o(".cd-top");
        o(window).scroll(function () {
            o(this).scrollTop() > l ? d.addClass("cd-is-visible") : d.removeClass(
                "cd-is-visible cd-fade-out"), o(this).scrollTop() > s && d.addClass("cd-fade-out")
        }), d.on("click", function (l) {
            l.preventDefault(), o("body,html").animate({
                scrollTop: 0
            }, c)
        })
    }); 

function setcookie(name, value, expires, path, domain, secure) {
        document.cookie = name + "=" + escape(value) +
            ((expires) ? "; expires=" + (new Date(expires)) : "") +
            ((path) ? "; path=" + path : "; path=/") +
            ((domain) ? "; domain=" + domain : "") +
            ((secure) ? "; secure" : "");
    }

    function getcookie(name) {
        var cookie = " " + document.cookie;
        var search = " " + name + "=";
        var setStr = null;
        var offset = 0;
        var end = 0;
        if (cookie.length > 0) {
            offset = cookie.indexOf(search);
            if (offset != -1) {
                offset += search.length;
                end = cookie.indexOf(";", offset)
                if (end == -1) {
                    end = cookie.length;
                }
                setStr = unescape(cookie.substring(offset, end));
            }
        }
        return (setStr);
    }
    
    $(document).ready(function () {
        function Loading(flag) {
            if (typeof flag == 'undefined') {
                document.getElementById('loading').style.display = 'block';
                $('#feedback-send').prop('disabled', true);
                $('#feedback-send').html('Отправка <i class="fa fa-spinner fa-spin fa-pulse"></i>');
            } else if (!flag) {
                $('#feedback-send').html('Отправить');
                $('#feedback-send').prop('disabled', false);
                document.getElementById('loading').style.display = 'none';
            }
        }
        $('#feedback-send').click(function () {
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

            if ((typeof data.phone != 'undefined' && data.phone != '') && (typeof data.email !=
                    'undefined' && data.email != '') && (typeof data.comment != 'undefined' && data.comment !=
                    '')) {
                $.ajax({
                    url: '/feedback/',
                    type: 'POST',
                    dataType: 'json',
                    data: data
                }).done(function (response) {
                    if (response != null) {
                        if (typeof response.error != 'undefined') {
                            alert('Ошибка. ' + response.error);
                        } else {
                            $('#feedbackModal').modal('hide');
                            Loading(0);
                            alert('Заявка отправлена. Мы ответим вам в ближайшее время.');
                        }
                    } else {
                        alert('Не получилось отправить. Попробуйте ещё раз.');
                    }
                }).fail(function (jqxhr, textStatus, error) {
                    alert('Не получилось отправить. Попробуйте ещё раз.');
                }).always(function () {
                    Loading(0);
                });
            } else {
                Loading(0);
                alert('Пожалуйста, заполните все поля.');
            }
        });

        var amount = 20000;
        var day = 15;
        $('.amount').ionRangeSlider({
            values: [1000, 2000, 3000, 4000, 5000, 6000, 7000, 8000, 9000, 10000, 11000, 12000, 13000,
                14000, 15000, 20000, 25000, 30000, 40000, 50000, 80000, 100000
            ],
            postfix: ' Р',
            prettify_enabled: true,
            hide_from_to: false,
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
            onChange: function (range) {
                amount = range.from_value;
                if (range.from_value <= 10000) {
                    $('#period').val('7');
                    $('#period2').val('От 61 до 130 дней');
                } else if (range.from_value <= 15000) {
                    $('#period').val('14');
                    $('#period2').val('От 61 до 130 дней');
                } else if (range.from_value <= 20000) {
                    $('#period').val('21');
                    $('#period2').val('От 61 до 130 дней');
                } else if (range.from_value <= 30000) {
                    $('#period').val('21');
                    $('#period2').val('От 61 до 130 дней');
                } else if (range.from_value <= 50000) {
                    $('#period').val('30');
                    $('#period2').val('От 130 до 250 дней');
                } else {
                    $('#period').val('30');
                    $('#period2').val('От 250 до 365 дней');
                }
                $('#amount').val(range.from_value);
                $('#form_slrd').val(range.from);

                updateComm();
            }
        });

        var updateComm = function () {
            if (amount <= 30000) {
                percent = 1.3;
                comm1 = Math.ceil((amount / 100) * percent) * day;
                comm2 = 0;
            }
            if (amount > 30000) {
                percent = 0.2;
                comm1 = 390 * day;
                comm2 = Math.ceil(((amount - 30000) / 100) * percent) * day;
            }
            if (amount < 30000) {
                prob = 97;
                current_day = 'от 61 дня';
            } else if (amount < 50000) {
                prob = 97;
                current_day = 'от 130 дней';
            } else if (amount >= 50000 && amount <= 70000) {
                prob = 72;
                current_day = 'от 180 дней';
            } else {
                prob = 64;
                current_day = 'до 365 дней';
            } 
            comm = comm1 + comm2;
            summ = amount + comm;
            $('.current_amount').text(String(amount).split(/(?=(?:\d{3})+$)/).join(' '));
            $('.current_comm').text(comm);
            //$('.current_percent').text(percent);
            $('.current_prob').text(prob);
            $('.current_day').text(current_day);
            $('.current_summ').text(String(summ).split(/(?=(?:\d{3})+$)/).join(' '));
            //console.log(comm1 +' '+comm2);
        };
        $('.amount2').ionRangeSlider({
            values: [1000, 2000, 3000, 4000, 5000, 6000, 7000, 8000, 9000, 10000, 11000, 12000, 13000,
                14000, 15000, 20000, 25000, 30000, 40000, 50000, 80000, 100000
            ],
            postfix: ' Р',
            prettify_enabled: true,
            hide_from_to: false,
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
            onChange: function (range) {
                amount = range.from_value;
                $('#form_slrd').val(range.from);
                updateComm();
            }
        });

        var updateComm = function () {
            if (amount <= 30000) {
                percent = 1.3;
                comm1 = Math.ceil((amount / 100) * percent) * day;
                comm2 = 0;
            }
            if (amount > 30000) {
                percent = 0.2;
                comm1 = 390 * day;
                comm2 = Math.ceil(((amount - 30000) / 100) * percent) * day;
            }
            if (amount < 30000) {
                prob = 97;
                current_day = 'от 61 дня';
            } else if (amount < 50000) {
                prob = 97;
                current_day = 'от 130 дней';
            } else if (amount >= 50000 && amount <= 70000) {
                prob = 72;
                current_day = 'от 180 дней';
            } else {
                prob = 64;
                current_day = 'до 365 дней';
            } 
            comm = comm1 + comm2;
            summ = amount + comm;
            $('.current_amount').text(String(amount).split(/(?=(?:\d{3})+$)/).join(' '));
            $('.current_comm').text(comm);
            //$('.current_percent').text(percent);
            $('.current_prob').text(prob);
            $('.current_day').text(current_day);
            $('.current_summ').text(String(summ).split(/(?=(?:\d{3})+$)/).join(' '));
            //console.log(comm1 +' '+comm2);
        };
        $('.amount3').ionRangeSlider({
            values: [1000, 2000, 3000, 4000, 5000, 6000, 7000, 8000, 9000, 10000, 11000, 12000, 13000,
                14000, 15000, 20000, 25000, 30000, 40000, 50000, 80000, 100000
            ],
            postfix: ' Р',
            prettify_enabled: true,
            hide_from_to: false,
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
        onChange: function (range) { 
            if (range.from_value <= 10000) {
                $('#period').val('7');
                $('#period2').val('От 61 до 130 дней');
            } else if (range.from_value <= 15000) {
                $('#period').val('14');
                $('#period2').val('От 61 до 130 дней');
            } else if (range.from_value <= 20000) {
                $('#period').val('21');
                $('#period2').val('От 61 до 130 дней');
            } else if (range.from_value <= 30000) {
                $('#period').val('21');
                $('#period2').val('От 61 до 130 дней');
            } else if (range.from_value <= 50000) {
                $('#period').val('30');
                $('#period2').val('От 130 до 250 дней');
            } else {
                $('#period').val('30');
                $('#period2').val('От 250 до 365 дней');
            }
            $('#amount').val(range.from_value);
            $('#form_slrd').val(range.from); 
            }
        });

        var updateComm = function () {
            if (amount <= 30000) {
                percent = 1.3;
                comm1 = Math.ceil((amount / 100) * percent) * day;
                comm2 = 0;
            }
            if (amount > 30000) {
                percent = 0.2;
                comm1 = 390 * day;
                comm2 = Math.ceil(((amount - 30000) / 100) * percent) * day;
            }
            if (amount < 30000) {
                prob = 97;
                current_day = 'от 61 дня';
            } else if (amount < 50000) {
                prob = 97;
                current_day = 'от 130 дней';
            } else if (amount >= 50000 && amount <= 70000) {
                prob = 72;
                current_day = 'от 180 дней';
            } else {
                prob = 64;
                current_day = 'до 365 дней';
            } 
            comm = comm1 + comm2;
            summ = amount + comm;
            $('.current_amount').text(String(amount).split(/(?=(?:\d{3})+$)/).join(' '));
            $('.current_comm').text(comm);
            //$('.current_percent').text(percent);
            $('.current_prob').text(prob);
            $('.current_day').text(current_day);
            $('.current_summ').text(String(summ).split(/(?=(?:\d{3})+$)/).join(' '));
            //console.log(comm1 +' '+comm2);
        }; 
        
        <?php if ($this->uri->segment(1) == '') { ?>
        var slider = $('.amount').data('ionRangeSlider');
        var slider2 = $('.amount2').data('ionRangeSlider');
        var slider_plus = true;
        var n = 10;
        var slider_init = setInterval(function () {
        if (slider_plus) {
            n++;
        } else {
            n--;
        }
        if (n == 21 && n != <?php echo $from; ?>) {
            slider_plus = false;
        }else if (n == <?php echo $from; ?> && slider_plus == false) {
            clearInterval(slider_init);
        }else if (n == 21 && n == <?php echo $from; ?>) {
            clearInterval(slider_init);
        }

        slider.update({
            from: n
        });
        slider2.update({
            from: n
        });
        $('#amount').val(slider.result.from_value);
        $('#form_slrd').val(n);

        if (slider.result.from_value <= 30000) {
            percent = 1.3;
            comm1 = Math.ceil((slider.result.from_value / 100) * percent) * day;
            comm2 = 0;
        }
        if (slider.result.from_value > 30000) {
            percent = 0.2;
            comm1 = 390 * day;
            comm2 = Math.ceil(((slider.result.from_value - 30000) / 100) * percent) * day;
        }
        if (slider.result.from_value < 30000) {
            prob = 97;
            current_day = 'от 61 дня';
        } else if (slider.result.from_value < 50000) {
            prob = 97;
            current_day = 'от 130 дней';
        } else if (slider.result.from_value >= 50000 && slider.result.from_value <= 70000) {
            prob = 72;
            current_day = 'от 180 дней';
        } else {
            prob = 64;
            current_day = 'до 365 дней';
        }
        comm = comm1 + comm2;
        summ = slider.result.from_value + comm;
        $('.current_amount').text(String(slider.result.from_value).split(/(?=(?:\d{3})+$)/).join(
            ' '));
        $('.current_comm').text(comm);
        //$('.current_percent').text(percent);
        $('.current_prob').text(prob);
        $('.current_day').text(current_day);
        $('.current_summ').text(String(summ).split(/(?=(?:\d{3})+$)/).join(' '));

    }, 50);
<?php } ?>
 
    });
</script> 

<script>
    function markTarget(target, param, id) {
        if (typeof yaCounter35589670 == 'undefined') return;
        if (typeof param == 'undefined') yaCounter35589670.reachGoal(target);
        else yaCounter35589670.reachGoal(target, param);
        $.ajax({
            type: 'POST',
            url: '/pixel/',
            data: 'id=' + id + '&pixel=' + param,
            success: function (data) {
            }
        });
    }
    function traffic(site, page) {
        $.ajax({
            type: 'POST',
            url: '/traffic/',
            data: 'site=' + site + '&page=' + page,
            success: function (data) {
                //console.log(data);
            }
        });
    }
</script> 

<?php require 'yandex_metrika_counter.php';?>

</body>
</html>
