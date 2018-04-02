<!DOCTYPE html>
<html>
<head>
<title>Вход в админку</title>
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="IE=Edge"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="robots" content="noindex,nofollow">

<link href="/modules/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" media="screen" />
<!--link href="css/bootstrap-responsive.css" rel="stylesheet"-->

<link rel="shortcut icon" type="image/png" href="/favicon.png" />

<style>
html{height:100%;min-height:100%;}
body{height:100%;min-height:100%;}
h1 {
	font-size: 24px;
    margin-bottom:30px;
}
h3{margin-bottom:30px;}
label{font-weight:bold;}
button{margin-bottom:10px !important;}
.control-group{margin-bottom:10px !important;}

.tab-content{margin:30px 0;}

.auth-page{position:absolute;top:50%;height:388px;margin-top:-194px;width:100%;}

.auth-buttons{text-align:center;}
.auth-buttons img{width:55px;border-radius:54px;box-shadow:1px 1px 4px 0 rgba(125,125,125,0.5);}
</style>

<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body>
<div class="auth-page">
		<div class="auth-form"><?php if (isset($content)) echo $content; ?></div>
</div>

<?php
// Отладочная информация
//echo '<!-- ', tiktak() - $sttime, ' с | '.round(memory_get_usage() / 1024 / 1024, 2).' Мб -->';
?>

<!--script src="/modules/bootstrap/2.3.2/js/bootstrap.min.js"></script-->

</body>
</html>