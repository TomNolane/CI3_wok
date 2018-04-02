<!DOCTYPE html>
<html>
<head>
<title>Rublimo.ru</title>
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="IE=Edge"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="shortcut icon" type="image/png" href="/templates/rublimo/img/favicon.png" />

<link href="/modules/jquery.ion.rangeslider/css/ion.rangeSlider.css" rel="stylesheet" media="screen">
<link href="/modules/jquery.ion.rangeslider/css/ion.rangeSlider.skinHTML5.css" rel="stylesheet" media="screen">

<link href="/modules/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="http://netdna.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">

<link href="/templates/rublimo/style.css" rel="stylesheet" media="screen">

<script src="/modules/jquery/jquery-1.11.3.min.js"></script>

<!--[if lte IE 9]>
<script src="/modules/html5shiv/html5shiv.js"></script>
<![endif]-->

</head>
<body>

<nav class="navbar">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1" aria-expanded="false">
				<span class="sr-only">Раскрыть меню</span>
				<img src="/templates/rublimo/img/mobile/menu.png">
			</button>
			
			<a class="navbar-brand" href="/"><img alt="" src="/templates/rublimo/img/logo.png"></a>
			
			<a href="/<?php echo $this->input->cookie('lk')? 'lk' : 'form'; ?>" class="navbar-btn navbar-btn-small visible-xs">
				<img src="/templates/rublimo/img/mobile/lk.png">
			</a>
		</div>
		<div class="collapse navbar-collapse" id="navbar-collapse-1">
			<ul class="nav navbar-nav menu">
				<li><a href="/about">О сервисе</a></li>
				<li><a href="/form">Получить деньги</a></li>
				<li><a href="/faq">Вопросы-ответы</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<a href="/<?php echo $this->input->cookie('lk')? 'lk' : 'form'; ?>" class="navbar-btn navbar-btn-small visible-sm">
					<img src="/templates/rublimo/img/mobile/lk.png">
				</a>
				<?php if ($this->input->cookie('lk')) { ?>
				<a href="/lk" class="btn navbar-btn hidden-xs hidden-sm">
					<img src="/templates/rublimo/img/lk/avatar.png">
					<strong class="hidden-md hidden-sm hidden-xs"><span class="f ec"></span><br><span class="i ec"></span> <span class="o ec"></span></strong>
				</a>
				<?php } else { ?>
				<a href="/form" class="btn navbar-btn hidden-xs hidden-sm">
					<span class="ico"><i class="glyphicon glyphicon-user"></i></span>
					<span class="text">Личный<br>кабинет</span>
				</a>
				<?php } ?>
			</ul>
		</div>
	</div>
</nav>
