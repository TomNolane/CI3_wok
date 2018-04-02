<?php
    $i=0;
?>
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
                <div class="panel-heading">Форма</div>
                <div class="panel-body">  
                    <div id="toolbar" class="btn-group">
                        <button type="button" class="btn btn-sm btn-default" id="download_more"> Загрузить </button>
                    </div>                    
                    <table id="tableapi" class="table-sm" data-toggle="table" data-show-columns="true" data-search="true" data-page-size="100" data-sort-name="create_date" data-sort-order="desc" data-toolbar="#toolbar">
                        <thead>
                            <tr>
			        <th data-field="state" data-checkbox="true">State</th>                               
                                <th data-field="date" data-sortable="true">Дата</th>

                                <th data-field="sum" data-sortable="true">Сумма</th>
                                <th data-field="1" data-sortable="true">1 шаг</th>
                                <th data-field="2" data-sortable="true">2 шаг</th>
                                <th data-field="3" data-sortable="true">3 шаг</th>
                                <th data-field="lk" data-sortable="true">Спасибо</th>           
                                
                                <th data-field="settings" data-visible="false">Действия</th>
			    </tr>
			</thead>
                                                
                        <tbody>
                            <tr>
                                <td></td>
                                <td class="date"><?=$date?></td>
                                <?php foreach($d as $item) { ?>
                                    <?php
                                        echo '<td>'.$item.'</td>';
                                    ?>
                                <?php } ?>
                            </tr>    
                        </tbody>
                    </table>
		</div>
                <?php
                    //print_r($d);
                ?>
            </div>
	</div>
    </div>
</div>