<?php
echo '<html><head><title>'.$subject.'</title></head><body>
'.($name? '<p>Имя: '.$name.'</p>' : '').'
'.($phone? '<p>Телефон: '.$phone.'</p>' : '').'
'.($email? '<p>Email: <a href="mailto:'.$email.'">'.$email.'</a></p>' : '').'
'.($comment? '<p><b>Сообщение</b></p><p>'.$comment.'</p>' : '').'

'.((isset($geo) && (isset($geo['city']) || isset($geo['region'])))? '<p><b>Регион</b></p>'.(isset($geo['city'])? $geo['city'] : '').((isset($geo['city']) && isset($geo['region']))? ', ' : '').(isset($geo['region'])? $geo['region'] : '').'</p>' : '').'

<hr><p style="color:silver">Сообщение отправлено через форму с вашего сайта</p></body></html>';//<br>'.$host.'
?>