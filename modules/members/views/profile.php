<div id="content-item">
<table>
	<tr>
		<td rowspan="2" valign="top" width="200"><?php echo Modules::run('avatar', $member['id']); ?></td>
		<td colspan="2"><b><?php echo $member['name']; ?></b></td>
		<td rowspan="2" valign="top">
			<?php
			if ($member['id'] == $this->session->userdata('user_id'))
			{
				if ($member['contacts'])
				{
					echo $member['contacts'];
				}
				else
				{
					echo '
<p>Необходимо указать контактные данные для связи с другими участниками.<br>Это повысит их степень доверия к вам.</p>
<p>Контакты указываются в произвольной форме,<br>но позвольте посоветовать вам указать о себе следующую информацию:
<ul><li>Сотовый телефон</li><li>Электронная почта</li><li>Ссылки на страницы в соц. сетях</li><li>Ссылка на персональный блог</li></ul></p>
<p>Ваши контактные данные будут видны только партнёрам по сделкам и Управляющему вашего Объединения.<br>
Просто так контактные данные на сайте не отображаются.</p>
<p>Для внесения изменений выберите в меню пункт "Учётка" -&gt; "Править".</p>
';
				}
			} ?>
		</td>
	</tr>
	<tr>
		<td>
			<p></p>
			<p>
				Объединение: <?php echo $member['community']; ?><br />
				Город: <?php echo $member['city']; ?><br />
				Регион: <?php echo $member['region']; ?><br />
				Страна: <?php echo $member['country']; ?>
			</p>
			<p>МЕРА: <?php echo $member['balance']; ?></p>
			<p>Дата регистрации: <?php echo $member['rdate']; ?></p>
		</td>
	</tr>
</table>
</div>