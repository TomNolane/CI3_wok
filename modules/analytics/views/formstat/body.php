<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
    <div class="row">
	<ol class="breadcrumb">
            <li><a href="/analytics/"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
            <li class="active">Статистика</li>
	</ol>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Апи</div>
                <div class="panel-body">                   
                    <table id="tableapi" class="table-sm" data-toggle="table" data-show-columns="true" data-search="true" data-page-size="100" data-sort-name="date" data-sort-order="asc" data-toolbar="#toolbar">
                        <thead>
                            <tr>
                                <th data-field="id" data-sortable="true">ID</th>
                                <th data-field="site">Сайт</th>
                                <th data-field="subid">SubId</th>
                                <th data-field="step">Шаг</th>
                                <th data-field="func">Функция</th>
                                <th data-field="gate">Шлюз</th>
                                <th data-field="gate_status">Статус</th>
                                <th data-field="gate_data" data-visible="false">Данные</th>
                                <th data-field="date" data-sortable="true">Дата</th>
			    </tr>
			</thead>
                        <tbody>
                            <?php foreach($data as $item) { ?>
                                    <?php
                                        echo '<tr>'
                                            . '<td>'.$item['forms_id'].'</td>'
                                            . '<td>'.$item['site'].'</td>'
                                            . '<td>'.$item['ad_id'].'</td>'
                                            . '<td>'.$item['step'].'</td>'
                                            . '<td>'.$item['func'].'</td>'
                                            . '<td>'.$item['gate'].'</td>'
                                            . '<td>'.$item['gate_status'].'</td>'
                                            . '<td>'.$item['gate_data'].'</td>'
                                            . '<td>'.$item['date'].'</td></tr>';
                                    ?>
                            <?php } ?>
                        </tbody>
                    </table>
		</div>
            </div>
	</div>
    </div>
</div>