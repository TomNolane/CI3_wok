</div>
<?php 
$from = '15';
echo '<script>'; 
require "modules/jquery/jquery-1.11.3.min.js"; 
echo '</script>';
require 'templates/common/get_display_size.php'; 
require 'templates/common/detect.min.php';
echo '<script>'; 
require "modules/bootstrap/3.3.6/js/bootstrap.min.js"; 
echo '</script>';
if ($this->uri->segment(1) != 'form')
{
    echo '<!-- Декстоп --><div id="ya-rtb"><div id="yandex_rtb_R-A-249178-2"></div>';
    if($this->uri->segment(1) == 'lk' || $this->uri->segment(1) == 'lk2') {
        echo '<!-- Мобайл --><div id="yandex_rtb_R-A-249178-1"></div>';?>
        <script>
        var offers = <?php echo json_encode($data); ?>;
        var by_reg = null;
        $(document).ready(function(){
            $('.offer-type').change(function(){
                update_offers();
            });
            
            function update_offers() {
                var str = '.results tbody tr';
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
    <?php }
    echo '</div>';
    echo '<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <!-- Вкредито -->
    <div class="text-center"><ins class="adsbygoogle text-center"
    style="display:block"
    data-ad-client="ca-pub-4970738258373085"
    data-ad-slot="8024212958"
    data-ad-format="auto"></ins></div>
    <script>
    (adsbygoogle = window.adsbygoogle || []).push({});
    </script>';
} 
if($this->uri->segment(1) == '' || $this->uri->segment(1) == ' ' || $this->uri->segment(1) == 'index' || $this->uri->segment(1) == 'allarticles')
{
    echo '<a href="#0" class="cd-top">Наверх</a>';
}
?>
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-2 col-sm-4 col-xs-12">
                <a href="/">
                    <img src="/templates/vkredito/img/logo.png" class="logo" alt="logo.png">
                </a>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12 spec_footer4">
                <div style="font-size: 11px;">
                    <p>Сервис по подбору выгодных онлайн займов находящийся по адресу
                        <br>Россия, Ленинградская обл. г. Санкт-Петербург, ул. Осипенко, 12, оф 201
                        <br><a href="mailto:support@vkredito.ru" target="_blank">support@vkredito.ru</a>
                        <span class="hidden-xs hidden-sm"> | +7(495) 006 19 61</span>
                    </p>
                </div>
            </div>
            <div class="col-md-6 hidden-xs hidden-sm spec_footer5">
                <p style="font-size: 10px">Займы предоставляются на сумму от 1 000 до 100 000 рублей включительно на срок от 61 до 365 дней. Максимальная
                    процентная ставка по займу составляет 0,98% в день, а минимальная 0,08%. Пример расчета общей стоимости
                    займа: заём 20 000 руб. срок пользования 10 недель под 0,08% в день; проценты за весь период составят
                    11 200 руб. Итого к выплате 31 200 рублей. Первый заём до 10 000 рублей выдается по ставке 0% в случае
                    своевременного погашения.
                    <br>ООО «Альянс» ОГРН 5177746353054 ИНН 9705113909 КПП 770501001.</p>
            </div>
        </div>
        <div class="clearfix">&nbsp;</div>
    </div>
</footer>
<?php 
    echo '<script>'; 
	require "modules/jquery-maskedinput/jquery.maskedinput.1.4.2.min.js"; 
    echo '</script>';
    echo '<script>'; 
	require "modules/jquery.ion.rangeslider/js/ion.rangeSlider.min.js"; 
    echo '</script>';
    echo '<script>'; 
	require "modules/jquery.ion.rangeslider/js/ion.rangeSlider.min.js"; 
    echo '</script>';
    echo '<script>'; 
	require "templates/vkredito/js/validate.js"; 
    echo '</script>';
    echo '<script>'; 
	require "modules/poshytip-1.2/src/jquery.poshytip.min.js"; 
    echo '</script>';
    echo '<script>'; 
	require "templates/vkredito/js/jquery.form-validator.js"; 
    echo '</script>';
    echo '<!--[if lt IE 10]>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ajaxtransport-xdomainrequest/1.0.1/jquery.xdomainrequest.min.js"></script>
    <![endif]-->';
    echo '<script>'; 
	require "templates/vkredito/js/jquery.suggestions.min.js"; 
    echo '</script>';
    echo '<script>'; 
	require "modules/jquery-ui/1.10.4/js/jquery-ui-1.10.4.custom.min.js"; 
    echo '</script>';
    echo '<script>'; 
	require "templates/vkredito/js/settings.js"; 
    echo '</script>';
    echo '<script>
    $(document).ready(function () {
      if (location.hash){
      location.hash && $(location.hash + \'.collapse\').collapse(\'show\');    
      $(\'html, body\').animate({scrollTop: $($(location.hash)).offset().top - 100 }, 1000);
      return false;
    }});
    </script>';
if ($this->uri->segment(1) == '') { ?>
    <script type="text/javascript">
        var amount = 15000;
        var day = 10;
        $('.amount').ionRangeSlider({
            values: [1000, 2000, 3000, 4000, 5000, 6000, 7000, 8000, 9000, 10000, 11000, 12000, 13000, 14000,
                15000, 20000, 25000, 30000, 40000, 50000, 80000, 100000
            ],
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
            postfix: ' Р',
            prettify_enabled: true,
            hide_from_to: false,
            onChange: function (range) {
            if (range.from_value <= 10000) {
                $('#period').val('7');
                $('#period2').val('От 61 до 130 дней');
                d = 'до 130 дней';
            } else if (range.from_value <= 15000) {
                $('#period').val('14');
                $('#period2').val('От 61 до 130 дней');
                d = 'до 130 дней';
            } else if (range.from_value <= 20000) {
                $('#period').val('21');
                $('#period2').val('От 61 до 130 дней');
                d = 'до 130 дней';
            } else if (range.from_value <= 30000) {
                $('#period').val('21');
                $('#period2').val('От 61 до 130 дней');
                d = 'до 130 дней';
            } else if (range.from_value <= 50000) {
                $('#period').val('30');
                $('#period2').val('От 130 до 250 дней');
                d = 'до 250 дней';
            } else {
                $('#period').val('30');
                $('#period2').val('От 250 до 365 дней');
                d = 'до 365 дней';
            }
            $('.srok').text(d);
            amount = range.from_value;
            updateComm();
            }
        });
        $('.period').ionRangeSlider({
            min: 1,
            max: 30,
            from: <?php echo empty($_POST['period'])? 10 : $_POST['period']; ?>,
            postfix: ' дней',
            onChange: function (range) {
                day = range.from;
                updateComm();
            }
        });
        var slider = $('.amount').data('ionRangeSlider');
        var slider_plus = true;
        var n = 6;
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
            amount = slider.result.from_value;
            if (amount <= 10000) {
                d = 'до 130 дней';
                $('#period').val(10);
            } else if (amount <= 15000) {
                d = 'до 130 дней';
                $('#period').val(10);
            } else if (amount <= 20000) {
                d = 'до 130 дней';
                $('#period').val(10);
            } else if (amount <= 30000) {
                d = 'до 130 дней';
                $('#period').val(10);
            } else if (amount <= 50000) {
                d = 'до 250 дней';
                $('#period').val(15);
            } else {
                d = 'до 365 дней';
                $('#period').val(30);
            }
            $('.srok').text(d);
            $('#period').val(30);
            updateComm();

        }, 50);
        
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
            comm = comm1 + comm2;
            summ = amount + comm;
            $('.current_amount').text(String(amount).split(/(?=(?:\d{3})+$)/).join(' '));
            $('.current_percent').text(percent);
            $('.current_summ').text(String(summ).split(/(?=(?:\d{3})+$)/).join(' '));
            $('#amount').val(amount);

            var slider9 = $('.amount').data('ionRangeSlider');

            if (slider9.result.from_value <= 10000) {
                $('#period').val('7');
                $('#period2').val('От 61 до 130 дней');
            } else if (slider9.result.from_value <= 15000) {
                $('#period').val('14');
                $('#period2').val('От 61 до 130 дней');
            } else if (slider9.result.from_value <= 20000) {
                $('#period').val('21');
                $('#period2').val('От 61 до 130 дней');
            } else if (slider9.result.from_value <= 30000) {
                $('#period').val('21');
                $('#period2').val('От 61 до 130 дней');
            } else if (slider9.result.from_value <= 50000) {
                $('#period').val('30');
                $('#period2').val('От 130 до 250 дней');
            } else {
                $('#period').val('30');
                $('#period2').val('От 250 до 365 дней');
            }
            $('#form_slrd').val(slider9.result.from);
        };
    </script>
    <?php } 
    if ($this->uri->segment(1) == 'form') 
    { 
    echo ' <script>$("#work").change(function(){
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
}
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
                "cd-is-visible cd-fade-out"), o(this).scrollTop() > s && d.addClass("cd-fade-out")
        }), d.on("click", function (l) {
            l.preventDefault(), o("body,html").animate({
                scrollTop: 0
            }, c)
        })
    });
    $('.docs, .info').click(function () {
        var href = $(this).attr("href");
        var hash = href.substr(href.indexOf("#"));
        $('.collapse').collapse('hide');
        $(hash + '.collapse').collapse('show');
        $('html, body').animate({
            scrollTop: $($(hash)).offset().top - 100
        }, 1000);
    });
    function setcookie(name, value, expires, path, domain, secure) {
        document.cookie = name + "=" + escape(value) +
            ((expires) ? "; expires=" + (new Date(expires)) : "") +
            ((path) ? "; path=" + path : "; path=/") +
            ((domain) ? "; domain=" + domain : "") +
            ((secure) ? "; secure" : "");
    }
    function traffic(site, page) {
        $.ajax({
            type: 'POST',
            url: '/traffic/',
            data: 'site=' + site + '&page=' + page,
            success: function (data) {
            }
        });
    }
    //traffic(window.location.hostname,window.location.pathname);
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
    var amount = 15000;
    $(document).ready(function () {
        $('.amount').ionRangeSlider({
            min: 1000,
            max: 100000,
            step: 1000,
            from: <?php echo empty($_POST['amount'])? 15000 : $_POST['amount']; ?>,
            postfix: '',
            onChange: function (range) {
                var percent = 0;
                var attr = '';
                var color = '';
                $('.current_amount').text(String(range.from).split(/(?=(?:\d{3})+$)/).join(' '));
                $('#percent_rate').text(percent + '%');
                //$('#credit_hint').html(attr);
                //$('#ranges-label').hide();
                $('.form-slider, .form-button, .js-irs-0, .current_amount_color').removeClass(
                    'green').removeClass('orange').removeClass('red').addClass(color).show();
                $('.results tr').each(function (indx, element) {
                    if ($(element).data('amount') < range.from) $(element).hide();
                    else $(element).show();
                });
                amount = range.from;
            }
        });
        $('.period').ionRangeSlider({
            min: 61,
            max: 365,
            from: <?php echo empty($_POST['period'])? 61 : $_POST['period']; ?>,
            from_fixed: true,
            postfix: ' сут.',
            onChange: function (range) {
                $('#current_period').text(range.from);
            }
        });
        $('.amount2').ionRangeSlider({
            values: [1000, 2000, 3000, 4000, 5000, 6000, 7000, 8000, 9000, 10000, 11000, 12000, 13000,
                14000, 15000, 20000, 25000, 30000, 40000, 50000, 80000, 100000
            ],
            onChange: function (range) {
                if (range.from_value <= 10000) {
                    $('#period').val('7');
                    $('#period2').val('От 61 до 130 дней');
                } else if (range.from_value <= 15000) {
                    $('#period').val('14');
                    $('#period2').val('От 61 до 130 дней');
                } else if (range.from_value <= 20000) {
                    $('#period').val('31');
                    $('#period2').val('От 61 до 130 дней');
                } else if (range.from_value <= 30000) {
                    $('#period').val('31');
                    $('#period2').val('От 61 до 130 дней');
                } else if (range.from_value <= 50000) {
                    $('#period').val('130');
                    $('#period2').val('От 130 до 250 дней');
                } else {
                    $('#period').val('180');
                    $('#period2').val('От 250 до 365 дней');
                }
            }
        });
        <?php if ($this->uri->segment(1) == '' || $this->uri->segment(1) == 'index' || $this->uri->segment(1) == ' ') { ?>
        var slider = $('.amount').data('ionRangeSlider');
        var slider_plus = true;
        var slider_intl = setInterval(function () {
            var step = slider_plus ? slider.options.from + slider.options.step : slider.options.from -
                slider.options.step;
            if (step == slider.options.max) slider_plus = false;
            if (step < <?php echo empty($_POST['amount'])? 15000 : $_POST['amount']; ?>) {
                clearInterval(slider_intl);
            } else slider.update({
                from: step
            });
        }, 50);
        <?php } ?>
    });

    function Loading(flag) {
        if (typeof flag == 'undefined') {
            $('#feedback-send').prop('disabled', true);
            $('#feedback-send').html('Отправка <i class="fa fa-spinner fa-spin fa-pulse"></i>');
        } else if (!flag) {
            $('#feedback-send').html('Отправить');
            $('#feedback-send').prop('disabled', false);
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
        
        if ((typeof data.phone != 'undefined' && data.phone != '') || (typeof data.email != 'undefined' && data
                .email != '')) {
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
            alert('Необходимо указать контактные данные.');
        }
    });
</script>
<!-- Yandex.Metrika counter -->
<script type="text/javascript">
    (function (d, w, c) {
        (w[c] = w[c] || []).push(function () {
            try {
                w.yaCounter40423675 = new Ya.Metrika({
                    id: 40423675,
                    clickmap: true,
                    trackLinks: true,
                    accurateTrackBounce: true,
                    webvisor: true
                });
            } catch (e) {}
        });
        var n = d.getElementsByTagName("script")[0],
            s = d.createElement("script"),
            f = function () {
                n.parentNode.insertBefore(s, n);
            };
        s.type = "text/javascript";
        s.async = true;
        s.src = "https://mc.yandex.ru/metrika/watch.js";
        if (w.opera == "[object Opera]") {
            d.addEventListener("DOMContentLoaded", f, false);
        } else {
            f();
        }
    })(document, window, "yandex_metrika_callbacks");
</script>
<noscript>
    <div>
        <img src="https://mc.yandex.ru/watch/40423675" style="position:absolute; left:-9999px;" alt="mc.yandex.ru/watch" />
    </div>
</noscript>
<!-- /Yandex.Metrika counter -->
<script>
    function markTarget(target, param, id) {
        if (typeof yaCounter40423675 == 'undefined') return;
        if (typeof param == 'undefined') yaCounter40423675.reachGoal(target);
        else yaCounter40423675.reachGoal(target, param);

        $.ajax({
            type: 'POST',
            url: '/pixel/',
            data: 'id=' + id + '&pixel=' + param,
            success: function (data) {
            }
        });
    }
</script> 
<script type="text/javascript">
    (window.Image ? (new Image()) : document.createElement('img')).src = location.protocol +
        '//vk.com/rtrg?r=RRRhvxA7nvURG7xAUtL1b2tM0X6dhz4tDAGsjmC3XYdu0hMp4G5M1qB0DwX9x5CjKiwuRfUUCPeTFJgPM96VEJMDEF2kd2TqnCHkwMhTMLKMsje7SOydhyYmYfpnJZCNZHLFjJlRoiPU4bCFDyrAjhJufuYNkPM30caOVnC7B/8-&pixel_id=1000099082';
</script>
<!--Константин Гутлид-->
<script type="text/javascript">
    (window.Image ? (new Image()) : document.createElement('img')).src = location.protocol +
        '//vk.com/rtrg?r=Z7pk5C4xjqokU5G*QALWNq2pkJhzPOom99yo3Qxf9oIeFlECprDRQgjZP9SEA86kYiMHFgew1rs3AF6e*l8tUryFp/Fl495P7rPnkWnSEnGPEQiabdvpee/7*npmHm33ovO1TSw3ulRHBDU7ITWvhsLgKc4jAIpbdw4C7HeMV/s-&pixel_id=1000099730';
</script>
<?php require 'google-analytics.php';?>
<script type="text/javascript">
    var isMobile = false; //initiate as false
    // device detection
    if (
        /(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|ipad|iris|kindle|Android|Silk|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i
        .test(navigator.userAgent) ||
        /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i
        .test(navigator.userAgent.substr(0, 4))) isMobile = true;
    if (isMobile) {
        (function (w, d, n, s, t) {
            w[n] = w[n] || [];
            w[n].push(function () {
                Ya.Context.AdvManager.render({
                    blockId: "R-A-249178-1",
                    renderTo: "yandex_rtb_R-A-249178-1",
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
    } else {
        (function (w, d, n, s, t) {
            w[n] = w[n] || [];
            w[n].push(function () {
                Ya.Context.AdvManager.render({
                    blockId: "R-A-249178-2",
                    renderTo: "yandex_rtb_R-A-249178-2",
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
    var google_conversion_id = 844462441;
    var google_custom_params = window.google_tag_params;
    var google_remarketing_only = true;
    /* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
    <div style="display:inline;">
        <img height="1" width="1" style="border-style:none;" alt="googleads" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/844462441/?guid=ON&amp;script=0"
        />
    </div>
</noscript>
</body>
</html>