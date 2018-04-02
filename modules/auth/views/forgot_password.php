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

<h3>Восстановление пароля</h3>
<p>Укажите вашу почту - мы вышлем письмо для восстановления пароля.</p>

<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open("auth/forgot_password");?>

      <p>
      	Email: <br />
      	<?php echo form_input($email, '', 'class="form-control"');?>
      </p>
      
      <p><button type="submit" class="btn btn-info">OK</button></p>
      
<?php echo form_close();?>

</div>