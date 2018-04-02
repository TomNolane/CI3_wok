<?php 
if(!isset($my_title))
{
	$my_title = 'Подача Заявки на Получение Займа Онлайн | Сервис cashnow.su';
	$description = 'Хотите получить денежный заем в сжатые сроки?Тогда заполните несложную форму заявка на нашем онлайн-сервисе по выдаче денежных займов в России';
}  
require 'header.php'; 

if(isset($_SERVER['HTTP_REFERER'])){
    $referer = $_SERVER['HTTP_REFERER'];
    parse_str($_SERVER['HTTP_REFERER'], $output);
        if(isset($output['utm_source'])){
            switch ($output['utm_source']) {
                case 'vk':
                    $utm = '1';
                    break;
                case 'direct':
                    $utm = '2';
                    break;
                case 'mytarget':
                    $utm = '3';
                    break; 
                case 'google':
                    $utm = '4';
                    break;    
                case 'google_cms':
                    $utm = '5';
                    break;
                default:
                    $utm = '0';
            }
        }else{
            $utm = ''; 
        }
    $ad_id = '4'.$utm;
} else {
    $referer = $_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
    $ad_id = '4';
}
?>
<style>
    input:invalid:not(:placeholder-shown) {
        border-color: red;
    }

    input:valid:not(:placeholder-shown) {
        border-color: green;
    }

    .help-block2 {
        display: none;
        margin-bottom: 5px;
        margin-top: 2px;
        font-size: 0.8em;
        float: left;
        color: red !important;
    }
</style>
<main class="ex-form">
    <div class="container">
        <h1 class="text-center">Заполните анкету и получите деньги</h1>
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="ex-bg-form">
                    <form id="anketa" action="/lk" method="post" class="form-horizontal" onsubmit="return validate();" autocomplete="off">
                        <input type="hidden" name="display" id="display" value="0">
                        <input type="hidden" name="referer" value="<?=$referer?>">
                        <input type="hidden" name="id" value="">
                        <input type="hidden" name="step" value="1">
                        <input type="hidden" name="ad_id" value="<?=$ad_id?>">
                        <input type="hidden" id="amount" name="amount" value="<?php if(isset($_GET['amount'])) { $sum = '20000'; switch($_GET['amount']) { case '1000': $sum = '1000' ; break; case '2000': $sum = '2000' ; break; case '3000': $sum = '3000' ; break; case '4000': $sum = '4000' ; break; case '5000': $sum = '5000' ; break; case '6000': $sum = '6000' ; break; case '7000': $sum = '7000' ; break; case '8000': $sum = '8000' ; break; case '9000': $sum = '9000' ; break; case '10000': $sum = '10000' ; break; case '11000': $sum = '11000' ; break; case '12000': $sum = '12000' ; break; case '13000': $sum = '13000' ; break; case '14000': $sum = '14000' ; break; case '15000': $sum = '15000' ; break; case '20000': $sum = '20000' ; break; case '25000': $sum = '25000' ; break; case '30000': $sum = '30000' ; break; case '40000': $sum = '40000' ; break; case '50000': $sum = '50000' ; break; case '80000': $sum = '80000' ; break; case '100000': $sum = '100000' ; break; } echo $sum; if ($sum <= 10000) { $period = '7'; } else if ($sum <= 15000) { $period = '14'; } else if ($sum <= 20000) { $period = '21'; } else if ($sum <= 30000) { $period = '21'; } else if ($sum <= 50000) { $period = '30'; } else { $period = '30'; } } elseif(!isset($_POST['amount'])) echo '20000'; else echo $_POST['amount'];  ?>"
                        />
                        <input type="hidden" id="period" name="period" value="<?php if(isset($period)) { echo $period; } else echo empty($_POST['period'])? 21 : $_POST['period']; ?>"
                        />
                        <div class="tab-content">



                            <div class="row">
                                <div class="col-lg-8 offset-lg-1">
                                    <div class="form-group row hidden">
                                        <label class="col-md-3  d-flex align-items-center justify-content-md-end" for="f">Фамилия</label>
                                        <div class="col-md-9">
                                            <div class="ex-wrapper">
                                                <input type="text" class="form-control ec tip special_form" name="f" id="f" placeholder="Фамилия" title="Введите свою фамилию"
                                                    data-sanitize="capitalize" data-validation="custom" value="Иванова" data-validation-regexp="^[А-Яа-яЁё\-\s]+$"
                                                    data-validation-error-msg="Введите свою фамилию" required>
                                                <p class="text-muted helpblock">Пример: Иванова</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 d-flex align-items-center justify-content-md-end" for="i">Имя</label>
                                        <div class="col-md-9">
                                            <div class="ex-wrapper">
                                                <input type="text" class="form-control ec tip special_form" name="i" id="i" placeholder="Имя" title="Введите свое имя" data-sanitize="capitalize"
                                                    data-validation="custom" data-validation-regexp="^[А-Яа-яЁё\-\s]+$" data-validation-error-msg="Введите свое имя"
                                                    required>
                                                <p class="text-muted helpblock">Пример: Лариса</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row hidden">
                                        <label class="col-md-3 d-flex align-items-center justify-content-md-end" for="o">Отчество</label>
                                        <div class="col-md-9">
                                            <div class="ex-wrapper">
                                                <input type="text" class="form-control ec tip special_form" name="o" id="o" placeholder="Отчество" title="Введите свое отчество"
                                                    data-sanitize="capitalize" data-validation="custom" value="Иванова" data-validation-regexp="^[А-Яа-яЁё\-\s]+$"
                                                    data-validation-error-msg="Введите свое отчество" required>
                                                <p class="text-muted helpblock">Пример: Ивановна</p>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" id="gender" value="1" name="gender">
                                    <!-- Скрываем старую форму даты рождения -->
                                    <div class="form-group hidden">
                                        <label class="col-sm-4 control-label label-required hidden-xs" for="birth_dd">Дата рождения*</label>
                                        <div class="col-sm-2">
                                            <div class="shadow">
                                                <select size="1" class="form-control ec" id="birth_dd" name="birth_dd">
                                                    <option>выбери</option>
                                                    <option value="0">День</option>
                                                    <?php for($i=1;$i<=31;$i++) echo '<option value="'.(($i<10)? '0' : '').$i.'">'.$i.'</option>'; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="shadow">
                                                <label class="col-sm-4 control-label label-required hidden-xs" for="birth_mm">Дата рождения</label>
                                                <select size="1" class="form-control ec" id="birth_mm" name="birth_mm">
                                                    <option>выбери</option>
                                                    <option value="0">Месяц</option>
                                                    <option value="01">Январь</option>
                                                    <option value="02">Февраль</option>
                                                    <option value="03">Март</option>
                                                    <option value="04">Апрель</option>
                                                    <option value="05">Май</option>
                                                    <option value="06">Июнь</option>
                                                    <option value="07">Июль</option>
                                                    <option value="08">Август</option>
                                                    <option value="09">Сентябрь</option>
                                                    <option value="10">Октябрь</option>
                                                    <option value="11">Ноябрь</option>
                                                    <option value="12">Декабрь</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="shadow">
                                                <label class="col-sm-4 control-label label-required hidden-xs" for="birth_yyyy">Дата рождения</label>
                                                <select size="1" class="form-control ec" id="birth_yyyy" name="birth_yyyy">
                                                    <option>выбери</option>
                                                    <option value="0">Год</option>
                                                    <?php
                                for($i=date('Y', strtotime('-80 years', time()));$i<=date('Y', strtotime('-18 years', time()));$i++)
                                echo '<option value="'.$i.'">'.$i.'</option>';
                            ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Скрываем старую форму даты рождения -->
                                    <div class="form-group row hidden">
                                        <label class="control-label col-md-3 d-flex align-items-center justify-content-md-end" for="birthdate">Дата рождения</label>
                                        <div class="col-md-9">
                                            <div class="ex-wrapper">
                                                <input type="text" class="form-control ec tip" id="birthdate" name="birthdate" placeholder="Дата рождения" title="Выберете свою дату рождения"
                                                    data-validation="custom" value="06/02/2000" data-validation-regexp="^[0-9]{2}\/[0-9]{2}\/[0-9]{4}$"
                                                    data-validation-error-msg="Выберите дату рождения" required>
                                                <p class="text-muted helpblock">Пример: 06/02/2000</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-3 d-flex align-items-center justify-content-md-end" for="phone" id="spec_form2">Телефон</label>
                                        <div class="col-md-9">
                                            <div class="ex-wrapper">
                                                <input type="tel" class="form-control ec tip special_form" name="phone" id="phone" placeholder="Введите свой номер телефона"
                                                    title="Введите свой номер телефона" data-validation-error-msg="Введите номер телефона"
                                                    required>
                                                <span id="phonestatus" class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                                <p class="text-muted helpblock">Пример: 8 (977) 777 7777</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-3 d-flex align-items-center justify-content-md-end" for="email">Email</label>
                                        <div class="col-md-9">
                                            <div class="ex-wrapper">
                                                <input type="email" class="form-control ec tip special_form" name="email" id="email" title="Введите свой email адрес" placeholder="Email"
                                                    data-validation="email" data-validation-error-msg="Введите свой email" required>
                                                <p class="text-muted helpblock">Пример: email@mail.ru</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row hidden">
                                        <label class="control-label col-md-3 d-flex align-items-center justify-content-md-end" for="credit">Кредитная история</label>
                                        <div class="col-md-9">
                                            <div class="ex-wrapper ex-arrow">
                                                <select class="form-control ec special_form99" name="delays_type" id="delays_type">
                                                    <option selected value="never">Никогда не брал(а) кредитов</option>
                                                    <option value="credit_closed_no_delay">Кредиты закрыты, просрочек не было</option>
                                                    <option value="credit_open_no_delay">Кредиты есть, просрочек нет</option>
                                                    <option value="credit_closed_had_delay">Кредиты закрыты, просрочки были</option>
                                                    <option value="had_delay">Просрочки были, сейчас нет</option>
                                                    <option value="has_delay">Просрочки сейчас есть</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row hidden">
                                        <div class="col-md-9  offset-md-3  ex-agreement-check">
                                            <label class="checkbox-inline">
                                                <span>Я согласен на обработку персональных данных и с публичной офертой</span>
                                                <input type="checkbox" id="agree" value="1" checked>
                                                <i></i>
                                            </label>
                                            <label class="hidden">
                                                <input type="checkbox" id="marketing" value="1" checked>
                                                <b>Я согласен(на) получать маркетинговые рассылки с предложениями микрозаймов</b>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-9 offset-md-3">
                                            <div class="row justify-content-center">
                                                <div class="col-md-6 text-center" >
                                                    <button  style="display: block" type="button" id="submitOne"  class="nav nav-tabs ex-main-btn"><span class="text-center">Получить деньги</span></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        </div> 
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
<?php require 'footer.php'; ?>