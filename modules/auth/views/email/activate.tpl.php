<html>
<body>
	<p><b>Активация аккаунта для <?php echo $identity;?></b></p>
	<p>Пожалуйста, перейдите по ссылке для продолжения: <?php echo anchor('auth/activate/'. $id .'/'. $activation, 'Активировать');?>.</p>
</body>
</html>