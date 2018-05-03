<?php 
$my_title = ''; $description = ''; 
switch($this->uri->segment(1))
{
	case 'about': 
		$my_title = 'Лучший Онлайн Сервис в РФ по Подбору Выгодных Займов'; 
		$description = 'Zaimsoon осуществляет посреднические услуги между клиентом, который хочет получить деньги в заём, и кредитным учреждением, чья деятельность лицензирована';
		break;
	case 'faq': 
		$my_title = 'Часто задаваемые вопросы, возникающие при получении займов'; 
		$description = 'В данном разделе Вы найдете ответы на самые часто задаваемые вопросы об условиях получения срочных займах и особенностях предоставления данных';
		break;
	case 'oferta':
		$my_title = 'Публичная Оферта Онлайн Сервиса по Предоставлению Займов'; 
		$description = 'Сайт имеет право изменить условия настоящего Соглашения разместив на сайте новою редакцию Соглашения. Изменения вступают в силу через 5 (пять) рабочих дней';
		break;
	case 'money':
		$my_title = 'Способы получения денег'; 
		$description = 'Способы получения денег на банковскую карту, яндекс деньги, qiwi - кошелек, через банковский перевод или через систему Contact';
		break;
	case 'zaim-card': 
		$my_title = 'Мгновенные Займы на Банковскую Карту Онлайн без Отказа'; 
		$description = 'Хотите получить заем на Вашу банковскую карту в сжатые сроки?Тогда заполните несложную форму заявка на нашем онлайн-сервисе по выдаче денежных займов в России';
		break;
	case 'zaim-qiwi': 
		$my_title = 'Получение Займа Онлайн на Киви Кошелек Круглосуточно'; 
		$description = 'Заём на QIWI-кошелек – это отличный способ быстро получить деньги.Уже спустя максимум полчаса у вас на счету появятся средства';
		break;
	case 'zaim-yandex': 
		$my_title = 'Получение Срочных Займов на Яндекс.Деньги БЕЗ Отказа'; 
		$description = 'Благодаря нашему онлайн-сервису, Вы можете мгновенно получить денежный заем через платежную систему Yandex без поручителей и справок круглосуточно';
		break;
	case 'zaim-contact': 
		$my_title = 'Получить Займ через Систему Contact Быстро'; 
		$description = 'Чтобы получить быстрые деньги переводом Контакт,нужно заполнить форму на нашем сайте, после чего в течение 10 минут будет прислан ответ предоставлении займа';
		break;
	case 'zaim-bank': 
		$my_title = 'Срочный Займ на Банковский Счет БЕЗ Проверок'; 
		$description = 'Оформление моментального займа на банковский счет в среднем занимает 15 минут без отказа и поручителей, мы принимаем заявки круглосуточно';
		break;
	case 'zaim-bank': 
		$my_title = 'Срочный Займ на Банковский Счет БЕЗ Проверок'; 
		$description = 'Оформление моментального займа на банковский счет в среднем занимает 15 минут без отказа и поручителей, мы принимаем заявки круглосуточно';
		break;
	case 'agree': 
		$my_title = 'Пользовательское Соглашение для Получения Займа'; 
		$description = 'Для того, чтобы Клиент мог получить необходимый ему займ, он должен предоставить только достовереные и актуальные персональные данные';
		break;
	case 'soglasie': 
		$my_title = 'Соглашение на Обработку Данных для Получения Займа'; 
		$description = 'Условия получения мгновенных займов и кредитов с помощью лучшего онлайн сервиса  Zaimsoon с самой низкой процентной ставкой';
		break;
	case 'rules': 
		$my_title = 'Основные Правила для Предоставления Срочных Займов'; 
		$description = 'Онлайн сервис  Zaimsoon предоставления срочных займов и кредитов с самой низкой процентной ставкой предоставляет условия для получения займов';
        break;
    case 'allarticles': 
		$my_title = 'Статьи о займах'; 
		$description = 'Актуальные статьи о займах и кредитах. О том как правильно взять займ, погасить его, как  оформить заявку на кредит с плохой кредитной историей и многое другое.';
		break;
	case 'microloans':
		$my_title = 'Микрозаймы и их неоспоримые преимущества'; 
		$description = 'Началом истории микрозаймов и микрофинансирования в мире считается 1976 г. Тогда профессор
						Мухаммед Юнус из Бангладеша стал заниматься выдачей небольших займов нуждающимся жителям. При
						этом он выдавал срочные деньги с условием того, что заемщики обязательно должны были развить
						семейный бизнес или организовать собственное дело.';
		break;
	case 'credits-history':
		$my_title = 'Как получить микрозайм при плохой кредитной истории'; 
		$description = 'Не нужно считать плохую кредитную историю неисправимой ситуацией и приговором. Действительно, в
		таких условиях взять долгосрочный займ в банках достаточно сложно. Вероятность отказа по продуктам с низкой процентной ставкой, а также по ипотечным кредитам заметно высока.';
		break;
	case 'lender-and-borrower':
		$my_title = 'Заимодавец и заёмщик: их особенности и отличия'; 
		$description = 'Если вы время от времени прибегаете к финансовой помощи сторонних организаций, то вам будет
		полезно знать о некоторых нюансах финансовых сделок. Рассмотрим участников микрозайма – заемщика и заимодавца.';
		break;
	case 'microfinance':
		$my_title = 'Микрофинансирование – его возникновение и развитие'; 
		$description = 'Началом истории микрозаймов и микрофинансирования в мире считается 1976 г. Тогда профессор
		Мухаммед Юнус из Бангладеша стал заниматься выдачей небольших займов нуждающимся жителям. При
		этом он выдавал срочные деньги с условием того, что заемщики обязательно должны были развить
		семейный бизнес или организовать собственное дело.';
		break;
	default: $my_title = 'Срочные Займы Круглосуточно без Проверок Онлайн'; $description = 'Zaimsoon - лучший онлайн сервис по выдаче мгновенных займов и кредитов без проверки вашей кредитной истории.Только у нас лучшие кредитные предложения!'; break;
} 
    if ($this->uri->segment(1) == 'about') require 'internal-about.php';
    elseif ($this->uri->segment(1) == 'faq') require 'internal-faq.php';
    elseif ($this->uri->segment(1) == 'rules') require 'internal-rules.php';
	elseif ($this->uri->segment(1) == 'oferta') require 'internal-oferta.php';
	elseif ($this->uri->segment(1) == 'soglasie') require 'internal-soglasie.php';
	elseif ($this->uri->segment(1) == 'zaim-bank') require 'internal-zaim-bank.php'; 
	elseif ($this->uri->segment(1) == 'zaim-qiwi') require 'internal-zaim-qiwi.php';
	elseif ($this->uri->segment(1) == 'zaim-yandex') require 'internal-zaim-yandex.php';
	elseif ($this->uri->segment(1) == 'zaim-contact') require 'internal-zaim-contact.php';
	elseif ($this->uri->segment(1) == 'zaim-card') require 'internal-zaim-card.php';
	elseif ($this->uri->segment(1) == 'microloans') require 'internal-microloans.php';
	elseif ($this->uri->segment(1) == 'money') require 'internal-money.php';
	elseif ($this->uri->segment(1) == 'credits-history') require 'internal-credits-history.php';
	elseif ($this->uri->segment(1) == 'lender-and-borrower') require 'internal-lender-and-borrower.php';
	elseif ($this->uri->segment(1) == 'allarticles') require 'internal-allarticles.php';
	elseif ($this->uri->segment(1) == 'microfinance') require 'internal-microfinance.php';
?>