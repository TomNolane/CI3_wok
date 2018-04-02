<?php 
if(!isset($my_title)) 
	$my_title = 'Срочные займы круглосуточно без проверок Онлайн';

if(!isset($description))
	$description = 'Cashnow - лучший онлайн сервис по выдаче мгновенных займов и кредитов без проверки вашей кредитной истории. Только у нас лучшие кредитные предложения!';
?>
<!doctype html>
<html lang="ru">
<head>
    <title><?php echo $my_title;?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="<?php echo $description;?>" />
    <meta name="Keywords" content="моментальный заем, займы, онлайн, деньги" />
    <meta name="robots" content="all" />
    <meta name="copyright" lang="ru" content="Cashnow1.tk" />  
    <meta property="og:title" content="Срочные займы круглосуточно без проверок Онлайн" />
    <meta property="og:description" content="Cashnow - лучший онлайн сервис по выдаче мгновенных займов и кредитов без проверки вашей кредитной истории.Только у нас лучшие кредитные предложения!"/>
    <meta property="og:image" content="https://Cashnow1.tk/templates/cashnow1_tk/assets/img/bg-start.png"/>
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://Cashnow1.tk/" />
    <meta name="twitter:card" content="https://Cashnow1.tk/templates/cashnow1_tk/assets/img/bg-start.png"/>
    <meta name="twitter:title" content="Срочные займы круглосуточно без проверок Онлайн"/>
    <meta name="twitter:description" content="Cashnow - лучший онлайн сервис по выдаче мгновенных займов и кредитов без проверки вашей кредитной истории.Только у нас лучшие кредитные предложения!"/>
    <meta name="twitter:image:src" content="https://Cashnow1.tk/templates/cashnow1_tk/assets/img/bg-start.png"/>
    <meta name="twitter:url" content="https://Cashnow1.tk/"/>
    <meta name="twitter:domain" content="Cashnow1.tk"/>
    <!-- favicon -->
    <link rel="shortcut icon" type="image/png" href="/templates/cashnow1_tk/favicon/favicon.ico" /> 
    <link rel="icon" type="image/png" sizes="16x16" href="/templates/cashnow1_tk/favicon/favicon.png">
    <?php 
        echo '<!-- style --> ';
        echo '<style>';
        require "templates/cashnow1_tk/assets/css/style.css"; 
        echo '</style>';
        echo '<style>';
        require "templates/cashnow1_tk/assets/css/uniqueSingle.css";
        echo '</style>';
        echo '<style>';
        require "templates/cashnow1_tk/assets/css/suggestions.min.css";
        echo '</style>';
        echo '<style>'; 
		echo '.tip-twitter {
			opacity:0.8;
			z-index:1000;
			text-align:left;
			border-radius:4px;
			-moz-border-radius:4px;
			-webkit-border-radius:4px;
			padding:8px 8px;
			max-width:200px;
			color:#fff;
			background-color:#000; 
		}
		.tip-twitter .tip-inner {
			font:bold 11px/14px "Lucida Grande",sans-serif;
		}
		.tip-twitter .tip-arrow-top {
			margin-top:-5px;
			margin-left:-5px; /* approx. half the width to center it */
			top:0;
			left:50%;
			width:9px;
			height:5px;
			background:url(/templates/cashnow1_tk/assets/img/tip-twitter_arrows.gif) no-repeat;
		}
		.tip-twitter .tip-arrow-right {
			margin-top:-4px; /* approx. half the height to center it */
			margin-left:0;
			top:50%;
			left:100%;
			width:5px;
			height:9px;
			background:url(/templates/cashnow1_tk/assets/img/tip-twitter_arrows.gif) no-repeat -9px 0;
		}
		.tip-twitter .tip-arrow-bottom {
			margin-top:0;
			margin-left:-5px; /* approx. half the width to center it */
			top:100%;
			left:50%;
			width:9px;
			height:5px;
			background:url(/templates/cashnow1_tk/assets/img/tip-twitter_arrows.gif) no-repeat -18px 0;
		}
		.tip-twitter .tip-arrow-left {
			margin-top:-4px; /* approx. half the height to center it */
			margin-left:-5px;
			top:50%;
			left:0;
			width:5px;
			height:9px;
			background:url(/templates/cashnow1_tk/assets/img/tip-twitter_arrows.gif) no-repeat -27px 0;
		}'; 
		echo '</style>';
        if ($this->uri->segment(1) == 'lk' || $this->uri->segment(1) == 'lk2') 
        {
            echo '<style>';
            require "templates/cashnow1_tk/assets/css/style_lk.css";
            echo '</style>';
        } 

        if ($this->uri->segment(1) == 'form') 
        {
        echo '<style>#ya-rtb{display: none;}</style>
        <style>
            .has-error .help-block {
                display : none;
            }
            .ex-form .ex-anketa-main .form-group input {
                padding: 15px 5px 15px 15px;
            } 
            ::placeholder {
                font-size: 13px !important;
            }
            ::-webkit-input-placeholder {
                font-size: 13px !important;
            }
            ::-moz-placeholder {
                font-size: 13px !important;
            }
            .ex-form .ex-anketa-main .form-group select {
                font-size: 14px;
                padding: 15px 35px 15px 5px;
            }
            .ex-wrapper {
                margin-bottom: 20px;
            }
            .ex-form .ex-anketa-main .form-group {
                padding-bottom: 0px !important;
            }
            #passport_code::placeholder , #passportdate::placeholder{
                font-size: 10px !important; 
            }
            #passport_code::-moz-placeholder, #passportdate::-moz-placeholder {
                font-size: 10px !important; 
            }
            #passport_code::-webkit-input-placeholder, #passportdate::-webkit-input-placeholder {
                font-size: 10px !important; 
            }
            .irs-single { 
                 margin-left: -32px !important; 
        }
        .asd {
            display: inline-block !important ;
          vertical-align: middle !important;
          margin-bottom: 0 !important;
        } 
        </style>';
    }
    ?>
    <!--[if lte IE 9]>
    <script src="/modules/html5shiv/html5shiv.js"></script>
    <![endif]-->  
    <?php if ($this->uri->segment(1) != 'form') {
        require 'templates/common/googlesyndication.php';
        
    }
        echo '<!-- Сендпульс Sendpulse -->';
        require 'sendpuls.php';
    ?>
</head>
<?php
if ($this->uri->segment(1) != '404') {
    echo '<body class="ex-sticky">
    <nav class="navbar navbar-expand-lg ex-main-header">
        <div class="container">
            <a class="ex-brand navbar-brand" href="/"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
                    aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end " id="navbarCollapse">
                <ul class="navbar-nav">
                    <li class="nav-item ">
                        <a class="ex-dropdown nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">документы</a>
                        <i></i>
                        <div class="dropdown-menu justify-content-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/oferta">Публичная оферта</a>
                        <a class="dropdown-item" href="/agreement">Согласие на обработку данных</a>
                        <a class="dropdown-item" href="/rules">Правила предоставления займов</a>
                        </div>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="/about">О сервисе</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/faq">FAQ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="/money">Получение денег</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link ex-ask-question" href="#">Обратная связь</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>';
}
else
{
    echo '<body class="ex-sticky">';
}
?>
<!-- Modal -->
<div id="askQuestion" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center"> 
                <h6 class="modal-title" id="feedbackModalLabel">Остались вопросы?<br>Просто заполните форму и наш специалист свяжется с Вами</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="ex-wrapper">
                                    <i class="ex-user"></i>
                                    <input type="text" class="form-control" id="feedback-name" placeholder="Имя" title="Имя" required>
                                </div>
                            </div>
                            <div class="form-group hidden">
                                <input type="tel" class="form-control input-lg" id="feedback-phone" placeholder="Телефон" title="Телефон" value="79777777736">
                            </div>
                            <div class="col-md-6">
                                <div class="ex-wrapper">
                                    <i class="ex-email"></i>
                                    <input type="email" class="form-control" id="feedback-email" placeholder="Email" title="Email" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="ex-wrapper">
                            <i class="ex-message"></i>
                            <textarea id="feedback-comment" rows="3" placeholder="Текст вашего сообщения" title="Текст вашего сообщения" required></textarea>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <button type="button" id="feedback-send" class="ex-main-btn">Отправить</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
