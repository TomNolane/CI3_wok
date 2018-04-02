<style>
.form{
border: 7px solid #eeeeee;
border-radius: 20px;
margin: 0 auto;
padding: 20px 50px;
width: 350px;
}
</style>

<div id="infoMessage"><?php echo $message;?></div>

<div class="form">

<h3>Меняем пароль</h3>

<?php echo form_open("auth/change_password");?>

      <p>Старый пароль:<br />
      <?php echo form_input($old_password, '', 'class="form-control"');?>
      </p>
      
      <p>Новый пароль <small>(не менее <?php echo $min_password_length;?> символов)</small>:<br />
      <?php echo form_input($new_password, '', 'class="form-control"');?>
      </p>
      
      <p>Повтор нового пароля:<br />
      <?php echo form_input($new_password_confirm, '', 'class="form-control"');?>
      </p>
      
      <?php echo form_input($user_id, '', 'class="form-control"');?>
      <p><button type="submit" class="btn btn-info">Сменить</button></p>
      
<?php echo form_close();?>

</div>