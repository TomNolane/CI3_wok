<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
    <div class="row">
	<ol class="breadcrumb">
            <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
            <li class="active">Настройки шлюза</li>
	</ol>
    </div><!--/.row-->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Отправка почты на шлюз</div>
                <div class="panel-body">                                                     
                    <table class="table-sm" data-toggle="table" data-show-columns="true" data-select-item-name="toolbar1" data-page-size="50" data-sort-name="id" data-sort-order="desc">
                        <thead>
                            <tr>
			        <th data-field="state" data-checkbox="true">State</th>                               
			        <th data-field="date" data-sortable="true">Шлюз</th>
                                <th data-field="mail" data-sortable="true">Почта</th>
			    </tr>
			</thead>
                        <tbody>
                            <?php foreach($data as $item) { ?>
                            <?php 
                                $checked=array(0=>'', 1=>'', 2=>'');                               
                            ?>
                                <?php
                                    $checked[$item['mail']] = 'checked';
                                echo '<tr class="">'
                                    . '<td></td>'
                                    . '<td>'.$item['gate'].'</td>'
                                    . '<td>
<div class="radio-inline"><input class="magic-radio" id="'.$item['id'].'_1" type="radio" data-id="'.$item['id'].'" name="radio'.$item['id'].'" value="0" '.$checked[0].'><label for="'.$item['id'].'_1" class="radiolabel">Отключено</label></div>
<div class="radio-inline"><input class="magic-radio" id="'.$item['id'].'_2" type="radio" data-id="'.$item['id'].'" name="radio'.$item['id'].'" value="1" '.$checked[1].'><label for="'.$item['id'].'_2" class="radiolabel">Настоящая почта</label></div>
<div class="radio-inline"><input class="magic-radio" id="'.$item['id'].'_3" type="radio" data-id="'.$item['id'].'" name="radio'.$item['id'].'" value="2" '.$checked[2].'><label for="'.$item['id'].'_3" class="radiolabel">Фейковая почта</label></div>
                                        </td>'
                                    . '</tr>'
                                ; ?>
                            <?php } ?>                           
                        </tbody>
                    </table>
		</div>
            </div>
	</div>        
    </div><!--/.row-->
</div><!--/.main-->
