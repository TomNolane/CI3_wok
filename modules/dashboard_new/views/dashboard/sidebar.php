<?php
$this->load->model('forms_model', 'forms');
echo 'новые сообщения ='. $new_message = $this->forms->get_new_questions();

?>
<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
    <ul class="nav menu">
	<li class="parent">
            <a href="#">
		<span data-toggle="collapse" href="#sub-item-0">
                    <svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down"></use></svg>
                </span> Анкеты 
            </a>
            <ul class="children collapse" id="sub-item-0">               
		<li>
                    <a class="" href="/dashboard_new/">
			<svg class="glyph stroked table"><use xlink:href="#stroked-table"/></svg> Все анкеты
                    </a>
		</li>                
		<li>
                    <a class="" href="/dashboard_new/turn">
			<svg class="glyph stroked line-graph"><use xlink:href="#stroked-line-graph"></use></svg> Очередь
                    </a>
		</li>                
            </ul>
	</li>
<!--
	<li class="parent">
            <a href="#">
		<span data-toggle="collapse" href="#sub-item-1"><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down"></use></svg></span> Источники 
            </a>
            <ul class="children collapse" id="sub-item-1">
		<li>
                    <a class="" href="/dashboard_new/vk">
			<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Вконтакте
                    </a>
		</li>
		<li>
                    <a class="" href="/dashboard_new/direct">
			<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Директ
                    </a>
		</li>
            </ul>
	</li>        
-->       

	<li class="parent">
            <a href="#">
		<span data-toggle="collapse" href="#sub-item-1"><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down"></use></svg></span> Статистика 
            </a>
            <ul class="children collapse" id="sub-item-1">
		<li>
                    <a class="" href="/dashboard_new/market">
			<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Апи
                    </a>
		</li>
		<li>
                    <a class="" href="/dashboard_new/market21">
			<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> 21 день
                    </a>
		</li>                
		<li>
                    <a class="" href="/dashboard_new/pixel">
			<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Пиксель
                    </a>
		</li> 
		<li>
                    <a class="" href="/dashboard_new/step">
			<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Форма
                    </a>
		</li> 
		<li>
                    <a class="" href="/dashboard_new/time">
			<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Время в Форме
                    </a>
		</li> 
		<li>
                    <a class="" href="/dashboard_new/vk">
			<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Статистика VK
                    </a>
		</li>                
            </ul>
	</li>
	<li class="parent">
            <a href="#">
		<span data-toggle="collapse" href="#sub-item-2"><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down"></use></svg></span> Рассылки 
            </a>
            <ul class="children collapse" id="sub-item-2">
		<li>
                    <a class="" href="/dashboard_new/mail_generation">
			<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Генерация ссылки
                    </a>
		</li>                
		<li>
                    <a class="" href="/dashboard_new/mail">
			<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Короткие
                    </a>
		</li>                
            </ul>
	</li>
        <li class=""><a href="/dashboard_new/questions"><svg class="glyph stroked open letter"><use xlink:href="#stroked-open-letter"/></svg> Обратная связь <span class="badge"><?=$new_message?></span> </a></li>        
	<li class="parent">
            <a href="#">
		<span data-toggle="collapse" href="#sub-item-3"><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down"></use></svg></span> Настройки сайта 
            </a>
            <ul class="children collapse" id="sub-item-3">
		<li>
                    <a class="" href="/dashboard_new/js">
			<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> POPUP
                    </a>
		</li>               
            </ul>
	</li>  
	<li class="parent">
            <a href="#">
		<span data-toggle="collapse" href="#sub-item-4"><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down"></use></svg></span> Настройки шлюзов 
            </a>
            <ul class="children collapse" id="sub-item-4">
		<li>
                    <a class="" href="/dashboard_new/gate_delay">
			<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Задержка
                    </a>
		</li> 
		<li>
                    <a class="" href="/dashboard_new/gate_mail">
			<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Почта
                    </a>
		</li>                
            </ul>
	</li>        
        <!--
        <li><a href="widgets.html"><svg class="glyph stroked calendar"><use xlink:href="#stroked-calendar"></use></svg> Widgets</a></li>
	<li><a href="charts.html"><svg class="glyph stroked line-graph"><use xlink:href="#stroked-line-graph"></use></svg> Charts</a></li>
	<li class="active"><a href="tables.html"><svg class="glyph stroked table"><use xlink:href="#stroked-table"></use></svg> Tables</a></li>
	<li><a href="forms.html"><svg class="glyph stroked pencil"><use xlink:href="#stroked-pencil"></use></svg> Forms</a></li>
	<li><a href="panels.html"><svg class="glyph stroked app-window"><use xlink:href="#stroked-app-window"></use></svg> Alerts &amp; Panels</a></li>
	<li><a href="icons.html"><svg class="glyph stroked star"><use xlink:href="#stroked-star"></use></svg> Icons</a></li>
	<li class="parent">
            <a href="#">
		<span data-toggle="collapse" href="#sub-item-1"><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down"></use></svg></span> Dropdown 
            </a>
            <ul class="children collapse" id="sub-item-1">
		<li>
                    <a class="" href="#">
			<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Sub Item 1
                    </a>
		</li>
		<li>
                    <a class="" href="#">
			<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Sub Item 2
                    </a>
		</li>
		<li>
                    <a class="" href="#">
			<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Sub Item 3
                    </a>
		</li>
            </ul>
	</li>
	<li role="presentation" class="divider"></li>
	<li><a href="login.html"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Login Page</a></li>
-->
    </ul>
</div><!--/.sidebar-->