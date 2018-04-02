<?php require 'header.php'; ?>

<section class="calc" id="calc">
<div class="container">
	<div class="row">
		<div class="col-sm-7 col-sm-offset-1 hidden-sm hidden-xs text-center">
			<h1><span>Моментальные<br>займы онлайн</span></h1>
		<!--/div>
		<div class="col-sm-5 col-sm-offset-2"-->
			<div class="form text-center">
				<h2>Выберите сумму и срок</h2>
				
				<form id="anketa" action="/form" method="post">
					<input type="hidden" name="referer" value="<?php if (isset($_SERVER['HTTP_REFERER'])) echo $_SERVER['HTTP_REFERER']; ?>">
					<?php if (!empty($_REQUEST['ad_id'])) echo '<input type="hidden" name="ad_id" value="'.$_REQUEST['ad_id'].'">'; ?>
					<div class="form-slider green">
						<div class="form-label-1 pull-left">Сумма:</div>
						<div class="form-label-2 pull-right"><span class="current_amount">15 000</span> <i class="fa fa-rub"></i></div>
						<div class="clearfix"></div>
						<input type="text" class="amount" name="amount" value="30000" />
						<div class="form-label-3 pull-left">1 000</div>
						<div class="form-label-3 pull-right">100 000</div>
						<div class="clearfix"></div>
					</div>
					<div class="form-slider green">
						<div class="form-label-1 pull-left">Срок:</div>
						<div class="pull-right"><span class="form-label-2" id="current_period">10</span> <span class="form-label-1">дней</span></div>
						<div class="clearfix"></div>
						<input type="text" id="period" name="period" value="10" />
						<div class="form-label-3 pull-left">5 дней</div>
						<div class="form-label-3 pull-right">30 дней</div>
						<div class="clearfix"></div>
					</div>
					<button type="submit" class="btn form-button">
						<span class="probability">Вероятность<br>одобрения</span>
						<span class="rate" id="percent_rate">64%</span>
						<span class="line">|</span>
						<span class="ok">Оформить</span>
					</button>
				</form>
				
				<img src="/templates/rublimo/img/ps.png">
			</div>
			
			<img src="/templates/rublimo/img/bank2.png" id="bank">
		</div>
		<div class="col-xs-12 visible-xs visible-sm text-center">
			<h1 id="getmoney">Моментальные<br>займы онлайн</h1>
			<div class="form text-center">
				<form id="anketa" action="/form" method="post">
					<input type="hidden" name="referer" value="<?php if (isset($_SERVER['HTTP_REFERER'])) echo $_SERVER['HTTP_REFERER']; ?>">
					<?php if (!empty($_REQUEST['ad_id'])) echo '<input type="hidden" name="ad_id" value="'.$_REQUEST['ad_id'].'">'; ?>
					<input type="hidden" id="period" name="period" value="30" />
					<div class="form-slider green">
						<div class="form-label-1 pull-left">Сумма:</div>
						<div class="form-label-2 pull-right"><span class="current_amount">15 000</span> <i class="fa fa-rub"></i></div>
						<div class="clearfix"></div>
						<input type="text" class="amount" name="amount" value="30000" />
						<div class="form-label-3 pull-left">1 000</div>
						<div class="form-label-3 pull-right">100 000</div>
						<div class="clearfix"></div>
					</div>
					<div class="shadow"><button type="submit" class="btn">Оформить займ</button></div>
				</form>
			</div>
		</div>
	</div>
</div>
</section>

<section class="howto hidden-xs">
<div class="howto-header text-center">
	<h2>Как получить деньги?</h2>
</div>
<div class="howto-body">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<a href="#calc"><img src="/templates/rublimo/img/howto.png"></a>
				<div class="shadow"><a href="/form" class="btn btn-get">Получить деньги</a></div>
			</div>
		</div>
	</div>
</div>
</section>

<section class="howto-xs visible-xs">
<div class="howto-1">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="middle-cover">
					<div class="middle">
						<span>1. Заполните анкету</span>
						<img src="/templates/rublimo/img/howto/1.png" class="pull-right">
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="howto-2">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="middle-cover">
					<div class="middle">
						<div class="pull-left">2. Выберите сумму<br>и срок займа</div>
						<img src="/templates/rublimo/img/howto/2.png" align="right">
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="howto-3">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="middle-cover">
					<div class="middle">
						<span>3. Получите деньги</span>
						<img src="/templates/rublimo/img/howto/3.png" align="right">
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="howto-4">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="middle-cover">
					<div class="middle">
						<div class="shadow"><a href="#getmoney" class="btn btn-get">Оформить займ</a></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</section>

<section class="rating hidden-md hidden-sm hidden-xs">
<div class="container">	
	<div class="row">
		<div class="col-sm-7">
			<h2>Улучшение кредитной истории</h2>
			<p>Сервис Rublimo дает возможность получить займ онлайн даже если имеются значительные просрочки платежей.</p>
			<p>Программа состоит из трех шагов с последовательным увеличением суммы займа.</p>
			<p>После выполнения программы, клиенту доступно получение займа на стандартных выгодных условиях нашего сервиса.</p>
			<div class="shadow"><a href="/history" class="btn">Узнать подробнее</a></div>
		</div>
		<div class="col-sm-5">
			<img src="/templates/rublimo/img/man.png">
		</div>
	</div>
</div>
</section>

<section class="reviews hidden-md hidden-sm hidden-xs">
<div class="pattern">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<h2>Отзывы клиентов</h2>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-8 col-sm-offset-2">
<?php
$reviews = array(
	array('img' => '/templates/common/img/reviews/1.jpg', 'name' => 'Елизавета Дарова',   'text' => 'Rublimo конечно красавцы, обратилась в трудной ситуации, когда не хватало денег на ремонт машины. Начальник задержал зп, но ребята выручили за что им спасибо.'),
	array('img' => '/templates/common/img/reviews/2.jpg', 'name' => 'Михаил Терентьев',   'text' => 'Спасибо огромное компании Рублимо! Действительно сильно выручили! Главное - не надо бегать по друзьям, одалживая деньги! Буду с вами сотрудничать!'),
	array('img' => '/templates/common/img/reviews/3.jpg', 'name' => 'Карпов Иван',        'text' => 'Я очень хочу, чтобы вы успешно пережили кризис, побольше вам добросовестных плательщиков и успешных сделок!!! Вы очень удобный сервис!!!'),
	array('img' => '/templates/common/img/reviews/4.jpg', 'name' => 'Журавлева Алевтина', 'text' => 'Хочу поблагодарить Rublimo за доверие и своевременно оказанную материальную помощь! Очень удобный и оперативный сервис! Будем дружить! ))')
);
?>
				<section id="dg-container" class="dg-container">
					<div class="dg-wrapper">
						<?php
						foreach($reviews as $i => $item)
						{
							echo '
							<div class="item" data-id="'.$i.'">
								<img src="'.$item['img'].'">
								<div><p>'.$item['text'].'</p><h3>'.$item['name'].'</h3></div>
							</div>';
						}
						?>
					</div>
					<nav>	
						<span class="dg-prev glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
						<span class="dg-next glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					</nav>
					
					<ol class="dg-indicators carousel-indicators">
					<?php
					for($i=0;$i<count($reviews);$i++)
					{
						echo '<li data-slide-to="'.$i.'"'.($i? '' : ' class="active"').'></li>';
					}
					?>
					</ol>
				</section>
				<div class="clearfix">&nbsp;</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<div class="shadow"><a href="/form" class="btn btn-get">Получить деньги</a></div>
			</div>
		</div>
	</div>
</div>
</section>

<link href="/modules/3dgallery/css/style.css" rel="stylesheet" media="screen">
<script src="/modules/3dgallery/js/modernizr.custom.53451.js"></script>
<script src="/modules/3dgallery/js/jquery.gallery.js"></script>

<script>
$(document).ready(function(){
	$('#dg-container').gallery();
});
</script>

<?php require 'footer.php'; ?>