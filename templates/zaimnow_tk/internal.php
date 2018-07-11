<?php 
if ($this->uri->segment(1) == 'robots.txt') 
{
	header("Content-type: text/plain");  
	require 'internal-robots.txt.php'; 
} 
else
{
	$my_title = ''; $description = ''; 
	switch($this->uri->segment(1))
	{
		case 'about': 
			$my_title = 'Лучший Онлайн Сервис в РФ по Подбору Выгодных Займов'; 
			$description = 'Zaimnow.ru осуществляет посреднические услуги между клиентом, который хочет получить деньги в заём, и кредитным учреждением, чья деятельность лицензирована';
			break;
		case 'faq': 
			$my_title = 'Часто задаваемые вопросы, возникающие при получении займов'; 
			$description = 'В данном разделе Вы найдете ответы на самые часто задаваемые вопросы об условиях получения срочных займах и особенностях предоставления данных';
			break;
		case 'oferta': 
			$my_title = 'Публичная Оферта Онлайн Сервиса по Предоставлению Займов'; 
			$description = 'Сайт имеет право изменить условия настоящего Соглашения разместив на сайте новою редакцию Соглашения. Изменения вступают в силу через 5 (пять) рабочих дней';
			break;
		case 'documents': 
			$my_title = 'Публичная оферта Онлайн Сервиса по Предоставлению Займов'; 
			$description = 'Сайт имеет право изменить условия настоящего Соглашения разместив на сайте новою редакцию Соглашения. Изменения вступают в силу через 5 (пять) рабочих дней';
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
			$description = 'Условия получения мгновенных займов и кредитов с помощью лучшего онлайн сервиса  Zaimnow.ru с самой низкой процентной ставкой';
			break;
		case 'rules': 
			$my_title = 'Основные Правила для Предоставления Срочных Займов'; 
			$description = 'Онлайн сервис  Zaimnow.ru предоставления срочных займов и кредитов с самой низкой процентной ставкой предоставляет условия для получения займов';
			break;
		case 'allarticles': 
			$my_title = 'Статьи о займах'; 
			$description = 'Актуальные статьи о займах и кредитах. О том как правильно взять займ, погасить его, как  оформить заявку на кредит с плохой кредитной историей и многое другое.';
			break;


		case 'credit-history':
			$my_title = 'Кредитная история и её особенности'; 
			$description = 'Вне всяких сомнений, кредитная история – это наиважнейший параметр заемщика для	банковских учреждений и микрофинансовых компаний. На основе этого фактора можно проанализировать надёжность и платёжеспособность клиента.';
			break;
		case 'specials':
			$my_title = 'Особенности деятельности микрофинансовых компаний'; 
			$description = 'В чём особенность работы микрофинансовых организаций, предоставляющих срочные займы населению? Данные учреждения плотно взаимодействуют и с физическими, и с юридическими лицами. Последние вправе инвестировать в МФО любую денежную сумму. А вот физические лица ограничены: они могут открыть свой счёт в описываемых организациях на сумму с минимальным лимитом 1,5 млн. руб.';
			break;
		case 'best':
			$my_title = 'Что лучше взять: кредит или займ?'; 
			$description = 'Что удобнее и оперативнее: кредит или займ? Это главный вопрос, когда требуются срочные деньги на разрешение непредвиденной ситуации. Для получения кредита необходимо пойти в банк и заключить кредитный договор, а возможно и предварительно пройти проверки и собрать необходимые справки. Конечно, кредит выигрывает по сравнению с онлайн займом, если необходима заметно большая сумма денег.';
			break;
		default: $my_title = 'Срочные Займы Круглосуточно без Проверок Онлайн'; $description = 'Zaimnow.ru - лучший онлайн сервис по выдаче мгновенных займов и кредитов без проверки вашей кредитной истории.Только у нас лучшие кредитные предложения!'; break;
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
		elseif ($this->uri->segment(1) == 'allarticles') require 'internal-allarticles.php';
		elseif ($this->uri->segment(1) == 'credit-history') require 'internal-credit-history.php';
		elseif ($this->uri->segment(1) == 'specials') require 'internal-specials.php';
		elseif ($this->uri->segment(1) == 'best') require 'internal-best.php';
		elseif ($this->uri->segment(1) == 'money') require 'internal-money.php';
		elseif ($this->uri->segment(1) == 'callback') { require 'internal-callback.php'; }
		elseif ($this->uri->segment(1) == 'callback2') { require 'internal-callback2.php'; }
		elseif ($this->uri->segment(1) == 'bot-api') { require 'internal-bot-api.php'; }
		elseif ($this->uri->segment(1) == 'send-bot') { require 'internal-send-bot.php'; }
		elseif ($this->uri->segment(1) == 'aboutt') require 'internal-aboutt.php';
		elseif ($this->uri->segment(1) == 'abouttt') require 'internal-abouttt.php';
		elseif ($this->uri->segment(1) == 'backend-bot') require 'internal-backend-bot.php';
}
?>