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
                <div class="panel-heading">Апи</div>
                <div class="panel-body">  
                    <div id="toolbar" class="btn-group">
                        <button type="button" class="btn btn-sm btn-default" id="download_more"> Загрузить </button>
                    </div>                    
                    <table id="tableapi" class="table-sm" data-toggle="table" data-show-columns="true" data-search="true" data-page-size="100" data-sort-name="create_date" data-sort-order="desc" data-toolbar="#toolbar">
                        <thead>
                            <tr>
			        <th data-field="state" data-checkbox="true">State</th>                               
                                <th data-field="date" data-sortable="true">Дата</th>
 
                                <?php foreach($d as $item => $val) { ?>
                                     <?php
                                         echo ' 
                                                <th data-field="'.$item.'">'.$item.'</th>
                                         ';
                                     ?>
                                 <?php } ?>
                                
                                <th data-field="settings" data-visible="false">Действия</th>
			    </tr>
			</thead>
                        <tbody>
                            <tr>
                                <td></td>
                                <td class="date"><?=$date?></td>
                                <?php foreach($d as $item) { ?>
                                    <?php
                                        echo '<td>'.'<span class="text-success">'.$item.'</span></td>';
                                    ?>
                                <?php } ?>
                            </tr>    
                        </tbody>
                    </table>
                    <?php
                        //print_r($d);
                    ?>
		</div>
            </div>
	</div>
    </div>
</div>