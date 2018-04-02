<style>
.form{
border: 7px solid #eeeeee;
border-radius: 20px;
margin: 0 auto;
padding: 20px 50px;
width: 450px;
}
</style>

<div class="form">

<h1>Вход</h1>

<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open('auth/login', 'method="post" class="form-horizontal"');?>

	<input type="hidden" name="from" value="<?php echo $from; ?>">
	<div class="control-group">
		<label class="control-label" for="identity">Email:</label>
		<div class="controls">
			<?php echo form_input($identity, '', 'class="form-control"');?>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="password">Пароль:</label>
		<div class="controls">
			<?php echo form_input($password, '', 'class="form-control"');?>
		</div>
	</div>
	
	<div class="clearfix">&nbsp;</div>
	
	<div class="control-group">
		<div class="controls">
			<!--label class="checkbox">
				<?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?> Запомнить
			</label-->
			<button type="submit" class="btn btn-success btn-block">Вход</button>
		</div>
	</div>
	
	<div class="clearfix">&nbsp;</div>

<?php echo form_close();?>
		
		<p class="pull-right"><a href="/forgot_password">Забыли пароль?</a></p>

<div class="clearfix">&nbsp;</div>

</div>