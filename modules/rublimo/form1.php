
<div class="form-group">
	<label class="col-sm-4 control-label label-required">Сумма</label>
	<div class="col-sm-8">
		<div class="form-slider green">
			<input type="text" id="amount" class="amount" name="amount" value="<?php echo empty($_POST['amount'])? 15000 : $_POST['amount']; ?>" />
		</div>
	</div>
</div>
<div class="form-group">
	<label class="col-sm-4 control-label label-required">Срок</label>
	<div class="col-sm-8">
		<div class="form-slider green">
			<input type="text" id="period" name="period" value="<?php echo empty($_POST['period'])? 30 : $_POST['period']; ?>" />
		</div>
	</div>
</div>

<div class="form-group">
	<label class="col-sm-4 control-label label-required">Фамилия</label>
	<div class="col-sm-8"><div class="shadow"><input type="text" class="form-control ec" name="f" placeholder="Фамилия" title="Фамилия" required></div></div>
</div>
<div class="form-group">
	<label class="col-sm-4 control-label label-required">Имя</label>
	<div class="col-sm-8"><div class="shadow"><input type="text" class="form-control ec" name="i" placeholder="Имя" title="Имя" required></div></div>
</div>
<div class="form-group">
	<label class="col-sm-4 control-label label-required">Отчество</label>
	<div class="col-sm-8"><div class="shadow"><input type="text" class="form-control ec" name="o" placeholder="Отчество" title="Отчество" required></div></div>
</div>
<div class="form-group">
	<label class="col-sm-4 control-label label-required">Пол</label>
	<div class="col-sm-8">
		<label class="radio-inline"><input type="radio" class="ec" name="gender" value="1" required> М</label>
		<label class="radio-inline"><input type="radio" class="ec" name="gender" value="0" required> Ж</label>
	</div>
</div>
<div class="clearfix">&nbsp;</div>

<div class="form-group">
	<label class="col-sm-4 control-label label-required">Дата рождения</label>
	<div class="col-sm-2">
		<div class="shadow">
			<select class="form-control ec" id="birth_dd" name="birth_dd" required>
				<option value="0">День</option>
				<?php for($i=1;$i<=31;$i++) echo '<option value="'.(($i<10)? '0' : '').$i.'">'.$i.'</option>'; ?>
			</select>
		</div>
	</div>
	<div class="col-sm-3">
		<div class="shadow">
			<select class="form-control ec" id="birth_mm" name="birth_mm" required>
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
			<select class="form-control ec" id="birth_yyyy" name="birth_yyyy" required>
				<option value="0">Год</option>
				<?php
				for($i=date('Y', strtotime('-80 years', time()));$i<=date('Y', strtotime('-18 years', time()));$i++)
				echo '<option value="'.$i.'">'.$i.'</option>';
				?>
			</select>
		</div>
	</div>
</div>
<div class="clearfix">&nbsp;</div>

<div class="form-group">
	<label class="col-sm-4 control-label label-required">Телефон</label>
	<div class="col-sm-8">
		<div class="shadow">
		<div class="input-group">
		<input type="tel" class="form-control ec" name="phone" placeholder="Телефон" required>
		<div class="input-group-addon"><i class="fa fa-phone fa-fw"></i></div>
		</div>
	</div>
	</div>
</div>
<div class="form-group">
	<label class="col-sm-4 control-label label-required">Почта</label>
	<div class="col-sm-8">
		<div class="shadow">
		<div class="input-group">
		<input type="email" class="form-control ec" name="email" placeholder="Email" title="Email" required>
		<div class="input-group-addon"><i class="fa fa-envelope fa-fw"></i></div>
		</div>
	</div>
	</div>
</div>
<div class="clearfix">&nbsp;</div>

<div class="form-group">
	<label class="col-sm-4 control-label label-required">Кредитная история</label>
	<div class="col-sm-8">
		<div class="shadow">
		<select class="form-control ec" name="delays_type" required>
		<option value="never">Никогда не брал(а) кредитов</option>
		<option value="credit_closed_no_delay">Кредиты закрыты, просрочек не было</option>
		<option value="credit_open_no_delay">Кредиты есть, просрочек нет</option>
		<option value="credit_closed_had_delay">Кредиты закрыты, просрочки были</option>
		<option value="had_delay">Просрочки были, сейчас нет</option>
		<option value="has_delay">Просрочки сейчас есть</option>
		</select>
		</div>
	</div>
</div>
<div class="clearfix">&nbsp;</div>

<div class="form-group">
	<label class="col-sm-4 control-label"></label>
	<div class="col-sm-8">
		<label><input type="checkbox" id="age18" value="1" checked> <b>Мне уже исполнилось 18 лет</b></label>
		<label><input type="checkbox" id="agree" value="1" checked> <b>Я прочитал(а) и подтверждаю <a href="/tos.php" class="fancybox" data-fancybox-type="iframe">условия соглашения</a></b></label>
		<div id="#tos" style="display:none;">
			<h3>Заполняя заявку на кредит Вы соглашаетесь с нашими правилами использования данных</h3>
			<ol>
				<li>Я даю свое согласие на регистрацию в проекте быстрыйзайм5.рф и получение новостей проекта. Я уведомлен(а) о том, что информация, переданная мною по сети Интернет, может стать доступной третьим лицам, и я освобождаю администрацию быстрыйзайм5.рф от ответственности, в случае, если указанные мною сведения станут доступными третьим лицам.</li>
				
				<li>В целях принятия одним из МФО-партнеров быстрыйзайм5.рф решения о заключении договора займа я даю им свое согласие на:
					<ul>
						<li>обработку в полном объеме моих персональных данных, изложенных в заявке на займ, а именно на сбор и проверку достоверности представленной информации путем обращения к третьим лицам. Я даю свое согласие на обработку моих персональных данных в целях продвижения услуг быстрыйзайм5.рф на рынке с помощью средств связи, равно как продвижение услуг быстрыйзайм5.рф и/или услуг (товаров, работ) третьих лиц-партнеров быстрыйзайм5.рф.</li>
						<li>получение информации о моей кредитной истории на основании Федерального закона от 30.12.2004 г. № 218-ФЗ "О кредитных историях" от любых организаций, осуществляющих в соответствии с действующим законодательством формирование, обработку и хранение такой информации. Полученная информация предназначена для внутреннего использования МФО-партнеров быстрыйзайм5.рф. Настоящие согласия даны мной на неопределенный срок.</li>
					</ul>
				</li>
				
				<li>Я подтверждаю, что сведения, содержащиеся в заявке, являются верными и точными на указанную дату и обязуюсь незамедлительно уведомить быстрыйзайм5.рф в случае изменения указанных мной сведений, а также о любых обстоятельствах, способных повлиять на выполнение мной или МФО-партнеров быстрыйзайм5.рф обязательств по займу, который может быть предоставлен на основании заявки.</li>
			</ol>
		</div>
		<label><input type="checkbox" id="marketing" value="1" checked> <b>Я согласен(на) получать маркетинговые рассылки с предложениями микрозаймов</b></label>
	</div>
</div>
<div class="clearfix">&nbsp;</div>

<img src="/templates/rublimo/img/form/girl.png" class="girl hidden-md hidden-sm hidden-xs">
