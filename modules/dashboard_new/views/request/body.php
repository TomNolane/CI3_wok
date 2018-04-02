<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
    <div class="row">
	<ol class="breadcrumb">
            <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
            <li class="active">Анкеты</li>
	</ol>
    </div><!--/.row-->
     
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                </div>
                <div class="panel-body">                
                    <table class="table-sm" data-toggle="table" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-page-size="100" data-sort-name="id" data-sort-order="desc">
                        <thead>
                            <tr>
			        <th data-field="state" data-checkbox="true">State</th>                               
			        <th data-field="site">Сайт</th>
                                <th data-field="id" data-sortable="true">ID</th>
                                <th data-field="forms_id" data-sortable="true">Form ID</th>
                                <th data-field="create_date" data-sortable="true">Создано</th>
                                <th data-field="step" data-sortable="true">Шаг</th>
                                <th data-field="func" data-sortable="true">Функция</th>
                                <th data-field="gate" data-sortable="true">Шлюз</th>
                                <th data-field="gate_status" data-sortable="true">Статус</th>
			    </tr>
			</thead>
                        <tbody>
                            <?php foreach($data as $item) { ?>
                                <?php
                                echo '<tr class="'.$trclass.'">'
                                    . '<td></td>'
                                    . '<td>'.$item['site'].'</td>'
                                    . '<td>'.$item['id'].'</td>'
                                    . '<td>'.$item['forms_id'].'</td>'
                                    . '<td>'.$item['date'].'</td>'
                                    . '<td>'.$item['step'].'</td>'
                                    . '<td>'.$item['func'].'</td>'
                                    . '<td>'.$item['gate'].'</td>'
                                    . '<td>'.$item['gate_status'].'</td>'
                                . '</tr>'; ?>
                            <?php } ?>                           
                        </tbody>
                    </table>
		</div>
            </div>
	</div>
        
        print_r($data);
        
    </div><!--/.row-->
</div><!--/.main-->