<?php $from = '15';  

    if($this->uri->segment(1) == '' || $this->uri->segment(1) == ' ' || $this->uri->segment(1) == 'index' || $this->uri->segment(1) == 'faq')
    {
        echo '<a href="#0" class="cd-top">Наверх</a>';
    } 

    if($this->uri->segment(1) != 'form')
    {
        echo '';
    }
?>
<footer class="ex-main-footer ex-sticky-footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="ex-foot-logo">
                    <a href="/">
                        <img src="/templates/zaimnow_tk/assets/img/logo-footer.svg" alt="logo-footer.svg">
                    </a>
                </div>
            </div>
            <div class="col-lg-4">
                <ul class="ex-foot-menu">
                    <li>
                        <a href="/about">О сервисе</a>
                    </li>
                    <li>
                        <a href="/money">Способы получения займа</a>
                    </li>
                    <li>
                        <a href="/faq">Часто задаваемые вопросы</a>
                    </li>
                </ul>
            </div>
            <div class="col-lg-4">
                <ul class="ex-foot-menu">
                    <li>
                        <a href="/oferta">Публичная оферта</a>
                    </li>
                    <li>
                        <a href="/soglasie">Согласие на обработку данных</a>
                    </li>
                    <li>
                        <a href="/rules">Правила предоставления займов</a>
                    </li>
                </ul>
            </div>
        </div>
        <p> Сервис по подбору выгодных онлайн займов
            <br> Займы предоставляются на сумму от 1 000 до 100 000 рублей включительно на срок от 61 до 365 дней. Максимальная
            процентная ставка по займу составляет 0,98% в день, а минимальная 0,08%. Пример расчета общей стоимости займа:
            заём 20 000 руб. срок пользования 10 недель под 0,08% в день; проценты за весь период составят 11 200 руб. Итого
            к выплате 31 200 рублей.
            <br> Первый заём до 10 000 рублей выдается по ставке 0% в случае своевременного погашения.
        </p>
</footer>

<?php
    require 'templates/common/get_display_size.php';
    echo '<script>';
    require 'modules/jquery/jquery-1.11.3.min.js';
    echo '</script>';
    echo '<script>';
    require 'templates/zaimnow_tk/assets/js/bootstrap.min.js';
    echo '</script>';
    echo '<script>';
    require 'modules/jquery-maskedinput/jquery.maskedinput.1.4.2.min.js';
    echo '</script>';
    echo '<script>';
    require 'modules/poshytip-1.2/src/jquery.poshytip.min.js';
    echo '</script>';
    echo '<script>';
    require 'templates/zaimnow_tk/assets/js/jquery.pickmeup.twitter-bootstrap.js';
    echo '</script>';
    echo '<script>';
    require 'templates/zaimnow_tk/assets/js/pickmeup.min.js';
    echo '</script>';
    echo '<script>';
    require 'templates/zaimnow_tk/assets/js/jquery.form-validator.js';
    echo '</script>';
    echo '<script>';
    require 'templates/zaimnow_tk/assets/js/jquery.suggestions.min.js';
    echo '</script>';
    echo '<script>';
    require 'templates/zaimnow_tk/assets/js/coockie.js';
    echo '</script>';
    require 'templates/common/detect.min.php';
    echo '<script>';
    require 'templates/zaimnow_tk/assets/js/custom.js';
    echo '</script>';
    echo '<script>';
    require 'templates/zaimnow_tk/assets/js/settings_form.js';
    echo '</script>';
    ?>

    <!--[if lt IE 10]>
    <script  src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ajaxtransport-xdomainrequest/1.0.1/jquery.xdomainrequest.min.js"></script>
    <![endif]-->

    <?php if($this->uri->segment(1) == ' ' || $this->uri->segment(1) == '' || $this->uri->segment(1) == 'index' || $this->uri->segment(1) == 'form') 
{ 
    echo '<script>';
    require 'modules/jquery.ion.rangeslider/js/ion.rangeSlider.min.js';
    echo '</script>';
    echo '<script>';
    require 'templates/zaimnow_tk/assets/js/loanCalculator.js';
    echo '</script>';
?>

    <script>
        //backtotop
        jQuery(document).ready(function (o) {
            var l = 300,
                s = 1200,
                c = 700,
                d = o(".cd-top");
            o(window).scroll(function () {
                o(this).scrollTop() > l ? d.addClass("cd-is-visible") : d.removeClass(
                    "cd-is-visible cd-fade-out"), o(this).scrollTop() > s && d.addClass(
                    "cd-fade-out")
            }), d.on("click", function (l) {
                l.preventDefault(), o("body,html").animate({
                    scrollTop: 0
                }, c)
            })
        });


        function getParameterByName(name, url) {
            if (!url) url = window.location.href;
            name = name.replace(/[\[\]]/g, "\\$&");
            var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
                results = regex.exec(url);
            if (!results) return null;
            if (!results[2]) return '';
            return decodeURIComponent(results[2].replace(/\+/g, " "));
        }
        $(document).ready(function () {
            $.mask.definitions['*'] = "[а-яёА-ЯЁA-Za-z0-9\/\-_]";
            $('[data-toggle="popover"]').popover();

            $("#rangeSlider").ionRangeSlider({
                hide_min_max: true,
                hide_from_to: true,
                keyboard: true,
                grid: false,
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
                values: [1000, 2000, 3000, 4000, 5000, 6000, 7000, 8000, 9000, 10000, 11000, 12000,
                    13000, 14000, 15000, 20000, 25000, 30000, 40000, 50000, 80000, 100000
                ],
                onFinish: function (data) {
                    $('#amount').val(data.from_value);
                    $('#form_slrd').val(data.from);
                },
                onLoad: function (data) {
                    $('#amount').val(data.from_value);
                    $('#form_slrd').val(data.from);
                },
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
                },
            });
        });
    </script>
    <?php } ?>
    <script>
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

        function GetMoney() {
            $('form#anketa').submit();
        }

        function Loading(flag) {
            if (typeof flag == 'undefined') {
                $('#feedback-send').prop('disabled', false);
                $('#feedback-send').html('Отправляется <i class="fa fa-spinner fa-spin fa-pulse"></i>');
            } else if (!flag) {
                $('#feedback-send').html('Отправлено');
                $('#feedback-send').prop('disabled', true);
            }
        }

        $('#feedback-send').click(function () {
            var re_name2 = /^[а-яА-Яё,\W\.\s-]+$/i;
            if ($('#feedback-name').val().length < 2 || !re_name2.test($('#feedback-name').val())) {
                alert("Корректно заполните Ваше имя");
                return;
            }

            var re_email2 =
                /^[-a-z0-9~!$%^&*_=+}{\'?]+(\.[-a-z0-9~!$%^&*_=+}{\'?]+)*@([a-z0-9_][-a-z0-9_]*(\.[-a-z0-9_]+)*\.(aero|arpa|biz|com|coop|edu|gov|info|int|mil|museum|name|net|org|pro|travel|mobi|[a-z][a-z])|([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}))(:[0-9]{1,5})?$/i;
            if ($('#feedback-email').val().length < 6 || !re_email2.test($('#feedback-email').val())) {
                alert("Корректно заполните Ваш email");
                return;
            }

            if ($('#feedback-comment').val().length < 4) {
                alert("Корректно заполните Ваше обращение");
                return;
            }

            Loading();

            if (!re_email.test($('#feedback-email').val())) {
                Loading(0);
                alert('Пожалуйста, заполните поле "ваш емаил" корректно.');
                $('#feedback-send').prop('disabled', false);
                $('#feedback-send').html('Отправить');
                return;
            }

            var data;
            if (window.location.pathname == '/form') {
                var _input = $('#anketa').serialize();
                _input = decodeURIComponent(_input);
                _input = _input.replace(new RegExp("&step", 'g'), "&Шаг");
                _input = _input.replace(new RegExp("&period", 'g'), "&Срок");
                _input = _input.replace(new RegExp("display=0", 'g'), "Декстоп версия");
                _input = _input.replace(new RegExp("display=1", 'g'), "Мобайл версия");
                _input = _input.replace(new RegExp("referer", 'g'), "Откуда пришли");
                _input = _input.replace(new RegExp("&f=", 'g'), "&Фамилия=");
                _input = _input.replace(new RegExp("&i=", 'g'), "&Имя=");
                _input = _input.replace(new RegExp("&o=", 'g'), "&Отчество=");
                _input = _input.replace(new RegExp("gender=0", 'g'), "Пол женский");
                _input = _input.replace(new RegExp("gender=1", 'g'), "Пол мужской");
                _input = _input.replace(new RegExp("&birth_dd=0&birth_mm=0&birth_yyyy=0", 'g'), "");
                _input = _input.replace(new RegExp("birthdate", 'g'), "Дата рождения");
                _input = _input.replace(new RegExp("&phone=", 'g'), "&Телефон=");
                _input = _input.replace(new RegExp("&email", 'g'), "&Емаил");
                _input = _input.replace(new RegExp("&delays_type=never", 'g'), "&Никогда не брал(а) кредитов");
                _input = _input.replace(new RegExp("&delays_type=credit_closed_no_delay", 'g'),
                    "&Кредиты закрыты, просрочек не было");
                _input = _input.replace(new RegExp("&delays_type=credit_open_no_delay", 'g'),
                    "&Кредиты есть, просрочек нет");
                _input = _input.replace(new RegExp("&delays_type=credit_closed_had_delay", 'g'),
                    "&Кредиты закрыты, просрочки были");
                _input = _input.replace(new RegExp("&delays_type=had_delay", 'g'),
                    "&Просрочки были, сейчас нет");
                _input = _input.replace(new RegExp("&delays_type=had_delay", 'g'), "&Просрочки сейчас есть");
                _input = _input.replace(new RegExp("rangeSlider", 'g'), "Сумма");
                _input = _input.replace(new RegExp("ammount", 'g'), "Сумма");
                _input = _input.replace(new RegExp("amount", 'g'), "Сумма");
                _input = _input.replace(new RegExp("&passport=", 'g'), "&Серия и номер паспорта=");
                _input = _input.replace(new RegExp("passport_s", 'g'), "Серия паспорта");
                _input = _input.replace(new RegExp("passport_n", 'g'), "Номер паспорта");
                _input = _input.replace(new RegExp("passport_dd", 'g'), "День выдачи");
                _input = _input.replace(new RegExp("passport_mm", 'g'), "Месяц выдачи");
                _input = _input.replace(new RegExp("passport_yyyy", 'g'), "Год выдачи");
                _input = _input.replace(new RegExp("passportdate", 'g'), "Дата выдачи");
                _input = _input.replace(new RegExp("passport_code", 'g'), "Код подразделения");
                _input = _input.replace(new RegExp("passport_who", 'g'), "Кем выдан");
                _input = _input.replace(new RegExp("birthplace", 'g'), "Место рождения");
                _input = _input.replace(new RegExp("&region=", 'g'), "&Регион=");
                _input = _input.replace(new RegExp("&city=", 'g'), "&Населённый пункт=");
                _input = _input.replace(new RegExp("&street=", 'g'), "&Улица проживания=");
                _input = _input.replace(new RegExp("&building=", 'g'), "&Дом=");
                _input = _input.replace(new RegExp("&housing=", 'g'), "&Корпус=");
                _input = _input.replace(new RegExp("flat=", 'g'), "Квартира=");
                _input = _input.replace(new RegExp("reg_type=1", 'g'), "Постоянная регистрация");
                _input = _input.replace(new RegExp("reg_type=0", 'g'), "Без регистрации");
                _input = _input.replace(new RegExp("reg_type=2", 'g'), "Временная регистрация");
                _input = _input.replace(new RegExp("&reg_same=1", 'g'), "");
                _input = _input.replace(new RegExp("&work=", 'g'), "&Вид трудоустройства=");
                _input = _input.replace(new RegExp("work_name", 'g'), "Место работы");
                _input = _input.replace(new RegExp("work_occupation", 'g'), "Должность");
                _input = _input.replace(new RegExp("work_phone", 'g'), "Рабочий телефон");
                _input = _input.replace(new RegExp("work_experience", 'g'), "Стаж");
                _input = _input.replace(new RegExp("work_salary", 'g'), "Зарплата");
                _input = _input.replace(new RegExp("work_region", 'g'), "Регион работы");
                _input = _input.replace(new RegExp("work_city", 'g'), "Город работы");
                _input = _input.replace(new RegExp("work_street", 'g'), "Улица работы");
                _input = _input.replace(new RegExp("work_house", 'g'), "Номер дома работы");
                _input = _input.replace(new RegExp("work_office", 'g'), "Офис работы");

                _info = _info.replace(new RegExp("undefined", 'g'), "неопределено");
                data = {
                    name: $('#feedback-name').val(),
                    phone: $('#feedback-phone').val(),
                    email: $('#feedback-email').val(),
                    comment: 'Обращение: ' + $('#feedback-comment').val() + _info +
                        "\n | Разрешение экрана: " + x_size + " x " + y_size + "\n | Данные:" + _input
                };
            } else {
                data = {
                    name: $('#feedback-name').val(),
                    phone: $('#feedback-phone').val(),
                    email: $('#feedback-email').val(),
                    comment: 'Обращение: ' + $('#feedback-comment').val() + _info +
                        "\n | Разрешение экрана: " + x_size + " x " + y_size
                };
            }

            if ((typeof data.phone != 'undefined' && data.phone != '') && (typeof data.email != 'undefined' &&
                    data
                    .email != '') && (typeof data.comment != 'undefined' && data.comment != '')) {
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
                            $('#askQuestion').modal('hide');
                            Loading(0);
                            alert('Заявка отправлена. Мы ответим вам в ближайшее время.');
                            $('#feedback-send').prop("disabled", true);
                        }
                    } else {
                        alert('Не получилось отправить. Попробуйте ещё раз.');
                        $('#askQuestion').modal('hide');
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
        $(".ex-offerta-block").hover(function () {
            $(".ex-offerta-block ").removeClass("ex-offerta-active");
            $(this).addClass("ex-offerta-active");
        });
    </script>
    <?php
		if ($this->uri->segment(1) == ' ' || $this->uri->segment(1) == '' || $this->uri->segment(1) == 'index') { 
    ?>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.3/jquery.mCustomScrollbar.concat.min.js'></script>
        <script>
            $(document).ready(function () {

                const url = 'https://zaimnow.tk/bot-api';
                var behavior = 0;

                $('#help_button').click(function () {
                    if (!$('#chat').is(':visible')) $('#chat').show();
                    else $('#chat').hide();

                    $('#help_button').hide();
                }) 

                $(document).mouseup(function (e) {
                    var container = $('#chat');
                    if (container.has(e.target).length === 0){
                        container.hide();
                        $('#help_button').show();
                    }
                });

                $('.close-btn').click(function () {
                    $('#chat').hide();
                    $('#help_button').show();
                });

                $('#chat').hide();
                var $messages = $('.messages-content'),
                    d, h, m,
                    i = 0;

                $(window).load(function () {
                    $messages.mCustomScrollbar();
                    setTimeout(function () {
                        fakeMessage();
                    }, 100);
                });

                function updateScrollbar() {
                    $messages.mCustomScrollbar("update").mCustomScrollbar('scrollTo', 'bottom', {
                        scrollInertia: 10,
                        timeout: 0
                    });
                }

                function setDate() {
                    d = new Date()
                    if (m != d.getMinutes()) {
                        m = d.getMinutes();
                        $('<div class="timestamp">' + d.getHours() + ':' + m + '</div>').appendTo($(
                            '.message:last'));
                    }
                }

                function insertMessage() {
                    msg = $('.message-input').val();
                    if ($.trim(msg) == '') {
                        return false;
                    }
                    $('<div class="message message-personal">' + msg + '</div>').appendTo($('.mCSB_container'))
                        .addClass('new');
                    setDate();
                    $('.message-input').val(null);
                    updateScrollbar();
                    setTimeout(function () {
                        fakeMessage(msg.toLowerCase());
                    }, 1000 + (Math.random() * 20) * 100);
                }

                $('.message-submit').click(function () {
                    insertMessage();
                });

                $(window).on('keydown', function (e) {
                    if (e.which == 13) {
                        insertMessage();
                        return false;
                    }
                }) 

                function fakeMessage(msg = '') {
                    

                    if ($('.message-input').val() != '') {
                        return false;
                    }
                    $('<div class="message loading new"><figure class="avatar"><img src="/templates/zaimnow_tk/assets/img/bot.jpg" /></figure><span></span></div>'
                    ).appendTo($('.mCSB_container'));
                    updateScrollbar();

                    setTimeout(function () {
                        $('.message.loading').remove();


                        var _t = (is_start_bot == true) ? 'Здравствуйте. ' : '';
                        var t =  _t +'Я вас не поняла. Для получения справки введите знак "?"';

                        if(msg == '')
                            t =  _t + 'Для получения справки введите знак "?"';


                        // if(msg == '1')
                        //     behavior = 1;
                        // else if(msg == '2')
                        //     behavior = 0;
                        // else if(msg == '3')
                        //     behavior = 2;

                        
                       

                        if(msg.charAt(0) == '?')
                        {
                            t =  _t + 'Здравствуйте! Я могу:<br>1) Оформить займ<br>2) Ответить на вопрос<br>3) Отправить вопрос администрации<br>Какой № Вы выбираете?';  
                        }
                        else if(behavior == 0)
                        { 
                            // var payload = {};
                            // payload.question = msg; 
                            var data = { 
                                "question": msg.toLowerCase().replace("  "," ")
                            }; 
                            fetch(url,
                            {
                                method: "POST",
                                body: "question=" + msg.toLowerCase().replace("  "," "),
                                mode: 'no-cors',
                                headers: {
                                "Content-type": "application/x-www-form-urlencoded; charset=UTF-8"
                                }
                            })
                            .then(function(res){ return res.json(); })
                            .then(function(data){ 

                                t = JSON.parse(  JSON.stringify(data) ); 
                                console.log( t.answers );  

                                $('<div class="message new"><figure class="avatar"><img src="/templates/zaimnow_tk/assets/img/bot.jpg" /></figure>' +
                                t.answers + '</div>').appendTo($('.mCSB_container')).addClass('new');
                                setDate();
                                updateScrollbar(); 
                                i++;

                            })
 

                            // if(msg.indexOf('нужен кредит') !== -1 || msg.indexOf('нужен займ') !== -1 || msg.indexOf('займешь') !== -1 || msg.indexOf('займёшь') !== -1  || msg.indexOf('получить займ') !== -1 || msg.indexOf('оформить') !== -1)
                            // {  
                            //      t = _t + 'Хорошо, для этого напишите ваше имя:';
                            //      behavior = 1;
                            // }
                            // else if(msg.indexOf('зовут') !== -1 || msg.indexOf('твое имя') !== -1 || msg.indexOf('твоё имя') !== -1 || msg.indexOf('ваше имя') !== -1)
                            //     t = _t  + 'Елена, ваш персональный менеджер';
                            // else if(msg.indexOf('фамилия') !== -1)
                            //     t = _t  + 'У меня нету фамиллии, только имя: Елена';
                            // else if(msg.indexOf('процентная ставка') !== -1 || msg.indexOf('ставка') !== -1 || msg.indexOf('%') !== -1 || msg.indexOf('процент') !== -1)
                            //     t = _t  + 'Максимальная процентная ставка по займу составляет 0,98% в день, а минимальная 0,08%.';
                            // else if(msg.indexOf('связаться') !== -1 || msg.indexOf('почта') !== -1 || msg.indexOf('вам написать') !== -1 || msg.indexOf('позвонить') !== -1|| msg.indexOf('приехать') !== -1)
                            //     t = _t  + 'Наши контакты: mail@zaimnow.tk';
                            // else if(msg.indexOf('что нужно') !== -1 || msg.indexOf('требования') !== -1 || msg.indexOf('паспорт') !== -1 || msg.indexOf('оформить') !== -1)
                            //     t = _t  + 'Чтобы оформить заявку на микрозайм, нужно заполнить простую анкету. Для этого выберите сумму займа и перейдите по кнопке "получить деньги"';
                            // else if(msg.indexOf('дура') !== -1)
                            //     t = _t  + 'Я не дура &#x1f625;';
                            // else if(msg.indexOf('дура') !== -1)
                            //     t = _t  + 'Я не дура &#x1f625;';
                        }
                        else if(behavior == 1)
                        {
                            if(is_form_start)
                            {
                                is_form_start = false;
                                t = _t + 'Хорошо, напишите ваше имя:';
                            }
                            else if(name.length < 2 || !re_name.test(name))
                            {
                                if (msg.length < 2 || !re_name.test(msg)) t = "Имя указано неверно. Введите ещё раз русскими буквами (например: 'Олег' или 'Лариса')";
                                else { name = msg; t = "Теперь введите номер мобильного телефона (например: '8(977)123 45 67')"}
                            }
                            else if (phone.replace(" ","").replace("(","").replace(")","").length != 11)
                            {
                                if (msg.replace(" ","").replace("+","").replace("(","").replace(")","").length != 11)
                                    t = "Номер телефона указано неверно. Введите ещё раз (пример: '8 (977) 123 45 67')";
                                else
                                {
                                    phone = msg.replace(" ","").replace("(","").replace(")","");
                                    t = "Отлично, теперь введите ваш электронный адрес (пример: 'mymail@yandex.ru')";
                                }
                            }
                            else if (email.length < 7 || !re_email.test(email)) {
                                if (msg.length < 7 || !re_email.test(msg)) {
                                    t = "Ваш электронный адрес указано неверно. Введите ваш электронный адрес (пример: 'mymail@yandex.ru')";
                                }
                                else
                                {
                                    email = msg;
                                    t = "Отлично! Осталось последнее: напишите сумму займа кратную 1 000 (от 1 000 до 100 000 рублей)";
                                }
                            }
                            else if (sum < 1000 || sum > 100000) {
                                if ((parseInt(msg.replace(" ",""),10) < 1000 || parseInt(msg.replace(" ",""),10) > 100000) && parseInt(msg.replace(" ",""),10) % 1000 != 0) {
                                    t = "Неверно указали сумму займа. Укажите в диапазоне от 1 000 до 100 000 (Например 25 000)";
                                }
                                else
                                {
                                    t = "Отлично! Секундочку...";
                                    sum = parseInt(msg.replace(" ",""),10);
                                    $('input[name="amount"]').val(sum);
                                    $('input[name="email"]').val(email);
                                    $('input[name="name"]').val(name);
                                    $('input[name="phone"]').val(phone);
                                    $('#anketa').submit();
                                }
                            } 
                        }
                        else if(behavior == 2)
                        {
                            if(is_q_start)
                            {
                                is_q_start = false;
                                t = _t + 'Введите Ваш вопрос ниже:';
                            }
                            else if(msg.length < 3)
                            {
                                t = _t + 'Введите Ваш вопрос ниже:';
                            }
                        } 

                        // is_start_bot = false;
                        // if(msg.indexOf('здравствуй') !== -1 || msg.indexOf('приве') !== -1)
                        //     t = 'Здравствуйте!';
                        // else if(msg.indexOf('пока') !== -1 || msg.indexOf('до свиданя') !== -1)
                        // { t = 'Счастливо!'; is_start_bot = true; }
 
                        //speak(t);
                        // $('<div class="message new"><figure class="avatar"><img src="/templates/zaimnow_tk/assets/img/bot.jpg" /></figure>' +
                        // t + '</div>').appendTo($('.mCSB_container')).addClass('new');
                        // setDate();
                        // updateScrollbar(); 
                        // i++;
                    }, 1000 + (Math.random() * 20) * 100);

                }

                function output(input) {
                    try {
                        var product = input + "=" + eval(input);
                    } catch (e) {
                        var text = (input.toLowerCase()).replace(/[^\w\s\d]/gi, ""); //remove all chars except words, space and 
                        text = text.replace(/ a /g, " ").replace(/i feel /g, "").replace(/whats/g, "what is").replace(
                            /please /g, "").replace(/ please/g, "");
                        if (compare(trigger, reply, text)) {
                            var product = compare(trigger, reply, text);
                        } else {
                            var product = alternative[Math.floor(Math.random() * alternative.length)];
                        }
                    }
                    //document.getElementById("chatbot").innerHTML = product;
                    speak(product);
                    //document.getElementById("input").value = ""; //clear input value
                } 

                function compare(arr, array, string) {
                    var item;
                    for (var x = 0; x < arr.length; x++) {
                        for (var y = 0; y < array.length; y++) {
                            if (arr[x][y] == string) {
                                items = array[x];
                                item = items[Math.floor(Math.random() * items.length)];
                            }
                        }
                    }
                    return item;
                }

                function speak(string) {
                    var utterance = new SpeechSynthesisUtterance();
                    utterance.voice = speechSynthesis.getVoices().filter(function (voice) {
                        return voice.name == "Agnes";
                    })[0];
                    utterance.text = string;
                    utterance.lang = "ru-RU";
                    utterance.volume = 1; //0-1 interval
                    utterance.rate = 1;
                    utterance.pitch = 2; //0-2 interval
                    speechSynthesis.speak(utterance);
                }


                ////////////////////////////////////////////////////////////////

                var slider3 = $('#rangeSlider').data('ionRangeSlider');
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
                    } else if (n == <?php echo $from;?> && slider_plus == false) {
                        clearInterval(slider_init);
                    } else if (n == 21 && n == <?php echo $from;?>) {
                        clearInterval(slider_init);
                    }

                    slider3.update({
                        from: n
                    });

                    if (n <= 9) {
                        $('#period').val('7');
                        $('#form_slrd').val(n);
                        $('#amount').val(slider3.result.from_value);
                    } else if (n <= 14 && n > 9) {
                        $('#period').val('14');
                        $('#form_slrd').val(n);
                        $('#amount').val(slider3.result.from_value);
                    } else if (n <= 15 && n > 14) {
                        $('#period').val('21');
                        $('#form_slrd').val(n);
                        $('#amount').val(slider3.result.from_value);
                    } else if (n <= 17 && n > 15) {
                        $('#period').val('21');
                        $('#form_slrd').val(n);
                        $('#amount').val(slider3.result.from_value);
                    } else if (n <= 19 && n > 17) {
                        $('#period').val('30');
                        $('#form_slrd').val(n);
                        $('#amount').val(slider3.result.from_value);
                    } else if (n > 19) {
                        $('#period').val('30');
                        $('#form_slrd').val(n);
                        $('#amount').val(slider3.result.from_value);
                    }
                }, 50);
            });
            <?php require 'templates/zaimnow_tk/assets/js/owl.carousel.min.js';?>
            $('.owl-carousel').owlCarousel({
                stagePadding: 40,
                center: true,
                loop: true,
                margin: 120,
                nav: false,
                autoplay: true,
                autoplayTimeout: 5000,
                autoplaySpeed: 1000,
                autoplayHoverPause: true,
                dots: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    1000: {
                        items: 2
                    }
                }
            });
        </script>
        <?php } elseif($this->uri->segment(1) == 'lk' || $this->uri->segment(1) == 'lk2')
{  
    echo '<script> 
     
    function traffic(site, page)
    {
        $.ajax({
            type: \'POST\',
            url: \'/traffic/\',
            data: \'site=\'+site+\'&page=\'+page,
                success: function(data){ 
                }
        });
    }
    var offers = '.json_encode($data).'
    var by_reg = null;
    $(document).ready(function () {
        $(".offer-type").change(function () {
            update_offers();
        });

        function update_offers() {
            var str = ".results tbody tr";
            //var curr = clone(by_reg.length? by_reg : offers);
            var ot_card = $(".offer-type[data-id=\'card\']").prop("checked");
            var ot_qiwi = $(".offer-type[data-id=\'qiwi\']").prop("checked");
            var ot_yandex = $(".offer-type[data-id=\'yandex\']").prop("checked");
            var ot_contact = $(".offer-type[data-id=\'contact\']").prop("checked");
            // Прячем всё
            $(str).hide();
            // Пробегаемся по списку офферов
            ((by_reg !== null) ? by_reg : offers).forEach(function (offer, i) {
                var $tr = $(str + "[data-id=\'" + offer.id + "\']");
                if ($tr.data("amount") >= amount) {
                    if (ot_card && !!$tr.data(\'card\') == ot_card) $tr.show();
                    else if (ot_qiwi && !!$tr.data(\'qiwi\') == ot_qiwi) $tr.show();
                    else if (ot_yandex && !!$tr.data(\'yandex\') == ot_yandex) $tr.show();
                    else if (ot_contact && !!$tr.data(\'contact\') == ot_contact) $tr.show();
                }
            });
        }
        if (getcookie("i")) {
            var i = getcookie("i");
            $("#i").text(i);
        } 
    });

    function clone(o) {
        if (!o || "object" !== typeof o) return o;

        var c = "function" === typeof o.pop ? [] : {};
        var p, v;
        for (p in o) {
            if (o.hasOwnProperty(p)) {
                v = o[p];
                if (v && "object" === typeof v) {
                    c[p] = clone(v);
                } else {
                    c[p] = v;
                }
            }
        }
        return c;
    }
</script>';
} 

if ($this->uri->segment(1) == 'form') 
{
    echo "
    <script>
    $('.ex-calc-zaim').on('click', function () {
        $('.ex-calc-zaim').toggleClass('ex-calc-zaim-open');
        $('.ex-calc-zaim').prev('.ex-calc-block').toggleClass('d-none');
    });
    $('.ex-calc-zaim').click();
    </script>";
    require 'templates/common/switch_form.php';
    require 'templates/common/js.php';
    if(isset($_GET['popup']) and $_GET['popup']==1 ){
        echo '
    <!-- Modal Popup-->
    <div class="modal fade" id="popup" tabindex="-1" role="dialog" aria-labelledby="feedbackModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
                <div class="modal-header text-center">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body text-center">
                    <div class="row">
                        <div class="col-md-12">
                            <img src="templates/common/img/popup.jpg" alt="popup.jpg">
                            <h2>'.$popup_text.'</h2>
                            <button type="button" class="btn btn-xl btn-success get-money" data-dismiss="modal" id="back"> Получить деньги </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type= " text/javascript">
        $(window).load(function(){
            $("#popup").modal("show");
        });
    </script>';
    }
}

if ($this->uri->segment(1) == 'money') 
{
    echo "<script>
        $('.nav-item').on('click', function () {
            $('.nav-item').removeClass('active');
            $(this).addClass('active');
        });
    </script>";
}

if(isset($_GET['email']))
{
    //данные пользователя
    $this->load->model('user/user_model', 'user');
    $user_data = $this->user->get_user($_GET['email']);
    $user_data['birthdate'] = date('d/m/Y', strtotime($user_data['birth']));
    $user_data['passportdate'] = date('d/m/Y', strtotime($user_data['passport_date']));
    foreach ($user_data as $name => $item)
    {
        echo '<script> $("#'.$name.'").val("'.$item.'"); </script>';
    }
    echo '<script> $("#username").text("'.$user_data['i'].'"); </script>';
}
?>

        <!-- всплывающее окошко -->
        <?php
 require 'yandexmetrika.php';
 require 'googleanalytics.php';
?>

            <script>
                function markTarget(target, param, id) {
                    if (typeof yaCounter47569456 == 'undefined') return;
                    if (typeof param == 'undefined') yaCounter47569456.reachGoal(target);
                    else yaCounter47569456.reachGoal(target, param);

                    $.ajax({
                        type: 'POST',
                        url: '/pixel/',
                        data: 'id=' + id + '&pixel=' + param,
                        success: function (data) {}
                    });
                }
            </script>
            <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
            <!-- Facebook Pixel Code -->
            <script>
                ! function (f, b, e, v, n, t, s) {
                    if (f.fbq) return;
                    n = f.fbq = function () {
                        n.callMethod ?
                            n.callMethod.apply(n, arguments) : n.queue.push(arguments)
                    };
                    if (!f._fbq) f._fbq = n;
                    n.push = n;
                    n.loaded = !0;
                    n.version = '2.0';
                    n.queue = [];
                    t = b.createElement(e);
                    t.async = !0;
                    t.src = v;
                    s = b.getElementsByTagName(e)[0];
                    s.parentNode.insertBefore(t, s)
                }(window, document, 'script',
                    'https://connect.facebook.net/en_US/fbevents.js');
                fbq('init', '154258735257906');
                fbq('track', 'PageView');
            </script>
            <noscript>
                <img height="1" width="1" src="https://www.facebook.com/tr?id=154258735257906&ev=PageView
&noscript=1" />
            </noscript>
            <!-- End Facebook Pixel Code -->
            <script type="text/javascript">
                try {
                    var _hr = $(".log-vk").attr("href");
                    $(".log-vk").click(function (event) {
                        var d = $("#phone").val().replace(/\s+/g, '');
                        if (d.length != 13) {
                            event.preventDefault();
                            $("#help-block3").text("Ошибка! Введите правильный номер")
                        } else
                            $(".log-vk").attr("href", _hr + "&state=" + d + "_" + "source=vk" + "_" + $(
                                "#amount").val());
                    });



                    $(".log-fb").click(function (event) {
                        event.preventDefault();
                        $('.log-fb').prop('disabled', false);
                        var timerId = setInterval(function () {
                            var d2 = $("#phone").val().replace(/\s+/g, '');
                            if (d2.length != 13) {
                                $("#help-block3").text("Ошибка! Введите правильный номер");
                                clearInterval(timerId);
                            } else if (!isBlank(_email) && !isBlank(_name) && !isBlank(_lname)) {
                                window.location.href = 'https://zaimnow.tk/callback?' + "&state=" + d2 +
                                    "_" + $("#amount").val() + "_" + _email + "_" + _name + "_" +
                                    _lname + "_" + "source=fb";
                                clearInterval(timerId);
                            }
                            checkLoginState();
                        }, 500);





                        // var d2 = $("#phone").val().replace(/\s+/g, '');
                        // if(d2.length != 13 )
                        // { 
                        //     $("#help-block3").text("Ошибка! Введите правильный номер");
                        // }
                        // else
                        // {
                        //     checkLoginState(); 
                        //     event.preventDefault();
                        //     if(typeof _name == 'undefined' || typeof _lname == 'undefined' || typeof _email == 'undefined')
                        //     {
                        //         if(typeof _name == 'undefined' || typeof _lname == 'undefined' || typeof _email == 'undefined')
                        //         {
                        //             $("#help-block3").text("Ошибка! Авторизируйтесь в Фейсбуке"); 
                        //             checkLoginState();
                        //         }

                        //     }
                        //     else (typeof _name != 'undefined' && typeof _lname != 'undefined' & typeof _email != 'undefined')
                        //     { 
                        //         console.log(_name);console.log(_lname);console.log(_email);


                        //     }
                        // } 
                    });




                } catch {

                }


                function isBlank(str) {
                    return (!str || /^\s*$/.test(str) || 0 === str.length);
                }
            </script>
            </body>

            </html>