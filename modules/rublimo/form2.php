
<div class="form-group">
	<label class="col-sm-4 control-label label-required">Серия и номер паспорта</label>
	<div class="col-sm-4">
		<div class="shadow"><input type="num" class="form-control ec" id="passport-s" name="passport_s" max="9999" maxlength="4" placeholder="0000" title="Серия паспорта" required></div>
	</div>
	<div class="col-sm-4">
		<div class="shadow"><input type="num" class="form-control ec" id="passport-n" name="passport_n" max="999999" maxlength="6" placeholder="000000" title="Номер паспорта" required></div>
	</div>
</div>

<div class="form-group">
	<label class="col-sm-4 control-label label-required">Дата выдачи</label>
	<div class="col-sm-2">
		<div class="shadow">
			<select class="form-control ec" id="passport_dd" name="passport_dd" required>
							<option value="0">День</option>
							<?php
							for($i=1;$i<=31;$i++)
							echo '<option value="'.(($i<10)? '0' : '').$i.'">'.$i.'</option>';
							?>
						</select>
		</div>
	</div>
	<div class="col-sm-3">
		<div class="shadow">
						<select class="form-control ec" id="passport_mm" name="passport_mm" required>
							<option value="0">Месяц</option>
							<option value="01">Январь</option>
							<option value="02">Февраль</option>
							<option value="03">Март</option>
							<option value="04">Апрель</option>
							<option value="05">Май</option>
							<option value="06">Июнь</option>
							<option value="07">Июль</option>
							<option value="08">Август</option>
							<option value="09">Сентябрь</option>
							<option value="10">Октябрь</option>
							<option value="11">Ноябрь</option>
							<option value="12">Декабрь</option>
						</select>
		</div>
	</div>
	<div class="col-sm-3">
		<div class="shadow">
						<select class="form-control ec" id="passport_yyyy" name="passport_yyyy" required>
							<option value="0">Год</option>
							<?php
							for($i=1980;$i<=date('Y');$i++)
							echo '<option value="'.$i.'">'.$i.'</option>';
							?>
						</select>
		</div>
	</div>
</div>

<div class="form-group">
	<label class="col-sm-4 control-label label-required">Кем выдан</label>
	<div class="col-sm-8">
		<div class="shadow"><input type="text" class="form-control ec" name="passport_who" placeholder="" title="Кем выдан" required></div>
	</div>
</div>

<div class="form-group">
	<label class="col-sm-4 control-label label-required">Код подразделения</label>
	<div class="col-sm-4">
		<div class="shadow"><input type="text" class="form-control ec" name="passport_code" id="passport_code" placeholder="000-000" title="Код подразделения" required></div>
	</div>
</div>

<div class="form-group">
	<label class="col-sm-4 control-label label-required">Место рождения</label>
	<div class="col-sm-8">
		<div class="shadow"><input type="text" class="form-control ec" name="birthplace" required></div>
	</div>
</div>

<div class="clearfix">&nbsp;</div>
<div class="form-group"><label class="col-sm-8 col-sm-offset-4">Место жительства</label></div>
<div class="clearfix">&nbsp;</div>

<div class="form-group">
	<label>Регион</label>
	<div class="shadow"><select class="form-control ec" id="region" name="region" autocomplete="off" required>
		<option value="0">-- Выберите регион --</option>
		<?php
		if (isset($regions) && is_array($regions))
		{
			foreach($regions as $region)
			echo '<option value="'.$region['name'].'" data-id="'.$region['region_id'].'"'.((isset($region_name) && $region_name == $region['name'])? ' selected' : '').'>'.$region['name'].'</option>';
		}
		?>
	</select></div>
</div>

<div class="form-group">
	<label class="col-sm-4 control-label label-required">Населённый пункт</label>
	<div class="col-sm-8">
		<div class="shadow">
			<input type="text" class="form-control ec" name="city" value="<?php echo isset($city_name)? $city_name : ''; ?>" pattern="^[А-Яа-яЁё\s]+$">
		</div>
	</div>
</div>

<div class="form-group">
	<label class="col-sm-4 control-label label-required">Улица</label>
	<div class="col-sm-8">
		<div class="shadow"><input type="text" class="form-control ec" name="street" title="Улица" required></div>
	</div>
</div>

<div class="form-group">
	<label class="col-sm-4 control-label label-required">Номер&nbsp;дома</label>
	<div class="col-sm-8">
		<div class="shadow"><input type="text" class="form-control ec" name="building" title="Дом" required></div>
		<p class="help-block">Например: 9а</p>
	</div>
</div>

<div class="form-group">
	<label class="col-sm-4 control-label">Строение (корпус)</label>
	<div class="col-sm-8">
		<div class="shadow"><input type="text" class="form-control ec" name="housing"></div>
	</div>
</div>

<div class="form-group">
	<label class="col-sm-4 control-label">Квартира</label>
	<div class="col-sm-8">
		<div class="shadow"><input type="text" class="form-control ec" name="flat"></div>
	</div>
</div>

<div class="clearfix">&nbsp;</div>
<div class="form-group"><label class="col-sm-8 col-sm-offset-4">Регистрация (прописка)</label></div>
<div class="clearfix">&nbsp;</div>

<div class="form-group">
	<label class="col-sm-4 control-label label-required">Тип регистрации</label>
	<div class="col-sm-8">
		<div class="shadow"><select class="form-control ec" name="reg_type" required>
		<option value="0">Без регистрации</option>
		<option value="1">Постоянная регистрация</option>
		<option value="2">Временная регистрация</option>
	</select></div>
	</div>
</div>

<fieldset id="reg_same" style="display:none;">
<div class="form-group">
	<label class="col-sm-9 control-label label-required"><b>Регистрация совпадает с местом жительства</b></label>
	<div class="col-sm-3">
		<div class="pull-right">
		<label class="radio-inline"><input type="radio" class="reg_same ec" name="reg_same" value="1" required checked="checked"> Да</label>
		<label class="radio-inline"><input type="radio" class="reg_same ec" name="reg_same" value="0" required> Нет</label>
		</div>
	</div>
	<div class="clearfix">&nbsp;</div>
</div>
</fieldset>

<fieldset id="reg_address" style="display:none;">
	<div class="form-group">
		<label class="col-sm-4 control-label label-required">Регион</label>
		<div class="col-sm-8">
		<div class="shadow"><select class="form-control ec" id="reg_region" name="reg_region" autocomplete="off">
			<option value="0">Регион</option>
			<?php
			if (isset($regions) && is_array($regions))
			{
				foreach($regions as $region)
				echo '<option value="'.$region['name'].'" data-id="'.$region['region_id'].'"'.((isset($region_name) && $region_name == $region['name'])? ' selected' : '').'>'.$region['name'].'</option>';
			}
			?>
		</select></div>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-4 control-label label-required">Населённый пункт</label>
		<div class="col-sm-8">
			<div class="shadow">
				<input type="text" class="form-control ec" name="reg_city" title="Населённый пункт" value="<?php echo isset($city_name)? $city_name : ''; ?>">
			</div>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-4 control-label label-required">Улица</label>
		<div class="col-sm-8">
			<div class="shadow"><input type="text" class="form-control ec" name="reg_street"></div>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-4 control-label label-required">Номер&nbsp;дома</label>
		<div class="col-sm-8">
			<div class="shadow"><input type="text" class="form-control ec" name="reg_building" title="Дом"></div>
			<p class="help-block">Например: 9а</p>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-4 control-label">Строение</label>
		<div class="col-sm-8">
			<div class="shadow"><input type="text" class="form-control ec" name="reg_housing"></div>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-4 control-label">Квартира</label>
		<div class="col-sm-8">
			<div class="shadow"><input type="text" class="form-control ec" name="reg_flat"></div>
		</div>
	</div>
</fieldset>

<script>
$(document).ready(function(){
	
	
});
</script>