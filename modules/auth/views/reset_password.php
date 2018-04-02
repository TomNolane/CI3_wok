<style>
.form{
border: 7px solid #eeeeee;
border-radius: 20px;
margin: 0 auto;
padding: 20px 50px;
width: 350px;
}
</style>

<div class="form">

<h3>Меняем пароль</h3>

<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open('auth/reset_password/' . $code);?>
      
	<p>
		Новый пароль (не менее <?php echo $min_password_length;?> символов): <br />
		<?php echo form_input($new_password, '', 'class="form-control"');?>
	</p>

	<p>
		Повтор нового пароля: <br />
		<?php echo form_input($new_password_confirm, '', 'class="form-control"');?>
	</p>

	<?php echo form_input($user_id);?>
	<?php echo form_hidden($csrf); ?>

	<p><button type="submit" class="btn btn-info">Сменить</button></p>
      
<?php echo form_close();?>

</div>