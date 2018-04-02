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
                <div class="panel-heading">Анкеты</div>
                <div class="panel-body">                 
                    <table id="form_table" class="table-sm" data-toggle="table" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-page-size="100" data-sort-name="id" data-sort-order="desc" data-toolbar="#toolbar">
                        <thead>
                            <tr>
			        <th data-field="state" data-checkbox="true">State</th>    
                                <th data-field="site" data-sortable="false">Сайт</th>
                                <th data-field="id" data-sortable="true">ID</th>
                                <th data-field="create_date" data-sortable="true">Время создания</th>
                                <th data-field="fio" data-sortable="false">FIO</th>
                                <th data-field="step" data-sortable="false">Шаг</th>
                                <th data-field="utm" data-sortable="false">UTM</th>
                                <th data-field="teleport" data-sortable="false">Teleport</th>
                                <th data-field="leadia" data-sortable="false">Leadia</th>
                                <th data-field="unicom" data-sortable="false">Unicom</th>
                                <th data-field="firano" data-sortable="false">Firano</th>
                                <th data-field="settings">Действия</th>
			    </tr>
			</thead>
                        <tbody>
                            <?php foreach($data as $val) { ?>
                                <?php
                                    parse_str($val['referer'], $output);
                                    if(isset($output['utm_source'])){$utm = $output['utm_source'];}else{$utm = '';}
                                echo '<tr id="'.$val['id'].'" class="'.$trclass.'">'
                                    . '<td></td>'
                                    . '<td>'.$val['site'].'</td>'
                                    . '<td>'.$val['id'].'</td>'
                                    . '<td>'.$val['create_date'].'</td>'
                                    . '<td>'.$val['f'].' '.$val['i'].' '.$val['o'].'</td>'
                                    . '<td>'.$val['step'].'</td>'
                                    . '<td>'.$utm.'</td>'
                                    . '<td><span id="'.$val['id'].'teleport_status"></span></td>'
                                    . '<td><span id="'.$val['id'].'leadia_status"></span></td>'
                                    . '<td><span id="'.$val['id'].'unicom_status"></span></td>'
                                    . '<td><span id="'.$val['id'].'firanoall_status"></span></td>'
                                    . '<td><span id="'.$val['id'].'settings"></span></td>'
                                . '</tr>'; ?>
                            <?php } ?>                           
                        </tbody>
                    </table>
		</div>
            </div>
	</div>
    </div><!--/.row-->
</div><!--/.main-->