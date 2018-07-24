<?php $from = '15';

    if($this->uri->segment(1) != 'form')
    {
        echo '<a href="#0" class="cd-top">Наверх</a>';
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
        !function(e,t,r){"use strict";"function"==typeof window.define&&window.define.amd?window.define(r):"undefined"!=typeof module&&module.exports?module.exports=r():t.exports?t.exports=r():t.Fingerprint2=r()}(0,this,function(){"use strict";var t=function(e){if(!(this instanceof t))return new t(e);this.options=this.extend(e,{swfContainerId:"fingerprintjs2",swfPath:"flash/compiled/FontList.swf",detectScreenOrientation:!0,sortPluginsFor:[/palemoon/i],userDefinedFonts:[],excludeDoNotTrack:!0,excludePixelRatio:!0}),this.nativeForEach=Array.prototype.forEach,this.nativeMap=Array.prototype.map};return t.prototype={extend:function(e,t){if(null==e)return t;for(var r in e)null!=e[r]&&t[r]!==e[r]&&(t[r]=e[r]);return t},get:function(n){var i=this,r={data:[],addPreprocessedComponent:function(e){var t=e.value;"function"==typeof i.options.preprocessor&&(t=i.options.preprocessor(e.key,t)),r.data.push({key:e.key,value:t})}};r=this.userAgentKey(r),r=this.languageKey(r),r=this.colorDepthKey(r),r=this.deviceMemoryKey(r),r=this.pixelRatioKey(r),r=this.hardwareConcurrencyKey(r),r=this.screenResolutionKey(r),r=this.availableScreenResolutionKey(r),r=this.timezoneOffsetKey(r),r=this.sessionStorageKey(r),r=this.localStorageKey(r),r=this.indexedDbKey(r),r=this.addBehaviorKey(r),r=this.openDatabaseKey(r),r=this.cpuClassKey(r),r=this.platformKey(r),r=this.doNotTrackKey(r),r=this.pluginsKey(r),r=this.canvasKey(r),r=this.webglKey(r),r=this.webglVendorAndRendererKey(r),r=this.adBlockKey(r),r=this.hasLiedLanguagesKey(r),r=this.hasLiedResolutionKey(r),r=this.hasLiedOsKey(r),r=this.hasLiedBrowserKey(r),r=this.touchSupportKey(r),r=this.customEntropyFunction(r),this.fontsKey(r,function(e){var r=[];i.each(e.data,function(e){var t=e.value;t&&"function"==typeof t.join&&(t=t.join(";")),r.push(t)});var t=i.x64hash128(r.join("~~~"),31);return n(t,e.data)})},customEntropyFunction:function(e){return"function"==typeof this.options.customFunction&&e.addPreprocessedComponent({key:"custom",value:this.options.customFunction()}),e},userAgentKey:function(e){return this.options.excludeUserAgent||e.addPreprocessedComponent({key:"user_agent",value:this.getUserAgent()}),e},getUserAgent:function(){return navigator.userAgent},languageKey:function(e){return this.options.excludeLanguage||e.addPreprocessedComponent({key:"language",value:navigator.language||navigator.userLanguage||navigator.browserLanguage||navigator.systemLanguage||""}),e},colorDepthKey:function(e){return this.options.excludeColorDepth||e.addPreprocessedComponent({key:"color_depth",value:window.screen.colorDepth||-1}),e},deviceMemoryKey:function(e){return this.options.excludeDeviceMemory||e.addPreprocessedComponent({key:"device_memory",value:this.getDeviceMemory()}),e},getDeviceMemory:function(){return navigator.deviceMemory||-1},pixelRatioKey:function(e){return this.options.excludePixelRatio||e.addPreprocessedComponent({key:"pixel_ratio",value:this.getPixelRatio()}),e},getPixelRatio:function(){return window.devicePixelRatio||""},screenResolutionKey:function(e){return this.options.excludeScreenResolution?e:this.getScreenResolution(e)},getScreenResolution:function(e){var t;return t=this.options.detectScreenOrientation&&window.screen.height>window.screen.width?[window.screen.height,window.screen.width]:[window.screen.width,window.screen.height],e.addPreprocessedComponent({key:"resolution",value:t}),e},availableScreenResolutionKey:function(e){return this.options.excludeAvailableScreenResolution?e:this.getAvailableScreenResolution(e)},getAvailableScreenResolution:function(e){var t;return window.screen.availWidth&&window.screen.availHeight&&(t=this.options.detectScreenOrientation?window.screen.availHeight>window.screen.availWidth?[window.screen.availHeight,window.screen.availWidth]:[window.screen.availWidth,window.screen.availHeight]:[window.screen.availHeight,window.screen.availWidth]),void 0!==t&&e.addPreprocessedComponent({key:"available_resolution",value:t}),e},timezoneOffsetKey:function(e){return this.options.excludeTimezoneOffset||e.addPreprocessedComponent({key:"timezone_offset",value:(new Date).getTimezoneOffset()}),e},sessionStorageKey:function(e){return!this.options.excludeSessionStorage&&this.hasSessionStorage()&&e.addPreprocessedComponent({key:"session_storage",value:1}),e},localStorageKey:function(e){return!this.options.excludeSessionStorage&&this.hasLocalStorage()&&e.addPreprocessedComponent({key:"local_storage",value:1}),e},indexedDbKey:function(e){return!this.options.excludeIndexedDB&&this.hasIndexedDB()&&e.addPreprocessedComponent({key:"indexed_db",value:1}),e},addBehaviorKey:function(e){return!this.options.excludeAddBehavior&&document.body&&document.body.addBehavior&&e.addPreprocessedComponent({key:"add_behavior",value:1}),e},openDatabaseKey:function(e){return!this.options.excludeOpenDatabase&&window.openDatabase&&e.addPreprocessedComponent({key:"open_database",value:1}),e},cpuClassKey:function(e){return this.options.excludeCpuClass||e.addPreprocessedComponent({key:"cpu_class",value:this.getNavigatorCpuClass()}),e},platformKey:function(e){return this.options.excludePlatform||e.addPreprocessedComponent({key:"navigator_platform",value:this.getNavigatorPlatform()}),e},doNotTrackKey:function(e){return this.options.excludeDoNotTrack||e.addPreprocessedComponent({key:"do_not_track",value:this.getDoNotTrack()}),e},canvasKey:function(e){return!this.options.excludeCanvas&&this.isCanvasSupported()&&e.addPreprocessedComponent({key:"canvas",value:this.getCanvasFp()}),e},webglKey:function(e){return!this.options.excludeWebGL&&this.isWebGlSupported()&&e.addPreprocessedComponent({key:"webgl",value:this.getWebglFp()}),e},webglVendorAndRendererKey:function(e){return!this.options.excludeWebGLVendorAndRenderer&&this.isWebGlSupported()&&e.addPreprocessedComponent({key:"webgl_vendor",value:this.getWebglVendorAndRenderer()}),e},adBlockKey:function(e){return this.options.excludeAdBlock||e.addPreprocessedComponent({key:"adblock",value:this.getAdBlock()}),e},hasLiedLanguagesKey:function(e){return this.options.excludeHasLiedLanguages||e.addPreprocessedComponent({key:"has_lied_languages",value:this.getHasLiedLanguages()}),e},hasLiedResolutionKey:function(e){return this.options.excludeHasLiedResolution||e.addPreprocessedComponent({key:"has_lied_resolution",value:this.getHasLiedResolution()}),e},hasLiedOsKey:function(e){return this.options.excludeHasLiedOs||e.addPreprocessedComponent({key:"has_lied_os",value:this.getHasLiedOs()}),e},hasLiedBrowserKey:function(e){return this.options.excludeHasLiedBrowser||e.addPreprocessedComponent({key:"has_lied_browser",value:this.getHasLiedBrowser()}),e},fontsKey:function(e,t){return this.options.excludeJsFonts?this.flashFontsKey(e,t):this.jsFontsKey(e,t)},flashFontsKey:function(t,r){return this.options.excludeFlashFonts?r(t):this.hasSwfObjectLoaded()&&this.hasMinFlashInstalled()?void 0===this.options.swfPath?r(t):void this.loadSwfAndDetectFonts(function(e){t.addPreprocessedComponent({key:"swf_fonts",value:e.join(";")}),r(t)}):r(t)},jsFontsKey:function(f,S){var T=this;return setTimeout(function(){var h=["monospace","sans-serif","serif"],c=["Andale Mono","Arial","Arial Black","Arial Hebrew","Arial MT","Arial Narrow","Arial Rounded MT Bold","Arial Unicode MS","Bitstream Vera Sans Mono","Book Antiqua","Bookman Old Style","Calibri","Cambria","Cambria Math","Century","Century Gothic","Century Schoolbook","Comic Sans","Comic Sans MS","Consolas","Courier","Courier New","Geneva","Georgia","Helvetica","Helvetica Neue","Impact","Lucida Bright","Lucida Calligraphy","Lucida Console","Lucida Fax","LUCIDA GRANDE","Lucida Handwriting","Lucida Sans","Lucida Sans Typewriter","Lucida Sans Unicode","Microsoft Sans Serif","Monaco","Monotype Corsiva","MS Gothic","MS Outlook","MS PGothic","MS Reference Sans Serif","MS Sans Serif","MS Serif","MYRIAD","MYRIAD PRO","Palatino","Palatino Linotype","Segoe Print","Segoe Script","Segoe UI","Segoe UI Light","Segoe UI Semibold","Segoe UI Symbol","Tahoma","Times","Times New Roman","Times New Roman PS","Trebuchet MS","Verdana","Wingdings","Wingdings 2","Wingdings 3"];T.options.extendedJsFonts&&(c=c.concat(["Abadi MT Condensed Light","Academy Engraved LET","ADOBE CASLON PRO","Adobe Garamond","ADOBE GARAMOND PRO","Agency FB","Aharoni","Albertus Extra Bold","Albertus Medium","Algerian","Amazone BT","American Typewriter","American Typewriter Condensed","AmerType Md BT","Andalus","Angsana New","AngsanaUPC","Antique Olive","Aparajita","Apple Chancery","Apple Color Emoji","Apple SD Gothic Neo","Arabic Typesetting","ARCHER","ARNO PRO","Arrus BT","Aurora Cn BT","AvantGarde Bk BT","AvantGarde Md BT","AVENIR","Ayuthaya","Bandy","Bangla Sangam MN","Bank Gothic","BankGothic Md BT","Baskerville","Baskerville Old Face","Batang","BatangChe","Bauer Bodoni","Bauhaus 93","Bazooka","Bell MT","Bembo","Benguiat Bk BT","Berlin Sans FB","Berlin Sans FB Demi","Bernard MT Condensed","BernhardFashion BT","BernhardMod BT","Big Caslon","BinnerD","Blackadder ITC","BlairMdITC TT","Bodoni 72","Bodoni 72 Oldstyle","Bodoni 72 Smallcaps","Bodoni MT","Bodoni MT Black","Bodoni MT Condensed","Bodoni MT Poster Compressed","Bookshelf Symbol 7","Boulder","Bradley Hand","Bradley Hand ITC","Bremen Bd BT","Britannic Bold","Broadway","Browallia New","BrowalliaUPC","Brush Script MT","Californian FB","Calisto MT","Calligrapher","Candara","CaslonOpnface BT","Castellar","Centaur","Cezanne","CG Omega","CG Times","Chalkboard","Chalkboard SE","Chalkduster","Charlesworth","Charter Bd BT","Charter BT","Chaucer","ChelthmITC Bk BT","Chiller","Clarendon","Clarendon Condensed","CloisterBlack BT","Cochin","Colonna MT","Constantia","Cooper Black","Copperplate","Copperplate Gothic","Copperplate Gothic Bold","Copperplate Gothic Light","CopperplGoth Bd BT","Corbel","Cordia New","CordiaUPC","Cornerstone","Coronet","Cuckoo","Curlz MT","DaunPenh","Dauphin","David","DB LCD Temp","DELICIOUS","Denmark","DFKai-SB","Didot","DilleniaUPC","DIN","DokChampa","Dotum","DotumChe","Ebrima","Edwardian Script ITC","Elephant","English 111 Vivace BT","Engravers MT","EngraversGothic BT","Eras Bold ITC","Eras Demi ITC","Eras Light ITC","Eras Medium ITC","EucrosiaUPC","Euphemia","Euphemia UCAS","EUROSTILE","Exotc350 Bd BT","FangSong","Felix Titling","Fixedsys","FONTIN","Footlight MT Light","Forte","FrankRuehl","Fransiscan","Freefrm721 Blk BT","FreesiaUPC","Freestyle Script","French Script MT","FrnkGothITC Bk BT","Fruitger","FRUTIGER","Futura","Futura Bk BT","Futura Lt BT","Futura Md BT","Futura ZBlk BT","FuturaBlack BT","Gabriola","Galliard BT","Gautami","Geeza Pro","Geometr231 BT","Geometr231 Hv BT","Geometr231 Lt BT","GeoSlab 703 Lt BT","GeoSlab 703 XBd BT","Gigi","Gill Sans","Gill Sans MT","Gill Sans MT Condensed","Gill Sans MT Ext Condensed Bold","Gill Sans Ultra Bold","Gill Sans Ultra Bold Condensed","Gisha","Gloucester MT Extra Condensed","GOTHAM","GOTHAM BOLD","Goudy Old Style","Goudy Stout","GoudyHandtooled BT","GoudyOLSt BT","Gujarati Sangam MN","Gulim","GulimChe","Gungsuh","GungsuhChe","Gurmukhi MN","Haettenschweiler","Harlow Solid Italic","Harrington","Heather","Heiti SC","Heiti TC","HELV","Herald","High Tower Text","Hiragino Kaku Gothic ProN","Hiragino Mincho ProN","Hoefler Text","Humanst 521 Cn BT","Humanst521 BT","Humanst521 Lt BT","Imprint MT Shadow","Incised901 Bd BT","Incised901 BT","Incised901 Lt BT","INCONSOLATA","Informal Roman","Informal011 BT","INTERSTATE","IrisUPC","Iskoola Pota","JasmineUPC","Jazz LET","Jenson","Jester","Jokerman","Juice ITC","Kabel Bk BT","Kabel Ult BT","Kailasa","KaiTi","Kalinga","Kannada Sangam MN","Kartika","Kaufmann Bd BT","Kaufmann BT","Khmer UI","KodchiangUPC","Kokila","Korinna BT","Kristen ITC","Krungthep","Kunstler Script","Lao UI","Latha","Leelawadee","Letter Gothic","Levenim MT","LilyUPC","Lithograph","Lithograph Light","Long Island","Lydian BT","Magneto","Maiandra GD","Malayalam Sangam MN","Malgun Gothic","Mangal","Marigold","Marion","Marker Felt","Market","Marlett","Matisse ITC","Matura MT Script Capitals","Meiryo","Meiryo UI","Microsoft Himalaya","Microsoft JhengHei","Microsoft New Tai Lue","Microsoft PhagsPa","Microsoft Tai Le","Microsoft Uighur","Microsoft YaHei","Microsoft Yi Baiti","MingLiU","MingLiU_HKSCS","MingLiU_HKSCS-ExtB","MingLiU-ExtB","Minion","Minion Pro","Miriam","Miriam Fixed","Mistral","Modern","Modern No. 20","Mona Lisa Solid ITC TT","Mongolian Baiti","MONO","MoolBoran","Mrs Eaves","MS LineDraw","MS Mincho","MS PMincho","MS Reference Specialty","MS UI Gothic","MT Extra","MUSEO","MV Boli","Nadeem","Narkisim","NEVIS","News Gothic","News GothicMT","NewsGoth BT","Niagara Engraved","Niagara Solid","Noteworthy","NSimSun","Nyala","OCR A Extended","Old Century","Old English Text MT","Onyx","Onyx BT","OPTIMA","Oriya Sangam MN","OSAKA","OzHandicraft BT","Palace Script MT","Papyrus","Parchment","Party LET","Pegasus","Perpetua","Perpetua Titling MT","PetitaBold","Pickwick","Plantagenet Cherokee","Playbill","PMingLiU","PMingLiU-ExtB","Poor Richard","Poster","PosterBodoni BT","PRINCETOWN LET","Pristina","PTBarnum BT","Pythagoras","Raavi","Rage Italic","Ravie","Ribbon131 Bd BT","Rockwell","Rockwell Condensed","Rockwell Extra Bold","Rod","Roman","Sakkal Majalla","Santa Fe LET","Savoye LET","Sceptre","Script","Script MT Bold","SCRIPTINA","Serifa","Serifa BT","Serifa Th BT","ShelleyVolante BT","Sherwood","Shonar Bangla","Showcard Gothic","Shruti","Signboard","SILKSCREEN","SimHei","Simplified Arabic","Simplified Arabic Fixed","SimSun","SimSun-ExtB","Sinhala Sangam MN","Sketch Rockwell","Skia","Small Fonts","Snap ITC","Snell Roundhand","Socket","Souvenir Lt BT","Staccato222 BT","Steamer","Stencil","Storybook","Styllo","Subway","Swis721 BlkEx BT","Swiss911 XCm BT","Sylfaen","Synchro LET","System","Tamil Sangam MN","Technical","Teletype","Telugu Sangam MN","Tempus Sans ITC","Terminal","Thonburi","Traditional Arabic","Trajan","TRAJAN PRO","Tristan","Tubular","Tunga","Tw Cen MT","Tw Cen MT Condensed","Tw Cen MT Condensed Extra Bold","TypoUpright BT","Unicorn","Univers","Univers CE 55 Medium","Univers Condensed","Utsaah","Vagabond","Vani","Vijaya","Viner Hand ITC","VisualUI","Vivaldi","Vladimir Script","Vrinda","Westminster","WHITNEY","Wide Latin","ZapfEllipt BT","ZapfHumnst BT","ZapfHumnst Dm BT","Zapfino","Zurich BlkEx BT","Zurich Ex BT","ZWAdobeF"])),c=(c=c.concat(T.options.userDefinedFonts)).filter(function(e,t){return c.indexOf(e)===t});var e=document.getElementsByTagName("body")[0],i=document.createElement("div"),u=document.createElement("div"),n={},a={},g=function(){var e=document.createElement("span");return e.style.position="absolute",e.style.left="-9999px",e.style.fontSize="72px",e.style.fontStyle="normal",e.style.fontWeight="normal",e.style.letterSpacing="normal",e.style.lineBreak="auto",e.style.lineHeight="normal",e.style.textTransform="none",e.style.textAlign="left",e.style.textDecoration="none",e.style.textShadow="none",e.style.whiteSpace="normal",e.style.wordBreak="normal",e.style.wordSpacing="normal",e.innerHTML="mmmmmmmmmmlli",e},t=function(e){for(var t=!1,r=0;r<h.length;r++)if(t=e[r].offsetWidth!==n[h[r]]||e[r].offsetHeight!==a[h[r]])return t;return t},r=function(){for(var e=[],t=0,r=h.length;t<r;t++){var n=g();n.style.fontFamily=h[t],i.appendChild(n),e.push(n)}return e}();e.appendChild(i);for(var o=0,s=h.length;o<s;o++)n[h[o]]=r[o].offsetWidth,a[h[o]]=r[o].offsetHeight;var l=function(){for(var e,t,r,n={},i=0,a=c.length;i<a;i++){for(var o=[],s=0,l=h.length;s<l;s++){var d=(e=c[i],t=h[s],r=void 0,(r=g()).style.fontFamily="'"+e+"',"+t,r);u.appendChild(d),o.push(d)}n[c[i]]=o}return n}();e.appendChild(u);for(var d=[],p=0,m=c.length;p<m;p++)t(l[c[p]])&&d.push(c[p]);e.removeChild(u),e.removeChild(i),f.addPreprocessedComponent({key:"js_fonts",value:d}),S(f)},1)},pluginsKey:function(e){return this.options.excludePlugins||(this.isIE()?this.options.excludeIEPlugins||e.addPreprocessedComponent({key:"ie_plugins",value:this.getIEPlugins()}):e.addPreprocessedComponent({key:"regular_plugins",value:this.getRegularPlugins()})),e},getRegularPlugins:function(){var e=[];if(navigator.plugins)for(var t=0,r=navigator.plugins.length;t<r;t++)navigator.plugins[t]&&e.push(navigator.plugins[t]);return this.pluginsShouldBeSorted()&&(e=e.sort(function(e,t){return e.name>t.name?1:e.name<t.name?-1:0})),this.map(e,function(e){var t=this.map(e,function(e){return[e.type,e.suffixes].join("~")}).join(",");return[e.name,e.description,t].join("::")},this)},getIEPlugins:function(){var e=[];if(Object.getOwnPropertyDescriptor&&Object.getOwnPropertyDescriptor(window,"ActiveXObject")||"ActiveXObject"in window){e=this.map(["AcroPDF.PDF","Adodb.Stream","AgControl.AgControl","DevalVRXCtrl.DevalVRXCtrl.1","MacromediaFlashPaper.MacromediaFlashPaper","Msxml2.DOMDocument","Msxml2.XMLHTTP","PDF.PdfCtrl","QuickTime.QuickTime","QuickTimeCheckObject.QuickTimeCheck.1","RealPlayer","RealPlayer.RealPlayer(tm) ActiveX Control (32-bit)","RealVideo.RealVideo(tm) ActiveX Control (32-bit)","Scripting.Dictionary","SWCtl.SWCtl","Shell.UIHelper","ShockwaveFlash.ShockwaveFlash","Skype.Detection","TDCCtl.TDCCtl","WMPlayer.OCX","rmocx.RealPlayer G2 Control","rmocx.RealPlayer G2 Control.1"],function(e){try{return new window.ActiveXObject(e),e}catch(e){return null}})}return navigator.plugins&&(e=e.concat(this.getRegularPlugins())),e},pluginsShouldBeSorted:function(){for(var e=!1,t=0,r=this.options.sortPluginsFor.length;t<r;t++){var n=this.options.sortPluginsFor[t];if(navigator.userAgent.match(n)){e=!0;break}}return e},touchSupportKey:function(e){return this.options.excludeTouchSupport||e.addPreprocessedComponent({key:"touch_support",value:this.getTouchSupport()}),e},hardwareConcurrencyKey:function(e){return this.options.excludeHardwareConcurrency||e.addPreprocessedComponent({key:"hardware_concurrency",value:this.getHardwareConcurrency()}),e},hasSessionStorage:function(){try{return!!window.sessionStorage}catch(e){return!0}},hasLocalStorage:function(){try{return!!window.localStorage}catch(e){return!0}},hasIndexedDB:function(){try{return!!window.indexedDB}catch(e){return!0}},getHardwareConcurrency:function(){return navigator.hardwareConcurrency?navigator.hardwareConcurrency:"unknown"},getNavigatorCpuClass:function(){return navigator.cpuClass?navigator.cpuClass:"unknown"},getNavigatorPlatform:function(){return navigator.platform?navigator.platform:"unknown"},getDoNotTrack:function(){return navigator.doNotTrack?navigator.doNotTrack:navigator.msDoNotTrack?navigator.msDoNotTrack:window.doNotTrack?window.doNotTrack:"unknown"},getTouchSupport:function(){var e=0,t=!1;void 0!==navigator.maxTouchPoints?e=navigator.maxTouchPoints:void 0!==navigator.msMaxTouchPoints&&(e=navigator.msMaxTouchPoints);try{document.createEvent("TouchEvent"),t=!0}catch(e){}return[e,t,"ontouchstart"in window]},getCanvasFp:function(){var e=[],t=document.createElement("canvas");t.width=2e3,t.height=200,t.style.display="inline";var r=t.getContext("2d");return r.rect(0,0,10,10),r.rect(2,2,6,6),e.push("canvas winding:"+(!1===r.isPointInPath(5,5,"evenodd")?"yes":"no")),r.textBaseline="alphabetic",r.fillStyle="#f60",r.fillRect(125,1,62,20),r.fillStyle="#069",this.options.dontUseFakeFontInCanvas?r.font="11pt Arial":r.font="11pt no-real-font-123",r.fillText("Cwm fjordbank glyphs vext quiz, рџѓ",2,15),r.fillStyle="rgba(102, 204, 0, 0.2)",r.font="18pt Arial",r.fillText("Cwm fjordbank glyphs vext quiz, рџѓ",4,45),r.globalCompositeOperation="multiply",r.fillStyle="rgb(255,0,255)",r.beginPath(),r.arc(50,50,50,0,2*Math.PI,!0),r.closePath(),r.fill(),r.fillStyle="rgb(0,255,255)",r.beginPath(),r.arc(100,50,50,0,2*Math.PI,!0),r.closePath(),r.fill(),r.fillStyle="rgb(255,255,0)",r.beginPath(),r.arc(75,100,50,0,2*Math.PI,!0),r.closePath(),r.fill(),r.fillStyle="rgb(255,0,255)",r.arc(75,75,75,0,2*Math.PI,!0),r.arc(75,75,25,0,2*Math.PI,!0),r.fill("evenodd"),t.toDataURL&&e.push("canvas fp:"+t.toDataURL()),e.join("~")},getWebglFp:function(){var t,e=function(e){return t.clearColor(0,0,0,1),t.enable(t.DEPTH_TEST),t.depthFunc(t.LEQUAL),t.clear(t.COLOR_BUFFER_BIT|t.DEPTH_BUFFER_BIT),"["+e[0]+", "+e[1]+"]"};if(!(t=this.getWebglCanvas()))return null;var r=[],n=t.createBuffer();t.bindBuffer(t.ARRAY_BUFFER,n);var i=new Float32Array([-.2,-.9,0,.4,-.26,0,0,.732134444,0]);t.bufferData(t.ARRAY_BUFFER,i,t.STATIC_DRAW),n.itemSize=3,n.numItems=3;var a=t.createProgram(),o=t.createShader(t.VERTEX_SHADER);t.shaderSource(o,"attribute vec2 attrVertex;varying vec2 varyinTexCoordinate;uniform vec2 uniformOffset;void main(){varyinTexCoordinate=attrVertex+uniformOffset;gl_Position=vec4(attrVertex,0,1);}"),t.compileShader(o);var s=t.createShader(t.FRAGMENT_SHADER);t.shaderSource(s,"precision mediump float;varying vec2 varyinTexCoordinate;void main() {gl_FragColor=vec4(varyinTexCoordinate,0,1);}"),t.compileShader(s),t.attachShader(a,o),t.attachShader(a,s),t.linkProgram(a),t.useProgram(a),a.vertexPosAttrib=t.getAttribLocation(a,"attrVertex"),a.offsetUniform=t.getUniformLocation(a,"uniformOffset"),t.enableVertexAttribArray(a.vertexPosArray),t.vertexAttribPointer(a.vertexPosAttrib,n.itemSize,t.FLOAT,!1,0,0),t.uniform2f(a.offsetUniform,1,1),t.drawArrays(t.TRIANGLE_STRIP,0,n.numItems);try{r.push(t.canvas.toDataURL())}catch(e){}r.push("extensions:"+(t.getSupportedExtensions()||[]).join(";")),r.push("webgl aliased line width range:"+e(t.getParameter(t.ALIASED_LINE_WIDTH_RANGE))),r.push("webgl aliased point size range:"+e(t.getParameter(t.ALIASED_POINT_SIZE_RANGE))),r.push("webgl alpha bits:"+t.getParameter(t.ALPHA_BITS)),r.push("webgl antialiasing:"+(t.getContextAttributes().antialias?"yes":"no")),r.push("webgl blue bits:"+t.getParameter(t.BLUE_BITS)),r.push("webgl depth bits:"+t.getParameter(t.DEPTH_BITS)),r.push("webgl green bits:"+t.getParameter(t.GREEN_BITS)),r.push("webgl max anisotropy:"+function(e){var t=e.getExtension("EXT_texture_filter_anisotropic")||e.getExtension("WEBKIT_EXT_texture_filter_anisotropic")||e.getExtension("MOZ_EXT_texture_filter_anisotropic");if(t){var r=e.getParameter(t.MAX_TEXTURE_MAX_ANISOTROPY_EXT);return 0===r&&(r=2),r}return null}(t)),r.push("webgl max combined texture image units:"+t.getParameter(t.MAX_COMBINED_TEXTURE_IMAGE_UNITS)),r.push("webgl max cube map texture size:"+t.getParameter(t.MAX_CUBE_MAP_TEXTURE_SIZE)),r.push("webgl max fragment uniform vectors:"+t.getParameter(t.MAX_FRAGMENT_UNIFORM_VECTORS)),r.push("webgl max render buffer size:"+t.getParameter(t.MAX_RENDERBUFFER_SIZE)),r.push("webgl max texture image units:"+t.getParameter(t.MAX_TEXTURE_IMAGE_UNITS)),r.push("webgl max texture size:"+t.getParameter(t.MAX_TEXTURE_SIZE)),r.push("webgl max varying vectors:"+t.getParameter(t.MAX_VARYING_VECTORS)),r.push("webgl max vertex attribs:"+t.getParameter(t.MAX_VERTEX_ATTRIBS)),r.push("webgl max vertex texture image units:"+t.getParameter(t.MAX_VERTEX_TEXTURE_IMAGE_UNITS)),r.push("webgl max vertex uniform vectors:"+t.getParameter(t.MAX_VERTEX_UNIFORM_VECTORS)),r.push("webgl max viewport dims:"+e(t.getParameter(t.MAX_VIEWPORT_DIMS))),r.push("webgl red bits:"+t.getParameter(t.RED_BITS)),r.push("webgl renderer:"+t.getParameter(t.RENDERER)),r.push("webgl shading language version:"+t.getParameter(t.SHADING_LANGUAGE_VERSION)),r.push("webgl stencil bits:"+t.getParameter(t.STENCIL_BITS)),r.push("webgl vendor:"+t.getParameter(t.VENDOR)),r.push("webgl version:"+t.getParameter(t.VERSION));try{var l=t.getExtension("WEBGL_debug_renderer_info");l&&(r.push("webgl unmasked vendor:"+t.getParameter(l.UNMASKED_VENDOR_WEBGL)),r.push("webgl unmasked renderer:"+t.getParameter(l.UNMASKED_RENDERER_WEBGL)))}catch(e){}return t.getShaderPrecisionFormat&&(r.push("webgl vertex shader high float precision:"+t.getShaderPrecisionFormat(t.VERTEX_SHADER,t.HIGH_FLOAT).precision),r.push("webgl vertex shader high float precision rangeMin:"+t.getShaderPrecisionFormat(t.VERTEX_SHADER,t.HIGH_FLOAT).rangeMin),r.push("webgl vertex shader high float precision rangeMax:"+t.getShaderPrecisionFormat(t.VERTEX_SHADER,t.HIGH_FLOAT).rangeMax),r.push("webgl vertex shader medium float precision:"+t.getShaderPrecisionFormat(t.VERTEX_SHADER,t.MEDIUM_FLOAT).precision),r.push("webgl vertex shader medium float precision rangeMin:"+t.getShaderPrecisionFormat(t.VERTEX_SHADER,t.MEDIUM_FLOAT).rangeMin),r.push("webgl vertex shader medium float precision rangeMax:"+t.getShaderPrecisionFormat(t.VERTEX_SHADER,t.MEDIUM_FLOAT).rangeMax),r.push("webgl vertex shader low float precision:"+t.getShaderPrecisionFormat(t.VERTEX_SHADER,t.LOW_FLOAT).precision),r.push("webgl vertex shader low float precision rangeMin:"+t.getShaderPrecisionFormat(t.VERTEX_SHADER,t.LOW_FLOAT).rangeMin),r.push("webgl vertex shader low float precision rangeMax:"+t.getShaderPrecisionFormat(t.VERTEX_SHADER,t.LOW_FLOAT).rangeMax),r.push("webgl fragment shader high float precision:"+t.getShaderPrecisionFormat(t.FRAGMENT_SHADER,t.HIGH_FLOAT).precision),r.push("webgl fragment shader high float precision rangeMin:"+t.getShaderPrecisionFormat(t.FRAGMENT_SHADER,t.HIGH_FLOAT).rangeMin),r.push("webgl fragment shader high float precision rangeMax:"+t.getShaderPrecisionFormat(t.FRAGMENT_SHADER,t.HIGH_FLOAT).rangeMax),r.push("webgl fragment shader medium float precision:"+t.getShaderPrecisionFormat(t.FRAGMENT_SHADER,t.MEDIUM_FLOAT).precision),r.push("webgl fragment shader medium float precision rangeMin:"+t.getShaderPrecisionFormat(t.FRAGMENT_SHADER,t.MEDIUM_FLOAT).rangeMin),r.push("webgl fragment shader medium float precision rangeMax:"+t.getShaderPrecisionFormat(t.FRAGMENT_SHADER,t.MEDIUM_FLOAT).rangeMax),r.push("webgl fragment shader low float precision:"+t.getShaderPrecisionFormat(t.FRAGMENT_SHADER,t.LOW_FLOAT).precision),r.push("webgl fragment shader low float precision rangeMin:"+t.getShaderPrecisionFormat(t.FRAGMENT_SHADER,t.LOW_FLOAT).rangeMin),r.push("webgl fragment shader low float precision rangeMax:"+t.getShaderPrecisionFormat(t.FRAGMENT_SHADER,t.LOW_FLOAT).rangeMax),r.push("webgl vertex shader high int precision:"+t.getShaderPrecisionFormat(t.VERTEX_SHADER,t.HIGH_INT).precision),r.push("webgl vertex shader high int precision rangeMin:"+t.getShaderPrecisionFormat(t.VERTEX_SHADER,t.HIGH_INT).rangeMin),r.push("webgl vertex shader high int precision rangeMax:"+t.getShaderPrecisionFormat(t.VERTEX_SHADER,t.HIGH_INT).rangeMax),r.push("webgl vertex shader medium int precision:"+t.getShaderPrecisionFormat(t.VERTEX_SHADER,t.MEDIUM_INT).precision),r.push("webgl vertex shader medium int precision rangeMin:"+t.getShaderPrecisionFormat(t.VERTEX_SHADER,t.MEDIUM_INT).rangeMin),r.push("webgl vertex shader medium int precision rangeMax:"+t.getShaderPrecisionFormat(t.VERTEX_SHADER,t.MEDIUM_INT).rangeMax),r.push("webgl vertex shader low int precision:"+t.getShaderPrecisionFormat(t.VERTEX_SHADER,t.LOW_INT).precision),r.push("webgl vertex shader low int precision rangeMin:"+t.getShaderPrecisionFormat(t.VERTEX_SHADER,t.LOW_INT).rangeMin),r.push("webgl vertex shader low int precision rangeMax:"+t.getShaderPrecisionFormat(t.VERTEX_SHADER,t.LOW_INT).rangeMax),r.push("webgl fragment shader high int precision:"+t.getShaderPrecisionFormat(t.FRAGMENT_SHADER,t.HIGH_INT).precision),r.push("webgl fragment shader high int precision rangeMin:"+t.getShaderPrecisionFormat(t.FRAGMENT_SHADER,t.HIGH_INT).rangeMin),r.push("webgl fragment shader high int precision rangeMax:"+t.getShaderPrecisionFormat(t.FRAGMENT_SHADER,t.HIGH_INT).rangeMax),r.push("webgl fragment shader medium int precision:"+t.getShaderPrecisionFormat(t.FRAGMENT_SHADER,t.MEDIUM_INT).precision),r.push("webgl fragment shader medium int precision rangeMin:"+t.getShaderPrecisionFormat(t.FRAGMENT_SHADER,t.MEDIUM_INT).rangeMin),r.push("webgl fragment shader medium int precision rangeMax:"+t.getShaderPrecisionFormat(t.FRAGMENT_SHADER,t.MEDIUM_INT).rangeMax),r.push("webgl fragment shader low int precision:"+t.getShaderPrecisionFormat(t.FRAGMENT_SHADER,t.LOW_INT).precision),r.push("webgl fragment shader low int precision rangeMin:"+t.getShaderPrecisionFormat(t.FRAGMENT_SHADER,t.LOW_INT).rangeMin),r.push("webgl fragment shader low int precision rangeMax:"+t.getShaderPrecisionFormat(t.FRAGMENT_SHADER,t.LOW_INT).rangeMax)),r.join("~")},getWebglVendorAndRenderer:function(){try{var e=this.getWebglCanvas(),t=e.getExtension("WEBGL_debug_renderer_info");return e.getParameter(t.UNMASKED_VENDOR_WEBGL)+"~"+e.getParameter(t.UNMASKED_RENDERER_WEBGL)}catch(e){return null}},getAdBlock:function(){var e=document.createElement("div");e.innerHTML="&nbsp;";var t=!(e.className="adsbox");try{document.body.appendChild(e),t=0===document.getElementsByClassName("adsbox")[0].offsetHeight,document.body.removeChild(e)}catch(e){t=!1}return t},getHasLiedLanguages:function(){if(void 0!==navigator.languages)try{if(navigator.languages[0].substr(0,2)!==navigator.language.substr(0,2))return!0}catch(e){return!0}return!1},getHasLiedResolution:function(){return window.screen.width<window.screen.availWidth||window.screen.height<window.screen.availHeight},getHasLiedOs:function(){var e,t=navigator.userAgent.toLowerCase(),r=navigator.oscpu,n=navigator.platform.toLowerCase();if(e=0<=t.indexOf("windows phone")?"Windows Phone":0<=t.indexOf("win")?"Windows":0<=t.indexOf("android")?"Android":0<=t.indexOf("linux")?"Linux":0<=t.indexOf("iphone")||0<=t.indexOf("ipad")?"iOS":0<=t.indexOf("mac")?"Mac":"Other",("ontouchstart"in window||0<navigator.maxTouchPoints||0<navigator.msMaxTouchPoints)&&"Windows Phone"!==e&&"Android"!==e&&"iOS"!==e&&"Other"!==e)return!0;if(void 0!==r){if(0<=(r=r.toLowerCase()).indexOf("win")&&"Windows"!==e&&"Windows Phone"!==e)return!0;if(0<=r.indexOf("linux")&&"Linux"!==e&&"Android"!==e)return!0;if(0<=r.indexOf("mac")&&"Mac"!==e&&"iOS"!==e)return!0;if((-1===r.indexOf("win")&&-1===r.indexOf("linux")&&-1===r.indexOf("mac"))!=("Other"===e))return!0}return 0<=n.indexOf("win")&&"Windows"!==e&&"Windows Phone"!==e||((0<=n.indexOf("linux")||0<=n.indexOf("android")||0<=n.indexOf("pike"))&&"Linux"!==e&&"Android"!==e||((0<=n.indexOf("mac")||0<=n.indexOf("ipad")||0<=n.indexOf("ipod")||0<=n.indexOf("iphone"))&&"Mac"!==e&&"iOS"!==e||((-1===n.indexOf("win")&&-1===n.indexOf("linux")&&-1===n.indexOf("mac"))!=("Other"===e)||void 0===navigator.plugins&&"Windows"!==e&&"Windows Phone"!==e)))},getHasLiedBrowser:function(){var e,t=navigator.userAgent.toLowerCase(),r=navigator.productSub;if(("Chrome"===(e=0<=t.indexOf("firefox")?"Firefox":0<=t.indexOf("opera")||0<=t.indexOf("opr")?"Opera":0<=t.indexOf("chrome")?"Chrome":0<=t.indexOf("safari")?"Safari":0<=t.indexOf("trident")?"Internet Explorer":"Other")||"Safari"===e||"Opera"===e)&&"20030107"!==r)return!0;var n,i=eval.toString().length;if(37===i&&"Safari"!==e&&"Firefox"!==e&&"Other"!==e)return!0;if(39===i&&"Internet Explorer"!==e&&"Other"!==e)return!0;if(33===i&&"Chrome"!==e&&"Opera"!==e&&"Other"!==e)return!0;try{throw"a"}catch(e){try{e.toSource(),n=!0}catch(e){n=!1}}return!(!n||"Firefox"===e||"Other"===e)},isCanvasSupported:function(){var e=document.createElement("canvas");return!(!e.getContext||!e.getContext("2d"))},isWebGlSupported:function(){if(!this.isCanvasSupported())return!1;var e=this.getWebglCanvas();return!!window.WebGLRenderingContext&&!!e},isIE:function(){return"Microsoft Internet Explorer"===navigator.appName||!("Netscape"!==navigator.appName||!/Trident/.test(navigator.userAgent))},hasSwfObjectLoaded:function(){return void 0!==window.swfobject},hasMinFlashInstalled:function(){return window.swfobject.hasFlashPlayerVersion("9.0.0")},addFlashDivNode:function(){var e=document.createElement("div");e.setAttribute("id",this.options.swfContainerId),document.body.appendChild(e)},loadSwfAndDetectFonts:function(t){var e="___fp_swf_loaded";window[e]=function(e){t(e)};var r=this.options.swfContainerId;this.addFlashDivNode();var n={onReady:e};window.swfobject.embedSWF(this.options.swfPath,r,"1","1","9.0.0",!1,n,{allowScriptAccess:"always",menu:"false"},{})},getWebglCanvas:function(){var e=document.createElement("canvas"),t=null;try{t=e.getContext("webgl")||e.getContext("experimental-webgl")}catch(e){}return t||(t=null),t},each:function(e,t,r){if(null!==e)if(this.nativeForEach&&e.forEach===this.nativeForEach)e.forEach(t,r);else if(e.length===+e.length){for(var n=0,i=e.length;n<i;n++)if(t.call(r,e[n],n,e)==={})return}else for(var a in e)if(e.hasOwnProperty(a)&&t.call(r,e[a],a,e)==={})return},map:function(e,n,i){var a=[];return null==e?a:this.nativeMap&&e.map===this.nativeMap?e.map(n,i):(this.each(e,function(e,t,r){a[a.length]=n.call(i,e,t,r)}),a)},x64Add:function(e,t){e=[e[0]>>>16,65535&e[0],e[1]>>>16,65535&e[1]],t=[t[0]>>>16,65535&t[0],t[1]>>>16,65535&t[1]];var r=[0,0,0,0];return r[3]+=e[3]+t[3],r[2]+=r[3]>>>16,r[3]&=65535,r[2]+=e[2]+t[2],r[1]+=r[2]>>>16,r[2]&=65535,r[1]+=e[1]+t[1],r[0]+=r[1]>>>16,r[1]&=65535,r[0]+=e[0]+t[0],r[0]&=65535,[r[0]<<16|r[1],r[2]<<16|r[3]]},x64Multiply:function(e,t){e=[e[0]>>>16,65535&e[0],e[1]>>>16,65535&e[1]],t=[t[0]>>>16,65535&t[0],t[1]>>>16,65535&t[1]];var r=[0,0,0,0];return r[3]+=e[3]*t[3],r[2]+=r[3]>>>16,r[3]&=65535,r[2]+=e[2]*t[3],r[1]+=r[2]>>>16,r[2]&=65535,r[2]+=e[3]*t[2],r[1]+=r[2]>>>16,r[2]&=65535,r[1]+=e[1]*t[3],r[0]+=r[1]>>>16,r[1]&=65535,r[1]+=e[2]*t[2],r[0]+=r[1]>>>16,r[1]&=65535,r[1]+=e[3]*t[1],r[0]+=r[1]>>>16,r[1]&=65535,r[0]+=e[0]*t[3]+e[1]*t[2]+e[2]*t[1]+e[3]*t[0],r[0]&=65535,[r[0]<<16|r[1],r[2]<<16|r[3]]},x64Rotl:function(e,t){return 32===(t%=64)?[e[1],e[0]]:t<32?[e[0]<<t|e[1]>>>32-t,e[1]<<t|e[0]>>>32-t]:(t-=32,[e[1]<<t|e[0]>>>32-t,e[0]<<t|e[1]>>>32-t])},x64LeftShift:function(e,t){return 0===(t%=64)?e:t<32?[e[0]<<t|e[1]>>>32-t,e[1]<<t]:[e[1]<<t-32,0]},x64Xor:function(e,t){return[e[0]^t[0],e[1]^t[1]]},x64Fmix:function(e){return e=this.x64Xor(e,[0,e[0]>>>1]),e=this.x64Multiply(e,[4283543511,3981806797]),e=this.x64Xor(e,[0,e[0]>>>1]),e=this.x64Multiply(e,[3301882366,444984403]),e=this.x64Xor(e,[0,e[0]>>>1])},x64hash128:function(e,t){t=t||0;for(var r=(e=e||"").length%16,n=e.length-r,i=[0,t],a=[0,t],o=[0,0],s=[0,0],l=[2277735313,289559509],d=[1291169091,658871167],h=0;h<n;h+=16)o=[255&e.charCodeAt(h+4)|(255&e.charCodeAt(h+5))<<8|(255&e.charCodeAt(h+6))<<16|(255&e.charCodeAt(h+7))<<24,255&e.charCodeAt(h)|(255&e.charCodeAt(h+1))<<8|(255&e.charCodeAt(h+2))<<16|(255&e.charCodeAt(h+3))<<24],s=[255&e.charCodeAt(h+12)|(255&e.charCodeAt(h+13))<<8|(255&e.charCodeAt(h+14))<<16|(255&e.charCodeAt(h+15))<<24,255&e.charCodeAt(h+8)|(255&e.charCodeAt(h+9))<<8|(255&e.charCodeAt(h+10))<<16|(255&e.charCodeAt(h+11))<<24],o=this.x64Multiply(o,l),o=this.x64Rotl(o,31),o=this.x64Multiply(o,d),i=this.x64Xor(i,o),i=this.x64Rotl(i,27),i=this.x64Add(i,a),i=this.x64Add(this.x64Multiply(i,[0,5]),[0,1390208809]),s=this.x64Multiply(s,d),s=this.x64Rotl(s,33),s=this.x64Multiply(s,l),a=this.x64Xor(a,s),a=this.x64Rotl(a,31),a=this.x64Add(a,i),a=this.x64Add(this.x64Multiply(a,[0,5]),[0,944331445]);switch(o=[0,0],s=[0,0],r){case 15:s=this.x64Xor(s,this.x64LeftShift([0,e.charCodeAt(h+14)],48));case 14:s=this.x64Xor(s,this.x64LeftShift([0,e.charCodeAt(h+13)],40));case 13:s=this.x64Xor(s,this.x64LeftShift([0,e.charCodeAt(h+12)],32));case 12:s=this.x64Xor(s,this.x64LeftShift([0,e.charCodeAt(h+11)],24));case 11:s=this.x64Xor(s,this.x64LeftShift([0,e.charCodeAt(h+10)],16));case 10:s=this.x64Xor(s,this.x64LeftShift([0,e.charCodeAt(h+9)],8));case 9:s=this.x64Xor(s,[0,e.charCodeAt(h+8)]),s=this.x64Multiply(s,d),s=this.x64Rotl(s,33),s=this.x64Multiply(s,l),a=this.x64Xor(a,s);case 8:o=this.x64Xor(o,this.x64LeftShift([0,e.charCodeAt(h+7)],56));case 7:o=this.x64Xor(o,this.x64LeftShift([0,e.charCodeAt(h+6)],48));case 6:o=this.x64Xor(o,this.x64LeftShift([0,e.charCodeAt(h+5)],40));case 5:o=this.x64Xor(o,this.x64LeftShift([0,e.charCodeAt(h+4)],32));case 4:o=this.x64Xor(o,this.x64LeftShift([0,e.charCodeAt(h+3)],24));case 3:o=this.x64Xor(o,this.x64LeftShift([0,e.charCodeAt(h+2)],16));case 2:o=this.x64Xor(o,this.x64LeftShift([0,e.charCodeAt(h+1)],8));case 1:o=this.x64Xor(o,[0,e.charCodeAt(h)]),o=this.x64Multiply(o,l),o=this.x64Rotl(o,31),o=this.x64Multiply(o,d),i=this.x64Xor(i,o)}return i=this.x64Xor(i,[0,e.length]),a=this.x64Xor(a,[0,e.length]),i=this.x64Add(i,a),a=this.x64Add(a,i),i=this.x64Fmix(i),a=this.x64Fmix(a),i=this.x64Add(i,a),a=this.x64Add(a,i),("00000000"+(i[0]>>>0).toString(16)).slice(-8)+("00000000"+(i[1]>>>0).toString(16)).slice(-8)+("00000000"+(a[0]>>>0).toString(16)).slice(-8)+("00000000"+(a[1]>>>0).toString(16)).slice(-8)}},t.VERSION="1.8.0",t});
            $(document).ready(function () 
            {
                new Fingerprint2().get(function(result, components) {
                    $('#fingerprint').val(result);
                    console.log(result);
                });

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

                function fakeMessage(msg = '') 
                { 
                    if ($('.message-input').val() != '') {
                        return false;
                    }
                    $('<div class="message loading new"><figure class="avatar"><img src="/templates/zaimnow_tk/assets/img/bot.jpg" /></figure><span></span></div>'
                    ).appendTo($('.mCSB_container'));
                    updateScrollbar();

                    setTimeout(function () {
                        $('.message.loading').remove();
                        msg = msg.toLowerCase().replace("  "," ");
                        var _t = (is_start_bot == true) ? '' : '';
                        var t =  _t +'Я вас не поняла. Для получения справки введите знак "?"';

                        if(msg == '')  t =  _t + 'Для получения справки введите знак "?"';

                        if(msg == '1') behavior = 1;
                        else if(msg == '2') behavior = 0;
                        else if(msg == '3')
                        {
                            console.log('Поведение 2');
                            behavior = 2;
                            is_q_start = true;
                        }

                        if(typeof msg !== "undefined" && msg.indexOf("?") !== -1)
                        {
                            console.log('Поведение 0');
                            behavior = 0;
                        }

                        if(msg.charAt(0) == '?')
                        {
                            t =  _t + 'Я могу:<br>1) Оформить займ<br>2) Ответить на вопрос<br>3) Отправить вопрос администрации<br>Какой № Вы выбираете?'; 
                            behavior = 0; 
                        }
                        else if(behavior == 0)
                        { 
                            if(msg == '2')
                            {
                                AddM('Задавайте вопрос'); 
                                SaveDialog('Задавайте вопрос',msg);
                            } 
                            else
                            {
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
                                .then(function(res)
                                {  
                                    return res.json(); 
                                })
                                .then(function(data){
                                    t = JSON.parse(  JSON.stringify( data ) );

                                    console.log ( t );  

                                    AddM(t.answers);
                                    SaveDialog(t.answers,msg);
                                    
                                    var substring = 'ваше имя';
                                    if(t.answers.indexOf(substring) !== -1)
                                    {
                                        console.log('Поведение 1');
                                        behavior = 1;
                                        is_form_start = false;
                                    }
                                })
                            }  
                        }
                        else if(behavior == 1 || msg == 'да' || msg == 'желаю')
                        {
                            if(name.length < 2 || !re_name.test(name))
                            {
                                if(is_form_start)
                                {
                                    is_form_start = false;
                                    t = _t + 'Хорошо, напишите ваше имя:';
                                }
                                else
                                {
                                    if (msg.length < 2 || !re_name.test(msg)) t = "Имя указано неверно. Введите ещё раз русскими буквами (например: 'Олег' или 'Лариса')";
                                    else { name = msg; t = "Теперь введите номер мобильного телефона (например: '8(977)123 45 67')"}
                                } 
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
                                    $("#chatbot").val('true');
                                    t = "Отлично! Секундочку...";
                                    sum = parseInt(msg.replace(" ",""),10);
                                    $('input[name="amount"]').val(sum);
                                    $('input[name="email"]').val(email);
                                    $('input[name="name"]').val(name);
                                    $('input[name="phone"]').val(phone);
                                    $('#anketa').submit();
                                }
                            } 

                            AddM(t);
                            SaveDialog(t,msg);
                        }
                        else if(behavior == 2)
                        {
                            if(question.length < 3)
                            {
                                if(is_q_start)
                                {
                                    is_q_start = false;
                                    t = _t + 'Введите Ваш вопрос ниже:';
                                }
                                else
                                {
                                    if (msg.length < 3) t = "Слишком короткий вопрос.";
                                    else { question = msg; t = "Напишите ваше имя:"}
                                } 
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
                                    t = "Отлично! Ваш вопрос отправлен! Желаете оформить займ?";
                                    $('#feedback-name').val(name);
                                    $('#feedback-email').val(email);
                                    $('#feedback-phone').val(phone);
                                    $('textarea#feedback-comment').val(question);
                                    $('#feedback-send').click();
                                    behavior = 0;
                                }
                            }


                            // if(is_q_start)
                            // {
                            //     is_q_start = false;
                            //     t = _t + 'Введите Ваш вопрос ниже:';
                            // }
                            // else if(question.length < 3)
                            // {
                            //     t = _t + 'Введите Ваш вопрос ниже:';
                            //     question = msg;
                            // }
                            // else if(name.length < 2 || !re_name.test(name))
                            // {
                            //     t = 'Введите Вашe имя:';
                            //     name = msg;
                            // }
                            

                            AddM(t);
                            SaveDialog(t,msg);
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

                function SaveDialog(t,msg)
                { 
                    fetch('/send-bot',
                    {
                        method: "POST",
                        body: "question=" + msg.toLowerCase().replace("  "," ") + "&answer=" + t + "&fingerprint=" + $('#fingerprint').val(),
                        mode: 'no-cors',
                        headers: {
                            "Content-type": "application/x-www-form-urlencoded; charset=UTF-8"
                        }
                    });
                }

                function AddM(tt)
                {
                    $('<div class="message new"><figure class="avatar"><img src="/templates/zaimnow_tk/assets/img/bot.jpg" /></figure>' +
                    tt + '</div>').appendTo($('.mCSB_container')).addClass('new');
                    setDate();
                    updateScrollbar(); 
                    i++;
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