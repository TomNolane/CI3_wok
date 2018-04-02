<html>
<body>
	<p><b>Сбрасываем пароль для <?php echo $identity;?></b></p>
	<p>Пожалуйста, перейдите по ссылке для подтверждения: <?php echo anchor('auth/reset_password/'. $forgotten_password_code, 'Сбросить пароль');?>.</p>
</body>
</html>