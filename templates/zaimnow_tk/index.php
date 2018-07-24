<?php
require 'header.php';
$client_id = '6488317'; // ID приложения
$client_secret = '5fqVYjRCpEenlHbZz9qM'; // Защищённый ключ
$redirect_uri = 'https://zaimnow.tk/callback'; // Адрес сайта
$url = 'http://oauth.vk.com/authorize';

$params = array(
    'client_id'     => $client_id,
    'redirect_uri'  => $redirect_uri,
    'response_type' => 'code',
    'display' => 'popup',
    'scope' => 'email'
); 
echo'<style>
.form-2 {
    /* Size and position */
    width: 340px;
    margin: 60px auto 30px;
    padding: 15px;
    position: relative;
 
    /* Styles */
    background: #fffaf6;
    border-radius: 4px;
    color: #7e7975;
    box-shadow:
        0 2px 2px rgba(0,0,0,0.2),       
        0 1px 5px rgba(0,0,0,0.2),       
        0 0 0 12px rgba(255,255,255,0.4);
}
.form-2 h1 {
    font-size: 15px;
    font-weight: bold;
    color: #bdb5aa;
    padding-bottom: 8px;
    border-bottom: 1px solid #EBE6E2;
    text-shadow: 0 2px 0 rgba(255,255,255,0.8);
    box-shadow: 0 1px 0 rgba(255,255,255,0.8);
}
 
.form-2 h1 .log-in,
.form-2 h1 .sign-up {
    display: inline-block;
    text-transform: uppercase;
}
 
.form-2 h1 .log-in {
    color: #6c6763;
    padding-right: 2px;
}
 
.form-2 h1 .sign-up {
    color: #ffb347;
    padding-left: 2px;
}.form-2 .float {
    width: 50%;
    float: left;
    padding-top: 15px;
    border-top: 1px solid rgba(255,255,255,1);
}
 
.form-2 .float:first-of-type {
    padding-right: 5px;
}
 
.form-2 .float:last-of-type {
    padding-left: 5px;
}.form-2 label {
    display: block;
    padding: 0 0 5px 2px;
    cursor: pointer;
    text-transform: uppercase;
    font-weight: 400;
    text-shadow: 0 1px 0 rgba(255,255,255,0.8);
    font-size: 11px;
}
 
.form-2 label i {
    margin-right: 5px; /* Gap between icon and text */
    display: inline-block;
    width: 10px;
}.form-2 input[type=tel],
.form-2 input[type=password] {
    font-family: "Lato", Calibri, Arial, sans-serif;
    font-size: 13px;
    font-weight: 400;
    display: block;
    width: 100%;
    padding: 5px;
    margin-bottom: 5px;
    border: 3px solid #ebe6e2;
    border-radius: 5px;
    transition: all 0.3s ease-out;
}.form-2 input[type=tel]:hover,
.form-2 input[type=password]:hover {
    border-color: #CCC;
}
 
.form-2 label:hover ~ input {
    border-color: #CCC;
}
 
.form-2 input[type=tel]:focus,
.form-2 input[type=password]:focus {
    border-color: #BBB;
    outline: none; /* Remove Chrome"s outline */
}.clearfix:after {
    content: "";
    display: table;
    clear: both;
}
.form-2 input[type=submit],
.form-2 .log-vk, .form-2 .log-fb {
    /* Size and position */
    width: 49%;
    height: 38px;
    float: left;
    position: relative;
 
    /* Styles */
    box-shadow: inset 0 1px rgba(255,255,255,0.3);
    border-radius: 3px;
    cursor: pointer;
 
    /* Font styles */
    font-family: "Lato", Calibri, Arial, sans-serif;
    font-size: 14px;
    line-height: 38px; /* Same as height */
    text-align: center;
    font-weight: bold;
}
 
.form-2 input[type=submit] {
    margin-left: 1%;
    background: linear-gradient(#fbd568, #ffb347);
    border: 1px solid #f4ab4c;
    color: #996319;
    text-shadow: 0 1px rgba(255,255,255,0.3);
}
 
.form-2 .log-vk {
    margin-right: 1%;
    background: linear-gradient(#34a5cf, #2a8ac4);
    border: 1px solid #2b8bc7;
    color: #ffffff;
    text-shadow: 0 -1px rgba(0,0,0,0.3);
    text-decoration: none;
}
.form-2 .log-fb {
    margin-right: 1%;
    background: linear-gradient(#40798e, #386c8c);
    border: 1px solid #02314e;
    color: #ffffff;
    text-shadow: 0 -1px rgba(0,0,0,0.3);
    text-decoration: none;
}
.form-2 input[type=submit]:hover,
.form-2 .log-twitter:hover, .form-2 .log-fb:hover {
    box-shadow:
        inset 0 1px rgba(255,255,255,0.3),
        inset 0 20px 40px rgba(255,255,255,0.15);
} 
 
.form-2 input[type=submit]:active,
.form-2 .log-vk:active{
    top: 1px;
} 
.form-2 .log-fb:active{
    top: 1px;
}
.no-boxshadow .form-2 input[type=submit]:hover {
    background: #ffb347;
}
 
.no-boxshadow .form-2 .log-vk:hover {
    background: #2a8ac4;
}
.no-boxshadow .form-2 .log-fb:hover {
    background: #2a8ac4;
}
.form-2 p:last-of-type {
    clear: both;   
}
 #my_text, #help-block3 {
    font-size: 12px;
 }
 #help-block3 {
     color: red !important;
 }
.form-2 .opt {
    text-align: right;
    margin-right: 3px;
}</style>'; ?> 
        <div class="container"> 
        <div class="ex-main-section"> 
            <h1>Мгновенные онлайн займы с любой кредитной историей</h1>
            <p class="ex-text-hd">Срочные деньги без отказа. Подбор займов бесплатно!</p>
            <div class="row">
                <div class="col-lg-6">
                <form id="anketa" action="/form" method="post">
                <input type="hidden" id="amount" name="amount" value="20000" />
                <input type="hidden" id="name" name="name" value="" />
                <input type="hidden" id="email" name="email" value="" />
                <input type="hidden" id="phone" name="phone" value="" />
                <input type="hidden" id="period" name="period" value="21" />
                <input type="hidden" name="fingerprint" id="fingerprint" value="">
                <input type="hidden" id="chatbot" name="chatbot" value="false">
                <input type="hidden" id="form_slrd" name="form_slrd" value="15" />
                <input type="hidden" name="referer" value="<?php if (isset($_SERVER['HTTP_REFERER'])) echo $_SERVER['HTTP_REFERER']; ?>">
                <?php if (!empty($_REQUEST['ad_id'])) echo '<input type="hidden" name="ad_id" value="'.$_REQUEST['ad_id'].'">'; ?>
                    <div class="row justify-content-md-end">
                        <div class="col-lg-10 ">
                            <div class="ex-calc-block">
                                <div class="row justify-content-end">
                                    <div class="col-xl-6  ">
                                        <div class="ex-info-block">
                                            <div class="ex-crumbs"><span
                                                    class="ex-unique">Комиссия:</span>
                                                <span class="ex-Commission ex-result-style"></span>
                                            </div>
                                            <div class="ex-crumbs">
                                                <span class="ex-unique">К возврату:</span>
                                                <span class="ex-total ex-result-style"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ex-wrapper">
                                    <div class="ex-values">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="ex-slider-block ">
                                                    <span>Сумма займа</span>
                                                    <p class="ex-slider-val"></p>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="ex-slider-block">
                                                    <span>Срок займа</span>
                                                    <p class="ex-time"></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ex-range-slider ">
                                        <input id="rangeSlider" name="rangeSlider"/>
                                        <span class="ex-small-cost ex-left">1 000 </span>
                                        <span class="ex-small-cost ex-right">100 000 </span>
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-md-7">
                                        <div class="ex-action">
                                            <button type="submit" class="ex-main-btn">Получить деньги</button>
                                        </div> 
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div> 
                    </form>
                </div>
                <div class="col-lg-6 ">
               
                    <div class="ex-for-img d-none d-lg-block"> 
                    <?php echo '<form class="form-2">
<h1><span class="log-in">Получи займ</span> <span class="sign-up"> в один клик:</span></h1>
<p class="float">
    <label for="login"><i class="icon-user"></i>Номер телефона</label>
    <input type="tel" class="form-control ec tip special_form" name="phone" id="phone" placeholder="8 (9__) ___ ____"
    title="Введите свой номер телефона" data-validation-error-msg="Введите номер телефона" required><span id="help-block3"></span>
</p>
<p id="my_text">1) Введите Ваш номер телефона<br>2) Ввойдите через Вконтакте или Фейсбук<br>3) Получите займ!</p>
<p class="clearfix"> 
    <a href="' . $url . '?' . urldecode(http_build_query($params)) . '" class="log-vk">Вконтакте <i class="fa fa-vk" aria-hidden="true"></i></a>    
    <a href="" class="log-fb">Фейсбук <i class="fa fa-facebook" aria-hidden="true"></i></a> 
</p>
</form> ';?>
                    </div>
                    
                </div>
            </div>
           
            <div class="col-lg-12 ">
            
            
            </div>
        </div>
    </div>
    <div class="ex-why-zaim">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="row justify-content-center text-center">
                        <div class="col-lg-4 col-md-6">
                            <div class="ex-icon-block d-flex align-items-center justify-content-center">
                                <img src="/templates/zaimnow/assets/img/icons/1.png" alt="1.png">
                            </div>
                            <h3>0 рублей<br>
                                за подбор займов</h3>
                            <p>Отсутствие комиссии
                                за поиск выгодных позиций.
                                Ваша экономия – до 900 рублей.</p>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="ex-icon-block d-flex align-items-center justify-content-center">
                                <img src="/templates/zaimnow/assets/img/icons/2.png" alt="2.png">
                            </div>
                            <h3>7 минут<br>
                                на одобрение вашей заявки</h3>
                            <p>Круглосуточное и почти мгновенное одобрение позволит получить займ срочно и не обращаясь
                                в банк.</p>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="ex-icon-block d-flex align-items-center justify-content-center">
                                <img src="/templates/zaimnow/assets/img/icons/3.png" alt="3.png">
                            </div>
                            <h3>5 надёжных вариантов<br>
                                получения денег</h3>
                            <p>Даже для тех, у кого нет карты. Выбирайте сами: карта Maestro/Visa, счёт в банке,
                                CONTACT, WebMoney или Яндекс.Деньги.</p>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="ex-icon-block d-flex align-items-center justify-content-center">
                                <img src="/templates/zaimnow/assets/img/icons/4.png" alt="4.png">
                            </div>
                            <h3>1 документ<br>
                                для оформления займа</h3>
                            <p>Вам нужен лишь паспорт.
                                Мы не просим справки
                                и подтверждение доходов.</p>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="ex-icon-block d-flex align-items-center justify-content-center">
                                <img src="/templates/zaimnow/assets/img/icons/5.png" alt="5.png">
                            </div>
                            <h3>100%-ая приватность</h3>
                            <p>Европейское качество передачи
                                и защиты личных данных.</p>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="ex-icon-block d-flex align-items-center justify-content-center">
                                <img src="/templates/zaimnow/assets/img/icons/6.png" alt="6.png">
                            </div>
                            <h3>Одобрение<br>
                                с любой кредитной историей</h3>
                            <p>Ваше кредитное прошлое не имеет значения. Получите займ без отказа
                                и залога.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="ex-special-offer">
            <div class="row justify-content-center align-items-center text-center">
                <div class="col-lg-4">
                    <p>Специальное предложение
                        10 000 рублей*</p>
                    <div class="row justify-content-center">
                        <div class="col-9">
                            <button type="submit" class="ex-main-btn">Получить деньги</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <img src="/templates/zaimnow/assets/img/icons/0.png" alt="0.png">
                    <span>*в случае своевременного погашения </span>
                </div>
            </div>
        </div>
        <div class="ex-info-zaim">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="ex-info-zaim-block">
                    <a href="/best">
                        <div class="row">
                            <div class="col-lg-8">
                                <h3>Что лучше взять: кредит или займ?</h3>
                                <p>Что удобнее и оперативнее: кредит или займ? Это главный вопрос, когда требуются
                                    срочные деньги на разрешение непредвиденной ситуации.
                                    Для получения кредита необходимо пойти в банк и заключить кредитный договор, а
                                    возможно и предварительно пройти проверки и собрать необходимые справки. Конечно,
                                    кредит выигрывает по сравнению с онлайн займом, если необходима заметно большая
                                    сумма денег.</p>
                            </div>
                            <div class="col-lg-4">
                                <div class="ex-info-image">
                                    <img src="/templates/zaimnow/assets/img/info1.png" alt="info1.png">
                                </div>
                            </div>
                        </div>
                        </a>
                    </div>
                    <div class="ex-info-zaim-block">
                    <a href="/specials">
                        <div class="row">
                            <div class="col-lg-8">
                                <h3>Особенности деятельности микрофинансовых компаний</h3>
                                <p>В чём особенность работы микрофинансовых организаций, предоставляющих срочные займы
                                    населению? Данные учреждения плотно взаимодействуют и с физическими, и с
                                    юридическими лицами. Последние вправе инвестировать в МФО любую денежную сумму. А
                                    вот физические лица ограничены: они могут открыть свой счёт в описываемых
                                    организациях на сумму с минимальным лимитом 1,5 млн. руб.
                                </p>
                            </div>
                            <div class="col-lg-4">
                                <div class="ex-info-image">
                                    <img src="/templates/zaimnow/assets/img/info2.png" alt="info2.png">
                                </div>
                            </div>
                        </div>
                        </a>
                    </div>
                    <div class="ex-info-zaim-block">
                    <a href="/credit-history">
                        <div class="row">
                            <div class="col-lg-8">
                                <h3>Кредитная история и её особенности</h3>
                                <p>Вне всяких сомнений, кредитная история – это наиважнейший параметр заемщика для
                                    банковских учреждений и микрофинансовых компаний. На основе этого фактора можно
                                    проанализировать надёжность и платёжеспособность клиента.</p>
                            </div>
                            <div class="col-lg-4">
                                <div class="ex-info-image">
                                    <img src="/templates/zaimnow/assets/img/info3.png" alt="info3.png">
                                </div>
                            </div>
                        </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="ex-two-block">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="row justify-content-center h-100">
                        <div class="col-xl-4 col-md-6 text-center">
                            <div class="ex-cards-block">
                                <figure>
                                    <img src="/templates/zaimnow/assets/img/icons/card.png" alt="card.png">
                                </figure>
                                <p class="ex-count-zaim">
                                    5 000
                                    <i></i>
                                </p>
                                <table>
                                    <tr>
                                        <td>Основная ставка</td>
                                        <td>1.1 %</td>
                                    </tr>
                                    <tr>
                                        <td>Cрок займа</td>
                                        <td>от 61 дня</td>
                                    </tr>
                                </table>
                                <div >
                                    <a href="/form?amount=5000"><button type="button" class="ex-main-btn">Получить деньги</button></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6 text-center">
                            <div class="ex-cards-block">
                                <figure>
                                    <img src="/templates/zaimnow/assets/img/icons/rocket.png" alt="rocket.png">
                                </figure>
                                <p class="ex-count-zaim">
                                    30 000
                                    <i></i>
                                </p>
                                <table>
                                    <tr>
                                        <td>Основная ставка</td>
                                        <td>1 %</td>
                                    </tr>
                                    <tr>
                                        <td>Cрок займа</td>
                                        <td>от 130 дней</td>
                                    </tr>
                                </table>
                                <div>
                                <a href="/form?amount=30000"><button type="button" class="ex-main-btn">Получить деньги</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="ex-methods-zaim">
        <div class="owl-carousel owl-theme">
            <div class="item">
                <h3>Вячеслав Петренко, г. Москва, 32 года</h3>
                <figure>
                    У меня неравномерный доход, как и у любого таксиста, и я очень хорошо знаю, как это когда вдруг
                    заканчиваются деньги… А тут как назло машина сломалась, и денег совсем не было! Знакомый подсказал
                    сайт займов Zaimnow.ru Сказал что это надёжная компания, не обманывают. Всё так
                    и оказалось, здесь мне бесплатно подобрали срочный займ, одобрили сразу и перевели деньги
                    минут через 15, не больше. Спасибо за помощь!
                </figure>

            </div>
            <div class="item">
                <h3>Курбанов Руслан, г. Тамбов, 29 лет</h3>
                <figure>
                    Спасибо огромное, что бы я делал без помощи вашего сервиса!!! Мне просрочили аванс на работе,
                    а в этот же вечер я должен был платить за съемную квартиру. Родственников почти нет, а друзья сами
                    все на мели. Не имея совсем времени, я кинулся в интернет, начал сравнивать сервисы онлайн займов.
                    Оказалось, что везде просят денег за поиск вариантов, а вот у вас это делают бесплатно! Конечно же
                    взял сразу здесь несколько тысяч и через 20 минут уже снимал с карты займ! Порядочный сервис,
                    рекомендую.
                </figure>
            </div>
            <div class="item">
                <h3>Глущенко Алия, г. Саратов, 33 года</h3>
                <figure>
                    Нашу маленькую квартирку затопили соседи сверху и это никак не входило в финансовые планы…(( Двое
                    маленьких деток на руках, надо было как-то срочно сделать ремонт. Оказалось, что у мужа
                    на работе уже несколько человек пользуются вашим Zaimnow.ru, берут займы срочно, ну и мы тоже сюда
                    обратились. Заявку нам одобрили сразу и предложили несколько вариантов займов на выбор. Мы выбрали и
                    через минут 10 деньги пришли на карточку.
                    Спасибо за поддержку, всё вернём вовремя!))
                </figure>
            </div>
        </div>
    </div>
</main>

<?php
require 'bot.php';
$client_id = '578516362116657'; // Client ID
$client_secret = 'eb1814bd3980ab9a306dc35073021fb3'; // Client secret
$redirect_uri = 'https://zaimnow.tk/callback'; // Redirect URIs


?>  
<?php require 'footer.php'; ?>