<?php $from = '53'; 
if($this->uri->segment(1) != 'form')
{
	echo '';
}
?>

<?php
if($this->uri->segment(1) == '' || $this->uri->segment(1) == ' ' || $this->uri->segment(1) == 'index' || $this->uri->segment(1) == 'allarticles' || $this->uri->segment(1) == 'faq')
{
    echo '<a href="#0" class="cd-top">Наверх</a>';
}
?>
    <footer class="ex-main-footer ex-sticky-footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-2">
                    <div class="ex-foot-logo">
                        <a href="/">
                            <img src="/templates/cashnow/assets/img/footer-logo.png" alt="footer-logo.png">
                        </a>
                    </div>
                </div>
                <div class="col-lg-10">
                    <p>Сервис по подбору выгодных онлайн займов и кредитов находящийся по адресу:
                        <br> Россия, Ленинградская обл. г. Санкт-Петербург, ул. Осипенко, 12, оф 201 support@cashnow.su
                        <span
                            class="hidden-xs hidden-sm"> | 8 (960) 950 93 53</span>
                            <br>
                            <span class="hidden-xs hidden-sm">Займы предоставляются на сумму от 7 000 ₸ до 150 000 ₸ включительно на срок от 61 до 365 дней.
                                <br> Максимальная процентная ставка по займу составляет 0,98% в день, а минимальная 0,08%.
                                <br> Пример расчета общей стоимости займа: заём 20 000 ₸ срок пользования 10 недель под 0,08%
                                в день; проценты за весь период составят 11 200 ₸ Итого к выплате 31 200 ₸ Первый заём до
                                10 000 ₸ выдается по ставке 0% в случае своевременного погашения.  ИП Бабакова К.К ОГРНИП 316222500122426 ИНН 222511216499
                            </span> 
                    </p>
                </div>
            </div>
        </div>
    </footer>
    <?php  
    require 'templates/common/get_display_size.php';
    echo '<script>';
    require 'templates/cashnow/assets/js/jquery.min.js';
    echo '</script>'; 
    echo '<script>';
    require 'templates/cashnow/assets/js/bootstrap.min.js';
    echo '</script>';
    echo '<script>';
    require 'modules/jquery.ion.rangeslider/js/ion.rangeSlider.min.js';
    echo '</script>';
    echo '<script>';
    require 'modules/jquery-maskedinput/jquery.maskedinput.1.4.2.min.js';
    echo '</script>';
    echo '<script>';
    require 'modules/poshytip-1.2/src/jquery.poshytip.min.js';
    echo '</script>'; 
    echo '<script>';
    require 'templates/cashnow/assets/js/jquery.form-validator.js';
    echo '</script>';
    echo '<script>';
    require 'templates/cashnow/assets/js/jquery.suggestions.min.js';
    echo '</script>'; 
    echo '<script>';
    require 'templates/cashnow/assets/js/coockie.js';
    echo '</script>';
    echo '<script>';
    require 'templates/cashnow/assets/js/modal.js';
    echo '</script>';
    echo '<script>';
    require 'templates/cashnow/assets/js/custom.js';
    echo '</script>';
    echo '<script>';
    require 'templates/cashnow/assets/js/settings_main.js';
    echo '</script>';
    echo '<script>';
    require 'templates/cashnow/assets/js/settings_form.js';
    echo '</script>';
    echo '<!-- backtotop -->
    <script>
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
    });</script>'; 
    echo '<script>';
    require 'templates/cashnow/assets/js/get_parameter.js';
    echo '</script>';
    require 'templates/common/detect.min.php';
?>
    <!--[if lt IE 10]>
<script  src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ajaxtransport-xdomainrequest/1.0.1/jquery.xdomainrequest.min.js"></script>
<![endif]-->
    <?php if ($this->uri->segment(1) == '' || $this->uri->segment(1) == 'index') { ?>
    <script>
        $("#rangeSlider2").ionRangeSlider({
            hide_min_max: true,
            hide_from_to: true,
            keyboard: true,
            from_fixed: true,
            grid: false,
            from: 1,
            values: [61, 130, 200, 250]
        });
        var slider2 = $('#rangeSlider2').data('ionRangeSlider');
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
                case '7000': $from = '0' ; break;
                case '8000': $from = '1' ; break;
                case '9000': $from = '2' ; break;
                case '10000': $from = '3' ; break;
                case '11000': $from = '4' ; break;
                case '12000': $from = '5' ; break;
                case '13000': $from = '6' ; break;
                case '14000': $from = '7' ; break;
                case '15000': $from = '8' ; break;
                case '16000': $from = '9' ; break;
                case '17000': $from = '10' ; break;
                case '18000': $from = '11' ; break;
                case '19000': $from = '12' ; break;
                case '20000': $from = '13' ; break;
                case '21000': $from = '14' ; break;
                case '22000': $from = '15' ; break;
                case '23000': $from = '16' ; break;
                case '24000': $from = '17' ; break;
                case '25000': $from = '18' ; break;
                case '26000': $from = '19' ; break;
                case '27000': $from = '20' ; break;
                case '28000': $from = '21' ; break;
                case '29000': $from = '22' ; break;
                case '30000': $from = '23' ; break;
                case '31000': $from = '24' ; break;
                case '32000': $from = '25' ; break;
                case '33000': $from = '26' ; break;
                case '34000': $from = '27' ; break;
                case '35000': $from = '28' ; break;
                case '36000': $from = '29' ; break;
                case '37000': $from = '30' ; break;
                case '38000': $from = '31' ; break;
                case '39000': $from = '32' ; break;
                case '40000': $from = '33' ; break;
                case '41000': $from = '34' ; break;
                case '42000': $from = '35' ; break;
                case '43000': $from = '36' ; break;
                case '44000': $from = '37' ; break;
                case '45000': $from = '38' ; break;
                case '46000': $from = '39' ; break;
                case '47000': $from = '40' ; break;
                case '48000': $from = '41' ; break;
                case '49000': $from = '42' ; break;
                case '50000': $from = '43' ; break;
                case '51000': $from = '44' ; break;
                case '52000': $from = '45' ; break;
                case '53000': $from = '46' ; break;
                case '54000': $from = '47' ; break;
                case '55000': $from = '48' ; break;
                case '56000': $from = '49' ; break;
                case '57000': $from = '50' ; break;
                case '58000': $from = '51' ; break;
                case '59000': $from = '52' ; break;
                case '60000': $from = '53' ; break;
                case '61000': $from = '54' ; break;
                case '62000': $from = '55' ; break;
                case '63000': $from = '56' ; break;
                case '64000': $from = '57' ; break;
                case '65000': $from = '58' ; break;
                case '66000': $from = '59' ; break;
                case '67000': $from = '60' ; break;
                case '68000': $from = '61' ; break;
                case '69000': $from = '62' ; break;
                case '70000': $from = '63' ; break;
                case '71000': $from = '64' ; break;
                case '72000': $from = '65' ; break;
                case '73000': $from = '66' ; break;
                case '74000': $from = '67' ; break;
                case '75000': $from = '68' ; break;
                case '76000': $from = '69' ; break;
                case '77000': $from = '70' ; break;
                case '78000': $from = '71' ; break;
                case '79000': $from = '72' ; break;
                case '80000': $from = '73' ; break;
                case '81000': $from = '74' ; break;
                case '82000': $from = '75' ; break;
                case '83000': $from = '76' ; break;
                case '84000': $from = '77' ; break;
                case '85000': $from = '78' ; break;
                case '86000': $from = '79' ; break;
                case '87000': $from = '80' ; break;
                case '88000': $from = '81' ; break;
                case '89000': $from = '82' ; break;
                case '90000': $from = '83' ; break;
                case '91000': $from = '84' ; break;
                case '92000': $from = '85' ; break;
                case '93000': $from = '86' ; break;
                case '94000': $from = '87' ; break;
                case '95000': $from = '88' ; break;
                case '96000': $from = '89' ; break;
                case '97000': $from = '90' ; break;
                case '98000': $from = '91' ; break;
                case '99000': $from = '92' ; break;
                case '100000': $from = '93' ; break;
                case '101000': $from = '94' ; break;
                case '102000': $from = '95' ; break;
                case '103000': $from = '96' ; break;
                case '104000': $from = '97' ; break;
                case '105000': $from = '98' ; break;
                case '106000': $from = '99' ; break;
                case '107000': $from = '100' ; break;
                case '108000': $from = '101' ; break;
                case '109000': $from = '102' ; break;
                case '110000': $from = '103' ; break;
                case '111000': $from = '104' ; break;
                case '112000': $from = '105' ; break;
                case '113000': $from = '106' ; break;
                case '114000': $from = '107' ; break;
                case '115000': $from = '108' ; break;
                case '116000': $from = '109' ; break;
                case '117000': $from = '110' ; break;
                case '118000': $from = '111' ; break;
                case '119000': $from = '112' ; break;
                case '120000': $from = '113' ; break;
                case '121000': $from = '114' ; break;
                case '122000': $from = '115' ; break;
                case '123000': $from = '116' ; break;
                case '124000': $from = '117' ; break;
                case '125000': $from = '118' ; break;
                case '126000': $from = '119' ; break;
                case '127000': $from = '120' ; break;
                case '128000': $from = '121' ; break;
                case '129000': $from = '122' ; break;
                case '130000': $from = '123' ; break;
                case '131000': $from = '124' ; break;
                case '132000': $from = '125' ; break;
                case '133000': $from = '126' ; break;
                case '134000': $from = '127' ; break;
                case '135000': $from = '128' ; break;
                case '136000': $from = '129' ; break;
                case '137000': $from = '130' ; break;
                case '138000': $from = '131' ; break;
                case '139000': $from = '132' ; break;
                case '140000': $from = '133' ; break;
                case '141000': $from = '134' ; break;
                case '142000': $from = '135' ; break;
                case '143000': $from = '136' ; break;
                case '144000': $from = '137' ; break;
                case '145000': $from = '138' ; break;
                case '146000': $from = '139' ; break;
                case '147000': $from = '140' ; break;
                case '148000': $from = '141' ; break;
                case '149000': $from = '142' ; break;
                case '150000': $from = '143' ; break;
            }
            echo $from; 
        }
        elseif(!isset($_POST['form_slrd'])) echo '53'; else echo $_POST['form_slrd'];
        ?>,
            values: [7000, 8000, 9000, 10000, 11000, 12000, 13000, 14000, 15000, 16000, 17000, 18000, 19000,
                20000, 21000, 22000, 23000, 24000, 25000, 26000, 27000, 28000, 29000, 30000, 31000, 32000,
                33000, 34000, 35000, 36000, 37000, 38000, 39000, 40000, 41000, 42000, 43000, 44000, 45000,
                46000, 47000, 48000, 49000, 50000, 51000, 52000, 53000, 54000, 55000, 56000, 57000, 58000,
                59000, 60000, 61000, 62000, 63000, 64000, 65000, 66000, 67000, 68000, 69000, 70000, 71000,
                72000, 73000, 74000, 75000, 76000, 77000, 78000, 79000, 80000, 81000, 82000, 83000, 84000,
                85000, 86000, 87000, 88000, 89000, 90000, 91000, 92000, 93000, 94000, 95000, 96000, 97000,
                98000, 99000, 100000, 101000, 102000, 103000, 104000, 105000, 106000, 107000, 108000,
                109000, 110000, 111000, 112000, 113000, 114000, 115000, 116000, 117000, 118000, 119000,
                120000, 121000, 122000, 123000, 124000, 125000, 126000, 127000, 128000, 129000, 130000,
                131000, 132000, 133000, 134000, 135000, 136000, 137000, 138000, 139000, 140000, 141000,
                142000, 143000, 144000, 145000, 146000, 147000, 148000, 149000, 150000
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
                if (range.from_value <= 20000) {
                    $('#period').val('7');
                    $('#period2').val('От 61 до 130 дней');
                    slider2.update({
                        from: 0
                    });
                } else if (range.from_value <= 45000) {
                    $('#period').val('14');
                    $('#period2').val('От 61 до 130 дней');
                    slider2.update({
                        from: 1
                    });
                } else if (range.from_value <= 60000) {
                    $('#period').val('21');
                    $('#period2').val('От 61 до 130 дней');
                    slider2.update({
                        from: 1
                    });
                } else if (range.from_value <= 90000) {
                    $('#period').val('21');
                    $('#period2').val('От 61 до 130 дней');
                    slider2.update({
                        from: 2
                    });
                } else if (range.from_value <= 120000) {
                    $('#period').val('30');
                    $('#period2').val('От 130 до 250 дней');
                    slider2.update({
                        from: 2
                    });
                } else {
                    $('#period').val('30');
                    $('#period2').val('От 250 до 365 дней');
                    slider2.update({
                        from: 3
                    });
                }
                $('#amount').val(range.from_value);
                $('#form_slrd').val(range.from);
            },
        }); 
        <?php require 'templates/cashnow/assets/js/loanCalculator.js';?>
        var slider = $('#rangeSlider').data('ionRangeSlider'); 
        var slider_plus = true;
        var n = 10;
        var slider_init = setInterval(function () {
            if (slider_plus) {
                n++;
            } else {
                n--;
            }
            if (n == 143 && n != <?php echo $from; ?>) {
                slider_plus = false;
            } else if (n == <?php echo $from; ?> && slider_plus == false) {
                clearInterval(slider_init);
            } else if (n == 143 && n == <?php echo $from; ?>) {
                clearInterval(slider_init);
            }

            slider.update({
                from: n
            });

            if (n <= 13) {
            slider2.update({
                from: 0
            });
            $('#period').val('7'); 
            $('#form_slrd').val(n);
            $('#amount').val(slider.result.from_value);
            } else if (n <= 38 && n > 13) {
                slider2.update({
                    from: 1
                });
                $('#period').val('14');
                $('#form_slrd').val(n);
                $('#amount').val(slider.result.from_value);
            } else if (n <= 53 && n > 38) {
                slider2.update({
                    from: 1
                });
                $('#period').val('21');
                $('#form_slrd').val(n);
                $('#amount').val(slider.result.from_value);
            } else if (n <= 83 && n > 53) {
                $('#period').val('21');
                $('#form_slrd').val(n);
                $('#amount').val(slider.result.from_value); 
                slider2.update({
                    from: 2
                });
            } else if (n <= 113 && n > 83) {
                slider2.update({
                    from: 2
                });
                $('#period').val('30');
                $('#form_slrd').val(n);
                $('#amount').val(slider.result.from_value);
            } else if (n > 113) {
                slider2.update({
                    from: 3
                });
                $('#period').val('30'); 
                $('#form_slrd').val(n);
                $('#amount').val(slider.result.from_value);
            }

        }, 5);
    </script>
    <?php
} 
elseif($this->uri->segment(1) == 'money')
{
    echo "<script>
        $('.nav-item').on('click', function () {
            $('.nav-item').removeClass('active');
            $(this).addClass('active');
        });
    </script> ";
}
elseif($this->uri->segment(1) == 'form')
{
require 'templates/common/js.php';
if(isset($_GET['popup']) and $_GET['popup']==1 ){
echo '<!-- Modal Popup-->
<div class="modal fade" id="popup" tabindex="-1" role="dialog" aria-labelledby="feedbackModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body text-center">
                <div class="row">
                    <div class="col-md-12">
                        <img src="/templates/common/img/popup.jpg">
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
}
elseif($this->uri->segment(1) == 'lk' || $this->uri->segment(1) == 'lk2')
{
echo '<script>
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
function traffic(site, page){
    $.ajax({
        type: \'POST\',
        url: \'/traffic/\',
        data: \'site=\'+site+\'&page=\'+page,
            success: function(data){
            }
    });
} 
$(".ex-offerta-block").hover(function () {
    $(".ex-offerta-block ").removeClass("ex-offerta-active");
    $(this).addClass("ex-offerta-active");
});
</script>';
}
include "googleadservices_all.php"; 
include "yandexmetrika.php"; 
include "yandex_rtb.php";
?>
        </body>

        </html>