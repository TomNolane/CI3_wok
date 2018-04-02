
<div class="form-group">
	<label class="col-sm-4 control-label label-required">Вид трудоустройства</label>
	<div class="col-sm-8">
		<div class="shadow"><select class="form-control ec" id="work" name="work" required>
				<option value="ШТАТНЫЙ СОТРУДНИК">Штатный сотрудник</option>
				<option value="ИНДИВИДУАЛЬНЫЙ ПРЕДПРИНИМАТЕЛЬ">Индивидуальный предприниматель</option>
				<option value="СТУДЕНТ">Студент</option>
				<option value="ПЕНСИОНЕР">Пенсионер</option>
				<option value="БЕЗРАБОТНЫЙ">Безработный</option>
			</select></div>
	</div>
</div>

<div class="form-group">
	<label class="col-sm-4 control-label label-required">Место работы</label>
	<div class="col-sm-8"><div class="shadow"><input type="text" class="form-control ec" name="work_name" required></div></div>
</div>

<div class="form-group">
	<label class="col-sm-4 control-label label-required">Должность</label>
	<div class="col-sm-8"><div class="shadow"><input type="text" class="form-control ec" name="work_occupation" required></div></div>
</div>

<div class="form-group">
	<label class="col-sm-4 control-label">Рабочий телефон</label>
	<div class="col-sm-8"><div class="shadow"><input type="tel" class="form-control ec" id="work_phone" name="work_phone"></div></div>
</div>

<div class="form-group">
	<label class="col-sm-4 control-label label-required">Стаж работы (в&nbsp;месяцах)</label>
	<div class="col-sm-3"><div class="shadow"><input type="number" class="form-control ec" min="0" max="360" name="work_experience" required></div></div>
</div>

<div class="form-group">
	<label class="col-sm-4 control-label label-required">Зарплата (в&nbsp;рублях)</label>
	<div class="col-sm-3"><div class="shadow"><input type="number" class="form-control ec" name="work_salary" required></div></div>
</div>

<div class="clearfix">&nbsp;</div>
<div class="form-group"><label class="col-sm-8 col-sm-offset-4">Место работы</label></div>
<div class="clearfix">&nbsp;</div>

<div class="form-group">
	<label class="col-sm-4 control-label label-required">Регион</label>
	<div class="col-sm-8">
		<div class="shadow"><select class="form-control ec" name="work_region" autocomplete="off" required>
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
</div>

<div class="form-group">
	<label class="col-sm-4 control-label label-required">Населённый пункт</label>
	<div class="col-sm-8">
		<div class="shadow"><input type="text" class="form-control ec" name="work_city" value="<?php echo isset($city_name)? $city_name : ''; ?>" required></div>
	</div>
</div>

<div class="form-group">
	<label class="col-sm-4 control-label label-required">Улица</label>
	<div class="col-sm-8"><div class="shadow"><input type="text" class="form-control ec" name="work_street" required></div></div>
</div>

<div class="form-group">
	<label class="col-sm-4 control-label label-required">Номер дома</label>
	<div class="col-sm-3"><div class="shadow"><input type="text" class="form-control ec" name="work_house" required></div></div>
</div>

<div class="form-group">
	<label class="col-sm-4 control-label">Строение (корпус)</label>
	<div class="col-sm-3"><div class="shadow"><input type="text" class="form-control ec" name="work_building"></div></div>
</div>

<div class="form-group">
	<label class="col-sm-4 control-label">Офис</label>
	<div class="col-sm-3"><div class="shadow"><input type="text" class="form-control ec" name="work_office"></div></div>
</div>
<div class="clearfix">&nbsp;</div>
